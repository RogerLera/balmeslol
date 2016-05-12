<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script type="text/javascript">
		$.getJSON('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/summoner-spell?locale=es_ES&spellData=all&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e', function(data) {

	        $.post(
            'hechizos.php', {
                hechizos: data
            });
	    });	    
	</script>
	<?php  
	if(isset($_POST['hechizos'])){
		$h = $_POST['hechizos'];
		foreach ($h as $hs){
			if(is_array($hs)){
				foreach ($hs as $hss){

					echo "ID: ".$hss['id'].". Nombre: ".$hss['name'].". Descripcion: ".$hss['sanitizedDescription'].". Imagen: "."<img src=\"https://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/".$hss['image']['full']."\">".". Reutilitzacion: ".$hss['cooldownBurn']."<br>";

				}
			}
		}
	}

?>
</body>
</html>