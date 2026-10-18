"use client"

import { useEffect, useRef } from "react"

const RIPPLE_COLOR = "#ffffff"
const RINGS_PER_CLICK = 3
const RING_STAGGER = 0.15
const RING_LIFE = 0.62
const RING_START_RADIUS = 7
const RING_END_RADIUS = 62
const RING_WIDTH = 2.5
const RING_ALPHA = 0.65
const MAX_RINGS = 90
const TAU = Math.PI * 2

type Ring = {
  x: number
  y: number
  age: number
  delay: number
  life: number
}

function drawRing(ctx: CanvasRenderingContext2D, ring: Ring) {
  const progress = Math.max(0, Math.min(1, (ring.age - ring.delay) / ring.life))
  const radius =
    RING_START_RADIUS + (RING_END_RADIUS - RING_START_RADIUS) * progress

  ctx.save()
  ctx.globalAlpha = RING_ALPHA * (1 - progress * progress)
  ctx.strokeStyle = RIPPLE_COLOR
  ctx.lineWidth = RING_WIDTH
  ctx.beginPath()
  ctx.arc(ring.x, ring.y, radius, 0, TAU)
  ctx.stroke()
  ctx.restore()
}

export function ClickRipple() {
  const canvasRef = useRef<HTMLCanvasElement | null>(null)

  useEffect(() => {
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return

    const canvas = canvasRef.current
    if (!canvas) return
    const ctx = canvas.getContext("2d")
    if (!ctx) return

    const rings: Ring[] = []
    let frame = 0
    let lastTime = 0
    let viewWidth = 0
    let viewHeight = 0

    const resize = () => {
      const rect = canvas.getBoundingClientRect()
      if (rect.width === viewWidth && rect.height === viewHeight) return

      viewWidth = rect.width
      viewHeight = rect.height
      const dpr = Math.min(window.devicePixelRatio || 1, 2)
      canvas.width = Math.max(1, Math.round(viewWidth * dpr))
      canvas.height = Math.max(1, Math.round(viewHeight * dpr))
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0)
    }

    const tick = (now: number) => {
      const dt = Math.min((now - lastTime) / 1000, 0.05)
      lastTime = now

      ctx.clearRect(0, 0, viewWidth, viewHeight)

      for (let i = rings.length - 1; i >= 0; i--) {
        const ring = rings[i]
        ring.age += dt
        if (ring.age >= ring.delay + ring.life) {
          rings.splice(i, 1)
          continue
        }
        drawRing(ctx, ring)
      }

      frame = rings.length > 0 ? requestAnimationFrame(tick) : 0
    }

    const spawn = (x: number, y: number) => {
      for (let i = 0; i < RINGS_PER_CLICK; i++) {
        if (rings.length >= MAX_RINGS) break
        rings.push({ x, y, age: 0, delay: i * RING_STAGGER, life: RING_LIFE })
      }

      if (frame === 0) {
        lastTime = performance.now()
        frame = requestAnimationFrame(tick)
      }
    }

    const onPointerDown = (event: PointerEvent) => {
      if (event.pointerType === "mouse" && event.button !== 0) return
      const rect = canvas.getBoundingClientRect()
      spawn(event.clientX - rect.left, event.clientY - rect.top)
    }

    resize()
    const observer = new ResizeObserver(resize)
    observer.observe(canvas)
    window.addEventListener("pointerdown", onPointerDown)

    return () => {
      observer.disconnect()
      window.removeEventListener("pointerdown", onPointerDown)
      if (frame !== 0) cancelAnimationFrame(frame)
    }
  }, [])

  return (
    <canvas
      ref={canvasRef}
      aria-hidden="true"
      className="pointer-events-none fixed inset-0 z-[9999] size-full"
    />
  )
}
