<?php

namespace App\Repositories;

use App\User;
use App\Guia;
use App\Favorito;

/**
* Clase GuiaRepository que reune los métodos para obtener el tipo de guias
* requeridas en cada llamada. Usado por GuiaController.
*/
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
     * Obtener las guias favoritas del usuario en base a su id.
     *
     * @param type $id id del usuario del que queremos obtener las guias
     * @return type guias favoritas del usuario en un array
     */
    public function guiasFavoritas($id)
    {
        $favoritos = Favorito::where('usuId', $id)
                                ->orderBy('created_at', 'asc')
                                ->get();
        $guias = array();
        foreach ($favoritos as $favorito) {
            $guias[] = Guia::whereId($favorito->guiId)->get()->first();
        }
        return $guias;
    }

    /**
     * Obtener las guias de más nuevas a viejas.
     *
     * @return type guias
     */
    public function nuevas()
    {
        return Guia::orderBy('updated_at', 'desc')
                    ->get();
    }

    /**
     * Obtener las guias de mayor a menor votos.
     *
     * @return type guias
     */
    public function masVotadas()
    {
        return Guia::orderBy('guiPositivo', 'desc')
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
                    ->paginate(10);
    }
}
