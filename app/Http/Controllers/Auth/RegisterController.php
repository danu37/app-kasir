<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'username' => ['required', 'string', 'alpha_dash', 'max:100', 'unique:users,username'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ], [
            'username.alpha_dash' => 'Username hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'role' => 'kasir',
            'password' => $data['password'],
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('cashier.index')->with('success', 'Registrasi berhasil. Selamat datang di Kasir Mini.');
    }
}
