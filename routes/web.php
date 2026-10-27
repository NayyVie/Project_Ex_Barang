<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;


/*
|--------------------------------------------------------------------------
| BAHASA
|--------------------------------------------------------------------------
*/

Route::get('/language/{locale}', function ($locale) {

    if (!in_array($locale, ['id', 'en'])) {
        abort(404);
    }

    session(['locale' => $locale]);

    return redirect()->back();

})->name('language.switch');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

// Menampilkan halaman login
Route::get('/', [AuthController::class, 'showLogin'])
    ->name('login');

// Memproses login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| REGISTER & FORGOT PASSWORD
|--------------------------------------------------------------------------
*/

Route::get('/registerr', function () {
    return view('auth.registerr');
})->name('registerr');

Route::get('/forgetPassword', function () {
    return view('auth.forget-password');
})->name('forgetPassword');

Route::get('/verifyOtp', function () {
    return view('auth.verify-otp');
})->name('verifyOtp');

Route::get('/resendOtp', function () {
    return view('auth.resend-otp');
})->name('resendOtp');


/*
|--------------------------------------------------------------------------
| VERIFIKASI LOKASI
|--------------------------------------------------------------------------
*/

// Route::get('/verify-location', [LocationController::class, 'show'])
//     ->name('verifyLocation');

// Route::post('/verify-location', [LocationController::class, 'verify'])
//     ->name('verifyLocation.process');


/*
|--------------------------------------------------------------------------
| EMPLOYEE
|--------------------------------------------------------------------------
*/

// Route::get('/dashboardEmployee', function () {

//     if (!session()->has('user')) {
//         return redirect()->route('login');
//     }

//     if (!session('location_verified')) {
//         return redirect()->route('verifyLocation');
//     }

//     return view('employee.dashboard-employee');

// })->name('dashboardEmployee');

Route::get('/dashboardEmployee', function () {
    return view('employee.dashboard-employee');
})->name('dashboardEmployee');

Route::get('/riwayatEmployee', function () {
    return view('employee.riwayat-employee');
})->name('riwayatEmployee');

Route::get('/laporanEmployee', function () {
    return view('employee.laporan-employee');
})->name('laporanEmployee');

Route::get('/notifikasiEmployee', function () {
    return view('employee.notifikasi-employee');
})->name('notifikasiEmployee');

Route::get('/profileEmployee', function () {
    return view('employee.profile-employee');
})->name('profileEmployee');


/*
|--------------------------------------------------------------------------
| INPUT EX BARANG
|--------------------------------------------------------------------------
*/

Route::get('/inputExBarang', function () {
    return view('employee.input-barang');
})->name('inputExBarang');

Route::get('/inputExBarang/step-2', function () {
    return view('employee.input-step2');
})->name('inputExBarang.step2');

Route::get('/inputExBarang/step-3', function () {
    return view('employee.input-step3');
})->name('inputExBarang.step3');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/dashboardAdmin', function () {
    return view('admin.dashboard-admin');
})->name('dashboardAdmin');

Route::get('/profileAdmin', function () {
    return view('admin.profile-admin');
})->name('profileAdmin');

Route::get('/katalogAdmin', function () {
    return view('admin.katalog-admin');
})->name('katalogAdmin');

Route::get('/StockAdmin', function () {
    return view('admin.opname');
})->name('StockAdmin');

Route::get('/inputAdmin', function () {
    return view('admin.inputBarang-admin');
})->name('inputAdmin');

Route::get('/inputAdmin.Step2', function () {
    return view('admin.input2-admin');
})->name('inputAdmin.Step2');

Route::get('/inputAdminStep3', function () {
    return view('admin.input3-admin');
})->name('inputAdmin.Step3');

Route::get('/penerimaanBarang', function () {
    return view('admin.po-admin');
})->name('penerimaanBarang');

Route::get('/pengeluaranBarang', function () {
    return view('admin.wo-admin');
})->name('pengeluaranBarang');

Route::get('/mutasiGudang', function () {
    return view('admin.mutasi-admin');
})->name('mutasiGudang');

Route::get('/riwayatTransaksi', function () {
    return view('admin.riwayatTransaksi-admin');
})->name('riwayatTransaksi');

Route::get('/materialBekas', function () {
    return view('admin.materialBekas-admin');
})->name('materialBekas');

Route::get('/scanBarcode', function () {
    return view('admin.scanBarcode-admin');
})->name('scanBarcode');

Route::get('/laporanAdmin', function () {
    return view('admin.laporan-admin');
})->name('laporanAdmin');


/*
|--------------------------------------------------------------------------
| CEK LAYOUT
|--------------------------------------------------------------------------
*/

Route::get('/appAdmin', function () {
    return view('layouts.app-admin');
})->name('appAdmin');

Route::get('/appEmployee', function () {
    return view('layouts.app');
})->name('appEmployee');

// COBA
// Route::get('/verifyLocation', function () {
//     return view('auth.verify-location');
// })->name('verifyLocation');

