<?php

require("config.php");

$id = $_GET['idArtigo'];

$sql = "SELECT * FROM artigos WHERE id = '".$id."'";
$query = mysqli_query($conexao, $sql);

while($artigo = mysqli_fetch_assoc($query)){

	echo "
		<h1>".$artigo['titulo']."</h1>
		<div class='content'>
				
		</div>

	";

}

?>