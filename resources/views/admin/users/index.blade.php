@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    $usersList = (isset($users) && count($users) > 0) ? $users : collect([
        [
            'id' => 'DOC-1821',
            'name' => $isRtl ? 'د. سارة المنصوري' : 'Dr. Sarah Al-Mansouri',
            'name_en' => 'Dr. Sarah Al-Mansouri',
            'email' => 's.mansouri@alrasheed.ye',
            'phone' => '771234118',
            'phone_full' => '+967 771 234 118',
            'initials' => $isRtl ? 'د.س' : 'SM',
            'color' => 'bg-[#E5FAFC] text-[#0C6B78] border border-[#14AFC3]/30',
            'role' => 'doctor',
            'role_label' => $isRtl ? 'طبيب استشاري' : 'Consultant Doctor',
            'title' => $isRtl ? 'استشاري أول قسطرة وجراحة قلب' : 'Senior Consultant Cardiologist',
            'department' => $isRtl ? 'أمراض وجراحة القلب' : 'Cardiology & Heart Surgery',
            'department_slug' => 'cardiology',
            'room' => $isRtl ? 'عيادة 204 · المبنى الرئيسي' : 'Clinic 204 · Main Wing',
            'shift' => $isRtl ? 'صباحي (08:00 - 16:00)' : 'Morning (08:00 - 16:00)',
            'clearance' => 'Level 4 - Full Clinical Access',
            'status' => 'active',
            'created_at' => '2024/02/15',
        ],
        [
            'id' => 'DOC-1822',
            'name' => $isRtl ? 'د. طارق الهاشمي' : 'Dr. Tariq Al-Hashemi',
            'name_en' => 'Dr. Tariq Al-Hashemi',
            'email' => 't.hashemi@alrasheed.ye',
            'phone' => '777981442',
            'phone_full' => '+967 777 981 442',
            'initials' => $isRtl ? 'د.ط' : 'TH',
            'color' => 'bg-sky-50 text-sky-700 border border-sky-200/60',
            'role' => 'doctor',
            'role_label' => $isRtl ? 'أخصائي أول' : 'Sr. Specialist',
            'title' => $isRtl ? 'أخصائي أول جراحة عظام ومفاصل' : 'Senior Orthopedic Specialist',
            'department' => $isRtl ? 'جراحة العظام والمفاصل' : 'Orthopedic Surgery',
            'department_slug' => 'orthopedics',
            'room' => $isRtl ? 'غرفة عمليات 03 · البرج الجراحي' : 'OR 03 · Surgical Tower',
            'shift' => $isRtl ? 'مناوبة كاملة (08:00 - 20:00)' : 'Full Shift (08:00 - 20:00)',
            'clearance' => 'Level 4 - Surgical Clearance',
            'status' => 'active',
            'created_at' => '2023/11/10',
        ],
        [
            'id' => 'REC-4091',
            'name' => $isRtl ? 'أ. بلقيس حميد الحبيشي' : 'Belqees Al-Hubaishi',
            'name_en' => 'Belqees Al-Hubaishi',
            'email' => 'b.hubaishi@alrasheed.ye',
            'phone' => '772112334',
            'phone_full' => '+967 772 112 334',
            'initials' => $isRtl ? 'أ.ب' : 'BH',
            'color' => 'bg-emerald-50 text-emerald-700 border border-emerald-200/60',
            'role' => 'receptionist',
            'role_label' => $isRtl ? 'موظف استقبال وتنويم' : 'Admissions Receptionist',
            'title' => $isRtl ? 'مسؤول استقبال وخدمات المرضى' : 'Patient Services Officer',
            'department' => $isRtl ? 'الاستقبال والتنويم الرئيسي' : 'Main Admissions',
            'department_slug' => 'admissions',
            'room' => $isRtl ? 'مكتب الاستقبال A · البوابة الرئيسية' : 'Front Desk A · Main Wing',
            'shift' => $isRtl ? 'صباحي (07:00 - 15:00)' : 'Morning (07:00 - 15:00)',
            'clearance' => 'Level 2 - Front Desk & HIS',
            'status' => 'active',
            'created_at' => '2024/05/20',
        ],
        [
            'id' => 'ADM-1002',
            'name' => $isRtl ? 'م. بشير عبدالكريم الوصابي' : 'Eng. Basheer Al-Wosabi',
            'name_en' => 'Eng. Basheer Al-Wosabi',
            'email' => 'b.wosabi@alrasheed.ye',
            'phone' => '773778990',
            'phone_full' => '+967 773 778 990',
            'initials' => $isRtl ? 'م.ب' : 'BW',
            'color' => 'bg-teal-50 text-[#0C6B78] border border-[#14AFC3]/30',
            'role' => 'admin',
            'role_label' => $isRtl ? 'مدير نظام تقني' : 'System Administrator',
            'title' => $isRtl ? 'كبير مهندسي أمن الأنظمة السريرية' : 'Lead Clinical Systems Security Engineer',
            'department' => $isRtl ? 'البنية التحتية وتقنية المعلومات' : 'IT Infrastructure & Security',
            'department_slug' => 'it',
            'room' => $isRtl ? 'مركز البيانات الرئيسي · الطابق الأرضي' : 'Data Center 01 · Ground Floor',
            'shift' => $isRtl ? 'مرن (08:30 - 16:30)' : 'Flexible (08:30 - 16:30)',
            'clearance' => 'Level 5 - Root Administration',
            'status' => 'active',
            'created_at' => '2023/01/15',
        ],
        [
            'id' => 'DOC-1825',
            'name' => $isRtl ? 'د. نزار صالح الحكيمي' : 'Dr. Nizar Al-Hakeemi',
            'name_en' => 'Dr. Nizar Al-Hakeemi',
            'email' => 'n.hakeemi@alrasheed.ye',
            'phone' => '770554433',
            'phone_full' => '+967 770 554 433',
            'initials' => $isRtl ? 'د.ن' : 'NH',
            'color' => 'bg-slate-100 text-slate-500 border border-slate-200',
            'role' => 'doctor',
            'role_label' => $isRtl ? 'استشاري أول' : 'Senior Consultant',
            'title' => $isRtl ? 'استشاري أول عناية مركزة وحالات حرجة' : 'Senior ICU Consultant',
            'department' => $isRtl ? 'العناية المركزة والحالات الحرجة' : 'Intensive Care Unit (ICU)',
            'department_slug' => 'icu',
            'room' => $isRtl ? 'جناح ICU-1 · البرج الطبي' : 'ICU-1 Suite · Medical Tower',
            'shift' => $isRtl ? 'إجازة مؤقتة' : 'Temporary Leave',
            'clearance' => 'Level 4 - Temporarily Suspended',
            'status' => 'inactive',
            'created_at' => '2023/08/01',
        ],
        [
            'id' => 'MGR-3012',
            'name' => $isRtl ? 'أ. فاطمة صالح الذماري' : 'Fatima Al-Dhamari',
            'name_en' => 'Fatima Al-Dhamari',
            'email' => 'f.dhamari@alrasheed.ye',
            'phone' => '775889001',
            'phone_full' => '+967 775 889 001',
            'initials' => $isRtl ? 'أ.ف' : 'FD',
            'color' => 'bg-purple-50 text-purple-700 border border-purple-200/60',
            'role' => 'manager',
            'role_label' => $isRtl ? 'مشرف عمليات' : 'Operations Lead',
            'title' => $isRtl ? 'مشرفة عامة للعمليات الطبية والجودة' : 'Lead Clinical Operations & Quality Manager',
            'department' => $isRtl ? 'إدارة العمليات الإكلينيكية' : 'Clinical Operations & Quality',
            'department_slug' => 'operations',
            'room' => $isRtl ? 'مكتب الإدارة 301 · المبنى الإداري' : 'Office 301 · Admin Wing',
            'shift' => $isRtl ? 'صباحي (08:00 - 16:00)' : 'Morning (08:00 - 16:00)',
            'clearance' => 'Level 4 - Operations & Audit',
            'status' => 'active',
            'created_at' => '2024/01/10',
        ]
    ]);
@endphp

@section('page-title', $isRtl ? 'إدارة المستخدمين' : __('User Management'))
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
     PRINT STYLESHEET (OFFICIAL STAFF BADGE & PASS)
