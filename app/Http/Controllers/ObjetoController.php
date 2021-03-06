<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Traits\TraitVersionActual;
use App\Traits\TraitObjetos;
use Config;

/**
 * Clase ObjetoController que llama la vista para mostrar los datos referente a los
 * objetos, obteniendo la información de la API Riot en formato .json.
 */
class ObjetoController extends Controller
{
    use TraitVersionActual, TraitObjetos;

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
     * Método que a partir de una id, obtiene el objeto deseado.
     *
     * @return array associativo con la información del objeto.
     */
    public function obtenerObjetoPorId($id) {
        $idioma = Config::get("app.locale");
        $json = "Empty";
        if (strpos(get_headers('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/item/' . $id . '?locale='.$idioma.'&itemData=gold,stats,image,into,from&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6')[0], '200') !== false) {
            // Obtenemos el json y lo parseamos a objeto php.
            $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/item/' . $id . '?locale='.$idioma.'&itemData=gold,stats,image,into,from&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
            $data = json_decode($json);

            // Realizamos todos los cambios al apartado $data->description que nos llega,
            // para obtener las estadisticas del objeto bien formateadas.
            $estadisticas = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $data->description);

            // Creamos el array objeto que tiene toda la información.
            $objeto = array(
                'id' => $data->id,
                'nombre' => $data->name,
                'estadisticas' => $estadisticas,
                'imagen' => 'https://ddragon.leagueoflegends.com/cdn/' . $this->version() . '/img/item/' . $data->image->full,
                'precio' => array(
                    'total' => $data->gold->total,
                    'base' => $data->gold->base,
                ),
            );

            $objetoYaExistente = $objeto;

            // Si existe el atributo 'from' (el objeto viene de otros objetos)
            // guardamos en un array la información de dichos objetos.
            if (isset($data->from)) {
                for ($n = 0; $n < count($data->from); $n++) {
                    if ($data->from[$n] != 3718 && $data->from[$n] != 3722 && $data->from[$n] != 1313 && $data->from[$n] != 1312 && $data->from[$n] != 3290) {
                        $objeto['procede'][] = $this->obtenerObjetodelObjetoPorId($data->from[$n], $objetoYaExistente);
                    }
                }
            }

            // Si existe el atributo 'into' (el objeto puede 'mejorarse' para hacer uno de mejor)
            // guardamos en un array la información de dichos objetos.
            if (isset($data->into)) {
                for ($n = 0; $n < count($data->into); $n++) {
                    if ($data->into[$n] != 3718 && $data->into[$n] != 3722 && $data->into[$n] != 1313 && $data->into[$n] != 1312 && $data->into[$n] != 3290) {
                        $objeto['mejora'][] = $this->obtenerObjetodelObjetoPorId($data->into[$n], $objetoYaExistente);
                    }
                }
            }
            // Devolvemos el objeto.
            $json = $objeto;
        }
        return $json;
    }

    /**
     * Método que busca un objeto a partir de un id, que procede de otro objeto (padre o hijo),
     * para que en el dicho objeto se puda ver de donde procede o lo que se puede hacer con el.
     *
     * @return array associativo con la información del objeto.
     */
    private function obtenerObjetodelObjetoPorId($id, $objetoYaExistente) {
        $idioma = Config::get("app.locale");
        // Obtenemos el json y lo parseamos a objeto php.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/item/' . $id . '?locale='.$idioma.'&itemData=gold,stats,image,into,from&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        $data = json_decode($json);

        // Creamos el array objeto que tiene toda la información.
        $objeto = array(
            'id' => $data->id,
            'nombre' => $data->name,
            'imagen' => 'https://ddragon.leagueoflegends.com/cdn/' . $this->version() . '/img/item/' . $data->image->full,
            'precio' => array(
                'total' => $data->gold->total,
                'base' => $data->gold->base,
            ),
        );

        // Si existe el atributo 'from' (el objeto viene de otros objetos)
        // guardamos en un array las imagenes de los objetos.
        if (isset($data->from)) {
            for ($n = 0; $n < count($data->from); $n++) {
                if ($data->from[$n] == $objetoYaExistente['id']) {
                    $objeto['procede'][$n]['id'] = $objetoYaExistente['id'];
                    $objeto['procede'][$n]['img'] = $objetoYaExistente['imagen'];
                } else {
                    // Llamamos a la función para obtener el objeto del que procede para obtener información a mostrar.
                    $objeto['procede'][$n]['id'] =  $data->from[$n];
                    $objeto['procede'][$n]['img'] = 'https://ddragon.leagueoflegends.com/cdn/' . $this->version() . '/img/item/' . $data->from[$n] . '.png';
                }
            }
            // Ordenamos el array de $objeto['procede'] por id.
            //asort($objeto['procede']);
        }

        // Si existe el atributo 'into' (el objeto puede 'mejorarse' para hacer uno de mejor)
        // guardamos en un array las imagenes de los objetos.
        if (isset($data->into)) {
            for ($n = 0; $n < count($data->into); $n++) {
                $objeto['mejora'][$n]['id'] = $data->into[$n];
                $objeto['mejora'][$n]['img'] = 'https://ddragon.leagueoflegends.com/cdn/' . $this->version() . '/img/item/' . $data->into[$n] . '.png';
            }
            // Ordenamos el array de $objeto['mejora'] por id.
            //asort($objeto['mejora']);
        }
        // Devolvemos el objeto.
        return $objeto;
    }

}
