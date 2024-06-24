<?php

use App\Http\Controllers\GenresController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("/movies" , [MoviesController::class, 'index'])->name('movies.index');
    Route::get("/movies/{movie}" , [MoviesController::class, 'show'])->name('movies.show');
    
    Route::get("/series" , [SeriesController::class, 'index'])->name('series.index');
    Route::get("/series/{serie}" , [SeriesController::class, 'show'])->name('series.show');
    
    Route::get("/genres" , [GenresController::class, 'index'])->name('genres.index');
    Route::get("/genres/{genre}" , [GenresController::class, 'show'])->name('genres.show');
});

require __DIR__.'/auth.php';
