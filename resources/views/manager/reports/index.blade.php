@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    // قاموس ترجمة إنجليزي ذكي
    $reportDictionary = [
        'REP-CEN-01' => [
            'name_en' => 'Daily Bed Census & Inpatient Occupancy',
            'desc_en' => 'Detailed breakdown of wing beds, inpatient admissions/discharges, and ICU/ER occupancy rates.',
            'freq_en' => 'Daily (06:00 AM)',
            'last_en' => 'Today 06:00 AM',
            'highlight_en' => '83.7% Occupancy · 318 Occupied Beds',
        ],
        'REP-WAT-02' => [
            'name_en' => 'Outpatient Queue & Wait Time Analysis',
            'desc_en' => 'Audit of average consultation durations, peak hours, and clinic compliance against wait-time KPIs.',
            'freq_en' => 'Weekly',
            'last_en' => '2 days ago',
            'highlight_en' => '14.2 min Avg Wait · 91.4% Target Met',
        ],
        'REP-OR-03' => [
            'name_en' => 'Operating Theatres Utilization & Turnaround',
            'desc_en' => 'Surgical theatre utilization rates, turnover sterilization intervals, and emergency surgery ratios.',
            'freq_en' => 'Weekly',
            'last_en' => '3 days ago',
            'highlight_en' => '8 Active ORs · 87.3% Utilization',
        ],
        'REP-ER-04' => [
            'name_en' => 'Emergency Flow & Triage Disposition Report',
            'desc_en' => 'Triage durations, laboratory turnaround velocity, and ER admission/discharge disposition metrics.',
            'freq_en' => 'Daily',
            'last_en' => 'Today 08:30 AM',
            'highlight_en' => '12.8m Door-to-Doc · 14 Critical Cases',
        ],
        'REP-LOS-05' => [
            'name_en' => 'Average Length of Stay (ALOS) & Discharge Report',
            'desc_en' => 'Analysis of prolonged stays (>7 days), early morning discharge acceleration, and bed capacity optimization.',
            'freq_en' => 'Monthly',
            'last_en' => '1st of this month',
            'highlight_en' => '3.4 Days ALOS · 78.6% Morning Discharge',
        ],
        'REP-STF-06' => [
            'name_en' => 'Physician & Nursing Shift Coverage Audit',
            'desc_en' => 'Actual duty hours, on-call standby readiness audit, and staff distribution across high-acuity wards.',
            'freq_en' => 'Monthly',
            'last_en' => '28th of last month',
            'highlight_en' => '98.4% Coverage · 48 Duty Physicians',
        ],
    ];

    // قاموس الألوان والتصنيفات التشغيلية المتناسق مع الواجهات السابقة
    $categoriesConfig = [
        'capacity' => [
            'name_ar' => 'السعة والأسرة',
            'name_en' => 'Capacity & Beds',
            'badge' => 'bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/15 dark:text-[#14AFC3] border-[#14AFC3]/30',
            'dot' => 'bg-[#14AFC3]',
            'icon_bg' => 'bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3]',
            'highlight_box' => 'bg-[#E5FAFC]/40 dark:bg-[#14AFC3]/10 border-[#14AFC3]/20 text-[#0C6B78] dark:text-[#14AFC3]',
        ],
        'clinics' => [
            'name_ar' => 'العيادات والانتظار',
            'name_en' => 'Outpatient Clinics',
            'badge' => 'bg-indigo-50 text-indigo-700 dark:bg-indigo-950/40 dark:text-indigo-300 border-indigo-200 dark:border-indigo-900/50',
            'dot' => 'bg-indigo-500',
            'icon_bg' => 'bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400',
            'highlight_box' => 'bg-indigo-50/50 dark:bg-indigo-950/20 border-indigo-200/60 dark:border-indigo-900/40 text-indigo-800 dark:text-indigo-300',
        ],
        'surgery' => [
            'name_ar' => 'العمليات والجراحة',
            'name_en' => 'Operating Theatres',
            'badge' => 'bg-purple-50 text-purple-700 dark:bg-purple-950/40 dark:text-purple-300 border-purple-200 dark:border-purple-900/50',
            'dot' => 'bg-purple-500',
            'icon_bg' => 'bg-purple-50 dark:bg-purple-950/40 text-purple-600 dark:text-purple-400',
            'highlight_box' => 'bg-purple-50/50 dark:bg-purple-950/20 border-purple-200/60 dark:border-purple-900/40 text-purple-800 dark:text-purple-300',
        ],
        'emergency' => [
            'name_ar' => 'الطوارئ والفرز',
            'name_en' => 'Emergency Triage',
            'badge' => 'bg-rose-50 text-rose-700 dark:bg-rose-950/40 dark:text-rose-300 border-rose-200 dark:border-rose-900/50',
            'dot' => 'bg-rose-500',
            'icon_bg' => 'bg-rose-50 dark:bg-rose-950/40 text-rose-600 dark:text-rose-400',
            'highlight_box' => 'bg-rose-50/50 dark:bg-rose-950/20 border-rose-200/60 dark:border-rose-900/40 text-rose-800 dark:text-rose-300',
        ],
        'quality' => [
            'name_ar' => 'الجودة ومتوسط الإقامة',
            'name_en' => 'ALOS & Quality',
            'badge' => 'bg-amber-50 text-amber-700 dark:bg-amber-950/40 dark:text-amber-300 border-amber-200 dark:border-amber-900/50',
            'dot' => 'bg-amber-500',
            'icon_bg' => 'bg-amber-50 dark:bg-amber-950/40 text-amber-600 dark:text-amber-400',
            'highlight_box' => 'bg-amber-50/50 dark:bg-amber-950/20 border-amber-200/60 dark:border-amber-900/40 text-amber-800 dark:text-amber-300',
        ],
        'staff' => [
            'name_ar' => 'الكادر والمناوبات',
            'name_en' => 'Staff & Rosters',
            'badge' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border-emerald-200 dark:border-emerald-900/50',
            'dot' => 'bg-emerald-500',
            'icon_bg' => 'bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400',
            'highlight_box' => 'bg-emerald-50/50 dark:bg-emerald-950/20 border-emerald-200/60 dark:border-emerald-900/40 text-emerald-800 dark:text-emerald-300',
        ],
    ];

    // حزم التقارير التشغيلية المعتمدة
    $reports = $reports ?? collect([
        (object)[
            'id' => 1,
            'name' => 'تقرير الإشغال والتعداد السريري اليومي',
            'name_en' => 'Daily Bed Census & Inpatient Occupancy',
            'code' => 'REP-CEN-01',
            'category' => 'capacity',
            'frequency' => 'daily',
            'frequency_label' => 'يومي (06:00 ص)',
            'description' => 'بيان تفصيلي بأسرة الأجنحة، حالات الدخول والخروج، ونسب إشغال العناية الفائقة والطوارئ.',
            'last_generated' => 'اليوم 06:00 ص',
            'metric_highlight' => '83.7% نسبة الإشغال · 318 سرير مشغول',
            'formats' => ['PDF', 'Excel'],
        ],
        (object)[
            'id' => 2,
            'name' => 'تقرير أزمنة الانتظار وتدفق مراجعي العيادات',
            'name_en' => 'Outpatient Queue & Wait Time Analysis',
            'code' => 'REP-WAT-02',
            'category' => 'clinics',
            'frequency' => 'weekly',
            'frequency_label' => 'أسبوعي',
            'description' => 'رصد دقيق لمتوسط زمن الكشف، ساعات الذروة، ونسب التزام كل عيادة بالمعيار الزمني المستهدف.',
            'last_generated' => 'منذ يومين',
            'metric_highlight' => '14.2 دقيقة متوسط الانتظار · امتثال 91.4%',
            'formats' => ['PDF', 'Excel'],
        ],
        (object)[
            'id' => 3,
            'name' => 'تقرير كفاءة دوران غرف العمليات الجراحية',
            'name_en' => 'Operating Theatres Utilization & Turnaround',
            'code' => 'REP-OR-03',
            'category' => 'surgery',
            'frequency' => 'weekly',
            'frequency_label' => 'أسبوعي',
            'description' => 'معدل إشغال غرف العمليات، أوقات التجهيز والتعقيم بين العمليات، ونسب العمليات الطارئة والمجدولة.',
            'last_generated' => 'منذ 3 أيام',
            'metric_highlight' => '8 غرف نشطة · إشغال 87.3% · دوران 22 د',
            'formats' => ['PDF', 'Excel'],
        ],
        (object)[
            'id' => 4,
            'name' => 'تقرير زمن تدفق وفرز حالات الطوارئ (Door-to-Doc)',
            'name_en' => 'Emergency Flow & Triage Disposition Report',
            'code' => 'REP-ER-04',
            'category' => 'emergency',
            'frequency' => 'daily',
            'frequency_label' => 'يومي',
            'description' => 'أزمنة الفرز، سرعة إجراء الفحوصات المخبرية، ومعدل اتخاذ قرار التنويم أو التخريج الآمن.',
            'last_generated' => 'اليوم 08:30 ص',
            'metric_highlight' => '12.8 دقيقة فرز · 14 حالة حرجة مسجلة',
            'formats' => ['PDF', 'Excel'],
        ],
        (object)[
            'id' => 5,
            'name' => 'تقرير متوسط مدة الإقامة وخطط التفريغ (ALOS)',
            'name_en' => 'Average Length of Stay (ALOS) & Discharge Report',
            'code' => 'REP-LOS-05',
            'category' => 'quality',
            'frequency' => 'monthly',
            'frequency_label' => 'شهري',
            'description' => 'تحليل حالات الإقامة الطويلة، تسريع مسارات التخريج الصباحي، وتفادي الهدر السريري.',
            'last_generated' => '01 من هذا الشهر',
            'metric_highlight' => '3.4 أيام متوسط إقامة · تخريج صباحي 78.6%',
            'formats' => ['PDF', 'Excel'],
        ],
        (object)[
            'id' => 6,
            'name' => 'تقرير تغطية مناوبات الكادر الطبي والتمريضي',
            'name_en' => 'Physician & Nursing Shift Coverage Audit',
            'code' => 'REP-STF-06',
            'category' => 'staff',
            'frequency' => 'monthly',
            'frequency_label' => 'شهري',
            'description' => 'ساعات التغطية الفعلية، جاهزية أطباء الاحتياط، وتوزيع القوى العاملة حسب كثافة الحالات.',
            'last_generated' => '28 من الشهر الماضي',
            'metric_highlight' => '98.4% تغطية مناوبات · 48 طبيب مناوب',
            'formats' => ['PDF', 'Excel'],
        ],
    ]);
