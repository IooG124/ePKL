<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/login', [Controllers\RoutesController::class, 'vLogin']);
Route::get('/', [Controllers\RoutesController::class, 'vAbsen']);
Route::get('/Siswa', [Controllers\RoutesController::class, 'vDSiswa']);
Route::get('/Guru', [Controllers\RoutesController::class, 'vDGuru']);
Route::get('/Jurnal', [Controllers\RoutesController::class, 'vJurnal']);
Route::get('/Verifikasi', [Controllers\RoutesController::class, 'vVerifikasi']);
Route::get('/Dudi', [Controllers\RoutesController::class, 'vDUDI']);
Route::get('/Profile', [Controllers\RoutesController::class, 'vProfile']);





