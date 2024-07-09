<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    public function showLoginForm()
    {
        return view('security.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('staff_id', 'password');

        if (Auth::guard('security')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/welcome');
        }

        return redirect()->back()->withErrors([
            'staff_id' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('security')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('security.login');
    }
}
