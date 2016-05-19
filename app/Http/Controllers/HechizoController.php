<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Clase CampeonController que llama la vista para mostrar los datos referente a los
 * campeones, obteniendo la información de la API Riot en formato .json.
 */
class HechizoController extends Controller {

    /**
     * Método que obtiene todos los hechizos, en el idioma que se está visualizando la pàgina.
     *
     *
     * @return array associativo con la información de los hechizos.
     */
    public function obtenerHechizos() {
        // Más adelante implementar sessión con idioma.
        //$idioma = Session::get('idioma');
        // Obtenemos el json.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/summoner-spell?locale=es_ES&spellData=all&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        // Lo transformamos a objetos que php pueda entender.
        $data = json_decode($json);
        // Creamos el array que almazenará los hechizos.
        $hechizos = array();
        // En la variable hechizos vamos introduciendo cada hechizo.
        foreach ($data->data as $infoHechizo) {
            $hechizos[] = array(
                'nombre' => $infoHechizo->name,
                'id' => $infoHechizo->id,
                'descripcion' => $infoHechizo->sanitizedDescription,
                'imagen' => 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/' . $infoHechizo->image->full,
                'reutilizacion' => $infoHechizo->cooldownBurn,
            );
        }
        // Ordenamos el array por nombre.
        asort($hechizos);
        // Devolvemos el array.
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
