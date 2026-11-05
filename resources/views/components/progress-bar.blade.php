@props([
    'label',
    'value',
    'color'    => '#14AFC3',
    'sublabel' => null,
])

<div>
    {{-- Label Row (Compact & Overflow Protected) --}}
    <div class="flex justify-between items-center mb-1.5 gap-2">
        <div class="flex items-center gap-1.5 min-w-0 flex-1">
            <span class="text-[12px] font-bold text-[#152C4B] truncate">{{ $label }}</span>
            @if($sublabel)
                <span class="text-[10px] text-gray-400 font-medium font-mono flex-shrink-0">({{ $sublabel }})</span>
            @endif
        </div>
        <span class="text-[12.5px] font-extrabold font-mono flex-shrink-0" style="color: {{ $color }};">
            {{ $value }}%
        </span>
    </div>

    {{-- Progress Track --}}
    <div class="w-full bg-gray-100 rounded-full h-1.5 overflow-hidden">
        <div class="h-full rounded-full transition-all duration-1000 ease-out relative overflow-hidden"
             style="width: {{ min(100, max(0, $value)) }}%; background: linear-gradient(90deg, {{ $color }}cc, {{ $color }});">
            {{-- Shimmer effect --}}
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full"
                 style="animation: shimmer 2.5s infinite;"></div>
        </div>
    </div>
</div>

@once
    @push('styles')
    <style>
        @keyframes shimmer {
            0%   { transform: translateX(-100%); }
            100% { transform: translateX(300%); }
        }
    </style>
    @endpush
@endonce