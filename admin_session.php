<?php
	session_start();

	if($_SESSION['user']){
		echo "Seja Bem Vindo, ".$_SESSION['user'];
	}else{
		header('location:index_session.php');
	}
	if(isset($_GET['sair'])){
			session_destroy();
			unset($_SESSION['user']);
			header('location:index_session.php');
	}
?>
<h3>Admin</h3>
<a href="?sair">Sair</a>
