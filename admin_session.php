<?php
	session_start();

	require("config.php");

	if($_SESSION['user']){
		$user = $_SESSION['user'];
	}else{
		header('location:index_session.php');
	}
	if(isset($_GET['sair'])){
			session_destroy();
			unset($_SESSION['user']);
			header('location:index_session.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard Admin</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style type="text/css">
		.nav-link { color:#fff; font-weight: 700 }
		.nav-link:hover { color: #000; font-weight: 700}
		nav h3 { color: #fff }
	</style>
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
 <h3>Seja bem vindo, <?php echo $user;?></h3>
 <nav>
 <ul class="nav">
	<?php
		$sql = "SELECT * FROM menu";
		$query = mysqli_query($conexao, $sql);
		while($menus = mysqli_fetch_assoc($query)){
			echo "<li class='nav-item'>
		             <a class='nav-link' href='?page=".$menus['url']."'>".strtoupper($menus['titulo'])."</a>
		  	      </li>";
		}
	?>
</ul>
</nav>
<a style="color: white; float:right" href="?sair">Sair</a>
</nav>
	<div class="container">
		<?php
			if(isset($_REQUEST['page'])){
				if($_REQUEST['page'] == 'home'){
					include('pages/home.php');
				}else if($_REQUEST['page'] == 'sobre'){
					include('pages/sobre.php');
				}else if($_REQUEST['page'] == 'artigos'){
					include('pages/artigos.php');
				}else if($_REQUEST['page'] == 'menu'){
					include('pages/menu.php');
				}else{
					include('pages/home.php');
				}
			}
		?>
	</div>
</body>
</html>
