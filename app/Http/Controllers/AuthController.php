<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Memeriksa email dan password melalui database
        if (Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Menyimpan informasi pengguna ke session
            session([
                'user' => [
                    'employee_id' => $user->employee_id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'unit' => $user->unit,
                    'role' => $user->role,
                ],
                'location_verified' => false,
            ]);

            // Login berhasil, lanjut ke verifikasi lokasi
            return redirect()->route('verifyLocation');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
