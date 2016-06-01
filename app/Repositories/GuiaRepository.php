<?php

namespace App\Repositories;

use App\User;
use App\Guia;
use App\Favorito;

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

    public function guiasFavoritas($id)
    {
        $favoritos = Favorito::where('usuId', $id)
                                ->orderBy('created_at', 'asc')
                                ->get();
        $guias = array();
        foreach ($favoritos as $favorito) {
            $guias[] = Guia::whereId($favorito->guiId)->get();
        }
        return $guias;
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
