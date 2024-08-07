<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Policies\PeliculaPolicy;

class MovieController extends Controller
{
    protected $policy;

    public function __construct(PeliculaPolicy $policy)
    {
        $this->policy = $policy;
    }

    public function index(Request $request)
    {
        // Validar parámetros de ordenación
        $campoOrden = $request->query('campo_orden', 'id'); 
        $orden = $request->query('orden', 'asc'); 

        // Validar que los parámetros sean válidos
        if (!in_array($campoOrden, ['id', 'title', 'year', 'studio', 'category_id']) || !in_array($orden, ['asc', 'desc'])) {
            return response()->json(['error' => 'Parámetros de ordenación no válidos'], 400);
        }

        // Obtener películas ordenadas
        $peliculas = Movie::orderBy($campoOrden, $orden)->get();

        return response()->json($peliculas, 200);
    }

    public function indexMovie()
    {
        $movies = Movie::all();
        return response()->json($movies, 200);
    }

    public function getById($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['error' => 'Película no encontrada'], 404); 
        }

        return response()->json($movie, 200);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['error' => 'Película no encontrada'], 404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'studio' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $movie->update($request->all());

        return response()->json($movie, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'studio' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $movie = Movie::create($request->all());

        return response()->json($movie, 201);
    }
}
