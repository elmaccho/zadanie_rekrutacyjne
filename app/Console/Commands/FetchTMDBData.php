<?php

namespace App\Console\Commands;

use App\Models\Genre;
use App\Models\Movie;
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

        // GATUNKI
        $response = $client->request('GET', 'genre/movie/list', [
            'query' => ['api_key' => $apiKey]
        ]);
        $genres = json_decode($response->getBody()->getContents(), true)['genres'];

        foreach ($genres as $genre) {
            Genre::updateOrCreate(['id' => $genre['id']], [
                'name' => [
                    'en' => $genre['name'],
                    'pl' => $this->getTranslation($client, 'genre', $genre['id'], 'name', 'pl'),
                    'de' => $this->getTranslation($client, 'genre', $genre['id'], 'name', 'de'),
                ]
            ]);
        }

        // SERIALE
        $response = $client->request('GET', 'tv/popular', [
            'query' => ['api_key' => $apiKey, 'language' => 'en']
        ]);
        $series = json_decode($response->getBody()->getContents(), true)['results'];

        foreach (array_slice($series, 0, 10) as $serie) {
            Serie::updateOrCreate(['id' => $serie['id']], [
                'title' => [
                    'en' => $serie['name'],
                    'pl' => $this->getTranslation($client, 'tv', $serie['id'], 'name', 'pl'),
                    'de' => $this->getTranslation($client, 'tv', $serie['id'], 'name', 'de'),
                ],
                'plot' => [
                    'en' => $serie['overview'],
                    'pl' => $this->getTranslation($client, 'tv', $serie['id'], 'overview', 'pl'),
                    'de' => $this->getTranslation($client, 'tv', $serie['id'], 'overview', 'de'),
                ],
                'poster_path' => $serie['poster_path'],
                'genre' => json_encode($serie['genre_ids']),
            ]);
        }

        // FILMY
        $response = $client->request("GET", "movie/popular", [
            'query' => ['api_key' => $apiKey, 'language' => 'en', 'page' => 1]
        ]);
        $movies = json_decode($response->getBody()->getContents(), true)['results'];

        foreach (array_slice($movies, 0, 50) as $movie) {
            Movie::updateOrCreate(['id' => $movie['id']], [
                'title' => [
                    'en' => $movie['title'],
                    'pl' => $this->getTranslation($client, 'movie', $movie['id'], 'title', 'pl'),
                    'de' => $this->getTranslation($client, 'movie', $movie['id'], 'title', 'de'),
                ],
                'plot' => [
                    'en' => $movie['overview'],
                    'pl' => $this->getTranslation($client, 'movie', $movie['id'], 'overview', 'pl'),
                    'de' => $this->getTranslation($client, 'movie', $movie['id'], 'overview', 'de'),
                ],
                'poster_path' => $movie['poster_path'],
                'genre' => json_encode($movie['genre_ids']),
            ]);
        }
    }

    private function getTranslation($client, $type, $id, $field, $language)
    {
        $response = $client->request("GET", "$type/$id", [
            'query' => ['api_key' => env('TMDB_API_KEY'), 'language' => $language]
        ]);
        $data = json_decode($response->getBody()->getContents(), true);

        return $data[$field] ?? $data['name'];
    }
}
