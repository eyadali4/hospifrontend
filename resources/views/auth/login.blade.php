<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Log in') }} | {{ config('app.name', 'Mawidi') }} · {{ __('Enterprise Hospital OS') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ══════════════════════════════════════════════
           2026 DESIGN TOKENS (UNIFIED WITH WELCOME)
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
            --text-heading: #0B192C;
            --text-body: #506175;
            --text-muted: #8E9FAA;
            --emerald: #10B981;
        }

        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: var(--surface);
            color: var(--text-heading);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* RTL & Typography */
        [dir="rtl"] body, [dir="rtl"] * {
            font-family: 'Cairo', 'Plus Jakarta Sans', system-ui, sans-serif;
        }
        [dir="rtl"] h1, [dir="rtl"] h2, [dir="rtl"] h3,
        [dir="rtl"] p,  [dir="rtl"] span, [dir="rtl"] a {
            letter-spacing: 0 !important;
        }

        .mono { font-family: 'IBM Plex Mono', monospace !important; }

        ::selection { background: #14AFC3; color: #FFFFFF; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 9999px; }

        /* Gradients */
        .text-gradient {
            background: linear-gradient(135deg, #14AFC3 0%, #0C6B78 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(22px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes radarPulse {
            0%   { transform: scale(1); opacity: 0.9; }
            100% { transform: scale(2.6); opacity: 0; }
        }
        @keyframes floatWidget {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-6px); }
        }
        @keyframes dotPulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%      { opacity: 0.35; transform: scale(0.85); }
        }

        .anim-up   { animation: fadeUp 0.75s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .delay-1   { animation-delay: 0.10s; }
        .delay-2   { animation-delay: 0.20s; }
        .delay-3   { animation-delay: 0.30s; }

        .float-anim { animation: floatWidget 6s ease-in-out infinite; }
        .dot-ping   { animation: dotPulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }

        .radar::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            background: inherit;
            animation: radarPulse 2.4s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        /* Inputs & Interactive Fields */
        .field-group { position: relative; }
        .field-group label {
            transition: color 0.2s ease;
        }
        .field-group:focus-within label {
            color: #14AFC3 !important;
        }

        .input-box {
            width: 100%;
            background: #FAFCFE;
            border: 1.5px solid #E2E8F0;
            border-radius: 16px;
            padding-block: 15px;
            padding-inline-start: 46px;
            padding-inline-end: 18px;
            font-size: 14.5px;
            color: #0B192C;
            font-weight: 600;
            outline: none;
            transition: all 0.25s cubic-bezier(0.2, 0.8, 0.2, 1);
            box-shadow: 0 1px 2px rgba(11, 25, 44, 0.02);
        }
        .input-box.has-toggle {
            padding-inline-end: 48px;
        }
        .input-box:hover {
            background: #FFFFFF;
            border-color: #CBD5E1;
        }
        .input-box:focus {
            background: #FFFFFF;
            border-color: #14AFC3;
            box-shadow: 0 0 0 4px rgba(20, 175, 195, 0.12), 0 8px 20px -6px rgba(20, 175, 195, 0.15);
        }

        .input-icon {
            position: absolute;
            inset-inline-start: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            pointer-events: none;
            transition: all 0.2s ease;
        }
        .field-group:focus-within .input-icon {
            color: #14AFC3;
            transform: translateY(-50%) scale(1.08);
        }

        /* Password Toggle */
        .toggle-btn {
            position: absolute;
            inset-inline-end: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94A3B8;
            background: transparent;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .toggle-btn:hover {
            color: #0B192C;
            background: #F1F5F9;
        }

        /* Checkbox */
        .custom-check {
            appearance: none;
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border: 1.5px solid #CBD5E1;
            border-radius: 6px;
            background: #FAFCFE;
            cursor: pointer;
            display: grid;
            place-content: center;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }
        .custom-check:hover {
            border-color: #14AFC3;
            background: #FFFFFF;
        }
        .custom-check::before {
            content: "";
            width: 9.5px;
            height: 9.5px;
            transform: scale(0);
            transition: 120ms transform ease;
            box-shadow: inset 1em 1em white;
            clip-path: polygon(14% 44%, 0 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
        }
        .custom-check:checked {
            background: #14AFC3;
            border-color: #14AFC3;
            box-shadow: 0 3px 8px rgba(20, 175, 195, 0.35);
        }
        .custom-check:checked::before {
            transform: scale(1);
        }

        /* Signature 2026 Pill Button (Same as Welcome CTA) */
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
        .pill-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px -6px rgba(11, 25, 44, 0.3);
        }
        .pill-btn:active { transform: translateY(0); }

        /* RTL Arrow Flip */
        [dir="rtl"] .arrow-dir { transform: scaleX(-1); }
        [dir="rtl"] .arrow-rotate { transform: rotate(180deg); }

        .cyber-grid {
            background-image:
                linear-gradient(rgba(20, 175, 195, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(20, 175, 195, 0.04) 1px, transparent 1px);
            background-size: 36px 36px;
        }
    </style>
</head>
<body class="selection:bg-[#14AFC3] selection:text-white">

<div class="min-h-screen flex flex-col lg:flex-row">

    {{-- ════════════════════════════════════════════════════════════
         LEFT SIDE: 2026 LUXURY STUDIO BRAND PANEL (ALGOFORT VIBE)
    ════════════════════════════════════════════════════════════ --}}
    <div class="hidden lg:flex lg:w-[48%] xl:w-[50%] relative overflow-hidden bg-gradient-to-br from-[#060D17] via-[#0B1A2C] to-[#0A2633] text-white flex-col justify-between p-10 xl:p-14 border-e border-slate-800/80">

        {{-- Ambient Cyber Grid & Radial Mesh Lights --}}
        <div class="cyber-grid absolute inset-0 opacity-20 pointer-events-none"></div>
        <div class="absolute -top-32 -left-32 w-[520px] h-[520px] rounded-full bg-[#14AFC3]/12 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-[480px] h-[480px] rounded-full bg-[#0C6B78]/20 blur-3xl pointer-events-none"></div>

        {{-- 1. TOP BRAND HEADER --}}
        <div class="relative z-10 flex items-center justify-between">
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
                    <span class="text-2xl font-black tracking-tight text-white">Mawidi</span>
                    <span class="w-2 h-2 rounded-full bg-[#14AFC3] self-end mb-1"></span>
                </div>
            </a>

            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/10 text-xs font-bold mono text-[#14AFC3]">
                <span class="radar relative w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                <span>SEC-OS 2026</span>
            </div>
        </div>

        {{-- 2. CENTER EDITORIAL SHOWCASE & BALANCED TELEMETRY WIDGET --}}
        <div class="relative z-10 my-auto py-6 max-w-xl space-y-6">

            {{-- Status Badge --}}
            <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-[#14AFC3]/10 border border-[#14AFC3]/20 text-[#14AFC3] text-xs font-bold uppercase tracking-wider">
                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] dot-ping"></span>
                <span>{{ __('Mawidi · Staff Access') }}</span>
            </div>

            {{-- Big Editorial Headline --}}
            <div>
                <h1 class="text-4xl xl:text-5xl font-black text-white tracking-tight leading-[1.12] mb-3">
                    {{ __('Right on') }}<br>
                    <span class="text-gradient">{{ __('schedule.') }}</span>
                </h1>
                <p class="text-sm xl:text-base text-slate-300 font-normal leading-relaxed">
                    {{ __('One login connects reception, care and reporting — appointments, queues and patient records, kept in sync across every role.') }}
                </p>
            </div>

            {{-- 3D-styled Telemetry Card --}}
            <div class="float-anim p-5 rounded-2xl bg-white/[0.06] border border-white/10 backdrop-blur-xl shadow-2xl space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-white/10">
                    <div class="flex items-center gap-2.5">
                        <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 dot-ping"></div>
                        <span class="text-xs font-bold text-white tracking-wide uppercase">{{ __('Zero-Trust Clinical Auth') }}</span>
                    </div>
                    <span class="mono text-[10px] text-slate-400">TLS 1.3 / AES-256</span>
                </div>

                <div class="grid grid-cols-3 gap-3">
                    <div class="p-3 rounded-xl bg-white/5 border border-white/5">
                        <div class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider mb-1">{{ __('Audit Status') }}</div>
                        <div class="text-sm font-bold text-white flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            100%
                        </div>
                    </div>
                    <div class="p-3 rounded-xl bg-white/5 border border-white/5">
                        <div class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider mb-1">{{ __('Active Sessions') }}</div>
                        <div class="text-sm font-bold text-white mono">24 live</div>
                    </div>
                    <div class="p-3 rounded-xl bg-white/5 border border-white/5">
                        <div class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider mb-1">{{ __('Access Tier') }}</div>
                        <div class="text-sm font-bold text-[#14AFC3] uppercase tracking-wider">Role-Based</div>
                    </div>
                </div>

                {{-- Live Gateway Telemetry Strip (Harmonizes Vertical Height) --}}
                <div class="pt-3 border-t border-white/10 flex items-center justify-between text-[11px] text-slate-400 font-medium">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                        <span class="text-slate-300">{{ __('Hospital Central Data Core') }}</span>
                    </div>
                    <span class="mono text-[#14AFC3] font-bold">12ms · {{ __('Sync Active') }}</span>
                </div>
            </div>

            {{-- 3 Clinical Trust Pillars (Fills the Canvas Professionally) --}}
            <div class="grid grid-cols-3 gap-3 pt-1">
                <div class="p-3 rounded-xl bg-white/[0.03] border border-white/5 flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-[#14AFC3]/10 text-[#14AFC3] flex items-center justify-center shrink-0">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-xs font-bold text-white block truncate">{{ __('Zero-Trust') }}</span>
                        <span class="text-[10px] text-slate-400 block truncate">{{ __('End-to-End') }}</span>
                    </div>
                </div>

                <div class="p-3 rounded-xl bg-white/[0.03] border border-white/5 flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-[#14AFC3]/10 text-[#14AFC3] flex items-center justify-center shrink-0">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-xs font-bold text-white block truncate">{{ __('Real-Time') }}</span>
                        <span class="text-[10px] text-slate-400 block truncate">{{ __('Queue Sync') }}</span>
                    </div>
                </div>

                <div class="p-3 rounded-xl bg-white/[0.03] border border-white/5 flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-[#14AFC3]/10 text-[#14AFC3] flex items-center justify-center shrink-0">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-xs font-bold text-white block truncate">{{ __('HIPAA-Ready') }}</span>
                        <span class="text-[10px] text-slate-400 block truncate">{{ __('Compliance') }}</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- 3. BOTTOM FOOTER INFO --}}
        <div class="relative z-10 flex items-center justify-between pt-5 border-t border-white/10 text-xs text-slate-400">
            <span class="mono tracking-wider">&copy; {{ date('Y') }} {{ __('MAWIDI HOSPITAL OS') }}</span>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <span class="text-slate-300 font-semibold">{{ __('All Security Gateways Nominal') }}</span>
            </div>
        </div>

    </div>


    {{-- ════════════════════════════════════════════════════════════
         RIGHT SIDE: CLEAN, CENTERED FORM CANVAS (2026 UX)
    ════════════════════════════════════════════════════════════ --}}
    <div class="flex-1 flex flex-col justify-between p-6 sm:p-10 lg:p-14 bg-white relative">

        {{-- ── Top Navigation Bar: Language Switcher Only (Back to home removed) ── --}}
        <div class="flex items-center justify-end w-full max-w-md mx-auto mb-6">
            {{-- Language Switcher Pill --}}
            <div class="flex items-center p-1 bg-slate-100/80 rounded-xl border border-slate-200/60 text-xs font-bold">
                <a href="{{ route('lang.switch', 'en') }}"
                   class="px-2.5 py-1 rounded-lg transition-all {{ app()->getLocale() === 'en' ? 'bg-white text-[#14AFC3] shadow-xs' : 'text-slate-400 hover:text-slate-600' }}">
                    EN
                </a>
                <a href="{{ route('lang.switch', 'ar') }}"
                   class="px-2.5 py-1 rounded-lg transition-all {{ app()->getLocale() === 'ar' ? 'bg-[#14AFC3] text-white shadow-xs' : 'text-slate-400 hover:text-slate-600' }}">
                    العربية
                </a>
            </div>
        </div>

        {{-- ── Centered Form Container ── --}}
        <div class="w-full max-w-md mx-auto my-auto py-4">

            {{-- Mobile Brand Logo Header (Visible only on smaller screens) --}}
            <div class="lg:hidden flex flex-col items-center text-center mb-8">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#14AFC3] to-[#0C6B78] flex items-center justify-center text-white mb-3 shadow-lg shadow-[#14AFC3]/20">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <rect x="3" y="4" width="18" height="17" rx="3.5" fill="white" fill-opacity="0.95"/>
                        <circle cx="16" cy="16.5" r="3" fill="#14AFC3"/>
                        <path d="M16 15v3M14.5 16.5h3" stroke="white" stroke-width="1.4" stroke-linecap="round"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-black text-[#0B192C]">Mawidi</h1>
                <p class="mono text-xs font-bold text-[#14AFC3] uppercase tracking-wider">Hospital OS</p>
            </div>

            {{-- Form Title Header --}}
            <div class="anim-up text-center mb-8">
                <h2 class="text-3xl font-black text-[#0B192C] tracking-tight mb-2.5">
                    {{ __('Staff Login') }}
                </h2>
                <p class="text-sm text-slate-500 font-normal leading-relaxed max-w-xs mx-auto">
                    {{ __('Sign in with the Employee ID and Access Code issued by your administrator.') }}
                </p>
            </div>

            {{-- Error Flash Notification --}}
            @if($errors->any())
                <div class="anim-up mb-6 flex items-center gap-3 p-4 rounded-2xl bg-rose-50 border border-rose-200/80 text-rose-700 text-sm font-semibold shadow-xs">
                    <svg class="w-5 h-5 shrink-0 text-rose-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                        <path stroke-linecap="round" d="M12 8v4M12 16h.01"/>
                    </svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            {{-- Main Login Form --}}
            <form method="POST" action="{{ route('login') }}" class="anim-up delay-1 space-y-5" id="loginForm">
                @csrf

                {{-- 1. Employee ID --}}
                <div class="field-group">
                    <label for="employee_id" class="block mb-2 text-xs font-bold uppercase tracking-wider text-slate-600 mono">
                        {{ __('Employee ID') }}
                    </label>
                    <div class="relative">
                        <input id="employee_id"
                               type="text"
                               name="employee_id"
                               value="{{ old('employee_id') }}"
                               required
                               autofocus
                               autocomplete="username"
                               class="input-box mono"
                               placeholder="EMP-1042">
                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    @error('employee_id')
                        <p class="mt-1.5 text-xs font-semibold text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 2. Access Code --}}
                <div class="field-group">
                    <label for="password" class="block mb-2 text-xs font-bold uppercase tracking-wider text-slate-600 mono">
                        {{ __('Access Code') }}
                    </label>
                    <div class="relative">
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               class="input-box has-toggle"
                               placeholder="••••••••">
                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path stroke-linecap="round" d="M7 11V7a5 5 0 0110 0v4"/>
                        </svg>

                        {{-- Toggle Show/Hide Password Button --}}
                        <button type="button" class="toggle-btn" onclick="toggleAccessCode()" aria-label="Toggle Access Code Visibility">
                            <svg id="eyeOpen" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M1 backward12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" style="display:none;"/>
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            <svg id="eyeClosed" class="w-4 h-4 hidden" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                                <line x1="1" y1="1" x2="23" y2="23"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-xs font-semibold text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 3. Remember Me Checkbox --}}
                <div class="flex items-center justify-between pt-1">
                    <label for="remember_me" class="inline-flex items-center gap-2.5 cursor-pointer select-none">
                        <input id="remember_me" type="checkbox" name="remember" class="custom-check">
                        <span class="text-sm font-semibold text-slate-600 hover:text-[#0B192C] transition-colors">
                            {{ __('Keep me signed in') }}
                        </span>
                    </label>
                </div>

                {{-- 4. Submit Pill Button (Unified with Hero style) --}}
                <div class="pt-3">
                    <button type="submit"
                            id="submitBtn"
                            class="pill-btn w-full inline-flex items-center justify-center gap-3 px-8 py-4 rounded-full bg-[#0B192C] text-white text-base font-bold shadow-xl shadow-slate-900/15 cursor-pointer">
                        <svg id="btnLockIcon" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path stroke-linecap="round" d="M7 11V7a5 5 0 0110 0v4"/>
                        </svg>
                        <svg id="btnSpinner" class="w-5 h-5 hidden animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
                            <path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        <span>{{ __('Sign in securely') }}</span>
                        <svg class="arrow-dir w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10"/>
                        </svg>
                    </button>
                </div>

            </form>

            {{-- 5. Help Callout (Clean Minimalist Design) --}}
            <div class="anim-up delay-2 mt-8 pt-6 border-t border-slate-100">
                <div class="flex items-center gap-3.5 p-4 rounded-2xl bg-slate-50 border border-slate-200/70">
                    <div class="w-9 h-9 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-[#14AFC3] shrink-0 shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <path stroke-linecap="round" d="M12 8v4M12 16h.01"/>
                        </svg>
                    </div>
                    <p class="text-xs text-slate-500 font-medium leading-relaxed">
                        {{ __('Lost your access code?') }}
                        <span class="block font-bold text-[#0B192C] mt-0.5">
                            {{ __('Contact the Admin office for a reset.') }}
                        </span>
                    </p>
                </div>
            </div>

        </div>

        {{-- Mobile Bottom Copyright Note --}}
        <div class="w-full max-w-md mx-auto text-center pt-4 text-xs text-slate-400 font-medium lg:hidden">
            &copy; {{ date('Y') }} Mawidi Hospital OS
        </div>

    </div>

</div>

{{-- Logic Scripts --}}
<script>
    function toggleAccessCode() {
        const input = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        if (input.type === 'password') {
            input.type = 'text';
            eyeOpen.classList.add('hidden');
            eyeClosed.classList.remove('hidden');
        } else {
            input.type = 'password';
            eyeOpen.classList.remove('hidden');
            eyeClosed.classList.add('hidden');
        }
        input.focus();
    }

    document.getElementById('loginForm').addEventListener('submit', function() {
        const btn = document.getElementById('submitBtn');
        const lockIcon = document.getElementById('btnLockIcon');
        const spinner = document.getElementById('btnSpinner');

        btn.style.pointerEvents = 'none';
        btn.style.opacity = '0.92';
        lockIcon.classList.add('hidden');
        spinner.classList.remove('hidden');
    });
</script>

</body>
</html>