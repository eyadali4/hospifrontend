@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';
    $currentUser = auth()->user() ?? (object)[
        'name' => 'System Admin',
        'email' => 'admin@mawidi.local',
        'role' => 'Super Administrator',
        'phone' => '+967 77 123 4567',
        'department' => 'الإدارة العامة والمتابعة الطبية',
        'created_at' => now()->subMonths(14),
    ];
@endphp

@section('page-title', $isRtl ? 'إعدادات الحساب والأمان' : __('Account Settings'))
@section('role-label', $isRtl ? 'مدير النظام' : __('Admin'))

@section('sidebar-links')
    <x-sidebar-link :href="Route::has('admin.dashboard') ? route('admin.dashboard') : '#'" :active="request()->routeIs('admin.dashboard')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'لوحة التحكم' : __('Dashboard') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.users.index') ? route('admin.users.index') : '#'" :active="request()->routeIs('admin.users.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'المستخدمين' : __('Users') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.doctors.index') ? route('admin.doctors.index') : '#'" :active="request()->routeIs('admin.doctors.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'الأطباء' : __('Doctors') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.departments.index') ? route('admin.departments.index') : '#'" :active="request()->routeIs('admin.departments.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'الأقسام الطبية' : __('Departments') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#'" :active="request()->routeIs('admin.appointments.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'المواعيد' : __('Appointments') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.reports.index') ? route('admin.reports.index') : '#'" :active="request()->routeIs('admin.reports.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'التقارير' : __('Reports') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.notifications.index') ? route('admin.notifications.index') : '#'" :active="request()->routeIs('admin.notifications.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'الإشعارات' : __('Notifications') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.settings.index') ? route('admin.settings.index') : '#'" :active="true">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'الإعدادات' : __('Settings') }}
    </x-sidebar-link>
@endsection

