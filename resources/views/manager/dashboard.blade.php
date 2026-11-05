@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    $visibleStaff = collect([
        (object)[
            'name' => $isRtl ? 'د. مازن الحربي' : 'Dr. Mazen Al-Harbi',
            'initials' => $isRtl ? 'د.م' : 'MH',
            'employee_id' => 'EMP-101',
            'role' => 'doctor',
            'specialty' => $isRtl ? 'استشاري أول قسطرة وجراحة قلب' : 'Senior Consultant Cardiologist',
            'department' => $isRtl ? 'أمراض وجراحة القلب' : 'Cardiology & Heart Surgery',
            'status' => 'active',
            'created_at' => $isRtl ? 'يناير 2022' : 'Jan 2022',
        ],
        (object)[
            'name' => $isRtl ? 'د. لينا سعود' : 'Dr. Lina Saud',
            'initials' => $isRtl ? 'د.ل' : 'LS',
            'employee_id' => 'EMP-102',
            'role' => 'doctor',
            'specialty' => $isRtl ? 'استشارية مخ وأعصاب وتخطيط دماغ' : 'Consultant Neurologist',
            'department' => $isRtl ? 'المخ والأعصاب' : 'Neurology & Brain Care',
            'status' => 'active',
            'created_at' => $isRtl ? 'مارس 2022' : 'Mar 2022',
        ],
        (object)[
            'name' => $isRtl ? 'د. طارق قحطان' : 'Dr. Tariq Qahtan',
            'initials' => $isRtl ? 'د.ط' : 'TQ',
            'employee_id' => 'EMP-103',
            'role' => 'doctor',
            'specialty' => $isRtl ? 'أخصائي طوارئ وعناية أطفال' : 'Pediatric Emergency Specialist',
            'department' => $isRtl ? 'طب وطوارئ الأطفال' : 'Pediatrics & Neonatal Care',
            'status' => 'on_leave',
            'created_at' => $isRtl ? 'يونيو 2021' : 'Jun 2021',
        ],
        (object)[
            'name' => $isRtl ? 'د. هند الرشيدي' : 'Dr. Hind Al-Rashidi',
            'initials' => $isRtl ? 'د.هـ' : 'HR',
            'employee_id' => 'EMP-104',
            'role' => 'doctor',
            'specialty' => $isRtl ? 'أخصائية تصوير رنين وتشخيص إشعاعي' : 'Radiologist & MRI Specialist',
            'department' => $isRtl ? 'الأشعة والتصوير الطبي' : 'Radiology & Imaging',
            'status' => 'active',
            'created_at' => $isRtl ? 'أغسطس 2022' : 'Aug 2022',
        ],
        (object)[
            'name' => $isRtl ? 'سارة العتيبي' : 'Sarah Al-Otaibi',
            'initials' => $isRtl ? 'س.ع' : 'SO',
            'employee_id' => 'EMP-210',
            'role' => 'receptionist',
            'specialty' => $isRtl ? 'مسؤولة شؤون دخول وتأمين' : 'Admissions & Patient Intake',
            'department' => $isRtl ? 'الاستقبال الرئيسي والقبول' : 'Main Admissions Desk',
            'status' => 'active',
            'created_at' => $isRtl ? 'سبتمبر 2023' : 'Sep 2023',
        ],
        (object)[
            'name' => $isRtl ? 'خالد المطيري' : 'Khaled Al-Mutairi',
            'initials' => $isRtl ? 'خ.م' : 'KM',
            'employee_id' => 'EMP-211',
            'role' => 'receptionist',
            'specialty' => $isRtl ? 'منسق فرز وطوارئ حوادث' : 'Emergency Triage Coordinator',
            'department' => $isRtl ? 'استقبال وفرز الطوارئ' : 'Emergency Triage Desk',
            'status' => 'active',
            'created_at' => $isRtl ? 'فبراير 2023' : 'Feb 2023',
        ],
    ]);

    $departmentsData = [
        [
            'name' => $isRtl ? 'قسم الطوارئ والحوادث' : 'Emergency Unit',
            'code' => 'ER-01',
            'occupied' => 18,
            'total' => 20,
            'load' => 90,
            'status_label' => $isRtl ? 'إشغال مكثف' : 'High Load',
            'is_critical' => true,
        ],
        [
            'name' => $isRtl ? 'العناية المركزة (ICU)' : 'Intensive Care (ICU)',
            'code' => 'ICU-02',
            'occupied' => 14,
            'total' => 16,
            'load' => 88,
            'status_label' => $isRtl ? 'إشغال مكثف' : 'High Load',
            'is_critical' => true,
        ],
        [
            'name' => $isRtl ? 'جراحة القلب والقسطرة' : 'Cardiology Ward',
            'code' => 'CRD-03',
            'occupied' => 22,
            'total' => 30,
            'load' => 73,
            'status_label' => $isRtl ? 'طاقة آمنة' : 'Optimal Capacity',
            'is_critical' => false,
        ],
        [
            'name' => $isRtl ? 'جراحة العظام والمفاصل' : 'Orthopedics Clinic',
            'code' => 'ORT-04',
            'occupied' => 19,
            'total' => 32,
            'load' => 59,
            'status_label' => $isRtl ? 'طاقة آمنة' : 'Optimal Capacity',
            'is_critical' => false,
        ],
    ];
@endphp

@section('page-title', $isRtl ? 'لوحة القيادة التشغيلية' : __('Hospital Manager Dashboard'))
@section('role-label', $isRtl ? 'مدير المستشفى' : __('Manager'))

