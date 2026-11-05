@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    $recentAppointments = (isset($appointments) && count($appointments) > 0) ? $appointments : collect([
        [
            'id'           => 'APT-9041',
            'patient'      => $isRtl ? 'أحمد محمد الجهمي' : 'Ahmed Mohammed Al-Jahmi',
            'mrn'          => 'MRN-88421',
            'phone'        => '+967 77 123 4567',
            'doctor'       => $isRtl ? 'د. خالد المنصور' : 'Dr. Khaled Al-Mansoor',
            'doctor_title' => $isRtl ? 'استشاري أول باطنية وسكري' : 'Senior Consultant Internal Med',
            'department'   => $isRtl ? 'أمراض الباطنية والغدد الصماء' : 'Internal Medicine',
            'time'         => '09:30 ص',
            'room'         => $isRtl ? 'عيادة 204' : 'Clinic 204',
            'status'       => 'in_progress',
            'status_label' => $isRtl ? 'بالعيادة الآن' : 'In Clinic',
            'status_color' => 'bg-amber-50 text-amber-700 border-amber-200/80',
            'dot_color'    => 'bg-amber-500 animate-pulse'
        ],
        [
            'id'           => 'APT-9042',
            'patient'      => $isRtl ? 'بلقيس حميد الحبيشي' : 'Balqees Hameed Al-Hubaishi',
            'mrn'          => 'MRN-88435',
            'phone'        => '+967 73 598 7654',
            'doctor'       => $isRtl ? 'د. طارق الدوسري' : 'Dr. Tariq Al-Dosari',
            'doctor_title' => $isRtl ? 'استشاري أمراض وجراحة القلب' : 'Cardiology Consultant',
            'department'   => $isRtl ? 'أمراض وجراحة القلب والأوعية' : 'Cardiology',
            'time'         => '10:00 ص',
            'room'         => $isRtl ? 'عيادة 206' : 'Clinic 206',
            'status'       => 'waiting',
            'status_label' => $isRtl ? 'في الانتظار' : 'Waiting',
            'status_color' => 'bg-[#E5FAFC] text-[#0C6B78] border-[#14AFC3]/30',
            'dot_color'    => 'bg-[#14AFC3] animate-pulse'
        ],
        [
            'id'           => 'APT-9040',
            'patient'      => $isRtl ? 'بشير عبدالكريم الوصابي' : 'Basheer Abdulkarim Al-Wesabi',
            'mrn'          => 'MRN-88448',
            'phone'        => '+967 77 433 2110',
            'doctor'       => $isRtl ? 'د. أروى العريقي' : 'Dr. Arwa Al-Ariqi',
            'doctor_title' => $isRtl ? 'استشارية طب وجراحة النساء والولادة' : 'OB/GYN Consultant',
            'department'   => $isRtl ? 'النساء والولادة ورعاية الأمومة' : 'OB/GYN',
            'time'         => '10:30 ص',
            'room'         => $isRtl ? 'عيادة 102' : 'Clinic 102',
            'status'       => 'confirmed',
            'status_label' => $isRtl ? 'مؤكد ومسجل' : 'Confirmed',
            'status_color' => 'bg-emerald-50 text-emerald-700 border-emerald-200/80',
            'dot_color'    => 'bg-emerald-500'
        ],
        [
            'id'           => 'APT-9044',
            'patient'      => $isRtl ? 'فاطمة صالح الذماري' : 'Fatima Saleh Al-Dhamari',
            'mrn'          => 'MRN-88456',
            'phone'        => '+967 71 677 8899',
            'doctor'       => $isRtl ? 'د. نزار صالح الحكيمي' : 'Dr. Nizar Saleh Al-Hakimi',
            'doctor_title' => $isRtl ? 'استشاري جراحة العظام والمفاصل' : 'Senior Orthopedic Consultant',
            'department'   => $isRtl ? 'جراحة العظام واستبدال المفاصل' : 'Orthopedics',
            'time'         => '11:15 ص',
            'room'         => $isRtl ? 'عيادة 301' : 'Clinic 301',
            'status'       => 'waiting',
            'status_label' => $isRtl ? 'في الانتظار' : 'Waiting',
            'status_color' => 'bg-[#E5FAFC] text-[#0C6B78] border-[#14AFC3]/30',
            'dot_color'    => 'bg-[#14AFC3]'
        ],
        [
            'id'           => 'APT-9045',
            'patient'      => $isRtl ? 'عمار ياسر الأهدل' : 'Ammar Yasser Al-Ahdal',
            'mrn'          => 'MRN-88462',
            'phone'        => '+967 77 944 5566',
            'doctor'       => $isRtl ? 'د. خالد المنصور' : 'Dr. Khaled Al-Mansoor',
            'doctor_title' => $isRtl ? 'استشاري أول باطنية وسكري' : 'Senior Consultant Internal Med',
            'department'   => $isRtl ? 'أمراض الباطنية والغدد الصماء' : 'Internal Medicine',
            'time'         => '11:45 ص',
            'room'         => $isRtl ? 'عيادة 204' : 'Clinic 204',
            'status'       => 'completed',
            'status_label' => $isRtl ? 'مكتمل' : 'Completed',
            'status_color' => 'bg-slate-100 text-slate-700 border-slate-200',
            'dot_color'    => 'bg-slate-400'
        ],
    ]);
@endphp

@section('page-title', __('Admin Dashboard'))
@section('role-label', __('Admin'))

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
        {{ __('Dashboard') }}
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
        {{ __('Users') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.doctors.index') ? route('admin.doctors.index') : '#'" :active="request()->routeIs('admin.doctors.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ __('Doctors') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.departments.index') ? route('admin.departments.index') : '#'" :active="request()->routeIs('admin.departments.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 21h18"/><path d="M5 21V7l8-4 8 4v14M9 21v-6h6v6"/>
                    <path d="M9 11h.01M15 11h.01M9 15h.01M15 15h.01"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ __('Departments') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#'" :active="request()->routeIs('admin.appointments.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ __('Appointments') }}
    </x-sidebar-link>

    <div class="px-4 mt-6 mb-2 flex items-center gap-2">
        <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
        <span class="text-[10px] font-black tracking-widest text-slate-400 uppercase font-mono">
            {{ __('Other Menu') }}
        </span>
    </div>

    <x-sidebar-link :href="Route::has('admin.reports.index') ? route('admin.reports.index') : '#'" :active="request()->routeIs('admin.reports.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 3v18h18"/><path d="M18.7 8 13 13.7l-4-4L3 16"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ __('Reports') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.notifications.index') ? route('admin.notifications.index') : '#'" :active="request()->routeIs('admin.notifications.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ __('Notifications') }}
    </x-sidebar-link>

    <div class="pt-4 mt-4 border-t border-white/10">
        <x-sidebar-link :href="Route::has('admin.settings.index') ? route('admin.settings.index') : (Route::has('profile.edit') ? route('profile.edit') : '#')" :active="request()->routeIs('admin.settings.*') || request()->routeIs('profile.edit')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l-.06-.06a1.65 1.65 0 0 0-.33 1.82V9c.36.24.7.53 1 .87"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'إعدادات الحساب' : __('Account Settings') }}
        </x-sidebar-link>
    </div>
