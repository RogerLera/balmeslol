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
            'campeonesGratuitos' => CampeonController::obtenerCampeonesGratis(),
		]);
	}

	/**
	* Método que devuelve a la vista la información sobre el campeón seleccionado.
	*
	* @return información campeón a la vista.
	*/
	public function mostrarCampeon($id)
	{
		return view('campeones.infoCampeon', [
			'campeon' => CampeonController::obtenerCampeonPorId($id),
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
		$json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?locale=es_ES&champData=image,tags&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
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
		            'tags' => $infoCampeon->tags,
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
        $estadisticas = ['Armadura', 'Ataque', 'Rango', 'Velocidad de ataque', 'Crítico',
						'Vida', 'Regeneración vida', 'Velocidad', 'Mana', 'Regeneración de mana',
						'Resistencia mágica'];
        $habilidades = ['Q', 'W', 'E', 'R'];
        // Inicializamos el array campeón con toda la información que necessitamos.
        $campeon = array(
            'nombre' => $infoCampeon->name,
            'titulo' => $infoCampeon->title,
            'lore' => str_replace("<br>", "", $infoCampeon->lore),
            'retrato' => 'http://ddragon.leagueoflegends.com/cdn/img/champion/splash/'.$infoCampeon->key.'_0.jpg',
        );

        $n = 0;
        // Realizamos un bucle para cada apartado que está dentro de un objeto.
        foreach ($infoCampeon->info as $info) {
            $campeon['caracteristicas'][$caracteristicas[$n]] = $info;
            $n++;
        }

        $n = 0;
		$count = 0;
		// Este bucle tenemos unas condiciones un poco especiales para guardar la información.
        foreach ($infoCampeon->stats as $nombre => $stats) {
			// Si el nombre de la clave és 'attackspeedoffset', para obtener el valor de la Velocidad
			// de ataque necessitamos acer una formula: 0.625 / 1 + 'attackspeedoffset'.
			if ($nombre === 'attackspeedoffset'){
				$stats = 0.625 / (1 + $stats);
			}
			// Las estadísticas que base que mejoran al subir de nivel vienen después de la base con la
			// que se empieza, en escepción de las de 'attackrange' y 'movespeed'.
			if ($nombre !== 'attackrange' && $nombre !== 'movespeed') {
				// Si count es 1, añadimos a la estaddística base el '(+ X por nivel)'. I ponemos el count a 0.
				if ($count == 1) {
					$campeon['estadisticas'][$estadisticas[$n - 1]] .= " (+" . round($stats, 3) . " por nivel)";
					$count = 0;
				// Sinó, al ser la estadística base la introducimos al array normalmente.
				// Añadimos uno a count y a n.
				} else {
					$count++;
					$campeon['estadisticas'][$estadisticas[$n]] = round($stats, 3);
					$n++;
				}
			// En caso que el nombre de la estadística sea una de las dos (attackrange o movespeed),
			// las introducimos sin subir al count, ya que ninguna de estas dos tienen el 'por nivel'.
			} else {
				$campeon['estadisticas'][$estadisticas[$n]] = round($stats, 3);
				$n++;
			}
        }

		// Añadimos al array 'habilidades' el array 'passiva'.
        $campeon['habilidades']['Pasiva']['Nombre'] = $infoCampeon->passive->name;
        $campeon['habilidades']['Pasiva']['Descripcion'] = $infoCampeon->passive->description;
        $campeon['habilidades']['Pasiva']['Imagen'] = 'http://ddragon.leagueoflegends.com/cdn/6.9.1/img/passive/' . $infoCampeon->passive->image->full;

        $n = 0;
		// Añadimos el resto de habilidades al array.
        foreach ($infoCampeon->spells as $spell) {
            $campeon['habilidades'][$habilidades[$n]]['Nombre'] = $spell->name;
            $campeon['habilidades'][$habilidades[$n]]['Descripcion'] = $spell->description;
            $campeon['habilidades'][$habilidades[$n]]['Imagen'] = 'http://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/' . $spell->image->full;
            $n++;
        }

        // Devolvemos el array campeón.
        return $campeon;
	}

	/**
	* Método para obtener los campeones gratuitos de la semana.
	*
	*
	* @return array associativo con la información de los campeones.
	*/
	public function obtenerCampeonesGratis()
	{
		// Más adelante implementat sessión con idioma.
		//$idioma = Session::get('idioma');
		// Obtenemos el json.
		$json = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v1.2/champion?freeToPlay=true&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
		// Lo transformamos a objetos que php pueda entender.
		$data = json_decode($json);
		// Creamos el array que almazenará los campeones.
		$campeones = array();
		// En la variable campeones vamos introduciendo el id de cada campeón.
		foreach($data->champions as $infoCampeon){
		    $campeones[] = array(
		            'id' => $infoCampeon->id,
		        );
		}
		// Ordenamos el array por nombre.
		asort($campeones);
		// Devolvemos el array.
		return $campeones;
	}
}
