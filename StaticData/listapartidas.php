<!DOCTYPE html>
<html>
    <head>
        <title>Lista Partidas</title>
    </head>
    <body>
        <?php

        //generacio del aray dinamic de noms i imatges

        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?locale=es_ES&champData=all&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

        $c = json_decode($json);
        
        $pj = array();

        if(isset($c)){
            foreach ($c as $cs){
                if(is_object($cs)){
                    foreach ($cs as $css){
                        if(isset($css->id)){ 
                            $pj[$css->id]['nombre'] = $css->name;
                            $pj[$css->id]['imagen'] = $css->image->full;
                        }
                    }
                }
                
            }
        }


        if (isset($_POST['enviar'])) {

            $json = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/' . $_POST["nom"] . '?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

            $c = json_decode($json);

            if (isset($c)) {
                foreach ($c as $cs) {
                    $id = $cs->id;
                    echo "Del usuario:".$id."<br>";
                }
            }

            $json2 = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v1.3/game/by-summoner/' . $id . '/recent?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
            $m = json_decode($json2);

            if (isset($m)) {
                foreach ($m as $ms) {
                    if (is_array($ms)) {
                        foreach ($ms as $mss) {
                            if (is_object($mss)) {
                                //if ($mss->subType === "RANKED_SOLO_5x5") {
                                    $gameID = $mss->gameId;

                                    //aqui mirem per id de la partida cada partida
                                    $json3 = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v2.2/match/' . $gameID . '?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
                                        $gs = json_decode($json3);

                                        echo "<br><br>PARTIDA ".$gameID."<br><br>";
                                        //print_r($g);
                                        if (isset($gs)) {

                                                if (is_object($gs)) {
                                                    $i = 0;
                                                    if($gs->participants[1]->stats->winner == "true"){ echo "VICTORIA<br>"; }else{
                                                        echo "DERROTA<br>";
                                                    }

                                                    foreach ($gs->participants as $jugadores) {
                                                        if($i==5) echo "-------------------------<br>";
                                                        //echo "spell 1: ".$jugadores->spell1Id."<br>";
                                                        //echo "spell 2: ".$jugadores->spell2Id."<br>";
                                                        echo "JUGADOR: ".$gs->participantIdentities[$i]->player->summonerName."<img width='25' height='25' src='http://ddragon.leagueoflegends.com/cdn/6.9.1/img/profileicon/" . $gs->participantIdentities[$i]->player->profileIcon . ".png'>";
                                                        echo "pers. jugado: ".$pj[$jugadores->championId]['nombre']."<img width='25' height='25' src=\"https://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/".$pj[$jugadores->championId]['imagen']."\">";
                                                        $k = $jugadores->stats->kills;
                                                        $d = $jugadores->stats->deaths;
                                                        $a = $jugadores->stats->assists;
                                                        echo "KDA: ".$k."/".$d."/".$a."   ";
                                                        if($d!=0){ 
                                                            echo "KDA Ratio: ".number_format((($k+$a)/$d), 2, '.', '')."   ";
                                                        }else{
                                                            echo "KDA Ratio: Perfect   ";
                                                        }
                                                        echo "CS: ".$jugadores->stats->minionsKilled."<br>";
                                                        
                                                        $i++;
                                                    }
                                                    if($gs->participants[6]->stats->winner == "true"){ echo "VICTORIA<br>"; }else{
                                                        echo "DERROTA<br>";
                                                    }
                                                    foreach ($gs->teams as $equipos) {
                                                        foreach ($equipos->bans as $personajesBan) {
                                                            echo "ban: ".$pj[$personajesBan->championId]['nombre']."<img width='25' height='25' src=\"https://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/".$pj[$personajesBan->championId]['imagen']."\"><br>";
                                                        }
                                                        
                                                    }
                                                }

                                        }
                                //}
                            }
                        }
                    }
                }
            }


        } else {
            print("
                   <form method='post' action='listapartidas.php'>
                        <input type='text' name='nom'>
                        <input type='submit' name='enviar' value='Enviar'>
                   </form>
                    ");
        }
        ?>
    </body>
</html>
