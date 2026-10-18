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

    // Click ripple: white rings that expand from the pointer
    const rippleCanvas = document.createElement('canvas');
    rippleCanvas.setAttribute('aria-hidden', 'true');
    Object.assign(rippleCanvas.style, {
        position: 'fixed',
        inset: '0',
        width: '100%',
        height: '100%',
        pointerEvents: 'none',
        zIndex: '9999',
    });
    document.body.appendChild(rippleCanvas);

    const rippleCtx = rippleCanvas.getContext('2d');

    if (rippleCtx) {
        const RIPPLE_COLOR = '#ffffff';
        const RINGS_PER_CLICK = 3;
        const RING_STAGGER = 0.15;
        const RING_LIFE = 0.62;
        const RING_START_RADIUS = 6;
        const RING_END_RADIUS = 48;
        const RING_WIDTH = 2;
        const RING_ALPHA = 0.4;
        const MAX_RINGS = 90;
        const TAU = Math.PI * 2;

        const rings = [];
        let rippleFrame = 0;
        let rippleLastTime = 0;
        let viewWidth = 0;
        let viewHeight = 0;

        const sizeRippleCanvas = () => {
            const rect = rippleCanvas.getBoundingClientRect();
            const width = Math.min(rect.width, window.innerWidth);
            const height = Math.min(rect.height, window.innerHeight);
            if (width === viewWidth && height === viewHeight) return;

            viewWidth = width;
            viewHeight = height;
            const dpr = Math.min(window.devicePixelRatio || 1, 2);
            rippleCanvas.width = Math.max(1, Math.round(viewWidth * dpr));
            rippleCanvas.height = Math.max(1, Math.round(viewHeight * dpr));
            rippleCtx.setTransform(dpr, 0, 0, dpr, 0, 0);
        };

        const drawRing = (ring) => {
            const progress = Math.max(0, Math.min(1, (ring.age - ring.delay) / ring.life));
            const radius = RING_START_RADIUS + (RING_END_RADIUS - RING_START_RADIUS) * progress;

            rippleCtx.save();
            rippleCtx.globalAlpha = RING_ALPHA * (1 - progress * progress);
            rippleCtx.strokeStyle = RIPPLE_COLOR;
            rippleCtx.lineWidth = RING_WIDTH;
            rippleCtx.beginPath();
            rippleCtx.arc(ring.x, ring.y, radius, 0, TAU);
            rippleCtx.stroke();
            rippleCtx.restore();
        };

        const tickRipples = (now) => {
            const dt = Math.min((now - rippleLastTime) / 1000, 0.05);
            rippleLastTime = now;

            rippleCtx.clearRect(0, 0, viewWidth, viewHeight);

            for (let i = rings.length - 1; i >= 0; i--) {
                const ring = rings[i];
                ring.age += dt;
                if (ring.age >= ring.delay + ring.life) {
                    rings.splice(i, 1);
                    continue;
                }
                drawRing(ring);
            }

            if (rings.length > 0) rippleFrame = requestAnimationFrame(tickRipples);
            else rippleFrame = 0;
        };

        const spawnRipples = (x, y) => {
            for (let i = 0; i < RINGS_PER_CLICK; i++) {
                if (rings.length >= MAX_RINGS) break;
                rings.push({ x, y, age: 0, delay: i * RING_STAGGER, life: RING_LIFE });
            }

            if (!rippleFrame) {
                rippleLastTime = performance.now();
                rippleFrame = requestAnimationFrame(tickRipples);
            }
        };

        sizeRippleCanvas();
        new ResizeObserver(sizeRippleCanvas).observe(rippleCanvas);

        document.addEventListener('pointerdown', (e) => {
            if (e.pointerType === 'mouse' && e.button !== 0) return;
            const rect = rippleCanvas.getBoundingClientRect();
            spawnRipples(e.clientX - rect.left, e.clientY - rect.top);
        });
    }
});
