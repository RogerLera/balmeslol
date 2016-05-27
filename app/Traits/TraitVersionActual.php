<?php

namespace App\Traits;

trait TraitVersionActual {

    /**
     * Método para obtener la versión actual del juego.
     *
     * @return type la versión del juego
     */
    public function version() {
        // Obtenemos el json.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/versions?api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        // Lo transformamos a objetos que php pueda entender.
        $version = json_decode($json);
        // Devolvemos la última versión.
        return $version[0];
    }
}
