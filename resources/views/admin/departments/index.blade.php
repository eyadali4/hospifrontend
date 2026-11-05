@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    $departmentsList = (isset($departments) && count($departments) > 0) ? $departments : collect([
        [
            'code' => 'DEP-CRD',
            'name_ar' => 'قسم أمراض وجراحة القلب والقسطرة',
            'name_en' => 'Cardiology & Heart Surgery Department',
            'type' => 'clinical',
            'type_ar' => 'سريري وتداخلي',
            'type_en' => 'Clinical & Interventional',
            'building_ar' => 'البرج الطبي A · الطابق الثالث',
            'building_en' => 'Medical Tower A · 3rd Floor',
            'head_ar' => 'د. سارة المنصوري',
            'head_en' => 'Dr. Sarah Al-Mansouri',
            'head_title_ar' => 'استشاري أول قسطرة وجراحة قلب',
            'head_title_en' => 'Chief of Cardiology & Cath Lab',
            'beds_total' => 38,
            'beds_occupied' => 34,
            'occupancy_rate' => 89,
            'clinics_count' => 6,
            'staff_count' => 36,
            'extension' => '4010',
            'status' => 'active',
            'icon' => 'cardiology'
        ],
        [
            'code' => 'DEP-ORT',
            'name_ar' => 'قسم جراحة العظام والمفاصل والعمود الفقري',
            'name_en' => 'Orthopedics & Spine Surgery Department',
            'type' => 'surgical',
            'type_ar' => 'جراحة وعمليات',
            'type_en' => 'Surgical & OR',
            'building_ar' => 'البرج الطبي B · الطابق الثاني',
            'building_en' => 'Medical Tower B · 2nd Floor',
            'head_ar' => 'د. طارق الهاشمي',
            'head_en' => 'Dr. Tariq Al-Hashemi',
            'head_title_ar' => 'أخصائي أول جراحة عظام ومفاصل',
            'head_title_en' => 'Senior Orthopedic Consultant',
            'beds_total' => 42,
            'beds_occupied' => 36,
            'occupancy_rate' => 85,
            'clinics_count' => 5,
            'staff_count' => 28,
            'extension' => '4020',
            'status' => 'active',
            'icon' => 'ortho'
        ],
        [
            'code' => 'DEP-EMR',
            'name_ar' => 'قسم الطوارئ والحوادث والإنعاش التخصصي',
            'name_en' => 'Emergency & Trauma Pavilion',
            'type' => 'critical',
            'type_ar' => 'طوارئ وعناية فورية',
            'type_en' => 'Emergency & Resuscitation',
            'building_ar' => 'المبنى الرئيسي · الطابق الأرضي',
            'building_en' => 'Main Hospital Wing · Ground Floor',
            'head_ar' => 'د. خالد النعيمي',
            'head_en' => 'Dr. Khalid Al-Nuaimi',
            'head_title_ar' => 'استشاري أول طب طوارئ وإصابات حادة',
            'head_title_en' => 'Emergency Director & Trauma Lead',
            'beds_total' => 50,
            'beds_occupied' => 46,
            'occupancy_rate' => 92,
            'clinics_count' => 10,
            'staff_count' => 53,
            'extension' => '9990',
            'status' => 'active',
            'icon' => 'emergency'
        ],
        [
            'code' => 'DEP-PED',
            'name_ar' => 'قسم طب الأطفال وحديثي الولادة (NICU)',
            'name_en' => 'Pediatrics & Neonatal Intensive Care',
            'type' => 'clinical',
            'type_ar' => 'أمومة وطفولة سريرية',
            'type_en' => 'Maternal & Child Health',
            'building_ar' => 'مبنى الأمومة والطفولة · الطابق الأول',
            'building_en' => 'Maternity Pavilion · 1st Floor',
            'head_ar' => 'د. ريما القحطاني',
            'head_en' => 'Dr. Reema Al-Qahtani',
            'head_title_ar' => 'استشارية طب أطفال ورعاية مبتسرين',
            'head_title_en' => 'Head of Pediatrics & Neonatology',
            'beds_total' => 35,
            'beds_occupied' => 28,
            'occupancy_rate' => 80,
            'clinics_count' => 8,
            'staff_count' => 36,
            'extension' => '4040',
            'status' => 'active',
            'icon' => 'pediatrics'
        ],
        [
            'code' => 'DEP-ICU',
            'name_ar' => 'قسم العناية المركزة والتخدير (ICU)',
            'name_en' => 'Intensive Care & Critical Anesthesia (ICU)',
            'type' => 'critical',
            'type_ar' => 'رعاية فائقة وحرجة',
            'type_en' => 'Intensive Care Unit',
            'building_ar' => 'البرج الطبي A · الطابق الرابع',
            'building_en' => 'Medical Tower A · 4th Floor',
            'head_ar' => 'د. فيصل الدوسري',
            'head_en' => 'Dr. Faisal Al-Dossary',
            'head_title_ar' => 'استشاري عناية مركزة وأكسجة غشائية',
            'head_title_en' => 'Chief of Critical Care (ICU)',
            'beds_total' => 25,
            'beds_occupied' => 22,
            'occupancy_rate' => 88,
            'clinics_count' => 1,
            'staff_count' => 37,
            'extension' => '4050',
            'status' => 'active',
            'icon' => 'icu'
        ],
        [
            'code' => 'DEP-NEU',
            'name_ar' => 'قسم المخ والأعصاب والعمود الفقري',
            'name_en' => 'Neurology & Neurosurgical Sciences',
            'type' => 'clinical',
            'type_ar' => 'سريري وتخصصي',
            'type_en' => 'Neurosciences',
            'building_ar' => 'البرج الطبي A · الطابق الخامس',
            'building_en' => 'Medical Tower A · 5th Floor',
            'head_ar' => 'د. ياسر الغامدي',
            'head_en' => 'Dr. Yasser Al-Ghamdi',
            'head_title_ar' => 'استشاري جراحة المخ والأعصاب وقاع الجمجمة',
            'head_title_en' => 'Consultant Neurosurgeon',
            'beds_total' => 30,
            'beds_occupied' => 14,
            'occupancy_rate' => 46,
            'clinics_count' => 4,
            'staff_count' => 21,
            'extension' => '4060',
            'status' => 'maintenance',
            'icon' => 'neurology'
        ],
        [
            'code' => 'DEP-LAB',
            'name_ar' => 'المختبرات المركزية وبنك الدم الإقليمي',
            'name_en' => 'Clinical Pathology Labs & Blood Bank',
            'type' => 'diagnostic',
            'type_ar' => 'تشخيصي ومخبري',
            'type_en' => 'Diagnostic & Pathology',
            'building_ar' => 'المبنى التشخيصي C · الطابق الأرضي',
            'building_en' => 'Diagnostic Wing C · Ground Floor',
            'head_ar' => 'د. منى الشريف',
            'head_en' => 'Dr. Mona Al-Sharif',
            'head_title_ar' => 'استشارية علم الأمراض والدم ونقل الخلايا',
            'head_title_en' => 'Head of Clinical Pathology & Labs',
            'beds_total' => 32,
            'beds_occupied' => 29,
            'occupancy_rate' => 90,
            'clinics_count' => 4,
            'staff_count' => 26,
            'extension' => '4070',
            'status' => 'active',
            'icon' => 'lab'
        ],
        [
            'code' => 'DEP-RAD',
            'name_ar' => 'قسم الأشعة والتصوير الطبي والرنين',
            'name_en' => 'Radiology, MRI & Nuclear Imaging',
            'type' => 'diagnostic',
            'type_ar' => 'أشعة وتصوير متقدم',
            'type_en' => 'Diagnostic Imaging & MRI',
            'building_ar' => 'المبنى التشخيصي C · الطابق السفلي',
            'building_en' => 'Diagnostic Wing C · Basement',
            'head_ar' => 'د. وليد الصالح',
            'head_en' => 'Dr. Waleed Al-Saleh',
            'head_title_ar' => 'استشاري تصوير تشخيصي وتداخلي',
            'head_title_en' => 'Head of Medical Imaging',
            'beds_total' => 24,
            'beds_occupied' => 20,
            'occupancy_rate' => 83,
            'clinics_count' => 3,
            'staff_count' => 20,
            'extension' => '4080',
            'status' => 'active',
            'icon' => 'radiology'
        ]
    ]);
