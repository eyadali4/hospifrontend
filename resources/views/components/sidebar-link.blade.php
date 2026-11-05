@props([
    'href'       => '#',
    'active'     => false,
    'badge'      => null,
    'badgeColor' => 'bg-rose-500 text-white',
])

<a href="{{ $href }}"
   {{ $attributes->merge([
       'class' => 'flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-[12.5px] font-semibold transition-all duration-200 group relative border-s-[3.5px] select-none ' . 
       ($active
           ? 'bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] text-white font-bold border-white shadow-[0_4px_18px_rgba(20,175,195,0.45)] translate-x-0.5 rtl:-translate-x-0.5'
           : 'text-white/70 hover:text-white hover:bg-white/10 hover:translate-x-1 rtl:hover:-translate-x-1 border-transparent')
   ]) }}>

    {{-- Icon Slot with smooth glow on active --}}
    <span class="w-5 h-5 flex items-center justify-center shrink-0 transition-colors duration-200 {{ $active ? 'text-white' : 'text-white/50 group-hover:text-white' }}">
        {{ $icon ?? '' }}
    </span>

    {{-- Text Label --}}
    <span class="flex-1 truncate tracking-wide leading-none">
        {{ $slot }}
    </span>

    {{-- Optional Numeric / Text Badge --}}
    @if($badge !== null)
        <span class="px-2 py-0.5 text-[10.5px] font-bold rounded-full flex items-center justify-center font-mono leading-none shadow-xs {{ $active ? 'bg-white text-[#0C6B78]' : $badgeColor }}">
            {{ $badge }}
        </span>
    @endif

    {{-- Active Dot Glow Indicator (only when no badge is displayed) --}}
    @if($active && $badge === null)
        <span class="relative flex h-2 w-2 flex-shrink-0">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
        </span>
    @endif
</a>