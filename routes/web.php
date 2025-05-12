<?php

use App\Http\Controllers\AuthorsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GenresController;
use Illuminate\Container\Attributes\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index']);

Route::get('/genres', [GenreController::class, 'index']);

Route::get('/authors', [AuthorsController::class, 'index']);

