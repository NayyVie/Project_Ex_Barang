<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // LOGIN SEMENTARA
        if (
            $request->email === 'abc@gmail.com' &&
            $request->password === '123456'
        ) {

            $user = [
                'employee_id' => 'EMP001',
                'name' => 'Budi Santoso',
                'email' => 'abc@gmail.com',
                'unit' => 'PLN Unit Surabaya',
                'role' => 'Pekerja',
            ];

            // Simpan data user
            session([
                'user' => $user,
                'location_verified' => false,
            ]);

            // Setelah login → verifikasi lokasi
            return redirect()->route('verifyLocation');
        }

        // Login gagal
        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->withInput();
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}