<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Fitur lainnya
//Route::middleware(['karyawan.auth'])->group(function () {
//    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
 //   Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
//});

Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');


//Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
//Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');






Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');

// Auth
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// (Kalau mau pakai POST logout, ini opsional)
Route::post('/logout', function () {
    return redirect('/login');
})->name('logout.post');



