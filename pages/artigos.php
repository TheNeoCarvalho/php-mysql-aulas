<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artigos</title>
	<style type="text/css">
		.card { width: 23%; float: left; margin: 5px 5px; }
	</style>
</head>
<body class="container-fluid">
	<div>
		<h3 class="jumbotron">Artigos</h3>
		<?php
		$sql = "SELECT * FROM artigos";
		$query = mysqli_query($conexao, $sql);
		while($artigos = mysqli_fetch_assoc($query)){
			echo '
				<div class="card">
				  <div class="card-body">
				    <h4 class="card-title">'.$artigos['titulo'].'</h4>
				    <p class="card-text text-justify">'.substr($artigos['conteudo'], 0, 100).'</p>
				    <a href="?idArtigo='.$artigos['id'].'" class="btn btn-primary form-control">Veja +</a>
				    <p>
				    <span class="card-link"> Visualizações: '.$artigos['views'].'</span>
				  </div>
				</div>
			';
		}
		?>
	</div>
	

</body>
</html>