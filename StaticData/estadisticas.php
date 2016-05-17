<!DOCTYPE html>
<html>
    <head>
        <title>Lista campeones</title>
    </head>
    <body>
        <?php
        if (isset($_POST['enviar'])) {
            $json = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/' . $_POST["nom"] . '?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

            $c = json_decode($json);

            if (isset($c)) {
                foreach ($c as $cs) {
                    $id = $cs->id;
                }
            }

            $json2 = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v1.3/game/by-summoner/' . $id . '/recent?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
            $m = json_decode($json2);

            //print_r($m);
            if (isset($m)) {
                foreach ($m as $ms) {
                    if (is_array($ms)) {
                        foreach ($ms as $mss) {
                            if (is_object($mss)) {
                                if ($mss->subType === "RANKED_SOLO_5x5") {
                                    $gameID = $mss->gameId;

                                    $json3 = file_get_contents('https://euw.api.pvp.net/api/lol/euw/v2.2/match/' . $gameID . '?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');
                                    $gs = json_decode($json3);

                                    echo "<br><br>PARTIDA<br><br>";
                                    //print_r($g);
                                    if (isset($gs)) {

                                            if (is_object($gs)) {
                                                foreach ($gs->participants as $jugadores) {
                                                    echo "spell 1: ".$jugadores->spell1Id."<br>";
                                                    echo "spell 2: ".$jugadores->spell2Id."<br>";
                                                    echo "pers. jugado: ".$jugadores->championId."<br>";
                                                }
                                                foreach ($gs->teams as $equipos) {
                                                    foreach ($equipos->bans as $personajesBan) {
                                                        echo "ban: ".$personajesBan->championId."<br>";
                                                    }
                                                    
                                                }
                                            }

                                    }
                                }
                                /* echo "Hechizo 1: " . $mss->spell1 . "<br>";
                                  echo "Hechizo 2: " . $mss->spell2 . "<br>";
                                  foreach ($mss->fellowPlayers as $jugadores) {
                                  echo "Personaje: " . $jugadores->championId . "<br>";
                                  } */
                            }
                        }
                    }
                }
            }
        } else {
            print("
                   <form method='post' action='getSummId.php'>
                        <input type='text' name='nom'>
                        <input type='submit' name='enviar' value='Enviar'>
                   </form>
                    ");
        }
        ?>
    </body>
</html>
