<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Menampilkan halaman verifikasi lokasi
     */
    public function show()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        $user = session('user');

        return view('auth.verify-location', compact('user'));
    }


    /**
     * Memproses lokasi pengguna
     */
    public function verify(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);


        /*
        |--------------------------------------------------------------------------
        | KOORDINAT KANTOR / UNIT
        |--------------------------------------------------------------------------
        |
        | NANTI KAMU MASUKKAN KOORDINAT KANTOR DI SINI
        |
        */

        $officeLatitude = -7.31573732585965;
        $officeLongitude = 112.72989641384704;

        $officeLatitude = -7.376830912097001; 
        $officeLongitude = 112.738121641038;
        
        /*
        |--------------------------------------------------------------------------
        | KOORDINAT PENGGUNA
        |--------------------------------------------------------------------------
        */

        $userLatitude = (float) $request->latitude;
        $userLongitude = (float) $request->longitude;


        /*
        |--------------------------------------------------------------------------
        | HITUNG JARAK
        |--------------------------------------------------------------------------
        */

        $earthRadius = 6371000;

        $lat1 = deg2rad($officeLatitude);
        $lat2 = deg2rad($userLatitude);

        $deltaLat = deg2rad(
            $userLatitude - $officeLatitude
        );

        $deltaLon = deg2rad(
            $userLongitude - $officeLongitude
        );

        $a =
            sin($deltaLat / 2) ** 2 +
            cos($lat1) *
            cos($lat2) *
            sin($deltaLon / 2) ** 2;

        $c = 2 * atan2(
            sqrt($a),
            sqrt(1 - $a)
        );

        $distance = $earthRadius * $c;


        /*
        |--------------------------------------------------------------------------
        | RADIUS YANG DIIZINKAN
        |--------------------------------------------------------------------------
        */

        $allowedRadius = 500;


        /*
        |--------------------------------------------------------------------------
        | LOKASI DI LUAR AREA
        |--------------------------------------------------------------------------
        */

        if ($distance > $allowedRadius) {

            return back()->with(
                'location_error',
                'Akses lokasi ditolak. Anda berada di luar area unit. Jarak Anda sekitar ' .
                round($distance) .
                ' meter dari lokasi unit.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | LOKASI VALID
        |--------------------------------------------------------------------------
        */

        session([
            'location_verified' => true,
            'latitude' => $userLatitude,
            'longitude' => $userLongitude,
            'location_distance' => round($distance),
        ]);


        /*
        |--------------------------------------------------------------------------
        | MASUK DASHBOARD
        |--------------------------------------------------------------------------
        */

        return redirect()->route('dashboardEmployee');
    }
}