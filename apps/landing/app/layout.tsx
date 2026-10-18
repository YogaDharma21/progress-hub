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

// Animated content is hidden by globals.css from the first paint. If GSAP has not
// claimed it in time, the guard reveals whatever the user can currently see.
const REVEAL_GUARD_MS = 100

// Last resort. If the animation bundle never boots, reveal everything still hidden.
const MOTION_KILL_SWITCH_MS = 3000

// Runs while the HTML parses, before the first paint, so nothing flashes visible
// and then hides. Only the in-view guard is allowed to skip the scroll reveal.
const motionScript = `
(function () {
  var root = document.documentElement
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

  root.classList.add('motion')

  var pending = '[data-hero-intro]:not([data-motion-forced]):not([data-motion-shown]), [data-reveal]:not([data-motion-forced]):not([data-motion-shown])'

  function reveal(targets, inViewOnly, stagger) {
    var viewport = window.innerHeight
    targets.forEach(function (element, index) {
      if (inViewOnly) {
        var rect = element.getBoundingClientRect()
        if (rect.bottom <= 0 || rect.top >= viewport) return
      }
      if (stagger) element.style.transitionDelay = (index * 60) + 'ms'
      element.setAttribute('data-motion-forced', '')
    })
  }

  window.setTimeout(function () {
    reveal(document.querySelectorAll(pending), true, true)
  }, ${REVEAL_GUARD_MS})

  window.setTimeout(function () {
    if (root.dataset.motionActive) return
    reveal(document.querySelectorAll(pending), false, false)
  }, ${MOTION_KILL_SWITCH_MS})
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
