@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    $appointmentsList = (isset($appointments) && count($appointments) > 0) ? $appointments : collect([
        [
            'id' => 'APT-9041',
            'patient_name_ar' => 'عبدالله أحمد الحربي',
            'patient_name_en' => 'Abdullah Al-Harbi',
            'mrn' => 'MRN-88210',
            'phone' => '+967 77 112 8899',
            'initials' => $isRtl ? 'ع.ح' : 'AH',
            'doctor_ar' => 'د. سارة المنصوري',
            'doctor_en' => 'Dr. Sarah Al-Mansouri',
            'doctor_title_ar' => 'استشاري أول قسطرة وجراحة قلب',
            'doctor_title_en' => 'Senior Consultant Cardiologist',
            'department' => 'cardiology',
            'department_ar' => 'أمراض وجراحة القلب',
            'department_en' => 'Cardiology & Heart Care',
            'clinic_ar' => 'عيادة 204 · المبنى الرئيسي',
            'clinic_en' => 'Clinic 204 · Main Wing',
            'time' => '09:30 ص',
            'time_en' => '09:30 AM',
            'date' => '2026-09-06',
            'type_ar' => 'كشف استشاري',
            'type_en' => 'Consultation',
            'status' => 'confirmed',
            'insurance_ar' => 'شركة مأرب للتأمين · ذهبية',
            'insurance_en' => 'Mareb Insurance Gold',
            'insurance_status_ar' => 'موافقة فورية متصلة',
            'insurance_status_en' => 'Pre-approved 100%'
        ],
        [
            'id' => 'APT-9042',
            'patient_name_ar' => 'فاطمة محمد الدوسري',
            'patient_name_en' => 'Fatima Al-Dossary',
            'mrn' => 'MRN-88214',
            'phone' => '+967 77 334 2211',
            'initials' => $isRtl ? 'ف.د' : 'FD',
            'doctor_ar' => 'د. طارق الهاشمي',
            'doctor_en' => 'Dr. Tariq Al-Hashemi',
            'doctor_title_ar' => 'أخصائي أول جراحة عظام ومفاصل',
            'doctor_title_en' => 'Lead Orthopedic Surgeon',
            'department' => 'orthopedics',
            'department_ar' => 'جراحة العظام والمفاصل',
            'department_en' => 'Orthopedics & Spine',
            'clinic_ar' => 'عيادة 105 · البرج الجراحي B',
            'clinic_en' => 'Clinic 105 · Surgical Tower B',
            'time' => '10:00 ص',
            'time_en' => '10:00 AM',
            'date' => '2026-09-06',
            'type_ar' => 'متابعة دورية',
            'type_en' => 'Follow-up',
            'status' => 'waiting',
            'insurance_ar' => 'التأمين الصحي التكافلي · VIP',
            'insurance_en' => 'Takaful Health VIP',
            'insurance_status_ar' => 'تغطية معتمدة 100%',
            'insurance_status_en' => '100% Covered'
        ],
        [
            'id' => 'APT-9040',
            'patient_name_ar' => 'سلطان خالد القحطاني',
            'patient_name_en' => 'Sultan Al-Qahtani',
            'mrn' => 'MRN-88219',
            'phone' => '+967 77 998 3322',
            'initials' => $isRtl ? 'س.ق' : 'SQ',
            'doctor_ar' => 'د. ريما القحطاني',
            'doctor_en' => 'Dr. Reema Al-Qahtani',
            'doctor_title_ar' => 'استشارية طب أطفال وحديثي ولادة',
            'doctor_title_en' => 'Pediatric Consultant',
            'department' => 'pediatrics',
            'department_ar' => 'طب الأطفال والنمو',
            'department_en' => 'Pediatrics Care',
            'clinic_ar' => 'عيادة 108 · مبنى الأمومة والطفولة',
            'clinic_en' => 'Clinic 108 · Maternity Wing',
            'time' => '08:45 ص',
            'time_en' => '08:45 AM',
            'date' => '2026-09-06',
            'type_ar' => 'تطعيم وفحص نمو',
            'type_en' => 'Vaccination & Wellness',
            'status' => 'completed',
            'insurance_ar' => 'الشركة المتحدة للتأمين · فضية',
            'insurance_en' => 'United Insurance Silver',
            'insurance_status_ar' => 'تم إصدار الوصفة والتقرير',
            'insurance_status_en' => 'E-Rx Completed'
        ],
        [
            'id' => 'APT-9043',
            'patient_name_ar' => 'محمد ناصر الشهري',
            'patient_name_en' => 'Mohammed Al-Shehri',
            'mrn' => 'MRN-88225',
            'phone' => '+967 77 445 1199',
            'initials' => $isRtl ? 'م.ش' : 'MS',
            'doctor_ar' => 'د. ياسر الغامدي',
            'doctor_en' => 'Dr. Yasser Al-Ghamdi',
            'doctor_title_ar' => 'استشاري جراحة المخ والأعصاب',
            'doctor_title_en' => 'Lead Neurosurgeon',
            'department' => 'neurology',
            'department_ar' => 'المخ والأعصاب',
            'department_en' => 'Neurology',
            'clinic_ar' => 'عيادة 302 · البرج الطبي A',
            'clinic_en' => 'Clinic 302 · Medical Tower A',
            'time' => '11:15 ص',
            'time_en' => '11:15 AM',
            'date' => '2026-09-06',
            'type_ar' => 'كشف استشاري',
            'type_en' => 'Consultation',
            'status' => 'cancelled',
            'insurance_ar' => 'دفع نقدي مباشر',
            'insurance_en' => 'Self Pay Cash',
            'insurance_status_ar' => 'تم استرداد الرسوم',
            'insurance_status_en' => 'Refunded'
        ],
        [
            'id' => 'APT-9044',
            'patient_name_ar' => 'نوف عبدالعزيز المطيري',
            'patient_name_en' => 'Nouf Al-Mutairi',
            'mrn' => 'MRN-88231',
            'phone' => '+967 77 771 9022',
            'initials' => $isRtl ? 'ن.م' : 'NM',
            'doctor_ar' => 'د. سارة المنصوري',
            'doctor_en' => 'Dr. Sarah Al-Mansouri',
            'doctor_title_ar' => 'استشاري أول قسطرة وجراحة قلب',
            'doctor_title_en' => 'Chief of Cardiology',
            'department' => 'cardiology',
            'department_ar' => 'أمراض وجراحة القلب',
            'department_en' => 'Cardiology',
            'clinic_ar' => 'عيادة 204 · المبنى الرئيسي',
            'clinic_en' => 'Clinic 204 · Main Wing',
            'time' => '11:45 ص',
            'time_en' => '11:45 AM',
            'date' => '2026-09-06',
            'type_ar' => 'تخطيط قلب ومتابعة',
            'type_en' => 'ECG & Echo Review',
            'status' => 'confirmed',
            'insurance_ar' => 'شركة مأرب للتأمين · بلاتينيوم',
            'insurance_en' => 'Mareb Platinum',
            'insurance_status_ar' => 'موافقة فورية متصلة',
            'insurance_status_en' => 'Approved'
        ],
        [
            'id' => 'APT-9045',
            'patient_name_ar' => 'تركي فهد السبيعي',
            'patient_name_en' => 'Turki Al-Subaie',
            'mrn' => 'MRN-88240',
            'phone' => '+967 77 881 3344',
            'initials' => $isRtl ? 'ت.س' : 'TS',
            'doctor_ar' => 'د. طارق الهاشمي',
            'doctor_en' => 'Dr. Tariq Al-Hashemi',
            'doctor_title_ar' => 'أخصائي أول جراحة عظام ومفاصل',
            'doctor_title_en' => 'Orthopedic Specialist',
            'department' => 'orthopedics',
            'department_ar' => 'جراحة العظام والمفاصل',
            'department_en' => 'Orthopedics',
            'clinic_ar' => 'عيادة 105 · البرج الجراحي B',
            'clinic_en' => 'Clinic 105 · Surgical Tower B',
            'time' => '12:15 م',
            'time_en' => '12:15 PM',
            'date' => '2026-09-06',
            'type_ar' => 'فحص أشعة وتجبير',
            'type_en' => 'X-Ray & Cast Check',
            'status' => 'waiting',
            'insurance_ar' => 'التأمين الصحي التكافلي · ذهبية',
            'insurance_en' => 'Takaful Gold',
            'insurance_status_ar' => 'تغطية معتمدة 100%',
            'insurance_status_en' => 'Covered'
        ]
    ]);
