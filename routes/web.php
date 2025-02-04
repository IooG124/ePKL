<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RoutesController;

Route::get('/login', [Controllers\RoutesController::class, 'vLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::middleware(['auth'])->group(function () {
      Route::get('/absen', [RoutesController::class, 'index'])->name('absen');
      Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
  });

// Route::get('/', [Controllers\RoutesController::class, 'index'])->name('dashboard');
Route::get('/Siswa', [Controllers\RoutesController::class, 'vDSiswa']);


Route::resource('/Guru', Controllers\GuruController::class);
Route::get('/Jurnal', [Controllers\RoutesController::class, 'vJurnal']);
Route::get('/ListJurnal', [Controllers\RoutesController::class, 'vListJurnal']);
Route::get('/Verifikasi', [Controllers\RoutesController::class, 'vVerifikasi']);
Route::get('/Dudi', [Controllers\RoutesController::class, 'vDUDI']);
Route::get('/TambahDudi', [Controllers\RoutesController::class, 'vTambahDUDI']);
Route::get('/Profile', [Controllers\RoutesController::class, 'vProfile']);
Route::get('/TambahPeriode', [Controllers\RoutesController::class, 'vTambahPeriode']);







Route::get('/login', [Controllers\RoutesController::class, 'vLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/faces', [Controllers\RoutesController::class, 'vScan']);

