@props(['name'])

<div
    aria-label="{{ $name }}"
    {{ $attributes->class(['flex h-14 items-center justify-center rounded-lg border border-brand-sand bg-white px-3 py-2 text-center shadow-[0_4px_12px_rgba(31,50,42,0.08)] sm:h-16 sm:px-4 sm:py-3']) }}
>
    @switch($name)
        @case('Medicare')
            <span class="text-xl font-bold italic tracking-tight text-[#112dd7]">Medicare</span>
            @break

        @case('United Health care')
            <span class="flex items-center gap-2 text-left text-sm font-semibold leading-none text-[#163f8f]">
                <svg class="h-8 w-5" viewBox="0 0 24 34" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 2 21 6v9c0 7-4 13-9 17C7 28 3 22 3 15V6l9-4Z"/><path d="M8 8v11m4-13v16m4-14v11"/></svg>
                <span>United<span class="block">Healthcare</span></span>
            </span>
            @break

        @case('Blue Cross Blue Shield')
            <span class="flex items-center gap-2 text-left text-xs font-semibold leading-[1.05] text-[#0067b1]">
                <span class="grid size-7 place-items-center rounded bg-[#0079c8] text-lg font-bold text-white">+</span>
                <span>BlueCross<span class="block">BlueShield</span></span>
            </span>
            @break

        @case('Aetna')
            <span class="text-2xl font-bold lowercase tracking-tight text-[#7b2886]">&hearts;aetna</span>
            @break

        @case('Curative')
            <span class="text-xl font-bold tracking-tight text-slate-950"><span class="text-3xl leading-none text-[#2049d8]">&#10033;</span> Curative</span>
            @break

        @case('Cigna')
            <span class="text-2xl font-semibold lowercase tracking-tight text-[#005da9]"><span class="text-[#27a844]">&#9827;</span>cigna</span>
            @break

        @case('ChampVa')
            <span class="text-xl font-bold uppercase tracking-tight text-[#223d99]">ChampVa</span>
            @break

        @case('Viva')
            <span class="text-3xl font-bold italic tracking-tight text-[#009bd8]">Viva</span>
            @break
    @endswitch
</div>
