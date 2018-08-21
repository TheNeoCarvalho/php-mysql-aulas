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
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!--<script type="text/javascript" src="js/bootstrap.min.js"></script>	-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!--<script src="js/bootstrap.min.js"></script>-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<style type="text/css">
		.nav-link { width: 120px; color:#fff; font-weight: 700 }
		.nav-link:hover { color: #000; font-weight: 700}
		nav h3 { color: #fff }
	</style>
</head>
<body>
<?php include('MeuMenu.php')?>
	<div class="container">
		<?php
			if(isset($_REQUEST['page'])){
				include("pages/".$_REQUEST['page'].".php");
			}else{
				include('pages/home.php');
		    }
		?>
	</div>
</body>
</html>
