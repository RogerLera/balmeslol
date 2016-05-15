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
            'campeones' => CampeonController::obtenerCampeones(),
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
			'campeon' => CampeonController::obtenerCampeonPorId($request->id),
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
        // Obtenemos el json.
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion/' . $id . '?locale=es_ES&champData=image,info,lore,passive,spells,stats&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        // Lo transformamos a objetos que php pueda entender.
        $infoCampeon = json_decode($json);
        // Array con los claves de características, estadísticas i habilidades campeón.
        $caracteristicas = ['Ataque', 'Defensa', 'Magia', 'Dificultad'];
        $estadisticas = ['Armadura', 'Armadura por nivel', 'Ataque', 'Ataque por nivel',
                        'Rango', 'Velocidad de ataque por nivel', 'Crítico', 'Crítico por nivel',
                        'Ataque por nivel', 'Vida', 'Vida por nivel', 'Regeneración vida',
                        'Regeneración vida por nivel', 'Velocidad', 'Mana', 'Mana por nivel',
                        'Regeneración de mana', 'Regeneración de mana por nivel', 'Resistencia mágica',
                        'Resistencia mágica por nivel'];
        $habilidades = ['Q', 'W', 'E', 'R'];
        // Inicializamos el array campeón con toda la información que necessitamos.
        $campeon = array(
            'nombre' => $infoCampeon->name,
            'titulo' => $infoCampeon->title,
            'lore' => str_replace("<br>", "", $infoCampeon->lore),
        );
        $n = 0;
        // Realizamos un bucle para cada apartado que está dentro de un objeto.
        foreach ($infoCampeon->info as $info) {
            $campeon['caracteristicas'][$caracteristicas[$n]] = $info;
            $n++;
        }
        $n = 0;
        foreach ($infoCampeon->stats as $stats) {
            $campeon['estadisticas'][$estadisticas[$n]] = $stats;
            $n++;
        }
        $campeon['habilidades']['passiva']['nombre'] = $infoCampeon->passive->name;
        $campeon['habilidades']['passiva']['descripcion'] = $infoCampeon->passive->description;
        $campeon['habilidades']['passiva']['imagen'] = 'http://ddragon.leagueoflegends.com/cdn/6.9.1/img/passive/' . $infoCampeon->passive->image->full;

        $n = 0;
        foreach ($infoCampeon->spells as $spell) {
            $campeon['habilidades'][$habilidades[$n]]['nombre'] = $spell->name;
            $campeon['habilidades'][$habilidades[$n]]['descripcion'] = $spell->description;
            $campeon['habilidades'][$habilidades[$n]]['imagen'] = 'http://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/' . $spell->image->full;
            $n++;
        }
        // Devolvemos el array campeón.
        return $campeon;
	}
}
