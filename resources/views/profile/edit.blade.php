@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';
    $user = Auth::user() ?? ($user ?? null);
    $role = strtolower($user->role ?? 'staff');

    // تحديد المسمى المهني والقسم حسب دور المستخدم المسجل
    $roleLabels = [
        'admin'         => $isRtl ? 'الإدارة العامة والنظام' : 'Hospital Administration',
        'administrator' => $isRtl ? 'الإدارة العامة والنظام' : 'Hospital Administration',
        'manager'       => $isRtl ? 'إدارة العمليات والتشغيل' : 'Hospital Operations',
        'doctor'        => $isRtl ? 'العيادة السريرية' : 'Clinical Practice',
        'receptionist'  => $isRtl ? 'خدمات المرضى والاستقبال' : 'Front Desk Reception',
    ];
    $roleLabel = $roleLabels[$role] ?? ($isRtl ? 'كادر المستشفى' : 'Hospital Staff');

    $roleBadges = [
        'admin'         => ['bg' => 'bg-purple-50 text-purple-700 border-purple-200/80', 'label' => $isRtl ? 'مدير النظام' : 'System Admin'],
        'administrator' => ['bg' => 'bg-purple-50 text-purple-700 border-purple-200/80', 'label' => $isRtl ? 'مدير النظام' : 'System Admin'],
        'manager'       => ['bg' => 'bg-indigo-50 text-indigo-700 border-indigo-200/80', 'label' => $isRtl ? 'مدير العمليات' : 'Hospital Manager'],
        'doctor'        => ['bg' => 'bg-teal-50 text-teal-700 border-teal-200/80', 'label' => $isRtl ? 'طبيب سريري' : 'Clinical Doctor'],
        'receptionist'  => ['bg' => 'bg-sky-50 text-sky-700 border-sky-200/80', 'label' => $isRtl ? 'موظف استقبال' : 'Receptionist'],
    ];
    $roleBadge = $roleBadges[$role] ?? ['bg' => 'bg-slate-50 text-slate-700 border-slate-200', 'label' => ucfirst($role)];

    // رابط العودة للوحة القيادة الخاصة بدور المستخدم (لزر الإلغاء في أسفل النموذج فقط)
    $dashboardUrl = match($role) {
        'admin', 'administrator' => Route::has('admin.dashboard') ? route('admin.dashboard') : url('/dashboard'),
        'manager'                => Route::has('manager.dashboard') ? route('manager.dashboard') : url('/dashboard'),
        'doctor'                 => Route::has('doctor.dashboard') ? route('doctor.dashboard') : url('/dashboard'),
        'receptionist'           => Route::has('receptionist.dashboard') ? route('receptionist.dashboard') : url('/dashboard'),
        default                  => url('/dashboard'),
    };
@endphp

@section('page-title', $isRtl ? 'إعدادات الحساب والأمان' : 'Account & Security Settings')
@section('role-label', $roleLabel)

{{-- ══════════════════════════════════════════════════════════════════
     القائمة الجانبية الديناميكية حسب رتبة وواجهة المستخدم المسجل
     ══════════════════════════════════════════════════════════════════ --}}
