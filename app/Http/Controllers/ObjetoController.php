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
    * Método que devuelve a la vista la información sobre el objeto seleccionado.
    *
    * @return información objeto a la vista.
    */
    public function mostrarObjeto($id)
    {
        return view('objetos.infoObjeto', [
            'objeto' => ObjetoController::obtenerObjetoPorId($id),
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
    /**
	* Método que a partir de una id, obtiene el objeto deseado.
	*
	* @return array associativo con la información del objeto.
	*/
	public function obtenerObjetoPorId($id)
	{
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/item/' . $id . '?locale=es_ES&itemData=gold,sanitizedDescription,stats,image,into&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');

        $data = json_decode($json);
        $descripcion = str_replace("<br>", "-", $data->description);
        // http://stackoverflow.com/questions/1364974/php-regular-expression-to-remove-tags-in-html-document
        // buscar remover tags php.
        $patron = '/<[\s\S]>/i';
        $descripcion = preg_replace($patron, "", $descripcion);
        $objeto = array(
            'nombre' => $data->name,
            'descripcion' => $descripcion,
            'imagen' => 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/' . $data->image->full,
            'precio' => array(
                'total' => $data->gold->total,
                'base' => $data->gold->base,
            ),
        );

        if (isset($data->into)) {
            for ($n = 0; $n < count($data->into); $n++) {
                $objeto['transforma'][$n] = 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/' . $data->into[$n] . '.png';
            }
        }
        print_r($objeto);
        return $objeto;
    }
}
