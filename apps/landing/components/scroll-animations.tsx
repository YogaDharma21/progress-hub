'use client'

import { useEffect, useLayoutEffect } from 'react'
import { usePathname } from 'next/navigation'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

// A layout effect runs before the first paint, so GSAP can hide the hero before it shows.
// On the server it falls back to useEffect, since layout effects don't run there.
const useIsomorphicLayoutEffect = typeof window === 'undefined' ? useEffect : useLayoutEffect

const INTRO_FROM = { y: 24, autoAlpha: 0 }
const INTRO_TO = { y: 0, autoAlpha: 1, duration: 0.9, ease: 'power3.out', stagger: 0.12, delay: 0.1, clearProps: 'transform,opacity,visibility' }

const REVEAL_FROM = { y: 28, autoAlpha: 0 }
const REVEAL_TO = { y: 0, autoAlpha: 1, duration: 0.8, ease: 'power3.out', stagger: 0.1, overwrite: true, clearProps: 'transform,opacity,visibility' }

export default function ScrollAnimations() {
    const pathname = usePathname()

    useIsomorphicLayoutEffect(() => {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

        gsap.registerPlugin(ScrollTrigger)

        const context = gsap.context(() => {
            const intro = gsap.utils.toArray<HTMLElement>('[data-hero-intro]')
            if (intro.length > 0) {
                gsap.fromTo(intro, INTRO_FROM, INTRO_TO)
            }

            ScrollTrigger.batch('[data-reveal]', {
                start: 'top 88%',
                once: true,
                onEnter: (batch) => gsap.fromTo(batch, REVEAL_FROM, REVEAL_TO),
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
