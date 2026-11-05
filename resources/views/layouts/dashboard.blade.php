<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mawidi | @yield('page-title', __('Dashboard'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600;700;800;900&family=IBM+Plex+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind CDN لضمان عمل التصميم الفوري بدون أخطاء -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        navy: { 900: '#152C4B', 800: '#1E3A5F', 950: '#0A1628' },
                        teal: { 50: '#E5FAFC', 100: '#CCF4F8', 400: '#2DD4C6', 500: '#14AFC3', 600: '#108D9D', 700: '#0C6B78' }
                    },
                    fontFamily: {
                        sans: ['Inter', 'Cairo', 'sans-serif'],
                        mono: ['IBM Plex Mono', 'monospace']
                    }
                }
            }
        }
    </script>

    <style>
        /* الخط الافتراضي للإنجليزية هو Inter وللعربية Cairo */
        * { font-family: 'Inter', sans-serif; }
        [dir="rtl"] * { font-family: 'Cairo', 'Inter', sans-serif; }
        .font-mono { font-family: 'IBM Plex Mono', monospace !important; }

        :root {
            --teal:   #14AFC3;
            --teal-d: #0C6B78;
            --navy:   #152C4B;
        }

        body { background-color: #F4F7FA; color: #152C4B; }

        /* شريط التمرير المخصص */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(20,175,195,0.25); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #14AFC3; }

        /* ضبط حركة القائمة الجانبية في الشاشات الصغيرة للمسارين RTL و LTR */
        @media (max-width: 1023px) {
            #main-sidebar {
                transform: translateX(-100%);
            }
            [dir="rtl"] #main-sidebar {
                transform: translateX(100%);
            }
            #main-sidebar.sidebar-open {
                transform: translateX(0) !important;
            }
        }
    </style>

    {{-- مكدس الأنماط المخصصة للصفحات الفرعية --}}
    @stack('styles')
</head>
<body class="antialiased selection:bg-[#14AFC3] selection:text-white">

