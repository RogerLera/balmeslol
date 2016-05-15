<?php
$json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion/412?locale=es_ES&champData=image,info,lore,passive,spells,stats&api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
$data = json_decode($json);
// FUNCIONA LA IMAGEN.
$imagen = 'http://ddragon.leagueoflegends.com/cdn/img/champion/splash/' . str_replace(".png", "_0.jpg", $data->image->full);
$lore = str_replace("<br>", "", $data->lore);
$habilidad = ['Q', 'W', 'E', 'R'];
//$remplazar = ['{{ e1 }}', '{{ e2 }}', '{{ e3 }}', '{{ e4 }}', '{{ a1 }}', '{{ a2 }}', '{{ a3 }}', '{{ a4 }}', '{{ f1 }}', '{{ f2 }}', '{{ f3 }}', '{{ f4 }}'];
//$descripcion = str_replace("{{ e1 }}", $data->spells[0]->effectBurn[1], $data->spells[0]->sanitizedTooltip);
//$descripcion = str_replace("{{ a1 }}", $data->spells[0]->vars[0]->coeff[0], $descripcion);
//$descripcion2 = str_replace("{{ e1 }}", $data->spells[1]->effectBurn[1], $data->spells[1]->sanitizedTooltip);
//$descripcion2 = str_replace("{{ a1 }}", $data->spells[1]->vars[0]->coeff[0], $descripcion2);
//$descripcion3 = str_replace("{{ e1 }}", $data->spells[2]->effectBurn[1], $data->spells[2]->sanitizedTooltip);
//$descripcion3 = str_replace("{{ a1 }}", $data->spells[2]->vars[0]->coeff[0], $descripcion3);
//$descripcion4 = str_replace("{{ e1 }}", $data->spells[3]->effectBurn[1], $data->spells[3]->sanitizedTooltip);
//$descripcion4 = str_replace("{{ a1 }}", $data->spells[3]->vars[0]->coeff[0], $descripcion4);
echo "Nombre: " . $data->name . "<br />Título: " . $data->title . "<br />Lore: " . $lore . "<br />";
echo "INFO<br />Ataque: " . $data->info->attack . "<br />Defensa: " . $data->info->defense . "<br />Magia: " . $data->info->magic . "<br />";
echo "Dificultad: " . $data->info->difficulty . "<br />STATS<br />Armadura: " . $data->stats->armor . "<br />";
echo "Armor por nivel: " . $data->stats->armorperlevel . "<br/>Ataque: " . $data->stats->attackdamage . "<br/>";
echo "Ataque por nivel: " . $data->stats->attackdamageperlevel . "<br/>Rango: " . $data->stats->attackrange . "<br/>";
echo "Velocidad de ataque por nivel: " . $data->stats->attackspeedperlevel . "<br/>Crítico: " . $data->stats->crit . "<br/>";
echo "Crítico por nivel: " . $data->stats->critperlevel . "<br/>Rango: " . $data->stats->attackrange . "<br/>";
echo "Ataque por nivel: " . $data->stats->attackdamageperlevel . "<br/>Vida: " . $data->stats->hp . "<br/>";
echo "Vida por nivel: " . $data->stats->hpperlevel . "<br/>Regeneración vida: " . $data->stats->hpregen . "<br/>";
echo "Regeneración vida por nivel: " . $data->stats->hpregenperlevel . "<br/>Velocidad: " . $data->stats->movespeed . "<br/>";
echo "Mana: " . $data->stats->mp . "<br/>Mana por nivel: " . $data->stats->mpperlevel . "<br/>";
echo "Mana: " . $data->stats->mp . "<br/>Mana por nivel: " . $data->stats->mpperlevel . "<br/>";
echo "Regeneración de mana: " . $data->stats->mpregen . "<br/>Regeneración de mana por nivel: " . $data->stats->mpregenperlevel . "<br/>";
echo "Resistencia mágica: " . $data->stats->spellblock . "<br/>Resistencia mágica por nivel: " . $data->stats->spellblockperlevel . "<br/>";
echo "MAGIAS<br />";
echo "Pasiva: " . $data->passive->name . "<br />Descripción: " .  $data->passive->description ."<br />Imagen: <img src='http://ddragon.leagueoflegends.com/cdn/6.9.1/img/passive/" . $data->passive->image->full . "'><br />";
$n = 0;
foreach ($data->spells as $spell) {
    echo $habilidad[$n] . ": " . $spell->name . "<br />Descripción: " . $spell->sanitizedDescription . "<br />Imagen: <img src='http://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/" . $spell->image->full . "'><br />";
$n++;
}
$campeon;
$info = ['Ataque', 'Defensa', 'Magia', 'Dificultad'];
$n = 0;
foreach ($data->info as $infor) {
    $campeon[$info[$n]] = $infor;
    $n++;
    echo $infor;
}
print_r($campeon);
?>
