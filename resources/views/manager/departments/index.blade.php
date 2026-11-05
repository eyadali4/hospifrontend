@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    // بيانات الأقسام التشغيلية والأسرة مدعومة بالكامل باللغتين
    $departments = $departments ?? collect([
        (object)[
            'id' => 1,
            'name' => 'العناية المركزة الفائقة (ICU)',
            'name_en' => 'Intensive Care Unit (ICU)',
            'code' => 'ICU-A',
            'building' => 'المبنى الرئيسي - الطابق 3 (جناح أ)',
            'building_en' => 'Main Building - Floor 3 (Wing A)',
            'category' => 'icu',
            'total_beds' => 28,
            'occupied_beds' => 25,
            'available_beds' => 2,
            'cleaning_beds' => 1,
            'occupancy_rate' => 89,
            'head' => 'د. طارق عبدالإله الزبير',
            'head_en' => 'Dr. Tareq Al-Zubair',
            'head_phone' => 'ext. 3012',
            'critical_cases' => 12,
            'turnover_rate' => '2.1x',
            'status' => 'critical',
        ],
        (object)[
            'id' => 2,
            'name' => 'طوارئ وإصابات الحوادث (ER)',
            'name_en' => 'Emergency & Trauma (ER)',
            'code' => 'ER-01',
            'building' => 'المبنى الطبي - الطابق الأرضي',
            'building_en' => 'Medical Building - Ground Floor',
            'category' => 'emergency',
            'total_beds' => 55,
            'occupied_beds' => 47,
            'available_beds' => 6,
            'cleaning_beds' => 2,
            'occupancy_rate' => 85,
            'head' => 'د. منى عبدالعزيز النمري',
            'head_en' => 'Dr. Muna Al-Nemri',
            'head_phone' => 'ext. 1005',
            'critical_cases' => 9,
            'turnover_rate' => '5.8x',
            'status' => 'busy',
        ],
        (object)[
            'id' => 3,
            'name' => 'قسم الجراحة العامة والمناظير',
            'name_en' => 'General Surgery & Laparoscopy',
            'code' => 'SURG-B',
            'building' => 'المبنى الرئيسي - الطابق 4 (جناح ب)',
            'building_en' => 'Main Building - Floor 4 (Wing B)',
            'category' => 'surgical',
            'total_beds' => 65,
            'occupied_beds' => 51,
            'available_beds' => 10,
            'cleaning_beds' => 4,
            'occupancy_rate' => 78,
            'head' => 'د. سامي عبدالحميد القاضي',
            'head_en' => 'Dr. Sami Al-Qadhi',
            'head_phone' => 'ext. 4022',
            'critical_cases' => 4,
            'turnover_rate' => '3.4x',
            'status' => 'normal',
        ],
        (object)[
            'id' => 4,
            'name' => 'أمراض القلب والقسطرة القلبية',
            'name_en' => 'Cardiology & Catheterization',
            'code' => 'CARD-02',
            'building' => 'المبنى التخصصي - الطابق 2',
            'building_en' => 'Specialized Tower - Floor 2',
            'category' => 'internal',
            'total_beds' => 42,
            'occupied_beds' => 36,
            'available_beds' => 4,
            'cleaning_beds' => 2,
            'occupancy_rate' => 86,
            'head' => 'د. حسام عادل الريمي',
            'head_en' => 'Dr. Husam Al-Reemi',
            'head_phone' => 'ext. 2208',
            'critical_cases' => 7,
            'turnover_rate' => '3.1x',
            'status' => 'busy',
        ],
        (object)[
            'id' => 5,
            'name' => 'الباطنية العامة والأمراض الصدرية',
            'name_en' => 'Internal & Respiratory Medicine',
            'code' => 'MED-C',
            'building' => 'المبنى الرئيسي - الطابق 2 (جناح ج)',
            'building_en' => 'Main Building - Floor 2 (Wing C)',
            'category' => 'internal',
            'total_beds' => 60,
            'occupied_beds' => 54,
            'available_beds' => 3,
            'cleaning_beds' => 3,
            'occupancy_rate' => 90,
            'head' => 'د. فؤاد سنان الخولاني',
            'head_en' => 'Dr. Fouad Al-Kholani',
            'head_phone' => 'ext. 2015',
            'critical_cases' => 5,
            'turnover_rate' => '3.6x',
            'status' => 'critical',
        ],
        (object)[
            'id' => 6,
            'name' => 'الأطفال والحضانات المبتسرة (NICU)',
            'name_en' => 'Pediatrics & Neonatal Care (NICU)',
            'code' => 'PED-A',
            'building' => 'المبنى الشرقي - الطابق 1',
            'building_en' => 'East Wing - Floor 1',
            'category' => 'pediatrics',
            'total_beds' => 50,
            'occupied_beds' => 38,
            'available_beds' => 9,
            'cleaning_beds' => 3,
            'occupancy_rate' => 76,
            'head' => 'د. ريما عصام الشامي',
            'head_en' => 'Dr. Rima Al-Shami',
            'head_phone' => 'ext. 1140',
            'critical_cases' => 6,
            'turnover_rate' => '2.9x',
            'status' => 'normal',
        ],
        (object)[
            'id' => 7,
            'name' => 'النساء والتوليد وجراحة الأمومة',
            'name_en' => 'Obstetrics & Gynecology (Maternity)',
            'code' => 'OBGYN-1',
            'building' => 'المبنى الشرقي - الطابق 2',
            'building_en' => 'East Wing - Floor 2',
            'category' => 'maternity',
            'total_beds' => 46,
            'occupied_beds' => 34,
            'available_beds' => 9,
            'cleaning_beds' => 3,
            'occupancy_rate' => 74,
            'head' => 'د. ندى منصور الكبسي',
            'head_en' => 'Dr. Nada Al-Kibsi',
            'head_phone' => 'ext. 1224',
            'critical_cases' => 2,
            'turnover_rate' => '4.2x',
            'status' => 'normal',
        ],
        (object)[
            'id' => 8,
            'name' => 'جراحة العظام والإصابات الرياضية',
            'name_en' => 'Orthopedics & Joint Surgery',
            'code' => 'ORTHO-D',
            'building' => 'المبنى الرئيسي - الطابق 5',
            'building_en' => 'Main Building - Floor 5',
            'category' => 'surgical',
            'total_beds' => 34,
            'occupied_beds' => 26,
            'available_beds' => 6,
            'cleaning_beds' => 2,
            'occupancy_rate' => 76,
            'head' => 'د. عصام صالح المقطري',
            'head_en' => 'Dr. Essam Al-Maqtari',
            'head_phone' => 'ext. 5010',
            'critical_cases' => 1,
            'turnover_rate' => '2.7x',
            'status' => 'normal',
        ],
    ]);

    // الإحصائيات الشاملة
    $totalCapacity = $departments->sum('total_beds');
    $totalOccupied = $departments->sum('occupied_beds');
    $totalAvailable = $departments->sum('available_beds');
    $totalCleaning = $departments->sum('cleaning_beds');
    $overallOccupancy = round(($totalOccupied / max($totalCapacity, 1)) * 100, 1);
    $criticalDeptsCount = $departments->where('status', 'critical')->count();
    $icu = $departments->firstWhere('category', 'icu');
