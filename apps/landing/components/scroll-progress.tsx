'use client'

import { useEffect, useRef } from 'react'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

export default function ScrollProgress() {
    const barRef = useRef<HTMLDivElement>(null)

    useEffect(() => {
        const bar = barRef.current
        if (!bar) return
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

        gsap.registerPlugin(ScrollTrigger)

        const tween = gsap.to(bar, {
            scaleX: 1,
            ease: 'none',
            scrollTrigger: {
                start: 0,
                end: () => ScrollTrigger.maxScroll(window),
                scrub: 0.35,
                invalidateOnRefresh: true,
            },
        })

        return () => {
            tween.scrollTrigger?.kill()
            tween.kill()
        }
    }, [])

    return <div ref={barRef} aria-hidden style={{ transform: 'scaleX(0)' }} className="bg-foreground/60 fixed inset-x-0 top-0 z-30 h-0.5 origin-left will-change-transform" />
}
