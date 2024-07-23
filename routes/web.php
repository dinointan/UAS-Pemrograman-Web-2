<?php

use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PendaftaranPasienController;
use App\Http\Controllers\RekamMedisPasienController;
use App\Models\Dokter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PetugasController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasi', [LoginController::class, 'store']);


Route::prefix('petugas')->middleware('can:petugas-access')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::resource('petugas', PetugasController::class)->names('petugas.petugas')->parameters([
        'petugas' => 'petugas'
    ]);
    Route::resource('pasien', PasienController::class)->names('petugas.pasien');
    Route::resource('poli', PoliController::class)->names('petugas.poli');
    Route::resource('dokter', DokterController::class)->names('petugas.dokter');
    Route::resource('jadwal', JadwalDokterController::class)->names('petugas.jadwal');
    Route::resource('kamar', KamarController::class)->names('petugas.kamar');
    Route::resource('rekammedispasien', RekamMedisPasienController::class)->names('petugas.rekammedispasien');


    // Add more routes for 'petugas' permission
});

Route::prefix('pasien')->middleware('can:pasien-access')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::resource('pasien', PasienController::class)->names('pasien.pasien');
    Route::get('/profile', [PasienController::class, 'profile'])->name('updateProfile');
    Route::post('/profile', [PasienController::class, 'storeProfile'])->name('updateProfile');
    Route::put('/profile', [PasienController::class, 'update'])->name('updateProfile');
    Route::resource('pendaftaranpasien', PendaftaranPasienController::class)->names('pasien.pendaftaranpasien');
    Route::get('/history', [PendaftaranPasienController::class, 'history'])->name('history');
    Route::get('/jadwal', [JadwalDokterController::class, 'jadwal'])->name('jadwal');

    // Add more routes for 'pasien' permission
});

Route::prefix('dokter')->middleware('can:dokter-access')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::resource('dokter', DokterController::class)->names('dokter.dokter')->parameters([
        'dokter' => 'dokter'
    ]);
    Route::resource('jadwal', JadwalDokterController::class)->names('petugas.jadwal');
    Route::resource('rekammedispasien', RekamMedisPasienController::class)->names('petugas.rekammedispasien');
});
