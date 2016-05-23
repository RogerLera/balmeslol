<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Clase EstadisticasController que guardara datos de las partidas "featured", 
 * obteniendo la información de la API Riot en formato .json,
 * para luego hacer las estadisticas.
 */
class EstadisticasController extends Controller {
    
    
    /**
     * Método principal que carga las estadisticas de las partidas featured del momento a la base de datos
     * Guardaremos datos de: uso de campeones, uso de hechizos y bans de campeones
     */
    public function guardaEstadisticas(){
        
        $json = file_get_contents('https://euw.api.pvp.net/observer-mode/rest/featured?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

        $listaFeatured = json_decode($json);

        foreach ($listaFeatured->gameList as $partidas) {
            foreach ($partidas->participants as $jug) {
                $spell1 = $jug->spell1Id;
                $spell2 = $jug->spell2Id;
                $escUsado = $jug->championId;
            }
            foreach ($partidas->bannedChampions as $bans) {
                $escBloqueado = $bans->championId;
            }
        }
    }
}

