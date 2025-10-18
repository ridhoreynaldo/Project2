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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/infophp', function () {
    phpinfo();
});


// ⚙️ 🟩Setting Route (/routes/web.php)
// Login & Logout Form
// Dashboard View
// Profile
// List Kamar Asrama
// List Histori Pemesanan