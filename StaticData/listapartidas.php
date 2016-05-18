<!DOCTYPE html>
<html>
    <head>
        <title>Lista Partidas</title>
    </head>
    <body>
        <?php

        /*$pj[412] = "Thresh";
        $pj[266] = "Aatrox";
        $pj[23] = "Tryndamere";
        $pj[79] = "Gragas";
        $pj[69] = "Cassiopeia";
        $pj[136] = "Aurelion Sol";
        $pj[13] = "Ryze";
        $pj[78] = "Poppy";
        $pj[14] = "Sion";
        $pj[202] = "Jhin";
        $pj[1] = "Annie";
        $pj[111] = "Nautilus";
        $pj[43] = "Karma";
        $pj[99] = "Lux";
        $pj[103] = "Ahri";
        $pj[2] = "Olaf";
        $pj[112] = "Viktor";
        $pj[27] = "Singed";
        $pj[86] = "Garen";
        $pj[34] = "Anivia";
        $pj[57] = "Maokai";
        $pj[127] = "Lissandra";
        $pj[25] = "Morgana";
        $pj[105] = "Fizz";
        $pj[28] = "Evelynn";
        $pj[238] = "Zed";
        $pj[74] = "Heimerdinger";
        $pj[68] = "Rumble";
        $pj[37] = "Sona";
        $pj[82] = "Mordekaiser";
        $pj[96] = "Kog'Maw";
        $pj[55] = "Katarina";
        $pj[117] = "Lulu";
        $pj[22] = "Ashe";
        $pj[30] = "Karthus";
        $pj[12] = "Alistar";
        $pj[122] = "Darius";
        $pj[67] = "Vayne";
        $pj[110] = "Varus";
        $pj[77] = "Udyr";
        $pj[89] = "Leona";
        $pj[126] = "Jayce";
        $pj[134] = "Syndra";
        $pj[80] = "Pantheon";
        $pj[92] = "Riven";
        $pj[121] = "Kha'Zix";
        $pj[42] = "Corki";
        $pj[51] = "Caitlyn";
        $pj[268] = "Azir";
        $pj[76] = "Nidalee";
        $pj[85] = "Kennen";
        $pj[3] = "Galio";
        $pj[45] = "Veigar";
        $pj[432] = "Bardo";
        $pj[150] = "Gnar";
        $pj[90] = "Malzahar";
        $pj[104] = "Graves";
        $pj[254] = "Vi";
        $pj[10] = "Kayle";
        $pj[39] = "Irelia";
        $pj[64] = "Lee Sin";
        $pj[420] = "Illaoi";
        $pj[60] = "Elise";
        $pj[106] = "Volibear";
        $pj[20] = "Nunu";
        $pj[4] = "Twisted Fate";
        $pj[24] = "Jax";
        $pj[102] = "Shyvana";
        $pj[429] = "Kalista";
        $pj[36] = "Dr. Mundo";
        $pj[223] = "Tahm Kench";
        $pj[131] = "Diana";
        $pj[63] = "Brand";
        $pj[113] = "Sejuani";
        $pj[8] = "Vladimir";
        $pj[154] = "Zac";
        $pj[421] = "Rek'Sai";
        $pj[133] = "Quinn";
        $pj[84] = "Akali";
        $pj[18] = "Tristana";
        $pj[120] = "Hecarim";
        $pj[15] = "Sivir";
        $pj[236] = "Lucian";
        $pj[107] = "Rengar";
        $pj[19] = "Warwick";
        $pj[72] = "Skarner";
        $pj[54] = "Malphite";
        $pj[157] = "Yasuo";
        $pj[101] = "Xerath";
        $pj[17] = "Teemo";
        $pj[58] = "Renekton";
        $pj[75] = "Nasus";
        $pj[119] = "Draven";
        $pj[35] = "Shaco";
        $pj[50] = "Swain";
        $pj[115] = "Ziggs";
        $pj[91] = "Talon";
        $pj[40] = "Janna";
        $pj[245] = "Ekko";
        $pj[61] = "Orianna";
        $pj[114] = "Fiora";
        $pj[9] = "Fiddlesticks";
        $pj[33] = "Rammus";
        $pj[31] = "Cho'Gath";
        $pj[7] = "LeBlanc";
        $pj[26] = "Zilean";
        $pj[16] = "Soraka";
        $pj[56] = "Nocturne";
        $pj[222] = "Jinx";
        $pj[83] = "Yorick";
        $pj[6] = "Urgot";
        $pj[203] = "Kindred";
        $pj[21] = "Miss Fortune";
        $pj[62] = "Wukong";
        $pj[53] = "Blitzcrank";
        $pj[98] = "Shen";
        $pj[201] = "Braum";
        $pj[5] = "Xin Zhao";
        $pj[29] = "Twitch";
        $pj[11] = "Maestro Yi";
        $pj[44] = "Taric";
        $pj[32] = "Amumu";
        $pj[41] = "Gangplank";
        $pj[48] = "Trundle";
        $pj[38] = "Kassadin";
        $pj[161] = "Vel'Koz";
        $pj[143] = "Zyra";
        $pj[267] = "Nami";
        $pj[59] = "Jarvan IV";
        $pj[81] = "Ezreal"; */

        //generacio del aray dinamic de noms i imatges

        $json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?locale=es_ES&champData=all&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

        $c = json_decode($json);
        
        $pj = array();

        if(isset($c)){
            foreach ($c as $cs){
                if(is_object($cs)){
                    foreach ($cs as $css){
                        if(isset($css->id)){ 
                            $pj[$css->id] = $css->name;
                            $img[$css->id] = $css->image->full;
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
                                if ($mss->subType === "RANKED_SOLO_5x5") {
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
                                                        echo "pers. jugado: ".$pj[$jugadores->championId]."<img width='25' height='25' src=\"https://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/".$img[$jugadores->championId]."\">";
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
                                                            echo "ban: ".$pj[$personajesBan->championId]."<img width='25' height='25' src=\"https://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/".$img[$personajesBan->championId]."\"><br>";
                                                        }
                                                        
                                                    }
                                                }

                                        }
                                }
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