@section('content')
<div class="space-y-6 pb-12">

    {{-- ══════════════════════════════════════════════════════════════════
         TOP HEADER (Clean, Professional - No Al-Rasheed Badge in Header)
    ══════════════════════════════════════════════════════════════════ --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-2 border-b border-slate-200/80 dark:border-slate-800">
        <div>
            <h1 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white flex items-center gap-2">
                <span>{{ $isRtl ? 'إعدادات الحساب والأمان' : 'Account & Security Settings' }}</span>
                <span class="inline-block w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1">
                {{ $isRtl ? 'إدارة بيانات الملف الشخصي، ضوابط الأمان، والمصادقة المتقدمة لمنظومة النظام' : 'Manage profile credentials, security protocols, and session authorizations' }}
            </p>
        </div>

        <div class="flex items-center gap-2.5">
            <button type="submit" form="profileForm"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm text-white bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#119ab0] hover:to-[#0a5a66] shadow-md shadow-[#14AFC3]/20 transition-all duration-200 active:scale-95 cursor-pointer">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                    <polyline points="17 21 17 13 7 13 7 21"/>
                    <polyline points="7 3 7 8 15 8"/>
                </svg>
                <span>{{ $isRtl ? 'حفظ كافة التغييرات' : 'Save Changes' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════════════
         KPI METRIC CARDS (Icon Strictly Centered, Text Centered Underneath)
    ══════════════════════════════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- Card 1: Security Posture (Teal Highlighted) --}}
        <div class="rounded-2xl p-5 text-white relative overflow-hidden transition-all duration-200 hover:-translate-y-1"
             style="background: linear-gradient(135deg, #14AFC3 0%, #0C6B78 100%); box-shadow: 0 10px 25px -5px rgba(20,175,195,0.35);">
            <div class="absolute -top-6 -right-6 w-24 h-24 rounded-full bg-white/10 pointer-events-none"></div>
            <div class="relative z-10 flex flex-col items-center justify-between text-center mx-auto h-full space-y-3">
                <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center flex-shrink-0 text-white shadow-inner">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <path d="M9 12l2 2 4-4"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <div class="text-3xl font-black tracking-tight text-white">98%</div>
                    <div class="text-xs font-bold text-white/90">{{ $isRtl ? 'درجة أمان الحساب' : 'Security Level' }}</div>
                </div>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-white/20 text-white border border-white/25">
                    <span class="w-2 h-2 rounded-full bg-emerald-300 animate-pulse"></span>
                    <span>{{ $isRtl ? 'محمي بأعلى المعايير' : 'High Shielding' }}</span>
                </div>
            </div>
        </div>

        {{-- Card 2: Two-Factor Authentication --}}
        <div class="rounded-2xl p-5 bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700/80 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex flex-col items-center justify-between text-center mx-auto h-full space-y-3">
                <div class="w-12 h-12 bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center flex-shrink-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <div class="text-2xl font-black text-slate-800 dark:text-white">{{ $isRtl ? 'مُفعّـلة' : 'Enabled' }}</div>
                    <div class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $isRtl ? 'المصادقة الثنائية (2FA)' : 'Two-Factor Auth' }}</div>
                </div>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-emerald-50 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-300 border border-emerald-200/60 dark:border-emerald-800/40">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    <span>Google Authenticator</span>
                </div>
            </div>
        </div>

        {{-- Card 3: Active Sessions --}}
        <div class="rounded-2xl p-5 bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700/80 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex flex-col items-center justify-between text-center mx-auto h-full space-y-3">
                <div class="w-12 h-12 bg-cyan-50 dark:bg-cyan-950/40 text-[#14AFC3] rounded-2xl flex items-center justify-center flex-shrink-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                        <line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <div class="text-2xl font-black text-slate-800 dark:text-white" id="statSessionCount">2 {{ $isRtl ? 'أجهزة' : 'Devices' }}</div>
                    <div class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $isRtl ? 'الجلسات والأجهزة النشطة' : 'Active Sessions' }}</div>
                </div>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-[#E5FAFC] dark:bg-cyan-950/50 text-[#0C6B78] dark:text-cyan-300 border border-[#14AFC3]/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                    <span>{{ $isRtl ? 'صنعاء، اليمن · نشط الآن' : 'Sana\'a · Online' }}</span>
                </div>
            </div>
        </div>

        {{-- Card 4: Password Health --}}
        <div class="rounded-2xl p-5 bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700/80 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex flex-col items-center justify-between text-center mx-auto h-full space-y-3">
                <div class="w-12 h-12 bg-amber-50 dark:bg-amber-950/40 text-amber-600 dark:text-amber-400 rounded-2xl flex items-center justify-center flex-shrink-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 2l-2 2m-1.5 1.5L16 7l-1.5-1.5L12 8l2 2-7 7H3v-4l7-7 2.5 2.5L16 7"/>
                        <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <div class="text-2xl font-black text-slate-800 dark:text-white">{{ $isRtl ? 'منذ 24 يوم' : '24 Days Ago' }}</div>
                    <div class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $isRtl ? 'عمر كلمة المرور' : 'Password Age' }}</div>
                </div>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-amber-50 dark:bg-amber-950/50 text-amber-700 dark:text-amber-300 border border-amber-200/60 dark:border-amber-800/40">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                    <span>{{ $isRtl ? 'حالة آمنة وجيدة' : 'Healthy Status' }}</span>
                </div>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════════════════════════════
         NAVIGATION TABS (Fully Clickable & Interactive)
    ══════════════════════════════════════════════════════════════════ --}}
    <div class="border-b border-slate-200 dark:border-slate-700/80 overflow-x-auto bg-white/50 dark:bg-slate-800/50 rounded-2xl p-1.5 shadow-sm">
        <nav class="flex gap-2 min-w-max" aria-label="Settings Tabs">
            
            {{-- Tab 1: Profile --}}
            <button type="button" 
                    id="tabBtn-profile"
                    onclick="switchSettingsTab('profile')"
                    class="tab-button active inline-flex items-center gap-2.5 py-3 px-5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-200 cursor-pointer select-none bg-[#E5FAFC] text-[#0C6B78] dark:bg-cyan-950/60 dark:text-[#14AFC3] border-b-2 border-[#14AFC3] shadow-sm">
                <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
                <span>{{ $isRtl ? 'الملف الشخصي' : 'Profile Information' }}</span>
            </button>

            {{-- Tab 2: Security & Password --}}
            <button type="button" 
                    id="tabBtn-security"
                    onclick="switchSettingsTab('security')"
                    class="tab-button inline-flex items-center gap-2.5 py-3 px-5 rounded-xl font-medium text-xs sm:text-sm text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white transition-all duration-200 cursor-pointer select-none border-b-2 border-transparent hover:bg-slate-100/70 dark:hover:bg-slate-700/50">
                <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
                <span>{{ $isRtl ? 'الأمان وكلمة المرور' : 'Security & Password' }}</span>
            </button>

            {{-- Tab 3: Preferences & Alerts --}}
            <button type="button" 
                    id="tabBtn-preferences"
                    onclick="switchSettingsTab('preferences')"
                    class="tab-button inline-flex items-center gap-2.5 py-3 px-5 rounded-xl font-medium text-xs sm:text-sm text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white transition-all duration-200 cursor-pointer select-none border-b-2 border-transparent hover:bg-slate-100/70 dark:hover:bg-slate-700/50">
                <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                </svg>
                <span>{{ $isRtl ? 'التفضيلات والتنبيهات' : 'Preferences & Alerts' }}</span>
            </button>

            {{-- Tab 4: Active Devices & Sessions --}}
            <button type="button" 
                    id="tabBtn-sessions"
                    onclick="switchSettingsTab('sessions')"
                    class="tab-button inline-flex items-center gap-2.5 py-3 px-5 rounded-xl font-medium text-xs sm:text-sm text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white transition-all duration-200 cursor-pointer select-none border-b-2 border-transparent hover:bg-slate-100/70 dark:hover:bg-slate-700/50">
                <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>
                </svg>
                <span>{{ $isRtl ? 'الأجهزة والجلسات النشطة' : 'Active Devices' }}</span>
                <span id="badgeSessionCount" class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-slate-200 text-slate-700 dark:bg-slate-700 dark:text-slate-200">2</span>
            </button>
        </nav>
    </div>

    {{-- ══════════════════════════════════════════════════════════════════
         TAB PANE 1: PROFILE INFORMATION
    ══════════════════════════════════════════════════════════════════ --}}
    <div id="tabPane-profile" class="settings-pane block transition-opacity duration-200">
        <form id="profileForm" action="{{ Route::has('admin.profile.update') ? route('admin.profile.update') : '#' }}" method="POST" enctype="multipart/form-data" onsubmit="handleProfileSubmit(event)">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Left: Avatar & Role Card --}}
                <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 border border-slate-200/80 dark:border-slate-700/80 shadow-sm flex flex-col items-center text-center">
                    <div class="relative group cursor-pointer mb-4" onclick="document.getElementById('avatarInput').click()">
                        <div class="w-32 h-32 rounded-3xl overflow-hidden ring-4 ring-[#14AFC3]/20 bg-slate-100 dark:bg-slate-700 flex items-center justify-center shadow-md">
                            <img id="avatarPreview"
                                 src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300&auto=format&fit=crop&q=80"
                                 alt="Profile Avatar"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="absolute inset-0 bg-slate-900/60 rounded-3xl flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-200 text-white text-xs font-bold gap-1 backdrop-blur-xs">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                                <circle cx="12" cy="13" r="4"/>
                            </svg>
                            <span>{{ $isRtl ? 'تغيير الصورة' : 'Change Avatar' }}</span>
                        </div>
                        <input type="file" id="avatarInput" name="avatar" class="hidden" accept="image/*" onchange="previewAvatar(this)">
                    </div>

                    <h3 class="text-lg font-black text-slate-800 dark:text-white">{{ $currentUser->name }}</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5 dir-ltr">{{ $currentUser->email }}</p>

                    <div class="mt-4 flex flex-wrap items-center justify-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] dark:bg-cyan-950/50 dark:text-[#14AFC3] border border-[#14AFC3]/30">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <span>{{ $currentUser->role ?? 'Super Administrator' }}</span>
                        </span>
                        <span class="inline-flex items-center gap-1 text-[11px] font-mono px-2.5 py-1 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                            #MOH-SAN-0012
                        </span>
                    </div>

                    <div class="w-full border-t border-slate-100 dark:border-slate-700/60 my-5"></div>

                    <div class="w-full text-xs space-y-3 text-slate-600 dark:text-slate-400">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">{{ $isRtl ? 'القسم الوظيفي' : 'Department' }}</span>
                            <span class="font-bold text-slate-700 dark:text-slate-200">{{ $currentUser->department ?? ($isRtl ? 'الإدارة والتحكم' : 'Operations') }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">{{ $isRtl ? 'تاريخ الانضمام' : 'Registered On' }}</span>
                            <span class="font-bold text-slate-700 dark:text-slate-200">{{ $currentUser->created_at->format('Y/m/d') }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">{{ $isRtl ? 'صلاحيات الحساب' : 'Access Level' }}</span>
                            <span class="inline-flex items-center gap-1 font-bold text-emerald-600 dark:text-emerald-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span>{{ $isRtl ? 'تحكم كامل (Root)' : 'Full Root Access' }}</span>
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Right: Profile Input Fields --}}
                <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-7 border border-slate-200/80 dark:border-slate-700/80 shadow-sm space-y-6">
                    <div class="border-b border-slate-100 dark:border-slate-700/60 pb-4">
                        <h2 class="text-base font-black text-slate-800 dark:text-white flex items-center gap-2">
                            <span>{{ $isRtl ? 'البيانات الشخصية والمهنية' : 'Personal & Contact Information' }}</span>
                        </h2>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">{{ $isRtl ? 'تأكد من صحة بيانات الاتصال لاستلام التنبيهات وإشعارات الدخول' : 'Keep your contact details up to date for emergency alerts' }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'الاسم الكامل' : 'Full Name' }} <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $currentUser->name) }}" required
                                   class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-[#14AFC3]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'البريد الإلكتروني' : 'Email Address' }} <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email', $currentUser->email) }}" required dir="ltr"
                                   class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-[#14AFC3]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'رقم الهاتف الرسمي' : 'Official Phone Number' }}</label>
                            <input type="tel" name="phone" value="{{ old('phone', $currentUser->phone) }}" dir="ltr"
                                   class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-[#14AFC3]"
                                   placeholder="+967 77 123 4567">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'المسمى الإداري' : 'Administrative Role' }}</label>
                            <input type="text" value="Super Administrator (مدير النظام الطبي)" readonly
                                   class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/60 text-slate-500 dark:text-slate-400 cursor-not-allowed">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'لغة الواجهة المفضلة' : 'Interface Language' }}</label>
                            <select name="language"
                                    class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-[#14AFC3]">
                                <option value="ar" {{ $isRtl ? 'selected' : '' }}>العربية (اليمن)</option>
                                <option value="en" {{ !$isRtl ? 'selected' : '' }}>English (US)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'المنطقة الزمنية المعتمدة' : 'Official Timezone' }}</label>
                            <select name="timezone"
                                    class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-[#14AFC3]">
                                <option value="Asia/Aden" selected>Asia/Aden (UTC+03:00 - توقيت صنعاء)</option>
                                <option value="Asia/Riyadh">Asia/Riyadh (UTC+03:00)</option>
                                <option value="UTC">UTC (Coordinated Universal Time)</option>
                            </select>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 dark:border-slate-700/60 flex items-center justify-end gap-3">
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl font-bold text-xs sm:text-sm text-white bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#119ab0] hover:to-[#0a5a66] shadow-md shadow-[#14AFC3]/20 transition-all cursor-pointer">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/></svg>
                            <span>{{ $isRtl ? 'تحديث البيانات' : 'Update Profile' }}</span>
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>

    {{-- ══════════════════════════════════════════════════════════════════
         TAB PANE 2: SECURITY & PASSWORD
    ══════════════════════════════════════════════════════════════════ --}}
    <div id="tabPane-security" class="settings-pane hidden transition-opacity duration-200 space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Change Password Form --}}
            <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-7 border border-slate-200/80 dark:border-slate-700/80 shadow-sm space-y-6">
                <div class="border-b border-slate-100 dark:border-slate-700/60 pb-4">
                    <h2 class="text-base font-black text-slate-800 dark:text-white">{{ $isRtl ? 'تحديث كلمة المرور' : 'Change Password' }}</h2>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">{{ $isRtl ? 'اختر كلمة مرور قوية تحتوي على أحرف كبيرة وصغيرة وأرقام ورموز خاصة' : 'Ensure your account is protected with a secure credential' }}</p>
                </div>

                <form id="passwordForm" action="{{ Route::has('admin.password.update') ? route('admin.password.update') : '#' }}" method="POST" onsubmit="handlePasswordSubmit(event)" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'كلمة المرور الحالية' : 'Current Password' }} <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="password" id="current_password" name="current_password" required
                                   class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-[#14AFC3] pe-10">
                            <button type="button" onclick="togglePasswordVisibility('current_password', 'currentPassEye')" class="absolute inset-y-0 end-0 px-3.5 flex items-center text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 cursor-pointer">
                                <svg id="currentPassEye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'كلمة المرور الجديدة' : 'New Password' }} <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="password" id="new_password" name="password" required oninput="evaluatePasswordStrength(this.value)"
                                       class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-[#14AFC3] pe-10">
                                <button type="button" onclick="togglePasswordVisibility('new_password', 'newPassEye')" class="absolute inset-y-0 end-0 px-3.5 flex items-center text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 cursor-pointer">
                                    <svg id="newPassEye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'تأكيد كلمة المرور الجديدة' : 'Confirm Password' }} <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="password" id="confirm_password" name="password_confirmation" required
                                       class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-[#14AFC3] pe-10">
                                <button type="button" onclick="togglePasswordVisibility('confirm_password', 'confirmPassEye')" class="absolute inset-y-0 end-0 px-3.5 flex items-center text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 cursor-pointer">
                                    <svg id="confirmPassEye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Strength Meter --}}
                    <div class="bg-slate-50 dark:bg-slate-900/60 p-4 rounded-2xl border border-slate-200/60 dark:border-slate-700/60 space-y-2.5">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-500 font-medium">{{ $isRtl ? 'مقياس قوة كلمة المرور' : 'Password Strength' }}:</span>
                            <span id="strengthText" class="font-bold text-slate-600 dark:text-slate-300">{{ $isRtl ? 'لم يتم الإدخال' : 'Not entered' }}</span>
                        </div>
                        <div class="w-full h-2 bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                            <div id="strengthBar" class="h-full bg-slate-400 transition-all duration-300" style="width: 0%"></div>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 pt-1 text-[11px] text-slate-500">
                            <span id="ruleLength" class="flex items-center gap-1">• 8+ {{ $isRtl ? 'محارف' : 'chars' }}</span>
                            <span id="ruleUpper" class="flex items-center gap-1">• {{ $isRtl ? 'حرف كبير' : 'Uppercase' }}</span>
                            <span id="ruleNumber" class="flex items-center gap-1">• {{ $isRtl ? 'رقم واحد' : 'Number' }}</span>
                            <span id="ruleSpecial" class="flex items-center gap-1">• {{ $isRtl ? 'رمز خاص' : 'Symbol' }}</span>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-slate-100 dark:border-slate-700/60 flex items-center justify-end">
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl font-bold text-xs sm:text-sm text-white bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 transition-all cursor-pointer">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            <span>{{ $isRtl ? 'تحديث كلمة المرور' : 'Update Password' }}</span>
                        </button>
                    </div>
                </form>
            </div>

            {{-- 2FA Security Box --}}
            <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-7 border border-slate-200/80 dark:border-slate-700/80 shadow-sm flex flex-col justify-between space-y-6">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-black text-slate-800 dark:text-white">{{ $isRtl ? 'المصادقة الثنائية (2FA)' : 'Two-Factor Authentication' }}</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1.5 leading-relaxed">
                        {{ $isRtl ? 'إضافة طبقة أمان فائقة لمنع أي وصول غير مصرح به حتى في حال تسرب كلمة المرور.' : 'Adds a secondary verification layer requiring a temporary OTP code.' }}
                    </p>

                    <div class="mt-5 p-3.5 rounded-2xl bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200/60 dark:border-emerald-800/40 flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></span>
                        <div>
                            <div class="text-xs font-bold text-emerald-800 dark:text-emerald-300">{{ $isRtl ? 'المصادقة مُفعّلة حالياً' : '2FA is active' }}</div>
                            <div class="text-[10px] text-emerald-600/80 dark:text-emerald-400/80">Google Authenticator (RFC 6238)</div>
                        </div>
                    </div>
                </div>

                <div class="space-y-2.5 pt-4 border-t border-slate-100 dark:border-slate-700/60">
                    <button type="button" onclick="openTwoFactorModal()"
                            class="w-full py-2.5 px-4 rounded-xl font-bold text-xs bg-[#E5FAFC] dark:bg-cyan-950/50 text-[#0C6B78] dark:text-cyan-300 hover:bg-[#d5f5f8] border border-[#14AFC3]/30 transition-all text-center cursor-pointer">
                        {{ $isRtl ? 'إعادة ضبط مفتاح المصادقة' : 'Reconfigure 2FA' }}
                    </button>
                    <button type="button" onclick="showUnifiedToast('{{ $isRtl ? 'تم تحميل الرموز الاحتياطية بأمان.' : 'Emergency codes retrieved.' }}')"
                            class="w-full py-2.5 px-4 rounded-xl font-bold text-xs bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-600 transition-all text-center cursor-pointer">
                        {{ $isRtl ? 'عرض رموز الطوارئ الاحتياطية' : 'View Backup Codes' }}
                    </button>
                </div>
            </div>

        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════════════
         TAB PANE 3: PREFERENCES & ALERTS
    ══════════════════════════════════════════════════════════════════ --}}
    <div id="tabPane-preferences" class="settings-pane hidden transition-opacity duration-200 space-y-6">
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-7 border border-slate-200/80 dark:border-slate-700/80 shadow-sm space-y-6">
            <div class="border-b border-slate-100 dark:border-slate-700/60 pb-4">
                <h2 class="text-base font-black text-slate-800 dark:text-white">{{ $isRtl ? 'تفضيلات الإشعارات والتنبيهات المباشرة' : 'Notification & Alert Preferences' }}</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">{{ $isRtl ? 'تخصيص قنوات ونوعية التنبيهات التي تصلك أثناء العمليات الطبية والتشغيلية' : 'Configure broadcast priorities and notification channels' }}</p>
            </div>

            <div class="divide-y divide-slate-100 dark:divide-slate-700/60">

                {{-- Preference 1 --}}
                <div class="py-4 flex items-center justify-between gap-4">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">{{ $isRtl ? 'تنبيهات الطوارئ والحالات الحرجة (Code Blue)' : 'Emergency & Critical Alerts (Code Blue)' }}</span>
                        </div>
                        <div class="text-xs text-slate-500 dark:text-slate-400">{{ $isRtl ? 'إشعارات صوتية وفورية فور تسجيل أي حالة طارئة بأقسام العناية أو العمليات' : 'Instant high-priority audio & push alerts for emergency ICU calls' }}</div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer flex-shrink-0">
                        <input type="checkbox" checked onchange="togglePref(this, 'Code Blue Alerts')" class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#14AFC3]"></div>
                    </label>
                </div>

                {{-- Preference 2 --}}
                <div class="py-4 flex items-center justify-between gap-4">
                    <div class="space-y-1">
                        <div class="text-sm font-bold text-slate-800 dark:text-white">{{ $isRtl ? 'إشعارات تسجيل الدخول من أجهزة جديدة' : 'New Device Login Alerts' }}</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400">{{ $isRtl ? 'إرسال بريد وتنبيه فوري عند تسجيل الدخول من متصفح أو موقع غير معتاد' : 'Send email & push notification on unrecognized logins' }}</div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer flex-shrink-0">
                        <input type="checkbox" checked onchange="togglePref(this, 'Login Alerts')" class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#14AFC3]"></div>
                    </label>
                </div>

                {{-- Preference 3 --}}
                <div class="py-4 flex items-center justify-between gap-4">
                    <div class="space-y-1">
                        <div class="text-sm font-bold text-slate-800 dark:text-white">{{ $isRtl ? 'ملخص النشاط اليومي والإحصائيات' : 'Daily Census & Telemetry Digest' }}</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400">{{ $isRtl ? 'استلام تقرير صباحي عند الساعة 08:00 صباحاً بإحصائيات المواعيد والأسرة' : 'Receive an automated morning summary of admissions and bed occupancy' }}</div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer flex-shrink-0">
                        <input type="checkbox" checked onchange="togglePref(this, 'Daily Census')" class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#14AFC3]"></div>
                    </label>
                </div>

                {{-- Preference 4 --}}
                <div class="py-4 flex items-center justify-between gap-4">
                    <div class="space-y-1">
                        <div class="text-sm font-bold text-slate-800 dark:text-white">{{ $isRtl ? 'تنبيهات نفاد الأدوية ومخزون بنك الدم' : 'Pharmacy & Blood Bank Thresholds' }}</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400">{{ $isRtl ? 'إشعار فوري عند انخفاض رصيد صنف دوائي حرج أو زمر الدم النادرة' : 'Notify administrators when emergency pharmaceuticals reach critical low' }}</div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer flex-shrink-0">
                        <input type="checkbox" onchange="togglePref(this, 'Pharmacy Alerts')" class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#14AFC3]"></div>
                    </label>
                </div>

                {{-- Preference 5 --}}
                <div class="py-4 flex items-center justify-between gap-4">
                    <div class="space-y-1">
                        <div class="text-sm font-bold text-slate-800 dark:text-white">{{ $isRtl ? 'تسجيل الخروج التلقائي عند الخمول' : 'Automatic Session Inactivity Timeout' }}</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400">{{ $isRtl ? 'قفل الجلسة آلياً بعد مرور 30 دقيقة من عدم التفاعل لحماية البيانات' : 'Automatically locks console after 30 minutes of clinical inactivity' }}</div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer flex-shrink-0">
                        <input type="checkbox" checked onchange="togglePref(this, 'Inactivity Lock')" class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#14AFC3]"></div>
                    </label>
                </div>

            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════════════
         TAB PANE 4: ACTIVE DEVICES & SESSIONS
    ══════════════════════════════════════════════════════════════════ --}}
    <div id="tabPane-sessions" class="settings-pane hidden transition-opacity duration-200 space-y-6">
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-7 border border-slate-200/80 dark:border-slate-700/80 shadow-sm space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 dark:border-slate-700/60 pb-4">
                <div>
                    <h2 class="text-base font-black text-slate-800 dark:text-white">{{ $isRtl ? 'الأجهزة والجلسات المفتوحة' : 'Active Sessions & Devices' }}</h2>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">{{ $isRtl ? 'قائمة بالأجهزة والمتصفحات التي سجلت الدخول بحسابك مؤخراً' : 'List of devices and browsers currently logged into this account' }}</p>
                </div>
                <button type="button" onclick="openTerminateSessionsModal()"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-bold text-red-600 bg-red-50 dark:bg-red-950/40 hover:bg-red-100 dark:hover:bg-red-950/60 border border-red-200 dark:border-red-900/40 transition-all cursor-pointer">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18.36 6.64a9 9 0 1 1-12.73 0"/><line x1="12" y1="2" x2="12" y2="12"/>
                    </svg>
                    <span>{{ $isRtl ? 'إنهاء كافة الجلسات الأخرى' : 'Revoke All Other Sessions' }}</span>
                </button>
            </div>

            <div class="space-y-3.5">

                {{-- Session 1 (Current) --}}
                <div class="p-4 sm:p-5 rounded-2xl border border-[#14AFC3]/30 bg-[#E5FAFC]/40 dark:bg-cyan-950/20 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-white dark:bg-slate-700 text-[#14AFC3] flex items-center justify-center shadow-sm flex-shrink-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>
                            </svg>
                        </div>
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-black text-slate-800 dark:text-white">Windows 11 · Google Chrome 126</span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span>{{ $isRtl ? 'هذا الجهاز حالياً' : 'Current Device' }}</span>
                                </span>
                            </div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">
                                <span>صنعاء، اليمن</span> · <span class="font-mono">192.168.10.45</span> · <span class="text-emerald-600 dark:text-emerald-400 font-bold">{{ $isRtl ? 'نشط الآن' : 'Active now' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Session 2 (Other) --}}
                <div class="session-item p-4 sm:p-5 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 flex items-center justify-center flex-shrink-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/>
                            </svg>
                        </div>
                        <div class="space-y-1">
                            <div class="text-sm font-bold text-slate-800 dark:text-white">Apple iPhone 15 Pro · Mobile Safari</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">
                                <span>صنعاء - حدة</span> · <span class="font-mono">185.80.220.12</span> · <span>{{ $isRtl ? 'منذ 18 دقيقة' : '18 minutes ago' }}</span>
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="terminateSingleSession(this)"
                            class="self-start sm:self-auto px-4 py-2 rounded-xl text-xs font-bold text-red-600 hover:bg-red-50 dark:hover:bg-red-950/40 border border-slate-200 dark:border-slate-700 transition-all cursor-pointer">
                        {{ $isRtl ? 'إنهاء الجلسة' : 'Revoke' }}
                    </button>
                </div>

            </div>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════════════════════════
     MODAL: TWO-FACTOR SETUP (2FA)
