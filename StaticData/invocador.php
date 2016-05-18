<!DOCTYPE html>
<html>
    <head>
        <title>Invocador</title>
    </head>
    <body>
        <?php
        if (isset($_POST['enviar'])) {
            $json = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/' . $_POST["nom"] . '?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

            $c = json_decode($json);

            if (isset($c)) {
                foreach ($c as $cs) {
                    $id = $cs->id;
                    echo "ID: " . $cs->id . "<br>";
                    echo "Nombre: " . $cs->name . ". Nivel: " . $cs->summonerLevel . ". Imagen de perfil: <img src='http://ddragon.leagueoflegends.com/cdn/6.9.1/img/profileicon/" . $cs->profileIconId . ".png'>";
                }
            }

            $json2 = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v1.3/stats/by-summoner/' . $id . '/summary?season=SEASON2016&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
            $m = json_decode($json2);

            //print_r($m);
            if (isset($m)) {
                foreach ($m as $ms) {
                    if (is_array($ms)) {                        
                        foreach ($ms as $mss) {
                            //print_r($mss);
                            //echo "<br><br><br>";
                            if (($mss->playerStatSummaryType != "CoopVsAI") || ($mss->playerStatSummaryType != "OdinUnranked") || ($mss->playerStatSummaryType != "CAP5x5")) {
                                echo "<br><br>MODO DE JUEGO: " . $mss->playerStatSummaryType . "<br>";

                                if(isset($mss->aggregatedStats->totalNeutralMinionsKilled)) echo "Total Monstruos asesinados: " . $mss->aggregatedStats->totalNeutralMinionsKilled . "<br>";
                                if(isset($mss->aggregatedStats->totalMinionKills)) echo "Total Minions asesinados: " . $mss->aggregatedStats->totalMinionKills . "<br>";
                                if(isset($mss->aggregatedStats->totalChampionKills)) echo "Total Campeones asesinados: " . $mss->aggregatedStats->totalChampionKills . "<br>";
                                if(isset($mss->aggregatedStats->totalAssists)) echo "Total Asistencias: " . $mss->aggregatedStats->totalAssists . "<br>";
                                if(isset($mss->aggregatedStats->totalTurretsKilled)) echo "Total Torres destruidas: " . $mss->aggregatedStats->totalTurretsKilled . "<br>";
                                echo "Victorias: " . $mss->wins . "<br>";
                                if(isset($mss->losses)) echo "Derrotas: " . $mss->losses . "<br>";
                            }
                        }
                    }
                }
            }
        } else {
            print("
                   <form method='post' action='invocador.php'>
                        <input type='text' name='nom'>
                        <input type='submit' name='enviar' value='Enviar'>
                   </form>
                    ");
        }
        ?>
    </body>
</html>
