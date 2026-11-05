@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    // بيانات الكوادر الطبية والمناوبات ثنائية اللغة بالكامل
    $staffMembers = $staffMembers ?? collect([
        (object)[
            'id' => 1,
            'name' => 'د. طارق عبدالإله الزبير',
            'name_en' => 'Dr. Tareq Al-Zubair',
            'title' => 'استشاري ورئيس وحدة العناية المركزة (ICU)',
            'title_en' => 'Consultant & Head of ICU Unit',
            'dept' => 'العناية المركزة الفائقة',
            'dept_en' => 'Intensive Care Unit (ICU)',
            'dept_code' => 'ICU-A',
            'category' => 'icu',
            'role_type' => 'head',
            'role_label' => 'رئيس قسم / استشاري',
            'role_label_en' => 'Head of Dept / Consultant',
            'shift' => 'morning',
            'shift_label' => 'الصباحية (07:00 - 15:00)',
            'shift_label_en' => 'Morning (07:00 - 15:00)',
            'status' => 'on_duty',
            'phone' => 'ext. 3012',
            'pager_id' => 'PGR-101',
            'active_cases' => 12,
        ],
        (object)[
            'id' => 2,
            'name' => 'د. منى عبدالعزيز النمري',
            'name_en' => 'Dr. Muna Al-Nemri',
            'title' => 'استشارية طب الطوارئ والحوادث',
            'title_en' => 'Consultant of Emergency & Trauma',
            'dept' => 'قسم الطوارئ والإصابات',
            'dept_en' => 'Emergency Department (ER)',
            'dept_code' => 'ER-01',
            'category' => 'emergency',
            'role_type' => 'consultant',
            'role_label' => 'استشارية طوارئ',
            'role_label_en' => 'ER Consultant',
            'shift' => 'morning',
            'shift_label' => 'الصباحية (07:00 - 15:00)',
            'shift_label_en' => 'Morning (07:00 - 15:00)',
            'status' => 'on_duty',
            'phone' => 'ext. 1005',
            'pager_id' => 'PGR-104',
            'active_cases' => 18,
        ],
        (object)[
            'id' => 3,
            'name' => 'د. سامي عبدالحميد القاضي',
            'name_en' => 'Dr. Sami Al-Qadhi',
            'title' => 'استشاري الجراحة العامة وجراحة المناظير',
            'title_en' => 'Consultant General & Laparoscopic Surgeon',
            'dept' => 'قسم الجراحة والعمليات',
            'dept_en' => 'General Surgery Department',
            'dept_code' => 'SURG-B',
            'category' => 'surgery',
            'role_type' => 'consultant',
            'role_label' => 'استشاري جراحة',
            'role_label_en' => 'Surgical Consultant',
            'shift' => 'morning',
            'shift_label' => 'الصباحية (07:00 - 15:00)',
            'shift_label_en' => 'Morning (07:00 - 15:00)',
            'status' => 'in_surgery',
            'phone' => 'ext. 4022',
            'pager_id' => 'PGR-208',
            'active_cases' => 6,
        ],
        (object)[
            'id' => 4,
            'name' => 'د. حسام عادل الريمي',
            'name_en' => 'Dr. Husam Al-Reemi',
            'title' => 'استشاري أمراض القلب والقسطرة التداخلية',
            'title_en' => 'Consultant Interventional Cardiologist',
            'dept' => 'مركز أمراض وجراحة القلب',
            'dept_en' => 'Cardiology Center',
            'dept_code' => 'CARD-02',
            'category' => 'cardiology',
            'role_type' => 'consultant',
            'role_label' => 'استشاري قسطرة',
            'role_label_en' => 'Cardio Consultant',
            'shift' => 'on_call',
            'shift_label' => 'استدعاء طارئ (24 ساعة)',
            'shift_label_en' => 'On-Call Standby (24 Hours)',
            'status' => 'on_call',
            'phone' => 'ext. 2208',
            'pager_id' => 'PGR-303',
            'active_cases' => 4,
        ],
        (object)[
            'id' => 5,
            'name' => 'د. ريما عصام الشامي',
            'name_en' => 'Dr. Rima Al-Shami',
            'title' => 'أخصائية أولى طب الأطفال وحديثي الولادة',
            'title_en' => 'Senior Specialist Pediatrician (NICU)',
            'dept' => 'قسم الأطفال والحضانات (NICU)',
            'dept_en' => 'Pediatrics & Neonatal Care',
            'dept_code' => 'PED-A',
            'category' => 'pediatrics',
            'role_type' => 'specialist',
            'role_label' => 'أخصائية أولى',
            'role_label_en' => 'Senior Specialist',
            'shift' => 'morning',
            'shift_label' => 'الصباحية (07:00 - 15:00)',
            'shift_label_en' => 'Morning (07:00 - 15:00)',
            'status' => 'on_duty',
            'phone' => 'ext. 1140',
            'pager_id' => 'PGR-411',
            'active_cases' => 9,
        ],
        (object)[
            'id' => 6,
            'name' => 'د. فؤاد سنان الخولاني',
            'name_en' => 'Dr. Fouad Al-Kholani',
            'title' => 'استشاري الباطنية والأمراض الصدرية',
            'title_en' => 'Consultant Internal & Pulmonology',
            'dept' => 'قسم الباطنية العامة',
            'dept_en' => 'Internal Medicine Department',
            'dept_code' => 'MED-C',
            'category' => 'internal',
            'role_type' => 'consultant',
            'role_label' => 'استشاري باطنية',
            'role_label_en' => 'Internal Med Consultant',
            'shift' => 'morning',
            'shift_label' => 'الصباحية (07:00 - 15:00)',
            'shift_label_en' => 'Morning (07:00 - 15:00)',
            'status' => 'on_duty',
            'phone' => 'ext. 2015',
            'pager_id' => 'PGR-512',
            'active_cases' => 14,
        ],
        (object)[
            'id' => 7,
            'name' => 'د. ندى منصور الكبسي',
            'name_en' => 'Dr. Nada Al-Kibsi',
            'title' => 'استشارية النساء والتوليد وجراحة الأمومة',
            'title_en' => 'Consultant Obstetrician & Gynecologist',
            'dept' => 'قسم النساء والتوليد',
            'dept_en' => 'Obstetrics & Maternity',
            'dept_code' => 'OBGYN-1',
            'category' => 'maternity',
            'role_type' => 'consultant',
            'role_label' => 'استشارية توليد',
            'role_label_en' => 'OBGYN Consultant',
            'shift' => 'morning',
            'shift_label' => 'الصباحية (07:00 - 15:00)',
            'shift_label_en' => 'Morning (07:00 - 15:00)',
            'status' => 'on_duty',
            'phone' => 'ext. 1224',
            'pager_id' => 'PGR-609',
            'active_cases' => 7,
        ],
        (object)[
            'id' => 8,
            'name' => 'د. عصام صالح المقطري',
            'name_en' => 'Dr. Essam Al-Maqtari',
            'title' => 'استشاري جراحة العظام والمفاصل والعمود الفقري',
            'title_en' => 'Consultant Orthopedic & Joint Surgeon',
            'dept' => 'قسم العظام والإصابات',
            'dept_en' => 'Orthopedics & Trauma',
            'dept_code' => 'ORTHO-D',
            'category' => 'orthopedics',
            'role_type' => 'consultant',
            'role_label' => 'استشاري عظام',
            'role_label_en' => 'Ortho Consultant',
            'shift' => 'on_call',
            'shift_label' => 'استدعاء طارئ (24 ساعة)',
            'shift_label_en' => 'On-Call Standby (24 Hours)',
            'status' => 'on_call',
            'phone' => 'ext. 5010',
            'pager_id' => 'PGR-720',
            'active_cases' => 3,
        ],
    ]);

    // قاموس الألوان والتصنيفات للأقسام الطبية
    $deptColors = [
        'icu' => [
            'badge' => 'bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/15 dark:text-[#14AFC3] border-[#14AFC3]/30',
            'dot' => 'bg-[#14AFC3]',
            'accent' => 'border-t-[#14AFC3]',
        ],
        'emergency' => [
            'badge' => 'bg-rose-50 text-rose-700 dark:bg-rose-950/40 dark:text-rose-300 border-rose-200 dark:border-rose-900/50',
            'dot' => 'bg-rose-500',
            'accent' => 'border-t-rose-500',
        ],
        'surgery' => [
            'badge' => 'bg-purple-50 text-purple-700 dark:bg-purple-950/40 dark:text-purple-300 border-purple-200 dark:border-purple-900/50',
            'dot' => 'bg-purple-500',
            'accent' => 'border-t-purple-500',
        ],
        'cardiology' => [
            'badge' => 'bg-red-50 text-red-700 dark:bg-red-950/40 dark:text-red-300 border-red-200 dark:border-red-900/50',
            'dot' => 'bg-red-500',
            'accent' => 'border-t-red-500',
        ],
        'pediatrics' => [
            'badge' => 'bg-amber-50 text-amber-700 dark:bg-amber-950/40 dark:text-amber-300 border-amber-200 dark:border-amber-900/50',
            'dot' => 'bg-amber-500',
            'accent' => 'border-t-amber-500',
        ],
        'internal' => [
            'badge' => 'bg-indigo-50 text-indigo-700 dark:bg-indigo-950/40 dark:text-indigo-300 border-indigo-200 dark:border-indigo-900/50',
            'dot' => 'bg-indigo-500',
            'accent' => 'border-t-indigo-500',
        ],
        'maternity' => [
            'badge' => 'bg-pink-50 text-pink-700 dark:bg-pink-950/40 dark:text-pink-300 border-pink-200 dark:border-pink-900/50',
            'dot' => 'bg-pink-500',
            'accent' => 'border-t-pink-500',
        ],
        'orthopedics' => [
            'badge' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border-emerald-200 dark:border-emerald-900/50',
            'dot' => 'bg-emerald-500',
            'accent' => 'border-t-emerald-500',
        ],
    ];

    $totalOnDuty = $staffMembers->where('status', 'on_duty')->count() + $staffMembers->where('status', 'in_surgery')->count();
    $totalOnCall = $staffMembers->where('status', 'on_call')->count();