══════════════════════════════════════════════════════════════════ --}}
<div id="twoFactorModal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl max-w-md w-full border border-slate-200 dark:border-slate-700 shadow-2xl overflow-hidden animate-in fade-in zoom-in-95 duration-200">
        <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-cyan-50 dark:bg-cyan-950/50 text-[#14AFC3] flex items-center justify-center">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>
                <h3 class="text-base font-black text-slate-800 dark:text-white">{{ $isRtl ? 'إعداد المصادقة الثنائية (2FA)' : 'Two-Factor Setup' }}</h3>
            </div>
            <button type="button" onclick="closeTwoFactorModal()" class="w-8 h-8 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-400 flex items-center justify-center cursor-pointer">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <div class="p-6 space-y-4 text-center">
            <p class="text-xs text-slate-500 dark:text-slate-400">
                {{ $isRtl ? 'امسح رمز الاستجابة السريعة (QR) باستخدام تطبيق المصادقة (Google Authenticator أو 1Password):' : 'Scan the QR code using Google Authenticator or Microsoft Authenticator:' }}
            </p>

            {{-- Mock QR Code --}}
            <div class="w-44 h-44 mx-auto p-2 bg-white rounded-2xl border-2 border-dashed border-slate-300 dark:border-slate-600 flex items-center justify-center">
                <div class="w-full h-full bg-slate-900 rounded-xl flex flex-col items-center justify-center text-white p-3 space-y-1">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                    </svg>
                    <span class="text-[9px] font-mono tracking-widest text-[#14AFC3]">MOH-2FA-SEC</span>
                </div>
            </div>

            <div class="bg-slate-50 dark:bg-slate-900/60 p-3 rounded-xl border border-slate-200/60 dark:border-slate-700/60 flex items-center justify-between">
                <span class="text-xs font-mono font-bold text-slate-700 dark:text-slate-200" id="secretKeyText">ALGO-7789-RSHD-SNA</span>
                <button type="button" onclick="copySecretKey()" class="text-xs font-bold text-[#14AFC3] hover:underline cursor-pointer">
                    {{ $isRtl ? 'نسخ المفتاح' : 'Copy Key' }}
                </button>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'أدخل الرمز المكون من 6 أرقام للتحقق:' : 'Enter 6-digit Code:' }}</label>
                <input type="text" maxlength="6" placeholder="000 000" dir="ltr"
                       class="w-48 mx-auto text-center font-mono text-lg tracking-widest py-2 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-[#14AFC3]">
            </div>
        </div>

        <div class="p-6 bg-slate-50 dark:bg-slate-800/80 border-t border-slate-100 dark:border-slate-700 flex items-center justify-end gap-3">
            <button type="button" onclick="closeTwoFactorModal()" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-600 dark:text-slate-300 hover:bg-slate-200/60 transition-all cursor-pointer">
                {{ $isRtl ? 'إلغاء' : 'Cancel' }}
            </button>
            <button type="button" onclick="closeTwoFactorModal(); showUnifiedToast('{{ $isRtl ? 'تم تفعيل المصادقة الثنائية بنجاح!' : '2FA verified and saved!' }}')"
                    class="px-5 py-2 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#119ab0] hover:to-[#0a5a66] shadow-md shadow-[#14AFC3]/20 transition-all cursor-pointer">
                {{ $isRtl ? 'تأكيد وحفظ' : 'Confirm & Enable' }}
            </button>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════════
     MODAL: TERMINATE OTHER SESSIONS
