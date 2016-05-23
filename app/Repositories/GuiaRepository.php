<?php

namespace App\Repositories;

use App\Usuario;
use App\Guia;

class GuiaRepository
{
    /**
     * Obtener todas las guias del usuario.
     *
     * @param  $id id user.
     * @return Collection
     */
    public function delUser($id)
    {
        return Guia::where('usuId', $id)
                    ->orderBy('created_at', 'desc')
                    ->get();
    }

    /**
     * Obtiene todas las guias creadas en la base de datos.
     *
     * @return Devuelve las guias.
     */
    public function totalGuias()
    {
        return Guia::orderBy('created_at', 'desc')
                    ->get();
    }
}
