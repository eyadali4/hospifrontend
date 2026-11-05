@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    // إحصائيات مواعيد اليوم لمكتب الاستقبال
    $appointmentsStats = $appointmentsStats ?? [
        'today_total' => 42,
        'checked_in'  => 28,
        'upcoming'    => 10,
        'cancelled'   => 4,
    ];

    // قائمة المواعيد المجدولة لليوم القابلة للسحب والإفلات (هوية يمنية 100%)
    $appointments = $appointments ?? [
        [
            'id'           => 101,
            'token'        => '#A-101',
            'time'         => '08:30 AM',
            'duration'     => '20 min',
            'period'       => 'morning',
            'mrn'          => 'MRN-88421',
            'patient'      => $isRtl ? 'أحمد محمد الجهمي' : 'Ahmed Mohammed Al-Jahmi',
            'phone'        => '771234567',
            'doctor'       => $isRtl ? 'د. خالد المنصور' : 'Dr. Khaled Al-Mansoor',
            'clinic'       => $isRtl ? 'عيادة الباطنية 204' : 'Internal Med 204',
            'type'         => $isRtl ? 'متابعة دورية' : 'Follow-up',
            'priority'     => 'normal',
            'status'       => 'checked_in',
            'status_label' => $isRtl ? 'حاضر بالانتظار' : 'Checked In',
        ],
        [
            'id'           => 102,
            'token'        => '#A-102',
            'time'         => '09:00 AM',
            'duration'     => '20 min',
            'period'       => 'morning',
            'mrn'          => 'MRN-88435',
            'patient'      => $isRtl ? 'بلقيس حميد الحبيشي' : 'Balqees Hameed Al-Hubaishi',
            'phone'        => '735987654',
            'doctor'       => $isRtl ? 'د. طارق الدوسري' : 'Dr. Tariq Al-Dosari',
            'clinic'       => $isRtl ? 'عيادة القلب 206' : 'Cardiology 206',
            'type'         => $isRtl ? 'كشف جديد' : 'New Visit',
            'priority'     => 'urgent',
            'status'       => 'in_consultation',
            'status_label' => $isRtl ? 'داخل غرفة الكشف' : 'In Exam Room',
        ],
        [
            'id'           => 103,
            'token'        => '#A-103',
            'time'         => '09:30 AM',
            'duration'     => '20 min',
            'period'       => 'morning',
            'mrn'          => 'MRN-88448',
            'patient'      => $isRtl ? 'بشير عبدالكريم الوصابي' : 'Basheer Abdulkarim Al-Wesabi',
            'phone'        => '774332110',
            'doctor'       => $isRtl ? 'د. أروى العريقي' : 'Dr. Arwa Al-Ariqi',
            'clinic'       => $isRtl ? 'عيادة النساء والولادة 102' : 'OB/GYN 102',
            'type'         => $isRtl ? 'مراجعة تحاليل' : 'Lab Review',
            'priority'     => 'normal',
            'status'       => 'confirmed',
            'status_label' => $isRtl ? 'مؤكد (قادم)' : 'Confirmed',
        ],
        [
            'id'           => 104,
            'token'        => '#A-104',
            'time'         => '10:00 AM',
            'duration'     => '20 min',
            'period'       => 'morning',
            'mrn'          => 'MRN-88456',
            'patient'      => $isRtl ? 'فاطمة صالح الذماري' : 'Fatima Saleh Al-Dhamari',
            'phone'        => '716778899',
            'doctor'       => $isRtl ? 'د. خالد المنصور' : 'Dr. Khaled Al-Mansoor',
            'clinic'       => $isRtl ? 'عيادة الباطنية 204' : 'Internal Med 204',
            'type'         => $isRtl ? 'استشارة عامة' : 'General Consult',
            'priority'     => 'normal',
            'status'       => 'confirmed',
            'status_label' => $isRtl ? 'مؤكد (قادم)' : 'Confirmed',
        ],
        [
            'id'           => 105,
            'token'        => '#A-105',
            'time'         => '01:30 PM',
            'duration'     => '20 min',
            'period'       => 'afternoon',
            'mrn'          => 'MRN-88462',
            'patient'      => $isRtl ? 'عمار ياسر الأهدل' : 'Ammar Yasser Al-Ahdal',
            'phone'        => '779445566',
            'doctor'       => $isRtl ? 'د. طارق الدوسري' : 'Dr. Tariq Al-Dosari',
            'clinic'       => $isRtl ? 'عيادة القلب 206' : 'Cardiology 206',
            'type'         => $isRtl ? 'متابعة دورية' : 'Follow-up',
            'priority'     => 'normal',
            'status'       => 'confirmed',
            'status_label' => $isRtl ? 'الفترة المسائية' : 'Afternoon Slot',
        ],
        [
            'id'           => 106,
            'token'        => '#A-106',
            'time'         => '02:00 PM',
            'duration'     => '20 min',
            'period'       => 'afternoon',
            'mrn'          => 'MRN-88470',
            'patient'      => $isRtl ? 'ندى عبدالملك الحكيمي' : 'Nada Abdulmalik Al-Hakimi',
            'phone'        => '738112233',
            'doctor'       => $isRtl ? 'د. نزار صالح الحكيمي' : 'Dr. Nizar Saleh Al-Hakimi',
            'clinic'       => $isRtl ? 'عيادة العظام والمفاصل 301' : 'Orthopedics 301',
            'type'         => $isRtl ? 'كشف جديد' : 'New Visit',
            'priority'     => 'normal',
            'status'       => 'cancelled',
            'status_label' => $isRtl ? 'ملغي / اعتذار' : 'Cancelled',
        ],
    ];
@endphp

