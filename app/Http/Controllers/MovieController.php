<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('movies.index', ['categories' => $categories]);
    }

    public function verGenero($genero)
    {
        $category = Category::where('name', $genero)->first();

        if (!$category) {
            return redirect()->route('movies.index')->withErrors('Género no encontrado.');
        }

        $movies = $category->movies;
        return view('movies.genero', ['genero' => $genero, 'movies' => $movies]);
    }
}
