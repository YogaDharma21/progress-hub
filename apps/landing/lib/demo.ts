// Shared pieces for the looping landing page demos. Every demo shows a window
// into a bigger list, so one card drops out of the bottom while a new one enters
// at the top. The window only wraps around the data; nothing is mutated.

export const DEMO_ITEM_TRANSITION = {
    duration: 0.4,
    ease: [0.22, 1, 0.36, 1],
} as const

export const DEMO_CONTENT_TRANSITION = {
    duration: 0.35,
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
 * How many matching entries have entered the newest slot after `tick` ticks.
 * The dashboard totals use this so a new activity row also moves its counter.
 */
export function countIntroduced<T>(items: readonly T[], tick: number, match: (item: T) => boolean): number {
    const perCycle = items.filter(match).length

    return Math.floor(tick / items.length) * perCycle + items.slice(0, tick % items.length).filter(match).length
}
