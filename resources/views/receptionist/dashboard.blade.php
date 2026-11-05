
@extends('layouts.dashboard')
@php
    $isRtl = app()->getLocale() === 'ar';

    /* إحصائيات مكتب الاستقبال لليوم */
    $stats = $stats ?? [
        'registered_today'   => 24,
        'appointments_today' => 42,
        'in_queue'           => 8,
        'checked_in'         => 31,
    ];

    /* طابور استقبال ومواعيد اليوم المباشر */
    $queue = $queue ?? [
        [
            'num'          => 1,
            'token'        => '#A-101',
            'patient'      => $isRtl ? 'أحمد محمد الجهمي' : 'Ahmed Mohammed Al-Jahmi',
            'patient_id'   => 'MRN-88421',
            'national_id'  => '1088492011',
            'doctor'       => $isRtl ? 'د. خالد المنصور' : 'Dr. Khaled Al-Mansoor',
            'clinic'       => $isRtl ? 'عيادة الباطنية 204' : 'Internal Med 204',
            'time'         => '09:00 AM',
            'status'       => 'checked_in',
            'status_label' => $isRtl ? 'حاضر بالانتظار' : 'Waiting in Lobby',
        ],
        [
            'num'          => 2,
            'token'        => '#A-102',
            'patient'      => $isRtl ? 'بلقيس حميد الحبيشي' : 'Balqees Hameed Al-Hubaishi',
            'patient_id'   => 'MRN-88435',
            'national_id'  => '1099234812',
            'doctor'       => $isRtl ? 'د. طارق الدوسري' : 'Dr. Tariq Al-Dosari',
            'clinic'       => $isRtl ? 'عيادة القلب 206' : 'Cardiology 206',
            'time'         => '09:30 AM',
            'status'       => 'in_consultation',
            'status_label' => $isRtl ? 'داخل غرفة الكشف' : 'In Exam Room',
        ],
        [
            'num'          => 3,
            'token'        => '#A-103',
            'patient'      => $isRtl ? 'بشير عبدالكريم الوصابي' : 'Basheer Abdulkarim Al-Wesabi',
            'patient_id'   => 'MRN-88448',
            'national_id'  => '1077123904',
            'doctor'       => $isRtl ? 'د. أروى العريقي' : 'Dr. Arwa Al-Ariqi',
            'clinic'       => $isRtl ? 'عيادة النساء والولادة 102' : 'OB/GYN 102',
            'time'         => '10:00 AM',
            'status'       => 'scheduled',
            'status_label' => $isRtl ? 'مجدول (بانتظار الوصول)' : 'Scheduled',
        ],
        [
            'num'          => 4,
            'token'        => '#A-104',
            'patient'      => $isRtl ? 'فاطمة صالح الذماري' : 'Fatima Saleh Al-Dhamari',
            'patient_id'   => 'MRN-88456',
            'national_id'  => '1044321980',
            'doctor'       => $isRtl ? 'د. خالد المنصور' : 'Dr. Khaled Al-Mansoor',
            'clinic'       => $isRtl ? 'عيادة الباطنية 204' : 'Internal Med 204',
            'time'         => '10:30 AM',
            'status'       => 'scheduled',
            'status_label' => $isRtl ? 'مجدول (بانتظار الوصول)' : 'Scheduled',
        ],
        [
            'num'          => 5,
            'token'        => '#A-105',
            'patient'      => $isRtl ? 'عمار ياسر الأهدل' : 'Ammar Yasser Al-Ahdal',
            'patient_id'   => 'MRN-88490',
            'national_id'  => '1033215678',
            'doctor'       => $isRtl ? 'د. طارق الدوسري' : 'Dr. Tariq Al-Dosari',
            'clinic'       => $isRtl ? 'عيادة القلب 206' : 'Cardiology 206',
            'time'         => '11:00 AM',
            'status'       => 'checked_in',
            'status_label' => $isRtl ? 'حاضر بالانتظار' : 'Waiting in Lobby',
        ],
    ];

    /* العيادات المتاحة للحجز والتوجيه السريع اليوم */
    $availableClinics = $availableClinics ?? [
        ['name' => $isRtl ? 'عيادة الباطنية والسكري (د. خالد)' : 'Internal Med (Dr. Khaled)', 'room' => '204', 'slots' => 4],
        ['name' => $isRtl ? 'عيادة القلب والأوعية (د. طارق)' : 'Cardiology (Dr. Tariq)', 'room' => '206', 'slots' => 2],
        ['name' => $isRtl ? 'عيادة النساء والولادة (د. أروى)' : 'OB/GYN (Dr. Arwa)', 'room' => '102', 'slots' => 6],
    ];
