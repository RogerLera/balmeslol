<!DOCTYPE html>
<html>
<head>
	<title>Lista hechizos</title>
</head>
<body>
	<?php  

	$json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/summoner-spell?locale=es_ES&spellData=all&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

	$h = json_decode($json);

	if(isset($h)){
		foreach ($h as $hs){
			if(is_object($hs)){
				foreach ($hs as $hss){

					echo "ID: ".$hss->id.". Nombre: ".$hss->name.". Descripcion: ".$hss->sanitizedDescription.". Imagen: "."<img src=\"https://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/".$hss->image->full."\">".". Reutilitzacion: ".$hss->cooldownBurn."<br>";

				}
			}
		}
	}

?>
</body>
</html>