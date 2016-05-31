<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Traits\TraitCampeones;
use App\Traits\TraitVersionActual;

/**
* Clase CampeonController que llama la vista para mostrar los datos referente a los
* campeones, obteniendo la información de la API Riot en formato .json.
*/
class CampeonController extends Controller
{
	use TraitCampeones, TraitVersionActual;
	/**
	* Método principal que se llama al acceder a la pestanya campeones.
	* Coje del .json toda la información necessaria para la vista.
	*
	* @return información campeones a la vista.
	*/
	public function index(Request $request)
	{
	    return view('campeones.index', [
            'campeones' => $this->obtenerCampeones(),
            'campeonesGratuitos' => $this->obtenerCampeonesGratis(),
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
			'campeon' => $this->obtenerCampeonPorId($id),
		]);
	}

	/**
	* Método que a partir de una id, obtiene el campeón deseado.
	*
	* @return array associativo con la información del campeón.
	*/
	public function obtenerCampeonPorId($id)
	{
		$json = "Empty";
		if (strpos(get_headers('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion/' . $id . '?locale=es_ES&champData=image,info,lore,passive,spells,stats&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6')[0], '200') !== false) {
	        // Obtenemos el json.
	        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion/' . $id . '?locale=es_ES&champData=image,info,lore,passive,spells,stats&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
	        // Lo transformamos a objetos que php pueda entender.
	        $infoCampeon = json_decode($json);
	        // Array con los claves de características, estadísticas i habilidades campeón.
	        $caracteristicas = ['Ataque', 'Defensa', 'Magia', 'Dificultad'];
	        $estadisticas = ['Armadura', 'Ataque', 'Rango', 'Velocidad de ataque', 'Crítico',
							'Vida', 'Regeneración de vida', 'Velocidad', 'Mana', 'Regeneración de mana',
							'Resistencia mágica'];
	        $habilidades = ['Q', 'W', 'E', 'R'];
	        // Inicializamos el array campeón con toda la información que necessitamos.
	        $campeon = array(
	        	'id' => $infoCampeon->id,
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
	        $campeon['habilidades']['Pasiva']['Imagen'] = 'http://ddragon.leagueoflegends.com/cdn/' . $this->version() . '/img/passive/' . $infoCampeon->passive->image->full;
			$campeon['habilidades']['Pasiva']['Video'] = $this->videoHabilidadCampeon($id, 0);

	        $n = 0;
			// Añadimos el resto de habilidades al array.
	        foreach ($infoCampeon->spells as $spell) {
	            $campeon['habilidades'][$habilidades[$n]]['Nombre'] = $spell->name;
	            $campeon['habilidades'][$habilidades[$n]]['Descripcion'] = $spell->description;
	            $campeon['habilidades'][$habilidades[$n]]['Imagen'] = 'http://ddragon.leagueoflegends.com/cdn/' . $this->version() . '/img/spell/' . $spell->image->full;
				$campeon['habilidades'][$habilidades[$n]]['Video'] = $this->videoHabilidadCampeon($id, $n+1);
				$n++;
	        }
	        // Devolvemos el array campeón.
	        $json = $campeon;
	    }
	    return $json;
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
		// Creamos el array que almacenará los campeones.
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

        /**
         * Método para obtener los vídeos de las habilidades de un campeón, según la id del campeón,
         * retornara el nombre del fichero de vídeo de la habilidad que queremos.
         *
         * @param type $id id del campeón del que queremos el vídeo
         * @param type $n la habilidad de la que queremos obtener el vídeo
         * @return string nombre del fichero de vídeo que contiene dicha habilidad para dicho campeón
         */
	private function videoHabilidadCampeon($id, $n)
	{
		$ficheroVideo;
		if ($id < 10) {
			$ficheroVideo = "000" . $id . "_0" . ($n + 1);
		} else if ($id < 100) {
			$ficheroVideo = "00" . $id . "_0" . ($n + 1);
		} else {
			$ficheroVideo = "0" . $id . "_0" . ($n + 1);
		}
		return $ficheroVideo;
	}
}
