<?php

require('config.php');

if(isset($_GET['acao'])){

	if($_GET['acao'] == "i"){

		$tit  = $_POST['titulo'];
		$cont = $_POST['conteudo'];

		$sql = "INSERT INTO artigos (titulo, conteudo, views) VALUES ('$tit', '$cont', '0')";

		$query = mysqli_query($conexao, $sql);

		if($query){
		echo "<script>
					alert('Artigo adicionado!');
					location.href = 'index.php?page=artigos';
				  </script>";
		}else{
			echo "<script>
					alert('Artigo não adicionado!');
					location.href = 'index.php?page=artigos';
				  </script>";
		}

	}


}




?>