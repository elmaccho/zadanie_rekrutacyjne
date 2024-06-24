<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    
    public function index()
    {
        return view('movies.index', [
            // 'movie' => $data
        ]);
    }

    public function show(Movie $movie)
    {
        return view('movies.show', [
            'movie' => $movie,
        ]);
    }
}
