<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function create()
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['email' => ['required', 'email']]);
        $status = Password::sendResetLink(['email' => $data['email']]);

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Link reset password sudah dikirim. Periksa inbox atau folder spam email Anda.');
        }

        return back()->withInput()->with('error', 'Email tersebut belum terdaftar atau link reset gagal dikirim.');
    }
}
