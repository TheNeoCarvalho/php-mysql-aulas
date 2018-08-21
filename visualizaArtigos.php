<?php

include('MeuMenu.php');
$id = $_GET['idArtigo'];

$sql = "SELECT * FROM artigos WHERE id = '".$id."'";
$query = mysqli_query($conexao, $sql);


while($artigo = mysqli_fetch_assoc($query)){

	echo "
	<div class='container'>
		<h1 class='text-center'>".$artigo['titulo']."</h1>
		<div class='text-justify'>
			".$artigo['conteudo']."	
		</div>";
		$contaView = $artigo['views']+1;

		$sqlUpdate = "UPDATE artigos SET views = ".$contaView." WHERE id = '".$id."'";
		mysqli_query($conexao, $sqlUpdate);
	echo "
		<div class='views' style='color:#069'> Visualizações: ".$contaView."</div>
	</div>
	";

}

?>