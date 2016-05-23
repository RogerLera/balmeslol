<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Traits\TraitHechizos;

/**
 * Clase HechizoController que llama la vista para mostrar los datos referente a los
 * hechizos, obteniendo la información de la API Riot en formato .json.
 */
class HechizoController extends Controller {
        use TraitHechizos;

    /**
     * Método principal que nos devuelve la vista de todos los hechizos existentes
     * @return type la vista de los hechizos
     */
    public function mostrarHechizos(){
        return view('hechizos.index', [
            'hechizos' => $this->obtenerHechizos(),
        ]);
    }

    public function mostrarHechizo($id){
        return view('hechizos.infoHechizo', [
			'hechizo' => $this->obtenerHechizoPorId($id),
		]);
    }

    /**
     * Método que a partir de una id, obtiene el hechizo deseado.
     *
     * @return array associativo con la información del hechizo.
     */
    public function obtenerHechizoPorId($id) {
        // Obtenemos el json.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/summoner-spell/'.$id.'?locale=es_ES&spellData=all&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        // Lo transformamos a objetos que php pueda entender.
        $infoHechizo = json_decode($json);

        // Inicializamos el array hechizo con toda la información que necesitamos.
        $hechizo = array(
            'nombre' => $infoHechizo->name,
            'descripcion' => $infoHechizo->sanitizedDescription,
            'imagen' => 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/' . $infoHechizo->image->full,
            'reutilizacion' => $infoHechizo->cooldownBurn,
        );

        // Devolvemos el array hechizo.
        return $hechizo;
    }

}
