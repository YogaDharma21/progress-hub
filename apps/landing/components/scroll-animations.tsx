'use client'

import { useEffect, useLayoutEffect } from 'react'
import { usePathname } from 'next/navigation'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { revealElements } from '@/lib/motion'

// Prefer a layout effect so triggers exist before the first paint after hydration.
// On the server it falls back to useEffect, since layout effects don't run there.
const useIsomorphicLayoutEffect = typeof window === 'undefined' ? useEffect : useLayoutEffect

// Elements the inline script in app/layout.tsx has not revealed yet. That script
// owns an IntersectionObserver that covers everything rendered on first load, so
// this batch is the fallback path for elements added later, like after a client
// navigation. Both go through window.__motionReveal, so they play the identical
// animation.
const REVEAL_SELECTOR = '[data-reveal]:not([data-motion-shown]):not([data-motion-instant])'

export default function ScrollAnimations() {
    const pathname = usePathname()

    useIsomorphicLayoutEffect(() => {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

        gsap.registerPlugin(ScrollTrigger)

        const context = gsap.context(() => {
            // The reveal itself is a CSS keyframe animation (globals.css), which the
            // browser can run on the compositor. ScrollTrigger only decides when,
            // and the stagger comes from the animation-delay set per element.
            ScrollTrigger.batch(REVEAL_SELECTOR, {
                start: 'top 90%',
                once: true,
                onEnter: (batch) => revealElements(batch),
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
