import type { Metadata } from "next"
import { Geist, Geist_Mono, Inter } from "next/font/google"

import "./globals.css"
import { ThemeProvider } from "@/components/theme-provider"
import SmoothScrollProvider from "@/components/smooth-scroll-provider"
import ScrollAnimations from "@/components/scroll-animations"
import ScrollProgress from "@/components/scroll-progress"
import { cn } from "@/lib/utils";

export const metadata: Metadata = {
  title: "Progress Hub",
  description: "Pusat Kolaborasi, Proyek, & Kegiatan UKM Modern",
  icons: {
    icon: [
      { url: "/favicon.ico", sizes: "any" },
      { url: "/icon-192.png", type: "image/png", sizes: "192x192" },
      { url: "/icon-512.png", type: "image/png", sizes: "512x512" },
    ],
    apple: "/apple-touch-icon.png",
  },
}

const inter = Inter({subsets:['latin'],variable:'--font-sans'})

const fontMono = Geist_Mono({
  subsets: ["latin"],
  variable: "--font-mono",
})

// Content animated on first load is hidden by the .motion rules in globals.css.
// Everything that reveals goes through the IntersectionObserver below, which lives
// in this inline script on purpose: reveals then never depend on when React
// hydrates, so every load plays the same animation at the same time.

// A beat after the document is parsed, so the entrance reads as deliberate and the
// fonts have settled.
const REVEAL_GUARD_MS = 250

// Stagger between revealed elements, capped so a tall viewport never queues a wait.
const REVEAL_STAGGER_MS = 90
const REVEAL_STAGGER_MAX_STEPS = 5

// Last resort. If something the user can see is still hidden, show it with no
// animation rather than leaving a blank page.
const MOTION_RESCUE_MS = 3000

// Runs while the HTML parses, before the first paint, so nothing flashes visible
// and then hides. Deliberately plain: it has to work before the bundle boots.
const motionScript = `
(function () {
  var root = document.documentElement
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

  root.classList.add('motion')

  // Triggers 90% down the viewport, the same line the scroll batch in
  // components/scroll-animations.tsx uses.
  var LINE = 0.9
  var pending = '[data-hero-intro]:not([data-motion-shown]):not([data-motion-instant]), [data-reveal]:not([data-motion-shown]):not([data-motion-instant])'

  function reveal(targets, stagger) {
    var index = 0
    targets.forEach(function (element) {
      if (element.hasAttribute('data-motion-shown') || element.hasAttribute('data-motion-instant')) return
      if (stagger) {
        element.style.animationDelay = (Math.min(index, ${REVEAL_STAGGER_MAX_STEPS}) * ${REVEAL_STAGGER_MS}) + 'ms'
        element.setAttribute('data-motion-shown', '')
        index += 1
      } else {
        element.setAttribute('data-motion-instant', '')
      }
    })
  }

  // The scroll batch in the bundle calls this too, so both triggers play the
  // identical animation.
  window.__motionReveal = reveal

  function visible(elements) {
    var line = window.innerHeight * LINE
    return Array.prototype.filter.call(elements, function (element) {
      return element.getBoundingClientRect().top < line
    })
  }

  function start() {
    if (!('IntersectionObserver' in window)) {
      reveal(document.querySelectorAll(pending), false)
      return
    }

    var observer = new IntersectionObserver(
      function (entries) {
        var entered = entries
          .filter(function (entry) { return entry.isIntersecting })
          .map(function (entry) { return entry.target })
        // Document order, so the stagger runs top to bottom.
        entered.sort(function (a, b) { return a.compareDocumentPosition(b) & Node.DOCUMENT_POSITION_FOLLOWING ? -1 : 1 })
        reveal(entered, true)
        entered.forEach(function (element) { observer.unobserve(element) })
      },
      { rootMargin: '0px 0px -10% 0px' }
    )

    document.querySelectorAll(pending).forEach(function (element) { observer.observe(element) })
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () { window.setTimeout(start, ${REVEAL_GUARD_MS}) }, { once: true })
  } else {
    window.setTimeout(start, ${REVEAL_GUARD_MS})
  }

  window.setTimeout(function () {
    var stuck = visible(document.querySelectorAll(pending))
    if (stuck.length) reveal(stuck, false)
  }, ${MOTION_RESCUE_MS})
})()
`

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode
}>) {
  return (
    <html
      lang="en"
      suppressHydrationWarning
      className={cn("antialiased", fontMono.variable, "font-sans", inter.variable)}
    >
      <body>
        <script dangerouslySetInnerHTML={{ __html: motionScript }} />
        <ThemeProvider>
          <SmoothScrollProvider>
            <ScrollProgress />
            {children}
            <ScrollAnimations />
          </SmoothScrollProvider>
        </ThemeProvider>
      </body>
    </html>
  )
}