@endphp

@section('page-title', $isRtl ? 'إدارة المواعيد والعيادات' : __('Appointment Management'))
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
                    <path d="M3 21h18M3 7v14M21 7v14M6 11h3M6 15h3M15 11h3M15 15h3M9 3h6v4H9z"/>
                </svg>
            </div>
        </x-slot:icon>
        {{ $isRtl ? 'الأقسام الطبية' : __('Departments') }}
    </x-sidebar-link>

    <x-sidebar-link :href="Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#'" :active="true">
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
        #printableApptSlip, #printableApptSlip * {
            visibility: visible !important;
        }
        #printableApptSlip {
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
            margin: 10mm;
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
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <h1 class="text-xl sm:text-2xl font-black text-[#152C4B] dark:text-white tracking-tight leading-tight">
                        {{ $isRtl ? 'إدارة المواعيد والعيادات الاستشارية' : 'Appointment & Outpatient Scheduling' }}
                    </h1>
                    <span class="w-2 h-2 rounded-full bg-[#14AFC3]"></span>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-0.5">
                    {{ $isRtl ? 'جدولة مواعيد المرضى، متابعة طوابير الانتظار، وتأكيد الحضور للعيادات التخصصية.' : 'Schedule patient visits, monitor live waiting queues, and verify clinic attendance.' }}
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2.5 self-start sm:self-auto">
            <button type="button" onclick="triggerExportSchedule()" 
                    class="px-4 py-2.5 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-[#152C4B] dark:text-slate-200 text-xs font-bold rounded-xl border border-slate-200/80 dark:border-slate-700 shadow-xs transition-all flex items-center gap-2 cursor-pointer hover:border-[#14AFC3]">
                <svg width="15" height="15" class="text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span>{{ $isRtl ? 'طباعة جدول اليوم' : 'Print Schedule' }}</span>
            </button>

            <button type="button" onclick="openNewApptModal()" 
                    class="px-4 py-2.5 bg-[#14AFC3] hover:bg-[#0C6B78] text-white text-xs font-black rounded-xl shadow-md shadow-[#14AFC3]/20 transition-all flex items-center gap-1.5 cursor-pointer hover:-translate-y-0.5">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                <span>{{ $isRtl ? 'حجز موعد جديد' : 'New Appointment' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         4 KPI METRIC CARDS (CENTERED ICON & TEXT)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        {{-- Card 1: Today's Appointments (Highlighted Teal Gradient) --}}
        <x-stat-card 
            :highlighted="true"
            :label="$isRtl ? 'إجمالي مواعيد اليوم' : 'Today\'s Appointments'"
            value="142"
            :sublabel="$isRtl ? '+18% مقارنة بأمس · عبر 41 عيادة' : '+18% vs yesterday · 41 Clinics'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 2: Confirmed Appointments --}}
        <x-stat-card 
            :highlighted="false"
            :label="$isRtl ? 'المواعيد المؤكدة للحضور' : 'Confirmed Visits'"
            value="98"
            :sublabel="$isRtl ? 'نسبة تأكيد الحضور: 69.0%' : 'Attendance Rate: 69.0%'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 3: In Waiting Queue --}}
        <x-stat-card 
            :highlighted="false"
            :label="$isRtl ? 'في صالة الانتظار المباشر' : 'In Waiting Queue'"
            value="32"
            :sublabel="$isRtl ? 'متوسط وقت الانتظار: ~14 دقيقة' : 'Avg. Wait Time: ~14 min'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 4: Completed Consultations --}}
        <x-stat-card 
            :highlighted="false"
            :label="$isRtl ? 'الكشوفات المكتملة اليوم' : 'Completed Consultations'"
            value="86"
            :sublabel="$isRtl ? 'ربط الملف والوصفة الطبية: 100%' : 'E-Rx Linked: 100%'">
            <x-slot:icon>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

    </div>

    {{-- ══════════════════════════════════════════
         FILTER TOOLBAR (SINGLE UNIFIED LINE)
    ══════════════════════════════════════════ --}}
    <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-3 p-3.5 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-xs">
        
        {{-- Status Pill Tabs --}}
        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 xl:pb-0 text-xs no-scrollbar">
            <button type="button" onclick="setStatusFilter('all', this)" class="status-tab active px-3 py-1.5 rounded-xl font-bold bg-[#14AFC3] text-white shadow-xs flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'جميع المواعيد' : 'All Appointments' }}</span>
                <span class="bg-white/20 text-white text-[10px] px-1.5 py-0.5 rounded-md font-bold">142</span>
            </button>
            <button type="button" onclick="setStatusFilter('confirmed', this)" class="status-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'مؤكدة' : 'Confirmed' }}</span>
                <span class="bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-700">98</span>
            </button>
            <button type="button" onclick="setStatusFilter('waiting', this)" class="status-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'في صالة الانتظار' : 'In Waiting Room' }}</span>
                <span class="bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-700">32</span>
            </button>
            <button type="button" onclick="setStatusFilter('completed', this)" class="status-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'مكتملة' : 'Completed' }}</span>
                <span class="bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-700">86</span>
            </button>
            <button type="button" onclick="setStatusFilter('cancelled', this)" class="status-tab px-3 py-1.5 rounded-xl font-semibold bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700/60 text-slate-600 dark:text-slate-300 flex items-center gap-1.5 whitespace-nowrap transition-all cursor-pointer">
                <span>{{ $isRtl ? 'ملغاة' : 'Cancelled' }}</span>
                <span class="bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-700">12</span>
            </button>
        </div>

        {{-- Search, Department Dropdown & Live Count --}}
        <div class="flex items-center gap-2.5 flex-1 xl:flex-initial justify-end">
            <div class="relative w-full sm:w-64 xl:w-72">
                <input type="text" id="apptSearchInput" oninput="applyFilters()" 
                       placeholder="{{ $isRtl ? 'ابحث بالمريض، الملف، الطبيب...' : 'Search patient, MRN, doctor...' }}" 
                       class="w-full text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/90 dark:border-slate-700 rounded-xl py-1.5 pl-3.5 pr-8 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3] focus:border-[#14AFC3] transition-all placeholder:text-slate-400">
                <div class="absolute inset-y-0 {{ $isRtl ? 'left-0 pl-2.5' : 'right-0 pr-2.5' }} flex items-center pointer-events-none text-slate-400">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </div>
            </div>

            <select id="deptFilter" onchange="applyFilters()" class="text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/90 dark:border-slate-700 rounded-xl py-1.5 px-2.5 text-[#152C4B] dark:text-slate-200 font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                <option value="all">{{ $isRtl ? 'جميع الأقسام' : 'All Departments' }}</option>
                <option value="cardiology">{{ $isRtl ? 'أمراض القلب' : 'Cardiology' }}</option>
                <option value="orthopedics">{{ $isRtl ? 'جراحة العظام' : 'Orthopedics' }}</option>
                <option value="pediatrics">{{ $isRtl ? 'طب الأطفال' : 'Pediatrics' }}</option>
                <option value="neurology">{{ $isRtl ? 'المخ والأعصاب' : 'Neurology' }}</option>
            </select>

            <span class="text-[11px] font-black text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2.5 py-1.5 rounded-xl border border-slate-200/60 dark:border-slate-700 whitespace-nowrap shrink-0">
                <span id="filteredCount">6</span> {{ $isRtl ? 'مواعيد' : 'Appts' }}
            </span>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         APPOINTMENTS DIRECTORY TABLE (ENTERPRISE 100% FIXED)
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[1000px] border-collapse" id="appointmentsTable">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
                        <th class="w-[23%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'المريض ورقم الملف الطبي' : 'Patient & MRN' }}</th>
                        <th class="w-[19%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'الطبيب والعيادة التخصصية' : 'Doctor & Clinic' }}</th>
                        <th class="w-[17%] py-4 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'الموعد المحدد ونوع الزيارة' : 'Slot & Type' }}</th>
                        <th class="w-[14%] py-4 px-3 text-center">{{ $isRtl ? 'حالة الحضور والانتظار' : 'Attendance Status' }}</th>
                        <th class="w-[14%] py-4 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }}">{{ $isRtl ? 'التغطية التأمينية والاعتماد' : 'Insurance & Coverage' }}</th>
                        <th class="w-[13%] py-4 px-4 text-center">{{ $isRtl ? 'الإجراءات والتذكرة' : 'Actions & Ticket' }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/70 text-slate-600 dark:text-slate-300 font-medium">
                    
                    @foreach($appointmentsList as $appt)
                    <tr class="appt-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group {{ $appt['status'] === 'cancelled' ? 'opacity-75' : '' }}" 
                        data-status="{{ $appt['status'] }}" 
                        data-dept="{{ $appt['department'] }}" 
                        data-patient="{{ $isRtl ? $appt['patient_name_ar'] : $appt['patient_name_en'] }}"
                        data-patient-ar="{{ $appt['patient_name_ar'] }}"
                        data-patient-en="{{ $appt['patient_name_en'] }}"
                        data-mrn="{{ $appt['mrn'] }}" 
                        data-phone="{{ $appt['phone'] }}" 
                        data-doctor="{{ $isRtl ? $appt['doctor_ar'] : $appt['doctor_en'] }}" 
                        data-doctor-title="{{ $isRtl ? $appt['doctor_title_ar'] : $appt['doctor_title_en'] }}"
                        data-clinic="{{ $isRtl ? $appt['clinic_ar'] : $appt['clinic_en'] }}" 
                        data-time="{{ $isRtl ? $appt['time'] : $appt['time_en'] }}" 
                        data-date="{{ $appt['date'] }}" 
                        data-type="{{ $isRtl ? $appt['type_ar'] : $appt['type_en'] }}" 
                        data-code="{{ $appt['id'] }}"
                        data-insurance="{{ $isRtl ? $appt['insurance_ar'] : $appt['insurance_en'] }}"
                        data-insurance-status="{{ $isRtl ? $appt['insurance_status_ar'] : $appt['insurance_status_en'] }}">
                        
                        {{-- Col 1: Patient Name & MRN (Clean, no phone clutter in cell) --}}
                        <td class="w-[23%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 text-[#0C6B78] dark:text-[#14AFC3] font-black text-xs flex items-center justify-center shrink-0 border border-[#14AFC3]/30 shadow-xs group-hover:scale-105 transition-transform">
                                    {{ $appt['initials'] }}
                                </div>
                                <div class="min-w-0 flex-1">
                                    <span class="font-black text-slate-900 dark:text-white text-xs sm:text-sm truncate block group-hover:text-[#14AFC3] transition-colors {{ $appt['status'] === 'cancelled' ? 'line-through text-slate-400' : '' }}">
                                        {{ $isRtl ? $appt['patient_name_ar'] : $appt['patient_name_en'] }}
                                    </span>
                                    <span class="text-[10px] text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 font-mono px-2 py-0.5 rounded-md border border-[#14AFC3]/30 font-bold inline-block mt-0.5 shadow-2xs">
                                        {{ $appt['mrn'] }}
                                    </span>
                                </div>
                            </div>
                        </td>

                        {{-- Col 2: Doctor & Clinic --}}
                        <td class="w-[19%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <span class="font-bold text-slate-900 dark:text-white block text-xs truncate">
                                {{ $isRtl ? $appt['doctor_ar'] : $appt['doctor_en'] }}
                            </span>
                            <span class="text-[11px] text-slate-500 dark:text-slate-400 block truncate mt-0.5">
                                {{ $isRtl ? $appt['clinic_ar'] : $appt['clinic_en'] }}
                            </span>
                        </td>

                        {{-- Col 3: Slot Time & Type --}}
                        <td class="w-[17%] py-4 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <div class="flex items-center gap-1.5 text-slate-900 dark:text-white font-black text-xs {{ $appt['status'] === 'cancelled' ? 'line-through text-slate-400' : '' }}">
                                <svg width="14" height="14" class="text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>{{ $isRtl ? $appt['time'] : $appt['time_en'] }}</span>
                            </div>
                            <span class="text-[10.5px] font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/15 px-2 py-0.5 rounded-md mt-1 inline-block border border-[#14AFC3]/20 shadow-2xs">
                                {{ $isRtl ? $appt['type_ar'] : $appt['type_en'] }}
                            </span>
                        </td>

                        {{-- Col 4: Status Badge (Centered) --}}
                        <td class="w-[14%] py-4 px-3 text-center">
                            @if($appt['status'] === 'confirmed')
                                <span class="status-badge inline-flex items-center gap-1.5 text-[11px] font-bold text-emerald-700 bg-emerald-50 dark:bg-emerald-950/40 dark:text-emerald-300 px-3 py-1 rounded-full border border-emerald-200/80 dark:border-emerald-800/60 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    {{ $isRtl ? 'مؤكد الحضور' : 'Confirmed' }}
                                </span>
                            @elseif($appt['status'] === 'waiting')
                                <span class="status-badge inline-flex items-center gap-1.5 text-[11px] font-bold text-sky-700 bg-sky-50 dark:bg-sky-950/40 dark:text-sky-300 px-3 py-1 rounded-full border border-sky-200/80 dark:border-sky-800/60 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-sky-500 animate-ping"></span>
                                    {{ $isRtl ? 'في صالة الانتظار' : 'In Waiting Queue' }}
                                </span>
                            @elseif($appt['status'] === 'completed')
                                <span class="status-badge inline-flex items-center gap-1.5 text-[11px] font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 px-3 py-1 rounded-full border border-[#14AFC3]/30 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-[#14AFC3]"></span>
                                    {{ $isRtl ? 'مكتمل الكشف' : 'Completed' }}
                                </span>
                            @else
                                <span class="status-badge inline-flex items-center gap-1.5 text-[11px] font-bold text-rose-700 bg-rose-50 dark:bg-rose-950/40 dark:text-rose-300 px-3 py-1 rounded-full border border-rose-200 dark:border-rose-800/60 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                                    {{ $isRtl ? 'موعد ملغي' : 'Cancelled' }}
                                </span>
                            @endif
                        </td>

                        {{-- Col 5: Insurance & Approval --}}
                        <td class="w-[14%] py-4 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }}">
                            <span class="font-bold text-slate-900 dark:text-white block truncate text-xs">
                                {{ $isRtl ? $appt['insurance_ar'] : $appt['insurance_en'] }}
                            </span>
                            <span class="text-emerald-600 dark:text-emerald-400 text-[10.5px] font-black block mt-0.5">
                                {{ $isRtl ? $appt['insurance_status_ar'] : $appt['insurance_status_en'] }}
                            </span>
                        </td>

                        {{-- Col 6: Actions (Centered) --}}
                        <td class="w-[13%] py-4 px-4 text-center">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                                
                                {{-- View Digital Ticket (The Eye Modal) --}}
                                <button type="button" onclick="viewAppt(this)" title="{{ $isRtl ? 'عرض تفاصيل التذكرة والمريض' : 'View Ticket Dossier' }}" 
                                        class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all flex items-center justify-center cursor-pointer shadow-2xs">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>

                                {{-- Quick Print Appointment Slip --}}
                                <button type="button" onclick="printSingleApptSlip(this)" title="{{ $isRtl ? 'طباعة تذكرة الدخول الرسمية' : 'Print Pass' }}" 
                                        class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-slate-500 hover:text-[#14AFC3] hover:bg-slate-50 dark:hover:bg-slate-600 transition-all flex items-center justify-center cursor-pointer shadow-2xs">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                </button>

                                {{-- Reschedule --}}
                                <button type="button" onclick="openRescheduleModal(this)" title="{{ $isRtl ? 'إعادة جدولة' : 'Reschedule' }}" 
                                        class="w-8 h-8 rounded-xl text-slate-500 hover:text-[#14AFC3] hover:bg-slate-200/60 dark:hover:bg-slate-700 transition-all flex items-center justify-center cursor-pointer">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </button>

                                {{-- Cancel / Reactivate --}}
                                @if($appt['status'] !== 'cancelled')
                                <button type="button" onclick="openCancelModal(this)" title="{{ $isRtl ? 'إلغاء الموعد' : 'Cancel' }}" 
                                        class="w-8 h-8 rounded-xl text-slate-400 hover:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/40 transition-all flex items-center justify-center cursor-pointer">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                                @else
                                <button type="button" onclick="openRescheduleModal(this)" title="{{ $isRtl ? 'إعادة حجز وتفعيل' : 'Reactivate' }}" 
                                        class="w-8 h-8 rounded-xl text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-950/40 transition-all flex items-center justify-center cursor-pointer">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </button>
                                @endif

                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- Table Compact Footer --}}
        <div class="py-3 px-5 bg-slate-50/60 dark:bg-slate-800/40 border-t border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-400 dark:text-slate-500 font-medium">
            <span>{{ $isRtl ? 'عرض 1 إلى 6 من أصل 142 موعداً مجدولاً لليوم (مستشفى الرشيد - صنعاء)' : 'Showing 1 to 6 of 142 scheduled appointments' }}</span>
            <div class="flex items-center gap-1.5">
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 disabled:opacity-50 text-xs font-bold" disabled>{{ $isRtl ? 'السابق' : 'Prev' }}</button>
                <button class="px-3 py-1.5 rounded-xl bg-[#14AFC3] text-white text-xs font-black shadow-xs">1</button>
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 text-xs font-bold">2</button>
                <button class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 text-xs font-bold">{{ $isRtl ? 'التالي' : 'Next' }}</button>
            </div>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════
     OFFICIAL PRINTABLE APPOINTMENT PASS & SLIP
     YEMEN - SANA'A - AL-RASHEED SPECIALIZED HOSPITAL
══════════════════════════════════════════════ --}}
<div id="printableApptSlip" class="hidden">
    
    {{-- Header --}}
    <div style="border-bottom: 2px solid #0F172A; padding-bottom: 14px; margin-bottom: 16px; display: flex; justify-content: space-between; align-items: flex-start; font-family: 'Cairo', sans-serif;">
        <div style="text-align: right; line-height: 1.45; font-size: 11px;">
            <div style="font-weight: 800; font-size: 13px; color: #0F172A;">الجمهورية اليمنية</div>
            <div style="color: #334155; font-weight: 700;">وزارة الصحة العامة والسكان</div>
            <div style="color: #334155;">العيادات الاستشارية الخارجية والفرز الذكي</div>
            <div style="font-weight: 900; color: #14AFC3; font-size: 12.5px; margin-top: 2px;">مستشفى الرشيد التخصصي - صنعاء</div>
            <div style="font-size: 9.5px; color: #64748B;">Official Clinic Entry & Consultation Pass</div>
        </div>

        <div style="text-align: center; margin-top: -4px;">
            <div style="width: 54px; height: 54px; border-radius: 14px; background: #E5FAFC; border: 1.5px solid #14AFC3; margin: 0 auto 6px auto; display: flex; align-items: center; justify-content: center; font-size: 22px; color: #0C6B78; font-weight: 900;">
                ⚕
            </div>
            <h2 id="printSlipCode" style="font-size: 15px; font-weight: 900; color: #0F172A; margin: 0; font-family: 'IBM Plex Mono', monospace;">APT-9041</h2>
            <div style="font-size: 9.5px; font-weight: 700; color: #64748B; font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: 0.5px;">
                FAST-TRACK APPOINTMENT PASS
            </div>
        </div>

        <div style="text-align: left; line-height: 1.45; font-size: 10.5px; font-family: 'IBM Plex Mono', monospace;">
            <div style="font-weight: 700; color: #0F172A;">REF: RSD-APT-2026-YE</div>
            <div style="color: #64748B; font-size: 10px;">DATE: {{ date('Y-m-d') }}</div>
            <div style="color: #64748B; font-size: 10px;">TIME ISSUED: {{ date('H:i') }}</div>
            <div id="printSlipBarcode" style="font-family: 'IBM Plex Mono', monospace; font-size: 14px; letter-spacing: 3px; font-weight: 700; margin-top: 4px; color: #0F172A;">
                *APT-9041-CHK*
            </div>
        </div>
    </div>

    {{-- Patient & Clinical Details Grid --}}
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-bottom: 20px; font-family: 'Cairo', sans-serif; font-size: 11px;">
        <div style="border: 1px solid #CBD5E1; border-radius: 10px; padding: 12px; background: #F8FAFC;">
            <span style="font-size: 10px; color: #64748B; font-weight: 700; display: block;">اسم المريض الرباعي</span>
            <span id="printPatientName" style="font-size: 14px; font-weight: 900; color: #0F172A; display: block; margin-top: 2px;">عبدالله أحمد الحربي</span>
            <div style="display: flex; gap: 10px; margin-top: 8px; padding-top: 8px; border-top: 1px dashed #CBD5E1; font-size: 10.5px;">
                <div>
                    <span style="color: #64748B; display: block;">رقم الملف (MRN)</span>
                    <span id="printPatientMrn" style="font-family: 'IBM Plex Mono', monospace; font-weight: 700; color: #0C6B78;">MRN-88210</span>
                </div>
                <div>
                    <span style="color: #64748B; display: block;">رقم الهاتف</span>
                    <span id="printPatientPhone" style="font-family: 'IBM Plex Mono', monospace; font-weight: 700;">+967 77 112 8899</span>
                </div>
            </div>
        </div>

        <div style="border: 1px solid #CBD5E1; border-radius: 10px; padding: 12px; background: #F8FAFC;">
            <span style="font-size: 10px; color: #64748B; font-weight: 700; display: block;">الطبيب الاستشاري المعالج</span>
            <span id="printDoctorName" style="font-size: 14px; font-weight: 900; color: #0F172A; display: block; margin-top: 2px;">د. سارة المنصوري</span>
            <div style="display: flex; gap: 10px; margin-top: 8px; padding-top: 8px; border-top: 1px dashed #CBD5E1; font-size: 10.5px;">
                <div>
                    <span style="color: #64748B; display: block;">العيادة والمبنى</span>
                    <span id="printClinicRoom" style="font-weight: 700; color: #0C6B78;">عيادة 204 · المبنى الرئيسي</span>
                </div>
                <div>
                    <span style="color: #64748B; display: block;">الموعد المحدد</span>
                    <span id="printApptTime" style="font-weight: 900; color: #0F172A;">09:30 ص · 2026-09-06</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Details Strip --}}
    <div style="border: 1px solid #CBD5E1; border-radius: 8px; padding: 10px 14px; background: #ffffff; display: flex; justify-content: space-between; align-items: center; font-family: 'Cairo', sans-serif; font-size: 10.5px; margin-bottom: 20px;">
        <div>
            <span style="color: #64748B; font-weight: 700;">نوع الكشف:</span>
            <span id="printVisitType" style="font-weight: 800; color: #0F172A; margin-right: 4px;">كشف استشاري تخصصي</span>
        </div>
        <div>
            <span style="color: #64748B; font-weight: 700;">جهة التغطية:</span>
            <span id="printInsurance" style="font-weight: 800; color: #0C6B78; margin-right: 4px;">شركة مأرب للتأمين (ذهبية)</span>
        </div>
        <div>
            <span style="color: #64748B; font-weight: 700;">حالة التذكرة:</span>
            <span style="font-weight: 800; color: #047857; margin-right: 4px;">مؤكد ومسجل بالفرز الذكي</span>
        </div>
    </div>

    {{-- Patient Instructions --}}
    <div style="background: #F1F5F9; border-radius: 8px; padding: 12px; font-family: 'Cairo', sans-serif; font-size: 10px; color: #334155; line-height: 1.6; margin-bottom: 25px;">
        <div style="font-weight: 800; color: #0F172A; margin-bottom: 4px;">تعليمات المريض عند الحضور للعيادة:</div>
        1. يرجى التواجد قبل موعد الكشف بـ 15 دقيقة لإتمام قياس العلامات الحيوية (الضغط، النبض، الحرارة، والسكر).
        <br>
        2. إبراز هذه التذكرة أو الرمز المرجعي الرقمي عند مكتب الاستقبال بالعيادة لتأكيد الوصول المباشر.
        <br>
        3. في حال رغبتكم بإعادة الجدولة، يرجى التنسيق المسبق قبل الموعد بـ 4 ساعات على الأقل.
    </div>

    {{-- Verification Footer --}}
    <div style="display: flex; justify-content: space-between; align-items: flex-end; font-family: 'Cairo', sans-serif; font-size: 10.5px; border-top: 1px solid #CBD5E1; padding-top: 14px;">
        <div style="text-align: right;">
            <div style="color: #64748B; font-weight: 700;">موظف الاستقبال والتسجيل:</div>
            <div style="font-weight: 800; color: #0F172A; margin-top: 4px;">مكتب الدخول والفرز الذكي</div>
        </div>

        <div style="text-align: center;">
            <div style="width: 76px; height: 76px; border-radius: 50%; border: 2px dashed #14AFC3; display: flex; flex-direction: column; align-items: center; justify-content: center; font-size: 8px; font-weight: 900; color: #0C6B78; transform: rotate(-5deg); line-height: 1.35; padding: 4px;">
                <span>ختم الفرز</span>
                <span style="font-size: 7.5px; color: #152C4B;">مستشفى الرشيد</span>
                <span style="font-size: 7px; color: #64748B;">صنعاء - اليمن</span>
            </div>
        </div>

        <div style="text-align: left; font-family: 'IBM Plex Mono', monospace; font-size: 9.5px; color: #64748B;">
            <div>SYS-VERIFIED: OK</div>
            <div>DOCTOR: APPROVED</div>
            <div>STAMP: {{ date('Ymd-His') }}</div>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════
     MODAL 1: VIEW DIGITAL APPOINTMENT TICKET (LUXURY GOLD STANDARD)
