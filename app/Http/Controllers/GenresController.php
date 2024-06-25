<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Serie;
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
        $genreId = "%".$genre->id."%";
        $movies = Movie::where('genre', 'like', $genreId)->get();
        $series = Serie::where('genre', 'like', $genreId)->get();

        return view('genres.show', [
            'genre' => $genre,
            'movies' => $movies,
            'series' => $series,
        ]);
    }
}
