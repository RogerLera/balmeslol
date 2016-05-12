<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script type="text/javascript">
		$.getJSON('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/item?locale=es_ES&itemListData=all&api_key=1a7388f5-a5a6-4adf-9f7b-cc4e0ae49c6e', function(data) {

	        $.post(
            'objetos.php', {
                objetos: data
            });
	    });	    
	</script>
	<?php  
	if(isset($_POST['objetos'])){
		$o = $_POST['objetos'];
		foreach ($o as $os){
			if(is_array($os)){
				foreach ($os as $oss){
					if(isset($oss['id']) && isset($oss['name']) && isset($oss['sanitizedDescription']) && $oss['id']!=0){ 
						echo "ID: ".$oss['id'].". Nombre: ".$oss['name'].". Descripcion: ".$oss['sanitizedDescription'].". Imagen: "."<img src=\"https://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/".$oss['id'].".png\">".". Precio: ".$oss['gold']['total']."<br>";
					}
				}
			}
		}
	}

?>
</body>
</html>