<?php

namespace App\Http\Controllers;

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
}
