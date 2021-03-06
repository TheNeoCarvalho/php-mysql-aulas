<?php
	session_start();

	require("config.php");

	if($_SESSION['user']){
		$user = $_SESSION['user'];
	}else{
		header('location:login.php');
	}
	if(isset($_GET['sair'])){
			session_destroy();
			unset($_SESSION['user']);
			header('location:login.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Dashboard Admin</title>
	<!--<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>	-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	 <link href="css/pace-theme-minimal.css" rel="stylesheet" />
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!--<script src="js/bootstrap.min.js"></script>-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="js/pace.min.js"></script>

	<style type="text/css">
		.nav-link { width: 120px; color:#fff; font-weight: 700 }
		.nav-link:hover { color: #000; font-weight: 700}
		nav h3 { color: #fff }
	</style>
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
 <h3>Seja bem vindo, [<?php echo strtoupper($user);?>]</h3>
 <nav>
 <ul class="nav">
	<?php
		$sql = "SELECT * FROM menu WHERE status = 'ativo'";
		$query = mysqli_query($conexao, $sql);

		while($menus = mysqli_fetch_assoc($query)){
			echo "<li class='nav-item'>
		             <a class='nav-link' href='index.php?page=".$menus['url']."'><i class='".$menus['icon']."'></i> ".strtoupper($menus['titulo'])."</a>
		  	      </li>";
		}
	?>
</ul>
</nav>
<a style="color: white; float:right" href="?sair">Sair</a>
</nav>