<!DOCTYPE html>
<html>
    <head>
        <title>Estadisticas</title>
    </head>
    <body>
        <?php
        $json = file_get_contents('https://euw.api.pvp.net/observer-mode/rest/featured?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

        $listaFeatured = json_decode($json);

        foreach ($listaFeatured->gameList as $partidas) {
            foreach ($partidas->participants as $jug) {
                echo "Spell 1: " . $jug->spell1Id . "<br>";
                echo "Spell 2: " . $jug->spell2Id . "<br>";
                echo "Champion: " . $jug->championId . "<br>";
            }
            foreach ($partidas->bannedChampions as $bans) {
                echo "Ban: " . $bans->championId . "<br>";
            }
        }
        ?>
    </body>
</html>