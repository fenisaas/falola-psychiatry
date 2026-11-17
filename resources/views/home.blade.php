@extends('layouts.app')

@section('title', 'Falola Psychiatry Practice | Mental Health Care')
@section('meta_description', 'Comprehensive and compassionate mental health care with a focus on empathy and respect, available in Alabama via telepsychiatry.')

@php

    $services = [
        [
            'name' => 'ADHD',
            'slug' => 'adhd',
            'image' => 'service-adhd.jpg',
            'alt' => 'A person completing a written checklist.',
        ],
        [
            'name' => 'Anxiety',
            'slug' => 'anxiety',
            'image' => 'service-anxiety.jpg',
            'alt' => 'Portrait of a thoughtful person.',
        ],
        [
            'name' => 'Depression',
            'slug' => 'depression',
            'image' => 'service-depression.jpg',
            'alt' => 'A person sitting thoughtfully on a couch.',
        ],
        [
            'name' => 'Bipolar Disorders',
            'slug' => 'bipolar-disorders',
            'image' => 'service-bipolar.jpg',
            'alt' => 'A conversation in a professional office.',
        ],
        [
            'name' => 'Trauma',
            'slug' => 'trauma',
            'image' => 'service-trauma.jpg',
            'alt' => 'Two people in a therapy conversation.',
        ],
        [
            'name' => 'OCD',
            'slug' => 'ocd',
            'image' => 'service-ocd.jpg',
            'alt' => 'A person completing a written form.',
        ],
        [
            'name' => 'Addiction',
            'slug' => 'addiction',
            'image' => 'service-addiction.jpg',
            'alt' => 'A quiet breakfast setting with coffee.',
        ],
        [
            'name' => 'Schizophrenia',
            'slug' => 'schizophrenia',
            'image' => 'service-schizophrenia.jpg',
            'alt' => 'A quiet home in a green landscape.',
        ],
        [
            'name' => 'Brief Psychotherapies',
            'slug' => 'brief-psychotherapies',
            'image' => 'service-brief-psychotherapies.jpg',
            'alt' => 'Two people talking in a therapy setting.',
        ],
        [
            'name' => 'Academic Coaching',
            'slug' => 'academic-coaching',
            'image' => 'service-academic-coaching.jpg',
            'alt' => 'A graduation cap and diploma.',
        ],
    ];

    $heroImages = [
        [
            'path' => 'images/home/hero-mountains.webp',
            'position' => 'object-[68%_center]',
        ],
        [
            'path' => 'images/home/service-anxiety.jpg',
            'position' => 'object-center',
        ],
        [
            'path' => 'images/home/service-trauma.jpg',
            'position' => 'object-center',
        ],
    ];

    $insurers = [
        'Medicare',
        'United Health care',
        'Blue Cross Blue Shield',
        'Aetna',
        'Curative',
        'Cigna',
        'ChampVa',
        'Viva',
    ];
@endphp

