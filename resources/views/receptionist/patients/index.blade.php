@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    // إحصائيات سجل المرضى والملفات
    $registryStats = $registryStats ?? [
        'total_patients'   => 3420,
        'today_registered' => 24,
        'month_registered' => 184,
        'active_files'     => 3210,
    ];

    // قائمة سجل المرضى والملفات الطبية (بيانات يمنية موحدة ومطابقة للمستشفى)
    $patients = $patients ?? [
        [
            'id'           => 1,
            'mrn'          => 'MRN-88421',
            'national_id'  => '01010048291',
            'name'         => $isRtl ? 'أحمد محمد الجهمي' : 'Ahmed Mohammed Al-Jahmi',
            'gender_age'   => $isRtl ? 'ذكر، 38 سنة' : 'Male, 38 yrs',
            'phone'        => '771234567',
            'blood_type'   => 'O+',
            'nationality'  => $isRtl ? 'يمني' : 'Yemeni',
            'city'         => $isRtl ? 'صنعاء - السبعين' : 'Sanaa - Al-Sabeen',
            'last_visit'   => $isRtl ? 'اليوم · عيادة الباطنية 204' : 'Today · Internal Med 204',
            'status'       => 'active',
            'status_label' => $isRtl ? 'ملف نشط' : 'Active File',
        ],
        [
            'id'           => 2,
            'mrn'          => 'MRN-88435',
            'national_id'  => '02010059218',
            'name'         => $isRtl ? 'بلقيس حميد الحبيشي' : 'Balqees Hameed Al-Hobaishi',
            'gender_age'   => $isRtl ? 'أنثى، 32 سنة' : 'Female, 32 yrs',
            'phone'        => '735987654',
            'blood_type'   => 'A+',
            'nationality'  => $isRtl ? 'يمنية' : 'Yemeni',
            'city'         => $isRtl ? 'إب - المشنة' : 'Ibb - Al-Mashannah',
            'last_visit'   => $isRtl ? 'اليوم · عيادة القلب 206' : 'Today · Cardiology 206',
            'status'       => 'active',
            'status_label' => $isRtl ? 'ملف نشط' : 'Active File',
        ],
        [
            'id'           => 3,
            'mrn'          => 'MRN-88448',
            'national_id'  => '01030091823',
            'name'         => $isRtl ? 'بشير عبدالكريم الوصابي' : 'Basheer Abdulkarim Al-Wosabi',
            'gender_age'   => $isRtl ? 'ذكر، 41 سنة' : 'Male, 41 yrs',
            'phone'        => '774332110',
            'blood_type'   => 'B+',
            'nationality'  => $isRtl ? 'يمني' : 'Yemeni',
            'city'         => $isRtl ? 'صنعاء - حدة' : 'Sanaa - Hadda',
            'last_visit'   => $isRtl ? 'منذ يومين · عيادة العيون 102' : '2 days ago · Ophthalmology',
            'status'       => 'active',
            'status_label' => $isRtl ? 'ملف نشط' : 'Active File',
        ],
        [
            'id'           => 4,
            'mrn'          => 'MRN-88456',
            'national_id'  => '04020038190',
            'name'         => $isRtl ? 'فاطمة صالح الذماري' : 'Fatima Saleh Al-Dhamari',
            'gender_age'   => $isRtl ? 'أنثى، 46 سنة' : 'Female, 46 yrs',
            'phone'        => '716778899',
            'blood_type'   => 'AB+',
            'nationality'  => $isRtl ? 'يمنية' : 'Yemeni',
            'city'         => $isRtl ? 'ذمار - حي الجامعة' : 'Dhamar - University District',
            'last_visit'   => $isRtl ? 'اليوم · عيادة الباطنية 204' : 'Today · Internal Med 204',
            'status'       => 'new',
            'status_label' => $isRtl ? 'ملف جديد اليوم' : 'New Today',
        ],
        [
            'id'           => 5,
            'mrn'          => 'MRN-88460',
            'national_id'  => '01010077265',
            'name'         => $isRtl ? 'عمار ياسر الأهدل' : 'Ammar Yasser Al-Ahdal',
            'gender_age'   => $isRtl ? 'ذكر، 53 سنة' : 'Male, 53 yrs',
            'phone'        => '779445566',
            'blood_type'   => 'O-',
            'nationality'  => $isRtl ? 'يمني' : 'Yemeni',
            'city'         => $isRtl ? 'الحديدة - الحوك' : 'Hodeidah - Al-Hawk',
            'last_visit'   => $isRtl ? 'منذ أسبوع · عيادة الأسرة 101' : '1 week ago · Family Med',
            'status'       => 'active',
            'status_label' => $isRtl ? 'ملف نشط' : 'Active File',
        ],
    ];
@endphp

@section('page-title', $isRtl ? 'سجل المرضى والملفات الطبية' : 'Patients Registry')
@section('role-label', $isRtl ? 'خدمات المرضى والاستقبال' : 'Front Desk Reception')

{{-- =========================================================================
     روابط القائمة الجانبية (مفعلة بالكامل لمكتب الاستقبال)
     ========================================================================= --}}
@section('sidebar-links')
    <x-sidebar-link :href="route('receptionist.dashboard')" :active="request()->routeIs('receptionist.dashboard')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'لوحة التحكم' : 'Dashboard' }}
    </x-sidebar-link>

    <x-sidebar-link :href="route('receptionist.patients.index')" :active="request()->routeIs('receptionist.patients.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'سجل المرضى والملفات' : 'Patients Registry' }}
    </x-sidebar-link>

    <x-sidebar-link :href="route('receptionist.appointments.index')" :active="request()->routeIs('receptionist.appointments.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'جدول المواعيد والحجوزات' : 'Appointments' }}
    </x-sidebar-link>

    <x-sidebar-link :href="route('receptionist.queue.index')" :active="request()->routeIs('receptionist.queue.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 12h18M3 6h18M3 18h12"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'طابور الانتظار المباشر' : 'Live Queue' }}
    </x-sidebar-link>

    <div class="pt-3.5 mt-3.5 border-t border-white/10">
        <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
            <x-slot:icon>
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83-2.83l-.06-.06a1.65 1.65 0 0 0-.33 1.82V9c.36.24.7.53 1 .87"/>
                </svg>
            </x-slot:icon>
            {{ $isRtl ? 'إعدادات الحساب' : 'Account Settings' }}
        </x-sidebar-link>
    </div>
@endsection

