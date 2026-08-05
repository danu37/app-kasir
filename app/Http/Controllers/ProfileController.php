<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit() { return view('profile', ['transactionCount' => auth()->user()->transactions()->count()]); }

    public function update(Request $request)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:150'], 'username' => ['required', 'string', 'max:100', 'unique:users,username,'.auth()->id()], 'email' => ['nullable', 'email', 'max:100', 'unique:users,email,'.auth()->id()]]);
        auth()->user()->update($data);
        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate(['current_password' => ['required', 'current_password'], 'password' => ['required', 'confirmed', 'min:8']]);
        auth()->user()->update(['password' => Hash::make($data['password'])]);
        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