@section('content')
    <section class="border-b border-brand-sand/70 bg-brand-beige">
        <div class="mx-auto grid max-w-7xl gap-8 px-5 py-10 sm:px-8 lg:grid-cols-[0.7fr_1.7fr] lg:items-center lg:px-10">
            <div class="lg:border-r lg:border-brand-green/30 lg:pr-10">
                <h2 class="font-serif text-4xl font-normal leading-none tracking-[-0.025em] text-brand-green">
                    Accepted Insurance
                </h2>
                <p class="mt-4 max-w-sm text-base leading-7 text-slate-700">
                    The existing practice website identifies these eight insurance providers.
                </p>
            </div>

            <div>
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                    @foreach ($insurers as $insurer)
                        <x-site.insurance-logo :name="$insurer" />
                    @endforeach
                </div>
                <p class="mt-4 text-xs leading-5 text-slate-600">
                    Insurance participation varies by plan and must be confirmed directly with the practice and your insurer before scheduling.
                </p>
            </div>
        </div>
    </section>

    <section
        class="relative isolate overflow-hidden bg-brand-ivory"
        x-data="heroCarousel({ count: {{ count($heroImages) }}, intervalMs: 5500 })"
        @mouseenter="pause()"
        @mouseleave="resume()"
        @focusin="pause()"
        @focusout="if (!$el.contains($event.relatedTarget)) { resume() }"
        aria-label="Homepage introduction"
    >
        @foreach ($heroImages as $heroImage)
            <img
                x-show="active === {{ $loop->index }}"
                x-transition:enter="motion-safe:transition-opacity motion-safe:duration-700 motion-safe:ease-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                @if (! $loop->first) x-cloak @endif
                class="absolute inset-0 -z-20 size-full object-cover {{ $heroImage['position'] }}"
                src="{{ asset($heroImage['path']) }}"
                alt=""
                width="2172"
                height="724"
                @if ($loop->first)
                    fetchpriority="high"
                @else
                    loading="lazy"
                @endif
                data-hero-slide
            >
        @endforeach
        <div class="absolute inset-0 -z-10 bg-[linear-gradient(90deg,rgba(251,248,242,1)_0%,rgba(251,248,242,0.96)_32%,rgba(251,248,242,0.68)_48%,rgba(251,248,242,0.08)_72%)] max-md:bg-[linear-gradient(90deg,rgba(251,248,242,0.98)_0%,rgba(251,248,242,0.9)_58%,rgba(251,248,242,0.42)_100%)]"></div>

        <div class="mx-auto flex min-h-[32rem] max-w-7xl items-center px-5 py-16 sm:px-8 lg:min-h-[28rem] lg:px-10 lg:py-14">
            <div class="max-w-xl">
                <h1 class="text-balance font-serif text-5xl font-normal leading-[0.95] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[3.75rem] xl:text-[4rem]">
                    Personalized, Evidence-Based Psychiatric Care
                </h1>
                <p class="mt-4 max-w-lg text-base leading-6 text-slate-800 sm:text-lg sm:leading-7">
                    Compassionate psychiatric evaluations and medication management for adults, with convenient telepsychiatry throughout Alabama and in-person appointments in Trussville.
                </p>
                <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                    <x-site.button-link :href="route('appointments')" icon="calendar">
                        Book an Appointment
                    </x-site.button-link>
                    <x-site.button-link :href="route('services.index')" variant="outline" arrow>
                        Explore Our Services
                    </x-site.button-link>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[0.95fr_1.45fr] lg:gap-14 lg:px-10 lg:py-10">
            <div class="overflow-hidden rounded-2xl bg-slate-100 shadow-[0_14px_36px_rgba(31,50,42,0.12)]">
                <img
                    class="aspect-[3/2] w-full object-cover object-top"
                    src="{{ asset('images/home/dr-falola.jpg') }}"
                    alt="Dr. Michael Falola wearing a white physician coat."
                    width="900"
                    height="650"
                    loading="lazy"
                >
            </div>

            <div>
                <h2 class="text-pretty font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green lg:text-[2.75rem]">
                    Dr. Michael Falola, M.D., M.P.H.
                </h2>
                <p class="mt-4 max-w-2xl text-[1.0625rem] leading-7 text-slate-700 lg:text-lg">
                    Dr. Falola is a psychiatrist and academic professional with extensive clinical, educational, and research experience. His work has included clinical care, academic psychiatry, and research.
                </p>
                <div class="mt-7">
                    <x-site.button-link :href="route('about')" arrow>
                        Learn More About Dr. Falola
                    </x-site.button-link>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-brand-ivory">
        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-14">
            <div class="mx-auto max-w-3xl text-center">
                <h2 class="font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green lg:text-[2.75rem]">
                    Comprehensive Psychiatric Services
                </h2>
                <p class="mt-3 text-[1.0625rem] leading-7 text-slate-700 sm:text-lg">
                    Explore the areas of care offered by Falola Psychiatry Practice.
                </p>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 lg:gap-6">
                @foreach ($services as $service)
                    <x-site.service-card
                        @class(['lg:col-start-2' => $loop->last])
                        :name="$service['name']"
                        :slug="$service['slug']"
                        :image="$service['image']"
                        :alt="$service['alt']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white px-5 py-16 sm:px-8 lg:px-10 lg:py-14">
        <div class="mx-auto grid max-w-7xl overflow-hidden rounded-3xl bg-brand-green shadow-[0_18px_45px_rgba(0,61,45,0.18)] lg:grid-cols-[1fr_1.2fr]">
            <div class="aspect-video lg:aspect-auto lg:min-h-[19rem]">
                <img
                    class="size-full object-cover"
                    src="{{ asset('images/home/telepsychiatry.jpg') }}"
                    alt="A woman participating in a video consultation from home."
                    width="1200"
                    height="720"
                    loading="lazy"
                >
            </div>

            <div class="relative flex items-center overflow-hidden px-7 py-10 text-white sm:px-10 lg:px-14 lg:py-12">
                <div class="relative">
                    <h2 class="max-w-xl font-serif text-4xl font-normal leading-tight tracking-[-0.02em] lg:text-[2.75rem]">
                        Convenient Virtual Care
                    </h2>
                    <p class="mt-4 max-w-xl text-base leading-7 text-white/85 sm:text-lg">
                        Interactive video and audio care from the comfort of home for patients who are physically located in Alabama during their appointment.
                    </p>
                    <div class="mt-7">
                        <x-site.button-link :href="route('telepsychiatry')" variant="light" arrow>
                            Learn More About Telepsychiatry
                        </x-site.button-link>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative isolate overflow-hidden bg-white" aria-labelledby="testimonials-heading">
        <div class="absolute inset-x-0 top-0 -z-10 h-48 bg-gradient-to-b from-brand-beige/55 to-transparent"></div>

        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-20">
            <div class="mx-auto max-w-3xl text-center">
                <h2 id="testimonials-heading" class="font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green lg:text-[2.75rem]">
                    Testimonials
                </h2>
            </div>

            <div
                class="mx-auto mt-9 max-w-6xl focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-brand-green"
                x-data="{
                    active: 0,
                    count: {{ count($testimonials) }},
                    intervalId: null,
                    autoplayPaused: false,
                    interactionPaused: false,
                    prefersReducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
                    init() {
                        if (this.prefersReducedMotion) {
                            this.autoplayPaused = true;
                        } else {
                            this.startAutoplay();
                        }
                    },
                    startAutoplay() {
                        this.stopAutoplay();

                        if (this.autoplayPaused || this.interactionPaused || this.count < 2) {
                            return;
                        }

                        this.intervalId = window.setInterval(() => {
                            this.active = (this.active + 1) % this.count;
                        }, 5500);
                    },
                    stopAutoplay() {
                        if (this.intervalId !== null) {
                            window.clearInterval(this.intervalId);
                            this.intervalId = null;
                        }
                    },
                    restartAutoplay() {
                        if (!this.autoplayPaused && !this.interactionPaused) {
                            this.startAutoplay();
                        }
                    },
                    goTo(index) {
                        this.active = index;
                        this.restartAutoplay();
                    },
                    next() {
                        this.active = (this.active + 1) % this.count;
                        this.restartAutoplay();
                    },
                    previous() {
                        this.active = (this.active - 1 + this.count) % this.count;
                        this.restartAutoplay();
                    },
                    pauseForInteraction() {
                        this.interactionPaused = true;
                        this.stopAutoplay();
                    },
                    resumeAfterInteraction() {
                        this.interactionPaused = false;
                        this.restartAutoplay();
                    },
                    toggleAutoplay() {
                        this.autoplayPaused = !this.autoplayPaused;

                        if (this.autoplayPaused) {
                            this.stopAutoplay();
                        } else {
                            this.startAutoplay();
                        }
                    },
                    destroy() {
                        this.stopAutoplay();
                    },
                }"
                @mouseenter="pauseForInteraction()"
                @mouseleave="resumeAfterInteraction()"
                @focusin="pauseForInteraction()"
                @focusout="if (!$el.contains($event.relatedTarget)) { resumeAfterInteraction() }"
                @keydown.left.prevent.stop="previous()"
                @keydown.right.prevent.stop="next()"
                @keydown.home.prevent.stop="goTo(0)"
                @keydown.end.prevent.stop="goTo(count - 1)"
                role="region"
                aria-roledescription="carousel"
                aria-label="Patient testimonials"
                tabindex="0"
            >
                <div class="grid grid-cols-2 items-center gap-4 md:grid-cols-[3.5rem_minmax(0,1fr)_3.5rem] md:gap-5 lg:gap-7">
                    <button
                        type="button"
                        class="order-2 inline-flex size-12 justify-self-end rounded-full border border-brand-green/25 bg-white text-brand-green shadow-[0_5px_15px_rgba(0,61,45,0.12)] motion-safe:transition motion-safe:duration-200 hover:border-brand-green hover:bg-brand-green hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green md:order-1 md:col-start-1 md:row-start-1 md:justify-self-center"
                        @click="previous()"
                        aria-label="Show previous testimonial"
                        aria-controls="testimonial-slides"
                        data-testimonial-previous
                    >
                        <svg class="m-auto size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.5 17-5-5 5-5" />
                        </svg>
                    </button>

                    <div
                        id="testimonial-slides"
                        class="relative order-1 col-span-2 grid overflow-hidden rounded-[2rem] border border-brand-sand bg-white/75 px-6 py-9 shadow-[0_22px_60px_rgba(0,61,45,0.1)] sm:px-10 sm:py-11 md:order-2 md:col-span-1 md:col-start-2 md:row-start-1 lg:px-16 lg:py-12"
                        :aria-live="autoplayPaused || interactionPaused ? 'polite' : 'off'"
                        aria-atomic="true"
                    >
                        <svg class="absolute -left-2 -top-5 size-32 text-brand-green/8 sm:left-4 sm:size-36" viewBox="0 0 64 64" fill="currentColor" aria-hidden="true">
                            <path d="M13.8 35.1c0-11.7 6.2-21.1 18.5-28.2l3.2 5.2C27.8 17.4 24 23.2 23.8 29.6h10.6v23H13.8V35.1Zm27.3 0c0-11.7 6.2-21.1 18.5-28.2l3.2 5.2c-7.7 5.3-11.5 11.1-11.7 17.5h10.6v23H41.1V35.1Z" />
                        </svg>

                        @foreach ($testimonials as $testimonial)
                            <article
                                x-show="active === {{ $loop->index }}"
                                x-transition:enter="motion-safe:transition-opacity motion-safe:duration-500 motion-safe:ease-out"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                @if (! $loop->first) x-cloak @endif
                                class="relative col-start-1 row-start-1"
                                role="group"
                                aria-roledescription="slide"
                                aria-label="{{ $loop->iteration }} of {{ $loop->count }}"
                                data-testimonial-slide
                            >
                                <blockquote class="mx-auto max-w-4xl">
                                    <p class="text-pretty text-[1.0625rem] leading-8 text-slate-800 sm:text-xl sm:leading-9 lg:text-[1.375rem]">
                                        {{ $testimonial['quote'] }}
                                    </p>
                                    <footer class="mt-7 flex flex-wrap items-baseline gap-x-3 gap-y-1 border-t border-brand-sand/80 pt-5">
                                        <cite class="not-italic font-semibold text-brand-green">{{ $testimonial['name'] }}</cite>
                                        <span class="text-sm text-slate-600">{{ $testimonial['date'] }}</span>
                                    </footer>
                                </blockquote>
                            </article>
                        @endforeach
                    </div>

                    <button
                        type="button"
                        class="order-3 inline-flex size-12 justify-self-start rounded-full border border-brand-green bg-brand-green text-white shadow-[0_5px_15px_rgba(0,61,45,0.2)] motion-safe:transition motion-safe:duration-200 hover:border-brand-green-dark hover:bg-brand-green-dark focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green md:col-start-3 md:row-start-1 md:justify-self-center"
                        @click="next()"
                        aria-label="Show next testimonial"
                        aria-controls="testimonial-slides"
                        data-testimonial-next
                    >
                        <svg class="m-auto size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.5 7 5 5-5 5" />
                        </svg>
                    </button>
                </div>

                <div class="mt-6 flex flex-col items-center gap-4">
                    <div class="flex flex-wrap items-center justify-center gap-1" aria-label="Choose a testimonial">
                        @foreach ($testimonials as $testimonial)
                            <button
                                type="button"
                                class="group inline-flex size-6 items-center justify-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-1 focus-visible:outline-brand-green"
                                @click="goTo({{ $loop->index }})"
                                :aria-current="active === {{ $loop->index }} ? 'true' : 'false'"
                                aria-label="Show testimonial {{ $loop->iteration }} of {{ $loop->count }} from {{ $testimonial['name'] }}"
                                aria-controls="testimonial-slides"
                                data-testimonial-indicator
                            >
                                <span
                                    class="size-2 rounded-full motion-safe:transition-all motion-safe:duration-300"
                                    :class="active === {{ $loop->index }} ? 'bg-brand-green ring-2 ring-brand-green/20 ring-offset-2' : 'bg-brand-green/30 group-hover:bg-brand-green/55'"
                                    aria-hidden="true"
                                ></span>
                            </button>
                        @endforeach
                    </div>

                    <button
                        type="button"
                        class="inline-flex size-10 items-center justify-center rounded-full text-slate-700 motion-safe:transition hover:bg-brand-beige hover:text-brand-green focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green"
                        @click="toggleAutoplay()"
                        :aria-label="autoplayPaused ? 'Play automatic testimonial rotation' : 'Pause automatic testimonial rotation'"
                        aria-controls="testimonial-slides"
                        data-testimonial-autoplay
                    >
                        <span class="inline-flex size-6 items-center justify-center rounded-full border border-brand-green text-brand-green" aria-hidden="true">
                            <svg x-show="!autoplayPaused" class="size-3" viewBox="0 0 16 16" fill="currentColor">
                                <path d="M4 3.5h2.25v9H4v-9Zm5.75 0H12v9H9.75v-9Z" />
                            </svg>
                            <svg x-show="autoplayPaused" x-cloak class="ml-0.5 size-3" viewBox="0 0 16 16" fill="currentColor">
                                <path d="M4.5 2.8v10.4L13 8 4.5 2.8Z" />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-brand-sand/70 bg-brand-beige" data-home-office-location>
        <div class="mx-auto grid max-w-7xl items-center gap-8 px-5 py-14 sm:px-8 lg:grid-cols-[0.8fr_1.2fr] lg:px-10 lg:py-16">
            <div>
                <h2 class="font-serif text-4xl font-normal leading-tight tracking-[-0.025em] text-brand-green lg:text-[2.75rem]">
                    Visit Our Trussville Office
                </h2>
                <address class="mt-5 text-lg font-semibold not-italic leading-7 text-slate-800">
                    {{ config('practice.address.line_1') }}<br>
                    {{ config('practice.address.city_state_zip') }}
                </address>
                <div class="mt-7">
                    <x-site.button-link :href="config('practice.address.directions_url')" variant="outline" arrow external>
                        Get Directions on Google Maps
                    </x-site.button-link>
                </div>
            </div>

            <div class="aspect-[16/10] overflow-hidden rounded-3xl border border-brand-sand bg-white shadow-[0_14px_36px_rgba(31,50,42,0.1)]">
                <iframe
                    class="size-full"
                    src="{{ config('practice.address.map_embed_url') }}"
                    title="Google Map showing Falola Psychiatry Practice"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </section>

    <section class="relative isolate overflow-hidden">
        <img
            class="absolute inset-0 -z-20 size-full object-cover object-center"
            src="{{ asset('images/home/appointment-office.webp') }}"
            alt=""
            width="2172"
            height="724"
            loading="lazy"
        >
        <div class="absolute inset-0 -z-10 bg-brand-ivory/70 backdrop-blur-[1px]"></div>

        <div class="mx-auto flex max-w-7xl items-center justify-center px-5 py-16 text-center sm:px-8 lg:px-10">
            <div class="max-w-2xl">
                <h2 class="font-serif text-5xl font-normal tracking-[-0.03em] text-brand-green">
                    Take the Next Step
                </h2>
                <p class="mx-auto mt-4 max-w-xl text-base leading-7 text-slate-800 sm:text-lg">
                    Schedule an appointment or contact our office to learn more.
                </p>
                <div class="mt-7 flex flex-col justify-center gap-3 sm:flex-row">
                    <x-site.button-link :href="route('appointments')" icon="calendar">
                        Book an Appointment
                    </x-site.button-link>
                    <x-site.button-link :href="route('contact')" variant="outline" icon="phone">
                        Contact Our Office
                    </x-site.button-link>
                </div>
            </div>
        </div>
    </section>
@endsection