@endsection

@section('content')

    {{-- ══════════════════════════════════════════
         TOP GREETING & OPERATIONAL STATUS BAR
    ══════════════════════════════════════════ --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4 bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-xs">
        <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#14AFC3] via-[#0C6B78] to-[#152C4B] flex items-center justify-center text-white shadow-md shadow-[#14AFC3]/20 shrink-0">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <h1 class="text-xl sm:text-2xl font-black text-[#152C4B] dark:text-white tracking-tight leading-tight">
                        {{ __('Welcome back') }}، {{ explode(' ', Auth::user()->name ?? 'Admin')[0] }}
                    </h1>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] border border-[#14AFC3]/30">
                        {{ __('Admin Session') }}
                    </span>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-0.5">
                    {{ __('Manage users, doctors, departments, and monitor system performance.') }}
                </p>
            </div>
        </div>

        {{-- Date & Operational Badge --}}
        <div class="flex items-center gap-2.5 self-start md:self-auto">
            <div class="flex items-center gap-2 px-3.5 py-2 bg-slate-50 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/80 rounded-xl text-xs font-bold text-[#152C4B] dark:text-slate-200">
                <div class="w-6 h-6 rounded-lg bg-[#E5FAFC] dark:bg-[#14AFC3]/20 flex items-center justify-center text-[#14AFC3]">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>
                <span>{{ now()->translatedFormat('l، j F Y') }}</span>
            </div>

            <div class="hidden sm:flex items-center gap-1.5 px-3 py-2 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200/70 dark:border-emerald-800/60 rounded-xl text-xs font-bold text-emerald-700 dark:text-emerald-300">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>{{ __('Online') }}</span>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         4 STATS KPI CARDS (CENTERED ICONS & TEXT)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        
        {{-- 1. Patients --}}
        <a href="{{ Route::has('admin.users.index') ? route('admin.users.index') : '#' }}" class="block">
            <x-stat-card
                :label="$isRtl ? 'إجمالي المرضى المسجلين' : __('Patients')"
                :value="number_format($stats['patients'] ?? 1420)"
                :sublabel="$isRtl ? '+12% نمو شهري' : __('Registered patients')"
                :highlighted="true"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>
        </a>

        {{-- 2. Doctors --}}
        <a href="{{ Route::has('admin.doctors.index') ? route('admin.doctors.index') : '#' }}" class="block">
            <x-stat-card
                :label="$isRtl ? 'الأطباء والاستشاريون' : __('Doctors')"
                :value="$stats['doctors'] ?? 48"
                :sublabel="$isRtl ? '45 مناوب الآن' : __('Active doctors')"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>
        </a>

        {{-- 3. Departments --}}
        <a href="{{ Route::has('admin.departments.index') ? route('admin.departments.index') : '#' }}" class="block">
            <x-stat-card
                :label="$isRtl ? 'الأقسام والمراكز الطبية' : __('Departments')"
                :value="$stats['departments'] ?? 8"
                :sublabel="$isRtl ? '8 مراكز متخصصة' : __('Hospital departments')"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l8-4 8 4v14M9 21v-6h6v6M9 11h.01M15 11h.01M9 15h.01M15 15h.01"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>
        </a>

        {{-- 4. Appointments --}}
        <a href="{{ Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#' }}" class="block">
            <x-stat-card
                :label="$isRtl ? 'مواعيد هذا الشهر' : __('Appointments')"
                :value="number_format($stats['appointments'] ?? 342)"
                :sublabel="$isRtl ? '82% نسبة الإنجاز' : __('This month')"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                </x-slot:icon>
            </x-stat-card>
        </a>

    </div>

    {{-- ══════════════════════════════════════════
         SYSTEM OVERVIEW & EMERGENCY COMMAND
         (متناسق، متباعد ببراحة، بدون أي فراغ غير مرتب)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch mb-6">
        
        {{-- LEFT 7 COLUMNS: Clinical Performance & Operational Telemetry --}}
        <div class="lg:col-span-7 bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 p-6 sm:p-7 shadow-xs flex flex-col justify-between">
            
            <div class="space-y-6">
                {{-- Card Header --}}
                <div class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800">
                    <div class="flex items-center gap-3.5">
                        <div class="w-11 h-11 rounded-2xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center shadow-xs shrink-0">
                            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base sm:text-lg font-black text-[#152C4B] dark:text-white tracking-tight">{{ $isRtl ? 'نظرة عامة على النظام والمؤشرات التشغيلية' : __('System Overview & Performance') }}</h2>
                            <p class="text-xs text-slate-400 font-medium mt-0.5">{{ $isRtl ? 'متابعة لحظية لمعدلات الأداء، إشغال الأسرّة، وتدفق الرعاية' : __('Real-time telemetry and operational benchmarks') }}</p>
                        </div>
                    </div>
                    <a href="{{ Route::has('admin.reports.index') ? route('admin.reports.index') : '#' }}" 
                       class="inline-flex items-center gap-1.5 text-xs px-3.5 py-2 rounded-xl bg-[#E5FAFC] dark:bg-[#14AFC3]/20 text-[#0C6B78] dark:text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all font-bold group border border-[#14AFC3]/20 shadow-2xs">
                        <span>{{ $isRtl ? 'التقارير التفصيلية' : __('Full Reports') }}</span>
                        <svg class="w-3.5 h-3.5 rtl:rotate-180 group-hover:translate-x-0.5 rtl:group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                </div>

                {{-- Performance Progress Tracks (تباعد مريح، بطاقات أنيقة، غير متلاصقة) --}}
                <div class="space-y-3.5">
                    
                    {{-- 1. Appointment Completion --}}
                    <a href="{{ Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#' }}" class="block p-3.5 sm:p-4 rounded-2xl bg-slate-50/80 dark:bg-slate-800/40 border border-slate-100 dark:border-slate-800 hover:bg-[#E5FAFC]/40 dark:hover:bg-[#14AFC3]/10 hover:border-[#14AFC3]/30 transition-all group">
                        <div class="flex justify-between items-center mb-2.5">
                            <div class="flex items-center gap-2.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] shadow-xs"></span>
                                <span class="text-xs sm:text-sm font-black text-[#152C4B] dark:text-slate-200 group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'إنجاز مواعيد اليوم' : __('Appointment Completion') }}</span>
                                <span class="text-xs text-slate-400 font-medium hidden sm:inline">({{ $isRtl ? '280 من 342 موعد' : '280 of 342 completed' }})</span>
                            </div>
                            <span class="text-xs font-black text-[#0C6B78] dark:text-[#14AFC3] font-mono px-2.5 py-0.5 rounded-md bg-[#E5FAFC] dark:bg-[#14AFC3]/20 border border-teal-100" dir="ltr">{{ $overview['completion'] ?? 82 }}%</span>
                        </div>
                        <div class="w-full bg-slate-200/70 dark:bg-slate-700/60 rounded-full h-2.5 overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-1000 ease-out bg-gradient-to-r from-[#14AFC3] to-[#0C6B78]" 
                                 style="width: {{ $overview['completion'] ?? 82 }}%;"></div>
                        </div>
                    </a>

                    {{-- 2. Bed Occupancy Rate --}}
                    <a href="{{ Route::has('admin.reports.index') ? route('admin.reports.index') : '#' }}" class="block p-3.5 sm:p-4 rounded-2xl bg-slate-50/80 dark:bg-slate-800/40 border border-slate-100 dark:border-slate-800 hover:bg-[#E5FAFC]/40 dark:hover:bg-[#14AFC3]/10 hover:border-[#14AFC3]/30 transition-all group">
                        <div class="flex justify-between items-center mb-2.5">
                            <div class="flex items-center gap-2.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#0C6B78] shadow-xs"></span>
                                <span class="text-xs sm:text-sm font-black text-[#152C4B] dark:text-slate-200 group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'إشغال الأسرّة والعناية المركزة' : 'Bed & ICU Census' }}</span>
                                <span class="text-xs text-slate-400 font-medium hidden sm:inline">({{ $isRtl ? '34 من 38 سرير شاغل' : '34 of 38 beds' }})</span>
                            </div>
                            <span class="text-xs font-black text-[#0C6B78] dark:text-[#14AFC3] font-mono px-2.5 py-0.5 rounded-md bg-teal-50 dark:bg-slate-800 border border-teal-100" dir="ltr">89.5%</span>
                        </div>
                        <div class="w-full bg-slate-200/70 dark:bg-slate-700/60 rounded-full h-2.5 overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-1000 ease-out bg-gradient-to-r from-[#0C6B78] to-[#152C4B]" 
                                 style="width: 89.5%;"></div>
                        </div>
                    </a>

                    {{-- 3. Doctor Utilization & On-Duty Coverage --}}
                    <a href="{{ Route::has('admin.doctors.index') ? route('admin.doctors.index') : '#' }}" class="block p-3.5 sm:p-4 rounded-2xl bg-slate-50/80 dark:bg-slate-800/40 border border-slate-100 dark:border-slate-800 hover:bg-[#E5FAFC]/40 dark:hover:bg-[#14AFC3]/10 hover:border-[#14AFC3]/30 transition-all group">
                        <div class="flex justify-between items-center mb-2.5">
                            <div class="flex items-center gap-2.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-sky-500 shadow-xs"></span>
                                <span class="text-xs sm:text-sm font-black text-[#152C4B] dark:text-slate-200 group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'تغطية ونشاط الأطباء المناوبين' : __('Doctor Utilization') }}</span>
                                <span class="text-xs text-slate-400 font-medium hidden sm:inline">({{ $isRtl ? '33 طبيباً بالعيادات حالياً' : '33 active doctors' }})</span>
                            </div>
                            <span class="text-xs font-black text-sky-600 font-mono px-2.5 py-0.5 rounded-md bg-sky-50 dark:bg-slate-800 border border-sky-100" dir="ltr">{{ $overview['utilization'] ?? 68 }}%</span>
                        </div>
                        <div class="w-full bg-slate-200/70 dark:bg-slate-700/60 rounded-full h-2.5 overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-1000 ease-out bg-gradient-to-r from-sky-400 to-[#14AFC3]" 
                                 style="width: {{ $overview['utilization'] ?? 68 }}%;"></div>
                        </div>
                    </a>

                    {{-- 4. System Uptime --}}
                    <a href="{{ Route::has('admin.reports.index') ? route('admin.reports.index') : '#' }}" class="block p-3.5 sm:p-4 rounded-2xl bg-slate-50/80 dark:bg-slate-800/40 border border-slate-100 dark:border-slate-800 hover:bg-[#E5FAFC]/40 dark:hover:bg-[#14AFC3]/10 hover:border-[#14AFC3]/30 transition-all group">
                        <div class="flex justify-between items-center mb-2.5">
                            <div class="flex items-center gap-2.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 shadow-xs"></span>
                                <span class="text-xs sm:text-sm font-black text-[#152C4B] dark:text-slate-200 group-hover:text-[#14AFC3] transition-colors">{{ $isRtl ? 'استقرار وجاهزية النظام السحابي' : __('System Uptime') }}</span>
                                <span class="text-xs text-emerald-600 font-bold hidden sm:inline">({{ $isRtl ? 'متصل ومؤمن 24/7' : 'Secure 24/7' }})</span>
                            </div>
                            <span class="text-xs font-black text-emerald-600 font-mono px-2.5 py-0.5 rounded-md bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-100" dir="ltr">{{ $overview['uptime'] ?? 99.9 }}%</span>
                        </div>
                        <div class="w-full bg-slate-200/70 dark:bg-slate-700/60 rounded-full h-2.5 overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-1000 ease-out bg-emerald-500" 
                                 style="width: {{ $overview['uptime'] ?? 99 }}%;"></div>
                        </div>
                    </a>

                </div>

                {{-- 4 Daily Clinical Pulse Mini-Cards (Rich Hospital Throughput) --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2">
                    <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/70 dark:border-slate-800 flex flex-col justify-between hover:bg-[#E5FAFC]/30 transition-all">
                        <div class="flex items-center justify-between text-slate-400 mb-1.5">
                            <span class="text-[10px] font-black uppercase tracking-wider text-slate-500">{{ $isRtl ? 'العمليات' : 'Surgeries' }}</span>
                            <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                        </div>
                        <div class="text-base sm:text-lg font-black text-[#152C4B] dark:text-white font-mono leading-tight">8 <span class="text-xs font-bold text-slate-400">{{ $isRtl ? 'حالات' : 'cases' }}</span></div>
                        <span class="text-[10.5px] text-slate-400 font-medium mt-1 truncate">{{ $isRtl ? '3 جارية · 5 مكتملة' : '3 active · 5 done' }}</span>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/70 dark:border-slate-800 flex flex-col justify-between hover:bg-[#E5FAFC]/30 transition-all">
                        <div class="flex items-center justify-between text-slate-400 mb-1.5">
                            <span class="text-[10px] font-black uppercase tracking-wider text-slate-500">{{ $isRtl ? 'المختبر والأشعة' : 'Lab & X-Ray' }}</span>
                            <span class="w-2 h-2 rounded-full bg-sky-500"></span>
                        </div>
                        <div class="text-base sm:text-lg font-black text-[#152C4B] dark:text-white font-mono leading-tight">142 <span class="text-xs font-bold text-slate-400">{{ $isRtl ? 'فحص' : 'tests' }}</span></div>
                        <span class="text-[10.5px] text-slate-400 font-medium mt-1 truncate">{{ $isRtl ? '138 معتمدة' : '138 certified' }}</span>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/70 dark:border-slate-800 flex flex-col justify-between hover:bg-[#E5FAFC]/30 transition-all">
                        <div class="flex items-center justify-between text-slate-400 mb-1.5">
                            <span class="text-[10px] font-black uppercase tracking-wider text-slate-500">{{ $isRtl ? 'دخول الطوارئ' : 'ER Intake' }}</span>
                            <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                        </div>
                        <div class="text-base sm:text-lg font-black text-[#152C4B] dark:text-white font-mono leading-tight">34 <span class="text-xs font-bold text-slate-400">{{ $isRtl ? 'حالة' : 'patients' }}</span></div>
                        <span class="text-[10.5px] text-slate-400 font-medium mt-1 truncate">{{ $isRtl ? 'استجابة < 3.5 د' : 'Resp < 3.5m' }}</span>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/70 dark:border-slate-800 flex flex-col justify-between hover:bg-[#E5FAFC]/30 transition-all">
                        <div class="flex items-center justify-between text-slate-400 mb-1.5">
                            <span class="text-[10px] font-black uppercase tracking-wider text-slate-500">{{ $isRtl ? 'الصيدلية' : 'Pharmacy' }}</span>
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        </div>
                        <div class="text-base sm:text-lg font-black text-[#152C4B] dark:text-white font-mono leading-tight">318 <span class="text-xs font-bold text-slate-400">{{ $isRtl ? 'وصفة' : 'Rx' }}</span></div>
                        <span class="text-[10.5px] text-slate-400 font-medium mt-1 truncate">{{ $isRtl ? 'صرف فوري إلكتروني' : 'Direct dispense' }}</span>
                    </div>
                </div>
            </div>

            {{-- Compact Telemetry Strip (متناسق، واضح ومحدد) --}}
            <div class="grid grid-cols-3 gap-3.5 mt-6 pt-5 border-t border-slate-100 dark:border-slate-800 text-center">
                <div class="p-3.5 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200/60 dark:border-slate-700/60 flex flex-col items-center justify-center">
                    <span class="text-[10.5px] font-extrabold text-slate-400 uppercase tracking-wider">{{ $isRtl ? 'العيادات الفعالة' : 'Active Clinics' }}</span>
                    <span class="text-lg font-black text-[#152C4B] dark:text-white font-mono mt-1" dir="ltr">16 / 18</span>
                    <span class="text-[10.5px] text-slate-500 font-bold mt-0.5">{{ $isRtl ? 'عيادة نشطة اليوم' : 'Clinics open' }}</span>
                </div>
                <div class="p-3.5 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200/60 dark:border-slate-700/60 flex flex-col items-center justify-center">
                    <span class="text-[10.5px] font-extrabold text-slate-400 uppercase tracking-wider">{{ $isRtl ? 'معدل الانتظار' : 'Avg. Wait' }}</span>
                    <div class="flex items-baseline justify-center gap-1 mt-1">
                        <span class="text-lg font-black text-[#14AFC3] font-mono" dir="ltr">11.4</span>
                        <span class="text-xs font-bold text-[#14AFC3]">{{ $isRtl ? 'دقيقة' : 'min' }}</span>
                    </div>
                    <span class="text-[10.5px] text-emerald-600 font-bold mt-0.5">{{ $isRtl ? '-2.1 د (ممتاز)' : '-2.1m target' }}</span>
                </div>
                <div class="p-3.5 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200/60 dark:border-slate-700/60 flex flex-col items-center justify-center">
                    <span class="text-[10.5px] font-extrabold text-slate-400 uppercase tracking-wider">{{ $isRtl ? 'جاهزية الطوارئ' : 'ER Readiness' }}</span>
                    <span class="text-lg font-black text-emerald-600 font-mono mt-1" dir="ltr">100%</span>
                    <span class="text-[10.5px] text-slate-500 font-bold mt-0.5">{{ $isRtl ? '3 غرف إنعاش شاغرة' : '3 bays standby' }}</span>
                </div>
            </div>

        </div>

        {{-- RIGHT 5 COLUMNS: Emergency & Operational Triggers (منظم بدقة ومتوازن الارتفاع 100%) --}}
        <div class="lg:col-span-5 bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 p-6 sm:p-7 shadow-xs flex flex-col justify-between">
            <div class="space-y-4">
                {{-- Header with Emergency Beacon --}}
                <div class="flex items-center justify-between pb-3.5 border-b border-slate-100 dark:border-slate-800">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-rose-50 dark:bg-rose-950/40 text-rose-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <div>
                            <h2 class="text-base font-black text-[#152C4B] dark:text-white tracking-tight leading-tight">
                                {{ $isRtl ? 'عمليات الطوارئ والتدخل السريع' : 'Emergency & Operational Triggers' }}
                            </h2>
                            <p class="text-xs text-slate-400 font-medium mt-0.5">{{ $isRtl ? 'بروتوكولات الاستجابة الفورية لكامل المستشفى' : 'Hospital-wide instant protocols' }}</p>
                        </div>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/50 dark:text-emerald-300 border border-emerald-200/60 shrink-0">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                        {{ $isRtl ? 'جاهزية 24/7' : 'Live' }}
                    </span>
                </div>

                {{-- Action Trigger Stack --}}
                <div class="space-y-2.5">
                    
                    {{-- Trigger 1: Code Blue Broadcast --}}
                    <button type="button" onclick="openCodeBlueModal()" 
                            class="w-full flex items-center justify-between p-3.5 rounded-2xl text-white transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg group text-start cursor-pointer"
                            style="background: linear-gradient(135deg, #E11D48 0%, #9F1239 100%);
                                   box-shadow: 0 4px 16px -2px rgba(225,29,72,0.35);">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center bg-white/20 text-white group-hover:bg-white/30 transition-colors shrink-0">
                                <svg class="w-4.5 h-4.5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            </div>
                            <div>
                                <span class="font-black text-xs sm:text-sm block leading-tight">{{ $isRtl ? 'إطلاق نداء طوارئ (Code Blue)' : 'Trigger Code Blue Alert' }}</span>
                                <span class="text-[10.5px] text-white/80 block mt-0.5">{{ $isRtl ? 'بث فوري لفرق الإنعاش وشاشات الأقسام' : 'Hospital-wide resuscitation alert' }}</span>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 rounded-lg bg-white/20 text-white text-[10px] font-black tracking-wider uppercase shrink-0">
                            {{ $isRtl ? 'بث فوري' : 'Broadcast' }}
                        </span>
                    </button>

                    {{-- Trigger 2: Bed Allocation --}}
                    <button type="button" onclick="openBedAllocationModal()" 
                            class="w-full flex items-center justify-between p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/70 dark:border-slate-800 hover:bg-[#E5FAFC] dark:hover:bg-[#14AFC3]/10 hover:border-[#14AFC3]/40 transition-all duration-200 group text-start cursor-pointer">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700 text-[#14AFC3] shadow-xs group-hover:bg-[#14AFC3] group-hover:text-white transition-all shrink-0">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 4h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <span class="font-bold text-xs sm:text-sm text-[#152C4B] dark:text-white group-hover:text-[#14AFC3] transition-colors block leading-tight">{{ $isRtl ? 'حجز وتخصيص سرير إسعاف فوري' : 'Emergency Bed Allocation' }}</span>
                                <span class="text-[10.5px] text-slate-400 block mt-0.5">{{ $isRtl ? 'تفريغ وتوجيه سرير عناية / طوارئ' : 'Fast-track ICU/ER admission' }}</span>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-slate-300 group-hover:text-[#14AFC3] group-hover:translate-x-0.5 rtl:group-hover:-translate-x-0.5 rtl:rotate-180 transition-all shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    {{-- Trigger 3: Broadcast Doctors --}}
                    <button type="button" onclick="broadcastOnCallDoctors()" 
                            class="w-full flex items-center justify-between p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/70 dark:border-slate-800 hover:bg-[#E5FAFC] dark:hover:bg-[#14AFC3]/10 hover:border-[#14AFC3]/40 transition-all duration-200 group text-start cursor-pointer">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700 text-[#14AFC3] shadow-xs group-hover:bg-[#14AFC3] group-hover:text-white transition-all shrink-0">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                            </div>
                            <div>
                                <span class="font-bold text-xs sm:text-sm text-[#152C4B] dark:text-white group-hover:text-[#14AFC3] transition-colors block leading-tight">{{ $isRtl ? 'استدعاء كادر الأطباء المناوبين' : 'Broadcast On-Call Doctors' }}</span>
                                <span class="text-[10.5px] text-slate-400 block mt-0.5">{{ $isRtl ? 'إرسال Pager وتنبيه لهواتف المناوبين' : 'Send high-priority pager alerts' }}</span>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-slate-300 group-hover:text-[#14AFC3] group-hover:translate-x-0.5 rtl:group-hover:-translate-x-0.5 rtl:rotate-180 transition-all shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    {{-- Trigger 4: Export Census PDF --}}
                    <button type="button" onclick="exportLiveCensusPdf()" 
                            class="w-full flex items-center justify-between p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/70 dark:border-slate-800 hover:bg-[#E5FAFC] dark:hover:bg-[#14AFC3]/10 hover:border-[#14AFC3]/40 transition-all duration-200 group text-start cursor-pointer">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700 text-[#14AFC3] shadow-xs group-hover:bg-[#14AFC3] group-hover:text-white transition-all shrink-0">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <div>
                                <span class="font-bold text-xs sm:text-sm text-[#152C4B] dark:text-white group-hover:text-[#14AFC3] transition-colors block leading-tight">{{ $isRtl ? 'تصدير التقرير الإحصائي الفوري' : 'Export Instant Census PDF' }}</span>
                                <span class="text-[10.5px] text-slate-400 block mt-0.5">{{ $isRtl ? 'ملخص إشغال الأسرة والعمليات حالياً' : 'Download live occupancy report' }}</span>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-slate-300 group-hover:text-[#14AFC3] group-hover:translate-x-0.5 rtl:group-hover:-translate-x-0.5 rtl:rotate-180 transition-all shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                </div>

                {{-- عنصر جاهزية أسرّة الإنعاش والفريق المتأهب (يملأ الفراغ السابق بالكامل ويوفر قيمة سريرية فورية) --}}
                <div class="p-3.5 rounded-2xl bg-gradient-to-br from-slate-50 to-[#E5FAFC]/40 dark:from-slate-800/60 dark:to-slate-800/20 border border-slate-200/80 dark:border-slate-700/80 space-y-2.5">
                    <div class="flex items-center justify-between">
                        <span class="text-[11px] font-black text-[#152C4B] dark:text-white uppercase tracking-wider flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                            {{ $isRtl ? 'جاهزية التدخل السريع والطوارئ' : 'Rapid Response Readiness' }}
                        </span>
                        <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">
                            {{ $isRtl ? 'كامل الجاهزية' : 'Optimal' }}
                        </span>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div class="p-2.5 rounded-xl bg-white dark:bg-slate-800 border border-slate-100 dark:border-slate-700 shadow-2xs">
                            <span class="text-[10px] text-slate-400 block font-bold">{{ $isRtl ? 'أسرّة الإنعاش الشاغرة' : 'Available ICU Bays' }}</span>
                            <span class="font-black text-[#152C4B] dark:text-white font-mono text-sm mt-0.5 block">4 {{ $isRtl ? 'أسرّة شاغرة' : 'Beds Ready' }}</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-white dark:bg-slate-800 border border-slate-100 dark:border-slate-700 shadow-2xs">
                            <span class="text-[10px] text-slate-400 block font-bold">{{ $isRtl ? 'فريق الإنعاش المناوب' : 'Code Blue Team' }}</span>
                            <span class="font-black text-emerald-600 font-mono text-sm mt-0.5 block">{{ $isRtl ? 'فريق A (متأهب)' : 'Team A Ready' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Operational Shift Supervisor & Cloud Sync Stamp (مرتب ومتناسق) --}}
            <div class="mt-4 pt-3.5 border-t border-slate-100 dark:border-slate-800 space-y-2.5">
                <div class="flex items-center justify-between text-xs p-3 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/70 dark:border-slate-800">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-xl bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center font-black text-xs shadow-2xs">
                            {{ $isRtl ? 'ط.م' : 'MD' }}
                        </div>
                        <div>
                            <span class="text-xs font-black text-slate-800 dark:text-slate-200 block">{{ $isRtl ? 'المشرف الطبي العام للمناوبة' : 'Chief Medical Officer on Duty' }}</span>
                            <span class="text-[10.5px] text-slate-500 font-semibold block">{{ $isRtl ? 'د. طارق الدوسري · تحويلة: 101' : 'Dr. Tariq Al-Dosari · Ext. 101' }}</span>
                        </div>
                    </div>
                    <span class="text-[10.5px] font-black text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">
                        {{ $isRtl ? 'مناوب الآن' : 'Active' }}
                    </span>
                </div>

                <div class="flex items-center justify-between text-xs text-slate-400 font-medium px-1">
                    <span class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300 font-bold">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>{{ $isRtl ? 'الربط السحابي: متصل ومؤمّن' : 'Cloud Sync: Active' }}</span>
                    </span>
                    <span class="font-mono text-[11px] text-[#0C6B78] dark:text-[#14AFC3] font-black bg-[#E5FAFC] dark:bg-slate-800 px-2 py-0.5 rounded-md border border-teal-100 dark:border-slate-700">TLS 1.3 / v2.4</span>
                </div>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════
         LIVE CLINIC QUEUE & RECENT CONSULTATIONS
         (جدول احترافي مطابق 100% لمعايير الواجهات السابقة)
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        
        {{-- Section Header --}}
        <div class="p-5 sm:p-6 border-b border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-2xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#14AFC3] flex items-center justify-center shadow-xs shrink-0">
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <h2 class="text-base sm:text-lg font-black text-[#152C4B] dark:text-white tracking-tight">{{ $isRtl ? 'طابور العيادات والمواعيد المباشرة' : 'Live Clinic Queue & Consultations' }}</h2>
                        <span class="text-xs font-bold text-[#0C6B78] bg-[#E5FAFC] px-2.5 py-0.5 rounded-full border border-teal-100">
                            {{ $isRtl ? 'اليوم: 342 موعد' : 'Today: 342' }}
                        </span>
                    </div>
                    <p class="text-xs text-slate-400 font-medium mt-0.5">{{ $isRtl ? 'متابعة تدفق الحالات، أوقات الكشف، وجاهزية العيادات الخارجية' : 'Real-time patient flow and outpatient consult queue' }}</p>
                </div>
            </div>

            <div class="flex items-center gap-2 self-start sm:self-auto">
                <a href="{{ Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#' }}" 
                   class="inline-flex items-center gap-2 text-xs px-4 py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-bold transition-all shadow-sm shadow-[#14AFC3]/20 hover:scale-101 active:scale-98">
                    <span>{{ $isRtl ? 'عرض إدارة المواعيد بالكامل' : 'All Appointments' }}</span>
                    <svg class="w-3.5 h-3.5 rtl:rotate-180" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"/></svg>
                </a>
            </div>
        </div>

        {{-- Appointments Table (موزون 1:1، كل خانة وتحتها بياناتها بدقة هندسية) --}}
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed divide-y divide-slate-100 dark:divide-slate-800">
                <thead>
                    <tr class="bg-gradient-to-r from-slate-50 via-slate-50/80 to-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-300 text-xs font-extrabold uppercase tracking-wider border-b border-slate-100 dark:border-slate-800">
                        <th class="w-[26%] py-3.5 px-5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">{{ $isRtl ? 'المريض والسجل الطبي' : 'Patient & MRN' }}</th>
                        <th class="w-[22%] py-3.5 px-4 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">{{ $isRtl ? 'الطبيب المعالج' : 'Doctor' }}</th>
                        <th class="w-[20%] py-3.5 px-4 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">{{ $isRtl ? 'القسم والعيادة' : 'Department & Room' }}</th>
                        <th class="w-[14%] py-3.5 px-4 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">{{ $isRtl ? 'التوقيت' : 'Time' }}</th>
                        <th class="w-[18%] py-3.5 px-4 text-center whitespace-nowrap">{{ $isRtl ? 'حالة الموعد' : 'Status' }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 font-medium text-slate-700 dark:text-slate-200 bg-white dark:bg-slate-900">
                    @foreach($recentAppointments as $apt)
                        <tr class="hover:bg-[#E5FAFC]/35 dark:hover:bg-slate-800/40 transition-colors group">
                            
                            {{-- 1. المريض والسجل الطبي (اسم عريض واضح + Avatar مميز + كبسولة MRN فقط) --}}
                            <td class="w-[26%] py-4 px-5 whitespace-nowrap {{ $isRtl ? 'text-right' : 'text-left' }}">
                                <div class="flex items-center gap-3.5 min-w-0">
                                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-[#E5FAFC] to-[#CCF4F8] text-[#0C6B78] border border-[#14AFC3]/30 flex items-center justify-center font-black text-sm shrink-0 group-hover:scale-105 transition-transform shadow-2xs">
                                        {{ mb_substr($apt['patient'], 0, 1) }}
                                    </div>
                                    <div class="min-w-0">
                                        <span class="font-black text-[#152C4B] dark:text-white text-[13.5px] sm:text-[14px] hover:text-[#0C6B78] transition-colors leading-snug block truncate">{{ $apt['patient'] }}</span>
                                        <div class="mt-1">
                                            <span class="inline-flex items-center font-mono font-bold text-[11px] px-2.5 py-0.5 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200/80 dark:border-slate-700">
                                                <bdi dir="ltr">{{ $apt['mrn'] }}</bdi>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- 2. الطبيب المعالج واللقب المهني --}}
                            <td class="w-[22%] py-4 px-4 whitespace-nowrap {{ $isRtl ? 'text-right' : 'text-left' }}">
                                <span class="font-black text-[#152C4B] dark:text-slate-100 text-[13px] leading-snug block">{{ $apt['doctor'] }}</span>
                                <span class="text-xs text-slate-500 font-semibold mt-0.5 block">{{ $apt['doctor_title'] }}</span>
                            </td>

                            {{-- 3. القسم التخصصي ورقم العيادة --}}
                            <td class="w-[20%] py-4 px-4 whitespace-nowrap {{ $isRtl ? 'text-right' : 'text-left' }}">
                                <span class="font-bold text-slate-800 dark:text-slate-200 text-xs block">{{ $apt['department'] }}</span>
                                <div class="mt-1">
                                    <span class="inline-flex items-center text-[10.5px] font-bold text-[#0C6B78] bg-[#E5FAFC] px-2 py-0.5 rounded-md border border-[#14AFC3]/20">
                                        {{ $apt['room'] }}
                                    </span>
                                </div>
                            </td>

                            {{-- 4. التوقيت --}}
                            <td class="w-[14%] py-4 px-4 whitespace-nowrap {{ $isRtl ? 'text-right' : 'text-left' }}">
                                <span class="font-mono font-black text-xs text-slate-700 dark:text-slate-200 bg-slate-100 dark:bg-slate-800 px-2.5 py-1 rounded-lg border border-slate-200/80 inline-flex items-center gap-1.5 shadow-2xs">
                                    <svg class="w-3.5 h-3.5 text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>
                                    <span>{{ $apt['time'] }}</span>
                                </span>
                            </td>

                            {{-- 5. حالة الموعد (شارة واحدة فخمة ومريحة بدون أي ازدحام) --}}
                            <td class="w-[18%] py-4 px-4 text-center whitespace-nowrap">
                                @if($apt['status'] === 'in_progress')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-black bg-amber-50 text-amber-700 border border-amber-200 shadow-2xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        <span>{{ $apt['status_label'] }}</span>
                                    </span>
                                @elseif($apt['status'] === 'waiting')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-black bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30 shadow-2xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3] animate-pulse"></span>
                                        <span>{{ $apt['status_label'] }}</span>
                                    </span>
                                @elseif($apt['status'] === 'confirmed')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-black bg-emerald-50 text-emerald-700 border border-emerald-200 shadow-2xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        <span>{{ $apt['status_label'] }}</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                        <span>{{ $apt['status_label'] }}</span>
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    {{-- ══════════════════════════════════════════
         EMERGENCY MODAL 1: Code Blue Confirmation (كبير وفخم ومتناسق)
    ══════════════════════════════════════════ --}}
    <div id="codeBlueModal" class="fixed inset-0 z-50 bg-[#152C4B]/65 backdrop-blur-xs hidden items-center justify-center p-4 sm:p-6 overflow-y-auto">
        <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-2xl w-full border border-slate-100 dark:border-slate-800 shadow-2xl overflow-hidden my-auto animate-in fade-in zoom-in-95 duration-150">
            
            {{-- Modal Luxury Emergency Header --}}
            <div style="background: linear-gradient(135deg, #4C0519 0%, #881337 50%, #E11D48 100%);" class="px-7 py-6 text-white flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-md flex items-center justify-center text-white shrink-0 shadow-md animate-bounce">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <h3 class="font-black text-lg sm:text-xl text-white tracking-tight">{{ $isRtl ? 'إطلاق نداء إنعاش طارئ (Code Blue)' : 'Initiate Code Blue Broadcast' }}</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-white/20 border border-white/30 text-rose-100">
                                {{ $isRtl ? 'بث طوارئ عام' : 'Emergency Priority' }}
                            </span>
                        </div>
                        <p class="text-rose-100/90 text-xs mt-1 flex items-center gap-1.5 font-medium">
                            <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                            <span>{{ $isRtl ? 'بث إشارة فورية لكافة المناوبين، شاشات الأقسام، وأجهزة اللاسلكي' : 'Immediate emergency signal across all hospital screens' }}</span>
                        </p>
                    </div>
                </div>
                <button type="button" onclick="closeCodeBlueModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-base font-bold">✕</button>
            </div>

            <form onsubmit="confirmCodeBlue(event)" class="p-6 sm:p-8 space-y-5">
                
                <div class="space-y-4">
                    <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                        <span class="w-2.5 h-2.5 rounded-full bg-rose-600"></span>
                        <span>{{ $isRtl ? 'موقع الحالة الطارئة والجناح' : 'Emergency Location' }}</span>
                    </div>

                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">{{ $isRtl ? 'اختر موقع / جناح الحالة الطارئة *' : 'Emergency Location / Ward *' }}</label>
                        <select id="codeBlueLocation" class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 font-bold text-xs sm:text-sm text-slate-800 dark:text-white outline-none focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/15 transition-all">
                            <option value="العناية المركزة (ICU) - المبنى B">{{ $isRtl ? 'العناية المركزة (ICU) - المبنى B' : 'Intensive Care Unit (ICU) - Block B' }}</option>
                            <option value="قسم الطوارئ والحوادث - غرفة الإنعاش">{{ $isRtl ? 'قسم الطوارئ والحوادث - غرفة الإنعاش' : 'Emergency Room - Resuscitation Bay' }}</option>
                            <option value="غرف العمليات الجراحية - الدور 3">{{ $isRtl ? 'غرف العمليات الجراحية - الدور 3' : 'Surgical Operating Theaters - 3rd Floor' }}</option>
                            <option value="قسم القلب والقسطرة - الجناح الشرقي">{{ $isRtl ? 'قسم القلب والقسطرة - الجناح الشرقي' : 'Cardiology Ward - East Wing' }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">{{ $isRtl ? 'ملاحظة سريرية سريعة (اختياري)' : 'Quick Dispatch Note (Optional)' }}</label>
                        <input type="text" id="codeBlueNote" 
                               placeholder="{{ $isRtl ? 'مثال: توقف تنفسي حاد لمريض سرير 04' : 'e.g., Acute cardiac arrest Bed 04' }}" 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 font-bold text-xs sm:text-sm text-slate-800 dark:text-white outline-none focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/15 transition-all placeholder-slate-400">
                    </div>
                </div>

                {{-- تنبيه سريري --}}
                <div class="p-4 bg-rose-50/80 border border-rose-200/80 rounded-2xl flex items-center gap-3">
                    <span class="w-2.5 h-2.5 rounded-full bg-rose-600 animate-ping shrink-0"></span>
                    <p class="text-xs text-rose-800 font-bold leading-relaxed">
                        {{ $isRtl ? 'تنبيه: سيؤدي تأكيد النداء إلى إطلاق صافرة الطوارئ وتوجيه فريق التدخل السريع A فوراً للموقع المحدد.' : 'Alert: Confirming will broadcast an immediate siren alert to Emergency Rapid Response Team A.' }}
                    </p>
                </div>

                <div class="pt-3 flex items-center justify-end gap-3 border-t border-slate-100 dark:border-slate-800">
                    <button type="button" onclick="closeCodeBlueModal()" class="px-6 py-2.5 rounded-xl border border-slate-300 text-slate-700 dark:text-slate-300 font-bold hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer text-xs">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-7 py-2.5 rounded-xl bg-gradient-to-r from-rose-600 to-rose-700 hover:from-rose-700 hover:to-rose-800 text-white font-black text-xs transition-all shadow-md shadow-rose-600/30 flex items-center gap-2 cursor-pointer hover:scale-101 active:scale-98">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>{{ $isRtl ? 'تأكيد وبث النداء فوراً' : 'Broadcast Signal Now' }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         EMERGENCY MODAL 2: Bed Allocation (كبير وفخم ومتناسق)
    ══════════════════════════════════════════ --}}
    <div id="bedAllocationModal" class="fixed inset-0 z-50 bg-[#152C4B]/65 backdrop-blur-xs hidden items-center justify-center p-4 sm:p-6 overflow-y-auto">
        <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-2xl w-full border border-slate-100 dark:border-slate-800 shadow-2xl overflow-hidden my-auto animate-in fade-in zoom-in-95 duration-150">
            
            <div style="background: linear-gradient(135deg, #0A1628 0%, #152C4B 50%, #0C6B78 100%);" class="px-7 py-6 text-white flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-md flex items-center justify-center text-[#14AFC3] shrink-0 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 10h18M3 14h18m-9-4v8m-7 4h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <h3 class="font-black text-lg sm:text-xl text-white tracking-tight">{{ $isRtl ? 'حجز وتخصيص سرير إسعاف فوري' : 'Emergency Bed Fast-Track' }}</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-[#14AFC3]/25 border border-[#14AFC3]/40 text-teal-100">
                                {{ $isRtl ? 'تفريغ وتوجيه' : 'Fast-Track' }}
                            </span>
                        </div>
                        <p class="text-teal-100/90 text-xs mt-1 flex items-center gap-1.5 font-medium">
                            <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                            <span>{{ $isRtl ? 'حجز مباشر ومؤمن لحالة حرجة قادمة عبر طوارئ الإسعاف' : 'Direct admission reservation' }}</span>
                        </p>
                    </div>
                </div>
                <button type="button" onclick="closeBedAllocationModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-base font-bold">✕</button>
            </div>

            <form onsubmit="confirmBedAllocation(event)" class="p-6 sm:p-8 space-y-5">
                
                <div class="space-y-4">
                    <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <span>{{ $isRtl ? 'بيانات الحالة وسرير الإنعاش' : 'Emergency Intake & Bed' }}</span>
                    </div>

                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">{{ $isRtl ? 'اسم المريض أو الرقم المؤقت للإسعاف *' : 'Patient Name / Temporary ER ID *' }}</label>
                        <input type="text" id="erPatientName" required 
                               placeholder="{{ $isRtl ? 'مثال: حالة طارئة #ER-992' : 'e.g., Emergency Patient #ER-992' }}" 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 font-bold text-xs sm:text-sm text-slate-800 dark:text-white outline-none focus:bg-white focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">{{ $isRtl ? 'القسم المستهدف *' : 'Department *' }}</label>
                            <select class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 font-bold text-xs sm:text-sm text-slate-800 dark:text-white outline-none focus:bg-white focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all">
                                <option>{{ $isRtl ? 'العناية المركزة (ICU)' : 'Intensive Care' }}</option>
                                <option>{{ $isRtl ? 'طوارئ جراحية وحوادث' : 'Surgical Trauma' }}</option>
                                <option>{{ $isRtl ? 'إنعاش قلبي وقسطرة (CCU)' : 'Cardiac CCU' }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">{{ $isRtl ? 'السرير الشاغر المتاح *' : 'Available Bed *' }}</label>
                            <select class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-800 font-bold text-xs sm:text-sm text-slate-800 dark:text-white outline-none focus:bg-white focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all">
                                <option>{{ $isRtl ? 'سرير B-03 (جاهز فوراً ومطهر)' : 'Bed B-03 (Ready)' }}</option>
                                <option>{{ $isRtl ? 'سرير ICU-07 (مجهز تنفس اصطناعي)' : 'Bed ICU-07 (Ventilator)' }}</option>
                                <option>{{ $isRtl ? 'سرير ER-12 (إنعاش حوادث)' : 'Bed ER-12 (Trauma)' }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="pt-3 flex items-center justify-end gap-3 border-t border-slate-100 dark:border-slate-800">
                    <button type="button" onclick="closeBedAllocationModal()" class="px-6 py-2.5 rounded-xl border border-slate-300 text-slate-700 dark:text-slate-300 font-bold hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer text-xs">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-7 py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black text-xs transition-all shadow-md shadow-[#14AFC3]/20 cursor-pointer hover:scale-101 active:scale-98">
                        {{ $isRtl ? 'تأكيد حجز السرير فوراً' : 'Confirm Bed Fast-Track' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Unified System Toast Notification --}}
    <div id="systemEmergencyToast" class="fixed bottom-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 hidden items-center gap-3 px-5 py-3.5 bg-slate-900/95 dark:bg-slate-800 text-white rounded-2xl shadow-2xl border border-slate-700/60 text-xs font-bold transition-all duration-300 animate-in slide-in-from-bottom-3">
        <div id="emergencyToastIconBg" class="w-7 h-7 rounded-xl bg-[#14AFC3] flex items-center justify-center shrink-0 text-white shadow-xs">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
        </div>
        <span id="emergencyToastText" class="text-[13px] font-bold"></span>
    </div>

@push('scripts')
<script>
    // 1. Code Blue Modal Controls
    function openCodeBlueModal() {
        const m = document.getElementById('codeBlueModal');
        m.classList.remove('hidden');
        m.classList.add('flex');
    }
    function closeCodeBlueModal() {
        const m = document.getElementById('codeBlueModal');
        m.classList.add('hidden');
        m.classList.remove('flex');
    }
    function confirmCodeBlue(e) {
        e.preventDefault();
        const loc = document.getElementById('codeBlueLocation').value;
        closeCodeBlueModal();
        showEmergencyToast(`🚨 {{ $isRtl ? 'تم إطلاق نداء Code Blue بنجاح في:' : 'Code Blue broadcasted to:' }} ${loc}`, 'danger');
    }

    // 2. Bed Allocation Modal Controls
    function openBedAllocationModal() {
        const m = document.getElementById('bedAllocationModal');
        m.classList.remove('hidden');
        m.classList.add('flex');
    }
    function closeBedAllocationModal() {
        const m = document.getElementById('bedAllocationModal');
        m.classList.add('hidden');
        m.classList.remove('flex');
    }
    function confirmBedAllocation(e) {
        e.preventDefault();
        const patient = document.getElementById('erPatientName').value;
        closeBedAllocationModal();
        showEmergencyToast(`🛏️ {{ $isRtl ? 'تم تخصيص وتجهيز سرير الإنعاش للحالة:' : 'Emergency Bed allocated for:' }} ${patient}`, 'success');
    }

    // 3. Broadcast On-Call Doctors
    function broadcastOnCallDoctors() {
        showEmergencyToast("📢 {{ $isRtl ? 'تم إرسال نداء استدعاء عاجل (Pager) لـ 14 طبيباً مناوباً.' : 'Emergency pager sent to 14 on-duty doctors.' }}", 'info');
    }

    // 4. Export Live Census PDF
    function exportLiveCensusPdf() {
        showEmergencyToast("📄 {{ $isRtl ? 'جاري تجهيز وتنزيل التقرير الإحصائي الطبي الشامل...' : 'Compiling & downloading Live Census PDF...' }}", 'info');
    }

    // Toast Alert Engine
    function showEmergencyToast(msg, type = 'info') {
        const toast = document.getElementById('systemEmergencyToast');
        const text = document.getElementById('emergencyToastText');
        const iconBg = document.getElementById('emergencyToastIconBg');

        text.textContent = msg;

        if (type === 'danger') {
            iconBg.className = 'w-7 h-7 rounded-xl bg-rose-600 flex items-center justify-center shrink-0 text-white animate-pulse';
        } else if (type === 'success') {
            iconBg.className = 'w-7 h-7 rounded-xl bg-emerald-500 flex items-center justify-center shrink-0 text-white';
        } else {
            iconBg.className = 'w-7 h-7 rounded-xl bg-[#14AFC3] flex items-center justify-center shrink-0 text-white';
        }

        toast.classList.remove('hidden');
        toast.classList.add('flex');

        setTimeout(() => {
            toast.classList.add('hidden');
            toast.classList.remove('flex');
        }, 3600);
    }

    // إغلاق المودالات بزر Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeCodeBlueModal();
            closeBedAllocationModal();
        }
    });
</script>
@endpush

@endsection
