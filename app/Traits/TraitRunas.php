<?php

namespace App\Traits;

trait TraitRunas {

    /**
     * Método que obtiene todas las runas de grado 3 (Existen grado 1, 2 y 3),
     * en el idioma que se está visualizando la pàgina.
     *
     *
     * @return array associativo con la información de los hechizos.
     */
    public function obtenerRunas() {
        // Más adelante implementar sessión con idioma.
        //$idioma = Session::get('idioma');
        // Obtenemos el json.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/rune?locale=es_ES&runeListData=image&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        // Lo transformamos a objetos que php pueda entender.
        $data = json_decode($json);
        // Creamos el array que almazenará los hechizos.
        $runas = array();
        print_r($data->data);
        // En la variable hechizos vamos introduciendo cada hechizo.
        foreach ($data->data as $infoRuna) {
            $runas[] = array(
                'nombre' => $infoRuna->name,
                'descripcion' => $infoRuna->description,
                'imagen' => 'http://ddragon.leagueoflegends.com/cdn/' . $data->version . '/img/rune/' . $infoRuna->image->full,
            );
        }
        // Ordenamos el array por nombre.
        asort($runas);
        // Devolvemos el array.
        return $runas;
    }
}
