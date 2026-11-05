@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    // إحصائيات سجلات المرضى المعتمدة في العيادة السريرية
    $patientStats = $patientStats ?? [
        'total_patients'   => 1248,
        'today_consulted'  => 8,
        'completed_cases'  => 6,
        'recent_updated'   => 89,
    ];

    // قائمة سجلات المرضى (متوافقة 1:1 مع هوية مستشفى الرشيد التخصصي - بصنعاء)
    $patients = $patients ?? [
        [
            'id' => 101,
            'mrn' => 'MRN-88421',
            'national_id' => '1084920194',
            'name' => $isRtl ? 'سارة فهد العتيبي' : 'Sarah Fahad Al-Otaibi',
            'gender_age' => $isRtl ? 'أنثى، 34 سنة' : 'Female, 34 yrs',
            'blood_type' => 'A+',
            'phone' => '+967 77 123 4567',
            'last_visit' => $isRtl ? 'اليوم · 08:30 AM' : 'Today · 08:30 AM',
            'total_visits' => 6,
            'status' => 'completed',
            'diagnosis' => $isRtl ? 'متابعة ارتفاع ضغط الدم الشرياني وتخطيط القلب ECG' : 'Hypertension follow-up & resting ECG review',
            'latest_vitals' => [
                'bp' => '128/82',
                'pulse' => '76 bpm',
                'temp' => '36.8 °C',
                'spo2' => '98%',
            ],
        ],
        [
            'id' => 102,
            'mrn' => 'MRN-89104',
            'national_id' => '1039485721',
            'name' => $isRtl ? 'طارق عبدالعزيز الدوسري' : 'Tariq Abdulaziz Al-Dosari',
            'gender_age' => $isRtl ? 'ذكر، 42 سنة' : 'Male, 42 yrs',
            'blood_type' => 'O+',
            'phone' => '+967 77 987 6543',
            'last_visit' => $isRtl ? 'اليوم · 09:00 AM' : 'Today · 09:00 AM',
            'total_visits' => 4,
            'status' => 'active',
            'diagnosis' => $isRtl ? 'ألم صدري غير نمطي وإجهاد متكرر - تخطيط جهد' : 'Atypical chest discomfort & exertional fatigue',
            'latest_vitals' => [
                'bp' => '135/86',
                'pulse' => '80 bpm',
                'temp' => '37.0 °C',
                'spo2' => '97%',
            ],
        ],
        [
            'id' => 103,
            'mrn' => 'MRN-90218',
            'national_id' => '1092837465',
            'name' => $isRtl ? 'نورة عبدالله الشهري' : 'Noura Abdullah Al-Shehri',
            'gender_age' => $isRtl ? 'أنثى، 29 سنة' : 'Female, 29 yrs',
            'blood_type' => 'B+',
            'phone' => '+967 77 332 1100',
            'last_visit' => $isRtl ? 'اليوم · 09:30 AM' : 'Today · 09:30 AM',
            'total_visits' => 2,
            'status' => 'active',
            'diagnosis' => $isRtl ? 'خفقان قلبي تسارعي وتتبع إنزيمات عضلة القلب' : 'Sinus tachycardia review & cardiac biomarkers',
            'latest_vitals' => [
                'bp' => '115/75',
                'pulse' => '72 bpm',
                'temp' => '36.7 °C',
                'spo2' => '99%',
            ],
        ],
        [
            'id' => 104,
            'mrn' => 'MRN-91452',
            'national_id' => '1058291048',
            'name' => $isRtl ? 'سلطان محمد القحطاني' : 'Sultan Mohammed Al-Qahtani',
            'gender_age' => $isRtl ? 'ذكر، 51 سنة' : 'Male, 51 yrs',
            'blood_type' => 'A-',
            'phone' => '+967 77 778 8990',
            'last_visit' => $isRtl ? 'اليوم · 10:00 AM' : 'Today · 10:00 AM',
            'total_visits' => 8,
            'status' => 'completed',
            'diagnosis' => $isRtl ? 'فحص دوري وقائي بعد القسطرة العلاجية PCI' : 'Post-PCI surveillance & echocardiogram check',
            'latest_vitals' => [
                'bp' => '130/80',
                'pulse' => '68 bpm',
                'temp' => '36.9 °C',
                'spo2' => '98%',
            ],
        ],
        [
            'id' => 105,
            'mrn' => 'MRN-92330',
            'national_id' => '1074829103',
            'name' => $isRtl ? 'مريم إبراهيم الغامدي' : 'Maryam Ibrahim Al-Ghamdi',
            'gender_age' => $isRtl ? 'أنثى، 38 سنة' : 'Female, 38 yrs',
            'blood_type' => 'O-',
            'phone' => '+967 77 445 5667',
            'last_visit' => $isRtl ? 'أمس · 11:20 AM' : 'Yesterday · 11:20 AM',
            'total_visits' => 5,
            'status' => 'completed',
            'diagnosis' => $isRtl ? 'اضطراب نبض ومراجعة جهاز مراقبة القلب Holter' : 'Arrhythmia review (24-hr Holter Telemetry)',
            'latest_vitals' => [
                'bp' => '120/78',
                'pulse' => '74 bpm',
                'temp' => '36.8 °C',
                'spo2' => '96%',
            ],
        ],
        [
            'id' => 106,
            'mrn' => 'MRN-93411',
            'national_id' => '1047291048',
            'name' => $isRtl ? 'عبدالعزيز خالد المطيري' : 'Abdulaziz Khalid Al-Mutairi',
            'gender_age' => $isRtl ? 'ذكر، 45 سنة' : 'Male, 45 yrs',
            'blood_type' => 'AB+',
            'phone' => '+967 77 889 9001',
            'last_visit' => $isRtl ? '28 أغسطس 2026' : '28 Aug 2026',
            'total_visits' => 1,
            'status' => 'active',
            'diagnosis' => $isRtl ? 'متابعة دورية للشرايين التاجية وعلاج خافض للدهون' : 'Coronary artery disease follow-up & statin therapy',
            'latest_vitals' => [
                'bp' => '122/80',
                'pulse' => '70 bpm',
                'temp' => '36.6 °C',
                'spo2' => '99%',
            ],
        ],
        [
            'id' => 107,
            'mrn' => 'MRN-94102',
            'national_id' => '1029481729',
            'name' => $isRtl ? 'فاطمة حسن الزهراني' : 'Fatima Hassan Al-Zahrani',
            'gender_age' => $isRtl ? 'أنثى، 62 سنة' : 'Female, 62 yrs',
            'blood_type' => 'B+',
            'phone' => '+967 77 223 3445',
            'last_visit' => $isRtl ? '15 أغسطس 2026' : '15 Aug 2026',
            'total_visits' => 9,
            'status' => 'completed',
            'diagnosis' => $isRtl ? 'قصور قلب خفيف ومتابعة مدرات البول' : 'Mild heart failure surveillance & diuretic adjustments',
            'latest_vitals' => [
                'bp' => '138/85',
                'pulse' => '75 bpm',
                'temp' => '36.9 °C',
                'spo2' => '97%',
            ],
        ],
    ];
