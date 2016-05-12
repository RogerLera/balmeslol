<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php  

	$json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/item?locale=es_ES&itemListData=all&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e');

	$o = json_decode($json);
	
	if(isset($o)){
		foreach ($o as $os){
			if(is_object($os)){
				foreach ($os as $oss){
					if(isset($oss->id) && isset($oss->name) && isset($oss->sanitizedDescription) && $oss->id!=0){ 
						echo "ID: ".$oss->id.". Nombre: ".$oss->name.". Descripcion: ".$oss->sanitizedDescription.". Imagen: "."<img src=\"https://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/".$oss->id.".png\">".". Precio: ".$oss->gold->total."<br>";
					}
				}
			}
		}
	}

?>
</body>
</html>
