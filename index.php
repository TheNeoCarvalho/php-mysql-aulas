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
	<meta charset="UTF-8">
	<title>Dashboard Admin</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		.nav-link { width: 120px; color:#fff; font-weight: 700 }
		.nav-link:hover { color: #000; font-weight: 700}
		nav h3 { color: #fff }
	</style>
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
 <h3>Seja bem vindos, <?php echo $user;?></h3>
 <nav>
 <ul class="nav">
	<?php
		$sql = "SELECT * FROM menu";
		$query = mysqli_query($conexao, $sql);
		$m = array();
		while($menus = mysqli_fetch_assoc($query)){
			echo "<li class='nav-item'>
		             <a class='nav-link' href='?page=".$menus['url']."'><i class='".$menus['icon']."'></i> ".strtoupper($menus['titulo'])."</a>
		  	      </li>";
		  	array_push($m, $menus['titulo']);
		}
	?>
</ul>
</nav>
<a style="color: white; float:right" href="?sair">Sair</a>
</nav>
	<div class="container">
		<?php
			if(isset($_REQUEST['page'])){
				foreach ($m as $ms) {
					if($_REQUEST['page'] == $ms){
						include('pages/'.$ms.'.php');
					}
				}	
			}else{
				include('pages/home.php');
		    }
		?>
	</div>
</body>
</html>
