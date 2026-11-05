@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    // بيانات العيادات ثنائية اللغة بالكامل
    $clinics = $clinics ?? collect([
        (object)[
            'id' => 1,
            'name' => 'طوارئ الفرز والإصابات السريعة (Triage)',
            'name_en' => 'Emergency Triage & Fast Track',
            'code' => 'TRG-01',
            'location' => 'مبنى الطوارئ - الطابق الأرضي',
            'location_en' => 'ER Building - Ground Floor',
            'category' => 'emergency',
            'avg_wait' => 9,
            'target_wait' => 15,
            'waiting_patients' => 6,
            'completed_today' => 84,
            'active_doctors' => 3,
            'rooms_active' => '4 / 4',
            'status' => 'optimal',
        ],
        (object)[
            'id' => 2,
            'name' => 'عيادة الباطنية والأمراض الصدرية',
            'name_en' => 'Internal & Pulmonology Clinic',
            'code' => 'MED-02',
            'location' => 'العيادات الخارجية - الطابق 1 (عيادة 104)',
            'location_en' => 'Outpatient Tower - Floor 1 (Room 104)',
            'category' => 'internal',
            'avg_wait' => 24,
            'target_wait' => 20,
            'waiting_patients' => 12,
            'completed_today' => 46,
            'active_doctors' => 2,
            'rooms_active' => '2 / 3',
            'status' => 'congested',
        ],
        (object)[
            'id' => 3,
            'name' => 'عيادة أمراض القلب والأوعية الدموية',
            'name_en' => 'Cardiology & Vascular Clinic',
            'code' => 'CARD-01',
            'location' => 'المركز التخصصي - الطابق 2',
            'location_en' => 'Specialized Center - Floor 2',
            'category' => 'internal',
            'avg_wait' => 17,
            'target_wait' => 20,
            'waiting_patients' => 5,
            'completed_today' => 34,
            'active_doctors' => 2,
            'rooms_active' => '2 / 2',
            'status' => 'optimal',
        ],
        (object)[
            'id' => 4,
            'name' => 'عيادة جراحة العظام والعمود الفقري',
            'name_en' => 'Orthopedics & Spine Clinic',
            'code' => 'ORTHO-03',
            'location' => 'العيادات الخارجية - الطابق 2 (عيادة 208)',
            'location_en' => 'Outpatient Tower - Floor 2 (Room 208)',
            'category' => 'surgical',
            'avg_wait' => 27,
            'target_wait' => 20,
            'waiting_patients' => 11,
            'completed_today' => 38,
            'active_doctors' => 2,
            'rooms_active' => '2 / 3',
            'status' => 'congested',
        ],
        (object)[
            'id' => 5,
            'name' => 'عيادة الأطفال ورعاية حديثي الولادة',
            'name_en' => 'Pediatrics & Well-Baby Clinic',
            'code' => 'PED-01',
            'location' => 'المبنى الشرقي - الطابق 1',
            'location_en' => 'East Wing - Floor 1',
            'category' => 'pediatrics',
            'avg_wait' => 14,
            'target_wait' => 20,
            'waiting_patients' => 7,
            'completed_today' => 52,
            'active_doctors' => 3,
            'rooms_active' => '3 / 3',
            'status' => 'optimal',
        ],
        (object)[
            'id' => 6,
            'name' => 'عيادة النساء والتوليد ورعاية الأمومة',
            'name_en' => 'Obstetrics & Antenatal Care',
            'code' => 'OBG-02',
            'location' => 'المبنى الشرقي - الطابق 2',
            'location_en' => 'East Wing - Floor 2',
            'category' => 'maternity',
            'avg_wait' => 16,
            'target_wait' => 20,
            'waiting_patients' => 6,
            'completed_today' => 41,
            'active_doctors' => 2,
            'rooms_active' => '2 / 2',
            'status' => 'optimal',
        ],
        (object)[
            'id' => 7,
            'name' => 'عيادة الجراحة العامة والمناظير',
            'name_en' => 'General Surgery Consultations',
            'code' => 'SURG-01',
            'location' => 'العيادات الخارجية - الطابق 1 (عيادة 110)',
            'location_en' => 'Outpatient Tower - Floor 1 (Room 110)',
            'category' => 'surgical',
            'avg_wait' => 15,
            'target_wait' => 20,
            'waiting_patients' => 4,
            'completed_today' => 29,
            'active_doctors' => 2,
            'rooms_active' => '2 / 2',
            'status' => 'optimal',
        ],
        (object)[
            'id' => 8,
            'name' => 'عيادة طب وجراحة العيون التخصصية',
            'name_en' => 'Ophthalmology Clinic',
            'code' => 'EYE-01',
            'location' => 'العيادات الخارجية - الطابق الأرضي',
            'location_en' => 'Outpatient Tower - Ground Floor',
            'category' => 'specialized',
            'avg_wait' => 13,
            'target_wait' => 20,
            'waiting_patients' => 4,
            'completed_today' => 32,
            'active_doctors' => 1,
            'rooms_active' => '1 / 1',
            'status' => 'optimal',
        ],
    ]);

    // الإحصائيات الكلية
    $avgHospitalWait = round($clinics->avg('avg_wait'), 1);
    $totalWaitingNow = $clinics->sum('waiting_patients');
    $totalCompletedToday = $clinics->sum('completed_today');
    $congestedClinicsCount = $clinics->where('status', 'congested')->count();
@endphp

@section('page-title', $isRtl ? 'مؤشرات أوقات الانتظار والتدفق' : 'Wait Times & Patient Flow')
@section('role-label', $isRtl ? 'مدير المستشفى' : 'Hospital Manager')

