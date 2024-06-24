<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return view('genres.index', [
            'genres' => $genres,
        ]);
    }

    public function show(Genre $genre)
    {
        return view('genres.show', [
            'genre' => $genre,
        ]);
    }
}
