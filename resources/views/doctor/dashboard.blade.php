@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    // تنظيف اسم الطبيب لمنع تكرار كلمة د. أو Dr. إذا كانت مخزنة بالفعل في الاسم
    $rawDoctorName = auth()->user()->name ?? ($isRtl ? 'نزار صالح' : 'Nezar Saleh');
    $cleanDoctorName = preg_replace('/^(د\.?|dr\.?)\s+/iu', '', trim($rawDoctorName));

    // إحصائيات الطبيب السريرية لليوم
    $stats = $stats ?? [
        'today'         => 14,
        'waiting'       => 4,
        'pending_notes' => 3,
        'completed'     => 7,
    ];

    // قائمة المواعيد السريرية وطابور الانتظار
    $schedule = $schedule ?? [
        [
            'id'           => 101,
            'mrn'          => 'MRN-88421',
            'patient'      => $isRtl ? 'سارة فهد العتيبي' : 'Sarah Fahad Al-Otaibi',
            'gender'       => $isRtl ? 'أنثى، 34 سنة' : 'Female, 34 yrs',
            'time'         => '09:00 AM',
            'complaint'    => $isRtl ? 'متابعة ارتفاع ضغط الدم وتخطيط القلب ECG' : 'Hypertension follow-up & resting ECG',
            'type'         => $isRtl ? 'زيارة عيادة' : 'Clinic Visit',
            'status'       => 'completed',
            'status_label' => $isRtl ? 'مكتمل' : 'Completed',
            'badge_bg'     => 'bg-slate-100',
            'badge_text'   => 'text-slate-700',
            'badge_dot'    => 'bg-slate-400',
        ],
        [
            'id'           => 102,
            'mrn'          => 'MRN-89104',
            'patient'      => $isRtl ? 'طارق عبدالعزيز الدوسري' : 'Tariq Abdulaziz Al-Dosari',
            'gender'       => $isRtl ? 'ذكر، 48 سنة' : 'Male, 48 yrs',
            'time'         => '09:45 AM',
            'complaint'    => $isRtl ? 'ألم صدري غير نمطي وإجهاد متكرر' : 'Atypical chest pain & exertional fatigue',
            'type'         => $isRtl ? 'كشف جديد' : 'New Consultation',
            'status'       => 'in_consultation',
            'status_label' => $isRtl ? 'في غرفة الكشف' : 'In Consultation',
            'badge_bg'     => 'bg-[#E5FAFC]',
            'badge_text'   => 'text-[#0C6B78]',
            'badge_dot'    => 'bg-[#14AFC3]',
        ],
        [
            'id'           => 103,
            'mrn'          => 'MRN-90218',
            'patient'      => $isRtl ? 'نورة عبدالله الشهري' : 'Noura Abdullah Al-Shehri',
            'gender'       => $isRtl ? 'أنثى، 29 سنة' : 'Female, 29 yrs',
            'time'         => '10:30 AM',
            'complaint'    => $isRtl ? 'خفقان سريع مع نتائج إنزيمات القلب' : 'Palpitations with cardiac enzymes review',
            'type'         => $isRtl ? 'مراجعة تحاليل' : 'Lab Review',
            'status'       => 'waiting',
            'status_label' => $isRtl ? 'في الانتظار' : 'Waiting Room',
            'badge_bg'     => 'bg-amber-50',
            'badge_text'   => 'text-amber-700',
            'badge_dot'    => 'bg-amber-500',
        ],
        [
            'id'           => 104,
            'mrn'          => 'MRN-91452',
            'patient'      => $isRtl ? 'سلطان محمد القحطاني' : 'Sultan Mohammed Al-Qahtani',
            'gender'       => $isRtl ? 'ذكر، 61 سنة' : 'Male, 61 yrs',
            'time'         => '11:15 AM',
            'complaint'    => $isRtl ? 'فحص دوري وقسطرة قلبية سابقة تتبعية' : 'Post-PCI surveillance checkup',
            'type'         => $isRtl ? 'زيارة دورية' : 'Routine Check',
            'status'       => 'waiting',
            'status_label' => $isRtl ? 'في الانتظار' : 'Waiting Room',
            'badge_bg'     => 'bg-amber-50',
            'badge_text'   => 'text-amber-700',
            'badge_dot'    => 'bg-amber-500',
        ],
        [
            'id'           => 105,
            'mrn'          => 'MRN-92330',
            'patient'      => $isRtl ? 'مريم إبراهيم الغامدي' : 'Maryam Ibrahim Al-Ghamdi',
            'gender'       => $isRtl ? 'أنثى، 42 سنة' : 'Female, 42 yrs',
            'time'         => '01:00 PM',
            'complaint'    => $isRtl ? 'اضطراب نبضات القلب وقراءة جهاز Holter' : 'Arrhythmia review (Holter Monitor)',
            'type'         => $isRtl ? 'استشارة متقدمة' : 'Advanced Consult',
            'status'       => 'scheduled',
            'status_label' => $isRtl ? 'مجدول' : 'Scheduled',
            'badge_bg'     => 'bg-slate-50',
            'badge_text'   => 'text-slate-600',
            'badge_dot'    => 'bg-slate-300',
        ],
    ];

    // الخط الزمني لليوم
    $timeline = [
        [
            'time'    => '09:00 AM',
            'patient' => $isRtl ? 'سارة فهد العتيبي' : 'Sarah Fahad Al-Otaibi',
            'type'    => $isRtl ? 'استشارة مكتملة وتوثيق التقرير' : 'Consultation finished & note saved',
            'status'  => 'done',
        ],
        [
            'time'    => '09:45 AM',
            'patient' => $isRtl ? 'طارق عبدالعزيز الدوسري' : 'Tariq Abdulaziz Al-Dosari',
            'type'    => $isRtl ? 'الفحص السريري وتخطيط القلب ECG' : 'Clinical exam & 12-lead ECG',
            'status'  => 'current',
        ],
        [
            'time'    => '10:30 AM',
            'patient' => $isRtl ? 'نورة عبدالله الشهري' : 'Noura Abdullah Al-Shehri',
            'type'    => $isRtl ? 'المريض التالي - مراجعة التحاليل' : 'Next in Queue - Cardiac Lab Review',
            'status'  => 'next',
        ],
        [
            'time'    => '11:15 AM',
            'patient' => $isRtl ? 'سلطان محمد القحطاني' : 'Sultan Mohammed Al-Qahtani',
            'type'    => $isRtl ? 'مراجعة ما بعد القسطرة العلاجية' : 'Post-PCI surveillance & echo',
            'status'  => 'upcoming',
        ],
        [
            'time'    => '01:00 PM',
            'patient' => $isRtl ? 'مريم إبراهيم الغامدي' : 'Maryam Ibrahim Al-Ghamdi',
            'type'    => $isRtl ? 'تحليل نتائج جهاز مراقبة القلب Holter' : 'Holter Telemetry Analysis',
            'status'  => 'upcoming',
        ],
    ];
@endphp

