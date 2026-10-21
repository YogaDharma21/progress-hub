// Shared pieces for the looping landing page demos. Every demo shows a window
// into a bigger list, so one card drops out of the bottom while a new one enters
// at the top. The window only wraps around the data; nothing is mutated.

export const DEMO_ITEM_TRANSITION = {
    duration: 0.75,
    ease: [0.22, 1, 0.36, 1],
} as const

export const DEMO_CONTENT_TRANSITION = {
    duration: 0.65,
    ease: [0.22, 1, 0.36, 1],
} as const

/** Newest-first slice of `items` for the given tick. */
export function demoWindow<T>(items: readonly T[], tick: number, size: number): T[] {
    const count = Math.min(size, items.length)

    return Array.from({ length: count }, (_, offset) => {
        const index = (((tick - offset) % items.length) + items.length) % items.length
        return items[index]!
    })
}

/**
 * Live dashboard count. The value drifts up and down around its base as the
 * demo ticks. Bigger totals drift further, small totals stay in a tight range.
 */
export function demoStat(base: number, tick: number, phase = 0): number {
    const amplitude = base >= 10 ? 3.2 : 2

    return Math.max(1, base + Math.round(Math.sin((tick + phase) * 1.1) * amplitude))
}
