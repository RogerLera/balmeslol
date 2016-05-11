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
            'campeones.php', {
                campeones: data
            });
	    });	    
	</script>
	<?php  
	if(isset($_POST['campeones'])){
		$c = $_POST['campeones'];
		foreach ($c as $cs){
			if(is_array($cs)){
				foreach ($cs as $css){
					if(isset($css['id'])){ 
						echo "ID: ".$css['id'].". Nombre: ".$css['name'].". Titulo: ".$css['title'].". Miniatura: "."<img src=\"https://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/".$css['name'].".png\">".". Imagen: "."<img src=\"https://ddragon.leagueoflegends.com/cdn/img/champion/splash/".$css['name']."_0.jpg\">".". Etiquetas: ";
						$tags = "";
						foreach ($css['tags'] as $tag) {
							$tags .= $tag."*";
						}
					    echo $tags." Descripcion: ".$css['lore'].". Dificultad: ".$css['info']['difficulty'].". Consejos: ";
					    $consejos = "";
						foreach ($css['allytips'] as $cons) {
							$consejos .= $cons."*";
						}
					    echo $consejos.". ConsejosAdv: ";
					    $consejosadv = "";
						foreach ($css['enemytips'] as $consadv) {
							$consejosadv .= $consadv."*";
						}
					    echo $consejosadv."<br>";
					}
				}
			}
			
		}
	}

?>
</body>
</html>