══════════════════════════════════════════════ --}}
<style>
    @media print {
        body * {
            visibility: hidden !important;
        }
        #printableStaffBadge, #printableStaffBadge * {
            visibility: visible !important;
        }
        #printableStaffBadge {
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
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl sm:text-2xl font-black text-[#152C4B] dark:text-white tracking-tight leading-tight flex items-center gap-2">
                    <span>{{ $isRtl ? 'دليل إدارة المستخدمين' : 'Staff & User Management Directory' }}</span>
                    <span class="inline-block w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-0.5">
                    {{ $isRtl ? 'إدارة دليل الكوادر الطبية والإدارية، الصلاحيات الأمنية، وبطاقات التعريف الرقمية للمستشفى.' : 'Manage medical staff registry, role permissions, and verified staff credential badges.' }}
                </p>
            </div>
        </div>
        
        <div class="flex items-center gap-2.5 self-start sm:self-auto">
            <button type="button" onclick="triggerExport()" class="px-4 py-2.5 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-[#152C4B] dark:text-slate-200 text-xs font-bold rounded-xl border border-slate-200/80 dark:border-slate-700 shadow-xs transition-all flex items-center gap-2 cursor-pointer hover:border-[#14AFC3]">
                <svg class="w-4 h-4 text-[#14AFC3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span>{{ $isRtl ? 'طباعة تقرير السجل' : 'Print Directory Report' }}</span>
            </button>
            <button type="button" onclick="openUserModal()" class="px-4 py-2.5 bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white text-xs font-black rounded-xl shadow-md shadow-[#14AFC3]/20 transition-all flex items-center gap-1.5 cursor-pointer hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                <span>{{ $isRtl ? 'إضافة مستخدم جديد' : 'New User' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         4 KPI METRIC CARDS (CENTERED ICONS & TEXT)
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        {{-- Card 1: Total System Users (Highlighted Teal Gradient) --}}
        <x-stat-card 
            :label="$isRtl ? 'إجمالي المستخدمين' : 'Total System Users'" 
            value="48" 
            :sublabel="'+3 ' . ($isRtl ? 'هذا الشهر · مستشفى الرشيد' : 'this month · Al-Rasheed')"
            :highlighted="true">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 2: Medical Staff --}}
        <x-stat-card 
            :label="$isRtl ? 'الكوادر الطبية' : 'Medical Staff'" 
            value="31" 
            :sublabel="'64.5% ' . ($isRtl ? 'تغطية سريرية مباشرة' : 'Direct Clinic Duty')"
            iconBg="bg-emerald-50 dark:bg-emerald-950/40"
            iconColor="text-emerald-600 dark:text-emerald-400">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 3: Reception & Admissions --}}
        <x-stat-card 
            :label="$isRtl ? 'طاقم الاستقبال والتنويم' : 'Front Desk Staff'" 
            value="9" 
            :sublabel="'100% ' . ($isRtl ? 'جاهزية صالات الاستقبال' : 'Readiness')">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

        {{-- Card 4: Management & Operations --}}
        <x-stat-card 
            :label="$isRtl ? 'الإدارة والتشغيل' : 'Admin & Operations'" 
            value="8" 
            :sublabel="$isRtl ? 'صلاحيات كاملة · القيادة التنفيذية' : 'Full Access · Executive Systems'">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </x-slot:icon>
        </x-stat-card>

    </div>

    {{-- ══════════════════════════════════════════
         FILTER & SEARCH TOOLBAR (IN ONE UNIFIED ROW - الصورة الأولى)
         "اجعلهم كلهم في خط واحد ارفع شريط البحث والخانات الاخرى مثل 6 مستخدم معروض و جميع الحالات اجعلهم مع الباقين من التبويبات الموجوده"
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 p-3.5 shadow-xs">
        <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-3">
            
            {{-- الجانب الأول: تبويبات الأدوار الوظيفية بنمط كبسولات موحد --}}
            <div class="flex items-center gap-1.5 overflow-x-auto scrollbar-none text-xs pb-1 xl:pb-0">
                <button type="button" onclick="setRoleFilter('all', this)" class="role-tab active px-3.5 py-2 rounded-xl font-bold bg-[#14AFC3] text-white shadow-xs flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                    <span>{{ $isRtl ? 'جميع الأدوار' : 'All Roles' }}</span>
                    <span class="tab-badge bg-white/20 text-white text-[10px] px-1.5 py-0.5 rounded-md font-mono font-bold">48</span>
                </button>
                <button type="button" onclick="setRoleFilter('doctor', this)" class="role-tab px-3.5 py-2 rounded-xl font-bold bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/60 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                    <span>{{ $isRtl ? 'الأطباء الإكلينيكيون' : 'Doctors' }}</span>
                    <span class="tab-badge bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 text-[10px] px-1.5 py-0.5 rounded-md font-mono border border-slate-200/60 dark:border-slate-600">31</span>
                </button>
                <button type="button" onclick="setRoleFilter('receptionist', this)" class="role-tab px-3.5 py-2 rounded-xl font-bold bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/60 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                    <span>{{ $isRtl ? 'طاقم الاستقبال' : 'Front Desk' }}</span>
                    <span class="tab-badge bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 text-[10px] px-1.5 py-0.5 rounded-md font-mono border border-slate-200/60 dark:border-slate-600">9</span>
                </button>
                <button type="button" onclick="setRoleFilter('management', this)" class="role-tab px-3.5 py-2 rounded-xl font-bold bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/60 flex items-center gap-2 whitespace-nowrap transition-all cursor-pointer">
                    <span>{{ $isRtl ? 'الإدارة والأنظمة' : 'Admin & Ops' }}</span>
                    <span class="tab-badge bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 text-[10px] px-1.5 py-0.5 rounded-md font-mono border border-slate-200/60 dark:border-slate-600">8</span>
                </button>
            </div>

            {{-- الجانب الثاني في نفس الخط: البحث + فلتر الحالة + عداد المستخدمين المعروضين --}}
            <div class="flex items-center gap-2.5 flex-wrap sm:flex-nowrap shrink-0">
                {{-- شريط البحث --}}
                <div class="relative w-full sm:w-64 md:w-72">
                    <input type="text" id="userSearchInput" oninput="applyFilters()" 
                        placeholder="{{ $isRtl ? 'ابحث بالاسم، الرقم الوظيفي، أو القسم...' : 'Search by staff name, ID, or department...' }}" 
                        class="w-full text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700 rounded-xl py-2 {{ $isRtl ? 'pr-9 pl-3.5' : 'pl-9 pr-3.5' }} text-slate-900 dark:text-white focus:ring-1 focus:ring-[#14AFC3] focus:border-[#14AFC3] transition-all placeholder:text-slate-400 outline-none">
                    <div class="absolute inset-y-0 {{ $isRtl ? 'right-3' : 'left-3' }} flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                    </div>
                </div>

                {{-- القائمة المنسدلة لفلتر الحالة --}}
                <select id="statusFilter" onchange="applyFilters()" class="text-xs bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700 rounded-xl py-2 px-3 text-[#152C4B] dark:text-slate-200 font-bold focus:ring-1 focus:ring-[#14AFC3] outline-none cursor-pointer shrink-0">
                    <option value="all">{{ $isRtl ? 'جميع الحالات' : 'All Statuses' }}</option>
                    <option value="active">{{ $isRtl ? 'حسابات نشطة فقط' : 'Active Only' }}</option>
                    <option value="inactive">{{ $isRtl ? 'حسابات معطلة فقط' : 'Inactive Only' }}</option>
                </select>

                {{-- عداد المستخدمين المعروضين --}}
                <span class="text-xs font-bold text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-800 px-3 py-2 rounded-xl border border-slate-200/80 dark:border-slate-700 flex items-center gap-1 shrink-0 whitespace-nowrap">
                    <span id="filteredCount" class="font-mono text-[#14AFC3] font-black">{{ $usersList->count() }}</span>
                    <span>{{ $isRtl ? 'مستخدم معروض' : 'Users Shown' }}</span>
                </span>
            </div>

        </div>
    </div>

    {{-- ══════════════════════════════════════════
         USERS DIRECTORY TABLE (1:1 MATHEMATICAL ALIGNMENT - الصورة الثالثة)
         "رتب لي كل خانه بحيث يكون تحتها بياناتها بشكل مرتب وصحيح ونفس الواجهات السابقه"
    ══════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[1000px] border-collapse" id="usersTable">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
                        <th class="w-[24%] py-4 px-5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'المستخدم والرقم الوظيفي' : 'Staff Member & ID' }}
                        </th>
                        <th class="w-[13%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'الدور الوظيفي' : 'Role' }}
                        </th>
                        <th class="w-[17%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'القسم الطبي / الإداري' : 'Department' }}
                        </th>
                        <th class="w-[14%] py-4 px-4 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'الموقع / العيادة' : 'Location / Room' }}
                        </th>
                        <th class="w-[11%] py-4 px-3 text-center whitespace-nowrap">
                            {{ $isRtl ? 'الحالة' : 'Status' }}
                        </th>
                        <th class="w-[10%] py-4 px-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'المناوبة' : 'Duty Shift' }}
                        </th>
                        <th class="w-[11%] py-4 px-4 text-center whitespace-nowrap">
                            {{ $isRtl ? 'الإجراءات' : 'Actions' }}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/70 text-slate-600 dark:text-slate-300 font-medium">
                    @foreach($usersList as $user)
                    <tr class="user-row hover:bg-[#E5FAFC]/40 dark:hover:bg-slate-800/60 transition-colors group {{ $user['status'] === 'inactive' ? 'opacity-75' : '' }}" 
                        data-role="{{ $user['role'] }}" 
                        data-role-label="{{ $user['role_label'] }}"
                        data-status="{{ $user['status'] }}" 
                        data-name="{{ $user['name'] }}" 
                        data-name-en="{{ $user['name_en'] }}"
                        data-email="{{ $user['email'] }}" 
                        data-id="{{ $user['id'] }}" 
                        data-phone="{{ $user['phone'] }}" 
                        data-phone-full="{{ $user['phone_full'] ?? '+967 ' . $user['phone'] }}" 
                        data-dept="{{ $user['department'] }}" 
                        data-room="{{ $user['room'] }}" 
                        data-shift="{{ $user['shift'] }}"
                        data-title="{{ $user['title'] }}"
                        data-clearance="{{ $user['clearance'] }}"
                        data-initials="{{ $user['initials'] }}"
                        data-created-at="{{ $user['created_at'] }}">
                        
                        {{-- 1. المستخدم والرقم الوظيفي (24%) --}}
                        <td class="w-[24%] py-4 px-5">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-[#E5FAFC] to-[#CCF4F8] text-[#0C6B78] border border-[#14AFC3]/30 font-black text-sm flex items-center justify-center shrink-0 shadow-xs group-hover:scale-105 transition-transform">
                                    {{ $user['initials'] }}
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="font-black text-slate-900 dark:text-white text-xs sm:text-[13.5px] truncate group-hover:text-[#14AFC3] transition-colors cursor-pointer"
                                          onclick="viewUser(this)">
                                        {{ $user['name'] }}
                                    </div>
                                    <div class="flex items-center gap-1.5 mt-0.5">
                                        <span class="inline-flex items-center font-mono font-bold text-[10px] px-2 py-0.5 rounded-md bg-[#E5FAFC] dark:bg-[#14AFC3]/20 text-[#0C6B78] dark:text-[#14AFC3] border border-[#14AFC3]/30 shadow-2xs">
                                            <bdi dir="ltr">{{ $user['id'] }}</bdi>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        {{-- 2. الدور الوظيفي (13%) --}}
                        <td class="w-[13%] py-4 px-4">
                            @if($user['role'] === 'doctor')
                                <span class="inline-flex items-center gap-1 text-[11px] font-bold text-[#0C6B78] dark:text-[#14AFC3] bg-[#E5FAFC] dark:bg-[#14AFC3]/20 px-2.5 py-1 rounded-xl border border-[#14AFC3]/30 shadow-2xs">
                                    {{ $user['role_label'] }}
                                </span>
                            @elseif($user['role'] === 'receptionist')
                                <span class="inline-flex items-center gap-1 text-[11px] font-bold text-sky-700 bg-sky-50 dark:bg-sky-950/50 px-2.5 py-1 rounded-xl border border-sky-200/80 shadow-2xs">
                                    {{ $user['role_label'] }}
                                </span>
                            @elseif($user['role'] === 'admin')
                                <span class="inline-flex items-center gap-1 text-[11px] font-bold text-teal-900 dark:text-teal-200 bg-[#E5FAFC] dark:bg-[#14AFC3]/20 px-2.5 py-1 rounded-xl border border-teal-300 shadow-2xs">
                                    {{ $user['role_label'] }}
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-[11px] font-bold text-purple-700 bg-purple-50 dark:bg-purple-950/50 px-2.5 py-1 rounded-xl border border-purple-200/80 shadow-2xs">
                                    {{ $user['role_label'] }}
                                </span>
                            @endif
                        </td>

                        {{-- 3. القسم الطبي / الإداري (17%) --}}
                        <td class="w-[17%] py-4 px-4">
                            <span class="font-bold text-slate-900 dark:text-slate-200 text-xs truncate block" title="{{ $user['department'] }}">
                                {{ $user['department'] }}
                            </span>
                        </td>

                        {{-- 4. الموقع / العيادة (14%) --}}
                        <td class="w-[14%] py-4 px-4">
                            <div class="flex items-center gap-1.5 text-slate-700 dark:text-slate-300 font-medium text-xs truncate">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#14AFC3] shrink-0">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                                </svg>
                                <span class="truncate font-semibold" title="{{ $user['room'] }}">{{ $user['room'] }}</span>
                            </div>
                        </td>

                        {{-- 5. الحالة (11% - محاذاة في الوسط) --}}
                        <td class="w-[11%] py-4 px-3 text-center">
                            @if($user['status'] === 'active')
                                <span class="status-badge inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200/80 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span>{{ $isRtl ? 'نشط' : 'Active' }}</span>
                                </span>
                            @else
                                <span class="status-badge inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 dark:bg-rose-950/40 dark:text-rose-300 border border-rose-200 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                                    <span>{{ $isRtl ? 'معطل' : 'Inactive' }}</span>
                                </span>
                            @endif
                        </td>

                        {{-- 6. المناوبة (10%) --}}
                        <td class="w-[10%] py-4 px-3.5">
                            <span class="text-slate-900 dark:text-slate-200 font-bold text-xs truncate block" title="{{ $user['shift'] }}">
                                {{ $user['shift'] }}
                            </span>
                        </td>

                        {{-- 7. الإجراءات (11% - محاذاة في الوسط) --}}
                        <td class="w-[11%] py-4 px-4 text-center">
                            <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                                {{-- Quick Print Pass --}}
                                <button type="button" onclick="quickPrintCard(this)" 
                                        title="{{ $isRtl ? 'طباعة تصريح الموظف المعتمد' : 'Print Pass' }}" 
                                        class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#0C6B78] hover:bg-[#14AFC3] hover:text-white transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                </button>

                                {{-- Eye View Details Modal --}}
                                <button type="button" onclick="viewUser(this)" 
                                        title="{{ $isRtl ? 'معاينة كامل تفاصيل الموظف' : 'View Full Details' }}" 
                                        class="w-8 h-8 rounded-xl bg-white dark:bg-slate-700 text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white transition-all cursor-pointer shadow-2xs flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>

                                {{-- Edit Button --}}
                                <button type="button" onclick="openEditModal(this)" 
                                        title="{{ $isRtl ? 'تعديل البيانات' : 'Edit' }}" 
                                        class="w-8 h-8 rounded-xl text-slate-500 hover:text-[#14AFC3] hover:bg-slate-200/60 dark:hover:bg-slate-700 transition-all cursor-pointer flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>

                                {{-- Deactivate / Toggle Status --}}
                                <button type="button" onclick="openDeactivateModal(this)" 
                                        title="{{ $isRtl ? 'تعطيل أو تنشيط الحساب' : 'Toggle Status' }}" 
                                        class="w-8 h-8 rounded-xl text-slate-400 hover:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/40 transition-all cursor-pointer flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
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
            <span>{{ $isRtl ? 'عرض 1 إلى 6 من أصل 48 كادراً مسجلاً بالنظام (مستشفى الرشيد - صنعاء)' : 'Showing 1 to 6 of 48 registered staff (Al-Rasheed Hospital - Sana\'a)' }}</span>
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
     MODAL 1: VIEW USER DETAILS & EXECUTIVE DOSSIER (THE LUXURY EYE MODAL - الصورة الثانية)
     "تكون الكارد افضل ومرتب جدا واحترافي مثل الواجهات السابقه"
════════════════════════════════════════════════════════════════ --}}
<div id="viewUserModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/65 backdrop-blur-xs hidden p-4 sm:p-6 overflow-y-auto" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-3xl w-full max-w-2xl shadow-2xl border border-slate-100 dark:border-slate-800 overflow-hidden my-auto transform transition-all animate-in fade-in zoom-in-95 duration-200">
        
        {{-- Luxury Modal Header (هيد واسع وفخم بتدرج لوني عميق) --}}
        <div style="background: linear-gradient(135deg, #0A1628 0%, #152C4B 50%, #0C6B78 100%);" class="px-7 py-6 text-white flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-13 h-13 rounded-2xl bg-white/15 border border-white/25 backdrop-blur-md flex items-center justify-center text-[#14AFC3] flex-shrink-0 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <h3 class="font-black text-lg sm:text-xl text-white tracking-tight">{{ $isRtl ? 'الملف الوظيفي والاعتماد السريري' : 'Staff Profile & Clinical Dossier' }}</h3>
                        <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-[#14AFC3]/25 border border-[#14AFC3]/40 text-teal-100">
                            {{ $isRtl ? 'كادر معتمد' : 'Verified Staff' }}
                        </span>
                    </div>
                    <p class="text-teal-100/90 text-xs mt-1 flex items-center gap-1.5 font-medium">
                        <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                        <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · السجل الموحد للكوادر الطبية' : 'Al-Rasheed Hospital · Official Registry' }}</span>
                    </p>
                </div>
            </div>
            <button type="button" onclick="closeViewModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-base font-bold">✕</button>
        </div>

        {{-- Modal Body --}}
        <div class="p-6 sm:p-7 space-y-5">
            
            {{-- Hero Profile Box (مساحة واسعة وفخمة لعرض الاسم والصورة والمسمى) --}}
            <div class="p-5 rounded-2xl bg-gradient-to-r from-[#E5FAFC]/90 via-white to-[#E5FAFC]/50 dark:from-[#14AFC3]/10 dark:via-slate-800/80 dark:to-[#14AFC3]/5 border border-[#14AFC3]/30 shadow-xs flex items-center justify-between gap-4">
                <div class="flex items-center gap-4 min-w-0">
                    <div id="viewUserAvatar" class="w-15 h-15 rounded-2xl bg-gradient-to-tr from-[#152C4B] to-[#0C6B78] text-white font-black text-xl flex items-center justify-center flex-shrink-0 shadow-md border-2 border-white dark:border-slate-700">
                        د.س
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <h3 class="font-black text-base sm:text-lg text-[#152C4B] dark:text-white truncate" id="viewUserName">د. سارة المنصوري</h3>
                            <span class="px-2.5 py-0.5 rounded-lg bg-[#152C4B] text-teal-200 font-mono font-black text-xs shadow-2xs" id="viewUserIdBadge">DOC-1821</span>
                        </div>
                        <div class="text-xs sm:text-sm text-[#0C6B78] dark:text-[#14AFC3] font-bold mt-1" id="viewUserTitle">استشاري أول قسطرة وجراحة قلب</div>
                        <div class="flex items-center gap-2 mt-2">
                            <span id="viewUserRoleBadge" class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-[#E5FAFC] text-[#0C6B78] dark:bg-[#14AFC3]/20 dark:text-[#14AFC3] border border-[#14AFC3]/30">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                                <span id="viewUserRoleText">{{ $isRtl ? 'طبيب استشاري' : 'Consultant' }}</span>
                            </span>
                            <span id="viewUserStatusBadge" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span id="viewUserStatusText">{{ $isRtl ? 'نشط' : 'Active' }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 1. Operational & Location Specifications (شبكة متناسقة بمسافات مريحة) --}}
            <div>
                <div class="text-[11px] font-black text-[#152C4B] dark:text-slate-300 uppercase tracking-wider mb-2.5 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                    <span>{{ $isRtl ? 'البيانات التشغيلية وموقع العمل المعتمد' : 'Operational & Location Specifications' }}</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                    <div class="p-3.5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60">
                        <span class="text-slate-400 block text-[11px] font-bold mb-1">{{ $isRtl ? 'القسم المعتمد' : 'Assigned Department' }}</span>
                        <strong class="text-[#152C4B] dark:text-white font-black text-sm block" id="viewUserDept">أمراض وجراحة القلب</strong>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60">
                        <span class="text-slate-400 block text-[11px] font-bold mb-1">{{ $isRtl ? 'الموقع / الغرفة المعتمدة' : 'Assigned Location / Room' }}</span>
                        <strong class="text-[#152C4B] dark:text-white font-black text-sm block" id="viewUserRoom">عيادة 204 · المبنى الرئيسي</strong>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60">
                        <span class="text-slate-400 block text-[11px] font-bold mb-1">{{ $isRtl ? 'جدول المناوبة / الوردية' : 'Duty Shift' }}</span>
                        <strong class="text-emerald-700 dark:text-emerald-400 font-black text-sm block" id="viewUserShift">صباحي (08:00 - 16:00)</strong>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60">
                        <span class="text-slate-400 block text-[11px] font-bold mb-1">{{ $isRtl ? 'مستوى الصلاحية والأمان' : 'Security Clearance Level' }}</span>
                        <strong class="text-[#0C6B78] dark:text-[#14AFC3] font-black text-sm block" id="viewUserClearance">Level 4 - Full Clinical Access</strong>
                    </div>
                </div>
            </div>

            {{-- 2. Official Contact Channels (Phone & Email with 1-Click Copy) --}}
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
                                <span class="font-mono font-black text-slate-800 dark:text-white text-sm" dir="ltr"><bdi id="viewUserPhone">+967 771 234 118</bdi></span>
                            </div>
                        </div>
                        <button type="button" onclick="copyUserPhone()" title="{{ $isRtl ? 'نسخ' : 'Copy' }}" class="p-2 rounded-xl text-slate-400 hover:text-[#14AFC3] hover:bg-white dark:hover:bg-slate-700 transition cursor-pointer">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="14" height="14" x="8" y="8" rx="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                        </button>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50/80 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60 flex items-center justify-between">
                        <div class="min-w-0">
                            <span class="text-slate-400 block text-[11px] font-bold">{{ $isRtl ? 'البريد المؤسسي الرسمي' : 'Hospital Email' }}</span>
                            <span class="font-mono font-bold text-[#152C4B] dark:text-white block truncate text-xs mt-1" dir="ltr" id="viewUserEmail">s.mansouri@alrasheed.ye</span>
                        </div>
                        <button type="button" onclick="copyUserEmail()" title="{{ $isRtl ? 'نسخ' : 'Copy' }}" class="p-2 rounded-xl text-slate-400 hover:text-[#14AFC3] hover:bg-white dark:hover:bg-slate-700 transition cursor-pointer flex-shrink-0">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="14" height="14" x="8" y="8" rx="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- 3. Digital Temporary Access Key Strip --}}
            <div class="p-4 rounded-2xl bg-[#E5FAFC] dark:bg-[#14AFC3]/15 border border-[#14AFC3]/30 flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold text-[#0C6B78] dark:text-[#14AFC3] block">{{ $isRtl ? 'رمز الدخول والتصريح الرقمي المعتمد' : 'Verified Staff Biometric Key' }}</span>
                    <span id="viewAccessCode" class="font-mono font-black text-sm text-[#152C4B] dark:text-white tracking-wider mt-0.5 block">RSD-DOC1821-SEC</span>
                </div>
                <button type="button" onclick="copyAccessCode()" class="px-3.5 py-1.5 rounded-xl bg-white dark:bg-slate-800 border border-[#14AFC3]/30 text-[#0C6B78] dark:text-[#14AFC3] hover:bg-[#14AFC3] hover:text-white text-xs font-bold transition-all flex items-center gap-1.5 cursor-pointer shadow-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    <span id="copyBtnText">{{ $isRtl ? 'نسخ' : 'Copy' }}</span>
                </button>
            </div>

            {{-- Modal Action Footer --}}
            <div class="flex items-center justify-between gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <button type="button" onclick="closeViewModal()" 
                        class="px-6 py-2.5 text-xs font-bold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-xl transition-colors cursor-pointer">
                    {{ $isRtl ? 'إغلاق' : 'Close' }}
                </button>

                <button type="button" onclick="printCardFromModal()" 
                        class="px-7 py-2.5 text-xs font-black text-white bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] rounded-xl transition-all flex items-center gap-2 cursor-pointer shadow-md shadow-[#14AFC3]/20 hover:scale-101 active:scale-98">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    <span>{{ $isRtl ? 'طباعة بطاقة وتصريح الموظف' : 'Print Official Pass' }}</span>
                </button>
            </div>

        </div>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════════════
     REAL PRINTABLE TEMPLATE: OFFICIAL HOSPITAL CLINICAL CREDENTIAL
     (الجمهورية اليمنية · وزارة الصحة العامة والسكان · مستشفى الرشيد التخصصي - صنعاء)
════════════════════════════════════════════════════════════════ --}}
<div id="printableStaffBadge" class="hidden">
    
    {{-- Official Hospital Letterhead --}}
    <div style="border-bottom: 2px solid #0C6B78; padding-bottom: 14px; margin-bottom: 22px; display: flex; justify-content: space-between; align-items: center; font-family: 'Cairo', 'Inter', sans-serif;">
        <div style="text-align: right;">
            <div style="font-size: 15px; font-weight: 900; color: #152C4B;">الجمهورية اليمنية</div>
            <div style="font-size: 13px; font-weight: 800; color: #0C6B78;">وزارة الصحة العامة والسكان · مستشفى الرشيد التخصصي (صنعاء)</div>
            <div style="font-size: 11px; color: #64748B; font-weight: 600;">الإدارة العامة للموارد البشرية والاعتماد الإكلينيكي</div>
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
            <div style="font-size: 10.5px; color: #64748B; font-weight: 600;">Clinical Staff Credentialing Division</div>
        </div>
    </div>

    {{-- Document Subtitle / Reference Banner --}}
    <div style="background: #E5FAFC; border: 1px solid #14AFC3; border-radius: 12px; padding: 10px 16px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 12px; font-weight: 900; color: #0C6B78;">بطاقة تعريف وتصريح وصول وظيفي معتمد</span>
            <span style="font-size: 11px; color: #64748B; margin-right: 12px;">(Official Medical Staff Credential & Security Pass)</span>
        </div>
        <div style="font-family: monospace; font-size: 11px; font-weight: 800; color: #152C4B;">
            REF: <span id="printDocRef">RSD-EMP-2026-X</span>
        </div>
    </div>

    {{-- The Executive Physical ID Card Mockup (Print Safe) --}}
    <div style="max-width: 650px; margin: 0 auto 30px auto; border: 2px solid #14AFC3; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); background: #ffffff;">
        
        {{-- Card Top Banner --}}
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
                STAFF-PASS · Level 4
            </div>
        </div>

        {{-- Card Main Body --}}
        <div style="padding: 24px; display: flex; gap: 24px; align-items: center; background: #fafcfe;">
            
            {{-- Staff Photo & QR Badge --}}
            <div style="width: 140px; text-align: center; flex-shrink: 0;">
                <div id="printAvatarBox" style="width: 110px; height: 110px; margin: 0 auto 10px auto; border-radius: 22px; background: #E5FAFC; border: 3px solid #14AFC3; display: flex; align-items: center; justify-content: center; font-size: 32px; font-weight: 900; color: #0C6B78; box-shadow: 0 2px 8px rgba(20,175,195,0.15);">
                    د.س
                </div>
                <div style="font-family: monospace; font-size: 12px; font-weight: 900; color: #152C4B; background: #ffffff; border: 1px solid #D5DFEB; padding: 3px 8px; border-radius: 6px; display: inline-block;">
                    ID: <span id="printStaffId">DOC-1821</span>
                </div>
                <div style="margin-top: 10px;">
                    <span style="font-size: 9px; font-weight: 800; background: #10B981; color: #ffffff; padding: 2px 8px; border-radius: 10px;">
                        معتمد · ACTIVE
                    </span>
                </div>
            </div>

            {{-- Staff Detailed Specifications --}}
            <div style="flex: 1; text-align: right;">
                <div style="margin-bottom: 12px; border-bottom: 1px solid #E2E8F0; padding-bottom: 8px;">
                    <div id="printStaffName" style="font-size: 20px; font-weight: 900; color: #152C4B; line-height: 1.2;">د. سارة المنصوري</div>
                    <div id="printStaffTitle" style="font-size: 12px; font-weight: 700; color: #14AFC3; margin-top: 2px;">طبيب استشاري أمراض القلب</div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px 16px; font-size: 11px;">
                    <div>
                        <span style="color: #64748B; font-size: 10px; display: block;">القسم المعتمد / Dept:</span>
                        <strong id="printStaffDept" style="color: #1E293B;">أمراض وجراحة القلب</strong>
                    </div>
                    <div>
                        <span style="color: #64748B; font-size: 10px; display: block;">الموقع المعتمد / Clinic:</span>
                        <strong id="printStaffRoom" style="color: #1E293B;">عيادة 204 · المبنى الرئيسي</strong>
                    </div>
                    <div>
                        <span style="color: #64748B; font-size: 10px; display: block;">الوردية / Duty Shift:</span>
                        <strong id="printStaffShift" style="color: #1E293B;">صباحي (08:00 - 16:00)</strong>
                    </div>
                    <div>
                        <span style="color: #64748B; font-size: 10px; display: block;">مستوى الصلاحية الأمنية:</span>
                        <strong id="printStaffClearance" style="color: #0C6B78;">Level 4 Full Access</strong>
                    </div>
                </div>

                {{-- Contact & Digital Key Strip --}}
                <div style="margin-top: 14px; padding-top: 10px; border-top: 1px dashed #CBD5E1; display: flex; justify-content: space-between; align-items: center; font-size: 10px; color: #475569;">
                    <div>
                        البريد: <span id="printStaffEmail" style="font-family: monospace; font-weight: 600;">s.mansouri@alrasheed.ye</span>
                    </div>
                    <div>
                        الهاتف: <span id="printStaffPhone" style="font-family: monospace; font-weight: 600;">+967 771 234 118</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Bottom Bar with Barcode --}}
        <div style="background: #ffffff; border-top: 1px solid #E2E8F0; padding: 12px 24px; display: flex; justify-content: space-between; align-items: center;">
            {{-- CSS Barcode Representation --}}
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
                    <div style="width: 1px; height: 28px; background: #000;"></div>
                    <div style="width: 4px; height: 28px; background: #000;"></div>
                    <div style="width: 2px; height: 28px; background: #000;"></div>
                    <div style="width: 1px; height: 28px; background: #000;"></div>
                    <div style="width: 3px; height: 28px; background: #000;"></div>
                    <div style="width: 2px; height: 28px; background: #000;"></div>
                    <div style="width: 4px; height: 28px; background: #000;"></div>
                    <div style="width: 1px; height: 28px; background: #000;"></div>
                </div>
                <span id="printBarcodeText" style="font-family: monospace; font-size: 11px; font-weight: 800; color: #334155;">*RSD-DOC-1821-SEC*</span>
            </div>

            <div style="font-size: 10px; color: #64748B; font-weight: 700; text-align: left;">
                <span>صالح حتى: <strong>2027/12/31</strong></span>
                <span style="margin: 0 6px;">·</span>
                <span>تاريخ الإصدار: <strong id="printIssueDate">{{ date('Y/m/d') }}</strong></span>
            </div>
        </div>

    </div>

    {{-- Official Endorsement & Signatures Section --}}
    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-top: 40px; padding-top: 20px; border-top: 1px solid #E2E8F0; text-align: center; font-size: 11px;">
        
        <div>
            <div style="color: #64748B; font-weight: 700; margin-bottom: 25px;">ختم الاعتماد الرقمي</div>
            <div style="width: 82px; height: 82px; border-radius: 50%; border: 2px dashed #14AFC3; margin: 0 auto; display: flex; flex-direction: column; align-items: center; justify-content: center; font-size: 8.5px; font-weight: 900; color: #0C6B78; transform: rotate(-8deg); line-height: 1.35; padding: 4px;">
                <span>معتمد رسمياً</span>
                <span style="font-size: 8px; color: #152C4B;">مستشفى الرشيد</span>
                <span style="font-size: 7.5px; color: #64748B;">صنعاء - اليمن</span>
            </div>
        </div>

        <div>
            <div style="color: #64748B; font-weight: 700; margin-bottom: 35px;">توقيع حامل البطاقة</div>
            <div style="border-bottom: 1px solid #94A3B8; width: 140px; margin: 0 auto 6px auto;"></div>
            <span style="font-size: 10px; color: #64748B;">Staff Member Signature</span>
        </div>

        <div>
            <div style="color: #64748B; font-weight: 700; margin-bottom: 35px;">المدير الطبي العام / CMO</div>
            <div style="font-family: 'Cairo', cursive; font-size: 14px; font-weight: 900; color: #152C4B; border-bottom: 1px solid #94A3B8; width: 150px; margin: 0 auto 6px auto;">
                د. عبد الرحمن السعيد
            </div>
            <span style="font-size: 10px; color: #64748B;">Executive Medical Director</span>
        </div>

    </div>

    {{-- Security Footer Disclaimer --}}
    <div style="margin-top: 40px; padding-top: 14px; border-top: 1px solid #CBD5E1; text-align: center; font-size: 9.5px; color: #94A3B8; line-height: 1.6;">
        هذه البطاقة وثيقة رسمية صادرة عن الجمهورية اليمنية - وزارة الصحة العامة والسكان (مستشفى الرشيد التخصصي - صنعاء). يُرجى إبرازها عند بوابات الوصول وفي الأجنحة الإكلينيكية المقيدة. في حال العثور على البطاقة يُرجى تسليمها فوراً لإدارة الأمن والسلامة بالمستشفى.
        <br>
        Al-Rasheed Specialized Hospital (Sana'a, Yemen) · Security Division · Encrypted Biometric Identity Credential
    </div>

</div>

{{-- ══════════════════════════════════════════
     MODAL 2: EDIT USER DATA (#editUserModal - بطاقة تعديل احترافية وبارزة)
══════════════════════════════════════════ --}}
<div id="editUserModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/65 backdrop-blur-xs hidden p-4 sm:p-6 overflow-y-auto" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
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
                            {{ $isRtl ? 'تعديل بيانات المستخدم والملف الوظيفي' : 'Edit User Profile & Credentials' }}
                        </h3>
                        <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-[#14AFC3]/25 border border-[#14AFC3]/40 text-teal-100">
                            {{ $isRtl ? 'تعديل معتمد' : 'Verified Edit' }}
                        </span>
                    </div>
                    <p class="text-teal-100/90 text-xs mt-1 flex items-center gap-1.5 font-medium">
                        <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                        <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي · السجل الإداري والسريري' : 'Al-Rasheed Hospital · Official Staff Registry' }}</span>
                    </p>
                </div>
            </div>
            <button type="button" onclick="closeEditModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-base font-bold">✕</button>
        </div>

        {{-- Form Body (حقول متناسقة، فسيحة، واضحة واحترافية) --}}
        <form onsubmit="handleEditFormSubmit(event)" class="p-6 sm:p-7 space-y-5">
            
            {{-- القسم الأول: البيانات الشخصية والمهنية --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'البيانات الشخصية والمهنية' : 'Personal & Professional Details' }}</span>
                </div>

                {{-- الاسم الكامل --}}
                <div>
                    <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                        {{ $isRtl ? 'الاسم الكامل للكادر / المستخدم *' : 'Full Staff Name *' }}
                    </label>
                    <input type="text" id="editUserName" required 
                           class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white">
                </div>

                {{-- الدور الوظيفي وحالة الحساب --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'الدور الوظيفي المعتمد *' : 'Assigned Role *' }}
                        </label>
                        <select id="editUserRole" class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white cursor-pointer">
                            <option value="doctor">{{ $isRtl ? 'طبيب (Doctor)' : 'Doctor' }}</option>
                            <option value="receptionist">{{ $isRtl ? 'موظف استقبال وتنويم' : 'Receptionist' }}</option>
                            <option value="admin">{{ $isRtl ? 'مدير نظام تقني (Admin)' : 'Admin' }}</option>
                            <option value="manager">{{ $isRtl ? 'مشرف عمليات وجودة' : 'Manager' }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'حالة الحساب والصلاحية *' : 'Account Status *' }}
                        </label>
                        <select id="editUserStatus" class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white cursor-pointer">
                            <option value="active">{{ $isRtl ? 'نشط ومصرح (Active)' : 'Active' }}</option>
                            <option value="inactive">{{ $isRtl ? 'معطل وموقوف مؤقتاً (Inactive)' : 'Inactive' }}</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- القسم الثاني: القسم الطبي وموقع العمل --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'القسم الطبي وموقع العمل' : 'Department & Clinical Placement' }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'القسم الطبي / الإداري *' : 'Department *' }}
                        </label>
                        <input type="text" id="editUserDept" required 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white">
                    </div>
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'الموقع / العيادة / الغرفة *' : 'Assigned Clinic / Room *' }}
                        </label>
                        <input type="text" id="editUserRoom" required 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white">
                    </div>
                </div>
            </div>

            {{-- القسم الثالث: قنوات التواصل المعتمدة --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'قنوات التواصل المعتمدة' : 'Official Contact Channels' }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- رقم الهاتف مع كود اليمن --}}
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'رقم الهاتف (الجمهورية اليمنية) *' : 'Phone Number *' }}
                        </label>
                        <div class="relative">
                            <input type="text" id="editUserPhone" required 
                                   class="w-full h-11 sm:h-12 {{ $isRtl ? 'pr-16 pl-4' : 'pl-16 pr-4' }} rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-black text-sm text-slate-800 dark:text-white" dir="ltr">
                            <span class="absolute top-1/2 -translate-y-1/2 {{ $isRtl ? 'right-3' : 'left-3' }} px-2 py-1 rounded-lg bg-slate-200/80 dark:bg-slate-700 text-[11px] font-black font-mono text-slate-600 dark:text-slate-300 select-none">
                                +967
                            </span>
                        </div>
                    </div>

                    {{-- البريد المؤسسي --}}
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'البريد المؤسسي الرسمي *' : 'Hospital Email *' }}
                        </label>
                        <input type="email" id="editUserEmail" required 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-bold text-sm text-slate-800 dark:text-white" dir="ltr">
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <button type="button" onclick="closeEditModal()" 
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

