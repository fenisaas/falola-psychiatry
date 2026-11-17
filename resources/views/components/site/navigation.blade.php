<header class="sticky top-0 z-40 border-b border-brand-sand/70 bg-white" x-data="{ navigationOpen: false }" @keydown.escape.window="navigationOpen = false">
    <nav class="relative mx-auto flex max-w-[90rem] items-center justify-between gap-3 px-4 py-3 sm:px-6 min-[1380px]:min-h-24 min-[1380px]:py-0 lg:px-8" aria-label="Primary navigation">
        <x-site.logo class="min-[1380px]:absolute min-[1380px]:left-8 min-[1380px]:top-2" compact />

        <div class="ml-auto hidden items-center gap-6 min-[1380px]:flex">
            <a class="site-nav-link {{ request()->routeIs('home') ? 'site-nav-link-active' : '' }}" href="{{ route('home') }}">Home</a>
            <a class="site-nav-link {{ request()->routeIs('about') ? 'site-nav-link-active' : '' }}" href="{{ route('about') }}">About</a>
            <a class="site-nav-link {{ request()->routeIs('services.*') ? 'site-nav-link-active' : '' }}" href="{{ route('services.index') }}">
                Services
                <svg class="size-3" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m3 4.5 3 3 3-3" /></svg>
            </a>
            <a class="site-nav-link {{ request()->routeIs('telepsychiatry') ? 'site-nav-link-active' : '' }}" href="{{ route('telepsychiatry') }}">Telepsychiatry</a>
            <a class="site-nav-link {{ request()->routeIs('office-fees-policies') ? 'site-nav-link-active' : '' }}" href="{{ route('office-fees-policies') }}">Office Fees &amp; Policies</a>
            <a class="site-nav-link {{ request()->routeIs('contact') ? 'site-nav-link-active' : '' }}" href="{{ route('contact') }}">Contact</a>
        </div>

        <button
            class="inline-flex size-11 items-center justify-center rounded-lg border border-brand-green text-brand-green transition hover:bg-brand-green hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green min-[1380px]:hidden"
            type="button"
            aria-controls="mobile-navigation"
            :aria-expanded="navigationOpen"
            @click="navigationOpen = ! navigationOpen"
        >
            <span class="sr-only">Toggle navigation</span>
            <svg class="size-6" x-show="! navigationOpen" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16" /></svg>
            <svg class="size-6" x-show="navigationOpen" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="m6 6 12 12M18 6 6 18" /></svg>
        </button>
    </nav>

    <div class="hidden border-t border-brand-sand/60 bg-brand-ivory/55 min-[1380px]:block" data-desktop-action-row>
        <div class="mx-auto flex max-w-[90rem] items-center justify-start gap-4 px-8 py-3">
            @if ($patientPortalUrl !== null)
                <x-site.button-link class="min-w-56" :href="$patientPortalUrl" variant="outline" icon="portal" prominent external>
                    Patient Portal
                </x-site.button-link>
            @endif
            <x-site.button-link class="min-w-72" :href="route('appointments')" icon="calendar" prominent>
                Book an Appointment
            </x-site.button-link>
        </div>
    </div>

    <div
        id="mobile-navigation"
        class="absolute inset-x-0 top-full border-y border-brand-sand bg-white px-5 py-6 shadow-xl min-[1380px]:hidden"
        x-show="navigationOpen"
        x-cloak
        x-transition.opacity.duration.150ms
        @click.outside="navigationOpen = false"
    >
        <div class="mx-auto flex max-w-2xl flex-col gap-1">
            <a class="mobile-nav-link" href="{{ route('home') }}" @click="navigationOpen = false">Home</a>
            <a class="mobile-nav-link" href="{{ route('about') }}" @click="navigationOpen = false">About</a>
            <a class="mobile-nav-link" href="{{ route('services.index') }}" @click="navigationOpen = false">Services</a>
            <a class="mobile-nav-link" href="{{ route('telepsychiatry') }}" @click="navigationOpen = false">Telepsychiatry</a>
            <a class="mobile-nav-link" href="{{ route('office-fees-policies') }}" @click="navigationOpen = false">Office Fees &amp; Policies</a>
            <a class="mobile-nav-link" href="{{ route('contact') }}" @click="navigationOpen = false">Contact</a>
            <a class="mobile-nav-link" href="tel:+16593466314">Call (659) 346-6314</a>
            <div class="mt-4 grid gap-3 sm:grid-cols-2">
                @if ($patientPortalUrl !== null)
                    <x-site.button-link class="w-full" :href="$patientPortalUrl" variant="outline" external>
                        Patient Portal
                    </x-site.button-link>
                @endif
                <x-site.button-link class="w-full" :href="route('appointments')" icon="calendar">
                    Book an Appointment
                </x-site.button-link>
            </div>
        </div>
    </div>
</header>
