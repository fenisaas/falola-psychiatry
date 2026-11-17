import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('tebraScheduler', ({ schedulerUrl, timeoutMs }) => ({
    schedulerDelayed: false,
    schedulerLoading: true,
    timeoutId: null,

    init() {
        this.timeoutId = window.setTimeout(() => {
            this.schedulerDelayed = true;
            this.schedulerLoading = false;
        }, timeoutMs);
    },

    markSchedulerLoaded() {
        window.clearTimeout(this.timeoutId);
        this.schedulerDelayed = false;
        this.schedulerLoading = false;
    },

    destroy() {
        window.clearTimeout(this.timeoutId);
    },

    schedulerUrl,
}));

Alpine.data('heroCarousel', ({ count, intervalMs }) => ({
    active: 0,
    intervalId: null,
    interactionPaused: false,
    prefersReducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches,

    init() {
        if (!this.prefersReducedMotion) {
            this.start();
        }
    },

    start() {
        this.stop();

        if (this.interactionPaused || this.prefersReducedMotion || count < 2) {
            return;
        }

        this.intervalId = window.setInterval(() => {
            this.active = (this.active + 1) % count;
        }, intervalMs);
    },

    stop() {
        if (this.intervalId !== null) {
            window.clearInterval(this.intervalId);
            this.intervalId = null;
        }
    },

    pause() {
        this.interactionPaused = true;
        this.stop();
    },

    resume() {
        this.interactionPaused = false;
        this.start();
    },

    destroy() {
        this.stop();
    },
}));

Alpine.start();
