@props([
    'label',
    'value',
    'valueId'     => null,
    'sublabel'    => null,
    'iconBg'      => 'bg-[#E5FAFC] dark:bg-[#14AFC3]/15',
    'iconColor'   => 'text-[#14AFC3]',
    'highlighted' => false,
])

@if($highlighted)
    {{-- ── Highlighted Card (Teal Gradient - Centered Layout) ── --}}
    <div {{ $attributes->merge(['class' => 'group relative rounded-2xl p-5 sm:p-6 text-white overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#14AFC3]/25 flex flex-col items-center justify-between text-center select-none']) }}
         style="background: linear-gradient(135deg, #14AFC3 0%, #0C6B78 100%);
                box-shadow: 0 10px 28px -4px rgba(20,175,195,0.35);">

        {{-- Ambient decorative background shapes --}}
        <div class="absolute -top-6 -right-6 w-24 h-24 rounded-full bg-white/10 pointer-events-none blur-xs"></div>
        <div class="absolute -bottom-6 -left-6 w-20 h-20 rounded-full bg-white/5 pointer-events-none blur-xs"></div>

        <div class="relative z-10 w-full flex flex-col items-center">
            {{-- Centered Icon Badge --}}
            <div class="w-13 h-13 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center mx-auto mb-3.5 shadow-xs group-hover:scale-110 group-hover:bg-white group-hover:text-[#0C6B78] text-white transition-all duration-300 flex-shrink-0">
                {{ $icon ?? '' }}
            </div>

            {{-- Centered Label --}}
            <div class="text-xs font-bold text-teal-100 uppercase tracking-wider mb-1 leading-tight text-center max-w-[95%] truncate">
                {{ $label }}
            </div>

            {{-- Centered Value / Metric --}}
            <div @if($valueId) id="{{ $valueId }}" @endif class="text-3xl sm:text-4xl font-black font-mono tracking-tight leading-none mb-3 text-white text-center">
                {{ $value }}
            </div>
        </div>

        {{-- Centered Sublabel / Telemetry Badge --}}
        @if($sublabel)
            <div class="relative z-10 w-full pt-3 border-t border-white/20 flex items-center justify-center">
                <span class="inline-flex items-center gap-1.5 bg-white/20 backdrop-blur-md text-white rounded-full px-3 py-0.5 text-[11px] font-bold">
                    <svg width="9" height="9" fill="currentColor" viewBox="0 0 24 24" class="rtl:rotate-90 flex-shrink-0">
                        <path d="M7 17L17 7M17 7H7M17 7v10"/>
                    </svg>
                    <span>{{ $sublabel }}</span>
                </span>
            </div>
        @endif
    </div>

@else
    {{-- ── Normal Card (Clean White / Dark Ready - Centered Layout) ── --}}
    <div {{ $attributes->merge(['class' => 'group relative rounded-2xl p-5 sm:p-6 bg-white dark:bg-slate-900 border border-slate-200/90 dark:border-slate-800 shadow-xs hover:border-[#14AFC3] hover:shadow-xl hover:shadow-[#14AFC3]/10 transition-all duration-300 hover:-translate-y-1 flex flex-col items-center justify-between text-center select-none']) }}>

        <div class="w-full flex flex-col items-center">
            {{-- Centered Icon Badge --}}
            <div class="w-13 h-13 rounded-2xl flex items-center justify-center mx-auto mb-3.5 shadow-xs group-hover:scale-110 group-hover:bg-[#14AFC3] group-hover:text-white transition-all duration-300 flex-shrink-0 {{ $iconBg }} {{ $iconColor }}">
                {{ $icon ?? '' }}
            </div>

            {{-- Centered Label --}}
            <div class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1 leading-tight text-center max-w-[95%] truncate">
                {{ $label }}
            </div>

            {{-- Centered Value / Metric --}}
            <div @if($valueId) id="{{ $valueId }}" @endif class="text-3xl sm:text-4xl font-black text-[#152C4B] dark:text-white font-mono tracking-tight leading-none mb-3 text-center">
                {{ $value }}
            </div>
        </div>

        {{-- Centered Sublabel / Telemetry Badge --}}
        @if($sublabel)
            <div class="w-full pt-3 border-t border-slate-100 dark:border-slate-800 flex items-center justify-center">
                <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-0.5 text-[11px] font-bold {{ $iconBg }} {{ $iconColor }}">
                    <svg width="9" height="9" fill="currentColor" viewBox="0 0 24 24" class="rtl:rotate-90 flex-shrink-0">
                        <path d="M7 17L17 7M17 7H7M17 7v10"/>
                    </svg>
                    <span>{{ $sublabel }}</span>
                </span>
            </div>
        @endif
    </div>
@endif