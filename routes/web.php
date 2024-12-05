<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/login', [Controllers\RoutesController::class, 'vLogin']);
Route::get('/', [Controllers\RoutesController::class, 'vAbsen']);

