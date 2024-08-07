<?php

namespace App\Policies;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Illuminate\Http\Request;

class PeliculaPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function ordenar(Request $request)
    {
        $campoOrden = $request->query('campo_orden', 'id');
        $orden = $request->query('orden', 'asc');

        $camposValidos = ['id', 'title', 'year', 'studio', 'category_id', 'created_at', 'updated_at'];
        $ordenesValidas = ['asc', 'desc'];

        if (!in_array($campoOrden, $camposValidos) || !in_array($orden, $ordenesValidas)) {
            return false;
        }

        return true;
    }
}
