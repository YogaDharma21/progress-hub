'use client'

import { useEffect, useLayoutEffect } from 'react'
import { usePathname } from 'next/navigation'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

// A layout effect runs before the first paint, so GSAP can hide the hero before it shows.
// On the server it falls back to useEffect, since layout effects don't run there.
const useIsomorphicLayoutEffect = typeof window === 'undefined' ? useEffect : useLayoutEffect

// The guard in app/layout.tsx and GSAP both work on the pending set: whatever one
// touches first wins, the other skips it.
const INTRO_SELECTOR = '[data-hero-intro]:not([data-motion-forced]):not([data-motion-shown])'
const REVEAL_SELECTOR = '[data-reveal]:not([data-motion-forced]):not([data-motion-shown])'

// data-motion-shown stops the hidden CSS rule from re-hiding an element once GSAP
// clears its inline styles at the end of a tween.
function claim(elements: Element[]) {
    elements.forEach((element) => element.setAttribute('data-motion-shown', ''))
}

const INTRO_FROM = { y: 24, autoAlpha: 0 }
const INTRO_TO = { y: 0, autoAlpha: 1, duration: 0.9, ease: 'power3.out', stagger: 0.12, delay: 0.1, clearProps: 'transform,opacity,visibility' }

const REVEAL_FROM = { y: 28, autoAlpha: 0 }
const REVEAL_TO = { y: 0, autoAlpha: 1, duration: 0.8, ease: 'power3.out', stagger: 0.1, overwrite: true, clearProps: 'transform,opacity,visibility' }

export default function ScrollAnimations() {
    const pathname = usePathname()

    useIsomorphicLayoutEffect(() => {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

        gsap.registerPlugin(ScrollTrigger)

        // Tells the kill switch in app/layout.tsx that the animation library booted.
        document.documentElement.dataset.motionActive = 'true'

        const context = gsap.context(() => {
            const intro = gsap.utils.toArray<HTMLElement>(INTRO_SELECTOR)
            if (intro.length > 0) {
                claim(intro)
                gsap.fromTo(intro, INTRO_FROM, INTRO_TO)
            }

            ScrollTrigger.batch(REVEAL_SELECTOR, {
                start: 'top 88%',
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
