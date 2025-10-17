<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TelatController;
use App\Http\Controllers\WaitlistController;
use App\Http\Controllers\ProfilPiketController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\RiwayatIzinController;
use App\Http\Controllers\ProfilAdminController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    // GURU PIKET / GURU
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboardguru', [AuthController::class, 'dashboardGuru'])->name('dashboard.guru');

    // Pengajuan izin siswa
    Route::get('/pengajuan-izin', [IzinController::class, 'create'])->name('pengajuan.izin');
    Route::post('/pengajuan-izin', [IzinController::class, 'store'])->name('pengajuan.izin.store');

    // Riwayat izin siswa
    Route::get('/riwayat', [IzinController::class, 'riwayat'])->name('riwayat');

    // Terlambat
    Route::get('/telat', [TelatController::class, 'create'])->name('telat');
    Route::post('/telat/store', [TelatController::class, 'store'])->name('telat.store');

    // Waitlist guru piket
    Route::get('/waitlist', [WaitlistController::class, 'index'])->name('waitlist');
    Route::get('/izin/{id}/update/{status}', [WaitlistController::class, 'updateStatus'])
        ->name('izin.updateStatus.guru');

    // Profil guru piket
    Route::get('/profilpiket/{id}', [ProfilPiketController::class, 'show'])->name('profilpiket.show');
    Route::post('/profilpiket/{id}', [ProfilPiketController::class, 'update'])->name('profilpiket.update');

    // ADMIN
    Route::get('/dashboardadmin', [DashboardAdminController::class, 'index'])->name('dashboardadmin');
    Route::get('/acc-guru', [DashboardAdminController::class, 'accGuru'])->name('acc.guru');

    // Data Guru
    Route::get('/data-guru', [GuruController::class, 'index'])->name('data-guru');
    Route::resource('guru', GuruController::class)->except(['show']);
    Route::post('/guru/{guru}/reset-pin', [GuruController::class, 'resetPin'])->name('guru.resetPin'); 
    Route::post('/guru/{guru}/toggle-status', [GuruController::class, 'toggleStatus'])->name('guru.toggleStatus');

    // Data Siswa
    Route::get('/data-siswa', [SiswaController::class, 'index'])->name('data-siswa');

    // Data Izin
    Route::get('/data-izin', [IzinController::class, 'index'])->name('data-izin');
    Route::get('/izin/{id}/detail', [IzinController::class, 'getDetail'])->name('izin.detail');
    Route::post('/izin/{izin}/update-status/{status}', [IzinController::class, 'updateStatus'])->name('izin.updateStatus.admin');
    Route::delete('/izin/{izin}', [IzinController::class, 'destroy'])->name('izin.destroy');

    // Riwayat izin admin
    Route::get('/riwayat-izin', [RiwayatIzinController::class, 'index'])->name('riwayat.izin');

    // Profil Admin
    Route::get('/profil-admin', [ProfilAdminController::class, 'index'])->name('profile-admin');
    Route::post('/profil-admin/update', [ProfilAdminController::class, 'update'])->name('profile-admin.update');
    Route::post('/profil-admin/change-password', [ProfilAdminController::class, 'changePassword'])->name('profile-admin.change-password');
});
