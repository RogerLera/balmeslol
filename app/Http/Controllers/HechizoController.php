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
    public function index(){
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
    * Método que obtiene todos los hechizos de invocador, en el idioma que se está visualizando la pàgina.
    *
    *
    * @return array associativo con la información de los objetos.
    */
    public function obtenerHechizos()
    {
        // Obtenemos el json y lo parseamos a hechizo php.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/summoner-spell?locale=es_ES&spellData=all&api_key=c6745175-3719-4356-993e-65c331d8f4ae');
        $data = json_decode($json);

        // Creamos el array contenedor de todos los hechizos.
        $hechizos = array();
        // En la variable objetos vamos introduciendo cada hechizo.
        foreach($data->data as $infoHechizo) {
            $hechizos[] = array(
                'id' => $infoHechizo->id,
                'nombre' => $infoHechizo->name,
                'descripcion' => $infoHechizo->sanitizedDescription,
                'imagen' => 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/' . $infoHechizo->image->full,
                'reutilizacion' => $infoHechizo->cooldownBurn,
                'nivel' => $infoHechizo->summonerLevel,
                );
        }
        // Ordenamos el array por nombre.
        asort($hechizos);
        // Devolvemos el objeto.
        return $hechizos;
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
