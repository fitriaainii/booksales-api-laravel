<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;

// Cek user login
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); // atau auth:api tergantung autentikasi yang kamu pakai


// Autentikasi
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Endpoint untuk melihat data (tanpa login)
Route::apiResource('/books', BookController::class)->only(['index', 'show']);
Route::apiResource('/genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('/authors', AuthorsController::class)->only(['index', 'show']);


// Endpoint yang hanya bisa diakses user yang sudah login (dengan auth)
Route::middleware('auth:api', 'role:customer')->group(function () {

    Route::apiResource('/transactions', TransactionController::class)->only(['store', 'update', 'show']);
});


// Endpoint yang hanya bisa diakses admin (dengan auth dan role:admin)
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::apiResource('/books', BookController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('/genres', GenreController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('/authors', AuthorsController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('/transactions', TransactionController::class)->only(['index', 'destroy']);
});


