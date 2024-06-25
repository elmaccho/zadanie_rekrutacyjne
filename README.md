
<h2>Trasy dla filmow</h2>

<h4>Lista filmow:</h4>
    Route::get("/movies" , [MoviesController::class, 'index'])->name('movies.index');

<h4>Wyświetlenie informacji o filmie</h4>
    Route::get("/movies/{movie}" , [MoviesController::class, 'show'])->name('movies.show');


<h2>Trasy dla seriali</h2>

<h4>Lista seriali:</h4>
    Route::get("/series" , [SeriesController::class, 'index'])->name('series.index');

<h4>Wyświetlenie informacji o serialu</h4>
    Route::get("/series/{serie}" , [SeriesController::class, 'show'])->name('series.show');
    

<h2>Trasy dla gatunkow</h2>

<h4>Lista gatunków</h4>
    Route::get("/genres" , [GenresController::class, 'index'])->name('genres.index');

<h4>Wyświetlanie filmów i seriali z danego gatunku</h4>
    Route::get("/genres/{genre}" , [GenresController::class, 'show'])->name('genres.show');
