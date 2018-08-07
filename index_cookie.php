	<?php


	if($_POST['user'] == "neo" && $_POST['pass'] == "12345"){
		setcookie('status', "logado", time()+3600);
		header('location:admin.php');
	}

	//Cookie: status, valor: logado, tempo: 60min
	//setcookie('status', "logado", time()+3600);
?>	
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>GET, POST e REQUEST</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<input type="text" name="user">
		<input type="password" name="pass">
		<input type="submit" value="Entrar">
	</form>
	<br/>


</body>
</html>