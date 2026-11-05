@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';
@endphp

@section('page-title', $isRtl ? 'مركز الإشعارات والتنبيهات' : __('Notification Center'))
@section('role-label', $isRtl ? 'مدير النظام' : __('Admin'))

@section('sidebar-links')
    <x-sidebar-link :href="Route::has('admin.dashboard') ? route('admin.dashboard') : '#'" :active="request()->routeIs('admin.dashboard')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                    <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'لوحة التحكم' : __('Dashboard') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.users.index') ? route('admin.users.index') : '#'" :active="request()->routeIs('admin.users.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'المستخدمون' : __('Users') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.doctors.index') ? route('admin.doctors.index') : '#'" :active="request()->routeIs('admin.doctors.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'الأطباء' : __('Doctors') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.departments.index') ? route('admin.departments.index') : '#'" :active="request()->routeIs('admin.departments.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 21h18M3 7v14M21 7v14M6 11h3M6 15h3M15 11h3M15 15h3M9 3h6v4H9z"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'الأقسام الطبية' : __('Departments') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#'" :active="request()->routeIs('admin.appointments.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'المواعيد والحجوزات' : __('Appointments') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.reports.index') ? route('admin.reports.index') : '#'" :active="request()->routeIs('admin.reports.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'التقارير والإحصاءات' : __('Reports') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.notifications.index') ? route('admin.notifications.index') : '#'" :active="true">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'الإشعارات' : __('Notifications') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.settings.index') ? route('admin.settings.index') : '#'" :active="request()->routeIs('admin.settings.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'إعدادات الحساب' : __('Account Settings') }}
    </x-sidebar-link>
@endsection

@section('content')
<style>
    @media print {
        header, nav, aside, .print\:hidden, #toastNotification {
            display: none !important;
        }
        body, main {
            background: #ffffff !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        .alert-row {
            break-inside: avoid;
        }
        #viewNotificationModal {
            position: static !important;
            display: block !important;
            background: transparent !important;
            padding: 0 !important;
        }
        #viewNotificationModal > div {
            padding: 0 !important;
            display: block !important;
        }
        #viewNotificationModal .shadow-2xl {
            box-shadow: none !important;
            border: 1px solid #000000 !important;
            max-width: 100% !important;
        }
    }
</style>