@endphp

@section('page-title', $isRtl ? 'أعباء الأقسام والسعة السريرية' : 'Department Workloads & Bed Capacity')
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

    <x-sidebar-link :href="Route::has('manager.departments.index') ? route('manager.departments.index') : '#'" :active="true">
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
                    <path d="M3 3v18h18"/>
                    <path d="M18.7 8 13 13.7l-4-4L3 16"/>
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
     PRINT STYLESHEET (OFFICIAL CENSUS DOSSIER)
══════════════════════════════════════════ --}}
<style>
    @media print {
        body * { visibility: hidden; }
        #printableCensusSection, #printableCensusSection * { visibility: visible; }
        #printableCensusSection {
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

    {{-- 1. رأس الصفحة والإجراءات التنفيذية (Clean Title with Teal Dot) --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-2 border-b border-slate-100 dark:border-slate-800">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] shadow-sm shadow-[#14AFC3]/40"></span>
                <h1 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                    {{ $isRtl ? 'أعباء الأقسام وإدارة السعة السريرية' : 'Department Workloads & Bed Capacity' }}
                </h1>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-1">
                {{ $isRtl ? 'متابعة لحظية لإشغال الأجنحة، تدفق الحالات السريرية، وموازنة السعة الاستيعابية بين الأقسام.' : 'Real-time wing telemetry, patient flow, and clinical bed reallocation control.' }}
            </p>
        </div>

        <div class="flex items-center gap-2">
            {{-- مؤشر التحديث الحي --}}
            <div class="hidden sm:flex items-center gap-2 px-3 h-9 bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700 rounded-xl text-xs font-bold text-slate-700 dark:text-slate-200 shadow-xs">
                <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                <span>{{ $isRtl ? 'تحديث حي' : 'Live' }}: <span id="clockDisplay" class="font-mono">{{ now()->format('H:i') }}</span></span>
            </div>

            {{-- زر تصدير بيان الإشغال (Modal) --}}
            <button type="button" onclick="exportBedCensus()" class="px-3.5 h-9 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-xs font-bold text-slate-700 dark:text-slate-200 transition-all shadow-xs flex items-center gap-1.5 cursor-pointer hover:border-[#14AFC3]">
                <div class="w-4 h-4 rounded-md bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <span>{{ $isRtl ? 'تصدير بيان الإشغال' : 'Export Census' }}</span>
            </button>

            {{-- زر إعادة موازنة وتوزيع الأسرة --}}
            <button type="button" onclick="openReallocationModal()" class="px-3.5 h-9 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#09525D] text-white text-xs font-bold rounded-xl transition-all shadow-xs flex items-center gap-1.5 cursor-pointer">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 3H5a2 2 0 00-2 2v3m18 0V5a2 2 0 00-2-2h-3m0 18h3a2 2 0 002-2v-3M3 16v3a2 2 0 002 2h3"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12l-4-4-4 4M12 8v8"/>
                </svg>
                <span>{{ $isRtl ? 'إعادة موازنة الأسرة' : 'Reallocate Beds' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         2. بطاقات قياس الأداء الرباعية الموحدة (CENTERED KPI STAT CARDS)
         "الايقونه تكون في الوسط والنص اسفلها"
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5">
        
        {{-- كرت 1: السعة السريرية الحية (Teal Highlighted) --}}
        <x-stat-card
            :label="$isRtl ? 'إجمالي السعة السريرية الحية' : __('Total Bed Capacity')"
            :value="$totalCapacity"
            :sublabel="$isRtl ? 'مشغول: ' . $totalOccupied . ' · شاغر: ' . $totalAvailable : $totalOccupied . ' Occ · ' . $totalAvailable . ' Avail'"
            :highlighted="true"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- كرت 2: نسبة الإشغال العام للمستشفى --}}
        <x-stat-card
            :label="$isRtl ? 'النسبة الكلية لإشغال الأسرة' : __('Overall Bed Occupancy')"
            :value="$overallOccupancy . '%'"
            :sublabel="$isRtl ? $criticalDeptsCount . ' أجنحة بلغت ذروة الإشغال' : $criticalDeptsCount . ' peak wings'"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 3"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- كرت 3: أسرة العناية الفائقة (ICU) --}}
        <x-stat-card
            :label="$isRtl ? 'أسرة العناية الفائقة (ICU)' : __('Critical Care (ICU) Beds')"
            :value="($icu->occupied_beds ?? 25) . ' / ' . ($icu->total_beds ?? 28)"
            :sublabel="$isRtl ? ($icu->available_beds ?? 2) . ' أسرة شاغرة فوراً' : ($icu->available_beds ?? 2) . ' beds ready'"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- كرت 4: معدل دوران وتفريغ الأسرة --}}
        <x-stat-card
            :label="$isRtl ? 'معدل دوران وتفريغ الأسرة' : __('Daily Bed Turnover')"
            value="3.8x"
            :sublabel="$isRtl ? 'متوسط مدة الإقامة: 3.4 أيام' : __('Avg LOS: 3.4 days')"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

    </div>

    {{-- ══════════════════════════════════════════
         3. شريط الفلترة السريعة والبحث الموحد
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl p-3 shadow-xs flex flex-col md:flex-row items-center justify-between gap-3">
        
        {{-- حقول الفلترة بالأزرار الحديثة --}}
        <div class="flex items-center gap-1.5 overflow-x-auto w-full md:w-auto pb-1 md:pb-0 text-xs">
            <button type="button" onclick="filterDeptCategory('all', this)" class="dept-filter-btn px-3 py-1.5 rounded-xl font-bold bg-[#14AFC3] text-white shadow-xs transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'جميع الأقسام (8)' : 'All Wings (8)' }}
            </button>
            <button type="button" onclick="filterDeptCategory('icu', this)" class="dept-filter-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'العناية المركزة' : 'ICU' }}
            </button>
            <button type="button" onclick="filterDeptCategory('emergency', this)" class="dept-filter-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'الطوارئ والإصابات' : 'Emergency' }}
            </button>
            <button type="button" onclick="filterDeptCategory('surgical', this)" class="dept-filter-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'الجراحة والعمليات' : 'Surgery' }}
            </button>
            <button type="button" onclick="filterDeptCategory('internal', this)" class="dept-filter-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'الباطنية والقلب' : 'Internal Med' }}
            </button>
            <button type="button" onclick="filterDeptCategory('pediatrics', this)" class="dept-filter-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 transition-all shrink-0 cursor-pointer">
                {{ $isRtl ? 'الأطفال والولادة' : 'Pediatrics & Ob' }}
            </button>
        </div>

        {{-- حقل البحث الفوري المدمج بالأيقونة --}}
        <div class="relative w-full md:w-72 shrink-0">
            <span class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none text-slate-400">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </span>
            <input type="text" id="deptSearchInput" onkeyup="searchDepartments()"
                   placeholder="{{ $isRtl ? 'بحث باسم القسم أو المشرف أو الكود...' : 'Search wing or head doctor...' }}"
                   class="w-full h-8.5 {{ $isRtl ? 'pr-8 pl-3' : 'pl-8 pr-3' }} bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-xs font-medium text-slate-900 dark:text-white outline-none focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/15 transition-all placeholder:text-slate-400">
        </div>

    </div>

    {{-- ══════════════════════════════════════════
         4. شبكة كروت الأقسام السريرية (MODERN TELEMETRY)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3.5" id="deptCardsContainer">
        @foreach($departments as $dept)
        <div class="dept-card bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl p-4 sm:p-5 shadow-xs hover:border-[#14AFC3]/40 transition-all flex flex-col justify-between group"
             data-name="{{ strtolower($dept->name . ' ' . $dept->name_en) }}"
             data-head="{{ strtolower($dept->head . ' ' . $dept->head_en) }}"
             data-category="{{ $dept->category }}"
             data-status="{{ $dept->status }}">

            <div>
                {{-- Header --}}
                <div class="flex items-start justify-between gap-2">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-0.5 rounded-md text-[10px] font-black tracking-wider bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200/80 dark:border-slate-700 font-mono">
                                {{ $dept->code }}
                            </span>
                            <h3 class="text-sm font-black text-slate-900 dark:text-white group-hover:text-[#14AFC3] transition-colors">
                                {{ $isRtl ? $dept->name : $dept->name_en }}
                            </h3>
                        </div>
                        <p class="text-[11px] text-slate-400 font-medium mt-1 flex items-center gap-1.5">
                            <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <span>{{ $isRtl ? $dept->building : $dept->building_en }}</span>
                        </p>
                    </div>

                    {{-- Status Badge --}}
                    <div>
                        @if($dept->status === 'critical')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10.5px] font-black bg-rose-50 text-rose-700 dark:bg-rose-950/40 dark:text-rose-300 border border-rose-200 dark:border-rose-900/50 shadow-2xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-pulse"></span>
                                <span>{{ $isRtl ? 'ذروة استيعاب' : 'Peak Capacity' }}</span>
                                <span class="font-mono" dir="ltr">({{ $dept->occupancy_rate }}%)</span>
                            </span>
                        @elseif($dept->status === 'busy')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10.5px] font-black bg-amber-50 text-amber-700 dark:bg-amber-950/40 dark:text-amber-300 border border-amber-200 dark:border-amber-900/50 shadow-2xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                <span>{{ $isRtl ? 'إشغال مكثف' : 'High Load' }}</span>
                                <span class="font-mono" dir="ltr">({{ $dept->occupancy_rate }}%)</span>
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10.5px] font-black bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/15 dark:text-[#14AFC3] border border-[#14AFC3]/30 shadow-2xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                                <span>{{ $isRtl ? 'سعة منتظمة' : 'Stable' }}</span>
                                <span class="font-mono" dir="ltr">({{ $dept->occupancy_rate }}%)</span>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Telemetry Occupancy Progress Bar --}}
                <div class="mt-3.5">
                    <div class="flex items-center justify-between text-xs mb-1.5 font-bold">
                        <span class="text-slate-500 dark:text-slate-400 text-[11px]">{{ $isRtl ? 'معدل شغل الأسرة' : 'Bed Occupancy Gauge' }}</span>
                        <span class="text-slate-900 dark:text-white font-mono" dir="ltr">{{ $dept->occupied_beds }} / {{ $dept->total_beds }} {{ $isRtl ? 'سرير' : 'beds' }}</span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2 overflow-hidden">
                        <div class="h-2 rounded-full transition-all duration-700 {{ $dept->status === 'critical' ? 'bg-gradient-to-r from-rose-500 to-amber-500' : ($dept->status === 'busy' ? 'bg-gradient-to-r from-amber-500 to-[#14AFC3]' : 'bg-gradient-to-r from-[#14AFC3] to-[#0C6B78]') }}"
                             style="width: {{ $dept->occupancy_rate }}%"></div>
                    </div>
                </div>

                {{-- Matrix Grid --}}
                <div class="mt-3.5 grid grid-cols-4 gap-2 bg-slate-50/70 dark:bg-slate-800/40 p-2.5 rounded-xl border border-slate-100 dark:border-slate-800 text-center">
                    <div>
                        <span class="text-[10px] text-slate-400 font-bold block">{{ $isRtl ? 'الإجمالي' : 'Total' }}</span>
                        <span class="text-xs font-black text-slate-900 dark:text-white font-mono mt-0.5 block" dir="ltr">{{ $dept->total_beds }}</span>
                    </div>
                    <div class="border-s border-slate-200/80 dark:border-slate-700">
                        <span class="text-[10px] text-slate-500 dark:text-slate-400 font-bold block">{{ $isRtl ? 'مشغول' : 'Occupied' }}</span>
                        <span class="text-xs font-black text-slate-900 dark:text-white font-mono mt-0.5 block" dir="ltr">{{ $dept->occupied_beds }}</span>
                    </div>
                    <div class="border-s border-slate-200/80 dark:border-slate-700">
                        <span class="text-[10px] text-teal-600 dark:text-[#14AFC3] font-bold block">{{ $isRtl ? 'متاح فوراً' : 'Available' }}</span>
                        <span class="text-xs font-black text-[#14AFC3] font-mono mt-0.5 block" dir="ltr">{{ $dept->available_beds }}</span>
                    </div>
                    <div class="border-s border-slate-200/80 dark:border-slate-700">
                        <span class="text-[10px] text-slate-400 font-bold block">{{ $isRtl ? 'تعقيم' : 'Cleaning' }}</span>
                        <span class="text-xs font-black text-slate-600 dark:text-slate-300 font-mono mt-0.5 block" dir="ltr">{{ $dept->cleaning_beds }}</span>
                    </div>
                </div>

                {{-- Department Head & Telemetry Stats --}}
                <div class="mt-3 pt-2.5 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between text-xs">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-lg bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] border border-[#14AFC3]/20 flex items-center justify-center font-bold text-xs shrink-0 font-mono">
                            {{ mb_substr($isRtl ? $dept->head : $dept->head_en, 0, 1) }}
                        </div>
                        <div>
                            <span class="font-bold text-slate-900 dark:text-white block text-[11px] leading-tight">{{ $isRtl ? $dept->head : $dept->head_en }}</span>
                            <span class="text-[10px] text-slate-400 font-mono">{{ $dept->head_phone }}</span>
                        </div>
                    </div>
                    <div class="{{ $isRtl ? 'text-start' : 'text-end' }}">
                        <span class="text-[10px] text-slate-400 font-medium block">{{ $isRtl ? 'حالات فائقة العناية' : 'Critical Cases' }}</span>
                        <span class="text-xs font-black text-rose-600 dark:text-rose-400 font-mono" dir="ltr">{{ $dept->critical_cases }} {{ $isRtl ? 'مرضى' : 'pts' }}</span>
                    </div>
                </div>
            </div>

            {{-- Action Controls --}}
            <div class="mt-3.5 pt-3 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between gap-2">
                <button type="button" onclick="openWardBedMap('{{ $isRtl ? $dept->name : $dept->name_en }}', '{{ $dept->code }}', {{ $dept->total_beds }}, {{ $dept->occupied_beds }}, {{ $dept->available_beds }}, {{ $dept->cleaning_beds }})" class="flex-1 h-8 bg-[#E5FAFC] dark:bg-[#14AFC3]/15 hover:bg-[#d5f5f9] dark:hover:bg-[#14AFC3]/25 text-[#14AFC3] text-xs font-bold rounded-xl transition-colors flex items-center justify-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    <span>{{ $isRtl ? 'خريطة أسرة الجناح' : 'Bed Map' }}</span>
                </button>

                <button type="button" onclick="quickReallocateTarget('{{ $dept->id }}')" class="px-3 h-8 bg-slate-100 hover:bg-slate-200/70 dark:bg-slate-800 dark:hover:bg-slate-700 border border-slate-200/80 dark:border-slate-700 text-slate-700 dark:text-slate-200 text-xs font-bold rounded-xl transition-colors flex items-center gap-1 cursor-pointer">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                    </svg>
                    <span>{{ $isRtl ? 'تعديل السعة' : 'Adjust' }}</span>
                </button>
            </div>

        </div>
        @endforeach
    </div>

    {{-- ══════════════════════════════════════════
         5. جدول سجل تدفق المرضى المباشر خلال 24 ساعة
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-3xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        <div class="px-5 py-3.5 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center shrink-0 border border-[#14AFC3]/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h2 class="text-sm font-black text-slate-900 dark:text-white leading-tight">
                        {{ $isRtl ? 'سجل حركة وتدفق الأسرة المباشر (آخر 24 ساعة)' : '24-Hour Bed Movement & Transfer Ledger' }}
                    </h2>
                    <p class="text-[11px] text-slate-400 font-medium">
                        {{ $isRtl ? 'توثيق فوري لعمليات الدخول، الخروج، والتحويل السريري بين الأجنحة' : 'Log of admissions, discharges, and inter-department transfers' }}
                    </p>
                </div>
            </div>
            <span class="px-2.5 py-1 rounded-full text-[10.5px] font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 border border-[#14AFC3]/30 font-mono">
                {{ $isRtl ? '42 حركة اليوم' : '42 Events Today' }}
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[950px] border-collapse">
                <thead class="bg-slate-50/90 dark:bg-slate-800/70 text-[11.5px] font-extrabold text-slate-700 dark:text-slate-200 uppercase border-b border-slate-200/80 dark:border-slate-800 tracking-wider">
                    <tr>
                        <th class="py-3 px-5 text-start">{{ $isRtl ? 'الوقت' : 'Time' }}</th>
                        <th class="py-3 px-4 text-start">{{ $isRtl ? 'نوع الحركة' : 'Action' }}</th>
                        <th class="py-3 px-4 text-start">{{ $isRtl ? 'المريض / الملف' : 'Patient / MRN' }}</th>
                        <th class="py-3 px-4 text-start">{{ $isRtl ? 'القسم والسرير' : 'Ward & Bed' }}</th>
                        <th class="py-3 px-4 text-start">{{ $isRtl ? 'الطبيب المعتمد' : 'Attending MD' }}</th>
                        <th class="py-3 px-4 text-center">{{ $isRtl ? 'الحالة' : 'Status' }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60">
                    <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-3 px-5 text-slate-400 font-mono text-[11px]">14:15</td>
                        <td class="py-3 px-4">
                            <span class="inline-flex items-center gap-1 font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/15 px-2.5 py-0.5 rounded-lg text-[10.5px] border border-[#14AFC3]/30">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14M5 12h14"/></svg>
                                <span>{{ $isRtl ? 'تنويم جديد' : 'Admission' }}</span>
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-900 dark:text-white block">{{ $isRtl ? 'عبدالرحمن صالح العميسي' : 'Abdulrahman Saleh' }}</span>
                            <span class="text-[10px] text-slate-400 font-mono">MRN-90821</span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-700 dark:text-slate-300 block">{{ $isRtl ? 'العناية المركزة (ICU)' : 'Intensive Care (ICU)' }}</span>
                            <span class="text-[10px] text-teal-600 dark:text-[#14AFC3] font-mono font-bold">Bed ICU-04</span>
                        </td>
                        <td class="py-3 px-4 text-slate-700 dark:text-slate-300 font-medium">{{ $isRtl ? 'د. طارق الزبير' : 'Dr. Tareq Al-Zubair' }}</td>
                        <td class="py-3 px-4 text-center">
                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>{{ $isRtl ? 'نشط' : 'Active' }}</span>
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-3 px-5 text-slate-400 font-mono text-[11px]">13:40</td>
                        <td class="py-3 px-4">
                            <span class="inline-flex items-center gap-1 font-bold text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-950/40 border border-indigo-200 dark:border-indigo-900/50 px-2.5 py-0.5 rounded-lg text-[10.5px]">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/></svg>
                                <span>{{ $isRtl ? 'تحويل بين الأقسام' : 'Inter-Ward Transfer' }}</span>
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-900 dark:text-white block">{{ $isRtl ? 'فاطمة ناصر الحمادي' : 'Fatima Naser Al-Hammadi' }}</span>
                            <span class="text-[10px] text-slate-400 font-mono">MRN-88419</span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-700 dark:text-slate-300 block">{{ $isRtl ? 'طوارئ ➔ جراحة عامة' : 'ER ➔ General Surgery' }}</span>
                            <span class="text-[10px] text-teal-600 dark:text-[#14AFC3] font-mono font-bold">Bed SURG-12</span>
                        </td>
                        <td class="py-3 px-4 text-slate-700 dark:text-slate-300 font-medium">{{ $isRtl ? 'د. سامي القاضي' : 'Dr. Sami Al-Qadhi' }}</td>
                        <td class="py-3 px-4 text-center">
                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>{{ $isRtl ? 'نشط' : 'Active' }}</span>
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-3 px-5 text-slate-400 font-mono text-[11px]">12:20</td>
                        <td class="py-3 px-4">
                            <span class="inline-flex items-center gap-1 font-bold text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-2.5 py-0.5 rounded-lg text-[10.5px]">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M12 19l-7-7 7-7"/></svg>
                                <span>{{ $isRtl ? 'خروج وتعقيم سرير' : 'Discharge & Sanitize' }}</span>
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-900 dark:text-white block">{{ $isRtl ? 'ياسر قاسم الشرجبي' : 'Yasser Qasem' }}</span>
                            <span class="text-[10px] text-slate-400 font-mono">MRN-77301</span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-slate-700 dark:text-slate-300 block">{{ $isRtl ? 'الباطنية (MED-C)' : 'Internal Med (MED-C)' }}</span>
                            <span class="text-[10px] text-slate-400 font-mono">Bed MED-21</span>
                        </td>
                        <td class="py-3 px-4 text-slate-700 dark:text-slate-300 font-medium">{{ $isRtl ? 'د. فؤاد الخولاني' : 'Dr. Fouad Al-Kholani' }}</td>
                        <td class="py-3 px-4 text-center">
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-400 border border-slate-200">
                                <span>{{ $isRtl ? 'مكتمل' : 'Cleared' }}</span>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════
     6. نافذة Modal تفاعلية: «إعادة موازنة وتوزيع الأسرة بين الأقسام»
     (#reallocationModal)
══════════════════════════════════════════ --}}
<div id="reallocationModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-3 sm:p-4 text-start" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-100 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center border border-[#14AFC3]/20">
                    <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 3H5a2 2 0 00-2 2v3m18 0V5a2 2 0 00-2-2h-3m0 18h3a2 2 0 002-2v-3M3 16v3a2 2 0 002 2h3"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 12l-4-4-4 4M12 8v8"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-black text-slate-900 dark:text-white">{{ $isRtl ? 'إعادة موازنة السعة السريرية' : 'Clinical Bed Reallocation' }}</h3>
                    <p class="text-[11px] text-slate-400 font-medium">{{ $isRtl ? 'قرار إداري لتكييف السعة بين أجنحة المستشفى' : 'Managerial capacity transfer between wards' }}</p>
                </div>
            </div>
            <button type="button" onclick="closeReallocationModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer">
                <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>

        <form onsubmit="submitBedReallocation(event)" class="mt-4 space-y-4 text-xs">
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'القسم المصدر (فائض السعة)' : 'Source Ward (Surplus)' }}</label>
                    <select id="sourceDeptSelect" class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-800 dark:text-slate-100 font-bold focus:border-[#14AFC3] focus:outline-none">
                        <option value="3">{{ $isRtl ? 'الجراحة العامة (10 أسرة شاغرة)' : 'General Surgery (10 Available)' }}</option>
                        <option value="6">{{ $isRtl ? 'الأطفال والحضانات (9 شاغر)' : 'Pediatrics (9 Available)' }}</option>
                        <option value="7">{{ $isRtl ? 'النساء والتوليد (9 شاغر)' : 'Obstetrics (9 Available)' }}</option>
                        <option value="8">{{ $isRtl ? 'جراحة العظام (6 شاغر)' : 'Orthopedics (6 Available)' }}</option>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'القسم الهدف (الضغط العالي)' : 'Target Ward (Surge)' }}</label>
                    <select id="targetDeptSelect" class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-800 dark:text-slate-100 font-bold focus:border-[#14AFC3] focus:outline-none">
                        <option value="1">{{ $isRtl ? 'العناية المركزة ICU (إشغال 89%)' : 'ICU (89% Occ)' }}</option>
                        <option value="2">{{ $isRtl ? 'الطوارئ والإصابات (إشغال 85%)' : 'Emergency (85% Occ)' }}</option>
                        <option value="5">{{ $isRtl ? 'الباطنية العامة (إشغال 90%)' : 'Internal Med (90% Occ)' }}</option>
                        <option value="4">{{ $isRtl ? 'أمراض القلب (إشغال 86%)' : 'Cardiology (86% Occ)' }}</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'عدد الأسرة المراد تحويل طاقتها' : 'Beds to Reallocate' }}</label>
                <div class="flex items-center gap-3">
                    <input type="range" id="bedsSlider" min="1" max="10" value="3" oninput="document.getElementById('bedsValDisplay').innerText = this.value" class="w-full accent-[#14AFC3] cursor-pointer">
                    <span class="px-3.5 py-1.5 bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/20 dark:text-[#14AFC3] font-black rounded-xl text-xs font-mono shrink-0 border border-[#14AFC3]/30">
                        <span id="bedsValDisplay">3</span> {{ $isRtl ? 'أسرة' : 'beds' }}
                    </span>
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'مسوّغ التوزيع الإداري' : 'Operational Rationale' }}</label>
                <textarea rows="2" required placeholder="{{ $isRtl ? 'مثال: تغطية ذروة الحالات الحرجة المحولة من الطوارئ وتوفير طاقم تمريضي مساند...' : 'Operational rationale for shift...' }}" class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 text-xs text-slate-800 dark:text-slate-100 focus:border-[#14AFC3] focus:outline-none"></textarea>
            </div>

            <div class="p-3 bg-slate-50 dark:bg-slate-800/40 border border-slate-200/80 dark:border-slate-700 rounded-xl text-[11px] text-slate-600 dark:text-slate-300 space-y-1">
                <div class="flex items-center justify-between">
                    <span>{{ $isRtl ? 'المعتمد للتنفيذ:' : 'Authorized by:' }}</span>
                    <span class="font-bold text-slate-900 dark:text-white">{{ Auth::user()->name ?? ($isRtl ? 'مدير المستشفى' : 'Hospital Manager') }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span>{{ $isRtl ? 'الإشعار الفوري:' : 'Auto-Notification:' }}</span>
                    <span class="text-slate-500">{{ $isRtl ? 'سيتم إشعار رئيسي القسمين ورئيسة التمريض تلقائياً' : 'Heads of Dept & Nursing notified automatically' }}</span>
                </div>
            </div>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="closeReallocationModal()" class="px-4 py-2 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 font-bold transition-colors cursor-pointer">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="submit" class="px-5 py-2 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0E94A6] hover:to-[#09525D] text-white rounded-xl font-bold transition-all shadow-xs cursor-pointer">
                    {{ $isRtl ? 'اعتماد ونقل السعة فوراً' : 'Confirm Reallocation' }}
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ══════════════════════════════════════════
     7. نافذة Modal تفاعلية: «خريطة أسرة الجناح الحيّة»
     (#wardMapModal)
══════════════════════════════════════════ --}}
<div id="wardMapModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-3 sm:p-4 text-start" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-2xl max-w-2xl w-full p-5 sm:p-6 shadow-2xl border border-slate-100 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
            <div>
                <h3 id="wardModalTitle" class="text-sm font-black text-slate-900 dark:text-white">{{ $isRtl ? 'خريطة أسرة الجناح' : 'Ward Bed Map' }}</h3>
                <p id="wardModalSubtitle" class="text-[11px] text-slate-400 font-mono font-bold">ICU-A</p>
            </div>
            <button type="button" onclick="closeWardBedMap()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer">
                <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- مفتاح الألوان التوضيحي --}}
        <div class="mt-3.5 flex items-center gap-4 text-xs">
            <span class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300 font-bold">
                <span class="w-2.5 h-2.5 rounded-full bg-slate-800 dark:bg-slate-200"></span>
                <span>{{ $isRtl ? 'مشغول بمريض' : 'Occupied' }}</span>
            </span>
            <span class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300 font-bold">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                <span>{{ $isRtl ? 'متاح فوراً' : 'Available' }}</span>
            </span>
            <span class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300 font-bold">
                <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                <span>{{ $isRtl ? 'قيد التعقيم والتجهيز' : 'Sterilizing' }}</span>
            </span>
        </div>

        {{-- شبكة تمثيل الأسرة --}}
        <div class="mt-4 grid grid-cols-3 sm:grid-cols-6 gap-2.5" id="wardBedsGrid"></div>

        <div class="mt-5 pt-3 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between text-xs">
            <span class="text-slate-400 font-medium">{{ $isRtl ? 'انقر على أي سرير للاطلاع على بيانات الحالة' : 'Click bed to view patient details' }}</span>
            <button type="button" onclick="closeWardBedMap()" class="px-4 py-1.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 font-bold rounded-xl transition-colors cursor-pointer">
                {{ $isRtl ? 'إغلاق الخريطة' : 'Close' }}
            </button>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     8. نافذة Modal تفاعلية: «تصدير بيان الإشغال السريري المعتمد»
     (#bedCensusModal)
══════════════════════════════════════════ --}}
<div id="bedCensusModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-3 sm:p-4 text-center">
        <div class="w-full max-w-3xl transform overflow-hidden rounded-2xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-100 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200" id="printableCensusSection">
            
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
                        <div class="font-bold text-slate-900">REF: RSD-BEDS-2026-YE</div>
                        <div class="text-slate-500 text-[10px]">{{ now()->format('Y-m-d H:i') }}</div>
                        <div class="text-emerald-700 text-[10px] font-bold">STATUS: OFFICIAL CENSUS AUDIT</div>
                    </div>
                </div>

                {{-- Subject Banner --}}
                <div class="flex items-center justify-between bg-slate-50 p-3 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-[#E5FAFC] text-[#14AFC3] font-black flex items-center justify-center border border-[#14AFC3]/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base font-black text-slate-900 leading-snug">
                                {{ $isRtl ? 'بيان الحصر السريري الشامل وتوزيع أعباء الأقسام' : 'Comprehensive Hospital Bed Census & Wing Allocation Dossier' }}
                            </h3>
                            <span class="text-[10px] font-bold text-teal-800 bg-[#E5FAFC] px-2 py-0.5 rounded font-mono border border-teal-100">
                                BED CENSUS & CAPACITY AUDIT
                            </span>
                        </div>
                    </div>
                    <button type="button" onclick="closeBedCensusModal()" class="text-slate-400 hover:text-slate-700 p-1.5 rounded-lg hover:bg-slate-200 transition-colors print:hidden cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                {{-- 4 Metric Boxes Grid --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 text-center">
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'إجمالي السعة' : 'Total Capacity' }}</span>
                        <span class="text-base sm:text-lg font-black text-[#14AFC3] font-mono block mt-0.5">{{ $totalCapacity }}</span>
                        <span class="text-[9.5px] text-slate-500 font-bold block mt-0.5">{{ $isRtl ? 'سريراً مرخصاً' : 'Licensed Beds' }}</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'الأسرة المشغولة' : 'Occupied Beds' }}</span>
                        <span class="text-base sm:text-lg font-black text-slate-800 font-mono block mt-0.5">{{ $totalOccupied }}</span>
                        <span class="text-[9.5px] text-slate-500 font-medium block mt-0.5">{{ $overallOccupancy }}% {{ $isRtl ? 'نسبة الإشغال' : 'Occupancy' }}</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'الشاغر المتاح فوراً' : 'Available Beds' }}</span>
                        <span class="text-base sm:text-lg font-black text-emerald-600 font-mono block mt-0.5">{{ $totalAvailable }}</span>
                        <span class="text-[9.5px] text-emerald-600 font-bold block mt-0.5">{{ $isRtl ? 'جاهز للاستقبال' : 'Ready Now' }}</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] font-bold text-slate-500 block">{{ $isRtl ? 'قيد التعقيم' : 'In Sanitation' }}</span>
                        <span class="text-base sm:text-lg font-black text-amber-600 font-mono block mt-0.5">{{ $totalCleaning }}</span>
                        <span class="text-[9.5px] text-slate-500 font-medium block mt-0.5">{{ $isRtl ? 'تجهيز سريع' : 'Fast Sanitizing' }}</span>
                    </div>
                </div>

                {{-- Department Breakdown Table --}}
                <div class="border border-slate-200/80 dark:border-slate-700 rounded-3xl overflow-hidden shadow-sm">
                    <div class="bg-slate-100 px-3.5 py-1.5 border-b border-slate-200 flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-800">{{ $isRtl ? 'بيان توزيع الأسرة التفصيلي لكافة أجنحة المستشفى' : 'Detailed Bed Allocation by Clinical Wing' }}</span>
                        <span class="text-[10px] font-mono text-slate-500">MOH-OPS-CAPACITY</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs text-start">
                            <thead class="bg-slate-50 text-slate-600 font-bold border-b border-slate-200 text-[10.5px]">
                                <tr>
                                    <th class="py-2 px-3 text-start">{{ $isRtl ? 'القسم السريري' : 'Department' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'الكود' : 'Code' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'المشغول' : 'Occupied' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'الشاغر' : 'Available' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'الإجمالي' : 'Total' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'نسبة الإشغال' : 'Rate' }}</th>
                                    <th class="py-2 px-3 text-center">{{ $isRtl ? 'الحالة' : 'Status' }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @foreach($departments as $d)
                                    <tr>
                                        <td class="py-2 px-3 font-semibold text-slate-900">{{ $isRtl ? $d->name : $d->name_en }}</td>
                                        <td class="py-2 px-3 text-center font-mono text-[11px] text-slate-500">{{ $d->code }}</td>
                                        <td class="py-2 px-3 text-center font-mono" dir="ltr">{{ $d->occupied_beds }}</td>
                                        <td class="py-2 px-3 text-center font-mono font-bold text-emerald-600" dir="ltr">{{ $d->available_beds }}</td>
                                        <td class="py-2 px-3 text-center font-mono" dir="ltr">{{ $d->total_beds }}</td>
                                        <td class="py-2 px-3 text-center font-mono font-bold text-slate-900" dir="ltr">{{ $d->occupancy_rate }}%</td>
                                        <td class="py-2 px-3 text-center">
                                            <span class="text-[10px] font-bold {{ $d->status === 'critical' ? 'text-rose-700 bg-rose-50' : ($d->status === 'busy' ? 'text-amber-700 bg-amber-50' : 'text-emerald-700 bg-emerald-50') }} px-2 py-0.5 rounded border border-slate-200">
                                                {{ $d->status === 'critical' ? ($isRtl ? 'ذروة' : 'Peak') : ($d->status === 'busy' ? ($isRtl ? 'مكثف' : 'Busy') : ($isRtl ? 'آمن' : 'Safe')) }}
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
                        <span class="text-[10px] font-bold text-slate-400 block mb-1">{{ $isRtl ? 'مسؤول التمريض وتوزيع الأسرة' : 'Charge Nurse / Bed Manager' }}</span>
                        <span class="font-extrabold text-slate-800 text-[11px] block">{{ $isRtl ? 'د. منى عبدالعزيز النمري' : 'Dr. Muna Al-Nemri' }}</span>
                        <span class="text-[10px] text-slate-500 block">{{ $isRtl ? 'مشرفة تدفق المرضى' : 'Patient Flow Supervisor' }}</span>
                    </div>

                    <div>
                        {{-- Circular Stamp --}}
                        <div class="w-20 h-20 rounded-full border-2 border-dashed border-[#14AFC3] mx-auto flex flex-col items-center justify-center p-1 text-[7.5px] font-black text-[#0C6B78] rotate-[-5deg] bg-[#E5FAFC]/40 shadow-xs">
                            <span class="text-[7px] text-slate-600">{{ $isRtl ? 'وزارة الصحة العامة' : 'Ministry of Health' }}</span>
                            <span class="text-[8px] font-extrabold text-[#14AFC3]">{{ $isRtl ? 'مستشفى الرشيد' : 'Al-Rasheed Hospital' }}</span>
                            <span class="text-[6.5px] text-slate-700">{{ $isRtl ? 'صنعاء - اليمن' : 'Sana\'a - Yemen' }}</span>
                            <span class="text-[6px] font-mono text-slate-400 mt-0.5">MOH-BEDS-2026</span>
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
                        <button type="button" onclick="closeBedCensusModal()" class="px-3.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-xs transition-colors cursor-pointer">
                            {{ $isRtl ? 'إغلاق' : 'Close' }}
                        </button>
                        <button type="button" onclick="downloadCensusCSV()" class="px-3.5 py-1.5 bg-slate-800 hover:bg-slate-900 text-white font-bold rounded-xl text-xs transition-all flex items-center gap-1 shadow-xs cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span>{{ $isRtl ? 'تحميل كـ CSV' : 'Export CSV' }}</span>
                        </button>
                        <button type="button" onclick="printBedCensus()" class="px-4 py-1.5 bg-[#14AFC3] hover:bg-[#0E94A6] text-white font-bold rounded-xl text-xs shadow-sm transition-all flex items-center gap-1.5 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                            <span>{{ $isRtl ? 'طباعة بيان الإشغال' : 'Print Census' }}</span>
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
    function filterDeptCategory(cat, btn) {
        document.querySelectorAll('.dept-filter-btn').forEach(b => {
            b.classList.remove('bg-[#14AFC3]', 'text-white', 'shadow-xs');
            b.classList.add('bg-slate-100', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300');
        });
        btn.classList.remove('bg-slate-100', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300');
        btn.classList.add('bg-[#14AFC3]', 'text-white', 'shadow-xs');

        const cards = document.querySelectorAll('.dept-card');
        cards.forEach(card => {
            if (cat === 'all' || card.getAttribute('data-category') === cat) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Search input
    function searchDepartments() {
        const query = document.getElementById('deptSearchInput').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.dept-card');
        cards.forEach(card => {
            const name = card.getAttribute('data-name') || '';
            const head = card.getAttribute('data-head') || '';
            if (!query || name.includes(query) || head.includes(query)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Reallocation Modal
    function openReallocationModal() {
        const m = document.getElementById('reallocationModal');
        m.classList.remove('hidden');
        m.classList.add('flex');
    }

    function closeReallocationModal() {
        const m = document.getElementById('reallocationModal');
        m.classList.add('hidden');
        m.classList.remove('flex');
    }

    function quickReallocateTarget(deptId) {
        const sel = document.getElementById('targetDeptSelect');
        if (sel) sel.value = deptId;
        openReallocationModal();
    }

    function submitBedReallocation(e) {
        e.preventDefault();
        const count = document.getElementById('bedsSlider').value;
        closeReallocationModal();
        showToast(isRtl ? `تم اعتماد نقل سعة (${count}) أسرة بنجاح وتحديث التيليمتري.` : `Bed capacity shift of (${count}) beds confirmed.`);
    }

    // Ward Bed Map Modal
    function openWardBedMap(title, code, total, occupied, available, cleaning) {
        document.getElementById('wardModalTitle').innerText = title;
        document.getElementById('wardModalSubtitle').innerText = isRtl
            ? `رمز الجناح: ${code} | إجمالي السعة: ${total} سرير`
            : `Ward Code: ${code} | Total Capacity: ${total} beds`;

        const grid = document.getElementById('wardBedsGrid');
        grid.innerHTML = '';

        for (let i = 1; i <= total; i++) {
            let statusClass = 'bg-slate-800 text-white dark:bg-slate-200 dark:text-slate-900 shadow-2xs';
            let statusLabel = isRtl ? 'مشغول' : 'Occupied';

            if (i <= available) {
                statusClass = 'bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/20 dark:text-[#14AFC3] border border-[#14AFC3]/30 hover:bg-[#d5f5f9] shadow-2xs';
                statusLabel = isRtl ? 'متاح' : 'Available';
            } else if (i <= available + cleaning) {
                statusClass = 'bg-amber-50 text-amber-800 dark:bg-amber-950/40 dark:text-amber-300 border border-amber-200/80 hover:bg-amber-100 shadow-2xs';
                statusLabel = isRtl ? 'تعقيم' : 'Sterilizing';
            }

            const bedEl = document.createElement('div');
            bedEl.className = `p-2.5 rounded-xl text-center cursor-pointer transition-all duration-200 hover:scale-105 ${statusClass}`;
            bedEl.innerHTML = `
                <div class="text-[11px] font-mono font-black">${code}-${String(i).padStart(2, '0')}</div>
                <div class="text-[10px] font-semibold mt-0.5">${statusLabel}</div>
            `;
            bedEl.onclick = () => showToast(isRtl
                ? `السرير ${code}-${String(i).padStart(2, '0')}: الحالة [${statusLabel}]`
                : `Bed ${code}-${String(i).padStart(2, '0')}: Status [${statusLabel}]`
            );
            grid.appendChild(bedEl);
        }

        const m = document.getElementById('wardMapModal');
        m.classList.remove('hidden');
        m.classList.add('flex');
    }

    function closeWardBedMap() {
        const m = document.getElementById('wardMapModal');
        m.classList.add('hidden');
        m.classList.remove('flex');
    }

    // Official Census Modal Controls
    function exportBedCensus() {
        document.getElementById('bedCensusModal').classList.remove('hidden');
    }

    function closeBedCensusModal() {
        document.getElementById('bedCensusModal').classList.add('hidden');
    }

    function printBedCensus() {
        window.print();
    }

    // CSV Download with UTF-8 BOM
    function downloadCensusCSV() {
        let csv = '\uFEFF';
        csv += 'الجمهورية اليمنية - وزارة الصحة العامة والسكان - أمانة العاصمة صنعاء\r\n';
        csv += 'مستشفى الرشيد التخصصي - بيان الحصر السريري وتوزيع أعباء الأقسام\r\n';
        csv += 'المرجع الرسمي: RSD-BEDS-2026-YE\r\n';
        csv += `تاريخ التصدير: ${new Date().toISOString()}\r\n\r\n`;

        csv += 'القسم السريري,الكود,الأسرة المشغولة,الأسرة المتاحة,إجمالي السعة,نسبة الإشغال,الحالة\r\n';
        csv += 'العناية المركزة الفائقة (ICU),ICU-A,25,2,28,89%,ذروة استيعاب\r\n';
        csv += 'طوارئ وإصابات الحوادث (ER),ER-01,47,6,55,85%,إشغال مكثف\r\n';
        csv += 'قسم الجراحة العامة والمناظير,SURG-B,51,10,65,78%,سعة منتظمة\r\n';
        csv += 'أمراض القلب والقسطرة القلبية,CARD-02,36,4,42,86%,إشغال مكثف\r\n';
        csv += 'الباطنية العامة والأمراض الصدرية,MED-C,54,3,60,90%,ذروة استيعاب\r\n';
        csv += 'الأطفال والحضانات المبتسرة (NICU),PED-A,38,9,50,76%,سعة منتظمة\r\n';
        csv += 'النساء والتوليد وجراحة الأمومة,OBGYN-1,34,9,46,74%,سعة منتظمة\r\n';
        csv += 'جراحة العظام والإصابات الرياضية,ORTHO-D,26,6,34,76%,سعة منتظمة\r\n';

        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `RSD_Bed_Census_${new Date().toISOString().slice(0,10)}.csv`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showToast(isRtl ? 'تم تحميل ملف بيان الإشغال (CSV) بنجاح.' : 'Bed Census CSV downloaded successfully.');
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
