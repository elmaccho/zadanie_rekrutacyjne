<?php

namespace App\Console\Commands;

use App\Models\Genre;
use App\Models\Serie;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class FetchTMDBData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tmdb:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch TMDB data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = env('TMDB_API_KEY');

        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);

        // Fetch genres
        // $response = $client->request('GET', 'genre/movie/list', [
        //     'query' => ['api_key' => $apiKey]
        // ]);
        // $genres = json_decode($response->getBody()->getContents(), true)['genres'];

        // foreach ($genres as $genre) {
        //     Genre::updateOrCreate(['id' => $genre['id']], [
        //         'name' => ['en' => $genre['name'], 'pl' => $genre['name'], 'de' => $genre['name']]
        //     ]);
        // }

        $response = $client->request('GET', 'tv/popular', [
            'query' => ['api_key' => $apiKey, 'language' => 'en']
        ]);
        $series = json_decode($response->getBody()->getContents(), true)['results'];

        foreach (array_slice($series, 0, 10) as $serie) {
            Serie::updateOrCreate(['id' => $serie['id']], [
                'title' => ['en' => $serie['name'], 'pl' => $serie['name'], 'de' => $serie['name']],
                'plot' => ['en' => $serie['overview'], 'pl' => $serie['overview'], 'de' => $serie['overview']],
                'poster_path' => $serie['poster_path'],
                'genre' => $serie['genres_id']
            ]);
        }
    }
}
