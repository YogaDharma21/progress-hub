'use client'

import { useEffect, useRef } from 'react'
import gsap from 'gsap'
import { getLenisInstance } from '@/lib/lenis'

export default function ScrollProgress() {
    const barRef = useRef<HTMLDivElement>(null)

    useEffect(() => {
        const bar = barRef.current
        if (!bar) return
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

        // Only consulted when Lenis is not driving the window.
        let staticLimit = 0
        const measure = () => {
            staticLimit = Math.max(0, document.documentElement.scrollHeight - window.innerHeight)
        }
        measure()
        const resizeObserver = new ResizeObserver(measure)
        resizeObserver.observe(document.documentElement)

        let shown = 0
        let applied = 0
        const tick = (_time: number, deltaTime: number) => {
            const lenis = getLenisInstance()
            const scroll = lenis ? lenis.scroll : window.scrollY
            const limit = lenis ? lenis.limit : staticLimit
            const target = limit > 0 ? Math.min(1, Math.max(0, scroll / limit)) : 0

            // Chase the target the way a scrub tween would, frame rate independent.
            shown += (target - shown) * (1 - Math.exp(-deltaTime / 90))
            if (Math.abs(target - shown) < 0.001) shown = target

            // Writing the same value again would still dirty style on every frame.
            if (Math.abs(shown - applied) >= 0.001) {
                applied = shown
                bar.style.transform = `scaleX(${shown})`
            }
        }

        gsap.ticker.add(tick)

        return () => {
            gsap.ticker.remove(tick)
            resizeObserver.disconnect()
        }
    }, [])

    return <div ref={barRef} aria-hidden style={{ transform: 'scaleX(0)' }} className="bg-foreground/60 fixed inset-x-0 top-0 z-30 h-0.5 origin-left will-change-transform" />
}
