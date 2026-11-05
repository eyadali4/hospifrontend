@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    $doctorsList = (isset($doctors) && count($doctors) > 0) ? $doctors : collect([
        [
            'id' => 'DOC-1021',
            'name' => $isRtl ? 'د. سارة المنصوري' : 'Dr. Sarah Al-Mansouri',
            'email' => 's.mansouri@alrasheed.ye',
            'phone' => '771234118',
            'phone_full' => '+967 771 234 118',
            'initials' => $isRtl ? 'د.س' : 'SM',
            'color' => 'bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30',
            'department' => $isRtl ? 'أمراض وجراحة القلب' : 'Cardiology & Heart Surgery',
            'department_slug' => 'cardiology',
            'title' => $isRtl ? 'استشاري أول قسطرة وجراحة قلب' : 'Senior Consultant Cardiologist',
            'room' => $isRtl ? 'عيادة 204 · المبنى الرئيسي' : 'Clinic 204 · Main Wing',
            'status' => 'on_duty',
            'shift' => $isRtl ? 'صباحي (08:00 - 16:00)' : 'Morning (08:00 - 16:00)',
            'today_patients' => 14,
            'rating' => '4.9',
            'reviews_count' => 142
        ],
        [
            'id' => 'DOC-1022',
            'name' => $isRtl ? 'د. طارق الهاشمي' : 'Dr. Tariq Al-Hashemi',
            'email' => 't.hashemi@alrasheed.ye',
            'phone' => '777981442',
            'phone_full' => '+967 777 981 442',
            'initials' => $isRtl ? 'د.ط' : 'TH',
            'color' => 'bg-sky-50 text-sky-700 border border-sky-200/60',
            'department' => $isRtl ? 'جراحة العظام والمفاصل' : 'Orthopedics & Joint Surgery',
            'department_slug' => 'orthopedics',
            'title' => $isRtl ? 'أخصائي أول جراحة عظام ومفاصل' : 'Orthopedic Surgeon Specialist',
            'room' => $isRtl ? 'غرفة عمليات 03 · البرج الجراحي' : 'OR Suite 03 · Surgical Tower',
            'status' => 'in_surgery',
            'shift' => $isRtl ? 'مناوبة كاملة (08:00 - 20:00)' : 'Full Shift (08:00 - 20:00)',
            'today_patients' => 8,
            'rating' => '4.8',
            'reviews_count' => 98
        ],
        [
            'id' => 'DOC-1023',
            'name' => $isRtl ? 'د. أروى العريقي' : 'Dr. Arwa Al-Oraiqi',
            'email' => 'a.oraiqi@alrasheed.ye',
            'phone' => '772332901',
            'phone_full' => '+967 772 332 901',
            'initials' => $isRtl ? 'د.أ' : 'AO',
            'color' => 'bg-emerald-50 text-emerald-700 border border-emerald-200/60',
            'department' => $isRtl ? 'طب الأطفال وحديثي الولادة' : 'Pediatrics & Neonatology',
            'department_slug' => 'pediatrics',
            'title' => $isRtl ? 'استشارية طب أطفال وحديثي ولادة' : 'Consultant Pediatrician',
            'room' => $isRtl ? 'عيادة 108 · المبنى التخصصي' : 'Clinic 108 · Specialty Wing',
            'status' => 'on_duty',
            'shift' => $isRtl ? 'صباحي (08:00 - 16:00)' : 'Morning (08:00 - 16:00)',
            'today_patients' => 19,
            'rating' => '5.0',
            'reviews_count' => 210
        ],
        [
            'id' => 'DOC-1024',
            'name' => $isRtl ? 'د. نزار صالح الحكيمي' : 'Dr. Nizar Al-Hakeemi',
            'email' => 'n.hakeemi@alrasheed.ye',
            'phone' => '773771230',
            'phone_full' => '+967 773 771 230',
            'initials' => $isRtl ? 'د.ن' : 'NH',
            'color' => 'bg-indigo-50 text-indigo-700 border border-indigo-200/60',
            'department' => $isRtl ? 'المخ والأعصاب والعمود الفقري' : 'Neurology & Spine Care',
            'department_slug' => 'neurology',
            'title' => $isRtl ? 'أخصائي أول جراحة المخ والأعصاب' : 'Lead Neurosurgeon',
            'room' => $isRtl ? 'عيادة 310 · المبنى الرئيسي' : 'Clinic 310 · Main Wing',
            'status' => 'off_duty',
            'shift' => $isRtl ? 'مسائي (16:00 - 00:00)' : 'Evening (16:00 - 00:00)',
            'today_patients' => 0,
            'rating' => '4.7',
            'reviews_count' => 64
        ],
        [
            'id' => 'DOC-1025',
            'name' => $isRtl ? 'د. ندى عبدالملك العريقي' : 'Dr. Nada Al-Oraiqi',
            'email' => 'n.oraiqi@alrasheed.ye',
            'phone' => '774410887',
            'phone_full' => '+967 774 410 887',
            'initials' => $isRtl ? 'د.ن' : 'NO',
            'color' => 'bg-purple-50 text-purple-700 border border-purple-200/60',
            'department' => $isRtl ? 'النساء والتوليد ورعاية الأمومة' : 'Obstetrics & Gynecology',
            'department_slug' => 'obgyn',
            'title' => $isRtl ? 'استشارية طب وجراحة النساء والتوليد' : 'Consultant OB/GYN',
            'room' => $isRtl ? 'عيادة 215 · مبنى الأمومة' : 'Clinic 215 · Maternity Block',
            'status' => 'on_leave',
            'shift' => $isRtl ? 'إجازة معتمدة' : 'Approved Leave',
            'today_patients' => 0,
            'rating' => '4.9',
            'reviews_count' => 183
        ],
        [
            'id' => 'DOC-1026',
            'name' => $isRtl ? 'د. فيصل عبدالرحمن الشريف' : 'Dr. Faisal Al-Sharif',
            'email' => 'f.sharif@alrasheed.ye',
            'phone' => '775119554',
            'phone_full' => '+967 775 119 554',
            'initials' => $isRtl ? 'د.ف' : 'FS',
            'color' => 'bg-amber-50 text-amber-800 border border-amber-200/60',
            'department' => $isRtl ? 'الطوارئ والحوادث والعناية المركزة' : 'Emergency & Trauma Care',
            'department_slug' => 'emergency',
            'title' => $isRtl ? 'استشاري أول طب الطوارئ والحوادث' : 'Chief Trauma & ER Specialist',
            'room' => $isRtl ? 'جناح الإنعاش الحرج · الطوارئ العامة' : 'Trauma Bay 01 · ER Floor',
            'status' => 'on_duty',
            'shift' => $isRtl ? 'مناوبة طوارئ (12 ساعة)' : 'Trauma Shift (12 hrs)',
            'today_patients' => 24,
            'rating' => '4.9',
            'reviews_count' => 312
        ]
    ]);
@endphp

@section('page-title', $isRtl ? 'إدارة الأطباء' : __('Doctor Management'))
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

    <x-sidebar-link :href="Route::has('admin.departments.index') ? route('admin.departments.index') : '#'" :active="request()->routeIs('admin.departments.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 21h18M5 21V7l8-4 8 4v14M9 21v-6h6v6M9 11h.01M15 11h.01M9 15h.01M15 15h.01"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'الأقسام الطبية' : __('Departments') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#'" :active="request()->routeIs('admin.appointments.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'المواعيد' : __('Appointments') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.reports.index') ? route('admin.reports.index') : '#'" :active="request()->routeIs('admin.reports.*')">
        <x-slot:icon>
            <div class="w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 3v18h18"/><path d="M18.7 8 13 13.7l-4-4L3 16"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'التقارير' : __('Reports') }}
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
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c.36.24.7.53 1 .87"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'إعدادات النظام' : __('System Settings') }}
    </x-sidebar-link>
@endsection

@section('content')

{{-- ══════════════════════════════════════════════
     PRINT STYLESHEET (OFFICIAL DOCTOR CREDENTIAL BADGE)
══════════════════════════════════════════════ --}}
<style>
    @media print {
        body * {
            visibility: hidden !important;
        }
        #printableDoctorBadge, #printableDoctorBadge * {
            visibility: visible !important;
        }
        #printableDoctorBadge {
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
            margin: 12mm;
        }
        .no-print {
            display: none !important;
        }
    }
</style>

