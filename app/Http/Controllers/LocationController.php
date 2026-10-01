<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    // /**
    //  * Menampilkan halaman verifikasi lokasi
    //  */
    public function show()
    {
        // Kalau belum login, kembali ke login
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        $user = session('user');

        return view('auth.verify-location', compact('user'));
    }

    // /**
    //  * Memproses hasil verifikasi lokasi
    //  */
    public function verify(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        /*
        |--------------------------------------------------------------------------
        | LOKASI KANTOR SEMENTARA
        |--------------------------------------------------------------------------
        */

        $officeLatitude = -7.2575;
        $officeLongitude = 112.7521;

        $userLatitude = $request->latitude;
        $userLongitude = $request->longitude;

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
            sin($deltaLat / 2) * sin($deltaLat / 2) +
            cos($lat1) *
            cos($lat2) *
            sin($deltaLon / 2) *
            sin($deltaLon / 2);

        $c = 2 * atan2(
            sqrt($a),
            sqrt(1 - $a)
        );

        $distance = $earthRadius * $c;

        /*
        |--------------------------------------------------------------------------
        | RADIUS MAKSIMAL
        |--------------------------------------------------------------------------
        */

        $allowedRadius = 500;

        if ($distance > $allowedRadius) {

            return back()->with(
                'location_error',
                'Lokasi Anda berada di luar area kantor. Silakan berada di area kantor untuk melanjutkan.'
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

        return redirect()->route('dashboardEmployee');
    }
}