@section('page-title', $isRtl ? 'طابور الانتظار المباشر' : 'Live Queue Management')
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
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0-.33 1.82V9c.36.24.7.53 1 .87"/>
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
    <div id="apptActionToast" class="fixed top-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 transform -translate-y-16 opacity-0 transition-all duration-300 pointer-events-none">
        <div class="bg-[#152C4B] text-white px-4 py-2.5 rounded-xl shadow-xl border border-[#14AFC3]/30 flex items-center gap-2.5 text-xs">
            <div class="w-6 h-6 rounded-full bg-[#14AFC3]/20 flex items-center justify-center text-[#14AFC3] flex-shrink-0">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <span id="apptActionToastMsg" class="font-medium">تمت العملية بنجاح</span>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         1. الشريط العلوي الموحد (Live Queue Header)
    ══════════════════════════════════════════════ --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2.5 flex-wrap">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] inline-block shadow-xs animate-pulse"></span>
                <h1 class="text-2xl font-black text-[#152C4B] tracking-tight">
                    {{ $isRtl ? 'طابور الانتظار المباشر وشاشات الاستدعاء' : 'Live Queue & Calling Board' }}
                </h1>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100 flex-shrink-0">
                    {{ $isRtl ? 'البث المباشر لشاشات الصالة' : 'Live Lobby Displays' }}
                </span>
            </div>
            <p class="text-sm text-slate-500 mt-1">
                {{ $isRtl ? 'التحكم المباشر في حركة تدفق المراجعين، ترتيب الأدوار، التقديم والتأخير، واستدعاء المرضى عبر الشاشات.' : 'Live triage flow management, queue re-ordering, slot adjustment, and patient calling.' }}
            </p>
        </div>

        {{-- أزرار الإجراء السريع ومقلب الأيام --}}
        <div class="flex items-center gap-2.5 flex-wrap">
            <div class="flex items-center bg-white border border-slate-200 rounded-xl p-1 shadow-xs">
                <button type="button" onclick="changeDay(-1)" class="w-7 h-7 rounded-lg hover:bg-slate-100 text-slate-600 hover:text-[#0C6B78] flex items-center justify-center transition-colors cursor-pointer">
                    <svg class="w-3.5 h-3.5 {{ $isRtl ? '' : 'rotate-180' }}" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M9 5l7 7-7 7"/></svg>
                </button>
                <div class="px-3 text-center">
                    <div class="text-xs font-black text-[#152C4B]" id="displayScheduleDate">{{ now()->locale($isRtl ? 'ar' : 'en')->isoFormat('dddd، D MMMM YYYY') }}</div>
                </div>
                <button type="button" onclick="changeDay(1)" class="w-7 h-7 rounded-lg hover:bg-slate-100 text-slate-600 hover:text-[#0C6B78] flex items-center justify-center transition-colors cursor-pointer">
                    <svg class="w-3.5 h-3.5 {{ $isRtl ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>

            <button type="button"
                    onclick="openNewAppointmentModal()" 
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white text-xs font-bold shadow-xs hover:shadow-md hover:scale-101 active:scale-98 transition-all cursor-pointer">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
                <span>{{ $isRtl ? 'حجز موعد جديد' : 'New Booking' }}</span>
            </button>
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
                    <rect x="3" y="4" width="18" height="18" rx="2"/><path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
            </div>
            <span class="text-[11px] font-extrabold uppercase tracking-widest text-teal-100">
                {{ $isRtl ? 'مواعيد اليوم الكلية' : 'TOTAL APPOINTMENTS' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-white my-2 tracking-tight font-mono" id="statTotalQueue">
                {{ $appointmentsStats['today_total'] ?? 42 }}
            </div>
            <div class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-white/20 text-white backdrop-blur-xs">
                <span>{{ $isRtl ? 'موزعة على كافة فترات العيادات' : 'Across All Slots' }}</span>
            </div>
        </div>

        {{-- Card 2: Checked In --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'حاضرون بالانتظار' : 'CHECKED IN' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono" id="statCheckedInQueue">
                {{ $appointmentsStats['checked_in'] ?? 28 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'أكدوا الحضور بالصالة' : 'Present in lobby' }}</span>
            </div>
        </div>

        {{-- Card 3: Upcoming --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'مواعيد قادمة' : 'UPCOMING SLOTS' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $appointmentsStats['upcoming'] ?? 10 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                <span>{{ $isRtl ? 'بانتظار وصول المراجعين' : 'Expected arrivals' }}</span>
            </div>
        </div>

        {{-- Card 4: Cancelled --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'ملغية / اعتذار' : 'CANCELLED' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $appointmentsStats['cancelled'] ?? 4 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">
                <span>{{ $isRtl ? 'خانة متاحة للمراجعين' : 'Released slots' }}</span>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════════
         3. جدول طابور الانتظار التفاعلي مع خاصية السحب والتقديم والتأخير
    ══════════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        
        {{-- شريط التنبيه بالسحب والتبويبات والبحث --}}
        <div class="p-5 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2.5 flex-wrap">
                    <h2 class="text-base sm:text-lg font-black text-[#152C4B] tracking-tight">
                        {{ $isRtl ? 'طابور كشوفات اليوم المباشر' : "Live Queue Calling Directory" }}
                    </h2>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100 flex-shrink-0">
                        {{ count($appointments) }} {{ $isRtl ? 'مراجعين بالقائمة' : 'in queue' }}
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16"/></svg>
                        <span>{{ $isRtl ? 'السحب والإفلات مفعل لتعديل الدور' : 'Drag & drop active' }}</span>
                    </span>
                </div>
                <p class="text-xs text-slate-400 font-medium mt-0.5 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ $isRtl ? 'إمكانية تقديم وتأخير المواعيد بـ 15 دقيقة مع إرسال إشعار SMS تلقائي' : 'Instant 15m advance/delay with automated SMS dispatch' }}</span>
                </p>
            </div>

            <div class="flex items-center gap-3 flex-wrap sm:flex-nowrap">
                {{-- تبويبات الفلترة المطورة --}}
                <div class="flex items-center gap-1.5 bg-slate-100/90 p-1.5 rounded-2xl border border-slate-200/60 shadow-inner">
                    <button type="button"
                            onclick="filterApptPeriod('all', this)" 
                            class="appt-tab-btn active px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all duration-300 ease-out flex items-center gap-1.5 cursor-pointer bg-[#0C6B78] text-white shadow-md shadow-[#0C6B78]/25 scale-[1.02]">
                        <span>{{ $isRtl ? 'الكل' : 'All' }}</span>
                        <span class="q-tab-counter px-1.5 py-0.2 rounded-full text-[10px] font-mono font-bold bg-white/20 text-white">{{ count($appointments) }}</span>
                    </button>
                    <button type="button"
                            onclick="filterApptPeriod('morning', this)" 
                            class="appt-tab-btn px-3.5 py-1.5 rounded-xl text-xs font-bold text-slate-600 hover:text-[#152C4B] hover:bg-white/70 transition-all duration-300 ease-out flex items-center gap-1.5 cursor-pointer">
                        <span>{{ $isRtl ? 'الفترة الصباحية' : 'Morning' }}</span>
                        <span class="q-tab-counter px-1.5 py-0.2 rounded-full text-[10px] font-mono font-bold bg-slate-200/80 text-slate-600">4</span>
                    </button>
                    <button type="button"
                            onclick="filterApptPeriod('afternoon', this)" 
                            class="appt-tab-btn px-3.5 py-1.5 rounded-xl text-xs font-bold text-slate-600 hover:text-[#152C4B] hover:bg-white/70 transition-all duration-300 ease-out flex items-center gap-1.5 cursor-pointer">
                        <span>{{ $isRtl ? 'الفترة المسائية' : 'Afternoon' }}</span>
                        <span class="q-tab-counter px-1.5 py-0.2 rounded-full text-[10px] font-mono font-bold bg-slate-200/80 text-slate-600">2</span>
                    </button>
                    <button type="button"
                            onclick="filterApptPeriod('checked_in', this)" 
                            class="appt-tab-btn px-3.5 py-1.5 rounded-xl text-xs font-bold text-slate-600 hover:text-[#152C4B] hover:bg-white/70 transition-all duration-300 ease-out flex items-center gap-1.5 cursor-pointer">
                        <span>{{ $isRtl ? 'حاضرون بالانتظار' : 'Checked In' }}</span>
                    </button>
                </div>

                {{-- حقل البحث الذكي --}}
                <div class="relative w-full sm:w-56">
                    <svg class="w-4 h-4 absolute {{ $isRtl ? 'right-3' : 'left-3' }} top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="m21 21-4.35-4.35"/>
                    </svg>
                    <input type="text" 
                           id="apptSearchInput"
                           onkeyup="searchApptTable()"
                           placeholder="{{ $isRtl ? 'بحث بالمريض، الطبيب، أو MRN...' : 'Search patient, doctor, MRN...' }}"
                           class="w-full {{ $isRtl ? 'pr-9 pl-3' : 'pl-9 pr-3' }} py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-[#152C4B] placeholder-slate-400 focus:bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all">
                </div>
            </div>
        </div>

        {{-- جدول الطابور القابل للسحب الموزون 1:1 --}}
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[1000px] border-collapse" id="appointmentsMasterTable">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
                        <th class="w-[5%] py-3.5 px-3 text-center">
                            {{ $isRtl ? 'سحب' : 'Drag' }}
                        </th>
                        <th class="w-[15%] px-3 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'الوقت والدور' : 'Time & Token' }}
                        </th>
                        <th class="w-[26%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'المريض والسجل الطبي' : 'Patient & MRN' }}
                        </th>
                        <th class="w-[22%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'العيادة والطبيب المعالج' : 'Physician & Clinic' }}
                        </th>
                        <th class="w-[16%] px-3 py-3.5 text-center whitespace-nowrap">
                            {{ $isRtl ? 'حالة الطابور' : 'Queue Status' }}
                        </th>
                        <th class="w-[16%] px-4 py-3.5 text-center whitespace-nowrap">
                            {{ $isRtl ? 'التقديم والتأخير والإجراءات' : 'Queue Actions' }}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700 bg-white" id="appointmentsTableBody">
                    @forelse($appointments as $index => $appt)
                        <tr class="hover:bg-[#E5FAFC]/35 transition-all duration-150 group appt-row cursor-grab active:cursor-grabbing"
                            draggable="true"
                            data-index="{{ $index }}"
                            data-patient="{{ $appt['patient'] }}"
                            data-phone="{{ $appt['phone'] }}"
                            data-token="{{ $appt['token'] }}"
                            data-time="{{ $appt['time'] }}"
                            data-period="{{ $appt['period'] }}"
                            data-status="{{ $appt['status'] }}"
                            data-search="{{ strtolower($appt['patient'] . ' ' . $appt['mrn'] . ' ' . $appt['doctor'] . ' ' . $appt['clinic'] . ' ' . $appt['token']) }}">
                            
                            {{-- 1. مقبض السحب والإفلات --}}
                            <td class="w-[5%] py-4 px-3 text-center text-slate-300 group-hover:text-[#0C6B78] transition-colors">
                                <svg class="w-4 h-4 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                    <circle cx="9" cy="6" r="1.5"/><circle cx="15" cy="6" r="1.5"/>
                                    <circle cx="9" cy="12" r="1.5"/><circle cx="15" cy="12" r="1.5"/>
                                    <circle cx="9" cy="18" r="1.5"/><circle cx="15" cy="18" r="1.5"/>
                                </svg>
                            </td>

                            {{-- 2. الوقت والدور --}}
                            <td class="w-[15%] py-4 px-3 whitespace-nowrap {{ $isRtl ? 'text-right' : 'text-left' }}">
                                <div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg font-mono font-black text-xs bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30 shadow-2xs">
                                        {{ $appt['token'] }}
                                    </span>
                                </div>
                                <div class="text-xs font-mono font-black text-slate-700 appt-time-display flex items-center gap-1.5 mt-1">
                                    <svg class="w-3.5 h-3.5 text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/>
                                    </svg>
                                    <span>{{ $appt['time'] }}</span>
                                </div>
                            </td>

                            {{-- 3. المريض والسجل الطبي (اسم عريض وواضح جداً + Avatar مميز + كبسولة MRN فقط بدون رقم هاتف) --}}
                            <td class="w-[26%] px-4 py-4 whitespace-nowrap {{ $isRtl ? 'text-right' : 'text-left' }}">
                                <div class="flex items-center gap-3 min-w-0">
                                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-[#E5FAFC] to-[#CCF4F8] text-[#0C6B78] border border-[#14AFC3]/30 flex items-center justify-center font-black text-sm flex-shrink-0 group-hover:scale-105 transition-transform shadow-2xs">
                                        {{ mb_substr($appt['patient'], 0, 1, 'UTF-8') }}
                                    </div>
                                    <div class="min-w-0">
                                        <div class="font-black text-[#152C4B] text-[13.5px] sm:text-[14px] hover:text-[#0C6B78] transition-colors leading-snug truncate">
                                            {{ $appt['patient'] }}
                                        </div>
                                        <div class="mt-1">
                                            <span class="inline-flex items-center font-mono font-bold text-[11px] px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-700 border border-slate-200/80">
                                                <bdi dir="ltr">{{ $appt['mrn'] }}</bdi>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- 4. العيادة والطبيب المعالج ونوع الكشف --}}
                            <td class="w-[22%] px-4 py-4 whitespace-nowrap {{ $isRtl ? 'text-right' : 'text-left' }}">
                                <div class="font-black text-[#152C4B] text-[13px] leading-snug">
                                    {{ $appt['doctor'] }}
                                </div>
                                <div class="text-xs text-slate-500 font-semibold mt-1 flex items-center gap-1.5">
                                    <span>{{ $appt['clinic'] }}</span>
                                    <span class="text-slate-300">·</span>
                                    <span class="inline-flex items-center text-[10.5px] font-bold text-[#0C6B78] bg-[#E5FAFC] px-1.5 py-0.5 rounded border border-[#14AFC3]/20">
                                        {{ $appt['type'] }}
                                    </span>
                                </div>
                            </td>

                            {{-- 5. حالة الطابور والأولوية (مريحة، شارة واحدة أنيقة بدون ازدحام) --}}
                            <td class="w-[16%] px-3 py-4 text-center whitespace-nowrap status-cell">
                                @if($appt['priority'] === 'urgent')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-black bg-rose-50 text-rose-700 border border-rose-200 shadow-2xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-ping"></span>
                                        <span>{{ $isRtl ? 'أولوية عاجلة' : 'Urgent Priority' }}</span>
                                    </span>
                                @elseif($appt['status'] === 'checked_in')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-black bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30 shadow-2xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                                        <span>{{ $appt['status_label'] }}</span>
                                    </span>
                                @elseif($appt['status'] === 'in_consultation')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-black bg-[#152C4B] text-white shadow-2xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-ping"></span>
                                        <span>{{ $appt['status_label'] }}</span>
                                    </span>
                                @elseif($appt['status'] === 'cancelled')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                        {{ $appt['status_label'] }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-black bg-sky-50 text-sky-700 border border-sky-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-sky-500"></span>
                                        <span>{{ $appt['status_label'] }}</span>
                                    </span>
                                @endif
                            </td>

                            {{-- 6. الإجراءات المباشرة --}}
                            <td class="w-[16%] px-4 py-4 text-center whitespace-nowrap actions-cell">
                                <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                                    {{-- تقديم 15د --}}
                                    <button type="button" onclick="advanceSlot('{{ $appt['patient'] }}', '{{ $appt['phone'] }}', this)" title="{{ $isRtl ? 'تقديم الموعد 15 دقيقة (حالة عاجلة)' : 'Advance 15 mins' }}" class="h-8 px-2.5 rounded-xl bg-emerald-50 hover:bg-emerald-600 text-emerald-700 hover:text-white border border-emerald-200 text-xs font-bold transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                                        {{ $isRtl ? 'تقديم 15د' : '-15m' }}
                                    </button>

                                    {{-- تأخير 15د --}}
                                    <button type="button" onclick="delaySlot('{{ $appt['patient'] }}', '{{ $appt['phone'] }}', this)" title="{{ $isRtl ? 'تأخير الموعد 15 دقيقة (المريض تأخر في الطريق)' : 'Delay 15 mins' }}" class="h-8 px-2.5 rounded-xl bg-slate-50 hover:bg-slate-700 text-slate-700 hover:text-white border border-slate-200 text-xs font-bold transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                                        {{ $isRtl ? 'تأخير 15د' : '+15m' }}
                                    </button>

                                    {{-- تعديل وإشعار --}}
                                    <button type="button" onclick="openRescheduleModal('{{ $appt['patient'] }}', '{{ $appt['phone'] }}', '{{ $appt['time'] }}', '{{ $appt['doctor'] }}')" title="{{ $isRtl ? 'تعديل موعد الحجز وإرسال تنبيه SMS' : 'Reschedule & Alert' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-slate-600 dark:text-slate-300 hover:text-[#152C4B] hover:bg-slate-100 transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>

                                    {{-- طباعة تذكرة الطابور الرسمية --}}
                                    <button type="button" onclick="printOfficialQueueSlip('{{ $appt['token'] }}', '{{ $appt['patient'] }}', '{{ $appt['mrn'] }}', '{{ $appt['doctor'] }}', '{{ $appt['clinic'] }}', '{{ $appt['time'] }}')" title="{{ $isRtl ? 'طباعة تذكرة الانتظار الرسمية' : 'Print Queue Ticket' }}" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#0C6B78] dark:text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-10 text-center text-slate-400 text-xs font-medium">
                                {{ $isRtl ? 'لا توجد مواعيد مسجلة في هذا اليوم.' : 'No scheduled appointments for this day.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- تذييل الجدول --}}
        <div class="px-5 py-4 bg-slate-50/70 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
            <span>{{ $isRtl ? 'خاصية السحب والإفلات مفعلة: اسحب أي صف وأفلته لتعديل الترتيب فوراً' : 'Drag rows to swap appointment times' }}</span>
            <span class="flex items-center gap-1.5 font-bold text-[#0C6B78]">
                <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-ping"></span>
                {{ $isRtl ? 'نظام إشعار المرضى بالرسائل النصية والواتساب متصل' : 'SMS / WhatsApp Gateway Connected' }}
            </span>
        </div>

    </div>

    {{-- =========================================================================
         MODAL 1: حجز موعد جديد وإدراج بالطابور (Max 3XL فخم ومريح)
         ========================================================================= --}}
    <div id="newAppointmentModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/65 backdrop-blur-xs hidden p-4 sm:p-6 anim-overlay overflow-y-auto">
        <div class="bg-white rounded-3xl w-full max-w-3xl shadow-2xl border border-slate-100 anim-modal-pop overflow-hidden my-auto">
            
            <div style="background: linear-gradient(135deg, #0A1628 0%, #152C4B 50%, #0C6B78 100%);" class="px-7 py-6 text-white flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-md flex items-center justify-center text-[#14AFC3] flex-shrink-0 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2"/><path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <h3 class="font-black text-lg sm:text-xl text-white tracking-tight">{{ $isRtl ? 'حجز موعد عيادة جديد وإدراج بالطابور' : 'New Appointment Booking' }}</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-[#14AFC3]/25 border border-[#14AFC3]/40 text-teal-100">
                                {{ $isRtl ? 'إصدار تذكرة فورية' : 'Instant Ticket' }}
                            </span>
                        </div>
                        <p class="text-teal-100/90 text-xs mt-1 flex items-center gap-1.5 font-medium">
                            <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                            <span>{{ $isRtl ? 'جدولة حجز في العيادات الخارجية وإصدار قسيمة دور رسمية' : 'Schedule appointment & generate appointment slip' }}</span>
                        </p>
                    </div>
                </div>
                <button type="button" onclick="closeModal('newAppointmentModal')" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-base font-bold">✕</button>
            </div>

            <form onsubmit="handleSaveAppointment(event)" class="p-6 sm:p-8 space-y-5">
                
                {{-- القسم الأول: بيانات المراجع --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 text-xs font-black text-[#152C4B] uppercase tracking-wider">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <span>{{ $isRtl ? 'بيانات المراجع وهوية الحجز' : 'Patient & Booking Identity' }}</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'المريض المستهدف *' : 'Patient Name or MRN *' }}</label>
                            <input type="text" id="newApptPatient" required 
                                   placeholder="{{ $isRtl ? 'مثال: أحمد محمد الجهمي' : 'e.g. Ahmed Al-Jahmi' }}"
                                   class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 bg-slate-50/60 outline-none focus:bg-white focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-bold text-sm text-slate-800 placeholder-slate-400">
                        </div>
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'رقم الملف الطبي MRN' : 'Patient MRN' }}</label>
                            <input type="text" id="newApptMRN" 
                                   placeholder="MRN-88421"
                                   class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 bg-slate-50/60 outline-none focus:bg-white focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-black text-sm text-slate-800 placeholder-slate-400 tracking-wider">
                        </div>
                    </div>
                </div>

                {{-- القسم الثاني: تفاصيل العيادة والتوقيت --}}
                <div class="space-y-4 pt-1">
                    <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 text-xs font-black text-[#152C4B] uppercase tracking-wider">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#0C6B78]"></span>
                        <span>{{ $isRtl ? 'تفاصيل العيادة والتوقيت' : 'Clinic & Timing Details' }}</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'العيادة والطبيب المعالج *' : 'Clinic & Physician *' }}</label>
                            <select id="newApptClinic" class="w-full h-11 sm:h-12 px-3.5 rounded-xl border border-slate-200 bg-white outline-none focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-bold text-sm text-slate-800">
                                <option value="عيادة الباطنية 204">عيادة الباطنية 204 (د. خالد المنصور)</option>
                                <option value="عيادة القلب 206">عيادة القلب 206 (د. طارق الدوسري)</option>
                                <option value="عيادة النساء والولادة 102">عيادة النساء والولادة 102 (د. أروى العريقي)</option>
                                <option value="عيادة العظام 301">عيادة العظام 301 (د. نزار الحكيمي)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'نوع الزيارة والأولوية' : 'Type & Urgency' }}</label>
                            <select id="newApptType" class="w-full h-11 sm:h-12 px-3.5 rounded-xl border border-slate-200 bg-white outline-none focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-bold text-sm text-slate-800">
                                <option value="normal">{{ $isRtl ? 'كشف اعتيادي مجدول' : 'Normal Visit' }}</option>
                                <option value="urgent">{{ $isRtl ? 'أولوية عاجلة (كبار السن / طارئ)' : 'Urgent Priority' }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'تاريخ الموعد' : 'Appointment Date' }}</label>
                            <input type="date" value="{{ date('Y-m-d') }}" 
                                   class="w-full h-11 sm:h-12 px-3.5 rounded-xl border border-slate-200 bg-white outline-none focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-bold text-sm text-slate-800">
                        </div>
                        <div>
                            <label class="block font-black text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'الوقت المتاح' : 'Time Slot' }}</label>
                            <select id="newApptTime" class="w-full h-11 sm:h-12 px-3.5 rounded-xl border border-slate-200 bg-white outline-none focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-black text-sm text-slate-800">
                                <option value="10:30 AM">10:30 AM (صباحي)</option>
                                <option value="11:00 AM">11:00 AM (صباحي)</option>
                                <option value="11:30 AM">11:30 AM (صباحي)</option>
                                <option value="01:30 PM">01:30 PM (مسائي)</option>
                                <option value="02:00 PM">02:00 PM (مسائي)</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- خيار إرسال تنبيه فوري للمريض --}}
                <div class="p-4 bg-slate-50 border border-slate-200/80 rounded-2xl space-y-1.5">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" checked id="sendSmsOnCreate" class="rounded text-[#0C6B78] focus:ring-0 w-4 h-4">
                        <span class="font-bold text-[#152C4B] text-xs">{{ $isRtl ? 'إرسال رسالة SMS وتنبيه واتساب بتفاصيل الحجز للمريض' : 'Send instant SMS / WhatsApp alert to patient' }}</span>
                    </label>
                    <p class="text-[10.5px] text-slate-500 {{ $isRtl ? 'mr-6' : 'ml-6' }}">
                        {{ $isRtl ? 'تتضمن الرسالة رابط التذكرة ورقم الدور واسم الطبيب والعيادة.' : 'Includes ticket link, clinic room, and physician name.' }}
                    </p>
                </div>

                {{-- أزرار الحفظ والإلغاء --}}
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeModal('newAppointmentModal')" 
                            class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 font-bold hover:bg-slate-100 transition-colors cursor-pointer text-xs">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" 
                            class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-bold text-xs transition-all shadow-md hover:scale-101 active:scale-98 cursor-pointer flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ $isRtl ? 'تأكيد الحجز وإرسال التنبيه' : 'Confirm & Notify' }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- =========================================================================
         MODAL 2: تعديل الموعد / التقديم والتأخير مع خيار إرسال التنبيه (Max XL)
         ========================================================================= --}}
    <div id="rescheduleModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/65 backdrop-blur-xs hidden p-4 sm:p-6 anim-overlay overflow-y-auto">
        <div class="bg-white rounded-3xl w-full max-w-xl shadow-2xl border border-slate-100 anim-modal-pop overflow-hidden my-auto">
            
            <div style="background: linear-gradient(135deg, #0A1628 0%, #152C4B 100%);" class="px-6 py-5 text-white flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/15 border border-white/20 backdrop-blur-xs flex items-center justify-center text-[#14AFC3] flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-black text-base text-white tracking-tight">{{ $isRtl ? 'تعديل موعد المراجع وإشعار المريض' : 'Reschedule & Notify' }}</h3>
                        <p class="text-slate-300 text-[11px]">{{ $isRtl ? 'تحديث وقت الموعد في الطابور وإرسال رسالة فورية' : 'Update time slot & notify patient' }}</p>
                    </div>
                </div>
                <button type="button" onclick="closeModal('rescheduleModal')" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-sm font-bold">✕</button>
            </div>

            <form onsubmit="handleRescheduleSubmit(event)" class="p-6 sm:p-7 space-y-4">
                <div>
                    <label class="block font-black text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'المريض المستهدف' : 'Target Patient' }}</label>
                    <input type="text" id="reschedulePatientDisplay" readonly 
                           class="w-full h-11 px-4 rounded-xl border border-slate-200 bg-slate-50 font-black text-[#152C4B] text-xs">
                </div>

                <div>
                    <label class="block font-black text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'سبب تقديم أو تأخير الموعد' : 'Reason / Condition' }}</label>
                    <select id="rescheduleReason" class="w-full h-11 px-3.5 rounded-xl border border-slate-200 bg-white font-bold text-xs text-slate-800 outline-none focus:border-[#14AFC3]">
                        <option value="urgent">{{ $isRtl ? 'تقديم الموعد: حالة عاجلة تتطلب سرعة الكشف' : 'Advance: Urgent Clinical Condition' }}</option>
                        <option value="traffic">{{ $isRtl ? 'تأخير الموعد: اعتذار المراجع عن التأخر بالطريق' : 'Delay: Patient requested delay' }}</option>
                        <option value="doctor">{{ $isRtl ? 'تعديل حسب جدول الطبيب والعيادة' : 'Physician schedule adjustment' }}</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block font-black text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'التاريخ الجديد' : 'New Date' }}</label>
                        <input type="date" value="{{ date('Y-m-d') }}" 
                               class="w-full h-11 px-3.5 rounded-xl border border-slate-200 bg-white font-mono font-bold text-xs text-slate-800 outline-none focus:border-[#14AFC3]">
                    </div>
                    <div>
                        <label class="block font-black text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'الوقت الجديد' : 'New Time' }}</label>
                        <select id="rescheduleTimeSelect" class="w-full h-11 px-3.5 rounded-xl border border-slate-200 bg-white font-mono font-black text-xs text-slate-800 outline-none focus:border-[#14AFC3]">
                            <option value="09:15 AM">09:15 AM (تقديم 15د)</option>
                            <option value="09:45 AM">09:45 AM (تأخير 15د)</option>
                            <option value="11:30 AM">11:30 AM</option>
                            <option value="01:30 PM">01:30 PM</option>
                        </select>
                    </div>
                </div>

                <div class="p-4 bg-emerald-50/70 border border-emerald-200/80 rounded-2xl space-y-1.5">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" checked id="sendSmsOnReschedule" class="rounded text-emerald-700 focus:ring-0 w-4 h-4">
                        <span class="font-bold text-emerald-900 text-xs">{{ $isRtl ? 'إرسال تنبيه SMS وواتساب فوري للمريض بالموعد الجديد' : 'Send SMS & WhatsApp alert with new time' }}</span>
                    </label>
                    <p class="text-[10.5px] text-emerald-700 {{ $isRtl ? 'mr-6' : 'ml-6' }}">
                        {{ $isRtl ? 'سيتم إشعار المريض بالوقت المعدّل لتجنب ضياع الدور.' : 'Patient will receive automated confirmation immediately.' }}
                    </p>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeModal('rescheduleModal')" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 font-bold hover:bg-slate-100 transition-colors cursor-pointer text-xs">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black text-xs transition-all shadow-md cursor-pointer">
                        {{ $isRtl ? 'حفظ التعديل وإرسال التنبيه' : 'Save & Send SMS' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════
     4. نموذج الطباعة السريري الرسمي لقسيمة الطابور A4
     ══════════════════════════════════════════════ --}}
<div id="officialQueuePrintSlip" class="hidden" dir="rtl">
    <div style="font-family: 'Cairo', 'Segoe UI', Tahoma, sans-serif; background-color: #ffffff; color: #111827; padding: 25px 30px; max-width: 800px; margin: 0 auto; line-height: 1.5;">

        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 3px double #152C4B; padding-bottom: 14px; margin-bottom: 18px;">
            <div style="text-align: right; width: 33%;">
                <div style="font-size: 13px; font-weight: 900; color: #152C4B; margin-bottom: 2px;">الجمهورية اليمنية</div>
                <div style="font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 2px;">وزارة الصحة العامة والسكان</div>
                <div style="font-size: 13.5px; font-weight: 900; color: #0C6B78; margin-bottom: 2px;">مستشفى الرشيد التخصصي</div>
                <div style="font-size: 11px; font-weight: 700; color: #152C4B;">شاشة طابور واستدعاء العيادات</div>
            </div>

            <div style="text-align: center; width: 34%;">
                <div style="display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px; border-radius: 16px; background-color: #E5FAFC; border: 2px solid #0C6B78; margin-bottom: 4px;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#0C6B78" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12h18M3 6h18M3 18h12"/>
                    </svg>
                </div>
                <div style="font-size: 10px; font-weight: 900; color: #152C4B; letter-spacing: 0.5px;">AL-RASHEED HOSPITAL</div>
                <div style="font-size: 8.5px; font-weight: bold; color: #0C6B78;">LIVE QUEUE TICKET</div>
            </div>

            <div style="text-align: left; width: 33%; direction: ltr;">
                <div style="font-size: 12px; font-weight: 900; color: #152C4B; margin-bottom: 2px;">REPUBLIC OF YEMEN</div>
                <div style="font-size: 10.5px; font-weight: 700; color: #475569; margin-bottom: 2px;">Ministry of Public Health & Population</div>
                <div style="font-size: 12.5px; font-weight: 900; color: #0C6B78; margin-bottom: 2px;">Al-Rasheed Specialized Hospital</div>
                <div style="font-size: 10px; font-weight: 700; color: #152C4B;">Live Queue & Triage Board</div>
            </div>
        </div>

        <div style="background-color: #152C4B; color: #ffffff; border-radius: 10px; padding: 10px 18px; margin-bottom: 16px; display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h2 style="font-size: 15px; font-weight: 900; margin: 0;">تذكرة دخول واستدعاء مراجع (طابور اليوم)</h2>
                <div style="font-size: 10px; color: #99f6e4; font-weight: 600; margin-top: 2px;">LIVE TRIAGE CALLING & QUEUE SLIP</div>
            </div>
            <div style="text-align: left; direction: ltr;">
                <div style="background-color: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25); border-radius: 6px; padding: 3px 10px; font-family: monospace; font-size: 12px; font-weight: 900; color: #ffffff;">
                    <span id="prQueueSlipNumber">QUEUE-{{ date('Y') }}-{{ rand(100, 999) }}</span>
                </div>
            </div>
        </div>

        <div style="background: linear-gradient(135deg, #E5FAFC 0%, #f0fdfa 100%); border: 2px dashed #0C6B78; border-radius: 14px; padding: 16px; margin-bottom: 16px; text-align: center;">
            <div style="font-size: 11px; font-weight: 800; color: #475569;">رقم الدور المعتمد في شاشات الانتظار</div>
            <div style="font-size: 40px; font-weight: 900; color: #0C6B78; font-family: monospace; margin: 4px 0;" id="prQToken">#A-101</div>
            <div style="font-size: 13px; font-weight: 900; color: #152C4B;" id="prQClinic">عيادة الباطنية 204 · د. خالد المنصور</div>
        </div>

        <div style="border: 1.5px solid #0C6B78; border-radius: 10px; overflow: hidden; margin-bottom: 16px;">
            <div style="background-color: #E5FAFC; border-bottom: 1px solid #0C6B78; padding: 6px 14px; font-size: 11px; font-weight: 900; color: #0C6B78;">
                بيانات المراجع ووقت الحضور (Patient Admission Info)
            </div>
            <table style="width: 100%; border-collapse: collapse; font-size: 11.5px;">
                <tbody>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569; width: 20%;">اسم المريض:</td>
                        <td style="padding: 7px 12px; font-weight: 900; color: #152C4B; width: 30%; font-size: 13px;" id="prQPatient">أحمد محمد الجهمي</td>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569; width: 20%;">رقم الملف MRN:</td>
                        <td style="padding: 7px 12px; font-weight: 900; color: #0C6B78; font-family: monospace; width: 30%;" id="prQMRN">MRN-88421</td>
                    </tr>
                    <tr>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">وقت الموعد:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #334155; font-family: monospace;" id="prQTime">08:30 AM</td>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">تاريخ اليوم:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #334155;">{{ now()->format('Y-m-d') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="border: 1px dashed #0C6B78; border-radius: 10px; padding: 10px 14px; margin-bottom: 16px; background-color: #fafbfc; font-size: 10.5px; color: #334155; line-height: 1.6;">
            <strong>توجيه المراجع:</strong> سيظهر رقمك على الشاشة الإلكترونية المقابلة للعيادة. يرجى الدخول فور نداء رقمك.
        </div>

        <div style="display: flex; align-items: flex-end; justify-content: space-between; border-top: 1.5px solid #cbd5e1; padding-top: 14px; margin-bottom: 14px;">
            <div style="text-align: right; width: 33%;">
                <div style="font-size: 11px; font-weight: 800; color: #64748b;">اعتماد مكتب الاستقبال:</div>
                <div style="font-size: 12px; font-weight: 900; color: #152C4B; margin-top: 4px;">{{ Auth::user()->name ?? 'مكتب الاستقبال' }}</div>
            </div>
            <div style="text-align: center; width: 34%;">
                <div style="display: inline-block; width: 70px; height: 70px; border: 2px dashed #0C6B78; border-radius: 50%; padding: 3px; box-sizing: border-box; text-align: center;">
                    <div style="width: 100%; height: 100%; border: 1px solid #0C6B78; border-radius: 50%; display: flex; flex-direction: column; align-items: center; justify-content: center; font-size: 7px; font-weight: 900; color: #0C6B78;">
                        <span>مستشفى الرشيد</span>
                        <span style="font-size: 8px; color: #152C4B;">★ طابور العيادات ★</span>
                    </div>
                </div>
            </div>
            <div style="text-align: left; width: 33%; direction: ltr;">
                <div style="font-size: 10px; font-weight: 800; color: #64748b;">Live Token Slip:</div>
                <div style="margin-top: 4px; letter-spacing: 2px; font-family: monospace; font-weight: 900; font-size: 11px; color: #152C4B;">
                    |||||| | |||| || |||||| |
                </div>
            </div>
        </div>

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
        from { opacity: 0; transform: scale(0.95) translateY(10px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    .anim-modal-pop {
        animation: modalScaleInAnim 0.24s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    @keyframes overlayFadeInAnim {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .anim-overlay {
        animation: overlayFadeInAnim 0.2s ease-out forwards;
    }

    .appt-tab-btn {
        position: relative;
        transform: translateZ(0);
        will-change: transform;
    }
    .appt-tab-btn:hover:not(.active) {
        transform: translateY(-1px);
    }
    .appt-tab-btn:active {
        transform: scale(0.96);
    }

    /* ستايل صف السحب */
    .drag-over {
        border-top: 2px solid #0C6B78 !important;
        background-color: #E5FAFC !important;
    }

    /* ══════════════════════════════════════════════════
       قواعد الطباعة الرسمية الصارمة A4
       ══════════════════════════════════════════════════ */
    @media print {
        @page {
            size: A4 portrait;
            margin: 8mm 10mm;
        }

        html, body {
            background: #ffffff !important;
            color: #111827 !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        body > *:not(#officialQueuePrintSlip) {
            display: none !important;
        }

        .no-print, #main-sidebar, header, nav, aside, [id$="Modal"], [id$="Toast"], #notificationsDropdown {
            display: none !important;
        }

        #officialQueuePrintSlip {
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

        #officialQueuePrintSlip * {
            visibility: visible !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    }
</style>

{{-- =========================================================================
     الجافاسكريبت: السحب والإفلات التفاعلي والتقديم/التأخير والطباعة
     ========================================================================= --}}
<script>
    function showToast(msg) {
        const toast = document.getElementById('apptActionToast');
        const msgEl = document.getElementById('apptActionToastMsg');
        if (msgEl) msgEl.innerText = msg;
        if (toast) {
            toast.classList.remove('opacity-0', '-translate-y-16', 'pointer-events-none');
            toast.classList.add('opacity-100', 'translate-y-0');
            setTimeout(() => {
                toast.classList.add('opacity-0', '-translate-y-16', 'pointer-events-none');
                toast.classList.remove('opacity-100', 'translate-y-0');
            }, 3500);
        }
    }

    function openNewAppointmentModal() {
        document.getElementById('newAppointmentModal').classList.remove('hidden');
    }

    function closeModal(id) {
        const el = document.getElementById(id);
        if (el) el.classList.add('hidden');
    }

    function handleSaveAppointment(e) {
        e.preventDefault();
        closeModal('newAppointmentModal');
        const patient = document.getElementById('newApptPatient').value.trim();
        const mrn = document.getElementById('newApptMRN').value.trim() || 'MRN-' + Math.floor(10000 + Math.random() * 90000);
        const clinic = document.getElementById('newApptClinic').value;
        const time = document.getElementById('newApptTime').value;
        const type = document.getElementById('newApptType').value;
        const token = '#A-' + Math.floor(107 + Math.random() * 20);
        const doctor = clinic.includes('باطنية') ? 'د. خالد المنصور' : (clinic.includes('قلب') ? 'د. طارق الدوسري' : (clinic.includes('نساء') ? 'د. أروى العريقي' : 'د. نزار صالح الحكيمي'));

        // تحديث العداد
        const totalEl = document.getElementById('statTotalQueue');
        if (totalEl) totalEl.innerText = parseInt(totalEl.innerText) + 1;

        // إدراج السطر بالطابور ديناميكياً بنفس الدقة
        const tbody = document.getElementById('appointmentsTableBody');
        if (tbody) {
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-[#E5FAFC]/35 transition-all duration-150 group appt-row cursor-grab active:cursor-grabbing bg-teal-50/20';
            tr.draggable = true;
            tr.setAttribute('data-patient', patient);
            tr.setAttribute('data-phone', '771234567');
            tr.setAttribute('data-token', token);
            tr.setAttribute('data-time', time);
            tr.setAttribute('data-period', time.includes('PM') ? 'afternoon' : 'morning');
            tr.setAttribute('data-status', 'confirmed');
            tr.setAttribute('data-search', (patient + ' ' + mrn + ' ' + doctor + ' ' + clinic + ' ' + token).toLowerCase());
            tr.innerHTML = `
                <td class="w-[5%] py-4 px-3 text-center text-slate-300 group-hover:text-[#0C6B78] transition-colors">
                    <svg class="w-4 h-4 mx-auto" fill="currentColor" viewBox="0 0 24 24"><circle cx="9" cy="6" r="1.5"/><circle cx="15" cy="6" r="1.5"/><circle cx="9" cy="12" r="1.5"/><circle cx="15" cy="12" r="1.5"/><circle cx="9" cy="18" r="1.5"/><circle cx="15" cy="18" r="1.5"/></svg>
                </td>
                <td class="w-[15%] py-4 px-3 whitespace-nowrap text-right">
                    <div><span class="inline-flex items-center px-2.5 py-0.5 rounded-lg font-mono font-black text-xs bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30 shadow-2xs">${token}</span></div>
                    <div class="text-xs font-mono font-black text-slate-700 appt-time-display flex items-center gap-1.5 mt-1">
                        <svg class="w-3.5 h-3.5 text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>
                        <span>${time}</span>
                    </div>
                </td>
                <td class="w-[26%] px-4 py-4 whitespace-nowrap text-right">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-[#E5FAFC] to-[#CCF4F8] text-[#0C6B78] border border-[#14AFC3]/30 flex items-center justify-center font-black text-sm flex-shrink-0 group-hover:scale-105 transition-transform shadow-2xs">
                            ${patient.charAt(0)}
                        </div>
                        <div class="min-w-0">
                            <div class="font-black text-[#152C4B] text-[13.5px] sm:text-[14px] hover:text-[#0C6B78] transition-colors leading-snug truncate">${patient}</div>
                            <div class="mt-1">
                                <span class="inline-flex items-center font-mono font-bold text-[11px] px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-700 border border-slate-200/80"><bdi dir="ltr">${mrn}</bdi></span>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="w-[22%] px-4 py-4 whitespace-nowrap text-right">
                    <div class="font-black text-[#152C4B] text-[13px] leading-snug">${doctor}</div>
                    <div class="text-xs text-slate-500 font-semibold mt-1 flex items-center gap-1.5">
                        <span>${clinic}</span>
                        <span class="text-slate-300">·</span>
                        <span class="inline-flex items-center text-[10.5px] font-bold text-[#0C6B78] bg-[#E5FAFC] px-1.5 py-0.5 rounded border border-[#14AFC3]/20">${type === 'urgent' ? 'أولوية عاجلة' : 'كشف اعتيادي'}</span>
                    </div>
                </td>
                <td class="w-[16%] px-3 py-4 text-center whitespace-nowrap status-cell">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-black bg-sky-50 text-sky-700 border border-sky-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-500"></span>
                        <span>مؤكد (قادم)</span>
                    </span>
                </td>
                <td class="w-[16%] px-4 py-4 text-center whitespace-nowrap actions-cell">
                                <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                        <button type="button" onclick="printOfficialQueueSlip('${token}', '${patient}', '${mrn}', '${doctor}', '${clinic}', '${time}')" title="طباعة تذكرة الانتظار" class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#0C6B78] dark:text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        </button>
                    </div>
                </td>
            `;
            tbody.insertBefore(tr, tbody.firstChild);
            initDragAndDrop();
        }

        const sendSms = document.getElementById('sendSmsOnCreate').checked;
        if (sendSms) {
            showToast('{{ $isRtl ? "تم إدراج الموعد في الطابور وإرسال تنبيه SMS وواتساب للمريض برقم التذكرة!" : "Slot queued and SMS alert sent to patient!" }}');
        } else {
            showToast('{{ $isRtl ? "تم إدراج الموعد في الطابور بنجاح." : "Slot queued successfully." }}');
        }

        setTimeout(() => {
            printOfficialQueueSlip(token, patient, mrn, doctor, clinic, time);
        }, 300);
    }

    // زر التقديم السريع 15 دقيقة
    function advanceSlot(patient, phone, btn) {
        showToast('{{ $isRtl ? "تم تقديم موعد المريض: " : "Advanced slot for: " }}' + patient + ' {{ $isRtl ? "بـ 15 دقيقة، وجاري إرسال إشعار SMS لجواله (" : "by 15m. SMS sent to (" }}' + phone + ')');
        const row = btn.closest('tr');
        const timeEl = row.querySelector('.appt-time-display span');
        if (timeEl) timeEl.innerText = '08:45 AM';
    }

    // زر التأخير السريع 15 دقيقة
    function delaySlot(patient, phone, btn) {
        showToast('{{ $isRtl ? "تم تأخير موعد المريض: " : "Delayed slot for: " }}' + patient + ' {{ $isRtl ? "بـ 15 دقيقة، وجاري إرسال إشعار SMS لجواله (" : "by 15m. SMS sent to (" }}' + phone + ')');
        const row = btn.closest('tr');
        const timeEl = row.querySelector('.appt-time-display span');
        if (timeEl) timeEl.innerText = '09:45 AM';
    }

    // فتح نافذة إعادة الجدولة
    function openRescheduleModal(patient, phone, time, doctor) {
        document.getElementById('reschedulePatientDisplay').value = patient + ' (' + phone + ') — ' + time;
        document.getElementById('rescheduleModal').classList.remove('hidden');
    }

    function handleRescheduleSubmit(e) {
        e.preventDefault();
        closeModal('rescheduleModal');
        const newTime = document.getElementById('rescheduleTimeSelect').value;
        const sendSms = document.getElementById('sendSmsOnReschedule').checked;
        if (sendSms) {
            showToast('{{ $isRtl ? "تم تعديل الموعد إلى " : "Rescheduled to " }}' + newTime + ' {{ $isRtl ? "وإرسال إشعار SMS للمريض بالموعد الجديد!" : "and SMS notification sent!" }}');
        } else {
            showToast('{{ $isRtl ? "تم تعديل الموعد بنجاح." : "Appointment rescheduled." }}');
        }
    }

    // طباعة تذكرة الطابور الرسمية بنقل العنصر إلى الجذر لضمان عدم ظهور صفحات بيضاء
    function printOfficialQueueSlip(token, patient, mrn, doctor, clinic, time) {
        document.getElementById('prQToken').innerText = token || '#A-101';
        document.getElementById('prQPatient').innerText = patient || 'أحمد محمد الجهمي';
        document.getElementById('prQMRN').innerText = mrn || 'MRN-88421';
        document.getElementById('prQClinic').innerText = (clinic || 'عيادة الباطنية 204') + ' · ' + (doctor || 'د. خالد المنصور');
        document.getElementById('prQTime').innerText = time || '08:30 AM';

        const printEl = document.getElementById('officialQueuePrintSlip');
        if (!printEl) return;

        const originalParent = printEl.parentNode;
        const originalNextSibling = printEl.nextSibling;

        // نقل السند مباشرة إلى body
        document.body.appendChild(printEl);
        printEl.classList.remove('hidden');

        window.print();

        // إعادة السند إلى مكانه الأصلي بعد الطباعة
        setTimeout(() => {
            printEl.classList.add('hidden');
            if (originalNextSibling) {
                originalParent.insertBefore(printEl, originalNextSibling);
            } else {
                originalParent.appendChild(printEl);
            }
        }, 800);
    }

    // ==========================================
    // برمجة السحب والإفلات التفاعلي (Drag & Drop)
    // ==========================================
    let draggedRow = null;

    function initDragAndDrop() {
        const rows = document.querySelectorAll('.appt-row');
        rows.forEach(row => {
            row.addEventListener('dragstart', function(e) {
                draggedRow = this;
                e.dataTransfer.effectAllowed = 'move';
                this.classList.add('opacity-40', 'bg-[#E5FAFC]');
            });

            row.addEventListener('dragover', function(e) {
                e.preventDefault();
                e.dataTransfer.dropEffect = 'move';
                this.classList.add('drag-over');
            });

            row.addEventListener('dragleave', function() {
                this.classList.remove('drag-over');
            });

            row.addEventListener('drop', function(e) {
                e.stopPropagation();
                this.classList.remove('drag-over');
                if (draggedRow && draggedRow !== this) {
                    const tbody = document.getElementById('appointmentsTableBody');
                    tbody.insertBefore(draggedRow, this);
                    const pName = draggedRow.getAttribute('data-patient');
                    const pPhone = draggedRow.getAttribute('data-phone');
                    showToast('{{ $isRtl ? "تم تعديل موعد المريض (" : "Slot updated for (" }}' + pName + '{{ $isRtl ? ") بالسحب وإرسال إشعار SMS تلقائي إلى (" : ") via drag! SMS dispatched to (" }}' + pPhone + ')');
                }
                return false;
            });

            row.addEventListener('dragend', function() {
                this.classList.remove('opacity-40', 'bg-[#E5FAFC]');
                document.querySelectorAll('.appt-row').forEach(r => r.classList.remove('drag-over'));
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initDragAndDrop);

    // مقلب الأيام
    let dayOffset = 0;
    function changeDay(delta) {
        dayOffset += delta;
        const d = new Date();
        d.setDate(d.getDate() + dayOffset);
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('displayScheduleDate').innerText = d.toLocaleDateString('{{ $isRtl ? "ar-SA" : "en-US" }}', options);
    }

    // البحث الفوري
    function searchApptTable() {
        const query = document.getElementById('apptSearchInput').value.toLowerCase();
        const rows = document.querySelectorAll('.appt-row');
        rows.forEach(row => {
            const data = row.getAttribute('data-search') || '';
            row.style.display = data.includes(query) ? '' : 'none';
        });
    }

    // تصفية الفترات
    function filterApptPeriod(type, btn) {
        document.querySelectorAll('.appt-tab-btn').forEach(b => {
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

        const rows = document.querySelectorAll('.appt-row');
        rows.forEach(row => {
            const period = row.getAttribute('data-period');
            const status = row.getAttribute('data-status');
            if (type === 'all') {
                row.style.display = '';
            } else if (type === 'checked_in') {
                row.style.display = (status === 'checked_in') ? '' : 'none';
            } else if (period === type) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // إغلاق المودالات بزر Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal('newAppointmentModal');
            closeModal('rescheduleModal');
        }
    });
</script>
@endsection
