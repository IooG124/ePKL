<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DudiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PeriodePklController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

// Login dan Logout Routes
Route::get('/login', [RoutesController::class, 'vLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes yang memerlukan autentikasi (middleware auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/absen', [AttendanceController::class, 'showAttendance'])->name('absen');
    Route::get('/dudi', [DudiController::class, 'index'])->name('dudi');
    Route::get('guru', [TeacherController::class , 'index'])->name('guru');
    Route::get('/guru', [TeacherController::class, 'index'])->name('guru');

    Route::get('/listDudi', [DudiController::class, 'listDUdi'])->name('listDudi');
    Route::get('/dudi/listDudi', [DudiController::class, 'listDudi'])->name('dudi.listDudi');
    Route::resource('dudi', DudiController::class);

    Route::get('/periode', [PeriodeController::class, 'index'])->name('periode.index');
    Route::get('/periode/create', [PeriodeController::class, 'create'])->name('periode.create');
    Route::post('/periode', [PeriodeController::class, 'store'])->name('periode.store');
    Route::get('/periode/{id}/edit', [PeriodeController::class, 'edit'])->name('periode.edit');
    Route::put('/periode/{id}', [PeriodeController::class, 'update'])->name('periode.update');
    Route::delete('/periode/{id}', [PeriodeController::class, 'destroy'])->name('periode.destroy');

    Route::resource('teachers', TeacherController::class);

    Route::resource('journals', JournalController::class);
    Route::get('verify', [JournalController::class, 'verifyPage'])->name('journals.verifyPage');
    Route::post('/journals/verify/{id}', [JournalController::class, 'verify'])->name('journals.verify');

    Route::resource('siswa', StudentController::class);
    Route::get('/siswa', [StudentController::class, 'index'])->name('siswa');

    Route::get('/Dudi', [RoutesController::class, 'vDUDI']);
    Route::get('/TambahDudi', [RoutesController::class, 'vTambahDUDI']);
    Route::get('/Profile', [RoutesController::class, 'vProfile']);
    Route::get('/TambahPeriode', [RoutesController::class, 'vTambahPeriode']);
    Route::get('/faces', [RoutesController::class, 'vScan']);

    Route::get('Profile', [RoutesController::class, 'vProfile']);
});