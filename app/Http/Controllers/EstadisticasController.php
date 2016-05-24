<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Traits\TraitCampeones;
use App\Traits\TraitHechizos;

/**
 * Clase EstadisticasController que guardara datos de las partidas contenidas en los ficheros seed_data,
 * estos ficheros contienen datos de 1000 partidas de tipo ranked
 * son ficheros de tipo json,
 * para luego hacer las estadisticas.
 */
class EstadisticasController extends Controller {

    use TraitCampeones,
        TraitHechizos;

    /**
     * Mètodo para guardar las estadísticas des de una pestaña del navbar
     * @return type
     */
    public function generaEstadisticas() {
        return view('estadisticas.grabar', [
            'msj' => $this->guardaEstadisticas(),
        ]);
    }

    /**
     * Método que nos permite ver la popularidas de los campeones por % basándonos en los datos que tenemos en la BBDD
     * @return type
     */
    public function mostrarPopularidadCampeones() {
        return view('estadisticas.popularidadCampeones', [
            'estadisticas' => $this->popularidadCampeones(),
        ]);
    }

    /**
     * Método que nos permite ver la popularidas de los hechizos por % basándonos en los datos que tenemos en la BBDD
     * @return type
     */
    public function mostrarPopularidadHechizos() {
        return view('estadisticas.popularidadHechizos', [
            'estadisticas' => $this->popularidadHechizos(),
        ]);
    }

    /**
     * Método que nos permite ver los campeones baneados por % basándonos en los datos que tenemos en la BBDD
     * @return type
     */
    public function mostrarBloqueoCampeones() {
        return view('estadisticas.bloqueoCampeones', [
            'estadisticas' => $this->bloqueoCampeones(),
        ]);
    }

    /**
     * Método principal que carga las estadisticas de un grupo de 10 ficheros que contienen datos de 100 partidas cada uno de tipo ranked
     * Guardaremos datos de: uso de campeones, uso de hechizos y bans de campeones
     */
    public function guardaEstadisticas() {
        for ($i = 1; $i < 11; $i++) {
            $json = file_get_contents('https://s3-us-west-1.amazonaws.com/riot-api/seed_data/matches'.$i.'.json');
            $listaMatch = json_decode($json);

            foreach ($listaMatch->matches as $match) {
                foreach ($match->participants as $p) {
                    $spell1 = $p->spell1Id;
                    $this->guardaHechizo($spell1);
                    $spell2 = $p->spell2Id;
                    $this->guardaHechizo($spell2);
                    $escUsado = $p->championId;
                    $this->guardaCampeon($escUsado);
                }
                foreach ($match->teams as $t) {
                    foreach ($t->bans as $b) {
                        $escBloqueado = $b->championId;
                        $this->guardaCampeonBan($escBloqueado);
                    }
                }
            }            
        }
        return "Estadísticas guardadas correctamente";
    }

    /**
     * Método complementario para guardar en la bae de datos un hechizo usado por id
     * primero comprueba que no se haya insertado el hechizo anteriormente,
     * @param type $id
     */
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

    /**
     * Método complementario para guardar en la base de datos un campeon usado por id
     * primero comprueba que no se haya insertado el campeon anteriormente,
     * dependiendo de si si o si no, crea un nuevo registro o lo actualiza
     * @param type $id
     */
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

    /**
     * Método complementario para guardar en la base de datos un campeon baneado por id
     * primero comprueba que no se haya insertado el campeon anteriormente,
     * dependiendo de si si o si no, crea un nuevo registro o lo actualiza
     * @param type $id
     */
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

    /**
     * Método complementario al que muestra los datos
     * éste nos devuelve un array con los datos de las estadisticas de popularidad de los campeones
     * @return type
     */
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
                        $porciento = number_format(((($stats->escUsado) / $total) * 100), 2, '.', '');
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

    /**
     * Método complementario al que muestra los datos
     * éste nos devuelve un array con los datos de las estadisticas de popularidad de los hechizos
     * @return type
     */
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
                        $porciento = number_format(((($stats->eshUsado) / $total) * 100), 2, '.', '');
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

    /**
     * Método complementario al que muestra los datos
     * éste nos devuelve un array con los datos de las estadisticas de bloqueo de los campeones
     * @return type
     */
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
                        $porciento = number_format(((($stats->escBloqueado) / $total) * 100), 2, '.', '');
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
