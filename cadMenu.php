<?php
error_reporting(0);
require("config.php");

if(isset($_GET['acao'])){

	$id = $_POST['id'];
	$t  = $_POST['menu'];
	$u  = $_POST['url'];
	$e  = $_POST['status'];

	if(empty($_POST['status'])){
		$status = "inativo";
	}else{
		$status = "ativo";
	}

	if($_GET['acao'] == 'u'){	
		$sql = "UPDATE menu SET titulo = '".$_POST['menu']."', url = '".$_POST['url']."' WHERE id = '".$_GET['id']."'";
		$query = mysqli_query($conexao, $sql);

		if($query){
			echo "<script>
				alert('Menu atualizado!');
				location.href = 'index.php?page=menu';
			  </script>";
		}
	}

	if($_GET['acao'] == 'i'){

		$sql = "INSERT INTO menu (titulo,url,status) VALUES ('$t','$u', '$status')";

		$query = mysqli_query($conexao, $sql);
		if($query){
			$pagina = fopen("pages/".$t.".php", "a");
			$conteudo = "<h3>".strtoupper($t)."</h3>";
			fwrite($pagina, $conteudo);
			fclose($pagina);
			echo "<script>
					alert('Menu adicionado!');
					location.href = 'index.php?page=menu';
				  </script>";
		}else{
			echo "<script>
					alert('Menu não adicionado!');
					location.href = 'index.php?page=menu';
				  </script>";
		}

	}
}
?>