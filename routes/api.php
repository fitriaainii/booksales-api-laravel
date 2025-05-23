<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);   
Route::post('/books/{id}', [BookController::class, 'update']);



Route::get('/genres', [GenreController::class, 'index']);
Route::post('/genres', [GenreController::class, 'store']);
Route::get('/genres/{id}', [GenreController::class, 'show']);
Route::delete('/genres/{id}', [GenreController::class, 'destroy']);
Route::post('/genres/{id}', [GenreController::class, 'update']);



Route::get('/authors', [AuthorsController::class, 'index']);
Route::post('/authors', [AuthorsController::class, 'store']);
Route::get('/authors/{id}', [AuthorsController::class, 'show']);
Route::delete('/authors/{id}', [AuthorsController::class, 'destroy']);
Route::post('/authors/{id}', [AuthorsController::class, 'update']);
