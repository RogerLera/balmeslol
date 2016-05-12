<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script type="text/javascript">
		$.getJSON('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?locale=es_ES&champData=all&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e', function(data) {

	        $.post(
            'habilidades.php', {
                campeones: data
            });
	    });	    
	</script>
	<?php  

	$tipos = ['Pasiva', 'Q', 'W', 'E', 'R'];

	if(isset($_POST['campeones'])){
		$c = $_POST['campeones'];
		foreach ($c as $cs){
			if(is_array($cs)){
				foreach ($cs as $css){
					if(isset($css['id'])){ 
						//habId es autoincrement	
						//pasiva
						echo "Nombre: ".$css['passive']['name'].". Tipo: ".$tipos[0].". Descripcion: ".$css['passive']['sanitizedDescription'].".Imagen: "."<img src=\"https://ddragon.leagueoflegends.com/cdn/6.9.1/img/passive/".$css['passive']['image']['full']."\">";		
						//las otras		
						$n = 1;			
						foreach ($css['spells'] as $spell){
							echo "Nombre: ".$spell['name'].". Tipo: ".$tipos[$n].". Descripcion: ".$spell['sanitizedDescription'].".Imagen: "."<img src=\"https://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/".$spell['image']['full']."\">";	
							$n++;
						}
						echo"<br>";
						//camId
						echo "<br>camId: ".$css['id']."<br>";
					}
				}
			}
		}
	}

?>
</body>
</html>