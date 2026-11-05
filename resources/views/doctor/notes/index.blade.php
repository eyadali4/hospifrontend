@extends('layouts.dashboard')

@php
    $isRtl = app()->getLocale() === 'ar';

    // إحصائيات الملاحظات السريرية
    $notesStats = $notesStats ?? [
        'total_notes'     => 1248,
        'today_notes'     => 12,
        'follow_up'       => 5,
        'completed_notes' => 1231,
    ];

    // قائمة الملاحظات والتقارير الطبية مع بيانات المريض الشاملة للطباعة الرسمية
    $clinicalNotes = $clinicalNotes ?? [
        [
            'id' => 401,
            'note_number' => 'NOTE-2026-081',
            'date' => $isRtl ? 'اليوم · 08:45 ص' : 'Today · 08:45 AM',
            'full_date' => '2026-11-01 · 08:45 AM',
            'mrn' => 'MRN-88421',
            'national_id' => '1084920194',
            'patient' => $isRtl ? 'سارة فهد العتيبي' : 'Sarah Fahad Al-Otaibi',
            'gender_age' => $isRtl ? 'أنثى، 34 سنة' : 'Female, 34 yrs',
            'blood_type' => 'A+',
            'phone' => '+967 77 123 4567',
            'doctor' => $isRtl ? 'د. نزار صالح' : 'Dr. Nezar Saleh',
            'doctor_title' => $isRtl ? 'استشاري أول أمراض القلب وقسطرة الأوعية' : 'Senior Consultant Cardiologist',
            'clinic' => $isRtl ? 'عيادة أمراض القلب التخصصية (204)' : 'Cardiology Specialty Suite (204)',
            'diagnosis' => $isRtl ? 'ارتفاع ضغط الدم الشرياني (I10)' : 'Essential Hypertension (I10)',
            'clinical_note' => $isRtl ? 'تم قياس الضغط 135/85، تخطيط القلب ECG ضمن الحدود الطبيعية. تم تقديم إرشادات تقليل الصوديوم، وإجراء تحليل وظائف الكلى بعد أسبوعين.' : 'BP recorded 135/85, resting ECG within normal limits. Advised low-sodium diet and follow-up renal panel in 2 weeks.',
            'vitals' => [
                'bp' => '135/85 mmHg',
                'pulse' => '76 bpm',
                'temp' => '36.8 °C',
                'spo2' => '98%',
            ],
            'treatment_plan' => [
                ['medication' => 'Amlodipine 5mg', 'instructions' => 'قرص واحد يومياً صباحاً بعد الإفطار', 'duration' => '30 يوماً'],
                ['medication' => 'Valsartan 80mg', 'instructions' => 'قرص واحد مساءً قبل النوم', 'duration' => '30 يوماً']
            ],
            'follow_up' => $isRtl ? 'مراجعة العيادة بعد أسبوعين مع نتائج فحص وظائف الكلى والأملاح' : 'Clinic visit in 2 weeks with Renal Function Panel',
            'status' => 'completed',
            'status_label' => $isRtl ? 'معتمدة ومكتملة' : 'Signed & Completed',
        ],
        [
            'id' => 402,
            'note_number' => 'NOTE-2026-080',
            'date' => $isRtl ? 'اليوم · 09:30 ص' : 'Today · 09:30 AM',
            'full_date' => '2026-11-01 · 09:30 AM',
            'mrn' => 'MRN-88419',
            'national_id' => '1039485721',
            'patient' => $isRtl ? 'عبدالله محمد الغامدي' : 'Abdullah Mohammed Al-Ghamdi',
            'gender_age' => $isRtl ? 'ذكر، 45 سنة' : 'Male, 45 yrs',
            'blood_type' => 'O+',
            'phone' => '+967 77 987 6543',
            'doctor' => $isRtl ? 'د. نزار صالح' : 'Dr. Nezar Saleh',
            'doctor_title' => $isRtl ? 'استشاري أول أمراض القلب وقسطرة الأوعية' : 'Senior Consultant Cardiologist',
            'clinic' => $isRtl ? 'عيادة أمراض القلب التخصصية (204)' : 'Cardiology Specialty Suite (204)',
            'diagnosis' => $isRtl ? 'التهاب البلعوم الحاد (J02.9)' : 'Acute Pharyngitis (J02.9)',
            'clinical_note' => $isRtl ? 'احتقان باللوزتين مع حرارة 38.2. تم وصف كورس علاجي لمدة 7 أيام مع الراحة التامة والسوائل.' : 'Tonsillar congestion with fever 38.2C. Prescribed 7-day course, rest and hydration.',
            'vitals' => [
                'bp' => '122/78 mmHg',
                'pulse' => '84 bpm',
                'temp' => '38.2 °C',
                'spo2' => '97%',
            ],
            'treatment_plan' => [
                ['medication' => 'Amoxicillin/Clav 1g', 'instructions' => 'قرص كل 12 ساعة بعد الأكل لمدة 7 أيام', 'duration' => '7 أيام'],
                ['medication' => 'Ibuprofen 400mg', 'instructions' => 'قرص عند اللزوم بعد الأكل لتسكين الألم وخفض الحرارة', 'duration' => '5 أيام']
            ],
            'follow_up' => $isRtl ? 'مراجعة العيادة عند استمرار الأعراض أو ارتفاع الحرارة بعد 3 أيام' : 'Follow up if fever persists after 3 days',
            'status' => 'completed',
            'status_label' => $isRtl ? 'معتمدة ومكتملة' : 'Signed & Completed',
        ],
        [
            'id' => 403,
            'note_number' => 'NOTE-2026-079',
            'date' => $isRtl ? 'اليوم · 10:15 ص' : 'Today · 10:15 AM',
            'full_date' => '2026-11-01 · 10:15 AM',
            'mrn' => 'MRN-88395',
            'national_id' => '1092837465',
            'patient' => $isRtl ? 'نورة سعد الدوسري' : 'Noura Saad Al-Dosari',
            'gender_age' => $isRtl ? 'أنثى، 28 سنة' : 'Female, 28 yrs',
            'blood_type' => 'B+',
            'phone' => '+967 77 332 1100',
            'doctor' => $isRtl ? 'د. نزار صالح' : 'Dr. Nezar Saleh',
            'doctor_title' => $isRtl ? 'استشاري أول أمراض القلب وقسطرة الأوعية' : 'Senior Consultant Cardiologist',
            'clinic' => $isRtl ? 'عيادة أمراض القلب التخصصية (204)' : 'Cardiology Specialty Suite (204)',
            'diagnosis' => $isRtl ? 'صداع توتري وإجهاد بدني (G44.2)' : 'Tension Headache & Fatigue (G44.2)',
            'clinical_note' => $isRtl ? 'نوبات صداع متفرقة مع قلة النوم. الفحص العصبي طبيعي. تم إعطاء إرشادات الراحة وتنظيم النوم.' : 'Recurrent tension headache with sleep deprivation. Neuro exam intact. Sleep hygiene advised.',
            'vitals' => [
                'bp' => '118/74 mmHg',
                'pulse' => '72 bpm',
                'temp' => '36.6 °C',
                'spo2' => '99%',
            ],
            'treatment_plan' => [
                ['medication' => 'Paracetamol 500mg', 'instructions' => 'قرصان عند اللزوم بحد أقصى 3 مرات يومياً', 'duration' => 'عند اللزوم']
            ],
            'follow_up' => $isRtl ? 'مراجعة العيادة بعد أسبوعين لمتابعة نمط النوم وشدة الصداع' : 'Follow up in 2 weeks for headache frequency evaluation',
            'status' => 'follow_up',
            'status_label' => $isRtl ? 'تحتاج متابعة' : 'Follow-up Needed',
        ],
        [
            'id' => 404,
            'note_number' => 'NOTE-2026-078',
            'date' => $isRtl ? 'أمس · 01:20 م' : 'Yesterday · 01:20 PM',
            'full_date' => '2026-10-31 · 01:20 PM',
            'mrn' => 'MRN-88370',
            'national_id' => '1048291048',
            'patient' => $isRtl ? 'خالد وليد الشمري' : 'Khalid Waleed Al-Shammari',
            'gender_age' => $isRtl ? 'ذكر، 52 سنة' : 'Male, 52 yrs',
            'blood_type' => 'AB+',
            'phone' => '+967 77 778 8990',
            'doctor' => $isRtl ? 'د. نزار صالح' : 'Dr. Nezar Saleh',
            'doctor_title' => $isRtl ? 'استشاري أول أمراض القلب وقسطرة الأوعية' : 'Senior Consultant Cardiologist',
            'clinic' => $isRtl ? 'عيادة أمراض القلب التخصصية (204)' : 'Cardiology Specialty Suite (204)',
            'diagnosis' => $isRtl ? 'ارتجاع مريئي معدي خفيف (K21.9)' : 'Mild Reflux (K21.9)',
            'clinical_note' => $isRtl ? 'حموضة بعد الوجبات الدسمة. نصائح غذائية وتجنب الاستلقاء بعد الأكل مباشرة.' : 'Postprandial heartburn. Dietary guidance provided.',
            'vitals' => [
                'bp' => '126/80 mmHg',
                'pulse' => '74 bpm',
                'temp' => '36.7 °C',
                'spo2' => '98%',
            ],
            'treatment_plan' => [
                ['medication' => 'Esomeprazole 40mg', 'instructions' => 'كبسولة صباحاً قبل الإفطار بنصف ساعة', 'duration' => '30 يوماً']
            ],
            'follow_up' => $isRtl ? 'مراجعة العيادة بعد شهر لتقييم الاستجابة للعلاج' : 'Follow up in 1 month to review symptomatic response',
            'status' => 'completed',
            'status_label' => $isRtl ? 'معتمدة ومكتملة' : 'Signed & Completed',
        ],
    ];
