"use client"

import { useEffect, useRef } from "react"

const SPARK_COLORS = ["#fff8dc", "#ffd166", "#ffb703", "#ffffff"]
const SPARKS_PER_CLICK = 12
const MAX_SPARKS = 320
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
  color: string
}

function drawSpark(ctx: CanvasRenderingContext2D, spark: Spark) {
  const progress = spark.life / spark.maxLife
  const radius = spark.size * (0.35 + 0.65 * progress)

  ctx.save()
  ctx.translate(spark.x, spark.y)
  ctx.rotate(spark.rotation)
  ctx.globalAlpha = Math.min(1, progress * 1.8)
  ctx.fillStyle = spark.color
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

export function ClickSpark() {
  const canvasRef = useRef<HTMLCanvasElement | null>(null)

  useEffect(() => {
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return

    const canvas = canvasRef.current
    if (!canvas) return
    const ctx = canvas.getContext("2d")
    if (!ctx) return

    const sparks: Spark[] = []
    let frame = 0
    let lastTime = 0

    const resize = () => {
      const dpr = Math.min(window.devicePixelRatio || 1, 2)
      canvas.width = Math.floor(window.innerWidth * dpr)
      canvas.height = Math.floor(window.innerHeight * dpr)
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0)
    }

    const tick = (now: number) => {
      const dt = Math.min((now - lastTime) / 1000, 0.05)
      lastTime = now

      ctx.clearRect(0, 0, window.innerWidth, window.innerHeight)

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

      if (sparks.length > 0) {
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
        const speed = 90 + Math.random() * 330
        const maxLife = 0.5 + Math.random() * 0.5

        sparks.push({
          x,
          y,
          vx: Math.cos(angle) * speed,
          vy: Math.sin(angle) * speed - 60,
          size: 3.5 + Math.random() * 5.5,
          spin: (Math.random() - 0.5) * 12,
          rotation: Math.random() * TAU,
          life: maxLife,
          maxLife,
          color: SPARK_COLORS[Math.floor(Math.random() * SPARK_COLORS.length)],
        })
      }

      if (frame === 0) {
        lastTime = performance.now()
        frame = requestAnimationFrame(tick)
      }
    }

    const onPointerDown = (event: PointerEvent) => {
      if (event.pointerType === "mouse" && event.button !== 0) return
      spawn(event.clientX, event.clientY)
    }

    resize()
    window.addEventListener("resize", resize)
    window.addEventListener("pointerdown", onPointerDown)

    return () => {
      window.removeEventListener("resize", resize)
      window.removeEventListener("pointerdown", onPointerDown)
      if (frame !== 0) cancelAnimationFrame(frame)
    }
  }, [])

  return (
    <canvas
      ref={canvasRef}
      aria-hidden="true"
      className="pointer-events-none fixed inset-0 z-[9999]"
    />
  )
}