@endphp

@section('page-title', $isRtl ? 'إدارة الأقسام الطبية' : __('Department Management'))
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

    <x-sidebar-link :href="Route::has('admin.departments.index') ? route('admin.departments.index') : '#'" :active="true">
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

    <x-sidebar-link :href="Route::has('admin.notifications.index') ? route('admin.notifications.index') : '#'" :active="request()->routeIs('admin.notifications.*')">
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
        body * {
            visibility: hidden !important;
        }
        #printableCensusReport, #printableCensusReport * {
            visibility: visible !important;
        }
        #printableCensusReport {
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 24px !important;
            background: #ffffff !important;
            color: #0F172A !important;
            display: block !important;
            z-index: 999999 !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        @page {
            size: A4 portrait;
            margin: 8mm;
        }
        .no-print {
            display: none !important;
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
                    <path d="M3 21h18M3 7v14M21 7v14M6 11h3M6 15h3M15 11h3M15 15h3M9 3h6v4H9z"/>
                </svg>
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <h1 class="text-xl sm:text-2xl font-black text-[#152C4B] dark:text-white tracking-tight leading-tight">
                        {{ $isRtl ? 'إدارة الأقسام والأجنحة الطبية' : 'Department & Clinical Units Directory' }}
                    </h1>
                    <span class="w-2 h-2 rounded-full bg-[#14AFC3]"></span>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-0.5">
                    {{ $isRtl ? 'متابعة السعة السريرية، نسبة الإشغال المباشر، رؤساء الأقسام، وجاهزية العيادات والأجنحة التشغيلية.' : 'Live bed telemetry, ward occupancy rates, clinical department heads, and operating wings.' }}
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2.5 self-start sm:self-auto">
            <button type="button" onclick="triggerExportCensus()" 
                    class="px-4 py-2.5 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-[#152C4B] dark:text-slate-200 text-xs font-bold rounded-xl border border-slate-200/80 dark:border-slate-700 shadow-xs transition-all flex items-center gap-2 cursor-pointer hover:border-[#14AFC3]">
                <svg width="15" height="15" class="text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span>{{ $isRtl ? 'طباعة تقرير السعة والإشغال' : 'Print Census Audit' }}</span>
            </button>

            <button type="button" onclick="openDeptModal()" 
                    class="px-4 py-2.5 bg-[#14AFC3] hover:bg-[#0C6B78] text-white text-xs font-black rounded-xl shadow-md shadow-[#14AFC3]/20 transition-all flex items-center gap-1.5 cursor-pointer hover:-translate-y-0.5">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                <span>{{ $isRtl ? 'إضافة قسم طبي جديد' : 'Add New Department' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         4 KPI METRIC CARDS (CENTERED ICON & TEXT)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        {{-- Card 1: Total Clinical Departments (Highlighted Teal Gradient) --}}
        <x-stat-card 
            :highlighted="true"
            :label="$isRtl ? 'إجمالي الأقسام الطبية المعتمدة' : 'Total Clinical Departments'"
            value="8"
            :sublabel="$isRtl ? 'عبر 3 مبانٍ وأبراج تخصصية' : 'Across 3 Hospital Wings'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 2: Bed Capacity & Occupancy --}}
        <x-stat-card 
            :highlighted="false"
            :label="$isRtl ? 'السعة السريرية الإجمالية' : 'Total Bed Capacity'"
            value="279"
            :sublabel="$isRtl ? 'نسبة الإشغال العام: 83.8%' : 'General Occupancy: 83.8%'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M3 6h18M3 18h18"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 3: Specialized Clinics & Suites --}}
        <x-stat-card 
            :highlighted="false"
            :label="$isRtl ? 'العيادات التخصصية المجهزة' : 'Operating Specialized Clinics'"
            value="38"
            :sublabel="$isRtl ? 'جاهزية واستقبال 100%' : '100% Operational Readiness'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 4: Medical Staff & Consultants --}}
        <x-stat-card 
            :highlighted="false"
            :label="$isRtl ? 'الكوادر الطبية والتمريضية' : 'Clinical & Nursing Staff'"
            value="247"
            :sublabel="$isRtl ? 'مستشفى الرشيد التخصصي' : 'Al-Rasheed Hospital Staff'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

    </div>

    {{-- ══════════════════════════════════════════
         FILTER TOOLBAR (SINGLE UNIFIED LINE)
    ══════════════════════════════════════════ --}}
    <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-3 p-3.5 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-xs">
        
        {{-- Department Type Tabs --}}
        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 xl:pb-0 text-xs no-scrollbar">
            <button type="button" onclick="setTypeFilter('all', this)" class="dept-tab active px-3 py-1.5 rounded-xl font-bold bg-[#14AFC3] text-white shadow-xs flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'جميع الأقسام' : 'All Departments' }}</span>
                <span class="bg-white/20 text-white text-[10px] px-1.5 py-0.5 rounded-md font-bold">8</span>
            </button>
            <button type="button" onclick="setTypeFilter('clinical', this)" class="dept-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'الأقسام السريرية' : 'Clinical Units' }}</span>
                <span class="bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-700">3</span>
            </button>
            <button type="button" onclick="setTypeFilter('surgical', this)" class="dept-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'الجراحة والعمليات' : 'Surgical & OR' }}</span>
                <span class="bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-700">1</span>
            </button>
            <button type="button" onclick="setTypeFilter('critical', this)" class="dept-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'الطوارئ والعناية' : 'Emergency & ICU' }}</span>
                <span class="bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-700">2</span>
            </button>
            <button type="button" onclick="setTypeFilter('diagnostic', this)" class="dept-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'المختبرات والأشعة' : 'Diagnostic & Labs' }}</span>
                <span class="bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-700">2</span>
            </button>
        </div>

        {{-- Search, Status Dropdown & Live Count --}}
        <div class="flex items-center gap-2.5 flex-1 xl:flex-initial justify-end">
            <div class="relative w-full sm:w-64 xl:w-72">
                <input type="text" id="deptSearchInput" oninput="applyFilters()" 
                       placeholder="{{ $isRtl ? 'ابحث باسم القسم، الكود، رئيس القسم...' : 'Search department, code, head...' }}" 
                       class="w-full text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/90 dark:border-slate-700 rounded-xl py-1.5 pl-3.5 pr-8 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3] focus:border-[#14AFC3] transition-all placeholder:text-slate-400">
                <div class="absolute inset-y-0 {{ $isRtl ? 'left-0 pl-2.5' : 'right-0 pr-2.5' }} flex items-center pointer-events-none text-slate-400">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </div>
            </div>

            <select id="statusFilter" onchange="applyFilters()" class="text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/90 dark:border-slate-700 rounded-xl py-1.5 px-2.5 text-[#152C4B] dark:text-slate-200 font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                <option value="all">{{ $isRtl ? 'جميع الحالات' : 'All Statuses' }}</option>
                <option value="active">{{ $isRtl ? 'تشغيلي بالكامل' : 'Fully Operational' }}</option>
                <option value="maintenance">{{ $isRtl ? 'تحت الصيانة' : 'Maintenance' }}</option>
            </select>

            <span class="text-[11px] font-black text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2.5 py-1.5 rounded-xl border border-slate-200/60 dark:border-slate-700 whitespace-nowrap shrink-0">
                <span id="filteredCount">8</span> {{ $isRtl ? 'أقسام' : 'Depts' }}
            </span>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         DEPARTMENTS DIRECTORY TABLE (ENTERPRISE 100% FIXED)
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[1000px] border-collapse" id="departmentsTable">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
                        <th class="w-[24%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'القسم الطبي والمبنى' : 'Department & Wing' }}</th>
                        <th class="w-[20%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'رئيس القسم الاستشاري' : 'Department Head' }}</th>
                        <th class="w-[19%] py-4 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'السعة السريرية ونسبة الإشغال' : 'Beds & Occupancy' }}</th>
                        <th class="w-[13%] py-4 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'العيادات والكوادر' : 'Clinics & Staff' }}</th>
                        <th class="w-[12%] py-4 px-3 text-center">{{ $isRtl ? 'الجاهزية التشغيلية' : 'Operational Status' }}</th>
                        <th class="w-[12%] py-4 px-4 text-center">{{ $isRtl ? 'الإجراءات والتقرير' : 'Actions & Census' }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/70 text-slate-600 dark:text-slate-300 font-medium">
                    
                    @foreach($departmentsList as $dept)
                    <tr class="dept-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group"
                        data-type="{{ $dept['type'] }}" 
                        data-status="{{ $dept['status'] }}" 
                        data-name="{{ $dept['name_ar'] }} {{ $dept['name_en'] }}"
                        data-name-ar="{{ $dept['name_ar'] }}"
                        data-name-en="{{ $dept['name_en'] }}"
                        data-code="{{ $dept['code'] }}" 
                        data-building="{{ $isRtl ? $dept['building_ar'] : $dept['building_en'] }}"
                        data-head="{{ $isRtl ? $dept['head_ar'] : $dept['head_en'] }}"
                        data-head-title="{{ $isRtl ? $dept['head_title_ar'] : $dept['head_title_en'] }}"
                        data-beds="{{ $dept['beds_total'] }}" 
                        data-occupied="{{ $dept['beds_occupied'] }}" 
                        data-occupancy="{{ $dept['occupancy_rate'] }}"
                        data-clinics="{{ $dept['clinics_count'] }}" 
                        data-staff="{{ $dept['staff_count'] }}" 
                        data-ext="{{ $dept['extension'] }}">
                        
                        {{-- Col 1: Dept Name & Wing --}}
                        <td class="w-[24%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] font-black text-xs flex items-center justify-center shrink-0 border border-[#14AFC3]/30 shadow-xs group-hover:scale-105 transition-transform">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="font-black text-slate-900 dark:text-white text-xs sm:text-sm truncate group-hover:text-[#14AFC3] transition-colors">
                                            {{ $isRtl ? $dept['name_ar'] : $dept['name_en'] }}
                                        </span>
                                        <span class="text-[10px] text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 font-mono px-2 py-0.5 rounded-md border border-[#14AFC3]/30 font-bold shrink-0 shadow-2xs">
                                            {{ $dept['code'] }}
                                        </span>
                                    </div>
                                    <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">
                                        {{ $isRtl ? $dept['building_ar'] : $dept['building_en'] }}
                                    </span>
                                </div>
                            </div>
                        </td>

                        {{-- Col 2: Head of Department --}}
                        <td class="w-[20%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <span class="font-bold text-slate-900 dark:text-white block text-xs truncate">
                                {{ $isRtl ? $dept['head_ar'] : $dept['head_en'] }}
                            </span>
                            <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">
                                {{ $isRtl ? $dept['head_title_ar'] : $dept['head_title_en'] }}
                            </span>
                        </td>

                        {{-- Col 3: Bed Telemetry & Occupancy --}}
                        <td class="w-[19%] py-4 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center justify-between text-xs mb-1.5">
                                <span class="font-mono font-bold text-slate-800 dark:text-slate-200">
                                    {{ $dept['beds_occupied'] }} / {{ $dept['beds_total'] }} {{ $isRtl ? 'سرير' : 'beds' }}
                                </span>
                                <span class="font-mono font-black {{ $dept['occupancy_rate'] >= 90 ? 'text-rose-600 dark:text-rose-400' : 'text-[#0C6B78] dark:text-[#14AFC3]' }}">
                                    {{ $dept['occupancy_rate'] }}%
                                </span>
                            </div>
                            <div class="w-full h-2 rounded-full bg-slate-100 dark:bg-slate-800 overflow-hidden border border-slate-200/50 dark:border-slate-700/50">
                                <div class="h-full rounded-full transition-all duration-500 {{ $dept['occupancy_rate'] >= 90 ? 'bg-gradient-to-r from-rose-500 to-rose-600' : 'bg-gradient-to-r from-[#14AFC3] to-[#0C6B78]' }}" style="width: {{ $dept['occupancy_rate'] }}%;"></div>
                            </div>
                        </td>

                        {{-- Col 4: Clinics & Staff --}}
                        <td class="w-[13%] py-4 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <span class="font-bold text-slate-900 dark:text-white block text-xs truncate">
                                {{ $dept['clinics_count'] }} {{ $isRtl ? 'عيادات متخصصة' : 'Clinics' }}
                            </span>
                            <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">
                                {{ $dept['staff_count'] }} {{ $isRtl ? 'كادر طبي' : 'Staff' }}
                            </span>
                        </td>

                        {{-- Col 5: Operational Status (Centered) --}}
                        <td class="w-[12%] py-4 px-3 text-center">
                            @if($dept['status'] === 'active')
                                <span class="status-badge inline-flex items-center gap-1.5 text-[11px] font-bold text-emerald-700 bg-emerald-50 dark:bg-emerald-950/40 dark:text-emerald-300 px-3 py-1 rounded-full border border-emerald-200/80 dark:border-emerald-800/60 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    {{ $isRtl ? 'تشغيلي كامل' : 'Operational' }}
                                </span>
                            @else
                                <span class="status-badge inline-flex items-center gap-1.5 text-[11px] font-bold text-amber-700 bg-amber-50 dark:bg-amber-950/40 dark:text-amber-300 px-3 py-1 rounded-full border border-amber-200/80 dark:border-amber-800/60 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                    {{ $isRtl ? 'صيانة وتعقيم' : 'Maintenance' }}
                                </span>
                            @endif
                        </td>

                        {{-- Col 6: Actions (Centered) --}}
                        <td class="w-[12%] py-4 px-4 text-center">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                                
                                {{-- View Dossier (Eye Modal) --}}
                                <button type="button" onclick="viewDept(this)" title="{{ $isRtl ? 'عرض ملف القسم والسعة' : 'View Department Dossier' }}" 
                                        class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center cursor-pointer shadow-2xs">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>

                                {{-- Quick Print Census Slip --}}
                                <button type="button" onclick="printSingleDeptSlip(this)" title="{{ $isRtl ? 'طباعة تقرير السعة للقسم' : 'Print Census Slip' }}" 
                                        class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-slate-500 hover:text-[#14AFC3] hover:bg-slate-50 dark:hover:bg-slate-600 transition-all flex items-center justify-center cursor-pointer shadow-2xs">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                </button>

                                {{-- Edit Department --}}
                                <button type="button" onclick="openEditModal(this)" title="{{ $isRtl ? 'تعديل بيانات القسم' : 'Edit Department' }}" 
                                        class="w-8 h-8 rounded-xl text-slate-500 hover:text-[#14AFC3] hover:bg-slate-200/60 dark:hover:bg-slate-700 transition-all flex items-center justify-center cursor-pointer">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>

                                {{-- Sterilization / Maintenance Toggle --}}
                                <button type="button" onclick="openStatusModal(this)" title="{{ $isRtl ? 'تحديث الجاهزية والتعقيم' : 'Update Readiness' }}" 
                                        class="w-8 h-8 rounded-xl text-slate-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-950/40 transition-all flex items-center justify-center cursor-pointer">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- Table Compact Footer --}}
        <div class="py-3 px-5 bg-slate-50/60 dark:bg-slate-800/40 border-t border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-400 dark:text-slate-500 font-medium">
            <span>{{ $isRtl ? 'عرض 1 إلى 8 من أصل 8 أقسام طبية تخصصية (مستشفى الرشيد - صنعاء)' : 'Showing 1 to 8 of 8 specialized departments' }}</span>
            <div class="flex items-center gap-1.5">
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 disabled:opacity-50 text-xs font-bold" disabled>{{ $isRtl ? 'السابق' : 'Prev' }}</button>
                <button class="px-3 py-1.5 rounded-xl bg-[#14AFC3] text-white text-xs font-black shadow-xs">1</button>
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 text-xs font-bold" disabled>{{ $isRtl ? 'التالي' : 'Next' }}</button>
            </div>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════
     OFFICIAL PRINTABLE CENSUS REPORT & SLIP
     YEMEN - SANA'A - AL-RASHEED SPECIALIZED HOSPITAL
══════════════════════════════════════════════ --}}
<div id="printableCensusReport" class="hidden">
    
    {{-- Header --}}
    <div style="border-bottom: 2px solid #0F172A; padding-bottom: 14px; margin-bottom: 16px; display: flex; justify-content: space-between; align-items: flex-start; font-family: 'Cairo', sans-serif;">
        <div style="text-align: right; line-height: 1.45; font-size: 11px;">
            <div style="font-weight: 800; font-size: 13px; color: #0F172A;">الجمهورية اليمنية</div>
            <div style="color: #334155; font-weight: 700;">وزارة الصحة العامة والسكان</div>
            <div style="color: #334155;">الإدارة العامة للأقسام والخدمات الطبية</div>
            <div style="font-weight: 900; color: #14AFC3; font-size: 12.5px; margin-top: 2px;">مستشفى الرشيد التخصصي - صنعاء</div>
            <div style="font-size: 9.5px; color: #64748B;">Official Inpatient Bed Telemetry & Clinical Census</div>
        </div>

        <div style="text-align: center; margin-top: -4px;">
            <div style="width: 54px; height: 54px; border-radius: 14px; background: #E5FAFC; border: 1.5px solid #14AFC3; margin: 0 auto 6px auto; display: flex; align-items: center; justify-content: center; font-size: 22px; color: #0C6B78; font-weight: 900;">
                🏥
            </div>
            <h2 id="printReportTitle" style="font-size: 15px; font-weight: 900; color: #0F172A; margin: 0; font-family: 'Cairo', sans-serif;">كشف السعة السريرية والإشغال العام</h2>
            <div style="font-size: 9.5px; font-weight: 700; color: #64748B; font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: 0.5px;">
                ENTERPRISE CLINICAL CENSUS AUDIT
            </div>
        </div>

        <div style="text-align: left; line-height: 1.45; font-size: 10.5px; font-family: 'IBM Plex Mono', monospace;">
            <div style="font-weight: 700; color: #0F172A;">REF: RSD-CENSUS-2026</div>
            <div style="color: #64748B; font-size: 10px;">DATE: {{ date('Y-m-d') }}</div>
            <div style="color: #64748B; font-size: 10px;">TIME ISSUED: {{ date('H:i') }}</div>
            <div style="font-family: 'IBM Plex Mono', monospace; font-size: 14px; letter-spacing: 3px; font-weight: 700; margin-top: 4px; color: #0F172A;">
                *RSD-CENSUS-LIVE*
            </div>
        </div>
    </div>

    {{-- Official Audit Summary Badges --}}
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 16px; font-family: 'Cairo', sans-serif;">
        <div style="border: 1px solid #CBD5E1; border-radius: 8px; padding: 8px; text-align: center; background: #F8FAFC;">
            <span style="font-size: 10px; color: #64748B; display: block; font-weight: 700;">إجمالي الأقسام</span>
            <span style="font-size: 16px; font-weight: 900; color: #0F172A; font-family: 'IBM Plex Mono', monospace;">8</span>
        </div>
        <div style="border: 1px solid #CBD5E1; border-radius: 8px; padding: 8px; text-align: center; background: #F8FAFC;">
            <span style="font-size: 10px; color: #64748B; display: block; font-weight: 700;">إجمالي الأسِرّة</span>
            <span style="font-size: 16px; font-weight: 900; color: #0F172A; font-family: 'IBM Plex Mono', monospace;">279 سرير</span>
        </div>
        <div style="border: 1px solid #CBD5E1; border-radius: 8px; padding: 8px; text-align: center; background: #F8FAFC;">
            <span style="font-size: 10px; color: #64748B; display: block; font-weight: 700;">الأسِرّة المشغولة</span>
            <span style="font-size: 16px; font-weight: 900; color: #0F172A; font-family: 'IBM Plex Mono', monospace;">234 سرير (83.8%)</span>
        </div>
        <div style="border: 1px solid #CBD5E1; border-radius: 8px; padding: 8px; text-align: center; background: #F8FAFC;">
            <span style="font-size: 10px; color: #64748B; display: block; font-weight: 700;">إجمالي الكوادر</span>
            <span style="font-size: 16px; font-weight: 900; color: #0F172A; font-family: 'IBM Plex Mono', monospace;">247 طبيب وممرض</span>
        </div>
    </div>

    {{-- Official Audit Table --}}
    <table style="width: 100%; border-collapse: collapse; font-family: 'Cairo', sans-serif; font-size: 10.5px; margin-bottom: 24px;">
        <thead>
            <tr style="background: #F1F5F9; border-top: 1.5px solid #0F172A; border-bottom: 1.5px solid #0F172A; color: #0F172A;">
                <th style="padding: 7px 10px; border: 1px solid #0F172A; text-align: right; font-weight: 800;">الكود</th>
                <th style="padding: 7px 10px; border: 1px solid #0F172A; text-align: right; font-weight: 800;">القسم الطبي التخصصي</th>
                <th style="padding: 7px 10px; border: 1px solid #0F172A; text-align: right; font-weight: 800;">المبنى / الجناح</th>
                <th style="padding: 7px 10px; border: 1px solid #0F172A; text-align: right; font-weight: 800;">رئيس القسم</th>
                <th style="padding: 7px 10px; border: 1px solid #0F172A; text-align: center; font-weight: 800;">الإشغال / الإجمالي</th>
                <th style="padding: 7px 10px; border: 1px solid #0F172A; text-align: center; font-weight: 800;">النسبة</th>
                <th style="padding: 7px 10px; border: 1px solid #0F172A; text-align: center; font-weight: 800;">العيادات / الكادر</th>
                <th style="padding: 7px 10px; border: 1px solid #0F172A; text-align: center; font-weight: 800;">الحالة</th>
            </tr>
        </thead>
        <tbody style="color: #1E293B;">
            @foreach($departmentsList as $d)
            <tr style="border-bottom: 1px solid #E2E8F0;">
                <td style="padding: 6px 10px; border: 1px solid #CBD5E1; font-family: 'IBM Plex Mono', monospace; font-weight: 700; color: #0C6B78;">{{ $d['code'] }}</td>
                <td style="padding: 6px 10px; border: 1px solid #CBD5E1; font-weight: 800;">{{ $d['name_ar'] }}</td>
                <td style="padding: 6px 10px; border: 1px solid #CBD5E1; color: #475569;">{{ $d['building_ar'] }}</td>
                <td style="padding: 6px 10px; border: 1px solid #CBD5E1; font-weight: 700;">{{ $d['head_ar'] }}</td>
                <td style="padding: 6px 10px; border: 1px solid #CBD5E1; text-align: center; font-family: 'IBM Plex Mono', monospace; font-weight: 700;">{{ $d['beds_occupied'] }} / {{ $d['beds_total'] }}</td>
                <td style="padding: 6px 10px; border: 1px solid #CBD5E1; text-align: center; font-family: 'IBM Plex Mono', monospace; font-weight: 800; color: {{ $d['occupancy_rate'] >= 90 ? '#BE123C' : '#0C6B78' }};">{{ $d['occupancy_rate'] }}%</td>
                <td style="padding: 6px 10px; border: 1px solid #CBD5E1; text-align: center; font-family: 'IBM Plex Mono', monospace;">{{ $d['clinics_count'] }} ع / {{ $d['staff_count'] }} ك</td>
                <td style="padding: 6px 10px; border: 1px solid #CBD5E1; text-align: center; font-weight: 700;">
                    @if($d['status'] === 'active')
                        <span style="color: #047857;">تشغيلي كامل</span>
                    @else
                        <span style="color: #B45309;">صيانة وتعقيم</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Official Verification & Endorsement Footer --}}
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; text-align: center; font-family: 'Cairo', sans-serif; font-size: 11px; margin-top: 30px;">
        
        <div>
            <div style="color: #64748B; font-weight: 700; margin-bottom: 25px;">ختم الاعتماد والرقابة الإكلينيكية</div>
            <div style="width: 84px; height: 84px; border-radius: 50%; border: 2px dashed #14AFC3; margin: 0 auto; display: flex; flex-direction: column; align-items: center; justify-content: center; font-size: 8.5px; font-weight: 900; color: #0C6B78; transform: rotate(-6deg); line-height: 1.35; padding: 4px;">
                <span>معتمد رسمياً</span>
                <span style="font-size: 8px; color: #152C4B;">مستشفى الرشيد</span>
                <span style="font-size: 7.5px; color: #64748B;">صنعاء - اليمن</span>
            </div>
        </div>

        <div>
            <div style="color: #64748B; font-weight: 700; margin-bottom: 35px;">رئيس هيئة الأقسام والخدمات الطبية</div>
            <div style="border-bottom: 1px solid #94A3B8; width: 140px; margin: 0 auto 6px auto;"></div>
            <span style="font-size: 10px; color: #64748B;">Clinical Operations Director</span>
        </div>

        <div>
            <div style="color: #64748B; font-weight: 700; margin-bottom: 35px;">المدير الطبي العام / CMO</div>
            <div style="font-family: 'Cairo', cursive; font-size: 14px; font-weight: 900; color: #152C4B; border-bottom: 1px solid #94A3B8; width: 150px; margin: 0 auto 6px auto;">
                د. عبد الرحمن السعيد
            </div>
            <span style="font-size: 10px; color: #64748B;">Chief Medical Officer</span>
        </div>

    </div>

    {{-- Disclaimer --}}
    <div style="margin-top: 35px; padding-top: 12px; border-top: 1px solid #CBD5E1; text-align: center; font-size: 9.5px; color: #94A3B8; line-height: 1.5; font-family: 'Cairo', sans-serif;">
        هذا التقرير وثيقة تشغيلية رسمية صادرة عن مستشفى الرشيد التخصصي (صنعاء، الجمهورية اليمنية) بناءً على سجلات نظام Enterprise Hospital OS. لا يجوز تعديل البيانات المعتمدة أو التصرف بالسعة السريرية خارج البروتوكول المعتمد.
    </div>

