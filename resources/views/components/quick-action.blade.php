@props([
    'href'     => '#',
    'variant'  => 'secondary', // primary | secondary | danger
    'sublabel' => null,
])

@if($variant === 'primary')
    <a href="{{ $href }}"
       {{ $attributes->merge([
           'class' => 'flex items-center justify-between p-3 rounded-2xl text-white transition-all duration-200 hover:-translate-y-0.5 active:scale-98 group gap-2.5 shadow-md shadow-[#14AFC3]/25 select-none ' . 
                      'bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#119ab0] hover:to-[#0a5a66]'
       ]) }}>
        <div class="flex items-center gap-2.5 min-w-0">
            @if(isset($icon))
                <div class="w-8 h-8 rounded-xl flex items-center justify-center bg-white/20 text-white transition-all duration-200 group-hover:bg-white/30 flex-shrink-0 shadow-xs">
                    {{ $icon }}
                </div>
            @endif
            <div class="min-w-0">
                <span class="block font-bold text-[12.5px] tracking-tight truncate leading-tight">{{ $slot }}</span>
                @if($sublabel)
                    <span class="block text-[10.5px] text-white/80 truncate leading-tight mt-0.5">{{ $sublabel }}</span>
                @endif
            </div>
        </div>
        <svg width="15" height="15"
             class="text-white/70 group-hover:text-white transition-all transform rtl:rotate-180 ltr:group-hover:translate-x-1 rtl:group-hover:-translate-x-1 flex-shrink-0"
             fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </a>

@elseif($variant === 'danger')
    <a href="{{ $href }}"
       {{ $attributes->merge([
           'class' => 'flex items-center justify-between p-3 rounded-2xl text-red-600 dark:text-red-400 bg-red-50/80 dark:bg-red-950/30 border border-red-200/70 dark:border-red-900/40 hover:bg-red-100/80 dark:hover:bg-red-950/50 transition-all duration-200 hover:-translate-y-0.5 active:scale-98 group gap-2.5 select-none'
       ]) }}>
        <div class="flex items-center gap-2.5 min-w-0">
            @if(isset($icon))
                <div class="w-8 h-8 rounded-xl flex items-center justify-center bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-400 border border-red-200/80 dark:border-red-800/50 flex-shrink-0 transition-all">
                    {{ $icon }}
                </div>
            @endif
            <div class="min-w-0">
                <span class="block font-bold text-[12.5px] truncate leading-tight">{{ $slot }}</span>
                @if($sublabel)
                    <span class="block text-[10.5px] text-red-500/80 dark:text-red-400/70 truncate leading-tight mt-0.5">{{ $sublabel }}</span>
                @endif
            </div>
        </div>
        <svg width="15" height="15"
             class="text-red-400 group-hover:text-red-600 dark:group-hover:text-red-300 transition-all transform rtl:rotate-180 ltr:group-hover:translate-x-1 rtl:group-hover:-translate-x-1 flex-shrink-0"
             fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </a>

@else
    <a href="{{ $href }}"
       {{ $attributes->merge([
           'class' => 'flex items-center justify-between p-2.5 sm:p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/70 border border-slate-200/60 dark:border-slate-700/60 hover:bg-[#E5FAFC] hover:border-[#14AFC3]/30 dark:hover:bg-slate-800 dark:hover:border-[#14AFC3]/40 transition-all duration-200 hover:-translate-y-0.5 active:scale-98 group gap-2.5 select-none'
       ]) }}>
        <div class="flex items-center gap-2.5 min-w-0">
            @if(isset($icon))
                <div class="w-8 h-8 rounded-xl flex items-center justify-center bg-white dark:bg-slate-700 border border-slate-200/80 dark:border-slate-600 text-[#14AFC3] shadow-xs group-hover:bg-[#14AFC3] group-hover:border-[#14AFC3] group-hover:text-white transition-all duration-200 flex-shrink-0">
                    {{ $icon }}
                </div>
            @endif
            <div class="min-w-0">
                <span class="block font-bold text-[12.5px] text-[#152C4B] dark:text-slate-200 group-hover:text-[#0C6B78] dark:group-hover:text-[#14AFC3] truncate leading-tight transition-colors">{{ $slot }}</span>
                @if($sublabel)
                    <span class="block text-[10.5px] text-slate-400 dark:text-slate-400 truncate leading-tight mt-0.5">{{ $sublabel }}</span>
                @endif
            </div>
        </div>
        <svg width="15" height="15"
             class="text-slate-300 dark:text-slate-500 group-hover:text-[#14AFC3] transition-all transform rtl:rotate-180 ltr:group-hover:translate-x-1 rtl:group-hover:-translate-x-1 flex-shrink-0"
             fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </a>
@endif