@endphp

@section('page-title', $isRtl ? 'الملاحظات والتقارير الطبية' : 'Clinical Notes')
@section('role-label', $isRtl ? 'طبيب' : 'Doctor')

{{-- =========================================================================
     روابط القائمة الجانبية (لإظهار عناصر القائمة الجانبية بالكامل)
     ========================================================================= --}}
@section('sidebar-links')
    <x-sidebar-link :href="route('doctor.dashboard')" :active="request()->routeIs('doctor.dashboard')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'لوحة التحكم' : 'Dashboard' }}
    </x-sidebar-link>

    <x-sidebar-link :href="route('doctor.schedule.index')" :active="request()->routeIs('doctor.schedule.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'جدول المواعيد' : 'My Schedule' }}
    </x-sidebar-link>

    <x-sidebar-link :href="route('doctor.patients.index')" :active="request()->routeIs('doctor.patients.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'قائمة المرضى' : 'My Patients' }}
    </x-sidebar-link>

    <x-sidebar-link :href="route('doctor.notes.index')" :active="request()->routeIs('doctor.notes.*')">
        <x-slot:icon>
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2Z"/>
                <path d="M9 13h6M9 17h6"/>
            </svg>
        </x-slot:icon>
        {{ $isRtl ? 'الملاحظات والتقارير' : 'Medical Notes' }}
    </x-sidebar-link>

    <div class="pt-4 mt-4 border-t border-white/10">
        <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
            <x-slot:icon>
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                </svg>
            </x-slot:icon>
            {{ $isRtl ? 'إعدادات الحساب' : 'Account Settings' }}
        </x-sidebar-link>
    </div>
@endsection