// Route::get('/dashboardEmployee', function () {
//     return view('employee.dashboard-employee');
// })->name('dashboardEmployee');


// ROUTE ICON EDIT HALAMAN KATALOGADMIN
Route::get('/katalogAdmin/edit/{itemNumber}', function ($itemNumber) {

    $items = [

        'CF-077421' => [
            'item_number' => 'CF-077421',
            'kategori' => 'Consumable & Fastener',
            'deskripsi' => 'Spiral Wound Gasket 4 Inch 300# ANSI B16.20 SS316 Graphite',
            'spesifikasi' => 'Inner Ring SS316, Centering Ring Carbon Steel, 150-300 LB',
            'lokasi' => 'RAK D-4.01',
            'satuan' => 'PCS',
            'unit' => '',
            'stok_fisik' => 18,
            'stok_maximo' => 18,
            'rop' => 10,
            'harga' => 320000,
        ],
    ];
     if (!isset($items[$itemNumber])) {
        abort(404);
    }

    return view('admin.edit-katalog', [
        'item' => $items[$itemNumber]
    ]);

})->name('katalogAdmin.edit');

// Contoh pola pembatasan akses.
// Sesuaikan URL dan nama route dengan route yang sudah ada.

Route::middleware(['auth', 'role:worker'])->group(function () {
    // Route khusus Worker
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route khusus Admin Gudang
});


// ROUTE WORKER AFTER DATABASE

// Route::get('/dashboardEmployee', function () {
//     if (!session()->has('user')) {
//         return redirect()->route('login');
//     }

//     if (!session('location_verified')) {
//         return redirect()->route('verifyLocation');
//     }

//     return view('employee.dashboard-employee');
// })->middleware('role:worker')->name('dashboardEmployee');

// Route::get('/riwayatEmployee', fn() =>
//     view('employee.riwayat-employee')
// )->middleware('role:worker')->name('riwayatEmployee');

// Route::get('/laporanEmployee', fn() =>
//     view('employee.laporan-employee')
// )->middleware('role:worker')->name('laporanEmployee');

// Route::get('/notifikasiEmployee', fn() =>
//     view('employee.notifikasi-employee')
// )->middleware('role:worker')->name('notifikasiEmployee');

// Route::get('/profileEmployee', fn() =>
//     view('employee.profile-employee')
// )->middleware('role:worker')->name('profileEmployee');

// Route::get('/inputExBarang', fn() =>
//     view('employee.input-barang')
// )->middleware('role:worker')->name('inputExBarang');

// Route::get('/inputExBarang/step-2', fn() =>
//     view('employee.input-step2')
// )->middleware('role:worker')->name('inputExBarang.step2');

// Route::get('/inputExBarang/step-3', fn() =>
//     view('employee.input-step3')
// )->middleware('role:worker')->name('inputExBarang.step3');


// ROUTE ADMIN AFTER DATABASE

// Route::get('/dashboardAdmin', fn() =>
//     view('admin.dashboard-admin')
// )->middleware('role:admin')->name('dashboardAdmin');

// Route::get('/profileAdmin', fn() =>
//     view('admin.profile-admin')
// )->middleware('role:admin')->name('profileAdmin');

// Route::get('/katalogAdmin', fn() =>
//     view('admin.katalog-admin')
// )->middleware('role:admin')->name('katalogAdmin');

// Route::get('/StockAdmin', fn() =>
//     view('admin.opname')
// )->middleware('role:admin')->name('StockAdmin');

// Route::get('/inputAdmin', fn() =>
//     view('admin.inputBarang-admin')
// )->middleware('role:admin')->name('inputAdmin');

// Route::get('/inputAdmin.Step2', fn() =>
//     view('admin.input2-admin')
// )->middleware('role:admin')->name('inputAdmin.Step2');

// Route::get('/inputAdminStep3', fn() =>
//     view('admin.input3-admin')
// )->middleware('role:admin')->name('inputAdmin.Step3');

// Route::get('/penerimaanBarang', fn() =>
//     view('admin.po-admin')
// )->middleware('role:admin')->name('penerimaanBarang');

// Route::get('/pengeluaranBarang', fn() =>
//     view('admin.wo-admin')
// )->middleware('role:admin')->name('pengeluaranBarang');

// Route::get('/mutasiGudang', fn() =>
//     view('admin.mutasi-admin')
// )->middleware('role:admin')->name('mutasiGudang');

// Route::get('/riwayatTransaksi', fn() =>
//     view('admin.riwayatTransaksi-admin')
// )->middleware('role:admin')->name('riwayatTransaksi');

// Route::get('/materialBekas', fn() =>
//     view('admin.materialBekas-admin')
// )->middleware('role:admin')->name('materialBekas');

// Route::get('/scanBarcode', fn() =>
//     view('admin.scanBarcode-admin')
// )->middleware('role:admin')->name('scanBarcode');

// Route::get('/laporanAdmin', fn() =>
//     view('admin.laporan-admin')
// )->middleware('role:admin')->name('laporanAdmin');


