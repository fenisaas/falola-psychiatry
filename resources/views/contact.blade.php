@extends('layouts.app')

@section('title', 'Contact Us | Falola Psychiatry Practice')
@section('meta_description', 'Contact Falola Psychiatry Practice by phone or email, find the Trussville office, or book an appointment online.')
@section('canonical', route('contact'))

@php
    $directionsUrl = config('practice.address.directions_url');
@endphp

@section('content')
    <section class="overflow-hidden bg-brand-ivory">
        <div class="mx-auto grid max-w-[90rem] lg:min-h-[26rem] lg:grid-cols-[0.9fr_1.1fr]">
            <div class="flex items-center px-5 py-14 sm:px-8 lg:px-14 lg:py-12 xl:px-20">
                <div class="max-w-xl">
                    <h1 class="text-balance font-serif text-5xl font-normal leading-[0.98] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[4rem]">
                        Get in Touch
                    </h1>
                    <p class="mt-5 max-w-lg text-base leading-7 text-slate-800 sm:text-[1.0625rem]">
                        Contact the office for appointment questions or other general, non-urgent inquiries.
                    </p>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <x-site.button-link :href="route('appointments')" icon="calendar">
                            Book an Appointment
                        </x-site.button-link>
                        <x-site.button-link href="tel:+16593466314" variant="outline" icon="phone">
                            (659) 346-6314
                        </x-site.button-link>
                    </div>
                </div>
            </div>

            <div class="h-80 overflow-hidden sm:h-[26rem] lg:h-auto">
                <img
                    class="size-full object-cover object-[50%_45%]"
                    src="{{ asset('images/contact/hero.webp') }}"
                    alt="A smiling professional seated at a desk in a welcoming office."
                    width="2200"
                    height="1467"
                    fetchpriority="high"
                >
            </div>
        </div>
    </section>

    <section class="bg-white px-5 py-14 sm:px-8 lg:px-10 lg:py-16" aria-label="Practice contact information">
        <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-3 md:gap-0">
            <article class="grid grid-cols-[3.5rem_1fr] gap-5 md:px-7 lg:px-10">
                <span class="grid size-14 place-items-center rounded-xl bg-[#edf4ea] text-brand-green" aria-hidden="true">
                    <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25A2.25 2.25 0 0 0 21.75 19.5v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                </span>
                <div>
                    <h2 class="font-serif text-2xl font-normal text-brand-green">Call Us</h2>
                    <a class="mt-1 inline-block text-lg font-semibold text-brand-green underline-offset-4 hover:underline focus-visible:rounded-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green" href="tel:+16593466314">(659) 346-6314</a>
                    <p class="mt-2 text-base leading-7 text-slate-700">Call the office with general questions.</p>
                </div>
            </article>

            <article class="grid grid-cols-[3.5rem_1fr] gap-5 border-brand-sand md:border-x md:px-7 lg:px-10">
                <span class="grid size-14 place-items-center rounded-xl bg-[#edf4ea] text-brand-green" aria-hidden="true">
                    <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 6.75 8.25 6 8.25-6M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v10.5a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V6.75a1.5 1.5 0 0 1 1.5-1.5Z" /></svg>
                </span>
                <div class="min-w-0">
                    <h2 class="font-serif text-2xl font-normal text-brand-green">Email Us</h2>
                    <a class="mt-1 inline-block break-all text-base font-semibold text-brand-green underline-offset-4 hover:underline focus-visible:rounded-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green lg:text-lg" href="mailto:contact@falolapsychiatry.com">contact@falolapsychiatry.com</a>
                    <p class="mt-2 text-base leading-7 text-slate-700">Use email only for general, non-urgent inquiries.</p>
                </div>
            </article>

            <article class="grid grid-cols-[3.5rem_1fr] gap-5 md:px-7 lg:px-10">
                <span class="grid size-14 place-items-center rounded-xl bg-[#edf4ea] text-brand-green" aria-hidden="true">
                    <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21s6-5.25 6-11.25a6 6 0 1 0-12 0C6 15.75 12 21 12 21Z" /><circle cx="12" cy="9.75" r="2.25" /></svg>
                </span>
                <div>
                    <h2 class="font-serif text-2xl font-normal text-brand-green">Visit Our Office</h2>
                    <address class="mt-1 text-lg font-semibold not-italic leading-6 text-brand-green">
                        {{ config('practice.address.line_1') }},<br>{{ config('practice.address.city_state_zip') }}
                    </address>
                    <p class="mt-2 text-base leading-7 text-slate-700">In-person appointments are scheduled in advance.</p>
                </div>
            </article>
        </div>
    </section>

    <section class="bg-white px-5 pb-14 sm:px-8 lg:px-10 lg:pb-20">
        <div class="mx-auto grid max-w-7xl items-start gap-7 lg:grid-cols-[1.05fr_0.95fr]">
            <section class="rounded-3xl border border-brand-sand/70 bg-brand-ivory px-7 py-10 shadow-[0_12px_34px_rgba(31,50,42,0.07)] sm:px-10 lg:min-h-[38rem] lg:px-12 lg:py-12" aria-labelledby="contact-office-heading">
                <h2 id="contact-office-heading" class="text-balance font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green sm:text-5xl">Contact Our Office</h2>
                <p class="mt-4 max-w-2xl text-base leading-7 text-slate-700 sm:text-[1.0625rem]">
                    A public website contact form is not active because a secure delivery and retention workflow has not been approved. Please call the office or use email for general, non-urgent questions.
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <x-site.button-link href="tel:+16593466314" icon="phone">
                        Call (659) 346-6314
                    </x-site.button-link>
                    <x-site.button-link href="mailto:contact@falolapsychiatry.com" variant="outline">
                        Email the Office
                    </x-site.button-link>
                </div>

                <div class="mt-10 rounded-2xl border border-brand-green/15 bg-white/80 p-6 sm:p-7">
                    <div class="flex gap-4">
                        <span class="grid size-11 shrink-0 place-items-center rounded-full border-2 border-brand-green text-lg font-bold text-brand-green" aria-hidden="true">i</span>
                        <div>
                            <h3 class="font-serif text-2xl font-normal text-brand-green">Keep Your Message General</h3>
                            <p class="mt-2 text-base leading-7 text-slate-700">
                                Do not include medical histories, diagnoses, symptoms, medication details, or other sensitive health information in email. This website and ordinary email are not patient portal or emergency channels.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="grid gap-7">
                <section class="rounded-3xl border border-brand-sand/70 bg-brand-ivory px-7 py-9 shadow-[0_12px_34px_rgba(31,50,42,0.07)] sm:px-10" aria-labelledby="location-heading">
                    <h2 id="location-heading" class="font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green">Our Location</h2>
                    <address class="mt-3 flex items-start gap-3 text-base not-italic leading-7 text-slate-800">
                        <svg class="mt-0.5 size-5 shrink-0 text-brand-green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21s6-5.25 6-11.25a6 6 0 1 0-12 0C6 15.75 12 21 12 21Z" /><circle cx="12" cy="9.75" r="2.25" /></svg>
                        <span>{{ config('practice.address.full') }}</span>
                    </address>

                    <div class="mt-6 aspect-[4/3] overflow-hidden rounded-2xl border border-brand-green/10 bg-[#edf4ea]">
                        <iframe
                            class="size-full"
                            src="{{ config('practice.address.map_embed_url') }}"
                            title="Google Map showing Falola Psychiatry Practice"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>

                    <div class="mt-6">
                        <x-site.button-link :href="$directionsUrl" variant="outline" arrow external>
                            Get Directions on Google Maps
                        </x-site.button-link>
                    </div>
                </section>

                <section class="rounded-3xl border border-brand-green/10 bg-[#eef5ed] px-7 py-8 sm:px-10" aria-labelledby="hours-heading">
                    <div class="flex items-start gap-5">
                        <span class="grid size-12 shrink-0 place-items-center rounded-xl bg-white/80 text-brand-green" aria-hidden="true">
                            <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3.75 9h16.5M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z" /></svg>
                        </span>
                        <div>
                            <h2 id="hours-heading" class="font-serif text-3xl font-normal tracking-[-0.025em] text-brand-green">Office Hours</h2>
                            <p class="mt-2 text-base leading-7 text-slate-700">Please contact our office to confirm current office hours and appointment availability.</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <section class="bg-white px-5 pb-14 sm:px-8 lg:px-10 lg:pb-20">
        <div class="mx-auto grid max-w-7xl items-center gap-7 rounded-3xl border border-brand-green/10 bg-[#eef5ed] px-7 py-9 sm:px-10 md:grid-cols-[8rem_1fr] lg:px-14">
            <div class="flex justify-center text-brand-green md:border-r md:border-brand-green/35 md:pr-10" aria-hidden="true">
                <span class="grid size-20 place-items-center rounded-full border-[3px] border-current font-serif text-5xl leading-none">i</span>
            </div>
            <div>
                <h2 class="font-serif text-3xl font-normal tracking-[-0.025em] text-brand-green sm:text-4xl">A Quick Note</h2>
                <p class="mt-2 max-w-4xl text-base leading-7 text-slate-800">
                    Phone and email are for general, non-urgent inquiries only. Please do not include sensitive medical information. This website and email are not for urgent or emergency concerns.
                </p>
            </div>
        </div>
    </section>

    <section class="relative isolate overflow-hidden">
        <img
            class="absolute inset-0 -z-20 size-full object-cover object-center"
            src="{{ asset('images/contact/appointment-cta.webp') }}"
            alt=""
            width="2200"
            height="900"
        >
        <div class="absolute inset-0 -z-10 bg-brand-ivory/80 backdrop-blur-[1px]"></div>

        <div class="mx-auto flex max-w-7xl items-center justify-center px-5 py-20 text-center sm:px-8 lg:px-10 lg:py-24">
            <div class="max-w-3xl">
                <h2 class="text-balance font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green sm:text-5xl">Ready to Schedule an Appointment?</h2>
                <p class="mx-auto mt-3 max-w-xl text-base leading-7 text-slate-800">Use the practice's established booking page to request an appointment.</p>
                <div class="mt-6">
                    <x-site.button-link :href="route('appointments')" icon="calendar">
                        Book an Appointment
                    </x-site.button-link>
                </div>
            </div>
        </div>
    </section>
@endsection