@endphp

@section('page-title', $isRtl ? 'التقارير والمؤشرات التشغيلية' : 'Operational Reports & Indicators')
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

    <x-sidebar-link :href="Route::has('manager.waiting-time.index') ? route('manager.waiting-time.index') : '#'" :active="request()->routeIs('manager.waiting-time.*')">
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

    <x-sidebar-link :href="Route::has('manager.reports.index') ? route('manager.reports.index') : '#'" :active="true">
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
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
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
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c.36.24.7.53 1 .87"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'إعدادات الحساب' : 'Settings' }}
        </x-sidebar-link>
    </div>
@endsection

@section('content')

{{-- ══════════════════════════════════════════
     STYLESHEET: معايير الطباعة الرسمية للجمهورية اليمنية
     (حل مشكلة الفراغ العلوي وضمان ملء الصفحة A4 بدقة)
══════════════════════════════════════════ --}}
<style>
    @media print {
        @page {
            size: A4 portrait;
            margin: 10mm 12mm 10mm 12mm;
        }

        *, *::before, *::after {
            box-shadow: none !important;
            text-shadow: none !important;
        }

        html, body {
            margin: 0 !important;
            padding: 0 !important;
            background: #ffffff !important;
            color: #0f172a !important;
            height: auto !important;
            min-height: 0 !important;
            overflow: visible !important;
            font-size: 11pt !important;
        }

        /* إخفاء كافة عناصر الصفحة الأساسية */
        body * {
            visibility: hidden !important;
        }

        /* إلغاء تموضع النافذة المنبثقة من المركز وإلغاء Flex حتى لا تخلق فراغاً علوياً */
        body.printing-single #individualReportModal,
        body.printing-master #masterBundleModal {
            position: static !important;
            display: block !important;
            inset: auto !important;
            width: 100% !important;
            height: auto !important;
            min-height: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
            background: transparent !important;
            overflow: visible !important;
            border: none !important;
            box-shadow: none !important;
        }

        body.printing-single #individualReportModal > div,
        body.printing-master #masterBundleModal > div,
        body.printing-master #masterBundleModal > div > div {
            position: static !important;
            display: block !important;
            max-width: 100% !important;
            width: 100% !important;
            height: auto !important;
            max-height: none !important;
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
            box-shadow: none !important;
            background: #ffffff !important;
            overflow: visible !important;
        }

        /* إظهار فقط المستند المطلوب طباعته */
        body.printing-single #printableIndividualReportSection,
        body.printing-single #printableIndividualReportSection * {
            visibility: visible !important;
        }

        body.printing-master #printableMasterBundleSection,
        body.printing-master #printableMasterBundleSection * {
            visibility: visible !important;
        }

        body.printing-single #printableIndividualReportSection,
        body.printing-master #printableMasterBundleSection {
            position: static !important;
            display: block !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            background: #ffffff !important;
            color: #0f172a !important;
            border: none !important;
            box-shadow: none !important;
            overflow: visible !important;
        }

        /* منع انكسار صفوف الجداول أو الأختام في منتصف الصفحة */
        tr, .avoid-break-inside {
            page-break-inside: avoid !important;
            break-inside: avoid !important;
        }

        table {
            width: 100% !important;
            border-collapse: collapse !important;
            page-break-inside: auto;
        }

        th, td {
            border-color: #cbd5e1 !important;
        }

        /* عناصر التحكم والشاشات المخفية بالطباعة */
        .print-hidden, nav, aside, header, footer, #actionToast, .no-print, [class*="print:hidden"] {
            display: none !important;
        }
    }
</style>

