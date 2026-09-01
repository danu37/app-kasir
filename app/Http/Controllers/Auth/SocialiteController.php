<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return \Laravel\Socialite\Facades\Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = \Laravel\Socialite\Facades\Socialite::driver('google')->user();

            $user = \App\Models\User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Update existing user to link google_id
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => $user->email_verified_at ?? now(),
                ]);
            } else {
                // Create new user
                $user = \App\Models\User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'username' => explode('@', $googleUser->getEmail())[0] . rand(1000, 9999),
                    'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(24)),
                    'email_verified_at' => now(),
                ]);
            }

            \Illuminate\Support\Facades\Auth::login($user);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Login lewat Google gagal: ' . $e->getMessage());
        }
    }
}
