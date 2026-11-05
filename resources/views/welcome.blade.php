<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Mawidi') }} · {{ __('Enterprise Hospital OS') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ══════════════════════════════════════════════
           2026 ENTERPRISE SYSTEM DESIGN TOKENS
        ══════════════════════════════════════════════ */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            -webkit-tap-highlight-color: transparent;
        }

        :root {
            --primary: #14AFC3;
            --primary-dark: #0A6977;
            --primary-subtle: #EBFBFC;
            --navy-950: #060D17;
            --navy-900: #0B1626;
            --navy-800: #13243C;
            --surface: #FFFFFF;
            --canvas: #FAFCFE;
            --border-subtle: #E8EEF5;
            --border-strong: #D5DFEB;
            --text-heading: #0B192C;
            --text-body: #506175;
            --text-muted: #8E9FAA;
            --emerald: #10B981;
            --amber: #F59E0B;
            --violet: #8B5CF6;
        }

        html {
            scroll-behavior: smooth;
            text-rendering: optimizeLegibility;
        }

        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: var(--surface);
            color: var(--text-heading);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
            line-height: 1.5;
        }

        /* RTL & Arabic Typography Engine */
        [dir="rtl"] body, [dir="rtl"] * {
            font-family: 'Cairo', 'Plus Jakarta Sans', system-ui, sans-serif;
        }
        [dir="rtl"] h1, [dir="rtl"] h2, [dir="rtl"] h3,
        [dir="rtl"] p,  [dir="rtl"] span, [dir="rtl"] a {
            letter-spacing: 0 !important;
        }
        [dir="rtl"] h1 { line-height: 1.25 !important; }
        [dir="rtl"] h2 { line-height: 1.3 !important; }

        .mono { font-family: 'IBM Plex Mono', monospace !important; }

        ::selection { background: #14AFC3; color: #FFFFFF; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #F8FAFC; }
        ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #14AFC3; }

        /* Typography & Lighting */
        .text-gradient {
            background: linear-gradient(135deg, #14AFC3 0%, #0C6B78 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-gradient-dark {
            background: linear-gradient(135deg, #0B192C 0%, #1E3A5F 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Animation Choreography */
        @keyframes subtleFadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(0.5deg); }
        }
        @keyframes floatReverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(10px) rotate(-0.5deg); }
        }
        @keyframes radarPulse {
            0% { transform: scale(1); opacity: 0.9; }
            100% { transform: scale(2.8); opacity: 0; }
        }
        @keyframes dotPulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.35; transform: scale(0.85); }
        }

        .anim-fade { animation: subtleFadeUp 0.85s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .delay-1 { animation-delay: 0.12s; }
        .delay-2 { animation-delay: 0.22s; }
        .delay-3 { animation-delay: 0.32s; }
        .delay-4 { animation-delay: 0.42s; }

        .float-card-1 { animation: floatSlow 7s ease-in-out infinite; }
        .float-card-2 { animation: floatReverse 8.5s ease-in-out infinite; }
        .dot-ping { animation: dotPulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }

        .radar::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            background: inherit;
            animation: radarPulse 2.4s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        /* Glassmorphism & Surface Elevation */
        .glass-panel {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--border-subtle);
        }

        .dark-glass {
            background: rgba(11, 22, 38, 0.78);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Elevated Card Hover Mechanics */
        .interactive-card {
            transition: all 0.35s cubic-bezier(0.2, 0.8, 0.2, 1);
        }
        .interactive-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 50px -15px rgba(20, 175, 195, 0.14), 0 0 0 1px rgba(20, 175, 195, 0.25);
            border-color: rgba(20, 175, 195, 0.3) !important;
        }

        /* High-End Pill Button */
        .pill-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.25s ease;
        }
        .pill-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -120%;
            width: 50%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transform: skewX(-22deg);
            transition: left 0.65s ease;
        }
        .pill-btn:hover::after { left: 160%; }
        .pill-btn:hover { transform: translateY(-2px); box-shadow: 0 10px 24px -6px rgba(11, 25, 44, 0.3); }

        /* RTL Arrow transforms */
        [dir="rtl"] .arrow-dir { transform: scaleX(-1); }
        [dir="rtl"] .arrow-rotate { transform: rotate(180deg); }

        /* Background grids */
        .cyber-grid {
            background-image:
                linear-gradient(rgba(20, 175, 195, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(20, 175, 195, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .dark-cyber-grid {
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.035) 1px, transparent 1px);
            background-size: 48px 48px;
        }
    </style>
</head>
<body>

{{-- ══════════════════════════════════════════════
     NAVBAR: ULTRA-CLEAN FLOATING MINIMAL
══════════════════════════════════════════════ --}}
<header id="nav" class="sticky top-0 z-50 bg-white/90 backdrop-blur-xl border-b border-slate-100 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 h-20 flex items-center justify-between gap-6">

        {{-- Brand Logo --}}
        <a href="/" class="flex items-center gap-3.5 group text-decoration-none">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-[#14AFC3] via-[#0C6B78] to-[#0A4F59] p-0.5 shadow-lg shadow-[#14AFC3]/20 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                <div class="w-full h-full bg-white/10 rounded-[14px] flex items-center justify-center">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <rect x="3" y="4" width="18" height="17" rx="3.5" fill="white" fill-opacity="0.95"/>
                        <path d="M16 2v4M8 2v4" stroke="#14AFC3" stroke-width="2.2" stroke-linecap="round"/>
                        <path d="M3 10h18" stroke="#14AFC3" stroke-width="1.6"/>
                        <circle cx="16" cy="16.5" r="3.2" fill="#14AFC3"/>
                        <path d="M16 15v3M14.5 16.5h3" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <div class="flex items-center gap-1.5">
                <span class="text-2xl font-black tracking-tight text-[#0B192C]">Mawidi</span>
                <span class="w-2 h-2 rounded-full bg-[#14AFC3] self-end mb-1.5"></span>
            </div>
        </a>

        {{-- Center Nav Links (Clean without Telemetry) --}}
        <nav class="hidden md:flex items-center gap-1 bg-slate-50/80 p-1.5 rounded-full border border-slate-200/60 shadow-sm">
            <a href="#roles" class="px-6 py-2 text-sm font-semibold text-slate-600 hover:text-[#0B192C] hover:bg-white rounded-full transition-all">
                {{ __('Roles') }}
            </a>
            <a href="#features" class="px-6 py-2 text-sm font-semibold text-slate-600 hover:text-[#0B192C] hover:bg-white rounded-full transition-all">
                {{ __('Features') }}
            </a>
        </nav>

        {{-- Right Controls: Language & Action --}}
        <div class="flex items-center gap-3.5">
            {{-- Language Pill --}}
            <div class="flex items-center p-1 bg-slate-100/80 rounded-xl border border-slate-200/60 text-xs font-bold">
                <a href="{{ route('lang.switch', 'en') }}"
                   class="px-2.5 py-1.5 rounded-lg transition-all {{ app()->getLocale() === 'en' ? 'bg-white text-[#14AFC3] shadow-sm' : 'text-slate-400 hover:text-slate-600' }}">
                    EN
                </a>
                <a href="{{ route('lang.switch', 'ar') }}"
                   class="px-2.5 py-1.5 rounded-lg transition-all {{ app()->getLocale() === 'ar' ? 'bg-[#14AFC3] text-white shadow-sm shadow-[#14AFC3]/30' : 'text-slate-400 hover:text-slate-600' }}">
                    العربية
                </a>
            </div>

            <div class="h-6 w-px bg-slate-200 hidden sm:block"></div>

            {{-- Dynamic Auth Button --}}
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="pill-btn inline-flex items-center gap-2.5 px-6 py-2.5 rounded-full bg-[#0B192C] text-white text-sm font-bold tracking-tight shadow-lg shadow-slate-900/10">
                    <span>{{ __('Dashboard') }}</span>
                    <svg class="arrow-dir w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10"/>
                    </svg>
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="pill-btn inline-flex items-center gap-2.5 px-6 py-2.5 rounded-full bg-[#0B192C] text-white text-sm font-bold tracking-tight shadow-lg shadow-slate-900/10">
                    <span>{{ __('Log in') }}</span>
                    <svg class="arrow-dir w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10"/>
                    </svg>
                </a>
            @endauth
        </div>
    </div>
</header>


{{-- ══════════════════════════════════════════════
     HERO SECTION: 2026 ALGOFORT ARCHITECTURE
══════════════════════════════════════════════ --}}
<section class="relative min-h-[90vh] flex items-center pt-8 pb-16 bg-white overflow-hidden">
    {{-- Ambient Light --}}
    <div class="cyber-grid absolute inset-0 opacity-40 pointer-events-none"></div>
    <div class="absolute -top-32 right-1/4 w-[600px] h-[600px] rounded-full bg-gradient-to-br from-[#14AFC3]/8 to-transparent blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-12 w-full relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

            {{-- ── LEFT CONTENT (Column 7) ── --}}
            <div class="lg:col-span-7 pt-4">

                {{-- Status Badge with connecting rule (Exact ALGOFORT Pattern) --}}
                <div class="anim-fade flex items-center gap-3.5 mb-8">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-slate-200/90 shadow-sm">
                        <span class="radar relative w-2 h-2 rounded-full bg-[#14AFC3] shrink-0"></span>
                        <span class="text-xs font-bold text-[#0B192C] tracking-wide uppercase">{{ __('Hospital OS') }}</span>
                    </div>
                    <span class="w-8 h-px bg-slate-300"></span>
                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        {{ __('Enterprise Health Operations') }}
                    </span>
                </div>

                {{-- Giant Editorial Headline --}}
                <h1 class="anim-fade delay-1 text-5xl sm:text-6xl lg:text-[76px] font-black text-[#0B192C] tracking-tight leading-[1.04] mb-7">
                    {{ __('The Operating') }}<br>
                    {{ __('Layer Behind') }}<br>
                    <span class="text-gradient">{{ __('Every Patient.') }}</span>
                </h1>

                {{-- Purpose Subtitle --}}
                <p class="anim-fade delay-2 text-lg text-slate-600 leading-relaxed max-w-xl mb-10 font-normal">
                    {{ __('Mawidi connects every hospital role into one real-time system. One login per employee. Complete operational clarity.') }}
                </p>

                {{-- Action Group --}}
                <div class="anim-fade delay-3 flex flex-wrap items-center gap-4 mb-14">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="pill-btn inline-flex items-center gap-3 px-8 py-4 rounded-full bg-[#0B192C] text-white text-base font-bold shadow-xl shadow-slate-900/15">
                            <span>{{ __('Go to Dashboard') }}</span>
                            <svg class="arrow-dir w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10"/>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="pill-btn inline-flex items-center gap-3 px-8 py-4 rounded-full bg-[#0B192C] text-white text-base font-bold shadow-xl shadow-slate-900/15">
                            <span>{{ __('Log in to your account') }}</span>
                            <svg class="arrow-dir w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10"/>
                            </svg>
                        </a>
                    @endauth

                    <a href="#roles"
                       class="inline-flex items-center gap-3 px-6 py-4 rounded-full bg-white border border-slate-200 text-[#0B192C] hover:border-[#14AFC3]/40 hover:bg-[#14AFC3]/5 text-sm font-bold transition-all shadow-sm">
                        <span class="w-7 h-7 rounded-full bg-slate-100 flex items-center justify-center text-slate-700">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </span>
                        <span>{{ __('See all roles') }}</span>
                    </a>
                </div>

                {{-- Prominent Stats Row --}}
                <div class="anim-fade delay-4 pt-8 border-t border-slate-200/80 flex items-center flex-wrap gap-8 sm:gap-12">
                    <div>
                        <div class="text-3xl sm:text-4xl font-black text-[#0B192C] tracking-tight">4+</div>
                        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider mt-1">{{ __('Integrated Roles') }}</div>
                    </div>
                    <div class="w-px h-10 bg-slate-200 hidden sm:block"></div>
                    <div>
                        <div class="text-3xl sm:text-4xl font-black text-[#0B192C] tracking-tight">100%</div>
                        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider mt-1">{{ __('Audit Traceability') }}</div>
                    </div>
                    <div class="w-px h-10 bg-slate-200 hidden sm:block"></div>
                    <div>
                        <div class="text-3xl sm:text-4xl font-black text-[#14AFC3] tracking-tight mono">TLS</div>
                        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider mt-1">{{ __('Bank-Grade Cipher') }}</div>
                    </div>
                </div>

            </div>

            {{-- ── RIGHT VISUAL CANVAS (Column 5) ── --}}
            <div class="lg:col-span-5 relative flex items-center justify-center min-h-[500px]">

                {{-- Deep Sculpted Circle (Signature ALGOFORT Graphic) --}}
                <div class="absolute w-[440px] h-[440px] rounded-full bg-gradient-to-tr from-[#051E24] via-[#0C3B43] to-[#0A262C] shadow-2xl shadow-[#0C3B43]/30 pointer-events-none -right-8 lg:-right-4"></div>

                {{-- Decorative Ambient Blur --}}
                <div class="absolute top-4 -right-12 w-32 h-32 rounded-full bg-[#14AFC3]/20 blur-2xl pointer-events-none"></div>

                {{-- ── 3D Floating Hospital OS Laptop/Canvas ── --}}
                <div class="relative z-20 w-full max-w-[420px] rounded-3xl bg-white/95 p-3 shadow-2xl shadow-slate-900/25 border border-slate-200/80 backdrop-blur-xl">

                    {{-- Window Header Bar --}}
                    <div class="flex items-center justify-between px-3 py-2 bg-slate-900 rounded-2xl mb-2 text-white">
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#EF4444]"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-[#F59E0B]"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-[#10B981]"></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="mono text-[10px] text-slate-400">mawidi.core.v4</span>
                            <span class="radar relative w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                        </div>
                    </div>

                    {{-- Mockup Clinical Interior --}}
                    <div class="p-3 bg-slate-50/70 rounded-2xl border border-slate-100">

                        {{-- Metric Bar Top --}}
                        <div class="grid grid-cols-3 gap-2 mb-3">
                            <div class="p-2.5 bg-white rounded-xl border border-slate-200/60 shadow-xs">
                                <div class="text-[10px] text-slate-500 font-semibold">{{ __('Queue Load') }}</div>
                                <div class="text-base font-black text-[#0B192C]">87%</div>
                                <div class="w-full bg-slate-100 h-1 rounded-full mt-1.5 overflow-hidden">
                                    <div class="bg-[#14AFC3] h-full w-[87%] rounded-full"></div>
                                </div>
                            </div>
                            <div class="p-2.5 bg-white rounded-xl border border-slate-200/60 shadow-xs">
                                <div class="text-[10px] text-slate-500 font-semibold">{{ __('Triage Avg') }}</div>
                                <div class="text-base font-black text-[#10B981]">4.1m</div>
                                <div class="w-full bg-slate-100 h-1 rounded-full mt-1.5 overflow-hidden">
                                    <div class="bg-[#10B981] h-full w-[65%] rounded-full"></div>
                                </div>
                            </div>
                            <div class="p-2.5 bg-white rounded-xl border border-slate-200/60 shadow-xs">
                                <div class="text-[10px] text-slate-500 font-semibold">{{ __('Staff Live') }}</div>
                                <div class="text-base font-black text-[#8B5CF6]">34</div>
                                <div class="w-full bg-slate-100 h-1 rounded-full mt-1.5 overflow-hidden">
                                    <div class="bg-[#8B5CF6] h-full w-[92%] rounded-full"></div>
                                </div>
                            </div>
                        </div>

                        {{-- Simulated Live Waveform / Patient Flow Chart --}}
                        <div class="bg-white p-3 rounded-xl border border-slate-200/60 shadow-xs mb-3">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-bold text-slate-700 uppercase tracking-wider">{{ __('Live Patient Intake Telemetry') }}</span>
                                <span class="text-[10px] text-[#14AFC3] font-bold mono">32 req/min</span>
                            </div>
                            <svg class="w-full h-12" viewBox="0 0 300 60" fill="none">
                                <path d="M0 45 Q 30 20, 60 35 T 120 15 T 180 38 T 240 10 T 300 28" stroke="#14AFC3" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                                <path d="M0 45 Q 30 20, 60 35 T 120 15 T 180 38 T 240 10 T 300 28 L 300 60 L 0 60 Z" fill="url(#waveGrad)" opacity="0.15"/>
                                <defs>
                                    <linearGradient id="waveGrad" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#14AFC3"/>
                                        <stop offset="100%" stop-color="#FFFFFF"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>

                        {{-- Active Patient Log Mini Table --}}
                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between p-2 rounded-lg bg-white border border-slate-100 text-xs">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-[#10B981]"></div>
                                    <span class="font-bold text-slate-800">Aisha Al-Rashed</span>
                                </div>
                                <span class="text-[10px] font-semibold text-slate-500">{{ __('Clinic #04') }}</span>
                                <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[9px] uppercase">{{ __('Checked In') }}</span>
                            </div>
                            <div class="flex items-center justify-between p-2 rounded-lg bg-white border border-slate-100 text-xs">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-[#F59E0B]"></div>
                                    <span class="font-bold text-slate-800">Tariq Mansour</span>
                                </div>
                                <span class="text-[10px] font-semibold text-slate-500">{{ __('Room 3B') }}</span>
                                <span class="px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 font-bold text-[9px] uppercase">{{ __('In Session') }}</span>
                            </div>
                        </div>

                    </div>

                    {{-- Card Base Bar --}}
                    <div class="mt-2.5 px-3 py-1.5 flex items-center justify-between text-[10px] font-semibold text-slate-400">
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 dot-ping"></span>
                            {{ __('All Encrypted Channels Operational') }}
                        </span>
                        <span class="mono text-[#14AFC3]">0.14ms</span>
                    </div>

                </div>

                {{-- ── Floating Widget 1: Top Right (Performance Index) ── --}}
                <div class="float-card-1 absolute -top-4 -right-2 z-30 bg-white/95 backdrop-blur-md p-3.5 rounded-2xl border border-slate-200/90 shadow-xl shadow-slate-900/10 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#14AFC3] to-[#0C6B78] flex items-center justify-center text-white shadow-md shadow-[#14AFC3]/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-[#0B192C]">{{ __('Intake Speed') }}</div>
                        <div class="text-[11px] text-slate-500 font-medium">4.2s {{ __('per patient') }}</div>
                    </div>
                    <div class="ms-2 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold">
                        +24%
                    </div>
                </div>

                {{-- ── Floating Widget 2: Bottom Left (Live Accuracy SLA) ── --}}
                <div class="float-card-2 absolute -bottom-6 -left-4 z-30 bg-white/95 backdrop-blur-md p-3.5 rounded-2xl border border-slate-200/90 shadow-xl shadow-slate-900/10 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center text-white">
                        <svg class="w-5 h-5 text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-[#0B192C]">{{ __('Security SLA') }}</div>
                        <div class="text-[11px] text-slate-500 font-medium">99.98% {{ __('Guaranteed') }}</div>
                    </div>
                    <span class="w-2 h-2 rounded-full bg-emerald-500 dot-ping"></span>
                </div>

                {{-- Hand-drawn Style Vector Line Accent --}}
                <svg class="absolute -top-10 left-12 w-20 h-20 text-[#14AFC3]/30 pointer-events-none hidden sm:block" viewBox="0 0 100 100" fill="none">
                    <path d="M10 80 Q 50 10, 90 40" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-dasharray="4 4"/>
                    <path d="M85 30 L 92 42 L 80 44" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </div>

        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════
     ROLES: 2026 BENTO WORKFLOW GRID (REDESIGNED)
══════════════════════════════════════════════ --}}
<section id="roles" class="py-24 bg-gradient-to-b from-white via-[#FAFCFE] to-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">

        {{-- Professional Elegant Header (No Awkward Gaps) --}}
        <div class="max-w-3xl mx-auto text-center mb-16">
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-[#14AFC3]/10 text-[#0C6B78] text-xs font-bold uppercase tracking-wider mb-5 border border-[#14AFC3]/20 shadow-xs">
                <span class="w-2 h-2 rounded-full bg-[#14AFC3] dot-ping"></span>
                {{ __('Unified Role Architecture') }}
            </div>
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black text-[#0B192C] tracking-tight leading-[1.12] mb-5">
                {{ __('One platform,') }}<br>
                <span class="text-gradient">{{ __('four tailored workflows.') }}</span>
            </h2>
            <p class="text-base sm:text-lg text-slate-500 leading-relaxed font-normal max-w-2xl mx-auto">
                {{ __('Every employee sees exactly what their role needs — nothing more. Access is controlled by the administrator.') }}
            </p>
        </div>

        {{-- Bento Grid for 4 Roles --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- 1. System Administrator --}}
            <div class="interactive-card relative overflow-hidden rounded-3xl p-8 lg:p-10 bg-gradient-to-br from-[#060D17] via-[#0B1A2D] to-[#082236] text-white border border-slate-800 shadow-xl shadow-slate-900/10">
                <div class="absolute -right-10 -bottom-10 w-64 h-64 rounded-full bg-[#14AFC3]/15 blur-3xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-14 h-14 rounded-2xl bg-[#14AFC3] text-white flex items-center justify-center shadow-lg shadow-[#14AFC3]/40">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span class="mono px-3 py-1 rounded-full bg-white/10 text-[#14AFC3] text-xs font-bold border border-white/10">ADM-01</span>
                        </div>
                        <h3 class="text-2xl font-bold tracking-tight mb-3">{{ __('System Administrator') }}</h3>
                        <p class="text-sm text-slate-300 leading-relaxed mb-6 font-normal">
                            {{ __('Full control. Provisions employee accounts, manages departments and oversees system health.') }}
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 pt-6 border-t border-white/10">
                        @foreach(['Accounts', 'Departments', 'System Logs', 'Access Control'] as $pill)
                            <span class="px-3 py-1 rounded-lg bg-white/5 border border-white/10 text-xs font-semibold text-slate-300">
                                {{ __($pill) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- 2. Hospital Manager --}}
            <div class="interactive-card relative overflow-hidden rounded-3xl p-8 lg:p-10 bg-white text-slate-900 border border-slate-200/90 shadow-sm">
                <div class="flex flex-col justify-between h-full">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-[#7C3AED] to-[#5B21B6] text-white flex items-center justify-center shadow-lg shadow-violet-500/20">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <span class="mono px-3 py-1 rounded-full bg-violet-50 text-violet-700 text-xs font-bold border border-violet-100">MGR-02</span>
                        </div>
                        <h3 class="text-2xl font-bold tracking-tight mb-3 text-[#0B192C]">{{ __('Hospital Manager') }}</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6 font-normal">
                            {{ __('Executive visibility. Monitors patient volume, waiting times and department workload — no clinical access.') }}
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 pt-6 border-t border-slate-100">
                        @foreach(['Analytics', 'Reports', 'Workload', 'Staff View'] as $pill)
                            <span class="px-3 py-1 rounded-lg bg-slate-50 border border-slate-200/80 text-xs font-semibold text-slate-600">
                                {{ __($pill) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- 3. Doctor --}}
            <div class="interactive-card relative overflow-hidden rounded-3xl p-8 lg:p-10 bg-white text-slate-900 border border-slate-200/90 shadow-sm">
                <div class="flex flex-col justify-between h-full">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-[#059669] to-[#047857] text-white flex items-center justify-center shadow-lg shadow-emerald-500/20">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                </svg>
                            </div>
                            <span class="mono px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-100">DOC-03</span>
                        </div>
                        <h3 class="text-2xl font-bold tracking-tight mb-3 text-[#0B192C]">{{ __('Doctor') }}</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6 font-normal">
                            {{ __('Clinical focus. Views the daily schedule, patient list and writes medical notes for every consultation.') }}
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 pt-6 border-t border-slate-100">
                        @foreach(['Schedule', 'Patients', 'Medical Notes', 'Consultations'] as $pill)
                            <span class="px-3 py-1 rounded-lg bg-slate-50 border border-slate-200/80 text-xs font-semibold text-slate-600">
                                {{ __($pill) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- 4. Receptionist --}}
            <div class="interactive-card relative overflow-hidden rounded-3xl p-8 lg:p-10 bg-white text-slate-900 border border-slate-200/90 shadow-sm">
                <div class="flex flex-col justify-between h-full">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-[#EA580C] to-[#C2410C] text-white flex items-center justify-center shadow-lg shadow-orange-500/20">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="mono px-3 py-1 rounded-full bg-orange-50 text-orange-700 text-xs font-bold border border-orange-100">REC-04</span>
                        </div>
                        <h3 class="text-2xl font-bold tracking-tight mb-3 text-[#0B192C]">{{ __('Receptionist') }}</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6 font-normal">
                            {{ __('Front-desk command. Registers patients, manages the live queue and books appointments without friction.') }}
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 pt-6 border-t border-slate-100">
                        @foreach(['Queue', 'Check-In', 'Appointments', 'Patients'] as $pill)
                            <span class="px-3 py-1 rounded-lg bg-slate-50 border border-slate-200/80 text-xs font-semibold text-slate-600">
                                {{ __($pill) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════
     FEATURES: CAPABILITIES MATRIX
══════════════════════════════════════════════ --}}
<section id="features" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">

        {{-- Section Header --}}
        <div class="max-w-2xl mx-auto text-center mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-100 text-slate-700 text-xs font-bold uppercase tracking-wider mb-4 border border-slate-200">
                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                {{ __('Platform Capabilities') }}
            </div>
            <h2 class="text-4xl sm:text-5xl font-black text-[#0B192C] tracking-tight leading-tight mb-4">
                {{ __('Everything a hospital team') }}<br>{{ __('needs — in one place') }}
            </h2>
            <p class="text-base text-slate-500 leading-relaxed font-normal">
                {{ __('Built specifically to reduce wait time, eliminate double-bookings, and preserve clinical records forever.') }}
            </p>
        </div>

        {{-- 3-Column Features Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'Role-Based Access', 'Each employee gets exactly the permissions their role requires — enforced at system level.'],
                ['M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4', 'Live Patient Queue', 'Real-time check-in tracking with status updates and instant doctor notifications.'],
                ['M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'Department Analytics', 'Live workload per department with alerts when capacity thresholds are breached.'],
                ['M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'Waiting Time Monitor', 'Automatic tracking of patient wait times — clinic by clinic, shift by shift.'],
                ['M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z', 'Medical Notes', 'Doctors add structured clinical notes per patient — visible to authorised staff only.'],
                ['M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'Executive Reports', 'One-click report generation — exportable, timestamped and audit-ready.']
            ] as [$icon, $title, $desc])
                <div class="interactive-card p-8 rounded-3xl bg-[#FAFCFE] border border-slate-200/70 hover:bg-white flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-[#14AFC3]/10 text-[#14AFC3] flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="{{ $icon }}"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#0B192C] tracking-tight mb-2.5">{{ __($title) }}</h3>
                        <p class="text-sm text-slate-500 leading-relaxed font-normal">{{ __($desc) }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>


{{-- ══════════════════════════════════════════════
     CALL TO ACTION: DARK IMMERSIVE BANNER
══════════════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="relative overflow-hidden rounded-[36px] bg-gradient-to-br from-[#060D17] via-[#0B192C] to-[#0A2E3D] px-8 py-16 sm:px-16 sm:py-20 shadow-2xl shadow-slate-900/30">

            {{-- Background Grid & Glows --}}
            <div class="dark-cyber-grid absolute inset-0 opacity-40 pointer-events-none"></div>
            <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-[#14AFC3]/20 blur-3xl pointer-events-none"></div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-[#14AFC3] text-xs font-bold uppercase tracking-wider mb-6 border border-white/10">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                        {{ __('Enterprise Ready') }}
                    </div>
                    <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight mb-6">
                        {{ __('Your hospital.') }}<br>
                        <span class="text-gradient">{{ __('Finally connected.') }}</span>
                    </h2>
                    <p class="text-base sm:text-lg text-slate-300 max-w-xl font-normal leading-relaxed">
                        {{ __('Every shift starts from one login. Every decision, informed by live data.') }}
                    </p>
                </div>

                <div class="lg:col-span-4 flex flex-col items-start lg:items-end gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="pill-btn inline-flex items-center justify-center gap-3 w-full sm:w-auto px-8 py-4 rounded-full bg-white text-[#0B192C] text-base font-bold shadow-xl shadow-black/20 hover:bg-slate-100">
                            <span>{{ __('Open Dashboard') }}</span>
                            <svg class="arrow-dir w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10"/>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="pill-btn inline-flex items-center justify-center gap-3 w-full sm:w-auto px-8 py-4 rounded-full bg-white text-[#0B192C] text-base font-bold shadow-xl shadow-black/20 hover:bg-slate-100">
                            <span>{{ __('Log in Now') }}</span>
                            <svg class="arrow-dir w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10"/>
                            </svg>
                        </a>
                    @endauth
                    <span class="text-xs text-slate-400 font-medium">
                        {{ __('Admin assigns all access.') }}
                    </span>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════
     FOOTER: MODERN MINIMALIST
══════════════════════════════════════════════ --}}
<footer class="bg-white border-t border-slate-100 py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col sm:flex-row items-center justify-between gap-6">

        {{-- Brand --}}
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-[#14AFC3] to-[#0C6B78] flex items-center justify-center text-white">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="4" width="18" height="17" rx="3.5" fill="white" fill-opacity="0.95"/>
                    <circle cx="16" cy="16.5" r="3" fill="#14AFC3"/>
                    <path d="M16 15v3M14.5 16.5h3" stroke="white" stroke-width="1.3" stroke-linecap="round"/>
                </svg>
            </div>
            <span class="text-lg font-black text-[#0B192C] tracking-tight">Mawidi</span>
            <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-widest mono">Enterprise Hospital OS</span>
        </div>

        {{-- Copyright & Info --}}
        <div class="text-xs text-slate-400 font-medium text-center">
            &copy; {{ date('Y') }} Mawidi. {{ __('Secure. Role-based. Built for hospital operations.') }}
        </div>

        {{-- Operational Telemetry Pill --}}
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200/80 text-[11px] font-bold text-emerald-700">
            <span class="w-2 h-2 rounded-full bg-emerald-500 dot-ping"></span>
            <span>{{ __('All Systems Operational') }}</span>
        </div>

    </div>
</footer>

{{-- Interactive Scroll Shadow Script --}}
<script>
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('nav');
        if (window.scrollY > 20) {
            nav.classList.add('shadow-md', 'border-slate-200/80');
            nav.classList.remove('border-slate-100');
        } else {
            nav.classList.remove('shadow-md', 'border-slate-200/80');
            nav.classList.add('border-slate-100');
        }
    });
</script>

</body>
</html>
