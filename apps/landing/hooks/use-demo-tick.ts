'use client'

import { useEffect, useState, type RefObject } from 'react'
import { useInView, useReducedMotion } from 'motion/react'

// Drives the looping demos. The timer only runs while the demo is near the
// viewport and the visitor has not asked for reduced motion, so demos below the
// fold cost nothing.
export function useDemoTick(ref: RefObject<Element | null>, delay: number): number {
    const [tick, setTick] = useState(0)
    const inView = useInView(ref, { margin: '200px' })
    const reducedMotion = useReducedMotion()

    useEffect(() => {
        if (!inView || reducedMotion) return

        const timer = window.setInterval(() => {
            if (document.hidden) return
            setTick((current) => current + 1)
        }, delay)

        return () => window.clearInterval(timer)
    }, [delay, inView, reducedMotion])

    return tick
}
