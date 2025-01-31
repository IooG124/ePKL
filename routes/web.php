<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [Controllers\RoutesController::class, 'vAbsen']);
Route::get('/Siswa', [Controllers\RoutesController::class, 'vDSiswa']);
Route::get('/Guru', [Controllers\RoutesController::class, 'vDGuru']);
Route::get('/Jurnal', [Controllers\RoutesController::class, 'vJurnal']);
Route::get('/ListJurnal', [Controllers\RoutesController::class, 'vListJurnal']);
Route::get('/Verifikasi', [Controllers\RoutesController::class, 'vVerifikasi']);
Route::get('/Dudi', [Controllers\RoutesController::class, 'vDUDI']);
Route::get('/TambahDudi', [Controllers\RoutesController::class, 'vTambahDUDI']);
Route::get('/Profile', [Controllers\RoutesController::class, 'vProfile']);





Route::get('/login', [Controllers\RoutesController::class, 'vLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/faces', [Controllers\RoutesController::class, 'vScan']);

