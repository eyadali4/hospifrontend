<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * عرض صفحة تسجيل الدخول.
     */
    public function create(): \Illuminate\View\View
    {
        return view('auth.login');
    }

    /**
     * محاولة تسجيل الدخول باستخدام رقم الموظف (employee_id) والرمز (password).
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validate([
            'employee_id' => ['required', 'string'],
            'password'    => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (! Auth::attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'employee_id' => __('The Employee ID or Access Code you entered is incorrect.'),
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    /**
     * تسجيل الخروج.
     */
    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