@section('sidebar-links')

    @if(in_array($role, ['admin', 'administrator']))
        {{-- قائمة مدير النظام (Admin) --}}
        <x-sidebar-link :href="Route::has('admin.dashboard') ? route('admin.dashboard') : '#'" :active="request()->routeIs('admin.dashboard')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                        <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'لوحة القيادة' : __('Dashboard') }}
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
            {{ $isRtl ? 'إدارة المستخدمين' : __('Users') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('admin.doctors.index') ? route('admin.doctors.index') : '#'" :active="request()->routeIs('admin.doctors.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'الأطباء والكادر' : __('Doctors') }}
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
            {{ $isRtl ? 'المواعيد والحجوزات' : __('Appointments') }}
        </x-sidebar-link>

        <div class="px-4 mt-6 mb-2 flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
            <span class="text-[10px] font-black tracking-widest text-white/50 uppercase font-mono">
                {{ $isRtl ? 'قوائم أخرى' : __('Other Menu') }}
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
            {{ $isRtl ? 'التقارير الإحصائية' : __('Reports') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('admin.notifications.index') ? route('admin.notifications.index') : '#'" :active="request()->routeIs('admin.notifications.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'الإشعارات والتعميمات' : __('Notifications') }}
        </x-sidebar-link>

    @elseif($role === 'manager')
        {{-- قائمة مدير المستشفى والتشغيل (Manager) --}}
        <x-sidebar-link :href="Route::has('manager.dashboard') ? route('manager.dashboard') : '#'" :active="request()->routeIs('manager.dashboard')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                        <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'لوحة القيادة التشغيلية' : __('Dashboard') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('manager.departments.index') ? route('manager.departments.index') : '#'" :active="request()->routeIs('manager.departments.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 21h18"/><path d="M5 21V7l8-4 8 4v14"/><path d="M9 21v-6h6v6"/>
                        <path d="M9 11h.01M15 11h.01M9 15h.01M15 15h.01"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'أعباء الأقسام والأسرة' : __('Departments Workload') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('manager.waiting-time.index') ? route('manager.waiting-time.index') : '#'" :active="request()->routeIs('manager.waiting-time.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'مؤشرات أوقات الانتظار' : __('Waiting Times') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('manager.reports.index') ? route('manager.reports.index') : '#'" :active="request()->routeIs('manager.reports.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 3v18h18"/><path d="M18.7 8 13 13.7l-4-4L3 16"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'التقارير والمؤشرات' : __('Reports & Analytics') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('manager.staff.index') ? route('manager.staff.index') : '#'" :active="request()->routeIs('manager.staff.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'دليل الكادر والمناوبات' : __('Staff & Duty') }}
        </x-sidebar-link>

    @elseif($role === 'doctor')
        {{-- قائمة الطبيب (Doctor) --}}
        <x-sidebar-link :href="Route::has('doctor.dashboard') ? route('doctor.dashboard') : '#'" :active="request()->routeIs('doctor.dashboard')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                        <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'لوحة التحكم السريرية' : __('Dashboard') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('doctor.schedule.index') ? route('doctor.schedule.index') : '#'" :active="request()->routeIs('doctor.schedule.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'جدول العيادة والمواعيد' : __('My Schedule') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('doctor.patients.index') ? route('doctor.patients.index') : '#'" :active="request()->routeIs('doctor.patients.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'قائمة المرضى' : __('My Patients') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('doctor.notes.index') ? route('doctor.notes.index') : '#'" :active="request()->routeIs('doctor.notes.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2Z"/>
                        <path d="M9 13h6M9 17h6"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'الملاحظات والتقارير' : __('Medical Notes') }}
        </x-sidebar-link>

    @elseif($role === 'receptionist')
        {{-- قائمة موظف الاستقبال (Receptionist) --}}
        <x-sidebar-link :href="Route::has('receptionist.dashboard') ? route('receptionist.dashboard') : '#'" :active="request()->routeIs('receptionist.dashboard')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                        <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'لوحة التحكم' : __('Dashboard') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('receptionist.patients.index') ? route('receptionist.patients.index') : '#'" :active="request()->routeIs('receptionist.patients.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'سجل المرضى والملفات' : __('Patients Registry') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('receptionist.appointments.index') ? route('receptionist.appointments.index') : '#'" :active="request()->routeIs('receptionist.appointments.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'جدول المواعيد والحجوزات' : __('Appointments') }}
        </x-sidebar-link>

        <x-sidebar-link :href="Route::has('receptionist.queue.index') ? route('receptionist.queue.index') : '#'" :active="request()->routeIs('receptionist.queue.*')">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 12h18M3 6h18M3 18h12"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'طابور الانتظار المباشر' : __('Live Queue') }}
        </x-sidebar-link>

    @else
        {{-- قائمة عامة لكافة المستخدمين الآخرين --}}
        <x-sidebar-link :href="url('/dashboard')" :active="false">
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
    @endif

    {{-- رابط إعدادات الحساب (نشط دائماً في هذه الصفحة لجميع الأدوار) --}}
    <div class="pt-3.5 mt-3.5 border-t border-white/10">
        <x-sidebar-link :href="Route::has('profile.edit') ? route('profile.edit') : '#'" :active="true">
            <x-slot:icon>
                <div class="w-5 h-5 flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1 2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06-.06a1.65 1.65 0 0 0-.33 1.82V9c.36.24.7.53 1 .87"/>
                    </svg>
                </div>
            </x-slot:icon>
            {{ $isRtl ? 'إعدادات الحساب' : __('Account Settings') }}
        </x-sidebar-link>
    </div>

@endsection


{{-- ══════════════════════════════════════════════════════════════════
     محتوى الصفحة الرئيسي
     ══════════════════════════════════════════════════════════════════ --}}
@section('content')
<div class="-mt-4 sm:-mt-6 space-y-6 pb-12 font-sans" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

    {{-- نافذة الإشعار التفاعلية العائمة --}}
    <div id="liveActionToast" class="fixed top-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 transform -translate-y-16 opacity-0 transition-all duration-300 pointer-events-none">
        <div class="bg-[#152C4B] text-white px-4 py-2.5 rounded-xl shadow-xl border border-[#14AFC3]/30 flex items-center gap-2.5 text-xs">
            <div class="w-6 h-6 rounded-full bg-[#14AFC3]/20 flex items-center justify-center text-[#14AFC3] flex-shrink-0">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <span id="liveActionToastMsg" class="font-medium">{{ $isRtl ? 'تم الحفظ بنجاح' : 'Action saved successfully' }}</span>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         رسائل التنبيه والإشعارات (Flash Status & Errors)
         ══════════════════════════════════════════ --}}
    @if(session('status'))
        <div class="flex items-center gap-3 p-4 rounded-2xl border text-sm font-bold shadow-sm animate-fade-in"
             style="background: #E5FAFC; color: #0C6B78; border-color: rgba(20,175,195,0.3);">
            <div class="w-8 h-8 rounded-xl bg-[#14AFC3] text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                </svg>
            </div>
            <div>
                <p class="font-black text-[13px] text-[#0C6B78]">{{ $isRtl ? 'تم الحفظ بنجاح' : 'Success' }}</p>
                <p class="text-xs font-semibold opacity-90">{{ session('status') }}</p>
            </div>
        </div>
    @endif

    @if(isset($errors) && $errors->any())
        <div class="flex items-center gap-3 p-4 rounded-2xl border text-sm font-bold shadow-sm bg-rose-50 border-rose-200 text-rose-800 animate-fade-in">
            <div class="w-8 h-8 rounded-xl bg-rose-600 text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01"/>
                </svg>
            </div>
            <div>
                <p class="font-black text-[13px] text-rose-900">{{ $isRtl ? 'يرجى مراجعة البيانات المدخلة' : 'Validation Error' }}</p>
                <p class="text-xs font-semibold text-rose-700">{{ $errors->first() }}</p>
            </div>
        </div>
    @endif

    {{-- ══════════════════════════════════════════════════════════════
         الحاوية الرئيسية المتكاملة (مطابقة تماماً للنموذج المرجعي)
         ══════════════════════════════════════════════════════════════ --}}
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        
        {{-- غلاف الهيدر العلوي الملون (Cover Banner) --}}
        <div class="h-44 sm:h-52 bg-gradient-to-r from-[#152C4B] via-[#0C6B78] to-[#14AFC3] relative p-6 flex items-start justify-between">
            {{-- زخرفة هندسية ضوئية ناعمة --}}
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px] pointer-events-none"></div>
            <div class="absolute -top-12 -left-12 w-48 h-48 rounded-full bg-white/10 blur-xl pointer-events-none"></div>

            <div class="relative z-10 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#14AFC3] animate-pulse"></span>
                <span class="text-xs font-bold text-teal-100 uppercase tracking-widest font-mono">
                    {{ $isRtl ? 'بوابة الكادر الطبي المعتمدة' : 'Staff EHR Portal' }}
                </span>
            </div>

            <div class="relative z-10">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-white/15 backdrop-blur-md text-white text-xs font-bold border border-white/20 shadow-xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    <span>{{ $isRtl ? 'جلسة مشفرة وآمنة' : 'TLS Encrypted' }}</span>
                </span>
            </div>
        </div>

        {{-- شبكة المحتوى المتراكبة مع الغلاف --}}
        <div class="px-5 sm:px-8 pb-8 -mt-20 relative z-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                {{-- ── العمود الجانبي (بطاقة الهوية والملف الشخصي) lg:col-span-4 ── --}}
                <div class="lg:col-span-4 space-y-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 text-center">
                        {{-- الصورة الرمزية مع زر التعديل الدائري --}}
                        <div class="relative inline-block mx-auto mb-3">
                            <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-4 border-white shadow-md mx-auto flex items-center justify-center text-3xl font-black text-white bg-gradient-to-br from-[#14AFC3] via-[#0C6B78] to-[#152C4B]">
                                {{ strtoupper(mb_substr($user->name ?? 'U', 0, 1, 'UTF-8')) }}
                            </div>
                            <button type="button"
                                    onclick="showNotificationToast('{{ $isRtl ? 'الصورة الرمزية تعتمد تلقائياً من نظام الموارد البشرية' : 'Avatar is managed by HR records' }}')"
                                    class="absolute bottom-0 {{ $isRtl ? 'left-1' : 'right-1' }} w-8 h-8 rounded-full bg-[#14AFC3] text-white flex items-center justify-center shadow-md border-2 border-white hover:bg-[#0C6B78] transition-colors cursor-pointer"
                                    title="{{ $isRtl ? 'تعديل الصورة الشخصية' : 'Update Profile Photo' }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </button>
                        </div>

                        {{-- الاسم والرتبة --}}
                        <h2 class="text-base sm:text-lg font-black text-[#152C4B] leading-tight">
                            {{ $user->name ?? 'Staff User' }}
                        </h2>
                        <p class="text-xs text-slate-400 font-medium mt-1">
                            {{ $roleLabel }} · {{ $isRtl ? 'مستشفى الرشيد التخصصي' : 'Al-Rasheed Hospital' }}
                        </p>

                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold border {{ $roleBadge['bg'] }} mt-2.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                            <span>{{ $roleBadge['label'] }}</span>
                        </div>

                        {{-- صفوف البيانات الأفقية المتناسقة 1:1 مع النموذج المرجعي --}}
                        <div class="divide-y divide-slate-100 text-xs border-y border-slate-100 my-5 text-start">
                            <div class="py-2.5 flex items-center justify-between">
                                <span class="text-slate-500 font-medium">{{ $isRtl ? 'الرقم الوظيفي' : 'Employee ID' }}</span>
                                <span class="font-mono font-bold text-[#0C6B78] bg-[#E5FAFC] px-2 py-0.5 rounded border border-[#14AFC3]/20">
                                    {{ $user->employee_id ?? ('EMP-' . str_pad($user->id ?? 1, 4, '0', STR_PAD_LEFT)) }}
                                </span>
                            </div>

                            <div class="py-2.5 flex items-center justify-between">
                                <span class="text-slate-500 font-medium">{{ $isRtl ? 'حالة الحساب' : 'Account Status' }}</span>
                                <span class="inline-flex items-center gap-1 font-bold text-emerald-600">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                    </svg>
                                    <span>{{ $isRtl ? 'معتمد ونشط' : 'Active & Verified' }}</span>
                                </span>
                            </div>

                            <div class="py-2.5 flex items-center justify-between">
                                <span class="text-slate-500 font-medium">{{ $isRtl ? 'القسم والعيادة' : 'Department' }}</span>
                                <span class="font-bold text-[#152C4B]">{{ $isRtl ? 'عيادة القلب 204' : 'Suite 204' }}</span>
                            </div>

                            <div class="py-2.5 flex items-center justify-between">
                                <span class="text-slate-500 font-medium">{{ $isRtl ? 'نوع الصلاحية' : 'Access Level' }}</span>
                                <span class="font-bold text-slate-700 truncate max-w-[140px]">{{ $roleBadge['label'] }}</span>
                            </div>
                        </div>

                        {{-- أزرار الإجراء السريع في البطاقة الشخصية --}}
                        <div class="space-y-2">
                            <a href="{{ $dashboardUrl }}"
                               class="w-full inline-flex items-center justify-center gap-2 py-2 px-4 rounded-xl border border-slate-200 text-xs font-bold text-[#152C4B] hover:bg-[#E5FAFC] hover:text-[#0C6B78] hover:border-[#14AFC3]/40 transition-all shadow-2xs">
                                <svg class="w-4 h-4 text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                                    <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
                                </svg>
                                <span>{{ $isRtl ? 'العودة للوحة القيادة' : 'Return to Dashboard' }}</span>
                            </a>

                            {{-- شريط نسخ البريد الإلكتروني --}}
                            <div class="flex items-center justify-between p-2 rounded-xl bg-slate-50 border border-slate-100 text-xs text-slate-500 font-mono">
                                <span class="truncate text-[11px]">{{ $user->email ?? 'staff@mawidi.local' }}</span>
                                <button type="button"
                                        onclick="navigator.clipboard.writeText('{{ $user->email ?? '' }}'); showNotificationToast('{{ $isRtl ? 'تم نسخ البريد الإلكتروني' : 'Email copied' }}')"
                                        class="p-1 hover:text-[#0C6B78] transition-colors cursor-pointer"
                                        title="{{ $isRtl ? 'نسخ البريد' : 'Copy Email' }}">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── العمود الرئيسي (بطاقة النموذج والتبويبات المدمجة) lg:col-span-8 ── --}}
                <div class="lg:col-span-8">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

                        {{-- شريط التبويبات العلوي مطابق تماماً للصورة المرجعية --}}
                        <div class="flex items-center gap-6 px-6 sm:px-8 border-b border-slate-100 overflow-x-auto scrollbar-none bg-white">
                            <button type="button"
                                    id="tabBtnAccount"
                                    onclick="switchProfileTab('account')"
                                    class="profile-nav-tab py-4 text-xs font-bold text-[#0C6B78] border-b-2 border-[#0C6B78] transition-all cursor-pointer whitespace-nowrap flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#14AFC3]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>{{ $isRtl ? 'إعدادات الحساب' : 'Account Settings' }}</span>
                            </button>

                            <button type="button"
                                    id="tabBtnSecurity"
                                    onclick="switchProfileTab('security')"
                                    class="profile-nav-tab py-4 text-xs font-bold text-slate-400 hover:text-[#152C4B] border-b-2 border-transparent transition-all cursor-pointer whitespace-nowrap flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span>{{ $isRtl ? 'الأمان وتغيير كلمة المرور' : 'Security & Password' }}</span>
                            </button>

                            <button type="button"
                                    id="tabBtnCompliance"
                                    onclick="switchProfileTab('compliance')"
                                    class="profile-nav-tab py-4 text-xs font-bold text-slate-400 hover:text-[#152C4B] border-b-2 border-transparent transition-all cursor-pointer whitespace-nowrap flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <span>{{ $isRtl ? 'سياسات الأمان والاعتماد' : 'Security Policies' }}</span>
                            </button>
                        </div>

                        {{-- النموذج المشترك لتحديث الحساب --}}
                        <form method="POST" action="{{ route('profile.update') }}" class="p-6 sm:p-8 space-y-6">
                            @csrf
                            @method('PATCH')

                            {{-- ── Panel 1: إعدادات الحساب (شبكة حقول ملمومة 2-Columns) ── --}}
                            <div id="panelAccount" class="space-y-5">
                                <div>
                                    <h3 class="font-bold text-sm text-[#152C4B]">
                                        {{ $isRtl ? 'المعلومات الشخصية والوظيفية' : 'Personal & Professional Details' }}
                                    </h3>
                                    <p class="text-xs text-slate-400 mt-0.5">
                                        {{ $isRtl ? 'الاسم الرسمي وبيانات الدخول المعتمدة في التقارير الطبية.' : 'Official name and credentials appearing on clinical records.' }}
                                    </p>
                                </div>

                                {{-- شبكة الحقول المتناسقة (عمودين متوازنين دون تمدد غير منطقي) --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                                    {{-- 1. الاسم الكامل المعتمد --}}
                                    <div>
                                        <label for="name" class="block text-xs font-bold text-[#152C4B] mb-1.5">
                                            <span>{{ $isRtl ? 'الاسم الكامل المعتمد' : 'Official Full Name' }}</span>
                                            <span class="text-[#14AFC3]">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3.5' : 'left-0 pl-3.5' }} flex items-center pointer-events-none text-slate-400">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                            </div>
                                            <input id="name"
                                                   type="text"
                                                   name="name"
                                                   value="{{ old('name', $user->name) }}"
                                                   required
                                                   placeholder="{{ $isRtl ? 'أدخل اسمك الرسمي الكامل' : 'Full Name' }}"
                                                   class="w-full {{ $isRtl ? 'pr-10 pl-3.5' : 'pl-10 pr-3.5' }} py-2.5 rounded-xl border border-slate-200 bg-white text-xs font-bold text-[#152C4B] focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all">
                                        </div>
                                    </div>

                                    {{-- 2. الرقم الوظيفي (للعرض فقط) --}}
                                    <div>
                                        <label class="block text-xs font-bold text-[#152C4B] mb-1.5 flex items-center justify-between">
                                            <span>{{ $isRtl ? 'الرقم الوظيفي للكادر' : 'Employee ID' }}</span>
                                            <span class="text-[10px] font-bold text-slate-400 bg-slate-100 px-1.5 py-0.2 rounded">{{ $isRtl ? 'ثابت' : 'Fixed' }}</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3.5' : 'left-0 pl-3.5' }} flex items-center pointer-events-none text-slate-400">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                                </svg>
                                            </div>
                                            <input type="text"
                                                   value="{{ $user->employee_id ?? ('EMP-' . str_pad($user->id ?? 1, 4, '0', STR_PAD_LEFT)) }}"
                                                   disabled
                                                   class="w-full {{ $isRtl ? 'pr-10 pl-3.5' : 'pl-10 pr-3.5' }} py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-xs font-mono font-bold text-slate-500 cursor-not-allowed">
                                        </div>
                                    </div>

                                    {{-- 3. البريد الإلكتروني / معرف الدخول (مقفل للأمان) --}}
                                    <div>
                                        <label class="block text-xs font-bold text-[#152C4B] mb-1.5 flex items-center justify-between">
                                            <span>{{ $isRtl ? 'معرف الدخول / البريد الإلكتروني' : 'Email Address' }}</span>
                                            <span class="text-[10px] font-bold text-slate-400 bg-slate-100 px-1.5 py-0.2 rounded">{{ $isRtl ? 'مقفل للأمان' : 'Read-only' }}</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3.5' : 'left-0 pl-3.5' }} flex items-center pointer-events-none text-slate-400">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                            <input type="text"
                                                   value="{{ $user->email ?? 'doctor@mawidi.local' }}"
                                                   disabled
                                                   class="w-full {{ $isRtl ? 'pr-10 pl-3.5' : 'pl-10 pr-3.5' }} py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-xs font-mono font-bold text-slate-500 cursor-not-allowed">
                                        </div>
                                    </div>

                                    {{-- 4. المسمى المهني والعيادة --}}
                                    <div>
                                        <label class="block text-xs font-bold text-[#152C4B] mb-1.5">
                                            <span>{{ $isRtl ? 'القسم والعيادة المخصصة' : 'Suite & Department' }}</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3.5' : 'left-0 pl-3.5' }} flex items-center pointer-events-none text-slate-400">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                </svg>
                                            </div>
                                            <input type="text"
                                                   value="{{ $roleLabel }} — {{ $isRtl ? 'عيادة القلب 204' : 'Cardiology Suite 204' }}"
                                                   disabled
                                                   class="w-full {{ $isRtl ? 'pr-10 pl-3.5' : 'pl-10 pr-3.5' }} py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-xs font-bold text-slate-600 cursor-not-allowed">
                                        </div>
                                    </div>
                                </div>

                                {{-- شريط إرشادي ذكي للتبديل نحو تبويب كلمة المرور --}}
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-xs">
                                    <div class="flex items-center gap-2 text-slate-600">
                                        <svg class="w-4 h-4 text-[#14AFC3] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                        <span class="font-medium">{{ $isRtl ? 'هل ترغب في تغيير كلمة المرور ورمز الدخول؟' : 'Need to update your access passcode?' }}</span>
                                    </div>
                                    <button type="button"
                                            onclick="switchProfileTab('security')"
                                            class="text-xs font-bold text-[#0C6B78] hover:underline self-start sm:self-auto cursor-pointer">
                                        {{ $isRtl ? 'الانتقال لقسم الأمان ←' : 'Go to Security →' }}
                                    </button>
                                </div>
                            </div>

                            {{-- ── Panel 2: الأمان وتغيير كلمة المرور (مخفي افتراضياً ويظهر عند النقر) ── --}}
                            <div id="panelSecurity" class="hidden space-y-5">
                                <div>
                                    <h3 class="font-bold text-sm text-[#152C4B]">
                                        {{ $isRtl ? 'تحديث كلمة المرور ورمز الدخول' : 'Update Password & Access Code' }}
                                    </h3>
                                    <p class="text-xs text-slate-400 mt-0.5">
                                        {{ $isRtl ? 'لتغيير كلمة المرور، أدخل الرمز الحالي ثم اكتب الرمز الجديد وتأكيده.' : 'Leave blank if you do not want to alter your password.' }}
                                    </p>
                                </div>

                                <div class="space-y-4">
                                    {{-- كلمة المرور الحالية --}}
                                    <div class="max-w-md">
                                        <label for="current_password" class="block text-xs font-bold text-[#152C4B] mb-1.5">
                                            <span>{{ $isRtl ? 'كلمة المرور الحالية' : 'Current Password' }}</span>
                                            <span class="text-slate-400 font-normal">({{ $isRtl ? 'مطلوبة فقط عند التغيير' : 'Required if changing' }})</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3.5' : 'left-0 pl-3.5' }} flex items-center pointer-events-none text-slate-400">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <rect x="3" y="11" width="18" height="11" rx="2"/><path stroke-linecap="round" d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                                </svg>
                                            </div>
                                            <input id="current_password"
                                                   type="password"
                                                   name="current_password"
                                                   autocomplete="current-password"
                                                   placeholder="••••••••"
                                                   class="w-full {{ $isRtl ? 'pr-10 pl-3.5' : 'pl-10 pr-3.5' }} py-2.5 rounded-xl border border-slate-200 bg-white text-xs font-bold text-[#152C4B] focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all font-mono">
                                        </div>
                                    </div>

                                    {{-- عمودان: كلمة المرور الجديدة وتأكيدها --}}
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                                        <div>
                                            <label for="password" class="block text-xs font-bold text-[#152C4B] mb-1.5">
                                                <span>{{ $isRtl ? 'كلمة المرور الجديدة' : 'New Password' }}</span>
                                            </label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3.5' : 'left-0 pl-3.5' }} flex items-center pointer-events-none text-slate-400">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                                    </svg>
                                                </div>
                                                <input id="password"
                                                       type="password"
                                                       name="password"
                                                       autocomplete="new-password"
                                                       placeholder="••••••••"
                                                       class="w-full {{ $isRtl ? 'pr-10 pl-3.5' : 'pl-10 pr-3.5' }} py-2.5 rounded-xl border border-slate-200 bg-white text-xs font-bold text-[#152C4B] focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all font-mono">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="password_confirmation" class="block text-xs font-bold text-[#152C4B] mb-1.5">
                                                <span>{{ $isRtl ? 'تأكيد كلمة المرور الجديدة' : 'Confirm New Password' }}</span>
                                            </label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 {{ $isRtl ? 'right-0 pr-3.5' : 'left-0 pl-3.5' }} flex items-center pointer-events-none text-slate-400">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                </div>
                                                <input id="password_confirmation"
                                                       type="password"
                                                       name="password_confirmation"
                                                       autocomplete="new-password"
                                                       placeholder="••••••••"
                                                       class="w-full {{ $isRtl ? 'pr-10 pl-3.5' : 'pl-10 pr-3.5' }} py-2.5 rounded-xl border border-slate-200 bg-white text-xs font-bold text-[#152C4B] focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/20 outline-none transition-all font-mono">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-center gap-2.5 text-xs text-slate-500 font-medium">
                                        <svg class="w-4 h-4 text-[#14AFC3] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-4m0-4h.01"/>
                                        </svg>
                                        <span>{{ $isRtl ? 'يجب أن لا تقل كلمة المرور عن 6 خانات لضمان حماية بيانات السجلات الطبية.' : 'Password must be at least 6 characters.' }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- ── Panel 3: السياسات والصلاحيات ── --}}
                            <div id="panelCompliance" class="hidden space-y-4 text-xs">
                                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-2">
                                    <h4 class="font-bold text-[#152C4B] flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                        <span>{{ $isRtl ? 'امتثال أمن بيانات المرضى (HIPAA / MOH)' : 'HIPAA Compliance' }}</span>
                                    </h4>
                                    <p class="text-slate-500 leading-relaxed">
                                        {{ $isRtl ? 'كافة عمليات الدخول وتعديل الحساب مسجلة في سجل التدقيق الأمني (Audit Trail) لضمان خصوصية المرضى وامتثال اللوائح الطبية.' : 'All account activities are recorded for regulatory audit and compliance.' }}
                                    </p>
                                </div>
                            </div>

                            {{-- ══ أزرار الحفظ المنسقة تماماً مثل النموذج المرجعي (Update Button) ══ --}}
                            <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                                <button type="submit"
                                        class="px-6 py-2.5 rounded-xl text-white text-xs font-black transition-all hover:-translate-y-0.5 active:translate-y-0 cursor-pointer shadow-sm"
                                        style="background: linear-gradient(135deg, #14AFC3 0%, #0C6B78 100%);">
                                    <span>{{ $isRtl ? 'حفظ التعديلات' : 'Update Profile' }}</span>
                                </button>

                                <a href="{{ $dashboardUrl }}"
                                   class="px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-bold text-slate-500 hover:bg-slate-50 hover:text-[#152C4B] transition-colors">
                                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                                </a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

{{-- سكريبت التبديل البسيط بين التبويبات مطابقاً للنموذج المرجعي --}}
<script>
    function switchProfileTab(tab) {
        // Panels
        document.getElementById('panelAccount')?.classList.add('hidden');
        document.getElementById('panelSecurity')?.classList.add('hidden');
        document.getElementById('panelCompliance')?.classList.add('hidden');

        // Buttons
        ['Account', 'Security', 'Compliance'].forEach(t => {
            const btn = document.getElementById('tabBtn' + t);
            if (btn) {
                btn.className = 'profile-nav-tab py-4 text-xs font-bold text-slate-400 hover:text-[#152C4B] border-b-2 border-transparent transition-all cursor-pointer whitespace-nowrap flex items-center gap-2';
            }
        });

        // Activate selected
        if (tab === 'account') {
            document.getElementById('panelAccount')?.classList.remove('hidden');
            const activeBtn = document.getElementById('tabBtnAccount');
            if (activeBtn) activeBtn.className = 'profile-nav-tab py-4 text-xs font-bold text-[#0C6B78] border-b-2 border-[#0C6B78] transition-all cursor-pointer whitespace-nowrap flex items-center gap-2';
        } else if (tab === 'security') {
            document.getElementById('panelSecurity')?.classList.remove('hidden');
            const activeBtn = document.getElementById('tabBtnSecurity');
            if (activeBtn) activeBtn.className = 'profile-nav-tab py-4 text-xs font-bold text-[#0C6B78] border-b-2 border-[#0C6B78] transition-all cursor-pointer whitespace-nowrap flex items-center gap-2';
        } else if (tab === 'compliance') {
            document.getElementById('panelCompliance')?.classList.remove('hidden');
            const activeBtn = document.getElementById('tabBtnCompliance');
            if (activeBtn) activeBtn.className = 'profile-nav-tab py-4 text-xs font-bold text-[#0C6B78] border-b-2 border-[#0C6B78] transition-all cursor-pointer whitespace-nowrap flex items-center gap-2';
        }
    }
</script>
@endsection
