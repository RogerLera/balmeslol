<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Clase InvocadorController que llama la vista para mostrar los datos referente a un
 * invocador según su región, obteniendo la información de la API Riot en formato .json.
 */
class InvocadorController extends Controller {

    /**
     * Método principal que se llama al hacer una búsqueda de un jugador. Nos lleva a la vista de su perfil.
     * @param Request $request recoge los parámetros del input
     * @return type la vista
     */
    public function index(Request $request) {
        return view('invocador.index', [
            'invocador' => $this->obtenerId($request->input('nombre'), $request->input('region')),
        ]);
    }

    /**
     * Método que a partir de un nick o nombre de jugador, obtiene sus datos de perfil y partidas.
     * @param type $nombre nombre del jugador en cuestión
     * @return type
     */
    public function obtenerInvocador($nombre,$region) {

        $id = $this->obtenerId($nombre, $region);
        $json = file_get_contents('https://euw.api.pvp.net/api/lol/'.$region.'/v1.3/stats/by-summoner/' .$id. '/summary?season=SEASON2016&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        $infoInvocador = json_decode($json);

        $estadisticas = ['Total Monstruos Asesinados', 'Total Minions Asesinados', 'Total Campeones Asesinados', 'Total Asistencias', 'Total Torres Destruidas', 'Victorias', 'Derrotas'];

        $invocador = array(
            'id' => $infoInvocador->$nombre->id,
            'nombre' => $infoInvocador->$nombre->name,
            'region' => $region,
            'imagenPerfil' => 'http://ddragon.leagueoflegends.com/cdn/6.9.1/img/profileicon/'.$infoInvocador->$nombre->profileIconId.'.png',
            'nivel' => $infoInvocador->$nombre->summonerLevel,
            'ligas' => $this->obtenerLiga($infoInvocador->$nombre->id),
        );

        $n = 0;
        foreach ($infoInvocador->playerStatSummaries as $modo) {
            $invocador['partidas'][$n]['Modo de Juego'] = $modo->playerStatSummaryType;
            if (isset($modo->aggregatedStats->totalNeutralMinionsKilled))
                $invocador['partidas'][$n][$estadisticas[0]] = $modo->aggregatedStats->totalNeutralMinionsKilled;
            if (isset($modo->aggregatedStats->totalMinionKills))
                $invocador['partidas'][$n][$estadisticas[1]] = $modo->aggregatedStats->totalMinionKills;
            if (isset($modo->aggregatedStats->totalChampionKills))
                $invocador['partidas'][$n][$estadisticas[2]] = $modo->aggregatedStats->totalChampionKills;
            if (isset($modo->aggregatedStats->totalAssists))
                $invocador['partidas'][$n][$estadisticas[3]] = $modo->aggregatedStats->totalAssists;
            if (isset($modo->aggregatedStats->totalTurretsKilled))
                $invocador['partidas'][$n][$estadisticas[4]] = $modo->aggregatedStats->totalTurretsKilled;
            $invocador['partidas'][$n][$estadisticas[5]] = $modo->wins;
            if (isset($modo->losses))
                $invocador['partidas'][$n][$estadisticas[6]] = $modo->losses;
            $n++;
        }

        return $invocador;
    }

    /**
     * Método que a partir de un nick obtienes su Id
     * @param type $nombre nombre del jugador en cuestión
     * @return type
     */
    public function obtenerId($nombre, $region) {
        //arreglamos el nombre para no tener problemas con espacios, mayusculas o carácteres extraños
        $nombre = strtolower($nombre);
        $nombre = str_replace(' ', '', $nombre);
        $nombre = mb_convert_encoding($nombre, "UTF-8", "ISO-8859-1");
        
        // Obtenemos el json.
        $json = file_get_contents('https://euw.api.pvp.net/api/lol/'.$region.'/v1.4/summoner/by-name/' . $nombre . '?api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        // Lo transformamos a objetos que php pueda entender.
        $infoInvocador = json_decode($json);

        $invocador = array(
            'id' => $infoInvocador->$nombre->id,
            'nombre' => $infoInvocador->$nombre->name,
            'region' => $region,
            'imagenPerfil' => 'http://ddragon.leagueoflegends.com/cdn/6.9.1/img/profileicon/'.$infoInvocador->$nombre->profileIconId.'.png',
            'nivel' => $infoInvocador->$nombre->summonerLevel,
        );

        return $invocador;
    }

    /**
     * Método que a partir de un id obtienes sus ligas
     * @param type $id nombre del jugador en cuestión
     * @return type
     */
    public function obtenerLiga($id) {
         // Obtenemos el json.
        $json = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v2.5/league/by-summoner/'.$id.'/entry?api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        // Lo transformamos a objetos que php pueda entender.
        $infoLiga = json_decode($json);
        // Montamos el array con la información del json

        $ligas = array();
        foreach ($infoLiga->$id as $data) {
            $ligas[] = array(
            'nombre' => $data->name,
            'liga' => $data->tier,
            'cola' => $data->queue,
        );

        }
        return $ligas;
        
    }

}