<div class="min-h-screen flex relative">

    {{-- خلفية تظليل للموبايل عند فتح القائمة --}}
    <div id="sidebar-overlay" 
         onclick="toggleSidebar()" 
         class="fixed inset-0 bg-black/50 backdrop-blur-xs z-40 hidden lg:hidden transition-opacity"></div>

    {{-- ══════════════════════════════════════════
         SIDEBAR (متجاوب: ثابت في الكمبيوتر، ومنزلق في الجوال)
    ══════════════════════════════════════════ --}}
    <aside id="main-sidebar"
           class="fixed inset-y-0 start-0 z-50 w-64 text-white flex flex-col justify-between transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:h-screen lg:shrink-0"
           style="background: linear-gradient(175deg, #0A1628 0%, #152C4B 60%, #0C6B78 120%);
                  box-shadow: 4px 0 24px rgba(10,22,40,0.15);">
        
        <div class="flex-1 overflow-y-auto">
            {{-- Brand Logo & زر إغلاق للجوال --}}
            <div class="px-6 py-5 flex items-center justify-between border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                         style="background: linear-gradient(135deg, #14AFC3, #0C6B78);
                                box-shadow: 0 4px 14px rgba(20,175,195,0.4);">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="4" width="18" height="17" rx="3" fill="white" fill-opacity="0.92"/>
                            <path d="M16 2v4M8 2v4" stroke="#14AFC3" stroke-width="2" stroke-linecap="round"/>
                            <path d="M3 10h18" stroke="#14AFC3" stroke-width="1.5"/>
                            <circle cx="16" cy="17" r="3" fill="#14AFC3"/>
                            <path d="M16 15.5v3M14.5 17h3" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-baseline gap-1">
                            <span class="font-black text-[18px] tracking-tight leading-none text-white">Mawidi</span>
                            <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                        </div>
                        <div class="font-mono text-[9px] font-bold uppercase tracking-[.16em] text-teal-100/70 mt-1">
                            Hospital OS
                        </div>
                    </div>
                </div>

                {{-- زر إغلاق القائمة في الموبايل --}}
                <button type="button" onclick="toggleSidebar()" class="lg:hidden text-white/60 hover:text-white p-1 cursor-pointer" title="{{ __('Close') }}">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            {{-- Navigation Menu --}}
            <div class="px-6 mt-6 mb-2 text-[10px] font-bold tracking-widest text-white/40 uppercase font-mono">
                {{ __('Main Menu') }}
            </div>

            <nav class="px-3.5 space-y-1">
                @yield('sidebar-links')
            </nav>
        </div>

        {{-- Bottom User Profile Card --}}
        <div class="p-4 border-t border-white/10 bg-black/10">
            <div class="rounded-2xl bg-white/5 p-3 flex items-center gap-3 border border-white/5">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-[13px] font-black text-white flex-shrink-0"
                     style="background: linear-gradient(135deg, #14AFC3, #0C6B78);">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                </div>
                <div class="min-w-0 flex-1">
                    <div class="text-white text-[13px] font-bold truncate leading-tight">
                        {{ Auth::user()->name ?? __('Staff User') }}
                    </div>
                    <div class="inline-flex items-center gap-1 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#14AFC3]"></span>
                        <span class="text-[10.5px] font-medium text-teal-100/80 capitalize">
                            @hasSection('role-label')
                                @yield('role-label')
                            @else
                                {{ __(Auth::user()->role ?? 'Staff') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    {{-- ══════════════════════════════════════════
         MAIN CONTENT WRAPPER
    ══════════════════════════════════════════ --}}
    <div class="flex-1 min-w-0 flex flex-col overflow-hidden">

        {{-- TOPBAR --}}
        <header class="bg-white flex items-center justify-between px-4 sm:px-8 py-3 sticky top-0 z-30 border-b border-gray-100 shadow-sm gap-3">
            
            <div class="flex items-center gap-3 flex-1 min-w-0 max-w-md">
                {{-- زر Hamburger لفتح القائمة في الجوال والتابلت --}}
                <button type="button" 
                        onclick="toggleSidebar()" 
                        class="lg:hidden p-2 rounded-xl text-[#152C4B] hover:bg-gray-100 transition flex-shrink-0 cursor-pointer"
                        title="{{ __('Open Menu') }}">
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </button>

                <!-- Search Bar -->
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 ps-3 flex items-center pointer-events-none text-gray-400">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="M21 21l-4.35-4.35"/>
                        </svg>
                    </div>
                    <input type="text" 
                           class="block w-full py-1.5 sm:py-2 ps-9 pe-3 bg-[#F4F7FA] border border-transparent rounded-xl text-[12.5px] sm:text-[13.5px] font-semibold text-[#152C4B] placeholder-gray-400 focus:bg-white focus:border-[#14AFC3] focus:ring-2 focus:ring-[#14AFC3]/10 outline-none transition-all" 
                           placeholder="{{ __('Search...') }}">
                </div>
            </div>
            
            <!-- Right Actions Section -->
            <div class="flex items-center gap-2 sm:gap-4 flex-shrink-0">
                
                <!-- Language Switcher Pill (يعمل فعلياً عبر مسار lang.switch) -->
                <div class="flex bg-gray-100/80 p-0.5 sm:p-1 rounded-xl border border-gray-200/50">
                    <a href="{{ Route::has('lang.switch') ? route('lang.switch', 'en') : '?lang=en' }}"
                       class="text-[10.5px] sm:text-[11px] font-bold px-2.5 py-0.5 sm:py-1 rounded-lg transition {{ app()->getLocale() === 'en' ? 'bg-white shadow-sm text-[#14AFC3]' : 'text-gray-500 hover:text-[#152C4B]' }}">
                        EN
                    </a>
                    <a href="{{ Route::has('lang.switch') ? route('lang.switch', 'ar') : '?lang=ar' }}"
                       class="text-[10.5px] sm:text-[11px] font-bold px-2.5 py-0.5 sm:py-1 rounded-lg transition {{ app()->getLocale() === 'ar' ? 'bg-white shadow-sm text-[#14AFC3]' : 'text-gray-500 hover:text-[#152C4B]' }}">
                        العربية
                    </a>
                </div>

                <!-- Dynamic CTA Button based on Role (يختفي في الشاشات الصغيرة لتوفير المساحة) -->
                @if(auth()->check() && auth()->user()->role === 'receptionist')
                    <a href="{{ Route::has('receptionist.patients.create') ? route('receptionist.patients.create') : '#' }}" 
                       class="hidden md:flex items-center gap-2 px-3.5 py-1.5 rounded-xl text-white text-[12px] font-bold transition hover:-translate-y-0.5 cursor-pointer"
                       style="background: linear-gradient(135deg, #14AFC3, #0C6B78);
                              box-shadow: 0 4px 14px rgba(20,175,195,0.35);">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        {{ __('New Patient') }}
                    </a>
                @elseif(auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->role === 'Super Administrator'))
                    <a href="{{ Route::has('admin.users.index') ? route('admin.users.index') : '#' }}" 
                       class="hidden md:flex items-center gap-2 px-3.5 py-1.5 rounded-xl text-white text-[12px] font-bold transition hover:-translate-y-0.5 cursor-pointer"
                       style="background: linear-gradient(135deg, #14AFC3, #0C6B78);
                              box-shadow: 0 4px 14px rgba(20,175,195,0.35);">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        {{ __('New Account') }}
                    </a>
                @endif
                
                <!-- Notification Bell with Dropdown Menu -->
                <div class="relative">
                    <button type="button" 
                            id="notificationBellBtn"
                            onclick="toggleNotificationsDropdown()"
                            class="relative w-8 h-8 sm:w-9 sm:h-9 rounded-xl flex items-center justify-center text-gray-400 hover:text-[#152C4B] hover:bg-gray-100 transition cursor-pointer" 
                            title="{{ __('Notifications') }}">
                        <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-1.5 end-1.5 w-2 h-2 bg-rose-500 rounded-full border-2 border-white animate-pulse"></span>
                    </button>

                    {{-- Notifications Popover --}}
                    <div id="notificationsDropdown" 
                         class="hidden absolute end-0 mt-2 w-80 sm:w-96 bg-white rounded-2xl shadow-xl border border-gray-100 z-50 overflow-hidden animate-in fade-in zoom-in-95 duration-150">
                        <div class="p-4 border-b border-gray-100 flex items-center justify-between bg-slate-50/60">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-xs sm:text-sm text-[#152C4B]">{{ __('Notifications') }}</span>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#E5FAFC] text-[#0C6B78]">3 {{ __('New') }}</span>
                            </div>
                            <a href="{{ Route::has('admin.notifications.index') ? route('admin.notifications.index') : '#' }}" 
                               class="text-xs text-[#14AFC3] font-bold hover:underline">
                                {{ __('View All') }}
                            </a>
                        </div>
                        <div class="divide-y divide-gray-100 max-h-72 overflow-y-auto">
                            <div class="p-3.5 hover:bg-slate-50 transition flex items-start gap-3">
                                <span class="w-2 h-2 rounded-full bg-rose-500 mt-1.5 flex-shrink-0"></span>
                                <div class="space-y-0.5 min-w-0">
                                    <div class="text-xs font-bold text-[#152C4B] truncate">{{ __('Code Blue Alert - ICU Bed 04') }}</div>
                                    <div class="text-[11px] text-gray-500">{{ __('Critical telemetry broadcast dispatched') }}</div>
                                    <div class="text-[10px] text-gray-400 font-mono">10:45 AM</div>
                                </div>
                            </div>
                            <div class="p-3.5 hover:bg-slate-50 transition flex items-start gap-3">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 mt-1.5 flex-shrink-0"></span>
                                <div class="space-y-0.5 min-w-0">
                                    <div class="text-xs font-bold text-[#152C4B] truncate">{{ __('System Backup Completed') }}</div>
                                    <div class="text-[11px] text-gray-500">{{ __('Full encrypted snapshot stored securely') }}</div>
                                    <div class="text-[10px] text-gray-400 font-mono">08:00 AM</div>
                                </div>
                            </div>
                            <div class="p-3.5 hover:bg-slate-50 transition flex items-start gap-3">
                                <span class="w-2 h-2 rounded-full bg-[#14AFC3] mt-1.5 flex-shrink-0"></span>
                                <div class="space-y-0.5 min-w-0">
                                    <div class="text-xs font-bold text-[#152C4B] truncate">{{ __('New Doctor Roster Approved') }}</div>
                                    <div class="text-[11px] text-gray-500">{{ __('Shift schedule updated for Cardiology') }}</div>
                                    <div class="text-[10px] text-gray-400 font-mono">Yesterday</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Profile & Logout Section -->
                <div class="flex items-center gap-2 ps-2 sm:ps-3 border-s border-gray-200">
                    @php
                        $userProfileRoute = '#';
                        if (auth()->check()) {
                            $userRole = auth()->user()->role ?? '';
                            if (in_array($userRole, ['admin', 'Super Administrator']) && Route::has('admin.settings.index')) {
                                $userProfileRoute = route('admin.settings.index');
                            } elseif (Route::has('profile.edit')) {
                                $userProfileRoute = route('profile.edit');
                            }
                        }
                    @endphp
                    <a href="{{ $userProfileRoute }}" 
                       class="w-7 h-7 sm:w-8 sm:h-8 rounded-xl overflow-hidden border border-gray-200 flex-shrink-0 hover:ring-2 hover:ring-[#14AFC3] transition"
                       title="{{ __('Profile Settings') }}">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'U') }}&background=14afc3&color=fff&bold=true" 
                             alt="Avatar" class="w-full h-full object-cover">
                    </a>

                    <form method="POST" action="{{ Route::has('logout') ? route('logout') : '#' }}" class="m-0 p-0">
                        @csrf
                        <button type="submit" 
                                class="text-[12px] font-bold text-gray-400 hover:text-rose-600 transition flex items-center gap-1 p-1 cursor-pointer"
                                title="{{ __('Log out') }}">
                            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="rtl:rotate-180">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span class="hidden lg:inline">{{ __('Logout') }}</span>
                        </button>
                    </form>
                </div>

            </div>
        </header>

        {{-- PAGE CONTENT (هوامش مريحة للجوال والشاشات الكبيرة) --}}
        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>
        
    </div>
</div>

{{-- سكريبت فتح وإغلاق القائمة في الجوال متوافق 100% مع الاتجاهين --}}
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('main-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        sidebar.classList.toggle('sidebar-open');
        overlay.classList.toggle('hidden');
    }

    function toggleNotificationsDropdown() {
        const dd = document.getElementById('notificationsDropdown');
        if (dd) {
            dd.classList.toggle('hidden');
        }
    }

    // إغلاق قائمة الإشعارات عند النقر في أي مكان خارجها
    document.addEventListener('click', function(e) {
        const bellBtn = document.getElementById('notificationBellBtn');
        const dd = document.getElementById('notificationsDropdown');
        if (dd && bellBtn && !bellBtn.contains(e.target) && !dd.contains(e.target)) {
            dd.classList.add('hidden');
        }
    });
</script>

{{-- ══════════════════════════════════════════════════════════════
     مكدس السكريبتات الهام جداً (ضروري لتشغيل سكريبتات الصفحات الفرعية مثل التبويبات والمودلز)
══════════════════════════════════════════════════════════════ --}}
@stack('scripts')

</body>
</html>