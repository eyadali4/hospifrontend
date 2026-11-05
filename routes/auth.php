<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication (custom, no Breeze)
|--------------------------------------------------------------------------
| نظام دخول بسيط بدون Laravel Breeze — بدون تسجيل حساب عام، بدون "نسيت
| كلمة المرور". الموظف يدخل بـ Employee ID + Access Code التي يعطيه
| إياها الأدمن.
*/

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
