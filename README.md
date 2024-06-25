
Trasy dla filmow

Lista filmow:
    Route::get("/movies" , [MoviesController::class, 'index'])->name('movies.index');

Wyświetlenie informacji o filmie
    Route::get("/movies/{movie}" , [MoviesController::class, 'show'])->name('movies.show');


Trasy dla seriali

Lista seriali:
    Route::get("/series" , [SeriesController::class, 'index'])->name('series.index');

Wyświetlenie informacji o serialu
    Route::get("/series/{serie}" , [SeriesController::class, 'show'])->name('series.show');
    

Trasy dla gatunkow

Lista gatunków
    Route::get("/genres" , [GenresController::class, 'index'])->name('genres.index');

Wyświetlanie filmów i seriali z danego gatunku
    Route::get("/genres/{genre}" , [GenresController::class, 'show'])->name('genres.show');