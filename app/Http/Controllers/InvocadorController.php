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
            'invocador' => $this->obtenerPerfil($request->input('nombre'), $request->input('region')),
        ]);
    }


    /**
     * Método que a partir de un nick o nombre de jugador, obtiene sus datos de perfil y stats.
     * @param type $nombre nombre del jugador en cuestión
     * @return type
     */
    public function obtenerPerfil($nombre, $region) {
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
            'ligas' => $this->obtenerLiga($infoInvocador->$nombre->id),
            'estadisticas' => $this->obtenerEstadisticas($infoInvocador->$nombre->id, $region),
        );

        return $invocador;
    }

    /**
     * Método que a partir de un id y region obtienes sus estadisticas
     * @param type $id nombre del jugador en cuestión
     * @return type
     */

    public function obtenerEstadisticas($id,$region) {

        $json = file_get_contents('https://euw.api.pvp.net/api/lol/'.$region.'/v1.3/stats/by-summoner/' .$id. '/summary?season=SEASON2016&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        $infoInvocador = json_decode($json);

        $estadisticas = ['Monstruos Asesinados', 'Subditos Asesinados', 'Campeones Asesinados', 'Asistencias', 'Torres Destruidas', 'Victorias', 'Derrotas'];
        $stats = array();
        $n = 0;


        foreach ($infoInvocador->playerStatSummaries as $modo) {
            $stats[$n]['Modo de Juego'] = $modo->playerStatSummaryType;
            if (isset($modo->aggregatedStats->totalNeutralMinionsKilled))
               $stats[$n][$estadisticas[0]] = $modo->aggregatedStats->totalNeutralMinionsKilled; 
            else
                $stats[$n][$estadisticas[0]] = "--";
            if (isset($modo->aggregatedStats->totalMinionKills))
                $stats[$n][$estadisticas[1]] = $modo->aggregatedStats->totalMinionKills;
            else
                $stats[$n][$estadisticas[1]] = "--";
            if (isset($modo->aggregatedStats->totalChampionKills))
                $stats[$n][$estadisticas[2]] = $modo->aggregatedStats->totalChampionKills;
            else
                $stats[$n][$estadisticas[2]] = "--";
            if (isset($modo->aggregatedStats->totalAssists))
                $stats[$n][$estadisticas[3]] = $modo->aggregatedStats->totalAssists;
            else
                $stats[$n][$estadisticas[3]] = "--";
            if (isset($modo->aggregatedStats->totalTurretsKilled))
                $stats[$n][$estadisticas[4]] = $modo->aggregatedStats->totalTurretsKilled;
            else
                $stats[$n][$estadisticas[4]] = "--";
            $stats[$n][$estadisticas[5]] = $modo->wins;
            if (isset($modo->losses))
                $stats[$n][$estadisticas[6]] = $modo->losses;
            else
                $stats[$n][$estadisticas[6]] = "--";
            $n++;
        }
        return $stats;
    }


    /**
     * Método que a partir de un id obtienes sus ligas
     * @param type $id nombre del jugador en cuestión
     * @return type
     */
    public function obtenerLiga($id)
    {

        if (strpos(get_headers('https://euw.api.pvp.net/api/lol/euw/v2.5/league/by-summoner/'.$id.'/entry?api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6')[0], '200') !== false) {
         // Obtenemos el json.
        $json = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v2.5/league/by-summoner/'.$id.'/entry?api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        // Lo transformamos a objetos que php pueda entender.
        $infoLiga = json_decode($json);
        // Montamos el array con la información del json

        $entries = ['division', 'puntos', 'ganadas', 'perdidas'];
        $n = 0;
        $ligas = array();
        foreach ($infoLiga->$id as $data)
        {
            $ligas[$n] = array(
            'nombre' => $data->name,
            'tier' => $data->tier,
            'cola' => $data->queue,
            );



            foreach ($data->entries as $rankedInfo)
            {
                if (isset($rankedInfo->division))
                    $ligas[$n][$entries[0]] = $rankedInfo->division;
                if (isset($rankedInfo->leaguePoints))
                    $ligas[$n][$entries[1]] = $rankedInfo->leaguePoints;
                if (isset($rankedInfo->wins))
                    $ligas[$n][$entries[2]] = $rankedInfo->wins;
                if (isset($rankedInfo->losses))
                    $ligas[$n][$entries[3]] = $rankedInfo->losses;

            }
            $n++;
            if (count($infoLiga->$id) === 1) {
                $ligas[$n] = array(
                    'nombre' => 'vacio',
                );
            }
        }
        if (count($ligas) === 2) {
            $ligas = array_reverse($ligas);
        }
    } else {
        $ligas = "unranked";
    }
        return $ligas;
    }
}
