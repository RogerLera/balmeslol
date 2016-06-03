<?php

namespace App\Traits;
use Config;

/**
* Clase TraitHechizos que obtiene todos los hechizos en una función, que luego llaman
* diferentes clases.
*/
trait TraitHechizos {

    /**
     * Método que obtiene todos los hechizos, en el idioma que se está visualizando la pàgina.
     *
     * @return array associativo con la información de los hechizos.
     */
    public function obtenerHechizos() {
        $idioma = Config::get("app.locale");
        // Obtenemos el json.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/summoner-spell?locale='.$idioma.'&spellData=all&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        // Lo transformamos a objetos que php pueda entender.
        $data = json_decode($json);
        // Creamos el array que almazenará los hechizos.
        $hechizos = array();
        // En la variable hechizos vamos introduciendo cada hechizo.
        foreach ($data->data as $infoHechizo) {
            $hechizos[] = array(
                'nombre' => $infoHechizo->name,
                'id' => $infoHechizo->id,
                'imagen' => 'https://ddragon.leagueoflegends.com/cdn/' . $data->version . '/img/spell/' . $infoHechizo->image->full,
            );
        }
        // Ordenamos el array por nombre.
        asort($hechizos);
        // Devolvemos el array.
        return $hechizos;
    }
}