{{-- ══════════════════════════════════════════
     MODAL 3: DEACTIVATE CONFIRMATION (#deactivateModal - بطاقة احترافية)
══════════════════════════════════════════ --}}
<div id="deactivateModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/65 backdrop-blur-xs hidden p-4 sm:p-6 overflow-y-auto" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-3xl w-full max-w-md shadow-2xl border border-slate-100 dark:border-slate-800 overflow-hidden my-auto transform transition-all animate-in fade-in zoom-in-95 duration-200">
        
        {{-- Luxury Modal Header --}}
        <div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 100%);" class="px-6 py-5 text-white flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div id="deactivateIconBox" class="w-11 h-11 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-xs text-rose-300 flex items-center justify-center shrink-0 shadow-xs">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <div>
                    <h3 id="deactivateTitle" class="text-base font-black text-white">{{ $isRtl ? 'تأكيد تغيير حالة الحساب' : 'Account Status Action' }}</h3>
                    <p class="text-[11px] text-teal-100/90 font-medium">{{ $isRtl ? 'مستشفى الرشيد · تدقيق الصلاحيات الأمنية' : 'Security Audit Trail' }}</p>
                </div>
            </div>
            <button type="button" onclick="closeDeactivateModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-sm font-bold">✕</button>
        </div>

        <div class="p-6 space-y-4">
            <p id="deactivateDesc" class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                {{ $isRtl ? 'هل أنت متأكد من رغبتك في تعديل حالة هذا الحساب؟ سيتم تعليق وصول الموظف إلى النظام فوراً.' : 'Are you sure you want to change the operational state of this account?' }}
            </p>

            <div class="flex items-center justify-end gap-2.5 pt-4 border-t border-slate-100 dark:border-slate-800">
                <button type="button" onclick="closeDeactivateModal()" class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold hover:bg-slate-100 dark:hover:bg-slate-800 text-xs sm:text-sm transition-colors cursor-pointer">
                    {{ $isRtl ? 'تراجع' : 'Cancel' }}
                </button>
                <button type="button" id="confirmDeactivateBtn" onclick="confirmStatusToggle()" class="px-6 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-black rounded-xl text-xs sm:text-sm shadow-md transition-all cursor-pointer">
                    {{ $isRtl ? 'تأكيد الإجراء' : 'Confirm Action' }}
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     MODAL 4: CREATE NEW USER (#userModal - بطاقة إضافة احترافية وبارزة)
══════════════════════════════════════════ --}}
<div id="userModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#152C4B]/65 backdrop-blur-xs hidden p-4 sm:p-6 overflow-y-auto" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
    <div class="bg-white dark:bg-slate-900 rounded-3xl w-full max-w-2xl shadow-2xl border border-slate-100 dark:border-slate-800 overflow-hidden my-auto transform transition-all animate-in fade-in zoom-in-95 duration-200">
        
        {{-- Luxury Modal Header --}}
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
                            {{ $isRtl ? 'إضافة مستخدم جديد للنظام (مستشفى الرشيد)' : 'Create New System User & Credentials' }}
                        </h3>
                        <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-[#14AFC3]/25 border border-[#14AFC3]/40 text-teal-100">
                            {{ $isRtl ? 'تسجيل كادر فوري' : 'Instant Provisioning' }}
                        </span>
                    </div>
                    <p class="text-teal-100/90 text-xs mt-1 flex items-center gap-1.5 font-medium">
                        <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                        <span>{{ $isRtl ? 'تعيين الصلاحيات الرقمية وإصدار بطاقة الهوية السريرية' : 'Assign digital permissions and generate official pass' }}</span>
                    </p>
                </div>
            </div>
            <button type="button" onclick="closeUserModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-base font-bold">✕</button>
        </div>

        {{-- Form Body (حقول متناسقة، فسيحة، واضحة واحترافية) --}}
        <form onsubmit="handleFormSubmit(event)" class="p-6 sm:p-7 space-y-5">
            
            {{-- القسم الأول: بيانات الهوية والاسم --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'البيانات الشخصية وهوية الكادر' : 'Personal & Professional Identity' }}</span>
                </div>

                {{-- الاسم بالكامل --}}
                <div>
                    <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                        {{ $isRtl ? 'الاسم الكامل للكادر (مع اللقب) *' : 'Full Staff Name *' }}
                    </label>
                    <input type="text" id="newUserName" required 
                           placeholder="{{ $isRtl ? 'مثال: د. فيصل عبدالرحمن الشريف' : 'e.g. Dr. Faisal Al-Sharif' }}" 
                           class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white placeholder-slate-400">
                </div>

                {{-- الدور الوظيفي ورقم الهاتف --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'الدور الوظيفي والصلاحية *' : 'Assigned Role *' }}
                        </label>
                        <select id="newUserRole" class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white cursor-pointer">
                            <option value="doctor">{{ $isRtl ? 'طبيب (Doctor)' : 'Doctor' }}</option>
                            <option value="receptionist">{{ $isRtl ? 'موظف استقبال وتنويم' : 'Receptionist' }}</option>
                            <option value="admin">{{ $isRtl ? 'مدير نظام تقني (Admin)' : 'Admin' }}</option>
                            <option value="manager">{{ $isRtl ? 'مشرف عمليات وجودة' : 'Manager' }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'رقم الهاتف (الجمهورية اليمنية) *' : 'Phone Number *' }}
                        </label>
                        <div class="relative">
                            <input type="text" id="newUserPhone" required 
                                   placeholder="771234567" 
                                   class="w-full h-11 sm:h-12 {{ $isRtl ? 'pr-16 pl-4' : 'pl-16 pr-4' }} rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-black text-sm text-slate-800 dark:text-white placeholder-slate-400" dir="ltr">
                            <span class="absolute top-1/2 -translate-y-1/2 {{ $isRtl ? 'right-3' : 'left-3' }} px-2 py-1 rounded-lg bg-slate-200/80 dark:bg-slate-700 text-[11px] font-black font-mono text-slate-600 dark:text-slate-300 select-none">
                                +967
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- القسم الثاني: القسم وموقع العمل السريري --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'القسم وموقع العمل والمناوبة' : 'Placement & Duty Information' }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'القسم الطبي / الإداري *' : 'Department *' }}
                        </label>
                        <input type="text" id="newUserDept" required 
                               placeholder="{{ $isRtl ? 'مثال: جراحة العظام والمفاصل' : 'e.g. Orthopedic Surgery' }}" 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white placeholder-slate-400">
                    </div>
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'الموقع / العيادة / الغرفة *' : 'Clinic / Room *' }}
                        </label>
                        <input type="text" id="newUserRoom" 
                               placeholder="{{ $isRtl ? 'مثال: عيادة 204 · المبنى الرئيسي' : 'e.g. Clinic 204 · Main Wing' }}" 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all text-sm font-bold text-slate-800 dark:text-white placeholder-slate-400">
                    </div>
                </div>
            </div>

            {{-- القسم الثالث: البريد المؤسسي وكلمة المرور الأولية --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 pb-1.5 border-b border-slate-100 dark:border-slate-800 text-xs font-black text-[#152C4B] dark:text-slate-200 uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3]"></span>
                    <span>{{ $isRtl ? 'الوصول الرقمي والبريد المؤسسي' : 'Digital Access & Credentials' }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'البريد المؤسسي الرسمي *' : 'Hospital Email *' }}
                        </label>
                        <input type="email" id="newUserEmail" required 
                               placeholder="user@alrasheed.ye" 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-bold text-sm text-slate-800 dark:text-white placeholder-slate-400" dir="ltr">
                    </div>
                    <div>
                        <label class="block font-black text-slate-700 dark:text-slate-300 mb-1.5 text-xs">
                            {{ $isRtl ? 'كلمة المرور المؤقتة *' : 'Temporary Password *' }}
                        </label>
                        <input type="text" value="Rasheed#2026" 
                               class="w-full h-11 sm:h-12 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-slate-800/80 outline-none focus:bg-white dark:focus:bg-slate-900 focus:border-[#14AFC3] focus:ring-4 focus:ring-[#14AFC3]/15 transition-all font-mono font-black text-sm text-[#14AFC3]" dir="ltr">
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <button type="button" onclick="closeUserModal()" 
                        class="px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer text-xs sm:text-sm">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="submit" 
                        class="px-7 py-2.5 rounded-xl bg-gradient-to-r from-[#14AFC3] to-[#0C6B78] hover:from-[#0C6B78] hover:to-[#152C4B] text-white font-black text-xs sm:text-sm transition-all shadow-md shadow-[#0C6B78]/25 hover:scale-101 active:scale-98 cursor-pointer flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>{{ $isRtl ? 'إنشاء وتعيين الصلاحيات' : 'Create & Provision' }}</span>
                </button>
            </div>
        </form>
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
     CORE INTERACTIVE & REAL PRINT ENGINE JAVASCRIPT
══════════════════════════════════════════ --}}
<script>
    let activeRole = 'all';
    let targetRowForAction = null;
    let currentUserForPrint = null;

    // Filter by Role Tabs
    function setRoleFilter(role, btn) {
        activeRole = role;
        document.querySelectorAll('.role-tab').forEach(el => {
            el.classList.remove('active', 'bg-[#14AFC3]', 'text-white', 'shadow-xs');
            el.classList.add('bg-slate-50', 'text-slate-600', 'dark:bg-slate-800', 'dark:text-slate-300');
            const badge = el.querySelector('.tab-badge');
            if(badge) {
                badge.className = 'tab-badge bg-white dark:bg-slate-700 text-slate-500 dark:text-slate-300 text-[10px] px-1.5 py-0.5 rounded-md font-mono border border-slate-200/60 dark:border-slate-600';
            }
        });

        btn.classList.add('active', 'bg-[#14AFC3]', 'text-white', 'shadow-xs');
        btn.classList.remove('bg-slate-50', 'text-slate-600', 'dark:bg-slate-800', 'dark:text-slate-300');
        const activeBadge = btn.querySelector('.tab-badge');
        if(activeBadge) {
            activeBadge.className = 'tab-badge bg-white/20 text-white text-[10px] px-1.5 py-0.5 rounded-md font-mono font-bold';
        }

        applyFilters();
    }

    // Apply Live Search & Filters
    function applyFilters() {
        const query = document.getElementById('userSearchInput').value.toLowerCase().trim();
        const status = document.getElementById('statusFilter').value;
        const rows = document.querySelectorAll('.user-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const name = (row.dataset.name || '').toLowerCase();
            const nameEn = (row.dataset.nameEn || '').toLowerCase();
            const email = (row.dataset.email || '').toLowerCase();
            const role = row.dataset.role || '';
            const userId = (row.dataset.id || '').toLowerCase();
            const dept = (row.dataset.dept || '').toLowerCase();
            const phone = (row.dataset.phone || '').toLowerCase();
            const rowStatus = row.dataset.status || '';

            let matchesRole = false;
            if (activeRole === 'all') {
                matchesRole = true;
            } else if (activeRole === 'management') {
                matchesRole = (role === 'admin' || role === 'manager');
            } else {
                matchesRole = (role === activeRole);
            }

            const matchesStatus = (status === 'all' || rowStatus === status);
            const matchesQuery = (!query || name.includes(query) || nameEn.includes(query) || email.includes(query) || userId.includes(query) || dept.includes(query) || phone.includes(query));

            if (matchesRole && matchesStatus && matchesQuery) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('filteredCount').innerText = visibleCount;
    }

    // Populate Print Template with Dynamic User Data for Al-Rasheed Hospital
    function populatePrintTemplate(user) {
        document.getElementById('printStaffName').innerText = user.name;
        document.getElementById('printStaffTitle').innerText = user.title || user.roleLabel || user.role;
        document.getElementById('printStaffId').innerText = user.id;
        document.getElementById('printStaffDept').innerText = user.dept;
        document.getElementById('printStaffRoom').innerText = user.room;
        document.getElementById('printStaffShift').innerText = user.shift;
        document.getElementById('printStaffClearance').innerText = user.clearance || 'Level 3 Standard';
        document.getElementById('printStaffEmail').innerText = user.email;
        document.getElementById('printStaffPhone').innerText = user.phoneFull || ('+967 ' + user.phone);
        document.getElementById('printDocRef').innerText = 'RSD-CRD-' + user.id.replace('-', '');
        document.getElementById('printBarcodeText').innerText = '*RSD-' + user.id + '-SEC*';
        
        // Avatar initials
        const avatarBox = document.getElementById('printAvatarBox');
        if (user.initials) {
            avatarBox.innerText = user.initials;
        } else {
            const cleanName = user.name.replace(/^(د\.|م\.|أ\.)\s*/, '').trim();
            const parts = cleanName.split(' ');
            if (parts.length >= 2) {
                avatarBox.innerText = (user.name.startsWith('د.') ? 'د.' : '') + parts[0][0] + '.' + parts[1][0];
            } else {
                avatarBox.innerText = user.name.substring(0, 2);
            }
        }
    }

    // Ensure printable element is directly in body for reliable printing
    window.onbeforeprint = function() {
        const badge = document.getElementById('printableStaffBadge');
        if (badge && badge.parentElement !== document.body) {
            document.body.appendChild(badge);
        }
    };

    // 1. Quick Print Directly From Table Row
    function quickPrintCard(btn) {
        const row = btn.closest('tr');
        if(!row) return;

        const userData = {
            name: row.dataset.name,
            nameEn: row.dataset.nameEn,
            id: row.dataset.id,
            role: row.dataset.role,
            roleLabel: row.dataset.roleLabel,
            title: row.dataset.title,
            dept: row.dataset.dept,
            room: row.dataset.room,
            shift: row.dataset.shift,
            clearance: row.dataset.clearance,
            email: row.dataset.email,
            phone: row.dataset.phone,
            phoneFull: row.dataset.phoneFull || ('+967 ' + row.dataset.phone),
            initials: row.dataset.initials,
            status: row.dataset.status
        };

        populatePrintTemplate(userData);
        showToast("{{ $isRtl ? 'جاري فتح نافذة الطباعة لبطاقة وتصريح الموظف المعتمد (مستشفى الرشيد - صنعاء)...' : 'Initiating Al-Rasheed Hospital credential print layout...' }}");
        setTimeout(() => {
            window.print();
        }, 300);
    }

    // 2. View User Modal Logic (The Luxury Eye Modal - الصورة الثانية)
    function viewUser(el) {
        const row = el.closest('tr');
        if(!row) return;

        currentUserForPrint = {
            name: row.dataset.name,
            nameEn: row.dataset.nameEn,
            id: row.dataset.id,
            role: row.dataset.role,
            roleLabel: row.dataset.roleLabel,
            title: row.dataset.title,
            dept: row.dataset.dept,
            room: row.dataset.room,
            shift: row.dataset.shift,
            clearance: row.dataset.clearance,
            email: row.dataset.email,
            phone: row.dataset.phone,
            phoneFull: row.dataset.phoneFull || ('+967 ' + row.dataset.phone),
            initials: row.dataset.initials,
            status: row.dataset.status
        };

        document.getElementById('viewUserName').innerText = currentUserForPrint.name;
        document.getElementById('viewUserIdBadge').innerText = currentUserForPrint.id;
        document.getElementById('viewUserTitle').innerText = currentUserForPrint.title || currentUserForPrint.roleLabel;
        document.getElementById('viewUserDept').innerText = currentUserForPrint.dept;
        document.getElementById('viewUserRoom').innerText = currentUserForPrint.room;
        document.getElementById('viewUserShift').innerText = currentUserForPrint.shift;
        document.getElementById('viewUserClearance').innerText = currentUserForPrint.clearance;
        document.getElementById('viewUserEmail').innerText = currentUserForPrint.email;
        document.getElementById('viewUserPhone').innerText = currentUserForPrint.phoneFull;
        document.getElementById('viewAccessCode').innerText = 'RSD-' + currentUserForPrint.id.replace('-', '') + '-SEC';

        // Avatar Initials
        document.getElementById('viewUserAvatar').innerText = currentUserForPrint.initials || currentUserForPrint.name.substring(0, 2);

        // Role badge styling
        document.getElementById('viewUserRoleText').innerText = currentUserForPrint.roleLabel || currentUserForPrint.role;

        // Status badge styling
        const isInactive = currentUserForPrint.status === 'inactive';
        const badge = document.getElementById('viewUserStatusBadge');
        const badgeText = document.getElementById('viewUserStatusText');
        if(isInactive) {
            badge.className = 'inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-rose-50 text-rose-700 dark:bg-rose-950/40 dark:text-rose-300 border border-rose-200';
            badge.querySelector('span:first-child').className = 'w-1.5 h-1.5 rounded-full bg-rose-500';
            badgeText.innerText = "{{ $isRtl ? 'معطل' : 'Inactive' }}";
        } else {
            badge.className = 'inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10.5px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200';
            badge.querySelector('span:first-child').className = 'w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse';
            badgeText.innerText = "{{ $isRtl ? 'نشط' : 'Active' }}";
        }

        document.getElementById('viewUserModal').classList.remove('hidden');
    }

    function closeViewModal() {
        document.getElementById('viewUserModal').classList.add('hidden');
    }

    function printCardFromModal() {
        if(!currentUserForPrint) return;
        populatePrintTemplate(currentUserForPrint);
        closeViewModal();
        showToast("{{ $isRtl ? 'جاري تجهيز وطباعة بطاقة وتصريح الموظف المعتمد (مستشفى الرشيد - صنعاء)...' : 'Opening print preview...' }}");
        setTimeout(() => {
            window.print();
        }, 300);
    }

    function copyUserPhone() {
        const phone = document.getElementById('viewUserPhone').innerText;
        navigator.clipboard.writeText(phone);
        showToast("{{ $isRtl ? 'تم نسخ رقم الهاتف إلى الحافظة.' : 'Phone number copied!' }}");
    }

    function copyUserEmail() {
        const email = document.getElementById('viewUserEmail').innerText;
        navigator.clipboard.writeText(email);
        showToast("{{ $isRtl ? 'تم نسخ البريد الإلكتروني إلى الحافظة.' : 'Email address copied!' }}");
    }

    function copyAccessCode() {
        const code = document.getElementById('viewAccessCode').innerText;
        navigator.clipboard.writeText(code);
        const btnText = document.getElementById('copyBtnText');
        btnText.innerText = "{{ $isRtl ? 'تم النسخ!' : 'Copied!' }}";
        setTimeout(() => {
            btnText.innerText = "{{ $isRtl ? 'نسخ' : 'Copy' }}";
        }, 1800);
        showToast("{{ $isRtl ? 'تم نسخ رمز الدخول المعتمد إلى الحافظة.' : 'Access key copied to clipboard.' }}");
    }

    // 3. Edit User Modal Logic
    function openEditModal(btn) {
        targetRowForAction = btn.closest('tr');
        if(!targetRowForAction) return;

        document.getElementById('editUserName').value = targetRowForAction.dataset.name;
        document.getElementById('editUserEmail').value = targetRowForAction.dataset.email;
        document.getElementById('editUserPhone').value = targetRowForAction.dataset.phone;
        document.getElementById('editUserRole').value = targetRowForAction.dataset.role;
        document.getElementById('editUserDept').value = targetRowForAction.dataset.dept;
        document.getElementById('editUserRoom').value = targetRowForAction.dataset.room;
        document.getElementById('editUserStatus').value = targetRowForAction.dataset.status;

        document.getElementById('editUserModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editUserModal').classList.add('hidden');
        targetRowForAction = null;
    }

    function handleEditFormSubmit(e) {
        e.preventDefault();
        if(!targetRowForAction) return;

        const newName = document.getElementById('editUserName').value;
        const newEmail = document.getElementById('editUserEmail').value;
        const newDept = document.getElementById('editUserDept').value;
        const newStatus = document.getElementById('editUserStatus').value;

        targetRowForAction.dataset.name = newName;
        targetRowForAction.dataset.email = newEmail;
        targetRowForAction.dataset.dept = newDept;
        targetRowForAction.dataset.status = newStatus;

        // Update DOM cells
        const nameEl = targetRowForAction.querySelector('.user-row span.truncate, td:first-child .truncate');
        if(nameEl) nameEl.innerText = newName;

        closeEditModal();
        showToast("{{ $isRtl ? 'تم حفظ وتحديث بيانات المستخدم بنجاح.' : 'User details updated successfully.' }}");
    }

    // 4. Deactivate / Toggle Status Logic
    function openDeactivateModal(btn) {
        targetRowForAction = btn.closest('tr');
        if(!targetRowForAction) return;

        const currentStatus = targetRowForAction.dataset.status;
        const name = targetRowForAction.dataset.name;
        const title = document.getElementById('deactivateTitle');
        const desc = document.getElementById('deactivateDesc');
        const btnConfirm = document.getElementById('confirmDeactivateBtn');
        const iconBox = document.getElementById('deactivateIconBox');

        if(currentStatus === 'active') {
            title.innerText = "{{ $isRtl ? 'تأكيد تعطيل الحساب' : 'Deactivate User Account' }}";
            desc.innerText = "{{ $isRtl ? 'هل أنت متأكد من تعطيل حساب ' : 'Are you sure you want to deactivate ' }}" + name + "{{ $isRtl ? '؟ سيتم إيقاف صلاحيات الدخول فوراً.' : '? Access privileges will be suspended.' }}";
            btnConfirm.innerText = "{{ $isRtl ? 'تأكيد التعطيل' : 'Confirm Deactivation' }}";
            btnConfirm.className = "px-6 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-black rounded-xl text-xs sm:text-sm shadow-md transition-all cursor-pointer";
            iconBox.className = "w-11 h-11 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-xs text-rose-300 flex items-center justify-center shrink-0 shadow-xs";
        } else {
            title.innerText = "{{ $isRtl ? 'تأكيد تفعيل الحساب' : 'Reactivate User Account' }}";
            desc.innerText = "{{ $isRtl ? 'هل أنت متأكد من إعادة تفعيل حساب ' : 'Are you sure you want to reactivate ' }}" + name + "{{ $isRtl ? '؟ ستتم استعادة جميع صلاحياته فوراً.' : '? All privileges will be restored.' }}";
            btnConfirm.innerText = "{{ $isRtl ? 'تأكيد التفعيل' : 'Confirm Activation' }}";
            btnConfirm.className = "px-6 py-2.5 bg-[#14AFC3] hover:bg-[#0C6B78] text-white font-black rounded-xl text-xs sm:text-sm shadow-md transition-all cursor-pointer";
            iconBox.className = "w-11 h-11 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-xs text-emerald-300 flex items-center justify-center shrink-0 shadow-xs";
        }

        document.getElementById('deactivateModal').classList.remove('hidden');
    }

    function closeDeactivateModal() {
        document.getElementById('deactivateModal').classList.add('hidden');
        targetRowForAction = null;
    }

    function confirmStatusToggle() {
        if(!targetRowForAction) return;

        const currentStatus = targetRowForAction.dataset.status;
        const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
        targetRowForAction.dataset.status = newStatus;

        const statusBadge = targetRowForAction.querySelector('.status-badge');
        if(statusBadge) {
            if(newStatus === 'active') {
                statusBadge.className = 'status-badge inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-300 border border-emerald-200/60';
                statusBadge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>' + "<span>{{ $isRtl ? 'نشط' : 'Active' }}</span>";
                targetRowForAction.classList.remove('opacity-75');
            } else {
                statusBadge.className = 'status-badge inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 dark:bg-rose-950/40 dark:text-rose-300 border border-rose-200';
                statusBadge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>' + "<span>{{ $isRtl ? 'معطل' : 'Inactive' }}</span>";
                targetRowForAction.classList.add('opacity-75');
            }
        }

        closeDeactivateModal();
        showToast(newStatus === 'active' 
            ? "{{ $isRtl ? 'تمت استعادة وتفعيل حساب المستخدم بنجاح.' : 'Account reactivated successfully.' }}" 
            : "{{ $isRtl ? 'تم تعطيل حساب المستخدم بنجاح.' : 'Account deactivated successfully.' }}"
        );
    }

    // 5. Add User Modal Logic
    function openUserModal() {
        document.getElementById('userModal').classList.remove('hidden');
    }

    function closeUserModal() {
        document.getElementById('userModal').classList.add('hidden');
    }

    function handleFormSubmit(e) {
        e.preventDefault();
        closeUserModal();
        showToast("{{ $isRtl ? 'تم إنشاء وتعيين بيانات اعتماد المستخدم بنجاح.' : 'User created and provisioned successfully.' }}");
    }

    // 6. Print Full Directory Roster Report
    function triggerExport() {
        showToast("{{ $isRtl ? 'جاري تجهيز تقرير دليل الكوادر والمستخدمين للطباعة...' : 'Preparing full staff registry report for print...' }}");
        setTimeout(() => {
            window.print();
        }, 300);
    }

    // Toast Engine
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