@endphp

@section('page-title', $isRtl ? 'دليل الكادر والمناوبات' : 'Staff Directory & Rosters')
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

    <x-sidebar-link :href="Route::has('manager.staff.index') ? route('manager.staff.index') : '#'" :active="true">
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
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0-1.82-.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c.36.24.7.53 1 .87"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'إعدادات الحساب' : 'Settings' }}
        </x-sidebar-link>
    </div>
@endsection

@section('content')

{{-- ══════════════════════════════════════════
     STYLESHEET: طباعة جدول المناوبات الرسمي المعتمد
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

        body * {
            visibility: hidden !important;
        }

        body.printing-roster #rosterExportModal {
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

        body.printing-roster #rosterExportModal > div,
        body.printing-roster #rosterExportModal > div > div {
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

        body.printing-roster #printableRosterSection,
        body.printing-roster #printableRosterSection * {
            visibility: visible !important;
        }

        body.printing-roster #printableRosterSection {
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
                    {{ $isRtl ? 'دليل الكادر الطبي وجداول المناوبات' : 'Staff Directory & Shift Rosters' }}
                </h1>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-1">
                {{ $isRtl ? 'متابعة حضور وتغطية الكوادر الطبية والتمريضية، فرق الاستدعاء الطارئ، واعتماد طلبات التبديل.' : 'Clinical roster monitoring, on-call standby readiness, and shift approvals.' }}
            </p>
        </div>

        <div class="flex items-center gap-2">
            <div class="hidden md:flex items-center gap-1.5 px-3 py-1.5 bg-[#E5FAFC]/60 dark:bg-[#14AFC3]/10 border border-[#14AFC3]/30 rounded-xl text-xs font-bold text-[#0C6B78] dark:text-[#14AFC3]">
                <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                <span>{{ $isRtl ? 'المناوبة الجارية: الصباحية (A)' : 'Current Shift: Morning (A)' }}</span>
            </div>

            <button type="button" onclick="exportRosterPDF()" class="px-3.5 h-9 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-750 text-slate-700 dark:text-slate-200 text-xs font-bold rounded-xl transition-all shadow-2xs flex items-center gap-1.5 cursor-pointer">
                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <span>{{ $isRtl ? 'تصدير الجدول' : 'Export Roster' }}</span>
            </button>

            <button type="button" onclick="openBroadcastModal()" class="px-4 h-9 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:opacity-95 text-white text-xs font-bold rounded-xl transition-all shadow-xs flex items-center gap-2 cursor-pointer">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                </svg>
                <span>{{ $isRtl ? 'استدعاء طارئ (On-Call)' : 'Dispatch On-Call' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         2. بطاقات قياس الأداء الرباعية الموحدة (CENTERED KPI STAT CARDS)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5">
        
        <x-stat-card
            :label="$isRtl ? 'الكادر الطبي على رأس العمل' : __('Active On-Duty Clinicians')"
            value="64"
            :sublabel="$isRtl ? '22 طبيباً · 34 تمريضاً · 8 فنيين' : __('22 Doctors · 34 Nurses · 8 Techs')"
            :highlighted="true"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path stroke-linecap="round" stroke-linejoin="round" d="M23 21v-2a4 4 0 00-3-3.87"/><path stroke-linecap="round" stroke-linejoin="round" d="M16 3.13a4 4 0 010 7.75"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            :label="$isRtl ? 'نسبة تغطية الأجنحة والعيادات' : __('Shift Ward Coverage')"
            value="98.4%"
            :sublabel="$isRtl ? 'المناوبة الصباحية: جميع الأجنحة مغطاة' : __('Morning Shift: All wards fully staffed')"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            :label="$isRtl ? 'أطباء الاستدعاء والاحتياط (On-Call)' : __('On-Call Standby Force')"
            value="12"
            :sublabel="$isRtl ? 'زمن الاستجابة للنداء: دون 20 دقيقة' : __('Max Response Time: < 20 mins')"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 3"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            :label="$isRtl ? 'طلبات التبديل المعلقة' : __('Pending Swap Requests')"
            value="3"
            :sublabel="$isRtl ? '3 طلبات بانتظار توقيع المدير' : __('3 requests awaiting manager approval')"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

    </div>

    {{-- ══════════════════════════════════════════
         3. شريط الفلترة والبحث السريع الموحد
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-3xl p-3 shadow-sm flex flex-col md:flex-row items-center justify-between gap-2.5">
        
        <div class="flex items-center gap-1.5 overflow-x-auto w-full md:w-auto pb-1 md:pb-0 text-xs">
            <button type="button" onclick="filterStaffRole('all', this)" class="staff-filter-btn px-3 py-1.5 rounded-xl font-bold bg-[#14AFC3] text-white shadow-2xs transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'جميع الكوادر (8)' : 'All Staff (8)' }}
            </button>
            <button type="button" onclick="filterStaffRole('on_duty', this)" class="staff-filter-btn px-3 py-1.5 rounded-xl font-medium bg-slate-50 hover:bg-slate-100 dark:bg-slate-800 dark:hover:bg-slate-750 text-slate-700 dark:text-slate-300 border border-slate-200/70 dark:border-slate-700 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'على رأس العمل الآن' : 'On Duty' }}
            </button>
            <button type="button" onclick="filterStaffRole('on_call', this)" class="staff-filter-btn px-3 py-1.5 rounded-xl font-medium bg-slate-50 hover:bg-slate-100 dark:bg-slate-800 dark:hover:bg-slate-750 text-slate-700 dark:text-slate-300 border border-slate-200/70 dark:border-slate-700 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'الاحتياط On-Call' : 'On-Call' }}
            </button>
            <button type="button" onclick="filterStaffRole('in_surgery', this)" class="staff-filter-btn px-3 py-1.5 rounded-xl font-medium bg-slate-50 hover:bg-slate-100 dark:bg-slate-800 dark:hover:bg-slate-750 text-slate-700 dark:text-slate-300 border border-slate-200/70 dark:border-slate-700 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'في العمليات' : 'In Surgery' }}
            </button>
        </div>

        <div class="relative w-full md:w-72 shrink-0">
            <span class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none text-slate-400">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </span>
            <input type="text" id="staffSearchInput" onkeyup="searchStaff()"
                   placeholder="{{ $isRtl ? 'بحث باسم الطبيب، التخصص، أو التحويلة...' : 'Search staff, specialty or ext...' }}"
                   class="w-full h-8.5 {{ $isRtl ? 'pr-8 pl-3' : 'pl-8 pr-3' }} bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-xs font-medium text-slate-900 dark:text-white outline-none focus:border-[#14AFC3] transition-all placeholder:text-slate-400">
        </div>

    </div>

    {{-- ══════════════════════════════════════════
         4. شبكة كروت الكادر الطبي والمناوبات (MODERN CARDS)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="staffCardsContainer">
        @foreach($staffMembers as $staff)
        @php
            $catKey = $staff->category ?? 'icu';
            $catStyle = $deptColors[$catKey] ?? $deptColors['icu'];
            $staffName = $isRtl ? $staff->name : $staff->name_en;
            $staffDept = $isRtl ? $staff->dept : $staff->dept_en;
            $staffTitle = $isRtl ? $staff->title : $staff->title_en;
            $roleLabel = $isRtl ? $staff->role_label : $staff->role_label_en;
            $shiftLabel = $isRtl ? $staff->shift_label : $staff->shift_label_en;
        @endphp
        <div class="staff-card bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-3xl p-5 shadow-sm hover:border-[#14AFC3]/60 hover:shadow-md transition-all duration-300 flex flex-col justify-between group relative overflow-hidden"
             data-name="{{ strtolower($staff->name . ' ' . $staff->name_en) }}"
             data-dept="{{ strtolower($staff->dept . ' ' . $staff->dept_en) }}"
             data-status="{{ $staff->status }}">

            {{-- Top Accent Line --}}
            <div class="absolute top-0 inset-x-0 h-1 {{ $staff->status === 'in_surgery' ? 'bg-indigo-500' : ($staff->status === 'on_call' ? 'bg-amber-500' : 'bg-[#14AFC3]') }}"></div>

            <div>
                {{-- Top Row: Avatar, Info, Status Pill --}}
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#E5FAFC] to-[#d0f4f7] dark:from-[#14AFC3]/20 dark:to-[#0C6B78]/20 border border-[#14AFC3]/30 text-[#0C6B78] dark:text-[#14AFC3] font-black text-base flex items-center justify-center shrink-0 shadow-2xs">
                            {{ mb_substr($staffName, 0, 1) }}
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-sm font-black text-slate-900 dark:text-white group-hover:text-[#14AFC3] transition-colors">
                                    {{ $staffName }}
                                </h3>
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-mono font-bold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700">
                                    {{ $staff->dept_code }}
                                </span>
                            </div>
                            <p class="text-[11px] text-slate-500 dark:text-slate-400 font-medium mt-0.5">
                                {{ $staffTitle }}
                            </p>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] font-bold border {{ $catStyle['badge'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $catStyle['dot'] }}"></span>
                                    <span>{{ $staffDept }}</span>
                                </span>
                                <span class="text-[10px] font-mono font-bold text-slate-400">
                                    {{ $staff->pager_id }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Status Badge --}}
                    <div>
                        @if($staff->status === 'on_duty')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10.5px] font-bold bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/15 dark:text-[#14AFC3] border border-[#14AFC3]/30 shadow-2xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                                <span>{{ $isRtl ? 'على رأس العمل' : 'On Duty' }}</span>
                            </span>
                        @elseif($staff->status === 'in_surgery')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10.5px] font-bold bg-indigo-50 text-indigo-700 dark:bg-indigo-950/40 dark:text-indigo-300 border border-indigo-200 shadow-2xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                                <span>{{ $isRtl ? 'في غرفة العمليات' : 'In Surgery' }}</span>
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10.5px] font-bold bg-amber-50 text-amber-700 dark:bg-amber-950/40 dark:text-amber-300 border border-amber-200 shadow-2xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                <span>{{ $isRtl ? 'احتياط On-Call' : 'On-Call' }}</span>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Telemetry Matrix Grid --}}
                <div class="mt-4 grid grid-cols-3 gap-2 bg-slate-50 dark:bg-slate-800/50 p-3 rounded-xl border border-slate-100 dark:border-slate-800 text-center">
                    <div>
                        <span class="text-[10px] text-slate-400 font-bold block">{{ $isRtl ? 'المناوبة المعتمدة' : 'Assigned Shift' }}</span>
                        <span class="text-xs font-bold text-slate-800 dark:text-slate-100 mt-0.5 block truncate">{{ $staff->shift === 'on_call' ? '24h Standby' : ($isRtl ? 'صباحية (A)' : 'Morning (A)') }}</span>
                    </div>
                    <div class="border-s border-slate-200/70 dark:border-slate-700">
                        <span class="text-[10px] text-slate-400 font-bold block">{{ $isRtl ? 'المرضى تحت الإشراف' : 'Active Cases' }}</span>
                        <span class="text-xs font-black text-[#14AFC3] font-mono mt-0.5 block">{{ $staff->active_cases }} {{ $isRtl ? 'مرضى' : 'pts' }}</span>
                    </div>
                    <div class="border-s border-slate-200/70 dark:border-slate-700">
                        <span class="text-[10px] text-slate-400 font-bold block">{{ $isRtl ? 'التحويلة الداخلية' : 'Extension' }}</span>
                        <span class="text-xs font-bold text-slate-700 dark:text-slate-300 font-mono mt-0.5 block">{{ $staff->phone }}</span>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-4 pt-3.5 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between gap-2">
                <button type="button" onclick="pagerStaff('{{ $staffName }}', '{{ $staff->phone }}', '{{ $staff->pager_id }}')" class="flex-1 h-9 bg-[#E5FAFC] hover:bg-[#d5f5f9] dark:bg-[#14AFC3]/15 dark:hover:bg-[#14AFC3]/25 text-[#0C6B78] dark:text-[#14AFC3] text-xs font-bold rounded-xl transition-all flex items-center justify-center gap-1.5 cursor-pointer shadow-2xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
                    <span>{{ $isRtl ? 'نداء استدعاء عاجل' : 'Emergency Pager' }}</span>
                </button>

                <button type="button" onclick="reassignShift('{{ $staffName }}', '{{ $staffDept }}', '{{ $staff->shift }}')" class="px-3.5 h-9 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-750 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 text-xs font-bold rounded-xl transition-all flex items-center gap-1.5 cursor-pointer shadow-2xs">
                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    <span>{{ $isRtl ? 'تعديل التكليف' : 'Reassign' }}</span>
                </button>
            </div>

        </div>
        @endforeach
    </div>

    {{-- ══════════════════════════════════════════
         5. قسم طلبات تبديل المناوبات والإجازات المعلقة
    ══════════════════════════════════════════ --}}
    <div id="swapRequestsSection" class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl shadow-2xs overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
            <div>
                <h2 class="text-sm font-bold text-slate-900 dark:text-white leading-tight">
                    {{ $isRtl ? 'طلبات تبديل المناوبات وتغطية الإجازات (تتطلب اعتماد المدير)' : 'Pending Shift Swaps & Leave Coverages' }}
                </h2>
                <p class="text-[11px] text-slate-400 font-medium mt-0.5">
                    {{ $isRtl ? 'موافقات التكليف بين الأطباء وهيئة التمريض لضمان استمرار السعة السريرية' : 'Managerial approvals for clinical duty changes to secure inpatient coverage' }}
                </p>
            </div>
            <span class="text-xs font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/15 px-3 py-1 rounded-full border border-[#14AFC3]/30" id="pendingSwapsCountBadge">
                {{ $isRtl ? '3 طلبات بانتظار الاعتماد' : '3 Pending Requests' }}
            </span>
        </div>

        <div class="divide-y divide-slate-100 dark:divide-slate-800 text-xs text-slate-600 dark:text-slate-300">
            {{-- طلب 1 --}}
            <div class="p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 hover:bg-slate-50/70 dark:hover:bg-slate-800/40 transition-colors" id="swapItem1">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-slate-900 dark:text-white">{{ $isRtl ? 'د. ريما الشامي (أطفال)' : 'Dr. Rima Al-Shami (Pediatrics)' }}</span>
                        <span class="text-slate-400">➔</span>
                        <span class="font-bold text-slate-700 dark:text-slate-300">{{ $isRtl ? 'د. خالد المعمري (أطفال)' : 'Dr. Khaled Al-Maamari (Pediatrics)' }}</span>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/15 dark:text-[#14AFC3] border border-[#14AFC3]/20">{{ $isRtl ? 'تبديل مناوبة' : 'Shift Swap' }}</span>
                    </div>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">
                        {{ $isRtl ? 'تبديل المناوبة المسائية ليوم غد الإثنين لتغطية ظرف عائلي طارئ مع التزام البديل بالحضور والتوقيع.' : 'Evening shift exchange for tomorrow Monday to cover emergency; backup confirmed.' }}
                    </p>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <button type="button" onclick="rejectSwap(1)" class="px-3.5 h-8.5 bg-white dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-750 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold rounded-xl transition-all cursor-pointer">
                        {{ $isRtl ? 'رفض' : 'Reject' }}
                    </button>
                    <button type="button" onclick="approveSwap(1, '{{ $isRtl ? 'د. ريما الشامي' : 'Dr. Rima Al-Shami' }}')" class="px-4 h-8.5 bg-[#14AFC3] hover:bg-[#0E94A6] text-white font-bold rounded-xl transition-all shadow-xs cursor-pointer">
                        {{ $isRtl ? 'اعتماد التبديل' : 'Approve Swap' }}
                    </button>
                </div>
            </div>

            {{-- طلب 2 --}}
            <div class="p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 hover:bg-slate-50/70 dark:hover:bg-slate-800/40 transition-colors" id="swapItem2">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-slate-900 dark:text-white">{{ $isRtl ? 'د. حسام الريمي (قلب)' : 'Dr. Husam Al-Reemi (Cardiology)' }}</span>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-purple-50 text-purple-700 dark:bg-purple-950/40 dark:text-purple-300 border border-purple-200">{{ $isRtl ? 'إجازة علمية مؤتمر' : 'Scientific Leave' }}</span>
                    </div>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">
                        {{ $isRtl ? 'إجازة 24 ساعة للمشاركة في مؤتمر القسطرة التداخلية، وتم تفويض د. عادل بالاستدعاء On-Call.' : '24h leave to attend Interventional Catheterization summit; On-call standby delegated.' }}
                    </p>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <button type="button" onclick="rejectSwap(2)" class="px-3.5 h-8.5 bg-white dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-750 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold rounded-xl transition-all cursor-pointer">
                        {{ $isRtl ? 'رفض' : 'Reject' }}
                    </button>
                    <button type="button" onclick="approveSwap(2, '{{ $isRtl ? 'د. حسام الريمي' : 'Dr. Husam Al-Reemi' }}')" class="px-4 h-8.5 bg-[#14AFC3] hover:bg-[#0E94A6] text-white font-bold rounded-xl transition-all shadow-xs cursor-pointer">
                        {{ $isRtl ? 'اعتماد الإجازة' : 'Approve Leave' }}
                    </button>
                </div>
            </div>

            {{-- طلب 3 --}}
            <div class="p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 hover:bg-slate-50/70 dark:hover:bg-slate-800/40 transition-colors" id="swapItem3">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-slate-900 dark:text-white">{{ $isRtl ? 'ممرضة أولى / أسماء الحيدري' : 'Nurse / Asma Al-Haidari' }}</span>
                        <span class="text-slate-400">➔</span>
                        <span class="font-bold text-slate-700 dark:text-slate-300">{{ $isRtl ? 'تحويل من الباطنية إلى العناية المركزة' : 'Reassignment to Adult ICU' }}</span>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/15 dark:text-[#14AFC3] border border-[#14AFC3]/20">{{ $isRtl ? 'نقل مساند' : 'Support Reassignment' }}</span>
                    </div>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">
                        {{ $isRtl ? 'طلب رئيسة التمريض لنقل ممرضة مؤهلة لدعم ضغط حالات العناية المركزة ICU اليوم.' : 'Head nurse request to deploy qualified nurse to handle adult ICU surge today.' }}
                    </p>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <button type="button" onclick="rejectSwap(3)" class="px-3.5 h-8.5 bg-white dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-750 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold rounded-xl transition-all cursor-pointer">
                        {{ $isRtl ? 'رفض' : 'Reject' }}
                    </button>
                    <button type="button" onclick="approveSwap(3, '{{ $isRtl ? 'الممرضة أسماء الحيدري' : 'Nurse Asma' }}')" class="px-4 h-8.5 bg-[#14AFC3] hover:bg-[#0E94A6] text-white font-bold rounded-xl transition-all shadow-xs cursor-pointer">
                        {{ $isRtl ? 'اعتماد النقل السريري' : 'Approve Reassignment' }}
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════
     6. نافذة Modal: معاينة وتصدير جدول المناوبات الرسمي PDF
     (#rosterExportModal)
══════════════════════════════════════════ --}}
<div id="rosterExportModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-3 sm:p-5 md:p-6 text-start overflow-y-auto" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="relative w-full max-w-4xl lg:max-w-5xl bg-white dark:bg-slate-900 rounded-3xl shadow-2xl border border-slate-200 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200 max-h-[92vh] flex flex-col my-auto">
        
        {{-- Modal Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 dark:border-slate-800 print:hidden bg-slate-50 dark:bg-slate-850 rounded-t-3xl">
            <div class="flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                <div>
                    <h3 class="text-sm sm:text-base font-bold text-slate-900 dark:text-white leading-tight">
                        {{ $isRtl ? 'جدول المناوبات والتكليف السريري المعتمد' : 'Official Clinical Duty Roster Dossier' }}
                    </h3>
                    <p class="text-[11px] text-slate-500 font-mono mt-0.5">
                        ROSTER-REF: RSD-ROSTER-2026-YE · MOH ACCREDITED
                    </p>
                </div>
            </div>

            <button type="button" onclick="closeRosterExportModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 p-2 rounded-xl hover:bg-slate-200/60 dark:hover:bg-slate-700 transition-colors cursor-pointer">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Printable Section Area --}}
        <div class="overflow-y-auto p-6 sm:p-8 md:p-10 flex-1 space-y-5" id="printableRosterSection">
            
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
                    <div class="font-bold text-slate-900 dark:text-white">REF: RSD-ROSTER-2026-YE</div>
                    <div class="text-slate-500 text-[11px] mt-0.5">{{ now()->format('Y-m-d H:i') }}</div>
                    <div class="inline-flex items-center gap-1 mt-1 px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <span>STATUS: ACCREDITED</span>
                    </div>
                </div>
            </div>

            {{-- Subject Banner --}}
            <div class="bg-gradient-to-r from-slate-50 to-[#E5FAFC]/40 dark:from-slate-800/80 dark:to-slate-800/40 p-4 sm:p-5 rounded-2xl border border-slate-200 dark:border-slate-700 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-s-4 border-s-[#14AFC3]">
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white">
                        {{ $isRtl ? 'جدول مناوبات وتوزيع الكادر الطبي والتمريضي المعتمد' : 'Official Physician & Clinical Workforce Duty Roster' }}
                    </h3>
                    <p class="text-xs text-slate-600 dark:text-slate-300 mt-1 leading-relaxed">
                        {{ $isRtl ? 'كشف المناوبات الصباحية وفرق الاستدعاء On-Call وتغطية الأجنحة السريرية الحرجة والعامة.' : 'Official allocation of on-duty specialists, on-call consultants, and inpatient ward coverages.' }}
                    </p>
                </div>
                <span class="text-xs font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-white dark:bg-slate-800 px-3 py-1.5 rounded-xl font-mono border border-slate-200 dark:border-slate-700 shrink-0 shadow-2xs">
                    SHIFT: MORNING (A)
                </span>
            </div>

            {{-- 4 Quick Metrics in Roster --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 text-center">
                <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700">
                    <span class="text-[10.5px] font-bold text-slate-500 block">{{ $isRtl ? 'المناوبين الفعليين' : 'Active On Duty' }}</span>
                    <span class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white font-mono block mt-1">64</span>
                    <span class="text-[10px] text-[#0C6B78] dark:text-[#14AFC3] font-medium block mt-1">{{ $isRtl ? 'أطباء وتمريض' : 'Clinicians' }}</span>
                </div>
                <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700">
                    <span class="text-[10.5px] font-bold text-slate-500 block">{{ $isRtl ? 'استشاريي الاحتياط' : 'On-Call Standby' }}</span>
                    <span class="text-xl sm:text-2xl font-black text-[#14AFC3] font-mono block mt-1">12</span>
                    <span class="text-[10px] text-slate-500 font-medium block mt-1">{{ $isRtl ? 'جاهزية فورية' : '24h Standby' }}</span>
                </div>
                <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700">
                    <span class="text-[10.5px] font-bold text-slate-500 block">{{ $isRtl ? 'نسبة تغطية الأجنحة' : 'Ward Coverage' }}</span>
                    <span class="text-xl sm:text-2xl font-black text-slate-800 dark:text-slate-100 font-mono block mt-1">98.4%</span>
                    <span class="text-[10px] text-slate-500 font-medium block mt-1">{{ $isRtl ? 'تغطية مكتملة' : 'Full Roster' }}</span>
                </div>
                <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700">
                    <span class="text-[10.5px] font-bold text-slate-500 block">{{ $isRtl ? 'الحالات المشرفة' : 'Inpatients Under Care' }}</span>
                    <span class="text-xl sm:text-2xl font-black text-slate-800 dark:text-slate-100 font-mono block mt-1">73</span>
                    <span class="text-[10px] text-slate-500 font-medium block mt-1">{{ $isRtl ? 'مريض منوم' : 'Inpatients' }}</span>
                </div>
            </div>

            {{-- Spacious Roster Data Table --}}
            <div class="border border-slate-200/80 dark:border-slate-700 rounded-3xl overflow-hidden shadow-sm">
                <div class="bg-slate-100/90 dark:bg-slate-800 px-4 py-3 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between text-xs font-bold text-slate-800 dark:text-slate-200">
                    <span class="text-xs sm:text-sm font-black">{{ $isRtl ? 'كشف الكوادر الطبية المكلفة بالمناوبة الحالية' : 'Current Duty Roster Allocation Table' }}</span>
                    <span class="text-[10.5px] font-mono px-2 py-0.5 rounded bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-slate-500">MOH-AUDIT-2026</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-xs text-start">
                        <thead class="bg-slate-50/90 dark:bg-slate-800/70 text-slate-700 dark:text-slate-200 font-extrabold border-b border-slate-200/80 dark:border-slate-700 text-[11.5px] uppercase tracking-wider">
                            <tr>
                                <th class="py-3 px-4 text-start">{{ $isRtl ? 'اسم الممارس الصحي' : 'Clinician Name' }}</th>
                                <th class="py-3 px-4 text-start">{{ $isRtl ? 'القسم / الجناح' : 'Department / Ward' }}</th>
                                <th class="py-3 px-4 text-center">{{ $isRtl ? 'المناوبة' : 'Shift' }}</th>
                                <th class="py-3 px-4 text-center">{{ $isRtl ? 'التحويلة والنداء' : 'Ext & Pager' }}</th>
                                <th class="py-3 px-4 text-center">{{ $isRtl ? 'الحالات' : 'Cases' }}</th>
                                <th class="py-3 px-4 text-center">{{ $isRtl ? 'الحالة التشغيلية' : 'Status' }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300">
                            @foreach($staffMembers as $s)
                                <tr class="even:bg-slate-50/70 dark:even:bg-slate-800/40">
                                    <td class="py-3 px-4 font-semibold text-slate-900 dark:text-white">
                                        <div>{{ $isRtl ? $s->name : $s->name_en }}</div>
                                        <div class="text-[10px] text-slate-400 font-normal">{{ $isRtl ? $s->title : $s->title_en }}</div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="font-bold text-slate-800 dark:text-slate-200">{{ $isRtl ? $s->dept : $s->dept_en }}</span>
                                        <span class="font-mono text-[10px] text-slate-500 block">{{ $s->dept_code }}</span>
                                    </td>
                                    <td class="py-3 px-4 text-center font-mono">
                                        {{ $s->shift === 'on_call' ? '24h On-Call' : ($isRtl ? 'صباحية (07:00 - 15:00)' : 'Morning (07:00 - 15:00)') }}
                                    </td>
                                    <td class="py-3 px-4 text-center font-mono font-bold text-slate-700 dark:text-slate-300">
                                        {{ $s->phone }} · {{ $s->pager_id }}
                                    </td>
                                    <td class="py-3 px-4 text-center font-mono font-bold text-[#14AFC3]">
                                        {{ $s->active_cases }}
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        @if($s->status === 'on_duty')
                                            <span class="px-2.5 py-1 rounded-md text-[10.5px] font-bold bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30">
                                                {{ $isRtl ? 'على رأس العمل' : 'On Duty' }}
                                            </span>
                                        @elseif($s->status === 'in_surgery')
                                            <span class="px-2.5 py-1 rounded-md text-[10.5px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-200">
                                                {{ $isRtl ? 'في العمليات' : 'In Surgery' }}
                                            </span>
                                        @else
                                            <span class="px-2.5 py-1 rounded-md text-[10.5px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                                {{ $isRtl ? 'احتياط On-Call' : 'On-Call' }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Sign-off and Seals --}}
            <div class="pt-6 border-t-2 border-slate-200 dark:border-slate-700 grid grid-cols-1 sm:grid-cols-3 gap-6 items-center text-center text-xs avoid-break-inside">
                <div>
                    <span class="text-[10.5px] font-bold text-slate-400 block mb-1.5">{{ $isRtl ? 'إعداد ومطابقة المناوبات' : 'Prepared By' }}</span>
                    <span class="font-bold text-slate-900 dark:text-white text-xs sm:text-sm block">{{ $isRtl ? 'د. مروان القدسي' : 'Dr. Marwan Al-Qudsi' }}</span>
                    <span class="text-[10.5px] text-slate-500 block mt-0.5">{{ $isRtl ? 'مدير الشؤون الطبية والسريرية' : 'Director of Medical Affairs' }}</span>
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

        {{-- Modal Footer --}}
        <div class="p-4 sm:p-5 border-t border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-850 rounded-b-3xl flex flex-wrap items-center justify-between gap-3 print:hidden">
            <span class="text-xs text-slate-500 font-medium">
                {{ $isRtl ? 'المستند معتمد وجاهز للطباعة بدقة A4 كاملة دون أي فراغات.' : 'Accredited roster ready for A4 export and printing.' }}
            </span>

            <div class="flex items-center gap-2.5">
                <button type="button" onclick="closeRosterExportModal()" class="px-4 py-2 bg-white dark:bg-slate-800 hover:bg-slate-100 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 text-xs font-bold rounded-xl transition-colors cursor-pointer">
                    {{ $isRtl ? 'إغلاق' : 'Close' }}
                </button>

                <button type="button" onclick="downloadRosterCSV()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 dark:bg-slate-800 dark:hover:bg-slate-750 dark:text-slate-200 border border-slate-200 dark:border-slate-700 text-xs font-bold rounded-xl transition-all shadow-2xs flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    <span>{{ $isRtl ? 'تصدير Excel' : 'Export Excel' }}</span>
                </button>

                <button type="button" onclick="triggerRosterPrint()" class="px-5 py-2 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:opacity-95 text-white text-xs font-bold rounded-xl transition-all shadow-xs flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    <span>{{ $isRtl ? 'طباعة / حفظ PDF' : 'Print / Save PDF' }}</span>
                </button>
            </div>
        </div>

    </div>
</div>

{{-- ══════════════════════════════════════════
     7. نافذة Modal تفاعلية: «تعديل تكليف المناوبة»
     (#reassignModal)
══════════════════════════════════════════ --}}
<div id="reassignModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-4 text-start" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-lg w-full p-6 shadow-2xl border border-slate-200 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
        <div class="flex items-center justify-between pb-3.5 border-b border-slate-100 dark:border-slate-800">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/15 dark:text-[#14AFC3] flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white">{{ $isRtl ? 'تعديل تكليف المناوبة السريرية' : 'Reassign Clinical Duty' }}</h3>
                    <p class="text-[11px] text-slate-500" id="reassignSub">{{ $isRtl ? 'تعديل تكليف الطبيب' : 'Adjust physician duty' }}</p>
                </div>
            </div>
            <button type="button" onclick="closeReassignModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 p-1.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>

        <form onsubmit="submitReassignment(event)" class="mt-4 space-y-4 text-xs">
            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'الجناح أو القسم المكلف به' : 'Assigned Ward' }}</label>
                <select id="reassignDeptSelect" class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-900 dark:text-white font-bold focus:border-[#14AFC3] focus:outline-none">
                    <option value="العناية المركزة الفائقة (ICU)">{{ $isRtl ? 'العناية المركزة الفائقة (ICU)' : 'Intensive Care Unit (ICU)' }}</option>
                    <option value="طوارئ وإصابات الحوادث (ER)">{{ $isRtl ? 'طوارئ وإصابات الحوادث (ER)' : 'Emergency & Trauma (ER)' }}</option>
                    <option value="قسم الجراحة والعمليات">{{ $isRtl ? 'قسم الجراحة والعمليات' : 'General Surgery Department' }}</option>
                    <option value="مركز أمراض القلب والقسطرة">{{ $isRtl ? 'مركز أمراض القلب والقسطرة' : 'Cardiology Center' }}</option>
                    <option value="قسم الباطنية العامة">{{ $isRtl ? 'قسم الباطنية العامة' : 'Internal Medicine Department' }}</option>
                    <option value="قسم الأطفال والحضانات (NICU)">{{ $isRtl ? 'قسم الأطفال والحضانات (NICU)' : 'Pediatrics & Neonatal Care' }}</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'فترة المناوبة' : 'Shift Period' }}</label>
                <select id="reassignShiftSelect" class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-900 dark:text-white font-bold focus:border-[#14AFC3] focus:outline-none">
                    <option value="morning">{{ $isRtl ? 'المناوبة الصباحية (07:00 - 15:00)' : 'Morning Shift (07:00 - 15:00)' }}</option>
                    <option value="evening">{{ $isRtl ? 'المناوبة المسائية (15:00 - 23:00)' : 'Evening Shift (15:00 - 23:00)' }}</option>
                    <option value="night">{{ $isRtl ? 'المناوبة الليلية (23:00 - 07:00)' : 'Night Shift (23:00 - 07:00)' }}</option>
                    <option value="on_call">{{ $isRtl ? 'احتياط استدعاء On-Call (24 ساعة)' : 'On-Call Standby (24 Hours)' }}</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'مسوّغ التكليف الإداري' : 'Operational Rationale' }}</label>
                <textarea rows="2.5" required placeholder="{{ $isRtl ? 'تغطية نقص مفاجئ أو تلبية ضغط حالات حرجة بالأجنحة...' : 'Operational rationale for clinical reassignment...' }}" class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-900 dark:text-white focus:border-[#14AFC3] focus:outline-none"></textarea>
            </div>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="closeReassignModal()" class="px-4 py-2 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 font-bold transition-colors cursor-pointer">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="submit" class="px-5 py-2 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:opacity-95 text-white rounded-xl font-bold transition-all shadow-xs cursor-pointer">
                    {{ $isRtl ? 'حفظ وتعميم التكليف' : 'Save Duty Assignment' }}
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ══════════════════════════════════════════
     8. نافذة Modal تفاعلية: «استدعاء طارئ On-Call»
     (#broadcastModal)
══════════════════════════════════════════ --}}
<div id="broadcastModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-4 text-start" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-lg w-full p-6 shadow-2xl border border-slate-200 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
        <div class="flex items-center justify-between pb-3.5 border-b border-slate-100 dark:border-slate-800">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-rose-50 text-rose-600 dark:bg-rose-950/40 dark:text-rose-400 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-slate-900 dark:text-white">{{ $isRtl ? 'استدعاء أطباء الاحتياط (On-Call Pager)' : 'Dispatch On-Call Force' }}</h3>
                    <p class="text-[11px] text-slate-400">{{ $isRtl ? 'إرسال نداء فوري عبر شبكة البيجر ورسائل SMS' : 'Immediate clinical pager alert' }}</p>
                </div>
            </div>
            <button type="button" onclick="closeBroadcastModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 p-1.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>

        <form onsubmit="submitBroadcast(event)" class="mt-4 space-y-4 text-xs">
            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'فريق الاحتياط المستهدف' : 'Target Standby Team' }}</label>
                <select class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-900 dark:text-white font-bold focus:border-[#14AFC3] focus:outline-none">
                    <option>{{ $isRtl ? 'جميع استشاريي الاحتياط (12 استشارياً)' : 'All On-Call Consultants (12)' }}</option>
                    <option>{{ $isRtl ? 'فريق جراحة العظام والإصابات' : 'Orthopedics & Trauma Team' }}</option>
                    <option>{{ $isRtl ? 'فريق القسطرة وجراحة القلب' : 'Cardiology & Catheterization Team' }}</option>
                    <option>{{ $isRtl ? 'فريق الإنعاش والعناية الفائقة' : 'Critical Care & Resuscitation Team' }}</option>
                    <option>{{ $isRtl ? 'فريق النساء والتوليد والعمليات' : 'Maternity & OBGYN Team' }}</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'مستوى أولوية النداء' : 'Alert Priority Level' }}</label>
                <div class="grid grid-cols-3 gap-2">
                    <label class="flex items-center gap-2 p-2 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 cursor-pointer text-xs font-semibold">
                        <input type="radio" name="priority" value="normal" class="text-[#14AFC3]">
                        <span>{{ $isRtl ? 'عادي' : 'Normal' }}</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 rounded-xl border border-amber-200 bg-amber-50/50 dark:bg-amber-950/20 text-amber-800 dark:text-amber-300 cursor-pointer text-xs font-bold">
                        <input type="radio" name="priority" value="urgent" checked class="text-amber-600">
                        <span>{{ $isRtl ? 'عاجل (خلال 20 د)' : 'Urgent (<20m)' }}</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 rounded-xl border border-rose-200 bg-rose-50/50 dark:bg-rose-950/20 text-rose-800 dark:text-rose-300 cursor-pointer text-xs font-bold">
                        <input type="radio" name="priority" value="emergency" class="text-rose-600">
                        <span>{{ $isRtl ? 'كود أحمر طارئ' : 'Code Red' }}</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'نص النداء الفوري' : 'Pager Message' }}</label>
                <textarea rows="2.5" required placeholder="{{ $isRtl ? 'يرجى التوجه فوراً لقسم الطوارئ / العناية المركزة لمساندة الكادر الطبي واستيعاب الحالات الحرجة...' : 'Urgent dispatch to ER/ICU for clinical surge support...' }}" class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-900 dark:text-white focus:border-[#14AFC3] focus:outline-none"></textarea>
            </div>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="closeBroadcastModal()" class="px-4 py-2 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 font-bold transition-colors cursor-pointer">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="submit" class="px-5 py-2 bg-gradient-to-r from-rose-600 to-rose-700 hover:opacity-95 text-white rounded-xl font-bold transition-all shadow-xs cursor-pointer">
                    {{ $isRtl ? 'إرسال النداء الفوري' : 'Send Urgent Alert' }}
                </button>
            </div>
        </form>
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
    let pendingSwapsCount = 3;

    function filterStaffRole(status, btn) {
        document.querySelectorAll('.staff-filter-btn').forEach(b => {
            b.classList.remove('bg-[#14AFC3]', 'text-white', 'shadow-2xs', 'font-bold');
            b.classList.add('bg-slate-50', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300', 'font-medium');
        });
        btn.classList.remove('bg-slate-50', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300', 'font-medium');
        btn.classList.add('bg-[#14AFC3]', 'text-white', 'shadow-2xs', 'font-bold');

        const cards = document.querySelectorAll('.staff-card');
        cards.forEach(card => {
            if (status === 'all' || card.getAttribute('data-status') === status) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function searchStaff() {
        const query = document.getElementById('staffSearchInput').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.staff-card');
        cards.forEach(card => {
            const name = card.getAttribute('data-name') || '';
            const dept = card.getAttribute('data-dept') || '';
            if (name.includes(query) || dept.includes(query)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function pagerStaff(name, phone, pagerId) {
        showToast(isRtl ? `تم إرسال نداء استدعاء عاجل إلى [${name}] على تحويلة ${phone} (${pagerId}).` : `Emergency pager alert dispatched to [${name}] (${phone} - ${pagerId}).`);
    }

    function reassignShift(name, dept, shift) {
        document.getElementById('reassignSub').innerText = isRtl ? `تعديل تكليف: ${name} (${dept})` : `Reassign: ${name} (${dept})`;
        const m = document.getElementById('reassignModal');
        m.classList.remove('hidden');
        m.classList.add('flex');
    }

    function closeReassignModal() {
        const m = document.getElementById('reassignModal');
        m.classList.add('hidden');
        m.classList.remove('flex');
    }

    function submitReassignment(e) {
        e.preventDefault();
        closeReassignModal();
        showToast(isRtl ? 'تم تحديث التكليف وتعميمه على جدول المناوبات بنجاح.' : 'Duty assignment updated and published to roster.');
    }

    function openBroadcastModal() {
        const m = document.getElementById('broadcastModal');
        m.classList.remove('hidden');
        m.classList.add('flex');
    }

    function closeBroadcastModal() {
        const m = document.getElementById('broadcastModal');
        m.classList.add('hidden');
        m.classList.remove('flex');
    }

    function submitBroadcast(e) {
        e.preventDefault();
        closeBroadcastModal();
        showToast(isRtl ? 'تم بث النداء الطارئ لكافة أطباء الاحتياط بنجاح عبر شبكة البيجر.' : 'Emergency pager broadcast dispatched to all on-call force.');
    }

    function approveSwap(id, name) {
        const el = document.getElementById(`swapItem${id}`);
        if (el) {
            el.style.opacity = '0.35';
            el.style.pointerEvents = 'none';
            el.classList.add('bg-emerald-50/40');
        }
        pendingSwapsCount = Math.max(0, pendingSwapsCount - 1);
        updatePendingBadge();
        showToast(isRtl ? `تم اعتماد وتوثيق طلب التبديل لـ [${name}].` : `Shift swap approved and logged for [${name}].`);
    }

    function rejectSwap(id) {
        const el = document.getElementById(`swapItem${id}`);
        if (el) {
            el.style.opacity = '0.35';
            el.style.pointerEvents = 'none';
            el.classList.add('bg-rose-50/40');
        }
        pendingSwapsCount = Math.max(0, pendingSwapsCount - 1);
        updatePendingBadge();
        showToast(isRtl ? 'تم رفض الطلب وإشعار صاحب الطلب بالسبب الإداري.' : 'Request rejected and staff notified.');
    }

    function updatePendingBadge() {
        const badge = document.getElementById('pendingSwapsCountBadge');
        if (badge) {
            badge.innerText = isRtl ? `${pendingSwapsCount} طلبات بانتظار الاعتماد` : `${pendingSwapsCount} Pending Requests`;
            if (pendingSwapsCount === 0) {
                badge.innerText = isRtl ? 'تمت معالجة كافة الطلبات' : 'All Requests Cleared';
                badge.classList.remove('text-[#0C6B78]', 'bg-[#E5FAFC]');
                badge.classList.add('text-emerald-700', 'bg-emerald-50');
            }
        }
    }

    // ══════════════════════════════════════════
    // نافذة تصدير وطباعة جدول المناوبات الرسمي
    // ══════════════════════════════════════════
    function exportRosterPDF() {
        const m = document.getElementById('rosterExportModal');
        m.classList.remove('hidden');
        m.classList.add('flex');
    }

    function closeRosterExportModal() {
        const m = document.getElementById('rosterExportModal');
        m.classList.add('hidden');
        m.classList.remove('flex');
    }

    function triggerRosterPrint() {
        window.scrollTo(0, 0);
        document.body.classList.add('printing-roster');
        setTimeout(() => {
            window.print();
        }, 200);
    }

    window.addEventListener('afterprint', () => {
        document.body.classList.remove('printing-roster');
    });

    function downloadRosterCSV() {
        let csv = '\uFEFF';
        csv += 'الجمهورية اليمنية - وزارة الصحة العامة والسكان - أمانة العاصمة صنعاء\r\n';
        csv += 'مستشفى الرشيد التخصصي - جدول مناوبات الكادر الطبي المعتمد\r\n';
        csv += 'المرجع الرسمي: RSD-ROSTER-2026-YE\r\n';
        csv += `تاريخ التصدير: ${new Date().toISOString().substring(0, 10)}\r\n\r\n`;

        csv += 'اسم الطبيب / الممارس,التخصص / المسمى,القسم الطبي,كود الجناح,المناوبة,التحويلة,البيجر,الحالات المشرفة,الحالة\r\n';
        csv += 'د. طارق عبدالإله الزبير,استشاري ورئيس وحدة العناية المركزة (ICU),العناية المركزة الفائقة,ICU-A,صباحية,ext. 3012,PGR-101,12,على رأس العمل\r\n';
        csv += 'د. منى عبدالعزيز النمري,استشارية طب الطوارئ والحوادث,قسم الطوارئ والإصابات,ER-01,صباحية,ext. 1005,PGR-104,18,على رأس العمل\r\n';
        csv += 'د. سامي عبدالحميد القاضي,استشاري الجراحة العامة والمناظير,قسم الجراحة والعمليات,SURG-B,صباحية,ext. 4022,PGR-208,6,في العمليات\r\n';
        csv += 'د. حسام عادل الريمي,استشاري أمراض القلب والقسطرة التداخلية,مركز أمراض القلب,CARD-02,24h On-Call,ext. 2208,PGR-303,4,احتياط On-Call\r\n';
        csv += 'د. ريما عصام الشامي,أخصائية أولى طب الأطفال وحديثي الولادة,قسم الأطفال والحضانات (NICU),PED-A,صباحية,ext. 1140,PGR-411,9,على رأس العمل\r\n';
        csv += 'د. فؤاد سنان الخولاني,استشاري الباطنية والأمراض الصدرية,قسم الباطنية العامة,MED-C,صباحية,ext. 2015,PGR-512,14,على رأس العمل\r\n';
        csv += 'د. ندى منصور الكبسي,استشارية النساء والتوليد وجراحة الأمومة,قسم النساء والتوليد,OBGYN-1,صباحية,ext. 1224,PGR-609,7,على رأس العمل\r\n';
        csv += 'د. عصام صالح المقطري,استشاري جراحة العظام والمفاصل,قسم العظام والإصابات,ORTHO-D,24h On-Call,ext. 5010,PGR-720,3,احتياط On-Call\r\n';

        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `RSD_Clinical_Roster_${new Date().toISOString().substring(0, 10)}.csv`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showToast(isRtl ? 'تم تنزيل جدول المناوبات كملف Excel بنجاح.' : 'Duty Roster CSV downloaded successfully.');
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