@endphp

@section('page-title', $isRtl ? 'قائمة المرضى والملفات السريرية' : 'Patient Records & Directory')
@section('role-label', $isRtl ? 'العيادة السريرية' : 'Clinical Practice')

@section('sidebar-links')
    <x-sidebar-link :href="route('doctor.dashboard')" :active="request()->routeIs('doctor.dashboard')">
        <x-slot:icon>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'لوحة التحكم' : 'Dashboard' }}
    </x-sidebar-link>

    <x-sidebar-link :href="route('doctor.schedule.index')" :active="request()->routeIs('doctor.schedule.*')">
        <x-slot:icon>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'جدول العيادة والمواعيد' : 'My Schedule' }}
    </x-sidebar-link>

    <x-sidebar-link :href="route('doctor.patients.index')" :active="request()->routeIs('doctor.patients.*')">
        <x-slot:icon>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'قائمة المرضى والملفات' : 'My Patients' }}
    </x-sidebar-link>

    <x-sidebar-link :href="route('doctor.notes.index')" :active="request()->routeIs('doctor.notes.*')">
        <x-slot:icon>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2Z"/>
                <path d="M9 13h6M9 17h6"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'الملاحظات والوصفات' : 'Medical Notes' }}
    </x-sidebar-link>

    <div class="pt-3 mt-3 border-t border-white/10">
        <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
            <x-slot:icon>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                </svg>
            </x-slot:icon>
            {{ $isRtl ? 'إعدادات الحساب' : 'Account Settings' }}
        </x-sidebar-link>
    </div>
@endsection