<div class="space-y-4 font-sans text-slate-800 dark:text-slate-100 print:hidden" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

    {{-- ══════════════════════════════════════════
         1. ترويسة الصفحة والإجراءات التنفيذية
    ══════════════════════════════════════════ --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-2 border-b border-slate-200/80 dark:border-slate-800">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                <h1 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                    {{ $isRtl ? 'التقارير والمؤشرات التشغيلية للمستشفى' : 'Operational Reports & Indicators' }}
                </h1>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-1">
                {{ $isRtl ? 'تحليلات الإشغال، معدل دوران الأسرة، ومؤشرات الجودة والأداء السريري المعتمدة.' : 'Executive inpatient analytics, bed turnover velocity, and clinical KPI audits.' }}
            </p>
        </div>

        <div class="flex items-center gap-2">
            <button type="button" onclick="openScheduleModal()" class="px-3.5 h-9 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-750 text-xs font-bold text-slate-700 dark:text-slate-200 transition-all shadow-xs flex items-center gap-1.5 cursor-pointer">
                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5l3 3"/></svg>
                <span>{{ $isRtl ? 'جدولة تقرير دوري' : 'Schedule Report' }}</span>
            </button>

            <button type="button" onclick="exportMasterPackage()" class="px-4 h-9 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:opacity-95 text-white text-xs font-bold rounded-xl transition-all shadow-xs flex items-center gap-1.5 cursor-pointer">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"/>
                </svg>
                <span>{{ $isRtl ? 'تصدير الحزمة الإدارية' : 'Export Executive Bundle' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         2. بطاقات قياس الأداء الرباعية الموحدة (CENTERED KPI STAT CARDS)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5">
        
        <x-stat-card
            :label="$isRtl ? 'إجمالي الخدمات السريرية (هذا الشهر)' : __('Total Inpatient Services (MTD)')"
            value="1,428"
            :sublabel="$isRtl ? 'نسبة التعافي: 96.2% · نمو شهري +8.4%' : __('96.2% Discharge Rate · +8.4% Growth')"
            :highlighted="true"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path stroke-linecap="round" stroke-linejoin="round" d="M14 2v6h6M16 13H8M16 17H8M10 9H8"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            :label="$isRtl ? 'متوسط مدة الإقامة (ALOS)' : __('Avg Length of Stay (ALOS)')"
            :value="'3.4 ' . ($isRtl ? 'أيام' : 'days')"
            :sublabel="$isRtl ? 'المعيار الموصى به: 3.0 - 4.5 أيام' : __('Target Benchmark: 3.0 - 4.5 days')"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 3"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            :label="$isRtl ? 'معدل دوران الأسرة الشهري' : __('Monthly Bed Turnover')"
            value="4.2x"
            :sublabel="$isRtl ? 'كفاءة 88% · الأعلى: الجراحة والطوارئ' : __('88% Efficiency · Highest in Surgery & ER')"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 0 0 4.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 0 1-15.357-2m15.357 2H15"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            :label="$isRtl ? 'زمن الوصول حتى الطبيب (Door-to-Doc)' : __('Door-to-Doctor Velocity')"
            :value="'14.2 ' . ($isRtl ? 'دقيقة' : 'min')"
            :sublabel="$isRtl ? 'نسبة الالتزام بالبروتوكول: 91.4%' : __('91.4% Protocol Compliance (-2.8m)')"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

    </div>

    {{-- ══════════════════════════════════════════
         3. مخطط تحليلي بياني مريح ومتناسق بصرياً
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl p-4 sm:p-5 shadow-2xs">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pb-3 border-b border-slate-100 dark:border-slate-800">
            <div>
                <h2 class="text-sm font-bold text-slate-900 dark:text-white leading-tight">
                    {{ $isRtl ? 'مسار استقرار السعة الاستيعابية ومعدل الإشغال الشهري' : 'Hospital Capacity & Occupancy Trajectory (Past 6 Months)' }}
                </h2>
                <p class="text-[11px] text-slate-500 dark:text-slate-400 font-medium mt-0.5">
                    {{ $isRtl ? 'مقارنة نسبة إشغال الأسرة مع متوسط مدة الإقامة (ALOS)' : 'Live bed occupancy rate vs average length of stay benchmark' }}
                </p>
            </div>

            <div class="flex items-center gap-4 text-xs font-semibold">
                <span class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'معدل إشغال الأسرة (%)' : 'Bed Occupancy %' }}</span>
                </span>
                <span class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-700 dark:bg-slate-300"></span>
                    <span>{{ $isRtl ? 'متوسط الإقامة (أيام)' : 'ALOS (Days)' }}</span>
                </span>
            </div>
        </div>

        <div class="mt-4 grid grid-cols-6 gap-2.5 sm:gap-4 text-center">
            @php
                $monthsData = [
                    ['m' => 'يناير', 'm_en' => 'Jan', 'occ' => 78, 'los' => 3.8],
                    ['m' => 'فبراير', 'm_en' => 'Feb', 'occ' => 81, 'los' => 3.6],
                    ['m' => 'مارس', 'm_en' => 'Mar', 'occ' => 84, 'los' => 3.5],
                    ['m' => 'أبريل', 'm_en' => 'Apr', 'occ' => 82, 'los' => 3.4],
                    ['m' => 'مايو', 'm_en' => 'May', 'occ' => 86, 'los' => 3.5],
                    ['m' => 'يونيو', 'm_en' => 'Jun', 'occ' => 83, 'los' => 3.4],
                ];
            @endphp
            @foreach($monthsData as $item)
            <div class="flex flex-col items-center">
                <div class="h-28 w-full flex items-end justify-center gap-1.5 bg-slate-50 dark:bg-slate-800/40 rounded-xl p-2 border border-slate-100 dark:border-slate-800/80">
                    <div class="w-3.5 sm:w-5 bg-[#14AFC3] rounded-t-sm transition-all shadow-xs"
                         style="height: {{ $item['occ'] }}%"
                         title="{{ $item['occ'] }}% Occupancy"></div>
                    <div class="w-3.5 sm:w-5 bg-slate-600 dark:bg-slate-400 rounded-t-sm transition-all shadow-xs"
                         style="height: {{ $item['los'] * 20 }}%"
                         title="{{ $item['los'] }} Days ALOS"></div>
                </div>
                <span class="mt-2 font-semibold text-slate-700 dark:text-slate-300 text-xs">{{ $isRtl ? $item['m'] : $item['m_en'] }}</span>
                <span class="text-[10px] font-mono text-slate-500 font-bold" dir="ltr">{{ $item['occ'] }}%</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         4. شريط الفلترة والبحث الموحد
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl p-2.5 shadow-2xs flex flex-col md:flex-row items-center justify-between gap-2.5">
        
        <div class="flex items-center gap-1.5 overflow-x-auto w-full md:w-auto pb-1 md:pb-0 text-xs">
            <button type="button" onclick="filterReportCategory('all', this)" class="rep-filter-btn px-3 py-1.5 rounded-xl font-bold bg-[#14AFC3] text-white shadow-2xs transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'جميع التقارير (6)' : 'All Reports (6)' }}
            </button>
            <button type="button" onclick="filterReportCategory('capacity', this)" class="rep-filter-btn px-3 py-1.5 rounded-xl font-medium bg-slate-50 hover:bg-slate-100 dark:bg-slate-800 dark:hover:bg-slate-750 text-slate-700 dark:text-slate-300 border border-slate-200/70 dark:border-slate-700 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'السعة والأسرة' : 'Capacity' }}
            </button>
            <button type="button" onclick="filterReportCategory('clinics', this)" class="rep-filter-btn px-3 py-1.5 rounded-xl font-medium bg-slate-50 hover:bg-slate-100 dark:bg-slate-800 dark:hover:bg-slate-750 text-slate-700 dark:text-slate-300 border border-slate-200/70 dark:border-slate-700 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'العيادات والانتظار' : 'Outpatient' }}
            </button>
            <button type="button" onclick="filterReportCategory('surgery', this)" class="rep-filter-btn px-3 py-1.5 rounded-xl font-medium bg-slate-50 hover:bg-slate-100 dark:bg-slate-800 dark:hover:bg-slate-750 text-slate-700 dark:text-slate-300 border border-slate-200/70 dark:border-slate-700 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'العمليات والطوارئ' : 'Surgery & ER' }}
            </button>
            <button type="button" onclick="filterReportCategory('staff', this)" class="rep-filter-btn px-3 py-1.5 rounded-xl font-medium bg-slate-50 hover:bg-slate-100 dark:bg-slate-800 dark:hover:bg-slate-750 text-slate-700 dark:text-slate-300 border border-slate-200/70 dark:border-slate-700 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'الكادر والمناوبات' : 'Staff Rosters' }}
            </button>
        </div>

        <div class="relative w-full md:w-64 shrink-0">
            <span class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none text-slate-400">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </span>
            <input type="text" id="reportSearchInput" onkeyup="searchReports()"
                   placeholder="{{ $isRtl ? 'بحث في التقارير...' : 'Search reports...' }}"
                   class="w-full h-8.5 {{ $isRtl ? 'pr-8 pl-3' : 'pl-8 pr-3' }} bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-xs font-medium text-slate-900 dark:text-white outline-none focus:border-[#14AFC3] transition-all placeholder:text-slate-400">
        </div>

    </div>

    {{-- ══════════════════════════════════════════
         5. شبكة كروت التقارير المدعومة بنظام ألوان الواجهات السابقة
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="reportsGridContainer">
        @foreach($reports as $rep)
        @php
            $codeKey = $rep->code ?? '';
            $dict = $reportDictionary[$codeKey] ?? [];
            $catKey = $rep->category ?? 'capacity';
            $catStyle = $categoriesConfig[$catKey] ?? $categoriesConfig['capacity'];
            
            $repName = $isRtl ? ($rep->name ?? '') : ($rep->name_en ?? $dict['name_en'] ?? $rep->name ?? '');
            $repDesc = $isRtl ? ($rep->description ?? '') : ($rep->description_en ?? $dict['desc_en'] ?? $rep->description ?? '');
            $repFreq = $isRtl ? ($rep->frequency_label ?? '') : ($rep->frequency_label_en ?? $dict['freq_en'] ?? $rep->frequency_label ?? 'Periodic');
            $repLast = $isRtl ? ($rep->last_generated ?? '') : ($rep->last_generated_en ?? $dict['last_en'] ?? $rep->last_generated ?? 'Recently');
            $repHighlight = $isRtl ? ($rep->metric_highlight ?? '') : ($dict['highlight_en'] ?? $rep->metric_highlight ?? '');
        @endphp
        <div class="report-card bg-white dark:bg-slate-900 border border-slate-200/90 dark:border-slate-800 rounded-2xl p-5 shadow-2xs hover:border-[#14AFC3]/60 hover:shadow-md transition-all duration-200 flex flex-col justify-between group relative overflow-hidden"
             data-code="{{ $codeKey }}"
             data-name="{{ strtolower($repName) }}"
             data-category="{{ $catKey }}">

            {{-- Subtle category top accent line --}}
            <div class="absolute top-0 inset-x-0 h-1 {{ $catKey === 'capacity' ? 'bg-[#14AFC3]' : ($catKey === 'clinics' ? 'bg-indigo-500' : ($catKey === 'surgery' ? 'bg-purple-500' : ($catKey === 'emergency' ? 'bg-rose-500' : ($catKey === 'quality' ? 'bg-amber-500' : 'bg-emerald-500')))) }}"></div>

            <div>
                {{-- Top Meta Row: Code, Category Pill & Frequency --}}
                <div class="flex items-center justify-between gap-2 pb-3 border-b border-slate-100 dark:border-slate-800">
                    <div class="flex items-center gap-1.5">
                        <span class="px-2 py-0.5 rounded-md text-[11px] font-bold font-mono bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200/70 dark:border-slate-700">
                            {{ $codeKey }}
                        </span>

                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[10.5px] font-bold border {{ $catStyle['badge'] }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $catStyle['dot'] }}"></span>
                            <span>{{ $isRtl ? $catStyle['name_ar'] : $catStyle['name_en'] }}</span>
                        </span>
                    </div>

                    <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-800 px-2 py-0.5 rounded-md border border-slate-200/60 dark:border-slate-700 flex items-center gap-1">
                        <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5l3 3"/></svg>
                        <span>{{ $repFreq }}</span>
                    </span>
                </div>

                {{-- Title & Description --}}
                <h3 class="text-sm font-bold text-slate-900 dark:text-white mt-3.5 leading-snug group-hover:text-[#14AFC3] transition-colors">
                    {{ $repName }}
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1.5 leading-relaxed line-clamp-2">
                    {{ $repDesc }}
                </p>

                {{-- Live Metric Highlight Block with category-tinted background --}}
                @if($repHighlight)
                <div class="mt-3.5 px-3 py-2 rounded-xl border flex items-center justify-between text-xs transition-colors {{ $catStyle['highlight_box'] }}">
                    <span class="text-[10.5px] font-bold opacity-80">{{ $isRtl ? 'المؤشر التشغيلي المباشر:' : 'Live Metric:' }}</span>
                    <span class="font-bold font-mono text-[11px]">{{ $repHighlight }}</span>
                </div>
                @endif

                {{-- Bottom Meta Row: Last Run & Formats --}}
                <div class="mt-3.5 pt-3 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between text-[11px] text-slate-400">
                    <span class="truncate">
                        <span>{{ $isRtl ? 'آخر توليد:' : 'Last run:' }}</span>
                        <strong class="text-slate-600 dark:text-slate-300 font-medium">{{ $repLast }}</strong>
                    </span>

                    <div class="flex items-center gap-1 font-mono text-[10px] shrink-0">
                        <span class="px-1.5 py-0.5 rounded bg-rose-50 text-rose-700 dark:bg-rose-950/40 dark:text-rose-300 border border-rose-200/70 font-bold">PDF</span>
                        <span class="px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200/70 font-bold">Excel</span>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-3.5 pt-3 border-t border-slate-100 dark:border-slate-800 grid grid-cols-2 gap-2">
                <button type="button" onclick="openIndividualReport('{{ $codeKey }}', false)" class="h-9 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-750 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 text-xs font-bold rounded-xl transition-all flex items-center justify-center gap-1.5 cursor-pointer shadow-2xs">
                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    <span>{{ $isRtl ? 'معاينة' : 'Preview' }}</span>
                </button>

                <button type="button" onclick="downloadIndividualReportPDF('{{ $codeKey }}')" class="h-9 bg-[#14AFC3] hover:bg-[#0E94A6] text-white text-xs font-bold rounded-xl transition-all flex items-center justify-center gap-1.5 cursor-pointer shadow-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    <span>{{ $isRtl ? 'تحميل PDF' : 'Download PDF' }}</span>
                </button>
            </div>

        </div>
        @endforeach
    </div>

</div>

{{-- ══════════════════════════════════════════
     6. نافذة Modal: معاينة وتصدير PDF المعتمد
     (بتصميم عريض واسع ومساحات وافرة للجداول)
══════════════════════════════════════════ --}}
<div id="individualReportModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-3 sm:p-5 md:p-6 text-start overflow-y-auto" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="relative w-full max-w-4xl lg:max-w-5xl bg-white dark:bg-slate-900 rounded-3xl shadow-2xl border border-slate-200 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200 max-h-[92vh] flex flex-col my-auto">
        
        {{-- Modal Top Navigation Bar --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 dark:border-slate-800 print:hidden bg-slate-50 dark:bg-slate-850 rounded-t-3xl">
            <div class="flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                <div>
                    <h3 id="singleModalHeading" class="text-sm sm:text-base font-bold text-slate-900 dark:text-white leading-tight">
                        {{ $isRtl ? 'المستند التنفيذي المعتمد' : 'Official Report Dossier' }}
                    </h3>
                    <p id="singleModalSubheading" class="text-[11px] text-slate-500 font-mono mt-0.5">
                        REP-CEN-01 · OFFICIAL MEDICAL DOCUMENT
                    </p>
                </div>
            </div>

            <button type="button" onclick="closeIndividualReportModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 p-2 rounded-xl hover:bg-slate-200/60 dark:hover:bg-slate-700 transition-colors cursor-pointer">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Printable Report Area --}}
        <div class="overflow-y-auto p-6 sm:p-8 md:p-10 flex-1 space-y-5" id="printableIndividualReportSection">
            
            {{-- Official Yemeni MoH Letterhead Header --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pb-4 border-b-2 border-slate-300 dark:border-slate-700 text-center sm:text-start">
                <div>
                    <span class="text-xs font-bold text-slate-800 dark:text-slate-200 block">{{ $isRtl ? 'الجمهورية اليمنية' : 'Republic of Yemen' }}</span>
                    <span class="text-xs font-bold text-slate-600 dark:text-slate-400 block">{{ $isRtl ? 'وزارة الصحة العامة والسكان' : 'Ministry of Public Health & Population' }}</span>
                    <h2 class="text-base sm:text-lg font-black text-slate-900 dark:text-white mt-1 tracking-tight">
                        {{ $isRtl ? 'مستشفى الرشيد التخصصي - صنعاء' : 'Al-Rasheed Specialized Hospital - Sana\'a' }}
                    </h2>
                </div>

                {{-- Official Emblem Crest --}}
                <div class="w-14 h-14 rounded-2xl bg-[#E5FAFC] border-2 border-[#14AFC3]/40 flex items-center justify-center text-[#14AFC3] shadow-xs shrink-0">
                    <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                    </svg>
                </div>

                <div class="text-center sm:text-end text-xs font-mono">
                    <div class="font-bold text-slate-900 dark:text-white" id="singleReportRef">REF: RSD-REP-2026-YE</div>
                    <div class="text-slate-500 text-[11px] mt-0.5" id="singleReportDate">{{ now()->format('Y-m-d H:i') }}</div>
                    <div class="inline-flex items-center gap-1 mt-1 px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200 text-[10px] font-bold">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <span>STATUS: ACCREDITED</span>
                    </div>
                </div>
            </div>

            {{-- Subject Banner with Accent Styling --}}
            <div class="bg-gradient-to-r from-slate-50 to-[#E5FAFC]/40 dark:from-slate-800/80 dark:to-slate-800/40 p-4 sm:p-5 rounded-2xl border border-slate-200 dark:border-slate-700 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-s-4 border-s-[#14AFC3]">
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white" id="singleReportTitle">
                        {{ $isRtl ? 'تقرير الإشغال والتعداد السريري اليومي' : 'Daily Bed Census & Inpatient Occupancy' }}
                    </h3>
                    <p class="text-xs text-slate-600 dark:text-slate-300 mt-1 leading-relaxed" id="singleReportDesc">
                        {{ $isRtl ? 'بيان تفصيلي بأسرة الأجنحة، حالات الدخول والخروج، ونسب إشغال العناية الفائقة والطوارئ.' : 'Detailed breakdown of wing beds, inpatient admissions/discharges, and ICU/ER occupancy rates.' }}
                    </p>
                </div>
                <span class="text-xs font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-white dark:bg-slate-800 px-3 py-1.5 rounded-xl font-mono border border-slate-200 dark:border-slate-700 shrink-0 shadow-2xs" id="singleReportCodeBadge">
                    REP-CEN-01
                </span>
            </div>

            {{-- 4 Metric KPI Stat Boxes with generous padding --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 text-center" id="singleReportKpiGrid">
                <!-- Dynamically injected -->
            </div>

            {{-- Spacious Rich Data Table --}}
            <div class="border border-slate-200/80 dark:border-slate-700 rounded-3xl overflow-hidden shadow-sm">
                <div class="bg-slate-100/90 dark:bg-slate-800 px-4 py-3 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between text-xs font-bold text-slate-800 dark:text-slate-200">
                    <span id="singleReportTableTitle" class="text-xs sm:text-sm font-black">{{ $isRtl ? 'جدول البيانات التشغيلية التفصيلية' : 'Detailed Operational Data Ledger' }}</span>
                    <span class="text-[10.5px] font-mono px-2 py-0.5 rounded bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-slate-500">MOH-AUDIT-2026</span>
                </div>
                <div class="overflow-x-auto" id="singleReportTableWrapper">
                    <!-- Dynamically injected table -->
                </div>
            </div>

            {{-- Executive Sign-off, Stamp and Official Seals --}}
            <div class="pt-6 border-t-2 border-slate-200 dark:border-slate-700 grid grid-cols-1 sm:grid-cols-3 gap-6 items-center text-center text-xs avoid-break-inside">
                <div>
                    <span class="text-[10.5px] font-bold text-slate-400 block mb-1.5">{{ $isRtl ? 'إعداد ومطابقة الإحصاء' : 'Prepared By' }}</span>
                    <span class="font-bold text-slate-900 dark:text-white text-xs sm:text-sm block">{{ $isRtl ? 'د. خالد المنصوري' : 'Dr. Khaled Al-Mansouri' }}</span>
                    <span class="text-[10.5px] text-slate-500 block mt-0.5">{{ $isRtl ? 'مدير الإحصاء والمعلومات الصحية' : 'Director of Health Information' }}</span>
                </div>

                <div>
                    <div class="w-22 h-22 rounded-full border-2 border-dashed border-[#14AFC3] mx-auto flex flex-col items-center justify-center p-1 text-[8px] font-bold text-slate-700 dark:text-slate-300 bg-[#E5FAFC]/30 shadow-2xs">
                        <span>{{ $isRtl ? 'وزارة الصحة العامة' : 'Ministry of Health' }}</span>
                        <span class="text-[9px] font-extrabold text-[#0C6B78] dark:text-[#14AFC3] my-0.5">{{ $isRtl ? 'مستشفى الرشيد' : 'Al-Rasheed' }}</span>
                        <span>{{ $isRtl ? 'صنعاء - اليمن' : 'Sana\'a - Yemen' }}</span>
                        <span class="text-[6.5px] font-mono text-slate-400 mt-0.5">MOH-EXEC-2026</span>
                    </div>
                </div>

                <div>
                    <span class="text-[10.5px] font-bold text-slate-400 block mb-1.5">{{ $isRtl ? 'المصادقة والاعتماد الإداري' : 'Executive Approval' }}</span>
                    <span class="font-bold text-slate-900 dark:text-white text-xs sm:text-sm block">{{ $isRtl ? 'د. فيصل العريقي' : 'Dr. Faisal Al-Oraiqi' }}</span>
                    <span class="text-[10.5px] text-slate-500 block mt-0.5">{{ $isRtl ? 'المدير العام التنفيذي للمستشفى' : 'Chief Executive Officer' }}</span>
                </div>
            </div>

        </div>

        {{-- Modal Bottom Action Footer Bar --}}
        <div class="p-4 sm:p-5 border-t border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-850 rounded-b-3xl flex flex-wrap items-center justify-between gap-3 print:hidden">
            <span class="text-xs text-slate-500 font-medium">
                {{ $isRtl ? 'المستند معتمد وجاهز للتصدير كـ PDF عبر أمر الطباعة الرسمي بدقة A4 كاملة.' : 'Accredited document exported via official print system.' }}
            </span>

            <div class="flex items-center gap-2.5">
                <button type="button" onclick="closeIndividualReportModal()" class="px-4 py-2 bg-white dark:bg-slate-800 hover:bg-slate-100 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 text-xs font-bold rounded-xl transition-colors cursor-pointer">
                    {{ $isRtl ? 'إغلاق' : 'Close' }}
                </button>

                <button type="button" onclick="downloadCurrentReportCSV()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 dark:bg-slate-800 dark:hover:bg-slate-750 dark:text-slate-200 border border-slate-200 dark:border-slate-700 text-xs font-bold rounded-xl transition-all shadow-2xs flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    <span>{{ $isRtl ? 'تصدير Excel' : 'Export Excel' }}</span>
                </button>

                <button type="button" onclick="triggerReportPrint()" class="px-5 py-2 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:opacity-95 text-white text-xs font-bold rounded-xl transition-all shadow-xs flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    <span>{{ $isRtl ? 'طباعة / حفظ PDF' : 'Print / Save PDF' }}</span>
                </button>
            </div>
        </div>

    </div>
</div>

{{-- ══════════════════════════════════════════
     7. نافذة Modal: جدولة إرسال التقارير الدورية
     (#scheduleModal)
══════════════════════════════════════════ --}}
<div id="scheduleModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-3 sm:p-4 text-start" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-2xl max-w-lg w-full p-5 sm:p-6 shadow-2xl border border-slate-200 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
            <div>
                <h3 class="text-sm font-bold text-slate-900 dark:text-white">{{ $isRtl ? 'جدولة تقرير تشغيلي دوري' : 'Schedule Automated Report' }}</h3>
                <p class="text-[11px] text-slate-400 font-medium">{{ $isRtl ? 'إرسال آلي لصندوق البريد التنفيذي' : 'Auto-dispatch to executive emails' }}</p>
            </div>
            <button type="button" onclick="closeScheduleModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer">
                <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>

        <form onsubmit="submitSchedule(event)" class="mt-4 space-y-4 text-xs">
            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'حزمة التقرير المطلوبة' : 'Report Type' }}</label>
                <select class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-800 dark:text-slate-100 font-bold focus:border-[#14AFC3] focus:outline-none">
                    <option>{{ $isRtl ? 'تقرير الإشغال والتعداد السريري اليومي' : 'Daily Bed Census & Inpatient Occupancy' }}</option>
                    <option>{{ $isRtl ? 'تقرير اختناقات وأوقات الانتظار بالعيادات' : 'Outpatient Queue & Wait Time Analysis' }}</option>
                    <option>{{ $isRtl ? 'تقرير دوران غرف العمليات الجراحية' : 'Operating Theatres Utilization' }}</option>
                    <option>{{ $isRtl ? 'تقرير متوسط مدة الإقامة (ALOS)' : 'ALOS & Discharge Planning Report' }}</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'دورية الإرسال' : 'Frequency' }}</label>
                    <select class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-800 dark:text-slate-100 font-bold focus:border-[#14AFC3] focus:outline-none">
                        <option>{{ $isRtl ? 'يومياً (06:00 صباحاً)' : 'Daily (06:00 AM)' }}</option>
                        <option>{{ $isRtl ? 'أسبوعياً (كل أحد)' : 'Weekly (Sundays)' }}</option>
                        <option>{{ $isRtl ? 'شهرياً (أول الشهر)' : 'Monthly (1st)' }}</option>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'صيغة الملف المرفق' : 'Format' }}</label>
                    <select class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-800 dark:text-slate-100 font-bold focus:border-[#14AFC3] focus:outline-none">
                        <option>PDF ({{ $isRtl ? 'مستند تنفيذي معتمد' : 'Executive Document' }})</option>
                        <option>Excel ({{ $isRtl ? 'بيانات قابلة للتحليل' : 'Raw Analytical Data' }})</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'عناوين المستلمين' : 'Recipient Emails' }}</label>
                <input type="text" value="{{ Auth::user()->email ?? 'manager@alrasheed.ye' }}, medical.director@alrasheed.ye" class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-800 dark:text-slate-100 font-mono focus:border-[#14AFC3] focus:outline-none">
            </div>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="closeScheduleModal()" class="px-4 py-2 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 font-bold transition-colors cursor-pointer">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="submit" class="px-4 py-2 bg-[#14AFC3] hover:bg-[#0E94A6] text-white rounded-xl font-bold transition-all shadow-xs cursor-pointer">
                    {{ $isRtl ? 'حفظ وتفعيل الجدولة' : 'Save & Activate' }}
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ══════════════════════════════════════════
     8. نافذة Modal: تصدير الحزمة الإدارية الشاملة
     (#masterBundleModal)
══════════════════════════════════════════ --}}
<div id="masterBundleModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-3 sm:p-5 md:p-6 text-center">
        <div class="w-full max-w-4xl lg:max-w-5xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200" id="printableMasterBundleSection">
            
            <div class="p-6 sm:p-8 md:p-10 space-y-5">
                
                {{-- Official Yemeni MoH Header --}}
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pb-4 border-b-2 border-slate-300 dark:border-slate-700 text-center sm:text-start">
                    <div>
                        <span class="text-xs font-bold text-slate-800 dark:text-slate-200 block">{{ $isRtl ? 'الجمهورية اليمنية' : 'Republic of Yemen' }}</span>
                        <span class="text-xs font-bold text-slate-600 dark:text-slate-400 block">{{ $isRtl ? 'وزارة الصحة العامة والسكان' : 'Ministry of Public Health & Population' }}</span>
                        <h2 class="text-base sm:text-lg font-black text-slate-900 dark:text-white mt-1 tracking-tight">
                            {{ $isRtl ? 'مستشفى الرشيد التخصصي - صنعاء' : 'Al-Rasheed Specialized Hospital - Sana\'a' }}
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-[#E5FAFC] border-2 border-[#14AFC3]/40 flex items-center justify-center text-[#14AFC3] shadow-xs shrink-0">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                        </svg>
                    </div>

                    <div class="text-center sm:text-end text-xs font-mono">
                        <div class="font-bold text-slate-900 dark:text-white">REF: RSD-EXEC-2026-YE</div>
                        <div class="text-slate-500 text-[11px] mt-0.5">{{ now()->format('Y-m-d H:i') }}</div>
                        <div class="inline-flex items-center gap-1 mt-1 px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200 text-[10px] font-bold">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            <span>STATUS: EXECUTIVE ACCREDITATION</span>
                        </div>
                    </div>
                </div>

                {{-- Subject Banner --}}
                <div class="flex items-center justify-between bg-gradient-to-r from-slate-50 to-[#E5FAFC]/40 dark:from-slate-800/80 dark:to-slate-800/40 p-4 rounded-2xl border border-slate-200 dark:border-slate-700 border-s-4 border-s-[#14AFC3]">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white leading-snug">
                            {{ $isRtl ? 'الحزمة التنفيذية الشاملة لمؤشرات الأداء السريري والتشغيلي' : 'Comprehensive Executive Bundle for Clinical & Operational Performance' }}
                        </h3>
                        <span class="text-[11px] font-bold text-[#0C6B78] dark:text-[#14AFC3] font-mono mt-0.5 block">
                            MASTER CLINICAL DOSSIER · ALL 6 SECTORS ACCREDITED
                        </span>
                    </div>
                    <button type="button" onclick="closeMasterPackageModal()" class="text-slate-400 hover:text-slate-700 p-2 rounded-xl hover:bg-slate-200 transition-colors print:hidden cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                {{-- 4 Metric Boxes Grid --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 text-center">
                    <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700">
                        <span class="text-[10.5px] font-bold text-slate-500 block">{{ $isRtl ? 'الخدمات السريرية' : 'Inpatient Services' }}</span>
                        <span class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white font-mono block mt-1">1,428</span>
                        <span class="text-[10px] text-slate-500 font-medium block mt-1">96.2% {{ $isRtl ? 'نسبة التعافي' : 'Discharged' }}</span>
                    </div>
                    <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700">
                        <span class="text-[10.5px] font-bold text-slate-500 block">{{ $isRtl ? 'متوسط مدة الإقامة' : 'Avg LOS' }}</span>
                        <span class="text-xl sm:text-2xl font-black text-[#14AFC3] font-mono block mt-1">3.4 {{ $isRtl ? 'أيام' : 'days' }}</span>
                        <span class="text-[10px] text-slate-500 font-medium block mt-1">{{ $isRtl ? 'معيار مثالي' : 'Optimal' }}</span>
                    </div>
                    <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700">
                        <span class="text-[10.5px] font-bold text-slate-500 block">{{ $isRtl ? 'معدل دوران الأسرة' : 'Bed Turnover' }}</span>
                        <span class="text-xl sm:text-2xl font-black text-slate-800 dark:text-slate-100 font-mono block mt-1">4.2x</span>
                        <span class="text-[10px] text-slate-500 font-medium block mt-1">{{ $isRtl ? 'كفاءة 88%' : '88% Efficiency' }}</span>
                    </div>
                    <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700">
                        <span class="text-[10.5px] font-bold text-slate-500 block">{{ $isRtl ? 'سرعة الوصول للطبيب' : 'Door-to-Doc' }}</span>
                        <span class="text-xl sm:text-2xl font-black text-slate-800 dark:text-slate-100 font-mono block mt-1">14.2 د</span>
                        <span class="text-[10px] text-slate-500 font-medium block mt-1">{{ $isRtl ? '91.4% امتثال' : '91.4% Compliant' }}</span>
                    </div>
                </div>

                {{-- Reports Breakdown Table with spacious padding --}}
                <div class="border border-slate-200 dark:border-slate-700 rounded-2xl overflow-hidden shadow-2xs">
                    <div class="bg-slate-100/90 dark:bg-slate-800 px-4 py-3 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
                        <span class="text-xs sm:text-sm font-bold text-slate-800 dark:text-slate-200">{{ $isRtl ? 'بيان حزم التقارير التشغيلية المعتمدة بالحزمة الإدارية' : 'Executive Report Manifest & Accreditation Audit' }}</span>
                        <span class="text-[10.5px] font-mono px-2 py-0.5 rounded bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-slate-500">MOH-BUNDLE-2026</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs text-start">
                            <thead class="bg-slate-50/90 dark:bg-slate-800/70 text-slate-700 dark:text-slate-200 font-extrabold border-b border-slate-200/80 dark:border-slate-700 text-[11.5px] uppercase tracking-wider">
                                <tr>
                                    <th class="py-3 px-4 text-start">{{ $isRtl ? 'اسم التقرير المعتمد' : 'Report Title' }}</th>
                                    <th class="py-3 px-4 text-center">{{ $isRtl ? 'الكود' : 'Code' }}</th>
                                    <th class="py-3 px-4 text-center">{{ $isRtl ? 'التصنيف' : 'Category' }}</th>
                                    <th class="py-3 px-4 text-center">{{ $isRtl ? 'الدورية' : 'Frequency' }}</th>
                                    <th class="py-3 px-4 text-center">{{ $isRtl ? 'الحالة' : 'Status' }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300">
                                @foreach($reports as $r)
                                    <tr class="even:bg-slate-50/60 dark:even:bg-slate-800/30">
                                        <td class="py-3 px-4 font-semibold text-slate-900 dark:text-white">{{ $isRtl ? $r->name : $r->name_en }}</td>
                                        <td class="py-3 px-4 text-center font-mono text-[11px] text-slate-500 font-bold">{{ $r->code }}</td>
                                        <td class="py-3 px-4 text-center">
                                            @php
                                                $rcat = $categoriesConfig[$r->category] ?? $categoriesConfig['capacity'];
                                            @endphp
                                            <span class="px-2 py-0.5 rounded text-[10px] font-bold border {{ $rcat['badge'] }}">
                                                {{ $isRtl ? $rcat['name_ar'] : $rcat['name_en'] }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 text-center font-mono">{{ $r->frequency }}</td>
                                        <td class="py-3 px-4 text-center">
                                            <span class="text-[10px] font-bold text-emerald-700 dark:text-emerald-300 bg-emerald-50 dark:bg-emerald-950/40 px-2.5 py-1 rounded-full border border-emerald-200">
                                                {{ $isRtl ? 'معتمد رسمياً' : 'Verified' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Sign-off and Seals --}}
                <div class="pt-5 border-t-2 border-slate-200 dark:border-slate-700 grid grid-cols-1 sm:grid-cols-3 gap-6 items-center text-center text-xs avoid-break-inside">
                    <div>
                        <span class="text-[10.5px] font-bold text-slate-400 block mb-1.5">{{ $isRtl ? 'إعداد ومطابقة الإحصاء' : 'Prepared By' }}</span>
                        <span class="font-bold text-slate-900 dark:text-white text-xs sm:text-sm block">{{ $isRtl ? 'د. خالد المنصوري' : 'Dr. Khaled Al-Mansouri' }}</span>
                        <span class="text-[10.5px] text-slate-500 block mt-0.5">{{ $isRtl ? 'مدير الإحصاء والمعلومات الصحية' : 'Director of Health Information' }}</span>
                    </div>

                    <div>
                        <div class="w-22 h-22 rounded-full border-2 border-dashed border-[#14AFC3] mx-auto flex flex-col items-center justify-center p-1 text-[8px] font-bold text-slate-700 dark:text-slate-300 bg-[#E5FAFC]/30 shadow-2xs">
                            <span>{{ $isRtl ? 'وزارة الصحة العامة' : 'Ministry of Health' }}</span>
                            <span class="text-[9px] font-extrabold text-[#0C6B78] dark:text-[#14AFC3] my-0.5">{{ $isRtl ? 'مستشفى الرشيد' : 'Al-Rasheed' }}</span>
                            <span>{{ $isRtl ? 'صنعاء - اليمن' : 'Sana\'a - Yemen' }}</span>
                            <span class="text-[6.5px] font-mono text-slate-400 mt-0.5">MOH-EXEC-2026</span>
                        </div>
                    </div>

                    <div>
                        <span class="text-[10.5px] font-bold text-slate-400 block mb-1.5">{{ $isRtl ? 'المصادقة والاعتماد الإداري' : 'Executive Approval' }}</span>
                        <span class="font-bold text-slate-900 dark:text-white text-xs sm:text-sm block">{{ $isRtl ? 'د. فيصل العريقي' : 'Dr. Faisal Al-Oraiqi' }}</span>
                        <span class="text-[10.5px] text-slate-500 block mt-0.5">{{ $isRtl ? 'المدير العام التنفيذي للمستشفى' : 'Chief Executive Officer' }}</span>
                    </div>
                </div>

                {{-- Modal Action Buttons --}}
                <div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-800 print:hidden">
                    <span class="text-[10.5px] font-mono text-slate-400">ENCRYPTION: MOH-YEMEN-RSA-4096-VALID</span>
                    
                    <div class="flex items-center gap-2">
                        <button type="button" onclick="closeMasterPackageModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 dark:bg-slate-800 dark:text-slate-200 font-bold rounded-xl text-xs transition-colors cursor-pointer">
                            {{ $isRtl ? 'إغلاق' : 'Close' }}
                        </button>
                        <button type="button" onclick="downloadMasterBundleCSV()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 dark:bg-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700 font-bold rounded-xl text-xs transition-all flex items-center gap-1 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span>{{ $isRtl ? 'تصدير CSV' : 'Export CSV' }}</span>
                        </button>
                        <button type="button" onclick="printMasterPackage()" class="px-5 py-2 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:opacity-95 text-white font-bold rounded-xl text-xs shadow-xs transition-all flex items-center gap-1.5 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                            <span>{{ $isRtl ? 'طباعة الحزمة' : 'Print Bundle' }}</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- Unified Toast Notification --}}
<div id="actionToast" class="fixed bottom-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 hidden items-center gap-2.5 px-4 py-2.5 bg-slate-900 text-white rounded-xl shadow-lg border border-slate-700 text-xs font-medium transition-all duration-200 animate-in slide-in-from-bottom-2 print:hidden">
    <div class="w-4 h-4 rounded-full bg-[#14AFC3] flex items-center justify-center flex-shrink-0 text-white">
        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
    </div>
    <span id="toastMessage"></span>
</div>

@push('scripts')
<script>
    const isRtl = {{ $isRtl ? 'true' : 'false' }};
    let currentActiveReportCode = 'REP-CEN-01';

    // ════════════════════════════════════════════════════════════
    // قاعدة بيانات التقارير التشغيلية المعتمدة
    // ════════════════════════════════════════════════════════════
    const reportsDatabase = {
        'REP-CEN-01': {
            code: 'REP-CEN-01',
            title: isRtl ? 'تقرير الإشغال والتعداد السريري اليومي' : 'Daily Bed Census & Inpatient Occupancy',
            desc: isRtl ? 'بيان تفصيلي بأسرة الأجنحة، حالات الدخول والخروج، ونسب إشغال العناية الفائقة والطوارئ.' : 'Detailed breakdown of wing beds, inpatient admissions/discharges, and ICU/ER occupancy rates.',
            kpis: [
                { label: isRtl ? 'الأسرة المرخصة' : 'Licensed Beds', val: '380', sub: isRtl ? 'طاقة تشغيلية كاملة' : 'Full capacity' },
                { label: isRtl ? 'الأسرة المشغولة' : 'Occupied Beds', val: '318', sub: isRtl ? 'مرضى منومين' : 'Inpatients' },
                { label: isRtl ? 'نسبة الإشغال الكلية' : 'Occupancy Rate', val: '83.7%', sub: isRtl ? 'ضمن النطاق الآمن' : 'Within safe range' },
                { label: isRtl ? 'الأسرة المتاحة' : 'Available Beds', val: '62', sub: isRtl ? 'جاهزة للتسكين الفوري' : 'Ready for admission' },
            ],
            tableTitle: isRtl ? 'توزيع التعداد السريري ونسب الإشغال حسب الأقسام والأجنحة' : 'Bed Census & Occupancy Rate by Medical Ward',
            headers: isRtl ? ['القسم الطبي / الجناح', 'السعة المرخصة', 'المشغول', 'الشاغر', 'نسبة الإشغال'] : ['Department / Ward', 'Licensed Beds', 'Occupied', 'Available', 'Occupancy Rate'],
            rows: [
                [isRtl ? 'العناية المركزة الفائقة (ICU)' : 'Intensive Care Unit (ICU)', '28', '25', '3', '89.3%'],
                [isRtl ? 'طوارئ وإصابات الحوادث (Trauma ER)' : 'Emergency & Trauma (ER)', '55', '47', '8', '85.5%'],
                [isRtl ? 'جراحة القلب والأوعية الدموية' : 'Cardiovascular Surgery', '45', '41', '4', '91.1%'],
                [isRtl ? 'الجراحة العامة والمناظير' : 'General & Laparoscopic Surgery', '65', '51', '14', '78.5%'],
                [isRtl ? 'الباطنية العامة والأمراض الصدرية' : 'Internal & Pulmonology Medicine', '70', '60', '10', '85.7%'],
                [isRtl ? 'طب الأطفال وحديثي الولادة (NICU)' : 'Pediatrics & NICU', '50', '38', '12', '76.0%'],
                [isRtl ? 'النساء والولادة والعمليات القيصرية' : 'Obstetrics & Gynecology', '42', '34', '8', '81.0%'],
                [isRtl ? 'جراحة العظام والعمود الفقري' : 'Orthopedics & Spine Surgery', '25', '22', '3', '88.0%']
            ]
        },
        'REP-WAT-02': {
            code: 'REP-WAT-02',
            title: isRtl ? 'تقرير أزمنة الانتظار وتدفق مراجعي العيادات' : 'Outpatient Queue & Wait Time Analysis',
            desc: isRtl ? 'رصد دقيق لمتوسط زمن الكشف، ساعات الذروة، ونسب التزام كل عيادة بالمعيار الزمني المستهدف.' : 'Audit of average consultation durations, peak hours, and clinic compliance against wait-time KPIs.',
            kpis: [
                { label: isRtl ? 'متوسط الانتظار العام' : 'Avg General Wait', val: '14.2 د', sub: isRtl ? 'المعيار: < 15 دقيقة' : 'Target: < 15 min' },
                { label: isRtl ? 'نسبة الامتثال للهدف' : 'KPI Compliance', val: '91.4%', sub: isRtl ? '+4.2% تحسن أسبوعي' : '+4.2% weekly gain' },
                { label: isRtl ? 'إجمالي المراجعين اليوم' : 'Total Visits Today', val: '684', sub: isRtl ? 'كافة العيادات الخارجية' : 'All outpatient clinics' },
                { label: isRtl ? 'متوسط زمن الكشف الطبي' : 'Avg Consult Time', val: '18.5 د', sub: isRtl ? 'فحص سريري متكامل' : 'Full clinical consult' },
            ],
            tableTitle: isRtl ? 'بيان أزمنة الانتظار ومعدلات تدفق المرضى لكل عيادة خارجية' : 'Clinic-Level Waiting Times & Patient Velocity Audit',
            headers: isRtl ? ['العيادة التخصصية', 'المراجعون اليوم', 'متوسط الانتظار', 'الهدف المعياري', 'معدل الامتثال'] : ['Specialty Clinic', 'Daily Visits', 'Avg Wait', 'Target KPI', 'Compliance Rate'],
            rows: [
                [isRtl ? 'طوارئ الفرز السريع (Fast Track)' : 'Emergency Fast Track', '142', '8.5 د', '15.0 د', '96.5%'],
                [isRtl ? 'عيادة القلب والقسطرة' : 'Cardiology & Catheterization', '68', '12.0 د', '15.0 د', '92.6%'],
                [isRtl ? 'عيادة الباطنية والصدرية' : 'Internal Medicine & Chest', '110', '14.5 د', '15.0 د', '89.1%'],
                [isRtl ? 'عيادة الأطفال والتطعيمات' : 'Pediatrics & Immunization', '125', '13.0 د', '15.0 د', '93.6%'],
                [isRtl ? 'عيادة العظام والمفاصل' : 'Orthopedics & Joints', '95', '17.2 د', '15.0 د', '82.1%'],
                [isRtl ? 'عيادة العيون والليزر' : 'Ophthalmology & Laser', '78', '11.4 د', '15.0 د', '94.8%'],
                [isRtl ? 'عيادة الأنف والأذن والحنجرة' : 'ENT & Audiology', '66', '13.8 د', '15.0 د', '90.9%']
            ]
        },
        'REP-OR-03': {
            code: 'REP-OR-03',
            title: isRtl ? 'تقرير كفاءة دوران غرف العمليات الجراحية' : 'Operating Theatres Utilization & Turnaround',
            desc: isRtl ? 'معدل إشغال غرف العمليات، أوقات التجهيز والتعقيم بين العمليات، ونسب العمليات الطارئة والمجدولة.' : 'Surgical theatre utilization rates, turnover sterilization intervals, and emergency surgery ratios.',
            kpis: [
                { label: isRtl ? 'الغرف النشطة' : 'Active Theatres', val: '8 / 8', sub: isRtl ? 'جاهزية تعقيم 100%' : '100% sterile readiness' },
                { label: isRtl ? 'معدل إشغال العمليات' : 'OR Utilization Rate', val: '87.3%', sub: isRtl ? 'كفاءة تشغيل ممتازة' : 'High performance' },
                { label: isRtl ? 'العمليات المنجزة اليوم' : 'Completed Surgeries', val: '26', sub: isRtl ? '19 مجدولة · 7 طارئة' : '19 elective · 7 emergency' },
                { label: isRtl ? 'زمن التجهيز والتعقيم' : 'Avg Turnaround', val: '22.4 د', sub: isRtl ? 'بين العمليات المتتالية' : 'Between cases' },
            ],
            tableTitle: isRtl ? 'سجل تشغيل غرف العمليات ومعدلات الدوران والتعقيم' : 'Surgical Theatres Log, Sterilization & Case Allocation',
            headers: isRtl ? ['غرفة العمليات', 'التخصص الجراحي', 'المجدولة', 'الطارئة', 'زمن التجهيز', 'معدل الإشغال'] : ['Operating Suite', 'Surgical Specialty', 'Elective', 'Emergency', 'Turnaround', 'Utilization'],
            rows: [
                [isRtl ? 'جناح العمليات 1 (OR-1)' : 'Surgical Suite 1 (OR-1)', isRtl ? 'جراحة القلب المفتوح' : 'Open Heart Surgery', '3', '1', '28 د', '92.4%'],
                [isRtl ? 'جناح العمليات 2 (OR-2)' : 'Surgical Suite 2 (OR-2)', isRtl ? 'المخ والأعصاب والعمود الفقري' : 'Neurosurgery & Spine', '2', '1', '25 د', '88.1%'],
                [isRtl ? 'جناح العمليات 3 (OR-3)' : 'Surgical Suite 3 (OR-3)', isRtl ? 'جراحة العظام واستبدال المفاصل' : 'Orthopedics & Joint Replacement', '4', '2', '21 د', '86.5%'],
                [isRtl ? 'جناح العمليات 4 (OR-4)' : 'Surgical Suite 4 (OR-4)', isRtl ? 'الجراحة العامة والمناظير' : 'General & Laparoscopy', '6', '1', '18 د', '89.7%'],
                [isRtl ? 'جناح العمليات 5 (OR-5)' : 'Surgical Suite 5 (OR-5)', isRtl ? 'النساء والولادة والقيصريات' : 'Obstetrics & Cesarean', '4', '2', '19 د', '85.0%']
            ]
        },
        'REP-ER-04': {
            code: 'REP-ER-04',
            title: isRtl ? 'تقرير زمن تدفق وفرز حالات الطوارئ (Door-to-Doc)' : 'Emergency Flow & Triage Disposition Report',
            desc: isRtl ? 'أزمنة الفرز، سرعة إجراء الفحوصات المخبرية، ومعدل اتخاذ قرار التنويم أو التخريج الآمن.' : 'Triage durations, laboratory turnaround velocity, and ER admission/discharge disposition metrics.',
            kpis: [
                { label: isRtl ? 'زمن الوصول للطبيب' : 'Door-to-Doc Time', val: '12.8 د', sub: isRtl ? 'المعيار العالمي: < 15 د' : 'Global KPI: < 15 min' },
                { label: isRtl ? 'الحالات الحرجة (المستوى 1)' : 'Critical Level 1', val: '14 حالة', sub: isRtl ? 'إنقاذ حياة وتدخل فوري' : 'Immediate resuscitation' },
                { label: isRtl ? 'زمن الفحوصات الطارئة' : 'Stat Lab Velocity', val: '24.5 د', sub: isRtl ? 'عينات الدم والغازات' : 'Blood gas & stat tests' },
                { label: isRtl ? 'معدل التنويم من الطوارئ' : 'ER Admission Rate', val: '18.2%', sub: isRtl ? 'تحويل لأجنحة التنويم' : 'Admitted to inpatient' },
            ],
            tableTitle: isRtl ? 'بيان فرز الحالات وتدفقها السريري بحسب تصنيف الفرز الكندي (CTAS)' : 'Emergency Triage Breakdown by CTAS Canadian Triage Standard',
            headers: isRtl ? ['مستوى الفرز (CTAS)', 'عدد الحالات', 'متوسط زمن الفحص', 'القرار السريري الشائع', 'نسبة الامتثال'] : ['Triage Category', 'Patient Volume', 'Avg Exam Time', 'Disposition Mode', 'Compliance'],
            rows: [
                [isRtl ? 'المستوى 1: إنعاش فوري (أحمر)' : 'CTAS Level 1: Resuscitation (Red)', '14', '0.8 دقيقة', isRtl ? 'تنويم فوري عناية مركزة' : 'Immediate ICU Admission', '100%'],
                [isRtl ? 'المستوى 2: طارئ حرج (برتقالي)' : 'CTAS Level 2: Emergent (Orange)', '42', '6.2 دقيقة', isRtl ? 'تدخل سريع وغرفة مراقبة' : 'Rapid Intervention / HDU', '98.2%'],
                [isRtl ? 'المستوى 3: عاجل (أصفر)' : 'CTAS Level 3: Urgent (Yellow)', '98', '14.1 دقيقة', isRtl ? 'استقرار ثم تحويل سريري' : 'Stabilize & Inpatient Ward', '92.4%'],
                [isRtl ? 'المستوى 4: شبه عاجل (أخضر)' : 'CTAS Level 4: Less Urgent (Green)', '165', '21.0 دقيقة', isRtl ? 'علاج وتخريج آمن' : 'Treated & Discharged', '88.5%'],
                [isRtl ? 'المستوى 5: غير عاجل (أزرق)' : 'CTAS Level 5: Non-Urgent (Blue)', '76', '24.5 دقيقة', isRtl ? 'توجيه للعيادات الخارجية' : 'Referred to Outpatient', '86.0%']
            ]
        },
        'REP-LOS-05': {
            code: 'REP-LOS-05',
            title: isRtl ? 'تقرير متوسط مدة الإقامة وخطط التفريغ (ALOS)' : 'Average Length of Stay (ALOS) & Discharge Report',
            desc: isRtl ? 'تحليل حالات الإقامة الطويلة، تسريع مسارات التخريج الصباحي، وتفادي الهدر السريري.' : 'Analysis of prolonged stays (>7 days), early morning discharge acceleration, and bed capacity optimization.',
            kpis: [
                { label: isRtl ? 'متوسط الإقامة الكلية' : 'Overall ALOS', val: '3.4 أيام', sub: isRtl ? 'المعيار: 3.0 - 4.0 أيام' : 'Benchmark: 3.0 - 4.0 days' },
                { label: isRtl ? 'التخريج الصباحي المبكر' : 'Morning Discharge', val: '78.6%', sub: isRtl ? 'قبل الساعة 11:00 صباحاً' : 'Before 11:00 AM' },
                { label: isRtl ? 'الإقامات الطويلة (>7 أيام)' : 'Long Stays (>7d)', val: '18 حالة', sub: isRtl ? 'تخضع للمراجعة السريرية' : 'Under active clinical review' },
                { label: isRtl ? 'معدل إعادة التنويم 30 يوم' : '30-Day Readmission', val: '3.1%', sub: isRtl ? 'معيار < 5%' : '< 5% benchmark' },
            ],
            tableTitle: isRtl ? 'متوسط مدة الإقامة ونسب التخريج المبكر حسب الأقسام السريرية' : 'ALOS & Discharge Velocity Breakdown by Inpatient Department',
            headers: isRtl ? ['القسم / الجناح السريري', 'المنومين الحاليين', 'متوسط الإقامة (ALOS)', 'حالات > 7 أيام', 'التخريج المبكر'] : ['Clinical Department', 'Active Inpatients', 'Avg LOS', 'Stays > 7 Days', 'Early Discharge %'],
            rows: [
                [isRtl ? 'العناية المركزة (ICU)' : 'Intensive Care Unit (ICU)', '25', '4.2 أيام', '5 حالات', '65.0%'],
                [isRtl ? 'جراحة القلب والأوعية الدموية' : 'Cardiovascular Surgery', '41', '4.8 أيام', '4 حالات', '74.2%'],
                [isRtl ? 'الجراحة العامة والمناظير' : 'General Surgery', '51', '2.8 أيام', '2 حالات', '88.5%'],
                [isRtl ? 'الباطنية العامة وأمراض الكلى' : 'Internal & Nephrology', '60', '3.6 أيام', '4 حالات', '80.0%'],
                [isRtl ? 'جراحة العظام واستبدال المفاصل' : 'Orthopedics Surgery', '22', '3.1 أيام', '1 حالة', '84.6%'],
                [isRtl ? 'طب الأطفال وحديثي الولادة' : 'Pediatrics & Neonatal', '38', '2.1 أيام', '1 حالة', '92.0%']
            ]
        },
        'REP-STF-06': {
            code: 'REP-STF-06',
            title: isRtl ? 'تقرير تغطية مناوبات الكادر الطبي والتمريضي' : 'Physician & Nursing Shift Coverage Audit',
            desc: isRtl ? 'ساعات التغطية الفعلية، جاهزية أطباء الاحتياط، وتوزيع القوى العاملة حسب كثافة الحالات.' : 'Actual duty hours, on-call standby readiness audit, and staff distribution across high-acuity wards.',
            kpis: [
                { label: isRtl ? 'نسبة تغطية المناوبات' : 'Shift Coverage Rate', val: '98.4%', sub: isRtl ? 'التزام كامل بالجداول' : 'Full schedule adherence' },
                { label: isRtl ? 'الأطباء المناوبون' : 'Duty Physicians', val: '48 طبيب', sub: isRtl ? 'على رأس العمل حالياً' : 'Currently on active shift' },
                { label: isRtl ? 'كوادر التمريض المناوبة' : 'Duty Nurses', val: '132 ممرض/ـة', sub: isRtl ? 'نسبة 1:3 إلى 1:1 بالعناية' : '1:3 to 1:1 ICU ratio' },
                { label: isRtl ? 'أطباء الاستدعاء (On-Call)' : 'On-Call Specialists', val: '18 استشاري', sub: isRtl ? 'جاهزية استجابة < 20 د' : 'Response readiness < 20m' },
            ],
            tableTitle: isRtl ? 'توزيع القوى العاملة وجاهزية الكوادر الطبية حسب الأجنحة والمراكز الحرجة' : 'Workforce Distribution & Clinical Readiness by Critical Department',
            headers: isRtl ? ['الوحدة السريرية', 'كادر الأطباء (مطلوب/فعلي)', 'كادر التمريض (مطلوب/فعلي)', 'نسبة التغطية', 'حالة الجاهزية'] : ['Clinical Unit', 'Physicians (Req/Act)', 'Nurses (Req/Act)', 'Coverage %', 'Status'],
            rows: [
                [isRtl ? 'العناية المركزة الفائقة (ICU)' : 'Intensive Care Unit (ICU)', '8 / 8', '24 / 24', '100%', isRtl ? 'جاهزية تامة' : 'Optimal'],
                [isRtl ? 'الطوارئ والحوادث الكبرى' : 'Emergency & Major Trauma', '12 / 12', '32 / 30', '97.2%', isRtl ? 'مستقر' : 'Stable'],
                [isRtl ? 'غرف العمليات والتخدير' : 'Operating Rooms & Anesthesia', '10 / 10', '18 / 18', '100%', isRtl ? 'جاهزية تامة' : 'Optimal'],
                [isRtl ? 'أجنحة التنويم الجراحي' : 'Surgical Inpatient Wards', '6 / 6', '22 / 22', '100%', isRtl ? 'جاهزية تامة' : 'Optimal'],
                [isRtl ? 'أجنحة الباطنية والقلب' : 'Internal & Cardiac Wards', '8 / 7', '26 / 25', '94.1%', isRtl ? 'استدعاء طبيب بديل' : 'Relief Doctor Called'],
                [isRtl ? 'الأطفال وحديثي الولادة' : 'Pediatrics & NICU', '6 / 6', '16 / 16', '100%', isRtl ? 'جاهزية تامة' : 'Optimal']
            ]
        }
    };

    function openIndividualReport(code, autoPrint = false) {
        currentActiveReportCode = code;
        const rep = reportsDatabase[code] || reportsDatabase['REP-CEN-01'];

        document.getElementById('singleModalHeading').innerText = rep.title;
        document.getElementById('singleModalSubheading').innerText = `${rep.code} · ${isRtl ? 'مستند تنفيذي معتمد' : 'OFFICIAL MEDICAL DOCUMENT'}`;
        document.getElementById('singleReportTitle').innerText = rep.title;
        document.getElementById('singleReportDesc').innerText = rep.desc;
        document.getElementById('singleReportCodeBadge').innerText = rep.code;
        document.getElementById('singleReportRef').innerText = `REF: RSD-${rep.code}-2026-YE`;
        document.getElementById('singleReportDate').innerText = new Date().toISOString().replace('T', ' ').substring(0, 16);
        document.getElementById('singleReportTableTitle').innerText = rep.tableTitle;

        // حقن بطاقات الأداء الأربع بمساحات وهوامش مريحة
        const kpiGrid = document.getElementById('singleReportKpiGrid');
        kpiGrid.innerHTML = '';
        rep.kpis.forEach(k => {
            kpiGrid.innerHTML += `
                <div class="p-3.5 sm:p-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/60 text-center shadow-2xs">
                    <span class="text-[10.5px] font-bold text-slate-500 dark:text-slate-400 block truncate">${k.label}</span>
                    <span class="text-xl sm:text-2xl font-black font-mono text-slate-900 dark:text-white block mt-1">${k.val}</span>
                    <span class="text-[10px] text-[#0C6B78] dark:text-[#14AFC3] font-medium block mt-1 truncate">${k.sub}</span>
                </div>
            `;
        });

        // حقن جدول البيانات الواسع مع حشوات كريمة وتنسيق أنيق
        const tableWrapper = document.getElementById('singleReportTableWrapper');
        let tableHtml = `
            <table class="w-full text-xs text-start">
                <thead class="bg-slate-100/90 dark:bg-slate-800/90 text-slate-700 dark:text-slate-200 font-bold border-b-2 border-slate-200 dark:border-slate-700 text-[11px]">
                    <tr>
        `;
        rep.headers.forEach((h, idx) => {
            const align = idx === 0 ? 'text-start' : 'text-center';
            tableHtml += `<th class="py-3 px-4 sm:px-5 ${align}">${h}</th>`;
        });
        tableHtml += `
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300">
        `;

        rep.rows.forEach(row => {
            tableHtml += `<tr class="even:bg-slate-50/70 dark:even:bg-slate-800/40 hover:bg-[#E5FAFC]/40 dark:hover:bg-[#14AFC3]/10 transition-colors">`;
            row.forEach((col, idx) => {
                if (idx === 0) {
                    tableHtml += `<td class="py-3 px-4 sm:px-5 font-semibold text-slate-900 dark:text-white">${col}</td>`;
                } else if (idx === row.length - 1) {
                    if (col.includes('%')) {
                        const num = parseFloat(col);
                        const badgeColor = num >= 90 ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : (num >= 80 ? 'bg-cyan-50 text-cyan-800 border-cyan-200' : 'bg-amber-50 text-amber-700 border-amber-200');
                        tableHtml += `<td class="py-3 px-4 sm:px-5 text-center"><span class="px-2.5 py-1 rounded-md text-[10.5px] font-mono font-bold border ${badgeColor}">${col}</span></td>`;
                    } else if (col === 'جاهزية تامة' || col === 'Optimal') {
                        tableHtml += `<td class="py-3 px-4 sm:px-5 text-center"><span class="px-2.5 py-1 rounded-md text-[10.5px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">${col}</span></td>`;
                    } else if (col.includes('استدعاء') || col.includes('Relief')) {
                        tableHtml += `<td class="py-3 px-4 sm:px-5 text-center"><span class="px-2.5 py-1 rounded-md text-[10.5px] font-bold bg-amber-50 text-amber-700 border border-amber-200">${col}</span></td>`;
                    } else {
                        tableHtml += `<td class="py-3 px-4 sm:px-5 text-center font-mono font-bold text-slate-800 dark:text-slate-100">${col}</td>`;
                    }
                } else {
                    tableHtml += `<td class="py-3 px-4 sm:px-5 text-center font-mono text-slate-700 dark:text-slate-300">${col}</td>`;
                }
            });
            tableHtml += `</tr>`;
        });

        tableHtml += `
                </tbody>
            </table>
        `;
        tableWrapper.innerHTML = tableHtml;

        const m = document.getElementById('individualReportModal');
        m.classList.remove('hidden');
        m.classList.add('flex');

        if (autoPrint) {
            triggerReportPrint();
        }
    }

    function closeIndividualReportModal() {
        const m = document.getElementById('individualReportModal');
        m.classList.add('hidden');
        m.classList.remove('flex');
    }

    function downloadIndividualReportPDF(code) {
        showToast(isRtl ? `جاري تجهيز مستند PDF للتقرير [${code}]...` : `Preparing PDF for [${code}]...`);
        openIndividualReport(code, true);
    }

    function triggerReportPrint() {
        window.scrollTo(0, 0);
        document.body.classList.remove('printing-master');
        document.body.classList.add('printing-single');
        setTimeout(() => {
            window.print();
        }, 200);
    }

    window.addEventListener('afterprint', () => {
        document.body.classList.remove('printing-single');
        document.body.classList.remove('printing-master');
    });

    function downloadCurrentReportCSV() {
        const rep = reportsDatabase[currentActiveReportCode] || reportsDatabase['REP-CEN-01'];
        let csv = '\uFEFF';
        csv += 'الجمهورية اليمنية - وزارة الصحة العامة والسكان\r\n';
        csv += 'مستشفى الرشيد التخصصي - صنعاء\r\n';
        csv += `${rep.title}\r\n`;
        csv += `المرجع: RSD-${rep.code}-2026-YE\r\n`;
        csv += `تاريخ التصدير: ${new Date().toISOString().substring(0, 10)}\r\n\r\n`;

        csv += rep.headers.join(',') + '\r\n';
        rep.rows.forEach(r => {
            csv += r.map(item => `"${item.toString().replace(/"/g, '""')}"`).join(',') + '\r\n';
        });

        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `RSD_${rep.code}_${new Date().toISOString().substring(0, 10)}.csv`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showToast(isRtl ? `تم تنزيل بيانات تقرير [${rep.code}] كملف Excel بنجاح.` : `Exported [${rep.code}] to Excel successfully.`);
    }

    function filterReportCategory(cat, btn) {
        document.querySelectorAll('.rep-filter-btn').forEach(b => {
            b.classList.remove('bg-[#14AFC3]', 'text-white', 'shadow-2xs', 'font-bold');
            b.classList.add('bg-slate-50', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300', 'font-medium');
        });
        btn.classList.remove('bg-slate-50', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300', 'font-medium');
        btn.classList.add('bg-[#14AFC3]', 'text-white', 'shadow-2xs', 'font-bold');

        const cards = document.querySelectorAll('.report-card');
        cards.forEach(card => {
            if (cat === 'all' || card.getAttribute('data-category') === cat) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function searchReports() {
        const query = document.getElementById('reportSearchInput').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.report-card');
        cards.forEach(card => {
            const name = card.getAttribute('data-name') || '';
            const code = (card.getAttribute('data-code') || '').toLowerCase();
            if (!query || name.includes(query) || code.includes(query)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function exportMasterPackage() {
        document.getElementById('masterBundleModal').classList.remove('hidden');
    }

    function closeMasterPackageModal() {
        document.getElementById('masterBundleModal').classList.add('hidden');
    }

    function printMasterPackage() {
        window.scrollTo(0, 0);
        document.body.classList.remove('printing-single');
        document.body.classList.add('printing-master');
        setTimeout(() => {
            window.print();
        }, 200);
    }

    function downloadMasterBundleCSV() {
        let csv = '\uFEFF';
        csv += 'الجمهورية اليمنية - وزارة الصحة العامة والسكان - أمانة العاصمة صنعاء\r\n';
        csv += 'مستشفى الرشيد التخصصي - الحزمة التنفيذية الشاملة للتقارير والمؤشرات\r\n';
        csv += 'المرجع الرسمي: RSD-EXEC-2026-YE\r\n';
        csv += `تاريخ التصدير: ${new Date().toISOString()}\r\n\r\n`;

        csv += 'اسم التقرير,الكود,التصنيف,الدورية,الحالة\r\n';
        csv += 'تقرير الإشغال والتعداد السريري اليومي,REP-CEN-01,capacity,daily,معتمد\r\n';
        csv += 'تقرير أزمنة الانتظار وتدفق مراجعي العيادات,REP-WAT-02,clinics,weekly,معتمد\r\n';
        csv += 'تقرير كفاءة دوران غرف العمليات الجراحية,REP-OR-03,surgery,weekly,معتمد\r\n';
        csv += 'تقرير زمن تدفق وفرز حالات الطوارئ (Door-to-Doc),REP-ER-04,emergency,daily,معتمد\r\n';
        csv += 'تقرير متوسط مدة الإقامة وخطط التفريغ (ALOS),REP-LOS-05,quality,monthly,معتمد\r\n';
        csv += 'تقرير تغطية مناوبات الكادر الطبي والتمريضي,REP-STF-06,staff,monthly,معتمد\r\n';

        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `RSD_Executive_Reports_Bundle_${new Date().toISOString().slice(0,10)}.csv`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showToast(isRtl ? 'تم تحميل ملف الحزمة الإدارية بنجاح.' : 'Executive Reports Bundle CSV downloaded successfully.');
    }

    function openScheduleModal() {
        const m = document.getElementById('scheduleModal');
        m.classList.remove('hidden');
        m.classList.add('flex');
    }

    function closeScheduleModal() {
        const m = document.getElementById('scheduleModal');
        m.classList.add('hidden');
        m.classList.remove('flex');
    }

    function submitSchedule(e) {
        e.preventDefault();
        closeScheduleModal();
        showToast(isRtl ? 'تم تفعيل الجدولة الآلية للتقرير بنجاح.' : 'Automated report schedule activated.');
    }

    function showToast(msg) {
        const toast = document.getElementById('actionToast');
        const text = document.getElementById('toastMessage');
        text.textContent = msg;
        toast.classList.remove('hidden');
        toast.classList.add('flex');
        setTimeout(() => {
            toast.classList.add('hidden');
            toast.classList.remove('flex');
        }, 3000);
    }
</script>
@endpush
@endsection