══════════════════════════════════════════ --}}
<div id="viewApptModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-[#0A1628]/60 backdrop-blur-md transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div class="w-full max-w-2xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            {{-- Luxury Gradient Header --}}
            <div class="relative px-6 py-6 bg-gradient-to-r from-[#0A1628] via-[#152C4B] to-[#0C6B78] text-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center text-white shadow-inner shrink-0">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 id="viewPatientName" class="text-lg font-black tracking-tight text-white">عبدالله أحمد الحربي</h3>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-black bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                                    {{ $isRtl ? 'تذكرة مؤكدة' : 'Verified Ticket' }}
                                </span>
                            </div>
                            <p class="text-xs text-white/70 font-medium mt-0.5 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · صنعاء' : 'Al-Rasheed Specialized Hospital · Sana\'a' }}</span>
                                <span class="text-white/40">·</span>
                                <span id="viewApptCode" class="font-mono text-cyan-300 font-bold">APT-9041</span>
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
                
                {{-- Section 1: Patient Core Dossier --}}
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'بيانات المريض والتأمين الصحي' : 'Patient & Coverage Dossier' }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div class="p-3 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-100 dark:border-slate-800">
                            <span class="text-[10px] text-slate-400 block font-bold">{{ $isRtl ? 'رقم الملف الطبي MRN' : 'Medical Record No' }}</span>
                            <span id="viewPatientMrn" class="font-mono font-bold text-xs text-[#0C6B78] dark:text-[#14AFC3] mt-0.5 block">MRN-88210</span>
                        </div>

                        <div class="p-3 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-100 dark:border-slate-800">
                            <span class="text-[10px] text-slate-400 block font-bold">{{ $isRtl ? 'رقم الهاتف المعتمد' : 'Verified Phone' }}</span>
                            <span id="viewPatientPhone" class="font-mono font-bold text-xs text-slate-700 dark:text-slate-300 mt-0.5 block" dir="ltr">+967 77 112 8899</span>
                        </div>

                        <div class="p-3 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-100 dark:border-slate-800">
                            <span class="text-[10px] text-slate-400 block font-bold">{{ $isRtl ? 'جهة التغطية التأمينية' : 'Insurance Provider' }}</span>
                            <span id="viewInsurance" class="font-black text-xs text-emerald-600 mt-0.5 block truncate">شركة مأرب للتأمين</span>
                        </div>
                    </div>
                </div>

                {{-- Section 2: Clinical Consultation Details --}}
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'تفاصيل العيادة والاستشارة' : 'Clinic & Consultation Details' }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="p-3.5 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-100 dark:border-slate-800">
                            <span class="text-[10px] text-slate-400 block font-bold">{{ $isRtl ? 'الطبيب الاستشاري المعالج' : 'Consultant Doctor' }}</span>
                            <span id="viewDoctorName" class="font-black text-xs text-[#152C4B] dark:text-white mt-1 block">د. سارة المنصوري</span>
                            <span id="viewClinicName" class="text-[11px] text-slate-400 block mt-0.5">عيادة 204 · المبنى الرئيسي</span>
                        </div>

                        <div class="p-3.5 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-100 dark:border-slate-800">
                            <span class="text-[10px] text-slate-400 block font-bold">{{ $isRtl ? 'توقيت الموعد والحالة' : 'Slot & Attendance Status' }}</span>
                            <span id="viewApptTime" class="font-mono font-bold text-xs text-[#0C6B78] dark:text-[#14AFC3] mt-1 block">09:30 ص · 2026-09-06</span>
                            <div class="mt-1">
                                <span id="viewStatusBadge" class="inline-flex items-center gap-1.5 text-[10px] font-bold text-emerald-700 bg-emerald-50 dark:bg-emerald-950/40 dark:text-emerald-300 px-2.5 py-0.5 rounded-full border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <span id="viewStatusText">{{ $isRtl ? 'مؤكد الحضور' : 'Confirmed' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Fast Track Barcode Mockup with 1-Click Copy --}}
                <div class="p-4 rounded-2xl bg-[#E5FAFC]/80 dark:bg-[#14AFC3]/10 border border-[#14AFC3]/30 flex items-center justify-between">
                    <div>
                        <span class="text-[11px] font-black text-[#0C6B78] dark:text-[#14AFC3] block">{{ $isRtl ? 'باركود المسار السريع للاستقبال والفرز الذكي' : 'Fast-Track Check-in Barcode' }}</span>
                        <span id="viewCheckinRef" class="font-mono text-xs text-slate-800 dark:text-slate-200 font-bold tracking-wider mt-0.5 block">#CHK-APT-9041</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="px-3 py-1 bg-white dark:bg-slate-800 rounded-xl border border-[#14AFC3]/30 font-mono text-xs font-black text-[#14AFC3] tracking-widest">
                            |||||||||||||||
                        </div>
                        <button type="button" onclick="copyApptCode()" class="p-2 rounded-xl bg-white dark:bg-slate-800 text-slate-600 hover:text-[#14AFC3] border border-slate-200 dark:border-slate-700 transition cursor-pointer" title="{{ $isRtl ? 'نسخ رمز الحجز' : 'Copy Code' }}">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Luxury Action Footer --}}
                <div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-800">
                    <button type="button" onclick="printFromModal()" class="px-5 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/20 transition-all flex items-center gap-2 cursor-pointer hover:-translate-y-0.5">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        <span>{{ $isRtl ? 'طباعة تذكرة الدخول الرسمية' : 'Print Official Pass' }}</span>
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
     MODAL 2: RESCHEDULE APPOINTMENT (LUXURY)