@endphp
@section('page-title', $isRtl ? 'لوحة تحكم مكتب الاستقبال' : 'Receptionist Dashboard')
@section('role-label', $isRtl ? 'خدمات المرضى والاستقبال' : 'Front Desk Reception')
{{-- ========================================================================= روابط القائمة الجانبية (مفعلة بالكامل لمكتب الاستقبال) ========================================================================= --}}
@section('sidebar-links') <x-sidebar-link :href="route('receptionist.dashboard')" :active="request()->routeIs('receptionist.dashboard')"> <x-slot:icon>
<svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"> <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/> <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
</svg> </x-slot:icon> {{ $isRtl ? 'لوحة التحكم' : 'Dashboard' }} </x-sidebar-link> <x-sidebar-link :href="route('receptionist.patients.index')" :active="request()->routeIs('receptionist.patients.*')"> <x-slot:icon>
<svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
</svg> </x-slot:icon> {{ $isRtl ? 'سجل المرضى والملفات' : 'Patients Registry' }} </x-sidebar-link> <x-sidebar-link :href="route('receptionist.appointments.index')" :active="request()->routeIs('receptionist.appointments.*')"> <x-slot:icon>
<svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"> <rect x="3" y="4" width="18" height="18" rx="2"/>
<path d="M16 2v4M8 2v4M3 10h18"/>
</svg> </x-slot:icon> {{ $isRtl ? 'جدول المواعيد والحجوزات' : 'Appointments' }} </x-sidebar-link> <x-sidebar-link :href="route('receptionist.queue.index')" :active="request()->routeIs('receptionist.queue.*')"> <x-slot:icon>
<svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
<path d="M3 12h18M3 6h18M3 18h12"/>
</svg> </x-slot:icon> {{ $isRtl ? 'طابور الانتظار المباشر' : 'Live Queue' }} </x-sidebar-link>
<div class="pt-3.5 mt-3.5 border-t border-white/10"> <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')"> <x-slot:icon>
<svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"> <circle cx="12" cy="12" r="3"/>
<path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83-2.83l-.06-.06a1.65 1.65 0 0 0-.33 1.82V9c.36.24.7.53 1 .87"/>
</svg> </x-slot:icon> {{ $isRtl ? 'إعدادات الحساب' : 'Account Settings' }} </x-sidebar-link>
</div>
@endsection
@section('content')
{{-- الحاوية الرئيسية مع التباعد الموحد القياسي --}}
<div class="-mt-3 sm:-mt-5 lg:-mt-6 space-y-5 pb-8 font-sans recep-page-fade-in no-print" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
{{-- نافذة الإشعار التفاعلية العائمة (Animated Floating Toast) --}}
<div id="recepToast" class="fixed top-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 transform -translate-y-16 opacity-0 transition-all duration-300 pointer-events-none">
<div class="bg-[#152C4B] text-white px-4 py-2.5 rounded-xl shadow-xl border border-[#14AFC3]/30 flex items-center gap-2.5 text-xs">
<div class="w-6 h-6 rounded-full bg-[#14AFC3]/20 flex items-center justify-center text-[#14AFC3] flex-shrink-0">
<svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
</svg>
</div> <span id="recepToastMsg" class="font-medium">تمت العملية بنجاح</span>
</div>
</div>
{{-- ══════════════════════════════════════════════ 1. الشريط العلوي الموحد (Unified Reception Header) ══════════════════════════════════════════════ --}}
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
<div>
<div class="flex items-center gap-2.5 flex-wrap"> <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] inline-block shadow-xs"></span>
<h1 class="text-2xl font-black text-[#152C4B] tracking-tight"> {{ $isRtl ? 'لوحة تحكم مكتب الاستقبال' : 'Receptionist Dashboard' }}
</h1> <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100 flex-shrink-0"> {{ $isRtl ? 'خدمات المرضى والاستقبال' : 'Front Desk Reception' }} </span>
</div>
<p class="text-sm text-slate-500 mt-1"> {{ $isRtl ? 'مرحباً بك — تسجيل المراجعين، تأكيد الحضور، وتوجيه حركة طابور الانتظار للعيادات السريرية.' : 'Welcome back — Register patients, confirm arrival, and manage clinic queue flow.' }}
</p>
</div>
{{-- أزرار الإجراءات السريعة الموحدة والتاريخ --}}
<div class="flex items-center gap-2.5 flex-wrap">
{{-- زر فتح ملف مريض جديد --}}
<button type="button" onclick="openRegisterPatientModal()"  class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white text-xs font-bold shadow-xs hover:shadow-md hover:scale-101 active:scale-98 transition-all cursor-pointer">
<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
</svg> <span>{{ $isRtl ? 'فتح ملف مريض جديد' : 'New Patient File' }}</span>
</button>
{{-- زر تأكيد حضور مريض --}}
<button type="button" onclick="openCheckInModal()"  class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-slate-200 text-xs font-bold text-[#152C4B] hover:bg-[#E5FAFC] hover:text-[#0C6B78] hover:border-[#14AFC3]/40 shadow-xs transition-all cursor-pointer">
<svg class="w-4 h-4 text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg> <span>{{ $isRtl ? 'تأكيد حضور مريض' : 'Check-In Patient' }}</span>
</button>
{{-- شريحة التاريخ الموحدة --}}
<div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-white border border-slate-200 text-xs font-semibold text-slate-600 shadow-xs">
<svg class="w-4 h-4 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
</svg> <span>{{ now()->locale($isRtl ? 'ar' : 'en')->isoFormat('dddd، D MMMM YYYY') }}</span>
</div>
</div>
</div>
{{-- ══════════════════════════════════════════════ 2. بطاقات الإحصائيات الأربع المتناسقة (Standard 4 KPI Cards) ══════════════════════════════════════════════ --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
{{-- Card 1: Solid Teal Featured Card --}}
<div class="relative overflow-hidden rounded-2xl p-6 text-white text-center shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center bg-[#0C6B78]">
<div class="absolute -right-4 -top-4 w-24 h-24 rounded-full bg-white/10 pointer-events-none">
</div>
<div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center mb-2.5 text-white">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
</svg>
</div> <span class="text-[11px] font-extrabold uppercase tracking-widest text-teal-100"> {{ $isRtl ? 'ملفات فُتحت اليوم' : 'REGISTERED TODAY' }} </span>
<div class="text-3xl sm:text-4xl font-extrabold text-white my-2 tracking-tight font-mono" id="kpiRegisteredToday"> {{ $stats['registered_today'] ?? 24 }}
</div>
<div class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-white/20 text-white backdrop-blur-xs"> <span>{{ $isRtl ? 'سجل المراجعين نشط' : 'Patient Registry Active' }}</span>
</div>
</div>
{{-- Card 2: Appointments Today --}}
<div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
<div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"> <rect x="3" y="4" width="18" height="18" rx="2"/>
<path stroke-linecap="round" stroke-linejoin="round" d="M16 2v4M8 2v4M3 10h18"/>
</svg>
</div> <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400"> {{ $isRtl ? 'مواعيد العيادات اليوم' : 'APPOINTMENTS TODAY' }} </span>
<div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono" id="kpiAppointmentsToday"> {{ $stats['appointments_today'] ?? 42 }}
</div>
<div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]"> <span>{{ $isRtl ? 'موزعة على كافة التخصصات' : 'Across all clinics' }}</span>
</div>
</div>
{{-- Card 3: In Waiting Lobby --}}
<div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
<div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M3 6h18M3 18h12"/>
</svg>
</div> <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400"> {{ $isRtl ? 'في صالة الانتظار الآن' : 'IN WAITING LOBBY' }} </span>
<div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono" id="kpiInQueue"> {{ $stats['in_queue'] ?? 8 }}
</div>
<div class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700"> <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> <span>{{ $isRtl ? 'حاضرون وجاهزون للكشف' : 'Ready for consult' }}</span>
</div>
</div>
{{-- Card 4: Attendance Confirmed --}}
<div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
<div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>
</div> <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400"> {{ $isRtl ? 'تم تأكيد حضورهم' : 'CHECKED IN' }} </span>
<div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono" id="kpiCheckedIn"> {{ $stats['checked_in'] ?? 31 }}
</div>
<div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]"> <span>{{ $isRtl ? 'أنهوا الفحص أو داخل الغرفة' : 'In exam room or done' }}</span>
</div>
</div>
</div>
{{-- ══════════════════════════════════════════════ 3. التخطيط الرئيسي: جدول الطابور + عمود الأدوات الجانبي (items-start تمنع استطالة الفراغ السفلي) ══════════════════════════════════════════════ --}}
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
{{-- ── COLUMN 1 (lg:col-span-8): طابور كشوفات واستقبال اليوم المنسق ── --}}
<div class="lg:col-span-8 bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
{{-- ترويسة الجدول والتبويبات المطورة والبحث المباشر --}}
<div class="p-5 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
<div>
<div class="flex items-center gap-2.5 flex-wrap">
<h2 class="text-base sm:text-lg font-black text-[#152C4B] tracking-tight"> {{ $isRtl ? 'طابور كشوفات واستقبال اليوم' : "Today's Reception Queue" }}
</h2> <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100 flex-shrink-0" id="queueCountBadge"> {{ count($queue) }} {{ $isRtl ? 'مراجعين بالقائمة' : 'patients in queue' }} </span>
</div>
<p class="text-xs text-slate-400 font-medium mt-0.5 flex items-center gap-1.5">
<svg class="w-3.5 h-3.5 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg> <span>{{ $isRtl ? 'متابعة مباشرة لتدفق المراجعين حسب أولوية الحجز والحضور' : 'Live triage flow sorted by arrival and priority' }}</span>
</p>
</div>
<div class="flex items-center gap-3 flex-wrap sm:flex-nowrap">
{{-- تبويبات التصفية الفورية المطورة والبارزة بألوان المشروع وأنيميشن سلس --}}
<div class="flex items-center gap-1.5 bg-slate-100/90 p-1.5 rounded-2xl border border-slate-200/60 shadow-inner">
<button type="button" onclick="filterQueueStatus('all', this)"  class="q-tab-btn active px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all duration-300 ease-out flex items-center gap-1.5 cursor-pointer bg-[#0C6B78] text-white shadow-md shadow-[#0C6B78]/25 scale-[1.02]"> <span>{{ $isRtl ? 'الكل' : 'All' }}</span> <span class="q-tab-counter px-1.5 py-0.2 rounded-full text-[10px] font-mono font-bold bg-white/20 text-white">5</span>
</button>
<button type="button" onclick="filterQueueStatus('checked_in', this)"  class="q-tab-btn px-3.5 py-1.5 rounded-xl text-xs font-bold text-slate-600 hover:text-[#152C4B] hover:bg-white/70 transition-all duration-300 ease-out flex items-center gap-1.5 cursor-pointer"> <span>{{ $isRtl ? 'بالانتظار' : 'Waiting' }}</span> <span class="q-tab-counter px-1.5 py-0.2 rounded-full text-[10px] font-mono font-bold bg-slate-200/80 text-slate-600">2</span>
</button>
<button type="button" onclick="filterQueueStatus('in_consultation', this)"  class="q-tab-btn px-3.5 py-1.5 rounded-xl text-xs font-bold text-slate-600 hover:text-[#152C4B] hover:bg-white/70 transition-all duration-300 ease-out flex items-center gap-1.5 cursor-pointer"> <span>{{ $isRtl ? 'بالكشف' : 'In Exam' }}</span> <span class="q-tab-counter px-1.5 py-0.2 rounded-full text-[10px] font-mono font-bold bg-slate-200/80 text-slate-600">1</span>
</button>
<button type="button" onclick="filterQueueStatus('scheduled', this)"  class="q-tab-btn px-3.5 py-1.5 rounded-xl text-xs font-bold text-slate-600 hover:text-[#152C4B] hover:bg-white/70 transition-all duration-300 ease-out flex items-center gap-1.5 cursor-pointer"> <span>{{ $isRtl ? 'مجدول' : 'Scheduled' }}</span> <span class="q-tab-counter px-1.5 py-0.2 rounded-full text-[10px] font-mono font-bold bg-slate-200/80 text-slate-600">2</span>
</button>
</div>
{{-- حقل البحث السريع بالجدول --}}
<div class="relative w-full sm:w-48">
<svg class="w-4 h-4 absolute {{ $isRtl ? 'right-3' : 'left-3' }} top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"> <circle cx="11" cy="11" r="8"/>
<path stroke-linecap="round" d="m21 21-4.35-4.35"/>
</svg> <input type="text"  id="queueTableSearch" onkeyup="filterQueueTable()" placeholder="{{ $isRtl ? 'بحث بالمريض أو السجل...' : 'Search patient or MRN...' }}"  class="w-full {{ $isRtl ? 'pr-9 pl-3' : 'pl-9 pr-3' }} py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-[#152C4B] placeholder-slate-400 focus:bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all">
</div>
</div>
</div>
{{-- جدول الطابور المتوازن والمنسق 1:1 --}}
<div class="overflow-x-auto">
<table class="w-full text-xs table-fixed min-w-[700px] border-collapse" id="receptionQueueTable">
<thead>
<tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
<th class="w-[28%] px-5 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap"> {{ $isRtl ? 'المريض والسجل' : 'Patient & MRN' }}
</th>
<th class="w-[18%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap"> {{ $isRtl ? 'الدور والموعد' : 'Token & Time' }}
</th>
<th class="w-[24%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap"> {{ $isRtl ? 'العيادة والطبيب' : 'Clinic & Doctor' }}
</th>
<th class="w-[16%] px-3 py-3.5 text-center whitespace-nowrap"> {{ $isRtl ? 'الحالة' : 'Status' }}
</th>
<th class="w-[14%] px-4 py-3.5 text-center whitespace-nowrap"> {{ $isRtl ? 'الإجراءات' : 'Actions' }}
</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 text-slate-700 bg-white" id="receptionQueueTableBody">
@forelse($queue as $row)
<tr class="hover:bg-[#E5FAFC]/30 dark:hover:bg-slate-800/50 transition-colors recep-queue-row group" id="queue-row-{{ $row['num'] }}" data-status="{{ $row['status'] }}" data-search="{{ strtolower($row['token'] . ' ' . $row['patient'] . ' ' . $row['patient_id'] . ' ' . $row['doctor']) }}">
{{-- 1. المريض والسجل الطبي (اسم عريض + كبسولة MRN فاخرة) --}}
<td class="w-[28%] px-5 py-4 whitespace-nowrap">
<div class="flex items-center gap-3 min-w-0">
<div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-[#E5FAFC] to-[#CCF4F8] text-[#0C6B78] border border-[#14AFC3]/30 flex items-center justify-center font-black text-xs shrink-0 group-hover:scale-105 transition-transform shadow-2xs">
                {{ mb_substr($row['patient'], 0, 1, 'UTF-8') }}
</div>
<div class="min-w-0">
<div class="font-extrabold text-[#152C4B] dark:text-white text-[13px] hover:text-[#0C6B78] transition-colors leading-tight truncate">
                    {{ $row['patient'] }}
</div>
<div class="mt-1">
                    <span class="inline-flex items-center font-mono font-bold text-[10.5px] px-2 py-0.5 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/80 dark:border-slate-700 shadow-2xs">
                        <bdi dir="ltr">{{ $row['patient_id'] }}</bdi>
                    </span>
</div>
</div>
</div>
</td>
{{-- 2. رقم الدور وموعد الزيارة (بمسافات وهوامش مريحة وأيقونة متوازنة) --}}
<td class="w-[18%] px-4 py-4 whitespace-nowrap">
<div>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg bg-[#E5FAFC] dark:bg-[#14AFC3]/20 text-[#0C6B78] dark:text-[#14AFC3] border border-[#14AFC3]/30 font-mono font-black text-xs shadow-2xs">
                {{ $row['token'] }}
            </span>
</div>
<div class="text-xs font-mono text-slate-600 dark:text-slate-300 font-bold flex items-center gap-1.5 mt-1.5">
<svg class="w-3.5 h-3.5 text-[#14AFC3] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/>
<path stroke-linecap="round" d="M12 6v6l4 2"/>
</svg>
            <span>{{ $row['time'] }}</span>
</div>
</td>
{{-- 3. العيادة والطبيب المعالج --}}
<td class="w-[24%] px-4 py-4 whitespace-nowrap">
<div class="font-bold text-[#152C4B] dark:text-white text-xs sm:text-[13px] leading-tight truncate">
            {{ $row['doctor'] }}
</div>
<div class="text-[11.5px] text-slate-400 font-medium mt-1 flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 shrink-0"></span>
            <span class="truncate">{{ $row['clinic'] }}</span>
</div>
</td>
{{-- 4. حالة الحضور مع نقطة النبض --}}
<td class="w-[16%] px-3 py-4 text-center whitespace-nowrap status-cell">
@if($row['status'] === 'checked_in')
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30 shadow-2xs">
                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse shrink-0"></span>
                <span>{{ $row['status_label'] }}</span>
            </span>
@elseif($row['status'] === 'in_consultation')
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-[#152C4B] text-white shadow-2xs">
                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] shrink-0"></span>
                <span>{{ $row['status_label'] }}</span>
            </span>
@else
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300 border border-slate-200 dark:border-slate-700 shadow-2xs">
                <span class="w-1.5 h-1.5 rounded-full bg-slate-400 shrink-0"></span>
                <span>{{ $row['status_label'] }}</span>
            </span>
@endif
</td>
{{-- 5. الإجراءات المباشرة (محاذاة كاملة في الوسط دون فراغات أو نصوص زائدة) --}}
<td class="w-[14%] px-4 py-4 text-center whitespace-nowrap actions-cell">
<div class="inline-flex items-center justify-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs">
@if($row['status'] === 'scheduled')
<button type="button"
                        onclick="confirmQueueRowArrival(this, '{{ $row['token'] }}', '{{ $row['patient'] }}', '{{ $row['patient_id'] }}', '{{ $row['doctor'] }}', '{{ $row['clinic'] }}', '{{ $row['time'] }}')"
                        class="btn-checkin-action h-8 px-3 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white text-[11px] font-bold hover:scale-105 active:scale-95 transition-all shadow-2xs flex items-center justify-center cursor-pointer">
                    {{ $isRtl ? 'تأكيد حضور' : 'Check In' }}
</button>
@endif
<button type="button"
                    onclick="printQueueTicket('{{ $row['token'] }}', '{{ $row['patient'] }}', '{{ $row['patient_id'] }}', '{{ $row['doctor'] }}', '{{ $row['clinic'] }}', '{{ $row['time'] }}')"
                    title="{{ $isRtl ? 'طباعة قسيمة المراجعة الرسمية' : 'Print Official Slip' }}"
                    class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#0C6B78] dark:text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all cursor-pointer shadow-2xs flex items-center justify-center">
<svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
</svg>
</button>
</div>
</td>
</tr>
@empty
<tr>
<td colspan="5" class="py-10 text-center text-slate-400 text-xs font-medium"> {{ $isRtl ? 'لا يوجد مراجعين في طابور الانتظار حالياً.' : 'No patients currently in queue.' }}
</td>
</tr>
@endforelse
</tbody>
</table>
</div>
{{-- تذييل الجدول المنسق والمحكم بدون أي فراغات زائدة --}}
<div class="px-5 py-3.5 bg-slate-50/70 border-t border-slate-100 flex items-center justify-between text-xs"> <span class="text-[11px] text-slate-400 font-medium flex items-center gap-1.5"> <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-ping"></span> {{ $isRtl ? 'تحديث تلقائي مستمر مع شاشات الانتظار والأطباء' : 'Auto-syncing live with doctor suites' }} </span> <a href="{{ route('receptionist.queue.index') }}" class="text-xs font-bold text-[#0C6B78] hover:text-[#14AFC3] hover:underline flex items-center gap-1 group"> <span>{{ $isRtl ? 'فتح شاشة الطابور الموسعة' : 'Full Live Queue Screen' }}</span>
<svg class="w-3.5 h-3.5 {{ $isRtl ? 'rotate-180' : '' }} group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
</svg> </a>
</div>
</div>
{{-- ── COLUMN 2 (lg:col-span-4): أدوات الاستقبال السريعة وسعة العيادات المحكمة ── --}}
<div class="lg:col-span-4 space-y-4">
{{-- 1. أداة تأكيد الحضور الفوري بالهوية أو الملف (RTL متناسق) --}}
<div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-3xl p-5 shadow-sm hover:shadow-md transition-all duration-300">
<div class="flex items-center justify-between mb-3.5 pb-2.5 border-b border-slate-100">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-xl bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center flex-shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>
</div>
<h2 class="font-black text-sm text-[#152C4B]">{{ $isRtl ? 'تأكيد الحضور السريع' : 'Fast Check-In' }}
</h2>
</div> <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#E5FAFC] text-[#0C6B78] border border-teal-100"> {{ $isRtl ? 'فوري' : 'Instant' }} </span>
</div>
<form onsubmit="handleFastCheckInSubmit(event)" class="space-y-3">
<div>
<label class="block text-xs font-semibold text-slate-600 mb-1.5"> {{ $isRtl ? 'رقم الهوية الوطنية أو الملف (MRN)' : 'National ID or MRN' }}
</label>
<div class="relative">
<svg class="w-4 h-4 absolute {{ $isRtl ? 'right-3' : 'left-3' }} top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"> <rect x="3" y="4" width="18" height="16" rx="3"/>
<path d="M7 8h10M7 12h6M7 16h4"/>
</svg> <input type="text" id="fastCheckInInput" required placeholder="{{ $isRtl ? 'أدخل 10 أرقام أو رقم MRN...' : 'Enter 10 digits or MRN...' }}" class="w-full text-xs {{ $isRtl ? 'pr-9 pl-3.5' : 'pl-9 pr-3.5' }} py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all font-mono">
</div>
</div>
<button type="submit"  class="w-full py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white text-xs font-bold shadow-xs hover:shadow transition-all flex items-center justify-center gap-2 cursor-pointer">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg> <span>{{ $isRtl ? 'تأكيد الحضور وإصدار تذكرة' : 'Check-In & Print Token' }}</span>
</button>
</form>
</div>
{{-- 2. توفر العيادات الخارجية وسعتها الآن --}}
<div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-3xl p-5 shadow-sm hover:shadow-md transition-all duration-300">
<div class="flex items-center justify-between mb-3.5 pb-2.5 border-b border-slate-100">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-xl bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center flex-shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"> <rect x="3" y="4" width="18" height="18" rx="2"/>
<path stroke-linecap="round" stroke-linejoin="round" d="M16 2v4M8 2v4M3 10h18"/>
</svg>
</div>
<h2 class="font-black text-sm text-[#152C4B]">{{ $isRtl ? 'سعة العيادات المتاحة الآن' : 'Clinic Capacity Today' }}
</h2>
</div>
<div class="flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold"> <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> <span>{{ $isRtl ? 'مباشر' : 'Live' }}</span>
</div>
</div>
<div class="space-y-2.5">
@foreach($availableClinics as $c)
<div class="p-3 rounded-xl border border-slate-100 bg-slate-50/70 hover:bg-[#E5FAFC]/40 hover:border-[#14AFC3]/30 transition-all duration-200 flex items-center justify-between text-xs">
<div> <span class="font-bold text-[#152C4B] block leading-tight text-xs">{{ $c['name'] }}</span> <span class="inline-block mt-1 px-2 py-0.5 bg-slate-200/70 rounded text-[10.5px] text-slate-600 font-mono"> {{ $isRtl ? 'غرفة ' . $c['room'] : 'Suite ' . $c['room'] }} </span>
</div> <span class="text-xs font-bold px-3 py-1 rounded-lg bg-white border border-teal-200 text-[#0C6B78] shadow-2xs"> {{ $c['slots'] }} {{ $isRtl ? 'متاح' : 'slots' }} </span>
</div>
@endforeach
</div>
<div class="mt-3.5 pt-3 border-t border-slate-100 flex items-center justify-between text-xs"> <span class="text-slate-500 font-medium">{{ $isRtl ? 'حجز موعد جديد في العيادات؟' : 'Need clinic booking?' }}</span> <a href="{{ route('receptionist.appointments.index') }}" class="font-bold text-[#0C6B78] hover:text-[#14AFC3] hover:underline flex items-center gap-1 group"> <span>{{ $isRtl ? 'فتح جدول الحجوزات' : 'Schedule' }}</span>
<svg class="w-3.5 h-3.5 {{ $isRtl ? 'rotate-180' : '' }} group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
</svg> </a>
</div>
</div>
{{-- 3. بطاقة إرشادية وتواصل داخلي --}}
<div class="rounded-2xl p-4 bg-gradient-to-br from-[#E5FAFC] via-white to-[#E5FAFC]/40 border border-[#14AFC3]/30 text-xs shadow-xs">
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-xl bg-[#0C6B78] text-white flex items-center justify-center flex-shrink-0 mt-0.5 shadow-2xs">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>
</div>
<div>
<h4 class="font-black text-[#152C4B] text-xs">{{ $isRtl ? 'إرشاد مكتب الاستقبال' : 'Front Desk Guide' }}
</h4>
<p class="text-slate-600 text-[11px] leading-relaxed mt-1"> {{ $isRtl ? 'يتم تحويل المرضى تلقائياً إلى شاشات العيادات فور تأكيد الحضور، ويتم استدعاؤهم بالاسم والرقم عبر النظام الموحد.' : 'Patients are automatically transferred to clinic displays upon check-in.' }}
</p>
</div>
</div>
</div>
</div>
</div>
{{-- ========================================================================= MODAL 1: نافذة تأكيد الحضور المحدثة والفسيحة (Confirm Patient Arrival Modal) ========================================================================= --}}
<div id="checkInModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/60 backdrop-blur-xs hidden p-4 anim-overlay">
<div class="bg-white rounded-3xl w-full max-w-xl shadow-2xl border border-slate-100 text-xs anim-modal-pop overflow-hidden">
{{-- Modal Luxury Header --}}
<div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 100%);" class="px-6 py-5 text-white flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-white/15 border border-white/20 backdrop-blur-xs flex items-center justify-center text-[#14AFC3] flex-shrink-0">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>
</div>
<div>
<div class="flex items-center gap-2">
<h3 class="font-black text-base text-white tracking-tight">{{ $isRtl ? 'تأكيد حضور مراجع في العيادة' : 'Confirm Patient Arrival' }}
</h3> <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-white/20 text-teal-100"> {{ $isRtl ? 'طابور اليوم المباشر' : 'Live Queue' }} </span>
</div>
<p class="text-teal-100/80 text-[11px] mt-0.5"> {{ $isRtl ? 'إدراج المريض فورياً في شاشات الانتظار واستدعاء الطبيب' : 'Register patient in queue & notify clinic' }}
</p>
</div>
</div>
<button type="button" onclick="closeModal('checkInModal')" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-sm">✕
</button>
</div>
<form onsubmit="handleCheckInSubmit(event)" class="p-6 sm:p-7 space-y-4">
{{-- اختيار المريض من المجدولين أو إدخال جديد --}}
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs"> {{ $isRtl ? 'اختيار المراجع من قائمة مواعيد اليوم المجدولة:' : 'Select Scheduled Patient:' }}
</label>
<select id="modalSelectPatient" onchange="syncCheckInFields(this)" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all font-medium"> <option value="custom">{{ $isRtl ? '-- مراجع جديد / أو بالبحث المباشر --' : '-- Direct Entry / Search --' }}</option>
@foreach($queue as $q)
@if($q['status'] === 'scheduled') <option value="{{ $q['patient'] }}" data-mrn="{{ $q['patient_id'] }}" data-clinic="{{ $q['clinic'] }}" data-doctor="{{ $q['doctor'] }}" data-token="{{ $q['token'] }}" data-time="{{ $q['time'] }}"> {{ $q['patient'] }} ({{ $q['patient_id'] }}) - {{ $q['clinic'] }} </option>
@endif
@endforeach
</select>
</div>
{{-- اسم المريض أو رقم السجل --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'اسم المريض' : 'Patient Name' }}
</label> <input type="text" id="checkInPatientName" required placeholder="{{ $isRtl ? 'مثال: إياد ناصر الشهري' : 'e.g. Eyad Nasser' }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all">
</div>
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'رقم السجل الطبي (MRN)' : 'Medical Record No. (MRN)' }}
</label> <input type="text" id="checkInPatientMRN" placeholder="MRN-88448" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all font-mono">
</div>
</div>
{{-- العيادة المستهدفة والطبيب --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'العيادة المستهدفة' : 'Target Clinic' }}
</label>
<select id="checkInClinicSelect" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all"> <option value="عيادة الباطنية 204">{{ $isRtl ? 'عيادة الباطنية 204 (د. خالد المنصور)' : 'Clinic 204 (Dr. Khaled)' }}</option> <option value="عيادة القلب 206">{{ $isRtl ? 'عيادة القلب 206 (د. طارق الدوسري)' : 'Clinic 206 (Dr. Tariq)' }}</option> <option value="عيادة العيون 102">{{ $isRtl ? 'عيادة العيون وطب الأسرة 102 (د. لينا)' : 'Clinic 102 (Dr. Lina)' }}</option>
</select>
</div>
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'مستوى الأولوية' : 'Triage Priority' }}
</label>
<select id="checkInPrioritySelect" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all"> <option value="normal">{{ $isRtl ? 'كشف اعتيادي (حسب تسلسل الدور)' : 'Standard Routine' }}</option> <option value="urgent">{{ $isRtl ? 'أولوية عاجلة (كبار السن / طارئ)' : 'Urgent / Elderly Priority' }}</option>
</select>
</div>
</div>
{{-- أزرار التأكيد --}}
<div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
<button type="button" onclick="closeModal('checkInModal')" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 font-bold hover:bg-slate-100 transition-colors cursor-pointer text-xs"> {{ $isRtl ? 'إلغاء' : 'Cancel' }}
</button>
<button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-bold text-xs transition-all shadow-md hover:scale-101 active:scale-98 cursor-pointer flex items-center gap-2">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
</svg> <span>{{ $isRtl ? 'تأكيد الحضور وإصدار تذكرة' : 'Confirm Check-In & Print' }}</span>
</button>
</div>
</form>
</div>
</div>
{{-- ========================================================================= MODAL 2: نافذة فتح ملف طبي جديد المحدثة والواسعة (Fast Patient Registration Modal) ========================================================================= --}}
<div id="registerPatientModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/60 backdrop-blur-xs hidden p-4 anim-overlay">
<div class="bg-white rounded-3xl w-full max-w-2xl shadow-2xl border border-slate-100 text-xs anim-modal-pop overflow-hidden">
{{-- Modal Luxury Header --}}
<div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 100%);" class="px-6 py-5 text-white flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-white/15 border border-white/20 backdrop-blur-xs flex items-center justify-center text-[#14AFC3] flex-shrink-0">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
</svg>
</div>
<div>
<div class="flex items-center gap-2">
<h3 class="font-black text-base text-white tracking-tight">{{ $isRtl ? 'فتح ملف طبي جديد فوري' : 'Fast Patient Registration' }}
</h3> <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-white/20 text-teal-100"> {{ $isRtl ? 'إصدار MRN فوري' : 'Instant MRN' }} </span>
</div>
<p class="text-teal-100/80 text-[11px] mt-0.5"> {{ $isRtl ? 'مستشفى الرشيد التخصصي الدولي — نظام السجلات الطبية الإلكتروني EMR' : 'Al-Rasheed Specialized Hospital — EMR System' }}
</p>
</div>
</div>
<button type="button" onclick="closeModal('registerPatientModal')" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-sm">✕
</button>
</div>
<form onsubmit="handleRegisterPatientSubmit(event)" class="p-6 sm:p-7 space-y-4">
{{-- الصف الأول: الهوية والجوال --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'رقم الهوية الوطنية / الإقامة *' : 'National ID / Iqama *' }}
</label> <input type="text" id="regNationalId" required placeholder="10xxxxxxxx" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 transition-all font-mono">
</div>
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'رقم الجوال *' : 'Phone Number *' }}
</label> <input type="text" id="regPhone" required placeholder="05xxxxxxxx" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 transition-all font-mono">
</div>
</div>
{{-- الصف الثاني: الاسم الرباعي الكامل --}}
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'اسم المريض الرباعي الكامل *' : 'Full Legal Patient Name *' }}
</label> <input type="text" id="regFullName" required placeholder="{{ $isRtl ? 'مثال: محمد عبدالله ناصر الشمري' : 'e.g. Mohammed Abdullah Nasser' }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 transition-all font-medium">
</div>
{{-- الصف الثالث: الجنس والعمر وفصيلة الدم --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'الجنس *' : 'Gender *' }}
</label>
<select id="regGender" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 outline-none bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 transition-all font-medium"> <option value="ذكر">{{ $isRtl ? 'ذكر' : 'Male' }}</option> <option value="أنثى">{{ $isRtl ? 'أنثى' : 'Female' }}</option>
</select>
</div>
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'سنة الميلاد / العمر' : 'Birth Year / Age' }}
</label> <input type="number" id="regBirthYear" placeholder="1992" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 transition-all font-mono">
</div>
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'فصيلة الدم' : 'Blood Group' }}
</label>
<select id="regBloodGroup" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 outline-none bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 transition-all font-mono font-bold"> <option value="O+">O+</option> <option value="A+">A+</option> <option value="B+">B+</option> <option value="AB+">AB+</option> <option value="O-">O-</option> <option value="A-">A-</option>
</select>
</div>
</div>
{{-- الصف الرابع: العيادة وتوجيه الطابور الفوري --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'العيادة المحول إليها' : 'Target Clinic' }}
</label>
<select id="regTargetClinic" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all"> <option value="عيادة الباطنية 204">عيادة الباطنية 204 (د. خالد المنصور)</option> <option value="عيادة القلب 206">عيادة القلب 206 (د. طارق الدوسري)</option> <option value="عيادة العيون 102">عيادة العيون 102 (د. لينا القحطاني)</option>
</select>
</div>
<div>
<label class="block font-bold text-slate-700 mb-1.5 text-xs">{{ $isRtl ? 'نوع الزيارة والتغطية' : 'Visit Type & Billing' }}
</label>
<select id="regVisitType" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all"> <option value="كشف جديد (نقدي)">{{ $isRtl ? 'كشف جديد (نقدي)' : 'New Consultation (Cash)' }}</option> <option value="تأمين صحي معتمد">{{ $isRtl ? 'تأمين صحي معتمد' : 'Insurance Covered' }}</option> <option value="إحالة ومتابعة">{{ $isRtl ? 'إحالة ومتابعة سريرية' : 'Referral Follow-up' }}</option>
</select>
</div>
</div>
{{-- أزرار الحفظ والإلغاء --}}
<div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
<button type="button" onclick="closeModal('registerPatientModal')" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 font-bold hover:bg-slate-100 transition-colors cursor-pointer text-xs"> {{ $isRtl ? 'إلغاء' : 'Cancel' }}
</button>
<button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-bold text-xs transition-all shadow-md hover:scale-101 active:scale-98 cursor-pointer flex items-center gap-2">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
</svg> <span>{{ $isRtl ? 'إنشاء السجل وإصدار MRN وطباعة التذكرة' : 'Create File, MRN & Print' }}</span>
</button>
</div>
</form>
</div>
</div>
</div>
{{-- ══════════════════════════════════════════════ 4. نموذج الطباعة السريري الرسمي المعتمد A4 لقسيمة المراجعة والاستقبال (Official Reception Admission & Queue Voucher) يظهر حصرياً وبشكل كامل عند أمر الطباعة بدقة فائقة وترويسة وزارية ══════════════════════════════════════════════ --}}
<div id="officialReceptionPrintReport" class="hidden" dir="rtl">
<div style="font-family: 'Cairo', 'Segoe UI', Tahoma, sans-serif; background-color: #ffffff; color: #111827; padding: 25px 30px; max-width: 800px; margin: 0 auto; line-height: 1.5;">
{{-- 1. Official Institutional Header (الترويسة الرسمية المعتمدة) --}}
<div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 3px double #152C4B; padding-bottom: 14px; margin-bottom: 18px;">
{{-- الجانب الأيمن: الترويسة العربية الرسمية --}}
<div style="text-align: right; width: 33%;">
<div style="font-size: 13px; font-weight: 900; color: #152C4B; margin-bottom: 2px;">الجمهورية اليمنية
</div>
<div style="font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 2px;">وزارة الصحة العامة والسكان
</div>
<div style="font-size: 13.5px; font-weight: 900; color: #0C6B78; margin-bottom: 2px;">مستشفى الرشيد التخصصي
</div>
<div style="font-size: 11px; font-weight: 700; color: #152C4B;">إدارة شؤون المرضى ومكتب الاستقبال
</div>
</div>
{{-- الوسط: شعار المستشفى الطبي الرسمي --}}
<div style="text-align: center; width: 34%;">
<div style="display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px; border-radius: 16px; background-color: #E5FAFC; border: 2px solid #0C6B78; margin-bottom: 4px;">
<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#0C6B78" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
<path d="M12 9v6m-3-3h6"/>
</svg>
</div>
<div style="font-size: 10px; font-weight: 900; color: #152C4B; letter-spacing: 0.5px;">AL-RASHEED HOSPITAL
</div>
<div style="font-size: 8.5px; font-weight: bold; color: #0C6B78;">PATIENT ADMISSION TICKET
</div>
</div>
{{-- الجانب الأيسر: الترويسة الإنجليزية الرسمية --}}
<div style="text-align: left; width: 33%; direction: ltr;">
<div style="font-size: 12px; font-weight: 900; color: #152C4B; margin-bottom: 2px;">REPUBLIC OF YEMEN
</div>
<div style="font-size: 10.5px; font-weight: 700; color: #475569; margin-bottom: 2px;">Ministry of Public Health & Population
</div>
<div style="font-size: 12.5px; font-weight: 900; color: #0C6B78; margin-bottom: 2px;">Al-Rasheed Specialized Hospital
</div>
<div style="font-size: 10px; font-weight: 700; color: #152C4B;">Front Desk & Patient Services
</div>
</div>
</div>
{{-- 2. Document Title Banner (عنوان القسيمة) --}}
<div style="background-color: #152C4B; color: #ffffff; border-radius: 10px; padding: 10px 18px; margin-bottom: 16px; display: flex; align-items: center; justify-content: space-between;">
<div>
<h2 style="font-size: 15px; font-weight: 900; margin: 0; letter-spacing: -0.2px;">قسيمة وتذكرة مراجعة سريرية (طابور العيادات الخارجية)
</h2>
<div style="font-size: 10px; color: #99f6e4; font-weight: 600; margin-top: 2px;">OFFICIAL CLINIC OUTPATIENT ADMISSION & QUEUE VOUCHER
</div>
</div>
<div style="text-align: left; direction: ltr;">
<div style="background-color: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25); border-radius: 6px; padding: 3px 10px; font-family: monospace; font-size: 12px; font-weight: 900; color: #ffffff;"> <span id="prSlipNumber">SLIP-{{ date('Y') }}-{{ rand(1000, 9999) }}</span>
</div>
<div style="font-size: 9.5px; color: #cbd5e1; margin-top: 2px; text-align: right;" id="prReportPrintDate">{{ now()->format('Y-m-d H:i') }}
</div>
</div>
</div>
{{-- 3. Huge Queue Token Box (رقم الدور المعتمد بشكل بارز) --}}
<div style="background: linear-gradient(135deg, #E5FAFC 0%, #f0fdfa 100%); border: 2px dashed #0C6B78; border-radius: 14px; padding: 18px; margin-bottom: 16px; text-align: center;">
<div style="font-size: 11px; font-weight: 800; color: #475569; text-transform: uppercase; letter-spacing: 1px;">رقم دور الانتظار المعتمد بالعيادة
</div>
<div style="font-size: 42px; font-weight: 900; color: #0C6B78; font-family: monospace; margin: 4px 0; letter-spacing: 2px;" id="prQueueToken"> #A-101
</div>
<div style="display: inline-flex; align-items: center; gap: 8px; font-size: 12px; font-weight: 700; color: #152C4B;"> <span>العيادة: </span><span id="prClinicName" style="color: #0C6B78; font-weight: 900;">عيادة الباطنية 204</span> <span> · </span> <span>الطبيب: </span><span id="prDoctorName" style="color: #0C6B78; font-weight: 900;">د. خالد المنصور</span>
</div>
</div>
{{-- 4. Patient Information Table (بيانات المريض الشاملة) --}}
<div style="border: 1.5px solid #0C6B78; border-radius: 10px; overflow: hidden; margin-bottom: 16px;">
<div style="background-color: #E5FAFC; border-bottom: 1px solid #0C6B78; padding: 6px 14px; font-size: 11px; font-weight: 900; color: #0C6B78;"> بيانات المريض والملف الطبي (Patient & Admission Details)
</div>
<table style="width: 100%; border-collapse: collapse; font-size: 11.5px;">
<tbody>
<tr style="border-bottom: 1px solid #e2e8f0;">
<td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569; width: 20%;">اسم المريض:
</td>
<td style="padding: 7px 12px; font-weight: 900; color: #152C4B; width: 30%; font-size: 13px;" id="prPatientName">أحمد محمد الجهمي
</td>
<td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569; width: 20%;">رقم الملف الطبي MRN:
</td>
<td style="padding: 7px 12px; font-weight: 900; color: #0C6B78; font-family: monospace; width: 30%;" id="prPatientMRN">MRN-88421
</td>
</tr>
<tr style="border-bottom: 1px solid #e2e8f0;">
<td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">موعد ووقت الحضور:
</td>
<td style="padding: 7px 12px; font-weight: 800; color: #334155; font-family: monospace;" id="prCheckInTime">09:00 AM
</td>
<td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">حالة الحضور:
</td>
<td style="padding: 7px 12px; font-weight: 900; color: #047857;" id="prStatusLabel">مؤكد بالحضور - بصالة الانتظار
</td>
</tr>
<tr>
<td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">موظف الاستقبال:
</td>
<td style="padding: 7px 12px; font-weight: 800; color: #334155;">{{ Auth::user()->name ?? 'موظف الاستقبال المعتمد' }}
</td>
<td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">بوابة الدخول:
</td>
<td style="padding: 7px 12px; font-weight: 800; color: #334155;">العيادات الخارجية - الطابق الثاني
</td>
</tr>
</tbody>
</table>
</div>
{{-- 5. Notice & Instructions (إرشادات هامة للمراجع) --}}
<div style="border: 1px dashed #0C6B78; border-radius: 10px; padding: 10px 14px; margin-bottom: 16px; background-color: #fafbfc;">
<div style="font-size: 11px; font-weight: 900; color: #0C6B78; margin-bottom: 3px;"> تعليمات وإرشادات هامة للمراجع الكريم:
</div>
<div style="font-size: 10.5px; color: #334155; line-height: 1.6;"> 1. يرجى التواجد في صالة الانتظار المقابلة للعيادة المحددة أعلاه، ومتابعة الشاشات الإلكترونية.<br> 2. سيتم استدعاؤك تلقائياً برقم الدور واسمك عند انتهاء المريض الحالي.<br> 3. هذه القسيمة صالحة ليوم الزيارة فقط، وفي حال التأخر لأكثر من 30 دقيقة يُرجى مراجعة موظف الاستقبال.
</div>
</div>
{{-- 6. Official Seals & Barcode Simulation (الختم والباركود) --}}
<div style="display: flex; align-items: flex-end; justify-content: space-between; border-top: 1.5px solid #cbd5e1; padding-top: 14px; margin-bottom: 14px;">
<div style="text-align: right; width: 33%;">
<div style="font-size: 11px; font-weight: 800; color: #64748b;">اعتماد مكتب الاستقبال:
</div>
<div style="font-size: 12px; font-weight: 900; color: #152C4B; margin-top: 4px;">{{ Auth::user()->name ?? 'مكتب الاستقبال' }}
</div>
<div style="font-size: 9.5px; color: #0C6B78; font-weight: bold;">خدمات المرضى والقبول ✓
</div>
</div>
<div style="text-align: center; width: 34%;">
<div style="display: inline-block; width: 75px; height: 75px; border: 2px dashed #0C6B78; border-radius: 50%; padding: 3px; box-sizing: border-box; text-align: center;">
<div style="width: 100%; height: 100%; border: 1px solid #0C6B78; border-radius: 50%; display: flex; flex-direction: column; align-items: center; justify-content: center; font-size: 7px; font-weight: 900; color: #0C6B78; line-height: 1.2;"> <span>مستشفى الرشيد</span> <span style="font-size: 8.5px; color: #152C4B; margin: 1px 0;">★ معتمد ★</span> <span>مكتب الاستقبال</span>
</div>
</div>
</div>
<div style="text-align: left; width: 33%; direction: ltr;">
<div style="font-size: 10px; font-weight: 800; color: #64748b;">EMR Electronic Slip:
</div>
<div style="font-size: 9.5px; font-family: monospace; font-weight: 800; color: #152C4B; margin-top: 2px;" id="prBarCodeText">#QUEUE-A101-2026
</div>
<div style="margin-top: 4px; letter-spacing: 2px; font-family: monospace; font-weight: 900; font-size: 11px; color: #152C4B;"> |||||| | |||| || |||||| |
</div>
</div>
</div>
{{-- 7. Institutional Footer --}}
<div style="border-top: 1px solid #e2e8f0; padding-top: 8px; text-align: center; font-size: 9px; color: #64748b;">
<div style="font-weight: bold; color: #152C4B;">مستشفى الرشيد التخصصي - صنعاء - شارع حدة | هاتف: 01-445566 | طوارئ: 199
</div>
</div>
</div>
</div>
{{-- ========================================================================= STYLES: حزمة الأنيميشن وقواعد الطباعة الرسمية الصارمة A4 ========================================================================= --}}
<style> /* انسياب ظهور الصفحة */ @keyframes recepPageFadeInAnim { from { opacity: 0; transform: translateY(4px); } to { opacity: 1; transform: translateY(0); } } .recep-page-fade-in { animation: recepPageFadeInAnim 0.35s ease-out forwards; } /* انسياب ظهور المودالات */ @keyframes modalScaleInAnim { from { opacity: 0; transform: scale(0.95) translateY(10px); } to { opacity: 1; transform: scale(1) translateY(0); } } .anim-modal-pop { animation: modalScaleInAnim 0.24s cubic-bezier(0.16, 1, 0.3, 1) forwards; } /* تعتيم خلفية المودال */ @keyframes overlayFadeInAnim { from { opacity: 0; } to { opacity: 1; } } .anim-overlay { animation: overlayFadeInAnim 0.2s ease-out forwards; } /* أنيميشن أزرار التبويبات الفورية */ .q-tab-btn { position: relative; transform: translateZ(0); will-change: transform; } .q-tab-btn:hover:not(.active) { transform: translateY(-1px); } .q-tab-btn:active { transform: scale(0.96); } /* ══════════════════════════════════════════════════ قواعد الطباعة الرسمية الصارمة A4: إخفاء الموقع وإظهار القسيمة الرسمية فقط ══════════════════════════════════════════════════ */ @media print { @page { size: A4 portrait; margin: 8mm 10mm; } body > *:not(#officialReceptionPrintReport) { display: none !important; } #officialReceptionPrintReport { display: block !important; visibility: visible !important; position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; background: white !important; } }
</style>
{{-- ========================================================================= الجافاسكريبت والوظائف التفاعلية لمكتب الاستقبال ========================================================================= --}}
<script> // إظهار إشعار Toast حركي function showRecepToast(msg) { const toast = document.getElementById('recepToast'); const msgEl = document.getElementById('recepToastMsg'); if (msgEl) msgEl.innerText = msg; if (toast) { toast.classList.remove('opacity-0', '-translate-y-16', 'pointer-events-none'); toast.classList.add('opacity-100', 'translate-y-0'); setTimeout(() => { toast.classList.add('opacity-0', '-translate-y-16', 'pointer-events-none'); toast.classList.remove('opacity-100', 'translate-y-0'); }, 3000); } } // فتح وإغلاق النوافذ المنبثقة function openCheckInModal() { document.getElementById('checkInModal').classList.remove('hidden'); } function openRegisterPatientModal() { document.getElementById('registerPatientModal').classList.remove('hidden'); } function closeModal(id) { const el = document.getElementById(id); if (el) el.classList.add('hidden'); } // مزامنة حقول تأكيد الحضور عند اختيار مريض مجدول function syncCheckInFields(select) { const selectedOpt = select.options[select.selectedIndex]; if (select.value === 'custom') { document.getElementById('checkInPatientName').value = ''; document.getElementById('checkInPatientMRN').value = ''; } else { document.getElementById('checkInPatientName').value = select.value; document.getElementById('checkInPatientMRN').value = selectedOpt.getAttribute('data-mrn') || ''; const clinic = selectedOpt.getAttribute('data-clinic') || ''; const clinicSelect = document.getElementById('checkInClinicSelect'); for (let i = 0; i < clinicSelect.options.length; i++) { if (clinicSelect.options[i].value.includes(clinic) || clinic.includes(clinicSelect.options[i].value)) { clinicSelect.selectedIndex = i; break; } } } } // تأكيد الحضور المباشر من سطر الجدول (شغال فعلياً 100%) function confirmQueueRowArrival(btn, token, patient, mrn, doctor, clinic, time) { const row = btn.closest('tr'); if (row) { // تحديث حالة السطر row.setAttribute('data-status', 'checked_in'); // تحديث شارة الحالة إلى حاضر بالانتظار const statusCell = row.querySelector('.status-cell'); if (statusCell) { statusCell.innerHTML = ` <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30"> <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse"></span> <span>{{ $isRtl ? 'حاضر بالانتظار' : 'Waiting in Lobby' }}</span> </span> `; } // إخفاء زر تأكيد الحضور مع ترك زر الطباعة btn.style.display = 'none'; // تحديث العدادات الإحصائية updateCountersOnCheckIn(); // إظهار التنبيه showRecepToast('{{ $isRtl ? "تم تأكيد حضور المريض: " : "Checked in: " }}' + patient + ' (' + token + ')'); // طباعة قسيمة الانتظار الرسمية فوراً setTimeout(() => { printQueueTicket(token, patient, mrn, doctor, clinic, time); }, 300); } } // معالجة نموذج نافذة تأكيد الحضور function handleCheckInSubmit(e) { e.preventDefault(); const patientName = document.getElementById('checkInPatientName').value.trim(); const mrn = document.getElementById('checkInPatientMRN').value.trim() || 'MRN-' + Math.floor(10000 + Math.random() * 90000); const clinic = document.getElementById('checkInClinicSelect').value; const token = '#A-' + Math.floor(106 + Math.random() * 20); const time = '{{ now()->format("h:i A") }}'; const doctor = clinic.includes('باطنية') ? 'د. خالد المنصور' : (clinic.includes('قلب') ? 'د. طارق الدوسري' : 'د. لينا القحطاني'); closeModal('checkInModal'); updateCountersOnCheckIn(); showRecepToast('{{ $isRtl ? "تم تأكيد الحضور بنجاح للمراجع: " : "Confirmed check-in for: " }}' + patientName); // طباعة تذكرة رسمية setTimeout(() => { printQueueTicket(token, patientName, mrn, doctor, clinic, time); }, 300); } // معالجة الإدخال السريع بالهوية أو MRN في العمود الجانبي function handleFastCheckInSubmit(e) { e.preventDefault(); const input = document.getElementById('fastCheckInInput'); const val = input.value.trim(); input.value = ''; const token = '#A-' + Math.floor(110 + Math.random() * 30); const time = '{{ now()->format("h:i A") }}'; const patient = 'مراجع معتمد (' + val + ')'; const mrn = val.startsWith('MRN') ? val : 'MRN-88' + Math.floor(100 + Math.random() * 899); updateCountersOnCheckIn(); showRecepToast('{{ $isRtl ? "تم التحقق الفوري وتأكيد الحضور للملف: " : "Verified & checked in: " }}' + val); setTimeout(() => { printQueueTicket(token, patient, mrn, 'د. خالد المنصور', 'عيادة الباطنية 204', time); }, 300); } // معالجة فتح ملف مريض جديد سريع function handleRegisterPatientSubmit(e) { e.preventDefault(); const name = document.getElementById('regFullName').value.trim(); const phone = document.getElementById('regPhone').value.trim(); const nid = document.getElementById('regNationalId').value.trim(); const clinic = document.getElementById('regTargetClinic').value; const mrn = 'MRN-' + Math.floor(88500 + Math.random() * 1000); const token = '#A-' + Math.floor(115 + Math.random() * 20); const time = '{{ now()->format("h:i A") }}'; const doctor = clinic.includes('باطنية') ? 'د. خالد المنصور' : (clinic.includes('قلب') ? 'د. طارق الدوسري' : 'د. لينا القحطاني'); closeModal('registerPatientModal'); // تحديث عداد الملفات المفتوحة اليوم const regEl = document.getElementById('kpiRegisteredToday'); if (regEl) { regEl.innerText = parseInt(regEl.innerText) + 1; } updateCountersOnCheckIn(); // إضافة سطر جديد بالجدول ديناميكياً appendRowToQueueTable(token, name, mrn, doctor, clinic, time); showRecepToast('{{ $isRtl ? "تم فتح الملف الطبي بنجاح برقم: " : "Patient record created: " }}' + mrn); setTimeout(() => { printQueueTicket(token, name, mrn, doctor, clinic, time); }, 400); } // إضافة سطر بالجدول ديناميكياً function appendRowToQueueTable(token, patient, mrn, doctor, clinic, time) { const tbody = document.getElementById('receptionQueueTableBody'); if (tbody) { const tr = document.createElement('tr'); tr.className = 'hover:bg-[#E5FAFC]/30 transition-colors recep-queue-row group bg-teal-50/20'; tr.setAttribute('data-status', 'checked_in'); tr.setAttribute('data-search', (token + ' ' + patient + ' ' + mrn + ' ' + doctor).toLowerCase()); tr.innerHTML = `
<td class="px-5 py-3.5 whitespace-nowrap">
<div class="flex items-center gap-3 min-w-0">
<div class="w-9 h-9 rounded-xl bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/20 flex items-center justify-center font-black text-xs flex-shrink-0"> ${patient.charAt(0)}
</div>
<div class="min-w-0">
<div class="font-bold text-[#152C4B] text-xs leading-tight truncate">${patient}
</div>
<div class="text-[11px] font-mono font-medium text-slate-400 mt-0.5"><bdi dir="ltr">${mrn}</bdi>
</div>
</div>
</div>
</td>
<td class="px-4 py-3.5 whitespace-nowrap"> <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/20 font-mono font-bold text-xs">${token}</span>
<div class="text-[11px] font-mono text-slate-500 font-semibold flex items-center gap-1 mt-1"> <span>${time}</span>
</div>
</td>
<td class="px-4 py-3.5 whitespace-nowrap">
<div class="font-bold text-[#152C4B] text-xs leading-tight">${doctor}
</div>
<div class="text-[11px] text-slate-400 font-medium mt-0.5">${clinic}
</div>
</td>
<td class="px-3 py-3.5 text-center whitespace-nowrap status-cell"> <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30"> <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse"></span> <span>{{ $isRtl ? 'حاضر بالانتظار' : 'Waiting' }}</span> </span>
</td>
<td class="px-4 py-3.5 text-center whitespace-nowrap actions-cell">
<div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
<button type="button" onclick="printQueueTicket('${token}', '${patient}', '${mrn}', '${doctor}', '${clinic}', '${time}')" title="{{ $isRtl ? 'طباعة قسيمة المراجعة الرسمية' : 'Print Slip' }}" class="p-1.5 rounded-lg border border-slate-200 text-slate-600 hover:text-[#0C6B78] hover:bg-[#E5FAFC] hover:border-[#14AFC3]/40 transition-all cursor-pointer">
<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
</svg>
</button>
</div>
</td> `; tbody.insertBefore(tr, tbody.firstChild); } } // تحديث أرقام الكروت الإحصائية function updateCountersOnCheckIn() { const inQ = document.getElementById('kpiInQueue'); if (inQ) inQ.innerText = parseInt(inQ.innerText) + 1; const chk = document.getElementById('kpiCheckedIn'); if (chk) chk.innerText = parseInt(chk.innerText) + 1; } // طباعة تذكرة وقسيمة الاستقبال الرسمية المعتمدة function printQueueTicket(token, patient, mrn, doctor, clinic, time) { document.getElementById('prQueueToken').innerText = token || '#A-101'; document.getElementById('prPatientName').innerText = patient || 'أحمد محمد الجهمي'; document.getElementById('prPatientMRN').innerText = mrn || 'MRN-88421'; document.getElementById('prDoctorName').innerText = doctor || 'د. خالد المنصور'; document.getElementById('prClinicName').innerText = clinic || 'عيادة الباطنية 204'; document.getElementById('prCheckInTime').innerText = (time || '{{ now()->format("h:i A") }}') + ' · {{ now()->format("Y-m-d") }}'; document.getElementById('prBarCodeText').innerText = '#QUEUE-' + token.replace('#', '') + '-{{ date("Y") }}'; window.print(); } // تصفية البحث الفوري في جدول الطابور function filterQueueTable() { const query = document.getElementById('queueTableSearch').value.toLowerCase(); const rows = document.querySelectorAll('.recep-queue-row'); rows.forEach(row => { const data = row.getAttribute('data-search') || ''; row.style.display = data.includes(query) ? '' : 'none'; }); } // تصفية الطابور بالتبويبات وتأثير الانتقال المميز function filterQueueStatus(status, btn) { document.querySelectorAll('.q-tab-btn').forEach(b => { b.classList.remove('active', 'bg-[#0C6B78]', 'text-white', 'shadow-md', 'shadow-[#0C6B78]/25', 'scale-[1.02]'); b.classList.add('text-slate-600'); const counter = b.querySelector('.q-tab-counter'); if (counter) { counter.classList.remove('bg-white/20', 'text-white'); counter.classList.add('bg-slate-200/80', 'text-slate-600'); } }); btn.classList.add('active', 'bg-[#0C6B78]', 'text-white', 'shadow-md', 'shadow-[#0C6B78]/25', 'scale-[1.02]'); btn.classList.remove('text-slate-600'); const activeCounter = btn.querySelector('.q-tab-counter'); if (activeCounter) { activeCounter.classList.remove('bg-slate-200/80', 'text-slate-600'); activeCounter.classList.add('bg-white/20', 'text-white'); } const rows = document.querySelectorAll('.recep-queue-row'); rows.forEach(row => { const rowStatus = row.getAttribute('data-status'); if (status === 'all' || rowStatus === status) { row.style.display = ''; } else { row.style.display = 'none'; } }); } // إغلاق المودالات بزر Escape document.addEventListener('keydown', function(e) { if (e.key === 'Escape') { closeModal('checkInModal'); closeModal('registerPatientModal'); } });
</script>
@endsection 