</div>

{{-- ══════════════════════════════════════════
     MODAL 1: VIEW DEPARTMENT DOSSIER (LUXURY GOLD STANDARD)
══════════════════════════════════════════ --}}
<div id="viewDeptModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-[#0A1628]/60 backdrop-blur-md transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div class="w-full max-w-2xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            {{-- Luxury Gradient Header --}}
            <div class="relative px-6 py-6 bg-gradient-to-r from-[#0A1628] via-[#152C4B] to-[#0C6B78] text-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center text-white shadow-inner shrink-0">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 id="viewDeptName" class="text-lg font-black tracking-tight text-white">قسم أمراض وجراحة القلب</h3>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-black bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                                    {{ $isRtl ? 'جناح سريري معتمد' : 'Accredited Ward' }}
                                </span>
                            </div>
                            <p class="text-xs text-white/70 font-medium mt-0.5 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · صنعاء' : 'Al-Rasheed Specialized Hospital · Sana\'a' }}</span>
                                <span class="text-white/40">·</span>
                                <span id="viewDeptCode" class="font-mono text-cyan-300 font-bold">DEP-CRD</span>
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
                
                {{-- Section 1: Department Overview & Leadership --}}
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'بيانات القيادة الإكلينيكية والموقع' : 'Clinical Leadership & Location' }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="p-3.5 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-100 dark:border-slate-800">
                            <span class="text-[10px] text-slate-400 block font-bold">{{ $isRtl ? 'رئيس القسم الاستشاري' : 'Department Head' }}</span>
                            <span id="viewDeptHead" class="font-black text-xs text-[#152C4B] dark:text-white mt-1 block">د. سارة المنصوري</span>
                            <span id="viewDeptHeadTitle" class="text-[11px] text-slate-400 block mt-0.5">استشاري أول قسطرة وجراحة</span>
                        </div>

                        <div class="p-3.5 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-100 dark:border-slate-800 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] text-slate-400 block font-bold">{{ $isRtl ? 'المبنى والتحويلة الهاتفية' : 'Location & Extension' }}</span>
                                <span id="viewDeptBuilding" class="font-bold text-xs text-slate-700 dark:text-slate-300 mt-1 block">البرج الطبي A · الطابق الثالث</span>
                                <span id="viewDeptExt" class="font-mono text-cyan-600 dark:text-cyan-400 text-xs font-bold block mt-0.5">EXT-4010</span>
                            </div>
                            <button type="button" onclick="copyExtension()" class="px-2.5 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-[#14AFC3] text-slate-600 dark:text-slate-300 hover:text-[#14AFC3] rounded-xl text-[10px] font-bold transition-all flex items-center gap-1 cursor-pointer">
                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                <span>{{ $isRtl ? 'نسخ' : 'Copy' }}</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Section 2: Bed Telemetry & Live Capacity --}}
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'مؤشرات السعة السريرية والإشغال المباشر' : 'Bed Telemetry & Capacity' }}
                        </h4>
                    </div>

                    <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-100 dark:border-slate-800 space-y-2.5">
                        <div class="flex items-center justify-between text-xs">
                            <span class="font-bold text-slate-600 dark:text-slate-300">{{ $isRtl ? 'نسبة الإشغال العام للأسِرّة' : 'Occupancy Rate' }}</span>
                            <span id="viewDeptOccupancyBadge" class="font-mono font-black text-[#0C6B78] dark:text-[#14AFC3] text-sm">89%</span>
                        </div>
                        <div class="w-full h-2 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden">
                            <div id="viewDeptProgressBar" class="h-full rounded-full bg-[#14AFC3]" style="width: 89%;"></div>
                        </div>
                        <div class="flex items-center justify-between text-[11px] text-slate-500 pt-1">
                            <span id="viewDeptBeds" class="font-mono font-bold text-[#152C4B] dark:text-white">34 / 38 سرير شاغر</span>
                            <span id="viewDeptClinicsStaff" class="font-bold text-slate-600 dark:text-slate-300">6 عيادات · 36 كادر طبي</span>
                        </div>
                    </div>
                </div>

                {{-- Section 3: Accreditation Capsule --}}
                <div class="p-3.5 rounded-2xl bg-[#E5FAFC]/80 dark:bg-[#14AFC3]/10 border border-[#14AFC3]/30 flex items-center justify-between text-xs">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-xl bg-[#14AFC3] text-white flex items-center justify-center shrink-0">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <div class="font-bold text-[#152C4B] dark:text-white text-[11.5px]">{{ $isRtl ? 'الاعتماد الإكلينيكي المباشر' : 'Official Clinical Accreditation' }}</div>
                            <div class="text-[10.5px] text-slate-500 dark:text-slate-400">{{ $isRtl ? 'معتمد رسمياً ضمن بروتوكولات مستشفى الرشيد ووزارة الصحة (صنعاء)' : 'Accredited under MoH standards & Al-Rasheed Hospital protocol' }}</div>
                        </div>
                    </div>
                    <span id="viewDeptStatusBadge" class="inline-flex items-center gap-1.5 text-[10.5px] font-bold text-emerald-700 bg-emerald-100/70 dark:bg-emerald-950/60 dark:text-emerald-300 px-2.5 py-1 rounded-full border border-emerald-300/60 shrink-0">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        {{ $isRtl ? 'تشغيلي كامل' : 'Operational' }}
                    </span>
                </div>

                {{-- Luxury Action Footer --}}
                <div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-800">
                    <button type="button" id="modalPrintSingleBtn" onclick="printFromModal()" class="px-5 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/20 transition-all flex items-center gap-2 cursor-pointer hover:-translate-y-0.5">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        <span>{{ $isRtl ? 'طباعة كشف السعة للقسم' : 'Print Census Slip' }}</span>
                    </button>
                    <button type="button" onclick="closeViewModal()" class="px-5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-xl text-xs transition-colors cursor-pointer">
                        {{ $isRtl ? 'إغلاق النافذة' : 'Close' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     MODAL 2: EDIT DEPARTMENT (LUXURY GOLD STANDARD)
══════════════════════════════════════════ --}}
<div id="editDeptModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-[#0A1628]/60 backdrop-blur-md transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div class="w-full max-w-2xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            <div class="relative px-6 py-6 bg-gradient-to-r from-[#0A1628] via-[#152C4B] to-[#0C6B78] text-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center text-white shadow-inner shrink-0">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-lg font-black tracking-tight text-white">{{ $isRtl ? 'تعديل بيانات القسم الطبي' : 'Edit Department Details' }}</h3>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-black bg-cyan-500/20 text-cyan-300 border border-cyan-400/30">
                                    {{ $isRtl ? 'تحديث السجلات' : 'Update Records' }}
                                </span>
                            </div>
                            <p class="text-xs text-white/70 font-medium mt-0.5 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · صنعاء' : 'Al-Rasheed Specialized Hospital · Sana\'a' }}</span>
                            </p>
                        </div>
                    </div>
                    <button type="button" onclick="closeEditModal()" 
                            class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white/80 hover:text-white flex items-center justify-center transition-colors cursor-pointer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    </button>
                </div>
            </div>

            <form onsubmit="handleEditSubmit(event)" class="p-6 space-y-5">
                
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'البيانات التعريفية للقسم' : 'Department Identifiers' }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'اسم القسم الطبي (بالعربية)' : 'Department Name (Arabic)' }} <span class="text-rose-500">*</span></label>
                            <input type="text" id="editDeptNameAr" required class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'كود القسم' : 'Code' }} <span class="text-rose-500">*</span></label>
                            <input type="text" id="editDeptCode" required class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 font-mono text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]" dir="ltr">
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'الموقع ورئاسة القسم' : 'Location & Department Head' }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'المبنى والبرج الطبي' : 'Wing / Floor' }} <span class="text-rose-500">*</span></label>
                            <input type="text" id="editDeptBuilding" required class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'التحويلة الهاتفية الداخلية' : 'Extension' }} <span class="text-rose-500">*</span></label>
                            <input type="text" id="editDeptExt" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 font-mono text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'رئيس القسم الاستشاري' : 'Department Head' }} <span class="text-rose-500">*</span></label>
                            <input type="text" id="editDeptHead" required class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'اللقب والدرجة الإكلينيكية' : 'Clinical Title' }} <span class="text-rose-500">*</span></label>
                            <input type="text" id="editDeptHeadTitle" required class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'السعة السريرية والحالة التشغيلية' : 'Capacity & Status' }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'إجمالي الأسِرّة المجهزة' : 'Total Beds' }}</label>
                            <input type="number" id="editDeptBeds" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 font-mono text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'الحالة التشغيلية' : 'Status' }}</label>
                            <select id="editDeptStatus" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 text-[#152C4B] dark:text-white font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                                <option value="active">{{ $isRtl ? 'تشغيلي كامل (Active)' : 'Operational' }}</option>
                                <option value="maintenance">{{ $isRtl ? 'صيانة وتعقيم (Maintenance)' : 'Under Maintenance' }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <button type="button" onclick="closeEditModal()" class="px-5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-xl text-xs transition-colors cursor-pointer">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/20 transition-all cursor-pointer hover:-translate-y-0.5">
                        {{ $isRtl ? 'حفظ التعديلات' : 'Save Changes' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     MODAL 3: STATUS / STERILIZATION TOGGLE
══════════════════════════════════════════ --}}
<div id="statusDeptModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-[#0A1628]/60 backdrop-blur-md transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div class="w-full max-w-md transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 p-6 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            <div class="flex items-center gap-3.5 mb-4">
                <div id="statusIconBox" class="w-11 h-11 rounded-2xl bg-amber-50 dark:bg-amber-950/40 text-amber-600 flex items-center justify-center shrink-0 border border-amber-200 dark:border-amber-800 shadow-inner">
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <div>
                    <h3 id="statusModalTitle" class="text-base font-black text-[#152C4B] dark:text-white">{{ $isRtl ? 'تحديث الجاهزية التشغيلية للقسم' : 'Operational Readiness' }}</h3>
                    <p class="text-xs text-slate-400 mt-0.5">{{ $isRtl ? 'إجراءات التعقيم الدوري والصيانة والربط الطبي' : 'Sterilization & Maintenance Schedule' }}</p>
                </div>
            </div>

            <p id="statusModalDesc" class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed mb-5">
                {{ $isRtl ? 'هل تريد تغيير حالة القسم إلى صيانة وتعقيم؟ سيتم تنبيه مكتب الدخول والطوارئ تلقائياً.' : 'Do you want to switch this department into sterilization mode?' }}
            </p>

            <div class="flex items-center justify-end gap-2.5 pt-3 border-t border-slate-100 dark:border-slate-800">
                <button type="button" onclick="closeStatusModal()" class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-xl text-xs transition-colors cursor-pointer">
                    {{ $isRtl ? 'تراجع' : 'Cancel' }}
                </button>
                <button type="button" id="confirmStatusBtn" onclick="confirmDeptStatusToggle()" class="px-5 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-black rounded-xl text-xs shadow-md transition-all cursor-pointer">
                    {{ $isRtl ? 'تأكيد الإجراء' : 'Confirm Action' }}
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     MODAL 4: ADD NEW DEPARTMENT (LUXURY GOLD STANDARD)
══════════════════════════════════════════ --}}
<div id="deptModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-[#0A1628]/60 backdrop-blur-md transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div class="w-full max-w-2xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            <div class="relative px-6 py-6 bg-gradient-to-r from-[#0A1628] via-[#152C4B] to-[#0C6B78] text-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center text-white shadow-inner shrink-0">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path d="M3 21h18M3 7v14M21 7v14M6 11h3M6 15h3M15 11h3M15 15h3M9 3h6v4H9z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-lg font-black tracking-tight text-white">{{ $isRtl ? 'إضافة قسم أو جناح طبي جديد' : 'Register New Department' }}</h3>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-black bg-cyan-500/20 text-cyan-300 border border-cyan-400/30">
                                    {{ $isRtl ? 'اعتماد مؤسسي' : 'Accreditation' }}
                                </span>
                            </div>
                            <p class="text-xs text-white/70 font-medium mt-0.5 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · صنعاء' : 'Al-Rasheed Specialized Hospital · Sana\'a' }}</span>
                            </p>
                        </div>
                    </div>
                    <button type="button" onclick="closeDeptModal()" 
                            class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white/80 hover:text-white flex items-center justify-center transition-colors cursor-pointer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    </button>
                </div>
            </div>

            <form onsubmit="handleFormSubmit(event)" class="p-6 space-y-5">
                
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'البيانات التعريفية والتصنيف' : 'Department Profile & Type' }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div class="sm:col-span-2">
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'اسم القسم الطبي' : 'Department Name' }} <span class="text-rose-500">*</span></label>
                            <input type="text" required placeholder="{{ $isRtl ? 'مثال: قسم الأمراض الصدرية والتنفسية' : 'e.g. Pulmonology Department' }}" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'كود القسم' : 'Code' }} <span class="text-rose-500">*</span></label>
                            <input type="text" required placeholder="DEP-PULM" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 font-mono text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]" dir="ltr">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'تصنيف القسم' : 'Classification' }} <span class="text-rose-500">*</span></label>
                            <select class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 text-[#152C4B] dark:text-white font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                                <option value="clinical">{{ $isRtl ? 'سريري (Clinical)' : 'Clinical' }}</option>
                                <option value="surgical">{{ $isRtl ? 'جراحي (Surgical)' : 'Surgical' }}</option>
                                <option value="critical">{{ $isRtl ? 'عناية فائقة وطوارئ (Critical Care)' : 'Critical Care' }}</option>
                                <option value="diagnostic">{{ $isRtl ? 'تشخيصي ومخبري (Diagnostic)' : 'Diagnostic' }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'المبنى والبرج الطبي' : 'Building Wing' }} <span class="text-rose-500">*</span></label>
                            <input type="text" required placeholder="{{ $isRtl ? 'البرج الطبي A · الطابق السادس' : 'Tower A · Floor 6' }}" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'القيادة الإكلينيكية والسعة' : 'Leadership & Operational Metrics' }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'رئيس القسم الاستشاري' : 'Consultant Head' }} <span class="text-rose-500">*</span></label>
                            <input type="text" required placeholder="{{ $isRtl ? 'د. مروان القدسي' : 'Dr. Marwan Al-Qudsi' }}" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'التحويلة الهاتفية الداخلية' : 'Phone Extension' }} <span class="text-rose-500">*</span></label>
                            <input type="text" required placeholder="4090" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 font-mono text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'السعة السريرية' : 'Beds' }}</label>
                            <input type="number" min="0" value="20" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 font-mono text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'عدد العيادات' : 'Clinics' }}</label>
                            <input type="number" min="0" value="3" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 font-mono text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'الكادر الطبي' : 'Staff' }}</label>
                            <input type="number" min="0" value="18" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 font-mono text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <button type="button" onclick="closeDeptModal()" class="px-5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-xl text-xs transition-colors cursor-pointer">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/20 transition-all cursor-pointer hover:-translate-y-0.5">
                        {{ $isRtl ? 'حفظ واعتماد القسم' : 'Register Department' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     TOAST NOTIFICATION COMPONENT
══════════════════════════════════════════ --}}
<div id="toastNotification" class="fixed bottom-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none">
    <div class="bg-[#152C4B] text-white px-4 py-3 rounded-2xl shadow-xl flex items-center gap-3 border border-white/10 text-xs font-bold">
        <span class="w-6 h-6 rounded-full bg-[#14AFC3] text-white flex items-center justify-center shrink-0">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        </span>
        <span id="toastMessage">{{ $isRtl ? 'تم تنفيذ العملية بنجاح' : 'Action completed successfully' }}</span>
    </div>
