<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
Route::get('/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
Route::put('/pengumuman/{id}/update', [PengumumanController::class, 'update'])->name('pengumuman.update');

Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::get('/prodi/create',[ProdiController::class,'create'])->name('prodi.create');
Route::post('/prodi/store',[ProdiController::class,'store'])->name('prodi.store');
Route::get('/prodi/{id}/edit',[ProdiController::class,'edit'])->name('prodi.edit');
Route::put('/prodi/{id}/update',[ProdiController::class,'update'])->name('prodi.update');
Route::delete('/prodi/{id}/destroy',[ProdiController::class,'destroy'])->name('prodi.destroy');

Route::get('/login',[AuthController::class, 'login'])->name('login');
