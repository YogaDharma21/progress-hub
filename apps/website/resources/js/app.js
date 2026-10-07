// Progress Hub Tactile Micro-Interactions

document.addEventListener('DOMContentLoaded', () => {
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
});
