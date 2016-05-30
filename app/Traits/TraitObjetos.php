<?php

namespace App\Traits;

trait TraitObjetos {

    /**
     * Método que obtiene todos los objetos, en el idioma que se está visualizando la pàgina.
     *
     *
     * @return array associativo con la información de los objetos.
     */
    public function obtenerObjetos() {
        // Obtenemos el json y lo parseamos a objeto php.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/item?locale=es_ES&itemListData=image,tags&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        $data = json_decode($json);

        // Creamos el array contenedor de todos los objetos.
        $objetos = array();
        // En la variable objetos vamos introduciendo cada objeto.
        foreach ($data->data as $infoObjeto) {
            $objetos[] = array(
                // Comprovamos que existe el atributo name (hay un objeto que no tiene nombre).
                'nombre' => (isset($infoObjeto->name)) ? $infoObjeto->name : "Farsight Orb",
                'id' => $infoObjeto->id,
                'imagen' => 'https://ddragon.leagueoflegends.com/cdn/' . $data->version . '/img/item/' . $infoObjeto->image->full,
                // Comprovamos que tienen etiquetas (hay muchos objetos que no tienen etiquetas).
                'tags' => (isset($infoObjeto->tags)) ? $infoObjeto->tags : "other",
            );
        }
        // Ordenamos el array por nombre.
        asort($objetos);
        // Devolvemos el objeto.
        return $objetos;
    }
}
