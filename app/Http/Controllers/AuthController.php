<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() { return view('auth.login'); }

    public function login(Request $request)
    {
        $credentials = $request->validate(['username' => ['required', 'string'], 'password' => ['required', 'string']]);
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withInput($request->only('username'))->with('error', 'Username atau password salah.');
        }
        $request->session()->regenerate();
        return redirect()->intended(Auth::user()->isAdmin() ? route('dashboard') : route('cashier.index'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda berhasil keluar dari sistem.');
    }
}
