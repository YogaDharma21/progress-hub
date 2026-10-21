'use client'

import { useEffect, useRef, useState, type RefObject } from 'react'
import { useInView, useReducedMotion } from 'motion/react'

// How long after the last scroll event a demo stays paused. Scrolling already
// uses the main thread; starting new card and counter animations in the same
// frames makes the scroll stutter on slower machines.
const SCROLL_IDLE_MS = 150

// Drives the looping demos. The timer only runs while the demo is near the
// viewport, the visitor is not scrolling, and reduced motion is off, so demos
// below the fold cost nothing.
export function useDemoTick(ref: RefObject<Element | null>, delay: number): number {
    const [tick, setTick] = useState(0)
    const inView = useInView(ref, { margin: '200px' })
    const reducedMotion = useReducedMotion()
    const lastScroll = useRef(0)

    useEffect(() => {
        if (!inView) return

        const onScroll = () => {
            lastScroll.current = performance.now()
        }

        window.addEventListener('scroll', onScroll, { passive: true })

        return () => window.removeEventListener('scroll', onScroll)
    }, [inView])

    useEffect(() => {
        if (!inView || reducedMotion) return

        const timer = window.setInterval(() => {
            if (document.hidden || performance.now() - lastScroll.current < SCROLL_IDLE_MS) return
            setTick((current) => current + 1)
        }, delay)

        return () => window.clearInterval(timer)
    }, [delay, inView, reducedMotion])

    return tick
}
