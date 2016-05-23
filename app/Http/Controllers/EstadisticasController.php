<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Traits\TraitCampeones;
use App\Traits\TraitHechizos;

/**
 * Clase EstadisticasController que guardara datos de las partidas "featured", 
 * obteniendo la información de la API Riot en formato .json,
 * para luego hacer las estadisticas.
 */
class EstadisticasController extends Controller {

    use TraitCampeones,
        TraitHechizos;

    public function generaEstadisticas() {
        return view('estadisticas.grabar', [
            'msj' => $this->guardaEstadisticas(),
        ]);
    }

    public function mostrarPopularidadCampeones() {
        return view('estadisticas.popularidadCampeones', [
            'estadisticas' => $this->popularidadCampeones(),
        ]);
    }

    public function mostrarPopularidadHechizos() {
        return view('estadisticas.popularidadHechizos', [
            'estadisticas' => $this->popularidadHechizos(),
        ]);
    }

    public function mostrarBloqueoCampeones() {
        return view('estadisticas.bloqueoCampeones', [
            'estadisticas' => $this->bloqueoCampeones(),
        ]);
    }

    /**
     * Método principal que carga las estadisticas de las partidas featured del momento a la base de datos
     * Guardaremos datos de: uso de campeones, uso de hechizos y bans de campeones
     */
    public function guardaEstadisticas() {

        $json = file_get_contents('https://euw.api.pvp.net/observer-mode/rest/featured?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

        $listaFeatured = json_decode($json);

        foreach ($listaFeatured->gameList as $partidas) {
            foreach ($partidas->participants as $jug) {
                $spell1 = $jug->spell1Id;
                $this->guardaHechizo($spell1);
                $spell2 = $jug->spell2Id;
                $this->guardaHechizo($spell2);
                $escUsado = $jug->championId;
                $this->guardaCampeon($escUsado);
            }
            foreach ($partidas->bannedChampions as $bans) {
                $escBloqueado = $bans->championId;
                $this->guardaCampeonBan($escBloqueado);
            }
        }

        return "Estadísticas guardadas correctamente";
    }

    public function guardaHechizo($id) {
        $nUsos = DB::table('estadisticashechizos')->where('eshId', $id)->value('eshUsado');
        if ($nUsos != "") {
            DB::table('estadisticashechizos')
                    ->where('eshId', $id)
                    ->update(['eshUsado' => $nUsos + 1]);
        } else {
            DB::table('estadisticashechizos')->insert(
                    ['eshId' => $id, 'eshUsado' => 1]
            );
        }
    }

    public function guardaCampeon($id) {
        $nUsos = DB::table('estadisticascampeones')->where('escId', $id)->value('escUsado');
        $nBans = DB::table('estadisticascampeones')->where('escId', $id)->value('escBloqueado');
        if (($nBans != "") || ($nUsos != "")) {
            DB::table('estadisticascampeones')
                    ->where('escId', $id)
                    ->update(['escUsado' => $nUsos + 1]);
        } else {
            DB::table('estadisticascampeones')->insert(
                    ['escId' => $id, 'escUsado' => 1]
            );
        }
    }

    public function guardaCampeonBan($id) {
        $nBans = DB::table('estadisticascampeones')->where('escId', $id)->value('escBloqueado');
        $nUsos = DB::table('estadisticascampeones')->where('escId', $id)->value('escUsado');
        if (($nBans != "") || ($nUsos != "")) {
            DB::table('estadisticascampeones')
                    ->where('escId', $id)
                    ->update(['escBloqueado' => $nBans + 1]);
        } else {
            DB::table('estadisticascampeones')->insert(
                    ['escId' => $id, 'escBloqueado' => 1]
            );
        }
    }

    public function popularidadCampeones() {
        $result = DB::table('estadisticascampeones')->select('escId', 'escUsado')->orderBy('escUsado', 'desc')->get();
        $total = DB::table('estadisticascampeones')->sum('escUsado');
        $campeones = $this->obtenerCampeones();
        $estadisticas = array();
        $n = 0;
        foreach ($result as $stats) {
            $id = $stats->escId;
            if ($n <= 10) {
                foreach ($campeones as $c) {
                    if ($c['id'] == $id) {
                        $porciento = number_format(((($stats->escUsado) / $total)* 100), 2, '.', '') ;
                        $estadisticas[] = array(
                            'nombre' => $c['nombre'],
                            'id' => $c['id'],
                            'imagen' => $c['imagen'],
                            'porciento' => $porciento . "%",
                        );
                    }
                }
            }
            $n++;
        }
        return $estadisticas;
    }

    public function popularidadHechizos() {
        $result = DB::table('estadisticashechizos')->select('eshId', 'eshUsado')->orderBy('eshUsado', 'desc')->get();
        $hechizos = $this->obtenerHechizos();        
        $total = DB::table('estadisticashechizos')->sum('eshUsado');
        $estadisticas = array();
        $n = 0;
        foreach ($result as $stats) {
            $id = $stats->eshId;
            if ($n <= 5) {
                foreach ($hechizos as $h) {
                    if ($h['id'] == $id) {
                        $porciento = number_format(((($stats->eshUsado) / $total)* 100), 2, '.', '') ;
                        $estadisticas[] = array(
                            'nombre' => $h['nombre'],
                            'id' => $h['id'],
                            'imagen' => $h['imagen'],
                            'porciento' => $porciento . "%",
                        );
                    }
                }
            }
            $n++;
        }
        return $estadisticas;
        
    }

    public function bloqueoCampeones() {
        $result = DB::table('estadisticascampeones')->select('escId', 'escBloqueado')->orderBy('escBloqueado', 'desc')->get();
        $total = DB::table('estadisticascampeones')->sum('escBloqueado');
        $campeones = $this->obtenerCampeones();
        $estadisticas = array();
        $n = 0;
        foreach ($result as $stats) {
            $id = $stats->escId;
            if ($n <= 10) {
                foreach ($campeones as $c) {
                    if ($c['id'] == $id) {
                        $porciento = number_format(((($stats->escBloqueado) / $total)* 100), 2, '.', '') ;
                        $estadisticas[] = array(
                            'nombre' => $c['nombre'],
                            'id' => $c['id'],
                            'imagen' => $c['imagen'],
                            'porciento' => $porciento . "%",
                        );
                    }
                }
            }
            $n++;
        }
        return $estadisticas;
    }

}
