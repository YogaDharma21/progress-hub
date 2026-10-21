'use client'

import { useEffect } from 'react'
import Lenis from 'lenis'
import gsap from 'gsap'
import { setLenisInstance } from '@/lib/lenis'

export default function SmoothScrollProvider({ children }: { children: React.ReactNode }) {
    useEffect(() => {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

        const lenis = new Lenis({
            duration: 1.1,
            // Wheel and touch input stay native so the page tracks the device.
            // Lenis only smooths programmatic jumps, like the feature nav.
            smoothWheel: false,
            anchors: { offset: -80 },
            autoToggle: true,
            stopInertiaOnNavigate: true,
        })

        setLenisInstance(lenis)

        // Lenis has no loop of its own here, so the GSAP ticker drives it. Anything
        // else that follows the scroll reads the instance and hooks the same ticker.
        const tick = (time: number) => lenis.raf(time * 1000)
        gsap.ticker.add(tick)
        gsap.ticker.lagSmoothing(0)

        return () => {
            gsap.ticker.remove(tick)
            gsap.ticker.lagSmoothing(500, 33)
            lenis.destroy()
            setLenisInstance(null)
        }
    }, [])

    return <>{children}</>
}
