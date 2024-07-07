<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin'], function () {
    
// })
// Route::middleware('auth:admin')->group(function () {
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
});
Route::middleware('auth:dosen,mahasiswa,admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-process', [AuthController::class, 'login_process'])->name('login-process');
});
