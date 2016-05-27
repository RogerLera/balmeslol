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
        $json = file_get_contents('https://euw.api.pvp.net/api/lol/' . $region . '/v1.4/summoner/by-name/' . $nombre . '?api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
        // Lo transformamos a objetos que php pueda entender.
        $infoInvocador = json_decode($json);

        $invocador = array(
            'id' => $infoInvocador->$nombre->id,
            'nombre' => $infoInvocador->$nombre->name,
            'region' => $region,
            'imagenPerfil' => 'http://ddragon.leagueoflegends.com/cdn/6.9.1/img/profileicon/' . $infoInvocador->$nombre->profileIconId . '.png',
            'nivel' => $infoInvocador->$nombre->summonerLevel,
            'ligas' => $this->obtenerLiga($infoInvocador->$nombre->id),
            'estadisticas' => $this->obtenerEstadisticas($infoInvocador->$nombre->id, $region),
            'partidas' => $this->obtenerListaPartidas($infoInvocador->$nombre->id, $region),
        );

        return $invocador;
    }

    /**
     * Método que a partir de un id y region obtienes sus estadisticas
     * @param type $id nombre del jugador en cuestión
     * @return type
     */
    public function obtenerEstadisticas($id, $region) {

        $json = file_get_contents('https://euw.api.pvp.net/api/lol/' . $region . '/v1.3/stats/by-summoner/' . $id . '/summary?season=SEASON2016&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
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
    public function obtenerLiga($id) {

        if (strpos(get_headers('https://euw.api.pvp.net/api/lol/euw/v2.5/league/by-summoner/' . $id . '/entry?api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6')[0], '200') !== false) {
            // Obtenemos el json.
            $json = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v2.5/league/by-summoner/' . $id . '/entry?api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
            // Lo transformamos a objetos que php pueda entender.
            $infoLiga = json_decode($json);
            // Montamos el array con la información del json

            $entries = ['division', 'puntos', 'ganadas', 'perdidas'];
            $n = 0;
            $ligas = array();
            foreach ($infoLiga->$id as $data) {
                $ligas[$n] = array(
                    'nombre' => $data->name,
                    'tier' => $data->tier,
                    'cola' => $data->queue,
                );



                foreach ($data->entries as $rankedInfo) {
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

    /**
     * Método principal que nos devuelve las últimas 7 partidas de un usuario en base a su nombre y región.
     * 
     * @param type $nombre nick del usuario
     * @param type $region region donde juega
     * @return type lista de partidas en un array
     */
    public function obtenerListaPartidas($id, $region) {
        //obtenemos el array con los personajes (pj)
        $pj = $this->obtenerArrayCampeones();
        $sp = $this->obtenerArrayHechizos();

        $json = file_get_contents('https://euw.api.pvp.net/api/lol/' . $region . '/v1.3/game/by-summoner/' . $id . '/recent?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        $infoPartidas = json_decode($json);

        //la variable n nos ayuda a limitar las consultas dado que nuestra key nos permite un máximo de 10 cada 10s
        //tambien nos servirà para ordenar las partidas dentro del array de partidas   
        $n = 0;
        $partidas = array();
        foreach ($infoPartidas->games as $p) {
            $idPartida = $p->gameId;
            if (isset($idPartida)) {
                $partidas[$n] = $this->obtenerPartida($p, $pj, $sp);
                $n++;
            }
        }
        return $partidas;
    }

    /**
     * Método complementario de obtenerListaPartidas donde obtenemos una sola partida para guardarla
     * 
     * @param type $idPartida id de la partida en cuestión
     * @param type $region region del usuario
     * @param type $pj array con los nombres y imágenes de los personajes relacionados en base a su id
     * @return type devuelve un array con los datos de una partida 
     */
    public function obtenerPartida($infoPartida, $pj, $sp) {
        $partida['Tipo'] = $infoPartida->subType;

        //Asignamos si el equipo ganó o perdió
        if ($infoPartida->stats->win == "true") {
            $partida['Resultado'] = "VICTORIA";
        } else {
            $partida['Resultado'] = "DERROTA";
        }

        if (isset($infoPartida->stats->level))
            $partida['Nivel'] = $infoPartida->stats->level;
        else
            $partida['Nivel'] = 0;
        if (isset($infoPartida->stats->goldEarned))
            $partida['Oro'] = $infoPartida->stats->goldEarned;
        else
            $partida['Oro'] = 0;
        if (isset($infoPartida->stats->minionsKilled) && isset($infoPartida->stats->neutralMinionsKilled))
            $partida['CS'] = $infoPartida->stats->minionsKilled + $infoPartida->stats->neutralMinionsKilled;
        else if (isset($infoPartida->stats->minionsKilled))
            $partida['CS'] = $infoPartida->stats->minionsKilled;
        else
            $partida['CS'] = 0;
        if (isset($infoPartida->stats->championsKilled))
            $k = $infoPartida->stats->championsKilled;
        else
            $k = 0;
        if (isset($infoPartida->stats->numDeaths))
            $d = $infoPartida->stats->numDeaths;
        else
            $d = 0;
        if (isset($infoPartida->stats->assists))
            $a = $infoPartida->stats->assists;
        else
            $a = 0;

        $partida['KDA'] = $k . "/" . $d . "/" . $a;
        if ($d != 0) {
            $partida['Ratio KDA'] = number_format((($k + $a) / $d), 2, '.', '');
        } else {
            $partida['Ratio KDA'] = "Perfecto";
        }
        $partida['Duracion'] = number_format(($infoPartida->stats->timePlayed / 60), 2, '.', '');
        for ($i = 0; $i < 7; $i++) {
            $item = "item".$i;
            if (isset($infoPartida->stats->$item)) {
                $partida['Items'][$i]['Id'] = $infoPartida->stats->$item;
                $partida['Items'][$i]['Imagen'] = 'https://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/' . $infoPartida->stats->$item . '.png';

            }
        }
        $partida['CampeonNombre'] = $pj[$infoPartida->championId]['nombre'];
        $partida['CampeonImg'] = "https://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/" . $pj[$infoPartida->championId]['imagen'];
        $partida['Hechizo1'] = "https://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/" . $sp[$infoPartida->spell1]['imagen'];
        $partida['Hechizo2'] = "https://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/" . $sp[$infoPartida->spell2]['imagen'];
        $aliado = 0;
        $enemigo = 0;

        foreach ($infoPartida->fellowPlayers as $jug) {
            if ($jug->teamId == $infoPartida->teamId) {
                $partida['Equipo 1'][$aliado]['Nombre'] = $pj[$jug->championId]['nombre'];
                $partida['Equipo 1'][$aliado]['Imagen'] = "https://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/" . $pj[$jug->championId]['imagen'];
                $aliado++;
            } else {
                $partida['Equipo 2'][$enemigo]['Nombre'] = $pj[$jug->championId]['nombre'];
                $partida['Equipo 2'][$enemigo]['Imagen'] = "https://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/" . $pj[$jug->championId]['imagen'];
                $enemigo++;
            }
        }
        $partida['Equipo 1'][$aliado]['Nombre'] = $pj[$infoPartida->championId]['nombre'];
        $partida['Equipo 1'][$aliado]['Imagen'] = "https://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/" . $pj[$infoPartida->championId]['imagen'];
        return $partida;
    }

    /**
     * Método para obtener un array que nos permita referenciar una id de un personaje con su nombre y su imagen.
     * 
     * @return type array con los nombres y imágenes referenciados segun la id
     */
    public function obtenerArrayCampeones() {
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?locale=es_ES&champData=image&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        $data = json_decode($json);

        foreach ($data->data as $infoCampeon) {
            $pj[$infoCampeon->id]['id'] = $infoCampeon->id;
            $pj[$infoCampeon->id]['nombre'] = $infoCampeon->name;
            $pj[$infoCampeon->id]['imagen'] = $infoCampeon->image->full;
        }

        return $pj;
    }

     /**
     * Método para obtener un array que nos permita referenciar una id de un hechizo con su nombre y su imagen.
     * 
     * @return type array con los nombres y imágenes referenciados segun la id
     */
    public function obtenerArrayHechizos() {
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/summoner-spell?locale=es_ES&spellData=image&api_key=c6745175-3719-4356-993e-65c331d8f4ae');
        $data = json_decode($json);

        foreach ($data->data as $infoHechizo) {
            $sp[$infoHechizo->id]['id'] = $infoHechizo->id;
            $sp[$infoHechizo->id]['nombre'] = $infoHechizo->name;
            $sp[$infoHechizo->id]['imagen'] = $infoHechizo->image->full;
        }

        return $sp;
    }

}
