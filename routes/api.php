<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\LogoController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Auth
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/petani/login', [LoginController::class, 'login']);

// Berita
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{id}', [BeritaController::class, 'show']);


// Route::middleware('auth:sanctum')->put('/profil/update', [ProfileController::class, 'update']);
// Route::middleware('auth:sanctum')->group(function () {
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::post('/profile/update', [ProfileController::class, 'update']);
    Route::post('/profile/upload-image', [LogoController::class, 'uploadImage']);
});


// Produk
Route::prefix('produk')->group(function () {
    Route::get('/', [ProdukController::class, 'index']);
    Route::get('/{id}', [ProdukController::class, 'show']);
    Route::post('/', [ProdukController::class, 'store']);
    Route::post('/{id}', [ProdukController::class, 'update']); // Gunakan POST jika sulit pakai PUT di mobile
    Route::delete('/{id}', [ProdukController::class, 'destroy']);
});
// Notification
Route::get('send-notification',[AdminController::class,'sendNotification']);


Route::middleware('auth:sanctum')->get('/profil', [ProfileController::class, 'profil']);

 // Produk
    Route::prefix('produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index']);
        Route::get('/{id}', [ProdukController::class, 'show']);
        Route::post('/', [ProdukController::class, 'store']);
        Route::post('/{id}', [ProdukController::class, 'update']); // Gunakan POST jika sulit pakai PUT di mobile
        Route::delete('/{id}', [ProdukController::class, 'destroy']);
    });
