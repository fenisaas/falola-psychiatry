@extends('layouts.app')

@section('title', 'Office Fees & Practice Policies | Falola Psychiatry Practice')
@section('meta_description', 'Review office procedures, fee information, payment policies, telepsychiatry requirements, records, privacy, and other practice policies.')
@section('canonical', route('office-fees-policies'))

@section('content')
    <section class="overflow-hidden bg-brand-ivory">
        <div class="mx-auto grid max-w-[90rem] lg:min-h-[27rem] lg:grid-cols-[0.86fr_1.14fr]">
            <div class="flex items-center px-5 py-14 sm:px-8 lg:px-14 lg:py-12 xl:px-20">
                <div class="max-w-xl">
                    <h1 class="text-balance font-serif text-5xl font-normal leading-[0.98] tracking-[-0.035em] text-brand-green sm:text-6xl lg:text-[3.75rem]">
                        Office Fees &amp; Practice Policies
                    </h1>
                    <p class="mt-5 max-w-lg text-base leading-7 text-slate-800 sm:text-[1.0625rem]">
                        Review office procedures, payment information, and practice policies for Falola Psychiatry Practice.
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

            <div class="h-80 overflow-hidden sm:h-[27rem] lg:h-auto">
                <img
                    class="size-full object-cover object-[50%_54%]"
                    src="{{ asset('images/office-fees-policies/hero.webp') }}"
                    alt="Documents and a pen arranged on a wooden office desk."
                    width="2200"
                    height="1467"
                    fetchpriority="high"
                >
            </div>
        </div>
    </section>

    <section class="bg-white px-5 py-12 sm:px-8 lg:px-10 lg:py-14" aria-label="Policy page highlights">
        <div class="mx-auto grid max-w-7xl gap-8 md:grid-cols-3 md:gap-0">
            <article class="grid grid-cols-[3.5rem_1fr] gap-5 md:px-7 lg:px-10">
                <span class="grid size-14 place-items-center rounded-full bg-brand-ivory text-brand-green" aria-hidden="true">
                    <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="m4 7.5 7.5-4h7A1.5 1.5 0 0 1 20 5v7.5l-8.25 8.25a1.5 1.5 0 0 1-2.12 0L3.25 14.37a1.5 1.5 0 0 1 0-2.12L4 11.5v-4Z" /><circle cx="15.5" cy="8" r="1.25" /></svg>
                </span>
                <div>
                    <h2 class="font-serif text-2xl font-normal text-brand-green">Office Fees</h2>
                    <p class="mt-2 text-base leading-7 text-slate-700">Review fee wording and payment conditions with the verification notice below.</p>
                </div>
            </article>

            <article class="grid grid-cols-[3.5rem_1fr] gap-5 border-brand-sand md:border-x md:px-7 lg:px-10">
                <span class="grid size-14 place-items-center rounded-full bg-brand-ivory text-brand-green" aria-hidden="true">
                    <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M8 4.5h8M9 3h6v3H9zM6.5 5.5h11A1.5 1.5 0 0 1 19 7v13H5V7a1.5 1.5 0 0 1 1.5-1.5Z" /><path stroke-linecap="round" d="M8 10h8m-8 4h8m-8 4h5" /></svg>
                </span>
                <div>
                    <h2 class="font-serif text-2xl font-normal text-brand-green">Office Procedures</h2>
                    <p class="mt-2 text-base leading-7 text-slate-700">Review appointment, communication, records, and treatment procedures.</p>
                </div>
            </article>

            <article class="grid grid-cols-[3.5rem_1fr] gap-5 md:px-7 lg:px-10">
                <span class="grid size-14 place-items-center rounded-full bg-brand-ivory text-brand-green" aria-hidden="true">
                    <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3.5 19 6v5.1c0 4.25-2.75 7.9-7 9.4-4.25-1.5-7-5.15-7-9.4V6l7-2.5Z" /><path stroke-linecap="round" stroke-linejoin="round" d="m9 12 2 2 4-4" /></svg>
                </span>
                <div>
                    <h2 class="font-serif text-2xl font-normal text-brand-green">Privacy &amp; HIPAA</h2>
                    <p class="mt-2 text-base leading-7 text-slate-700">Review information about records, privacy, and patient responsibilities.</p>
                </div>
            </article>
        </div>
    </section>

    <section class="bg-white px-5 pb-14 sm:px-8 lg:px-10 lg:pb-20">
        <div class="mx-auto grid max-w-7xl gap-7 lg:grid-cols-2">
            <article class="rounded-3xl bg-brand-green px-7 py-9 text-white shadow-[0_14px_38px_rgba(0,61,45,0.16)] sm:px-10 lg:col-span-2 lg:px-12" id="consultation-fees">
                <h2 class="font-serif text-4xl font-normal tracking-[-0.03em] text-white sm:text-5xl">Office Fees</h2>
                <div class="mt-5 rounded-xl border border-white/30 bg-white/12 px-5 py-4">
                    <p class="font-semibold">Fee verification required</p>
                    <p class="mt-1 text-sm leading-6 text-white/85">The preserved self-pay amounts conflict with historical payment-link amounts and require practice confirmation before scheduling or paying.</p>
                </div>

                <div class="mt-7 grid gap-4">
                    @foreach ($officeFees as $officeFee)
                        <p class="text-base leading-7 text-white/90">{{ $officeFee }}</p>
                    @endforeach
                </div>
            </article>

            <article id="insurance-payment" class="relative isolate overflow-hidden rounded-3xl border border-brand-sand/70 bg-brand-ivory px-7 py-9 shadow-[0_12px_34px_rgba(31,50,42,0.07)] sm:px-10 lg:col-span-2 lg:px-12">
                <svg class="absolute -bottom-16 -right-12 -z-10 size-72 text-[#dce9d7]" viewBox="0 0 300 300" fill="currentColor" aria-hidden="true"><path opacity=".7" d="M20 280c50-98 114-67 150-147 24-54 56-83 110-103-3 72-16 126-48 167-42 54-101 73-212 83Z" /><path opacity=".45" d="M66 288c45-70 90-71 135-112 34-31 57-69 79-119-3 86-25 145-72 181-37 28-80 43-142 50Z" /></svg>
                <div class="flex items-start gap-5">
                    <span class="grid size-14 shrink-0 place-items-center rounded-xl bg-[#edf4ea] text-brand-green" aria-hidden="true">
                        <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3.5" y="5" width="17" height="14" rx="2" /><path stroke-linecap="round" d="M3.5 9.25h17M7 15h3" /></svg>
                    </span>
                    <div>
                        <h2 class="font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green sm:text-5xl">Insurance &amp; Payment</h2>
                        <p class="mt-4 text-base leading-7 text-slate-700">Falola Psychiatry Practice accepts a range of insurance plans and provides payment information for scheduled care.</p>
                        <p class="mt-3 text-base leading-7 text-slate-700">Appointment and payment details are available in the policies below.</p>
                        <div class="mt-7">
                            <x-site.button-link :href="route('patient-information').'#insurance'" variant="outline" arrow>
                                Review Patient Information
                            </x-site.button-link>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section class="bg-white px-5 pb-20 sm:px-8 lg:px-10 lg:pb-24">
        <div class="mx-auto max-w-7xl">
            <div class="max-w-4xl">
                <h2 class="text-balance font-serif text-4xl font-normal tracking-[-0.03em] text-brand-green sm:text-5xl">Practice Policies</h2>
                <p class="mt-4 text-base leading-7 text-slate-700 sm:text-[1.0625rem]">Select a topic to review office and treatment policies.</p>
            </div>

            <div class="mt-8 grid items-start gap-8 lg:grid-cols-[1.75fr_0.85fr]">
                <div class="grid gap-3" id="practice-policies">
                    @foreach ($policies as $index => $policy)
                        @php($panelId = 'policy-panel-'.$index)
                        <article class="overflow-hidden rounded-2xl border border-brand-sand/80 bg-brand-ivory shadow-[0_6px_18px_rgba(31,50,42,0.05)]" x-data="{ open: false }">
                            <h3>
                                <button
                                    class="flex w-full items-center gap-4 px-5 py-5 text-left text-brand-green transition hover:bg-white/70 focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-brand-green sm:px-6"
                                    type="button"
                                    aria-controls="{{ $panelId }}"
                                    :aria-expanded="open.toString()"
                                    @click="open = ! open"
                                >
                                    <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-white text-brand-green shadow-sm" aria-hidden="true">
                                        @switch($policy['icon'])
                                            @case('calendar')
                                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3.75 9h16.5M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z" /></svg>
                                                @break
                                            @case('money')
                                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="12" cy="12" r="8.5" /><path stroke-linecap="round" d="M14.5 8.5c-.55-.5-1.35-.75-2.35-.75-1.4 0-2.4.7-2.4 1.8 0 2.8 4.75 1.3 4.75 4.2 0 1.15-1 2-2.55 2-1.1 0-2-.3-2.65-.9M12 6.25v11.5" /></svg>
                                                @break
                                            @case('monitor')
                                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3.5" y="4.5" width="17" height="12" rx="1.5" /><path stroke-linecap="round" d="M8.5 20h7M12 16.5V20" /></svg>
                                                @break
                                            @case('pill')
                                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="m5.15 18.85 13.7-13.7a3.5 3.5 0 0 0-4.95-4.95L.2 13.9a3.5 3.5 0 0 0 4.95 4.95Z" transform="translate(2.5 2.5) scale(.8)" /><path stroke-linecap="round" d="m8.25 8.25 7.5 7.5" /></svg>
                                                @break
                                            @case('lab')
                                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3h6m-1 0v5.2l5 9.1a2 2 0 0 1-1.75 2.95H6.75A2 2 0 0 1 5 17.3l5-9.1V3" /><path stroke-linecap="round" d="M7.5 15h9" /></svg>
                                                @break
                                            @case('chat')
                                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5.5h16v10H9l-5 4v-14Z" /><path stroke-linecap="round" d="M8 9h8m-8 3h5" /></svg>
                                                @break
                                            @case('document')
                                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M6 3.5h8l4 4v13H6v-17Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M14 3.5v4h4M9 12h6m-6 3h6" /></svg>
                                                @break
                                            @case('shield')
                                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3.5 19 6v5.1c0 4.25-2.75 7.9-7 9.4-4.25-1.5-7-5.15-7-9.4V6l7-2.5Z" /><path stroke-linecap="round" d="M9 12h6" /></svg>
                                                @break
                                            @default
                                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="6" y="10" width="12" height="10" rx="1.5" /><path stroke-linecap="round" d="M8.5 10V7.5a3.5 3.5 0 0 1 7 0V10M12 14v2" /></svg>
                                        @endswitch
                                    </span>

                                    <span class="min-w-0 flex-1">
                                        <span class="block font-serif text-xl font-normal leading-tight sm:text-2xl">{{ $policy['title'] }}</span>
                                        <span class="mt-1 block text-sm font-normal leading-6 text-slate-700">{{ $policy['summary'] }}</span>
                                    </span>

                                    <svg class="size-5 shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" /></svg>
                                </button>
                            </h3>

                            <div id="{{ $panelId }}" x-show="open" x-cloak>
                                <div class="border-t border-brand-sand/80 bg-white/75 px-5 py-6 sm:px-7 sm:py-7">
                                    @foreach ($policy['sections'] as $section)
                                        <section class="mt-6 first:mt-0">
                                            <h4 class="font-serif text-2xl font-normal text-brand-green">{{ $section['heading'] }}</h4>
                                            <div class="mt-3 grid gap-3 text-base leading-7 text-slate-700">
                                                @foreach ($section['paragraphs'] as $paragraph)
                                                    <p>{{ $paragraph }}</p>
                                                @endforeach
                                            </div>

                                            @isset($section['items'])
                                                <ul class="mt-4 grid gap-2 text-base leading-7 text-slate-700">
                                                    @foreach ($section['items'] as $item)
                                                        <li class="flex gap-3">
                                                            <span class="mt-3 size-1.5 shrink-0 rounded-full bg-brand-green" aria-hidden="true"></span>
                                                            <span>{{ $item }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endisset
                                        </section>
                                    @endforeach
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <aside class="grid gap-6 lg:sticky lg:top-6">
                    <div class="overflow-hidden rounded-3xl">
                        <img
                            class="aspect-[3/2] w-full object-cover object-center"
                            src="{{ asset('images/office-fees-policies/policies.webp') }}"
                            alt="A person writing notes at a wooden desk."
                            width="1800"
                            height="1200"
                        >
                    </div>

                    <div class="rounded-3xl border border-brand-green/10 bg-[#eef5ed] px-7 py-9 sm:px-9">
                        <span class="grid size-12 place-items-center rounded-full border-2 border-brand-green font-serif text-2xl text-brand-green" aria-hidden="true">i</span>
                        <h2 class="mt-5 font-serif text-3xl font-normal tracking-[-0.025em] text-brand-green sm:text-4xl">Questions About Our Policies?</h2>
                        <p class="mt-4 text-base leading-7 text-slate-700">Our office can answer questions about fees, insurance participation, or practice procedures.</p>
                        <div class="mt-6">
                            <x-site.button-link class="w-full" href="tel:+16593466314" icon="phone">
                                (659) 346-6314
                            </x-site.button-link>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
