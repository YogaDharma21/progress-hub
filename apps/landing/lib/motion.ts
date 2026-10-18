// The reveal animation itself lives in the inline script in app/layout.tsx, so it
// also runs before the client bundle boots. This is the typed entry point for
// client code that triggers a reveal, like the observer in scroll-animations.tsx.
export function revealElements(targets: Iterable<Element>, stagger = true) {
    if (window.__motionReveal) {
        window.__motionReveal(targets, stagger)
        return
    }

    // Bundle running without the inline script. Show content rather than hide it.
    for (const element of targets) {
        if (element.hasAttribute('data-motion-shown') || element.hasAttribute('data-motion-instant')) continue
        element.setAttribute('data-motion-instant', '')
    }
}

declare global {
    interface Window {
        __motionReveal?: (targets: Iterable<Element>, stagger: boolean) => void
    }
}
