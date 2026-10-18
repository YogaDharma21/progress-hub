"use client"

import { useEffect, useRef } from "react"

const SPARK_COLOR = "#ffffff"
const SPARKS_PER_CLICK = 6
const MAX_SPARKS = 240
const GRAVITY = 900
const DRAG = 2.1
const TAU = Math.PI * 2

type Spark = {
  x: number
  y: number
  vx: number
  vy: number
  size: number
  spin: number
  rotation: number
  life: number
  maxLife: number
}

type Flash = {
  x: number
  y: number
  life: number
  maxLife: number
}

function drawSpark(ctx: CanvasRenderingContext2D, spark: Spark) {
  const progress = spark.life / spark.maxLife
  const radius = spark.size * (0.35 + 0.65 * progress)

  ctx.save()
  ctx.translate(spark.x, spark.y)
  ctx.rotate(spark.rotation)
  ctx.globalAlpha = Math.min(1, progress * 1.8)
  ctx.fillStyle = SPARK_COLOR
  ctx.beginPath()
  for (let point = 0; point <= 4; point++) {
    const angle = (point / 4) * TAU - Math.PI / 2
    const px = Math.cos(angle) * radius
    const py = Math.sin(angle) * radius
    if (point === 0) ctx.moveTo(px, py)
    else ctx.quadraticCurveTo(0, 0, px, py)
  }
  ctx.closePath()
  ctx.fill()
  ctx.restore()
}

function drawFlash(ctx: CanvasRenderingContext2D, flash: Flash) {
  const progress = flash.life / flash.maxLife

  ctx.save()
  ctx.globalAlpha = progress * 0.5
  ctx.strokeStyle = SPARK_COLOR
  ctx.lineWidth = 1.5
  ctx.beginPath()
  ctx.arc(flash.x, flash.y, 3 + (1 - progress) * 15, 0, TAU)
  ctx.stroke()
  ctx.restore()
}

export function ClickSpark() {
  const canvasRef = useRef<HTMLCanvasElement | null>(null)

  useEffect(() => {
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return

    const canvas = canvasRef.current
    if (!canvas) return
    const ctx = canvas.getContext("2d")
    if (!ctx) return

    const sparks: Spark[] = []
    const flashes: Flash[] = []
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

      for (let i = flashes.length - 1; i >= 0; i--) {
        const flash = flashes[i]
        flash.life -= dt
        if (flash.life <= 0) {
          flashes.splice(i, 1)
          continue
        }
        drawFlash(ctx, flash)
      }

      for (let i = sparks.length - 1; i >= 0; i--) {
        const spark = sparks[i]
        spark.life -= dt
        if (spark.life <= 0) {
          sparks.splice(i, 1)
          continue
        }

        const drag = Math.exp(-DRAG * dt)
        spark.vx *= drag
        spark.vy = spark.vy * drag + GRAVITY * dt
        spark.x += spark.vx * dt
        spark.y += spark.vy * dt
        spark.rotation += spark.spin * dt
        drawSpark(ctx, spark)
      }

      if (sparks.length > 0 || flashes.length > 0) {
        frame = requestAnimationFrame(tick)
      } else {
        frame = 0
      }
    }

    const spawn = (x: number, y: number) => {
      const count = Math.min(
        SPARKS_PER_CLICK,
        Math.max(MAX_SPARKS - sparks.length, 0)
      )

      for (let i = 0; i < count; i++) {
        const angle = Math.random() * TAU
        const speed = 45 + Math.random() * 135
        const maxLife = 0.4 + Math.random() * 0.35

        sparks.push({
          x,
          y,
          vx: Math.cos(angle) * speed,
          vy: Math.sin(angle) * speed - 40,
          size: 2.5 + Math.random() * 3.5,
          spin: (Math.random() - 0.5) * 8,
          rotation: Math.random() * TAU,
          life: maxLife,
          maxLife,
        })
      }

      flashes.push({ x, y, life: 0.28, maxLife: 0.28 })

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
