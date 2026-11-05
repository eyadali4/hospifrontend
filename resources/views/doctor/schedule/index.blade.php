@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    // تنظيف اسم الطبيب لمنع تكرار كلمة د. أو Dr.
    $rawDoctorName = auth()->user()->name ?? ($isRtl ? 'نزار صالح' : 'Nezar Saleh');
    $cleanDoctorName = preg_replace('/^(د\.?|dr\.?)\s+/iu', '', trim($rawDoctorName));

    // إحصائيات جدول اليوم السريري
    $scheduleStats = $scheduleStats ?? [
        'total_slots' => 18,
        'checked_in'  => 8,
        'completed'   => 6,
        'available'   => 4,
    ];

    // قائمة مواعيد وخانات العيادة مع بيانات الملف الطبي السريري
    $slots = $slots ?? [
        [
            'id' => 201,
            'token' => '#A-101',
            'time' => '08:30 AM',
            'duration' => '20 min',
            'mrn' => 'MRN-88421',
            'national_id' => '1084920194',
            'patient' => $isRtl ? 'سارة فهد العتيبي' : 'Sarah Fahad Al-Otaibi',
            'gender_age' => $isRtl ? 'أنثى، 34 سنة' : 'Female, 34 yrs',
            'phone' => '+967 77 123 4567',
            'blood_type' => 'A+',
            'room' => '204',
            'status' => 'completed',
            'status_label' => $isRtl ? 'مكتمل' : 'Completed',
            'badge_bg' => 'bg-slate-100',
            'badge_text' => 'text-slate-700',
            'badge_dot' => 'bg-slate-400',
            'diagnosis' => $isRtl ? 'متابعة ارتفاع ضغط دم شرياني وتخطيط قلب سليم' : 'Arterial hypertension follow-up & normal ECG',
            'vitals' => ['bp' => '128/82', 'hr' => '74 bpm', 'spo2' => '99%', 'temp' => '36.8 °C'],
            'allergies' => $isRtl ? 'لا توجد حساسية دوائية مسجلة' : 'No known drug allergies (NKDA)',
        ],
        [
            'id' => 202,
            'token' => '#A-102',
            'time' => '09:00 AM',
            'duration' => '20 min',
            'mrn' => 'MRN-89104',
            'national_id' => '1092837482',
            'patient' => $isRtl ? 'طارق عبدالعزيز الدوسري' : 'Tariq Abdulaziz Al-Dosari',
            'gender_age' => $isRtl ? 'ذكر، 42 سنة' : 'Male, 42 yrs',
            'phone' => '+967 77 987 6543',
            'blood_type' => 'O+',
            'room' => '204',
            'status' => 'in_consultation',
            'status_label' => $isRtl ? 'في غرفة الكشف' : 'In Consultation',
            'badge_bg' => 'bg-[#E5FAFC]',
            'badge_text' => 'text-[#0C6B78]',
            'badge_dot' => 'bg-[#14AFC3]',
            'diagnosis' => $isRtl ? 'ألم صدري غير نمطي وإجهاد قلبي يتطلب راحة سريرية' : 'Atypical chest pain & exertion fatigue',
            'vitals' => ['bp' => '135/86', 'hr' => '80 bpm', 'spo2' => '98%', 'temp' => '37.0 °C'],
            'allergies' => $isRtl ? 'حساسية من البنسلين (Penicillin)' : 'Penicillin allergy',
        ],
        [
            'id' => 203,
            'token' => '#A-103',
            'time' => '09:30 AM',
            'duration' => '20 min',
            'mrn' => 'MRN-90218',
            'national_id' => '1074829103',
            'patient' => $isRtl ? 'نورة عبدالله الشهري' : 'Noura Abdullah Al-Shehri',
            'gender_age' => $isRtl ? 'أنثى، 29 سنة' : 'Female, 29 yrs',
            'phone' => '+967 77 332 1100',
            'blood_type' => 'B+',
            'room' => '204',
            'status' => 'checked_in',
            'status_label' => $isRtl ? 'حاضر بالانتظار' : 'Waiting in Lobby',
            'badge_bg' => 'bg-[#E5FAFC]',
            'badge_text' => 'text-[#0C6B78]',
            'badge_dot' => 'bg-[#14AFC3]',
            'diagnosis' => $isRtl ? 'خفقان سريع ومراجعة نتائج إنزيمات القلب Troponin' : 'Palpitations & cardiac enzyme panel review',
            'vitals' => ['bp' => '118/76', 'hr' => '88 bpm', 'spo2' => '99%', 'temp' => '36.9 °C'],
            'allergies' => $isRtl ? 'لا توجد حساسية مسجلة' : 'NKDA',
        ],
        [
            'id' => 204,
            'token' => '#A-104',
            'time' => '10:00 AM',
            'duration' => '20 min',
            'mrn' => 'MRN-91452',
            'national_id' => '1048291054',
            'patient' => $isRtl ? 'سلطان محمد القحطاني' : 'Sultan Mohammed Al-Qahtani',
            'gender_age' => $isRtl ? 'ذكر، 51 سنة' : 'Male, 51 yrs',
            'phone' => '+967 77 778 8990',
            'blood_type' => 'A-',
            'room' => '204',
            'status' => 'checked_in',
            'status_label' => $isRtl ? 'حاضر بالانتظار' : 'Waiting in Lobby',
            'badge_bg' => 'bg-[#E5FAFC]',
            'badge_text' => 'text-[#0C6B78]',
            'badge_dot' => 'bg-[#14AFC3]',
            'diagnosis' => $isRtl ? 'فحص دوري وقائي بعد القسطرة العلاجية PCI' : 'Post-PCI surveillance & echocardiogram check',
            'vitals' => ['bp' => '130/80', 'hr' => '72 bpm', 'spo2' => '98%', 'temp' => '36.7 °C'],
            'allergies' => $isRtl ? 'لا توجد حساسية مسجلة' : 'NKDA',
        ],
        [
            'id' => 205,
            'token' => '#A-105',
            'time' => '10:30 AM',
            'duration' => '20 min',
            'mrn' => 'MRN-92330',
            'national_id' => '1063948210',
            'patient' => $isRtl ? 'مريم إبراهيم الغامدي' : 'Maryam Ibrahim Al-Ghamdi',
            'gender_age' => $isRtl ? 'أنثى، 38 سنة' : 'Female, 38 yrs',
            'phone' => '+967 77 445 5667',
            'blood_type' => 'O-',
            'room' => '204',
            'status' => 'confirmed',
            'status_label' => $isRtl ? 'مؤكد (قادم)' : 'Confirmed',
            'badge_bg' => 'bg-slate-100',
            'badge_text' => 'text-slate-600',
            'badge_dot' => 'bg-slate-400',
            'diagnosis' => $isRtl ? 'اضطراب نبض ومراجعة جهاز مراقبة القلب Holter' : 'Arrhythmia review (24-hr Holter Telemetry)',
            'vitals' => ['bp' => '122/78', 'hr' => '78 bpm', 'spo2' => '99%', 'temp' => '36.8 °C'],
            'allergies' => $isRtl ? 'سلفا (Sulfa Drugs)' : 'Sulfa drugs allergy',
        ],
        [
            'id' => 206,
            'token' => '#A-106',
            'time' => '11:00 AM',
            'duration' => '20 min',
            'mrn' => 'MRN-93411',
            'national_id' => '1058293019',
            'patient' => $isRtl ? 'عبدالعزيز خالد المطيري' : 'Abdulaziz Khalid Al-Mutairi',
            'gender_age' => $isRtl ? 'ذكر، 45 سنة' : 'Male, 45 yrs',
            'phone' => '+967 77 889 9001',
            'blood_type' => 'AB+',
            'room' => '204',
            'status' => 'confirmed',
            'status_label' => $isRtl ? 'مؤكد (قادم)' : 'Confirmed',
            'badge_bg' => 'bg-slate-100',
            'badge_text' => 'text-slate-600',
            'badge_dot' => 'bg-slate-400',
            'diagnosis' => $isRtl ? 'متابعة دورية للشرايين التاجية وعلاج خافض للدهون' : 'Coronary artery disease follow-up & statin therapy',
            'vitals' => ['bp' => '138/88', 'hr' => '82 bpm', 'spo2' => '97%', 'temp' => '37.1 °C'],
            'allergies' => $isRtl ? 'لا توجد حساسية مسجلة' : 'NKDA',
        ],
        [
            'id' => 207,
            'token' => '#A-107',
            'time' => '11:30 AM',
            'duration' => '20 min',
            'mrn' => 'MRN-94102',
            'national_id' => '1029384756',
            'patient' => $isRtl ? 'فاطمة حسن الزهراني' : 'Fatima Hassan Al-Zahrani',
            'gender_age' => $isRtl ? 'أنثى، 62 سنة' : 'Female, 62 yrs',
            'phone' => '+967 77 223 3445',
            'blood_type' => 'B+',
            'room' => '204',
            'status' => 'scheduled',
            'status_label' => $isRtl ? 'مجدول' : 'Scheduled',
            'badge_bg' => 'bg-slate-50',
            'badge_text' => 'text-slate-500',
            'badge_dot' => 'bg-slate-300',
            'diagnosis' => $isRtl ? 'قصور قلب خفيف ومتابعة مدرات البول' : 'Mild heart failure surveillance & diuretic adjustments',
            'vitals' => ['bp' => '134/82', 'hr' => '70 bpm', 'spo2' => '98%', 'temp' => '36.6 °C'],
            'allergies' => $isRtl ? 'أسبرين (Aspirin)' : 'Aspirin allergy',
        ],
    ];
