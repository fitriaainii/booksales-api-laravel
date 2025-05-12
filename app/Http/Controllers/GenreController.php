<?php

namespace App\Http\Controllers;

use App\Models\Genre;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = new Genre();
        $genres = $genres->getGenres();

        return view('genres', ['genres' => $genres]);
    }
}