<div class="space-y-6" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

    {{-- ══════════════════════════════════════════
         TOP HEADER & ACTIONS
    ══════════════════════════════════════════ --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-5 bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-xs">
        <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#14AFC3] via-[#0C6B78] to-[#152C4B] flex items-center justify-center text-white shadow-md shadow-[#14AFC3]/20 shrink-0">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                </svg>
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <h1 class="text-xl sm:text-2xl font-black text-[#152C4B] dark:text-white tracking-tight leading-tight">
                        {{ $isRtl ? 'مركز الإشعارات والتنبيهات الإكلينيكية' : 'Clinical & Operational Alerts' }}
                    </h1>
                    <span class="w-2 h-2 rounded-full bg-[#14AFC3]"></span>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-0.5">
                    {{ $isRtl ? 'تنبيهات الطوارئ والإنعاش، إشعارات دخول وتنويم المرضى، بلاغات التشغيل والجاهزية الطبية.' : 'Emergency code alerts, patient admissions, operating theater readiness, and clinical dispatches.' }}
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2.5 self-start sm:self-auto print:hidden">
            <button type="button" onclick="window.print()" 
                    class="px-4 py-2.5 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-[#152C4B] dark:text-slate-200 text-xs font-bold rounded-xl border border-slate-200/80 dark:border-slate-700 shadow-xs transition-all flex items-center gap-2 cursor-pointer hover:border-[#14AFC3]">
                <svg width="15" height="15" class="text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span>{{ $isRtl ? 'طباعة سجل البلاغات' : 'Print Alert Log' }}</span>
            </button>

            <button type="button" onclick="markAllAsRead()" 
                    class="px-4 py-2.5 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-slate-700 dark:text-slate-300 text-xs font-bold rounded-xl border border-slate-200/80 dark:border-slate-700 shadow-xs transition-all flex items-center gap-2 cursor-pointer">
                <svg width="15" height="15" class="text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7m-14 4l4 4L19 7"/>
                </svg>
                <span>{{ $isRtl ? 'تحديد الكل كمقروء' : 'Mark All Read' }}</span>
            </button>

            <button type="button" onclick="openBroadcastModal()" 
                    class="px-4 py-2.5 bg-[#14AFC3] hover:bg-[#0C6B78] text-white text-xs font-black rounded-xl shadow-md shadow-[#14AFC3]/20 transition-all flex items-center gap-1.5 cursor-pointer hover:-translate-y-0.5">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                </svg>
                <span>{{ $isRtl ? 'بث تنبيه تشغيلي' : 'Broadcast Alert' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         4 KPI METRIC CARDS (CENTERED ICON & TEXT)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        {{-- Card 1: Total Active System Alerts (Highlighted Teal Gradient) --}}
        <x-stat-card 
            :highlighted="true"
            :label="$isRtl ? 'إجمالي التنبيهات النشطة' : 'Active System Alerts'"
            value="24"
            :sublabel="$isRtl ? '+5 تنبيهات هذا الأسبوع' : '+5 new this week'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 2: Critical Emergency Alerts --}}
        <x-stat-card 
            :highlighted="false"
            :label="$isRtl ? 'تنبيهات حرجة (طوارئ وعناية)' : 'Critical Emergency Alerts'"
            value="3"
            :sublabel="$isRtl ? '~ 2 دقيقة سرعة الاستجابة' : '~ 2 min Avg Response'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 3: Admissions & Queues --}}
        <x-stat-card 
            :highlighted="false"
            :label="$isRtl ? 'إشعارات الدخول والمواعيد' : 'Admissions & Queues'"
            value="14"
            :sublabel="$isRtl ? '100% تزامن الاستقبال المباشر' : '100% Front Desk Sync'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 4: Operations & Facilities --}}
        <x-stat-card 
            :highlighted="false"
            :label="$isRtl ? 'بلاغات التشغيل والأنظمة' : 'Operations & Facilities'"
            value="7"
            :sublabel="$isRtl ? 'كافة الأنظمة الإكلينيكية مستقرة' : 'Clinical Systems Stable'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

    </div>

    {{-- ══════════════════════════════════════════
         FILTER TOOLBAR (SINGLE UNIFIED LINE)
    ══════════════════════════════════════════ --}}
    <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-3 p-3.5 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-xs print:hidden">
        
        {{-- Category Tabs --}}
        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 xl:pb-0 text-xs no-scrollbar">
            <button type="button" onclick="setAlertCategory('all', this)" class="alert-tab active px-3 py-1.5 rounded-xl font-bold bg-[#14AFC3] text-white shadow-xs flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'جميع التنبيهات' : 'All Alerts' }}</span>
                <span class="bg-white/20 text-white text-[10px] px-1.5 py-0.5 rounded-md font-bold">5</span>
            </button>
            <button type="button" onclick="setAlertCategory('critical', this)" class="alert-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'تنبيهات حرجة' : 'Critical Code' }}</span>
                <span class="bg-rose-100 text-rose-700 text-[10px] px-1.5 py-0.5 rounded-md font-bold">1</span>
            </button>
            <button type="button" onclick="setAlertCategory('patients', this)" class="alert-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'المرضى والمواعيد' : 'Patients & Queues' }}</span>
                <span class="bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-700">2</span>
            </button>
            <button type="button" onclick="setAlertCategory('operations', this)" class="alert-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'التشغيل والأنظمة' : 'Operations & Tech' }}</span>
                <span class="bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-700">2</span>
            </button>
            <button type="button" onclick="setAlertCategory('unread', this)" class="alert-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'غير مقروءة' : 'Unread' }}</span>
                <span class="bg-amber-100 text-amber-800 text-[10px] px-1.5 py-0.5 rounded-md font-bold">3</span>
            </button>
        </div>

        {{-- Search, Priority Dropdown & Live Count --}}
        <div class="flex items-center gap-2.5 flex-1 xl:flex-initial justify-end">
            <div class="relative w-full sm:w-64 xl:w-72">
                <input type="text" id="alertSearchInput" oninput="applyFilters()" 
                       placeholder="{{ $isRtl ? 'ابحث بنص التنبيه، القسم، الكود...' : 'Search alert text, dept, code...' }}" 
                       class="w-full text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/90 dark:border-slate-700 rounded-xl py-1.5 pl-3.5 pr-8 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3] focus:border-[#14AFC3] transition-all placeholder:text-slate-400">
                <div class="absolute inset-y-0 {{ $isRtl ? 'left-0 pl-2.5' : 'right-0 pr-2.5' }} flex items-center pointer-events-none text-slate-400">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </div>
            </div>

            <select id="priorityFilter" onchange="applyFilters()" class="text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/90 dark:border-slate-700 rounded-xl py-1.5 px-2.5 text-[#152C4B] dark:text-slate-200 font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                <option value="all">{{ $isRtl ? 'جميع المستويات' : 'All Severities' }}</option>
                <option value="critical">{{ $isRtl ? 'أولوية قصوى (حرج)' : 'High Critical' }}</option>
                <option value="normal">{{ $isRtl ? 'أولوية اعتيادية' : 'Normal Operational' }}</option>
            </select>

            <span class="text-[11px] font-black text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2.5 py-1.5 rounded-xl border border-slate-200/60 dark:border-slate-700 whitespace-nowrap shrink-0">
                <span id="filteredCount">5</span> {{ $isRtl ? 'تنبيهات' : 'Alerts' }}
            </span>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         NOTIFICATIONS DIRECTORY TABLE (ENTERPRISE 100% FIXED)
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[950px] border-collapse" id="notificationsTable">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
                        <th class="w-[38%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'مستوى الأولوية والتنبيه الطبي' : 'Alert & Severity' }}</th>
                        <th class="w-[22%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'القسم / الموقع' : 'Department & Wing' }}</th>
                        <th class="w-[14%] py-4 px-3 text-center">{{ $isRtl ? 'توقيت البلاغ' : 'Timestamp' }}</th>
                        <th class="w-[12%] py-4 px-3 text-center">{{ $isRtl ? 'حالة القراءة' : 'Status' }}</th>
                        <th class="w-[14%] py-4 px-4 text-center print:hidden">{{ $isRtl ? 'الإجراءات' : 'Actions' }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/70 text-slate-600 dark:text-slate-300 font-medium">
                    
                    {{-- Row 1: Critical Code Alert --}}
                    <tr class="alert-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors bg-rose-50/20 group" 
                        data-category="critical" 
                        data-priority="critical" 
                        data-unread="true" 
                        data-title="{{ $isRtl ? 'استدعاء كود أزرق (Code Blue) - إنعاش قلبي عاجل' : 'Code Blue - Cardiac Arrest' }}" 
                        data-code="ALT-CRIT-991" 
                        data-dept="{{ $isRtl ? 'العناية المركزة (ICU) · البرج الشرقي' : 'ICU · East Tower' }}" 
                        data-time="{{ $isRtl ? 'منذ 4 دقائق' : '4 mins ago' }}" 
                        data-exact="13:35:12" 
                        data-desc="{{ $isRtl ? 'تدهور مفاجئ في العلامات الحيوية لمريض السرير 14. تم استدعاء فريق الإنعاش القلبي الرئوي وتجهيز عربة الصدمات فوراً.' : 'Sudden telemetry drop in bed 14. Crash team summoned.' }}">
                        <td class="w-[38%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-rose-100 dark:bg-rose-950/60 text-rose-600 font-black text-xs flex items-center justify-center shrink-0 border border-rose-300/80 dark:border-rose-800 shadow-xs animate-pulse group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="font-black text-slate-900 dark:text-white text-xs sm:text-sm truncate group-hover:text-rose-600 transition-colors">{{ $isRtl ? 'استدعاء كود أزرق - إنعاش قلبي عاجل' : 'Code Blue - Cardiac Arrest' }}</span>
                                        <span class="text-[10px] text-rose-800 bg-rose-100 dark:bg-rose-950/80 font-mono font-bold px-2 py-0.5 rounded-md border border-rose-300/60 shrink-0 shadow-2xs">ALT-CRIT-991</span>
                                    </div>
                                    <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">
                                        {{ $isRtl ? 'مستشفى الرشيد · فريق الإنعاش قيد التدخل الفوري' : 'Al-Rasheed Hospital · Code Blue in effect' }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="w-[22%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <span class="font-bold text-slate-900 dark:text-white block truncate text-xs">{{ $isRtl ? 'العناية المركزة (ICU)' : 'Intensive Care Unit' }}</span>
                            <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">{{ $isRtl ? 'سرير 14 · الطابق الرابع' : 'Bed 14 · Floor 4' }}</span>
                        </td>
                        <td class="w-[14%] py-4 px-3 text-center whitespace-nowrap">
                            <span class="font-black text-rose-600 dark:text-rose-400 block text-xs">{{ $isRtl ? 'منذ 4 دقائق' : '4 mins ago' }}</span>
                            <span class="text-slate-400 dark:text-slate-500 font-mono text-[10.5px] block mt-0.5">13:35:12</span>
                        </td>
                        <td class="w-[12%] py-4 px-3 text-center">
                            <span class="read-badge inline-flex items-center gap-1.5 text-[11px] font-black text-amber-700 bg-amber-50 dark:bg-amber-950/40 dark:text-amber-300 px-3 py-1 rounded-full border border-amber-200/80 dark:border-amber-800/60 shadow-2xs">
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-ping"></span>
                                {{ $isRtl ? 'غير مقروء' : 'Unread' }}
                            </span>
                        </td>
                        <td class="w-[14%] py-4 px-4 text-center print:hidden">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <button onclick="viewNotification(this)" title="{{ $isRtl ? 'عرض تفاصيل التنبيه' : 'View Alert' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center cursor-pointer shadow-2xs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="toggleReadStatus(this)" title="{{ $isRtl ? 'تحديد كمقروء' : 'Mark Read' }}" class="w-8 h-8 rounded-xl text-slate-500 hover:text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-950/40 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </button>
                                <button onclick="dismissNotification(this)" title="{{ $isRtl ? 'أرشفة التنبيه' : 'Dismiss' }}" class="w-8 h-8 rounded-xl text-slate-400 hover:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/40 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Row 2: Patient Admission Alert --}}
                    <tr class="alert-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group" 
                        data-category="patients" 
                        data-priority="normal" 
                        data-unread="true" 
                        data-title="{{ $isRtl ? 'إشعار دخول مريض وتسكين سرير' : 'Patient Admission & Bed Assignment' }}" 
                        data-code="ALT-ADM-412" 
                        data-dept="{{ $isRtl ? 'جراحة العظام · البرج الطبي B' : 'Orthopedics · Tower B' }}" 
                        data-time="{{ $isRtl ? 'منذ 18 دقيقة' : '18 mins ago' }}" 
                        data-exact="13:21:05" 
                        data-desc="{{ $isRtl ? 'تم تحويل المريض (عبدالعزيز الشمري - MRN-88240) من قسم الطوارئ إلى سرير 08 بجناح العظام بعد استكمال الفحوصات وتأكيد التغطية.' : 'Direct ER transfer to bed 08.' }}">
                        <td class="w-[38%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] font-black text-xs flex items-center justify-center shrink-0 border border-[#14AFC3]/30 shadow-xs group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="font-black text-slate-900 dark:text-white text-xs sm:text-sm truncate group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'إشعار دخول مريض وتسكين سرير' : 'Patient Admission & Bed Assignment' }}</span>
                                        <span class="text-[10px] text-teal-800 bg-[#E5FAFC] dark:bg-[#14AFC3]/20 font-mono font-bold px-2 py-0.5 rounded-md border border-[#14AFC3]/30 shrink-0 shadow-2xs">ALT-ADM-412</span>
                                    </div>
                                    <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">
                                        {{ $isRtl ? 'المريض: عبدالعزيز الشمري · MRN-88240' : 'Patient: Abdulaziz Al-Shammari' }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="w-[22%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <span class="font-bold text-slate-900 dark:text-white block truncate text-xs">{{ $isRtl ? 'جراحة العظام والمفاصل' : 'Orthopedics' }}</span>
                            <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">{{ $isRtl ? 'سرير 08 · البرج B' : 'Bed 08 · Tower B' }}</span>
                        </td>
                        <td class="w-[14%] py-4 px-3 text-center whitespace-nowrap">
                            <span class="font-bold text-slate-800 dark:text-slate-200 block text-xs">{{ $isRtl ? 'منذ 18 دقيقة' : '18 mins ago' }}</span>
                            <span class="text-slate-400 dark:text-slate-500 font-mono text-[10.5px] block mt-0.5">13:21:05</span>
                        </td>
                        <td class="w-[12%] py-4 px-3 text-center">
                            <span class="read-badge inline-flex items-center gap-1.5 text-[11px] font-black text-amber-700 bg-amber-50 dark:bg-amber-950/40 dark:text-amber-300 px-3 py-1 rounded-full border border-amber-200/80 dark:border-amber-800/60 shadow-2xs">
                                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                {{ $isRtl ? 'غير مقروء' : 'Unread' }}
                            </span>
                        </td>
                        <td class="w-[14%] py-4 px-4 text-center print:hidden">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <button onclick="viewNotification(this)" title="{{ $isRtl ? 'عرض تفاصيل التنبيه' : 'View Alert' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center cursor-pointer shadow-2xs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="toggleReadStatus(this)" title="{{ $isRtl ? 'تحديد كمقروء' : 'Mark Read' }}" class="w-8 h-8 rounded-xl text-slate-500 hover:text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-950/40 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </button>
                                <button onclick="dismissNotification(this)" title="{{ $isRtl ? 'أرشفة التنبيه' : 'Dismiss' }}" class="w-8 h-8 rounded-xl text-slate-400 hover:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/40 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Row 3: Operation / Facility Notice --}}
                    <tr class="alert-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group" 
                        data-category="operations" 
                        data-priority="normal" 
                        data-unread="true" 
                        data-title="{{ $isRtl ? 'اكتمال تعقيم وجاهزية غرفة العمليات 03' : 'OR-03 Sterilization Complete' }}" 
                        data-code="ALT-OPS-819" 
                        data-dept="{{ $isRtl ? 'أجنحة العمليات · البرج الطبي الرئيسي' : 'Surgical Suites · Main Tower' }}" 
                        data-time="{{ $isRtl ? 'منذ 35 دقيقة' : '35 mins ago' }}" 
                        data-exact="13:04:19" 
                        data-desc="{{ $isRtl ? 'تم استكمال برنامج التعقيم الكيميائي والتهوية الضغطية لغرفة OR-03 بنجاح وهي الآن جاهزة للجدولة.' : 'Sterilization cycle complete for OR-03.' }}">
                        <td class="w-[38%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-teal-50 dark:bg-[#14AFC3]/15 text-[#14AFC3] font-black text-xs flex items-center justify-center shrink-0 border border-teal-200 dark:border-[#14AFC3]/30 shadow-xs group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="font-black text-slate-900 dark:text-white text-xs sm:text-sm truncate group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'اكتمال تعقيم وجاهزية غرفة العمليات 03' : 'OR-03 Sterilization Complete' }}</span>
                                        <span class="text-[10px] text-teal-800 bg-teal-50 dark:bg-[#14AFC3]/20 font-mono font-bold px-2 py-0.5 rounded-md border border-teal-200 shrink-0 shadow-2xs">ALT-OPS-819</span>
                                    </div>
                                    <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">
                                        {{ $isRtl ? 'جاهزية تامة للجراحة · كود ضغط هوائي معتمد' : 'Ready for surgery' }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="w-[22%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <span class="font-bold text-slate-900 dark:text-white block truncate text-xs">{{ $isRtl ? 'مجمع العمليات الجراحية' : 'Surgical Suites' }}</span>
                            <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">{{ $isRtl ? 'غرفة OR-03 · البرج الرئيسي' : 'Room OR-03' }}</span>
                        </td>
                        <td class="w-[14%] py-4 px-3 text-center whitespace-nowrap">
                            <span class="font-bold text-slate-800 dark:text-slate-200 block text-xs">{{ $isRtl ? 'منذ 35 دقيقة' : '35 mins ago' }}</span>
                            <span class="text-slate-400 dark:text-slate-500 font-mono text-[10.5px] block mt-0.5">13:04:19</span>
                        </td>
                        <td class="w-[12%] py-4 px-3 text-center">
                            <span class="read-badge inline-flex items-center gap-1.5 text-[11px] font-black text-amber-700 bg-amber-50 dark:bg-amber-950/40 dark:text-amber-300 px-3 py-1 rounded-full border border-amber-200/80 dark:border-amber-800/60 shadow-2xs">
                                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                {{ $isRtl ? 'غير مقروء' : 'Unread' }}
                            </span>
                        </td>
                        <td class="w-[14%] py-4 px-4 text-center print:hidden">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <button onclick="viewNotification(this)" title="{{ $isRtl ? 'عرض تفاصيل التنبيه' : 'View Alert' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center cursor-pointer shadow-2xs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="toggleReadStatus(this)" title="{{ $isRtl ? 'تحديد كمقروء' : 'Mark Read' }}" class="w-8 h-8 rounded-xl text-slate-500 hover:text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-950/40 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </button>
                                <button onclick="dismissNotification(this)" title="{{ $isRtl ? 'أرشفة التنبيه' : 'Dismiss' }}" class="w-8 h-8 rounded-xl text-slate-400 hover:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/40 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Row 4: Read Notification --}}
                    <tr class="alert-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group opacity-90" 
                        data-category="patients" 
                        data-priority="normal" 
                        data-unread="false" 
                        data-title="{{ $isRtl ? 'تحديث انسيابية طابور انتظار العيادات' : 'Clinic Live Queue Progress' }}" 
                        data-code="ALT-QUE-102" 
                        data-dept="{{ $isRtl ? 'أمراض القلب · البرج الطبي A' : 'Cardiology · Tower A' }}" 
                        data-time="{{ $isRtl ? 'منذ ساعتين' : '2 hours ago' }}" 
                        data-exact="11:40:00" 
                        data-desc="{{ $isRtl ? 'اكتمال فحص 14 مريضاً بنجاح من أصل 18 مسجلاً في الفترة الصباحية بعيادة القلب 204.' : 'Morning queue progress updated.' }}">
                        <td class="w-[38%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-500 font-black text-xs flex items-center justify-center shrink-0 border border-slate-200 dark:border-slate-700 shadow-xs group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="font-bold text-slate-800 dark:text-slate-200 text-xs sm:text-sm truncate group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'تحديث انسيابية طابور انتظار العيادات' : 'Clinic Live Queue Progress' }}</span>
                                        <span class="text-[10px] text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 font-mono px-2 py-0.5 rounded-md border border-slate-200 dark:border-slate-700 shrink-0">ALT-QUE-102</span>
                                    </div>
                                    <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">
                                        {{ $isRtl ? 'عيادة 204 · تم فحص 14 مريضاً' : 'Clinic 204 progress' }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="w-[22%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <span class="font-bold text-slate-800 dark:text-slate-200 block truncate text-xs">{{ $isRtl ? 'عيادات القلب التخصصية' : 'Cardiology Clinic' }}</span>
                            <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">{{ $isRtl ? 'عيادة 204 · المبنى الرئيسي' : 'Clinic 204' }}</span>
                        </td>
                        <td class="w-[14%] py-4 px-3 text-center whitespace-nowrap">
                            <span class="font-bold text-slate-700 dark:text-slate-300 block text-xs">{{ $isRtl ? 'منذ ساعتين' : '2 hours ago' }}</span>
                            <span class="text-slate-400 dark:text-slate-500 font-mono text-[10.5px] block mt-0.5">11:40:00</span>
                        </td>
                        <td class="w-[12%] py-4 px-3 text-center">
                            <span class="read-badge inline-flex items-center gap-1.5 text-[11px] font-bold text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full border border-slate-200/80 dark:border-slate-700 shadow-2xs">
                                {{ $isRtl ? 'تمت القراءة' : 'Read' }}
                            </span>
                        </td>
                        <td class="w-[14%] py-4 px-4 text-center print:hidden">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <button onclick="viewNotification(this)" title="{{ $isRtl ? 'عرض تفاصيل التنبيه' : 'View Alert' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center cursor-pointer shadow-2xs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="dismissNotification(this)" title="{{ $isRtl ? 'أرشفة التنبيه' : 'Dismiss' }}" class="w-8 h-8 rounded-xl text-slate-400 hover:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/40 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Row 5: Pharmacy Stock Warning --}}
                    <tr class="alert-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group opacity-90" 
                        data-category="operations" 
                        data-priority="normal" 
                        data-unread="false" 
                        data-title="{{ $isRtl ? 'تنبيه مخزون الأدوية والمحاليل الحيوية' : 'Critical Medication Inventory Alert' }}" 
                        data-code="ALT-MED-309" 
                        data-dept="{{ $isRtl ? 'الصيدلية المركزية · المبنى C' : 'Central Pharmacy · Bldg C' }}" 
                        data-time="{{ $isRtl ? 'منذ 3 ساعات' : '3 hours ago' }}" 
                        data-exact="10:15:00" 
                        data-desc="{{ $isRtl ? 'وصل مخزون محاليل الإنعاش ومضادات التخثر للحد الأدنى لإعادة الطلب التلقائي. تم تفعيل أمر التوريد.' : 'Central pharmacy reorder threshold reached.' }}">
                        <td class="w-[38%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-500 font-black text-xs flex items-center justify-center shrink-0 border border-slate-200 dark:border-slate-700 shadow-xs group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="font-bold text-slate-800 dark:text-slate-200 text-xs sm:text-sm truncate group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'تنبيه مخزون الأدوية والمحاليل الحيوية' : 'Critical Medication Inventory Alert' }}</span>
                                        <span class="text-[10px] text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 font-mono px-2 py-0.5 rounded-md border border-slate-200 dark:border-slate-700 shrink-0">ALT-MED-309</span>
                                    </div>
                                    <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">
                                        {{ $isRtl ? 'تم تفعيل التوريد التلقائي عبر التموين الطبي' : 'Auto supply triggered' }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="w-[22%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <span class="font-bold text-slate-800 dark:text-slate-200 block truncate text-xs">{{ $isRtl ? 'الصيدلية المركزية والتموين' : 'Central Pharmacy & Supplies' }}</span>
                            <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">{{ $isRtl ? 'المبنى التشخيصي C' : 'Diagnostic Wing C' }}</span>
                        </td>
                        <td class="w-[14%] py-4 px-3 text-center whitespace-nowrap">
                            <span class="font-bold text-slate-700 dark:text-slate-300 block text-xs">{{ $isRtl ? 'منذ 3 ساعات' : '3 hours ago' }}</span>
                            <span class="text-slate-400 dark:text-slate-500 font-mono text-[10.5px] block mt-0.5">10:15:00</span>
                        </td>
                        <td class="w-[12%] py-4 px-3 text-center">
                            <span class="read-badge inline-flex items-center gap-1.5 text-[11px] font-bold text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full border border-slate-200/80 dark:border-slate-700 shadow-2xs">
                                {{ $isRtl ? 'تمت القراءة' : 'Read' }}
                            </span>
                        </td>
                        <td class="w-[14%] py-4 px-4 text-center print:hidden">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <button onclick="viewNotification(this)" title="{{ $isRtl ? 'عرض تفاصيل التنبيه' : 'View Alert' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center cursor-pointer shadow-2xs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="dismissNotification(this)" title="{{ $isRtl ? 'أرشفة التنبيه' : 'Dismiss' }}" class="w-8 h-8 rounded-xl text-slate-400 hover:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/40 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Table Footer / Pagination --}}
        <div class="py-3 px-5 bg-slate-50/60 dark:bg-slate-800/40 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between text-xs text-slate-400 dark:text-slate-500 font-medium">
            <span>{{ $isRtl ? 'عرض 1 إلى 5 من أصل 24 بلاغاً وتنبيهاً مباشراً (مستشفى الرشيد - صنعاء)' : 'Showing 1 to 5 of 24 real-time alerts' }}</span>
            <div class="flex items-center gap-1.5 print:hidden">
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 disabled:opacity-50 text-xs font-bold" disabled>{{ $isRtl ? 'السابق' : 'Prev' }}</button>
                <button class="px-3 py-1.5 rounded-xl bg-[#14AFC3] text-white text-xs font-black shadow-xs">1</button>
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 disabled:opacity-50 text-xs font-bold" disabled>{{ $isRtl ? 'التالي' : 'Next' }}</button>
            </div>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════════════════════
     1. MODAL: DETAILED OFFICIAL NOTIFICATION PREVIEW (LUXURY GOLD STANDARD)