══════════════════════════════════════════════════════════════════ --}}
<div id="terminateSessionsModal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl max-w-md w-full border border-slate-200 dark:border-slate-700 shadow-2xl overflow-hidden animate-in fade-in zoom-in-95 duration-200">
        <div class="p-6 text-center space-y-3">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-red-50 dark:bg-red-950/50 text-red-600 flex items-center justify-center">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                    <line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/>
                </svg>
            </div>
            <h3 class="text-base font-black text-slate-800 dark:text-white">{{ $isRtl ? 'تأكيد إنهاء الجلسات الأخرى' : 'Revoke All Other Sessions' }}</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                {{ $isRtl ? 'سيتم تسجيل الخروج فورياً من كافة الهواتف والأجهزة والمتصفحات الأخرى باستثناء جهازك الحالي. هل تريد المتابعة؟' : 'You will be logged out of all active browsers except this one. Confirm password to proceed.' }}
            </p>

            <div class="pt-2 text-start">
                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'أدخل كلمة المرور للتأكيد' : 'Password Confirmation' }}</label>
                <input type="password" id="terminatePasswordInput" placeholder="••••••••"
                       class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
        </div>

        <div class="p-4 bg-slate-50 dark:bg-slate-800/80 border-t border-slate-100 dark:border-slate-700 flex items-center justify-end gap-3">
            <button type="button" onclick="closeTerminateSessionsModal()" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-600 dark:text-slate-300 hover:bg-slate-200/60 transition-all cursor-pointer">
                {{ $isRtl ? 'إلغاء' : 'Cancel' }}
            </button>
            <button type="button" onclick="confirmTerminateAllSessions()"
                    class="px-5 py-2 rounded-xl text-xs font-bold text-white bg-red-600 hover:bg-red-700 shadow-md shadow-red-500/20 transition-all cursor-pointer">
                {{ $isRtl ? 'تأكيد الإنهاء' : 'Revoke Sessions' }}
            </button>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════════
     UNIFIED TOAST NOTIFICATION
