<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('paket-wisata', PaketWisataController::class);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/pemesanan', [PemesananController::class, 'index']);
    Route::post('/pemesanan', [PemesananController::class, 'store']);
    Route::get('/pemesanan/{id}', [PemesananController::class, 'show']);
    Route::put('/pemesanan/{id}/status', [PemesananController::class, 'updateStatus']);
});

Route::middleware('auth:api')->group(function () {
    Route::post('/pembayaran', [PembayaranController::class, 'store']);
    Route::get('/pembayaran', [PembayaranController::class, 'index']); // bisa dibatasi hanya untuk admin
    Route::put('/pembayaran/{id}/status', [PembayaranController::class, 'updateStatus']);
});