@section('content')
<div class="space-y-6 pb-12 font-sans notes-page-fade-in no-print" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

    {{-- نافذة الإشعار التفاعلية العائمة (Animated Floating Toast) --}}
    <div id="notesActionToast" class="fixed top-5 {{ $isRtl ? 'left-5' : 'right-5' }} z-50 transform -translate-y-16 opacity-0 transition-all duration-300 pointer-events-none">
        <div class="bg-[#152C4B] text-white px-4 py-2.5 rounded-xl shadow-xl border border-[#14AFC3]/30 flex items-center gap-2.5 text-xs">
            <div class="w-6 h-6 rounded-full bg-[#14AFC3]/20 flex items-center justify-center text-[#14AFC3] flex-shrink-0 animate-pulse">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <span id="notesActionToastMsg" class="font-medium">{{ $isRtl ? 'تم الحفظ بنجاح' : 'Action saved successfully' }}</span>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         1. الشريط العلوي الموحد (مطابق 1:1 لجدول العيادة وقائمة المرضى)
         ══════════════════════════════════════════════ --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-full bg-[#14AFC3] inline-block animate-pulse"></span>
                <h1 class="text-2xl font-black text-[#152C4B] tracking-tight">
                    {{ $isRtl ? 'الملاحظات والتقارير الطبية' : 'Clinical Notes & Patient Records' }}
                </h1>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100">
                    {{ $isRtl ? 'عيادة القلب 204' : 'Cardiology Suite 204' }}
                </span>
            </div>
            <p class="text-sm text-slate-500 mt-1">
                {{ $isRtl ? 'توثيق التشخيص السريري، نتائج الفحص، والتوصيات العلاجية في ملف المريض المعتمد.' : 'Document clinical diagnosis, exam findings, and patient treatment plans in verified records.' }}
            </p>
        </div>

        {{-- الإجراءات والشريحة الزمنية --}}
        <div class="flex items-center gap-2.5">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-slate-200 text-xs font-bold text-slate-700 shadow-xs">
                <svg class="w-4 h-4 text-[#14AFC3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ now()->locale(app()->getLocale())->isoFormat('dddd، D MMMM YYYY') }}</span>
            </div>

            <button type="button"
                    onclick="openNewNoteModal()"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#0C6B78] hover:bg-[#152C4B] active:scale-95 text-white text-xs font-bold shadow-xs hover:shadow-md transition-all duration-200 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>{{ $isRtl ? 'تدوين ملاحظة جديدة' : 'Add Clinical Note' }}</span>
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         2. بطاقات الإحصائيات الأربع الموحدة (موسطة ومنظمة تماماً وفق المنهجية الموحدة)
         ══════════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- Card 1: Solid Teal Featured Card (موسطة مع تأثير الدائرة العلوية) --}}
        <div class="relative overflow-hidden rounded-2xl p-6 text-white text-center shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center bg-[#0C6B78]">
            <div class="absolute -right-4 -top-4 w-24 h-24 rounded-full bg-white/10 pointer-events-none"></div>
            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center mb-2.5 text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <span class="text-[11px] font-extrabold uppercase tracking-widest text-teal-100">
                {{ $isRtl ? 'إجمالي الملاحظات الموثقة' : 'TOTAL CLINICAL NOTES' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-white my-2 tracking-tight font-mono">
                {{ number_format($notesStats['total_notes'] ?? 1248) }}
            </div>
            <div class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-white/20 text-white backdrop-blur-xs">
                <span>{{ $isRtl ? 'تقارير وملاحظات معتمدة' : 'Verified records' }}</span>
            </div>
        </div>

        {{-- Card 2: Today's Notes (موسطة) --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'ملاحظات كشوفات اليوم' : 'TODAY\'S NOTES' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $notesStats['today_notes'] ?? 12 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'في العيادة 204' : 'Suite 204' }}</span>
            </div>
        </div>

        {{-- Card 3: Follow-up Cases (موسطة) --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'تحتاج متابعة سريرية' : 'FOLLOW-UP CASES' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ $notesStats['follow_up'] ?? 5 }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                <span>{{ $isRtl ? 'متابعة قادمة' : 'Pending follow-up' }}</span>
            </div>
        </div>

        {{-- Card 4: Completed Notes (موسطة) --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm text-center transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 cursor-default flex flex-col items-center justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] flex items-center justify-center mb-2.5 text-[#0C6B78]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                {{ $isRtl ? 'معتمدة ومكتملة بالملف' : 'SIGNED & COMPLETED' }}
            </span>
            <div class="text-3xl sm:text-4xl font-extrabold text-[#152C4B] my-2 tracking-tight font-mono">
                {{ number_format($notesStats['completed_notes'] ?? 1231) }}
            </div>
            <div class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-[#E5FAFC] text-[#0C6B78]">
                <span>{{ $isRtl ? 'موثقة وموقعة' : 'Signed records' }}</span>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════
         3. جدول الملاحظات الطبية (بحث + فلاتر + جدول منظم بدون أي تباعد)
         ══════════════════════════════════════════════ --}}
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
        {{-- شريط الفلاتر والبحث --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 border-b border-slate-100 bg-slate-50/50">
            {{-- Tabs --}}
            <div class="flex items-center gap-1.5 overflow-x-auto pb-1 sm:pb-0">
                <button type="button" onclick="filterNotesByTab('all', this)"
                        class="note-filter-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-[#0C6B78] text-white shadow-xs">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span>{{ $isRtl ? 'جميع الملاحظات' : 'All Notes' }}</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-white/20 text-white font-bold">
                        {{ count($clinicalNotes) }}
                    </span>
                </button>

                <button type="button" onclick="filterNotesByTab('today', this)"
                        class="note-filter-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-white text-slate-600 border border-slate-200 hover:bg-[#E5FAFC] hover:text-[#0C6B78]">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <span>{{ $isRtl ? 'ملاحظات اليوم' : 'Today' }}</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-slate-100 text-slate-500 font-bold">
                        3
                    </span>
                </button>

                <button type="button" onclick="filterNotesByTab('completed', this)"
                        class="note-filter-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-white text-slate-600 border border-slate-200 hover:bg-[#E5FAFC] hover:text-[#0C6B78]">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ $isRtl ? 'معتمدة ومكتملة' : 'Completed' }}</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-slate-100 text-slate-500 font-bold">
                        3
                    </span>
                </button>

                <button type="button" onclick="filterNotesByTab('follow_up', this)"
                        class="note-filter-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-white text-slate-600 border border-slate-200 hover:bg-[#E5FAFC] hover:text-[#0C6B78]">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/>
                    </svg>
                    <span>{{ $isRtl ? 'تحتاج متابعة' : 'Follow-up' }}</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-slate-100 text-slate-500 font-bold">
                        1
                    </span>
                </button>
            </div>

            {{-- مربع البحث التفاعلي المنسق بالكامل --}}
            <div class="relative w-full sm:w-80">
                <svg width="14" height="14" class="absolute {{ $isRtl ? 'right-3.5' : 'left-3.5' }} top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="m21 21-4.35-4.35"/>
                </svg>
                <input type="text"
                       id="notesSearchInput"
                       onkeyup="searchNotesTable()"
                       placeholder="{{ $isRtl ? 'بحث برقم الملاحظة، اسم المريض، أو التشخيص...' : 'Search note #, patient name, diagnosis...' }}"
                       class="{{ $isRtl ? 'pr-9 pl-4' : 'pl-9 pr-4' }} py-2 bg-white border border-slate-200 rounded-xl text-xs
                              focus:border-[#14AFC3] focus:ring-1 focus:ring-[#14AFC3] outline-none w-full transition font-medium placeholder:text-slate-400">
            </div>
        </div>

        {{-- Master Notes Table (الأعمدة مرتبة ومباشرة تحت كل عنوان وبدون تباعد) --}}
        <div class="overflow-x-auto">
            <table class="w-full text-xs table-fixed min-w-[1050px] border-collapse" id="clinicalNotesMasterTable">
                <thead>
                    <tr class="bg-slate-50/90 dark:bg-slate-800/70 border-b border-slate-200/80 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-extrabold text-[11.5px] uppercase tracking-wider">
                        <th class="w-[19%] px-5 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'المريض' : 'Patient' }}
                        </th>
                        <th class="w-[15%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'رقم التوثيق والتاريخ' : 'Note # & Date' }}
                        </th>
                        <th class="w-[25%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'التشخيص الطبي السريري' : 'Clinical Diagnosis' }}
                        </th>
                        <th class="w-[18%] px-4 py-3.5 {{ $isRtl ? 'text-right' : 'text-left' }} whitespace-nowrap">
                            {{ $isRtl ? 'الخطة الدوائية (Rx)' : 'Treatment Plan (Rx)' }}
                        </th>
                        <th class="w-[11%] px-4 py-3.5 text-center whitespace-nowrap">
                            {{ $isRtl ? 'حالة التوثيق' : 'Status' }}
                        </th>
                        <th class="w-[12%] px-5 py-3.5 text-center whitespace-nowrap">
                            {{ $isRtl ? 'الإجراءات السريرية' : 'Clinical Actions' }}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($clinicalNotes as $note)
                        <tr class="hover:bg-[#E5FAFC]/25 transition note-table-row"
                            data-search="{{ strtolower($note['note_number'] . ' ' . $note['patient'] . ' ' . $note['mrn'] . ' ' . $note['diagnosis']) }}"
                            data-status="{{ $note['status'] }}"
                            data-date="{{ str_contains($note['date'], 'اليوم') || str_contains($note['date'], 'Today') ? 'today' : 'past' }}">

                            {{-- 1. المريض: الاسم والأفاتار فقط تحت العنوان مباشرة بنظافة ووضوح عالي --}}
                            <td class="px-5 py-3.5 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-[#E5FAFC] text-[#0C6B78] font-black text-xs flex items-center justify-center flex-shrink-0 border border-teal-100 shadow-2xs">
                                        {{ mb_substr($note['patient'], 0, 1) }}
                                    </div>
                                    <div>
                                        <span class="font-extrabold text-[#152C4B] text-[13.5px] tracking-tight block">
                                            {{ $note['patient'] }}
                                        </span>
                                        <div class="text-slate-400 text-[10.5px] font-medium flex items-center gap-1.5 mt-0.5">
                                            <span class="font-mono font-bold text-slate-500"><bdi dir="ltr">{{ $note['mrn'] }}</bdi></span>
                                            <span class="text-slate-300">·</span>
                                            <span>{{ $note['gender_age'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- 2. رقم التوثيق والتاريخ تحت العنوان مباشرة بنسق طبي احترافي --}}
                            <td class="px-4 py-3.5 whitespace-nowrap">
                                <div class="inline-flex items-center px-2 py-0.5 rounded-md bg-slate-100 text-[#152C4B] font-mono font-bold text-[11px] border border-slate-200/80">
                                    <bdi dir="ltr">{{ $note['note_number'] }}</bdi>
                                </div>
                                <div class="text-slate-400 text-[10.5px] font-medium mt-1 flex items-center gap-1">
                                    <svg class="w-3 h-3 text-[#14AFC3] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>
                                    <span>{{ $note['date'] }}</span>
                                </div>
                            </td>

                            {{-- 3. التشخيص الطبي والملاحظات مع شارة ICD المعتمدة --}}
                            <td class="px-4 py-3.5 max-w-xs">
                                <div class="flex items-center gap-1.5 flex-wrap">
                                    <span class="font-extrabold text-[#152C4B] text-[12.5px] tracking-tight">
                                        {{ preg_replace('/\s*\([A-Z0-9\.]+\)/iu', '', $note['diagnosis']) }}
                                    </span>
                                    @if(preg_match('/\(([A-Z0-9\.]+)\)/iu', $note['diagnosis'], $m))
                                        <span class="px-1.5 py-0.2 rounded text-[9.5px] font-mono font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100">
                                            {{ $m[1] }}
                                        </span>
                                    @endif
                                </div>
                                <div class="text-slate-500 mt-1 line-clamp-1 leading-relaxed text-[11px]">
                                    {{ $note['clinical_note'] }}
                                </div>
                            </td>

                            {{-- 4. الخطة الدوائية (Rx) تحت العنوان مباشرة برمزية طبية متناسقة --}}
                            <td class="px-4 py-3.5">
                                <div class="flex flex-wrap items-center gap-1.5">
                                    @foreach($note['treatment_plan'] as $item)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-[#E5FAFC] text-[#0C6B78] border border-teal-100 text-[11px] font-bold shadow-2xs">
                                            <span class="text-[10px] font-mono font-black text-[#14AFC3]">Rx</span>
                                            <span>{{ $item['medication'] }}</span>
                                        </span>
                                    @endforeach
                                </div>
                            </td>

                            {{-- 5. حالة التوثيق تحت العنوان مباشرة (موسطة) --}}
                            <td class="px-4 py-3.5 text-center whitespace-nowrap">
                                @if($note['status'] === 'completed')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#E5FAFC] text-[#0C6B78] border border-teal-200/80 shadow-2xs">
                                        <svg class="w-3.5 h-3.5 text-[#0C6B78] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        <span>{{ $note['status_label'] }}</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200 shadow-2xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse flex-shrink-0"></span>
                                        <span>{{ $note['status_label'] }}</span>
                                    </span>
                                @endif
                            </td>

                            {{-- 6. الإجراءات السريرية تحت العنوان مباشرة (موسطة) --}}
                            <td class="w-[12%] px-5 py-3.5 text-center whitespace-nowrap actions-cell">
                                <div class="inline-flex items-center gap-1.5 p-1 bg-slate-100/80 dark:bg-slate-800/80 rounded-2xl border border-slate-200/70 dark:border-slate-700 shadow-2xs justify-center">
                                    {{-- زر معاينة التقرير --}}
                                    <button type="button"
                                            onclick="openNoteDetailsModal({{ json_encode($note) }})"
                                            title="{{ $isRtl ? 'عرض التقرير السريري المعتمد' : 'View Clinical Report' }}"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-[#0C6B78] hover:bg-[#152C4B] text-white text-[11.5px] font-bold transition-all shadow-xs cursor-pointer">
                                        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <span>{{ $isRtl ? 'معاينة' : 'View' }}</span>
                                    </button>

                                    {{-- زر طباعة التقرير --}}
                                    <button type="button"
                                            onclick="printMedicalNote({{ json_encode($note) }})"
                                            title="{{ $isRtl ? 'طباعة التقرير الطبي الرسمي' : 'Print Official Medical Note' }}"
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#E5FAFC] hover:bg-teal-100 text-[#0C6B78] border border-teal-200/80 transition-all shadow-2xs cursor-pointer">
                                        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-10 text-center text-slate-400 font-medium text-xs">
                                {{ $isRtl ? 'لم يتم العثور على ملاحظات أو تقارير تطابق البحث.' : 'No clinical records found matching search.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ملخص الفوتر --}}
        <div class="flex items-center justify-between px-5 py-3.5 bg-slate-50/60 border-t border-slate-100 text-xs text-slate-500">
            <span>
                {{ $isRtl
                    ? 'عرض ' . count($clinicalNotes) . ' من أصل ' . ($notesStats['total_notes'] ?? count($clinicalNotes)) . ' تقرير طبي موثق'
                    : 'Showing ' . count($clinicalNotes) . ' of ' . ($notesStats['total_notes'] ?? count($clinicalNotes)) . ' clinical notes' }}
            </span>
            <span class="font-medium text-slate-400">
                {{ $isRtl ? 'نظام السجلات والتوثيق الطبي EMR الموحد' : 'Enterprise Electronic Medical Record' }}
            </span>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════
     4. نافذة تدوين ملاحظة طبية جديدة (مودال احترافي موحد بألوان المشروع)
     ══════════════════════════════════════════════ --}}
<div id="newNoteModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/65 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4 anim-overlay no-print">
    <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden anim-modal-pop">
        
        {{-- Luxury Branded Header --}}
        <div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 100%); background-color: #152C4B;" class="px-6 py-4 text-white">
            <div class="flex items-center justify-between text-xs">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/15 border border-white/25 backdrop-blur-xs flex items-center justify-center text-[#14AFC3] font-black text-sm flex-shrink-0 shadow-inner">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-base font-black text-white tracking-tight">{{ $isRtl ? 'تدوين ملاحظة وتوصية سريرية' : 'Record Clinical Note' }}</h3>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-white/15 text-teal-100 border border-white/20">
                                {{ $isRtl ? 'توثيق رسمي' : 'Official Record' }}
                            </span>
                        </div>
                        <div class="text-teal-100/80 text-[11px] font-medium flex items-center gap-1.5 mt-0.5">
                            <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي' : 'Al-Rasheed Hospital' }}</span>
                            <span class="text-white/40">·</span>
                            <span>{{ $isRtl ? 'عيادة القلب 204' : 'Cardiology Suite 204' }}</span>
                        </div>
                    </div>
                </div>

                <button type="button" onclick="closeNewNoteModal()" class="w-7 h-7 rounded-lg bg-white/10 hover:bg-white/25 text-white flex items-center justify-center transition-all cursor-pointer font-bold text-xs" title="{{ $isRtl ? 'إغلاق' : 'Close' }}">✕</button>
            </div>
        </div>

        {{-- محتوى النموذج الطبي المنسق --}}
        <form onsubmit="saveQuickNote(event)" class="p-5 space-y-3.5 text-xs bg-[#F8FAFC]">
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-3">
                {{-- اسم المريض أو رقم الملف --}}
                <div class="sm:col-span-7 bg-white p-3 rounded-2xl border border-slate-200/90 shadow-2xs space-y-1.5">
                    <label class="block font-black text-[#152C4B] text-[11.5px]">{{ $isRtl ? 'المريض / رقم الملف الطبي MRN' : 'Patient Name / MRN' }} <span class="text-rose-500 font-bold">*</span></label>
                    <input type="text" id="newNotePatient" required placeholder="{{ $isRtl ? 'مثال: سارة فهد العتيبي (MRN-88421)' : 'e.g. Sarah Fahad (MRN-88421)' }}"
                           class="w-full h-9 px-3 bg-slate-50/70 border border-slate-200 rounded-xl text-xs font-bold text-[#152C4B] focus:bg-white focus:border-[#14AFC3] outline-none transition-all placeholder:text-slate-400">
                </div>

                {{-- حالة التوثيق --}}
                <div class="sm:col-span-5 bg-white p-3 rounded-2xl border border-slate-200/90 shadow-2xs space-y-1.5">
                    <label class="block font-black text-[#152C4B] text-[11.5px]">{{ $isRtl ? 'حالة التوثيق السريري' : 'Documentation Status' }} <span class="text-rose-500 font-bold">*</span></label>
                    <select id="newNoteStatus" class="w-full h-9 px-3 bg-slate-50/70 border border-slate-200 rounded-xl text-xs font-bold text-[#152C4B] focus:bg-white focus:border-[#14AFC3] outline-none transition-all">
                        <option value="completed">{{ $isRtl ? 'معتمدة ومكتملة' : 'Signed & Completed' }}</option>
                        <option value="follow_up">{{ $isRtl ? 'تحتاج متابعة قادمة' : 'Follow-up Required' }}</option>
                    </select>
                </div>
            </div>

            {{-- التشخيص السريري المعتمد --}}
            <div class="bg-white p-3 rounded-2xl border border-slate-200/90 shadow-2xs space-y-1.5">
                <div class="flex items-center justify-between">
                    <label class="font-black text-[#152C4B] text-[11.5px]">{{ $isRtl ? 'التشخيص الطبي السريري المعتمد' : 'Clinical Diagnosis' }} <span class="text-rose-500 font-bold">*</span></label>
                    <span class="text-[9.5px] font-mono font-bold text-[#0C6B78] bg-[#E5FAFC] px-1.5 py-0.5 rounded border border-teal-100">ICD-10</span>
                </div>
                <input type="text" id="newNoteDiagnosis" required placeholder="{{ $isRtl ? 'مثال: ارتفاع ضغط الدم الشرياني وتخطيط القلب ECG' : 'e.g. Essential Hypertension (I10)' }}"
                       class="w-full h-9 px-3 bg-slate-50/70 border border-slate-200 rounded-xl text-xs font-bold text-[#152C4B] focus:bg-white focus:border-[#14AFC3] outline-none transition-all placeholder:text-slate-400">
                
                {{-- Quick Diagnosis Tags --}}
                <div class="flex flex-wrap items-center gap-1 pt-0.5">
                    <button type="button" onclick="document.getElementById('newNoteDiagnosis').value='{{ $isRtl ? 'ارتفاع ضغط الدم الشرياني (I10)' : 'Essential Hypertension (I10)' }}'" class="px-2 py-0.5 rounded-md bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10px] font-bold text-slate-600 transition-colors cursor-pointer">+ ارتفاع ضغط الدم</button>
                    <button type="button" onclick="document.getElementById('newNoteDiagnosis').value='{{ $isRtl ? 'التهاب البلعوم واللوزتين الحاد (J02.9)' : 'Acute Pharyngitis (J02.9)' }}'" class="px-2 py-0.5 rounded-md bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10px] font-bold text-slate-600 transition-colors cursor-pointer">+ التهاب البلعوم</button>
                    <button type="button" onclick="document.getElementById('newNoteDiagnosis').value='{{ $isRtl ? 'صداع توتري وإجهاد بدني متكرر (G44.2)' : 'Tension Headache (G44.2)' }}'" class="px-2 py-0.5 rounded-md bg-slate-100 hover:bg-[#E5FAFC] hover:text-[#0C6B78] text-[10px] font-bold text-slate-600 transition-colors cursor-pointer">+ صداع توتري</button>
                </div>
            </div>

            {{-- نص الملاحظة السريرية المفصلة --}}
            <div class="bg-white p-3 rounded-2xl border border-slate-200/90 shadow-2xs space-y-1.5">
                <label class="block font-black text-[#152C4B] text-[11.5px]">{{ $isRtl ? 'الملاحظات السريرية ونتائج الفحص الطبي' : 'Clinical Examination & Findings' }} <span class="text-rose-500 font-bold">*</span></label>
                <textarea id="newNoteBody" rows="2" required placeholder="{{ $isRtl ? 'دوّن نتائج الفحص السريري، الأعراض، المؤشرات الحيوية، وتوجيهاتك للمريض...' : 'Document clinical findings, symptoms, and examination notes...' }}"
                          class="w-full px-3 py-2 bg-slate-50/70 border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:bg-white focus:border-[#14AFC3] outline-none transition-all resize-none min-h-[50px] placeholder:text-slate-400"></textarea>
            </div>

            {{-- الخطة العلاجية والتوصيات الدوائية --}}
            <div class="bg-white p-3.5 rounded-2xl border border-slate-200/90 shadow-2xs space-y-2">
                <div class="flex items-center justify-between pb-1.5 border-b border-slate-100">
                    <span class="font-black text-[#152C4B] text-xs flex items-center gap-1.5">
                        <span class="w-5 h-5 rounded-md bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center font-bold text-[11px] font-mono">Rx</span>
                        <span>{{ $isRtl ? 'الخطة العلاجية والتوصيات الدوائية' : 'Treatment Plan & Medications' }}</span>
                    </span>
                    <span class="text-[10px] font-medium text-slate-400">{{ $isRtl ? 'تُوثق في الملف وتُطبع للمريض' : 'Printed for patient' }}</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    <div>
                        <span class="block text-[10px] text-slate-400 font-bold mb-1">{{ $isRtl ? 'اسم الدواء والتركيز' : 'Medication & Strength' }}</span>
                        <input type="text" id="newNoteMedName" placeholder="{{ $isRtl ? 'مثال: Bisoprolol 5mg' : 'e.g. Bisoprolol 5mg' }}"
                               class="w-full h-8.5 px-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-bold text-[#152C4B] focus:bg-white focus:border-[#14AFC3] outline-none">
                    </div>
                    <div>
                        <span class="block text-[10px] text-slate-400 font-bold mb-1">{{ $isRtl ? 'الجرعة وطريقة الاستخدام' : 'Dosage & Instructions' }}</span>
                        <input type="text" id="newNoteMedInstr" placeholder="{{ $isRtl ? 'مثال: قرص واحد يومياً بعد الإفطار' : 'e.g. 1 tab once daily after meal' }}"
                               class="w-full h-8.5 px-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-medium text-slate-700 focus:bg-white focus:border-[#14AFC3] outline-none">
                    </div>
                </div>
            </div>

            {{-- أزرار الإجراءات --}}
            <div class="pt-2 flex items-center justify-between">
                <button type="button" onclick="closeNewNoteModal()" class="px-4 py-2 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 font-bold transition-colors cursor-pointer text-xs">
                    {{ $isRtl ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="submit" style="direction: {{ $isRtl ? 'rtl' : 'ltr' }}; background-color: #0C6B78;" onmouseover="this.style.backgroundColor='#152C4B'" onmouseout="this.style.backgroundColor='#0C6B78'" class="px-5 py-2 rounded-xl text-white font-bold transition-all shadow-md flex items-center gap-2 cursor-pointer text-xs">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ $isRtl ? 'حفظ وتوثيق في ملف المريض' : 'Save to Patient File' }}</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ══════════════════════════════════════════════
     5. نافذة معاينة التقرير الطبي السريري المعتمد على الشاشة
     ══════════════════════════════════════════════ --}}
<div id="noteDetailsModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/65 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4 anim-overlay no-print">
    <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden anim-modal-pop">
        
        {{-- Luxury Branded Header --}}
        <div style="background: linear-gradient(135deg, #152C4B 0%, #0C6B78 100%); background-color: #152C4B;" class="px-6 py-4 text-white">
            <div class="flex items-center justify-between text-xs">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/15 border border-white/25 backdrop-blur-xs flex items-center justify-center text-[#14AFC3] font-black text-sm flex-shrink-0 shadow-inner">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-base font-black text-white tracking-tight" id="modalNoteNumber">NOTE-2026-081</h3>
                            <span class="bg-black/25 text-teal-200 font-mono font-bold text-[11px] px-2 py-0.5 rounded-md border border-white/10" id="modalPatientMRN">
                                MRN-88421
                            </span>
                        </div>
                        <div class="text-teal-100/80 text-[11px] font-medium flex items-center gap-1.5 mt-0.5">
                            <span>{{ $isRtl ? 'مستشفى الرشيد التخصصي' : 'Al-Rasheed Hospital' }}</span>
                            <span class="text-white/40">·</span>
                            <span>{{ $isRtl ? 'تقرير الملاحظة السريرية المعتمد' : 'Official Clinical Report' }}</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button type="button" onclick="closeNoteDetailsModal()" class="w-7 h-7 rounded-lg bg-white/10 hover:bg-white/25 text-white flex items-center justify-center transition-all cursor-pointer font-bold text-xs" title="{{ $isRtl ? 'إغلاق' : 'Close' }}">✕</button>
                </div>
            </div>
        </div>

        {{-- تفاصيل التقرير الطبي --}}
        <div class="p-5 space-y-3.5 text-xs bg-[#F8FAFC]">
            {{-- شريط بيانات المريض والطبيب المعالج --}}
            <div class="p-3.5 rounded-2xl bg-white border border-slate-200/90 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-[#E5FAFC] text-[#0C6B78] font-black text-sm flex items-center justify-center flex-shrink-0 border border-teal-100 shadow-2xs" id="modalPatientAvatar">
                        س
                    </div>
                    <div>
                        <div class="text-sm font-extrabold text-[#152C4B]" id="modalPatientName">سارة فهد العتيبي</div>
                        <div class="text-slate-400 text-[11px] font-medium mt-0.5" id="modalPatientMeta">أنثى، 34 سنة · عيادة القلب 204</div>
                    </div>
                </div>

                <div class="text-right rtl:text-right ltr:text-left sm:text-left rtl:sm:text-left ltr:sm:text-right">
                    <div class="text-slate-400 text-[10.5px] font-semibold">{{ $isRtl ? 'تاريخ التوثيق الطبي' : 'Recorded Date' }}</div>
                    <div class="font-bold text-[#152C4B] text-xs" id="modalNoteDate">اليوم · 08:45 ص</div>
                    <div class="mt-1">
                        <span id="modalNoteStatus" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100">
                            معتمدة ومكتملة
                        </span>
                    </div>
                </div>
            </div>

            {{-- التشخيص السريري --}}
            <div class="bg-white p-3 rounded-2xl border border-slate-200/90 shadow-2xs space-y-1">
                <div class="flex items-center justify-between">
                    <span class="font-black text-[#152C4B] text-[11.5px]">{{ $isRtl ? 'التشخيص الطبي السريري المعتمد' : 'Clinical Diagnosis' }}</span>
                    <span class="text-[9.5px] font-mono font-bold text-[#0C6B78] bg-[#E5FAFC] px-1.5 py-0.5 rounded border border-teal-100">ICD-10</span>
                </div>
                <div class="font-extrabold text-[#152C4B] text-xs" id="modalDiagnosis">ارتفاع ضغط الدم الشرياني (I10)</div>
            </div>

            {{-- نص الملاحظات والفحص السريري --}}
            <div class="bg-white p-3.5 rounded-2xl border border-slate-200/90 shadow-2xs space-y-1">
                <div class="font-black text-[#152C4B] text-[11.5px] flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-[#0C6B78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    <span>{{ $isRtl ? 'الملاحظات السريرية والفحص الطبي' : 'Clinical Examination & Findings' }}</span>
                </div>
                <div class="text-slate-700 leading-relaxed font-medium text-xs pt-1" id="modalClinicalNote">-</div>
            </div>

            {{-- الخطة العلاجية والتوصيات الدوائية --}}
            <div class="bg-white p-3.5 rounded-2xl border border-slate-200/90 shadow-2xs space-y-2">
                <div class="font-black text-[#152C4B] text-[11.5px] flex items-center gap-1.5">
                    <span class="w-4 h-4 rounded-md bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center font-bold text-[10px] font-mono">Rx</span>
                    <span>{{ $isRtl ? 'الخطة العلاجية والتوصيات الدوائية' : 'Treatment & Recommendations' }}</span>
                </div>
                <div class="space-y-1.5" id="modalTreatmentPlanList">
                    <!-- تُملأ ديناميكياً عبر جافاسكريبت -->
                </div>
            </div>

            {{-- الختم والاعتماد الطبي الرقمي --}}
            <div class="p-3 rounded-2xl bg-slate-100/70 border border-slate-200 flex items-center justify-between text-[11px] text-slate-500">
                <div class="flex items-center gap-2">
                    <div class="w-5 h-5 rounded-full bg-[#E5FAFC] text-[#0C6B78] flex items-center justify-center font-black text-[10px]">✓</div>
                    <span class="font-bold text-[#152C4B]">{{ $isRtl ? 'تقرير موثق وموقع رقمياً - د. نزار صالح' : 'Signed & Verified by Dr. Nezar Saleh' }}</span>
                </div>
                <div class="font-mono text-slate-400 font-bold">#E-SIG-{{ date('Y') }}-CLINIC</div>
            </div>
        </div>

        {{-- أزرار التحكم بالنافذة والطباعة --}}
        <div class="px-6 py-3.5 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
            <button type="button" onclick="closeNoteDetailsModal()" class="px-4 py-2 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 font-bold transition-colors cursor-pointer text-xs">
                {{ $isRtl ? 'إغلاق' : 'Close' }}
            </button>
            <button type="button" onclick="printFromCurrentModal()" style="background-color: #0C6B78;" onmouseover="this.style.backgroundColor='#152C4B'" onmouseout="this.style.backgroundColor='#0C6B78'" class="inline-flex items-center gap-2 px-5 py-2 rounded-xl text-white text-xs font-bold shadow-md transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span>{{ $isRtl ? 'طباعة التقرير الطبي المعتمد' : 'Print Official Record' }}</span>
            </button>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════
     6. نموذج الطباعة السريري الرسمي المعتمد A4 (Official Clinical Print Document)
     يظهر حصرياً وبشكل كامل عند أمر الطباعة بدقة فائقة وترويسة وزارية
     ══════════════════════════════════════════════ --}}
<div id="officialClinicalPrintReport" class="hidden" dir="rtl">
    <div style="font-family: 'Cairo', 'Segoe UI', Tahoma, sans-serif; background-color: #ffffff; color: #111827; padding: 25px 30px; max-width: 800px; margin: 0 auto; line-height: 1.5;">

        {{-- 1. Official Institutional Header (الترويسة الرسمية المعتمدة) --}}
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 3px double #152C4B; padding-bottom: 14px; margin-bottom: 18px;">
            {{-- الجانب الأيمن: الترويسة العربية الرسمية --}}
            <div style="text-align: right; width: 33%;">
                <div style="font-size: 13px; font-weight: 900; color: #152C4B; margin-bottom: 2px;">الجمهورية اليمنية</div>
                <div style="font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 2px;">وزارة الصحة العامة والسكان</div>
                <div style="font-size: 13.5px; font-weight: 900; color: #0C6B78; margin-bottom: 2px;">مستشفى الرشيد التخصصي</div>
                <div style="font-size: 11px; font-weight: 700; color: #152C4B;">مركز أمراض وجراحة القلب والأوعية الدموية</div>
            </div>

            {{-- الوسط: شعار المستشفى الطبي الرسمي --}}
            <div style="text-align: center; width: 34%;">
                <div style="display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px; border-radius: 16px; background-color: #E5FAFC; border: 2px solid #0C6B78; margin-bottom: 4px;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#0C6B78" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                        <path d="M12 9v6m-3-3h6"/>
                    </svg>
                </div>
                <div style="font-size: 10px; font-weight: 900; color: #152C4B; letter-spacing: 0.5px;">AL-RASHEED HOSPITAL</div>
                <div style="font-size: 8.5px; font-weight: bold; color: #0C6B78;">EMR CLINICAL REPORT</div>
            </div>

            {{-- الجانب الأيسر: الترويسة الإنجليزية الرسمية --}}
            <div style="text-align: left; width: 33%; direction: ltr;">
                <div style="font-size: 12px; font-weight: 900; color: #152C4B; margin-bottom: 2px;">REPUBLIC OF YEMEN</div>
                <div style="font-size: 10.5px; font-weight: 700; color: #475569; margin-bottom: 2px;">Ministry of Public Health & Population</div>
                <div style="font-size: 12.5px; font-weight: 900; color: #0C6B78; margin-bottom: 2px;">Al-Rasheed Specialized Hospital</div>
                <div style="font-size: 10px; font-weight: 700; color: #152C4B;">Cardiology & Heart Center</div>
            </div>
        </div>

        {{-- 2. Document Title Banner (عنوان التقرير وشريط التوثيق) --}}
        <div style="background-color: #152C4B; color: #ffffff; border-radius: 10px; padding: 10px 18px; margin-bottom: 16px; display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h2 style="font-size: 15px; font-weight: 900; margin: 0; letter-spacing: -0.2px;">تقرير الفحص والملاحظات الطبية السريرية</h2>
                <div style="font-size: 10px; color: #99f6e4; font-weight: 600; margin-top: 2px;">OFFICIAL CLINICAL CONSULTATION & PROGRESS REPORT</div>
            </div>
            <div style="text-align: left; direction: ltr;">
                <div style="background-color: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25); border-radius: 6px; padding: 3px 10px; font-family: monospace; font-size: 12px; font-weight: 900; color: #ffffff;">
                    <span id="prNoteNumber">NOTE-2026-081</span>
                </div>
                <div style="font-size: 9.5px; color: #cbd5e1; margin-top: 2px; text-align: right;" id="prReportPrintDate">2026-11-01</div>
            </div>
        </div>

        {{-- 3. Patient Complete Information Table (بيانات المريض الشاملة في جدول معتمد) --}}
        <div style="border: 1.5px solid #0C6B78; border-radius: 10px; overflow: hidden; margin-bottom: 14px;">
            <div style="background-color: #E5FAFC; border-bottom: 1px solid #0C6B78; padding: 6px 14px; font-size: 11px; font-weight: 900; color: #0C6B78; display: flex; align-items: center; justify-content: space-between;">
                <span>بيانات المريض والملف السريري (Patient Demographics & File Record)</span>
                <span style="font-size: 10px; font-weight: 700; color: #152C4B;">العيادة الاستشارية: عيادة القلب 204</span>
            </div>
            <table style="width: 100%; border-collapse: collapse; font-size: 11.5px;">
                <tbody>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569; width: 18%;">اسم المريض الرباعي:</td>
                        <td style="padding: 7px 12px; font-weight: 900; color: #152C4B; width: 32%; font-size: 13px;" id="prPatientName">سارة فهد العتيبي</td>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569; width: 18%;">رقم الملف الطبي MRN:</td>
                        <td style="padding: 7px 12px; font-weight: 900; color: #0C6B78; font-family: monospace; width: 32%;" id="prPatientMRN">MRN-88421</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">الهوية الوطنية / الإقامة:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #1e293b; font-family: monospace;" id="prNationalId">1084920194</td>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">الجنس والعمر:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #1e293b;" id="prGenderAge">أنثى، 34 سنة</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">فصيلة الدم:</td>
                        <td style="padding: 7px 12px; font-weight: 900; color: #0C6B78; font-family: monospace;" id="prBloodType">A+</td>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">رقم الهاتف للتواصل:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #1e293b; font-family: monospace; direction: ltr; text-align: right;" id="prPhone">+967 77 123 4567</td>
                    </tr>
                    <tr>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">الطبيب المعالج والمستشار:</td>
                        <td style="padding: 7px 12px; font-weight: 900; color: #152C4B;" id="prDoctorName">د. نزار صالح</td>
                        <td style="padding: 7px 12px; background-color: #f8fafc; font-weight: 800; color: #475569;">تاريخ ووقت الكشف:</td>
                        <td style="padding: 7px 12px; font-weight: 800; color: #1e293b;" id="prNoteDate">اليوم · 08:45 ص</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- 4. Vital Signs Box (شريط المؤشرات الحيوية المقاسة بالعيادة) --}}
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; margin-bottom: 14px; text-align: center;">
            <div style="border: 1px solid #cbd5e1; border-radius: 8px; padding: 7px 10px; background-color: #f8fafc;">
                <div style="font-size: 10px; font-weight: 700; color: #64748b;">ضغط الدم الشرياني (BP)</div>
                <div style="font-size: 13px; font-weight: 900; color: #152C4B; font-family: monospace; margin-top: 2px;" id="prVitalsBP">135/85 mmHg</div>
            </div>
            <div style="border: 1px solid #cbd5e1; border-radius: 8px; padding: 7px 10px; background-color: #f8fafc;">
                <div style="font-size: 10px; font-weight: 700; color: #64748b;">معدل النبض (Pulse)</div>
                <div style="font-size: 13px; font-weight: 900; color: #152C4B; font-family: monospace; margin-top: 2px;" id="prVitalsPulse">76 bpm</div>
            </div>
            <div style="border: 1px solid #cbd5e1; border-radius: 8px; padding: 7px 10px; background-color: #f8fafc;">
                <div style="font-size: 10px; font-weight: 700; color: #64748b;">درجة الحرارة (Temp)</div>
                <div style="font-size: 13px; font-weight: 900; color: #152C4B; font-family: monospace; margin-top: 2px;" id="prVitalsTemp">36.8 °C</div>
            </div>
            <div style="border: 1px solid #cbd5e1; border-radius: 8px; padding: 7px 10px; background-color: #f8fafc;">
                <div style="font-size: 10px; font-weight: 700; color: #64748b;">تشبع الأكسجين (SpO2)</div>
                <div style="font-size: 13px; font-weight: 900; color: #0C6B78; font-family: monospace; margin-top: 2px;" id="prVitalsSpO2">98%</div>
            </div>
        </div>

        {{-- 5. Clinical Diagnosis Box (التشخيص الطبي السريري المعتمد) --}}
        <div style="border: 1px solid #cbd5e1; border-radius: 10px; padding: 10px 14px; margin-bottom: 12px; background-color: #ffffff;">
            <div style="font-size: 11px; font-weight: 900; color: #152C4B; margin-bottom: 4px; display: flex; align-items: center; justify-content: space-between;">
                <span>التشخيص الطبي السريري المعتمد (Approved Clinical Diagnosis):</span>
                <span style="font-size: 10px; font-family: monospace; font-weight: 900; background-color: #E5FAFC; color: #0C6B78; padding: 2px 8px; border-radius: 4px; border: 1px solid #99f6e4;" id="prDiagnosisICD">ICD-10: I10</span>
            </div>
            <div style="font-size: 13px; font-weight: 900; color: #0C6B78;" id="prDiagnosis">ارتفاع ضغط الدم الشرياني (I10)</div>
        </div>

        {{-- 6. Clinical Examination Findings (الملاحظات السريرية والفحص البدني) --}}
        <div style="border: 1px solid #cbd5e1; border-radius: 10px; padding: 10px 14px; margin-bottom: 12px; background-color: #ffffff;">
            <div style="font-size: 11px; font-weight: 900; color: #152C4B; margin-bottom: 4px;">
                الملاحظات السريرية ونتائج الفحص الطبي (Clinical Examination Findings & Doctor Notes):
            </div>
            <div style="font-size: 11.5px; color: #334155; line-height: 1.6; text-align: justify;" id="prClinicalNote">
                تم قياس الضغط 135/85، تم تقديم إرشادات تقليل الصوديوم، وإجراء تحليل وظائف الكلى بعد أسبوعين.
            </div>
        </div>

        {{-- 7. Treatment Plan Table (جدول الخطة العلاجية والوصفة الطبية Rx) --}}
        <div style="border: 1px solid #cbd5e1; border-radius: 10px; overflow: hidden; margin-bottom: 12px;">
            <div style="background-color: #f1f5f9; padding: 7px 14px; font-size: 11px; font-weight: 900; color: #152C4B; display: flex; align-items: center; justify-content: space-between;">
                <span>الخطة الدوائية والعلاجية الموصوفة (Prescribed Medications & Rx Plan):</span>
                <span style="font-size: 10px; font-weight: 700; color: #0C6B78;">المعتمدة بالصيدلية السريرية</span>
            </div>
            <table style="width: 100%; border-collapse: collapse; font-size: 11px; text-align: right;">
                <thead>
                    <tr style="background-color: #f8fafc; border-bottom: 1.5px solid #cbd5e1; color: #475569; font-weight: 800;">
                        <th style="padding: 6px 10px; width: 6%; text-align: center;">#</th>
                        <th style="padding: 6px 10px; width: 34%;">اسم الدواء والتركيز (Drug Name)</th>
                        <th style="padding: 6px 10px; width: 44%;">الجرعة وطريقة الاستخدام (Instructions)</th>
                        <th style="padding: 6px 10px; width: 16%; text-align: center;">المدة (Duration)</th>
                    </tr>
                </thead>
                <tbody id="prTreatmentRows">
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 6px 10px; text-align: center; font-weight: bold; color: #64748b;">1</td>
                        <td style="padding: 6px 10px; font-weight: 900; color: #152C4B;">Amlodipine 5mg</td>
                        <td style="padding: 6px 10px; color: #334155;">قرص واحد يومياً صباحاً بعد الإفطار</td>
                        <td style="padding: 6px 10px; text-align: center; font-weight: bold; color: #0C6B78;">30 يوماً</td>
                    </tr>
                    <tr>
                        <td style="padding: 6px 10px; text-align: center; font-weight: bold; color: #64748b;">2</td>
                        <td style="padding: 6px 10px; font-weight: 900; color: #152C4B;">Valsartan 80mg</td>
                        <td style="padding: 6px 10px; color: #334155;">قرص واحد مساءً قبل النوم</td>
                        <td style="padding: 6px 10px; text-align: center; font-weight: bold; color: #0C6B78;">30 يوماً</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- 8. Patient Instructions & Follow-up (إرشادات المريض وموعد المراجعة) --}}
        <div style="border: 1px dashed #0C6B78; border-radius: 10px; padding: 8px 14px; margin-bottom: 16px; background-color: #fafbfc;">
            <div style="font-size: 11px; font-weight: 900; color: #0C6B78; margin-bottom: 3px;">
                إرشادات وتوجيهات الطبيب وموعد المراجعة (Doctor's Recommendations & Follow-up):
            </div>
            <div style="font-size: 11px; color: #334155; line-height: 1.5;">
                <span style="font-weight: 800; color: #152C4B;">موعد المراجعة: </span>
                <span id="prFollowUp">مراجعة العيادة بعد أسبوعين مع نتائج فحص وظائف الكلى والأملاح</span>
                <div style="font-size: 10px; color: #64748b; margin-top: 2px;">* يرجى الالتزام بتناول الأدوية في مواعيدها ومراجعة الطوارئ فوراً عند الشعور بأي ألم صدري أو ضيق تنفس حاد.</div>
            </div>
        </div>

        {{-- 9. Official Seals & Signatures (الختم والاعتماد الطبي الرقمي) --}}
        <div style="display: flex; align-items: flex-end; justify-content: space-between; border-top: 1.5px solid #cbd5e1; padding-top: 14px; margin-bottom: 14px;">
            {{-- اليمين: توقيع الطبيب المعالج --}}
            <div style="text-align: right; width: 33%;">
                <div style="font-size: 11px; font-weight: 800; color: #64748b;">توقيع واعتماد الطبيب المعالج:</div>
                <div style="font-size: 13px; font-weight: 900; color: #152C4B; margin-top: 4px;" id="prDoctorSign">د. نزار صالح</div>
                <div style="font-size: 9.5px; color: #475569;">استشاري أول أمراض القلب والأوعية الدموية</div>
                <div style="font-size: 9px; font-family: monospace; color: #64748b; margin-top: 2px;">ترخيص مزاولة المهنة: #MED-88421-YE</div>
                <div style="margin-top: 6px; font-family: cursive; font-size: 14px; color: #0C6B78; font-weight: bold;">Dr. Nezar Saleh ✓</div>
            </div>

            {{-- الوسط: الختم الطبي الرسمي الدائري --}}
            <div style="text-align: center; width: 34%;">
                <div style="display: inline-block; width: 84px; height: 84px; border: 2.5px dashed #0C6B78; border-radius: 50%; padding: 4px; box-sizing: border-box; text-align: center;">
                    <div style="width: 100%; height: 100%; border: 1px solid #0C6B78; border-radius: 50%; display: flex; flex-direction: column; align-items: center; justify-content: center; font-size: 7.5px; font-weight: 900; color: #0C6B78; line-height: 1.2;">
                        <span>مستشفى الرشيد</span>
                        <span style="font-size: 9px; color: #152C4B; margin: 1px 0;">★ معتمد ★</span>
                        <span>صنعاء - اليمن</span>
                    </div>
                </div>
                <div style="font-size: 9px; font-weight: 800; color: #64748b; margin-top: 2px;">الختم الرسمي للمستشفى</div>
            </div>

            {{-- اليسار: التوثيق الإلكتروني المشفر EMR --}}
            <div style="text-align: left; width: 33%; direction: ltr;">
                <div style="font-size: 10.5px; font-weight: 800; color: #64748b; text-align: left;">Electronic Verification:</div>
                <div style="font-size: 10px; font-family: monospace; font-weight: 800; color: #152C4B; margin-top: 3px;" id="prDocCode">#E-SIG-2026-NOTE-081</div>
                <div style="font-size: 9px; color: #64748b; margin-top: 2px;">Certified Hospital EMR Record</div>
                <div style="font-size: 8.5px; color: #94a3b8; margin-top: 2px;" id="prTimestamp">VERIFIED · 2026-11-01 08:45</div>
                {{-- Barcode Simulation --}}
                <div style="margin-top: 5px; letter-spacing: 2px; font-family: monospace; font-weight: 900; font-size: 11px; color: #152C4B;">
                    |||||| | |||| || |||||| |
                </div>
            </div>
        </div>

        {{-- 10. Institutional Footer (تذييل الوثيقة الرسمية) --}}
        <div style="border-top: 1px solid #e2e8f0; padding-top: 8px; text-align: center; font-size: 9px; color: #64748b;">
            <div style="font-weight: bold; color: #152C4B;">مستشفى الرشيد التخصصي - الجمهورية اليمنية - صنعاء - شارع حدة | هاتف: 01-445566 / 01-445577 | طوارئ: 199</div>
            <div style="margin-top: 2px; color: #94a3b8;">وثيقة طبية رسمية معتمدة صادرة إلكترونياً عن نظام السجلات الطبية EMR ومطابقة للملف الصحي الأصلي للمريض.</div>
        </div>

    </div>
</div>

{{-- =========================================================================
     STYLES: حزمة الأنيميشن وقواعد الطباعة الرسمية الصارمة A4
     ========================================================================= --}}
<style>
    /* انسياب تحميل الصفحة */
    @keyframes notesPageFadeInAnim {
        from { opacity: 0; transform: translateY(5px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .notes-page-fade-in {
        animation: notesPageFadeInAnim 0.35s ease-out forwards;
    }

    /* انسياب ظهور المودال المنبثق */
    @keyframes modalScaleInAnim {
        from {
            opacity: 0;
            transform: scale(0.95) translateY(8px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    .anim-modal-pop {
        animation: modalScaleInAnim 0.22s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* تعتيم الخلفية للمودال */
    @keyframes overlayFadeInAnim {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .anim-overlay {
        animation: overlayFadeInAnim 0.18s ease-out forwards;
    }

    /* ══════════════════════════════════════════════════
       قواعد الطباعة الرسمية A4 الصارمة: إخفاء كل الموقع وإظهار الفورم الرسمي فقط
       ══════════════════════════════════════════════════ */
    @media print {
        @page {
            size: A4 portrait;
            margin: 8mm 10mm;
        }
        
        /* إخفاء كامل الموقع وقوائمه وعناصره تماماً */
        body > *:not(#officialClinicalPrintReport) {
            display: none !important;
        }

        /* إخفاء أي عنصر يحمل كلاس no-print */
        .no-print, #newNoteModal, #noteDetailsModal, #notesActionToast, #main-sidebar, header, nav {
            display: none !important;
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

        /* إظهار الفورم الرسمي في قمة الصفحة A4 بدقة */
        #officialClinicalPrintReport {
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

        #officialClinicalPrintReport * {
            visibility: visible !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    }
</style>

{{-- =========================================================================
     7. دوال الجافاسكريبت التفاعلية
     ========================================================================= --}}
<script>
    // المتغير العام لتخزين الملاحظة المفتوحة حالياً
    let currentActiveNote = null;

    // دالة الإشعار التفاعلي الحركي السلس
    function showNotificationToast(msg) {
        const toast = document.getElementById('notesActionToast');
        const msgEl = document.getElementById('notesActionToastMsg');
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

    // دوال مودال تدوين الملاحظة الجديدة
    function openNewNoteModal() {
        document.getElementById('newNoteModal').classList.remove('hidden');
    }

    function closeNewNoteModal() {
        document.getElementById('newNoteModal').classList.add('hidden');
    }

    function saveQuickNote(e) {
        e.preventDefault();
        closeNewNoteModal();
        showNotificationToast('{{ $isRtl ? "تم توثيق الملاحظة الطبية في ملف المريض بنجاح!" : "Clinical note saved to patient record successfully!" }}');
    }

    // دوال مودال التفاصيل على الشاشة
    function openNoteDetailsModal(note) {
        currentActiveNote = note;

        document.getElementById('modalNoteNumber').innerText = note.note_number;
        document.getElementById('modalPatientName').innerText = note.patient;
        
        const avatarEl = document.getElementById('modalPatientAvatar');
        if (avatarEl) {
            avatarEl.innerText = note.patient.charAt(0);
        }

        const metaEl = document.getElementById('modalPatientMeta');
        if (metaEl) {
            metaEl.innerText = (note.gender_age || '') + ' · {{ $isRtl ? "عيادة القلب 204" : "Cardiology Suite 204" }}';
        }

        const mrnEl = document.getElementById('modalPatientMRN');
        if (mrnEl) {
            mrnEl.innerText = note.mrn || 'MRN-88421';
        }

        document.getElementById('modalNoteDate').innerText = note.date;
        document.getElementById('modalDiagnosis').innerText = note.diagnosis;
        document.getElementById('modalClinicalNote').innerText = note.clinical_note || '-';

        const statusEl = document.getElementById('modalNoteStatus');
        statusEl.innerText = note.status_label;
        if (note.status === 'completed') {
            statusEl.className = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#E5FAFC] text-[#0C6B78] border border-teal-100';
        } else {
            statusEl.className = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-200';
        }

        const planList = document.getElementById('modalTreatmentPlanList');
        planList.innerHTML = '';
        if (note.treatment_plan && note.treatment_plan.length > 0) {
            note.treatment_plan.forEach(item => {
                const row = document.createElement('div');
                row.className = 'p-2.5 rounded-xl bg-slate-50/80 border border-slate-200/90 flex items-start justify-between gap-3 text-xs';
                row.innerHTML = `
                    <div>
                        <div class="font-bold text-[#152C4B]">${item.medication}</div>
                        <div class="text-slate-600 text-[11px] mt-0.5">${item.instructions} ${item.duration ? '· ' + item.duration : ''}</div>
                    </div>
                    <span class="px-2 py-0.5 rounded-md bg-[#E5FAFC] text-[#0C6B78] font-mono text-[10px] font-bold border border-teal-100">Rx</span>
                `;
                planList.appendChild(row);
            });
        } else {
            planList.innerHTML = '<div class="text-xs text-slate-400 italic p-2">{{ $isRtl ? "لا توجد أدوية موصوفة لهذه الحالة." : "No medications prescribed for this case." }}</div>';
        }

        // تعبئة الفورم الرسمي للطباعة مسبقاً
        populateOfficialPrintForm(note);

        document.getElementById('noteDetailsModal').classList.remove('hidden');
    }

    function closeNoteDetailsModal() {
        document.getElementById('noteDetailsModal').classList.add('hidden');
    }

    // دالة تعبئة بيانات المريض الشاملة في الفورم الرسمي للطباعة
    function populateOfficialPrintForm(note) {
        if (!note) return;

        // البيانات الرئيسية
        document.getElementById('prNoteNumber').innerText = note.note_number || 'NOTE-2026-081';
        document.getElementById('prPatientName').innerText = note.patient || '-';
        document.getElementById('prPatientMRN').innerText = note.mrn || 'MRN-88421';
        document.getElementById('prNationalId').innerText = note.national_id || '1084920194';
        document.getElementById('prGenderAge').innerText = note.gender_age || '-';
        document.getElementById('prBloodType').innerText = note.blood_type || 'A+';
        document.getElementById('prPhone').innerText = note.phone || '+967 77 123 4567';
        document.getElementById('prDoctorName').innerText = note.doctor || 'د. نزار صالح';
        document.getElementById('prDoctorSign').innerText = note.doctor || 'د. نزار صالح';
        document.getElementById('prNoteDate').innerText = note.date || '-';
        document.getElementById('prDiagnosis').innerText = note.diagnosis || '-';
        
        // استخراج رمز ICD إذا وجد
        const icdMatch = note.diagnosis ? note.diagnosis.match(/\(([A-Z0-9\.]+)\)/i) : null;
        document.getElementById('prDiagnosisICD').innerText = icdMatch ? 'ICD-10: ' + icdMatch[1] : 'ICD-10: Clinical';
        
        document.getElementById('prClinicalNote').innerText = note.clinical_note || 'تم الفحص والمعاينة السريرية والمؤشرات الحيوية ضمن المعدل الطبيعي.';
        document.getElementById('prFollowUp').innerText = note.follow_up || 'مراجعة العيادة بعد أسبوعين من تاريخه.';
        
        // المؤشرات الحيوية
        if (note.vitals) {
            document.getElementById('prVitalsBP').innerText = note.vitals.bp || '130/80 mmHg';
            document.getElementById('prVitalsPulse').innerText = note.vitals.pulse || '76 bpm';
            document.getElementById('prVitalsTemp').innerText = note.vitals.temp || '36.8 °C';
            document.getElementById('prVitalsSpO2').innerText = note.vitals.spo2 || '98%';
        }

        // كود التوثيق
        document.getElementById('prDocCode').innerText = '#E-SIG-' + (note.note_number ? note.note_number.replace('NOTE-', '') : '2026') + '-CLINIC';
        
        const now = new Date();
        const dateStr = now.getFullYear() + '-' + String(now.getMonth() + 1).padStart(2, '0') + '-' + String(now.getDate()).padStart(2, '0');
        document.getElementById('prReportPrintDate').innerText = dateStr;
        document.getElementById('prTimestamp').innerText = 'VERIFIED · ' + dateStr + ' ' + String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0');

        // جدول الأدوية الرسمي
        const treatmentRows = document.getElementById('prTreatmentRows');
        treatmentRows.innerHTML = '';
        if (note.treatment_plan && note.treatment_plan.length > 0) {
            note.treatment_plan.forEach((item, index) => {
                const tr = document.createElement('tr');
                tr.style.borderBottom = '1px solid #e2e8f0';
                tr.innerHTML = `
                    <td style="padding: 6px 10px; text-align: center; font-weight: bold; color: #64748b;">${index + 1}</td>
                    <td style="padding: 6px 10px; font-weight: 900; color: #152C4B;">${item.medication}</td>
                    <td style="padding: 6px 10px; color: #334155;">${item.instructions}</td>
                    <td style="padding: 6px 10px; text-align: center; font-weight: bold; color: #0C6B78;">${item.duration || '30 يوماً'}</td>
                `;
                treatmentRows.appendChild(tr);
            });
        } else {
            treatmentRows.innerHTML = `
                <tr>
                    <td colspan="4" style="padding: 10px; text-align: center; color: #94a3b8; font-style: italic;">لا توجد وصفات دوائية مسجلة في هذا التقرير.</td>
                </tr>
            `;
        }
    }

    // دالة أمر الطباعة الرسمية
    function printMedicalNote(note) {
        populateOfficialPrintForm(note);
        setTimeout(() => {
            window.print();
        }, 150);
    }

    // الطباعة من داخل نافذة المعاينة
    function printFromCurrentModal() {
        if (currentActiveNote) {
            populateOfficialPrintForm(currentActiveNote);
        }
        setTimeout(() => {
            window.print();
        }, 150);
    }

    // البحث الفوري التفاعلي في الجدول
    function searchNotesTable() {
        const query = document.getElementById('notesSearchInput').value.toLowerCase();
        const rows = document.querySelectorAll('.note-table-row');
        rows.forEach(row => {
            const data = row.getAttribute('data-search') || '';
            row.style.display = data.includes(query) ? '' : 'none';
        });
    }

    // تصفية التبويبات الفورية
    function filterNotesByTab(type, clickedBtn) {
        document.querySelectorAll('.note-filter-tab').forEach(btn => {
            btn.className = 'note-filter-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-white text-slate-600 border border-slate-200 hover:bg-[#E5FAFC] hover:text-[#0C6B78]';
            const counter = btn.querySelector('span:last-child');
            if (counter) {
                counter.className = 'text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-slate-100 text-slate-500 font-bold';
            }
        });

        const activeBtn = clickedBtn || (window.event ? window.event.currentTarget : null);
        if (activeBtn) {
            activeBtn.className = 'note-filter-tab px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap cursor-pointer bg-[#0C6B78] text-white shadow-xs';
            const activeCounter = activeBtn.querySelector('span:last-child');
            if (activeCounter) {
                activeCounter.className = 'text-[10px] px-1.5 py-0.2 rounded-md font-mono bg-white/20 text-white font-bold';
            }
        }

        const rows = document.querySelectorAll('.note-table-row');
        rows.forEach(row => {
            const status = row.getAttribute('data-status');
            const dateType = row.getAttribute('data-date');
            if (type === 'all') {
                row.style.display = '';
            } else if (type === 'today') {
                row.style.display = (dateType === 'today') ? '' : 'none';
            } else if (type === 'completed') {
                row.style.display = (status === 'completed') ? '' : 'none';
            } else if (type === 'follow_up') {
                row.style.display = (status === 'follow_up') ? '' : 'none';
            }
        });
    }

    // إغلاق أي نافذة مفتوحة عند الضغط على زر ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeNewNoteModal();
            closeNoteDetailsModal();
        }
    });
</script>
@endsection
