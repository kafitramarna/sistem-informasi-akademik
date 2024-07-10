<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalMengajarController;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SksController;
use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => 'auth:admin'], function () {
    
// })
Route::middleware('auth:admin')->group(function () {
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/pengumuman/{id}/update', [PengumumanController::class, 'update'])->name('pengumuman.update');

    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
    Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
    Route::post('/prodi/store', [ProdiController::class, 'store'])->name('prodi.store');
    Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');
    Route::put('/prodi/{id}/update', [ProdiController::class, 'update'])->name('prodi.update');
    Route::delete('/prodi/{id}/destroy', [ProdiController::class, 'destroy'])->name('prodi.destroy');

    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('daftar-sks', SksController::class);
});
Route::middleware('auth:dosen')->group(function () {
    Route::get('/jadwal-mengajar',[JadwalMengajarController::class, 'index'])->name('jadwal-mengajar.index');
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('/penilaian/create/{id}', [PenilaianController::class, 'create'])->name('penilaian.create');
    Route::post('/penilaian/store/{id}', [PenilaianController::class, 'store'])->name('penilaian.store');
});
Route::middleware('auth:mahasiswa')->group(function () {
    Route::resource('krs', KrsController::class);
    Route::get('khs',[KhsController::class,'index'])->name('khs.index');
});
// Route::middleware('auth:dosen,mahasiswa,admin')->group(function () {
Route::group(['middleware' => 'auth:admin,mahasiswa,dosen'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Route::middleware('guest')->group(function () {
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-process', [AuthController::class, 'login_process'])->name('login-process');
});
