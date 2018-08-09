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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
 <h3><span class="DS">D</span>ata <span  class="DS">S</span>ystem</h3>
 <nav>
 <ul class="nav">
	<?php
		$sql = "SELECT * FROM menu WHERE estado = 'a'";
		$query = mysqli_query($conexao, $sql);
		$mn = array();
		while($menus = mysqli_fetch_assoc($query)){
			echo "<li class='nav-item'>
		             <a class='nav-link' href='?page=".$menus['url']."'>".strtoupper($menus['titulo'])."</a>
		  	      </li>";
		  	array_push($mn, $menus['titulo']); 
		}
	?>
</ul>
</nav>
<a style="color: white; float:right" href="?sair">Sair</a>
</nav>
	<div class="container">
		<?php
			if(isset($_REQUEST['page'])){
				foreach ($mn as $m) {
					
					if($_REQUEST['page'] == $m){
						include('pages/'.$m.'.php');
					}
				}
			}
		?>
	</div>
</body>
</html>
