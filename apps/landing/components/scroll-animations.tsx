'use client'

import { useEffect, useLayoutEffect } from 'react'
import { usePathname } from 'next/navigation'
import gsap from 'gsap'
import { getScrollPosition } from '@/lib/lenis'
import { revealElements } from '@/lib/motion'

// Prefer a layout effect so the parallax is measured before the first paint after
// hydration. On the server it falls back to useEffect, since layout effects don't
// run there.
const useIsomorphicLayoutEffect = typeof window === 'undefined' ? useEffect : useLayoutEffect

// Everything the inline script in app/layout.tsx has not revealed yet. That script
// owns an IntersectionObserver that covers what the server rendered, so this file
// only has to catch elements that arrive later, like after a client navigation.
// Both use window.__motionReveal, so they play the identical animation.
const REVEAL_SELECTOR = '[data-reveal]:not([data-motion-shown]):not([data-motion-instant])'

type Parallax = {
    element: HTMLElement
    parent: HTMLElement
    distance: number
    // Document offset of the parent's top edge, cached so no frame ever measures.
    top: number
    // Distance the parent travels through the viewport: its height plus one screen.
    travel: number
    viewport: number
    shown: number | null
}

export default function ScrollAnimations() {
    const pathname = usePathname()

    useIsomorphicLayoutEffect(() => {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

        // The reveal itself is a css keyframe animation (globals.css), which the
        // browser runs off the main thread. This observer only decides when.
        const revealObserver = new IntersectionObserver(
            (entries) => {
                const entered = entries
                    .filter((entry) => entry.isIntersecting)
                    .map((entry) => entry.target)
                    .sort((a, b) => (a.compareDocumentPosition(b) & Node.DOCUMENT_POSITION_FOLLOWING ? -1 : 1))

                revealElements(entered)
                entered.forEach((element) => revealObserver.unobserve(element))
            },
            { rootMargin: '0px 0px -10% 0px' }
        )

        document.querySelectorAll(REVEAL_SELECTOR).forEach((element) => revealObserver.observe(element))

        // Parallax runs on the gsap ticker and only writes while its element is in
        // range, so scrolling past any other section costs nothing. It used to be a
        // scroll-linked tween, whose per-scroll handler re-ran for everything on the
        // page on every scroll event, which is what made long scrolls feel heavy.
        const parallax: Parallax[] = []
        const measure = () => {
            for (const entry of parallax) {
                const rect = entry.parent.getBoundingClientRect()
                entry.top = rect.top + window.scrollY
                entry.travel = rect.height + window.innerHeight
                entry.viewport = window.innerHeight
                entry.shown = null
            }
        }
        const resizeObserver = new ResizeObserver(measure)

        gsap.utils.toArray<HTMLElement>('[data-parallax]').forEach((element) => {
            const parent = element.parentElement
            if (!parent) return

            parallax.push({
                element,
                parent,
                distance: Number(element.dataset.parallax ?? 10),
                top: 0,
                travel: 1,
                viewport: window.innerHeight,
                shown: null,
            })
            resizeObserver.observe(parent)
        })

        measure()

        const tick = () => {
            if (!parallax.length) return
            const scroll = getScrollPosition()

            for (const entry of parallax) {
                const progress = Math.min(1, Math.max(0, (scroll + entry.viewport - entry.top) / entry.travel))
                const next = (progress - 0.5) * entry.distance

                if (entry.shown === null || Math.abs(next - entry.shown) >= 0.01) {
                    entry.shown = next
                    entry.element.style.transform = `translate3d(0, ${next.toFixed(3)}%, 0)`
                }
            }
        }

        gsap.ticker.add(tick)

        return () => {
            gsap.ticker.remove(tick)
            resizeObserver.disconnect()
            revealObserver.disconnect()
            parallax.forEach((entry) => {
                entry.element.style.transform = ''
            })
        }
    }, [pathname])

    return null
}
