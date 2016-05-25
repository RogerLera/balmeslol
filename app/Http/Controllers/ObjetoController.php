<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Clase ObjetoController que llama la vista para mostrar los datos referente a los
 * objetos, obteniendo la información de la API Riot en formato .json.
 */
class ObjetoController extends Controller {

    /**
     * Método principal que se llama al acceder a la pestanya objetos.
     * Coje del .json toda la información necessaria para la vista.
     *
     * @return información objetos a la vista.
     */
    public function index(Request $request) {
        return view('objetos.index', [
            'objetos' => $this->obtenerObjetos(),
        ]);
    }

    /**
     * Método que devuelve a la vista la información sobre el objeto seleccionado.
     *
     * @return información objeto a la vista.
     */
    public function mostrarObjeto($id) {
        return view('objetos.infoObjeto', [
            'objeto' => $this->obtenerObjetoPorId($id),
        ]);
    }

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
                'imagen' => 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/' . $infoObjeto->image->full,
                // Comprovamos que tienen etiquetas (hay muchos objetos que no tienen etiquetas).
                'tags' => (isset($infoObjeto->tags)) ? $infoObjeto->tags : "other",
            );
        }
        // Ordenamos el array por nombre.
        asort($objetos);
        // Devolvemos el objeto.
        return $objetos;
    }

    /**
     * Método que a partir de una id, obtiene el objeto deseado.
     *
     * @return array associativo con la información del objeto.
     */
    public function obtenerObjetoPorId($id) {
        // Obtenemos el json y lo parseamos a objeto php.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/item/' . $id . '?locale=es_ES&itemData=gold,stats,image,into,from&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        $data = json_decode($json);

        // Realizamos todos los canvios al apartado $data->description que nos llega,
        // para obtener las estadisticas del objeto bien formateadas.
        $estadisticas = str_replace("<br>", "_", $data->description);
        $estadisticas = preg_replace("/<.*?>/", "", $estadisticas);
        $estadisticas = explode("_", $estadisticas);

        // Creamos el array objeto que tiene toda la información.
        $objeto = array(
            'id' => $data->id,
            'nombre' => $data->name,
            'estadisticas' => $data->description,
            'imagen' => 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/' . $data->image->full,
            'precio' => array(
                'total' => $data->gold->total,
                'base' => $data->gold->base,
            ),
        );

        // Si existe el atributo 'from' (el objeto viene de otros objetos)
        // guardamos en un array la información de dichos objetos.
        if (isset($data->from)) {
            for ($n = 0; $n < count($data->from); $n++) {
                if ($data->from[$n] != 3718 && $data->from[$n] != 3722 && $data->from[$n] != 1313) {
                    $objeto['procede'][] = $this->obtenerObjetodelObjetoPorId($data->from[$n]);
                }
            }
        }

        // Si existe el atributo 'into' (el objeto puede 'mejorarse' para hacer uno de mejor)
        // guardamos en un array la información de dichos objetos.
        if (isset($data->into)) {
            for ($n = 0; $n < count($data->into); $n++) {
                if ($data->into[$n] != 3718 && $data->into[$n] != 3722 && $data->into[$n] != 1313) {
                    $objeto['mejora'][] = $this->obtenerObjetodelObjetoPorId($data->into[$n]);
                }
            }
        }
        // Devolvemos el objeto.
        return $objeto;
    }

    /**
     * Método que busca un objeto a partir de un id, que procede de otro objeto (padre o hijo),
     * para que en el dicho objeto se puda ver de donde procede o lo que se puede hacer con el.
     *
     * @return array associativo con la información del objeto.
     */
    private function obtenerObjetodelObjetoPorId($id) {
        // Obtenemos el json y lo parseamos a objeto php.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/item/' . $id . '?locale=es_ES&itemData=gold,stats,image,into,from&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        $data = json_decode($json);

        // Creamos el array objeto que tiene toda la información.
        $objeto = array(
            'id' => $data->id,
            'nombre' => $data->name,
            'imagen' => 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/' . $data->image->full,
            'precio' => array(
                'total' => $data->gold->total,
                'base' => $data->gold->base,
            ),
        );

        // Si existe el atributo 'from' (el objeto viene de otros objetos)
        // guardamos en un array las imagenes de los objetos.
        if (isset($data->from)) {
            for ($n = 0; $n < count($data->from); $n++) {
                // Llamamos a la función para obtener el objeto del que procede para obtener información a mostrar.
                $objeto['procede'][$n] = 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/' . $data->from[$n] . '.png';
            }
            // Ordenamos el array de $objeto['procede'] por id.
            asort($objeto['procede']);
        }

        // Si existe el atributo 'into' (el objeto puede 'mejorarse' para hacer uno de mejor)
        // guardamos en un array las imagenes de los objetos.
        if (isset($data->into)) {
            for ($n = 0; $n < count($data->into); $n++) {
                $objeto['mejora'][$n] = 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/' . $data->into[$n] . '.png';
            }
            // Ordenamos el array de $objeto['mejora'] por id.
            asort($objeto['mejora']);
        }
        // Devolvemos el objeto.
        return $objeto;
    }

}