@endphp

@section('page-title', $isRtl ? 'جدول العيادة والمواعيد' : 'My Clinic Schedule')
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
        {{ $isRtl ? 'قائمة المرضى' : 'My Patients' }}
    </x-sidebar-link>

    <x-sidebar-link :href="route('doctor.notes.index')" :active="request()->routeIs('doctor.notes.*')">
        <x-slot:icon>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2Z"/>
                <path d="M9 13h6M9 17h6"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'الملاحظات والتقارير' : 'Medical Notes' }}
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
         1. الشريط العلوي الموحد (تاريخ اليوم فقط وثابت بدون تنقل)
    ══════════════════════════════════════════════ --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] inline-block"></span>
                <h1 class="text-2xl font-black text-[#152C4B] tracking-tight">
                    {{ $isRtl ? 'جدول العيادة والمواعيد' : 'Clinic Appointment Schedule' }}
                </h1>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100">
                    {{ $isRtl ? 'عيادة القلب 204' : 'Cardiology Suite 204' }}
                </span>
            </div>
            <p class="text-sm text-slate-500 mt-1">
                {{ $isRtl ? 'استعراض مواعيد المرضى الحاضرين، تدوين الملاحظات السريرية، والاطلاع على الملفات الطبية.' : 'View waiting patients, record clinical notes, and access medical files.' }}
            </p>
        </div>

        {{-- تاريخ اليوم فقط (ثابت وواضح كما في واجهة المدير ولوحة التحكم بدون أزرار تنقل) --}}
        <div class="flex items-center gap-2.5">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-slate-200 text-xs font-bold text-slate-700 shadow-xs">
                <svg class="w-4 h-4 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ now()->locale($isRtl ? 'ar' : 'en')->isoFormat('dddd, D MMMM YYYY') }}</span>
                <span class="text-slate-300">·</span>
                <span class="text-[#0C6B78] font-mono text-[11px]">08:30 AM - 04:00 PM</span>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         2. بطاقات الإحصائيات الأربع المتناسقة الموحدة
    ══════════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- Card 1: Solid Teal Featured Card --}}
        <div class="relative overflow-hidden rounded-2xl p-6 text-white text-center shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center bg-[#0C6B78]">
            <div class="absolute -right-4 -top-4 w-24 h-24 rounded-full bg-white/10 pointer-events-none"></div>
            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center mb-2.5 text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
            </div>
            <span class="text-[11px] font-extrabold uppercase tracking-widest text-teal-100">
                {{ $isRtl ? 'إجمالي خانات العيادة' : 'TOTAL CLINIC SLOTS' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-white my-2 tracking-tight font-mono">
                {{ $scheduleStats['total_slots'] ?? 18 }}
            </div>
            <div class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-white/20 text-white backdrop-blur-xs">
                <span>{{ $isRtl ? 'سعة الجلسات لليوم' : 'Daily Capacity' }}</span>
            </div>
        </div>

        {{-- Card 2: Waiting in Lobby --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'حاضرون بالانتظار' : 'WAITING IN LOBBY' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $scheduleStats['checked_in'] ?? 8 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'جاهزون للكشف السريري' : 'Ready for consult' }}</span>
            </div>
        </div>

        {{-- Card 3: Completed Consultations --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'كشوفات تم إنجازها' : 'COMPLETED' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $scheduleStats['completed'] ?? 6 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'تم توثيق الملاحظات' : 'Notes finalized' }}</span>
            </div>
        </div>

        {{-- Card 4: Open/Available Slots --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 8v8m-4-4h8"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'الخانات المتاحة' : 'OPEN SLOTS' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $scheduleStats['available'] ?? 4 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'متاحة للحالات العاجلة' : 'Open for walk-ins' }}</span>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════════
         3. جدول الكشوفات السريرية المطور
    ══════════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        {{-- Filter Bar --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-6 py-4 border-b border-slate-100 bg-slate-50/50">
            {{-- Tabs --}}
            <div class="flex items-center gap-1.5 overflow-x-auto pb-1 sm:pb-0">
                @foreach([
                    ['key' => 'all', 'label_ar' => 'جميع الخانات', 'label_en' => 'All Slots', 'count' => count($slots)],
                    ['key' => 'waiting', 'label_ar' => 'حاضرون بالانتظار', 'label_en' => 'Waiting in Lobby', 'count' => 2],
                    ['key' => 'morning', 'label_ar' => 'الفترة الصباحية', 'label_en' => 'Morning', 'count' => 5],
                    ['key' => 'afternoon', 'label_ar' => 'الفترة المسائية', 'label_en' => 'Afternoon', 'count' => 2],
                ] as $i => $tab)
                    <button onclick="filterSlots('{{ $tab['key'] }}', this)"
                            class="slot-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer {{ $i === 0 ? 'bg-[#0C6B78] text-white shadow-xs' : 'bg-white text-slate-600 border border-slate-200 hover:bg-[#E5FAFC] hover:text-[#0C6B78]' }}">
                        <span>{{ $isRtl ? $tab['label_ar'] : $tab['label_en'] }}</span>
                        <span class="text-[10px] px-1.5 py-0.2 rounded-md font-mono {{ $i === 0 ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-500' }}">
                            {{ $tab['count'] }}
                        </span>
                    </button>
                @endforeach
            </div>

            {{-- Search Input --}}
            <div class="relative">
                <svg class="w-4 h-4 absolute {{ $isRtl ? 'right-3' : 'left-3' }} top-1/2 -translate-y-1/2 text-slate-400"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="m21 21-4.35-4.35"/>
                </svg>
                <input type="text"
                       id="slotSearchInput"
                       onkeyup="searchScheduleTable()"
                       placeholder="{{ $isRtl ? 'بحث بالمريض أو الرقم الطبي أو التذكرة...' : 'Search patient, MRN, or token...' }}"
                       class="{{ $isRtl ? 'pr-9 pl-3' : 'pl-9 pr-3' }} py-1.5 bg-white border border-slate-200 rounded-xl text-xs focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none w-full sm:w-64 focus:sm:w-72 transition-all duration-300">
            </div>
        </div>

        {{-- Slots Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[950px] border-collapse" id="scheduleMasterTable">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
                        <th class="px-6 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'الدور / الوقت' : 'Token / Time' }}
                        </th>
                        <th class="px-6 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'المريض' : 'Patient' }}
                        </th>
                        <th class="px-5 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'حالة الموعد' : 'Appointment Status' }}
                        </th>
                        <th class="px-6 py-3.5 text-center whitespace-nowrap">
                            {{ $isRtl ? 'الإجراءات السريرية' : 'Clinical Actions' }}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($slots as $slot)
                        <tr class="hover:bg-[#E5FAFC]/30 transition-colors slot-row"
                            data-search="{{ strtolower($slot['patient'] . ' ' . $slot['mrn'] . ' ' . $slot['token']) }}"
                            data-status="{{ $slot['status'] }}">

                            {{-- Token & Time --}}
                            <td class="px-6 py-3.5 whitespace-nowrap">
                                <div class="flex items-center gap-2.5">
                                    <span class="inline-flex items-center justify-center font-mono font-bold text-xs px-2.5 py-1 rounded-lg bg-slate-100 text-[#152C4B] border border-slate-200">
                                        {{ $slot['token'] }}
                                    </span>
                                    <div>
                                        <div class="font-bold text-[#152C4B] text-xs">{{ $slot['time'] }}</div>
                                        <div class="text-slate-400 text-[11px] font-mono mt-0.5">{{ $slot['duration'] }}</div>
                                    </div>
                                </div>
                            </td>

                            {{-- Patient Name Only (فقط الاسم بشكل واضح وبارز وبدون أي زحمة) --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3.5">
                                    <div class="w-10 h-10 rounded-2xl bg-[#E5FAFC] text-[#0C6B78] font-black text-sm flex items-center justify-center flex-shrink-0 border border-teal-100 shadow-2xs">
                                        {{ mb_substr($slot['patient'], 0, 1) }}
                                    </div>
                                    <span class="font-extrabold text-[#152C4B] text-[13.5px] tracking-tight">
                                        {{ $slot['patient'] }}
                                    </span>
                                </div>
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3.5 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold {{ $slot['badge_bg'] }} {{ $slot['badge_text'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $slot['badge_dot'] }} {{ in_array($slot['status'], ['checked_in', 'in_consultation']) ? 'animate-pulse' : '' }}"></span>
                                    {{ $slot['status_label'] }}
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-3.5 whitespace-nowrap text-center actions-cell">
                                <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                                    {{-- تدوين ملاحظة سريرية فورية --}}
                                    <button type="button" onclick="openQuickNoteModal('{{ $slot['mrn'] }}', '{{ $slot['patient'] }}')" class="h-8 px-3 rounded-xl bg-[#0C6B78] hover:bg-[#152C4B] text-white text-xs font-bold transition-all shadow-xs flex items-center justify-center gap-1.5 cursor-pointer">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        <span>{{ $isRtl ? 'تدوين تقرير' : 'Add Note' }}</span>
                                    </button>

                                    {{-- زر عرض كارت الملف الطبي المباشر المنظم دون زحمة --}}
                                    <button type="button"
                                            onclick='openPatientSummaryCard(@json($slot))'
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-50 hover:bg-[#E5FAFC] text-slate-700 hover:text-[#0C6B78] text-xs font-bold transition-colors border border-slate-200 cursor-pointer">
                                        <svg class="w-3.5 h-3.5 text-[#0C6B78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <span>{{ $isRtl ? 'الملف الطبي' : 'Record' }}</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-400">
                                {{ $isRtl ? 'لا توجد خانات مجدولة لهذا اليوم.' : 'No slots scheduled for this day.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer Summary --}}
        <div class="flex items-center justify-between px-6 py-3.5 bg-slate-50/60 border-t border-slate-100 text-xs text-slate-500">
            <span>
                {{ $isRtl
                    ? 'عرض ' . count($slots) . ' من أصل ' . ($scheduleStats['total_slots'] ?? count($slots)) . ' خانة سريرية'
                    : 'Showing ' . count($slots) . ' of ' . ($scheduleStats['total_slots'] ?? count($slots)) . ' clinic slots' }}
            </span>
            <span class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                {{ $isRtl ? 'فترة الكشف السريري: 20 دقيقة لكل مريض · العيادة 204' : 'Standard consultation slot: 20 mins · Clinic 204' }}
            </span>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════
     MODAL 1: كارت ملخص الملف الطبي للمريض (نموذج احترافي رفيع المستوى بألوان المشروع الأساسية)
══════════════════════════════════════════════ --}}
<div id="patientCardModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/65 backdrop-blur-xs hidden p-4 anim-overlay">
    <div class="bg-white rounded-3xl w-full max-w-2xl shadow-2xl border border-slate-200 overflow-hidden anim-modal-pop">
        
        {{-- Luxury Branded Header (Dark Navy & Deep Teal Gradient with Inline Fallback) --}}
        <div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 100%); background-color: #152C4B;" class="px-6 py-5 text-white">
            {{-- Top Branding Bar --}}
            <div class="flex items-center justify-between pb-3.5 border-b border-white/15 text-xs">
                <div class="flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-white/15 backdrop-blur-xs flex items-center justify-center text-[#14AFC3] flex-shrink-0">
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
                    <button type="button" onclick="closePatientSummaryCard()" class="w-7 h-7 rounded-lg bg-white/10 hover:bg-white/25 text-white flex items-center justify-center transition-all cursor-pointer font-bold text-xs" title="{{ $isRtl ? 'إغلاق' : 'Close' }}">✕</button>
                </div>
            </div>

            {{-- Patient Dossier Hero Row --}}
            <div class="pt-4 flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-white/15 border-2 border-white/25 backdrop-blur-sm flex items-center justify-center text-[#14AFC3] font-black text-2xl flex-shrink-0 shadow-inner" id="pcAvatar">
                    س
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap items-center gap-2.5">
                        <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight" id="pcPatientName">سارة فهد العتيبي</h3>
                        <span class="px-2.5 py-0.5 rounded-lg text-xs font-mono font-black text-[#152C4B] bg-[#14AFC3] shadow-xs">
                            <bdi dir="ltr" id="pcBloodType">A+</bdi>
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-white/20 text-white backdrop-blur-xs border border-white/20" id="pcStatusLabel">مكتمل</span>
                    </div>
                    <div class="flex flex-wrap items-center gap-2 mt-2 text-xs">
                        <span class="bg-black/25 text-teal-200 font-mono font-bold text-xs px-2.5 py-0.5 rounded-md border border-white/10">
                            <bdi dir="ltr" id="pcMrn">MRN-88421</bdi>
                        </span>
                        <span class="text-white/40">·</span>
                        <span id="pcGenderAge" class="text-white/90 font-medium">أنثى، 34 سنة</span>
                        <span class="text-white/40">·</span>
                        <span class="text-teal-200/90 font-mono text-xs">
                            <span class="text-white/60 font-sans font-medium">{{ $isRtl ? 'هوية: ' : 'ID: ' }}</span><bdi dir="ltr" id="pcNationalIdRow">1084920194</bdi>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Body --}}
        <div class="p-6 space-y-4 max-h-[72vh] overflow-y-auto text-xs bg-[#F8FAFC]">
            
            {{-- Demographic & Appointment Grid (4 Clean High-Contrast Cards) --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <div class="p-3.5 rounded-2xl bg-white border border-slate-200/90 shadow-2xs">
                    <div class="flex items-center gap-1.5 text-slate-400 mb-1.5">
                        <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                        <span class="text-[11px] font-bold text-slate-500">{{ $isRtl ? 'رقم الهوية' : 'National ID' }}</span>
                    </div>
                    <bdi dir="ltr" class="font-mono font-bold text-slate-800 text-[13px] block" id="pcNationalId">1084920194</bdi>
                </div>

                <div class="p-3.5 rounded-2xl bg-white border border-slate-200/90 shadow-2xs">
                    <div class="flex items-center gap-1.5 text-slate-400 mb-1.5">
                        <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span class="text-[11px] font-bold text-slate-500">{{ $isRtl ? 'هاتف التواصل' : 'Phone Number' }}</span>
                    </div>
                    <bdi dir="ltr" class="font-mono font-black text-[#0C6B78] text-[13px] block tracking-wide" id="pcPhone">+967 77 123 4567</bdi>
                </div>

                <div class="p-3.5 rounded-2xl bg-white border border-slate-200/90 shadow-2xs">
                    <div class="flex items-center gap-1.5 text-slate-400 mb-1.5">
                        <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="text-[11px] font-bold text-slate-500">{{ $isRtl ? 'رقم الدور والوقت' : 'Token & Time' }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-0.5 rounded-md bg-[#E5FAFC] text-[#0C6B78] font-mono font-black text-xs border border-teal-200/80">
                            <bdi dir="ltr" id="pcToken">#A-101</bdi>
                        </span>
                        <span class="font-mono font-bold text-slate-700 text-xs">
                            <bdi dir="ltr" id="pcTime">08:30 AM</bdi>
                        </span>
                    </div>
                </div>

                <div class="p-3.5 rounded-2xl bg-white border border-slate-200/90 shadow-2xs">
                    <div class="flex items-center gap-1.5 text-slate-400 mb-1.5">
                        <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                        <span class="text-[11px] font-bold text-slate-500">{{ $isRtl ? 'مدة الكشف والمقر' : 'Duration & Clinic' }}</span>
                    </div>
                    <span class="font-bold text-slate-700 text-xs block truncate" id="pcDuration">20 دقيقة · عيادة 204</span>
                </div>
            </div>

            {{-- Vital Signs (4 Prominent Modern Monitor Cards with Explicit LTR Units) --}}
            <div class="bg-white p-4.5 rounded-2xl border border-slate-200/90 shadow-2xs">
                <div class="flex items-center justify-between mb-3 pb-2.5 border-b border-slate-100">
                    <span class="text-xs font-black text-[#152C4B] flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                        <span>{{ $isRtl ? 'العلامات والمؤشرات الحيوية السريرية' : 'Latest Clinical Vital Signs' }}</span>
                    </span>
                    <span class="text-[10.5px] text-[#0C6B78] font-bold bg-[#E5FAFC] px-2.5 py-0.5 rounded-md border border-[#14AFC3]/20">
                        {{ $isRtl ? 'معتمد من غرفة الفرز السريري' : 'Triage Certified' }}
                    </span>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 text-center">
                    {{-- BP --}}
                    <div class="p-3 rounded-2xl border border-[#14AFC3]/30" style="background-color: #E5FAFC;">
                        <span class="text-[10.5px] text-[#0C6B78] block font-black mb-1">{{ $isRtl ? 'ضغط الدم (BP)' : 'Blood Pressure' }}</span>
                        <div dir="ltr" class="flex items-baseline justify-center gap-1.5">
                            <span class="font-mono font-black text-2xl text-[#0C6B78]" id="pcVitalBp">128/82</span>
                            <span class="text-[10px] text-teal-800 font-bold uppercase">mmHg</span>
                        </div>
                        <span class="text-[10px] font-bold text-[#0C6B78] bg-white px-2.5 py-0.5 rounded-md border border-teal-200/80 shadow-2xs mt-2 inline-block">{{ $isRtl ? 'طبيعي ومستقر' : 'Optimal' }}</span>
                    </div>
                    {{-- Pulse --}}
                    <div class="p-3 rounded-2xl bg-slate-50/80 border border-slate-200">
                        <span class="text-[10.5px] text-slate-500 block font-bold mb-1">{{ $isRtl ? 'معدل النبض' : 'Heart Rate' }}</span>
                        <div dir="ltr" class="flex items-baseline justify-center gap-1.5">
                            <span class="font-mono font-black text-2xl text-[#152C4B]" id="pcVitalHr">74</span>
                            <span class="text-[10px] text-slate-500 font-bold uppercase">bpm</span>
                        </div>
                        <span class="text-[10px] font-bold text-slate-600 bg-white px-2.5 py-0.5 rounded-md border border-slate-200 mt-2 inline-block">{{ $isRtl ? 'إيقاع منتظم' : 'Regular' }}</span>
                    </div>
                    {{-- SpO2 --}}
                    <div class="p-3 rounded-2xl bg-slate-50/80 border border-slate-200">
                        <span class="text-[10.5px] text-slate-500 block font-bold mb-1">{{ $isRtl ? 'تشبع الأكسجين' : 'SpO2' }}</span>
                        <div dir="ltr" class="flex items-baseline justify-center gap-0.5">
                            <span class="font-mono font-black text-2xl text-[#152C4B]" id="pcVitalSpo2">99</span>
                            <span class="text-xs text-slate-600 font-black font-mono">%</span>
                        </div>
                        <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-md border border-emerald-200 mt-2 inline-block">{{ $isRtl ? 'ممتاز ومثالي' : 'Excellent' }}</span>
                    </div>
                    {{-- Temp --}}
                    <div class="p-3 rounded-2xl bg-slate-50/80 border border-slate-200">
                        <span class="text-[10.5px] text-slate-500 block font-bold mb-1">{{ $isRtl ? 'درجة الحرارة' : 'Temperature' }}</span>
                        <div dir="ltr" class="flex items-baseline justify-center gap-1">
                            <span class="font-mono font-black text-2xl text-[#152C4B]" id="pcVitalTemp">36.8</span>
                            <span class="text-[11px] text-slate-500 font-bold">°C</span>
                        </div>
                        <span class="text-[10px] font-bold text-slate-600 bg-white px-2.5 py-0.5 rounded-md border border-slate-200 mt-2 inline-block">{{ $isRtl ? 'حرارة طبيعية' : 'Normal' }}</span>
                    </div>
                </div>
            </div>

            {{-- Clinical Diagnosis & Medical Plan --}}
            <div class="bg-white p-4.5 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-[#152C4B] flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#0C6B78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>{{ $isRtl ? 'التشخيص الطبي السريري المعتمد في الزيارة:' : 'Certified Clinical Diagnosis:' }}</span>
                    </span>
                    <span class="text-[10.5px] font-mono text-[#0C6B78] bg-[#E5FAFC] px-2.5 py-0.5 rounded-md font-bold">
                        ICD-10 Verified
                    </span>
                </div>

                <div class="p-3.5 rounded-xl border border-teal-200/90 shadow-2xs" style="background-color: #E5FAFC; border-right: 4px solid #0C6B78;">
                    <p class="font-black text-[#152C4B] text-[13.5px] leading-relaxed" id="pcDiagnosis">متابعة ارتفاع ضغط دم شرياني وتخطيط قلب سليم</p>
                </div>
                
                <div class="pt-2 flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 border-t border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="text-slate-400 text-[11px] font-bold">{{ $isRtl ? 'الحساسية الدوائية:' : 'Drug Allergies:' }}</span>
                        <span class="font-bold text-slate-800 text-xs px-2.5 py-1 rounded-lg bg-slate-100 border border-slate-200" id="pcAllergies">لا توجد حساسية دوائية مسجلة</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-xs font-bold text-[#152C4B] bg-[#E5FAFC] px-3 py-1 rounded-xl border border-teal-200/80">
                        <svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $isRtl ? 'الطبيب المعالج: د. ' . ($cleanDoctorName === 'Nezar Saleh' ? 'نزار صالح' : $cleanDoctorName) . ' · استشاري القلب' : 'Attending: Dr. ' . $cleanDoctorName . ' · Cardiologist' }}</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Action Buttons Footer --}}
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
            <button type="button" onclick="closePatientSummaryCard()" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 font-bold transition-colors cursor-pointer text-xs">
                {{ $isRtl ? 'إغلاق' : 'Close' }}
            </button>
            <div class="flex items-center gap-2.5">
                <button type="button" onclick="window.print()" style="direction: {{ $isRtl ? 'rtl' : 'ltr' }};" class="px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 font-bold transition-all shadow-2xs flex items-center gap-2 cursor-pointer text-xs">
                    <svg class="w-4 h-4 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    <span>{{ $isRtl ? 'طباعة الملخص' : 'Print Summary' }}</span>
                </button>
                <button type="button" id="pcOpenNoteBtn" style="direction: {{ $isRtl ? 'rtl' : 'ltr' }}; background-color: #0C6B78;" onmouseover="this.style.backgroundColor='#152C4B'" onmouseout="this.style.backgroundColor='#0C6B78'" class="px-5 py-2.5 rounded-xl text-white font-bold transition-all shadow-sm flex items-center gap-2 cursor-pointer text-xs">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span>{{ $isRtl ? 'تدوين تقرير للمريض' : 'Write Note' }}</span>
                </button>
            </div>
        </div>

    </div>
</div>

{{-- ══════════════════════════════════════════════
     MODAL 2: كارت تدوين التقرير والملاحظة السريرية المباشرة
══════════════════════════════════════════════ --}}
<div id="quickNoteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/50 backdrop-blur-sm hidden p-4 anim-overlay">
    <div class="bg-white rounded-2xl w-full max-w-xl shadow-2xl border border-slate-100 overflow-hidden anim-modal-pop">
        {{-- Header --}}
        <div class="px-6 py-4 bg-[#152C4B] text-white flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-[#14AFC3] flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm font-bold">{{ $isRtl ? 'تدوين تقرير وملاحظة سريرية' : 'Clinical Note & Exam Report' }}</h3>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#E5FAFC]/20 text-teal-100 border border-white/20">EHR Sign-off</span>
                    </div>
                    <p class="text-xs text-slate-300 mt-0.5">{{ $isRtl ? 'توثيق سريري معتمد داخل السجل الطبي للمريض' : 'Direct certified clinical documentation into patient EHR' }}</p>
                </div>
            </div>
            <button onclick="closeQuickNoteModal()" class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-all cursor-pointer">✕</button>
        </div>

        {{-- Form --}}
        <form onsubmit="submitQuickNote(event)" class="p-6 space-y-4 text-xs">
            {{-- Patient Quick Strip --}}
            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-[#E5FAFC] text-[#0C6B78] font-bold flex items-center justify-center text-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-slate-800 text-xs" id="noteDisplayPatient">سارة فهد العتيبي</div>
                        <div class="text-[11px] text-slate-400 font-mono" id="noteDisplayMrn">MRN-88421 · عيادة القلب 204</div>
                    </div>
                </div>
                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                    {{ $isRtl ? 'كشف معتمد' : 'Active Consult' }}
                </span>
                <input type="hidden" id="modalNotePatient" value="سارة فهد العتيبي">
                <input type="hidden" id="modalNoteMrn" value="MRN-88421">
            </div>

            {{-- Clinical Diagnosis --}}
            <div>
                <label class="block font-bold text-slate-700 mb-1.5 flex items-center justify-between">
                    <span>{{ $isRtl ? 'التشخيص الطبي السريري' : 'Clinical Diagnosis' }}</span>
                    <span class="text-[10px] text-slate-400 font-normal">{{ $isRtl ? 'انقر على التشخيص السريع لتعبئته:' : 'Click quick-tag to insert:' }}</span>
                </label>
                <input type="text" id="noteDiagnosisInput" required 
                       placeholder="{{ $isRtl ? 'مثال: ارتفاع ضغط الدم الأساسي، أو ألم صدري حاد' : 'e.g. Essential Hypertension, Acute Angina' }}"
                       class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all font-semibold text-slate-800 text-xs">
                
                <div class="flex flex-wrap gap-1.5 mt-2">
                    <button type="button" onclick="insertDiagnosisTag('{{ $isRtl ? 'ألم صدري غير نمطي وإجهاد قلبي' : 'Atypical chest pain & exertion fatigue' }}')" 
                            class="px-2 py-0.5 rounded-lg bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10.5px] font-medium text-slate-600 transition-colors">
                        + {{ $isRtl ? 'ألم صدري غير نمطي' : 'Atypical chest pain' }}
                    </button>
                    <button type="button" onclick="insertDiagnosisTag('{{ $isRtl ? 'ارتفاع ضغط دم شرياني من الدرجة 1' : 'Grade 1 Arterial Hypertension' }}')" 
                            class="px-2 py-0.5 rounded-lg bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10.5px] font-medium text-slate-600 transition-colors">
                        + {{ $isRtl ? 'ارتفاع ضغط دم (HTN)' : 'Hypertension' }}
                    </button>
                    <button type="button" onclick="insertDiagnosisTag('{{ $isRtl ? 'خفقان قلبي حميد وفحص دوري' : 'Benign Palpitations Check' }}')" 
                            class="px-2 py-0.5 rounded-lg bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10.5px] font-medium text-slate-600 transition-colors">
                        + {{ $isRtl ? 'خفقان قلبي' : 'Palpitations' }}
                    </button>
                </div>
            </div>

            {{-- Clinical Findings & Physical Exam --}}
            <div>
                <label class="block font-bold text-slate-700 mb-1.5">
                    {{ $isRtl ? 'نتائج الفحص السريري والملاحظات' : 'Clinical Findings & Examination' }}
                </label>
                <textarea rows="3" required 
                          placeholder="{{ $isRtl ? 'ملاحظات الفحص، أصوات القلب S1/S2، نتائج تخطيط القلب ECG، وتوصيات الطبيب...' : 'Examination notes, heart sounds, 12-lead ECG review, doctor comments...' }}"
                          class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all text-xs text-slate-800"></textarea>
            </div>

            {{-- Structured Treatment Plan & Rx --}}
            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2.5">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-[#152C4B] flex items-center gap-1.5 text-xs">
                        <svg class="w-3.5 h-3.5 text-[#0C6B78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                        <span>{{ $isRtl ? 'الخطة العلاجية والوصفة الطبية (Rx)' : 'Treatment & E-Prescription Plan' }}</span>
                    </span>
                    <span class="text-[10px] text-slate-400 font-mono">{{ $isRtl ? 'صيدلية مستشفى الرشيد' : 'Al-Rasheed Pharmacy' }}</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <input type="text" placeholder="{{ $isRtl ? 'الدواء: مثلاً Amlodipine 5mg' : 'Medication: e.g. Amlodipine 5mg' }}"
                           class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-xs outline-none focus:border-[#14AFC3]">
                    <input type="text" placeholder="{{ $isRtl ? 'الجرعة: قرص واحد يومياً صباحاً' : 'Dosage: 1 tablet daily (AM)' }}"
                           class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-xs outline-none focus:border-[#14AFC3]">
                </div>
            </div>

            {{-- Signature Strip --}}
            <div class="pt-2 flex items-center justify-between border-t border-slate-100 text-[11px] text-slate-400">
                <span class="flex items-center gap-1.5 font-semibold text-slate-600">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ $isRtl ? 'توقيع الطبيب المعتمد: د. ' . $cleanDoctorName : 'Signed by: Dr. ' . $cleanDoctorName }}</span>
                </span>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="closeQuickNoteModal()" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 font-semibold transition-colors cursor-pointer">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-[#0C6B78] hover:bg-[#152C4B] text-white font-bold transition-all shadow-sm flex items-center gap-1.5 cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ $isRtl ? 'حفظ وتوثيق سريري' : 'Sign & Document Note' }}</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- ══════════════════════════════════════════════
     STYLES
══════════════════════════════════════════════ --}}
<style>
    @keyframes modalScaleEntrance {
        from {
            opacity: 0;
            transform: scale(0.96) translateY(4px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    .anim-modal-pop {
        animation: modalScaleEntrance 0.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    @keyframes overlayFadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .anim-overlay {
        animation: overlayFadeIn 0.15s ease-out forwards;
    }
    @keyframes pageFadeIn {
        from { opacity: 0; transform: translateY(4px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .dashboard-fade-in {
        animation: pageFadeIn 0.3s ease-out forwards;
    }
</style>

{{-- ══════════════════════════════════════════════
     INTERACTIVE JAVASCRIPT
══════════════════════════════════════════════ --}}
<script>
    function showNotificationToast(msg) {
        const toast = document.getElementById('liveActionToast');
        const msgEl = document.getElementById('liveActionToastMsg');
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

    // Live Search in Schedule Table
    function searchScheduleTable() {
        const query = document.getElementById('slotSearchInput').value.toLowerCase();
        const rows = document.querySelectorAll('.slot-row');
        rows.forEach(row => {
            const text = row.getAttribute('data-search') || '';
            row.style.display = text.includes(query) ? '' : 'none';
        });
    }

    // Filter Slots by Tab
    function filterSlots(type, clickedBtn) {
        document.querySelectorAll('.slot-tab').forEach(btn => {
            btn.className = 'slot-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-white text-slate-600 border border-slate-200 hover:bg-[#E5FAFC] hover:text-[#0C6B78]';
            const counter = btn.querySelector('span:last-child');
            if (counter) {
                counter.className = 'text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-slate-100 text-slate-500';
            }
        });

        if (clickedBtn) {
            clickedBtn.className = 'slot-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-[#0C6B78] text-white shadow-xs';
            const activeCounter = clickedBtn.querySelector('span:last-child');
            if (activeCounter) {
                activeCounter.className = 'text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-white/20 text-white';
            }
        }

        const rows = document.querySelectorAll('.slot-row');
        rows.forEach(row => {
            if (type === 'all') {
                row.style.display = '';
            } else if (type === 'waiting') {
                const status = row.getAttribute('data-status') || '';
                row.style.display = (status === 'checked_in') ? '' : 'none';
            } else if (type === 'morning') {
                const text = row.innerText;
                row.style.display = (text.includes('AM') || text.includes('ص')) ? '' : 'none';
            } else if (type === 'afternoon') {
                const text = row.innerText;
                row.style.display = (text.includes('PM') || text.includes('م')) ? '' : 'none';
            }
        });
    }

    // Open Patient Summary Card (Modal احترافي رفيع المستوى بدون زحمة)
    function openPatientSummaryCard(slotOrName, mrn, id, genderAge, blood, phone, diag, bp, hr, spo2, temp, allergies) {
        let s = {};
        if (typeof slotOrName === 'object' && slotOrName !== null) {
            s = slotOrName;
        } else {
            s = {
                patient: slotOrName,
                mrn: mrn,
                national_id: id,
                gender_age: genderAge,
                blood_type: blood,
                phone: phone,
                diagnosis: diag,
                vitals: { bp: bp, hr: hr, spo2: spo2, temp: temp },
                allergies: allergies,
                token: '#A-101',
                time: '08:30 AM',
                duration: '20 min',
                status_label: 'مكتمل'
            };
        }

        const name = s.patient || s.name || '';
        document.getElementById('pcPatientName').innerText = name;
        document.getElementById('pcAvatar').innerText = name.charAt(0);
        document.getElementById('pcMrn').innerText = s.mrn || 'MRN-88421';
        document.getElementById('pcGenderAge').innerText = s.gender_age || '';
        document.getElementById('pcNationalIdRow').innerText = s.national_id || '-';
        document.getElementById('pcBloodType').innerText = s.blood_type || 'O+';
        document.getElementById('pcNationalId').innerText = s.national_id || '-';
        document.getElementById('pcPhone').innerText = s.phone || '-';
        document.getElementById('pcStatusLabel').innerText = s.status_label || '{{ $isRtl ? "مكتمل" : "Completed" }}';
        
        document.getElementById('pcToken').innerText = s.token || '#A-101';
        document.getElementById('pcTime').innerText = s.time || '08:30 AM';
        const dur = (s.duration || '20 min').toString().replace(/min/i, '{{ $isRtl ? "دقيقة" : "min" }}');
        const room = s.room ? ('{{ $isRtl ? " · عيادة " : " · Suite " }}' + s.room) : ('{{ $isRtl ? " · عيادة 204" : " · Suite 204" }}');
        document.getElementById('pcDuration').innerText = dur + room;

        document.getElementById('pcDiagnosis').innerText = s.diagnosis || '{{ $isRtl ? "متابعة دورية سريرية مستقرة" : "Stable clinical follow-up" }}';

        const vitals = s.vitals || {};
        document.getElementById('pcVitalBp').innerText = vitals.bp || '120/80';
        document.getElementById('pcVitalHr').innerText = (vitals.hr || vitals.pulse || '75').toString().replace(/[^0-9]/g, '');
        document.getElementById('pcVitalSpo2').innerText = (vitals.spo2 || '98').toString().replace(/[^0-9]/g, '');
        document.getElementById('pcVitalTemp').innerText = (vitals.temp || '36.8').toString().replace(/[^\d.]/g, '');

        document.getElementById('pcAllergies').innerText = s.allergies || '{{ $isRtl ? "لا توجد حساسية دوائية مسجلة" : "NKDA" }}';

        // زر تدوين التقرير من داخل كارت المريض
        document.getElementById('pcOpenNoteBtn').onclick = function() {
            closePatientSummaryCard();
            openQuickNoteModal(s.mrn || 'MRN-88421', name);
        };

        document.getElementById('patientCardModal').classList.remove('hidden');
    }

    function closePatientSummaryCard() {
        document.getElementById('patientCardModal').classList.add('hidden');
    }

    // Quick Clinical Note
    function openQuickNoteModal(mrn, patientName) {
        document.getElementById('modalNoteMrn').value = mrn || 'MRN-88421';
        document.getElementById('modalNotePatient').value = patientName || 'سارة فهد العتيبي';
        document.getElementById('noteDisplayPatient').innerText = patientName || 'سارة فهد العتيبي';
        document.getElementById('noteDisplayMrn').innerText = (mrn || 'MRN-88421') + ' · {{ $isRtl ? "عيادة القلب 204" : "Cardiology Suite 204" }}';
        document.getElementById('quickNoteModal').classList.remove('hidden');
    }
    function closeQuickNoteModal() {
        document.getElementById('quickNoteModal').classList.add('hidden');
    }
    function insertDiagnosisTag(text) {
        document.getElementById('noteDiagnosisInput').value = text;
    }
    function submitQuickNote(e) {
        e.preventDefault();
        closeQuickNoteModal();
        showNotificationToast('{{ $isRtl ? "تم توثيق الملاحظة السريرية بنجاح في ملف المريض!" : "Clinical note documented successfully into EHR!" }}');
    }

    // ESC to close modal
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            ['patientCardModal', 'quickNoteModal'].forEach(id => {
                const el = document.getElementById(id);
                if (el && !el.classList.contains('hidden')) el.classList.add('hidden');
            });
        }
    });
</script>
@endsection
