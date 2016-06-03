<?php

namespace App\Traits;
use Config;

/**
* Clase TraitRunas que obtiene la información sobre las runas, que luego llaman
* diferentes clases.
*/
trait TraitRunas {

    /**
     * Método que obtiene todas las runas de grado 3 (Existen grado 1, 2 y 3),
     * en el idioma que se está visualizando la pàgina.
     *
     *
     * @return array associativo con la información de los runas.
     */
    public function obtenerRunas() {
        $idioma = Config::get("app.locale");
        // Obtenemos el json.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/rune?locale='.$idioma.'&runeListData=image&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        // Lo transformamos a objetos que php pueda entender.
        $data = json_decode($json);
        // Creamos el array que almazenará los runas.
        $runas = array();
        // Creamos array associativo con los nombres de los tipos.
        $tipos = array(
                'black' => 'negro',
                'red' => 'rojo',
                'blue' => 'azul',
                'yellow' => 'amarillo',
        );
        // En la variable runas vamos introduciendo cada runa.
        foreach ($data->data as $infoRuna) {
            if ($infoRuna->rune->tier == 3) {
                $runas[] = array(
                    'nombre' => $infoRuna->name,
                    'descripcion' => $infoRuna->description,
                    'imagen' => 'http://ddragon.leagueoflegends.com/cdn/' . $data->version . '/img/rune/' . $infoRuna->image->full,
                    'grado' => $infoRuna->rune->tier,
                    'tipo' => $tipos[$infoRuna->rune->type],
                );
            }
        }
        // Ordenamos el array por nombre.
        asort($runas);
        // Devolvemos el array.
        return $runas;
    }
}