@section('sidebar-links')
    {{-- 1. لوحة القيادة --}}
    <x-sidebar-link :href="Route::has('manager.dashboard') ? route('manager.dashboard') : '#'" :active="request()->routeIs('manager.dashboard')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                    <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'لوحة القيادة التشغيلية' : __('Dashboard') }}
    </x-sidebar-link>

    {{-- 2. أعباء الأقسام والأسرة --}}
    <x-sidebar-link :href="Route::has('manager.departments.index') ? route('manager.departments.index') : '#'" :active="request()->routeIs('manager.departments.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 21h18"/><path d="M5 21V7l8-4 8 4v14"/><path d="M9 21v-6h6v6"/>
                    <path d="M9 11h.01M15 11h.01M9 15h.01M15 15h.01"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'أعباء الأقسام والأسرة' : __('Departments Workload') }}
    </x-sidebar-link>

    {{-- 3. أوقات الانتظار والطوابير --}}
    <x-sidebar-link :href="Route::has('manager.waiting-time.index') ? route('manager.waiting-time.index') : '#'" :active="request()->routeIs('manager.waiting-time.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'مؤشرات أوقات الانتظار' : __('Waiting Times') }}
    </x-sidebar-link>

    {{-- 4. التقارير والمؤشرات --}}
    <x-sidebar-link :href="Route::has('manager.reports.index') ? route('manager.reports.index') : '#'" :active="request()->routeIs('manager.reports.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 3v18h18"/><path d="M18.7 8 13 13.7l-4-4L3 16"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'التقارير والمؤشرات' : __('Reports & Analytics') }}
    </x-sidebar-link>

    {{-- 5. كادر المستشفى والمناوبات --}}
    <x-sidebar-link :href="Route::has('manager.staff.index') ? route('manager.staff.index') : '#'" :active="request()->routeIs('manager.staff.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'دليل الكادر والمناوبات' : __('Staff & Duty') }}
    </x-sidebar-link>

    <div class="pt-3.5 mt-3.5 border-t border-white/10">
        <x-sidebar-link :href="Route::has('profile.edit') ? route('profile.edit') : '#'" :active="request()->routeIs('profile.edit')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c.36.24.7.53 1 .87"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'إعدادات الحساب' : __('Account Settings') }}
        </x-sidebar-link>
    </div>
@endsection

@section('content')

