<?php


	if($_COOKIE["status"]){
		echo "Usuário Logado!";
	}else{
		header('location:index.php');
	}

	if(isset($_GET['sair'])){
			setcookie('status', "", time());
			header('location:index.php');
	}


?>
<h3>Admin</h3>
<a href="?sair">Sair</a>