{{-- الروابط الجانبية لقسم مدير المستشفى --}}
@section('sidebar-links')
    <x-sidebar-link :href="Route::has('manager.dashboard') ? route('manager.dashboard') : '#'" :active="request()->routeIs('manager.dashboard')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                    <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'لوحة القيادة التشغيلية' : 'Dashboard' }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('manager.departments.index') ? route('manager.departments.index') : '#'" :active="request()->routeIs('manager.departments.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 21h18"/><path d="M5 21V7l8-4 8 4v14"/><path d="M9 21v-6h6v6"/>
                    <path d="M9 11h.01M15 11h.01M9 15h.01M15 15h.01"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'أعباء الأقسام والأسرة' : 'Departments & Beds' }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('manager.waiting-time.index') ? route('manager.waiting-time.index') : '#'" :active="true">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 7v5l3 3"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'مؤشرات أوقات الانتظار' : 'Wait Times' }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('manager.reports.index') ? route('manager.reports.index') : '#'" :active="request()->routeIs('manager.reports.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 3v18h18"/><path d="M18.7 8 13 13.7l-4-4L3 16"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'التقارير والمؤشرات' : 'Reports' }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('manager.staff.index') ? route('manager.staff.index') : '#'" :active="request()->routeIs('manager.staff.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                    <path d="M16 3.13a4 4 0 010 7.75"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'دليل الكادر والمناوبات' : 'Staff & Rosters' }}
    </x-sidebar-link>

    <div class="pt-3.5 mt-3.5 border-t border-white/10">
        <x-sidebar-link :href="Route::has('profile.edit') ? route('profile.edit') : '#'" :active="request()->routeIs('profile.edit')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'إعدادات الحساب' : 'Settings' }}
        </x-sidebar-link>
    </div>
@endsection

@section('content')

{{-- ══════════════════════════════════════════
     PRINT STYLESHEET (OFFICIAL WAIT TIME DOSSIER)
══════════════════════════════════════════ --}}
<style>
    @media print {
        body * { visibility: hidden; }
        #printableWaitSection, #printableWaitSection * { visibility: visible; }
        #printableWaitSection {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            background: #ffffff !important;
            color: #000000 !important;
            padding: 20px;
        }
        .print-hidden, nav, aside, header, footer { display: none !important; }
    }
</style>

