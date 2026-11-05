@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';
@endphp

@section('page-title', $isRtl ? 'التقارير والإحصائيات' : __('Reports & Analytics'))
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
        {{ $isRtl ? 'المستخدمون' : __('Users') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.doctors.index') ? route('admin.doctors.index') : '#'" :active="request()->routeIs('admin.doctors.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'الأطباء' : __('Doctors') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.departments.index') ? route('admin.departments.index') : '#'" :active="request()->routeIs('admin.departments.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 21h18M3 7v14M21 7v14M6 11h3M6 15h3M15 11h3M15 15h3M9 3h6v4H9z"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'الأقسام' : __('Departments') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#'" :active="request()->routeIs('admin.appointments.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'المواعيد' : __('Appointments') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.reports.index') ? route('admin.reports.index') : '#'" :active="true">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/>
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

    <x-sidebar-link :href="Route::has('admin.settings.index') ? route('admin.settings.index') : '#'" :active="request()->routeIs('admin.settings.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'إعدادات الحساب' : __('Account Settings') }}
    </x-sidebar-link>
@endsection

@section('content')
<div class="space-y-6" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

    {{-- ══════════════════════════════════════════
         TOP HEADER & ACTIONS (LUXURY CLINICAL GOLD STANDARD)
    ══════════════════════════════════════════ --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-5 sm:p-6 bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-xs">
        <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#14AFC3] via-[#0C6B78] to-[#152C4B] flex items-center justify-center text-white shadow-md shadow-[#14AFC3]/20 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <h1 class="text-xl sm:text-2xl font-black text-[#152C4B] dark:text-white tracking-tight leading-tight">
                        {{ $isRtl ? 'التقارير والإحصائيات الإكلينيكية' : 'Clinical Telemetry & Analytics' }}
                    </h1>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                        {{ $isRtl ? 'مستشفى الرشيد - صنعاء' : 'Al-Rasheed Hospital' }}
                    </span>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-xs font-medium mt-0.5">
                    {{ $isRtl ? 'مؤشرات الأداء التشغيلي، السعة السريرية، التدفق المالي، وجودة الرعاية الطبية المعتمدة.' : 'Operational metrics, bed census, financial telemetry, and clinical quality audits.' }}
                </p>
            </div>
        </div>
        
        <div class="flex items-center gap-2.5 print:hidden self-start sm:self-auto">
            <button onclick="downloadMasterExport()" class="px-4 py-2.5 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-[#152C4B] dark:text-slate-200 text-xs font-bold rounded-xl border border-slate-200/90 dark:border-slate-700 shadow-xs transition-all flex items-center gap-2 group hover:border-[#14AFC3] cursor-pointer">
                <div class="w-5 h-5 rounded-lg bg-[#E5FAFC] dark:bg-[#14AFC3]/20 text-[#14AFC3] flex items-center justify-center transition-colors group-hover:bg-[#14AFC3] group-hover:text-white">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </div>
                <span>{{ $isRtl ? 'تصدير الحزمة الشاملة' : 'Export Full Dossier' }}</span>
            </button>

            <button onclick="openCustomReportModal()" class="px-4 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#08525D] text-white text-xs font-black rounded-xl shadow-md shadow-[#14AFC3]/25 transition-all flex items-center gap-1.5 hover:-translate-y-0.5 cursor-pointer">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                <span>{{ $isRtl ? 'إنشاء تقرير مخصص' : 'Custom Report' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         4 KPI STATS OVERVIEW CARDS (PROMINENT & CENTERED)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <x-stat-card
            :label="$isRtl ? 'إجمالي التقارير الصادرة' : 'Total Reports Issued'"
            value="1,420"
            :sublabel="$isRtl ? '+12% هذا الشهر' : '+12% this month'"
            :highlighted="true"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            :label="$isRtl ? 'متوسط الإشغال السريري' : 'Bed Census Rate'"
            value="86.4%"
            :sublabel="$isRtl ? '+4.2% النطاق المثالي' : '+4.2% Optimal Capacity'"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            :label="$isRtl ? 'إنجاز مواعيد العيادات' : 'Clinic Completion'"
            value="94.8%"
            :sublabel="$isRtl ? '18 دقيقة متوسط الفحص' : '18 min Avg Consult'"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            :label="$isRtl ? 'مؤشر رضا المرضى' : 'Patient Satisfaction'"
            value="4.9 / 5.0"
            :sublabel="$isRtl ? '2,180 تقييم موثق' : '2,180 Verified Reviews'"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>
    </div>

    {{-- ══════════════════════════════════════════
         FILTER & SEARCH TOOLBAR (SINGLE UNIFIED LINE)
    ══════════════════════════════════════════ --}}
    <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-3.5 p-3.5 sm:p-4 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-xs print:hidden">
        {{-- Report Category Tabs --}}
        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 xl:pb-0 text-xs no-scrollbar">
            <button onclick="setCategoryFilter('all', this)" class="report-tab active px-3.5 py-2 rounded-xl font-bold bg-[#14AFC3] text-white shadow-xs flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'جميع التقارير' : 'All Reports' }}</span>
                <span class="bg-white/20 text-white text-[10px] px-1.5 py-0.5 rounded-md font-bold">6</span>
            </button>
            <button onclick="setCategoryFilter('clinical', this)" class="report-tab px-3.5 py-2 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'السريرية والطبية' : 'Clinical' }}</span>
                <span class="bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-600 font-mono">2</span>
            </button>
            <button onclick="setCategoryFilter('census', this)" class="report-tab px-3.5 py-2 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'السعة والإشغال' : 'Bed Census' }}</span>
                <span class="bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-600 font-mono">2</span>
            </button>
            <button onclick="setCategoryFilter('financial', this)" class="report-tab px-3.5 py-2 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'المالية والتأمين' : 'Financial' }}</span>
                <span class="bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-600 font-mono">1</span>
            </button>
            <button onclick="setCategoryFilter('quality', this)" class="report-tab px-3.5 py-2 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'الجودة والاعتماد' : 'Quality' }}</span>
                <span class="bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-600 font-mono">1</span>
            </button>
        </div>

        {{-- Search Input, Period Filter & Live Counter --}}
        <div class="flex items-center gap-2.5 flex-wrap sm:flex-nowrap justify-end">
            <div class="relative w-full sm:w-64 md:w-72">
                <input type="text" id="reportSearchInput" oninput="applyFilters()" 
                    placeholder="{{ $isRtl ? 'ابحث بالاسم، الكود، أو القسم...' : 'Search by title, code, department...' }}" 
                    class="w-full text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700 rounded-xl py-2 {{ $isRtl ? 'pr-9 pl-3.5' : 'pl-9 pr-3.5' }} text-slate-900 dark:text-white focus:ring-1 focus:ring-[#14AFC3] focus:border-[#14AFC3] transition-all placeholder:text-slate-400 outline-none">
                <div class="absolute inset-y-0 {{ $isRtl ? 'right-3' : 'left-3' }} flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </div>
            </div>

            <select id="periodFilter" onchange="applyFilters()" class="text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700 rounded-xl py-2 px-3 text-[#152C4B] dark:text-slate-200 font-bold focus:ring-1 focus:ring-[#14AFC3] outline-none cursor-pointer shrink-0">
                <option value="all">{{ $isRtl ? 'كل الفترات الزمنية' : 'All Timeframes' }}</option>
                <option value="daily">{{ $isRtl ? 'تقارير يومية' : 'Daily' }}</option>
                <option value="weekly">{{ $isRtl ? 'تقارير أسبوعية' : 'Weekly' }}</option>
                <option value="monthly">{{ $isRtl ? 'تقارير شهرية' : 'Monthly' }}</option>
            </select>

            <span class="inline-flex items-center justify-center text-xs font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/15 px-3 py-2 rounded-xl border border-[#14AFC3]/25 whitespace-nowrap shrink-0">
                <span id="filteredCount" class="font-mono font-black">6</span>&nbsp;{{ $isRtl ? 'تقارير' : 'Reports' }}
            </span>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         REPORTS DIRECTORY TABLE (PROMINENT LUXURY CARD & STRICT 100% ALIGNMENT)
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[900px] border-collapse" id="reportsTable">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-600 dark:text-slate-300 font-extrabold text-[11px] uppercase tracking-wider">
                        <th class="w-[28%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'التقرير والكود الطبي' : 'Report & Code' }}</th>
                        <th class="w-[20%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'النطاق / القسم المستهدف' : 'Scope & Department' }}</th>
                        <th class="w-[13%] py-4 px-3 text-center">{{ $isRtl ? 'دورية الإصدار' : 'Frequency' }}</th>
                        <th class="w-[13%] py-4 px-3 text-center">{{ $isRtl ? 'آخر تحديث' : 'Last Updated' }}</th>
                        <th class="w-[12%] py-4 px-3 text-center">{{ $isRtl ? 'الصيغة والحجم' : 'Format & Size' }}</th>
                        <th class="w-[14%] py-4 px-4 text-center print:hidden">{{ $isRtl ? 'الإجراءات والتحميل' : 'Actions' }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/70 text-slate-600 dark:text-slate-300 font-medium">
                    
                    {{-- Row 1: Bed Census Report --}}
                    <tr class="report-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group" data-category="census" data-period="daily" data-code="REP-BED-01" data-title="{{ $isRtl ? 'تقرير الإشغال والسعة السريرية اليومي' : 'Daily Bed Census Report' }}" data-scope="{{ $isRtl ? 'المجمع الطبي بالكامل' : 'Hospital-wide' }}" data-date="2026-09-06 · 06:00 ص" data-format="PDF" data-size="1.8 MB">
                        <td class="w-[28%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center shrink-0 border border-[#14AFC3]/30 shadow-xs group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-black text-slate-900 dark:text-white text-xs sm:text-sm truncate group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'تقرير الإشغال والسعة السريرية' : 'Daily Bed Census Report' }}</span>
                                        <span class="text-[10px] text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 font-mono font-black px-2 py-0.5 rounded-md border border-[#14AFC3]/30 shrink-0">REP-BED-01</span>
                                    </div>
                                    <div class="text-[11px] text-slate-400 font-medium truncate mt-0.5">{{ $isRtl ? '8 أجنحة سريرية · 279 سرير' : '8 Wings · 279 Beds' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="w-[20%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="font-bold text-slate-800 dark:text-slate-200 text-xs truncate flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                                <span>{{ $isRtl ? 'المجمع الطبي بالكامل' : 'Hospital-wide' }}</span>
                            </div>
                            <span class="text-[11px] text-slate-400 font-medium block truncate mt-0.5">{{ $isRtl ? 'السعة والإشغال التراكمي' : 'Total Bed Census' }}</span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-teal-800 dark:text-teal-300 bg-teal-50 dark:bg-teal-900/30 px-3 py-1 rounded-full border border-teal-200/70 dark:border-teal-700/50 shadow-2xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-teal-500 animate-pulse"></span>
                                <span>{{ $isRtl ? 'يومي تلقائي' : 'Daily Auto-run' }}</span>
                            </span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="font-mono font-bold text-slate-800 dark:text-slate-200 text-xs block">2026-09-06</span>
                            <span class="text-[10.5px] text-slate-400 font-medium block mt-0.5">06:00 ص</span>
                        </td>
                        <td class="w-[12%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[10.5px] font-mono font-bold text-rose-700 dark:text-rose-400 bg-rose-50 dark:bg-rose-900/30 px-2.5 py-1 rounded-lg border border-rose-200/70 shadow-2xs">
                                <svg class="w-3 h-3 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                <span>PDF · 1.8 MB</span>
                            </span>
                        </td>
                        <td class="w-[14%] py-4 px-4 text-center print:hidden">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <button onclick="viewReport('REP-BED-01')" title="{{ $isRtl ? 'معاينة التقرير والملف الإكلينيكي' : 'Preview Details' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center shadow-2xs cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="downloadReport('REP-BED-01')" title="{{ $isRtl ? 'تحميل كـ CSV' : 'Download File' }}" class="w-8 h-8 rounded-xl text-slate-600 dark:text-slate-300 hover:text-white hover:bg-emerald-600 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </button>
                                <button onclick="openScheduleModal('REP-BED-01')" title="{{ $isRtl ? 'جدولة الإرسال التلقائي' : 'Schedule' }}" class="w-8 h-8 rounded-xl text-slate-400 hover:text-white hover:bg-[#0C6B78] transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Row 2: Clinical Quality & Consultations --}}
                    <tr class="report-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group" data-category="clinical" data-period="monthly" data-code="REP-CLN-04" data-title="{{ $isRtl ? 'المؤشرات الإكلينيكية وجودة الكشوفات الطبية' : 'Clinical Quality & Consultation Audit' }}" data-scope="{{ $isRtl ? 'العيادات التخصصية' : '41 Specialty Clinics' }}" data-date="2026-09-01 · 08:30 ص" data-format="Excel" data-size="940 KB">
                        <td class="w-[28%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center shrink-0 border border-[#14AFC3]/30 shadow-xs group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-black text-slate-900 dark:text-white text-xs sm:text-sm truncate group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'المؤشرات الإكلينيكية وجودة الكشوفات' : 'Clinical Quality & Consultations' }}</span>
                                        <span class="text-[10px] text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 font-mono font-black px-2 py-0.5 rounded-md border border-[#14AFC3]/30 shrink-0">REP-CLN-04</span>
                                    </div>
                                    <div class="text-[11px] text-slate-400 font-medium truncate mt-0.5">{{ $isRtl ? '1,842 كشف طبي منجز' : '1,842 Consults Completed' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="w-[20%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="font-bold text-slate-800 dark:text-slate-200 text-xs truncate flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span>{{ $isRtl ? 'العيادات التخصصية (41 عيادة)' : '41 Specialty Clinics' }}</span>
                            </div>
                            <span class="text-[11px] text-slate-400 font-medium block truncate mt-0.5">{{ $isRtl ? 'جودة التشخيص وزمن الكشف' : 'Diagnostic Audit' }}</span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <span>{{ $isRtl ? 'شهري معتمد' : 'Monthly Official' }}</span>
                            </span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="font-mono font-bold text-slate-800 dark:text-slate-200 text-xs block">2026-09-01</span>
                            <span class="text-[10.5px] text-slate-400 font-medium block mt-0.5">08:30 ص</span>
                        </td>
                        <td class="w-[12%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[10.5px] font-mono font-bold text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 px-2.5 py-1 rounded-lg border border-emerald-200/70 shadow-2xs">
                                <svg class="w-3 h-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <span>XLSX · 940 KB</span>
                            </span>
                        </td>
                        <td class="w-[14%] py-4 px-4 text-center print:hidden">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <button onclick="viewReport('REP-CLN-04')" title="{{ $isRtl ? 'معاينة التقرير والملف الإكلينيكي' : 'Preview Details' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center shadow-2xs cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="downloadReport('REP-CLN-04')" title="{{ $isRtl ? 'تحميل كـ CSV' : 'Download File' }}" class="w-8 h-8 rounded-xl text-slate-600 dark:text-slate-300 hover:text-white hover:bg-emerald-600 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </button>
                                <button onclick="openScheduleModal('REP-CLN-04')" title="{{ $isRtl ? 'جدولة الإرسال التلقائي' : 'Schedule' }}" class="w-8 h-8 rounded-xl text-slate-400 hover:text-white hover:bg-[#0C6B78] transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Row 3: Financial Telemetry & Insurance --}}
                    <tr class="report-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group" data-category="financial" data-period="weekly" data-code="REP-FIN-09" data-title="{{ $isRtl ? 'المطالبات التأمينية والتحصيل المالي' : 'Insurance Claims & Revenue' }}" data-scope="{{ $isRtl ? 'التأمين والتحصيل' : 'Insurance Carriers' }}" data-date="2026-09-05 · 17:00 م" data-format="PDF" data-size="3.2 MB">
                        <td class="w-[28%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center shrink-0 border border-[#14AFC3]/30 shadow-xs group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-black text-slate-900 dark:text-white text-xs sm:text-sm truncate group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'المطالبات التأمينية والتحصيل المالي' : 'Insurance Claims & Revenue' }}</span>
                                        <span class="text-[10px] text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 font-mono font-black px-2 py-0.5 rounded-md border border-[#14AFC3]/30 shrink-0">REP-FIN-09</span>
                                    </div>
                                    <div class="text-[11px] text-slate-400 font-medium truncate mt-0.5">{{ $isRtl ? '94.2% نسبة الموافقة الفورية' : '94.2% Approval Rate' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="w-[20%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="font-bold text-slate-800 dark:text-slate-200 text-xs truncate flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                                <span>{{ $isRtl ? 'التأمين الطبي والتحصيل' : 'Insurance Carriers' }}</span>
                            </div>
                            <span class="text-[11px] text-slate-400 font-medium block truncate mt-0.5">{{ $isRtl ? 'مطالبات الشركات والهيئات' : 'Claims & Clearances' }}</span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/30 px-3 py-1 rounded-full border border-indigo-200/70 dark:border-indigo-700/50 shadow-2xs">
                                <span>{{ $isRtl ? 'أسبوعي' : 'Weekly Run' }}</span>
                            </span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="font-mono font-bold text-slate-800 dark:text-slate-200 text-xs block">2026-09-05</span>
                            <span class="text-[10.5px] text-slate-400 font-medium block mt-0.5">17:00 م</span>
                        </td>
                        <td class="w-[12%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[10.5px] font-mono font-bold text-rose-700 dark:text-rose-400 bg-rose-50 dark:bg-rose-900/30 px-2.5 py-1 rounded-lg border border-rose-200/70 shadow-2xs">
                                <svg class="w-3 h-3 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                <span>PDF · 3.2 MB</span>
                            </span>
                        </td>
                        <td class="w-[14%] py-4 px-4 text-center print:hidden">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <button onclick="viewReport('REP-FIN-09')" title="{{ $isRtl ? 'معاينة التقرير والملف الإكلينيكي' : 'Preview Details' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center shadow-2xs cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="downloadReport('REP-FIN-09')" title="{{ $isRtl ? 'تحميل كـ CSV' : 'Download File' }}" class="w-8 h-8 rounded-xl text-slate-600 dark:text-slate-300 hover:text-white hover:bg-emerald-600 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </button>
                                <button onclick="openScheduleModal('REP-FIN-09')" title="{{ $isRtl ? 'جدولة الإرسال التلقائي' : 'Schedule' }}" class="w-8 h-8 rounded-xl text-slate-400 hover:text-white hover:bg-[#0C6B78] transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Row 4: Emergency & Triage Time --}}
                    <tr class="report-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group" data-category="clinical" data-period="daily" data-code="REP-EMR-02" data-title="{{ $isRtl ? 'جاهزية الطوارئ وزمن الاستجابة للإنعاش' : 'Emergency Readiness & Triage Time' }}" data-scope="{{ $isRtl ? 'قسم الطوارئ والحوادث' : 'Emergency Department' }}" data-date="2026-09-06 · 11:00 ص" data-format="Live Feed" data-size="فوري">
                        <td class="w-[28%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 flex items-center justify-center shrink-0 border border-rose-200/70 dark:border-rose-700/50 shadow-xs group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-black text-slate-900 dark:text-white text-xs sm:text-sm truncate group-hover:text-rose-600 transition-colors">{{ $isRtl ? 'جاهزية الطوارئ وزمن الاستجابة' : 'Emergency Readiness & Triage Time' }}</span>
                                        <span class="text-[10px] text-rose-700 dark:text-rose-400 bg-rose-50 dark:bg-rose-900/30 font-mono font-black px-2 py-0.5 rounded-md border border-rose-200/70 shrink-0">REP-EMR-02</span>
                                    </div>
                                    <div class="text-[11px] text-slate-400 font-medium truncate mt-0.5">{{ $isRtl ? '10 مسارات فرز CTAS · استجابة فورية' : '10 CTAS Bays · 0 min code' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="w-[20%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="font-bold text-slate-800 dark:text-slate-200 text-xs truncate flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                <span>{{ $isRtl ? 'قسم الطوارئ والحوادث' : 'Main Emergency' }}</span>
                            </div>
                            <span class="text-[11px] text-slate-400 font-medium block truncate mt-0.5">{{ $isRtl ? 'مسارات الفرز والإنعاش CTAS' : 'CTAS Trauma Triage' }}</span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-rose-700 dark:text-rose-300 bg-rose-50 dark:bg-rose-900/30 px-3 py-1 rounded-full border border-rose-200/70 dark:border-rose-700/50 shadow-2xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-ping"></span>
                                <span>{{ $isRtl ? 'تحديث فوري' : 'Live Sync' }}</span>
                            </span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="font-mono font-bold text-slate-800 dark:text-slate-200 text-xs block">2026-09-06</span>
                            <span class="text-[10.5px] text-slate-400 font-medium block mt-0.5">11:00 ص</span>
                        </td>
                        <td class="w-[12%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[10.5px] font-mono font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 px-2.5 py-1 rounded-lg border border-[#14AFC3]/30 shadow-2xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                                <span>LIVE Feed</span>
                            </span>
                        </td>
                        <td class="w-[14%] py-4 px-4 text-center print:hidden">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <button onclick="viewReport('REP-EMR-02')" title="{{ $isRtl ? 'معاينة التقرير والملف الإكلينيكي' : 'Preview Details' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center shadow-2xs cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="downloadReport('REP-EMR-02')" title="{{ $isRtl ? 'تحميل كـ CSV' : 'Download File' }}" class="w-8 h-8 rounded-xl text-slate-600 dark:text-slate-300 hover:text-white hover:bg-emerald-600 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </button>
                                <button onclick="openScheduleModal('REP-EMR-02')" title="{{ $isRtl ? 'جدولة الإرسال التلقائي' : 'Schedule' }}" class="w-8 h-8 rounded-xl text-slate-400 hover:text-white hover:bg-[#0C6B78] transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Row 5: Patient Satisfaction & CSAT --}}
                    <tr class="report-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group" data-category="quality" data-period="monthly" data-code="REP-SAT-05" data-title="{{ $isRtl ? 'استبيانات رضا المرضى وتجربة المراجع' : 'Patient Experience & CSAT Audit' }}" data-scope="{{ $isRtl ? 'تجربة المرضى' : 'Patient Experience' }}" data-date="2026-09-01 · 10:00 ص" data-format="PDF" data-size="2.4 MB">
                        <td class="w-[28%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center shrink-0 border border-[#14AFC3]/30 shadow-xs group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-black text-slate-900 dark:text-white text-xs sm:text-sm truncate group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'استبيانات رضا المرضى وتجربة المراجع' : 'Patient Experience & CSAT Audit' }}</span>
                                        <span class="text-[10px] text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 font-mono font-black px-2 py-0.5 rounded-md border border-[#14AFC3]/30 shrink-0">REP-SAT-05</span>
                                    </div>
                                    <div class="text-[11px] text-slate-400 font-medium truncate mt-0.5">{{ $isRtl ? '2,180 تقييم موثق · 4.9/5 CSAT' : '2,180 Reviews · 4.9 CSAT' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="w-[20%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="font-bold text-slate-800 dark:text-slate-200 text-xs truncate flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                <span>{{ $isRtl ? 'تجربة المريض وإدارة الجودة' : 'Patient Experience' }}</span>
                            </div>
                            <span class="text-[11px] text-slate-400 font-medium block truncate mt-0.5">{{ $isRtl ? 'معايير الاعتماد ورضا النزلاء' : 'CSAT & JCI Quality' }}</span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <span>{{ $isRtl ? 'شهري' : 'Monthly' }}</span>
                            </span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="font-mono font-bold text-slate-800 dark:text-slate-200 text-xs block">2026-09-01</span>
                            <span class="text-[10.5px] text-slate-400 font-medium block mt-0.5">10:00 ص</span>
                        </td>
                        <td class="w-[12%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[10.5px] font-mono font-bold text-rose-700 dark:text-rose-400 bg-rose-50 dark:bg-rose-900/30 px-2.5 py-1 rounded-lg border border-rose-200/70 shadow-2xs">
                                <svg class="w-3 h-3 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                <span>PDF · 2.4 MB</span>
                            </span>
                        </td>
                        <td class="w-[14%] py-4 px-4 text-center print:hidden">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <button onclick="viewReport('REP-SAT-05')" title="{{ $isRtl ? 'معاينة التقرير والملف الإكلينيكي' : 'Preview Details' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center shadow-2xs cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="downloadReport('REP-SAT-05')" title="{{ $isRtl ? 'تحميل كـ CSV' : 'Download File' }}" class="w-8 h-8 rounded-xl text-slate-600 dark:text-slate-300 hover:text-white hover:bg-emerald-600 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </button>
                                <button onclick="openScheduleModal('REP-SAT-05')" title="{{ $isRtl ? 'جدولة الإرسال التلقائي' : 'Schedule' }}" class="w-8 h-8 rounded-xl text-slate-400 hover:text-white hover:bg-[#0C6B78] transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Row 6: ICU Mortality & Critical Care --}}
                    <tr class="report-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group" data-category="census" data-period="monthly" data-code="REP-ICU-08" data-title="{{ $isRtl ? 'جاهزية العناية المركزة والمؤشرات الحيوية' : 'ICU Telemetry & Outcomes' }}" data-scope="{{ $isRtl ? 'العناية المركزة' : 'ICU Division' }}" data-date="2026-09-01 · 09:00 ص" data-format="PDF" data-size="1.5 MB">
                        <td class="w-[28%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center shrink-0 border border-[#14AFC3]/30 shadow-xs group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-black text-slate-900 dark:text-white text-xs sm:text-sm truncate group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'جاهزية العناية المركزة والمؤشرات' : 'ICU Telemetry & Outcomes' }}</span>
                                        <span class="text-[10px] text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 font-mono font-black px-2 py-0.5 rounded-md border border-[#14AFC3]/30 shrink-0">REP-ICU-08</span>
                                    </div>
                                    <div class="text-[11px] text-slate-400 font-medium truncate mt-0.5">{{ $isRtl ? '22 / 25 سرير مشغولة · 18 جهاز تنفس' : '22/25 Beds · 18 Ventilators' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="w-[20%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="font-bold text-slate-800 dark:text-slate-200 text-xs truncate flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                                <span>{{ $isRtl ? 'أجنحة العناية المركزة (ICU)' : 'Critical Care Wings' }}</span>
                            </div>
                            <span class="text-[11px] text-slate-400 font-medium block truncate mt-0.5">{{ $isRtl ? 'أجهزة التنفس والتفطيم' : 'Ventilator Telemetry' }}</span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <span>{{ $isRtl ? 'شهري' : 'Monthly' }}</span>
                            </span>
                        </td>
                        <td class="w-[13%] py-4 px-3 text-center">
                            <span class="font-mono font-bold text-slate-800 dark:text-slate-200 text-xs block">2026-09-01</span>
                            <span class="text-[10.5px] text-slate-400 font-medium block mt-0.5">09:00 ص</span>
                        </td>
                        <td class="w-[12%] py-4 px-3 text-center">
                            <span class="inline-flex items-center gap-1 text-[10.5px] font-mono font-bold text-rose-700 dark:text-rose-400 bg-rose-50 dark:bg-rose-900/30 px-2.5 py-1 rounded-lg border border-rose-200/70 shadow-2xs">
                                <svg class="w-3 h-3 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                <span>PDF · 1.5 MB</span>
                            </span>
                        </td>
                        <td class="w-[14%] py-4 px-4 text-center print:hidden">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
                                <button onclick="viewReport('REP-ICU-08')" title="{{ $isRtl ? 'معاينة التقرير والملف الإكلينيكي' : 'Preview Details' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center shadow-2xs cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="downloadReport('REP-ICU-08')" title="{{ $isRtl ? 'تحميل كـ CSV' : 'Download File' }}" class="w-8 h-8 rounded-xl text-slate-600 dark:text-slate-300 hover:text-white hover:bg-emerald-600 transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </button>
                                <button onclick="openScheduleModal('REP-ICU-08')" title="{{ $isRtl ? 'جدولة الإرسال التلقائي' : 'Schedule' }}" class="w-8 h-8 rounded-xl text-slate-400 hover:text-white hover:bg-[#0C6B78] transition-all flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        {{-- Table Footer / Pagination --}}
        <div class="py-4 px-6 bg-slate-50/80 dark:bg-slate-800/50 border-t border-slate-200/80 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500 dark:text-slate-400 font-semibold">
            <span>{{ $isRtl ? 'عرض 1 إلى 6 من أصل 18 تقريراً تحليلياً معتمداً' : 'Showing 1 to 6 of 18 analytics reports' }}</span>
            <div class="flex items-center gap-1.5 print:hidden">
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-50 text-xs font-bold disabled:opacity-50 cursor-pointer" disabled>{{ $isRtl ? 'السابق' : 'Prev' }}</button>
                <button class="px-3.5 py-1.5 rounded-xl bg-[#14AFC3] text-white text-xs font-black shadow-xs">1</button>
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-50 text-xs font-bold cursor-pointer">2</button>
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-50 text-xs font-bold cursor-pointer">{{ $isRtl ? 'التالي' : 'Next' }}</button>
            </div>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════════════════════
     1. MODAL: DETAILED OFFICIAL REPORT PREVIEW (THE GOLD STANDARD)
     MINISTRY OF HEALTH SANA'A & AL-RASHEED SPECIALIZED HOSPITAL
══════════════════════════════════════════════════════════════ --}}
<div id="viewReportModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-md transition-opacity print:hidden" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-3 sm:p-5 text-center">
        <div class="w-full max-w-4xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            {{-- LUXURY CLINICAL GRADIENT HEADER --}}
            <div class="relative px-6 py-5 text-white" style="background: linear-gradient(135deg, #0A1628 0%, #152C4B 50%, #0C6B78 100%);">
                <button onclick="closeViewModal()" type="button" class="absolute top-4.5 left-4.5 rtl:left-4.5 rtl:right-auto ltr:right-4.5 ltr:left-auto w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                
                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-2xl bg-white/15 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white shrink-0 shadow-inner">
                        <svg class="w-6.5 h-6.5 text-[#14AFC3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2.5">
                            <h2 class="text-lg sm:text-xl font-black text-white tracking-wide" id="modalReportTitle"></h2>
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                {{ $isRtl ? 'معتمد رسمياً' : 'Official MOH' }}
                            </span>
                        </div>
                        <p class="text-xs text-white/70 mt-1 font-medium">
                            {{ $isRtl ? 'الجمهورية اليمنية · وزارة الصحة العامة والسكان · مستشفى الرشيد التخصصي' : 'Yemen Republic · MOH · Al-Rasheed Specialized Hospital' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-6 sm:p-7 space-y-5 max-h-[78vh] overflow-y-auto">
                
                {{-- OFFICIAL GOVERNMENT & HOSPITAL HEADER CAPSULE --}}
                <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200/80 dark:border-slate-700/80 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-start">
                    <div class="text-xs text-slate-800 dark:text-slate-200 leading-relaxed">
                        <div class="font-black text-sm text-slate-900 dark:text-white">الجمهورية اليمنية</div>
                        <div class="font-bold text-slate-600 dark:text-slate-400">وزارة الصحة العامة والسكان - أمانة العاصمة صنعاء</div>
                        <div class="font-black text-[#14AFC3] text-xs mt-0.5">مستشفى الرشيد التخصصي - الإدارة العامة للرقابة والإحصاء</div>
                    </div>

                    <div class="text-xs text-start sm:text-end font-mono">
                        <div class="font-black text-slate-900 dark:text-white text-xs" id="modalRefCode">REF: RSD-REP-2026-YE</div>
                        <div class="text-slate-500 text-[11px]" id="modalPrintDate">DATE: 2026-09-06 · 10:00</div>
                        <div class="flex items-center gap-1 sm:justify-end mt-1">
                            <span id="modalReportCode" class="text-[10px] font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/15 px-2 py-0.5 rounded font-mono border border-[#14AFC3]/30"></span>
                            <span id="modalReportScope" class="text-[11px] text-slate-600 dark:text-slate-400 font-semibold"></span>
                        </div>
                    </div>
                </div>

                {{-- Key Clinical Metrics 4-Box Grid --}}
                <div>
                    <div class="flex items-center gap-2 mb-2.5">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-slate-800 dark:text-slate-200 uppercase tracking-wider">{{ $isRtl ? 'المؤشرات والنتائج الإكلينيكية الرئيسية' : 'Key Clinical Telemetry' }}</h4>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-center" id="modalMetricsGrid">
                        <!-- Dynamic Metric Cards Injected via JS -->
                    </div>
                </div>

                {{-- Detailed Realistic Breakdown Table --}}
                <div class="border border-slate-200/80 dark:border-slate-700/80 rounded-2xl overflow-hidden shadow-xs">
                    <div class="bg-slate-100/90 dark:bg-slate-800/80 px-4 py-3 border-b border-slate-200/80 dark:border-slate-700 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#14AFC3]"></span>
                            <span class="text-xs font-black text-slate-800 dark:text-slate-200" id="modalTableHeading">تفاصيل توزيع المؤشرات الإكلينيكية</span>
                        </div>
                        <span class="text-[10.5px] font-mono font-bold text-slate-500">AUDIT UNIT: QA-SANA'A</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs text-start table-fixed" id="modalDetailTable">
                            <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-400 font-extrabold border-b border-slate-200 dark:border-slate-700 text-[11px]">
                                <tr id="modalTableHeadRow">
                                    <!-- Injected columns -->
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300 font-medium" id="modalTableBody">
                                <!-- Injected rows -->
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Official Sign-Off and Seal --}}
                <div class="p-5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/40 border border-slate-200/80 dark:border-slate-700/80 grid grid-cols-1 sm:grid-cols-3 gap-4 items-center text-center text-xs">
                    <div>
                        <span class="text-[10.5px] font-bold text-slate-400 block mb-1">الجهة المصدرة والمطابقة</span>
                        <span class="font-black text-slate-900 dark:text-white text-xs block">د. خالد المنصوري</span>
                        <span class="text-[10px] text-slate-500 font-semibold block mt-0.5">مدير الإحصاء والمعلومات الصحية</span>
                    </div>

                    <div>
                        {{-- Circular Official Stamp --}}
                        <div class="w-24 h-24 rounded-full border-2 border-dashed border-[#14AFC3] mx-auto flex flex-col items-center justify-center p-2 text-[8.5px] font-black text-[#0C6B78] dark:text-[#14AFC3] rotate-[-3deg] bg-[#E5FAFC]/60 dark:bg-[#14AFC3]/10 shadow-xs">
                            <span class="text-[7.5px] text-slate-600 dark:text-slate-300">وزارة الصحة العامة</span>
                            <span class="text-[9px] font-black text-[#14AFC3] my-0.5">مستشفى الرشيد</span>
                            <span class="text-[7.5px] text-slate-700 dark:text-slate-300">صنعاء - معتمد</span>
                            <span class="text-[6.5px] font-mono text-slate-400 mt-0.5">MOH-YE-2026</span>
                        </div>
                    </div>

                    <div>
                        <span class="text-[10.5px] font-bold text-slate-400 block mb-1">الاعتماد النهائي</span>
                        <span class="font-black text-slate-900 dark:text-white text-xs block">د. فيصل العريقي</span>
                        <span class="text-[10px] text-slate-500 font-semibold block mt-0.5">نائب المدير العام للشؤون السريرية</span>
                    </div>
                </div>

            </div>

            {{-- MODAL ACTION FOOTER --}}
            <div class="p-4 sm:p-5 bg-slate-50/90 dark:bg-slate-800/60 border-t border-slate-200/80 dark:border-slate-800 flex items-center justify-between flex-wrap gap-3">
                <span class="text-[10.5px] font-mono font-bold text-slate-400">HASH: SHA256-MOH-RSD-SECURE</span>
                
                <div class="flex items-center gap-2.5">
                    <button onclick="closeViewModal()" class="px-5 py-2.5 bg-white dark:bg-slate-700 hover:bg-slate-100 text-slate-700 dark:text-slate-200 font-bold rounded-xl text-xs border border-slate-200 dark:border-slate-600 transition-colors cursor-pointer">
                        {{ $isRtl ? 'إغلاق' : 'Close' }}
                    </button>
                    <button onclick="downloadReport(activeModalCode)" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-900 text-white font-black rounded-xl text-xs transition-all flex items-center gap-1.5 shadow-xs cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        {{ $isRtl ? 'تحميل كـ CSV' : 'Export CSV' }}
                    </button>
                    <button onclick="printCurrentModalReport()" class="px-5 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#08525D] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/25 transition-all flex items-center gap-1.5 cursor-pointer hover:-translate-y-0.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        {{ $isRtl ? 'طباعة التقرير الرسمي' : 'Print Official' }}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════
     2. MODAL: FULL MASTER DOSSIER (THE EXECUTIVE LUXURY DOSSIER - PHOTO 3 FIXED)
     MINISTRY OF HEALTH SANA'A & AL-RASHEED SPECIALIZED HOSPITAL
══════════════════════════════════════════════════════════════ --}}
<div id="masterDossierModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-md transition-opacity print:hidden" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-3 sm:p-5 text-center">
        <div class="w-full max-w-4xl lg:max-w-5xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            {{-- LUXURY CLINICAL GRADIENT HEADER --}}
            <div class="relative px-6 py-5.5 text-white" style="background: linear-gradient(135deg, #0A1628 0%, #152C4B 50%, #0C6B78 100%);">
                <button onclick="closeMasterDossierModal()" type="button" class="absolute top-4.5 left-4.5 rtl:left-4.5 rtl:right-auto ltr:right-4.5 ltr:left-auto w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-2xl bg-white/15 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white shrink-0 shadow-inner">
                        <svg class="w-7 h-7 text-[#14AFC3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2.5">
                            <h2 class="text-lg sm:text-2xl font-black text-white tracking-wide">
                                {{ $isRtl ? 'الحزمة الإحصائية الشاملة والملف التنفيذي' : 'Comprehensive Hospital Clinical Dossier' }}
                            </h2>
                            <span class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full text-[11px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                {{ $isRtl ? 'كافة القطاعات معتمدة' : 'All 6 Domains Verified' }}
                            </span>
                        </div>
                        <p class="text-xs text-white/70 mt-1 font-medium">
                            {{ $isRtl ? 'مستشفى الرشيد التخصصي - صنعاء (التقرير التراكمي الشامل للإدارة العليا ومجلس الإدارة)' : 'Al-Rasheed Hospital Sana\'a · Executive Master Dossier' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-6 sm:p-8 space-y-6 max-h-[80vh] overflow-y-auto">
                
                {{-- Master Header Details Capsule --}}
                <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200/80 dark:border-slate-700/80 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-start">
                    <div class="text-xs text-slate-800 dark:text-slate-200 leading-relaxed">
                        <div class="font-black text-sm text-slate-900 dark:text-white">الجمهورية اليمنية · وزارة الصحة العامة والسكان</div>
                        <div class="font-bold text-slate-600 dark:text-slate-400">الملف الإحصائي التنفيذي الموحد لجميع الأقسام والأبراج الطبية</div>
                        <div class="font-black text-[#14AFC3] text-xs mt-0.5">مستشفى الرشيد التخصصي - أمانة العاصمة صنعاء</div>
                    </div>

                    <div class="text-xs text-start sm:text-end font-mono">
                        <div class="font-black text-slate-900 dark:text-white text-xs">DOSSIER-REF: RSD-MOH-2026-ALL</div>
                        <div class="text-slate-500 text-[11px]">ISSUED: {{ date('Y-m-d H:i') }}</div>
                        <div class="text-emerald-600 dark:text-emerald-400 text-[10.5px] font-black mt-0.5">STATUS: OFFICIAL EXECUTIVE REPORT</div>
                    </div>
                </div>

                {{-- Aggregate Metrics Cards (FIXED NUMBER FORMATTING IN RTL) --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3.5 text-center">
                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 shadow-2xs flex flex-col justify-between">
                        <span class="text-[11px] font-bold text-slate-400 block">{{ $isRtl ? 'إجمالي التقارير' : 'Total Reports' }}</span>
                        <span class="text-2xl font-black text-slate-900 dark:text-white font-mono my-1">1,420</span>
                        <span class="text-[10px] text-teal-700 dark:text-teal-400 font-bold block">{{ $isRtl ? 'تغطية 100% للأقسام' : '100% Coverage' }}</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 shadow-2xs flex flex-col justify-between">
                        <span class="text-[11px] font-bold text-slate-400 block">{{ $isRtl ? 'السعة والإشغال' : 'Bed Census' }}</span>
                        <span class="text-2xl font-black text-[#14AFC3] font-mono my-1" dir="ltr">241 / 279</span>
                        <span class="text-[10px] text-emerald-600 dark:text-emerald-400 font-bold block">{{ $isRtl ? '86.4% إشغال مثالي' : '86.4% Optimal' }}</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 shadow-2xs flex flex-col justify-between">
                        <span class="text-[11px] font-bold text-slate-400 block">{{ $isRtl ? 'الكشوفات المنجزة' : 'Clinic Consults' }}</span>
                        <span class="text-2xl font-black text-slate-900 dark:text-white font-mono my-1">1,842</span>
                        <span class="text-[10px] text-sky-600 dark:text-sky-400 font-bold block">{{ $isRtl ? '18 دقيقة متوسط الفحص' : '18m Avg Time' }}</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 shadow-2xs flex flex-col justify-between">
                        <span class="text-[11px] font-bold text-slate-400 block">{{ $isRtl ? 'رضا المرضى' : 'Patient CSAT' }}</span>
                        <span class="text-2xl font-black text-emerald-600 dark:text-emerald-400 font-mono my-1" dir="ltr">4.9 / 5.0</span>
                        <span class="text-[10px] text-emerald-600 dark:text-emerald-400 font-bold block">{{ $isRtl ? '2,180 استبيان موثق' : '2,180 Reviews' }}</span>
                    </div>
                </div>

                {{-- All Reports Master Table (EXACT 1:1 MATHEMATICAL COLUMN ALIGNMENT) --}}
                <div class="border border-slate-200/80 dark:border-slate-700/80 rounded-2xl overflow-hidden shadow-xs">
                    <div class="bg-slate-100/90 dark:bg-slate-800/80 px-4 py-3 border-b border-slate-200/80 dark:border-slate-700 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                            <span class="text-xs font-black text-slate-800 dark:text-slate-200">{{ $isRtl ? 'جدول السجلات الإكلينيكية والتشغيلية المعتمدة (مستشفى الرشيد - صنعاء)' : 'Master Hospital Clinical Register' }}</span>
                        </div>
                        <span class="text-[10.5px] font-mono text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/15 px-2.5 py-0.5 rounded-md font-black border border-[#14AFC3]/25">6 تقارير رئيسية</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs table-fixed min-w-[760px] border-collapse">
                            <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-400 font-extrabold border-b border-slate-200 dark:border-slate-700 text-[11px]">
                                <tr>
                                    <th class="w-[15%] py-3 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'الكود' : 'Code' }}</th>
                                    <th class="w-[27%] py-3 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'عنوان التقرير الطبي' : 'Report Title' }}</th>
                                    <th class="w-[23%] py-3 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'النطاق والقسم' : 'Scope' }}</th>
                                    <th class="w-[12%] py-3 px-2 text-center">{{ $isRtl ? 'الدورية' : 'Frequency' }}</th>
                                    <th class="w-[13%] py-3 px-2 text-center">{{ $isRtl ? 'المؤشر الأبرز' : 'Key Metric' }}</th>
                                    <th class="w-[10%] py-3 px-3 text-center">{{ $isRtl ? 'الحالة' : 'Status' }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300 font-medium">
                                <tr class="hover:bg-[#E5FAFC]/30 dark:hover:bg-slate-800/40">
                                    <td class="w-[15%] py-3 px-3.5 font-mono font-black text-[#14AFC3]">REP-BED-01</td>
                                    <td class="w-[27%] py-3 px-3.5 font-bold text-slate-900 dark:text-white truncate">{{ $isRtl ? 'تقرير الإشغال والسعة السريرية اليومي' : 'Daily Bed Census Report' }}</td>
                                    <td class="w-[23%] py-3 px-3.5 text-slate-600 dark:text-slate-400 truncate">{{ $isRtl ? 'المجمع الطبي بالكامل (8 أجنحة)' : 'Hospital-wide (8 Wings)' }}</td>
                                    <td class="w-[12%] py-3 px-2 text-center text-[11px] font-bold">{{ $isRtl ? 'يومي' : 'Daily' }}</td>
                                    <td class="w-[13%] py-3 px-2 text-center font-mono font-black text-slate-900 dark:text-white">86.4% إشغال</td>
                                    <td class="w-[10%] py-3 px-3 text-center">
                                        <span class="inline-flex items-center text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200/80 px-2 py-0.5 rounded-md font-bold text-[10px]">{{ $isRtl ? 'معتمد' : 'Verified' }}</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-[#E5FAFC]/30 dark:hover:bg-slate-800/40">
                                    <td class="w-[15%] py-3 px-3.5 font-mono font-black text-[#14AFC3]">REP-CLN-04</td>
                                    <td class="w-[27%] py-3 px-3.5 font-bold text-slate-900 dark:text-white truncate">{{ $isRtl ? 'المؤشرات الإكلينيكية وجودة الكشوفات' : 'Clinical Quality & Consultations' }}</td>
                                    <td class="w-[23%] py-3 px-3.5 text-slate-600 dark:text-slate-400 truncate">{{ $isRtl ? 'العيادات التخصصية (41 عيادة)' : '41 Specialty Clinics' }}</td>
                                    <td class="w-[12%] py-3 px-2 text-center text-[11px] font-bold">{{ $isRtl ? 'شهري' : 'Monthly' }}</td>
                                    <td class="w-[13%] py-3 px-2 text-center font-mono font-black text-slate-900 dark:text-white">1,842 كشف</td>
                                    <td class="w-[10%] py-3 px-3 text-center">
                                        <span class="inline-flex items-center text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200/80 px-2 py-0.5 rounded-md font-bold text-[10px]">{{ $isRtl ? 'معتمد' : 'Verified' }}</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-[#E5FAFC]/30 dark:hover:bg-slate-800/40">
                                    <td class="w-[15%] py-3 px-3.5 font-mono font-black text-[#14AFC3]">REP-FIN-09</td>
                                    <td class="w-[27%] py-3 px-3.5 font-bold text-slate-900 dark:text-white truncate">{{ $isRtl ? 'المطالبات التأمينية والتحصيل المالي' : 'Insurance Claims & Revenue' }}</td>
                                    <td class="w-[23%] py-3 px-3.5 text-slate-600 dark:text-slate-400 truncate">{{ $isRtl ? 'التأمين الطبي والتحصيل' : 'Insurance Division' }}</td>
                                    <td class="w-[12%] py-3 px-2 text-center text-[11px] font-bold">{{ $isRtl ? 'أسبوعي' : 'Weekly' }}</td>
                                    <td class="w-[13%] py-3 px-2 text-center font-mono font-black text-slate-900 dark:text-white">94.2% قبول</td>
                                    <td class="w-[10%] py-3 px-3 text-center">
                                        <span class="inline-flex items-center text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200/80 px-2 py-0.5 rounded-md font-bold text-[10px]">{{ $isRtl ? 'معتمد' : 'Verified' }}</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-[#E5FAFC]/30 dark:hover:bg-slate-800/40">
                                    <td class="w-[15%] py-3 px-3.5 font-mono font-black text-rose-600 dark:text-rose-400">REP-EMR-02</td>
                                    <td class="w-[27%] py-3 px-3.5 font-bold text-slate-900 dark:text-white truncate">{{ $isRtl ? 'جاهزية الطوارئ وزمن الاستجابة للإنعاش' : 'Emergency Readiness & Triage Time' }}</td>
                                    <td class="w-[23%] py-3 px-3.5 text-slate-600 dark:text-slate-400 truncate">{{ $isRtl ? 'قسم الطوارئ والحوادث (10 مسارات)' : 'Emergency & Trauma' }}</td>
                                    <td class="w-[12%] py-3 px-2 text-center text-[11px] font-bold">{{ $isRtl ? 'فوري Live' : 'Live Feed' }}</td>
                                    <td class="w-[13%] py-3 px-2 text-center font-mono font-black text-rose-600 dark:text-rose-400">0 د إنعاش</td>
                                    <td class="w-[10%] py-3 px-3 text-center">
                                        <span class="inline-flex items-center text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200/80 px-2 py-0.5 rounded-md font-bold text-[10px]">{{ $isRtl ? 'نشط 24/7' : 'Active' }}</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-[#E5FAFC]/30 dark:hover:bg-slate-800/40">
                                    <td class="w-[15%] py-3 px-3.5 font-mono font-black text-[#14AFC3]">REP-SAT-05</td>
                                    <td class="w-[27%] py-3 px-3.5 font-bold text-slate-900 dark:text-white truncate">{{ $isRtl ? 'استبيانات رضا المرضى وتجربة المراجع' : 'Patient Experience & CSAT Audit' }}</td>
                                    <td class="w-[23%] py-3 px-3.5 text-slate-600 dark:text-slate-400 truncate">{{ $isRtl ? 'تجربة المريض وإدارة الجودة' : 'Patient Experience' }}</td>
                                    <td class="w-[12%] py-3 px-2 text-center text-[11px] font-bold">{{ $isRtl ? 'شهري' : 'Monthly' }}</td>
                                    <td class="w-[13%] py-3 px-2 text-center font-mono font-black text-slate-900 dark:text-white">4.9 / 5.0</td>
                                    <td class="w-[10%] py-3 px-3 text-center">
                                        <span class="inline-flex items-center text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200/80 px-2 py-0.5 rounded-md font-bold text-[10px]">{{ $isRtl ? 'معتمد' : 'Verified' }}</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-[#E5FAFC]/30 dark:hover:bg-slate-800/40">
                                    <td class="w-[15%] py-3 px-3.5 font-mono font-black text-[#14AFC3]">REP-ICU-08</td>
                                    <td class="w-[27%] py-3 px-3.5 font-bold text-slate-900 dark:text-white truncate">{{ $isRtl ? 'جاهزية العناية المركزة والمؤشرات الحيوية' : 'ICU Telemetry & Outcomes' }}</td>
                                    <td class="w-[23%] py-3 px-3.5 text-slate-600 dark:text-slate-400 truncate">{{ $isRtl ? 'أجنحة العناية المركزة (ICU / CCU)' : 'ICU / CCU Wings' }}</td>
                                    <td class="w-[12%] py-3 px-2 text-center text-[11px] font-bold">{{ $isRtl ? 'شهري' : 'Monthly' }}</td>
                                    <td class="w-[13%] py-3 px-2 text-center font-mono font-black text-slate-900 dark:text-white">22 / 25 سرير</td>
                                    <td class="w-[10%] py-3 px-3 text-center">
                                        <span class="inline-flex items-center text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200/80 px-2 py-0.5 rounded-md font-bold text-[10px]">{{ $isRtl ? 'معتمد' : 'Verified' }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Sign-Off Footer with Seal (SPACIOUS & UNCLIPPED) --}}
                <div class="p-5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/40 border border-slate-200/80 dark:border-slate-700/80 grid grid-cols-1 sm:grid-cols-3 gap-4 items-center text-center text-xs mb-2">
                    <div>
                        <span class="text-[10.5px] font-bold text-slate-400 block mb-1">إعداد ومراجعة</span>
                        <span class="font-black text-slate-900 dark:text-white text-xs block">إدارة الجودة والإحصاء السريري</span>
                        <span class="text-[10px] text-slate-500 font-semibold block mt-0.5">مستشفى الرشيد - صنعاء</span>
                    </div>

                    <div>
                        <div class="w-24 h-24 rounded-full border-2 border-dashed border-[#14AFC3] mx-auto flex flex-col items-center justify-center p-2 text-[8.5px] font-black text-[#0C6B78] dark:text-[#14AFC3] rotate-[-3deg] bg-[#E5FAFC]/60 dark:bg-[#14AFC3]/10 shadow-xs">
                            <span class="text-[7.5px] text-slate-600 dark:text-slate-300">وزارة الصحة العامة</span>
                            <span class="text-[9px] font-black text-[#14AFC3] my-0.5">مستشفى الرشيد</span>
                            <span class="text-[7.5px] text-slate-700 dark:text-slate-300">صنعاء - اليمن</span>
                            <span class="text-[6.5px] font-mono text-slate-400 mt-0.5">MOH-YE-2026</span>
                        </div>
                    </div>

                    <div>
                        <span class="text-[10.5px] font-bold text-slate-400 block mb-1">المصادقة الإدارية العليا</span>
                        <span class="font-black text-slate-900 dark:text-white text-xs block">د. فيصل العريقي</span>
                        <span class="text-[10px] text-slate-500 font-semibold block mt-0.5">المدير العام التنفيذي للمستشفى</span>
                    </div>
                </div>

            </div>

            {{-- Footer Controls --}}
            <div class="p-5 sm:p-6 bg-slate-50/90 dark:bg-slate-800/60 border-t border-slate-200/80 dark:border-slate-800 flex items-center justify-between flex-wrap gap-3">
                <span class="text-[10.5px] font-mono font-bold text-slate-400">ENCRYPTION: MOH-YEMEN-RSA-4096-VALID</span>
                
                <div class="flex items-center gap-2.5">
                    <button onclick="closeMasterDossierModal()" class="px-5 py-2.5 bg-white dark:bg-slate-700 hover:bg-slate-100 text-slate-700 dark:text-slate-200 font-bold rounded-xl text-xs border border-slate-200 dark:border-slate-600 transition-colors cursor-pointer">
                        {{ $isRtl ? 'إغلاق' : 'Close' }}
                    </button>
                    <button onclick="downloadMasterDossierCSV()" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-900 text-white font-black rounded-xl text-xs transition-all flex items-center gap-1.5 shadow-xs cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        {{ $isRtl ? 'تحميل كـ CSV' : 'Export Master CSV' }}
                    </button>
                    <button onclick="printMasterDossier()" class="px-6 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#08525D] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/25 transition-all flex items-center gap-1.5 cursor-pointer hover:-translate-y-0.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        {{ $isRtl ? 'طباعة / حفظ كـ PDF' : 'Print / Save PDF' }}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════
     3. MODAL: CREATE CUSTOM REPORT (#customReportModal - PHOTO 4 FIXED)
══════════════════════════════════════════════════════════════ --}}
<div id="customReportModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-md transition-opacity print:hidden" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-3 sm:p-5 text-center">
        <div class="w-full max-w-2xl sm:max-w-3xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            {{-- LUXURY CLINICAL GRADIENT HEADER --}}
            <div class="relative px-6 py-5.5 text-white" style="background: linear-gradient(135deg, #0A1628 0%, #152C4B 50%, #0C6B78 100%);">
                <button type="button" onclick="closeCustomReportModal()" class="absolute top-4.5 left-4.5 rtl:left-4.5 rtl:right-auto ltr:right-4.5 ltr:left-auto w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-2xl bg-white/15 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white shrink-0 shadow-inner">
                        <svg class="w-7 h-7 text-[#14AFC3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-2xl font-black text-white tracking-wide">{{ $isRtl ? 'إنشاء تقرير تحليلي مخصص' : 'Custom Report Generator' }}</h3>
                        <p class="text-xs text-white/70 mt-1 font-medium">
                            {{ $isRtl ? 'توليد تقرير إحصائي وإكلينيكي فوري لمستشفى الرشيد التخصصي' : 'Generate on-demand analytical telemetry dossier' }}
                        </p>
                    </div>
                </div>
            </div>

            <form onsubmit="handleCustomReportSubmit(event)">
                <div class="p-6 sm:p-8 space-y-5 max-h-[75vh] overflow-y-auto">
                    
                    {{-- Basic Information --}}
                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                            <h4 class="text-xs font-black text-slate-800 dark:text-slate-200 uppercase tracking-wider">{{ $isRtl ? 'معلومات التقرير والنطاق الزمني' : 'Report Scope & Parameters' }}</h4>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'عنوان التقرير الطبي' : 'Report Title' }}</label>
                            <div class="relative">
                                <input type="text" id="customTitle" required 
                                       placeholder="{{ $isRtl ? 'مثال: تقرير إشغال العناية المركزة للربع الثالث' : 'e.g. Q3 ICU Occupancy' }}" 
                                       class="w-full text-xs h-12 rounded-2xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 {{ $isRtl ? 'pr-10 pl-4' : 'pl-10 pr-4' }} font-bold text-slate-900 dark:text-white focus:ring-2 focus:ring-[#14AFC3]/20 focus:border-[#14AFC3] transition-all outline-none">
                                <div class="absolute inset-y-0 {{ $isRtl ? 'right-3.5' : 'left-3.5' }} flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'من تاريخ' : 'Start Date' }}</label>
                                <div class="relative">
                                    <input type="date" id="customStartDate" value="2026-08-01" required 
                                           class="w-full text-xs h-12 rounded-2xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 px-4 font-mono font-bold text-slate-900 dark:text-white focus:ring-2 focus:ring-[#14AFC3]/20 focus:border-[#14AFC3] outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'إلى تاريخ' : 'End Date' }}</label>
                                <div class="relative">
                                    <input type="date" id="customEndDate" value="2026-09-06" required 
                                           class="w-full text-xs h-12 rounded-2xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 px-4 font-mono font-bold text-slate-900 dark:text-white focus:ring-2 focus:ring-[#14AFC3]/20 focus:border-[#14AFC3] outline-none">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'القسم المشمول' : 'Department' }}</label>
                                <select id="customDept" class="w-full text-xs h-12 rounded-2xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 px-3.5 font-bold text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-[#14AFC3]/20 focus:border-[#14AFC3] outline-none cursor-pointer">
                                    <option value="all">{{ $isRtl ? 'كافة الأقسام (مستشفى الرشيد)' : 'All Departments (Al-Rasheed)' }}</option>
                                    <option value="cardiology">{{ $isRtl ? 'أمراض وجراحة القلب' : 'Cardiology' }}</option>
                                    <option value="icu">{{ $isRtl ? 'العناية المركزة (ICU)' : 'Intensive Care' }}</option>
                                    <option value="emergency">{{ $isRtl ? 'الطوارئ والحوادث' : 'Emergency' }}</option>
                                    <option value="orthopedics">{{ $isRtl ? 'جراحة العظام والمفاصل' : 'Orthopedics' }}</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'صيغة التصدير' : 'Format' }}</label>
                                <select id="customFormat" class="w-full text-xs h-12 rounded-2xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 px-3.5 font-bold text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-[#14AFC3]/20 focus:border-[#14AFC3] outline-none cursor-pointer">
                                    <option value="csv">CSV (ملف جدول بيانات فوري)</option>
                                    <option value="print">PDF (طباعة المستند الرسمي)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Included Metrics Checklist (RICH CARDS INSTEAD OF PLAIN CHECKBOXES) --}}
                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                            <h4 class="text-xs font-black text-slate-800 dark:text-slate-200 uppercase tracking-wider">{{ $isRtl ? 'المؤشرات الإحصائية المطلوبة' : 'Include Metrics' }}</h4>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs">
                            <label class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 cursor-pointer hover:border-[#14AFC3] hover:bg-[#E5FAFC]/30 transition-all group">
                                <input type="checkbox" checked class="w-4 h-4 rounded text-[#14AFC3] focus:ring-[#14AFC3] cursor-pointer">
                                <div>
                                    <span class="font-black text-slate-900 dark:text-white block">{{ $isRtl ? 'السعة السريرية والإشغال' : 'Bed Occupancy' }}</span>
                                    <span class="text-[10.5px] text-slate-400 block mt-0.5">{{ $isRtl ? 'تعداد الأجنحة وأسرة العناية' : 'Wings & ICU Census' }}</span>
                                </div>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 cursor-pointer hover:border-[#14AFC3] hover:bg-[#E5FAFC]/30 transition-all group">
                                <input type="checkbox" checked class="w-4 h-4 rounded text-[#14AFC3] focus:ring-[#14AFC3] cursor-pointer">
                                <div>
                                    <span class="font-black text-slate-900 dark:text-white block">{{ $isRtl ? 'إحصائيات وكشوفات العيادات' : 'Clinic Visits' }}</span>
                                    <span class="text-[10.5px] text-slate-400 block mt-0.5">{{ $isRtl ? 'معدلات الإنجاز ومتوسط الفحص' : 'Consults & Wait Times' }}</span>
                                </div>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 cursor-pointer hover:border-[#14AFC3] hover:bg-[#E5FAFC]/30 transition-all group">
                                <input type="checkbox" checked class="w-4 h-4 rounded text-[#14AFC3] focus:ring-[#14AFC3] cursor-pointer">
                                <div>
                                    <span class="font-black text-slate-900 dark:text-white block">{{ $isRtl ? 'المطالبات والتحصيل المالي' : 'Financial Revenue' }}</span>
                                    <span class="text-[10.5px] text-slate-400 block mt-0.5">{{ $isRtl ? 'التأمين الطبي ونسب القبول' : 'Insurance & Settlements' }}</span>
                                </div>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 cursor-pointer hover:border-[#14AFC3] hover:bg-[#E5FAFC]/30 transition-all group">
                                <input type="checkbox" checked class="w-4 h-4 rounded text-[#14AFC3] focus:ring-[#14AFC3] cursor-pointer">
                                <div>
                                    <span class="font-black text-slate-900 dark:text-white block">{{ $isRtl ? 'مؤشر رضا المرضى (CSAT)' : 'Patient CSAT' }}</span>
                                    <span class="text-[10.5px] text-slate-400 block mt-0.5">{{ $isRtl ? 'استبيانات تجربة المراجع الموثقة' : 'Verified Care Feedback' }}</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons Footer (AMPLE PADDING & NO CLIPPING) --}}
                <div class="p-5 sm:p-6 bg-slate-50/90 dark:bg-slate-800/60 border-t border-slate-200/80 dark:border-slate-800 flex items-center justify-end gap-3">
                    <button type="button" onclick="closeCustomReportModal()" class="px-5 py-2.5 bg-white dark:bg-slate-700 hover:bg-slate-100 text-slate-700 dark:text-slate-200 font-bold rounded-xl text-xs border border-slate-200 dark:border-slate-600 transition-colors cursor-pointer">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#08525D] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/25 transition-all flex items-center gap-2 cursor-pointer hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        <span>{{ $isRtl ? 'توليد وتنزيل التقرير' : 'Generate & Export' }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════
     4. MODAL: SCHEDULE REPORT (#scheduleReportModal - PHOTO 1 FIXED)
══════════════════════════════════════════════════════════════ --}}
<div id="scheduleReportModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-md transition-opacity print:hidden" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-3 sm:p-5 text-center">
        <div class="w-full max-w-xl sm:max-w-2xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            {{-- LUXURY CLINICAL GRADIENT HEADER --}}
            <div class="relative px-6 py-5.5 text-white" style="background: linear-gradient(135deg, #0A1628 0%, #152C4B 50%, #0C6B78 100%);">
                <button type="button" onclick="closeScheduleModal()" class="absolute top-4.5 left-4.5 rtl:left-4.5 rtl:right-auto ltr:right-4.5 ltr:left-auto w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-2xl bg-white/15 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white shrink-0 shadow-inner">
                        <svg class="w-7 h-7 text-[#14AFC3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-2xl font-black text-white tracking-wide">{{ $isRtl ? 'جدولة تسليم التقرير تلقائياً' : 'Automated Schedule' }}</h3>
                        <p class="text-xs text-white/70 mt-1 font-medium">
                            {{ $isRtl ? 'إرسال آلي دوري لإدارة مستشفى الرشيد التخصصي ومجلس الجودة السريرية' : 'Direct Periodic Email Dispatch' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-6 sm:p-8 space-y-5">
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-slate-800 dark:text-slate-200 uppercase tracking-wider">{{ $isRtl ? 'إعدادات الجدولة والتسليم' : 'Schedule Parameters' }}</h4>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'تكرار الإصدار والتسليم الدوري' : 'Frequency' }}</label>
                        <div class="relative">
                            <select id="scheduleFreq" class="w-full text-xs h-12 rounded-2xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 {{ $isRtl ? 'pr-10 pl-4' : 'pl-10 pr-4' }} font-bold text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-[#14AFC3]/20 focus:border-[#14AFC3] outline-none cursor-pointer">
                                <option value="daily">{{ $isRtl ? 'يومياً عند الساعة 07:00 صباحاً (قبل بداية المناوبة)' : 'Daily at 07:00 AM' }}</option>
                                <option value="weekly">{{ $isRtl ? 'أسبوعياً (كل يوم أحد - 08:00 صباحاً للاجتماع الأسبوعي)' : 'Weekly (Sundays)' }}</option>
                                <option value="monthly">{{ $isRtl ? 'شهرياً (أول يوم من كل شهر مع تدقيق الإدارة)' : 'Monthly (1st of Month)' }}</option>
                            </select>
                            <div class="absolute inset-y-0 {{ $isRtl ? 'right-3.5' : 'left-3.5' }} flex items-center pointer-events-none text-[#14AFC3]">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'البريد الإلكتروني المعتمد للمستلم' : 'Recipient Email' }}</label>
                        <div class="relative">
                            <input type="email" value="medical.board@alrasheed.ye" 
                                   class="w-full text-xs h-12 rounded-2xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 {{ $isRtl ? 'pr-10 pl-4' : 'pl-10 pr-4' }} font-mono font-bold text-slate-900 dark:text-white focus:ring-2 focus:ring-[#14AFC3]/20 focus:border-[#14AFC3] outline-none" dir="ltr">
                            <div class="absolute inset-y-0 {{ $isRtl ? 'right-3.5' : 'left-3.5' }} flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Extra Delivery Options --}}
                    <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 space-y-2">
                        <label class="flex items-center gap-2.5 text-xs text-slate-700 dark:text-slate-300 cursor-pointer">
                            <input type="checkbox" checked class="w-4 h-4 rounded text-[#14AFC3] focus:ring-[#14AFC3]">
                            <span class="font-bold">{{ $isRtl ? 'تضمين نسخة PDF المعتمدة كملف مرفق عالي الدقة' : 'Attach high-res official PDF' }}</span>
                        </label>
                        <label class="flex items-center gap-2.5 text-xs text-slate-700 dark:text-slate-300 cursor-pointer">
                            <input type="checkbox" checked class="w-4 h-4 rounded text-[#14AFC3] focus:ring-[#14AFC3]">
                            <span class="font-bold">{{ $isRtl ? 'إرسال إشعار SMS فوري لهاتف المشرف الطبي عند الإرسال' : 'SMS Alert to On-Duty Chief' }}</span>
                        </label>
                    </div>
                </div>

                {{-- Action Buttons Footer (NO CLIPPING & LUXURY SPACING) --}}
                <div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-800 flex-wrap gap-3">
                    <span class="text-[11px] font-mono text-slate-400 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>TLS 1.3 · إرسال مشفر ومؤمّن</span>
                    </span>

                    <div class="flex items-center gap-2.5">
                        <button onclick="closeScheduleModal()" class="px-5 py-2.5 bg-white dark:bg-slate-700 hover:bg-slate-100 text-slate-700 dark:text-slate-200 font-bold rounded-xl text-xs border border-slate-200 dark:border-slate-600 transition-colors cursor-pointer">
                            {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                        </button>
                        <button onclick="confirmSchedule()" class="px-6 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#08525D] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/25 transition-all flex items-center gap-2 cursor-pointer hover:-translate-y-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>{{ $isRtl ? 'تفعيل الجدولة والتسليم' : 'Activate Schedule' }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- TOAST NOTIFICATION --}}
<div id="toastNotification" class="fixed bottom-4 left-4 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none print:hidden" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-slate-900 text-white text-xs font-semibold px-4 py-2.5 rounded-xl shadow-lg flex items-center gap-2 border border-slate-800">
        <span class="w-2 h-2 rounded-full bg-[#14AFC3] shrink-0"></span>
        <span id="toastMessage"></span>
    </div>
</div>

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
        .report-row {
            break-inside: avoid;
        }
        #viewReportModal, #masterDossierModal {
            position: static !important;
            display: block !important;
            background: transparent !important;
            padding: 0 !important;
        }
        #viewReportModal > div, #masterDossierModal > div {
            padding: 0 !important;
            display: block !important;
        }
        #viewReportModal .shadow-2xl, #masterDossierModal .shadow-2xl {
            box-shadow: none !important;
            border: 1px solid #000000 !important;
            max-width: 100% !important;
        }
    }
</style>

<script>
    // ══════════════════════════════════════════════════════════════
    // DETAILED CLINICAL REPORTS DATASET (MINISTRY OF HEALTH & AL-RASHEED)
    // ══════════════════════════════════════════════════════════════
    const clinicalReportsData = {
        'REP-BED-01': {
            code: 'REP-BED-01',
            ref: 'REF: RSD-BED-2026-YE',
            title: '{{ $isRtl ? "تقرير الإشغال والسعة السريرية اليومي" : "Daily Bed Census Report" }}',
            scope: '{{ $isRtl ? "المجمع الطبي بالكامل - 8 أجنحة سريرية" : "Hospital-wide - 8 Inpatient Wings" }}',
            frequency: '{{ $isRtl ? "يومي تلقائي" : "Daily Auto-run" }}',
            lastUpdated: '2026-09-06 · 06:00 ص',
            metrics: [
                { label: '{{ $isRtl ? "الأسرة المشغولة" : "Occupied Beds" }}', value: '241 / 279', note: '86.4% {{ $isRtl ? "إشغال" : "Occupied" }}', color: 'text-slate-900 dark:text-white' },
                { label: '{{ $isRtl ? "الأسرة الشاغرة" : "Vacant Beds" }}', value: '38', note: '{{ $isRtl ? "جاهزة للاستقبال" : "Available" }}', color: 'text-teal-600 dark:text-teal-400' },
                { label: '{{ $isRtl ? "حالات الدخول (24h)" : "Admissions" }}', value: '34', note: '{{ $isRtl ? "دخول جديد" : "New in" }}', color: 'text-sky-600 dark:text-sky-400' },
                { label: '{{ $isRtl ? "حالات الخروج (24h)" : "Discharges" }}', value: '28', note: '{{ $isRtl ? "تعافي تام" : "Recovered" }}', color: 'text-emerald-600 dark:text-emerald-400' }
            ],
            tableHeading: '{{ $isRtl ? "توزيع الإشغال حسب الأجنحة والأبراج الطبية" : "Wing & Tower Census Breakdown" }}',
            columns: ['{{ $isRtl ? "الجناح والبرج" : "Wing & Tower" }}', '{{ $isRtl ? "السعة الكلية" : "Total Beds" }}', '{{ $isRtl ? "المشغول" : "Occupied" }}', '{{ $isRtl ? "الشاغر" : "Vacant" }}', '{{ $isRtl ? "نسبة الإشغال" : "Occupancy Rate" }}'],
            rows: [
                ['جناح الجراحة والقلب - البرج A', '48 سرير', '42 سرير', '6 أسرة', '87.5%'],
                ['جناح الباطنية والغدد - البرج B', '55 سرير', '49 سرير', '6 أسرة', '89.1%'],
                ['أجنحة العناية المركزة (ICU) - الدور 3', '25 سرير', '22 سرير', '3 أسرة', '88.0%'],
                ['جناح النساء والولادة - البرج C', '40 سرير', '33 سرير', '7 أسرة', '82.5%'],
                ['جناح الأطفال وحديثي الولادة', '35 سرير', '30 سرير', '5 أسرة', '85.7%'],
                ['جناح العظام والعمود الفقري', '36 سرير', '31 سرير', '5 أسرة', '86.1%']
            ]
        },
        'REP-CLN-04': {
            code: 'REP-CLN-04',
            ref: 'REF: RSD-CLN-2026-YE',
            title: '{{ $isRtl ? "المؤشرات الإكلينيكية وجودة الكشوفات الطبية" : "Clinical Quality & Consultation Audit" }}',
            scope: '{{ $isRtl ? "العيادات الخارجية التخصصية (41 عيادة)" : "Outpatient Specialty Clinics" }}',
            frequency: '{{ $isRtl ? "شهري معتمد" : "Monthly Official" }}',
            lastUpdated: '2026-09-01 · 08:30 ص',
            metrics: [
                { label: '{{ $isRtl ? "إجمالي الكشوفات" : "Total Consults" }}', value: '1,842', note: '{{ $isRtl ? "كشف طبي منجز" : "Completed" }}', color: 'text-slate-900 dark:text-white' },
                { label: '{{ $isRtl ? "متوسط وقت الفحص" : "Avg Consult Time" }}', value: '18 min', note: '{{ $isRtl ? "النطاق الموصى به" : "Recommended" }}', color: 'text-[#14AFC3]' },
                { label: '{{ $isRtl ? "زمن الانتظار" : "Avg Wait Time" }}', value: '14 min', note: '{{ $isRtl ? "ممتاز (-22%)" : "Optimal" }}', color: 'text-emerald-600 dark:text-emerald-400' },
                { label: '{{ $isRtl ? "دقة التشخيص الأولي" : "Diagnostic Accuracy" }}', value: '98.4%', note: '{{ $isRtl ? "تدقيق الرقابة" : "QA Verified" }}', color: 'text-teal-600 dark:text-teal-400' }
            ],
            tableHeading: '{{ $isRtl ? "أداء العيادات الطبية الاستشارية" : "Specialty Clinics Performance" }}',
            columns: ['{{ $isRtl ? "العيادة التخصصية" : "Specialty Clinic" }}', '{{ $isRtl ? "الكشوفات" : "Visits" }}', '{{ $isRtl ? "معدل الإنجاز" : "Completion" }}', '{{ $isRtl ? "متوسط الفحص" : "Avg Time" }}', '{{ $isRtl ? "مستوى الرضا" : "CSAT" }}'],
            rows: [
                ['استشاري أمراض القلب وقسطرة الشرايين', '320 كشف', '98.2%', '22 دقيقة', '4.95 / 5.0'],
                ['استشاري جراحة العظام والمفاصل والعمود الفقري', '285 كشف', '96.5%', '18 دقيقة', '4.90 / 5.0'],
                ['استشاري الباطنية والسكري والجهاز الهضمي', '310 كشف', '95.0%', '19 دقيقة', '4.88 / 5.0'],
                ['استشاري الأطفال وحديثي الولادة', '290 كشف', '97.4%', '16 دقيقة', '4.92 / 5.0'],
                ['استشاري العيون وجراحة اليوم الواحد', '215 كشف', '99.0%', '15 دقيقة', '4.96 / 5.0']
            ]
        },
        'REP-FIN-09': {
            code: 'REP-FIN-09',
            ref: 'REF: RSD-FIN-2026-YE',
            title: '{{ $isRtl ? "المطالبات التأمينية والتحصيل المالي" : "Insurance Claims & Revenue" }}',
            scope: '{{ $isRtl ? "إدارة التأمين الطبي والتحصيل النقدي" : "Insurance & Claims Division" }}',
            frequency: '{{ $isRtl ? "أسبوعي" : "Weekly Run" }}',
            lastUpdated: '2026-09-05 · 17:00 م',
            metrics: [
                { label: '{{ $isRtl ? "إجمالي المطالبات" : "Total Claims" }}', value: '2,460', note: '{{ $isRtl ? "مطالبة مرفوعة" : "Submitted" }}', color: 'text-slate-900 dark:text-white' },
                { label: '{{ $isRtl ? "نسبة الموافقة" : "Approval Rate" }}', value: '94.2%', note: '2,318 {{ $isRtl ? "مطالبة مقبولة" : "Approved" }}', color: 'text-emerald-600 dark:text-emerald-400' },
                { label: '{{ $isRtl ? "المطالبات المعلقة" : "Pending Claims" }}', value: '94', note: '{{ $isRtl ? "قيد التدقيق الطبي" : "Under review" }}', color: 'text-amber-600 dark:text-amber-400' },
                { label: '{{ $isRtl ? "نسبة الرفض" : "Rejection Rate" }}', value: '1.9%', note: '{{ $isRtl ? "ضمن المعيار العالمي" : "Minimal" }}', color: 'text-rose-600 dark:text-rose-400' }
            ],
            tableHeading: '{{ $isRtl ? "توزيع المطالبات على شركات وهيئات التأمين الصحي" : "Carriers & Insurance Telemetry" }}',
            columns: ['{{ $isRtl ? "شركة التأمين / الجهة" : "Insurance Carrier" }}', '{{ $isRtl ? "عدد المطالبات" : "Claims" }}', '{{ $isRtl ? "نسبة القبول" : "Approved %" }}', '{{ $isRtl ? "زمن المعالجة" : "Turnaround" }}', '{{ $isRtl ? "الحالة المالية" : "Status" }}'],
            rows: [
                ['شركة بوبا للرعاية والتأمين الصحي', '840 مطالبة', '96.2%', '4 ساعات', 'مسدد بنجاح'],
                ['شركة مأرب للتأمين وإعادة التأمين', '620 مطالبة', '94.5%', '8 ساعات', 'مسدد بنجاح'],
                ['الشركة المتحدة للتأمين الصحي', '510 مطالبة', '93.1%', '12 ساعة', 'قيد التسوية'],
                ['عقود الرعاية الطبية للنقابات والهيئات', '490 مطالبة', '95.8%', '6 ساعات', 'معتمد نهائي']
            ]
        },
        'REP-EMR-02': {
            code: 'REP-EMR-02',
            ref: 'REF: RSD-EMR-2026-YE',
            title: '{{ $isRtl ? "جاهزية الطوارئ وزمن الاستجابة للإنعاش" : "Emergency Readiness & Triage Time" }}',
            scope: '{{ $isRtl ? "قسم الطوارئ والحوادث (10 مسارات فرز وإنعاش)" : "Main Emergency & Trauma Center" }}',
            frequency: '{{ $isRtl ? "تحديث فوري (Live)" : "Live Feed" }}',
            lastUpdated: '2026-09-06 · 11:00 ص',
            metrics: [
                { label: '{{ $isRtl ? "الحالات اليومية" : "Daily Cases" }}', value: '412', note: '{{ $isRtl ? "حالة مستلمة" : "Received" }}', color: 'text-slate-900 dark:text-white' },
                { label: '{{ $isRtl ? "إنعاش حرج CTAS 1" : "Resuscitation" }}', value: '0 min', note: '{{ $isRtl ? "استجابة فورية 100%" : "Instant response" }}', color: 'text-rose-600 dark:text-rose-400' },
                { label: '{{ $isRtl ? "طوارئ عاجلة CTAS 2" : "Emergent" }}', value: '7 min', note: '{{ $isRtl ? "المعيار < 15 دقيقة" : "Goal < 15m" }}', color: 'text-teal-600 dark:text-teal-400' },
                { label: '{{ $isRtl ? "حالات الفرز العام" : "General Triage" }}', value: '18 min', note: '{{ $isRtl ? "جاهزية كاملة" : "Fully Staffed" }}', color: 'text-emerald-600 dark:text-emerald-400' }
            ],
            tableHeading: '{{ $isRtl ? "مسارات الفرز الطبي والحالات الحرجة (CTAS Protocol)" : "CTAS Emergency Triage Telemetry" }}',
            columns: ['{{ $isRtl ? "مستوى التصنيف (CTAS)" : "Triage Category" }}', '{{ $isRtl ? "الحالات" : "Patients" }}', '{{ $isRtl ? "زمن التدخل" : "Intervention" }}', '{{ $isRtl ? "نسبة النجاة / الاستقرار" : "Stabilization" }}', '{{ $isRtl ? "المسار" : "Bay" }}'],
            rows: [
                ['المستوى 1: إنعاش حرج فوري (Resuscitation)', '18 حالة', 'فوري (0 د)', '100% مستقرة', 'غرف الإنعاش 1-2'],
                ['المستوى 2: طارئ عاجل جداً (Emergent)', '64 حالة', '7 دقائق', '98.5% مستقرة', 'مسار الحوادث الحرجة'],
                ['المستوى 3: طارئ عاجل (Urgent)', '145 حالة', '18 دقيقة', '100% مستقرة', 'غرف الفحص 3-6'],
                ['المستوى 4 & 5: حالات مستقرة وسريعة', '185 حالة', '25 دقيقة', '100% معالجة', 'العيادات السريعة']
            ]
        },
        'REP-SAT-05': {
            code: 'REP-SAT-05',
            ref: 'REF: RSD-SAT-2026-YE',
            title: '{{ $isRtl ? "استبيانات رضا المرضى وتجربة المراجع" : "Patient Experience & CSAT Audit" }}',
            scope: '{{ $isRtl ? "إدارة تجربة المريض ومجلس الجودة السريرية" : "Patient Experience Division" }}',
            frequency: '{{ $isRtl ? "شهري" : "Monthly" }}',
            lastUpdated: '2026-09-01 · 10:00 ص',
            metrics: [
                { label: '{{ $isRtl ? "إجمالي التقييمات" : "Total Reviews" }}', value: '2,180', note: '{{ $isRtl ? "استبيان موثق" : "Verified CSAT" }}', color: 'text-slate-900 dark:text-white' },
                { label: '{{ $isRtl ? "مؤشر الرضا العام" : "Overall CSAT" }}', value: '4.9 / 5.0', note: '98.0% {{ $isRtl ? "إيجابي" : "Positive" }}', color: 'text-teal-600 dark:text-teal-400' },
                { label: '{{ $isRtl ? "كفاءة التمريض" : "Nursing Care" }}', value: '4.95', note: '{{ $isRtl ? "تقييم استثنائي" : "Outstanding" }}', color: 'text-emerald-600 dark:text-emerald-400' },
                { label: '{{ $isRtl ? "نظافة المرافق" : "Facility Cleanliness" }}', value: '4.88', note: '{{ $isRtl ? "مطابق لمعايير JCI" : "High Quality" }}', color: 'text-sky-600 dark:text-sky-400' }
            ],
            tableHeading: '{{ $isRtl ? "تحليل تقييم الخدمات من قبل المرضى والمراجعين" : "Departmental Satisfaction Audits" }}',
            columns: ['{{ $isRtl ? "المحور والخدمة" : "Care Dimension" }}', '{{ $isRtl ? "عدد التقييمات" : "Responses" }}', '{{ $isRtl ? "الدرجة" : "Score" }}', '{{ $isRtl ? "نسبة الرضا" : "Satisfaction" }}', '{{ $isRtl ? "التصنيف" : "Rating" }}'],
            rows: [
                ['تعامل الأطباء والاستشاريين والشرح الطبي', '2,180 استبيان', '4.92 / 5.0', '98.4%', 'ممتاز مرتفع'],
                ['رعاية وتمريض الأجنحة السريرية والعناية', '1,840 استبيان', '4.95 / 5.0', '99.0%', 'ممتاز مرتفع'],
                ['نظافة الغرف والتعقيم المستمر', '2,180 استبيان', '4.88 / 5.0', '97.6%', 'ممتاز'],
                ['سرعة وسهولة إجراءات الدخول والخروج', '2,180 استبيان', '4.75 / 5.0', '95.0%', 'جيد جداً مرتفع']
            ]
        },
        'REP-ICU-08': {
            code: 'REP-ICU-08',
            ref: 'REF: RSD-ICU-2026-YE',
            title: '{{ $isRtl ? "جاهزية العناية المركزة والمؤشرات الحيوية" : "ICU Telemetry & Outcomes" }}',
            scope: '{{ $isRtl ? "أجنحة العناية المركزة (ICU / CCU / PICU)" : "Critical Care Wings" }}',
            frequency: '{{ $isRtl ? "شهري" : "Monthly" }}',
            lastUpdated: '2026-09-01 · 09:00 ص',
            metrics: [
                { label: '{{ $isRtl ? "الأسرة المشغولة" : "ICU Occupancy" }}', value: '22 / 25', note: '88% {{ $isRtl ? "إشغال" : "Occupied" }}', color: 'text-slate-900 dark:text-white' },
                { label: '{{ $isRtl ? "أجهزة التنفس" : "Ventilators" }}', value: '18 / 20', note: '{{ $isRtl ? "عاملة بكفاءة" : "Active" }}', color: 'text-teal-600 dark:text-teal-400' },
                { label: '{{ $isRtl ? "الفطام الناجح" : "Ventilator Weaning" }}', value: '88.5%', note: '{{ $isRtl ? "فوق المعيار الدولي" : "High benchmark" }}', color: 'text-emerald-600 dark:text-emerald-400' },
                { label: '{{ $isRtl ? "معدل العدوى المكتسبة" : "HAI Rate" }}', value: '0.8 ‰', note: '{{ $isRtl ? "منخفض جداً وآمن" : "Safe" }}', color: 'text-sky-600 dark:text-sky-400' }
            ],
            tableHeading: '{{ $isRtl ? "توزيع أسرة العناية المركزة والمعدات الحيوية" : "Critical Care Units Capacity" }}',
            columns: ['{{ $isRtl ? "وحدة العناية" : "Critical Care Unit" }}', '{{ $isRtl ? "السعة" : "Beds" }}', '{{ $isRtl ? "المشغول" : "Occupied" }}', '{{ $isRtl ? "أجهزة التنفس" : "Ventilators" }}', '{{ $isRtl ? "حالة الجاهزية" : "Status" }}'],
            rows: [
                ['العناية المركزة العامة (G-ICU)', '12 سرير', '11 سرير', '9 أجهزة', 'جاهزية كاملة'],
                ['عناية القلب المركزة التاجية (CCU)', '8 أسرة', '7 أسرة', '5 أجهزة', 'جاهزية كاملة'],
                ['عناية الأطفال الدقيقة (PICU)', '5 أسرة', '4 أسرة', '4 أجهزة', 'جاهزية كاملة']
            ]
        }
    };

    let activeCategory = 'all';
    let activeModalCode = 'REP-BED-01';

    // ── 1. FILTERING & SEARCH ──
    function setCategoryFilter(category, btn) {
        activeCategory = category;
        document.querySelectorAll('.report-tab').forEach(el => {
            el.classList.remove('bg-[#14AFC3]', 'text-white', 'shadow-xs', 'font-bold');
            el.classList.add('bg-slate-50', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300', 'font-semibold');
            const badge = el.querySelector('span:last-child');
            if(badge) {
                badge.className = 'bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-600 font-mono';
            }
        });

        btn.classList.remove('bg-slate-50', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300', 'font-semibold');
        btn.classList.add('bg-[#14AFC3]', 'text-white', 'shadow-xs', 'font-bold');
        const activeBadge = btn.querySelector('span:last-child');
        if(activeBadge) {
            activeBadge.className = 'bg-white/20 text-white text-[10px] px-1.5 py-0.5 rounded-md font-bold';
        }

        applyFilters();
    }

    function applyFilters() {
        const query = document.getElementById('reportSearchInput').value.toLowerCase().trim();
        const period = document.getElementById('periodFilter').value;
        const rows = document.querySelectorAll('.report-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const title = (row.dataset.title || '').toLowerCase();
            const code = (row.dataset.code || '').toLowerCase();
            const scope = (row.dataset.scope || '').toLowerCase();
            const rowCategory = row.dataset.category || '';
            const rowPeriod = row.dataset.period || '';

            const matchesCategory = (activeCategory === 'all' || rowCategory === activeCategory);
            const matchesPeriod = (period === 'all' || rowPeriod === period);
            const matchesQuery = (!query || title.includes(query) || code.includes(query) || scope.includes(query));

            if (matchesCategory && matchesPeriod && matchesQuery) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('filteredCount').innerText = visibleCount;
    }

    // ── 2. VIEW REPORT PREVIEW MODAL (DEEP CLINICAL DETAILS) ──
    function viewReport(code) {
        const rep = clinicalReportsData[code] || clinicalReportsData['REP-BED-01'];
        activeModalCode = code;

        document.getElementById('modalRefCode').innerText = rep.ref;
        document.getElementById('modalReportTitle').innerText = rep.title;
        document.getElementById('modalReportCode').innerText = rep.code;
        document.getElementById('modalReportScope').innerText = rep.scope;
        document.getElementById('modalTableHeading').innerText = rep.tableHeading;

        // Metric Grid
        const grid = document.getElementById('modalMetricsGrid');
        grid.innerHTML = '';
        rep.metrics.forEach(m => {
            const card = document.createElement('div');
            card.className = 'p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 flex flex-col justify-between shadow-2xs';
            card.innerHTML = `
                <span class="text-[10.5px] font-bold text-slate-400 block">${m.label}</span>
                <span class="text-base sm:text-lg font-black ${m.color} font-mono mt-0.5 block" dir="ltr">${m.value}</span>
                <span class="text-[10px] text-slate-500 font-semibold block mt-0.5">${m.note}</span>
            `;
            grid.appendChild(card);
        });

        // Table Header
        const headRow = document.getElementById('modalTableHeadRow');
        headRow.innerHTML = '';
        rep.columns.forEach((col, idx) => {
            const th = document.createElement('th');
            th.className = idx === 0 ? 'py-3 px-3.5 {{ $isRtl ? "text-right" : "text-left" }} font-extrabold' : 'py-3 px-3 text-center font-extrabold';
            th.innerText = col;
            headRow.appendChild(th);
        });

        // Table Body
        const tbody = document.getElementById('modalTableBody');
        tbody.innerHTML = '';
        rep.rows.forEach(r => {
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-[#E5FAFC]/30 dark:hover:bg-slate-800/40 transition-colors';
            r.forEach((cell, idx) => {
                const td = document.createElement('td');
                td.className = idx === 0 ? 'py-3 px-3.5 font-bold text-slate-800 dark:text-slate-200 {{ $isRtl ? "text-right" : "text-left" }}' : 'py-3 px-3 text-center font-mono font-bold';
                td.innerText = cell;
                tr.appendChild(td);
            });
            tbody.appendChild(tr);
        });

        document.getElementById('viewReportModal').classList.remove('hidden');
    }

    function closeViewModal() {
        document.getElementById('viewReportModal').classList.add('hidden');
    }

    function printCurrentModalReport() {
        window.print();
    }

    // ── 3. FUNCTIONAL DOWNLOAD PER REPORT (CSV & BLOB) ──
    function downloadReport(code) {
        const rep = clinicalReportsData[code];
        if (!rep) return;

        let csvContent = '\uFEFF';
        csvContent += 'الجمهورية اليمنية - وزارة الصحة العامة والسكان - أمانة العاصمة صنعاء\r\n';
        csvContent += 'مستشفى الرشيد التخصصي - تقرير رسمي معتمد\r\n';
        csvContent += `كود التقرير: ${rep.code} - ${rep.ref}\r\n`;
        csvContent += `عنوان التقرير: ${rep.title}\r\n`;
        csvContent += `النطاق والقسم: ${rep.scope}\r\n`;
        csvContent += `تاريخ التصدير: ${new Date().toISOString()}\r\n\r\n`;

        csvContent += '--- مؤشرات الأداء الرئيسية ---\r\n';
        rep.metrics.forEach(m => {
            csvContent += `${m.label},${m.value},${m.note}\r\n`;
        });
        csvContent += '\r\n--- تفاصيل التوزيع الإكلينيكي ---\r\n';
        csvContent += rep.columns.join(',') + '\r\n';
        rep.rows.forEach(r => {
            csvContent += r.join(',') + '\r\n';
        });

        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', `RSD_${rep.code}_Report.csv`);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showToast("{{ $isRtl ? 'تم تحميل ملف التقرير الطبي بنجاح (مستشفى الرشيد - صنعاء).' : 'Report CSV successfully downloaded.' }}");
    }

    // ── 4. FUNCTIONAL FULL MASTER DOSSIER EXPORT ──
    function downloadMasterExport() {
        document.getElementById('masterDossierModal').classList.remove('hidden');
    }

    function closeMasterDossierModal() {
        document.getElementById('masterDossierModal').classList.add('hidden');
    }

    function printMasterDossier() {
        window.print();
    }

    function downloadMasterDossierCSV() {
        let csvContent = '\uFEFF';
        csvContent += 'الجمهورية اليمنية - وزارة الصحة العامة والسكان - أمانة العاصمة صنعاء\r\n';
        csvContent += 'مستشفى الرشيد التخصصي - الحزمة الإحصائية الشاملة والملف التنفيذي\r\n';
        csvContent += 'المرجع الرسمي: RSD-MOH-2026-ALL\r\n';
        csvContent += `تاريخ الإصدار: ${new Date().toISOString()}\r\n\r\n`;
        csvContent += 'الكود,التقرير,النطاق,الدورية,المؤشر الأبرز,الحالة\r\n';
        csvContent += 'REP-BED-01,تقرير الإشغال والسعة السريرية,المجمع الطبي (8 أجنحة),يومي,86.4% إشغال,معتمد\r\n';
        csvContent += 'REP-CLN-04,المؤشرات الإكلينيكية وجودة الكشوفات,العيادات (41 عيادة),شهري,1842 كشف,معتمد\r\n';
        csvContent += 'REP-FIN-09,المطالبات التأمينية والتحصيل,التأمين والتحصيل,أسبوعي,94.2% قبول,معتمد\r\n';
        csvContent += 'REP-EMR-02,جاهزية الطوارئ وزمن الاستجابة,الطوارئ (10 مسارات),فوري,0 دقيقة إنعاش,نشط 24/7\r\n';
        csvContent += 'REP-SAT-05,استبيانات رضا المرضى وتجربة المراجع,تجربة المريض والجودة,شهري,4.9 / 5.0,معتمد\r\n';
        csvContent += 'REP-ICU-08,العناية المركزة والمؤشرات الحيوية,العناية المركزة,شهري,22 / 25 سرير,معتمد\r\n';

        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', 'RSD_Full_Hospital_Dossier_2026.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showToast("{{ $isRtl ? 'تم تصدير وتحميل الحزمة الشاملة لمستشفى الرشيد بنجاح.' : 'Master Dossier exported successfully.' }}");
    }

    // ── 5. CUSTOM REPORT & SCHEDULE HANDLERS ──
    function openCustomReportModal() {
        document.getElementById('customReportModal').classList.remove('hidden');
    }

    function closeCustomReportModal() {
        document.getElementById('customReportModal').classList.add('hidden');
    }

    function handleCustomReportSubmit(e) {
        e.preventDefault();
        const title = document.getElementById('customTitle').value;
        const format = document.getElementById('customFormat').value;
        closeCustomReportModal();

        if (format === 'print') {
            window.print();
        } else {
            let csv = '\uFEFF';
            csv += `الجمهورية اليمنية - وزارة الصحة - مستشفى الرشيد\r\nتقرير مخصص: ${title}\r\nتاريخ: ${new Date().toISOString()}\r\n`;
            csv += 'القسم,المؤشر,النتيجة,الحالة\r\n';
            csv += 'الأقسام المحددة,السعة والتشغيل,88.4%,معتمد\r\n';

            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = `Custom_${title.replace(/\s+/g, '_')}.csv`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        showToast("{{ $isRtl ? 'تم توليد وتنزيل التقرير المخصص بنجاح.' : 'Custom report generated successfully.' }}");
    }

    function openScheduleModal(code) {
        document.getElementById('scheduleReportModal').classList.remove('hidden');
    }

    function closeScheduleModal() {
        document.getElementById('scheduleReportModal').classList.add('hidden');
    }

    function confirmSchedule() {
        closeScheduleModal();
        showToast("{{ $isRtl ? 'تم تفعيل الجدولة التلقائية وإرسال الإشعارات لإدارة مستشفى الرشيد.' : 'Automated schedule activated.' }}");
    }

    function showToast(message) {
        const toast = document.getElementById('toastNotification');
        document.getElementById('toastMessage').innerText = message;
        toast.classList.remove('translate-y-20', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');

        setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('translate-y-20', 'opacity-0');
        }, 3400);
    }
</script>
@endsection
