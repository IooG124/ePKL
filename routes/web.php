<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [Controllers\RoutesController::class, 'vAbsen']);

Route::get('/login', [Controllers\RoutesController::class, 'vLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/faces', [Controllers\RoutesController::class, 'vScan']);

