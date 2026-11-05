<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * عرض صفحة إعدادات الحساب.
     */
    public function edit(Request $request): \Illuminate\View\View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * تحديث الاسم و/أو الرمز (access code).
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name'             => ['required', 'string', 'max:255'],
            'password'         => ['nullable', 'string', 'min:6', 'confirmed'],
            'current_password' => ['required_with:password', 'string'],
        ]);

        if (! empty($validated['password'])) {
            if (! Hash::check($validated['current_password'], $user->password)) {
                return back()->withErrors(['current_password' => __('Current access code is incorrect.')]);
            }

            $user->password = Hash::make($validated['password']);
        }

        $user->name = $validated['name'];
        $user->save();

        return back()->with('status', __('Your account has been updated.'));
    }
}
