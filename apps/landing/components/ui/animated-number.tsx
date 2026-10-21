'use client'

import { animate, motion, useMotionValue, useReducedMotion, useTransform } from 'motion/react'
import { useEffect } from 'react'

// Counts from the current number to the next one. The dashboard demos swap
// their totals every few seconds, and this makes the change readable instead of
// a hard text flip.
export function AnimatedNumber({ value, className }: { value: number; className?: string }) {
    const current = useMotionValue(value)
    const display = useTransform(current, (latest) => String(Math.round(latest)))
    const reducedMotion = useReducedMotion()

    useEffect(() => {
        if (reducedMotion || current.get() === value) {
            current.set(value)
            return
        }

        const controls = animate(current, value, {
            duration: 0.8,
            ease: [0.22, 1, 0.36, 1],
        })

        return () => controls.stop()
    }, [current, reducedMotion, value])

    return <motion.span className={className}>{display}</motion.span>
}
