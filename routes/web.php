<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\DSS\AlternatifController;
use App\Http\Controllers\DSS\AlternatifKriteriaController;
use App\Http\Controllers\DSS\AtributController;
use App\Http\Controllers\DSS\KriteriaController;
use App\Http\Controllers\DSS\SubKriteriaController;
use App\Http\Controllers\User\HobiController;
use App\Http\Controllers\User\HobiProfilController;
use App\Http\Controllers\User\PenggunaController;
use App\Http\Controllers\User\PerhitunganController;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\User\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa\Auth\AuthController;
use Illuminate\Support\Facades\Session;

Route::get('/infophp', function () {
    phpinfo();
});

Route::view('/', '/asrama/mahasiswa/landing-page');
Route::view('/asrama/mahasiswa/informasi', '/asrama/mahasiswa/informasi');
Route::get('/asrama/mahasiswa/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/asrama/mahasiswa/login', [AuthController::class, 'login']);
Route::get('/asrama/mahasiswa/logout', [AuthController::class, 'logout']);
Route::get('/asrama/mahasiswa/dashboard', function () {
    if (!Session::has('mahasiswa')) {
        return redirect('/asrama/mahasiswa/login');
    }
    return view('/asrama/mahasiswa/dashboard');
});
Route::get('/asrama/mahasiswa/profil', function () {
    if (!Session::has('mahasiswa')) {
        return redirect('/asrama/mahasiswa/login');
    }
    return view('/asrama/mahasiswa/profil');
});
Route::get('/asrama/mahasiswa/pemesanan-kamar', function () {
    if (!Session::has('mahasiswa')) {
        return redirect('/asrama/mahasiswa/login');
    }
    return view('/asrama/mahasiswa/pemesanan-kamar');
});
Route::get('/asrama/mahasiswa/history-transaksi', function () {
    if (!Session::has('mahasiswa')) {
        return redirect('/asrama/mahasiswa/login');
    }
    return view('/asrama/mahasiswa/history-transaksi');
});




// Route::view('/test', '/asrama/mahasiswa/history-transaksi2');
// Route::view('/asrama/mahasiswa/profil', 'welcome');
// Route::view('/asrama/mahasiswa/daftar', 'welcome');
// Route::view('/asrama/mahasiswa/list-kamar', 'welcome');
// Route::view('/asrama/mahasiswa/list-history-pemesanan', 'welcome');