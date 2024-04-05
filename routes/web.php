<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::get('/siswa-view', [LoginController::class, 'loginSiswa'])->name('siswa.view');
Route::post('/siswa-login', [LoginController::class, 'siswaLogin'])->name('siswa.login');

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('kelas', KelasController::class);
    Route::resource('spp', SppController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('pembayaran', PembayaranController::class);
});

Route::get('/dashboard', [HomeController::class, 'siswa'])->name('dashboard')->middleware('auth:siswa');
