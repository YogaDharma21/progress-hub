// Progress Hub Tactile Micro-Interactions

document.addEventListener('DOMContentLoaded', () => {
    // Floating navbar toggle. Registered before the reduced-motion guard so the menu still opens.
    const floatingNav = document.querySelector('[data-nav]');
    const navToggle = document.querySelector('[data-nav-toggle]');

    if (floatingNav && navToggle) {
        const setMenuOpen = (open) => {
            floatingNav.toggleAttribute('data-open', open);
            navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        };

        navToggle.addEventListener('click', () => {
            setMenuOpen(!floatingNav.hasAttribute('data-open'));
        });

        document.addEventListener('click', (e) => {
            if (!floatingNav.contains(e.target)) setMenuOpen(false);
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && floatingNav.hasAttribute('data-open')) {
                setMenuOpen(false);
                navToggle.focus();
            }
        });

        const desktopQuery = window.matchMedia('(min-width: 1024px)');
        desktopQuery.addEventListener('change', (e) => {
            if (e.matches) setMenuOpen(false);
        });
    }

    // Check if user prefers reduced motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    // Subtle tactile ripple burst on spring button clicks
    document.addEventListener('pointerdown', (e) => {
        const btn = e.target.closest('.btn-spring, button[type="submit"]');
        if (!btn) return;

        const rect = btn.getBoundingClientRect();
        const ripple = document.createElement('span');
        ripple.className = 'pointer-events-none absolute rounded-full bg-white/15 transform -translate-x-1/2 -translate-y-1/2';
        ripple.style.width = '24px';
        ripple.style.height = '24px';
        ripple.style.left = `${e.clientX - rect.left}px`;
        ripple.style.top = `${e.clientY - rect.top}px`;
        ripple.style.transition = 'transform 300ms cubic-bezier(0.34, 1.56, 0.64, 1), opacity 300ms ease';
        ripple.style.transform = 'translate(-50%, -50%) scale(0.2)';
        ripple.style.opacity = '1';

        const prevPos = window.getComputedStyle(btn).position;
        if (prevPos === 'static') {
            btn.style.position = 'relative';
        }
        btn.style.overflow = 'hidden';

        btn.appendChild(ripple);

        requestAnimationFrame(() => {
            ripple.style.transform = 'translate(-50%, -50%) scale(3.5)';
            ripple.style.opacity = '0';
        });

        setTimeout(() => {
            ripple.remove();
        }, 350);
    });

    // Celebratory micro-burst on success alerts
    const successAlert = document.querySelector('.animate-spring-pop');
    if (successAlert) {
        const rect = successAlert.getBoundingClientRect();
        setTimeout(() => {
            window.triggerCelebration?.(rect.left + 30, rect.top + rect.height / 2);
        }, 150);
    }

    // Micro-burst helper for key actions
    window.triggerCelebration = function(x = window.innerWidth / 2, y = window.innerHeight / 2) {
        if (prefersReducedMotion) return;
        const count = 14;
        for (let i = 0; i < count; i++) {
            const spark = document.createElement('div');
            spark.className = 'fixed pointer-events-none rounded-full bg-zinc-300 z-50';
            const size = Math.random() * 3 + 3;
            spark.style.width = `${size}px`;
            spark.style.height = `${size}px`;
            spark.style.left = `${x}px`;
            spark.style.top = `${y}px`;

            const angle = (i / count) * 360 + (Math.random() * 20 - 10);
            const distance = Math.random() * 50 + 30;
            const rad = (angle * Math.PI) / 180;
            const destX = Math.cos(rad) * distance;
            const destY = Math.sin(rad) * distance;

            spark.style.transition = 'all 400ms cubic-bezier(0.2, 0.8, 0.2, 1)';
            spark.style.opacity = '1';
            document.body.appendChild(spark);

            requestAnimationFrame(() => {
                spark.style.transform = `translate(${destX}px, ${destY}px) scale(0)`;
                spark.style.opacity = '0';
            });

            setTimeout(() => spark.remove(), 450);
        }
    };

    // Click sparks: a small burst of white stars, anchored by a quick ring at the pointer
    const sparkCanvas = document.createElement('canvas');
    sparkCanvas.setAttribute('aria-hidden', 'true');
    Object.assign(sparkCanvas.style, {
        position: 'fixed',
        inset: '0',
        width: '100%',
        height: '100%',
        pointerEvents: 'none',
        zIndex: '9999',
    });
    document.body.appendChild(sparkCanvas);

    const sparkCtx = sparkCanvas.getContext('2d');

    if (sparkCtx) {
        const SPARK_COLOR = '#ffffff';
        const SPARKS_PER_CLICK = 6;
        const MAX_SPARKS = 240;
        const GRAVITY = 900;
        const DRAG = 2.1;
        const TAU = Math.PI * 2;

        const sparks = [];
        const flashes = [];
        let sparkFrame = 0;
        let sparkLastTime = 0;
        let viewWidth = 0;
        let viewHeight = 0;

        const sizeSparkCanvas = () => {
            const rect = sparkCanvas.getBoundingClientRect();
            const width = Math.min(rect.width, window.innerWidth);
            const height = Math.min(rect.height, window.innerHeight);
            if (width === viewWidth && height === viewHeight) return;

            viewWidth = width;
            viewHeight = height;
            const dpr = Math.min(window.devicePixelRatio || 1, 2);
            sparkCanvas.width = Math.max(1, Math.round(viewWidth * dpr));
            sparkCanvas.height = Math.max(1, Math.round(viewHeight * dpr));
            sparkCtx.setTransform(dpr, 0, 0, dpr, 0, 0);
        };

        const drawSpark = (spark) => {
            const progress = spark.life / spark.maxLife;
            const radius = spark.size * (0.35 + 0.65 * progress);

            sparkCtx.save();
            sparkCtx.translate(spark.x, spark.y);
            sparkCtx.rotate(spark.rotation);
            sparkCtx.globalAlpha = Math.min(1, progress * 1.8);
            sparkCtx.fillStyle = SPARK_COLOR;
            sparkCtx.beginPath();
            for (let point = 0; point <= 4; point++) {
                const angle = (point / 4) * TAU - Math.PI / 2;
                const px = Math.cos(angle) * radius;
                const py = Math.sin(angle) * radius;
                if (point === 0) sparkCtx.moveTo(px, py);
                else sparkCtx.quadraticCurveTo(0, 0, px, py);
            }
            sparkCtx.closePath();
            sparkCtx.fill();
            sparkCtx.restore();
        };

        const drawFlash = (flash) => {
            const progress = flash.life / flash.maxLife;

            sparkCtx.save();
            sparkCtx.globalAlpha = progress * 0.5;
            sparkCtx.strokeStyle = SPARK_COLOR;
            sparkCtx.lineWidth = 1.5;
            sparkCtx.beginPath();
            sparkCtx.arc(flash.x, flash.y, 3 + (1 - progress) * 15, 0, TAU);
            sparkCtx.stroke();
            sparkCtx.restore();
        };

        const tickSparks = (now) => {
            const dt = Math.min((now - sparkLastTime) / 1000, 0.05);
            sparkLastTime = now;

            sparkCtx.clearRect(0, 0, viewWidth, viewHeight);

            for (let i = flashes.length - 1; i >= 0; i--) {
                const flash = flashes[i];
                flash.life -= dt;
                if (flash.life <= 0) {
                    flashes.splice(i, 1);
                    continue;
                }
                drawFlash(flash);
            }

            for (let i = sparks.length - 1; i >= 0; i--) {
                const spark = sparks[i];
                spark.life -= dt;
                if (spark.life <= 0) {
                    sparks.splice(i, 1);
                    continue;
                }

                const drag = Math.exp(-DRAG * dt);
                spark.vx *= drag;
                spark.vy = spark.vy * drag + GRAVITY * dt;
                spark.x += spark.vx * dt;
                spark.y += spark.vy * dt;
                spark.rotation += spark.spin * dt;
                drawSpark(spark);
            }

            if (sparks.length > 0 || flashes.length > 0) sparkFrame = requestAnimationFrame(tickSparks);
            else sparkFrame = 0;
        };

        const spawnSparks = (x, y) => {
            const count = Math.min(SPARKS_PER_CLICK, Math.max(MAX_SPARKS - sparks.length, 0));

            for (let i = 0; i < count; i++) {
                const angle = Math.random() * TAU;
                const speed = 45 + Math.random() * 135;
                const maxLife = 0.4 + Math.random() * 0.35;

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
                });
            }

            flashes.push({ x, y, life: 0.28, maxLife: 0.28 });

            if (!sparkFrame) {
                sparkLastTime = performance.now();
                sparkFrame = requestAnimationFrame(tickSparks);
            }
        };

        sizeSparkCanvas();
        new ResizeObserver(sizeSparkCanvas).observe(sparkCanvas);

        document.addEventListener('pointerdown', (e) => {
            if (e.pointerType === 'mouse' && e.button !== 0) return;
            const rect = sparkCanvas.getBoundingClientRect();
            spawnSparks(e.clientX - rect.left, e.clientY - rect.top);
        });
    }
});
