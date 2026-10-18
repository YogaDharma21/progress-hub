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

    // Click sparks: four-pointed stars burst from the pointer and fall with gravity
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
        const SPARK_COLORS = ['#fff8dc', '#ffd166', '#ffb703', '#ffffff'];
        const SPARKS_PER_CLICK = 12;
        const MAX_SPARKS = 320;
        const GRAVITY = 900;
        const DRAG = 2.1;

        const sparks = [];
        let sparkFrame = 0;
        let sparkLastTime = 0;

        const sizeSparkCanvas = () => {
            const dpr = Math.min(window.devicePixelRatio || 1, 2);
            sparkCanvas.width = Math.floor(window.innerWidth * dpr);
            sparkCanvas.height = Math.floor(window.innerHeight * dpr);
            sparkCtx.setTransform(dpr, 0, 0, dpr, 0, 0);
        };

        const drawSpark = (spark) => {
            const progress = spark.life / spark.maxLife;
            const radius = spark.size * (0.35 + 0.65 * progress);

            sparkCtx.save();
            sparkCtx.translate(spark.x, spark.y);
            sparkCtx.rotate(spark.rotation);
            sparkCtx.globalAlpha = Math.min(1, progress * 1.8);
            sparkCtx.fillStyle = spark.color;
            sparkCtx.beginPath();
            for (let point = 0; point <= 4; point++) {
                const angle = (point / 4) * Math.PI * 2 - Math.PI / 2;
                const px = Math.cos(angle) * radius;
                const py = Math.sin(angle) * radius;
                if (point === 0) sparkCtx.moveTo(px, py);
                else sparkCtx.quadraticCurveTo(0, 0, px, py);
            }
            sparkCtx.closePath();
            sparkCtx.fill();
            sparkCtx.restore();
        };

        const tickSparks = (now) => {
            const dt = Math.min((now - sparkLastTime) / 1000, 0.05);
            sparkLastTime = now;

            sparkCtx.clearRect(0, 0, window.innerWidth, window.innerHeight);

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

            if (sparks.length > 0) sparkFrame = requestAnimationFrame(tickSparks);
            else sparkFrame = 0;
        };

        const spawnSparks = (x, y) => {
            const count = Math.min(SPARKS_PER_CLICK, Math.max(MAX_SPARKS - sparks.length, 0));

            for (let i = 0; i < count; i++) {
                const angle = Math.random() * Math.PI * 2;
                const speed = 90 + Math.random() * 330;
                const maxLife = 0.5 + Math.random() * 0.5;

                sparks.push({
                    x,
                    y,
                    vx: Math.cos(angle) * speed,
                    vy: Math.sin(angle) * speed - 60,
                    size: 3.5 + Math.random() * 5.5,
                    spin: (Math.random() - 0.5) * 12,
                    rotation: Math.random() * Math.PI * 2,
                    life: maxLife,
                    maxLife,
                    color: SPARK_COLORS[Math.floor(Math.random() * SPARK_COLORS.length)],
                });
            }

            if (!sparkFrame) {
                sparkLastTime = performance.now();
                sparkFrame = requestAnimationFrame(tickSparks);
            }
        };

        sizeSparkCanvas();
        window.addEventListener('resize', sizeSparkCanvas);

        document.addEventListener('pointerdown', (e) => {
            if (e.pointerType === 'mouse' && e.button !== 0) return;
            spawnSparks(e.clientX, e.clientY);
        });
    }
});
