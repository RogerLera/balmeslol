<!DOCTYPE html>
<html>
    <head>
        <title>Estadisticas</title>
    </head>
    <body>
        <?php

            $json = file_get_contents('https://euw.api.pvp.net/observer-mode/rest/featured?api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

            $f = json_decode($json);

            if (isset($f)) {
                foreach ($f as $fs) {
                    if (is_array($fs)) {                        
                        foreach ($fs as $fss) {
                            if($fss->gameMode === "CLASSIC"){
                                foreach ($fss->participants as $p) {
                                    echo "Spell 1: ".$p->spell1Id."<br>";
                                    echo "Spell 2: ".$p->spell2Id."<br>";
                                    echo "Champion: ".$p->championId."<br>";
                                }
                            }

                        }
                    }
                }
            }

        ?>
    </body>
</html>