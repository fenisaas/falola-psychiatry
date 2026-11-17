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

Alpine.data('testimonialCarousel', ({ count }) => ({
    active: 0,
    count,

    goTo(index) {
        if (index >= 0 && index < this.count) {
            this.active = index;
        }
    },

    handleKeydown(event) {
        if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(event.key)) {
            return;
        }

        event.preventDefault();
        event.stopPropagation();

        if (event.key === 'ArrowLeft') {
            this.previous();
        } else if (event.key === 'ArrowRight') {
            this.next();
        } else if (event.key === 'Home') {
            this.goTo(0);
        } else {
            this.goTo(this.count - 1);
        }
    },

    next() {
        this.active = (this.active + 1) % this.count;
    },

    previous() {
        this.active = (this.active - 1 + this.count) % this.count;
    },
}));

Alpine.start();
