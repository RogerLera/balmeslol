<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Votacion;

/**
* Clase VotacionController que se encarga de añadir/eliminar un registro a la base
* de datos, dependiendo si se ha dado al boton de me gusta o de no me gusta.
*/
class VotacionController extends Controller {
    
    /**
     * Método que gestiona las votaciones
     * @return int 0 nueva, 1 cambio de voto, 2 mismo voto (todo sigue igual)
     */
    public function votacion()
    {
        $guiId = Input::get('guiId');
        $usuId = Input::get('usuId');
        $tipo = Input::get('tipo');
        $esNuevo = 0;
        $where = ['usuId' => $usuId, 'guiId' => $guiId];
        $votacionExistente = Votacion::where($where)->first();
        if (is_null($votacionExistente)) {
            Votacion::create([
                'usuId' => $usuId,
                'guiId' => $guiId,
                'votValoracion' => $tipo,
            ]);
        } else {
            if ($votacionExistente->votValoracion != $tipo) {
                $votacionExistente->votValoracion = $tipo;
                $votacionExistente->save();
                $esNuevo = 1;
            } else {
                $esNuevo = 2;
            }
        }
        return $esNuevo;
    }
}