@section('page-title', $isRtl ? 'لوحة تحكم الطبيب السريرية' : 'Doctor Clinical Dashboard')
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
         1. الشريط العلوي الموحد (نفس نمط واجهة لوحة تحكم المدير)
    ══════════════════════════════════════════════ --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] inline-block"></span>
                <h1 class="text-2xl font-black text-[#152C4B] tracking-tight">
                    {{ $isRtl ? 'لوحة تحكم الطبيب السريرية' : 'Doctor Clinical Dashboard' }}
                </h1>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100">
                    {{ $isRtl ? 'عيادة القلب 204' : 'Cardiology Suite 204' }}
                </span>
            </div>
            <p class="text-sm text-slate-500 mt-1">
                {{ $isRtl ? 'مرحباً د. ' . $cleanDoctorName . ' — متابعة طابور العيادة، الكشوفات، وملفات المرضى لليوم.' : 'Welcome back, Dr. ' . $cleanDoctorName . ' — Monitor clinic queue, consultations, and patient records.' }}
            </p>
        </div>

        <div class="flex items-center gap-2.5 flex-wrap">
            <button onclick="previewOfficialSickLeaveCertificate()"
                    class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-white border border-slate-200 text-xs font-bold text-[#152C4B] hover:bg-[#E5FAFC] hover:text-[#0C6B78] hover:border-[#14AFC3]/40 shadow-xs transition-all cursor-pointer">
                <svg class="w-4 h-4 text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 011.414.586l4.414 4.414a1 1 0 01.586 1.414V19a2 2 0 01-2 2z"/>
                </svg>
                <span>{{ $isRtl ? 'طباعة تقرير إجازة' : 'Export Sick Leave' }}</span>
            </button>

            <div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-white border border-slate-200 text-xs font-semibold text-slate-600 shadow-xs">
                <svg class="w-4 h-4 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ now()->locale($isRtl ? 'ar' : 'en')->isoFormat('dddd, D MMMM YYYY') }}</span>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         2. بطاقات الإحصائيات الأربع المتناسقة (نفس نمط واجهة المدير)
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
                {{ $isRtl ? 'مواعيد اليوم الكلية' : 'TODAY APPOINTMENTS' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-white my-2 tracking-tight font-mono">
                {{ $stats['today'] ?? 14 }}
            </div>
            <div class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-white/20 text-white backdrop-blur-xs">
                <span>{{ $isRtl ? 'جدول العيادة: سعة آمنة' : 'Clinic: Safe Capacity' }}</span>
            </div>
        </div>

        {{-- Card 2: Waiting Queue --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'في صالة الانتظار' : 'WAITING QUEUE' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $stats['waiting'] ?? 4 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'متوسط الانتظار: 14 دقيقة' : 'Avg. Wait: 14 min' }}</span>
            </div>
        </div>

        {{-- Card 3: Pending Notes --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" d="M14 3v4a1 1 0 0 0 1 1h4"/><path stroke-linecap="round" d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2Z"/><path stroke-linecap="round" d="M9 13h6M9 17h6"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'تقارير معلقة' : 'PENDING NOTES' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $stats['pending_notes'] ?? 3 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'تتطلب التوثيق والاعتماد' : 'Target: < 20 min' }}</span>
            </div>
        </div>

        {{-- Card 4: Completed Consultations --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'كشوفات مكتملة' : 'COMPLETED' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $stats['completed'] ?? 7 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'تم إنهاء الزيارة بنجاح' : 'Discharged successfully' }}</span>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════════
         3. التخطيط الرئيسي
    ══════════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ── COLUMN 1 (lg:col-span-2): الجلسة الحالية وجدول طابور كشوفات اليوم ── --}}
        <div class="lg:col-span-2 space-y-6 min-w-0">

            {{-- كارت الجلسة السريرية الجارية --}}
            <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3.5 min-w-0">
                    <div class="w-11 h-11 rounded-2xl bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 whitespace-nowrap">
                                {{ $isRtl ? 'الجلسة السريرية الجارية' : 'Current Patient Session' }}
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                                {{ $isRtl ? 'داخل غرفة الكشف' : 'Now in Exam Room' }}
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-[#152C4B] mt-0.5 truncate">
                            {{ $isRtl ? 'طارق عبدالعزيز الدوسري (48 سنة) — MRN-89104' : 'Tariq Abdulaziz Al-Dosari (48 yrs) — MRN-89104' }}
                        </h3>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-2 flex-shrink-0">
                    {{-- طلب تحاليل وأشعة --}}
                    <button onclick="openLabModal('MRN-89104', '{{ $isRtl ? 'طارق عبدالعزيز الدوسري' : 'Tariq Abdulaziz Al-Dosari' }}')"
                            class="px-3 py-2 rounded-xl border border-slate-200 text-slate-700 hover:bg-[#E5FAFC] hover:text-[#0C6B78] hover:border-[#14AFC3]/40 font-semibold text-xs transition-all flex items-center gap-1.5 whitespace-nowrap">
                        <svg class="w-4 h-4 text-[#0C6B78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                        <span>{{ $isRtl ? 'طلب تحاليل وأشعة' : 'Order Diagnostics' }}</span>
                    </button>

                    {{-- تدوين التقرير والملاحظة --}}
                    <button type="button"
                            onclick="openQuickNoteModal('MRN-89104', '{{ $isRtl ? 'طارق عبدالعزيز الدوسري' : 'Tariq Abdulaziz Al-Dosari' }}')"
                            class="px-3.5 py-2 rounded-xl bg-[#0C6B78] hover:bg-[#152C4B] text-white font-bold text-xs transition-all flex items-center gap-1.5 whitespace-nowrap shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>{{ $isRtl ? 'تدوين التقرير والملاحظة' : 'Sign Clinical Note' }}</span>
                    </button>

                    {{-- نداء التالي --}}
                    <button onclick="triggerCallNextModal()"
                            class="px-3.5 py-2 rounded-xl bg-[#152C4B] hover:bg-[#1E3A5F] text-white font-semibold text-xs transition-all flex items-center gap-1.5 whitespace-nowrap shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span>{{ $isRtl ? 'نداء التالي' : 'Call Next' }}</span>
                    </button>
                </div>
            </div>

            {{-- جدول طابور كشوفات اليوم والمواعيد --}}
            <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
                {{-- رأس بطاقة الطابور --}}
                <div class="p-4 sm:p-5 border-b border-slate-100 flex flex-col md:flex-row md:items-center md:justify-between gap-3.5">
                    <div class="flex items-center gap-3">
                        <div class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] animate-pulse flex-shrink-0"></div>
                        <div>
                            <div class="flex items-center gap-2.5 flex-wrap">
                                <h2 class="text-base sm:text-lg font-black text-[#152C4B] tracking-tight">
                                    {{ $isRtl ? 'طابور كشوفات اليوم والمواعيد' : 'Today\'s Clinical Queue' }}
                                </h2>
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100 flex-shrink-0">
                                    {{ count($schedule) }} {{ $isRtl ? 'حالات مجدولة' : 'scheduled' }}
                                </span>
                            </div>
                            <p class="text-xs text-slate-400 font-medium mt-0.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ now()->locale($isRtl ? 'ar' : 'en')->isoFormat('dddd، D MMMM YYYY') }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2.5 flex-wrap sm:flex-nowrap">
                        <div class="relative w-full sm:w-60">
                            <svg class="w-4 h-4 absolute {{ $isRtl ? 'right-3.5' : 'left-3.5' }} top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"
                                 fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="m21 21-4.35-4.35"/>
                            </svg>
                            <input type="text"
                                   id="patientSearchInput"
                                   onkeyup="filterPatientTable()"
                                   placeholder="{{ $isRtl ? 'بحث بالمريض أو السجل...' : 'Search patient or MRN...' }}"
                                   class="w-full {{ $isRtl ? 'pr-9 pl-4' : 'pl-9 pr-4' }} py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-[#152C4B] placeholder-slate-400 focus:bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all">
                        </div>

                        <a href="{{ route('doctor.schedule.index') }}"
                           class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-slate-50 hover:bg-[#E5FAFC] text-[#0C6B78] border border-slate-200 text-xs font-bold transition-all shadow-2xs whitespace-nowrap">
                            <span>{{ $isRtl ? 'عرض الجدول' : 'Full Schedule' }}</span>
                            <svg class="w-3.5 h-3.5 {{ $isRtl ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- جدول الحالات المتوازن والمنسق 1:1 --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-xs table-fixed min-w-[750px] border-collapse" id="patientsQueueTable">
                        <thead>
                            <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
                                <th class="w-[28%] px-5 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                                    {{ $isRtl ? 'المريض والسجل' : 'Patient & MRN' }}
                                </th>
                                <th class="w-[18%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                                    {{ $isRtl ? 'الوقت والنوع' : 'Time & Type' }}
                                </th>
                                <th class="w-[26%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                                    {{ $isRtl ? 'الشكوى السريرية' : 'Chief Complaint' }}
                                </th>
                                <th class="w-[14%] px-3 py-3.5 text-center whitespace-nowrap">
                                    {{ $isRtl ? 'الحالة' : 'Status' }}
                                </th>
                                <th class="w-[14%] px-4 py-3.5 text-center whitespace-nowrap">
                                    {{ $isRtl ? 'الإجراءات' : 'Actions' }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
                            @forelse($schedule as $row)
                                <tr class="hover:bg-[#E5FAFC]/30 transition-colors patient-row group" data-patient="{{ strtolower($row['patient'] . ' ' . $row['mrn']) }}">
                                    {{-- 1. المريض والسجل الطبي --}}
                                    <td class="px-5 py-3.5 whitespace-nowrap">
                                        <div class="flex items-center gap-3 min-w-0">
                                            <div class="w-9 h-9 rounded-xl bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/20 flex items-center justify-center font-black text-xs flex-shrink-0 group-hover:scale-105 transition-transform shadow-2xs">
                                                {{ mb_substr($row['patient'], 0, 1, 'UTF-8') }}
                                            </div>
                                            <div class="min-w-0">
                                                <div class="font-bold text-xs sm:text-sm text-[#152C4B] group-hover:text-[#0C6B78] transition-colors truncate">
                                                    {{ $row['patient'] }}
                                                </div>
                                                <div class="text-[11px] text-slate-400 font-mono font-medium mt-0.5">
                                                    <bdi dir="ltr">{{ $row['mrn'] }}</bdi>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- 2. الوقت ونوع الكشف --}}
                                    <td class="px-4 py-3.5 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-1.5 font-mono font-bold text-xs text-[#152C4B]">
                                            <svg class="w-3.5 h-3.5 text-[#14AFC3] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/>
                                            </svg>
                                            <span>{{ $row['time'] }}</span>
                                        </div>
                                        <div class="mt-1">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200/80">
                                                {{ $row['type'] }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- 3. الشكوى السريرية والتشخيص --}}
                                    <td class="px-4 py-3.5">
                                        <div class="flex items-start gap-1.5">
                                            <svg class="w-3.5 h-3.5 text-[#14AFC3] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 011.414.586l4.414 4.414a1 1 0 01.586 1.414V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <p class="text-xs font-medium text-slate-700 line-clamp-2 leading-relaxed" title="{{ $row['complaint'] }}">
                                                {{ $row['complaint'] }}
                                            </p>
                                        </div>
                                    </td>

                                    {{-- 4. حالة الموعد مباشرة تحت العمود --}}
                                    <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                        <div class="flex justify-center">
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold shadow-2xs border {{ $row['status'] === 'in_consultation' ? 'bg-[#E5FAFC] text-[#0C6B78] border-[#14AFC3]/30' : ($row['status'] === 'waiting' ? 'bg-amber-50 text-amber-700 border-amber-200' : 'bg-slate-100 text-slate-700 border-slate-200') }}">
                                                <span class="w-1.5 h-1.5 rounded-full {{ $row['status'] === 'in_consultation' ? 'bg-[#14AFC3] animate-ping' : ($row['status'] === 'waiting' ? 'bg-amber-500 animate-pulse' : 'bg-slate-400') }}"></span>
                                                {{ $row['status_label'] }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- 5. الإجراءات مباشرة تحت العمود --}}
                                    <td class="px-4 py-3.5 text-center whitespace-nowrap actions-cell">
                                        <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                                            @if($row['status'] === 'waiting')
                                                <button type="button" onclick="callSpecificPatient('{{ $row['mrn'] }}', '{{ $row['patient'] }}')" title="{{ $isRtl ? 'نداء المريض لغرفة الكشف' : 'Call into exam room' }}" class="h-8 px-2.5 rounded-xl bg-[#0C6B78] hover:bg-[#152C4B] text-white text-xs font-bold transition-all shadow-xs flex items-center justify-center gap-1 cursor-pointer">
                                                    <svg class="w-3.5 h-3.5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                                    </svg>
                                                    <span>{{ $isRtl ? 'نداء' : 'Call' }}</span>
                                                </button>
                                            @endif

                                            <button type="button" onclick="openQuickNoteModal('{{ $row['mrn'] }}', '{{ $row['patient'] }}')" title="{{ $isRtl ? 'تدوين تقرير / ملاحظة' : 'Add Clinical Note' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#0C6B78] dark:text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all shadow-2xs flex items-center justify-center cursor-pointer">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </button>

                                            <a href="{{ route('doctor.patients.index') }}?search={{ $row['mrn'] }}" title="{{ $isRtl ? 'عرض ملف المريض' : 'View Patient EHR' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-slate-500 hover:text-[#0C6B78] hover:bg-slate-100 transition-all shadow-2xs flex items-center justify-center">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center text-slate-300 mb-2.5">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                    <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M8 12h8"/>
                                                </svg>
                                            </div>
                                            <span class="text-xs font-bold text-slate-500">{{ $isRtl ? 'لا توجد مواعيد مسجلة في هذا الطابور حالياً' : 'No scheduled patients found.' }}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- تذييل البطاقة التفاعلي --}}
                <div class="flex items-center justify-between px-6 py-3.5 bg-slate-50/80 border-t border-slate-100 text-xs text-slate-500">
                    <span class="font-medium">{{ $isRtl ? 'عرض ' . count($schedule) . ' مواعيد مجدولة لليوم' : 'Showing ' . count($schedule) . ' appointments' }}</span>
                    <span class="flex items-center gap-1.5 font-medium text-[#0C6B78]">
                        <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                        {{ $isRtl ? 'محدّث تلقائياً مع شاشات صالة الانتظار والاستقبال' : 'Live triage sync with reception' }}
                    </span>
                </div>
            </div>
        </div>

        {{-- ── COLUMN 2: الأدوات السريرية والخط الزمني ── --}}
        <div class="space-y-6">

            {{-- 1. أدوات الممارسة السريرية --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="font-bold text-sm text-[#152C4B] uppercase tracking-wider">
                            {{ $isRtl ? 'أدوات الممارسة السريرية' : 'Clinical & Operational Tools' }}
                        </h3>
                        <p class="text-xs text-slate-400 mt-0.5">
                            {{ $isRtl ? 'إجراءات ومحفزات سريعة للعيادة' : 'Instant clinical protocols' }}
                        </p>
                    </div>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                        {{ $isRtl ? 'نشط' : 'Live' }}
                    </span>
                </div>

                <div class="space-y-3">
                    {{-- Row 1: Sick Leave --}}
                    <button onclick="openSickLeaveModal()"
                            class="w-full flex items-center justify-between p-3.5 rounded-2xl border border-slate-100 hover:border-[#14AFC3]/40 bg-white hover:bg-slate-50 transition-all group cursor-pointer">
                        <div class="flex items-center gap-3.5 min-w-0 text-start">
                            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 011.414.586l4.414 4.414a1 1 0 01.586 1.414V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="min-w-0 text-start">
                                <h4 class="text-sm font-bold text-[#152C4B] group-hover:text-[#0C6B78] transition-colors truncate">
                                    {{ $isRtl ? 'إصدار إجازة مرضية معتمدة' : 'Certified Sick Leave' }}
                                </h4>
                                <p class="text-xs text-slate-400 truncate mt-0.5">{{ $isRtl ? 'ربط واعتماد رسمي مع وزارة الصحة' : 'MOH certified report form' }}</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-slate-300 group-hover:text-[#0C6B78] group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-all flex-shrink-0 {{ $isRtl ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    {{-- Row 2: Urgent Walk-in --}}
                    <button onclick="openWalkInModal()"
                            class="w-full flex items-center justify-between p-3.5 rounded-2xl border border-slate-100 hover:border-[#14AFC3]/40 bg-white hover:bg-slate-50 transition-all group cursor-pointer">
                        <div class="flex items-center gap-3.5 min-w-0 text-start">
                            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                            </div>
                            <div class="min-w-0 text-start">
                                <h4 class="text-sm font-bold text-[#152C4B] group-hover:text-[#0C6B78] transition-colors truncate">
                                    {{ $isRtl ? 'إضافة كشف طارئ إلى الطابور' : 'Add Urgent Walk-in' }}
                                </h4>
                                <p class="text-xs text-slate-400 truncate mt-0.5">{{ $isRtl ? 'إدراج فوري برأس قائمة الانتظار' : 'Fast-track to queue head' }}</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-slate-300 group-hover:text-[#0C6B78] group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-all flex-shrink-0 {{ $isRtl ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    {{-- Row 3: Calculator --}}
                    <button onclick="openCalculatorModal()"
                            class="w-full flex items-center justify-between p-3.5 rounded-2xl border border-slate-100 hover:border-[#14AFC3]/40 bg-white hover:bg-slate-50 transition-all group cursor-pointer">
                        <div class="flex items-center gap-3.5 min-w-0 text-start">
                            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect x="4" y="2" width="16" height="20" rx="2"/><line x1="8" y1="6" x2="16" y2="6"/>
                                </svg>
                            </div>
                            <div class="min-w-0 text-start">
                                <h4 class="text-sm font-bold text-[#152C4B] group-hover:text-[#0C6B78] transition-colors truncate">
                                    {{ $isRtl ? 'حاسبة وظائف الكلى (eGFR)' : 'eGFR Renal Calculator' }}
                                </h4>
                                <p class="text-xs text-slate-400 truncate mt-0.5">{{ $isRtl ? 'احتساب دقيق لجرعات الأدوية' : 'Glomerular filtration rate' }}</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-slate-300 group-hover:text-[#0C6B78] group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-all flex-shrink-0 {{ $isRtl ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    {{-- Row 4: Clinic Break --}}
                    <button onclick="toggleClinicBreak()" id="clinicBreakBtn"
                            class="w-full flex items-center justify-between p-3.5 rounded-2xl border border-slate-100 hover:border-[#14AFC3]/40 bg-white hover:bg-slate-50 transition-all group cursor-pointer">
                        <div class="flex items-center gap-3.5 min-w-0 text-start">
                            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/><line x1="10" y1="15" x2="10" y2="9"/><line x1="14" y1="15" x2="14" y2="9"/>
                                </svg>
                            </div>
                            <div class="min-w-0 text-start">
                                <h4 id="clinicBreakTitle" class="text-sm font-bold text-[#152C4B] group-hover:text-[#0C6B78] transition-colors truncate">
                                    {{ $isRtl ? 'إيقاف مؤقت للعيادة (استراحة)' : 'Pause Clinic Queue' }}
                                </h4>
                                <p class="text-xs text-slate-400 truncate mt-0.5">{{ $isRtl ? 'تعليق شاشات صالة الانتظار' : 'Temporarily hold waiting room' }}</p>
                            </div>
                        </div>
                        <span id="clinicBreakBadge" class="text-xs font-bold px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 flex-shrink-0">
                            {{ $isRtl ? 'نشط' : 'Active' }}
                        </span>
                    </button>
                </div>
            </div>

            {{-- 2. الخط الزمني لكشوفات اليوم --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-sm text-[#152C4B] uppercase tracking-wider">
                        {{ $isRtl ? 'الخط الزمني لكشوفات اليوم' : 'Daily Clinic Timeline' }}
                    </h3>
                    <span class="text-xs font-bold text-[#0C6B78] bg-[#E5FAFC] px-2.5 py-0.5 rounded-full">
                        {{ now()->locale($isRtl ? 'ar' : 'en')->isoFormat('D MMM') }}
                    </span>
                </div>

                <div class="space-y-2">
                    @foreach($timeline as $event)
                        <div class="flex items-center justify-between gap-3 text-xs py-2 px-3 rounded-xl hover:bg-slate-50 transition-colors">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <span class="w-2 h-2 rounded-full flex-shrink-0 {{ $event['status'] === 'current' ? 'bg-[#14AFC3] animate-ping' : ($event['status'] === 'done' ? 'bg-slate-400' : 'bg-slate-300') }}"></span>
                                <span class="font-bold text-[#152C4B] truncate">{{ $event['patient'] }}</span>
                            </div>
                            <span class="text-[11px] text-slate-400 font-mono flex-shrink-0">{{ $event['time'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

</div>

{{-- ══════════════════════════════════════════════
     MODAL 0: كارت تدوين التقرير والملاحظة السريرية
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
                        <div class="font-bold text-slate-800 text-xs" id="noteDisplayPatient">طارق عبدالعزيز الدوسري</div>
                        <div class="text-[11px] text-slate-400 font-mono" id="noteDisplayMrn">MRN-89104 · عيادة القلب 204</div>
                    </div>
                </div>
                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                    {{ $isRtl ? 'كشف سريري جارٍ' : 'Active Consult' }}
                </span>
                <input type="hidden" id="modalNotePatient" value="طارق عبدالعزيز الدوسري">
                <input type="hidden" id="modalNoteMrn" value="MRN-89104">
            </div>

            {{-- Clinical Diagnosis with Quick Tags --}}
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
     MODAL 3: CERTIFIED SICK LEAVE (كارت إدخال بيانات الإجازة - مصمم بدقة ووضوح عالي)
══════════════════════════════════════════════ --}}
<div id="sickLeaveModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/60 backdrop-blur-md hidden p-4 anim-overlay">
    <div class="bg-white rounded-3xl w-full max-w-xl shadow-2xl border border-slate-100 overflow-hidden anim-modal-pop">
        
        {{-- Header: تدرج كحلي مريح مع أيقونة واضحة وشارة بارزة --}}
        <div class="px-7 py-5 bg-[#152C4B] text-white flex items-center justify-between relative overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-white/5 pointer-events-none"></div>
            <div class="flex items-center gap-3.5 relative z-10">
                <div class="w-11 h-11 rounded-2xl bg-[#0C6B78] text-[#14AFC3] flex items-center justify-center flex-shrink-0 shadow-inner">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 011.414.586l4.414 4.414a1 1 0 01.586 1.414V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-2.5">
                        <h3 class="text-base font-black tracking-tight text-white">{{ $isRtl ? 'إصدار إجازة مرضية معتمدة' : 'Certified Sick Leave Certificate' }}</h3>
                        <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-extrabold bg-[#0C6B78] text-teal-100 border border-teal-500/30">
                            {{ $isRtl ? 'مستشفى الرشيد' : 'Al-Rasheed' }}
                        </span>
                    </div>
                    <p class="text-xs text-slate-300 mt-0.5">{{ $isRtl ? 'تقرير طبي نظامي معتمد للجهات الرسمية وأرباب العمل' : 'Official medical leave accredited for employers & authorities' }}</p>
                </div>
            </div>
            <button onclick="closeSickLeaveModal()" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-all cursor-pointer relative z-10 text-sm">✕</button>
        </div>

        {{-- Form --}}
        <form onsubmit="submitSickLeave(event)" class="p-7 space-y-5 text-xs bg-slate-50/40">
            {{-- Patient Select Card --}}
            <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-2xs">
                <label class="block font-bold text-slate-700 mb-2 flex items-center justify-between">
                    <span class="flex items-center gap-1.5 text-xs">
                        <span class="w-2 h-2 rounded-full bg-[#14AFC3]"></span>
                        <span>{{ $isRtl ? 'المريض المستفيد' : 'Beneficiary Patient' }}</span>
                    </span>
                    <span class="text-[10px] text-slate-400 font-normal">{{ $isRtl ? 'اختر مريضاً من الطابور الحالي' : 'Select from today’s queue' }}</span>
                </label>
                <div class="relative">
                    <select id="slPatientSelect" onchange="updateSickLeavePatientDetails()" 
                            class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl font-bold text-[#152C4B] text-xs outline-none focus:border-[#14AFC3] focus:bg-white focus:ring-2 focus:ring-[#14AFC3]/20 transition-all appearance-none cursor-pointer">
                        <option value="MRN-89104" data-name="طارق عبدالعزيز الدوسري" data-id="1092837482" data-emp="وزارة التربية والتعليم" data-diag="ألم صدري غير نمطي وإجهاد قلبي حاد يتطلب راحة سريرية">
                            {{ $isRtl ? 'طارق عبدالعزيز الدوسري — MRN-89104 (ذكر، 48 سنة)' : 'Tariq Abdulaziz Al-Dosari — MRN-89104 (Male, 48 yrs)' }}
                        </option>
                        <option value="MRN-88421" data-name="سارة فهد العتيبي" data-id="1084291847" data-emp="الخطوط الجوية" data-diag="ارتفاع ضغط دم غير مستقر مع إجهاد بدني">
                            {{ $isRtl ? 'سارة فهد العتيبي — MRN-88421 (أنثى، 34 سنة)' : 'Sarah Fahad Al-Otaibi — MRN-88421 (Female, 34 yrs)' }}
                        </option>
                        <option value="MRN-90218" data-name="نورة عبدالله الشهري" data-id="1074829103" data-emp="مؤسسة الاتصالات" data-diag="خفقان قلبي حاد وفحوصات إنزيمات القلب">
                            {{ $isRtl ? 'نورة عبدالله الشهري — MRN-90218 (أنثى، 29 سنة)' : 'Noura Abdullah Al-Shehri — MRN-90218 (Female, 29 yrs)' }}
                        </option>
                    </select>
                    <div class="absolute {{ $isRtl ? 'left-3' : 'right-3' }} top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>
            </div>

            {{-- Employer & Diagnosis Card --}}
            <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-2xs space-y-3.5">
                <div>
                    <label class="block font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0C6B78]"></span>
                        <span>{{ $isRtl ? 'جهة العمل / صاحب العمل' : 'Employer / Organization' }}</span>
                    </label>
                    <input type="text" id="slEmployerInput" value="وزارة التربية والتعليم"
                           class="w-full px-3.5 py-2.5 bg-slate-50/60 border border-slate-200 rounded-xl outline-none focus:border-[#14AFC3] focus:bg-white focus:ring-2 focus:ring-[#14AFC3]/20 text-xs font-semibold text-[#152C4B] transition-all">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0C6B78]"></span>
                        <span>{{ $isRtl ? 'التشخيص الطبي ومبرر الإجازة' : 'Medical Diagnosis & Justification' }}</span>
                    </label>
                    <input type="text" id="slDiagnosisInput" value="ألم صدري غير نمطي وإجهاد قلبي حاد يتطلب راحة سريرية"
                           class="w-full px-3.5 py-2.5 bg-slate-50/60 border border-slate-200 rounded-xl outline-none focus:border-[#14AFC3] focus:bg-white focus:ring-2 focus:ring-[#14AFC3]/20 text-xs font-semibold text-[#152C4B] transition-all">
                </div>
            </div>

            {{-- Duration & Dates Card --}}
            <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-2xs space-y-3.5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <div>
                        <label class="block font-bold text-slate-700 mb-1.5">{{ $isRtl ? 'مدة الإجازة المعتمدة' : 'Duration Granted' }}</label>
                        <select id="slDurationSelect" onchange="calculateSickLeaveDates()" 
                                class="w-full px-3.5 py-2.5 bg-slate-50/60 border border-slate-200 rounded-xl outline-none focus:border-[#14AFC3] focus:bg-white font-semibold text-[#152C4B] transition-all">
                            <option value="1">{{ $isRtl ? 'يوم واحد (1 Day)' : '1 Day' }}</option>
                            <option value="2">{{ $isRtl ? 'يومان (2 Days)' : '2 Days' }}</option>
                            <option value="3" selected>{{ $isRtl ? '3 أيام (3 Days)' : '3 Days' }}</option>
                            <option value="5">{{ $isRtl ? '5 أيام (5 Days)' : '5 Days' }}</option>
                            <option value="7">{{ $isRtl ? 'أسبوع كامل (7 Days)' : '7 Days (1 Week)' }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 mb-1.5">{{ $isRtl ? 'تاريخ بداية الإجازة' : 'Start Date' }}</label>
                        <input type="date" id="slStartDateInput" value="{{ date('Y-m-d') }}" onchange="calculateSickLeaveDates()"
                               class="w-full px-3.5 py-2.5 bg-slate-50/60 border border-slate-200 rounded-xl outline-none focus:border-[#14AFC3] focus:bg-white font-semibold text-[#152C4B] transition-all">
                    </div>
                </div>

                {{-- Calculated Return to Work Strip --}}
                <div class="p-3 rounded-xl bg-[#E5FAFC]/80 border border-teal-200 flex items-center justify-between text-xs">
                    <div class="flex items-center gap-2 text-[#0C6B78] font-bold">
                        <svg class="w-4 h-4 text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ $isRtl ? 'تاريخ العودة للعمل:' : 'Return to Work Date:' }}</span>
                    </div>
                    <span class="font-mono font-black text-[#152C4B] bg-white px-3 py-1 rounded-lg border border-teal-200 shadow-2xs text-xs" id="slReturnDateDisplay">
                        {{ date('Y-m-d', strtotime('+3 days')) }}
                    </span>
                </div>
            </div>

            {{-- Modal Buttons: أزرار مرتبة بوضوح وبدون تداخل --}}
            <div class="pt-3 border-t border-slate-200/80 flex flex-col sm:flex-row items-center justify-between gap-3">
                <button type="button" 
                        onclick="previewOfficialSickLeaveCertificate()"
                        class="w-full sm:w-auto px-4 py-2.5 rounded-xl border border-teal-500 bg-[#E5FAFC] hover:bg-[#d6f6fa] text-[#0C6B78] font-extrabold text-xs flex items-center justify-center gap-2 transition-all cursor-pointer shadow-2xs">
                    <svg class="w-4 h-4 text-[#0C6B78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    <span>{{ $isRtl ? 'معاينة وطباعة التقرير (فورم رسمي)' : 'Print Official Certificate Form' }}</span>
                </button>

                <div class="w-full sm:w-auto flex items-center justify-end gap-2.5">
                    <button type="button" onclick="closeSickLeaveModal()" class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 font-bold transition-colors cursor-pointer text-xs">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#0C6B78] hover:bg-[#152C4B] text-white font-extrabold transition-all shadow-md flex items-center justify-center gap-2 cursor-pointer text-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ $isRtl ? 'اعتماد وإصدار الإجازة' : 'Authorize & Issue' }}</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- ══════════════════════════════════════════════
     MODAL 3-B: OFFICIAL PRINTABLE SICK LEAVE CERTIFICATE
     (الفورم الطبي الرسمي المعتمد ذو الطابع القوي والمهيب - مستشفى الرشيد - صنعاء)
══════════════════════════════════════════════ --}}
<div id="sickLeaveCertificateModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-md hidden p-4 anim-overlay overflow-y-auto">
    <div class="bg-white rounded-3xl w-full max-w-4xl shadow-2xl border border-slate-300 overflow-hidden anim-modal-pop my-6">
        
        {{-- Preview Header Action Bar (غير ظاهر بالطباعة) --}}
        <div class="no-print px-7 py-4 bg-[#152C4B] text-white flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                <span class="text-xs font-bold">{{ $isRtl ? 'معاينة وثيقة الإجازة المرضية الرسمية — مستشفى الرشيد التخصصي' : 'Official Sick Leave Medical Certificate Preview — Al-Rasheed Hospital' }}</span>
            </div>
            <div class="flex items-center gap-2">
                <button type="button" onclick="triggerOfficialSickLeavePrint()"
                        class="px-5 py-2 rounded-xl bg-[#0C6B78] hover:bg-[#108D9D] text-white font-black text-xs flex items-center gap-2 transition-all shadow-sm cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    <span>{{ $isRtl ? 'طباعة الوثيقة الآن (Print)' : 'Print Document' }}</span>
                </button>
                <button type="button" onclick="closeOfficialSickLeaveCertificate()" class="px-3.5 py-2 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs transition-colors cursor-pointer">
                    {{ $isRtl ? 'إغلاق' : 'Close' }}
                </button>
            </div>
        </div>

        {{-- 📄 ACTUAL OFFICIAL PRINT FORM (وثيقة رسمية ببرواز مهيب وهوية موحدة) --}}
        <div id="sickLeaveCertificatePrintArea" class="p-8 sm:p-12 bg-white text-slate-800 space-y-6 relative">
            
            {{-- الإطار الرسمي المحيط بالوثيقة --}}
            <div class="border-2 border-[#152C4B] p-6 sm:p-8 rounded-2xl space-y-6 relative bg-white">
                
                {{-- الشعار المائي الخفيف بالخلفية --}}
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-[0.03]">
                    <div class="w-96 h-96 rounded-full border-16 border-[#152C4B] flex items-center justify-center">
                        <span class="text-7xl font-black text-[#152C4B]">AL-RASHEED</span>
                    </div>
                </div>

                {{-- Official Bilingual Header (ترويسة فخمة ورسمية) --}}
                <div class="flex items-center justify-between pb-6 border-b-2 border-[#152C4B] relative z-10">
                    {{-- الجانب الأيمن: الجهة الرسمية باللغة العربية --}}
                    <div class="text-start leading-relaxed">
                        <div class="font-extrabold text-sm text-[#152C4B]">الجمهورية اليمنية</div>
                        <div class="font-bold text-xs text-slate-700">وزارة الصحة العامة والسكان</div>
                        <div class="text-xs text-slate-600">مكتب الصحة بأمانة العاصمة - صنعاء</div>
                        <div class="font-black text-base text-[#0C6B78] mt-1 tracking-tight">مستشفى الرشيد التخصصي</div>
                        <div class="text-[10px] text-slate-500 font-medium">إدارة الشؤون الطبية والسريرية</div>
                    </div>

                    {{-- المنتصف: شعار المستشفى الموحد وعنوان الوثيقة --}}
                    <div class="text-center px-4">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-[#0C6B78] flex items-center justify-center text-white shadow-md mb-2">
                            <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 011.414.586l4.414 4.414a1 1 0 01.586 1.414V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-black text-[#152C4B] tracking-tight">تقرير إجازة مرضية معتمدة</h2>
                        <p class="text-xs font-bold text-[#0C6B78] uppercase tracking-wider font-mono">OFFICIAL MEDICAL SICK LEAVE REPORT</p>
                    </div>

                    {{-- الجانب الأيسر: بيانات الوثيقة والجهة بالإنجليزية --}}
                    <div class="text-end leading-relaxed">
                        <div class="font-mono text-xs font-bold text-[#152C4B]">REF: <span id="certRefNumber" class="font-extrabold text-[#0C6B78]">SL-2026-89104-YE</span></div>
                        <div class="text-[11px] text-slate-500 mt-0.5">التاريخ: <span class="font-mono font-bold text-slate-800">{{ date('Y/m/d') }}</span></div>
                        <div class="text-[11px] font-bold text-slate-600 mt-1">Republic of Yemen - MOH</div>
                        <div class="text-[11px] font-semibold text-[#0C6B78]">Al-Rasheed Hospital</div>
                        <div class="inline-block mt-2 px-3 py-1 rounded-full text-[10px] font-extrabold bg-[#E5FAFC] text-[#0C6B78] border border-teal-300">
                            معتمد رسمياً · VERIFIED
                        </div>
                    </div>
                </div>

                {{-- 1. جدول بيانات المريض (تصميم شبكي رسمي قوي) --}}
                <div class="rounded-xl border border-slate-300 overflow-hidden relative z-10">
                    <div class="bg-[#152C4B] text-white px-4 py-2 flex items-center justify-between text-xs font-extrabold uppercase tracking-wider">
                        <span>بيانات المريض الأساسية (PATIENT DEMOGRAPHICS)</span>
                        <span class="text-[11px] font-mono text-teal-200">MRN RECORD</span>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-4 divide-x divide-y sm:divide-y-0 divide-slate-200 bg-white text-xs {{ $isRtl ? 'divide-x-reverse' : '' }}">
                        <div class="p-3.5">
                            <span class="text-slate-400 block text-[11px] font-bold">اسم المريض (Full Name)</span>
                            <span class="font-extrabold text-slate-900 text-xs mt-1 block" id="certPatientName">طارق عبدالعزيز الدوسري</span>
                        </div>
                        <div class="p-3.5">
                            <span class="text-slate-400 block text-[11px] font-bold">رقم السجل الطبي (MRN)</span>
                            <span class="font-mono font-black text-[#0C6B78] text-xs mt-1 block" id="certPatientMrn">MRN-89104</span>
                        </div>
                        <div class="p-3.5">
                            <span class="text-slate-400 block text-[11px] font-bold">رقم الهوية / الإقامة (ID)</span>
                            <span class="font-mono font-bold text-slate-800 text-xs mt-1 block" id="certPatientId">1092837482</span>
                        </div>
                        <div class="p-3.5">
                            <span class="text-slate-400 block text-[11px] font-bold">جهة العمل (Employer)</span>
                            <span class="font-bold text-slate-800 text-xs mt-1 block truncate" id="certPatientEmployer">وزارة التربية والتعليم</span>
                        </div>
                    </div>
                </div>

                {{-- 2. التقييم السريري والتشخيص الطبي المعتمد --}}
                <div class="rounded-xl border border-slate-300 overflow-hidden relative z-10">
                    <div class="bg-[#152C4B] text-white px-4 py-2 flex items-center justify-between text-xs font-extrabold uppercase tracking-wider">
                        <span>التقييم السريري والتشخيص الطبي (CLINICAL ASSESSMENT)</span>
                        <span class="text-[11px] font-mono text-teal-200">CARDIOLOGY SUITE</span>
                    </div>
                    <div class="p-4 bg-white space-y-3 text-xs">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pb-3 border-b border-slate-200">
                            <div>
                                <span class="text-slate-400 block text-[11px] font-bold">الطبيب المعالج (Attending Physician):</span>
                                <span class="font-black text-slate-900 mt-1 block text-xs">د. {{ $cleanDoctorName }} (Dr. {{ $cleanDoctorName }})</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px] font-bold">القسم والعيادة (Department & Suite):</span>
                                <span class="font-bold text-slate-900 mt-1 block text-xs">عيادة أمراض القلب والأوعية الدموية · جناح 204</span>
                            </div>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-[11px] font-bold">التشخيص الطبي والتوصية السريرية (Clinical Diagnosis & Recommendation):</span>
                            <span class="font-extrabold text-[#152C4B] mt-1 block text-xs leading-relaxed" id="certDiagnosis">
                                ألم صدري غير نمطي وإجهاد قلبي حاد يتطلب راحة سريرية تامة وعدم مزاولة أي أعمال أو أنشطة بدنية خلال فترة الإجازة.
                            </span>
                        </div>
                    </div>
                </div>

                {{-- 3. مدة الإجازة المرضية وتواريخ الاستحقاق --}}
                <div class="rounded-xl border border-teal-300 overflow-hidden relative z-10 bg-[#E5FAFC]/40">
                    <div class="bg-[#0C6B78] text-white px-4 py-2 flex items-center justify-between text-xs font-extrabold uppercase tracking-wider">
                        <span>مدة الإجازة المرضية وتواريخ الاستحقاق (LEAVE PERIOD & SCHEDULE)</span>
                        <span class="text-[11px] font-mono text-teal-100">CERTIFIED PERIOD</span>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 p-4">
                        <div class="text-center p-3 rounded-xl bg-white border border-teal-200 shadow-2xs">
                            <span class="text-slate-500 block text-[11px] font-bold">المدة الممنوحة</span>
                            <span class="text-lg font-black text-[#0C6B78] mt-0.5 block" id="certDurationDisplay">3 أيام</span>
                        </div>
                        <div class="text-center p-3 rounded-xl bg-white border border-teal-200 shadow-2xs">
                            <span class="text-slate-500 block text-[11px] font-bold">تاريخ البداية (من)</span>
                            <span class="font-mono font-bold text-slate-800 text-xs mt-1 block" id="certStartDateDisplay">{{ date('Y/m/d') }}</span>
                        </div>
                        <div class="text-center p-3 rounded-xl bg-white border border-teal-200 shadow-2xs">
                            <span class="text-slate-500 block text-[11px] font-bold">تاريخ الانتهاء (إلى)</span>
                            <span class="font-mono font-bold text-slate-800 text-xs mt-1 block" id="certEndDateDisplay">{{ date('Y/m/d', strtotime('+2 days')) }}</span>
                        </div>
                        <div class="text-center p-3 rounded-xl bg-white border-2 border-emerald-400 shadow-2xs">
                            <span class="text-emerald-700 block text-[11px] font-black">تاريخ استئناف العمل</span>
                            <span class="font-mono font-black text-emerald-800 text-xs mt-1 block" id="certReturnDateDisplay">{{ date('Y/m/d', strtotime('+3 days')) }}</span>
                        </div>
                    </div>
                </div>

                {{-- 4. الأختام والاعتمادات الرسمية الثلاثية --}}
                <div class="pt-6 border-t-2 border-slate-300 flex items-center justify-between text-xs relative z-10">
                    {{-- توقيع الطبيب المعالج --}}
                    <div class="text-center w-52">
                        <div class="text-[11px] font-black text-slate-700 mb-2">توقيع واعتماد الطبيب المعالج</div>
                        <div class="font-serif italic text-lg font-extrabold text-[#0C6B78] border-b-2 border-dashed border-slate-400 pb-1 mb-1.5">
                            Dr. {{ $cleanDoctorName }}
                        </div>
                        <div class="text-[10px] text-slate-500 font-mono font-bold">Consultant Cardiologist · MOH Certified</div>
                    </div>

                    {{-- الختم الرسمي لمستشفى الرشيد --}}
                    <div class="text-center">
                        <div class="w-28 h-28 rounded-full border-2 border-dashed border-[#0C6B78] p-1 flex items-center justify-center text-center mx-auto shadow-xs bg-teal-50/20">
                            <div class="w-full h-full rounded-full border-2 border-[#0C6B78] flex flex-col items-center justify-center text-[8.5px] font-extrabold text-[#0C6B78] leading-tight">
                                <span class="font-black text-[9.5px]">مستشفى الرشيد</span>
                                <span class="text-[7px] font-mono tracking-wider">AL-RASHEED HOSP</span>
                                <span class="text-[9px] font-black text-emerald-700 my-0.5 px-1 py-0.2 rounded bg-emerald-100/60">صنعاء · معتمد</span>
                                <span class="text-[7.5px] font-mono">OFFICIAL SEAL</span>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-500 mt-1 block">ختم المستشفى الرسمي</span>
                    </div>

                    {{-- اعتماد الإدارة الطبية --}}
                    <div class="text-center w-52">
                        <div class="text-[11px] font-black text-slate-700 mb-2">اعتماد إدارة الشؤون الطبية</div>
                        <div class="font-serif italic text-lg font-extrabold text-[#152C4B] border-b-2 border-dashed border-slate-400 pb-1 mb-1.5">
                            Medical Affairs Directorate
                        </div>
                        <div class="text-[10px] text-slate-500 font-mono font-bold">Al-Rasheed Specialized Hospital</div>
                    </div>
                </div>

                {{-- التذييل الأمني الرسمي --}}
                <div class="pt-4 border-t border-slate-200 text-center text-[10px] text-slate-500 space-y-0.5 relative z-10">
                    <p class="font-semibold">هذا التقرير صادر إلكترونياً ومعتمد رسمياً من مستشفى الرشيد التخصصي - صنعاء ومطابق للوائح وقوانين وزارة الصحة العامة والسكان.</p>
                    <p class="font-mono text-[9px] text-slate-400">Document Security Code: YE-SAN-{{ substr(md5(now()), 0, 12) }} · Mawidi Hospital OS v2.0</p>
                </div>

            </div>

        </div>

    </div>
</div>

{{-- ══════════════════════════════════════════════
     MODAL 1: ORDER DIAGNOSTIC LAB / RADIOLOGY
══════════════════════════════════════════════ --}}
<div id="labModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/40 backdrop-blur-xs hidden p-4 anim-overlay">
    <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-2xl border border-slate-100 text-xs anim-modal-pop">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <h3 class="font-bold text-sm text-[#152C4B]">{{ $isRtl ? 'طلب فحوصات مخبرية وتصوير' : 'Clinical Diagnostic Order' }}</h3>
            <button onclick="closeLabModal()" class="text-slate-400 hover:text-slate-600 cursor-pointer">✕</button>
        </div>

        <form onsubmit="submitLabOrder(event)" class="space-y-3.5 pt-3">
            <div>
                <label class="block font-semibold text-slate-700 mb-1">{{ $isRtl ? 'المريض المستهدف' : 'Patient' }}</label>
                <input type="text" id="labModalPatientName" readonly class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl font-bold text-[#152C4B]">
            </div>

            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">{{ $isRtl ? 'درجة الأولوية' : 'Priority' }}</label>
                    <select class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl outline-none focus:border-[#14AFC3]">
                        <option value="routine">{{ $isRtl ? 'عادي (Routine)' : 'Routine' }}</option>
                        <option value="urgent" selected>{{ $isRtl ? 'عاجل (Urgent)' : 'Urgent' }}</option>
                    </select>
                </div>
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">{{ $isRtl ? 'القسم الوجهة' : 'Department' }}</label>
                    <select class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl outline-none focus:border-[#14AFC3]">
                        <option value="lab">{{ $isRtl ? 'المختبر السريري' : 'Laboratory' }}</option>
                        <option value="radiology">{{ $isRtl ? 'الأشعة والتصوير' : 'Radiology' }}</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeLabModal()" class="px-3.5 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition-colors cursor-pointer">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="submit" class="px-4 py-2 rounded-xl bg-[#0C6B78] hover:bg-[#152C4B] text-white font-bold transition-all shadow-sm cursor-pointer">
                    {{ $isRtl ? 'إرسال الطلب' : 'Dispatch' }}
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ══════════════════════════════════════════════
     MODAL 2: CALL NEXT PATIENT ALERT
══════════════════════════════════════════════ --}}
<div id="callNextModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/40 backdrop-blur-xs hidden p-4 anim-overlay">
    <div class="bg-white rounded-2xl p-6 w-full max-w-sm shadow-2xl border border-slate-100 text-center text-xs anim-modal-pop">
        <div class="w-12 h-12 rounded-full bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center mx-auto mb-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
        </div>
        <h3 class="font-bold text-sm text-[#152C4B]">{{ $isRtl ? 'نداء المريض للعيادة 204' : 'Call Patient to Suite 204' }}</h3>
        <p class="text-slate-500 mt-1 mb-4" id="callNextPatientDisplay">نورة عبدالله الشهري — MRN-90218</p>

        <div class="flex items-center justify-center gap-2">
            <button type="button" onclick="closeCallNextModal()" class="px-3.5 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition-colors cursor-pointer">
                {{ $isRtl ? 'إغلاق' : 'Dismiss' }}
            </button>
            <button type="button" onclick="confirmStartConsultation()" class="px-4 py-2 rounded-xl bg-[#0C6B78] hover:bg-[#152C4B] text-white font-bold transition-all shadow-sm cursor-pointer">
                {{ $isRtl ? 'بدء الفحص الآن' : 'Start Exam' }}
            </button>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════
     MODAL 4: WALK-IN PATIENT
══════════════════════════════════════════════ --}}
<div id="walkInModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/40 backdrop-blur-xs hidden p-4 anim-overlay">
    <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-2xl border border-slate-100 text-xs anim-modal-pop">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <h3 class="font-bold text-sm text-[#152C4B]">{{ $isRtl ? 'إدراج كشف طارئ إلى الطابور' : 'Urgent Walk-in' }}</h3>
            <button onclick="closeWalkInModal()" class="text-slate-400 hover:text-slate-600 cursor-pointer">✕</button>
        </div>

        <form onsubmit="submitWalkIn(event)" class="space-y-3.5 pt-3">
            <div>
                <label class="block font-semibold text-slate-700 mb-1">{{ $isRtl ? 'اسم المريض' : 'Patient Name' }}</label>
                <input type="text" required placeholder="{{ $isRtl ? 'مثال: خالد سعد الدوسري' : 'e.g. Khalid Saad' }}"
                       class="w-full px-3 py-2 border border-slate-200 rounded-xl outline-none focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 transition-all">
            </div>

            <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeWalkInModal()" class="px-3.5 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition-colors cursor-pointer">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="submit" class="px-4 py-2 rounded-xl bg-[#152C4B] hover:bg-[#1E3A5F] text-white font-bold transition-all shadow-sm cursor-pointer">
                    {{ $isRtl ? 'إدراج بالطابور' : 'Insert' }}
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ══════════════════════════════════════════════
     MODAL 5: eGFR CALCULATOR
══════════════════════════════════════════════ --}}
<div id="calculatorModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/40 backdrop-blur-xs hidden p-4 anim-overlay">
    <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-2xl border border-slate-100 text-xs anim-modal-pop">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <h3 class="font-bold text-sm text-[#152C4B]">{{ $isRtl ? 'حاسبة وظائف الكلى (eGFR)' : 'eGFR Calculator' }}</h3>
            <button onclick="closeCalculatorModal()" class="text-slate-400 hover:text-slate-600 cursor-pointer">✕</button>
        </div>

        <div class="space-y-3.5 pt-3">
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">{{ $isRtl ? 'الكرياتينين (mg/dL)' : 'Creatinine' }}</label>
                    <input type="number" id="calcCreatinine" step="0.1" value="1.2" oninput="calculateEgfr()"
                           class="w-full px-3 py-2 border border-slate-200 rounded-xl font-bold outline-none focus:border-[#14AFC3]">
                </div>
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">{{ $isRtl ? 'العمر (سنة)' : 'Age' }}</label>
                    <input type="number" id="calcAge" value="48" oninput="calculateEgfr()"
                           class="w-full px-3 py-2 border border-slate-200 rounded-xl font-bold outline-none focus:border-[#14AFC3]">
                </div>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-xl p-3.5 text-center transition-all hover:bg-[#E5FAFC]/50">
                <div class="text-xs font-bold text-[#0C6B78] uppercase mb-0.5">{{ $isRtl ? 'معدل الترشيح الكبيبي' : 'Estimated GFR' }}</div>
                <div class="text-2xl font-bold text-[#152C4B]"><span id="calcResultNumber">74.2</span> mL/min</div>
            </div>

            <div class="flex items-center justify-end pt-2 border-t border-slate-100">
                <button type="button" onclick="closeCalculatorModal()" class="px-4 py-2 rounded-xl bg-[#0C6B78] hover:bg-[#152C4B] text-white font-bold transition-all shadow-sm cursor-pointer">
                    {{ $isRtl ? 'إغلاق' : 'Close' }}
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════
     STYLES & PRINT ENGINE
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

    /* Print Styles for Official Sick Leave Certificate */
    @media print {
        body {
            background: #fff !important;
            color: #000 !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        header, aside, #main-sidebar, .no-print, #liveActionToast, main > *:not(#sickLeaveCertificateModal) {
            display: none !important;
        }
        #sickLeaveCertificateModal {
            position: absolute !important;
            inset: 0 !important;
            background: #fff !important;
            display: block !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        #sickLeaveCertificateModal > div {
            box-shadow: none !important;
            border: none !important;
            max-width: 100% !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        #sickLeaveCertificatePrintArea {
            padding: 10mm 15mm !important;
            border: none !important;
        }
    }
</style>

{{-- ══════════════════════════════════════════════
     JAVASCRIPT LOGIC
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

    // Quick Clinical Note
    function openQuickNoteModal(mrn, patientName) {
        document.getElementById('modalNoteMrn').value = mrn || 'MRN-89104';
        document.getElementById('modalNotePatient').value = patientName || 'طارق عبدالعزيز الدوسري';
        document.getElementById('noteDisplayPatient').innerText = patientName || 'طارق عبدالعزيز الدوسري';
        document.getElementById('noteDisplayMrn').innerText = (mrn || 'MRN-89104') + ' · {{ $isRtl ? "عيادة القلب 204" : "Cardiology Suite 204" }}';
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

    // Filter patient table
    function filterPatientTable() {
        const query = document.getElementById('patientSearchInput').value.toLowerCase();
        const rows = document.querySelectorAll('.patient-row');
        rows.forEach(row => {
            const data = row.getAttribute('data-patient') || '';
            row.style.display = data.includes(query) ? '' : 'none';
        });
    }

    // Lab Diagnostics
    function openLabModal(mrn, name) {
        document.getElementById('labModalPatientName').value = name + ' (' + mrn + ')';
        document.getElementById('labModal').classList.remove('hidden');
    }
    function closeLabModal() {
        document.getElementById('labModal').classList.add('hidden');
    }
    function submitLabOrder(e) {
        e.preventDefault();
        closeLabModal();
        showNotificationToast('{{ $isRtl ? "تم إرسال طلب الفحص المخبري بنجاح." : "Diagnostic order dispatched." }}');
    }

    // Call Patient
    function triggerCallNextModal() {
        document.getElementById('callNextModal').classList.remove('hidden');
    }
    function callSpecificPatient(mrn, name) {
        document.getElementById('callNextPatientDisplay').innerText = name + ' — ' + mrn;
        document.getElementById('callNextModal').classList.remove('hidden');
    }
    function closeCallNextModal() {
        document.getElementById('callNextModal').classList.add('hidden');
    }
    function confirmStartConsultation() {
        closeCallNextModal();
        showNotificationToast('{{ $isRtl ? "تم تسجيل دخول المريض لغرفة الكشف." : "Patient checked into exam room." }}');
    }

    // Sick Leave Engine
    function openSickLeaveModal() {
        updateSickLeavePatientDetails();
        calculateSickLeaveDates();
        document.getElementById('sickLeaveModal').classList.remove('hidden');
    }
    function closeSickLeaveModal() {
        document.getElementById('sickLeaveModal').classList.add('hidden');
    }
    function updateSickLeavePatientDetails() {
        const select = document.getElementById('slPatientSelect');
        const selected = select.options[select.selectedIndex];
        if (selected) {
            document.getElementById('slEmployerInput').value = selected.getAttribute('data-emp') || 'وزارة التربية والتعليم';
            document.getElementById('slDiagnosisInput').value = selected.getAttribute('data-diag') || 'ألم صدري غير نمطي وإجهاد قلبي حاد يتطلب راحة سريرية';
        }
    }
    function calculateSickLeaveDates() {
        const startDateStr = document.getElementById('slStartDateInput').value || '{{ date("Y-m-d") }}';
        const days = parseInt(document.getElementById('slDurationSelect').value) || 3;
        const start = new Date(startDateStr);
        
        const returnDate = new Date(start);
        returnDate.setDate(start.getDate() + days);
        
        const y = returnDate.getFullYear();
        const m = String(returnDate.getMonth() + 1).padStart(2, '0');
        const d = String(returnDate.getDate()).padStart(2, '0');
        
        const formatted = `${y}-${m}-${d}`;
        document.getElementById('slReturnDateDisplay').innerText = formatted;
    }
    function submitSickLeave(e) {
        e.preventDefault();
        closeSickLeaveModal();
        showNotificationToast('{{ $isRtl ? "تم اعتماد الإجازة المرضية وتوثيقها رسمياً عبر المنصة." : "Sick leave certified & synced successfully." }}');
    }

    // Official Certificate Print Preview & Action
    function previewOfficialSickLeaveCertificate() {
        const select = document.getElementById('slPatientSelect');
        const selected = select ? select.options[select.selectedIndex] : null;
        const patientName = selected ? selected.getAttribute('data-name') : 'طارق عبدالعزيز الدوسري';
        const patientMrn = select ? select.value : 'MRN-89104';
        const patientId = selected ? selected.getAttribute('data-id') : '1092837482';
        const employer = document.getElementById('slEmployerInput') ? document.getElementById('slEmployerInput').value : 'وزارة التربية والتعليم';
        const diagnosis = document.getElementById('slDiagnosisInput') ? document.getElementById('slDiagnosisInput').value : 'ألم صدري غير نمطي وإجهاد قلبي حاد يتطلب راحة سريرية';
        const duration = document.getElementById('slDurationSelect') ? document.getElementById('slDurationSelect').value : '3';
        const startDate = document.getElementById('slStartDateInput') ? document.getElementById('slStartDateInput').value : '{{ date("Y-m-d") }}';

        // Calculate end and return date
        const start = new Date(startDate);
        const end = new Date(start);
        end.setDate(start.getDate() + (parseInt(duration) - 1));
        const ret = new Date(start);
        ret.setDate(start.getDate() + parseInt(duration));

        const formatDate = (dateObj) => {
            return `${dateObj.getFullYear()}/${String(dateObj.getMonth() + 1).padStart(2, '0')}/${String(dateObj.getDate()).padStart(2, '0')}`;
        };

        // Populate certificate fields
        document.getElementById('certPatientName').innerText = patientName;
        document.getElementById('certPatientMrn').innerText = patientMrn;
        document.getElementById('certPatientId').innerText = patientId;
        document.getElementById('certPatientEmployer').innerText = employer;
        document.getElementById('certDiagnosis').innerText = diagnosis;
        document.getElementById('certDurationDisplay').innerText = duration + ' {{ $isRtl ? "أيام" : "Days" }}';
        document.getElementById('certStartDateDisplay').innerText = formatDate(start);
        document.getElementById('certEndDateDisplay').innerText = formatDate(end);
        document.getElementById('certReturnDateDisplay').innerText = formatDate(ret);
        document.getElementById('certRefNumber').innerText = 'SL-2026-' + patientMrn.replace('MRN-', '') + '-YE';

        // Show certificate preview modal
        document.getElementById('sickLeaveCertificateModal').classList.remove('hidden');
    }
    function closeOfficialSickLeaveCertificate() {
        document.getElementById('sickLeaveCertificateModal').classList.add('hidden');
    }
    function triggerOfficialSickLeavePrint() {
        window.print();
    }

    // Walk-in modal
    function openWalkInModal() {
        document.getElementById('walkInModal').classList.remove('hidden');
    }
    function closeWalkInModal() {
        document.getElementById('walkInModal').classList.add('hidden');
    }
    function submitWalkIn(e) {
        e.preventDefault();
        closeWalkInModal();
        showNotificationToast('{{ $isRtl ? "تم إدراج المريض الإسعافي في الطابور." : "Urgent walk-in inserted." }}');
    }

    // Calculator modal
    function openCalculatorModal() {
        document.getElementById('calculatorModal').classList.remove('hidden');
        calculateEgfr();
    }
    function closeCalculatorModal() {
        document.getElementById('calculatorModal').classList.add('hidden');
    }
    function calculateEgfr() {
        const cr = parseFloat(document.getElementById('calcCreatinine').value) || 1.0;
        const age = parseFloat(document.getElementById('calcAge').value) || 40;
        let crcl = Math.round(((140 - age) * 70) / (72 * cr) * 10) / 10;
        document.getElementById('calcResultNumber').innerText = crcl;
    }

    // Clinic Break Toggle
    let isClinicOnBreak = false;
    function toggleClinicBreak() {
        isClinicOnBreak = !isClinicOnBreak;
        const badge = document.getElementById('clinicBreakBadge');
        if (isClinicOnBreak) {
            badge.className = 'text-xs font-bold px-2.5 py-1 rounded-full bg-slate-800 text-white flex-shrink-0';
            badge.innerText = '{{ $isRtl ? "في استراحة" : "On Break" }}';
            showNotificationToast('{{ $isRtl ? "تم إيقاف طابور العيادة مؤقتاً." : "Clinic queue paused." }}');
        } else {
            badge.className = 'text-xs font-bold px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 flex-shrink-0';
            badge.innerText = '{{ $isRtl ? "نشط" : "Active" }}';
            showNotificationToast('{{ $isRtl ? "تم استئناف عمل العيادة." : "Clinic resumed." }}');
        }
    }

    // ESC to close any modal
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            ['quickNoteModal', 'labModal', 'callNextModal', 'sickLeaveModal', 'sickLeaveCertificateModal', 'walkInModal', 'calculatorModal'].forEach(id => {
                const el = document.getElementById(id);
                if (el && !el.classList.contains('hidden')) el.classList.add('hidden');
            });
        }
    });
</script>
@endsection
