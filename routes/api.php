<?php

use App\Http\Controllers\Api\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get ('Movie',[MovieController::class,'indexMovie']);
Route::post('/peliculas/create', [MovieController::class, 'store']);
Route::get('/peliculas', [MovieController::class,'index']);
Route::get('/peliculas/{id}', [MovieController::class, 'getById']);
Route::put('/peliculas/update/{id}', [MovieController::class, 'update']);