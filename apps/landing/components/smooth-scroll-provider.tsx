'use client'

import { useEffect } from 'react'
import Lenis from 'lenis'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { setLenisInstance } from '@/lib/lenis'

export default function SmoothScrollProvider({ children }: { children: React.ReactNode }) {
    useEffect(() => {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

        gsap.registerPlugin(ScrollTrigger)
        ScrollTrigger.config({ ignoreMobileResize: true })

        const lenis = new Lenis({
            duration: 1.1,
            anchors: { offset: -80 },
            autoToggle: true,
            stopInertiaOnNavigate: true,
        })

        setLenisInstance(lenis)
        lenis.on('scroll', ScrollTrigger.update)

        // Drive Lenis from the GSAP ticker so smooth scroll and ScrollTrigger stay in sync.
        const tick = (time: number) => lenis.raf(time * 1000)
        gsap.ticker.add(tick)
        gsap.ticker.lagSmoothing(0)

        // Late-loading images shift layout, which moves trigger positions.
        const refresh = () => ScrollTrigger.refresh()
        window.addEventListener('load', refresh)

        return () => {
            window.removeEventListener('load', refresh)
            gsap.ticker.remove(tick)
            gsap.ticker.lagSmoothing(500, 33)
            lenis.destroy()
            setLenisInstance(null)
        }
    }, [])

    return <>{children}</>
}
