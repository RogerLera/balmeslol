<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Clase ListaPartidasController que llama la vista para mostrar los datos referente a la
 * lista de partidas de un usuario, obteniendo la información de la API Riot en formato .json.
 */
class ListaPartidasController extends Controller {

    /**
     * Método principal para mostrar la lista de partidas que obtendremos con obtenerListaPartidas.
     * 
     * @param Request $request los campos nombre y region en los que nos sustentaremos para buscar las partidas
     * @return type la vista
     */
    public function index(Request $request) {
        return view('invocador.partidas', [
            'partidas' => $this->obtenerListaPartidas($request->input('nombre'), $request->input('region')),
        ]);
    }

    /**
     * Método para obtener un array que nos permita referenciar una id de un personaje con su nombre y su imagen.
     * 
     * @return type array con los nombres y imágenes referenciados segun la id
     */
    public function obtenerArrayCampeones() {
        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?locale=es_ES&champData=all&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        $data = json_decode($json);

        foreach ($data->data as $infoCampeon) {
            $pj[$infoCampeon->id]['nombre'] = $infoCampeon->name;
            $pj[$infoCampeon->id]['imagen'] = $infoCampeon->image->full;
        }

        return $pj;
    }

    /**
     * Método para saber el ID del invocador mediante su nombre.
     * 
     * @param type $nombre nombre del invocador del que queremos saber su id
     * @param type $region region del usuario
     * @return type id numérica del invocador 
     */
    public function obtenerIdInvocador($nombre, $region) {
        $json = file_get_contents('https://euw.api.pvp.net/api/lol/' . $region . '/v1.4/summoner/by-name/' . $nombre . '?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        $infoInvocador = json_decode($json);

        return $infoInvocador->$nombre->id;
    }

    /**
     * Método principal que nos devuelve las últimas 7 partidas de un usuario en base a su nombre y región.
     * 
     * @param type $nombre nick del usuario
     * @param type $region region donde juega
     * @return type lista de partidas en un array
     */
    public function obtenerListaPartidas($nombre, $region) {
        //arreglamos el nombre para no tener problemas con espacios, mayusculas o carácteres extraños
        $nombre = strtolower($nombre);
        $nombre = str_replace(' ', '', $nombre);
        $nombre = mb_convert_encoding($nombre, "UTF-8", "ISO-8859-1");

        //obtenemos el array con los personajes (pj)  y la id del jugador que esta consultando
        $pj = $this->obtenerArrayCampeones();
        $id = $this->obtenerIdInvocador($nombre, $region);

        $json = file_get_contents('https://euw.api.pvp.net/api/lol/' . $region . '/v1.3/game/by-summoner/' . $id . '/recent?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        $infoPartidas = json_decode($json);

        //la variable n nos ayuda a limitar las consultas dado que nuestra key nos permite un máximo de 10 cada 10s
        //tambien nos servirà para ordenar las partidas dentro del array de partidas   
        $n = 0;
        foreach ($infoPartidas->games as $p) {
            $idPartida = $p->gameId;

            if ($n < 7 && isset($idPartida)) {
                $partidas[$n] = $this->obtenerPartida($idPartida, $region, $pj);
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
    public function obtenerPartida($idPartida, $region, $pj) {
        $json = file_get_contents('https://euw.api.pvp.net/api/lol/' . $region . '/v2.2/match/' . $idPartida . '?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
        $infoPartida = json_decode($json);

        
        $partida['Tipo'] = $infoPartida->queueType;

        //Asignamos si el equipo ganó o perdió
        if ($infoPartida->participants[1]->stats->winner == "true") {
            $partida['Resultado']['Equipo 1'] = "VICTORIA";
            $partida['Resultado']['Equipo 2'] = "DERROTA";
        } else {
            $partida['Resultado']['Equipo 1'] = "DERROTA";
            $partida['Resultado']['Equipo 2'] = "VICTORIA";
        }

        $h = 0;
        $e = 0; //estas variablez son las que controlan los equipos a los que asignamos los valores, las iremos reseteando a 0
        foreach ($infoPartida->participants as $jug) {

            //condicional para guardar uno o el otro equipo
            if ($e >= 5) {
                $equipo = "Equipo 2";
            } else {
                $equipo = "Equipo 1";
            }
            $partida[$equipo][$h]['Campeon'] = $pj[$jug->championId]['nombre'];
            $partida[$equipo][$h]['imagenCampeon'] = "https://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/" . $pj[$jug->championId]['imagen'];
            $k = $jug->stats->kills;
            $d = $jug->stats->deaths;
            $a = $jug->stats->assists;
            $partida[$equipo][$h]['KDA'] = $k . "/" . $d . "/" . $a;
            if ($d != 0) {
                $partida[$equipo][$h]['Ratio KDA'] = number_format((($k + $a) / $d), 2, '.', '');
            } else {
                $partida[$equipo][$h]['Ratio KDA'] = "Perfecto";
            }
            $partida[$equipo][$h]['CS'] = $jug->stats->minionsKilled;

            //si hemos llegado a 4 volvemos a empezar porque guardaremos los jugadores del equipo 2 de 0 a 4
            if ($h == 4) {
                $h = 0;
            } else {
                $h++;
            }
            $e++; //augmentamos los valores, llegarà a un máximo de 9, esta variabl controla que asignemos a Equipo 1 o 2
        }

        //condicional para evitar errores en partidas de tipo ARAM, donde no hay ni bans ni información de los usuarios
        if (isset($infoPartida->participantIdentities[0]->player)) {

            $h = 0;
            $e = 0;
            foreach ($infoPartida->participantIdentities as $identidad) {
                if ($e >= 5) {
                    $equipo = "Equipo 2";
                } else {
                    $equipo = "Equipo 1";
                }

                $partida[$equipo][$h]['Nombre'] = $identidad->player->summonerName;
                $partida[$equipo][$h]['imagenInvocador'] = "http://ddragon.leagueoflegends.com/cdn/6.9.1/img/profileicon/" . $identidad->player->profileIcon . ".png";


                if ($h == 4) {
                    $h = 0;
                } else {
                    $h++;
                }
                $e++;
            }


            $e = 0;
            foreach ($infoPartida->teams as $equipos) {
                if ($e == 1) { //en este caso solo entraremos dos veces 
                    $equipo = "Equipo 2";
                } else {
                    $equipo = "Equipo 1";
                }

                $h = 0;
                foreach ($equipos->bans as $bans) {
                    $partida['Ban'][$equipo][$h]['Campeon'] = $pj[$bans->championId]['nombre'];
                    $partida['Ban'][$equipo][$h]['imagenCampeon'] = "https://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/" . $pj[$bans->championId]['imagen'];
                    $h++;
                }

                $e++;
            }
        }

        //print_r($partida);
        return $partida;
    }

}