@section('content')
<div class="-mt-3 sm:-mt-5 lg:-mt-6 space-y-5 pb-8 font-sans dashboard-fade-in" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

    {{-- نافذة الإشعار التفاعلية العائمة --}}
    <div id="liveActionToast" class="fixed top-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 transform -translate-y-16 opacity-0 transition-all duration-300 pointer-events-none">
        <div class="bg-[#152C4B] text-white px-4 py-2.5 rounded-xl shadow-xl border border-[#14AFC3]/30 flex items-center gap-2.5 text-xs">
            <div class="w-6 h-6 rounded-full bg-[#14AFC3]/20 flex items-center justify-center text-[#14AFC3] flex-shrink-0">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <span id="liveActionToastMsg" class="font-medium">{{ $isRtl ? 'تم الحفظ بنجاح' : 'Action saved successfully' }}</span>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         1. الشريط العلوي الموحد (مطابق تماماً لجدول العيادة ولوحة التحكم)
    ══════════════════════════════════════════════ --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] inline-block animate-pulse"></span>
                <h1 class="text-2xl font-black text-[#152C4B] tracking-tight">
                    {{ $isRtl ? 'قائمة المرضى والملفات السريرية' : 'Patient Records & Directory' }}
                </h1>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100">
                    {{ $isRtl ? 'عيادة القلب 204' : 'Cardiology Suite 204' }}
                </span>
            </div>
            <p class="text-sm text-slate-500 mt-1">
                {{ $isRtl ? 'استعراض السجلات الطبية للمرضى، المؤشرات الحيوية، تحرير الوصفات الفورية ومتابعة الكشوفات.' : 'Access verified patient histories, vitals, prescribe medications instantly, and review medical records.' }}
            </p>
        </div>

        {{-- شريحة التاريخ الثابتة لليوم الحالي --}}
        <div class="flex items-center gap-2.5">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-slate-200 text-xs font-bold text-slate-700 shadow-xs">
                <svg class="w-4 h-4 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ now()->locale(app()->getLocale())->isoFormat('dddd، D MMMM YYYY') }}</span>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         2. بطاقات الإحصائيات الأربع الموحدة (موسطة ومنظمة تماماً وفق المنهجية الموحدة)
    ══════════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- Card 1: Solid Teal Featured Card (موسطة مع تأثير الدائرة العلوية) --}}
        <div class="relative overflow-hidden rounded-2xl p-6 text-white text-center shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center bg-[#0C6B78]">
            <div class="absolute -right-4 -top-4 w-24 h-24 rounded-full bg-white/10 pointer-events-none"></div>
            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center mb-2.5 text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <span class="text-[11px] font-extrabold uppercase tracking-widest text-teal-100">
                {{ $isRtl ? 'إجمالي سجلات المرضى' : 'TOTAL PATIENT FILES' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-white my-2 tracking-tight font-mono">
                {{ number_format($patientStats['total_patients'] ?? 1248) }}
            </div>
            <div class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-white/20 text-white backdrop-blur-xs">
                <span>{{ $isRtl ? 'سجلات طبية معتمدة' : 'Verified files' }}</span>
            </div>
        </div>

        {{-- Card 2: Consulted Today (موسطة) --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'كشوفات اليوم' : 'CONSULTED TODAY' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $patientStats['today_consulted'] ?? 8 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'في العيادة 204' : 'Suite 204' }}</span>
            </div>
        </div>

        {{-- Card 3: Completed Consultations (موسطة) --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'كشوفات تم إنجازها' : 'COMPLETED CASES' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $patientStats['completed_cases'] ?? 6 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'تم توثيق الملاحظات' : 'Rx finalized' }}</span>
            </div>
        </div>

        {{-- Card 4: Recently Updated Files (موسطة) --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 8v8m-4-4h8"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'سجلات محدثة مؤخراً' : 'UPDATED THIS MONTH' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $patientStats['recent_updated'] ?? 89 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'سجلات نشطة' : 'Active records' }}</span>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         3. جدول سجلات المرضى الموحد والمريح (بحث + فلاتر + جدول)
    ══════════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        {{-- شريط الفلاتر والبحث --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 border-b border-slate-100 bg-slate-50/50">
            {{-- Tabs --}}
            <div class="flex items-center gap-1.5 overflow-x-auto pb-1 sm:pb-0">
                <button onclick="filterPatients('all', this)"
                        class="patient-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-[#0C6B78] text-white shadow-xs">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>
                    </svg>
                    <span>{{ $isRtl ? 'جميع المرضى' : 'All Patients' }}</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-white/20 text-white">
                        {{ count($patients) }}
                    </span>
                </button>

                <button onclick="filterPatients('today', this)"
                        class="patient-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-white text-slate-600 border border-slate-200 hover:bg-[#E5FAFC] hover:text-[#0C6B78]">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <span>{{ $isRtl ? 'كشوفات اليوم' : 'Today Visits' }}</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-slate-100 text-slate-500">
                        4
                    </span>
                </button>

                <button onclick="filterPatients('completed', this)"
                        class="patient-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-white text-slate-600 border border-slate-200 hover:bg-[#E5FAFC] hover:text-[#0C6B78]">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ $isRtl ? 'كشوفات مكتملة' : 'Completed' }}</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-slate-100 text-slate-500">
                        4
                    </span>
                </button>
            </div>

            {{-- مربع البحث التفاعلي --}}
            <div class="relative w-full sm:w-80">
                <svg width="14" height="14" class="absolute {{ $isRtl ? 'right-3' : 'left-3' }} top-1/2 -translate-y-1/2 text-slate-400"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="m21 21-4.35-4.35"/>
                </svg>
                <input type="text"
                       id="patientSearchInput"
                       onkeyup="searchPatientTable()"
                       placeholder="{{ $isRtl ? 'بحث باسم المريض، رقم الملف MRN، أو الهاتف...' : 'Search by name, MRN, phone...' }}"
                       class="{{ $isRtl ? 'pr-9 pl-4' : 'pl-9 pr-4' }} py-2 bg-white border border-slate-200 rounded-xl text-xs
                              focus:border-[#14AFC3] focus:ring-1 focus:ring-[#14AFC3] outline-none w-full transition font-medium placeholder:text-slate-400">
            </div>
        </div>

        {{-- Master Patient Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[1000px] border-collapse" id="patientMasterTable">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
                        <th class="w-[22%] px-5 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'المريض' : 'Patient' }}
                        </th>
                        <th class="w-[14%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'العمر والجنس' : 'Age & Gender' }}
                        </th>
                        <th class="w-[11%] px-4 py-3.5 text-center whitespace-nowrap">
                            {{ $isRtl ? 'فصيلة الدم' : 'Blood Group' }}
                        </th>
                        <th class="w-[17%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'رقم الهاتف' : 'Phone Number' }}
                        </th>
                        <th class="w-[16%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'تاريخ الزيارة' : 'Visit Date' }}
                        </th>
                        <th class="w-[20%] px-5 py-3.5 text-center whitespace-nowrap">
                            {{ $isRtl ? 'الإجراءات السريرية' : 'Clinical Actions' }}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($patients as $patient)
                        <tr class="hover:bg-[#E5FAFC]/25 transition patient-row"
                            data-search="{{ strtolower($patient['name'] . ' ' . $patient['mrn'] . ' ' . $patient['national_id'] . ' ' . $patient['phone']) }}"
                            data-status="{{ $patient['status'] }}"
                            data-today="{{ str_contains($patient['last_visit'], 'Today') || str_contains($patient['last_visit'], 'اليوم') ? 'yes' : 'no' }}">

                            {{-- 1. المريض: الاسم والأفاتار فقط تحت العنوان مباشرة --}}
                            <td class="px-5 py-3.5 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-[#E5FAFC] text-[#0C6B78] font-black text-xs flex items-center justify-center flex-shrink-0 border border-teal-100 shadow-2xs">
                                        {{ mb_substr($patient['name'], 0, 1) }}
                                    </div>
                                    <span class="font-extrabold text-[#152C4B] text-[13px] tracking-tight">
                                        {{ $patient['name'] }}
                                    </span>
                                </div>
                            </td>

                            {{-- 2. العمر والجنس تحت العنوان مباشرة --}}
                            <td class="px-4 py-3.5 whitespace-nowrap">
                                <span class="text-slate-700 font-semibold text-xs">
                                    {{ $patient['gender_age'] }}
                                </span>
                            </td>

                            {{-- 3. فصيلة الدم تحت العنوان مباشرة (موسطة) --}}
                            <td class="px-4 py-3.5 text-center whitespace-nowrap">
                                <span class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-md text-xs font-mono font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100 shadow-2xs">
                                    <bdi dir="ltr">{{ $patient['blood_type'] }}</bdi>
                                </span>
                            </td>

                            {{-- 4. رقم الهاتف تحت العنوان مباشرة --}}
                            <td class="px-4 py-3.5 whitespace-nowrap">
                                <div class="text-slate-600 font-mono text-xs flex items-center gap-1.5">
                                    <svg width="12" height="12" class="text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                    <bdi dir="ltr">{{ $patient['phone'] }}</bdi>
                                </div>
                            </td>

                            {{-- 5. تاريخ الزيارة وعدد الكشوفات تحت العنوان مباشرة --}}
                            <td class="px-4 py-3.5 whitespace-nowrap">
                                <div class="text-[#152C4B] font-bold text-xs">{{ $patient['last_visit'] }}</div>
                                <div class="text-slate-400 text-[10.5px] mt-0.5">
                                    <span class="font-bold text-[#0C6B78] font-mono">{{ $patient['total_visits'] }}</span> {{ $isRtl ? 'كشوفات سابقة' : 'prior visits' }}
                                </div>
                            </td>

                            {{-- 6. الإجراءات السريرية (إضافة وصفة + الملف الطبي) تحت العنوان مباشرة --}}
                            <td class="w-[20%] px-5 py-3.5 text-center whitespace-nowrap actions-cell">
                                <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                                    {{-- زر تحرير وصفة طبية --}}
                                    <button onclick="openPrescriptionCard('{{ $patient['id'] }}', '{{ $patient['name'] }}', '{{ $patient['mrn'] }}', '{{ $patient['gender_age'] }}', '{{ $patient['diagnosis'] }}')" title="{{ $isRtl ? 'تحرير وصفة طبية وكشف للمريض' : 'Issue Prescription' }}" class="h-8 px-3 rounded-xl bg-[#0C6B78] hover:bg-[#152C4B] text-white text-[11px] font-bold transition shadow-xs flex items-center justify-center gap-1.5 cursor-pointer">
                                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        <span>{{ $isRtl ? 'إضافة وصفة' : 'Add Rx' }}</span>
                                    </button>

                                    {{-- زر عرض الملف الطبي --}}
                                    <button onclick="openPatientModal({{ json_encode($patient) }})"
                                            title="{{ $isRtl ? 'عرض كارت بيانات الملف الطبي' : 'View Patient Medical File' }}"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-[#E5FAFC] hover:bg-teal-100 text-[#0C6B78] text-[11px] font-bold transition border border-teal-200/60 shadow-xs cursor-pointer">
                                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <span>{{ $isRtl ? 'الملف الطبي' : 'Medical File' }}</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-10 text-center text-slate-400 font-medium text-xs">
                                {{ $isRtl ? 'لم يتم العثور على سجلات تطابق البحث.' : 'No patient records found matching search.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ملخص الفوتر --}}
        <div class="flex items-center justify-between px-5 py-3.5 bg-slate-50/60 border-t border-slate-100 text-xs text-slate-500">
            <span>
                {{ $isRtl
                    ? 'عرض ' . count($patients) . ' من أصل ' . ($patientStats['total_patients'] ?? count($patients)) . ' مريض مسجل'
                    : 'Showing ' . count($patients) . ' of ' . ($patientStats['total_patients'] ?? count($patients)) . ' registered patients' }}
            </span>
            <span class="font-medium text-slate-400">
                {{ $isRtl ? 'نظام السجلات والوصفات الطبية EMR الموحد' : 'Enterprise Electronic Medical Record' }}
            </span>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         4. كارت تحرير الوصفة والتشخيص السريري (مدمج، مرتب، متناسق واحترافي)
    ══════════════════════════════════════════════ --}}
    <div id="prescriptionModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/65 backdrop-blur-xs hidden p-3 sm:p-4 anim-overlay">
        <div class="bg-white rounded-3xl w-full max-w-3xl shadow-2xl border border-slate-200 overflow-hidden max-h-[92vh] flex flex-col anim-modal-pop">
            
            {{-- Luxury Branded Header (Compact & Streamlined) --}}
            <div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 100%); background-color: #152C4B;" class="px-6 py-3.5 text-white flex-shrink-0">
                <div class="flex items-center justify-between text-xs">
                    {{-- Patient & Clinic Info Strip --}}
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/15 border border-white/25 backdrop-blur-xs flex items-center justify-center text-[#14AFC3] font-black text-sm flex-shrink-0 shadow-inner">
                            Rx
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-base sm:text-lg font-black text-white tracking-tight" id="rxPatientName">سارة فهد العتيبي</h3>
                                <span class="bg-black/25 text-teal-200 font-mono font-bold text-[11px] px-2 py-0.5 rounded-md border border-white/10">
                                    <bdi dir="ltr" id="rxPatientMRN">MRN-88421</bdi>
                                </span>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-white/15 text-teal-100 border border-white/20">
                                    {{ $isRtl ? 'وصفة سريرية' : 'Consult Rx' }}
                                </span>
                            </div>
                            <div class="text-teal-100/80 text-[11px] font-medium flex items-center gap-1.5 mt-0.5">
                                <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي' : 'Al-Rasheed Hospital' }}</span>
                                <span class="text-white/40">·</span>
                                <span id="rxPatientInfo">أنثى، 34 سنة · عيادة 204</span>
                            </div>
                        </div>
                    </div>

                    {{-- Actions (Suite + Close) --}}
                    <div class="flex items-center gap-2">
                        <span class="hidden sm:inline-flex px-2.5 py-1 rounded-full text-[10.5px] font-bold bg-white/10 text-teal-100 border border-white/15">
                            {{ $isRtl ? 'عيادة القلب 204' : 'Suite 204' }}
                        </span>
                        <button type="button" onclick="closePrescriptionModal()" class="w-7 h-7 rounded-lg bg-white/10 hover:bg-white/25 text-white flex items-center justify-center transition-all cursor-pointer font-bold text-xs" title="{{ $isRtl ? 'إغلاق' : 'Close' }}">✕</button>
                    </div>
                </div>
            </div>

            {{-- Form Body (Compact & Highly Structured) --}}
            <form onsubmit="submitPrescriptionForm(event)" class="space-y-3 p-5 overflow-y-auto text-xs bg-[#F8FAFC]">
                <input type="hidden" id="rxPatientId" value="">

                {{-- Row 1: Diagnosis & Instructions (2-Column Grid) --}}
                <div class="grid grid-cols-1 md:grid-cols-12 gap-3">
                    {{-- 1. التشخيص الطبي السريري (7 Cols) --}}
                    <div class="md:col-span-7 bg-white p-3.5 rounded-2xl border border-slate-200/90 shadow-2xs space-y-2">
                        <div class="flex items-center justify-between">
                            <label class="text-[11.5px] font-black text-[#152C4B] flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span>{{ $isRtl ? 'التشخيص الطبي السريري المعتمد' : 'Clinical Diagnosis' }}</span>
                                <span class="text-rose-500 font-bold">*</span>
                            </label>
                            <span class="text-[9.5px] font-mono font-bold text-[#0C6B78] bg-[#E5FAFC] px-1.5 py-0.5 rounded border border-teal-100">
                                ICD-10
                            </span>
                        </div>

                        <input type="text" id="rxDiagnosis" required
                               placeholder="{{ $isRtl ? 'متابعة ارتفاع ضغط دم شرياني وتخطيط قلب سليم' : 'Arterial hypertension & resting ECG review' }}"
                               class="w-full h-9 px-3 bg-slate-50/70 border border-slate-200 rounded-xl text-xs font-bold text-[#152C4B] focus:bg-white focus:border-[#14AFC3] focus:ring-1 focus:ring-[#14AFC3]/20 outline-none transition-all placeholder:text-slate-400">
                        
                        {{-- Quick Tags --}}
                        <div class="flex flex-wrap items-center gap-1 pt-0.5">
                            <button type="button" onclick="insertRxDiagnosis('{{ $isRtl ? 'متابعة ارتفاع ضغط دم شرياني وتخطيط قلب سليم' : 'Arterial hypertension & ECG review' }}')" 
                                    class="px-2 py-0.5 rounded-md bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10px] font-bold text-slate-600 transition-colors cursor-pointer">+ ضغط الدم (HTN)</button>
                            <button type="button" onclick="insertRxDiagnosis('{{ $isRtl ? 'ألم صدري غير نمطي وإجهاد متكرر - تخطيط جهد' : 'Atypical chest discomfort & fatigue' }}')" 
                                    class="px-2 py-0.5 rounded-md bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10px] font-bold text-slate-600 transition-colors cursor-pointer">+ ألم صدري غير نمطي</button>
                            <button type="button" onclick="insertRxDiagnosis('{{ $isRtl ? 'خفقان قلبي تسارعي وتتبع إنزيمات القلب Troponin' : 'Sinus tachycardia review' }}')" 
                                    class="px-2 py-0.5 rounded-md bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10px] font-bold text-slate-600 transition-colors cursor-pointer">+ تسارع نبض (خفقان)</button>
                        </div>
                    </div>

                    {{-- 2. إرشادات وتوجيهات خاصة للمريض (5 Cols) --}}
                    <div class="md:col-span-5 bg-white p-3.5 rounded-2xl border border-slate-200/90 shadow-2xs space-y-2">
                        <label class="text-[11.5px] font-black text-[#152C4B] flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $isRtl ? 'إرشادات وتوجيهات المريض' : 'Patient Instructions' }}</span>
                        </label>

                        <input type="text" id="rxInstructions"
                               placeholder="{{ $isRtl ? 'تناول الدواء بعد الوجبات ومراجعة بعد أسبوعين...' : 'Take after meals, follow-up in 2 weeks...' }}"
                               class="w-full h-9 px-3 bg-slate-50/70 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:bg-white focus:border-[#14AFC3] focus:ring-1 focus:ring-[#14AFC3]/20 outline-none transition-all placeholder:text-slate-400">
                        
                        {{-- Quick Tags --}}
                        <div class="flex flex-wrap items-center gap-1 pt-0.5">
                            <button type="button" onclick="insertRxInstruction('{{ $isRtl ? 'تناول الدواء بعد الوجبات مباشرة' : 'Take after meals' }}')" class="px-2 py-0.5 rounded-md bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10px] font-bold text-slate-600 transition-colors cursor-pointer">+ بعد الوجبات</button>
                            <button type="button" onclick="insertRxInstruction('{{ $isRtl ? 'فحص ضغط الدم صباحاً وتسجيله' : 'Daily BP log' }}')" class="px-2 py-0.5 rounded-md bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10px] font-bold text-slate-600 transition-colors cursor-pointer">+ قياس الضغط يومياً</button>
                            <button type="button" onclick="insertRxInstruction('{{ $isRtl ? 'مراجعة العيادة بعد أسبوعين' : 'In 2 weeks' }}')" class="px-2 py-0.5 rounded-md bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10px] font-bold text-slate-600 transition-colors cursor-pointer">+ بعد أسبوعين</button>
                        </div>
                    </div>
                </div>

                {{-- Row 2: وصف الحالة والملاحظات السريرية (Compact Progress Notes) --}}
                <div class="bg-white p-3 rounded-2xl border border-slate-200/90 shadow-2xs">
                    <label class="text-[11.5px] font-black text-[#152C4B] flex items-center gap-1.5 mb-1.5">
                        <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>{{ $isRtl ? 'الفحص السريري والملاحظات الطبية' : 'Clinical Exam & Progress Notes' }}</span>
                    </label>
                    <textarea id="rxNotes" rows="1"
                              placeholder="{{ $isRtl ? 'أعراض المريض، الفحص البدني، نتائج تخطيط القلب ECG، وتوصيات الطبيب المعالج...' : 'Chief complaint, heart sounds, ECG review, doctor comments...' }}"
                              class="w-full px-3 py-2 bg-slate-50/70 border border-slate-200 rounded-xl text-xs text-slate-800 font-medium focus:bg-white focus:border-[#14AFC3] focus:ring-1 focus:ring-[#14AFC3]/20 outline-none transition-all resize-none min-h-[42px] placeholder:text-slate-400"></textarea>
                </div>

                {{-- Row 3: الأدوية والعلاجات الموصوفة (Medical-Grade Rx Table) --}}
                <div class="bg-white p-3.5 rounded-2xl border border-slate-200/90 shadow-2xs space-y-2.5">
                    {{-- Prescription Table Header --}}
                    <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                        <div class="flex items-center gap-2">
                            <span class="w-5 h-5 rounded-md bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center font-bold text-[11px] font-mono">Rx</span>
                            <span class="text-xs font-black text-[#152C4B]">{{ $isRtl ? 'الأدوية والعلاجات الموصوفة' : 'Prescribed Medications' }}</span>
                        </div>
                        <button type="button" onclick="addMedicationRow()"
                                class="px-2.5 py-1 rounded-xl bg-[#E5FAFC] hover:bg-[#0C6B78] text-[#0C6B78] hover:text-white border border-teal-200/80 font-bold text-xs transition-all flex items-center gap-1.5 cursor-pointer shadow-2xs">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 4v16m8-8H4"/></svg>
                            <span>{{ $isRtl ? 'إضافة دواء آخر' : 'Add Medication' }}</span>
                        </button>
                    </div>

                    {{-- Medications Container --}}
                    <div id="medicationsContainer" class="space-y-2 max-h-48 overflow-y-auto pr-0.5">
                        <div class="medication-row p-2.5 bg-slate-50/80 border border-slate-200/90 rounded-xl grid grid-cols-1 sm:grid-cols-12 gap-2 items-center">
                            {{-- Drug Name & Strength --}}
                            <div class="sm:col-span-5">
                                <span class="block text-[10px] text-slate-400 font-bold mb-1">{{ $isRtl ? 'اسم الدواء والتركيز' : 'Drug Name & Strength' }}</span>
                                <input type="text" required placeholder="{{ $isRtl ? 'مثال: Bisoprolol 5mg' : 'e.g. Bisoprolol 5mg' }}"
                                       class="w-full h-8.5 px-2.5 bg-white border border-slate-200 rounded-lg text-xs font-bold text-[#152C4B] focus:border-[#14AFC3] outline-none">
                            </div>

                            {{-- Dosage & Frequency --}}
                            <div class="sm:col-span-4">
                                <span class="block text-[10px] text-slate-400 font-bold mb-1">{{ $isRtl ? 'الجرعة والتكرار' : 'Dosage & Frequency' }}</span>
                                <input type="text" required placeholder="{{ $isRtl ? 'قرص مرة واحدة صباحاً' : '1 tab once daily morning' }}"
                                       class="w-full h-8.5 px-2.5 bg-white border border-slate-200 rounded-lg text-xs font-medium text-slate-700 focus:border-[#14AFC3] outline-none">
                            </div>

                            {{-- Duration --}}
                            <div class="sm:col-span-2">
                                <span class="block text-[10px] text-slate-400 font-bold mb-1">{{ $isRtl ? 'المدة' : 'Duration' }}</span>
                                <input type="text" required placeholder="{{ $isRtl ? '30 يوماً' : '30 days' }}"
                                       class="w-full h-8.5 px-2.5 bg-white border border-slate-200 rounded-lg text-xs font-medium text-slate-700 focus:border-[#14AFC3] outline-none">
                            </div>

                            {{-- Delete Action --}}
                            <div class="sm:col-span-1 flex justify-center pt-3 sm:pt-4">
                                <button type="button" onclick="this.closest('.medication-row').remove()" class="w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-rose-500 hover:border-rose-200 hover:bg-rose-50/50 flex items-center justify-center transition-colors cursor-pointer font-bold text-xs" title="{{ $isRtl ? 'حذف' : 'Remove' }}">✕</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer Action Buttons --}}
                <div class="flex items-center justify-between pt-1">
                    <button type="button" onclick="closePrescriptionModal()" class="px-4 py-2 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 font-bold transition-colors cursor-pointer text-xs">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" style="direction: {{ $isRtl ? 'rtl' : 'ltr' }}; background-color: #0C6B78;" onmouseover="this.style.backgroundColor='#152C4B'" onmouseout="this.style.backgroundColor='#0C6B78'" class="px-5 py-2 rounded-xl text-white font-bold transition-all shadow-md flex items-center gap-2 cursor-pointer text-xs">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>{{ $isRtl ? 'اعتماد وحفظ الوصفة الطبية' : 'Save & Issue Prescription' }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         5. كارت بيانات الملف الطبي (نموذج احترافي موحد بألوان المشروع الأساسية)
    ══════════════════════════════════════════════ --}}
    <div id="patientModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/65 backdrop-blur-xs hidden p-4 anim-overlay">
        <div class="bg-white rounded-3xl w-full max-w-2xl shadow-2xl border border-slate-200 overflow-hidden anim-modal-pop">
            
            {{-- Luxury Branded Header (Dark Navy & Deep Teal Gradient with Inline Fallback) --}}
            <div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 100%); background-color: #152C4B;" class="px-6 py-5 text-white">
                {{-- Top Branding Bar --}}
                <div class="flex items-center justify-between pb-4 border-b border-white/15 text-xs">
                    <div class="flex items-center gap-2.5">
                        <div class="w-7 h-7 rounded-lg bg-white/15 backdrop-blur-xs flex items-center justify-center text-[#14AFC3]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-black text-white text-xs tracking-tight">{{ $isRtl ? 'مستشفى الرشيد التخصصي' : 'Al-Rasheed Specialized Hospital' }}</span>
                            <span class="text-teal-200/60 text-[10.5px] mx-1.5">·</span>
                            <span class="text-teal-100 font-medium text-[11px]">{{ $isRtl ? 'السجل الطبي الإلكتروني الموحد (EMR)' : 'Unified EMR Record' }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 rounded-full text-[10.5px] font-bold bg-white/15 text-teal-100 border border-white/20">
                            {{ $isRtl ? 'عيادة القلب · جناح 204' : 'Cardiology Suite 204' }}
                        </span>
                        <button type="button" onclick="closePatientModal()" class="w-7 h-7 rounded-lg bg-white/10 hover:bg-white/25 text-white flex items-center justify-center transition-all cursor-pointer font-bold text-xs" title="{{ $isRtl ? 'إغلاق' : 'Close' }}">✕</button>
                    </div>
                </div>

                {{-- Patient Dossier Hero Row --}}
                <div class="pt-4 flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-white/15 border-2 border-white/25 backdrop-blur-sm flex items-center justify-center text-[#14AFC3] font-black text-2xl flex-shrink-0 shadow-inner" id="modalInitial">
                        س
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-wrap items-center gap-2.5">
                            <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight" id="modalPatientName">سارة فهد العتيبي</h3>
                            <span class="px-2.5 py-0.5 rounded-lg text-xs font-mono font-black text-[#152C4B] bg-[#14AFC3] shadow-xs">
                                <bdi dir="ltr" id="modalBloodType">A+</bdi>
                            </span>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-white/20 text-white backdrop-blur-xs border border-white/20">{{ $isRtl ? 'ملف نشط' : 'Active' }}</span>
                        </div>
                        <div class="flex flex-wrap items-center gap-2 mt-2 text-xs">
                            <span class="bg-black/25 text-teal-200 font-mono font-bold text-xs px-2.5 py-0.5 rounded-md border border-white/10">
                                <bdi dir="ltr" id="modalMRN">MRN-88421</bdi>
                            </span>
                            <span class="text-white/40">·</span>
                            <span id="modalDemographics" class="text-white/90 font-medium">-</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Body --}}
            <div class="p-6 space-y-4 max-h-[72vh] overflow-y-auto text-xs bg-[#F8FAFC]">
                
                {{-- Demographic Grid (4 Clean Cards) --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <div class="p-3.5 rounded-2xl bg-white border border-slate-200/90 shadow-2xs">
                        <div class="flex items-center gap-1.5 text-slate-400 mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                            <span class="text-[11px] font-bold text-slate-500">{{ $isRtl ? 'رقم الهوية' : 'National ID' }}</span>
                        </div>
                        <bdi dir="ltr" class="font-mono font-bold text-slate-800 text-[13px] block" id="modalNationalID">-</bdi>
                    </div>
                    <div class="p-3.5 rounded-2xl bg-white border border-slate-200/90 shadow-2xs">
                        <div class="flex items-center gap-1.5 text-slate-400 mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="text-[11px] font-bold text-slate-500">{{ $isRtl ? 'هاتف التواصل' : 'Phone' }}</span>
                        </div>
                        <bdi dir="ltr" class="font-mono font-black text-[#0C6B78] text-[13px] block tracking-wide" id="modalPhone">-</bdi>
                    </div>
                    <div class="p-3.5 rounded-2xl bg-white border border-slate-200/90 shadow-2xs">
                        <div class="flex items-center gap-1.5 text-slate-400 mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            <span class="text-[11px] font-bold text-slate-500">{{ $isRtl ? 'إجمالي الزيارات' : 'Total Visits' }}</span>
                        </div>
                        <span class="font-bold text-[#152C4B] text-xs block" id="modalTotalVisits">-</span>
                    </div>
                    <div class="p-3.5 rounded-2xl bg-white border border-slate-200/90 shadow-2xs">
                        <div class="flex items-center gap-1.5 text-slate-400 mb-1.5">
                            <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                            <span class="text-[11px] font-bold text-slate-500">{{ $isRtl ? 'العيادة والجناح' : 'Suite' }}</span>
                        </div>
                        <span class="font-bold text-slate-700 text-xs block">{{ $isRtl ? 'عيادة القلب · 204' : 'Cardiology Suite 204' }}</span>
                    </div>
                </div>

                {{-- Quick Vitals (4 Prominent Cards with Explicit LTR Units) --}}
                <div class="bg-white p-4.5 rounded-2xl border border-slate-200/90 shadow-2xs">
                    <div class="flex items-center justify-between mb-3 pb-2.5 border-b border-slate-100">
                        <span class="text-xs font-black text-[#152C4B] flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                            <span>{{ $isRtl ? 'المؤشرات والعلامات الحيوية السريرية' : 'Latest Clinical Vital Signs' }}</span>
                        </span>
                        <span class="text-[10.5px] text-[#0C6B78] font-bold bg-[#E5FAFC] px-2.5 py-0.5 rounded-md border border-[#14AFC3]/20">
                            {{ $isRtl ? 'معتمد من غرفة الفرز السريري' : 'Triage Certified' }}
                        </span>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 text-center">
                        <div class="p-3 rounded-2xl border border-[#14AFC3]/30" style="background-color: #E5FAFC;">
                            <span class="text-[10.5px] text-[#0C6B78] block font-black mb-1">{{ $isRtl ? 'ضغط الدم (BP)' : 'Blood Pressure' }}</span>
                            <div dir="ltr" class="flex items-baseline justify-center gap-1.5">
                                <span class="font-mono font-black text-2xl text-[#0C6B78]" id="modalVitalBP">-</span>
                                <span class="text-[10px] text-teal-800 font-bold uppercase">mmHg</span>
                            </div>
                            <span class="text-[10px] font-bold text-[#0C6B78] bg-white px-2.5 py-0.5 rounded-md border border-teal-200/80 shadow-2xs mt-2 inline-block">{{ $isRtl ? 'طبيعي ومستقر' : 'Optimal' }}</span>
                        </div>
                        <div class="p-3 rounded-2xl bg-slate-50/80 border border-slate-200">
                            <span class="text-[10.5px] text-slate-500 block font-bold mb-1">{{ $isRtl ? 'معدل النبض' : 'Heart Rate' }}</span>
                            <div dir="ltr" class="flex items-baseline justify-center gap-1.5">
                                <span class="font-mono font-black text-2xl text-[#152C4B]" id="modalVitalPulse">-</span>
                                <span class="text-[10px] text-slate-500 font-bold uppercase">bpm</span>
                            </div>
                            <span class="text-[10px] font-bold text-slate-600 bg-white px-2.5 py-0.5 rounded-md border border-slate-200 mt-2 inline-block">{{ $isRtl ? 'إيقاع منتظم' : 'Regular' }}</span>
                        </div>
                        <div class="p-3 rounded-2xl bg-slate-50/80 border border-slate-200">
                            <span class="text-[10.5px] text-slate-500 block font-bold mb-1">{{ $isRtl ? 'تشبع الأكسجين' : 'SpO2' }}</span>
                            <div dir="ltr" class="flex items-baseline justify-center gap-0.5">
                                <span class="font-mono font-black text-2xl text-[#152C4B]" id="modalVitalSpO2">-</span>
                                <span class="text-xs text-slate-600 font-black font-mono">%</span>
                            </div>
                            <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-md border border-emerald-200 mt-2 inline-block">{{ $isRtl ? 'ممتاز ومثالي' : 'Excellent' }}</span>
                        </div>
                        <div class="p-3 rounded-2xl bg-slate-50/80 border border-slate-200">
                            <span class="text-[10.5px] text-slate-500 block font-bold mb-1">{{ $isRtl ? 'درجة الحرارة' : 'Temperature' }}</span>
                            <div dir="ltr" class="flex items-baseline justify-center gap-1">
                                <span class="font-mono font-black text-2xl text-[#152C4B]" id="modalVitalTemp">-</span>
                                <span class="text-[11px] text-slate-500 font-bold">°C</span>
                            </div>
                            <span class="text-[10px] font-bold text-slate-600 bg-white px-2.5 py-0.5 rounded-md border border-slate-200 mt-2 inline-block">{{ $isRtl ? 'حرارة طبيعية' : 'Normal' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Current Diagnosis Card --}}
                <div class="bg-white p-4.5 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-black text-[#152C4B] flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#0C6B78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span>{{ $isRtl ? 'التشخيص الطبي السريري المعتمد في الزيارة:' : 'Certified Clinical Diagnosis:' }}</span>
                        </span>
                        <span class="text-[10.5px] font-mono text-[#0C6B78] bg-[#E5FAFC] px-2 py-0.5 rounded-md font-bold">
                            ICD-10 Verified
                        </span>
                    </div>

                    <div class="p-3.5 rounded-xl border border-teal-200/90 shadow-2xs" style="background-color: #E5FAFC; border-right: 4px solid #0C6B78;">
                        <div class="font-black text-[#152C4B] text-[13.5px] leading-relaxed" id="modalDiagnosis">-</div>
                    </div>
                </div>

            </div>

            {{-- Modal Footer Actions --}}
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
                <button type="button" onclick="closePatientModal()" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold transition-colors cursor-pointer">
                    {{ $isRtl ? 'إغلاق' : 'Close' }}
                </button>
                <div class="flex items-center gap-2.5">
                    <button type="button" onclick="window.print()" style="direction: {{ $isRtl ? 'rtl' : 'ltr' }};" class="px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 font-bold transition-all shadow-2xs flex items-center gap-2 cursor-pointer text-xs">
                        <svg class="w-4 h-4 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        <span>{{ $isRtl ? 'طباعة الملخص' : 'Print Summary' }}</span>
                    </button>
                    <button type="button" id="modalIssueRxBtn" onclick="switchToPrescriptionFromModal()"
                            style="direction: {{ $isRtl ? 'rtl' : 'ltr' }}; background-color: #0C6B78;" onmouseover="this.style.backgroundColor='#152C4B'" onmouseout="this.style.backgroundColor='#0C6B78'"
                            class="px-5 py-2.5 rounded-xl text-white text-xs font-bold transition-all flex items-center gap-2 shadow-sm cursor-pointer">
                        <svg width="14" height="14" class="flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>{{ $isRtl ? 'تحرير وصفة دوائية' : 'Issue Prescription' }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    @keyframes modalPopIn {
        from { opacity: 0; transform: scale(0.96) translateY(10px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    .anim-modal-pop {
        animation: modalPopIn 0.24s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    @keyframes overlayFadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .anim-overlay {
        animation: overlayFadeIn 0.18s ease-out forwards;
    }
</style>

{{-- ══════════════════════════════════════════════
     6. البرمجيات التفاعلية (Javascript)
══════════════════════════════════════════════ --}}
<script>
    let activeModalPatient = null;

    // إشعار عائم Toast
    function showToast(message) {
        const toast = document.getElementById('liveActionToast');
        const msg = document.getElementById('liveActionToastMsg');
        if (toast && msg) {
            msg.innerText = message;
            toast.classList.remove('opacity-0', '-translate-y-16');
            setTimeout(() => {
                toast.classList.add('opacity-0', '-translate-y-16');
            }, 3000);
        }
    }

    // البحث الحي في جدول المرضى
    function searchPatientTable() {
        const query = document.getElementById('patientSearchInput').value.toLowerCase();
        const rows = document.querySelectorAll('.patient-row');
        rows.forEach(row => {
            const text = row.getAttribute('data-search') || '';
            row.style.display = text.includes(query) ? '' : 'none';
        });
    }

    // الفرز عبر التبويبات
    function filterPatients(type, el) {
        document.querySelectorAll('.patient-tab').forEach(btn => {
            btn.className = 'patient-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-white text-slate-600 border border-slate-200 hover:bg-[#E5FAFC] hover:text-[#0C6B78]';
            const counter = btn.querySelector('span:last-child');
            if (counter) {
                counter.className = 'text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-slate-100 text-slate-500';
            }
        });

        const activeBtn = el || (window.event ? window.event.currentTarget : null);
        if (activeBtn) {
            activeBtn.className = 'patient-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-[#0C6B78] text-white shadow-xs';
            const activeCounter = activeBtn.querySelector('span:last-child');
            if (activeCounter) {
                activeCounter.className = 'text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-white/20 text-white';
            }
        }

        const rows = document.querySelectorAll('.patient-row');
        rows.forEach(row => {
            if (type === 'all') {
                row.style.display = '';
            } else if (type === 'today') {
                row.style.display = row.getAttribute('data-today') === 'yes' ? '' : 'none';
            } else if (type === 'completed') {
                row.style.display = row.getAttribute('data-status') === 'completed' ? '' : 'none';
            }
        });
    }

    // فتح كارت إضافة وصفة طبية
    function openPrescriptionCard(id, name, mrn, info, diagnosis = '') {
        document.getElementById('rxPatientId').value = id;
        document.getElementById('rxPatientName').innerText = name;
        document.getElementById('rxPatientMRN').innerText = mrn;
        document.getElementById('rxPatientInfo').innerText = info;
        if (diagnosis) {
            document.getElementById('rxDiagnosis').value = diagnosis;
        }
        document.getElementById('prescriptionModal').classList.remove('hidden');
    }

    function closePrescriptionModal() {
        document.getElementById('prescriptionModal').classList.add('hidden');
    }

    // تعبئة سريعة للتشخيص والإرشادات
    function insertRxDiagnosis(text) {
        document.getElementById('rxDiagnosis').value = text;
    }
    function insertRxInstruction(text) {
        const el = document.getElementById('rxInstructions');
        if (el) {
            el.value = el.value ? (el.value + ' · ' + text) : text;
        }
    }

    // إضافة صف دواء ديناميكي
    function addMedicationRow() {
        const container = document.getElementById('medicationsContainer');
        const row = document.createElement('div');
        row.className = 'medication-row p-3.5 bg-slate-50/70 border border-slate-200 rounded-2xl grid grid-cols-1 sm:grid-cols-12 gap-2.5 items-center anim-modal-pop';
        row.innerHTML = `
            <div class="sm:col-span-5">
                <span class="block text-[10px] text-slate-400 font-bold mb-1">{{ $isRtl ? 'اسم الدواء والتركيز' : 'Drug Name & Strength' }}</span>
                <input type="text" required placeholder="{{ $isRtl ? 'مثال: Amoxicillin 500mg' : 'e.g. Amoxicillin 500mg' }}"
                       class="w-full px-3 py-1.5 bg-white border border-slate-200 rounded-xl text-xs font-bold text-[#152C4B] focus:border-[#14AFC3] outline-none">
            </div>
            <div class="sm:col-span-4">
                <span class="block text-[10px] text-slate-400 font-bold mb-1">{{ $isRtl ? 'الجرعة والتكرار' : 'Dosage & Frequency' }}</span>
                <input type="text" required placeholder="{{ $isRtl ? 'قرص 3 مرات يومياً بعد الأكل' : '1 tab 3 times daily' }}"
                       class="w-full px-3 py-1.5 bg-white border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:border-[#14AFC3] outline-none">
            </div>
            <div class="sm:col-span-2">
                <span class="block text-[10px] text-slate-400 font-bold mb-1">{{ $isRtl ? 'المدة' : 'Duration' }}</span>
                <input type="text" required placeholder="{{ $isRtl ? '7 أيام' : '7 days' }}"
                       class="w-full px-3 py-1.5 bg-white border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:border-[#14AFC3] outline-none">
            </div>
            <div class="sm:col-span-1 flex justify-center pt-3 sm:pt-4">
                <button type="button" onclick="this.closest('.medication-row').remove()" class="w-7 h-7 rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-rose-500 hover:border-rose-200 flex items-center justify-center transition-colors cursor-pointer font-bold text-xs" title="{{ $isRtl ? 'حذف' : 'Remove' }}">✕</button>
            </div>
        `;
        container.appendChild(row);
    }

    // حفظ واعتماد الوصفة الطبية
    function submitPrescriptionForm(e) {
        e.preventDefault();
        const patientName = document.getElementById('rxPatientName').innerText;
        closePrescriptionModal();
        showToast('{{ $isRtl ? "تم اعتماد وحفظ الوصفة الطبية بنجاح للمريض: " : "Prescription saved and issued for: " }}' + patientName);
    }

    // فتح كارت بيانات المريض
    function openPatientModal(patient) {
        activeModalPatient = patient;
        document.getElementById('modalInitial').innerText = patient.name.charAt(0);
        document.getElementById('modalPatientName').innerText = patient.name;
        document.getElementById('modalMRN').innerText = patient.mrn;
        document.getElementById('modalDemographics').innerText = patient.gender_age + ' · ' + (patient.blood_type || '');
        document.getElementById('modalNationalID').innerText = patient.national_id || '-';
        document.getElementById('modalPhone').innerText = patient.phone || '-';
        document.getElementById('modalBloodType').innerText = patient.blood_type || '-';
        document.getElementById('modalTotalVisits').innerText = (patient.total_visits || '0') + ' {{ $isRtl ? "زيارات" : "visits" }}';
        document.getElementById('modalDiagnosis').innerText = patient.diagnosis || '{{ $isRtl ? "لا توجد تشخيصات سريرية سابقة" : "No prior diagnosis" }}';

        if (patient.latest_vitals) {
            document.getElementById('modalVitalBP').innerText = patient.latest_vitals.bp || '-';
            document.getElementById('modalVitalPulse').innerText = (patient.latest_vitals.pulse || '-').toString().replace(/[^0-9]/g, '');
            document.getElementById('modalVitalTemp').innerText = (patient.latest_vitals.temp || '-').toString().replace(/[^\d.]/g, '');
            document.getElementById('modalVitalSpO2').innerText = (patient.latest_vitals.spo2 || '-').toString().replace(/[^0-9]/g, '');
        }

        document.getElementById('patientModal').classList.remove('hidden');
    }

    function closePatientModal() {
        document.getElementById('patientModal').classList.add('hidden');
    }

    function switchToPrescriptionFromModal() {
        if (!activeModalPatient) return;
        closePatientModal();
        openPrescriptionCard(
            activeModalPatient.id,
            activeModalPatient.name,
            activeModalPatient.mrn,
            activeModalPatient.gender_age,
            activeModalPatient.diagnosis || ''
        );
    }
</script>

@endsection
