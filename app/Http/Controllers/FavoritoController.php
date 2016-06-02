<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Favorito;

/**
* Clase FavoritoController que se encarga de añadir/eliminar un registro a la base
* de datos, dependiendo si se ha dado al boton para guardar a favoritos una guia o
* para eliminarla.
*/
class FavoritoController extends Controller {

    public function guardarAFavoritos()
    {
        $guiId = Input::get('guiId');
        $usuId = Input::get('usuId');
        $resultado = 'No se ha podido guardar a favoritos.';
        $where = ['usuId' => $usuId, 'guiId' => $guiId];
        $favoritoExistente = Favorito::where($where)->first();
        if (is_null($favoritoExistente)) {
            Favorito::create([
                'usuId' => $usuId,
                'guiId' => $guiId,
            ]);
            $resultado = 'Guardado a favoritos.';
        }
        return $resultado;
    }

    public function borrarDeFavoritos()
    {
        $guiId = Input::get('guiId');
        $usuId = Input::get('usuId');
        $resultado = 'No se ha podido borrar de favoritos.';
        $where = ['usuId' => $usuId, 'guiId' => $guiId];
        $favoritoExistente = Favorito::where($where)->delete();
        $resultado = 'Borrado de favoritos.';
        return $resultado;
    }
}