══════════════════════════════════════════════════════════════ --}}
<div id="viewNotificationModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-[#0A1628]/60 backdrop-blur-md transition-opacity print:hidden" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div class="w-full max-w-2xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            {{-- Luxury Gradient Header --}}
            <div class="relative px-6 py-6 bg-gradient-to-r from-[#0A1628] via-[#152C4B] to-[#0C6B78] text-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div id="modalAlertIcon" class="w-12 h-12 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center text-white shadow-inner shrink-0">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 id="viewAlertTitle" class="text-lg font-black tracking-tight text-white leading-tight"></h3>
                                <span id="viewAlertCode" class="px-2 py-0.5 rounded-full text-[10px] font-mono font-bold bg-white/20 text-white border border-white/30"></span>
                            </div>
                            <p class="text-xs text-white/70 font-medium mt-0.5 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · صنعاء' : 'Al-Rasheed Specialized Hospital · Sana\'a' }}</span>
                                <span class="text-white/40">·</span>
                                <span id="viewAlertTime" class="text-cyan-300 font-bold"></span>
                            </p>
                        </div>
                    </div>
                    <button type="button" onclick="closeViewModal()" 
                            class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white/80 hover:text-white flex items-center justify-center transition-colors cursor-pointer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    </button>
                </div>
            </div>

            <div class="p-6 space-y-5">
                
                {{-- Section 1: Department & Location --}}
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'القسم والموقع المتأثر' : 'Department & Location' }}
                        </h4>
                    </div>

                    <div class="p-3.5 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-100 dark:border-slate-800">
                        <span id="viewAlertDept" class="font-black text-sm text-[#152C4B] dark:text-white block"></span>
                        <span class="text-[11px] text-slate-400 block mt-0.5">{{ $isRtl ? 'مستشفى الرشيد التخصصي · صنعاء - الجمهورية اليمنية' : 'Al-Rasheed Specialized Hospital · Sana\'a' }}</span>
                    </div>
                </div>

                {{-- Section 2: Directive Text & Details --}}
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'نص البلاغ الطبي والتعليمات التشغيلية' : 'Clinical Telemetry Details' }}
                        </h4>
                    </div>

                    <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-100 dark:border-slate-800">
                        <p id="viewAlertDesc" class="text-xs text-slate-700 dark:text-slate-300 leading-relaxed font-medium"></p>
                    </div>
                </div>

                {{-- Section 3: Response Status Box --}}
                <div class="p-3.5 rounded-2xl bg-[#E5FAFC]/80 dark:bg-[#14AFC3]/10 border border-[#14AFC3]/30 flex items-center justify-between text-xs">
                    <div>
                        <span class="text-[10px] font-black text-[#0C6B78] dark:text-[#14AFC3] block">{{ $isRtl ? 'حالة الاستجابة والتوثيق المعتمد' : 'Response Status' }}</span>
                        <span class="text-[11px] text-slate-700 dark:text-slate-300 font-semibold mt-0.5 block">{{ $isRtl ? 'فريق الإنعاش والاستجابة السريعة متصل بالنظام' : 'Al-Rasheed Hospital · Response Team Active' }}</span>
                    </div>
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse shrink-0"></span>
                </div>

                {{-- Luxury Action Footer --}}
                <div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-800">
                    <button type="button" onclick="printCurrentAlert()" class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-xl text-xs transition-colors flex items-center gap-1.5 cursor-pointer">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        <span>{{ $isRtl ? 'طباعة البلاغ' : 'Print Alert' }}</span>
                    </button>
                    
                    <div class="flex items-center gap-2">
                        <button type="button" onclick="closeViewModal()" class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-xl text-xs transition-colors cursor-pointer">
                            {{ $isRtl ? 'إغلاق' : 'Close' }}
                        </button>
                        <button type="button" onclick="acknowledgeAlert()" class="px-5 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/20 transition-all flex items-center gap-1.5 cursor-pointer hover:-translate-y-0.5">
                            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            <span>{{ $isRtl ? 'تأكيد الاستجابة' : 'Acknowledge' }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════
     2. MODAL: BROADCAST OPERATIONAL ALERT (LUXURY GOLD STANDARD)
══════════════════════════════════════════════════════════════ --}}
<div id="broadcastAlertModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-[#0A1628]/60 backdrop-blur-md transition-opacity print:hidden" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div class="w-full max-w-2xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            <div class="relative px-6 py-6 bg-gradient-to-r from-[#0A1628] via-[#152C4B] to-[#0C6B78] text-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center text-white shadow-inner shrink-0">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-lg font-black tracking-tight text-white">{{ $isRtl ? 'بث تنبيه تشغيلي وإكلينيكي عام' : 'Broadcast Operational Notice' }}</h3>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-black bg-cyan-500/20 text-cyan-300 border border-cyan-400/30">
                                    {{ $isRtl ? 'بث فوري' : 'Live Dispatch' }}
                                </span>
                            </div>
                            <p class="text-xs text-white/70 font-medium mt-0.5 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · صنعاء' : 'Al-Rasheed Specialized Hospital · Sana\'a' }}</span>
                            </p>
                        </div>
                    </div>
                    <button type="button" onclick="closeBroadcastModal()" 
                            class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white/80 hover:text-white flex items-center justify-center transition-colors cursor-pointer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    </button>
                </div>
            </div>

            <form onsubmit="handleBroadcastSubmit(event)" class="p-6 space-y-5">
                
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'عنوان البلاغ والأقسام المستهدفة' : 'Alert Header & Target' }}
                        </h4>
                    </div>

                    <div>
                        <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'عنوان التنبيه الرئيسي' : 'Alert Title' }} <span class="text-rose-500">*</span></label>
                        <input type="text" required placeholder="{{ $isRtl ? 'مثال: إجراء تعقيم وقائي لمجمع العيادات الخارجية والبرج الجراحي' : 'e.g. Sterilization scheduled' }}" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'الأقسام المستهدفة بالبلاغ' : 'Target Departments' }} <span class="text-rose-500">*</span></label>
                            <select class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 text-[#152C4B] dark:text-white font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                                <option value="all">{{ $isRtl ? 'كافة أقسام مستشفى الرشيد' : 'Hospital-wide Broadcast' }}</option>
                                <option value="clinics">{{ $isRtl ? 'العيادات الخارجية والاستقبال' : 'Outpatient Clinics' }}</option>
                                <option value="icu">{{ $isRtl ? 'العناية المركزة والطوارئ' : 'ICU & Emergency' }}</option>
                                <option value="or">{{ $isRtl ? 'أجنحة العمليات والتعقيم' : 'Surgical Suites' }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'درجة الخطورة والأولوية' : 'Severity Level' }} <span class="text-rose-500">*</span></label>
                            <select class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 text-[#152C4B] dark:text-white font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                                <option value="normal">{{ $isRtl ? 'إشعار اعتيادي (Normal Info)' : 'Normal Info' }}</option>
                                <option value="high">{{ $isRtl ? 'تنبيه عاجل (Urgent Alert)' : 'Urgent Alert' }}</option>
                                <option value="critical">{{ $isRtl ? 'حالة طوارئ قصوى (Code Blue / Trauma)' : 'Critical Code' }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'نص البلاغ والتوجيهات الطبية' : 'Directives & Message Body' }}
                        </h4>
                    </div>

                    <div>
                        <textarea rows="4" required placeholder="{{ $isRtl ? 'اكتب تفاصيل التنبيه والتعليمات الموجهة للطواقم الطبية والتمريضية والإدارية في مستشفى الرشيد...' : 'Write directive details here...' }}" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 p-3.5 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3] leading-relaxed"></textarea>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <button type="button" onclick="closeBroadcastModal()" class="px-5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-xl text-xs transition-colors cursor-pointer">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/20 transition-all cursor-pointer hover:-translate-y-0.5">
                        {{ $isRtl ? 'بث الإشعار فوراً' : 'Broadcast Now' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- TOAST NOTIFICATION --}}