</div>

{{-- ══════════════════════════════════════════
     DYNAMIC JAVASCRIPT CONTROLLERS
══════════════════════════════════════════ --}}
<script>
    let activeTypeFilter = 'all';
    let targetRowForAction = null;
    let currentSelectedExt = '';

    // 1. Filtering & Search
    function setTypeFilter(type, btn) {
        activeTypeFilter = type;
        document.querySelectorAll('.dept-tab').forEach(b => {
            b.classList.remove('active', 'bg-[#14AFC3]', 'text-white', 'shadow-xs');
            b.classList.add('bg-slate-50', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300');
        });
        btn.classList.add('active', 'bg-[#14AFC3]', 'text-white', 'shadow-xs');
        btn.classList.remove('bg-slate-50', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300');
        applyFilters();
    }

    function applyFilters() {
        const query = (document.getElementById('deptSearchInput').value || '').toLowerCase().trim();
        const status = document.getElementById('statusFilter').value;
        const rows = document.querySelectorAll('.dept-row');
        let count = 0;

        rows.forEach(row => {
            const matchesType = (activeTypeFilter === 'all' || row.dataset.type === activeTypeFilter);
            const matchesStatus = (status === 'all' || row.dataset.status === status);
            
            const name = (row.dataset.name || '').toLowerCase();
            const code = (row.dataset.code || '').toLowerCase();
            const head = (row.dataset.head || '').toLowerCase();
            const building = (row.dataset.building || '').toLowerCase();

            const matchesSearch = !query || name.includes(query) || code.includes(query) || head.includes(query) || building.includes(query);

            if (matchesType && matchesStatus && matchesSearch) {
                row.style.display = '';
                count++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('filteredCount').innerText = count;
    }

    // 2. View Department Dossier (Eye Modal)
    function viewDept(btn) {
        const row = btn.closest('tr');
        if(!row) return;

        targetRowForAction = row;
        currentSelectedExt = row.dataset.ext || '4010';

        document.getElementById('viewDeptName').innerText = row.dataset.nameAr || row.dataset.name;
        document.getElementById('viewDeptCode').innerText = row.dataset.code;
        document.getElementById('viewDeptBuilding').innerText = row.dataset.building;
        document.getElementById('viewDeptHead').innerText = row.dataset.head;
        document.getElementById('viewDeptHeadTitle').innerText = row.dataset.headTitle || '';
        document.getElementById('viewDeptExt').innerText = 'EXT-' + currentSelectedExt;
        
        const occ = parseInt(row.dataset.occupancy || 0);
        document.getElementById('viewDeptOccupancyBadge').innerText = occ + '%';
        document.getElementById('viewDeptProgressBar').style.width = occ + '%';
        document.getElementById('viewDeptProgressBar').className = occ >= 90 ? 'h-full rounded-full bg-rose-500' : 'h-full rounded-full bg-[#14AFC3]';
        
        document.getElementById('viewDeptBeds').innerText = `${row.dataset.occupied} / ${row.dataset.beds} {{ $isRtl ? 'سرير شاغر ومتاح' : 'Beds occupied' }}`;
        document.getElementById('viewDeptClinicsStaff').innerText = `${row.dataset.clinics} {{ $isRtl ? 'عيادات تخصصية' : 'Clinics' }} · ${row.dataset.staff} {{ $isRtl ? 'كادر طبي' : 'Staff' }}`;

        const status = row.dataset.status;
        const badge = document.getElementById('viewDeptStatusBadge');
        if(status === 'active') {
            badge.className = 'inline-flex items-center gap-1.5 text-[10.5px] font-bold text-emerald-700 bg-emerald-100/70 dark:bg-emerald-950/60 dark:text-emerald-300 px-2.5 py-1 rounded-full border border-emerald-300/60 shrink-0';
            badge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>' + "{{ $isRtl ? 'تشغيلي كامل' : 'Operational' }}";
        } else {
            badge.className = 'inline-flex items-center gap-1.5 text-[10.5px] font-bold text-amber-700 bg-amber-100/70 dark:bg-amber-950/60 dark:text-amber-300 px-2.5 py-1 rounded-full border border-amber-300/60 shrink-0';
            badge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>' + "{{ $isRtl ? 'صيانة وتعقيم' : 'Under Maintenance' }}";
        }

        document.getElementById('viewDeptModal').classList.remove('hidden');
    }

    function closeViewModal() {
        document.getElementById('viewDeptModal').classList.add('hidden');
    }

    function copyExtension() {
        if(!currentSelectedExt) return;
        navigator.clipboard.writeText(currentSelectedExt).then(() => {
            showToast("{{ $isRtl ? 'تم نسخ التحويلة الهاتفية (' : 'Extension copied: (' }}" + currentSelectedExt + ")");
        }).catch(() => {
            showToast("{{ $isRtl ? 'التحويلة الداخلية: ' : 'Extension: ' }}" + currentSelectedExt);
        });
    }

    function printFromModal() {
        closeViewModal();
        if(targetRowForAction) {
            printSingleDeptSlip(targetRowForAction);
        } else {
            window.print();
        }
    }

    // 3. Edit Modal
    function openEditModal(btn) {
        targetRowForAction = btn.closest('tr');
        if(!targetRowForAction) return;

        document.getElementById('editDeptNameAr').value = targetRowForAction.dataset.nameAr || '';
        document.getElementById('editDeptCode').value = targetRowForAction.dataset.code || '';
        document.getElementById('editDeptBuilding').value = targetRowForAction.dataset.building || '';
        document.getElementById('editDeptHead').value = targetRowForAction.dataset.head || '';
        document.getElementById('editDeptHeadTitle').value = targetRowForAction.dataset.headTitle || '';
        document.getElementById('editDeptBeds').value = targetRowForAction.dataset.beds || 30;
        document.getElementById('editDeptExt').value = targetRowForAction.dataset.ext || '';
        document.getElementById('editDeptStatus').value = targetRowForAction.dataset.status || 'active';

        document.getElementById('editDeptModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editDeptModal').classList.add('hidden');
        targetRowForAction = null;
    }

    function handleEditSubmit(e) {
        e.preventDefault();
        if(!targetRowForAction) return;

        const name = document.getElementById('editDeptNameAr').value;
        const code = document.getElementById('editDeptCode').value;
        const head = document.getElementById('editDeptHead').value;
        const building = document.getElementById('editDeptBuilding').value;
        const status = document.getElementById('editDeptStatus').value;

        targetRowForAction.dataset.nameAr = name;
        targetRowForAction.dataset.code = code;
        targetRowForAction.dataset.head = head;
        targetRowForAction.dataset.building = building;
        targetRowForAction.dataset.status = status;

        const nameEl = targetRowForAction.querySelector('.dept-row td:first-child span.truncate');
        if(nameEl) nameEl.innerText = name;

        const codeEl = targetRowForAction.querySelector('.dept-row td:first-child span.font-mono');
        if(codeEl) codeEl.innerText = code;

        const headEl = targetRowForAction.querySelector('.dept-row td:nth-child(2) span:first-child');
        if(headEl) headEl.innerText = head;

        const badge = targetRowForAction.querySelector('.status-badge');
        if(badge) {
            if(status === 'active') {
                badge.className = 'status-badge inline-flex items-center gap-1.5 text-[10.5px] font-bold text-emerald-700 bg-emerald-50 dark:bg-emerald-950/40 dark:text-emerald-300 px-2.5 py-1 rounded-full border border-emerald-200/80 dark:border-emerald-800/60';
                badge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>' + "{{ $isRtl ? 'تشغيلي كامل' : 'Operational' }}";
            } else {
                badge.className = 'status-badge inline-flex items-center gap-1.5 text-[10.5px] font-bold text-amber-700 bg-amber-50 dark:bg-amber-950/40 dark:text-amber-300 px-2.5 py-1 rounded-full border border-amber-200/80 dark:border-amber-800/60';
                badge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>' + "{{ $isRtl ? 'صيانة وتعقيم' : 'Maintenance' }}";
            }
        }

        closeEditModal();
        showToast("{{ $isRtl ? 'تم تحديث بيانات القسم والجاهزية بنجاح.' : 'Department data updated successfully.' }}");
    }

    // 4. Status Toggle Modal
    function openStatusModal(btn) {
        targetRowForAction = btn.closest('tr');
        if(!targetRowForAction) return;

        const deptName = targetRowForAction.dataset.nameAr || targetRowForAction.dataset.name;
        const currentStatus = targetRowForAction.dataset.status;

        if(currentStatus === 'active') {
            document.getElementById('statusModalTitle').innerText = "{{ $isRtl ? 'تحويل القسم إلى صيانة وتعقيم' : 'Switch to Maintenance' }}";
            document.getElementById('statusModalDesc').innerText = `{{ $isRtl ? 'هل تريد تغيير حالة قسم (' : 'Are you sure you want to put (' }}${deptName}{{ $isRtl ? ') إلى صيانة وتعقيم دوري؟ سيتم إخطار أقسام الطوارئ والدخول.' : ')?' }}`;
            document.getElementById('confirmStatusBtn').innerText = "{{ $isRtl ? 'تأكيد التعقيم والصيانة' : 'Confirm Maintenance' }}";
            document.getElementById('confirmStatusBtn').className = "px-5 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-black rounded-xl text-xs shadow-md transition-all cursor-pointer";
        } else {
            document.getElementById('statusModalTitle').innerText = "{{ $isRtl ? 'إعادة تشغيل وتفعيل القسم' : 'Reactivate Department' }}";
            document.getElementById('statusModalDesc').innerText = `{{ $isRtl ? 'هل تريد إعادة تفعيل وتشغيل قسم (' : 'Are you sure you want to reactivate (' }}${deptName}{{ $isRtl ? ') واستقبال المرضى فوراً؟' : ')?' }}`;
            document.getElementById('confirmStatusBtn').innerText = "{{ $isRtl ? 'تفعيل واستئناف التشغيل' : 'Activate Department' }}";
            document.getElementById('confirmStatusBtn').className = "px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-black rounded-xl text-xs shadow-md transition-all cursor-pointer";
        }

        document.getElementById('statusDeptModal').classList.remove('hidden');
    }

    function closeStatusModal() {
        document.getElementById('statusDeptModal').classList.add('hidden');
        targetRowForAction = null;
    }

    function confirmDeptStatusToggle() {
        if(!targetRowForAction) return;

        const currentStatus = targetRowForAction.dataset.status;
        const newStatus = currentStatus === 'active' ? 'maintenance' : 'active';
        targetRowForAction.dataset.status = newStatus;

        const badge = targetRowForAction.querySelector('.status-badge');
        if(badge) {
            if(newStatus === 'active') {
                badge.className = 'status-badge inline-flex items-center gap-1.5 text-[10.5px] font-bold text-emerald-700 bg-emerald-50 dark:bg-emerald-950/40 dark:text-emerald-300 px-2.5 py-1 rounded-full border border-emerald-200/80 dark:border-emerald-800/60';
                badge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>' + "{{ $isRtl ? 'تشغيلي كامل' : 'Operational' }}";
            } else {
                badge.className = 'status-badge inline-flex items-center gap-1.5 text-[10.5px] font-bold text-amber-700 bg-amber-50 dark:bg-amber-950/40 dark:text-amber-300 px-2.5 py-1 rounded-full border border-amber-200/80 dark:border-amber-800/60';
                badge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>' + "{{ $isRtl ? 'صيانة وتعقيم' : 'Maintenance' }}";
            }
        }

        closeStatusModal();
        showToast("{{ $isRtl ? 'تم تحديث الحالة التشغيلية للقسم بنجاح.' : 'Department status updated.' }}");
    }

    // 5. Add Department Modal
    function openDeptModal() {
        document.getElementById('deptModal').classList.remove('hidden');
    }

    function closeDeptModal() {
        document.getElementById('deptModal').classList.add('hidden');
    }

    function handleFormSubmit(e) {
        e.preventDefault();
        closeDeptModal();
        showToast("{{ $isRtl ? 'تم تسجيل واعتماد القسم الطبي الجديد بنجاح.' : 'Department registered successfully.' }}");
    }

    // 6. Print Functions
    function printSingleDeptSlip(btnOrRow) {
        const row = btnOrRow.closest ? btnOrRow.closest('tr') : btnOrRow;
        if(!row) return;

        const deptName = row.dataset.nameAr || row.dataset.name;
        document.getElementById('printReportTitle').innerText = `{{ $isRtl ? 'تقرير السعة والإشغال - ' : 'Census Report - ' }}${deptName}`;
        
        showToast("{{ $isRtl ? 'جاري تجهيز كشف السعة السريرية للطباعة...' : 'Preparing census audit for print...' }}");
        setTimeout(() => {
            window.print();
        }, 300);
    }

    function triggerExportCensus() {
        document.getElementById('printReportTitle').innerText = "{{ $isRtl ? 'كشف السعة السريرية والإشغال العام للأقسام' : 'Hospital-Wide Bed Census Audit' }}";
        showToast("{{ $isRtl ? 'جاري تجهيز التقرير العام لجميع الأقسام...' : 'Preparing full audit for print...' }}");
        setTimeout(() => {
            window.print();
        }, 300);
    }

    // 7. Toast Notification Controller
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