<div class="space-y-6" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

    {{-- ══════════════════════════════════════════
         TOP HEADER & ACTIONS (CLEAN & PROFESSIONAL)
    ══════════════════════════════════════════ --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-5 bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-xs">
        <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#14AFC3] via-[#0C6B78] to-[#152C4B] flex items-center justify-center text-white shadow-md shadow-[#14AFC3]/20 shrink-0">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl sm:text-2xl font-black text-[#152C4B] dark:text-white tracking-tight leading-tight flex items-center gap-2">
                    <span>{{ $isRtl ? 'دليل إدارة الأطباء' : 'Doctor Management Directory' }}</span>
                    <span class="inline-block w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-0.5">
                    {{ $isRtl ? 'إدارة الكادر الطبي، التخصصات الإكلينيكية، جداول المناوبات، وغرف العيادات والعمليات المعتمدة بمستشفى الرشيد.' : 'Manage medical staff roster, clinical specialties, duty schedules, and operating suites.' }}
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2.5 self-start sm:self-auto">
            <button type="button" onclick="triggerExport()" 
                    class="px-4 py-2.5 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-[#152C4B] dark:text-slate-200 text-xs font-bold rounded-xl border border-slate-200/80 dark:border-slate-700 shadow-xs transition-all flex items-center gap-2 cursor-pointer hover:border-[#14AFC3]">
                <svg width="15" height="15" class="text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span>{{ $isRtl ? 'طباعة كشف الأطباء' : 'Print Roster' }}</span>
            </button>

            <button type="button" onclick="openDoctorModal()" 
                    class="px-4 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white text-xs font-black rounded-xl shadow-md shadow-[#14AFC3]/20 transition-all flex items-center gap-1.5 cursor-pointer hover:-translate-y-0.5">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                <span>{{ $isRtl ? 'إضافة طبيب جديد' : 'Add New Doctor' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         4 KPI METRIC CARDS (CENTERED ICONS & TEXT)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        {{-- Card 1: Total Doctors --}}
        <x-stat-card 
            :label="$isRtl ? 'إجمالي الأطباء الاستشاريين' : 'Total Medical Doctors'" 
            value="48" 
            :sublabel="'+3 ' . ($isRtl ? 'هذا الشهر · مستشفى الرشيد' : 'this month · Al-Rasheed')"
            :highlighted="true">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 2: On Duty Now --}}
        <x-stat-card 
            :label="$isRtl ? 'المناوبون على رأس العمل' : 'On Duty Right Now'" 
            value="31" 
            :sublabel="'64.5% ' . ($isRtl ? 'تغطية سريرية مباشرة' : 'Direct Coverage')"
            iconBg="bg-emerald-50 dark:bg-emerald-950/40"
            iconColor="text-emerald-600 dark:text-emerald-400">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 3: Active Operating Clinics --}}
        <x-stat-card 
            :label="$isRtl ? 'العيادات وغرف العمليات النشطة' : 'Active Clinics & Suites'" 
            value="18 / 22" 
            :sublabel="'81.8% ' . ($isRtl ? 'جاهزية العيادات' : 'Readiness')">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h18M5 21V7l8-4 8 4v14M9 21v-6h6v6M9 11h.01M15 11h.01M9 15h.01M15 15h.01"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 4: Today Consultations --}}
        <x-stat-card 
            :label="$isRtl ? 'استشارات ومعاينات اليوم' : 'Today Consultations'" 
            value="194" 
            :sublabel="'86% ' . ($isRtl ? 'مكتملة · 28 قيد المتابعة' : 'Done · 28 in Progress')">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

    </div>

    {{-- ══════════════════════════════════════════
         FILTER & SEARCH TOOLBAR (IN ONE UNIFIED ROW)
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 p-3.5 shadow-xs">
        <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-3">
            
            {{-- الجانب الأول: تبويبات الأقسام الإكلينيكية بنمط كبسولات موحد --}}
            <div class="flex items-center gap-1.5 overflow-x-auto scrollbar-none text-xs pb-1 xl:pb-0">
                <button type="button" onclick="filterDepartment('all', this)" 
                        class="dept-tab active px-3.5 py-2 rounded-xl font-bold bg-[#14AFC3] text-white shadow-xs flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                    <span>{{ $isRtl ? 'جميع الأقسام' : 'All Departments' }}</span>
                    <span class="tab-badge px-1.5 py-0.5 rounded-md text-[10px] font-mono bg-white/20 text-white font-bold">48</span>
                </button>

                <button type="button" onclick="filterDepartment('cardiology', this)" 
                        class="dept-tab px-3.5 py-2 rounded-xl font-bold bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/60 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                    <span>{{ $isRtl ? 'أمراض القلب' : 'Cardiology' }}</span>
                    <span class="tab-badge px-1.5 py-0.5 rounded-md text-[10px] font-mono bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 border border-slate-200/60 dark:border-slate-600">8</span>
                </button>

                <button type="button" onclick="filterDepartment('orthopedics', this)" 
                        class="dept-tab px-3.5 py-2 rounded-xl font-bold bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/60 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                    <span>{{ $isRtl ? 'جراحة العظام' : 'Orthopedics' }}</span>
                    <span class="tab-badge px-1.5 py-0.5 rounded-md text-[10px] font-mono bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 border border-slate-200/60 dark:border-slate-600">7</span>
                </button>

                <button type="button" onclick="filterDepartment('pediatrics', this)" 
                        class="dept-tab px-3.5 py-2 rounded-xl font-bold bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/60 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                    <span>{{ $isRtl ? 'طب الأطفال' : 'Pediatrics' }}</span>
                    <span class="tab-badge px-1.5 py-0.5 rounded-md text-[10px] font-mono bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 border border-slate-200/60 dark:border-slate-600">9</span>
                </button>

                <button type="button" onclick="filterDepartment('neurology', this)" 
                        class="dept-tab px-3.5 py-2 rounded-xl font-bold bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/60 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                    <span>{{ $isRtl ? 'المخ والأعصاب' : 'Neurology' }}</span>
                    <span class="tab-badge px-1.5 py-0.5 rounded-md text-[10px] font-mono bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 border border-slate-200/60 dark:border-slate-600">5</span>
                </button>

                <button type="button" onclick="filterDepartment('emergency', this)" 
                        class="dept-tab px-3.5 py-2 rounded-xl font-bold bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/60 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                    <span>{{ $isRtl ? 'الطوارئ والإصابات' : 'Emergency & Trauma' }}</span>
                    <span class="tab-badge px-1.5 py-0.5 rounded-md text-[10px] font-mono bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 border border-slate-200/60 dark:border-slate-600">12</span>
                </button>
            </div>

            {{-- الجانب الثاني في نفس الخط: شريط البحث + فلتر الحالة التشغيلية + عداد الأطباء --}}
            <div class="flex items-center gap-2.5 flex-wrap sm:flex-nowrap shrink-0">
                {{-- شريط البحث --}}
                <div class="relative w-full sm:w-64 md:w-72">
                    <input type="text" id="doctorSearch" oninput="applyFilters()" 
                           placeholder="{{ $isRtl ? 'ابحث باسم الطبيب، العيادة، أو الرقم الطبي...' : 'Search by doctor name, room, or ID...' }}" 
                           class="w-full text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700 rounded-xl py-2 {{ $isRtl ? 'pr-9 pl-3.5' : 'pl-9 pr-3.5' }} text-slate-900 dark:text-white focus:ring-1 focus:ring-[#14AFC3] focus:border-[#14AFC3] transition-all placeholder:text-slate-400 outline-none">
                    <div class="absolute inset-y-0 {{ $isRtl ? 'right-3' : 'left-3' }} flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                    </div>
                </div>

                {{-- القائمة المنسدلة لفلتر الحالة --}}
                <select id="statusFilter" onchange="applyFilters()" class="text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700 rounded-xl py-2 px-3 text-[#152C4B] dark:text-slate-200 font-bold focus:ring-1 focus:ring-[#14AFC3] outline-none cursor-pointer shrink-0">
                    <option value="all">{{ $isRtl ? 'جميع الحالات التشغيلية' : 'All Statuses' }}</option>
                    <option value="on_duty">{{ $isRtl ? 'على رأس العمل (مناوب)' : 'On Duty' }}</option>
                    <option value="in_surgery">{{ $isRtl ? 'في غرفة العمليات' : 'In Surgery' }}</option>
                    <option value="off_duty">{{ $isRtl ? 'خارج المناوبة' : 'Off Duty' }}</option>
                    <option value="on_leave">{{ $isRtl ? 'في إجازة معتمدة' : 'On Leave' }}</option>
                </select>

                {{-- عداد الأطباء المعروضين --}}
                <span class="text-xs font-bold text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-800 px-3 py-2 rounded-xl border border-slate-200/80 dark:border-slate-700 flex items-center gap-1 shrink-0 whitespace-nowrap">
                    <span id="filteredCount" class="font-mono text-[#14AFC3] font-black">{{ $doctorsList->count() }}</span>
                    <span>{{ $isRtl ? 'طبيب معروض' : 'Doctors Listed' }}</span>
                </span>
            </div>

        </div>
    </div>

    {{-- ══════════════════════════════════════════
         DOCTORS DIRECTORY TABLE (1:1 MATHEMATICAL ALIGNMENT)
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[1000px] border-collapse" id="doctorsTable">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
                        <th class="w-[23%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'الطبيب والرقم الطبي' : 'Doctor & Staff ID' }}
                        </th>
                        <th class="w-[18%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'القسم الطبي' : 'Department' }}
                        </th>
                        <th class="w-[15%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'العيادة / الموقع' : 'Clinic / Room' }}
                        </th>
                        <th class="w-[13%] py-4 px-3 text-center whitespace-nowrap">
                            {{ $isRtl ? 'الحالة التشغيلية' : 'Status' }}
                        </th>
                        <th class="w-[17%] py-4 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'المناوبة' : 'Duty Shift' }}
                        </th>
                        <th class="w-[14%] py-4 px-4 text-center whitespace-nowrap">
                            {{ $isRtl ? 'الإجراءات' : 'Actions' }}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/70 text-slate-600 dark:text-slate-300 font-medium">
                    @foreach($doctorsList as $doc)
                    <tr class="doctor-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group"
                        data-name="{{ strtolower($doc['name']) }}"
                        data-name-raw="{{ $doc['name'] }}"
                        data-dept="{{ $doc['department_slug'] }}"
                        data-dept-name="{{ $doc['department'] }}"
                        data-title="{{ $doc['title'] }}"
                        data-room="{{ strtolower($doc['room']) }}"
                        data-room-raw="{{ $doc['room'] }}"
                        data-id="{{ $doc['id'] }}"
                        data-phone="{{ $doc['phone'] }}"
                        data-phone-full="{{ $doc['phone_full'] ?? '+967 ' . $doc['phone'] }}"
                        data-email="{{ $doc['email'] }}"
                        data-shift="{{ $doc['shift'] }}"
                        data-today-patients="{{ $doc['today_patients'] }}"
                        data-rating="{{ $doc['rating'] }}"
                        data-reviews="{{ $doc['reviews_count'] }}"
                        data-initials="{{ $doc['initials'] }}"
                        data-status="{{ $doc['status'] }}">
                        
                        {{-- 1. الطبيب والرقم الطبي (23%) --}}
                        <td class="w-[23%] py-4 px-5">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-[#E5FAFC] to-[#CCF4F8] text-[#0C6B78] border border-[#14AFC3]/30 font-black text-sm flex items-center justify-center shrink-0 shadow-xs group-hover:scale-105 transition-transform">
                                    {{ $doc['initials'] }}
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="font-black text-slate-900 dark:text-white text-xs sm:text-[13.5px] truncate group-hover:text-[#14AFC3] transition-colors cursor-pointer"
                                          onclick="quickViewDoctor(this)">
                                        {{ $doc['name'] }}
                                    </div>
                                    <div class="flex items-center gap-1.5 mt-0.5">
                                        <span class="inline-flex items-center font-mono font-bold text-[10px] px-2 py-0.5 rounded-md bg-[#E5FAFC] dark:bg-[#14AFC3]/20 text-[#0C6B78] dark:text-[#14AFC3] border border-[#14AFC3]/30 shadow-2xs">
                                            <bdi dir="ltr">{{ $doc['id'] }}</bdi>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        {{-- 2. القسم الطبي (18%) --}}
                        <td class="w-[18%] py-4 px-4">
                            <span class="font-bold text-slate-900 dark:text-slate-200 text-xs truncate block" title="{{ $doc['department'] }}">
                                {{ $doc['department'] }}
                            </span>
                        </td>

                        {{-- 3. العيادة / الموقع (15%) --}}
                        <td class="w-[15%] py-4 px-4">
                            <div class="flex items-center gap-1.5 text-slate-700 dark:text-slate-300 font-medium text-xs truncate">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#14AFC3] shrink-0">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                                </svg>
                                <span class="truncate font-semibold" title="{{ $doc['room'] }}">{{ $doc['room'] }}</span>
                            </div>
                        </td>

                        {{-- 4. الحالة التشغيلية (13% - محاذاة في الوسط) --}}
                        <td class="w-[13%] py-4 px-3 text-center">
                            @if($doc['status'] === 'on_duty')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200/80 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span>{{ $isRtl ? 'على رأس العمل' : 'On Duty' }}</span>
                                </span>
                            @elseif($doc['status'] === 'in_surgery')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 dark:bg-amber-950/40 dark:text-amber-300 border border-amber-200/80 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                    <span>{{ $isRtl ? 'في غرفة العمليات' : 'In Surgery' }}</span>
                                </span>
                            @elseif($doc['status'] === 'off_duty')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300 border border-slate-200 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                                    <span>{{ $isRtl ? 'خارج المناوبة' : 'Off Duty' }}</span>
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 dark:bg-rose-950/40 dark:text-rose-300 border border-rose-200/80 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                                    <span>{{ $isRtl ? 'إجازة معتمدة' : 'On Leave' }}</span>
                                </span>
                            @endif
                        </td>

                        {{-- 5. المناوبة (17%) --}}
                        <td class="w-[17%] py-4 px-3.5">
                            <span class="text-slate-900 dark:text-slate-200 font-bold text-xs truncate block" title="{{ $doc['shift'] }}">
                                {{ $doc['shift'] }}
                            </span>
                        </td>

                        {{-- 6. الإجراءات (14% - محاذاة في الوسط) --}}
                        <td class="w-[14%] py-4 px-4 text-center">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                                {{-- Quick Print Pass --}}
                                <button type="button" onclick="quickPrintDoctorCard(this)" 
                                        title="{{ $isRtl ? 'طباعة تصريح الطبيب المعتمد' : 'Print Pass' }}" 
                                        class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#0C6B78] hover:bg-[#14AFC3] hover:text-white transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                </button>

                                {{-- Eye View Details Modal --}}
                                <button type="button" onclick="quickViewDoctor(this)" 
                                        title="{{ $isRtl ? 'معاينة كامل تفاصيل الطبيب' : 'View Full Details' }}" 
                                        class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>

                                {{-- Edit Button --}}
                                <button type="button" onclick="openEditDoctorModal(this)" 
                                        title="{{ $isRtl ? 'تعديل البيانات' : 'Edit' }}" 
                                        class="w-8 h-8 rounded-xl text-slate-500 hover:text-[#14AFC3] hover:bg-slate-200/60 dark:hover:bg-slate-700 transition-all cursor-pointer flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>

                                {{-- Status Toggle / Deactivate --}}
                                <button type="button" onclick="confirmDeactivateDoctor(this)" 
                                        title="{{ $isRtl ? 'تغيير الحالة التشغيلية' : 'Change Status' }}" 
                                        class="w-8 h-8 rounded-xl text-slate-400 hover:text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-950/40 transition-all cursor-pointer flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Table Footer Pagination --}}
        <div class="py-3 px-5 bg-slate-50/60 dark:bg-slate-800/60 border-t border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-400 font-medium">
            <span>{{ $isRtl ? 'عرض 1 إلى 6 من أصل 48 طبيباً مسجلاً بالنظام (مستشفى الرشيد - صنعاء)' : 'Showing 1 to 6 of 48 registered medical doctors (Al-Rasheed Hospital - Sana\'a)' }}</span>
            <div class="flex items-center gap-1.5">
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 disabled:opacity-50 text-xs font-semibold" disabled>{{ $isRtl ? 'السابق' : 'Prev' }}</button>
                <button class="px-3 py-1.5 rounded-xl bg-[#14AFC3] text-white text-xs font-black shadow-xs">1</button>
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 text-xs font-semibold cursor-pointer">2</button>
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 text-xs font-semibold cursor-pointer">{{ $isRtl ? 'التالي' : 'Next' }}</button>
            </div>
        </div>
    </div>

</div>

{{-- ════════════════════════════════════════════════════════════════
     MODAL 1: VIEW DOCTOR DOSSIER (THE LUXURY EYE MODAL)
════════════════════════════════════════════════════════════════ --}}
<div id="viewDoctorModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/65 backdrop-blur-xs hidden p-4 sm:p-6 overflow-y-auto" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-3xl w-full max-w-2xl shadow-2xl border border-slate-100 dark:border-slate-800 overflow-hidden my-auto transform transition-all animate-in fade-in zoom-in-95 duration-200">
        
        {{-- Luxury Modal Header --}}
        <div style="background: linear-gradient(135deg, #0A1628 0%, #152C4B 50%, #0C6B78 100%);" class="px-7 py-6 text-white flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-13 h-13 rounded-2xl bg-white/15 border border-white/25 backdrop-blur-md flex items-center justify-center text-[#14AFC3] flex-shrink-0 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <h3 class="font-black text-lg sm:text-xl text-white tracking-tight">{{ $isRtl ? 'الملف الإكلينيكي والاعتماد الطبي' : 'Doctor Clinical Dossier & Credentials' }}</h3>
                        <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-[#14AFC3]/25 border border-[#14AFC3]/40 text-teal-100">
                            {{ $isRtl ? 'طبيب مرخص ومصرح' : 'Licensed Physician' }}
                        </span>
                    </div>
                    <p class="text-teal-100/90 text-xs mt-1 flex items-center gap-1.5 font-medium">
                        <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                        <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · السجل الطبي للأطباء' : 'Al-Rasheed Hospital · Medical Staff Registry' }}</span>
                    </p>
                </div>
            </div>
            <button type="button" onclick="closeViewModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-base font-bold">✕</button>
        </div>

        {{-- Modal Body --}}
        <div class="p-6 sm:p-7 space-y-5">
            
            {{-- Hero Profile Box --}}
            <div class="p-5 rounded-2xl bg-gradient-to-r from-[#E5FAFC]/90 via-white to-[#E5FAFC]/50 dark:from-[#14AFC3]/10 dark:via-slate-800/80 dark:to-[#14AFC3]/5 border border-[#14AFC3]/30 shadow-xs flex items-center justify-between gap-4">
                <div class="flex items-center gap-4 min-w-0">
                    <div id="viewDoctorAvatar" class="w-15 h-15 rounded-2xl bg-gradient-to-tr from-[#152C4B] to-[#0C6B78] text-white font-black text-xl flex items-center justify-center flex-shrink-0 shadow-md border-2 border-white dark:border-slate-700">
                        د.س
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <h3 class="font-black text-base sm:text-lg text-[#152C4B] dark:text-white truncate" id="viewDoctorName">د. سارة المنصوري</h3>
                            <span class="px-2.5 py-0.5 rounded-lg bg-[#152C4B] text-teal-200 font-mono font-black text-xs shadow-2xs" id="viewDoctorIdBadge">DOC-1021</span>
                        </div>
                        <div class="text-xs sm:text-sm text-[#0C6B78] dark:text-[#14AFC3] font-bold mt-1" id="viewDoctorTitle">استشاري أول قسطرة وجراحة قلب</div>
                        <div class="mt-2">
                            <span id="viewDoctorStatusBadge" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span id="viewDoctorStatusText">{{ $isRtl ? 'على رأس العمل (مناوب)' : 'On Duty' }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Clinical & Operational Specifications --}}
            <div>
                <div class="text-[11px] font-black text-[#152C4B] dark:text-slate-300 uppercase tracking-wider mb-2.5 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                    <span>{{ $isRtl ? 'البيانات الإكلينيكية والموقع المعتمد' : 'Clinical & Suite Details' }}</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                    <div class="p-3.5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60">
                        <span class="text-slate-400 block text-[11px] font-bold mb-1">{{ $isRtl ? 'القسم الطبي المعتمد' : 'Clinical Department' }}</span>
                        <strong class="text-[#152C4B] dark:text-white font-black text-sm block" id="viewDoctorDept">أمراض وجراحة القلب</strong>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60">
                        <span class="text-slate-400 block text-[11px] font-bold mb-1">{{ $isRtl ? 'العيادة / غرفة العمليات' : 'Assigned Clinic / Suite' }}</span>
                        <strong class="text-[#152C4B] dark:text-white font-black text-sm block" id="viewDoctorRoom">عيادة 204 · المبنى الرئيسي</strong>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60">
                        <span class="text-slate-400 block text-[11px] font-bold mb-1">{{ $isRtl ? 'جدول المناوبة المعتمد' : 'Shift Schedule' }}</span>
                        <strong class="text-emerald-700 dark:text-emerald-400 font-black text-sm block" id="viewDoctorShift">صباحي (08:00 - 16:00)</strong>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60">
                        <span class="text-slate-400 block text-[11px] font-bold mb-1">{{ $isRtl ? 'نشاط ومعاينات اليوم' : 'Today Cases Seen' }}</span>
                        <strong class="text-[#0C6B78] dark:text-[#14AFC3] font-black text-sm block" id="viewDoctorTodayPatients">14 حالة تمت معاينتها اليوم</strong>
                    </div>
                </div>
            </div>

            {{-- Contact Credentials --}}
            <div>
                <div class="text-[11px] font-black text-[#152C4B] dark:text-slate-300 uppercase tracking-wider mb-2.5 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>{{ $isRtl ? 'بيانات الاتصال والتواصل المعتمد' : 'Official Contact Channels' }}</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                    <div class="p-3.5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60 flex items-center justify-between">
                        <div>
                            <span class="text-slate-400 block text-[11px] font-bold">{{ $isRtl ? 'رقم الهاتف (الجمهورية اليمنية)' : 'Mobile Phone' }}</span>
                            <div class="flex items-center gap-1.5 mt-1">
                                <span class="font-mono font-black text-slate-800 dark:text-white text-sm" dir="ltr"><bdi id="viewDoctorPhone">+967 771 234 118</bdi></span>
                            </div>
                        </div>
                        <button type="button" onclick="copyDoctorPhone()" title="{{ $isRtl ? 'نسخ' : 'Copy' }}" class="p-2 rounded-xl text-slate-400 hover:text-[#14AFC3] hover:bg-white dark:hover:bg-slate-700 transition cursor-pointer">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="14" height="14" x="8" y="8" rx="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                        </button>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60 flex items-center justify-between">
                        <div class="min-w-0">
                            <span class="text-slate-400 block text-[11px] font-bold">{{ $isRtl ? 'البريد المؤسسي الرسمي' : 'Hospital Email' }}</span>
                            <span class="font-mono font-bold text-[#152C4B] dark:text-white block truncate text-xs mt-1" dir="ltr" id="viewDoctorEmail">s.mansouri@alrasheed.ye</span>
                        </div>
                        <button type="button" onclick="copyDoctorEmail()" title="{{ $isRtl ? 'نسخ' : 'Copy' }}" class="p-2 rounded-xl text-slate-400 hover:text-[#14AFC3] hover:bg-white dark:hover:bg-slate-700 transition cursor-pointer flex-shrink-0">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="14" height="14" x="8" y="8" rx="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Patient Rating & Clinical Excellence --}}
            <div class="p-4 rounded-2xl bg-amber-50/70 dark:bg-amber-950/20 border border-amber-200/60 dark:border-amber-800/40 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-100 dark:bg-amber-900/50 text-amber-600 flex items-center justify-center font-black text-lg">
                        ★
                    </div>
                    <div>
                        <div class="text-xs font-bold text-slate-800 dark:text-white flex items-center gap-1.5">
                            <span>{{ $isRtl ? 'تقييم المرضى المعتمد:' : 'Certified Rating:' }}</span>
                            <span class="font-mono font-black text-amber-600" id="viewDoctorRating">4.9 / 5.0</span>
                        </div>
                        <div class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5" id="viewDoctorReviews">
                            142 {{ $isRtl ? 'مراجعة وتقييم سريري موثق' : 'verified patient reviews' }}
                        </div>
                    </div>
                </div>
                <span class="px-2.5 py-1 rounded-full text-[10.5px] font-bold bg-white dark:bg-slate-800 text-amber-700 dark:text-amber-300 border border-amber-200/60">
                    {{ $isRtl ? 'امتياز إكلينيكي' : 'Clinical Excellence' }}
                </span>
            </div>

            {{-- Modal Action Footer --}}
            <div class="flex items-center justify-between gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <button type="button" onclick="closeViewModal()" 
                        class="px-6 py-2.5 text-xs font-bold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-xl transition-colors cursor-pointer">
                    {{ $isRtl ? 'إغلاق' : 'Close' }}
                </button>

                <button type="button" onclick="printCardFromProfileModal()" 
                        class="px-7 py-2.5 text-xs font-black text-white bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] rounded-xl transition-all flex items-center gap-2 cursor-pointer shadow-md shadow-[#14AFC3]/20 hover:scale-101 active:scale-98">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    <span>{{ $isRtl ? 'طباعة بطاقة وتصريح الطبيب' : 'Print Official Pass' }}</span>
                </button>
            </div>

        </div>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════════════
     MODAL 2: ADD NEW DOCTOR (LUXURY MODAL)
════════════════════════════════════════════════════════════════ --}}
<div id="addDoctorModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/65 backdrop-blur-xs hidden p-4 sm:p-6 overflow-y-auto" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-3xl w-full max-w-2xl shadow-2xl border border-slate-100 dark:border-slate-800 overflow-hidden my-auto transform transition-all animate-in fade-in zoom-in-95 duration-200">
        
        {{-- Luxury Modal Header --}}
        <div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 100%);" class="px-7 py-5 text-white flex items-center justify-between">
            <div class="flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-xs flex items-center justify-center text-[#14AFC3] flex-shrink-0 shadow-xs">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <h3 class="font-black text-base sm:text-lg text-white tracking-tight">
                            {{ $isRtl ? 'إضافة طبيب جديد للكادر الطبي (مستشفى الرشيد)' : 'Add New Doctor to Medical Staff' }}
                        </h3>
                        <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-[#14AFC3]/25 border border-[#14AFC3]/40 text-teal-100">
                            {{ $isRtl ? 'اعتماد طبي فوري' : 'Instant Credentialing' }}
                        </span>
                    </div>
                    <p class="text-teal-100/90 text-xs mt-1 flex items-center gap-1.5 font-medium">
                        <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                        <span>{{ $isRtl ? 'تسجيل بيانات الطبيب، التخصص الإكلينيكي، والعيادة المعتمدة' : 'Register credentials, clinical specialty, and assigned clinic' }}</span>
                    </p>
                </div>
            </div>
            <button type="button" onclick="closeDoctorModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-base font-bold">✕</button>
        </div>

        {{-- Form Body --}}
        <form onsubmit="handleDoctorFormSubmit(event)" class="p-6 sm:p-7 space-y-5">
            
            {{-- القسم الأول: البيانات الشخصية والمهنية --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'البيانات الشخصية والهوية المهنية للطبيب' : 'Doctor Personal & Professional Identity' }}</span>
                </div>

                {{-- الاسم الكامل --}}
                <div>
                    <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                        {{ $isRtl ? 'اسم الطبيب الكامل (رباعي مع اللقب) *' : 'Full Doctor Name *' }}
                    </label>
                    <input type="text" id="addDoctorName" required 
                           placeholder="{{ $isRtl ? 'مثال: د. إبراهيم يحيى الزبيري' : 'e.g. Dr. Ibrahim Al-Zubairi' }}" 
                           class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white placeholder-slate-400">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'الرقم الوظيفي / ترخيص المزاولة *' : 'Staff ID / Medical License *' }}
                        </label>
                        <input type="text" id="addDoctorStaffId" required 
                               placeholder="{{ $isRtl ? 'مثال: DOC-1035' : 'e.g. DOC-1035' }}" 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-black text-sm text-slate-800 dark:text-white placeholder-slate-400">
                    </div>

                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'الدرجة العلمية / اللقب الطبي *' : 'Medical Title / Rank *' }}
                        </label>
                        <select id="addDoctorRank" class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white cursor-pointer">
                            <option value="Senior Consultant">{{ $isRtl ? 'طبيب استشاري أول' : 'Senior Consultant' }}</option>
                            <option value="Consultant">{{ $isRtl ? 'طبيب استشاري' : 'Consultant' }}</option>
                            <option value="Specialist">{{ $isRtl ? 'طبيب أخصائي أول' : 'Specialist' }}</option>
                            <option value="Resident">{{ $isRtl ? 'طبيب مقيم' : 'Resident' }}</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- القسم الثاني: التخصص الإكلينيكي وموقع العمل --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'التخصص الإكلينيكي وموقع العمل' : 'Clinical Placement & Suite' }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'القسم الطبي المعتمد *' : 'Department *' }}
                        </label>
                        <select id="addDoctorDept" required class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white cursor-pointer">
                            <option value="cardiology">{{ $isRtl ? 'أمراض وجراحة القلب' : 'Cardiology' }}</option>
                            <option value="orthopedics">{{ $isRtl ? 'جراحة العظام والمفاصل' : 'Orthopedics' }}</option>
                            <option value="pediatrics">{{ $isRtl ? 'طب الأطفال وحديثي الولادة' : 'Pediatrics' }}</option>
                            <option value="neurology">{{ $isRtl ? 'المخ والأعصاب والعمود الفقري' : 'Neurology' }}</option>
                            <option value="emergency">{{ $isRtl ? 'الطوارئ والحوادث والعناية المركزة' : 'Emergency & Trauma' }}</option>
                            <option value="obgyn">{{ $isRtl ? 'النساء والتوليد ورعاية الأمومة' : 'Obstetrics & Gynecology' }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'الموقع / العيادة المعتمدة *' : 'Assigned Clinic Room *' }}
                        </label>
                        <input type="text" id="addDoctorRoom" required 
                               placeholder="{{ $isRtl ? 'مثال: عيادة 204 · المبنى الرئيسي' : 'e.g. Clinic 204 · Main Wing' }}" 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white placeholder-slate-400">
                    </div>
                </div>

                <div>
                    <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                        {{ $isRtl ? 'جدول المناوبة المعتمد *' : 'Shift Schedule *' }}
                    </label>
                    <select id="addDoctorShift" class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white cursor-pointer">
                        <option value="morning">{{ $isRtl ? 'صباحي (08:00 - 16:00)' : 'Morning Shift (08:00 - 16:00)' }}</option>
                        <option value="evening">{{ $isRtl ? 'مسائي (16:00 - 00:00)' : 'Evening Shift (16:00 - 00:00)' }}</option>
                        <option value="night">{{ $isRtl ? 'ليلي (00:00 - 08:00)' : 'Night Shift (00:00 - 08:00)' }}</option>
                        <option value="full">{{ $isRtl ? 'مناوبة كاملة (08:00 - 20:00)' : 'Full Shift (08:00 - 20:00)' }}</option>
                    </select>
                </div>
            </div>

            {{-- القسم الثالث: قنوات التواصل والبريد المؤسسي --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'قنوات التواصل المعتمدة' : 'Official Contact Channels' }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'رقم الهاتف (الجمهورية اليمنية) *' : 'Phone Number *' }}
                        </label>
                        <div class="relative">
                            <input type="text" id="addDoctorPhone" required 
                                   placeholder="771234567" 
                                   class="w-full h-11 sm:h-12 {{ $isRtl ? 'pr-16 pl-4' : 'pl-16 pr-4' }} rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-black text-sm text-slate-800 dark:text-white placeholder-slate-400" dir="ltr">
                            <span class="absolute top-1/2 -translate-y-1/2 {{ $isRtl ? 'right-3' : 'left-3' }} px-2 py-1 rounded-lg bg-slate-200/80 dark:bg-slate-700 text-[11px] font-black font-mono text-slate-600 dark:text-slate-300 select-none">
                                +967
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'البريد المؤسسي الرسمي *' : 'Hospital Email *' }}
                        </label>
                        <input type="email" id="addDoctorEmail" required 
                               placeholder="doctor@alrasheed.ye" 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-bold text-sm text-slate-800 dark:text-white placeholder-slate-400" dir="ltr">
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <button type="button" onclick="closeDoctorModal()" 
                        class="px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer text-xs sm:text-sm">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="submit" 
                        class="px-7 py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black text-xs sm:text-sm transition-all shadow-md shadow-[#0C6B78]/25 hover:scale-101 active:scale-98 cursor-pointer flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>{{ $isRtl ? 'حفظ وتعيين الطبيب' : 'Save & Assign Doctor' }}</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════════════
     MODAL 3: EDIT DOCTOR DATA (LUXURY MODAL)