══════════════════════════════════════════ --}}
<div id="rescheduleModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-[#0A1628]/60 backdrop-blur-md transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div class="w-full max-w-lg transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            <div class="relative px-6 py-5 bg-gradient-to-r from-[#0A1628] via-[#152C4B] to-[#0C6B78] text-white flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/15 border border-white/20 flex items-center justify-center text-white shrink-0">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-base font-black text-white">{{ $isRtl ? 'إعادة جدولة الموعد الطبي' : 'Reschedule Appointment' }}</h3>
                        <p class="text-[11px] text-white/70">{{ $isRtl ? 'مستشفى الرشيد التخصصي · صنعاء' : 'Al-Rasheed Specialized Hospital' }}</p>
                    </div>
                </div>
                <button type="button" onclick="closeRescheduleModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center cursor-pointer">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <form onsubmit="handleRescheduleSubmit(event)" class="p-6 space-y-4">
                <div class="space-y-3.5 text-xs">
                    <div>
                        <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'اسم المريض' : 'Patient' }}</label>
                        <input type="text" id="reschedulePatient" readonly class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-100/80 dark:bg-slate-800/80 px-3.5 h-11 font-bold text-slate-700 dark:text-slate-300">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'تاريخ الموعد الجديد' : 'New Date' }}</label>
                            <input type="date" id="rescheduleDate" value="2026-09-06" required class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'الوقت المتاح' : 'Available Slot' }}</label>
                            <select id="rescheduleTime" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 text-[#152C4B] dark:text-white font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                                <option value="09:30 ص">09:30 ص</option>
                                <option value="10:00 ص">10:00 ص</option>
                                <option value="10:30 ص">10:30 ص</option>
                                <option value="11:00 ص">11:00 ص</option>
                                <option value="11:30 ص">11:30 ص</option>
                                <option value="12:00 م">12:00 م</option>
                                <option value="01:00 م">01:00 م</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'الطبيب المعالج' : 'Doctor' }}</label>
                            <input type="text" id="rescheduleDoctor" required class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'حالة الموعد' : 'Status' }}</label>
                            <select id="rescheduleStatus" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 text-[#152C4B] dark:text-white font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                                <option value="confirmed">{{ $isRtl ? 'مؤكد الحضور (Confirmed)' : 'Confirmed' }}</option>
                                <option value="waiting">{{ $isRtl ? 'في صالة الانتظار (Waiting)' : 'Waiting' }}</option>
                                <option value="completed">{{ $isRtl ? 'مكتمل الكشف (Completed)' : 'Completed' }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <button type="button" onclick="closeRescheduleModal()" class="px-5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-xl text-xs transition-colors cursor-pointer">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/20 transition-all cursor-pointer">
                        {{ $isRtl ? 'حفظ الموعد الجديد' : 'Save Changes' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     MODAL 3: CANCEL APPOINTMENT CONFIRMATION
══════════════════════════════════════════ --}}
<div id="cancelApptModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-[#0A1628]/60 backdrop-blur-md transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div class="w-full max-w-md transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 p-6 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            <div class="flex items-center gap-3.5 mb-4">
                <div class="w-11 h-11 rounded-2xl bg-rose-50 dark:bg-rose-950/40 text-rose-600 flex items-center justify-center shrink-0 border border-rose-200 dark:border-rose-800 shadow-inner">
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <div>
                    <h3 class="text-base font-black text-[#152C4B] dark:text-white">{{ $isRtl ? 'تأكيد إلغاء حجز الموعد' : 'Cancel Appointment' }}</h3>
                    <p class="text-xs text-slate-400 mt-0.5">{{ $isRtl ? 'تحرير خانة العيادة وإلغاء تسجيل الفرز' : 'Slot Reallocation & Cancellation' }}</p>
                </div>
            </div>

            <p id="cancelModalDesc" class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed mb-5">
                {{ $isRtl ? 'هل تريد بالتأكيد إلغاء حجز هذا الموعد؟ سيتم إخطار الطبيب وتحرير الخانة الزمنية فوراً لمريض آخر.' : 'Are you sure you want to cancel this booking? The slot will be released.' }}
            </p>

            <div class="flex items-center justify-end gap-2.5 pt-3 border-t border-slate-100 dark:border-slate-800">
                <button type="button" onclick="closeCancelModal()" class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-xl text-xs transition-colors cursor-pointer">
                    {{ $isRtl ? 'تراجع' : 'Back' }}
                </button>
                <button type="button" onclick="confirmCancelAppt()" class="px-5 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-black rounded-xl text-xs shadow-md transition-all cursor-pointer">
                    {{ $isRtl ? 'تأكيد الإلغاء' : 'Confirm Cancel' }}
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     MODAL 4: BOOK NEW APPOINTMENT (LUXURY GOLD STANDARD)
══════════════════════════════════════════ --}}
<div id="newApptModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-[#0A1628]/60 backdrop-blur-md transition-opacity" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div class="w-full max-w-2xl transform overflow-hidden rounded-3xl bg-white dark:bg-slate-900 text-start shadow-2xl transition-all border border-slate-200/80 dark:border-slate-800 animate-in fade-in zoom-in-95 duration-200">
            
            {{-- Luxury Gradient Header --}}
            <div class="relative px-6 py-6 bg-gradient-to-r from-[#0A1628] via-[#152C4B] to-[#0C6B78] text-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center text-white shadow-inner shrink-0">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="12" y1="11" x2="12" y2="17"/><line x1="9" y1="14" x2="15" y2="14"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-lg font-black tracking-tight text-white">{{ $isRtl ? 'حجز موعد واستشارة طبية جديدة' : 'Book New Clinical Appointment' }}</h3>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-black bg-cyan-500/20 text-cyan-300 border border-cyan-400/30">
                                    {{ $isRtl ? 'تسجيل مباشر' : 'Live Booking' }}
                                </span>
                            </div>
                            <p class="text-xs text-white/70 font-medium mt-0.5 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · صنعاء' : 'Al-Rasheed Specialized Hospital · Sana\'a' }}</span>
                            </p>
                        </div>
                    </div>
                    <button type="button" onclick="closeNewApptModal()" 
                            class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white/80 hover:text-white flex items-center justify-center transition-colors cursor-pointer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    </button>
                </div>
            </div>

            <form onsubmit="handleNewApptSubmit(event)" class="p-6 space-y-5">
                
                {{-- Section 1: Patient Details --}}
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'بيانات المريض الأساسية' : 'Patient Information' }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'اسم المريض الرباعي' : 'Patient Full Name' }} <span class="text-rose-500">*</span></label>
                            <input type="text" id="newPatientName" required placeholder="{{ $isRtl ? 'مثال: عبدالله أحمد الحربي' : 'e.g. Abdullah Ahmed Al-Harbi' }}" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'رقم الهاتف' : 'Phone Number' }} <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <input type="text" id="newPatientPhone" required placeholder="77 123 4567" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 {{ $isRtl ? 'pr-16 pl-3.5' : 'pl-16 pr-3.5' }} h-11 font-mono text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]" dir="ltr">
                                <div class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3 border-l' : 'left-0 pl-3 border-r' }} border-slate-200 dark:border-slate-700 flex items-center pointer-events-none text-slate-400 font-mono text-xs font-bold bg-slate-100 dark:bg-slate-800/80 rounded-s-xl px-2">
                                    +967
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Section 2: Clinical Unit & Consultant --}}
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'العيادة التخصصية والطبيب' : 'Clinical Unit & Consultant' }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'القسم الطبي التخصصي' : 'Medical Department' }} <span class="text-rose-500">*</span></label>
                            <select id="newApptDept" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 text-[#152C4B] dark:text-white font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                                <option value="cardiology">{{ $isRtl ? 'أمراض وجراحة القلب' : 'Cardiology & Heart Care' }}</option>
                                <option value="orthopedics">{{ $isRtl ? 'جراحة العظام والمفاصل' : 'Orthopedics & Spine' }}</option>
                                <option value="pediatrics">{{ $isRtl ? 'طب الأطفال والنمو' : 'Pediatrics' }}</option>
                                <option value="neurology">{{ $isRtl ? 'المخ والأعصاب' : 'Neurology' }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'الطبيب الاستشاري' : 'Consultant Doctor' }} <span class="text-rose-500">*</span></label>
                            <select id="newApptDoctor" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 text-[#152C4B] dark:text-white font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                                <option value="د. سارة المنصوري">{{ $isRtl ? 'د. سارة المنصوري (استشاري قسطرة وجراحة قلب)' : 'Dr. Sarah Al-Mansouri (Cardiology)' }}</option>
                                <option value="د. طارق الهاشمي">{{ $isRtl ? 'د. طارق الهاشمي (أخصائي أول عظام ومفاصل)' : 'Dr. Tariq Al-Hashemi (Orthopedics)' }}</option>
                                <option value="د. ريما القحطاني">{{ $isRtl ? 'د. ريما القحطاني (استشارية طب أطفال)' : 'Dr. Reema Al-Qahtani (Pediatrics)' }}</option>
                                <option value="د. ياسر الغامدي">{{ $isRtl ? 'د. ياسر الغامدي (استشاري جراحة مخ وأعصاب)' : 'Dr. Yasser Al-Ghamdi (Neurology)' }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Section 3: Slot Time & Insurance --}}
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                        <h4 class="text-xs font-black text-[#152C4B] dark:text-white uppercase tracking-wider">
                            {{ $isRtl ? 'التوقيت المجدول والتغطية' : 'Slot Timing & Coverage' }}
                        </h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'تاريخ الكشف' : 'Consultation Date' }} <span class="text-rose-500">*</span></label>
                            <input type="date" id="newApptDate" value="2026-09-06" required class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3.5 h-11 text-[#152C4B] dark:text-white focus:outline-none focus:ring-1 focus:ring-[#14AFC3]">
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'الوقت المتاح' : 'Available Slot' }} <span class="text-rose-500">*</span></label>
                            <select id="newApptTime" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 text-[#152C4B] dark:text-white font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                                <option value="11:30 ص">11:30 ص</option>
                                <option value="12:00 م">12:00 م</option>
                                <option value="12:30 م">12:30 م</option>
                                <option value="01:00 م">01:00 م</option>
                                <option value="01:30 م">01:30 م</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-bold text-xs text-slate-700 dark:text-slate-300 mb-1.5">{{ $isRtl ? 'نوع التغطية' : 'Coverage' }}</label>
                            <select id="newApptInsurance" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-800 px-3 h-11 text-[#152C4B] dark:text-white font-bold focus:outline-none focus:ring-1 focus:ring-[#14AFC3] cursor-pointer">
                                <option value="شركة مأرب للتأمين">{{ $isRtl ? 'شركة مأرب للتأمين' : 'Mareb Insurance' }}</option>
                                <option value="التأمين التكافلي VIP">{{ $isRtl ? 'التأمين الصحي التكافلي' : 'Takaful Health VIP' }}</option>
                                <option value="دفع نقدي مباشر">{{ $isRtl ? 'دفع نقدي مباشر (Self Pay)' : 'Self Pay Cash' }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Action Footer --}}
                <div class="flex items-center justify-end gap-2.5 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <button type="button" onclick="closeNewApptModal()" class="px-5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold rounded-xl text-xs transition-colors cursor-pointer">
                        {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black rounded-xl text-xs shadow-md shadow-[#14AFC3]/20 transition-all cursor-pointer hover:-translate-y-0.5">
                        {{ $isRtl ? 'تأكيد الحجز المباشر' : 'Confirm Booking' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     TOAST NOTIFICATION COMPONENT
══════════════════════════════════════════ --}}
<div id="toastNotification" class="fixed bottom-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-[#152C4B] text-white text-xs font-bold px-4 py-3 rounded-2xl shadow-xl flex items-center gap-2.5 border border-[#14AFC3]/30">
        <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] shrink-0 animate-ping"></span>
        <span id="toastMessage"></span>
    </div>
</div>

{{-- ══════════════════════════════════════════
     CLIENT-SIDE INTERACTIVE SCRIPTS
══════════════════════════════════════════ --}}
<script>
    let activeStatus = 'all';
    let targetRowForAction = null;
    let currentApptCode = '';

    // Filter by Status Tabs
    function setStatusFilter(status, btn) {
        activeStatus = status;
        document.querySelectorAll('.status-tab').forEach(el => {
            el.classList.remove('bg-[#14AFC3]', 'text-white', 'shadow-xs', 'font-bold');
            el.classList.add('bg-slate-50', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300', 'font-semibold');
            const badge = el.querySelector('span:last-child');
            if(badge) {
                badge.className = 'bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[10px] px-1.5 py-0.5 rounded-md border border-slate-200 dark:border-slate-700';
            }
        });

        btn.classList.remove('bg-slate-50', 'dark:bg-slate-800', 'text-slate-600', 'dark:text-slate-300', 'font-semibold');
        btn.classList.add('bg-[#14AFC3]', 'text-white', 'shadow-xs', 'font-bold');
        const activeBadge = btn.querySelector('span:last-child');
        if(activeBadge) {
            activeBadge.className = 'bg-white/20 text-white text-[10px] px-1.5 py-0.5 rounded-md font-bold';
        }

        applyFilters();
    }

    // Apply Live Search & Filters
    function applyFilters() {
        const query = document.getElementById('apptSearchInput').value.toLowerCase().trim();
        const dept = document.getElementById('deptFilter').value;
        const rows = document.querySelectorAll('.appt-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const patient = (row.dataset.patient || '').toLowerCase();
            const mrn = (row.dataset.mrn || '').toLowerCase();
            const doctor = (row.dataset.doctor || '').toLowerCase();
            const code = (row.dataset.code || '').toLowerCase();
            const rowDept = row.dataset.dept || '';
            const rowStatus = row.dataset.status || '';

            const matchesStatus = (activeStatus === 'all' || rowStatus === activeStatus);
            const matchesDept = (dept === 'all' || rowDept === dept);
            const matchesQuery = (!query || patient.includes(query) || mrn.includes(query) || doctor.includes(query) || code.includes(query));

            if (matchesStatus && matchesDept && matchesQuery) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('filteredCount').innerText = visibleCount;
    }

    // 1. View Appointment Details & Ticket (The Eye Modal)
    function viewAppt(btn) {
        const row = btn.closest('tr');
        if(!row) return;

        targetRowForAction = row;
        currentApptCode = row.dataset.code || 'APT-9041';

        document.getElementById('viewPatientName').innerText = row.dataset.patient;
        document.getElementById('viewPatientMrn').innerText = row.dataset.mrn;
        document.getElementById('viewApptCode').innerText = currentApptCode;
        document.getElementById('viewDoctorName').innerText = row.dataset.doctor;
        document.getElementById('viewClinicName').innerText = row.dataset.clinic;
        document.getElementById('viewApptTime').innerText = `${row.dataset.time} · ${row.dataset.date || '2026-09-06'}`;
        document.getElementById('viewPatientPhone').innerText = row.dataset.phone || '+967 77 112 8899';
        document.getElementById('viewInsurance').innerText = row.dataset.insurance || 'شركة مأرب للتأمين';
        document.getElementById('viewCheckinRef').innerText = '#CHK-' + currentApptCode;

        const status = row.dataset.status;
        const badge = document.getElementById('viewStatusBadge');
        const badgeText = document.getElementById('viewStatusText');

        if(status === 'confirmed') {
            badge.className = 'inline-flex items-center gap-1.5 text-[10px] font-bold text-emerald-700 bg-emerald-50 dark:bg-emerald-950/40 dark:text-emerald-300 px-2.5 py-0.5 rounded-full border border-emerald-200';
            badge.querySelector('span:first-child').className = 'w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse';
            badgeText.innerText = "{{ $isRtl ? 'مؤكد الحضور' : 'Confirmed' }}";
        } else if(status === 'waiting') {
            badge.className = 'inline-flex items-center gap-1.5 text-[10px] font-bold text-sky-700 bg-sky-50 dark:bg-sky-950/40 dark:text-sky-300 px-2.5 py-0.5 rounded-full border border-sky-200';
            badge.querySelector('span:first-child').className = 'w-1.5 h-1.5 rounded-full bg-sky-500 animate-ping';
            badgeText.innerText = "{{ $isRtl ? 'في صالة الانتظار' : 'In Waiting Queue' }}";
        } else if(status === 'completed') {
            badge.className = 'inline-flex items-center gap-1.5 text-[10px] font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 px-2.5 py-0.5 rounded-full border border-[#14AFC3]/30';
            badge.querySelector('span:first-child').className = 'w-1.5 h-1.5 rounded-full bg-[#14AFC3]';
            badgeText.innerText = "{{ $isRtl ? 'مكتمل الكشف' : 'Completed' }}";
        } else {
            badge.className = 'inline-flex items-center gap-1.5 text-[10px] font-bold text-rose-700 bg-rose-50 dark:bg-rose-950/40 dark:text-rose-300 px-2.5 py-0.5 rounded-full border border-rose-200';
            badge.querySelector('span:first-child').className = 'w-1.5 h-1.5 rounded-full bg-rose-500';
            badgeText.innerText = "{{ $isRtl ? 'موعد ملغي' : 'Cancelled' }}";
        }

        document.getElementById('viewApptModal').classList.remove('hidden');
    }

    function closeViewModal() {
        document.getElementById('viewApptModal').classList.add('hidden');
    }

    function copyApptCode() {
        if (!currentApptCode) return;
        navigator.clipboard.writeText(currentApptCode).then(() => {
            showToast("{{ $isRtl ? 'تم نسخ رمز الحجز المرجعي (' : 'Booking code copied: (' }}" + currentApptCode + ")");
        }).catch(() => {
            showToast("{{ $isRtl ? 'رمز الحجز: ' : 'Booking Code: ' }}" + currentApptCode);
        });
    }

    function printFromModal() {
        closeViewModal();
        if(targetRowForAction) {
            printSingleApptSlip(targetRowForAction);
        } else {
            window.print();
        }
    }

    // 2. Reschedule Modal
    function openRescheduleModal(btn) {
        targetRowForAction = btn.closest('tr');
        if(!targetRowForAction) return;

        document.getElementById('reschedulePatient').value = targetRowForAction.dataset.patient;
        document.getElementById('rescheduleDoctor').value = targetRowForAction.dataset.doctor;
        document.getElementById('rescheduleStatus').value = targetRowForAction.dataset.status;

        document.getElementById('rescheduleModal').classList.remove('hidden');
    }

    function closeRescheduleModal() {
        document.getElementById('rescheduleModal').classList.add('hidden');
        targetRowForAction = null;
    }

    function handleRescheduleSubmit(e) {
        e.preventDefault();
        if(!targetRowForAction) return;

        const newTime = document.getElementById('rescheduleTime').value;
        const newDoctor = document.getElementById('rescheduleDoctor').value;
        const newStatus = document.getElementById('rescheduleStatus').value;

        targetRowForAction.dataset.time = newTime;
        targetRowForAction.dataset.doctor = newDoctor;
        targetRowForAction.dataset.status = newStatus;

        // Update DOM
        const timeEl = targetRowForAction.querySelector('.appt-row td:nth-child(3) span:first-of-type');
        if(timeEl) timeEl.innerText = newTime;

        const docEl = targetRowForAction.querySelector('.appt-row td:nth-child(2) span:first-child');
        if(docEl) docEl.innerText = newDoctor;

        const statusBadge = targetRowForAction.querySelector('.status-badge');
        if(statusBadge) {
            if(newStatus === 'confirmed') {
                statusBadge.className = 'status-badge inline-flex items-center gap-1.5 text-[10.5px] font-bold text-emerald-700 bg-emerald-50 dark:bg-emerald-950/40 dark:text-emerald-300 px-2.5 py-1 rounded-full border border-emerald-200/80 dark:border-emerald-800/60';
                statusBadge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>' + "{{ $isRtl ? 'مؤكد الحضور' : 'Confirmed' }}";
            } else if(newStatus === 'waiting') {
                statusBadge.className = 'status-badge inline-flex items-center gap-1.5 text-[10.5px] font-bold text-sky-700 bg-sky-50 dark:bg-sky-950/40 dark:text-sky-300 px-2.5 py-1 rounded-full border border-sky-200/80 dark:border-sky-800/60';
                statusBadge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-ping"></span>' + "{{ $isRtl ? 'في صالة الانتظار' : 'In Waiting Queue' }}";
            } else if(newStatus === 'completed') {
                statusBadge.className = 'status-badge inline-flex items-center gap-1.5 text-[10.5px] font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 px-2.5 py-1 rounded-full border border-[#14AFC3]/30';
                statusBadge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>' + "{{ $isRtl ? 'مكتمل الكشف' : 'Completed' }}";
            }
        }

        closeRescheduleModal();
        showToast("{{ $isRtl ? 'تمت إعادة جدولة وتأكيد الموعد بنجاح.' : 'Appointment rescheduled successfully.' }}");
    }

    // 3. Cancel Modal
    function openCancelModal(btn) {
        targetRowForAction = btn.closest('tr');
        if(!targetRowForAction) return;

        const patient = targetRowForAction.dataset.patient;
        document.getElementById('cancelModalDesc').innerText = `{{ $isRtl ? 'هل تريد بالتأكيد إلغاء حجز الموعد للمريض (' : 'Are you sure you want to cancel booking for (' }}${patient}{{ $isRtl ? ')؟ سيتم تحرير الخانة فوراً.' : ')?' }}`;

        document.getElementById('cancelApptModal').classList.remove('hidden');
    }

    function closeCancelModal() {
        document.getElementById('cancelApptModal').classList.add('hidden');
        targetRowForAction = null;
    }

    function confirmCancelAppt() {
        if(!targetRowForAction) return;

        targetRowForAction.dataset.status = 'cancelled';
        const badge = targetRowForAction.querySelector('.status-badge');
        if(badge) {
            badge.className = 'status-badge inline-flex items-center gap-1.5 text-[10.5px] font-bold text-rose-700 bg-rose-50 dark:bg-rose-950/40 dark:text-rose-300 px-2.5 py-1 rounded-full border border-rose-200 dark:border-rose-800/60';
            badge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>' + "{{ $isRtl ? 'موعد ملغي' : 'Cancelled' }}";
        }
        targetRowForAction.classList.add('opacity-75');

        closeCancelModal();
        showToast("{{ $isRtl ? 'تم إلغاء الموعد وتحرير خانة العيادة بنجاح.' : 'Appointment cancelled successfully.' }}");
    }

    // 4. New Appointment Modal
    function openNewApptModal() {
        document.getElementById('newApptModal').classList.remove('hidden');
    }

    function closeNewApptModal() {
        document.getElementById('newApptModal').classList.add('hidden');
    }

    function handleNewApptSubmit(e) {
        e.preventDefault();
        closeNewApptModal();
        showToast("{{ $isRtl ? 'تم تسجيل وحجز الموعد الطبي الجديد بنجاح.' : 'Appointment booked successfully.' }}");
    }

    // 5. Print Functions
    function printSingleApptSlip(btnOrRow) {
        const row = btnOrRow.closest ? btnOrRow.closest('tr') : btnOrRow;
        if(!row) return;

        document.getElementById('printPatientName').innerText = row.dataset.patient || '';
        document.getElementById('printPatientMrn').innerText = row.dataset.mrn || '';
        document.getElementById('printPatientPhone').innerText = row.dataset.phone || '';
        document.getElementById('printDoctorName').innerText = row.dataset.doctor || '';
        document.getElementById('printClinicRoom').innerText = row.dataset.clinic || '';
        document.getElementById('printApptTime').innerText = `${row.dataset.time} · ${row.dataset.date || '2026-09-06'}`;
        document.getElementById('printVisitType').innerText = row.dataset.type || '';
        document.getElementById('printInsurance').innerText = row.dataset.insurance || '';
        document.getElementById('printSlipCode').innerText = row.dataset.code || 'APT-9041';
        document.getElementById('printSlipBarcode').innerText = '*' + (row.dataset.code || 'APT-9041') + '-CHK*';

        showToast("{{ $isRtl ? 'جاري تجهيز تذكرة الموعد للطباعة الرسمية...' : 'Preparing appointment slip for print...' }}");
        setTimeout(() => {
            window.print();
        }, 300);
    }

    function triggerExportSchedule() {
        showToast("{{ $isRtl ? 'جاري تجهيز كشف المواعيد اليومي للطباعة...' : 'Preparing daily schedule for print...' }}");
        setTimeout(() => {
            window.print();
        }, 300);
    }

    // 6. Toast Notification Controller
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