══════════════════════════════════════════════════════════════════ --}}
<div id="unifiedToast" class="fixed bottom-6 start-1/2 -translate-x-1/2 z-50 hidden items-center gap-2.5 px-5 py-3 rounded-2xl bg-slate-900 text-white shadow-2xl border border-slate-700 text-xs font-bold transition-all duration-300 animate-in fade-in slide-in-from-bottom-5">
    <div class="w-5 h-5 rounded-full bg-emerald-500 flex items-center justify-center text-white flex-shrink-0">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
    </div>
    <span id="unifiedToastMsg">{{ $isRtl ? 'تم تنفيذ الإجراء بنجاح.' : 'Operation completed successfully.' }}</span>
</div>

{{-- ══════════════════════════════════════════════════════════════════
     INLINE CORE SCRIPTS (Placed directly here to guarantee execution)
══════════════════════════════════════════════════════════════════ --}}
<script>
    // 1. Guaranteed Tab Switching
    function switchSettingsTab(tabId) {
        // Hide all panes
        const panes = document.querySelectorAll('.settings-pane');
        panes.forEach(pane => {
            pane.classList.add('hidden');
            pane.classList.remove('block');
        });

        // Show active pane
        const activePane = document.getElementById(`tabPane-${tabId}`);
        if (activePane) {
            activePane.classList.remove('hidden');
            activePane.classList.add('block');
        }

        // Reset all buttons styling
        const buttons = document.querySelectorAll('.tab-button');
        buttons.forEach(btn => {
            btn.classList.remove('active', 'bg-[#E5FAFC]', 'text-[#0C6B78]', 'dark:bg-cyan-950/60', 'dark:text-[#14AFC3]', 'border-[#14AFC3]', 'font-bold', 'shadow-sm');
            btn.classList.add('text-slate-500', 'dark:text-slate-400', 'border-transparent', 'font-medium');
        });

        // Set active button styling
        const activeBtn = document.getElementById(`tabBtn-${tabId}`);
        if (activeBtn) {
            activeBtn.classList.add('active', 'bg-[#E5FAFC]', 'text-[#0C6B78]', 'dark:bg-cyan-950/60', 'dark:text-[#14AFC3]', 'border-[#14AFC3]', 'font-bold', 'shadow-sm');
            activeBtn.classList.remove('text-slate-500', 'dark:text-slate-400', 'border-transparent', 'font-medium');
        }
    }

    // 2. Avatar Preview
    function previewAvatar(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
                showUnifiedToast("{{ $isRtl ? 'تم تحديث معاينة الصورة الشخصية.' : 'Avatar preview updated.' }}");
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // 3. Password Visibility Toggle
    function togglePasswordVisibility(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
        } else {
            input.type = 'password';
            icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
        }
    }

    // 4. Password Strength Meter
    function evaluatePasswordStrength(pass) {
        const bar = document.getElementById('strengthBar');
        const text = document.getElementById('strengthText');
        const rLen = document.getElementById('ruleLength');
        const rUp = document.getElementById('ruleUpper');
        const rNum = document.getElementById('ruleNumber');
        const rSpec = document.getElementById('ruleSpecial');

        let score = 0;
        const hasLen = pass.length >= 8;
        const hasUp = /[A-Z]/.test(pass);
        const hasNum = /[0-9]/.test(pass);
        const hasSpec = /[^A-Za-z0-9]/.test(pass);

        updateRuleBadge(rLen, hasLen);
        updateRuleBadge(rUp, hasUp);
        updateRuleBadge(rNum, hasNum);
        updateRuleBadge(rSpec, hasSpec);

        if (hasLen) score += 25;
        if (hasUp) score += 25;
        if (hasNum) score += 25;
        if (hasSpec) score += 25;

        bar.style.width = score + '%';

        if(score === 0) {
            bar.className = 'h-full bg-slate-400 transition-all duration-300';
            text.textContent = "{{ $isRtl ? 'لم يتم الإدخال' : 'Not entered' }}";
            text.className = 'font-bold text-slate-500';
        } else if(score <= 25) {
            bar.className = 'h-full bg-red-500 transition-all duration-300';
            text.textContent = "{{ $isRtl ? 'ضعيفة جداً' : 'Very Weak' }}";
            text.className = 'font-bold text-red-500';
        } else if(score <= 50) {
            bar.className = 'h-full bg-amber-500 transition-all duration-300';
            text.textContent = "{{ $isRtl ? 'متوسطة' : 'Moderate' }}";
            text.className = 'font-bold text-amber-500';
        } else if(score <= 75) {
            bar.className = 'h-full bg-cyan-500 transition-all duration-300';
            text.textContent = "{{ $isRtl ? 'جيدة ومقبولة' : 'Good' }}";
            text.className = 'font-bold text-[#14AFC3]';
        } else {
            bar.className = 'h-full bg-emerald-500 transition-all duration-300';
            text.textContent = "{{ $isRtl ? 'قوية ومحمية' : 'Strong & Secure' }}";
            text.className = 'font-bold text-emerald-500';
        }
    }

    function updateRuleBadge(el, satisfied) {
        if (satisfied) {
            el.classList.add('text-emerald-600', 'dark:text-emerald-400', 'font-bold');
            el.classList.remove('text-slate-500');
        } else {
            el.classList.remove('text-emerald-600', 'dark:text-emerald-400', 'font-bold');
            el.classList.add('text-slate-500');
        }
    }

    // 5. Form Submissions
    function handleProfileSubmit(e) {
        const form = e.target;
        if(form.getAttribute('action') === '#' || form.getAttribute('action') === '') {
            e.preventDefault();
            showUnifiedToast("{{ $isRtl ? 'تم تحديث بيانات الملف الشخصي بنجاح!' : 'Profile updated successfully!' }}");
        }
    }

    function handlePasswordSubmit(e) {
        const form = e.target;
        if(form.getAttribute('action') === '#' || form.getAttribute('action') === '') {
            e.preventDefault();
            const newPass = document.getElementById('new_password').value;
            const confPass = document.getElementById('confirm_password').value;
            if(newPass !== confPass) {
                alert("{{ $isRtl ? 'كلمة المرور غير متطابقة!' : 'Passwords do not match!' }}");
                return;
            }
            form.reset();
            evaluatePasswordStrength('');
            showUnifiedToast("{{ $isRtl ? 'تم تغيير كلمة المرور بنجاح!' : 'Password changed successfully!' }}");
        }
    }

    // 6. 2FA Modal
    function openTwoFactorModal() {
        document.getElementById('twoFactorModal').classList.remove('hidden');
    }
    function closeTwoFactorModal() {
        document.getElementById('twoFactorModal').classList.add('hidden');
    }
    function copySecretKey() {
        const key = document.getElementById('secretKeyText').textContent;
        navigator.clipboard.writeText(key).then(() => {
            showUnifiedToast("{{ $isRtl ? 'تم نسخ المفتاح السري إلى الحافظة.' : 'Secret key copied.' }}");
        });
    }

    // 7. Sessions Management
    function openTerminateSessionsModal() {
        document.getElementById('terminateSessionsModal').classList.remove('hidden');
    }
    function closeTerminateSessionsModal() {
        document.getElementById('terminateSessionsModal').classList.add('hidden');
    }
    function confirmTerminateAllSessions() {
        closeTerminateSessionsModal();
        document.querySelectorAll('.session-item').forEach(el => el.remove());
        document.getElementById('statSessionCount').textContent = "1 {{ $isRtl ? 'جهاز' : 'Device' }}";
        document.getElementById('badgeSessionCount').textContent = "1";
        showUnifiedToast("{{ $isRtl ? 'تم إنهاء كافة الجلسات الأخرى بنجاح!' : 'All other sessions revoked!' }}");
    }
    function terminateSingleSession(btn) {
        const row = btn.closest('.session-item');
        if(row) {
            row.style.opacity = '0.3';
            setTimeout(() => {
                row.remove();
                document.getElementById('statSessionCount').textContent = "1 {{ $isRtl ? 'جهاز' : 'Device' }}";
                document.getElementById('badgeSessionCount').textContent = "1";
                showUnifiedToast("{{ $isRtl ? 'تم إنهاء الجلسة المحددة بنجاح.' : 'Session revoked.' }}");
            }, 200);
        }
    }

    // 8. Preference Toggle Handler
    function togglePref(checkbox, name) {
        const state = checkbox.checked ? "{{ $isRtl ? 'تم تفعيل' : 'Enabled' }}" : "{{ $isRtl ? 'تم تعطيل' : 'Disabled' }}";
        showUnifiedToast(`${state} ${name}`);
    }

    // 9. Toast System
    function showUnifiedToast(msg) {
        const toast = document.getElementById('unifiedToast');
        const text = document.getElementById('unifiedToastMsg');
        text.textContent = msg;
        toast.classList.remove('hidden');
        toast.classList.add('flex');

        setTimeout(() => {
            toast.classList.add('hidden');
            toast.classList.remove('flex');
        }, 3200);
    }
</script>
@endsection