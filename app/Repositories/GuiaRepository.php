<?php

namespace App\Repositories;

use App\Usuario;
use App\Guia;

class GuiaRepository
{
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