════════════════════════════════════════════════════════════════ --}}
<div id="editDoctorModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/65 backdrop-blur-xs hidden p-4 sm:p-6 overflow-y-auto" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-3xl w-full max-w-2xl shadow-2xl border border-slate-100 dark:border-slate-800 overflow-hidden my-auto transform transition-all animate-in fade-in zoom-in-95 duration-200">
        
        {{-- Luxury Modal Header --}}
        <div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 100%);" class="px-7 py-5 text-white flex items-center justify-between">
            <div class="flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-xs flex items-center justify-center text-[#14AFC3] flex-shrink-0 shadow-xs">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <h3 class="font-black text-base sm:text-lg text-white tracking-tight">
                            {{ $isRtl ? 'تعديل بيانات الطبيب والملف الإكلينيكي' : 'Edit Doctor Profile & Credentials' }}
                        </h3>
                        <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-[#14AFC3]/25 border border-[#14AFC3]/40 text-teal-100">
                            {{ $isRtl ? 'تعديل معتمد' : 'Verified Edit' }}
                        </span>
                    </div>
                    <p class="text-teal-100/90 text-xs mt-1 flex items-center gap-1.5 font-medium">
                        <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                        <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · السجل الطبي والإداري الموحد' : 'Al-Rasheed Hospital · Official Doctors Registry' }}</span>
                    </p>
                </div>
            </div>
            <button type="button" onclick="closeEditDoctorModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-base font-bold">✕</button>
        </div>

        {{-- Form Body --}}
        <form onsubmit="handleEditDoctorSubmit(event)" class="p-6 sm:p-7 space-y-5">
            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'البيانات الشخصية والمهنية' : 'Personal & Professional Details' }}</span>
                </div>

                <div>
                    <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                        {{ $isRtl ? 'اسم الطبيب الكامل *' : 'Full Name *' }}
                    </label>
                    <input type="text" id="editDoctorName" required 
                           class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'المسمى الطبي / التخصص الدقيق *' : 'Medical Title *' }}
                        </label>
                        <input type="text" id="editDoctorTitle" required 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white">
                    </div>
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'الحالة التشغيلية *' : 'Status *' }}
                        </label>
                        <select id="editDoctorStatus" class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white cursor-pointer">
                            <option value="on_duty">{{ $isRtl ? 'على رأس العمل (مناوب)' : 'On Duty' }}</option>
                            <option value="in_surgery">{{ $isRtl ? 'في غرفة العمليات' : 'In Surgery' }}</option>
                            <option value="off_duty">{{ $isRtl ? 'خارج المناوبة' : 'Off Duty' }}</option>
                            <option value="on_leave">{{ $isRtl ? 'في إجازة معتمدة' : 'On Leave' }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'القسم وموقع العمل والمناوبة' : 'Placement & Shift' }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'القسم الطبي المعتمد *' : 'Department *' }}
                        </label>
                        <input type="text" id="editDoctorDept" required 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white">
                    </div>
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'العيادة / الغرفة المعتمدة *' : 'Room / Clinic *' }}
                        </label>
                        <input type="text" id="editDoctorRoom" required 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white">
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'قنوات التواصل المعتمدة' : 'Official Contact Channels' }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'رقم الهاتف (الجمهورية اليمنية) *' : 'Phone Number *' }}
                        </label>
                        <div class="relative">
                            <input type="text" id="editDoctorPhone" required 
                                   class="w-full h-11 sm:h-12 {{ $isRtl ? 'pr-16 pl-4' : 'pl-16 pr-4' }} rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-black text-sm text-slate-800 dark:text-white" dir="ltr">
                            <span class="absolute top-1/2 -translate-y-1/2 {{ $isRtl ? 'right-3' : 'left-3' }} px-2 py-1 rounded-lg bg-slate-200/80 dark:bg-slate-700 text-[11px] font-black font-mono text-slate-600 dark:text-slate-300 select-none">
                                +967
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'البريد المؤسسي الرسمي *' : 'Hospital Email *' }}
                        </label>
                        <input type="email" id="editDoctorEmail" required 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-bold text-sm text-slate-800 dark:text-white" dir="ltr">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <button type="button" onclick="closeEditDoctorModal()" 
                        class="px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer text-xs sm:text-sm">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="submit" 
                        class="px-7 py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black text-xs sm:text-sm transition-all shadow-md shadow-[#0C6B78]/25 hover:scale-101 active:scale-98 cursor-pointer flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ $isRtl ? 'حفظ التعديلات' : 'Save Changes' }}</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════════════
     REAL PRINTABLE TEMPLATE: OFFICIAL DOCTOR CLINICAL CREDENTIAL
