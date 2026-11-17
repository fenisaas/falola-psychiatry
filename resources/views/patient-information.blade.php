@extends('layouts.app')

@section('title', 'Patient Information | Falola Psychiatry Practice')
@section('meta_description', 'Review practical appointment, insurance, payment, FAQ, and patient portal information from Falola Psychiatry Practice.')
@section('canonical', route('patient-information'))

@section('content')
    <section class="overflow-hidden bg-brand-ivory">
        <div class="mx-auto grid max-w-[90rem] lg:min-h-[26rem] lg:grid-cols-[0.9fr_1.1fr]">
            <div class="flex items-center px-5 py-14 sm:px-8 lg:px-14 lg:py-12 xl:px-20">
                <div class="max-w-xl">
                    <h1 class="text-balance font-serif text-5xl font-normal leading-[0.98] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[3.75rem]">
                        Helpful Information for Your Care
                    </h1>
                    <p class="mt-5 max-w-lg text-base leading-7 text-slate-800 sm:text-[1.0625rem]">
                        Find practical details about appointments, insurance, payment, the patient portal, and other resources to help you prepare for your visit.
                    </p>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <x-site.button-link :href="route('appointments')" icon="calendar">
                            Book an Appointment
                        </x-site.button-link>
                        @if ($patientPortalUrl !== null)
                            <x-site.button-link :href="$patientPortalUrl" variant="outline" arrow external>
                                Access Patient Portal
                            </x-site.button-link>
                        @else
                            <x-site.button-link href="tel:+16593466314" variant="outline" icon="phone">
                                Call for Portal Help
                            </x-site.button-link>
                        @endif
                    </div>
                </div>
            </div>

            <div class="h-80 overflow-hidden sm:h-[26rem] lg:h-auto">
                <img
                    class="size-full object-cover object-[50%_45%]"
                    src="{{ asset('images/patient-information/hero.webp') }}"
                    alt="A thoughtful person seated in a bright living room."
                    width="2200"
                    height="1467"
                    fetchpriority="high"
                >
            </div>
        </div>
    </section>

    <nav class="bg-white px-5 py-12 sm:px-8 lg:px-10" aria-label="Patient information sections">
        <div class="mx-auto grid max-w-7xl gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <a class="group flex min-h-52 flex-col rounded-2xl border border-brand-sand/70 bg-brand-ivory p-7 shadow-[0_8px_24px_rgba(31,50,42,0.06)] transition hover:-translate-y-0.5 hover:border-brand-green/30 hover:shadow-[0_12px_30px_rgba(31,50,42,0.1)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green" href="#appointments">
                <svg class="size-11 text-brand-green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3.75 9h16.5M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z" />
                    <path stroke-linecap="round" d="M8 13h3m-3 3h6" />
                </svg>
                <h2 class="mt-5 font-serif text-2xl font-normal text-brand-green">Appointments</h2>
                <p class="mt-2 text-base leading-7 text-slate-700">Prepare for your visit and review practical suggestions.</p>
                <svg class="mt-auto size-5 self-end text-brand-green transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5" /></svg>
            </a>

            <a class="group flex min-h-52 flex-col rounded-2xl border border-brand-sand/70 bg-brand-ivory p-7 shadow-[0_8px_24px_rgba(31,50,42,0.06)] transition hover:-translate-y-0.5 hover:border-brand-green/30 hover:shadow-[0_12px_30px_rgba(31,50,42,0.1)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green" href="{{ route('office-fees-policies') }}#insurance-payment">
                <svg class="size-11 text-brand-green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3.5 19 6v5.1c0 4.25-2.75 7.9-7 9.4-4.25-1.5-7-5.15-7-9.4V6l7-2.5Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 12 2 2 4-4" />
                </svg>
                <h2 class="mt-5 font-serif text-2xl font-normal text-brand-green">Insurance</h2>
                <p class="mt-2 text-base leading-7 text-slate-700">Learn how to confirm current plan participation.</p>
                <svg class="mt-auto size-5 self-end text-brand-green transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5" /></svg>
            </a>

            <a class="group flex min-h-52 flex-col rounded-2xl border border-brand-sand/70 bg-brand-ivory p-7 shadow-[0_8px_24px_rgba(31,50,42,0.06)] transition hover:-translate-y-0.5 hover:border-brand-green/30 hover:shadow-[0_12px_30px_rgba(31,50,42,0.1)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green" href="{{ route('office-fees-policies') }}#consultation-fees">
                <svg class="size-11 text-brand-green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <rect x="3.5" y="5" width="17" height="14" rx="2" />
                    <path stroke-linecap="round" d="M3.5 9.25h17M7 15h3" />
                </svg>
                <h2 class="mt-5 font-serif text-2xl font-normal text-brand-green">Fees &amp; Payment</h2>
                <p class="mt-2 text-base leading-7 text-slate-700">Find out how to confirm current fees and arrangements.</p>
                <svg class="mt-auto size-5 self-end text-brand-green transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5" /></svg>
            </a>

            <a class="group flex min-h-52 flex-col rounded-2xl border border-brand-sand/70 bg-brand-ivory p-7 shadow-[0_8px_24px_rgba(31,50,42,0.06)] transition hover:-translate-y-0.5 hover:border-brand-green/30 hover:shadow-[0_12px_30px_rgba(31,50,42,0.1)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green" href="#frequently-asked-questions">
                <svg class="size-11 text-brand-green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <circle cx="12" cy="12" r="9" />
                    <path stroke-linecap="round" d="M9.75 9.25a2.4 2.4 0 1 1 3.3 2.23c-.65.3-1.05.84-1.05 1.52v.25M12 17h.01" />
                </svg>
                <h2 class="mt-5 font-serif text-2xl font-normal text-brand-green">FAQs</h2>
                <p class="mt-2 text-base leading-7 text-slate-700">Review answers based on verified practice information.</p>
                <svg class="mt-auto size-5 self-end text-brand-green transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5" /></svg>
            </a>
        </div>
    </nav>

    <section id="appointments" class="scroll-mt-24 bg-white px-5 pb-10 sm:px-8 lg:px-10">
        <div class="mx-auto grid max-w-7xl overflow-hidden rounded-3xl border border-brand-sand/70 bg-brand-ivory shadow-[0_12px_34px_rgba(31,50,42,0.07)] lg:grid-cols-2">
            <div class="aspect-[9/5] lg:aspect-auto lg:min-h-[25rem]">
                <img
                    class="size-full object-cover object-center"
                    src="{{ asset('images/patient-information/appointments.webp') }}"
                    alt="A person writing a preparation list in a notebook."
                    width="1800"
                    height="1000"
                    loading="lazy"
                >
            </div>
            <div class="flex items-center px-7 py-10 sm:px-10 lg:px-12">
                <div>
                    <h2 class="text-balance font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green sm:text-5xl">Preparing for Your Visit</h2>
                    <p class="mt-4 text-base leading-7 text-slate-700">
                        A little preparation can help you use your appointment time effectively. Follow any specific instructions provided by the practice.
                    </p>
                    <ul class="mt-6 grid gap-3 text-base leading-7 text-slate-800">
                        <li class="flex gap-3">
                            <span class="mt-1 grid size-5 shrink-0 place-items-center rounded-full bg-brand-green text-white" aria-hidden="true"><svg class="size-3" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m3 8 3 3 7-7" /></svg></span>
                            Bring valid identification to each visit.
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-1 grid size-5 shrink-0 place-items-center rounded-full bg-brand-green text-white" aria-hidden="true"><svg class="size-3" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m3 8 3 3 7-7" /></svg></span>
                            Consider bringing current insurance information, if applicable.
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-1 grid size-5 shrink-0 place-items-center rounded-full bg-brand-green text-white" aria-hidden="true"><svg class="size-3" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m3 8 3 3 7-7" /></svg></span>
                            Prepare a list of current medications and dosages.
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-1 grid size-5 shrink-0 place-items-center rounded-full bg-brand-green text-white" aria-hidden="true"><svg class="size-3" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m3 8 3 3 7-7" /></svg></span>
                            Note relevant medical history and questions you would like to discuss.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white px-5 py-10 sm:px-8 lg:px-10">
        <div class="mx-auto grid max-w-7xl overflow-hidden rounded-3xl border border-brand-sand/70 bg-brand-ivory shadow-[0_12px_34px_rgba(31,50,42,0.07)] lg:grid-cols-2">
            <div class="flex items-center px-7 py-10 sm:px-10 lg:px-12">
                <div>
                    <h2 class="text-balance font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green sm:text-5xl">Confirm Current Details</h2>
                    <p class="mt-4 text-base leading-7 text-slate-700">
                        Insurance participation can vary by plan, and current fees may depend on the appointment and payment arrangement. Please confirm details before scheduling.
                    </p>
                    <div class="mt-6 grid gap-5">
                        <div id="insurance" class="scroll-mt-24">
                            <h3 class="font-serif text-2xl font-normal text-brand-green">Insurance</h3>
                            <p class="mt-1 text-base leading-7 text-slate-700">Confirm plan participation and benefits directly with both the practice and your insurer.</p>
                        </div>
                        <div id="fees-payment" class="scroll-mt-24">
                            <h3 class="font-serif text-2xl font-normal text-brand-green">Fees &amp; Payment</h3>
                            <p class="mt-1 text-base leading-7 text-slate-700">Current fees, payment methods, and any amount due at the time of service must be confirmed before the appointment.</p>
                        </div>
                    </div>
                    <div class="mt-7">
                        <x-site.button-link href="tel:+16593466314" variant="outline" icon="phone">
                            Call to Confirm Details
                        </x-site.button-link>
                    </div>
                </div>
            </div>
            <div class="order-first aspect-[9/5] lg:order-last lg:aspect-auto lg:min-h-[25rem]">
                <img
                    class="size-full object-cover object-center"
                    src="{{ asset('images/patient-information/insurance-payment.webp') }}"
                    alt="Two people reviewing paperwork together at a desk."
                    width="1800"
                    height="1000"
                    loading="lazy"
                >
            </div>
        </div>
    </section>

    <section id="frequently-asked-questions" class="scroll-mt-24 bg-white px-5 py-10 sm:px-8 lg:px-10">
        <div class="mx-auto max-w-7xl rounded-3xl border border-brand-green/10 bg-[#eef5ed] px-7 py-9 sm:px-10 lg:px-12">
            <div class="grid items-center gap-7 md:grid-cols-[9rem_1fr] md:gap-10">
                <div class="flex justify-center text-brand-green md:border-r md:border-brand-green/30 md:pr-10" aria-hidden="true">
                    <svg class="size-24" viewBox="0 0 96 96" fill="none" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M48 13c19.3 0 35 13.5 35 30.2 0 16.6-15.7 30.1-35 30.1-4.9 0-9.6-.9-13.8-2.5L18 81l4.8-17.5C16.7 58.1 13 51 13 43.2 13 26.5 28.7 13 48 13Z" />
                        <path stroke-linecap="round" d="M39 36.5a9.5 9.5 0 1 1 13.3 8.7c-2.6 1.2-4.3 3.4-4.3 6.1v1.2M48 61h.01" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green sm:text-5xl">Quick Answers from Verified Information</h2>
                    <p class="mt-3 max-w-3xl text-base leading-7 text-slate-700">These answers use only information confirmed in the existing website audit.</p>
                </div>
            </div>

            <div class="mt-8 grid gap-4 lg:grid-cols-3">
                <details class="group rounded-xl border border-brand-green/15 bg-white/75 px-5 py-4">
                    <summary class="flex cursor-pointer list-none items-start justify-between gap-4 font-semibold text-brand-green focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green">
                        <span>Who is the patient portal for?</span>
                        <svg class="mt-1 size-4 shrink-0 transition group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" /></svg>
                    </summary>
                    <p class="mt-3 text-sm leading-6 text-slate-700">The legacy practice website identifies the external Tebra/Kareo portal for existing patients only.</p>
                </details>

                <details class="group rounded-xl border border-brand-green/15 bg-white/75 px-5 py-4">
                    <summary class="flex cursor-pointer list-none items-start justify-between gap-4 font-semibold text-brand-green focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green">
                        <span>Where can I attend a telepsychiatry visit?</span>
                        <svg class="mt-1 size-4 shrink-0 transition group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" /></svg>
                    </summary>
                    <p class="mt-3 text-sm leading-6 text-slate-700">You must be physically located in Alabama at the time of a telepsychiatry appointment.</p>
                </details>

                <details class="group rounded-xl border border-brand-green/15 bg-white/75 px-5 py-4">
                    <summary class="flex cursor-pointer list-none items-start justify-between gap-4 font-semibold text-brand-green focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green">
                        <span>How do I confirm insurance and fees?</span>
                        <svg class="mt-1 size-4 shrink-0 transition group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" /></svg>
                    </summary>
                    <p class="mt-3 text-sm leading-6 text-slate-700">Contact the practice for current information and confirm plan benefits directly with your insurer before scheduling.</p>
                </details>
            </div>
        </div>
    </section>

    <section class="bg-white px-5 py-10 pb-20 sm:px-8 lg:px-10">
        <div class="mx-auto grid max-w-7xl overflow-hidden rounded-3xl border border-brand-sand/70 bg-brand-ivory shadow-[0_12px_34px_rgba(31,50,42,0.07)] lg:grid-cols-2">
            <div class="aspect-[9/5] lg:aspect-auto lg:min-h-[24rem]">
                <img
                    class="size-full object-cover object-center"
                    src="{{ asset('images/patient-information/patient-portal.webp') }}"
                    alt="A person using a laptop at home."
                    width="1800"
                    height="1000"
                >
            </div>
            <div class="flex items-center px-7 py-10 sm:px-10 lg:px-12">
                <div>
                    <h2 class="text-balance font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green sm:text-5xl">Access the External Patient Portal</h2>
                    <p class="mt-4 text-base leading-7 text-slate-700">
                        The portal is for existing patients and opens on a separate Tebra/Kareo website. Falola Psychiatry Practice does not collect portal usernames or passwords on this website.
                    </p>
                    <div class="mt-7">
                        @if ($patientPortalUrl !== null)
                            <x-site.button-link :href="$patientPortalUrl" arrow external>
                                Open Patient Portal
                            </x-site.button-link>
                        @else
                            <x-site.button-link href="tel:+16593466314" icon="phone">
                                Call for Portal Help
                            </x-site.button-link>
                        @endif
                    </div>
                    @if ($patientPortalUrl === null)
                        <p class="mt-3 text-sm leading-6 text-slate-600">The external portal destination is temporarily unavailable.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
