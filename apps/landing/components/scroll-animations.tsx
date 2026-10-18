'use client'

import { useEffect, useLayoutEffect } from 'react'
import { usePathname } from 'next/navigation'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

// Prefer a layout effect so triggers exist before the first paint after hydration.
// On the server it falls back to useEffect, since layout effects don't run there.
const useIsomorphicLayoutEffect = typeof window === 'undefined' ? useEffect : useLayoutEffect

// Above-the-fold content is owned by the CSS entrance in globals.css, which the
// guard in app/layout.tsx triggers. GSAP owns everything that reveals on scroll.
// Both work on the same pending set: whatever one touches first wins.
const REVEAL_SELECTOR = '[data-reveal]:not([data-motion-forced]):not([data-motion-shown])'

// data-motion-shown stops the hidden CSS rule from re-hiding an element once GSAP
// clears its inline styles at the end of a tween.
function claim(elements: Element[]) {
    elements.forEach((element) => element.setAttribute('data-motion-shown', ''))
}

const REVEAL_FROM = { y: 32, autoAlpha: 0 }
const REVEAL_TO = { y: 0, autoAlpha: 1, duration: 1.1, ease: 'power2.out', stagger: 0.14, overwrite: true, clearProps: 'transform,opacity,visibility' }

export default function ScrollAnimations() {
    const pathname = usePathname()

    useIsomorphicLayoutEffect(() => {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

        gsap.registerPlugin(ScrollTrigger)

        // Tells the kill switch in app/layout.tsx that the animation library booted.
        document.documentElement.dataset.motionActive = 'true'

        const context = gsap.context(() => {
            ScrollTrigger.batch(REVEAL_SELECTOR, {
                start: 'top 90%',
                once: true,
                onEnter: (batch) => {
                    claim(batch)
                    gsap.fromTo(batch, REVEAL_FROM, REVEAL_TO)
                },
            })

            gsap.utils.toArray<HTMLElement>('[data-parallax]').forEach((element) => {
                const distance = Number(element.dataset.parallax ?? 10)
                gsap.fromTo(
                    element,
                    { yPercent: -distance / 2 },
                    {
                        yPercent: distance / 2,
                        ease: 'none',
                        scrollTrigger: {
                            trigger: element.parentElement ?? element,
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: true,
                            invalidateOnRefresh: true,
                        },
                    }
                )
            })
        })

        return () => context.revert()
    }, [pathname])

    return null
}