{{-- ══════════════════════════════════════════
     PRINT STYLESHEET (OFFICIAL MOH OPERATIONAL DOSSIER)
══════════════════════════════════════════ --}}
<style>
    @media print {
        body * { visibility: hidden; }
        #printableExecutiveSection, #printableExecutiveSection * { visibility: visible; }
        #printableExecutiveSection {
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

    {{-- HEADER SECTION (Clean Title with Teal Dot) --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-2 border-b border-slate-100 dark:border-slate-800">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] shadow-sm shadow-[#14AFC3]/40"></span>
                <h1 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                    {{ $isRtl ? 'لوحة القيادة التشغيلية' : 'Hospital Manager Dashboard' }}
                </h1>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-1">
                {{ $isRtl ? 'متابعة تدفق المرضى، أعباء الأقسام، متوسط فترات الانتظار، والمصادقة على طلبات الكادر الطبي.' : 'Monitor patient census, department capacity, clinic queues, and staff requests.' }}
            </p>
        </div>

        <div class="flex items-center gap-2">
            <button type="button" onclick="exportExecutiveReport()" class="px-3.5 h-9 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-xs font-bold text-slate-700 dark:text-slate-200 transition-all shadow-xs flex items-center gap-1.5 cursor-pointer hover:border-[#14AFC3]">
                <div class="w-4 h-4 rounded-md bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <span>{{ $isRtl ? 'تصدير التقرير التشغيلي' : 'Export Report' }}</span>
            </button>
            <div class="flex items-center gap-2 px-3 h-9 bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700 rounded-xl text-xs font-bold text-slate-700 dark:text-slate-200 shadow-xs">
                <svg width="14" height="14" class="text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                <span>{{ now()->translatedFormat('l، j F Y') }}</span>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         4 STATS KPI CARDS (CENTERED ICONS & TEXT)
         "الايقونه تكون في الوسط والنص اسفلها"
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5">
        
        {{-- Card 1: Active Inpatients (Teal Highlighted) --}}
        <x-stat-card
            :label="$isRtl ? 'المرضى والمراجعون اليوم' : __('Active Inpatients')"
            :value="number_format($stats['patients'] ?? 342)"
            :sublabel="$isRtl ? 'إشغال الأسرة: 84% · طاقة آمنة' : __('Occupancy: 84% · Safe Capacity')"
            :highlighted="true"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 2: Doctors on Duty --}}
        <a href="{{ Route::has('manager.staff.index') ? route('manager.staff.index') : '#' }}" class="block">
            <x-stat-card
                :label="$isRtl ? 'الأطباء على رأس العمل' : __('Doctors on Duty')"
                :value="($stats['doctors'] ?? 36) . ' / 48'"
                :sublabel="$isRtl ? 'عبر 8 أقسام سريرية' : __('Across 8 departments')"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>
        </a>

        {{-- Card 3: Avg Waiting Time --}}
        <a href="{{ Route::has('manager.waiting-time.index') ? route('manager.waiting-time.index') : '#' }}" class="block">
            <x-stat-card
                :label="$isRtl ? 'متوسط وقت الانتظار' : __('Avg. Waiting Time')"
                :value="($stats['avg_wait'] ?? 14) . ' ' . ($isRtl ? 'دقيقة' : 'min')"
                :sublabel="$isRtl ? 'المعدل المستهدف: < 20 د' : __('Target: < 20 min')"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 3"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>
        </a>

        {{-- Card 4: Operating Rooms Readiness --}}
        <a href="{{ Route::has('manager.departments.index') ? route('manager.departments.index') : '#' }}" class="block">
            <x-stat-card
                :label="$isRtl ? 'جاهزية غرف العمليات' : __('Operating Theaters')"
                value="4 / 5"
                :sublabel="$isRtl ? '12 عملية مجدولة اليوم' : __('12 surgeries booked')"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18m-9-4v8m-7 4h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>
        </a>

    </div>

    {{-- ══════════════════════════════════════════
         DEPARTMENT WORKLOAD + PENDING APPROVALS
         (MODERN HIGH-END TELEMETRY)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3.5 items-start">

        {{-- LEFT 2 COLUMNS: Department Workload & Bed Telemetry --}}
        <div class="lg:col-span-2 bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl p-4 sm:p-5 shadow-xs">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100 dark:border-slate-800">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] shrink-0 border border-[#14AFC3]/20">
                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <div>
                        <h2 class="font-black text-sm text-slate-900 dark:text-white leading-tight">{{ $isRtl ? 'أعباء الأقسام ونسب إشغال الأسرة الحالية' : 'Department Workload & Bed Census' }}</h2>
                        <p class="text-[11px] text-slate-400 font-medium">{{ $isRtl ? 'مؤشر الكثافة التشغيلية وسعة الاستيعاب اللحظية' : 'Live operational capacity & clinical telemetry' }}</p>
                    </div>
                </div>
                <a href="{{ Route::has('manager.departments.index') ? route('manager.departments.index') : '#' }}" class="px-2.5 py-1 rounded-lg text-xs font-bold text-[#14AFC3] hover:bg-[#E5FAFC] dark:hover:bg-[#14AFC3]/10 transition-colors flex items-center gap-1">
                    <span>{{ $isRtl ? 'إدارة السعة' : 'Manage' }}</span>
                    <span class="{{ $isRtl ? 'rotate-180' : '' }}">&rarr;</span>
                </a>
            </div>

            <div class="space-y-3.5">
                @foreach($departmentsData as $dept)
                    <div class="p-3 rounded-xl border border-slate-100 dark:border-slate-800/80 bg-slate-50/40 dark:bg-slate-800/20 hover:border-[#14AFC3]/30 transition-all">
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full {{ $dept['is_critical'] ? 'bg-amber-500 animate-pulse' : 'bg-[#14AFC3]' }}"></span>
                                <span class="font-bold text-xs text-slate-900 dark:text-white">{{ $dept['name'] }}</span>
                                <span class="text-[10px] font-mono font-bold text-slate-400 bg-white dark:bg-slate-800 px-1.5 py-0.5 rounded border border-slate-200/60 dark:border-slate-700/60">{{ $dept['code'] }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-[11px] font-mono text-slate-500 dark:text-slate-400 font-semibold" dir="ltr">
                                    {{ $dept['occupied'] }} / {{ $dept['total'] }} {{ $isRtl ? 'سرير' : 'beds' }}
                                </span>
                                <span class="text-[10.5px] font-black px-2 py-0.5 rounded-md font-mono border {{ $dept['is_critical'] ? 'bg-amber-50 text-amber-700 border-amber-200 dark:bg-amber-950/30 dark:text-amber-300 dark:border-amber-900/50' : 'bg-[#E5FAFC] text-[#0C6B78] border-[#14AFC3]/30 dark:bg-[#14AFC3]/15 dark:text-[#14AFC3]' }}" dir="ltr">
                                    {{ $dept['load'] }}%
                                </span>
                            </div>
                        </div>

                        {{-- Dual-tone telemetry bar --}}
                        <div class="w-full bg-slate-200/80 dark:bg-slate-800 rounded-full h-2 overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-700 {{ $dept['is_critical'] ? 'bg-gradient-to-r from-amber-500 to-rose-500' : 'bg-gradient-to-r from-[#14AFC3] to-[#0C6B78]' }}"
                                 style="width: {{ $dept['load'] }}%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex items-center justify-between pt-3 mt-3.5 border-t border-slate-100 dark:border-slate-800 text-[11px] font-bold text-slate-400">
                <span class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600"></span>
                    {{ $isRtl ? 'الحد الموصى به: 80% إشغال' : 'Target Threshold: 80% max occupancy' }}
                </span>
                <span class="text-slate-600 dark:text-slate-300 flex items-center gap-1.5 font-semibold">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    {{ $isRtl ? 'النظام السريري متزامن ومستقر' : 'Clinical Telemetry Synchronized' }}
                </span>
            </div>
        </div>

        {{-- RIGHT 1 COLUMN: Manager Approvals (Modern High-End Polish) --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl p-4 sm:p-5 shadow-xs">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100 dark:border-slate-800">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center shrink-0 border border-[#14AFC3]/20">
                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-black text-slate-900 dark:text-white leading-tight">
                            {{ $isRtl ? 'موافقات إدارية معلقة' : 'Pending Approvals' }}
                        </h2>
                        <p class="text-[10.5px] text-slate-400 mt-0.5">{{ $isRtl ? 'صلاحية البت المباشر لمدير المستشفى' : 'Manager Direct Actions' }}</p>
                    </div>
                </div>
                <span id="managerPendingBadge" class="px-2.5 py-1 rounded-full text-[10.5px] font-black bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/20 dark:text-[#14AFC3] border border-[#14AFC3]/30 shadow-2xs">
                    3 {{ $isRtl ? 'معلق' : 'Pending' }}
                </span>
            </div>

            <div class="space-y-3" id="managerApprovalsList">
                
                {{-- Item 1: Conference Leave --}}
                <div class="approval-card relative p-3 rounded-xl border border-slate-200/70 dark:border-slate-800 bg-white dark:bg-slate-800/40 hover:bg-slate-50/70 dark:hover:bg-slate-800/70 hover:border-[#14AFC3]/40 transition-all duration-200 shadow-2xs group border-s-3 border-s-[#14AFC3]">
                    <div class="flex items-start gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center shrink-0 border border-[#14AFC3]/20 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-1">
                                <h4 class="text-xs font-bold text-slate-900 dark:text-white truncate">
                                    {{ $isRtl ? 'د. مازن الحربي' : 'Dr. Mazen Al-Harbi' }}
                                    <span class="text-[10px] font-medium text-slate-400 dark:text-slate-500">({{ $isRtl ? 'استشاري قلب' : 'Cardiologist' }})</span>
                                </h4>
                                <span class="text-[10px] font-mono text-slate-400 shrink-0">{{ $isRtl ? 'اليوم' : 'Today' }}</span>
                            </div>
                            <p class="text-[11px] text-slate-600 dark:text-slate-300 mt-1 leading-snug">
                                {{ $isRtl ? 'طلب إجازة علمية لحضور المؤتمر الطبي العربي (3 أيام)' : 'Medical Conference Leave (3 days)' }}
                            </p>
                        </div>
                    </div>

                    {{-- Action Row --}}
                    <div class="flex items-center justify-between mt-2.5 pt-2 border-t border-slate-100 dark:border-slate-800/80">
                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[9.5px] font-bold bg-teal-50 text-teal-700 dark:bg-teal-950/40 dark:text-teal-300 border border-teal-200/50">
                            {{ $isRtl ? 'إجازة علمية' : 'Conference' }}
                        </span>
                        <div class="flex items-center gap-1.5">
                            <button type="button" onclick="processManagerDecision(this, 'reject', '{{ $isRtl ? 'إجازة د. مازن' : 'Dr. Mazen Leave' }}')" class="px-2.5 py-1 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 hover:bg-rose-50 hover:text-rose-600 dark:hover:bg-rose-950/30 hover:border-rose-200 text-[11px] font-bold transition-all cursor-pointer">
                                {{ $isRtl ? 'رفض' : 'Decline' }}
                            </button>
                            <button type="button" onclick="processManagerDecision(this, 'approve', '{{ $isRtl ? 'إجازة د. مازن' : 'Dr. Mazen Leave' }}')" class="px-3 py-1 rounded-lg bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#09525D] text-white text-[11px] font-bold transition-all shadow-xs cursor-pointer flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>{{ $isRtl ? 'اعتماد' : 'Approve' }}</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Item 2: Shift Swap --}}
                <div class="approval-card relative p-3 rounded-xl border border-slate-200/70 dark:border-slate-800 bg-white dark:bg-slate-800/40 hover:bg-slate-50/70 dark:hover:bg-slate-800/70 hover:border-indigo-400/40 transition-all duration-200 shadow-2xs group border-s-3 border-s-indigo-500">
                    <div class="flex items-start gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 flex items-center justify-center shrink-0 border border-indigo-200/60 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-1">
                                <h4 class="text-xs font-bold text-slate-900 dark:text-white truncate">
                                    {{ $isRtl ? 'د. لينا سعود ↔ د. طارق قحطان' : 'Dr. Lina Saud ↔ Dr. Tariq Qahtan' }}
                                </h4>
                                <span class="text-[10px] font-mono text-slate-400 shrink-0">11:30 {{ $isRtl ? 'ص' : 'AM' }}</span>
                            </div>
                            <p class="text-[11px] text-slate-600 dark:text-slate-300 mt-1 leading-snug">
                                {{ $isRtl ? 'تبديل وردية طوارئ ليلية ليوم الخميس القادم' : 'Emergency Night Shift Swap (Thursday)' }}
                            </p>
                        </div>
                    </div>

                    {{-- Action Row --}}
                    <div class="flex items-center justify-between mt-2.5 pt-2 border-t border-slate-100 dark:border-slate-800/80">
                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[9.5px] font-bold bg-indigo-50 text-indigo-700 dark:bg-indigo-950/40 dark:text-indigo-300 border border-indigo-200/50">
                            {{ $isRtl ? 'تبديل وردية' : 'Shift Swap' }}
                        </span>
                        <div class="flex items-center gap-1.5">
                            <button type="button" onclick="processManagerDecision(this, 'reject', '{{ $isRtl ? 'تبديل الوردية' : 'Shift Swap' }}')" class="px-2.5 py-1 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 hover:bg-rose-50 hover:text-rose-600 dark:hover:bg-rose-950/30 hover:border-rose-200 text-[11px] font-bold transition-all cursor-pointer">
                                {{ $isRtl ? 'رفض' : 'Decline' }}
                            </button>
                            <button type="button" onclick="processManagerDecision(this, 'approve', '{{ $isRtl ? 'تبديل الوردية' : 'Shift Swap' }}')" class="px-3 py-1 rounded-lg bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#09525D] text-white text-[11px] font-bold transition-all shadow-xs cursor-pointer flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>{{ $isRtl ? 'اعتماد' : 'Approve' }}</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Item 3: Bed Reallocation (Urgent) --}}
                <div class="approval-card relative p-3 rounded-xl border border-slate-200/70 dark:border-slate-800 bg-white dark:bg-slate-800/40 hover:bg-slate-50/70 dark:hover:bg-slate-800/70 hover:border-amber-400/40 transition-all duration-200 shadow-2xs group border-s-3 border-s-amber-500">
                    <div class="flex items-start gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-amber-50 dark:bg-amber-950/40 text-amber-600 dark:text-amber-400 flex items-center justify-center shrink-0 border border-amber-200/60 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-1">
                                <h4 class="text-xs font-bold text-slate-900 dark:text-white truncate">
                                    {{ $isRtl ? 'إعادة توجيه 4 أسرة عناية فائقة' : 'ICU Bed Reallocation (4 Beds)' }}
                                </h4>
                                <span class="text-[10px] font-mono text-slate-400 shrink-0">09:15 {{ $isRtl ? 'ص' : 'AM' }}</span>
                            </div>
                            <p class="text-[11px] text-slate-600 dark:text-slate-300 mt-1 leading-snug">
                                {{ $isRtl ? 'طلب من رئيس تمريض الطوارئ لاستيعاب حوادث الطريق السريع' : 'Requested by ER Charge Nurse for highway trauma intake' }}
                            </p>
                        </div>
                    </div>

                    {{-- Action Row --}}
                    <div class="flex items-center justify-between mt-2.5 pt-2 border-t border-slate-100 dark:border-slate-800/80">
                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[9.5px] font-bold bg-amber-50 text-amber-700 dark:bg-amber-950/40 dark:text-amber-300 border border-amber-200/50">
                            {{ $isRtl ? 'أولوية قصوى' : 'High Priority' }}
                        </span>
                        <div class="flex items-center gap-1.5">
                            <button type="button" onclick="processManagerDecision(this, 'reject', '{{ $isRtl ? 'إعادة توجيه الأسرة' : 'Bed Reallocation' }}')" class="px-2.5 py-1 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 hover:bg-rose-50 hover:text-rose-600 dark:hover:bg-rose-950/30 hover:border-rose-200 text-[11px] font-bold transition-all cursor-pointer">
                                {{ $isRtl ? 'رفض' : 'Decline' }}
                            </button>
                            <button type="button" onclick="processManagerDecision(this, 'approve', '{{ $isRtl ? 'إعادة توجيه الأسرة' : 'Bed Reallocation' }}')" class="px-3 py-1 rounded-lg bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#09525D] text-white text-[11px] font-bold transition-all shadow-xs cursor-pointer flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>{{ $isRtl ? 'اعتماد' : 'Approve' }}</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Empty State --}}
                <div id="managerAllCleared" class="hidden text-center py-6">
                    <div class="w-10 h-10 mx-auto rounded-full bg-[#E5FAFC] dark:bg-[#14AFC3]/20 text-[#14AFC3] flex items-center justify-center mb-2 border border-[#14AFC3]/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <p class="text-xs font-bold text-slate-800 dark:text-slate-200">{{ $isRtl ? 'تم البت في جميع الطلبات بنجاح' : 'All decisions processed' }}</p>
                    <p class="text-[10px] text-slate-400 mt-0.5">{{ $isRtl ? 'لا توجد طلبات معلقة بانتظار المدير حالياً.' : 'No pending items awaiting manager action.' }}</p>
                </div>

            </div>

            <div class="mt-3.5 pt-2.5 border-t border-slate-100 dark:border-slate-800 flex items-center justify-center gap-1.5 text-[10.5px] text-slate-400 font-medium">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                <span>{{ $isRtl ? 'قرارات المدير تنعكس فورياً في جداول المناوبات' : 'Decisions sync with Clinical Rosters' }}</span>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════
         STAFF DIRECTORY (Ultra Modern & Sleek Table)
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-3xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        
        {{-- Card Header & Filter Bar --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-5 py-3.5 border-b border-slate-100 dark:border-slate-800 bg-slate-50/30 dark:bg-slate-800/20">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] shrink-0 border border-[#14AFC3]/20">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h2 class="font-black text-sm text-slate-900 dark:text-white leading-tight">
                            {{ $isRtl ? 'دليل الكادر الطبي والمناوبين' : 'Hospital Staff Directory' }}
                        </h2>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 font-mono">
                            {{ count($visibleStaff) }} {{ $isRtl ? 'كوادر' : 'Staff' }}
                        </span>
                    </div>
                    <p class="text-[11px] text-slate-400 font-medium">{{ $isRtl ? 'عرض مباشر وتفصيلي للكوادر الطبية والإدارية على رأس العمل' : 'Doctors & Staff duty overview and clinical assignments' }}</p>
                </div>
            </div>
            
            {{-- Search & Filter Controls --}}
            <div class="flex items-center gap-2">
                {{-- Role Filter Tabs --}}
                <div class="hidden md:flex items-center bg-slate-100 dark:bg-slate-800 p-0.5 rounded-xl border border-slate-200/60 dark:border-slate-700/60 text-[11px] font-bold">
                    <button type="button" onclick="filterByRole('all')" class="staff-role-tab px-2.5 py-1 rounded-lg bg-white dark:bg-slate-700 text-slate-900 dark:text-white shadow-2xs transition-all cursor-pointer">
                        {{ $isRtl ? 'الكل' : 'All' }}
                    </button>
                    <button type="button" onclick="filterByRole('doctor')" class="staff-role-tab px-2.5 py-1 rounded-lg text-slate-500 hover:text-slate-900 dark:hover:text-white transition-all cursor-pointer">
                        {{ $isRtl ? 'الأطباء' : 'Doctors' }}
                    </button>
                    <button type="button" onclick="filterByRole('receptionist')" class="staff-role-tab px-2.5 py-1 rounded-lg text-slate-500 hover:text-slate-900 dark:hover:text-white transition-all cursor-pointer">
                        {{ $isRtl ? 'الاستقبال' : 'Front Desk' }}
                    </button>
                </div>

                {{-- Search Input with integrated icon --}}
                <div class="relative w-full sm:w-56">
                    <span class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none text-slate-400">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    <input type="text" id="managerStaffSearch" oninput="filterManagerStaff(this.value)"
                           placeholder="{{ $isRtl ? 'بحث بالاسم أو الرقم الوظيفي...' : 'Search staff or ID...' }}"
                           class="w-full h-8.5 {{ $isRtl ? 'pr-8 pl-3' : 'pl-8 pr-3' }} bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-xs font-medium text-slate-900 dark:text-white outline-none focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/15 transition-all placeholder:text-slate-400">
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[850px] border-collapse">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 text-slate-700 dark:text-slate-200 font-extrabold border-b border-slate-200/80 dark:border-slate-800 uppercase text-[11.5px] tracking-wider">
                        <th class="px-5 py-3 text-start">{{ $isRtl ? 'عضو الكادر والمسمى' : 'Staff Member & Role' }}</th>
                        <th class="px-4 py-3 text-start">{{ $isRtl ? 'الرقم الوظيفي' : 'ID' }}</th>
                        <th class="px-4 py-3 text-start">{{ $isRtl ? 'التصنيف' : 'Category' }}</th>
                        <th class="px-4 py-3 text-start">{{ $isRtl ? 'القسم السريري' : 'Department' }}</th>
                        <th class="px-4 py-3 text-start">{{ $isRtl ? 'حالة التواجد' : 'Status' }}</th>
                        <th class="px-5 py-3 text-start">{{ $isRtl ? 'تاريخ الانضمام' : 'Since' }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60" id="managerStaffTbody">
                    @foreach($visibleStaff as $member)
                        <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-800/40 transition-colors manager-staff-row group"
                            data-name="{{ strtolower($member->name) }}"
                            data-id="{{ strtolower($member->employee_id) }}"
                            data-role="{{ $member->role }}">
                            
                            {{-- Staff Avatar & Name --}}
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-8.5 h-8.5 rounded-xl {{ $member->role === 'doctor' ? 'bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/20 dark:text-[#14AFC3] border border-[#14AFC3]/30' : 'bg-purple-50 text-purple-700 dark:bg-purple-950/40 dark:text-purple-300 border border-purple-200/60' }} font-bold text-xs flex items-center justify-center shrink-0 shadow-2xs font-mono">
                                        {{ $member->initials }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900 dark:text-white group-hover:text-[#14AFC3] transition-colors text-xs flex items-center gap-1.5">
                                            <span>{{ $member->name }}</span>
                                        </div>
                                        <span class="text-[10.5px] text-slate-400 dark:text-slate-500 font-medium block">
                                            {{ $member->specialty }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            {{-- Employee ID --}}
                            <td class="px-4 py-3">
                                <span class="px-2 py-0.5 rounded-md font-mono text-[11px] font-bold text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 border border-slate-200/60 dark:border-slate-700/60 inline-block" dir="ltr">
                                    {{ $member->employee_id }}
                                </span>
                            </td>

                            {{-- Role Badge --}}
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-lg text-[10.5px] font-bold {{ $member->role === 'doctor' ? 'bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/15 dark:text-[#14AFC3] border border-[#14AFC3]/30' : 'bg-purple-50 text-purple-700 dark:bg-purple-900/20 dark:text-purple-300 border border-purple-200/60' }}">
                                    @if($member->role === 'doctor')
                                        <svg class="w-3 h-3 text-[#14AFC3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/></svg>
                                    @else
                                        <svg class="w-3 h-3 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    @endif
                                    <span>{{ $member->role === 'doctor' ? ($isRtl ? 'طبيب' : 'Doctor') : ($isRtl ? 'استقبال' : 'Front Desk') }}</span>
                                </span>
                            </td>

                            {{-- Department --}}
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600"></span>
                                    <span class="font-medium text-slate-700 dark:text-slate-300 text-xs">{{ $member->department }}</span>
                                </div>
                            </td>

                            {{-- Live Status --}}
                            <td class="px-4 py-3">
                                @if($member->status === 'active')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200/70 shadow-2xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        <span>{{ $isRtl ? 'على رأس العمل' : 'On Duty' }}</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-amber-50 text-amber-700 dark:bg-amber-950/40 dark:text-amber-300 border border-amber-200/70 shadow-2xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        <span>{{ $isRtl ? 'في إجازة' : 'On Leave' }}</span>
                                    </span>
                                @endif
                            </td>

                            {{-- Joined Date --}}
                            <td class="px-5 py-3 text-slate-500 dark:text-slate-400 font-mono text-[11px] font-medium">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>{{ $member->created_at }}</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════
     MODAL & PRINTABLE DOSSIER: EXECUTIVE REPORT
     (#executiveReportModal)
══════════════════════════════════════════ --}}
<div id="executiveReportModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-3 sm:p-4 text-center">
        <div class="w-full max-w-3xl transform overflow-hidden rounded-2xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-100 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200" id="printableExecutiveSection">
            
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
                        <div class="font-bold text-slate-900">REF: RSD-MGR-2026-YE</div>
                        <div class="text-slate-500 text-[10px]">{{ now()->format('Y-m-d H:i') }}</div>
                        <div class="text-emerald-700 text-[10px] font-bold">STATUS: OFFICIAL ACCREDITED</div>
                    </div>
                </div>

                {{-- Report Subject Banner --}}
                <div class="flex items-center justify-between bg-slate-50 p-3 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-[#E5FAFC] text-[#14AFC3] font-black flex items-center justify-center border border-[#14AFC3]/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base font-black text-slate-900 leading-snug">
                                {{ $isRtl ? 'التقرير التشغيلي المعتمد لإدارة المستشفى' : 'Hospital Executive Operational Dossier' }}
                            </h3>
                            <span class="text-[10px] font-bold text-teal-800 bg-[#E5FAFC] px-2 py-0.5 rounded font-mono border border-teal-100">
                                CENSUS & STAFF TELEMETRY
                            </span>
                        </div>
                    </div>
                    <button type="button" onclick="closeExecutiveReportModal()" class="text-slate-400 hover:text-slate-700 p-1.5 rounded-lg hover:bg-slate-200 transition-colors print:hidden">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                {{-- 4 Metric Boxes Grid --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 text-center">
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'المرضى والمراجعون' : 'Patients' }}</span>
                        <span class="text-base sm:text-lg font-black text-[#14AFC3] font-mono block mt-0.5">342</span>
                        <span class="text-[9.5px] text-emerald-600 font-bold block mt-0.5">84% {{ $isRtl ? 'إشغال الأسرة' : 'Occupancy' }}</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'الأطباء المناوبون' : 'Doctors on Duty' }}</span>
                        <span class="text-base sm:text-lg font-black text-slate-800 font-mono block mt-0.5">36 / 48</span>
                        <span class="text-[9.5px] text-slate-500 font-medium block mt-0.5">{{ $isRtl ? 'عبر 8 أقسام' : '8 departments' }}</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'متوسط الانتظار' : 'Avg. Wait' }}</span>
                        <span class="text-base sm:text-lg font-black text-sky-600 font-mono block mt-0.5">14 {{ $isRtl ? 'دقيقة' : 'min' }}</span>
                        <span class="text-[9.5px] text-emerald-600 font-bold block mt-0.5">{{ $isRtl ? 'ضمن النطاق المستهدف' : 'On Target' }}</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'جاهزية العمليات' : 'OR Readiness' }}</span>
                        <span class="text-base sm:text-lg font-black text-emerald-600 font-mono block mt-0.5">4 / 5</span>
                        <span class="text-[9.5px] text-slate-500 font-medium block mt-0.5">{{ $isRtl ? '12 عملية مجدولة' : '12 booked' }}</span>
                    </div>
                </div>

                {{-- Department Breakdown Table --}}
                <div class="border border-slate-200/80 dark:border-slate-700 rounded-3xl overflow-hidden shadow-sm">
                    <div class="bg-slate-100 px-3.5 py-1.5 border-b border-slate-200 flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-800">{{ $isRtl ? 'تفاصيل السعة السريرية والكثافة الإكلينيكية للأقسام' : 'Department Clinical Breakdown' }}</span>
                        <span class="text-[10px] font-mono text-slate-500">AUDIT: MOH-OPS-2026</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs text-start">
                            <thead class="bg-slate-50 text-slate-600 font-bold border-b border-slate-200 text-[10.5px]">
                                <tr>
                                    <th class="py-2 px-3 text-start">{{ $isRtl ? 'القسم السريري' : 'Department' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'الأسرة المشغولة' : 'Occupied Beds' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'إجمالي السعة' : 'Total Beds' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'نسبة الإشغال' : 'Occupancy Rate' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'حالة الأمان' : 'Status' }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @foreach($departmentsData as $d)
                                    <tr>
                                        <td class="py-2 px-3 font-semibold text-slate-900">{{ $d['name'] }}</td>
                                        <td class="py-2 px-3 text-center font-mono" dir="ltr">{{ $d['occupied'] }}</td>
                                        <td class="py-2 px-3 text-center font-mono" dir="ltr">{{ $d['total'] }}</td>
                                        <td class="py-2 px-3 text-center font-mono font-bold text-slate-900" dir="ltr">{{ $d['load'] }}%</td>
                                        <td class="py-2 px-3 text-center">
                                            <span class="text-[10px] font-bold {{ $d['load'] > 85 ? 'text-amber-700 bg-amber-50' : 'text-emerald-700 bg-emerald-50' }} px-2 py-0.5 rounded border border-slate-200">
                                                {{ $d['load'] > 85 ? ($isRtl ? 'مكثف / مراقب' : 'Critical Watch') : ($isRtl ? 'طاقة آمنة' : 'Safe Capacity') }}
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
                        <span class="text-[10px] font-bold text-slate-400 block mb-1">{{ $isRtl ? 'إعداد ومطابقة الإحصاء' : 'Prepared By' }}</span>
                        <span class="font-extrabold text-slate-800 text-[11px] block">{{ $isRtl ? 'د. خالد المنصوري' : 'Dr. Khaled Al-Mansouri' }}</span>
                        <span class="text-[10px] text-slate-500 block">{{ $isRtl ? 'مدير الإحصاء والمعلومات الصحية' : 'Director of Health Information' }}</span>
                    </div>

                    <div>
                        {{-- Circular Stamp --}}
                        <div class="w-20 h-20 rounded-full border-2 border-dashed border-[#14AFC3] mx-auto flex flex-col items-center justify-center p-1 text-[7.5px] font-black text-[#0C6B78] rotate-[-5deg] bg-[#E5FAFC]/40 shadow-xs">
                            <span class="text-[7px] text-slate-600">{{ $isRtl ? 'وزارة الصحة العامة' : 'Ministry of Health' }}</span>
                            <span class="text-[8px] font-extrabold text-[#14AFC3]">{{ $isRtl ? 'مستشفى الرشيد' : 'Al-Rasheed Hospital' }}</span>
                            <span class="text-[6.5px] text-slate-700">{{ $isRtl ? 'صنعاء - اليمن' : 'Sana\'a - Yemen' }}</span>
                            <span class="text-[6px] font-mono text-slate-400 mt-0.5">MOH-OPS-2026</span>
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
                        <button type="button" onclick="closeExecutiveReportModal()" class="px-3.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-xs transition-colors cursor-pointer">
                            {{ $isRtl ? 'إغلاق' : 'Close' }}
                        </button>
                        <button type="button" onclick="downloadManagerReportCSV()" class="px-3.5 py-1.5 bg-slate-800 hover:bg-slate-900 text-white font-bold rounded-xl text-xs transition-all flex items-center gap-1 shadow-xs cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span>{{ $isRtl ? 'تحميل كـ CSV' : 'Export CSV' }}</span>
                        </button>
                        <button type="button" onclick="printExecutiveReport()" class="px-4 py-1.5 bg-[#14AFC3] hover:bg-[#0E94A6] text-white font-bold rounded-xl text-xs shadow-sm transition-all flex items-center gap-1.5 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                            <span>{{ $isRtl ? 'طباعة التقرير المعتمد' : 'Print Dossier' }}</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- Unified Manager Toast --}}
<div id="managerToast" class="fixed bottom-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 hidden items-center gap-2.5 px-4 py-2.5 bg-slate-900/95 dark:bg-slate-800 text-white rounded-xl shadow-xl border border-slate-700/60 text-xs font-bold transition-all duration-300 animate-in slide-in-from-bottom-3 print:hidden">
    <div class="w-4 h-4 rounded-full bg-[#14AFC3] flex items-center justify-center flex-shrink-0 text-white">
        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
    </div>
    <span id="managerToastMessage"></span>
</div>

@push('scripts')
<script>
    let pendingCount = 3;
    let currentRoleFilter = 'all';

    // 1. Process Manager Decision (Approve / Decline)
    function processManagerDecision(btn, decision, title) {
        const card = btn.closest('.approval-card');
        if (!card) return;

        card.style.opacity = '0.25';
        card.style.transform = 'scale(0.98)';
        card.style.pointerEvents = 'none';

        setTimeout(() => {
            card.remove();
            pendingCount--;

            const badge = document.getElementById('managerPendingBadge');
            if (pendingCount > 0) {
                badge.textContent = `${pendingCount} {{ $isRtl ? 'معلق' : 'Pending' }}`;
            } else {
                badge.textContent = `0 {{ $isRtl ? 'مكتمل' : 'Cleared' }}`;
                const emptyState = document.getElementById('managerAllCleared');
                if (emptyState) emptyState.classList.remove('hidden');
            }

            const msg = (decision === 'approve')
                ? `{{ $isRtl ? 'تم اعتماد' : 'Approved' }} ${title} {{ $isRtl ? 'بنجاح!' : 'successfully!' }}`
                : `{{ $isRtl ? 'تم رفض' : 'Declined' }} ${title}.`;

            showManagerToast(msg);
        }, 180);
    }

    // 2. Executive Report Modal Controls
    function exportExecutiveReport() {
        document.getElementById('executiveReportModal').classList.remove('hidden');
    }

    function closeExecutiveReportModal() {
        document.getElementById('executiveReportModal').classList.add('hidden');
    }

    function printExecutiveReport() {
        window.print();
    }

    // 3. Functional CSV Export (UTF-8 BOM for Arabic support)
    function downloadManagerReportCSV() {
        let csvContent = '\uFEFF';
        csvContent += 'الجمهورية اليمنية - وزارة الصحة العامة والسكان - أمانة العاصمة صنعاء\r\n';
        csvContent += 'مستشفى الرشيد التخصصي - التقرير التشغيلي المعتمد لإدارة المستشفى\r\n';
        csvContent += 'المرجع الرسمي: RSD-MGR-2026-YE\r\n';
        csvContent += `تاريخ التصدير: ${new Date().toISOString()}\r\n\r\n`;

        csvContent += '--- المؤشرات التشغيلية الرئيسية ---\r\n';
        csvContent += 'المؤشر,القيمة,الحالة\r\n';
        csvContent += 'المرضى والمراجعون اليوم,342,إشغال الأسرة: 84%\r\n';
        csvContent += 'الأطباء على رأس العمل,36 / 48,عبر 8 أقسام سريرية\r\n';
        csvContent += 'متوسط وقت الانتظار,14 دقيقة,المعدل المستهدف أقل من 20 دقيقة\r\n';
        csvContent += 'جاهزية غرف العمليات,4 / 5,12 عملية مجدولة اليوم\r\n\r\n';

        csvContent += '--- تفاصيل السعة السريرية للأقسام ---\r\n';
        csvContent += 'القسم السريري,الأسرة المشغولة,إجمالي السعة,نسبة الإشغال,حالة الأمان\r\n';
        csvContent += 'قسم الطوارئ والحوادث,18,20,90%,مكثف / مراقب\r\n';
        csvContent += 'العناية المركزة (ICU),14,16,88%,مكثف / مراقب\r\n';
        csvContent += 'جراحة القلب والقسطرة,22,30,73%,طاقة آمنة\r\n';
        csvContent += 'جراحة العظام والمفاصل,19,32,59%,طاقة آمنة\r\n';

        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', `RSD_Manager_Executive_Report_${new Date().toISOString().slice(0,10)}.csv`);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showManagerToast("{{ $isRtl ? 'تم تصدير وتحميل ملف التقرير التشغيلي (CSV) بنجاح.' : 'Executive Report CSV downloaded successfully.' }}");
    }

    // 4. Staff Directory Filtering (Text Search + Role Tabs)
    function filterManagerStaff(q) {
        applyStaffFilters();
    }

    function filterByRole(role) {
        currentRoleFilter = role;
        
        // Update tab styles
        document.querySelectorAll('.staff-role-tab').forEach(tab => {
            tab.classList.remove('bg-white', 'dark:bg-slate-700', 'text-slate-900', 'dark:text-white', 'shadow-2xs');
            tab.classList.add('text-slate-500');
        });

        if (event && event.currentTarget) {
            event.currentTarget.classList.add('bg-white', 'dark:bg-slate-700', 'text-slate-900', 'dark:text-white', 'shadow-2xs');
            event.currentTarget.classList.remove('text-slate-500');
        }

        applyStaffFilters();
    }

    function applyStaffFilters() {
        const query = (document.getElementById('managerStaffSearch')?.value || '').toLowerCase().trim();

        document.querySelectorAll('.manager-staff-row').forEach(row => {
            const name = row.dataset.name || '';
            const id = row.dataset.id || '';
            const role = row.dataset.role || '';

            const matchesQuery = (!query || name.includes(query) || id.includes(query));
            const matchesRole = (currentRoleFilter === 'all' || role === currentRoleFilter);

            row.style.display = (matchesQuery && matchesRole) ? '' : 'none';
        });
    }

    // 5. Toast Notification System
    function showManagerToast(msg) {
        const toast = document.getElementById('managerToast');
        const text = document.getElementById('managerToastMessage');
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