════════════════════════════════════════════════════════════════ --}}
<div id="printableDoctorBadge" class="hidden">
    
    {{-- Official Hospital Letterhead --}}
    <div style="border-bottom: 2px solid #0C6B78; padding-bottom: 14px; margin-bottom: 22px; display: flex; justify-content: space-between; align-items: center; font-family: 'Cairo', 'Inter', sans-serif;">
        <div style="text-align: right;">
            <div style="font-size: 15px; font-weight: 900; color: #152C4B;">الجمهورية اليمنية</div>
            <div style="font-size: 13px; font-weight: 800; color: #0C6B78;">وزارة الصحة العامة والسكان · مستشفى الرشيد التخصصي (صنعاء)</div>
            <div style="font-size: 11px; color: #64748B; font-weight: 600;">الهيئة الطبية العليا · دائرة شؤون الأطباء والاعتماد الإكلينيكي</div>
        </div>

        {{-- Center Hospital Crest --}}
        <div style="text-align: center;">
            <div style="width: 54px; height: 54px; border-radius: 14px; background: linear-gradient(135deg, #14AFC3, #0C6B78); margin: 0 auto; display: flex; align-items: center; justify-content: center; color: #ffffff;">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <span style="font-size: 10px; font-weight: 900; letter-spacing: 1.5px; color: #152C4B; text-transform: uppercase; margin-top: 4px; display: block;">AL-RASHEED</span>
        </div>

        <div style="text-align: left;" dir="ltr">
            <div style="font-size: 14px; font-weight: 900; color: #152C4B;">REPUBLIC OF YEMEN</div>
            <div style="font-size: 12px; font-weight: 800; color: #0C6B78;">Al-Rasheed Specialized Hospital - Sana'a</div>
            <div style="font-size: 10.5px; color: #64748B; font-weight: 600;">Directorate of Medical Affairs & Credentialing</div>
        </div>
    </div>

    {{-- Document Subtitle / Reference Banner --}}
    <div style="background: #E5FAFC; border: 1px solid #14AFC3; border-radius: 12px; padding: 10px 16px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 12px; font-weight: 900; color: #0C6B78;">بطاقة مزاولة وتصريح إكلينيكي معتمد</span>
            <span style="font-size: 11px; color: #64748B; margin-right: 12px;">(Official Doctor Clinical Credential & Surgery Pass)</span>
        </div>
        <div style="font-family: monospace; font-size: 11px; font-weight: 800; color: #152C4B;">
            REF: <span id="printDocRef">RSD-DOC-2026-X</span>
        </div>
    </div>

    {{-- The Executive Physical ID Card Mockup --}}
    <div style="max-width: 650px; margin: 0 auto 30px auto; border: 2px solid #14AFC3; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); background: #ffffff;">
        <div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 60%, #14AFC3 100%); padding: 14px 20px; color: #ffffff; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div style="width: 32px; height: 32px; border-radius: 8px; background: rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 16px;">
                    ✚
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 900; letter-spacing: 0.5px;">مستشفى الرشيد التخصصي · صنعاء</div>
                    <div style="font-size: 9.5px; opacity: 0.85;">AL-RASHEED SPECIALIZED HOSPITAL · SANA'A, YEMEN</div>
                </div>
            </div>
            <div style="text-align: left; font-family: monospace; font-size: 10px; font-weight: bold; background: rgba(255,255,255,0.18); padding: 4px 10px; border-radius: 6px;">
                CONSULTANT PASS · Level 4
            </div>
        </div>

        <div style="padding: 24px; display: flex; gap: 24px; align-items: center; background: #fafcfe;">
            <div style="width: 140px; text-align: center; flex-shrink: 0;">
                <div id="printDoctorAvatarBox" style="width: 110px; height: 110px; margin: 0 auto 10px auto; border-radius: 22px; background: #E5FAFC; border: 3px solid #14AFC3; display: flex; align-items: center; justify-content: center; font-size: 32px; font-weight: 900; color: #0C6B78; box-shadow: 0 2px 8px rgba(20,175,195,0.15);">
                    د.س
                </div>
                <div style="font-family: monospace; font-size: 12px; font-weight: 900; color: #152C4B; background: #ffffff; border: 1px solid #D5DFEB; padding: 3px 8px; border-radius: 6px; display: inline-block;">
                    ID: <span id="printDoctorId">DOC-1021</span>
                </div>
                <div style="margin-top: 10px;">
                    <span style="font-size: 9px; font-weight: 800; background: #10B981; color: #ffffff; padding: 2px 8px; border-radius: 10px;">
                        مرخص · LICENSED
                    </span>
                </div>
            </div>

            <div style="flex: 1; text-align: right;">
                <div style="margin-bottom: 12px; border-bottom: 1px solid #E2E8F0; padding-bottom: 8px;">
                    <div id="printDoctorName" style="font-size: 20px; font-weight: 900; color: #152C4B; line-height: 1.2;">د. سارة المنصوري</div>
                    <div id="printDoctorTitle" style="font-size: 12px; font-weight: 700; color: #14AFC3; margin-top: 2px;">استشاري أول قسطرة وجراحة قلب</div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px 16px; font-size: 11px;">
                    <div>
                        <span style="color: #64748B; font-size: 10px; display: block;">القسم الطبي / Dept:</span>
                        <strong id="printDoctorDept" style="color: #1E293B;">أمراض وجراحة القلب</strong>
                    </div>
                    <div>
                        <span style="color: #64748B; font-size: 10px; display: block;">العيادة / Clinic:</span>
                        <strong id="printDoctorRoom" style="color: #1E293B;">عيادة 204 · المبنى الرئيسي</strong>
                    </div>
                    <div>
                        <span style="color: #64748B; font-size: 10px; display: block;">المناوبة / Duty Shift:</span>
                        <strong id="printDoctorShift" style="color: #1E293B;">صباحي (08:00 - 16:00)</strong>
                    </div>
                    <div>
                        <span style="color: #64748B; font-size: 10px; display: block;">الصلاحية الجراحية:</span>
                        <strong style="color: #0C6B78;">Full Surgical Clearance</strong>
                    </div>
                </div>

                <div style="margin-top: 14px; padding-top: 10px; border-top: 1px dashed #CBD5E1; display: flex; justify-content: space-between; align-items: center; font-size: 10px; color: #475569;">
                    <div>
                        البريد: <span id="printDoctorEmail" style="font-family: monospace; font-weight: 600;">s.mansouri@alrasheed.ye</span>
                    </div>
                    <div>
                        الهاتف: <span id="printDoctorPhone" style="font-family: monospace; font-weight: 600;">+967 771 234 118</span>
                    </div>
                </div>
            </div>
        </div>

        <div style="background: #ffffff; border-top: 1px solid #E2E8F0; padding: 12px 24px; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="display: flex; gap: 2px; height: 28px; align-items: flex-end;">
                    <div style="width: 3px; height: 28px; background: #000;"></div>
                    <div style="width: 1px; height: 28px; background: #000;"></div>
                    <div style="width: 4px; height: 28px; background: #000;"></div>
                    <div style="width: 2px; height: 28px; background: #000;"></div>
                    <div style="width: 1px; height: 28px; background: #000;"></div>
                    <div style="width: 3px; height: 28px; background: #000;"></div>
                    <div style="width: 5px; height: 28px; background: #000;"></div>
                    <div style="width: 2px; height: 28px; background: #000;"></div>
                    <div style="width: 4px; height: 28px; background: #000;"></div>
                    <div style="width: 2px; height: 28px; background: #000;"></div>
                </div>
                <span id="printBarcodeText" style="font-family: monospace; font-size: 11px; font-weight: 800; color: #334155;">*RSD-DOC-1021-SEC*</span>
            </div>

            <div style="font-size: 10px; color: #64748B; font-weight: 700; text-align: left;">
                <span>صالح حتى: <strong>2027/12/31</strong></span>
                <span style="margin: 0 6px;">·</span>
                <span>تاريخ الإصدار: <strong>{{ date('Y/m/d') }}</strong></span>
            </div>
        </div>
    </div>

    {{-- Official Endorsement Section --}}
    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-top: 40px; padding-top: 20px; border-top: 1px solid #E2E8F0; text-align: center; font-size: 11px;">
        <div>
            <div style="color: #64748B; font-weight: 700; margin-bottom: 25px;">ختم الاعتماد الإكلينيكي</div>
            <div style="width: 82px; height: 82px; border-radius: 50%; border: 2px dashed #14AFC3; margin: 0 auto; display: flex; flex-direction: column; align-items: center; justify-content: center; font-size: 8.5px; font-weight: 900; color: #0C6B78; transform: rotate(-8deg); line-height: 1.35; padding: 4px;">
                <span>معتمد رسمياً</span>
                <span style="font-size: 8px; color: #152C4B;">مستشفى الرشيد</span>
                <span style="font-size: 7.5px; color: #64748B;">صنعاء - اليمن</span>
            </div>
        </div>

        <div>
            <div style="color: #64748B; font-weight: 700; margin-bottom: 35px;">توقيع الطبيب المعتمد</div>
            <div style="border-bottom: 1px solid #94A3B8; width: 140px; margin: 0 auto 6px auto;"></div>
            <span style="font-size: 10px; color: #64748B;">Licensed Physician Signature</span>
        </div>

        <div>
            <div style="color: #64748B; font-weight: 700; margin-bottom: 35px;">رئيس المجلس الطبي / CMO</div>
            <div style="font-family: 'Cairo', cursive; font-size: 14px; font-weight: 900; color: #152C4B; border-bottom: 1px solid #94A3B8; width: 150px; margin: 0 auto 6px auto;">
                د. عبد الرحمن السعيد
            </div>
            <span style="font-size: 10px; color: #64748B;">Chief Medical Officer</span>
        </div>
    </div>

    {{-- Security Footer --}}
    <div style="margin-top: 40px; padding-top: 14px; border-top: 1px solid #CBD5E1; text-align: center; font-size: 9.5px; color: #94A3B8; line-height: 1.6;">
        هذه الوثيقة صادرة عن الجمهورية اليمنية - وزارة الصحة العامة والسكان (مستشفى الرشيد التخصصي - صنعاء). تخول حاملها الممارسة الإكلينيكية ودخول الأجنحة الجراحية المقيدة بموجب اللائحة الطبية.
        <br>
        Al-Rasheed Specialized Hospital (Sana'a, Yemen) · Directorate of Medical Affairs & Physician Accreditation
    </div>

</div>

{{-- ══════════════════════════════════════════
     TOAST NOTIFICATION ENGINE
══════════════════════════════════════════ --}}
<div id="toastNotification" class="fixed bottom-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-[#152C4B] text-white text-xs font-bold px-4 py-3 rounded-2xl shadow-2xl flex items-center gap-2.5 border border-slate-700/60">
        <span class="w-2 h-2 rounded-full bg-[#14AFC3] shrink-0 animate-pulse"></span>
        <span id="toastMessage"></span>
    </div>
</div>

{{-- ══════════════════════════════════════════
     INTERACTIVE JAVASCRIPT & PRINT LOGIC
══════════════════════════════════════════ --}}
<script>
    let activeDept = 'all';
    let currentDoctorData = null;
    let targetDoctorRowForEdit = null;

    function openDoctorModal() {
        document.getElementById('addDoctorModal').classList.remove('hidden');
    }

    function closeDoctorModal() {
        document.getElementById('addDoctorModal').classList.add('hidden');
    }

    function openEditDoctorModal(btn) {
        targetDoctorRowForEdit = btn.closest('tr');
        if (!targetDoctorRowForEdit) return;

        document.getElementById('editDoctorName').value = targetDoctorRowForEdit.dataset.nameRaw || '';
        document.getElementById('editDoctorTitle').value = targetDoctorRowForEdit.dataset.title || '';
        document.getElementById('editDoctorDept').value = targetDoctorRowForEdit.dataset.deptName || '';
        document.getElementById('editDoctorRoom').value = targetDoctorRowForEdit.dataset.roomRaw || '';
        document.getElementById('editDoctorPhone').value = targetDoctorRowForEdit.dataset.phone || '';
        document.getElementById('editDoctorEmail').value = targetDoctorRowForEdit.dataset.email || '';
        document.getElementById('editDoctorStatus').value = targetDoctorRowForEdit.dataset.status || 'on_duty';

        document.getElementById('editDoctorModal').classList.remove('hidden');
    }

    function closeEditDoctorModal() {
        document.getElementById('editDoctorModal').classList.add('hidden');
        targetDoctorRowForEdit = null;
    }

    function handleEditDoctorSubmit(e) {
        e.preventDefault();
        if (!targetDoctorRowForEdit) return;

        const newName = document.getElementById('editDoctorName').value;
        const newTitle = document.getElementById('editDoctorTitle').value;
        const newDept = document.getElementById('editDoctorDept').value;
        const newRoom = document.getElementById('editDoctorRoom').value;
        const newStatus = document.getElementById('editDoctorStatus').value;

        targetDoctorRowForEdit.dataset.nameRaw = newName;
        targetDoctorRowForEdit.dataset.name = newName.toLowerCase();
        targetDoctorRowForEdit.dataset.title = newTitle;
        targetDoctorRowForEdit.dataset.deptName = newDept;
        targetDoctorRowForEdit.dataset.roomRaw = newRoom;
        targetDoctorRowForEdit.dataset.status = newStatus;

        // Update DOM name cell
        const nameEl = targetDoctorRowForEdit.querySelector('td:first-child .font-black');
        if (nameEl) nameEl.innerText = newName;

        closeEditDoctorModal();
        showToast("{{ $isRtl ? 'تم تحديث بيانات الطبيب بنجاح.' : 'Doctor details updated successfully.' }}");
    }

    // Populate Print Template with Doctor Data
    function populateDoctorPrintTemplate(doc) {
        document.getElementById('printDoctorName').innerText = doc.name;
        document.getElementById('printDoctorTitle').innerText = doc.title;
        document.getElementById('printDoctorId').innerText = doc.id;
        document.getElementById('printDoctorDept').innerText = doc.dept;
        document.getElementById('printDoctorRoom').innerText = doc.room;
        document.getElementById('printDoctorShift').innerText = doc.shift;
        document.getElementById('printDoctorEmail').innerText = doc.email;
        document.getElementById('printDoctorPhone').innerText = doc.phoneFull || ('+967 ' + doc.phone);
        document.getElementById('printDocRef').innerText = 'RSD-CRD-' + doc.id.replace('-', '');
        document.getElementById('printBarcodeText').innerText = '*RSD-' + doc.id + '-SEC*';
        
        // Avatar initials
        const avatarBox = document.getElementById('printDoctorAvatarBox');
        if (doc.initials) {
            avatarBox.innerText = doc.initials;
        } else {
            const parts = doc.name.replace('د.', '').trim().split(' ');
            avatarBox.innerText = 'د.' + (parts[0][0] || 'ط');
        }
    }

    window.onbeforeprint = function() {
        const badge = document.getElementById('printableDoctorBadge');
        if (badge && badge.parentElement !== document.body) {
            document.body.appendChild(badge);
        }
    };

    // 1. Quick Print Directly From Row
    function quickPrintDoctorCard(btn) {
        const row = btn.closest('tr');
        if(!row) return;

        const docData = {
            id: row.dataset.id,
            name: row.dataset.nameRaw,
            title: row.dataset.title,
            dept: row.dataset.deptName,
            room: row.dataset.roomRaw,
            phone: row.dataset.phone,
            phoneFull: row.dataset.phoneFull || ('+967 ' + row.dataset.phone),
            initials: row.dataset.initials,
            email: row.dataset.email,
            shift: row.dataset.shift,
            status: row.dataset.status
        };

        populateDoctorPrintTemplate(docData);
        showToast("{{ $isRtl ? 'جاري فتح نافذة الطباعة لبطاقة وتصريح الطبيب المعتمد (مستشفى الرشيد - صنعاء)...' : 'Initiating doctor credential print layout...' }}");
        setTimeout(() => {
            window.print();
        }, 300);
    }

    // 2. Quick View Doctor Profile Modal (Populates and opens the Eye Modal)
    function quickViewDoctor(el) {
        const row = el.closest('tr');
        if(!row) return;

        currentDoctorData = {
            id: row.dataset.id,
            name: row.dataset.nameRaw,
            title: row.dataset.title,
            dept: row.dataset.deptName,
            room: row.dataset.roomRaw,
            phone: row.dataset.phone,
            phoneFull: row.dataset.phoneFull || ('+967 ' + row.dataset.phone),
            email: row.dataset.email,
            shift: row.dataset.shift,
            initials: row.dataset.initials,
            todayPatients: row.dataset.todayPatients,
            rating: row.dataset.rating,
            reviews: row.dataset.reviews,
            status: row.dataset.status
        };

        document.getElementById('viewDoctorName').innerText = currentDoctorData.name;
        document.getElementById('viewDoctorIdBadge').innerText = currentDoctorData.id;
        document.getElementById('viewDoctorDept').innerText = currentDoctorData.dept;
        document.getElementById('viewDoctorTitle').innerText = currentDoctorData.title;
        document.getElementById('viewDoctorRoom').innerText = currentDoctorData.room;
        document.getElementById('viewDoctorPhone').innerText = currentDoctorData.phoneFull;
        document.getElementById('viewDoctorEmail').innerText = currentDoctorData.email;
        document.getElementById('viewDoctorShift').innerText = currentDoctorData.shift;
        document.getElementById('viewDoctorTodayPatients').innerText = currentDoctorData.todayPatients + " {{ $isRtl ? 'حالة تمت معاينتها اليوم' : 'patients seen today' }}";
        document.getElementById('viewDoctorRating').innerText = currentDoctorData.rating + ' / 5.0';
        document.getElementById('viewDoctorReviews').innerText = currentDoctorData.reviews + " {{ $isRtl ? 'مراجعة وتقييم سريري موثق' : 'verified patient reviews' }}";
        
        // Initials
        document.getElementById('viewDoctorAvatar').innerText = currentDoctorData.initials || 'د.ط';

        // Status badge styling
        const badgeText = document.getElementById('viewDoctorStatusText');
        const badgeContainer = document.getElementById('viewDoctorStatusBadge');
        if(currentDoctorData.status === 'on_duty') {
            badgeContainer.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200';
            badgeText.innerText = "{{ $isRtl ? 'على رأس العمل (مناوب)' : 'On Duty' }}";
        } else if(currentDoctorData.status === 'in_surgery') {
            badgeContainer.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 dark:bg-amber-950/40 dark:text-amber-300 border border-amber-200';
            badgeText.innerText = "{{ $isRtl ? 'في غرفة العمليات' : 'In Surgery' }}";
        } else if(currentDoctorData.status === 'off_duty') {
            badgeContainer.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300 border border-slate-200';
            badgeText.innerText = "{{ $isRtl ? 'خارج المناوبة' : 'Off Duty' }}";
        } else {
            badgeContainer.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 dark:bg-rose-950/40 dark:text-rose-300 border border-rose-200';
            badgeText.innerText = "{{ $isRtl ? 'في إجازة معتمدة' : 'On Leave' }}";
        }

        document.getElementById('viewDoctorModal').classList.remove('hidden');
    }

    function closeViewModal() {
        document.getElementById('viewDoctorModal').classList.add('hidden');
    }

    function printCardFromProfileModal() {
        if(!currentDoctorData) return;
        populateDoctorPrintTemplate(currentDoctorData);
        closeViewModal();
        showToast("{{ $isRtl ? 'جاري تجهيز وطباعة بطاقة وتصريح الطبيب...' : 'Opening print preview...' }}");
        setTimeout(() => {
            window.print();
        }, 300);
    }

    function copyDoctorPhone() {
        const phone = document.getElementById('viewDoctorPhone').innerText;
        navigator.clipboard.writeText(phone);
        showToast("{{ $isRtl ? 'تم نسخ رقم الهاتف إلى الحافظة.' : 'Phone number copied!' }}");
    }

    function copyDoctorEmail() {
        const email = document.getElementById('viewDoctorEmail').innerText;
        navigator.clipboard.writeText(email);
        showToast("{{ $isRtl ? 'تم نسخ البريد الإلكتروني إلى الحافظة.' : 'Email address copied!' }}");
    }

    // 3. Department Tabs Filtering
    function filterDepartment(dept, el) {
        activeDept = dept;
        
        document.querySelectorAll('.dept-tab').forEach(btn => {
            btn.classList.remove('active', 'bg-[#14AFC3]', 'text-white', 'shadow-xs');
            btn.classList.add('bg-slate-50', 'text-slate-600', 'dark:bg-slate-800', 'dark:text-slate-300');
            
            const badge = btn.querySelector('.tab-badge');
            if(badge) {
                badge.className = 'tab-badge px-1.5 py-0.5 rounded-md text-[10px] font-mono bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 border border-slate-200/60 dark:border-slate-600';
            }
        });

        el.classList.add('active', 'bg-[#14AFC3]', 'text-white', 'shadow-xs');
        el.classList.remove('bg-slate-50', 'text-slate-600', 'dark:bg-slate-800', 'dark:text-slate-300');

        const activeBadge = el.querySelector('.tab-badge');
        if(activeBadge) {
            activeBadge.className = 'tab-badge px-1.5 py-0.5 rounded-md text-[10px] font-mono bg-white/20 text-white font-bold';
        }

        applyFilters();
    }

    // 4. Live Search & Secondary Filters
    function applyFilters() {
        const query = document.getElementById('doctorSearch').value.toLowerCase().trim();
        const status = document.getElementById('statusFilter').value;
        const rows = document.querySelectorAll('.doctor-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const name = (row.dataset.name || '');
            const rowDept = (row.dataset.dept || '');
            const room = (row.dataset.room || '');
            const docId = (row.dataset.id || '').toLowerCase();
            const phone = (row.dataset.phone || '');
            const rowStatus = (row.dataset.status || '');

            const matchesDept = (activeDept === 'all' || rowDept === activeDept);
            const matchesStatus = (status === 'all' || rowStatus === status);
            const matchesQuery = (!query || name.includes(query) || room.includes(query) || docId.includes(query) || phone.includes(query));

            if (matchesDept && matchesStatus && matchesQuery) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('filteredCount').innerText = visibleCount;
    }

    // 5. Actions & Toasts
    function triggerExport() {
        showToast("{{ $isRtl ? 'جاري تجهيز كشف الأطباء للطباعة المعتمدة...' : 'Preparing doctors roster for print...' }}");
        setTimeout(() => {
            window.print();
        }, 300);
    }

    function confirmDeactivateDoctor(btn) {
        const row = btn.closest('tr');
        const name = row ? row.dataset.nameRaw : '';
        if(confirm("{{ $isRtl ? 'هل أنت متأكد من تغيير الحالة التشغيلية للطبيب: ' : 'Are you sure you want to change status for ' }}" + name + "؟")) {
            showToast("{{ $isRtl ? 'تم تحديث حالة الطبيب بنجاح في سجل مستشفى الرشيد.' : 'Doctor status updated successfully.' }}");
        }
    }

    function handleDoctorFormSubmit(e) {
        e.preventDefault();
        showToast("{{ $isRtl ? 'تم حفظ بيانات الطبيب وتحديث جدول المناوبات بنجاح.' : 'Doctor saved and roster updated successfully.' }}");
        closeDoctorModal();
    }

    function showToast(message) {
        const toast = document.getElementById('toastNotification');
        document.getElementById('toastMessage').innerText = message;
        toast.classList.remove('translate-y-20', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');

        setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('translate-y-20', 'opacity-0');
        }, 3400);
    }
</script>
@endsection