@section('content')
{{-- الحاوية الرئيسية مع التباعد الموحد القياسي --}}
<div class="-mt-3 sm:-mt-5 lg:-mt-6 space-y-5 pb-8 font-sans recep-page-fade-in no-print" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

    {{-- نافذة الإشعار التفاعلية العائمة (Animated Floating Toast) --}}
    <div id="patientActionToast" class="fixed top-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 transform -translate-y-16 opacity-0 transition-all duration-300 pointer-events-none">
        <div class="bg-[#152C4B] text-white px-4 py-2.5 rounded-xl shadow-xl border border-[#14AFC3]/30 flex items-center gap-2.5 text-xs">
            <div class="w-6 h-6 rounded-full bg-[#14AFC3]/20 flex items-center justify-center text-[#14AFC3] flex-shrink-0">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <span id="patientActionToastMsg" class="font-medium">تمت العملية بنجاح</span>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         1. الشريط العلوي الموحد (Unified Patient Registry Header)
    ══════════════════════════════════════════════ --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2.5 flex-wrap">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] inline-block shadow-xs"></span>
                <h1 class="text-2xl font-black text-[#152C4B] tracking-tight">
                    {{ $isRtl ? 'سجل المرضى والملفات الطبية' : 'Patients Registry & Records' }}
                </h1>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100 flex-shrink-0">
                    {{ $isRtl ? 'سجل المرضى الموحد EMR' : 'Enterprise EHR System' }}
                </span>
            </div>
            <p class="text-sm text-slate-500 mt-1">
                {{ $isRtl ? 'إدارة وتوثيق الملفات الطبية الشاملة، إصدار أرقام الملفات MRN، وبطاقات المراجعين الرسمية.' : 'Comprehensive patient records, new patient admissions, and demographic search.' }}
            </p>
        </div>

        {{-- أزرار الإجراءات السريعة الموحدة والتاريخ --}}
        <div class="flex items-center gap-2.5 flex-wrap">
            <button type="button"
                    onclick="openNewPatientModal()" 
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white text-xs font-bold shadow-xs hover:shadow-md hover:scale-101 active:scale-98 transition-all cursor-pointer">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                <span>{{ $isRtl ? 'فتح ملف مريض جديد' : 'New Patient File' }}</span>
            </button>

            <div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-white border border-slate-200 text-xs font-semibold text-slate-600 shadow-xs">
                <svg class="w-4 h-4 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ now()->locale($isRtl ? 'ar' : 'en')->isoFormat('dddd، D MMMM YYYY') }}</span>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         2. بطاقات الإحصائيات الأربع المتناسقة (Standard 4 KPI Cards)
    ══════════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- Card 1: Solid Teal Featured Card --}}
        <div class="relative overflow-hidden rounded-2xl p-6 text-white text-center shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center bg-[#0C6B78]">
            <div class="absolute -right-4 -top-4 w-24 h-24 rounded-full bg-white/10 pointer-events-none"></div>
            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center mb-2.5 text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                </svg>
            </div>
            <span class="text-[11px] font-extrabold uppercase tracking-widest text-teal-100">
                {{ $isRtl ? 'إجمالي الملفات الطبية' : 'TOTAL PATIENTS' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-white my-2 tracking-tight font-mono" id="statTotalPatients">
                {{ number_format($registryStats['total_patients'] ?? 3420) }}
            </div>
            <div class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-white/20 text-white backdrop-blur-xs">
                <span>{{ $isRtl ? 'سجلات معتمدة برقم MRN' : 'All Registered EMR' }}</span>
            </div>
        </div>

        {{-- Card 2: Registered Today --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'سُجلوا اليوم' : 'REGISTERED TODAY' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono" id="statTodayRegistered">
                {{ $registryStats['today_registered'] ?? 24 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'مراجع جديد خلال وردية اليوم' : 'Admissions today' }}</span>
            </div>
        </div>

        {{-- Card 3: Month Registered --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'ملفات هذا الشهر' : 'THIS MONTH' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $registryStats['month_registered'] ?? 184 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'معدل تسجيل مرتفع ومستقر' : 'Monthly growth' }}</span>
            </div>
        </div>

        {{-- Card 4: Active Files --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'ملفات مفعلة ومكتملة' : 'ACTIVE PROFILES' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ number_format($registryStats['active_files'] ?? 3210) }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'بيانات الهوية مكتملة ومحققة' : 'Verified EMR charts' }}</span>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════════
         3. جدول سجل المرضى الشامل والبارز والمتقن 1:1
    ══════════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        
        {{-- شريط التصفية والبحث والتبويبات --}}
        <div class="p-5 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2.5 flex-wrap">
                    <h2 class="text-base sm:text-lg font-black text-[#152C4B] tracking-tight">
                        {{ $isRtl ? 'دليل وسجل ملفات المرضى' : "Patients Registry Directory" }}
                    </h2>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100 flex-shrink-0" id="patientsCountBadge">
                        {{ count($patients) }} {{ $isRtl ? 'سجلات معروضة' : 'records listed' }}
                    </span>
                </div>
                <p class="text-xs text-slate-400 font-medium mt-0.5 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ $isRtl ? 'بيانات المرضى الموحدة في مستشفى الرشيد التخصصي' : 'Unified patient database at Al-Rasheed Hospital' }}</span>
                </p>
            </div>

            <div class="flex items-center gap-3 flex-wrap sm:flex-nowrap">
                {{-- التبويبات الفورية المطورة بلون وهوية المشروع --}}
                <div class="flex items-center gap-1.5 bg-slate-100/90 p-1.5 rounded-2xl border border-slate-200/60 shadow-inner">
                    <button type="button"
                            onclick="filterPatientStatus('all', this)" 
                            class="patient-tab-btn active px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all duration-300 ease-out flex items-center gap-1.5 cursor-pointer bg-[#0C6B78] text-white shadow-md shadow-[#0C6B78]/25 scale-[1.02]">
                        <span>{{ $isRtl ? 'الكل' : 'All' }}</span>
                        <span class="q-tab-counter px-1.5 py-0.2 rounded-full text-[10px] font-mono font-bold bg-white/20 text-white">5</span>
                    </button>
                    <button type="button"
                            onclick="filterPatientStatus('new', this)" 
                            class="patient-tab-btn px-3.5 py-1.5 rounded-xl text-xs font-bold text-slate-600 hover:text-[#152C4B] hover:bg-white/70 transition-all duration-300 ease-out flex items-center gap-1.5 cursor-pointer">
                        <span>{{ $isRtl ? 'الجدد اليوم' : 'New Today' }}</span>
                        <span class="q-tab-counter px-1.5 py-0.2 rounded-full text-[10px] font-mono font-bold bg-slate-200/80 text-slate-600">1</span>
                    </button>
                    <button type="button"
                            onclick="filterPatientStatus('active', this)" 
                            class="patient-tab-btn px-3.5 py-1.5 rounded-xl text-xs font-bold text-slate-600 hover:text-[#152C4B] hover:bg-white/70 transition-all duration-300 ease-out flex items-center gap-1.5 cursor-pointer">
                        <span>{{ $isRtl ? 'ملفات نشطة' : 'Active Files' }}</span>
                        <span class="q-tab-counter px-1.5 py-0.2 rounded-full text-[10px] font-mono font-bold bg-slate-200/80 text-slate-600">4</span>
                    </button>
                </div>

                {{-- حقل البحث الذكي --}}
                <div class="relative w-full sm:w-64">
                    <svg class="w-4 h-4 absolute {{ $isRtl ? 'right-3' : 'left-3' }} top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="m21 21-4.35-4.35"/>
                    </svg>
                    <input type="text" 
                           id="patientsSearchInput"
                           onkeyup="searchPatientsTable()"
                           placeholder="{{ $isRtl ? 'بحث بالاسم، الهوية، الهاتف، أو MRN...' : 'Search name, ID, phone, MRN...' }}"
                           class="w-full {{ $isRtl ? 'pr-9 pl-3' : 'pl-9 pr-3' }} py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-[#152C4B] placeholder-slate-400 focus:bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all">
                </div>
            </div>
        </div>

        {{-- جدول المرضى الموزون والبارز بوضوح فائق --}}
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[1000px] border-collapse" id="patientsMasterTable">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
                        <th class="w-[28%] px-5 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'المريض والسجل الطبي' : 'Patient & MRN' }}
                        </th>
                        <th class="w-[20%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'الرقم الوطني والجنسية' : 'National ID & Nationality' }}
                        </th>
                        <th class="w-[18%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'رقم الهاتف' : 'Phone Number' }}
                        </th>
                        <th class="w-[20%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'آخر زيارة والعيادة' : 'Last Encounter' }}
                        </th>
                        <th class="w-[14%] px-4 py-3.5 text-center whitespace-nowrap">
                            {{ $isRtl ? 'الإجراءات' : 'Actions' }}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700 bg-white" id="patientsTableBody">
                    @forelse($patients as $patient)
                        <tr class="hover:bg-[#E5FAFC]/40 transition-colors patient-row group"
                            data-status="{{ $patient['status'] }}"
                            data-search="{{ strtolower($patient['name'] . ' ' . $patient['mrn'] . ' ' . $patient['national_id'] . ' ' . $patient['phone'] . ' ' . ($patient['city'] ?? '')) }}">
                            
                            {{-- 1. المريض والسجل الطبي (اسم عريض وواضح جداً + Avatar مميز + MRN) --}}
                            <td class="w-[28%] px-5 py-4 whitespace-nowrap {{ $isRtl ? 'text-right' : 'text-left' }}">
                                <div class="flex items-center gap-3.5 min-w-0">
                                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-[#E5FAFC] to-[#CCF4F8] text-[#0C6B78] border border-[#14AFC3]/30 flex items-center justify-center font-black text-sm flex-shrink-0 group-hover:scale-105 transition-transform shadow-2xs">
                                        {{ mb_substr($patient['name'], 0, 1, 'UTF-8') }}
                                    </div>
                                    <div class="min-w-0">
                                        {{-- اسم المريض واضح وبارز جداً --}}
                                        <div class="font-black text-[#152C4B] text-[13.5px] sm:text-[14px] hover:text-[#0C6B78] transition-colors leading-snug truncate">
                                            {{ $patient['name'] }}
                                        </div>
                                        <div class="flex items-center gap-1.5 mt-1">
                                            <span class="font-mono font-bold text-[11px] px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 border border-slate-200/80">
                                                <bdi dir="ltr">{{ $patient['mrn'] }}</bdi>
                                            </span>
                                            <span class="text-slate-300">·</span>
                                            <span class="text-xs text-slate-500 font-semibold">
                                                {{ $patient['gender_age'] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- 2. الرقم الوطني والجنسية (بارز ومحدد بوضوح) --}}
                            <td class="w-[20%] px-4 py-4 whitespace-nowrap {{ $isRtl ? 'text-right' : 'text-left' }}">
                                <div class="font-mono font-black text-slate-800 text-[13px] tracking-wider">
                                    {{ $patient['national_id'] }}
                                </div>
                                <div class="text-xs text-slate-500 font-semibold mt-1 flex items-center gap-1.5">
                                    <span class="px-2 py-0.5 rounded-md bg-[#E5FAFC] text-[#0C6B78] font-bold text-[10.5px] border border-teal-100">
                                        {{ $patient['nationality'] }}
                                    </span>
                                    <span class="text-slate-600 font-medium truncate">
                                        {{ $patient['city'] ?? 'صنعاء' }}
                                    </span>
                                </div>
                            </td>

                            {{-- 3. رقم الهاتف فقط (محاذى تماماً أسفل عنوان العمود مباشرة بدون أي انزياح) --}}
                            <td class="w-[18%] px-4 py-4 whitespace-nowrap {{ $isRtl ? 'text-right' : 'text-left' }}">
                                <div class="inline-flex items-center gap-1.5 font-mono font-black text-slate-800 text-[13px]">
                                    <span class="tracking-wide" dir="ltr"><bdi>{{ $patient['phone'] }}</bdi></span>
                                    <span class="text-[10px] font-bold font-mono px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 border border-slate-200" dir="ltr">+967</span>
                                </div>
                            </td>

                            {{-- 4. آخر زيارة والعيادة --}}
                            <td class="w-[20%] px-4 py-4 whitespace-nowrap {{ $isRtl ? 'text-right' : 'text-left' }}">
                                <div class="font-bold text-slate-800 text-[12.5px] leading-tight">
                                    {{ $patient['last_visit'] }}
                                </div>
                                <div class="mt-1">
                                    @if($patient['status'] === 'new')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10.5px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                            {{ $patient['status_label'] }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10.5px] font-extrabold bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                                            {{ $patient['status_label'] }}
                                        </span>
                                    @endif
                                </div>
                            </td>

                            {{-- 5. الإجراءات المباشرة --}}
                            <td class="w-[14%] px-4 py-4 text-center whitespace-nowrap actions-cell">
                                <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                                    {{-- حجز موعد --}}
                                    <button type="button" onclick="openBookForPatient('{{ $patient['name'] }}', '{{ $patient['mrn'] }}')" title="{{ $isRtl ? 'حجز موعد عيادة للمريض' : 'Book Appointment' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-slate-600 dark:text-slate-300 hover:text-[#0C6B78] hover:bg-[#E5FAFC] transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <rect x="3" y="4" width="18" height="18" rx="2"/><path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/>
                                        </svg>
                                    </button>

                                    {{-- معاينة الملف --}}
                                    <button type="button"
                                            onclick="openPatientDetailsModal({{ json_encode($patient) }})"
                                            title="{{ $isRtl ? 'معاينة بيانات الملف الطبي' : 'View File' }}"
                                            class="p-2 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-600 hover:text-[#152C4B] border border-slate-200 transition-all cursor-pointer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>

                                    {{-- طباعة بطاقة المراجع الرسمية --}}
                                    <button type="button" onclick="printOfficialPatientCard('{{ $patient['name'] }}', '{{ $patient['mrn'] }}', '{{ $patient['national_id'] }}', '{{ $patient['phone'] }}', '{{ $patient['blood_type'] }}', '{{ $patient['gender_age'] }}', '{{ $patient['nationality'] }}', '{{ $patient['city'] ?? 'صنعاء' }}')" title="{{ $isRtl ? 'طباعة بطاقة المراجع الرقمية الرسمية' : 'Print Official ID' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#0C6B78] dark:text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-10 text-center text-slate-400 text-xs font-medium">
                                {{ $isRtl ? 'لا توجد سجلات مطابقة للبحث.' : 'No matching patient records.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- تذييل الجدول المنسق والمحكم --}}
        <div class="px-5 py-4 bg-slate-50/70 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500">
            <div>
                {{ $isRtl ? 'عرض 1 إلى 5 من أصل 3,420 ملف طبي معتمد' : 'Showing 1 to 5 of 3,420 verified charts' }}
            </div>
            <div class="flex items-center gap-1.5">
                <button class="px-3 py-1 rounded-lg border border-slate-200 hover:bg-slate-50 disabled:opacity-50 text-xs cursor-pointer font-medium" disabled>
                    {{ $isRtl ? 'السابق' : 'Previous' }}
                </button>
                <button class="px-3 py-1 rounded-lg bg-[#0C6B78] text-white font-bold text-xs shadow-2xs">1</button>
                <button class="px-3 py-1 rounded-lg border border-slate-200 hover:bg-slate-50 text-xs cursor-pointer">2</button>
                <button class="px-3 py-1 rounded-lg border border-slate-200 hover:bg-slate-50 text-xs cursor-pointer">3</button>
                <button class="px-3 py-1 rounded-lg border border-slate-200 hover:bg-slate-50 text-xs cursor-pointer font-medium">
                    {{ $isRtl ? 'التالي' : 'Next' }}
                </button>
            </div>
        </div>

    </div>

    {{-- =========================================================================
         MODAL 1: فتح ملف مريض جديد فوري (كبير، احترافي، متسع، حقول متساوية وفخمة)
         ========================================================================= --}}
    <div id="newPatientModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/65 backdrop-blur-xs hidden p-4 sm:p-6 anim-overlay overflow-y-auto">
        <div class="bg-white rounded-3xl w-full max-w-3xl shadow-2xl border border-slate-100 anim-modal-pop overflow-hidden my-auto">
            
            {{-- Modal Luxury Header --}}
            <div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 100%);" class="px-7 py-5 text-white flex items-center justify-between">
                <div class="flex items-center gap-3.5">
                    <div class="w-12 h-12 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-xs flex items-center justify-center text-[#14AFC3] flex-shrink-0 shadow-xs">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <h3 class="font-black text-base sm:text-lg text-white tracking-tight">
                                {{ $isRtl ? 'فتح ملف مريض جديد EMR' : 'New Patient Registration' }}
                            </h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-white/20 text-teal-100 border border-white/25">
                                {{ $isRtl ? 'إصدار MRN فوري' : 'Instant MRN' }}
                            </span>
                        </div>
                        <p class="text-teal-100/90 text-xs mt-1">
                            {{ $isRtl ? 'تسجيل بيانات المراجع وإصدار الهوية الطبية الموحدة وبطاقة السجل السريري' : 'Register patient and generate official medical record' }}
                        </p>
                    </div>
                </div>
                <button type="button" onclick="closeModal('newPatientModal')" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-base font-bold">✕</button>
            </div>

            {{-- Form Fields (فسيحة وواضحة جداً) --}}
            <form onsubmit="handleSavePatient(event)" class="p-6 sm:p-8 space-y-5">
                
                {{-- القسم الأول: بيانات الهوية والاسم --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 text-xs font-black text-[#152C4B] uppercase tracking-wider">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <span>{{ $isRtl ? 'البيانات الشخصية وهوية المريض' : 'Personal & Demographic Details' }}</span>
                    </div>

                    {{-- الاسم بالكامل رباعي --}}
                    <div>
                        <label class="block font-black text-slate-700 mb-1.5 text-xs">
                            {{ $isRtl ? 'اسم المريض بالكامل (رباعي مع اللقب) *' : 'Full Legal Patient Name *' }}
                        </label>
                        <input type="text" id="regModalName" required 
                               placeholder="{{ $isRtl ? 'مثال: نزار صالح محمد الحكيمي' : 'e.g. Nezar Saleh Mohammed Al-Hokaimi' }}" 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 bg-slate-50/60 outline-none focus:bg-white focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-bold text-sm text-slate-800 placeholder-slate-400">
                    </div>

                    {{-- الرقم الوطني والهاتف --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">
                                {{ $isRtl ? 'الرقم الوطني / الهوية الشخصية (11 رقم) *' : 'National ID *' }}
                            </label>
                            <input type="text" id="regModalNID" required 
                                   placeholder="01010048291" 
                                   class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 bg-slate-50/60 outline-none focus:bg-white focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-black text-sm text-slate-800 placeholder-slate-400 tracking-wider">
                        </div>
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">
                                {{ $isRtl ? 'رقم الهاتف (الجمهورية اليمنية) *' : 'Phone Number *' }}
                            </label>
                            <div class="relative">
                                <input type="text" id="regModalPhone" required 
                                       placeholder="771234567" 
                                       class="w-full h-11 sm:h-12 {{ $isRtl ? 'pr-16 pl-4' : 'pl-16 pr-4' }} rounded-xl border border-slate-200 bg-slate-50/60 outline-none focus:bg-white focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-black text-sm text-slate-800 placeholder-slate-400">
                                <span class="absolute top-1/2 -translate-y-1/2 {{ $isRtl ? 'right-3' : 'left-3' }} px-2 py-1 rounded-lg bg-slate-200/80 text-[11px] font-black font-mono text-slate-600 select-none">
                                    +967
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- القسم الثاني: البيانات الحيوية ومحل الإقامة --}}
                <div class="space-y-4 pt-1">
                    <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 text-xs font-black text-[#152C4B] uppercase tracking-wider">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#0C6B78]"></span>
                        <span>{{ $isRtl ? 'البيانات السريرية ومحل الإقامة' : 'Clinical & Residency Information' }}</span>
                    </div>

                    {{-- الجنس، سنة الميلاد، فصيلة الدم --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">
                                {{ $isRtl ? 'الجنس *' : 'Gender *' }}
                            </label>
                            <select id="regModalGender" 
                                    class="w-full h-11 sm:h-12 px-3.5 rounded-xl border border-slate-200 bg-white outline-none focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-bold text-sm text-slate-800">
                                <option value="ذكر">{{ $isRtl ? 'ذكر' : 'Male' }}</option>
                                <option value="أنثى">{{ $isRtl ? 'أنثى' : 'Female' }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">
                                {{ $isRtl ? 'سنة الميلاد' : 'Birth Year' }}
                            </label>
                            <input type="number" id="regModalBirthYear" 
                                   placeholder="1992" 
                                   class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 bg-slate-50/60 outline-none focus:bg-white focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-bold text-sm text-slate-800 placeholder-slate-400">
                        </div>
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">
                                {{ $isRtl ? 'فصيلة الدم' : 'Blood Group' }}
                            </label>
                            <select id="regModalBlood" 
                                    class="w-full h-11 sm:h-12 px-3.5 rounded-xl border border-slate-200 bg-white outline-none focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-black text-sm text-[#0C6B78]">
                                <option value="O+">O+</option>
                                <option value="A+">A+</option>
                                <option value="B+">B+</option>
                                <option value="AB+">AB+</option>
                                <option value="O-">O-</option>
                                <option value="A-">A-</option>
                            </select>
                        </div>
                    </div>

                    {{-- المحافظة والجنسية --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">
                                {{ $isRtl ? 'المحافظة / العنوان السكني' : 'City / Residence' }}
                            </label>
                            <input type="text" id="regModalCity" 
                                   placeholder="{{ $isRtl ? 'صنعاء - شارع حدة' : 'Sanaa - Hadda St' }}" 
                                   class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 bg-slate-50/60 outline-none focus:bg-white focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-semibold text-slate-800 placeholder-slate-400">
                        </div>
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">
                                {{ $isRtl ? 'الجنسية' : 'Nationality' }}
                            </label>
                            <input type="text" id="regModalNationality" 
                                   value="{{ $isRtl ? 'يمني' : 'Yemeni' }}" 
                                   class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 bg-slate-50/60 outline-none focus:bg-white focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800">
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeModal('newPatientModal')" 
                            class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-bold hover:bg-slate-100 transition-colors cursor-pointer text-sm">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" 
                            class="px-7 py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black text-sm transition-all shadow-md shadow-[#0C6B78]/25 hover:scale-101 active:scale-98 cursor-pointer flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        <span>{{ $isRtl ? 'حفظ وإصدار الرقم الطبي MRN' : 'Save & Issue MRN' }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- =========================================================================
         MODAL 2: معاينة بطاقة وبيانات المريض (كارد راقي جداً واحترافي ومتناسق وهيد أوسع)
         ========================================================================= --}}
    <div id="patientDetailsModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/65 backdrop-blur-xs hidden p-4 sm:p-6 anim-overlay overflow-y-auto">
        <div class="bg-white rounded-3xl w-full max-w-2xl shadow-2xl border border-slate-100 anim-modal-pop overflow-hidden my-auto">
            
            {{-- Modal Header (أوسع وأبرز بهوية سريرية فخمة) --}}
            <div style="background: linear-gradient(135deg, #0A1628 0%, #152C4B 50%, #0C6B78 100%);" class="px-7 py-6 text-white flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-2xl bg-white/15 border border-white/25 backdrop-blur-md flex items-center justify-center text-[#14AFC3] flex-shrink-0 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <h3 class="font-black text-lg sm:text-xl text-white tracking-tight">{{ $isRtl ? 'الملف الطبي للمراجع' : 'Patient Chart Details' }}</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-[#14AFC3]/25 border border-[#14AFC3]/40 text-teal-100">
                                {{ $isRtl ? 'سجل طبي موحد EMR' : 'Verified Chart' }}
                            </span>
                        </div>
                        <p class="text-teal-100/90 text-xs mt-1 flex items-center gap-1.5 font-medium">
                            <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                            <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · السجل الطبي الإلكتروني' : 'Al-Rasheed Hospital · EMR' }}</span>
                        </p>
                    </div>
                </div>
                <button type="button" onclick="closeModal('patientDetailsModal')" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-base font-bold">✕</button>
            </div>

            <div class="p-6 sm:p-8 space-y-5">
                {{-- Hero Profile Box (مساحة مريحة وفخمة) --}}
                <div class="p-5 sm:p-6 rounded-2xl bg-gradient-to-r from-[#E5FAFC]/90 via-white to-[#E5FAFC]/50 border border-[#14AFC3]/30 shadow-xs flex items-center justify-between gap-4">
                    <div class="flex items-center gap-4 min-w-0">
                        <div id="modalPatientAvatar" class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-tr from-[#152C4B] to-[#0C6B78] text-white font-black text-xl flex items-center justify-center flex-shrink-0 shadow-md border-2 border-white">
                            أ
                        </div>
                        <div class="min-w-0">
                            <div class="font-black text-base sm:text-lg text-[#152C4B] truncate" id="modalPatientName">-</div>
                            <div class="flex items-center gap-2 mt-1.5 flex-wrap">
                                <span class="px-3 py-1 rounded-lg bg-[#152C4B] text-teal-200 font-mono font-black text-xs shadow-2xs" id="modalPatientMRN">-</span>
                                <span class="text-slate-300">·</span>
                                <span class="text-xs sm:text-sm text-slate-500 font-bold" id="modalPatientSub">-</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center px-4 sm:px-5 py-2.5 rounded-2xl bg-white border border-rose-200 shadow-xs flex-shrink-0">
                        <span class="text-[10px] sm:text-[11px] text-slate-400 block font-black uppercase tracking-wider mb-0.5">فصيلة الدم</span>
                        <span class="font-black font-mono text-rose-700 text-sm sm:text-base" id="modalPatientBlood">-</span>
                    </div>
                </div>

                {{-- Demographic Grid Tiles (موزعة بمسافات وفراغات متقنة) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 rounded-2xl border border-slate-200/80 bg-slate-50/70 hover:bg-slate-50 transition-colors">
                        <span class="text-slate-400 block text-xs font-bold mb-1">{{ $isRtl ? 'الرقم الوطني / الهوية' : 'National ID' }}</span>
                        <span class="font-bold font-mono text-slate-800 text-sm sm:text-[14px] block tracking-wider" id="modalPatientID">-</span>
                    </div>
                    <div class="p-4 rounded-2xl border border-slate-200/80 bg-slate-50/70 hover:bg-slate-50 transition-colors">
                        <span class="text-slate-400 block text-xs font-bold mb-1">{{ $isRtl ? 'رقم الهاتف (الجمهورية اليمنية)' : 'Phone Number' }}</span>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="font-mono font-black text-slate-800 text-sm sm:text-[14px]" dir="ltr"><bdi id="modalPatientPhone">-</bdi></span>
                            <span class="text-[11px] font-black font-mono px-2 py-0.5 rounded-md bg-slate-200/80 text-slate-600 select-none" dir="ltr">+967</span>
                        </div>
                    </div>
                    <div class="p-4 rounded-2xl border border-slate-200/80 bg-slate-50/70 hover:bg-slate-50 transition-colors">
                        <span class="text-slate-400 block text-xs font-bold mb-1">{{ $isRtl ? 'الجنسية والإقامة السكنية' : 'Nationality & City' }}</span>
                        <span class="font-black text-[#152C4B] text-xs sm:text-sm block" id="modalPatientCity">-</span>
                    </div>
                    <div class="p-4 rounded-2xl border border-slate-200/80 bg-slate-50/70 hover:bg-slate-50 transition-colors">
                        <span class="text-slate-400 block text-xs font-bold mb-1">{{ $isRtl ? 'حالة السجل الطبي' : 'Record Status' }}</span>
                        <span class="inline-flex items-center gap-2 font-black text-xs text-emerald-700 bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-200 mt-1">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>{{ $isRtl ? 'ملف نشط وموثق EMR' : 'Active & Verified' }}</span>
                        </span>
                    </div>
                </div>

                {{-- آخر زيارة والعيادة --}}
                <div class="p-4 rounded-2xl border border-slate-200/80 bg-slate-50/70">
                    <span class="text-slate-400 block text-xs font-bold mb-1">{{ $isRtl ? 'آخر زيارة ومراجعة سريرية مسجلة' : 'Last Encounter' }}</span>
                    <span class="font-black text-[#152C4B] text-xs sm:text-sm block" id="modalPatientVisit">-</span>
                </div>

                {{-- Action Footer --}}
                <div class="flex items-center justify-between gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeModal('patientDetailsModal')" class="px-6 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors cursor-pointer">
                        {{ $isRtl ? 'إغلاق' : 'Close' }}
                    </button>
                    <div class="flex items-center gap-2">
                        <button type="button" id="modalDirectPrintBtn" class="px-7 py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black text-xs transition-all shadow-md shadow-[#0C6B78]/25 hover:scale-101 active:scale-98 cursor-pointer flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                            <span>{{ $isRtl ? 'طباعة بطاقة المراجع' : 'Print Card' }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════
     4. نموذج الطباعة السريري الرسمي لبطاقة المراجع الرقمية A4
     ══════════════════════════════════════════════ --}}
<div id="officialPatientCardPrint" class="hidden" dir="rtl">
    <div style="font-family: 'Cairo', 'Segoe UI', Tahoma, sans-serif; background-color: #ffffff; color: #111827; padding: 25px 30px; max-width: 820px; margin: 0 auto; line-height: 1.5; border: 1px solid #e2e8f0;">

        {{-- Official Institutional Header (الجمهورية اليمنية - وزارة الصحة - مستشفى الرشيد) --}}
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 3px double #152C4B; padding-bottom: 14px; margin-bottom: 16px;">
            <div style="text-align: right; width: 33%;">
                <div style="font-size: 13px; font-weight: 900; color: #152C4B; margin-bottom: 2px;">الجمهورية اليمنية</div>
                <div style="font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 2px;">وزارة الصحة العامة والسكان</div>
                <div style="font-size: 14px; font-weight: 900; color: #0C6B78; margin-bottom: 2px;">مستشفى الرشيد التخصصي</div>
                <div style="font-size: 11px; font-weight: 700; color: #152C4B;">إدارة السجلات والملفات الطبية EMR</div>
            </div>

            <div style="text-align: center; width: 34%;">
                <div style="display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px; border-radius: 16px; background-color: #E5FAFC; border: 2px solid #0C6B78; margin-bottom: 4px;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#0C6B78" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                        <path d="M12 9v6m-3-3h6"/>
                    </svg>
                </div>
                <div style="font-size: 10px; font-weight: 900; color: #152C4B; letter-spacing: 0.5px;">AL-RASHEED HOSPITAL</div>
                <div style="font-size: 8.5px; font-weight: bold; color: #0C6B78;">PATIENT IDENTIFICATION CARD</div>
            </div>

            <div style="text-align: left; width: 33%; direction: ltr;">
                <div style="font-size: 12px; font-weight: 900; color: #152C4B; margin-bottom: 2px;">REPUBLIC OF YEMEN</div>
                <div style="font-size: 10.5px; font-weight: 700; color: #475569; margin-bottom: 2px;">Ministry of Public Health & Population</div>
                <div style="font-size: 13px; font-weight: 900; color: #0C6B78; margin-bottom: 2px;">Al-Rasheed Specialized Hospital</div>
                <div style="font-size: 10px; font-weight: 700; color: #152C4B;">Medical Records Dept (EMR)</div>
            </div>
        </div>

        {{-- Document Title Banner --}}
        <div style="background-color: #152C4B; color: #ffffff; border-radius: 10px; padding: 10px 18px; margin-bottom: 16px; display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h2 style="font-size: 15px; font-weight: 900; margin: 0; letter-spacing: -0.2px;">بطاقة مراجع وسجل طبي رقمي موحد</h2>
                <div style="font-size: 10px; color: #99f6e4; font-weight: 600; margin-top: 2px;">OFFICIAL PATIENT MEDICAL RECORD & IDENTIFICATION VOUCHER</div>
            </div>
            <div style="text-align: left; direction: ltr;">
                <div style="background-color: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25); border-radius: 6px; padding: 3px 10px; font-family: monospace; font-size: 12px; font-weight: 900; color: #ffffff;">
                    <span id="prCardMRN">MRN-88421</span>
                </div>
                <div style="font-size: 9.5px; color: #cbd5e1; margin-top: 2px; text-align: right;">{{ now()->format('Y-m-d') }}</div>
            </div>
        </div>

        {{-- Patient Full Information Table --}}
        <div style="border: 1.5px solid #0C6B78; border-radius: 10px; overflow: hidden; margin-bottom: 16px;">
            <div style="background-color: #E5FAFC; border-bottom: 1px solid #0C6B78; padding: 6px 14px; font-size: 11px; font-weight: 900; color: #0C6B78;">
                بيانات المريض الأساسية والهوية الشخصية (Patient Demographics)
            </div>
            <table style="width: 100%; border-collapse: collapse; font-size: 11.5px;">
                <tbody>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569; width: 20%;">اسم المريض:</td>
                        <td style="padding: 7px 12px; font-weight: 900; color: #152C4B; width: 30%; font-size: 13px;" id="prCardPatientName">أحمد محمد الجهمي</td>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569; width: 20%;">رقم الملف الطبي MRN:</td>
                        <td style="padding: 7px 12px; font-weight: 900; color: #0C6B78; font-family: monospace; width: 30%;" id="prCardMRN2">MRN-88421</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">الرقم الوطني / الهوية:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #334155; font-family: monospace;" id="prCardNID">01010048291</td>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">فصيلة الدم:</td>
                        <td style="padding: 7px 12px; font-weight: 900; color: #b91c1c; font-family: monospace;" id="prCardBlood">O+</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">رقم الهاتف الجوال:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #334155; font-family: monospace;" id="prCardPhone">771234567</td>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">الجنس والعمر:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #334155;" id="prCardGenderAge">ذكر، 38 سنة</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">الجنسية والإقامة:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #334155;" id="prCardNationality">يمني · صنعاء - السبعين</td>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">تاريخ فتح الملف:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #334155;">{{ now()->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">موظف الاستقبال:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #334155;" colspan="3">{{ Auth::user()->name ?? 'موظف الاستقبال المعتمد' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Barcode and Verification --}}
        <div style="display: flex; align-items: flex-end; justify-content: space-between; border-top: 1.5px solid #cbd5e1; padding-top: 14px; margin-bottom: 14px;">
            <div style="text-align: right; width: 33%;">
                <div style="font-size: 11px; font-weight: 800; color: #64748b;">اعتماد مكتب الاستقبال:</div>
                <div style="font-size: 12px; font-weight: 900; color: #152C4B; margin-top: 4px;">{{ Auth::user()->name ?? 'مكتب الاستقبال' }}</div>
                <div style="font-size: 9.5px; color: #0C6B78; font-weight: bold;">خدمات المرضى والقبول ✓</div>
            </div>

            <div style="text-align: center; width: 34%;">
                <div style="display: inline-block; width: 75px; height: 75px; border: 2px dashed #0C6B78; border-radius: 50%; padding: 3px; box-sizing: border-box; text-align: center;">
                    <div style="width: 100%; height: 100%; border: 1px solid #0C6B78; border-radius: 50%; display: flex; flex-direction: column; align-items: center; justify-content: center; font-size: 7px; font-weight: 900; color: #0C6B78; line-height: 1.2;">
                        <span>مستشفى الرشيد</span>
                        <span style="font-size: 8.5px; color: #152C4B; margin: 1px 0;">★ معتمد ★</span>
                        <span>شؤون المرضى</span>
                    </div>
                </div>
            </div>

            <div style="text-align: left; width: 33%; direction: ltr;">
                <div style="font-size: 10px; font-weight: 800; color: #64748b;">EMR Patient Card:</div>
                <div style="font-size: 9.5px; font-family: monospace; font-weight: 800; color: #152C4B; margin-top: 2px;" id="prCardBarcodeText">#CARD-MRN88421</div>
                <div style="margin-top: 4px; letter-spacing: 2px; font-family: monospace; font-weight: 900; font-size: 11px; color: #152C4B;">
                    |||||| | |||| || |||||| |
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div style="border-top: 1px solid #e2e8f0; padding-top: 8px; text-align: center; font-size: 9px; color: #64748b;">
            <div style="font-weight: bold; color: #152C4B;">مستشفى الرشيد التخصصي - صنعاء - شارع حدة | هاتف: 01-445566 | طوارئ: 199</div>
        </div>

    </div>
</div>

{{-- =========================================================================
     حزمة التنسيقات والأنيميشن وقواعد الطباعة الرسمية A4
     ========================================================================= --}}
<style>
    @keyframes recepPageFadeInAnim {
        from { opacity: 0; transform: translateY(4px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .recep-page-fade-in {
        animation: recepPageFadeInAnim 0.35s ease-out forwards;
    }

    @keyframes modalScaleInAnim {
        from { opacity: 0; transform: scale(0.96) translateY(8px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    .anim-modal-pop {
        animation: modalScaleInAnim 0.22s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    @keyframes overlayFadeInAnim {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .anim-overlay {
        animation: overlayFadeInAnim 0.2s ease-out forwards;
    }

    /* أنيميشن أزرار التبويبات الفورية */
    .patient-tab-btn {
        position: relative;
        transform: translateZ(0);
        will-change: transform;
    }
    .patient-tab-btn:hover:not(.active) {
        transform: translateY(-1px);
    }
    .patient-tab-btn:active {
        transform: scale(0.96);
    }

    /* ══════════════════════════════════════════════════
       قواعد الطباعة الرسمية الصارمة A4 بدون أي صفحات بيضاء
       ══════════════════════════════════════════════════ */
    @media print {
        @page {
            size: A4 portrait;
            margin: 8mm 10mm;
        }

        html, body {
            background-color: #ffffff !important;
            background: #ffffff !important;
            color: #111827 !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* إخفاء كافة عناصر الموقع والواجهات التفاعلية */
        body > *:not(#officialPatientCardPrint) {
            display: none !important;
        }

        .no-print, #main-sidebar, header, nav, aside, [id$="Modal"], [id$="Toast"], #notificationsDropdown {
            display: none !important;
        }

        /* إظهار كرت المراجع الرسمي بدقة ملء صفحة A4 */
        #officialPatientCardPrint {
            display: block !important;
            visibility: visible !important;
            position: static !important;
            width: 100% !important;
            margin: 0 auto !important;
            padding: 0 !important;
            background: #ffffff !important;
            color: #111827 !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        #officialPatientCardPrint * {
            visibility: visible !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    }
</style>

{{-- =========================================================================
     الجافاسكريبت والوظائف التفاعلية لسجل المرضى
     ========================================================================= --}}
<script>
    // متغير لتخزين المريض المفتوح حالياً في نافذة المعاينة
    let activeModalPatient = null;

    // إظهار إشعار Toast حركي
    function showToast(msg) {
        const toast = document.getElementById('patientActionToast');
        const msgEl = document.getElementById('patientActionToastMsg');
        if (msgEl) msgEl.innerText = msg;
        if (toast) {
            toast.classList.remove('opacity-0', '-translate-y-16', 'pointer-events-none');
            toast.classList.add('opacity-100', 'translate-y-0');
            setTimeout(() => {
                toast.classList.add('opacity-0', '-translate-y-16', 'pointer-events-none');
                toast.classList.remove('opacity-100', 'translate-y-0');
            }, 3000);
        }
    }

    function openNewPatientModal() {
        document.getElementById('newPatientModal').classList.remove('hidden');
    }

    function closeModal(id) {
        const el = document.getElementById(id);
        if (el) el.classList.add('hidden');
    }

    function handleSavePatient(e) {
        e.preventDefault();
        const name = document.getElementById('regModalName').value.trim();
        const phone = document.getElementById('regModalPhone').value.trim();
        const nid = document.getElementById('regModalNID').value.trim();
        const gender = document.getElementById('regModalGender').value;
        const blood = document.getElementById('regModalBlood').value;
        const city = document.getElementById('regModalCity').value.trim() || 'صنعاء';
        const nationality = document.getElementById('regModalNationality').value.trim() || 'يمني';
        const birthYear = document.getElementById('regModalBirthYear').value.trim() || '1995';
        const age = new Date().getFullYear() - parseInt(birthYear);
        const mrn = 'MRN-' + Math.floor(88500 + Math.random() * 1000);

        closeModal('newPatientModal');

        // تحديث العدادات
        const totalEl = document.getElementById('statTotalPatients');
        if (totalEl) totalEl.innerText = (parseInt(totalEl.innerText.replace(/,/g, '')) + 1).toLocaleString();
        const todayEl = document.getElementById('statTodayRegistered');
        if (todayEl) todayEl.innerText = parseInt(todayEl.innerText) + 1;

        // إدراج سطر جديد في الجدول ديناميكياً بنفس التصميم البارز الأنيق
        const tbody = document.getElementById('patientsTableBody');
        if (tbody) {
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-[#E5FAFC]/40 transition-colors patient-row group bg-teal-50/25';
            tr.setAttribute('data-status', 'new');
            tr.setAttribute('data-search', (name + ' ' + mrn + ' ' + nid + ' ' + phone + ' ' + city).toLowerCase());
            tr.innerHTML = `
                <td class="w-[28%] px-5 py-4 whitespace-nowrap text-right">
                    <div class="flex items-center gap-3.5 min-w-0">
                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-[#E5FAFC] to-[#CCF4F8] text-[#0C6B78] border border-[#14AFC3]/30 flex items-center justify-center font-black text-sm flex-shrink-0 group-hover:scale-105 transition-transform shadow-2xs">
                            ${name.charAt(0)}
                        </div>
                        <div class="min-w-0">
                            <div class="font-black text-[#152C4B] text-[13.5px] sm:text-[14px] hover:text-[#0C6B78] transition-colors leading-snug truncate">
                                ${name}
                            </div>
                            <div class="flex items-center gap-1.5 mt-1">
                                <span class="font-mono font-bold text-[11px] px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 border border-slate-200/80">
                                    <bdi dir="ltr">${mrn}</bdi>
                                </span>
                                <span class="text-slate-300">·</span>
                                <span class="text-xs text-slate-500 font-semibold">${gender}، ${age} سنة</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="w-[20%] px-4 py-4 whitespace-nowrap text-right">
                    <div class="font-mono font-black text-slate-800 text-[13px] tracking-wider">${nid}</div>
                    <div class="text-xs text-slate-500 font-semibold mt-1 flex items-center gap-1.5">
                        <span class="px-2 py-0.5 rounded-md bg-[#E5FAFC] text-[#0C6B78] font-bold text-[10.5px] border border-teal-100">${nationality}</span>
                        <span class="text-slate-600 font-medium truncate">${city}</span>
                    </div>
                </td>
                <td class="w-[18%] px-4 py-4 whitespace-nowrap text-right">
                    <div class="inline-flex items-center gap-1.5 font-mono font-black text-slate-800 text-[13px]">
                        <span class="tracking-wide" dir="ltr"><bdi>${phone}</bdi></span>
                        <span class="text-[10px] font-bold font-mono px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 border border-slate-200" dir="ltr">+967</span>
                    </div>
                </td>
                <td class="w-[20%] px-4 py-4 whitespace-nowrap text-right">
                    <div class="font-bold text-slate-800 text-[12.5px] leading-tight">اليوم · فتح ملف جديد</div>
                    <div class="mt-1">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10.5px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            ملف جديد اليوم
                        </span>
                    </div>
                </td>
                <td class="w-[14%] px-4 py-4 text-center whitespace-nowrap actions-cell">
                                <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                        <button type="button" onclick="openBookForPatient('${name}', '${mrn}')" title="حجز موعد عيادة" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-slate-600 dark:text-slate-300 hover:text-[#0C6B78] hover:bg-[#E5FAFC] transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/></svg>
                        </button>
                        <button type="button" onclick="printOfficialPatientCard('${name}', '${mrn}', '${nid}', '${phone}', '${blood}', '${gender}، ${age} سنة', '${nationality}', '${city}')" title="طباعة بطاقة المراجع" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#0C6B78] dark:text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        </button>
                    </div>
                </td>
            `;
            tbody.insertBefore(tr, tbody.firstChild);
        }

        showToast('{{ $isRtl ? "تم فتح الملف الطبي للمريض وإصدار رقم MRN بنجاح: " : "Patient record created successfully: " }}' + mrn);

        setTimeout(() => {
            printOfficialPatientCard(name, mrn, nid, phone, blood, `${gender}، ${age} سنة`, nationality, city);
        }, 300);
    }

    function openPatientDetailsModal(patient) {
        activeModalPatient = patient;
        document.getElementById('modalPatientAvatar').innerText = (patient.name || 'أ').charAt(0);
        document.getElementById('modalPatientName').innerText = patient.name;
        document.getElementById('modalPatientMRN').innerText = patient.mrn;
        document.getElementById('modalPatientSub').innerText = patient.gender_age;
        document.getElementById('modalPatientID').innerText = patient.national_id;
        document.getElementById('modalPatientPhone').innerText = patient.phone;
        document.getElementById('modalPatientCity').innerText = (patient.nationality || 'يمني') + ' · ' + (patient.city || 'صنعاء');
        document.getElementById('modalPatientBlood').innerText = patient.blood_type;
        document.getElementById('modalPatientVisit').innerText = patient.last_visit;

        // ربط زر الطباعة المباشر من المودال
        const directPrintBtn = document.getElementById('modalDirectPrintBtn');
        if (directPrintBtn) {
            directPrintBtn.onclick = function() {
                printOfficialPatientCard(
                    patient.name,
                    patient.mrn,
                    patient.national_id,
                    patient.phone,
                    patient.blood_type,
                    patient.gender_age,
                    patient.nationality || 'يمني',
                    patient.city || 'صنعاء'
                );
            };
        }

        document.getElementById('patientDetailsModal').classList.remove('hidden');
    }

    // طباعة بطاقة المراجع الرسمية مع ضمان عدم ظهور صفحات بيضاء
    function printOfficialPatientCard(name, mrn, id, phone, blood, genderAge, nationality, city) {
        document.getElementById('prCardPatientName').innerText = name || 'أحمد محمد الجهمي';
        document.getElementById('prCardMRN').innerText = mrn || 'MRN-88421';
        document.getElementById('prCardMRN2').innerText = mrn || 'MRN-88421';
        document.getElementById('prCardNID').innerText = id || '01010048291';
        document.getElementById('prCardPhone').innerText = phone || '771234567';
        document.getElementById('prCardBlood').innerText = blood || 'O+';
        document.getElementById('prCardGenderAge').innerText = genderAge || 'ذكر، 38 سنة';
        document.getElementById('prCardNationality').innerText = (nationality || 'يمني') + ' · ' + (city || 'صنعاء');
        document.getElementById('prCardBarcodeText').innerText = '#CARD-' + (mrn || 'MRN88421').replace(/[^a-zA-Z0-9]/g, '');

        // نقل عنصر الطباعة مباشرة تحت body لضمان ظهوره المستقل بدون إخفاء بواسطة الحاويات الأبوية
        const printContainer = document.getElementById('officialPatientCardPrint');
        if (printContainer) {
            if (printContainer.parentElement !== document.body) {
                document.body.appendChild(printContainer);
            }
            printContainer.classList.remove('hidden');
        }

        setTimeout(() => {
            window.print();
            setTimeout(() => {
                if (printContainer) {
                    printContainer.classList.add('hidden');
                }
            }, 600);
        }, 150);
    }

    function openBookForPatient(name, mrn) {
        showToast('{{ $isRtl ? "تحويل لحجز موعد عيادة للمريض: " : "Redirecting to book appointment for: " }}' + name);
        setTimeout(() => {
            window.location.href = "{{ route('receptionist.appointments.index') }}?mrn=" + mrn;
        }, 500);
    }

    // البحث الفوري الحي
    function searchPatientsTable() {
        const query = document.getElementById('patientsSearchInput').value.toLowerCase();
        const rows = document.querySelectorAll('.patient-row');
        rows.forEach(row => {
            const data = row.getAttribute('data-search') || '';
            row.style.display = data.includes(query) ? '' : 'none';
        });
    }

    // تصفية التبويبات الفورية بأنيميشن سلس
    function filterPatientStatus(status, btn) {
        document.querySelectorAll('.patient-tab-btn').forEach(b => {
            b.classList.remove('active', 'bg-[#0C6B78]', 'text-white', 'shadow-md', 'shadow-[#0C6B78]/25', 'scale-[1.02]');
            b.classList.add('text-slate-600');
            const counter = b.querySelector('.q-tab-counter');
            if (counter) {
                counter.classList.remove('bg-white/20', 'text-white');
                counter.classList.add('bg-slate-200/80', 'text-slate-600');
            }
        });

        btn.classList.add('active', 'bg-[#0C6B78]', 'text-white', 'shadow-md', 'shadow-[#0C6B78]/25', 'scale-[1.02]');
        btn.classList.remove('text-slate-600');
        const activeCounter = btn.querySelector('.q-tab-counter');
        if (activeCounter) {
            activeCounter.classList.remove('bg-slate-200/80', 'text-slate-600');
            activeCounter.classList.add('bg-white/20', 'text-white');
        }

        const rows = document.querySelectorAll('.patient-row');
        rows.forEach(row => {
            const rowStatus = row.getAttribute('data-status');
            if (status === 'all' || rowStatus === status) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // إغلاق المودالات بزر Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal('newPatientModal');
            closeModal('patientDetailsModal');
        }
    });
</script>
@endsection
