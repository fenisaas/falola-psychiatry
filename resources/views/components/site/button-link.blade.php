@props([
    'href',
    'variant' => 'primary',
    'icon' => null,
    'arrow' => false,
    'external' => false,
    'compact' => false,
    'prominent' => false,
])

@php
    $variantClasses = match ($variant) {
        'outline' => 'border border-brand-green bg-white/85 text-brand-green hover:bg-brand-green hover:text-white',
        'light' => 'border border-white bg-white text-brand-green hover:bg-brand-ivory',
        default => 'border border-brand-green bg-brand-green text-white hover:border-brand-green-dark hover:bg-brand-green-dark',
    };

    $sizeClasses = match (true) {
        $compact => 'min-h-10 px-3 py-2 text-sm',
        $prominent => 'min-h-14 px-7 py-3.5 text-base sm:px-9',
        default => 'min-h-11 px-5 py-3 text-[0.9375rem] sm:px-6',
    };
@endphp

<a
    href="{{ $href }}"
    @if ($external)
        target="_blank"
        rel="noopener noreferrer"
    @endif
    {{ $attributes->class([
        'group inline-flex items-center justify-center gap-2.5 rounded-lg text-center font-semibold shadow-sm transition duration-200 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-green',
        $sizeClasses,
        $variantClasses,
    ]) }}
>
    @if ($icon === 'portal')
        <svg class="size-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5v11.5H3.75V5.25Zm5 15h6.5M12 16.75v3.5" />
        </svg>
    @elseif ($icon === 'calendar')
        <svg class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3.75 9h16.5M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 12.75h.008v.008H8.25v-.008Zm3.75 0h.008v.008H12v-.008Zm3.75 0h.008v.008h-.008v-.008Zm-7.5 3.75h.008v.008H8.25V16.5Zm3.75 0h.008v.008H12V16.5Z" />
        </svg>
    @elseif ($icon === 'phone')
        <svg class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25A2.25 2.25 0 0 0 21.75 19.5v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
        </svg>
    @endif

    <span>{{ $slot }}</span>

    @if ($arrow)
        <svg class="size-4 shrink-0 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5" />
        </svg>
    @endif
</a>
