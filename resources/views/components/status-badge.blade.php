@props([
    'status' => 'default', // teal | success | warning | danger | info | purple | blue | default
    'dot'    => true,      // true | false
    'pulse'  => false,     // true | false (تأثير نبض للحالات المباشرة)
    'size'   => 'sm',      // xs | sm | md
])

@php
$config = [
    'teal' => [
        'badge' => 'bg-[#E5FAFC] text-[#0C6B78] border-[#14AFC3]/30 dark:bg-cyan-950/50 dark:text-[#14AFC3] dark:border-[#14AFC3]/30',
        'dot'   => 'bg-[#14AFC3]',
    ],
    'success' => [
        'badge' => 'bg-emerald-50 text-emerald-700 border-emerald-200/80 dark:bg-emerald-950/40 dark:text-emerald-300 dark:border-emerald-800/40',
        'dot'   => 'bg-emerald-500',
    ],
    'warning' => [
        'badge' => 'bg-amber-50 text-amber-700 border-amber-200/80 dark:bg-amber-950/40 dark:text-amber-300 dark:border-amber-800/40',
        'dot'   => 'bg-amber-500',
    ],
    'danger' => [
        'badge' => 'bg-rose-50 text-rose-700 border-rose-200/80 dark:bg-rose-950/40 dark:text-rose-300 dark:border-rose-800/40',
        'dot'   => 'bg-rose-500',
    ],
    'info' => [
        'badge' => 'bg-[#E5FAFC] text-[#0C6B78] border-[#14AFC3]/30 dark:bg-cyan-950/50 dark:text-[#14AFC3] dark:border-[#14AFC3]/30',
        'dot'   => 'bg-[#14AFC3]',
    ],
    'purple' => [
        'badge' => 'bg-purple-50 text-purple-700 border-purple-200/80 dark:bg-purple-950/40 dark:text-purple-300 dark:border-purple-800/40',
        'dot'   => 'bg-purple-500',
    ],
    'blue' => [
        'badge' => 'bg-blue-50 text-blue-700 border-blue-200/80 dark:bg-blue-950/40 dark:text-blue-300 dark:border-blue-800/40',
        'dot'   => 'bg-blue-500',
    ],
    'default' => [
        'badge' => 'bg-slate-50 text-slate-700 border-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:border-slate-700',
        'dot'   => 'bg-slate-400',
    ],
];

$sizes = [
    'xs' => 'px-2 py-0.5 text-[10px] gap-1',
    'sm' => 'px-2.5 sm:px-3 py-1 text-[11px] gap-1.5',
    'md' => 'px-3.5 py-1.5 text-xs gap-2',
];

$current = $config[$status] ?? $config['default'];
$sizeClass = $sizes[$size] ?? $sizes['sm'];
@endphp

<span {{ $attributes->merge([
    'class' => 'inline-flex items-center rounded-full font-bold border whitespace-nowrap leading-none select-none transition-colors duration-150 ' . 
               $current['badge'] . ' ' . $sizeClass
]) }}>
    {{-- Leading Icon (if provided) --}}
    @if(isset($icon))
        <span class="flex-shrink-0 flex items-center justify-center">
            {{ $icon }}
        </span>
    @elseif($dot)
        {{-- Status Dot with Optional Glowing Pulse Ring --}}
        @if($pulse)
            <span class="relative flex h-1.5 w-1.5 flex-shrink-0">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $current['dot'] }} opacity-75"></span>
                <span class="relative inline-flex rounded-full h-1.5 w-1.5 {{ $current['dot'] }}"></span>
            </span>
        @else
            <span class="w-1.5 h-1.5 rounded-full {{ $current['dot'] }} flex-shrink-0"></span>
        @endif
    @endif

    {{-- Badge Text Label --}}
    <span class="truncate">{{ $slot }}</span>
</span>