<div id="toastNotification" class="fixed bottom-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none print:hidden" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-[#152C4B] text-white text-xs font-bold px-4 py-3 rounded-2xl shadow-xl flex items-center gap-2.5 border border-[#14AFC3]/30">
        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] shrink-0 animate-ping"></span>
        <span id="toastMessage"></span>
    </div>
</div>

<script>
    let activeAlertCategory = 'all';

    // Filter by Alert Categories
    function setAlertCategory(category, btn) {
        activeAlertCategory = category;
        document.querySelectorAll('.alert-tab').forEach(el => {
            el.classList.remove('bg-[#14AFC3]', 'text-white', 'shadow-xs', 'font-bold');
            el.classList.add('bg-slate-50', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300', 'font-semibold');
        });

        btn.classList.remove('bg-slate-50', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300', 'font-semibold');
        btn.classList.add('bg-[#14AFC3]', 'text-white', 'shadow-xs', 'font-bold');

        applyFilters();
    }

    // Apply Live Search & Filters
    function applyFilters() {
        const query = (document.getElementById('alertSearchInput').value || '').toLowerCase().trim();
        const priority = document.getElementById('priorityFilter').value;
        const rows = document.querySelectorAll('.alert-row');
        let count = 0;

        rows.forEach(row => {
            const cat = row.dataset.category || '';
            const prio = row.dataset.priority || '';
            const unread = row.dataset.unread === 'true';

            let matchesCat = (activeAlertCategory === 'all');
            if (activeAlertCategory === 'unread') {
                matchesCat = unread;
            } else if (activeAlertCategory !== 'all') {
                matchesCat = (cat === activeAlertCategory);
            }

            const matchesPrio = (priority === 'all' || prio === priority);

            const title = (row.dataset.title || '').toLowerCase();
            const code = (row.dataset.code || '').toLowerCase();
            const dept = (row.dataset.dept || '').toLowerCase();
            const desc = (row.dataset.desc || '').toLowerCase();

            const matchesSearch = !query || title.includes(query) || code.includes(query) || dept.includes(query) || desc.includes(query);

            if (matchesCat && matchesPrio && matchesSearch) {
                row.style.display = '';
                count++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('filteredCount').innerText = count;
    }

    // Modal Actions
    let currentActiveAlertRow = null;

    function viewNotification(btn) {
        const row = btn.closest('tr');
        if (!row) return;

        currentActiveAlertRow = row;

        document.getElementById('viewAlertTitle').innerText = row.dataset.title || '';
        document.getElementById('viewAlertCode').innerText = row.dataset.code || '';
        document.getElementById('viewAlertTime').innerText = row.dataset.time || '';
        document.getElementById('viewAlertDept').innerText = row.dataset.dept || '';
        document.getElementById('viewAlertDesc').innerText = row.dataset.desc || '';

        const iconContainer = document.getElementById('modalAlertIcon');
        if (row.dataset.priority === 'critical') {
            iconContainer.className = 'w-12 h-12 rounded-2xl bg-rose-500/20 text-rose-300 border border-rose-400/30 flex items-center justify-center shrink-0 shadow-inner animate-pulse';
        } else {
            iconContainer.className = 'w-12 h-12 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center text-white shadow-inner shrink-0';
        }

        document.getElementById('viewNotificationModal').classList.remove('hidden');
    }

    function closeViewModal() {
        document.getElementById('viewNotificationModal').classList.add('hidden');
    }

    function acknowledgeAlert() {
        if (currentActiveAlertRow) {
            markRowAsRead(currentActiveAlertRow);
        }
        closeViewModal();
        showToast("{{ $isRtl ? 'تم تأكيد الاستجابة للبلاغ بنجاح.' : 'Alert acknowledged successfully.' }}");
    }

    function toggleReadStatus(btn) {
        const row = btn.closest('tr');
        if (!row) return;
        markRowAsRead(row);
        showToast("{{ $isRtl ? 'تم تحديد البلاغ كمقروء.' : 'Alert marked as read.' }}");
    }

    function markRowAsRead(row) {
        row.dataset.unread = 'false';
        const badge = row.querySelector('.read-badge');
        if (badge) {
            badge.className = 'read-badge inline-flex items-center gap-1.5 text-[10.5px] font-bold text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2.5 py-1 rounded-full border border-slate-200/60 dark:border-slate-700';
            badge.innerHTML = "{{ $isRtl ? 'تمت القراءة' : 'Read' }}";
        }
        row.classList.add('opacity-85');
    }

    function markAllAsRead() {
        document.querySelectorAll('.alert-row').forEach(row => {
            markRowAsRead(row);
        });
        showToast("{{ $isRtl ? 'تم تحديد جميع التنبيهات كمقروءة.' : 'All alerts marked as read.' }}");
    }

    function dismissNotification(btn) {
        const row = btn.closest('tr');
        if (!row) return;
        row.remove();
        applyFilters();
        showToast("{{ $isRtl ? 'تمت أرشفة البلاغ بنجاح.' : 'Alert dismissed successfully.' }}");
    }

    function printCurrentAlert() {
        window.print();
    }

    // Broadcast Modal
    function openBroadcastModal() {
        document.getElementById('broadcastAlertModal').classList.remove('hidden');
    }

    function closeBroadcastModal() {
        document.getElementById('broadcastAlertModal').classList.add('hidden');
    }

    function handleBroadcastSubmit(e) {
        e.preventDefault();
        closeBroadcastModal();
        showToast("{{ $isRtl ? 'تم بث التنبيه التشغيلي لكافة الأقسام المعنية بنجاح.' : 'Notice broadcasted successfully.' }}");
    }

    function showToast(message) {
        const toast = document.getElementById('toastNotification');
        document.getElementById('toastMessage').innerText = message;
        toast.classList.remove('translate-y-20', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');

        setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('translate-y-20', 'opacity-0');
        }, 3200);
    }
</script>
@endsection
