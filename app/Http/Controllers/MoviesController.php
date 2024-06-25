<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    
    public function index()
    {
        // $apiKey = env('TMDB_API_KEY');

        // $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        // $response = $client->request("GET", "movie/popular", [
        //     'query' => ['api_key' => $apiKey, 'language' => 'en', 'page' => 1]
        // ]);
        // $movies = json_decode($response->getBody()->getContents(), true)['results'];
        // dd($movies);

        $movies = Movie::all();

        return view('movies.index', [
            'movies' => $movies
        ]);
    }

    public function show(Movie $movie)
    {
        $genresArray = json_decode($movie->genre, true);
        $genresList = Genre::whereIn('id', $genresArray)->get();

        return view('movies.show', [
            'movie' => $movie,
            'genresList' => $genresList,
        ]);
    }
    
}
