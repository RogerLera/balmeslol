<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Clase CampeonController que llama la vista para mostrar los datos referente a los
 * campeones, obteniendo la información de la API Riot en formato .json.
 */
class InvocadorController extends Controller {

    /**
     * Método principal que se llama al hacer una búsqueda de un jugador. Nos lleva a la vista de su perfil.
     * @param Request $request recoge los parámetros del input
     * @return type la vista
     */
    public function index(Request $request) {
        return view('invocador.index', [
            'invocador' => $this->obtenerInvocador($request->input('nombre'), $request->input('region')),
        ]);
    }

    /**
     * Método que a partir de un nick o nombre de jugador, obtiene sus datos de perfil y partidas.
     * @param type $nombre nombre del jugador en cuestión
     * @return type
     */
    public function obtenerInvocador($nombre, $region) {

        // Pasamos el nombre a minúsculas.
        $nombre = strtolower($nombre);
        // Obtenemos el json.
        $json = file_get_contents('https://euw.api.pvp.net/api/lol/'.$region.'/v1.4/summoner/by-name/' . $nombre . '?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        // Lo transformamos a objetos que php pueda entender.
        $infoInvocador = json_decode($json);

        $estadisticas = ['Total Monstruos Asesinados', 'Total Minions Asesinados', 'Total Campeones Asesinados', 'Total Asistencias', 'Total Torres Destruidas', 'Victorias', 'Derrotas'];

        $invocador = array(
            'id' => $infoInvocador->$nombre->id,
            'nombre' => $infoInvocador->$nombre->name,
            'imagenPerfil' => 'http://ddragon.leagueoflegends.com/cdn/6.9.1/img/profileicon/'.$infoInvocador->$nombre->profileIconId.'.png',
            'nivel' => $infoInvocador->$nombre->summonerLevel,
        );

        $json2 = file_get_contents('https://euw.api.pvp.net/api/lol/'.$region.'/v1.3/stats/by-summoner/' . $invocador['id'] . '/summary?season=SEASON2016&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        $infoPartidas = json_decode($json2);

        $n = 0;
        foreach ($infoPartidas->playerStatSummaries as $modo) {
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

}
