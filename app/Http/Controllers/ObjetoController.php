<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
* Clase ObjetoController que llama la vista para mostrar los datos referente a los
* objetos, obteniendo la información de la API Riot en formato .json.
*/
class ObjetoController extends Controller
{
    /**
    * Método principal que se llama al acceder a la pestanya objetos.
    * Coje del .json toda la información necessaria para la vista.
    *
    * @return información objetos a la vista.
    */
    public function index(Request $request)
    {
        return view('objetos.index', [
            'objetos' => ObjetoController::obtenerObjetos(),
        ]);
    }

    /**
    * Método que obtiene todos los objetos, en el idioma que se está visualizando la pàgina.
    *
    *
    * @return array associativo con la información de los objetos.
    */
    public function obtenerObjetos()
    {
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/item?locale=es_ES&itemListData=image&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

        $data = json_decode($json);
        //print_r($data->data);
        $objetos = array();
		// En la variable objetos vamos introduciendo cada objeto.
		foreach($data->data as $infoObjeto) {
		    $objetos[] = array(
                    // Comprovamos que existe el atributo name (hay un objeto que no tiene nombre).
					'nombre' => (isset($infoObjeto->name)) ? $infoObjeto->name : "Farsight Orb",
		            'id' => $infoObjeto->id,
		            'imagen' => 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/' . $infoObjeto->image->full,
                    // Comprovamos que tienen grupo (hay muchos objetos que no tienen un grupo).
                    'grupo' => (isset($infoObjeto->group)) ? $infoObjeto->group : "ninguno",
		        );
		}
		// Ordenamos el array por nombre.
		asort($objetos);
        // Devolvemos el objeto.
        return $objetos;
    }
}
