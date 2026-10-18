import type Lenis from 'lenis'

// Lenis owns the window, GSAP owns the ticker, so one instance is created by the
// smooth scroll provider and read from event handlers elsewhere.
let instance: Lenis | null = null

export function setLenisInstance(next: Lenis | null) {
    instance = next
}

export function getLenisInstance() {
    return instance
}
