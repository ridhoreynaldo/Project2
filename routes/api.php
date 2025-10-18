<?php

use App\Http\Controllers\Asrama\BarangController;
use App\Http\Controllers\Asrama\GetDataControllerController;
use App\Http\Controllers\Asrama\DashboardController;
use App\Http\Controllers\Asrama\FotoKamarController;
use App\Http\Controllers\Asrama\GetDataController;
use App\Http\Controllers\Asrama\MahasiswaController;
use App\Http\Controllers\Asrama\PeriodeHargaController;
use App\Http\Controllers\Asrama\SubAssetController;
use App\Http\Controllers\Asrama\SubAssetDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// USED////////////////////////////////////////////////////////////////
// Lokasi = No Input --> Sub Lokasi = No Input --> Asset = Asrama(2125) --> Sub Asset = Kamar(All)
Route::get('asrama/jumlah-data', [DashboardController::class, 'getjumlahData']);                                       //Show Jumlah Data

// Eager Loading Kamar dengan Detail,Barang,Foto (All User)
Route::get('asrama/sub-asset/complete/{id_assets}', [SubAssetController::class, 'showComplete']);                      //Show All
Route::get('asrama/sub-asset/complete/{id_assets}/{id_sub_asset}', [SubAssetController::class, 'showCompleteDetail']); //Show 1

// Kamar 1:1 Detail Kamar
Route::get('asrama/sub-asset/detail/{id_assets}', [SubAssetController::class, 'index']);
Route::get('asrama/sub-asset/detail/{id_assets}/{id_sub_assets}', [SubAssetController::class, 'show']);
Route::patch('asrama/sub-asset/detail/{id_sub_assets}', [SubAssetController::class, 'insertOrUpdateDetail']);
// Route::post('sub-asset/{id_sub_assets}', [SubAssetController::class, 'storeSubAsset']);                      //Master Data
// Route::put('sub-asset/{id_sub_assets}', [SubAssetController::class, 'updateSubAsset']);                      //Master Data
// Route::delete('sub-asset/{id_sub_assets}', [SubAssetController::class, 'deleteSubAsset']);                   //Master Data   

    // Barang (m:1) <- Sub Asset
    Route::get('asrama/sub-asset/barang/{id_assets}/{id_sub_assets}', [BarangController::class, 'indexByAssetAndSubAsset']);
    // Route::get('sub-asset/barang', [BarangController::class, 'showBarang']);                                 //Master Data
    // Route::get('sub-asset/barang/{id_barang}', [BarangController::class, 'showBarang']);                     //Master Data
    // Route::post('sub-asset/barang/{id_barang}', [BarangController::class, 'storeBarang']);                   //Master Data
    // Route::put('sub-asset/barang/{id_barang}', [BarangController::class, 'updateBarang']);                   //Master Data
    // Route::delete('sub-asset/barang/{id_barang}', [BarangController::class, 'deleteBarang']);                //Master Data
    
    // Foto Kamar (m:1) <- Sub Asset
    // Route::get('sub-asset/foto', [FotoKamarController::class, 'index']);
    Route::get('asrama/sub-asset/foto/{id_sub_assets}', [FotoKamarController::class, 'showBySubAsset']);
    Route::post('asrama/sub-asset/foto/{id_sub_assets}', [FotoKamarController::class, 'storeBySubAsset']);
    Route::put('asrama/sub-asset/foto/{id_foto}', [FotoKamarController::class, 'update']);
    Route::delete('asrama/sub-asset/foto/{id_foto}', [FotoKamarController::class, 'delete']);

// Mahasiswa
// Route::get('mahasiswa', [MahasiswaController::class, 'index']);
Route::get('asrama/mahasiswa/{NPM}', [MahasiswaController::class, 'show']);
Route::post('asrama/mahasiswa', [MahasiswaController::class, 'index']);
// Route::post('mahasiswa/{NPM}', [MahasiswaController::class, 'store']);                                       //Master Data
// Route::put('mahasiswa/{NPM}', [MahasiswaController::class, 'update']);                                       //Buat Local Lalu coba edit

// Periode & Harga
Route::get('asrama/periode-harga', [PeriodeHargaController::class, 'index']);
Route::get('asrama/periode-harga/{id_sub_assets}', [PeriodeHargaController::class, 'show']);
Route::post('asrama/periode-harga/', [PeriodeHargaController::class, 'store']);
Route::put('asrama/periode-harga/{id_sub_assets}', [PeriodeHargaController::class, 'update']);
Route::delete('asrama/periode-harga/{id_sub_assets}', [PeriodeHargaController::class, 'delete']);

//🔴
// Pemesanan
Route::get('pemesanan', [PemesananController::class, 'indexSubAsset']); // Show All SubAsset with Detail
Route::get('pemesanan/{id_sub_assets}', [PemesananController::class, 'showSubAsset']); // Show 1 SubAsset with Detail
Route::post('pemesanan/{id_sub_assets}', [PemesananController::class, 'storeSubAsset']); // Insert SubAsset
Route::put('pemesanan/{id_sub_assets}', [PemesananController::class, 'updateSubAsset']); // Edit SubAsset

// API Payment Gateway
// Service to get to set

// Transaksi
Route::get('transaksi', [TransaksiController::class, 'indexSubAsset']); // Show All SubAsset with Detail
Route::get('transaksi/{?}', [TransaksiController::class, 'showSubAsset']); // Show 1 SubAsset with Detail
Route::post('sub-asset/{?}', [TransaksiController::class, 'storeSubAsset']); // Insert SubAsset
Route::put('sub-asset/{?}', [TransaksiController::class, 'updateSubAsset']); // Edit SubAsset

// Route::middleware('api')->group(function () {
//     Route::get('/test', function () {
//         return response()->json(['message' => 'API route aktif!']);
//     });
// });
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });