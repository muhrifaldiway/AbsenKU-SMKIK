<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Grup Rute untuk Guru yang SUDAH Login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/absen', [AttendanceController::class, 'create'])->name('absen.create');
    Route::post('/absen', [AttendanceController::class, 'store'])->name('absen.store');
    // Tambahkan ini di bawah route absen
    Route::get('/riwayat', [App\Http\Controllers\DashboardController::class, 'riwayat'])->name('riwayat.index');
    
    // Tambahkan di dalam route group yang menggunakan middleware auth
    Route::get('/admin/pengaturan', [App\Http\Controllers\AdminController::class, 'pengaturan'])->name('admin.pengaturan');
    
    // Route untuk menampilkan halaman pengaturan (Sudah kita buat sebelumnya)
    Route::get('/admin/pengaturan', [App\Http\Controllers\AdminController::class, 'pengaturan'])->name('admin.pengaturan');
    
    // Route BARU untuk memproses pembaruan pengaturan
    Route::put('/admin/pengaturan', [App\Http\Controllers\AdminController::class, 'updatePengaturan'])->name('admin.pengaturan.update');

    // Route untuk Kelola Guru
    Route::get('/admin/guru', [App\Http\Controllers\AdminController::class, 'kelolaGuru'])->name('admin.guru');

    // Route untuk download Excel
    Route::get('/admin/export-excel', [App\Http\Controllers\AdminController::class, 'exportExcel'])->name('admin.export');

        // Rute Pengajuan Izin & Sakit Guru
    Route::get('/izin/buat', [App\Http\Controllers\DashboardController::class, 'buatIzin'])->name('izin.create');
    Route::post('/izin/simpan', [App\Http\Controllers\DashboardController::class, 'simpanIzin'])->name('izin.store');

    // === TAMBAHKAN RUTE PROFIL DI SINI ===
    Route::get('/profil', [App\Http\Controllers\DashboardController::class, 'profil'])->name('profil.edit');
    Route::put('/profil', [App\Http\Controllers\DashboardController::class, 'updateProfil'])->name('profil.update');
    
    // Rute Manajemen & Persetujuan Izin Admin
    Route::get('/admin/izin', [App\Http\Controllers\AdminController::class, 'daftarIzin'])->name('admin.izin');
    Route::put('/admin/izin/{id}/{status}', [App\Http\Controllers\AdminController::class, 'prosesIzin'])->name('admin.izin.proses');

    
});


// Grup Rute untuk Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

require __DIR__.'/auth.php';
