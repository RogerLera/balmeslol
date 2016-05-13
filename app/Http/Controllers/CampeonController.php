<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
* Clase CampeonController que llama la vista para mostrar los datos referente a los
* campeones, obteniendo la información de la API Riot en formato .json.
*/
class CampeonController extends Controller
{
	/**
	* Método principal que se llama al acceder a la pestanya campeones.
	* Coje del .json toda la información necessaria para la vista.
	*
	* @return información campeones a la vista.
	*/
	public function index(Request $request)
	{
	    return view('campeones.index', [
            'campeones' => obtenerCampeones(),
		]);
	}

	/**
	* Método que devuelve a la vista la información sobre el campeón seleccionado.
	*
	* @return información campeón a la vista.
	*/
	public function mostrarCampeon(Request $request)
	{
		return view('campeones.infoCampeon', [
			'campeon' => obtenerCampeonPorId($request->id),
		]);
	}

	/**
	* Método que obtiene todos los campeones, en el idioma que se está visualizando la pàgina.
	*
	*
	* @return array associativo con la información de los campeones.
	*/
	public function obtenerCampeones()
	{
		// Más adelante implementat sessión con idioma.
		//$idioma = Session::get('idioma');
		// Obtenemos el json.
		$json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?locale=es_ES&champData=image&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
		// Lo transformamos a objetos que php pueda entender.
		$data = json_decode($json);
		// Creamos el array que almazenará los campeones.
		$campeones = array();
		// En la variable campeones vamos introduciendo cada campeón.
		foreach($data->data as $infoCampeon){
		    $campeones[] = array(
					'nombre' => $infoCampeon->name,
		            'id' => $infoCampeon->id,
		            'titulo' => $infoCampeon->title,
		            'imagen' => 'http://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/' . $infoCampeon->image->full,
		        );
		}
		// Ordenamos el array por nombre.
		asort($campeones);
		// Devolvemos el array.
		return $campeones;
	}

	/**
	* Método que a partir de una id, obtiene el campeón deseado.
	*
	* @return array associativo con la información del campeón.
	*/
	public function obtenerCampeonPorId($id)
	{

	}
}
