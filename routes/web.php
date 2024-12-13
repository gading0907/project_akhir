<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SoalController;

// Rute halaman login dan registrasi siswa
// Rute Otentikasi (Login dan Register)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('proses_login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
Route::get('/mata-pelajaran/{mata_pelajaran_id}', [SiswaController::class, 'showSoal'])->name('siswa.show.soal');
Route::post('/mata-pelajaran/{mata_pelajaran_id}', [SiswaController::class, 'submitSoal'])->name('siswa.submit.soal');
// Rute login dan logout admin
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');

// Rute dashboard dan logout siswa
Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa_dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute CRUD untuk siswa di area admin
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa.index');
    Route::resource('siswa', SiswaController::class)->except(['index']);
});

// Rute untuk siswa melihat soal dan mengirim jawaban
Route::prefix('siswa')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
    Route::get('/mata-pelajaran/{mata_pelajaran_id}', [SiswaController::class, 'showSoal'])->name('siswa.show.soal');
    Route::post('/mata-pelajaran/{mata_pelajaran_id}', [SiswaController::class, 'submitSoal'])->name('siswa.submit.soal');
});

// Rute CRUD untuk soal (kecuali show)
Route::resource('soal', SoalController::class)->except(['show']);
Route::get('/siswa/nilai', [SiswaController::class, 'showNilai'])->name('siswa.nilai');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');


