<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Public & Language Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

/*
|--------------------------------------------------------------------------
| Dashboard Role Redirect
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return match (Auth::user()->role ?? null) {
        'admin'        => redirect()->route('admin.dashboard'),
        'manager'      => redirect()->route('manager.dashboard'),
        'doctor'       => redirect()->route('doctor.dashboard'),
        'receptionist' => redirect()->route('receptionist.dashboard'),
        default        => abort(403, 'No role assigned to this user.'),
    };
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| 1. ADMIN ROUTES (كامل مسارات مدير النظام)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

    // Users Management
    Route::get('/users', fn () => view()->exists('admin.users.index') ? view('admin.users.index') : view('admin.dashboard'))->name('users.index');
    Route::get('/users/create', fn () => view()->exists('admin.users.create') ? view('admin.users.create') : redirect()->route('admin.users.index'))->name('users.create');
    Route::post('/users', fn () => back()->with('success', 'User created'))->name('users.store');
    Route::get('/users/{id}/edit', fn ($id) => view()->exists('admin.users.edit') ? view('admin.users.edit', compact('id')) : redirect()->route('admin.users.index'))->name('users.edit');
    Route::put('/users/{id}', fn ($id) => back()->with('success', 'User updated'))->name('users.update');
    Route::delete('/users/{id}', fn ($id) => back()->with('success', 'User deleted'))->name('users.destroy');

    // Doctors Management
    Route::get('/doctors', fn () => view()->exists('admin.doctors.index') ? view('admin.doctors.index') : view('admin.dashboard'))->name('doctors.index');
    Route::get('/doctors/create', fn () => view()->exists('admin.doctors.create') ? view('admin.doctors.create') : redirect()->route('admin.doctors.index'))->name('doctors.create');
    Route::post('/doctors', fn () => back()->with('success', 'Doctor created'))->name('doctors.store');
    Route::get('/doctors/{id}', fn ($id) => view()->exists('admin.doctors.show') ? view('admin.doctors.show', compact('id')) : redirect()->route('admin.doctors.index'))->name('doctors.show');
    Route::get('/doctors/{id}/edit', fn ($id) => view()->exists('admin.doctors.edit') ? view('admin.doctors.edit', compact('id')) : redirect()->route('admin.doctors.index'))->name('doctors.edit');
    Route::put('/doctors/{id}', fn ($id) => back()->with('success', 'Doctor updated'))->name('doctors.update');
    Route::delete('/doctors/{id}', fn ($id) => back()->with('success', 'Doctor deleted'))->name('doctors.destroy');

    // Departments Management
    Route::get('/departments', fn () => view()->exists('admin.departments.index') ? view('admin.departments.index') : view('admin.dashboard'))->name('departments.index');
    Route::get('/departments/create', fn () => view()->exists('admin.departments.create') ? view('admin.departments.create') : redirect()->route('admin.departments.index'))->name('departments.create');
    Route::post('/departments', fn () => back()->with('success', 'Department created'))->name('departments.store');
    Route::get('/departments/{id}/edit', fn ($id) => view()->exists('admin.departments.edit') ? view('admin.departments.edit', compact('id')) : redirect()->route('admin.departments.index'))->name('departments.edit');
    Route::put('/departments/{id}', fn ($id) => back()->with('success', 'Department updated'))->name('departments.update');
    Route::delete('/departments/{id}', fn ($id) => back()->with('success', 'Department deleted'))->name('departments.destroy');

    // Appointments Management
    Route::get('/appointments', fn () => view()->exists('admin.appointments.index') ? view('admin.appointments.index') : view('admin.dashboard'))->name('appointments.index');
    Route::get('/appointments/create', fn () => view()->exists('admin.appointments.create') ? view('admin.appointments.create') : redirect()->route('admin.appointments.index'))->name('appointments.create');
    Route::post('/appointments', fn () => back()->with('success', 'Appointment created'))->name('appointments.store');
    Route::get('/appointments/{id}', fn ($id) => view()->exists('admin.appointments.show') ? view('admin.appointments.show', compact('id')) : redirect()->route('admin.appointments.index'))->name('appointments.show');
    Route::delete('/appointments/{id}', fn ($id) => back()->with('success', 'Appointment deleted'))->name('appointments.destroy');

    // Reports & Analytics
    Route::get('/reports', fn () => view()->exists('admin.reports.index') ? view('admin.reports.index') : view('admin.dashboard'))->name('reports.index');
    Route::get('/reports/export', fn () => back()->with('success', 'Export initiated'))->name('reports.export');

    // Notifications
    Route::get('/notifications', fn () => view()->exists('admin.notifications.index') ? view('admin.notifications.index') : view('admin.dashboard'))->name('notifications.index');
    Route::post('/notifications/mark-all-read', fn () => back()->with('success', 'All marked as read'))->name('notifications.markAllRead');

    // Account & Security Settings
    Route::get('/settings', fn () => view()->exists('admin.settings.index') ? view('admin.settings.index') : view('admin.dashboard'))->name('settings.index');
    Route::put('/settings/profile', fn () => back()->with('success', app()->getLocale() === 'ar' ? 'تم تحديث البيانات الشخصية بنجاح!' : 'Profile updated successfully!'))->name('settings.profile.update');
    Route::put('/settings/password', fn () => back()->with('success', app()->getLocale() === 'ar' ? 'تم تغيير كلمة المرور بنجاح!' : 'Password changed successfully!'))->name('settings.password.update');
    Route::post('/settings/sessions/terminate', fn () => back()->with('success', app()->getLocale() === 'ar' ? 'تم إنهاء جميع الجلسات الأخرى بنجاح!' : 'Other sessions terminated successfully!'))->name('settings.sessions.terminate');
});

/*
|--------------------------------------------------------------------------
| 2. HOSPITAL MANAGER ROUTES (كامل مسارات مدير المستشفى التشغيلية)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('manager')->name('manager.')->group(function () {
    // لوحة القيادة التشغيلية
    Route::get('/dashboard', fn () => view('manager.dashboard'))->name('dashboard');

    // أعباء الأقسام والأسرة
    Route::get('/departments', fn () => view()->exists('manager.departments.index') ? view('manager.departments.index') : view('manager.dashboard'))->name('departments.index');
    Route::post('/departments/reallocate', fn () => back()->with('success', app()->getLocale() === 'ar' ? 'تم تعديل السعة الاستيعابية بنجاح' : 'Capacity updated'))->name('departments.reallocate');

    // مؤشرات أوقات الانتظار والطوابير
    Route::get('/waiting-time', fn () => view()->exists('manager.waiting-time.index') ? view('manager.waiting-time.index') : view('manager.dashboard'))->name('waiting-time.index');

    // التقارير والمؤشرات التشغيلية
    Route::get('/reports', fn () => view()->exists('manager.reports.index') ? view('manager.reports.index') : view('manager.dashboard'))->name('reports.index');
    Route::get('/reports/export', fn () => back()->with('success', app()->getLocale() === 'ar' ? 'جاري تصدير التقرير التشغيلي...' : 'Exporting operational report...'))->name('reports.export');

    // دليل الكادر الطبي والمناوبات (عرض فقط)
    Route::get('/staff', fn () => view()->exists('manager.staff.index') ? view('manager.staff.index') : view('manager.dashboard'))->name('staff.index');

    // التحليلات التشغيلية
    Route::get('/analytics', fn () => view()->exists('manager.analytics.index') ? view('manager.analytics.index') : view('manager.dashboard'))->name('analytics.index');

    // اتخاذ القرارات والمصادقات الإدارية
    Route::post('/approvals/decide', fn () => back()->with('success', app()->getLocale() === 'ar' ? 'تمت المصادقة على القرار بنجاح' : 'Decision authorized'))->name('approvals.decide');
});

/*
|--------------------------------------------------------------------------
| 3. DOCTOR ROUTES (كامل مسارات الطبيب)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', fn () => view('doctor.dashboard'))->name('dashboard');

    Route::get('/schedule', fn () => view()->exists('doctor.schedule.index') ? view('doctor.schedule.index') : view('doctor.dashboard'))->name('schedule.index');
    
    Route::get('/patients', fn () => view()->exists('doctor.patients.index') ? view('doctor.patients.index') : view('doctor.dashboard'))->name('patients.index');
    Route::get('/patients/{id}', fn ($id) => view()->exists('doctor.patients.show') ? view('doctor.patients.show', compact('id')) : view('doctor.dashboard'))->name('patients.show');

    Route::get('/notes', fn () => view()->exists('doctor.notes.index') ? view('doctor.notes.index') : view('doctor.dashboard'))->name('notes.index');
    Route::get('/notes/create', fn () => view()->exists('doctor.notes.create') ? view('doctor.notes.create') : redirect()->route('doctor.notes.index'))->name('notes.create');
    Route::post('/notes', fn () => back()->with('success', 'Medical note saved'))->name('notes.store');

    Route::get('/prescriptions', fn () => view()->exists('doctor.prescriptions.index') ? view('doctor.prescriptions.index') : view('doctor.dashboard'))->name('prescriptions.index');
    Route::post('/prescriptions', fn () => back()->with('success', 'Prescription issued'))->name('prescriptions.store');
});

/*
|--------------------------------------------------------------------------
| 4. RECEPTIONIST ROUTES (كامل مسارات موظف الاستقبال)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('receptionist')->name('receptionist.')->group(function () {
    Route::get('/dashboard', fn () => view('receptionist.dashboard'))->name('dashboard');

    // Patients
    Route::get('/patients', fn () => view()->exists('receptionist.patients.index') ? view('receptionist.patients.index') : view('receptionist.dashboard'))->name('patients.index');
    Route::get('/patients/create', fn () => view()->exists('receptionist.patients.create') ? view('receptionist.patients.create') : redirect()->route('receptionist.patients.index'))->name('patients.create');
    Route::post('/patients', fn () => back()->with('success', 'Patient registered'))->name('patients.store');
    Route::get('/patients/{id}', fn ($id) => view()->exists('receptionist.patients.show') ? view('receptionist.patients.show', compact('id')) : view('receptionist.dashboard'))->name('patients.show');

    // Appointments
    Route::get('/appointments', fn () => view()->exists('receptionist.appointments.index') ? view('receptionist.appointments.index') : view('receptionist.dashboard'))->name('appointments.index');
    Route::get('/appointments/create', fn () => view()->exists('receptionist.appointments.create') ? view('receptionist.appointments.create') : redirect()->route('receptionist.appointments.index'))->name('appointments.create');
    Route::post('/appointments', fn () => back()->with('success', 'Appointment booked'))->name('appointments.store');

    // Queue
    Route::get('/queue', fn () => view()->exists('receptionist.queue.index') ? view('receptionist.queue.index') : view('receptionist.dashboard'))->name('queue.index');
    Route::post('/queue/checkin', fn () => back()->with('success', 'Patient checked in'))->name('queue.checkin');
    Route::post('/queue/call/{id}', fn ($id) => back()->with('success', 'Patient called'))->name('queue.call');
});

require __DIR__.'/auth.php';