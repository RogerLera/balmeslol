<?php

namespace App\Repositories;

use App\Usuario;
use App\Guia;

class GuiaRepository
{
    /**
     * Obtiene todas las guias creadas en la base de datos.
     *
     * @param  Usuario  $usuario
     * @return Devuelve
     */
    public function totalGuias()
    {
        return Guia::orderBy('created_at', 'desc')
                    ->get();
    }
}
