<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        // $apiKey = env('TMDB_API_KEY');

        // $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        // $response = $client->request('GET', 'tv/popular', [
        //     'query' => ['api_key' => $apiKey, 'language' => 'pl']
        // ]);
        // $series = json_decode($response->getBody()->getContents(), true)['results'];
        // dd($series);

        $series = Serie::all();

        return view('series.index', [
            'series' => $series
        ]);
    }

    public function show(Serie $serie)
    {
        return view('series.show', [
            'serie' => $serie,
        ]);
    }
}
