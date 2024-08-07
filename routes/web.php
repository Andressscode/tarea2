<?php
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MovieController::class, 'index']);
Route::get('/movies/genero/{genre}', [MovieController::class, 'verGenero'])->name('movies.genero');