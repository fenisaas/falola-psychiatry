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

Alpine.start();