<div class="space-y-4 font-sans text-slate-800 dark:text-slate-100 print:hidden" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

    {{-- 1. ترويسة الصفحة والإجراءات التنفيذية (Clean Title with Teal Dot) --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-2 border-b border-slate-100 dark:border-slate-800">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] shadow-sm shadow-[#14AFC3]/40"></span>
                <h1 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                    {{ $isRtl ? 'مؤشرات أوقات الانتظار وتدفق العيادات' : 'Wait Times & Queue Telemetry' }}
                </h1>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-1">
                {{ $isRtl ? 'رصد فوري لتدفق المراجعين، زمن الانتظار حتى مقابلة الطبيب، وإدارة مسارات الفرز السريع.' : 'Real-time outpatient throughput, consult wait times, and fast-track queue dispatch.' }}
            </p>
        </div>

        <div class="flex items-center gap-2">
            {{-- مؤشر التحديث الحي --}}
            <div class="hidden sm:flex items-center gap-2 px-3 h-9 bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700 rounded-xl text-xs font-bold text-slate-700 dark:text-slate-200 shadow-xs">
                <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                <span>{{ $isRtl ? 'تحديث حي' : 'Live' }}: <span id="clockDisplay" class="font-mono">{{ now()->format('H:i') }}</span></span>
            </div>

            {{-- زر تصدير التقرير (Modal) --}}
            <button type="button" onclick="exportWaitReport()" class="px-3.5 h-9 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-xs font-bold text-slate-700 dark:text-slate-200 transition-all shadow-xs flex items-center gap-1.5 cursor-pointer hover:border-[#14AFC3]">
                <div class="w-4 h-4 rounded-md bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <span>{{ $isRtl ? 'تصدير التقرير' : 'Export Report' }}</span>
            </button>

            {{-- زر التدخل السريع لفك الازدحام --}}
            <button type="button" onclick="openSurgeModal()" class="px-3.5 h-9 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#09525D] text-white text-xs font-bold rounded-xl transition-all shadow-xs flex items-center gap-1.5 cursor-pointer">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <circle cx="12" cy="12" r="9"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v8M8 12h8"/>
                </svg>
                <span>{{ $isRtl ? 'تدخل سريع لفك الازدحام' : 'Surge Mitigation' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         2. بطاقات قياس الأداء الرباعية الموحدة (CENTERED KPI STAT CARDS)
         "الايقونه تكون في الوسط والنص اسفلها"
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5">
        
        {{-- كرت 1: متوسط وقت الانتظار العام (Teal Highlighted) --}}
        <x-stat-card
            :label="$isRtl ? 'متوسط وقت الانتظار العام' : __('Hospital-wide Avg Wait')"
            :value="$avgHospitalWait . ' ' . ($isRtl ? 'دقيقة' : 'min')"
            :sublabel="$isRtl ? $totalWaitingNow . ' في الانتظار · ' . $totalCompletedToday . ' أُنجز كشفهم' : $totalWaitingNow . ' Waiting · ' . $totalCompletedToday . ' Done'"
            :highlighted="true"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 3"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- كرت 2: زمن فرز الحالات الطارئة (Triage) --}}
        <x-stat-card
            :label="$isRtl ? 'زمن فرز الحالات الطارئة (Triage)' : __('Emergency Triage Velocity')"
            :value="'9.2 ' . ($isRtl ? 'دقيقة' : 'min')"
            :sublabel="$isRtl ? 'المعيار المستهدف: دون 15 دقيقة' : __('Target: < 15 mins (Compliant)')"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- كرت 3: زمن انتظار العيادات الاستشارية --}}
        <x-stat-card
            :label="$isRtl ? 'انتظار العيادات الاستشارية' : __('Specialist Clinics Wait')"
            :value="'19.5 ' . ($isRtl ? 'دقيقة' : 'min')"
            :sublabel="$isRtl ? $congestedClinicsCount . ' عيادات تحت المتابعة' : $congestedClinicsCount . ' clinics monitored'"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- كرت 4: زمن صرف الوصفات الدوائية والصيدلية --}}
        <x-stat-card
            :label="$isRtl ? 'زمن صرف الوصفات الدوائية' : __('Pharmacy Dispensing Time')"
            :value="'7.8 ' . ($isRtl ? 'دقيقة' : 'min')"
            :sublabel="$isRtl ? '4 نوافذ صرف تعمل حالياً' : __('4 active dispensing windows')"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0016.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 002 8.5c0 2.3 1.5 4.05 3 5.5l7 7z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

    </div>

    {{-- ══════════════════════════════════════════
         3. شريط الفلترة والبحث السريع الموحد
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl p-3 shadow-xs flex flex-col md:flex-row items-center justify-between gap-3">
        
        {{-- حقول الفلترة بالأزرار الحديثة --}}
        <div class="flex items-center gap-1.5 overflow-x-auto w-full md:w-auto pb-1 md:pb-0 text-xs">
            <button type="button" onclick="filterClinicCategory('all', this)" class="clinic-filter-btn px-3 py-1.5 rounded-xl font-bold bg-[#14AFC3] text-white shadow-xs transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'جميع العيادات (8)' : 'All Clinics (8)' }}
            </button>
            <button type="button" onclick="filterClinicCategory('emergency', this)" class="clinic-filter-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'الطوارئ والفرز' : 'Emergency' }}
            </button>
            <button type="button" onclick="filterClinicCategory('internal', this)" class="clinic-filter-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'الباطنية والقلب' : 'Internal Med' }}
            </button>
            <button type="button" onclick="filterClinicCategory('surgical', this)" class="clinic-filter-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'الجراحة والعظام' : 'Surgical' }}
            </button>
            <button type="button" onclick="filterClinicCategory('pediatrics', this)" class="clinic-filter-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'الأطفال والرضع' : 'Pediatrics' }}
            </button>
            <button type="button" onclick="filterClinicCategory('maternity', this)" class="clinic-filter-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'النساء والتوليد' : 'Maternity' }}
            </button>
        </div>

        {{-- حقل البحث الفوري المدمج بالأيقونة --}}
        <div class="relative w-full md:w-72 shrink-0">
            <span class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none text-slate-400">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </span>
            <input type="text" id="clinicSearchInput" onkeyup="searchClinics()"
                   placeholder="{{ $isRtl ? 'بحث باسم العيادة أو الرمز أو الموقع...' : 'Search clinic, code or room...' }}"
                   class="w-full h-8.5 {{ $isRtl ? 'pr-8 pl-3' : 'pl-8 pr-3' }} bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-xs font-medium text-slate-900 dark:text-white outline-none focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/15 transition-all placeholder:text-slate-400">
        </div>

    </div>

    {{-- ══════════════════════════════════════════
         4. شبكة العيادات ورصد أوقات الانتظار الفورية (MODERN CARDS)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3.5" id="clinicsContainer">
        @foreach($clinics as $clinic)
        <div class="clinic-card bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl p-4 sm:p-5 shadow-xs hover:border-[#14AFC3]/40 transition-all flex flex-col justify-between group"
             data-name="{{ strtolower($clinic->name . ' ' . $clinic->name_en) }}"
             data-category="{{ $clinic->category }}"
             data-status="{{ $clinic->status }}">

            <div>
                {{-- رأس كرت العيادة --}}
                <div class="flex items-start justify-between gap-2">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-0.5 rounded-md text-[10px] font-black tracking-wider bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200/80 dark:border-slate-700 font-mono">
                                {{ $clinic->code }}
                            </span>
                            <h3 class="text-sm font-black text-slate-900 dark:text-white group-hover:text-[#14AFC3] transition-colors">
                                {{ $isRtl ? $clinic->name : $clinic->name_en }}
                            </h3>
                        </div>
                        <p class="text-[11px] text-slate-400 font-medium mt-1 flex items-center gap-1.5">
                            <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <span>{{ $isRtl ? $clinic->location : $clinic->location_en }}</span>
                        </p>
                    </div>

                    {{-- وسم انسيابية الطابور --}}
                    <div>
                        @if($clinic->status === 'congested')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10.5px] font-black bg-amber-50 text-amber-700 dark:bg-amber-950/40 dark:text-amber-300 border border-amber-200 dark:border-amber-900/50 shadow-2xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                <span>{{ $isRtl ? 'ضغط انتظار' : 'Congested' }}</span>
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10.5px] font-black bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/15 dark:text-[#14AFC3] border border-[#14AFC3]/30 shadow-2xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                                <span>{{ $isRtl ? 'انسيابي' : 'Optimal' }}</span>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- مؤشر وقت الانتظار الحالي --}}
                <div class="mt-3.5">
                    <div class="flex items-center justify-between text-xs mb-1.5 font-bold">
                        <span class="text-slate-500 dark:text-slate-400 text-[11px]">{{ $isRtl ? 'متوسط الانتظار الفعلي' : 'Current Wait Time' }}</span>
                        <div class="flex items-baseline gap-1.5">
                            <span class="font-black text-sm font-mono {{ $clinic->status === 'congested' ? 'text-amber-600 dark:text-amber-400' : 'text-slate-900 dark:text-white' }}">{{ $clinic->avg_wait }}</span>
                            <span class="text-slate-400 text-[10.5px]">{{ $isRtl ? 'دقيقة (الهدف: دون ' . $clinic->target_wait . ' د)' : 'mins (Target < ' . $clinic->target_wait . 'm)' }}</span>
                        </div>
                    </div>
                    @php
                        $pct = min(round(($clinic->avg_wait / max($clinic->target_wait, 1)) * 100), 100);
                    @endphp
                    <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2 overflow-hidden">
                        <div class="h-2 rounded-full transition-all duration-700 {{ $clinic->status === 'congested' ? 'bg-gradient-to-r from-amber-500 to-rose-500' : 'bg-gradient-to-r from-[#14AFC3] to-[#0C6B78]' }}"
                             style="width: {{ $pct }}%"></div>
                    </div>
                </div>

                {{-- مصفوفة مؤشرات تدفق العيادة --}}
                <div class="mt-3.5 grid grid-cols-4 gap-2 bg-slate-50/70 dark:bg-slate-800/40 p-2.5 rounded-xl border border-slate-100 dark:border-slate-800 text-center">
                    <div>
                        <span class="text-[10px] text-slate-400 font-bold block">{{ $isRtl ? 'في الانتظار' : 'Waiting' }}</span>
                        <span class="text-xs font-black text-slate-900 dark:text-white font-mono mt-0.5 block" dir="ltr">{{ $clinic->waiting_patients }}</span>
                    </div>
                    <div class="border-s border-slate-200/80 dark:border-slate-700">
                        <span class="text-[10px] text-slate-500 dark:text-slate-400 font-bold block">{{ $isRtl ? 'أُنجز كشفهم' : 'Completed' }}</span>
                        <span class="text-xs font-black text-slate-900 dark:text-white font-mono mt-0.5 block" dir="ltr">{{ $clinic->completed_today }}</span>
                    </div>
                    <div class="border-s border-slate-200/80 dark:border-slate-700">
                        <span class="text-[10px] text-teal-600 dark:text-[#14AFC3] font-bold block">{{ $isRtl ? 'أطباء مناوبين' : 'MDs on Duty' }}</span>
                        <span class="text-xs font-black text-[#14AFC3] font-mono mt-0.5 block" dir="ltr">{{ $clinic->active_doctors }}</span>
                    </div>
                    <div class="border-s border-slate-200/80 dark:border-slate-700">
                        <span class="text-[10px] text-slate-400 font-bold block">{{ $isRtl ? 'غرف نشطة' : 'Rooms' }}</span>
                        <span class="text-xs font-black text-slate-600 dark:text-slate-300 font-mono mt-0.5 block" dir="ltr">{{ $clinic->rooms_active }}</span>
                    </div>
                </div>
            </div>

            {{-- أزرار التدخل الإداري --}}
            <div class="mt-3.5 pt-3 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between gap-2">
                <button type="button" onclick="triggerDoctorSupport('{{ $isRtl ? $clinic->name : $clinic->name_en }}')" class="flex-1 h-8 bg-[#E5FAFC] dark:bg-[#14AFC3]/15 hover:bg-[#d5f5f9] dark:hover:bg-[#14AFC3]/25 text-[#14AFC3] text-xs font-bold rounded-xl transition-colors flex items-center justify-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                    <span>{{ $isRtl ? 'استدعاء طبيب مساند' : 'Support MD' }}</span>
                </button>

                <button type="button" onclick="triggerFastTrack('{{ $isRtl ? $clinic->name : $clinic->name_en }}')" class="px-3 h-8 bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 dark:hover:bg-slate-700 border border-slate-200/80 dark:border-slate-700 text-slate-700 dark:text-slate-200 text-xs font-bold rounded-xl transition-colors flex items-center gap-1 cursor-pointer">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                    </svg>
                    <span>{{ $isRtl ? 'مسار سريع' : 'Fast-Track' }}</span>
                </button>
            </div>

        </div>
        @endforeach
    </div>

    {{-- ══════════════════════════════════════════
         5. جدول تدفق التذاكر والمراجعين المباشر
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-3xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        <div class="px-5 py-3.5 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center shrink-0 border border-[#14AFC3]/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <div>
                    <h2 class="text-sm font-black text-slate-900 dark:text-white leading-tight">
                        {{ $isRtl ? 'سجل تذاكر الانتظار وتدفق المراجعين المباشر' : 'Live Patient Queue & Ticket Activity Ledger' }}
                    </h2>
                    <p class="text-[11px] text-slate-400 font-medium">
                        {{ $isRtl ? 'رصد فوري لزمن دخول المراجعين حتى مقابلة الطبيب' : 'Real-time telemetry of patient calls and consult durations' }}
                    </p>
                </div>
            </div>
            <span class="px-2.5 py-1 rounded-full text-[10.5px] font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 border border-[#14AFC3]/30 font-mono">
                {{ $isRtl ? 'الانتظار الإجمالي: ' . $totalWaitingNow . ' مراجع' : $totalWaitingNow . ' Patients in Queue' }}
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[950px] border-collapse">
                <thead class="bg-slate-50/90 dark:bg-slate-800/70 text-[11.5px] font-extrabold text-slate-700 dark:text-slate-200 uppercase border-b border-slate-200/80 dark:border-slate-800 tracking-wider">
                    <tr>
                        <th class="py-3 px-5 text-start">{{ $isRtl ? 'رقم التذكرة' : 'Ticket #' }}</th>
                        <th class="py-3 px-4 text-start">{{ $isRtl ? 'المراجع / الملف' : 'Patient / MRN' }}</th>
                        <th class="py-3 px-4 text-start">{{ $isRtl ? 'العيادة المستهدفة' : 'Clinic' }}</th>
                        <th class="py-3 px-4 text-start">{{ $isRtl ? 'وقت الانتظار المنقضي' : 'Elapsed Wait' }}</th>
                        <th class="py-3 px-4 text-start">{{ $isRtl ? 'الطبيب المعالج' : 'Attending MD' }}</th>
                        <th class="py-3 px-4 text-center">{{ $isRtl ? 'حالة التذكرة' : 'Status' }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60">
                    <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-3 px-5 font-mono font-black text-slate-900 dark:text-white" dir="ltr">TRG-042</td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-900 dark:text-white block">{{ $isRtl ? 'معاذ منصور السقاف' : 'Muath Mansour Al-Saqqaf' }}</span>
                            <span class="text-[10px] text-slate-400 font-mono">MRN-91204</span>
                        </td>
                        <td class="py-3 px-4 font-medium text-slate-700 dark:text-slate-300">{{ $isRtl ? 'طوارئ الفرز السريع' : 'Emergency Fast-Track' }}</td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-[#14AFC3] font-mono">6 {{ $isRtl ? 'دقائق' : 'mins' }}</span>
                        </td>
                        <td class="py-3 px-4 text-slate-700 dark:text-slate-300 font-medium">{{ $isRtl ? 'د. منى النمري' : 'Dr. Muna Al-Nemri' }}</td>
                        <td class="py-3 px-4 text-center">
                            <span class="inline-flex items-center gap-1 font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/15 px-2.5 py-0.5 rounded-lg text-[10.5px] border border-[#14AFC3]/30">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                                <span>{{ $isRtl ? 'قيد الكشف الآن' : 'In Consult' }}</span>
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-3 px-5 font-mono font-black text-slate-900 dark:text-white" dir="ltr">MED-108</td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-900 dark:text-white block">{{ $isRtl ? 'خالد يحيى الحيمي' : 'Khaled Yahya Al-Haimi' }}</span>
                            <span class="text-[10px] text-slate-400 font-mono">MRN-83119</span>
                        </td>
                        <td class="py-3 px-4 font-medium text-slate-700 dark:text-slate-300">{{ $isRtl ? 'الباطنية والأمراض الصدرية' : 'Internal & Pulmonology' }}</td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-amber-600 dark:text-amber-400 font-mono">24 {{ $isRtl ? 'دقيقة' : 'mins' }}</span>
                        </td>
                        <td class="py-3 px-4 text-slate-700 dark:text-slate-300 font-medium">{{ $isRtl ? 'د. فؤاد الخولاني' : 'Dr. Fouad Al-Kholani' }}</td>
                        <td class="py-3 px-4 text-center">
                            <span class="inline-flex items-center gap-1 font-bold text-amber-700 dark:text-amber-300 bg-amber-50 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-900/50 px-2.5 py-0.5 rounded-lg text-[10.5px]">
                                {{ $isRtl ? 'في صالة الانتظار' : 'Waiting in Queue' }}
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-3 px-5 font-mono font-black text-slate-900 dark:text-white" dir="ltr">ORTH-077</td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-900 dark:text-white block">{{ $isRtl ? 'سميرة أحمد الرداعي' : 'Samira Ahmed Al-Radaei' }}</span>
                            <span class="text-[10px] text-slate-400 font-mono">MRN-78902</span>
                        </td>
                        <td class="py-3 px-4 font-medium text-slate-700 dark:text-slate-300">{{ $isRtl ? 'جراحة العظام والإصابات' : 'Orthopedics Clinic' }}</td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-amber-600 dark:text-amber-400 font-mono">21 {{ $isRtl ? 'دقيقة' : 'mins' }}</span>
                        </td>
                        <td class="py-3 px-4 text-slate-700 dark:text-slate-300 font-medium">{{ $isRtl ? 'د. عصام المقطري' : 'Dr. Essam Al-Maqtari' }}</td>
                        <td class="py-3 px-4 text-center">
                            <span class="inline-flex items-center gap-1 font-bold text-amber-700 dark:text-amber-300 bg-amber-50 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-900/50 px-2.5 py-0.5 rounded-lg text-[10.5px]">
                                {{ $isRtl ? 'في صالة الانتظار' : 'Waiting in Queue' }}
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-3 px-5 font-mono font-black text-slate-400" dir="ltr">PED-039</td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-900 dark:text-white block">{{ $isRtl ? 'الطفل / يوسف وليد الصنعاني' : 'Child: Yousef Waleed' }}</span>
                            <span class="text-[10px] text-slate-400 font-mono">MRN-90114</span>
                        </td>
                        <td class="py-3 px-4 font-medium text-slate-700 dark:text-slate-300">{{ $isRtl ? 'عيادة الأطفال العامة' : 'General Pediatrics' }}</td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-500 font-mono">12 {{ $isRtl ? 'دقيقة' : 'mins' }}</span>
                        </td>
                        <td class="py-3 px-4 text-slate-700 dark:text-slate-300 font-medium">{{ $isRtl ? 'د. ريما الشامي' : 'Dr. Rima Al-Shami' }}</td>
                        <td class="py-3 px-4 text-center">
                            <span class="inline-flex items-center gap-1 font-bold text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-2.5 py-0.5 rounded-lg text-[10.5px]">
                                {{ $isRtl ? 'مكتمل الكشف' : 'Consult Finished' }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════
     6. نافذة Modal تفاعلية: «التدخل السريع لفك الازدحام»
     (#surgeModal)
══════════════════════════════════════════ --}}
<div id="surgeModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-3 sm:p-4 text-start" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-100 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center border border-[#14AFC3]/20">
                    <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="9"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v8M8 12h8"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-black text-slate-900 dark:text-white">{{ $isRtl ? 'التدخل الإداري لفك ازدحام العيادات' : 'Clinic Surge Mitigation' }}</h3>
                    <p class="text-[11px] text-slate-400 font-medium">{{ $isRtl ? 'إجراء تشغيلي عاجل لتسريع وتيرة الكشف وتخفيف الطوابير' : 'Operational managerial queue dispatch' }}</p>
                </div>
            </div>
            <button type="button" onclick="closeSurgeModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer">
                <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>

        <form onsubmit="submitSurgePlan(event)" class="mt-4 space-y-4 text-xs">
            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'العيادة المستهدفة بالتدخل' : 'Target Clinic' }}</label>
                <select id="surgeClinicSelect" class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-800 dark:text-slate-100 font-bold focus:border-[#14AFC3] focus:outline-none">
                    <option value="ORTHO-03">{{ $isRtl ? 'عيادة العظام والعمود الفقري (انتظار 27 دقيقة)' : 'Orthopedics & Spine (27 min wait)' }}</option>
                    <option value="MED-02">{{ $isRtl ? 'عيادة الباطنية والأمراض الصدرية (انتظار 24 دقيقة)' : 'Internal Medicine (24 min wait)' }}</option>
                    <option value="CARD-01">{{ $isRtl ? 'أمراض القلب والقسطرة (انتظار 17 دقيقة)' : 'Cardiology (17 min wait)' }}</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'نوع الإجراء التشغيلي الفوري' : 'Mitigation Action' }}</label>
                <div class="space-y-2">
                    <label class="flex items-center gap-2.5 p-3 bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700 rounded-xl cursor-pointer hover:border-[#14AFC3] transition-colors">
                        <input type="radio" name="surge_action" value="room" checked class="accent-[#14AFC3]">
                        <div>
                            <span class="font-bold text-slate-900 dark:text-white block">{{ $isRtl ? 'فتح غرفة كشف إضافية (Overflow Room)' : 'Open Overflow Examination Room' }}</span>
                            <span class="text-[11px] text-slate-400">{{ $isRtl ? 'تفعيل غرفة فحص مساندة فوراً وتوجيه التمريض' : 'Activate backup consultation room & nursing support' }}</span>
                        </div>
                    </label>

                    <label class="flex items-center gap-2.5 p-3 bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700 rounded-xl cursor-pointer hover:border-[#14AFC3] transition-colors">
                        <input type="radio" name="surge_action" value="doctor" class="accent-[#14AFC3]">
                        <div>
                            <span class="font-bold text-slate-900 dark:text-white block">{{ $isRtl ? 'استدعاء طبيب مناوب مساند من قائمة الاحتياط' : 'Dispatch On-Call Physician' }}</span>
                            <span class="text-[11px] text-slate-400">{{ $isRtl ? 'إرسال إشعار فوري لطبيب المناوبة المساند للانضمام للعيادة' : 'Instant pager sent to standby physician' }}</span>
                        </div>
                    </label>

                    <label class="flex items-center gap-2.5 p-3 bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700 rounded-xl cursor-pointer hover:border-[#14AFC3] transition-colors">
                        <input type="radio" name="surge_action" value="fasttrack" class="accent-[#14AFC3]">
                        <div>
                            <span class="font-bold text-slate-900 dark:text-white block">{{ $isRtl ? 'تحويل الحالات المستقرة لمسار الرعاية السريعة' : 'Divert to Fast-Track Routing' }}</span>
                            <span class="text-[11px] text-slate-400">{{ $isRtl ? 'فرز المراجعات الروتينية وصرف العلاج المتكرر' : 'Triage routine refills and follow-ups' }}</span>
                        </div>
                    </label>
                </div>
            </div>

            <div class="p-3 bg-slate-50 dark:bg-slate-800/40 border border-slate-200/80 dark:border-slate-700 rounded-xl text-[11px] text-slate-600 dark:text-slate-300 space-y-1">
                <div class="flex items-center justify-between">
                    <span>{{ $isRtl ? 'المعتمد للتنفيذ:' : 'Authorized by:' }}</span>
                    <span class="font-bold text-slate-900 dark:text-white">{{ Auth::user()->name ?? ($isRtl ? 'مدير المستشفى' : 'Hospital Manager') }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span>{{ $isRtl ? 'الإشعار الفوري:' : 'Notification:' }}</span>
                    <span class="text-slate-500">{{ $isRtl ? 'يتم إشعار شاشات الانتظار ومنسق العيادات فوراً' : 'Displays and clinic coordinators notified' }}</span>
                </div>
            </div>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="closeSurgeModal()" class="px-4 py-2 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 font-bold transition-colors cursor-pointer">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="submit" class="px-5 py-2 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#09525D] text-white rounded-xl font-bold transition-all shadow-xs cursor-pointer">
                    {{ $isRtl ? 'تفعيل الإجراء فوراً' : 'Deploy Action' }}
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ══════════════════════════════════════════
     7. نافذة Modal تفاعلية: «تصدير تقرير أوقات الانتظار المعتمد»
     (#waitReportModal)
══════════════════════════════════════════ --}}
<div id="waitReportModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-3 sm:p-4 text-center">
        <div class="w-full max-w-3xl transform overflow-hidden rounded-2xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-100 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200" id="printableWaitSection">
            
            {{-- Accent Top Bar --}}
            <div class="h-2 bg-gradient-to-r from-[#14AFC3] via-[#0C6B78] to-[#152C4B]"></div>

            <div class="p-5 sm:p-7 space-y-4">
                
                {{-- Official Yemeni MoH Header --}}
                <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pb-3 border-b-2 border-slate-200 text-center sm:text-start">
                    <div>
                        <span class="text-xs font-bold text-slate-800 block">{{ $isRtl ? 'الجمهورية اليمنية' : 'Republic of Yemen' }}</span>
                        <span class="text-xs font-bold text-slate-700 block">{{ $isRtl ? 'وزارة الصحة العامة والسكان' : 'Ministry of Public Health & Population' }}</span>
                        <h2 class="text-sm sm:text-base font-black text-[#14AFC3] mt-0.5 tracking-tight">
                            {{ $isRtl ? 'مستشفى الرشيد التخصصي - صنعاء' : 'Al-Rasheed Specialized Hospital - Sana\'a' }}
                        </h2>
                    </div>

                    {{-- Hospital Coat of Arms / Crest --}}
                    <div class="w-14 h-14 rounded-2xl bg-[#E5FAFC] border border-[#14AFC3]/30 flex flex-col items-center justify-center text-[#14AFC3] shadow-xs">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                        </svg>
                    </div>

                    <div class="text-center sm:text-end text-xs font-mono">
                        <div class="font-bold text-slate-900">REF: RSD-WAIT-2026-YE</div>
                        <div class="text-slate-500 text-[10px]">{{ now()->format('Y-m-d H:i') }}</div>
                        <div class="text-emerald-700 text-[10px] font-bold">STATUS: OFFICIAL TELEMETRY AUDIT</div>
                    </div>
                </div>

                {{-- Subject Banner --}}
                <div class="flex items-center justify-between bg-slate-50 p-3 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-[#E5FAFC] text-[#14AFC3] font-black flex items-center justify-center border border-[#14AFC3]/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5l3 3"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base font-black text-slate-900 leading-snug">
                                {{ $isRtl ? 'تقرير أوقات الانتظار ومعدلات تدفق العيادات المعتمد' : 'Official Outpatient Wait Time & Throughput Audit Dossier' }}
                            </h3>
                            <span class="text-[10px] font-bold text-teal-800 bg-[#E5FAFC] px-2 py-0.5 rounded font-mono border border-teal-100">
                                QUEUE VELOCITY & TRIAGE TELEMETRY
                            </span>
                        </div>
                    </div>
                    <button type="button" onclick="closeWaitReportModal()" class="text-slate-400 hover:text-slate-700 p-1.5 rounded-lg hover:bg-slate-200 transition-colors print:hidden cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                {{-- 4 Metric Boxes Grid --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 text-center">
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'متوسط الانتظار العام' : 'Avg Hospital Wait' }}</span>
                        <span class="text-base sm:text-lg font-black text-[#14AFC3] font-mono block mt-0.5">{{ $avgHospitalWait }} د</span>
                        <span class="text-[9.5px] text-emerald-600 font-bold block mt-0.5">{{ $isRtl ? 'ضمن المعيار المستهدف' : 'On Target' }}</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'في الانتظار حالياً' : 'Waiting in Queue' }}</span>
                        <span class="text-base sm:text-lg font-black text-slate-800 font-mono block mt-0.5">{{ $totalWaitingNow }}</span>
                        <span class="text-[9.5px] text-slate-500 font-medium block mt-0.5">{{ $isRtl ? 'عبر 8 عيادات' : 'Across 8 clinics' }}</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'كشوفات مكتملة اليوم' : 'Completed Consults' }}</span>
                        <span class="text-base sm:text-lg font-black text-emerald-600 font-mono block mt-0.5">{{ $totalCompletedToday }}</span>
                        <span class="text-[9.5px] text-emerald-600 font-bold block mt-0.5">{{ $isRtl ? 'إنتاجية سريرية عالية' : 'High Throughput' }}</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'عيادات تحت المراقبة' : 'Monitored Clinics' }}</span>
                        <span class="text-base sm:text-lg font-black text-amber-600 font-mono block mt-0.5">{{ $congestedClinicsCount }}</span>
                        <span class="text-[9.5px] text-slate-500 font-medium block mt-0.5">{{ $isRtl ? 'إشغال مكثف' : 'Congested' }}</span>
                    </div>
                </div>

                {{-- Clinic Breakdown Table --}}
                <div class="border border-slate-200/80 dark:border-slate-700 rounded-3xl overflow-hidden shadow-sm">
                    <div class="bg-slate-100 px-3.5 py-1.5 border-b border-slate-200 flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-800">{{ $isRtl ? 'بيان تفصيلي لمتوسط فترات الانتظار والجاهزية لكل عيادة' : 'Detailed Clinic Wait Times & Operational Readiness' }}</span>
                        <span class="text-[10px] font-mono text-slate-500">MOH-OPS-QUEUE</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs text-start">
                            <thead class="bg-slate-50 text-slate-600 font-bold border-b border-slate-200 text-[10.5px]">
                                <tr>
                                    <th class="py-2 px-3 text-start">{{ $isRtl ? 'العيادة' : 'Clinic' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'الكود' : 'Code' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'متوسط الانتظار' : 'Avg Wait' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'المعيار' : 'Target' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'في الانتظار' : 'In Queue' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'أطباء مناوبين' : 'Active MDs' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'الحالة' : 'Status' }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @foreach($clinics as $c)
                                    <tr>
                                        <td class="py-2 px-3 font-semibold text-slate-900">{{ $isRtl ? $c->name : $c->name_en }}</td>
                                        <td class="py-2 px-3 text-center font-mono text-[11px] text-slate-500">{{ $c->code }}</td>
                                        <td class="py-2 px-3 text-center font-mono font-bold {{ $c->status === 'congested' ? 'text-amber-600' : 'text-slate-900' }}" dir="ltr">{{ $c->avg_wait }} د</td>
                                        <td class="py-2 px-3 text-center font-mono text-slate-500" dir="ltr">&lt; {{ $c->target_wait }} د</td>
                                        <td class="py-2 px-3 text-center font-mono font-bold text-slate-800" dir="ltr">{{ $c->waiting_patients }}</td>
                                        <td class="py-2 px-3 text-center font-mono text-[#14AFC3] font-bold" dir="ltr">{{ $c->active_doctors }}</td>
                                        <td class="py-2 px-3 text-center">
                                            <span class="text-[10px] font-bold {{ $c->status === 'congested' ? 'text-amber-700 bg-amber-50' : 'text-emerald-700 bg-emerald-50' }} px-2 py-0.5 rounded border border-slate-200">
                                                {{ $c->status === 'congested' ? ($isRtl ? 'ضغط انتظار' : 'Congested') : ($isRtl ? 'انسيابي' : 'Optimal') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Sign-off and Seals --}}
                <div class="pt-3 border-t border-slate-200 grid grid-cols-1 sm:grid-cols-3 gap-3 items-center text-center text-xs">
                    <div>
                        <span class="text-[10px] font-bold text-slate-400 block mb-1">{{ $isRtl ? 'مسؤول الفرز والتحكم بالطوابير' : 'Triage & Flow Supervisor' }}</span>
                        <span class="font-extrabold text-slate-800 text-[11px] block">{{ $isRtl ? 'د. منى عبدالعزيز النمري' : 'Dr. Muna Al-Nemri' }}</span>
                        <span class="text-[10px] text-slate-500 block">{{ $isRtl ? 'مشرفة طوارئ الفرز السريع' : 'Emergency Triage Coordinator' }}</span>
                    </div>

                    <div>
                        {{-- Circular Stamp --}}
                        <div class="w-20 h-20 rounded-full border-2 border-dashed border-[#14AFC3] mx-auto flex flex-col items-center justify-center p-1 text-[7.5px] font-black text-[#0C6B78] rotate-[-5deg] bg-[#E5FAFC]/40 shadow-xs">
                            <span class="text-[7px] text-slate-600">{{ $isRtl ? 'وزارة الصحة العامة' : 'Ministry of Health' }}</span>
                            <span class="text-[8px] font-extrabold text-[#14AFC3]">{{ $isRtl ? 'مستشفى الرشيد' : 'Al-Rasheed Hospital' }}</span>
                            <span class="text-[6.5px] text-slate-700">{{ $isRtl ? 'صنعاء - اليمن' : 'Sana\'a - Yemen' }}</span>
                            <span class="text-[6px] font-mono text-slate-400 mt-0.5">MOH-WAIT-2026</span>
                        </div>
                    </div>

                    <div>
                        <span class="text-[10px] font-bold text-slate-400 block mb-1">{{ $isRtl ? 'المصادقة والاعتماد الإداري' : 'Executive Approval' }}</span>
                        <span class="font-extrabold text-slate-800 text-[11px] block">{{ $isRtl ? 'د. فيصل العريقي' : 'Dr. Faisal Al-Oraiqi' }}</span>
                        <span class="text-[10px] text-slate-500 block">{{ $isRtl ? 'المدير العام التنفيذي للمستشفى' : 'Chief Executive Officer' }}</span>
                    </div>
                </div>

                {{-- Modal Action Buttons --}}
                <div class="flex items-center justify-between pt-3 border-t border-slate-100 print:hidden">
                    <span class="text-[10px] font-mono text-slate-400">ENCRYPTION: MOH-YEMEN-RSA-4096-VALID</span>
                    
                    <div class="flex items-center gap-2">
                        <button type="button" onclick="closeWaitReportModal()" class="px-3.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-xs transition-colors cursor-pointer">
                            {{ $isRtl ? 'إغلاق' : 'Close' }}
                        </button>
                        <button type="button" onclick="downloadWaitReportCSV()" class="px-3.5 py-1.5 bg-slate-800 hover:bg-slate-900 text-white font-bold rounded-xl text-xs transition-all flex items-center gap-1 shadow-xs cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span>{{ $isRtl ? 'تحميل كـ CSV' : 'Export CSV' }}</span>
                        </button>
                        <button type="button" onclick="printWaitReport()" class="px-4 py-1.5 bg-[#14AFC3] hover:bg-[#0E94A6] text-white font-bold rounded-xl text-xs shadow-sm transition-all flex items-center gap-1.5 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                            <span>{{ $isRtl ? 'طباعة التقرير' : 'Print Report' }}</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- Unified Toast --}}
<div id="actionToast" class="fixed bottom-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 hidden items-center gap-2.5 px-4 py-2.5 bg-slate-900/95 dark:bg-slate-800 text-white rounded-xl shadow-xl border border-slate-700/60 text-xs font-bold transition-all duration-300 animate-in slide-in-from-bottom-3 print:hidden">
    <div class="w-4 h-4 rounded-full bg-[#14AFC3] flex items-center justify-center flex-shrink-0 text-white">
        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
    </div>
    <span id="toastMessage"></span>
</div>

@push('scripts')
<script>
    const isRtl = {{ $isRtl ? 'true' : 'false' }};

    // Live clock update
    setInterval(() => {
        const now = new Date();
        const hrs = String(now.getHours()).padStart(2, '0');
        const mins = String(now.getMinutes()).padStart(2, '0');
        const el = document.getElementById('clockDisplay');
        if (el) el.innerText = `${hrs}:${mins}`;
    }, 10000);

    // Filter categories
    function filterClinicCategory(cat, btn) {
        document.querySelectorAll('.clinic-filter-btn').forEach(b => {
            b.classList.remove('bg-[#14AFC3]', 'text-white', 'shadow-xs');
            b.classList.add('bg-slate-100', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300');
        });
        btn.classList.remove('bg-slate-100', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300');
        btn.classList.add('bg-[#14AFC3]', 'text-white', 'shadow-xs');

        const cards = document.querySelectorAll('.clinic-card');
        cards.forEach(card => {
            if (cat === 'all' || card.getAttribute('data-category') === cat) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Search input
    function searchClinics() {
        const query = document.getElementById('clinicSearchInput').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.clinic-card');
        cards.forEach(card => {
            const name = card.getAttribute('data-name') || '';
            if (!query || name.includes(query)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Surge Modal
    function openSurgeModal() {
        const m = document.getElementById('surgeModal');
        m.classList.remove('hidden');
        m.classList.add('flex');
    }

    function closeSurgeModal() {
        const m = document.getElementById('surgeModal');
        m.classList.add('hidden');
        m.classList.remove('flex');
    }

    function submitSurgePlan(e) {
        e.preventDefault();
        closeSurgeModal();
        showToast(isRtl ? 'تم تفعيل خطة فك الازدحام وتوجيه الكادر بنجاح.' : 'Surge mitigation plan deployed successfully.');
    }

    // Support Actions
    function triggerDoctorSupport(clinicName) {
        showToast(isRtl ? `تم إرسال نداء استدعاء لطبيب مساند لـ [${clinicName}].` : `Support physician dispatch sent for [${clinicName}].`);
    }

    function triggerFastTrack(clinicName) {
        showToast(isRtl ? `تم تحويل الحالات المستقرة في [${clinicName}] إلى مسار الفرز السريع.` : `Patients in [${clinicName}] routed to fast-track.`);
    }

    // Wait Report Modal Controls
    function exportWaitReport() {
        document.getElementById('waitReportModal').classList.remove('hidden');
    }

    function closeWaitReportModal() {
        document.getElementById('waitReportModal').classList.add('hidden');
    }

    function printWaitReport() {
        window.print();
    }

    // CSV Download with UTF-8 BOM
    function downloadWaitReportCSV() {
        let csv = '\uFEFF';
        csv += 'الجمهورية اليمنية - وزارة الصحة العامة والسكان - أمانة العاصمة صنعاء\r\n';
        csv += 'مستشفى الرشيد التخصصي - تقرير أوقات الانتظار ومعدلات تدفق العيادات\r\n';
        csv += 'المرجع الرسمي: RSD-WAIT-2026-YE\r\n';
        csv += `تاريخ التصدير: ${new Date().toISOString()}\r\n\r\n`;

        csv += 'العيادة,الكود,متوسط الانتظار (دقيقة),المعيار المستهدف (دقيقة),في الانتظار حالياً,الكشوفات المنجزة,أطباء مناوبين,الحالة\r\n';
        csv += 'طوارئ الفرز والإصابات السريعة (Triage),TRG-01,9,15,6,84,3,انسيابي\r\n';
        csv += 'عيادة الباطنية والأمراض الصدرية,MED-02,24,20,12,46,2,ضغط انتظار\r\n';
        csv += 'عيادة أمراض القلب والأوعية الدموية,CARD-01,17,20,5,34,2,انسيابي\r\n';
        csv += 'عيادة جراحة العظام والعمود الفقري,ORTHO-03,27,20,11,38,2,ضغط انتظار\r\n';
        csv += 'عيادة الأطفال ورعاية حديثي الولادة,PED-01,14,20,7,52,3,انسيابي\r\n';
        csv += 'عيادة النساء والتوليد ورعاية الأمومة,OBG-02,16,20,6,41,2,انسيابي\r\n';
        csv += 'عيادة الجراحة العامة والمناظير,SURG-01,15,20,4,29,2,انسيابي\r\n';
        csv += 'عيادة طب وجراحة العيون التخصصية,EYE-01,13,20,4,32,1,انسيابي\r\n';

        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `RSD_Wait_Times_${new Date().toISOString().slice(0,10)}.csv`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showToast(isRtl ? 'تم تحميل ملف تقرير أوقات الانتظار (CSV) بنجاح.' : 'Wait times CSV downloaded successfully.');
    }

    // Unified Toast
    function showToast(msg) {
        const toast = document.getElementById('actionToast');
        const text = document.getElementById('toastMessage');
        text.textContent = msg;
        toast.classList.remove('hidden');
        toast.classList.add('flex');
        setTimeout(() => {
            toast.classList.add('hidden');
            toast.classList.remove('flex');
        }, 3200);
    }
</script>
@endpush
@endsection
