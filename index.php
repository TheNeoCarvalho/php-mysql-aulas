<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listar Usuários</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h3>Listar Usuários</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Nome</td>
					<td>Descrição</td>
				</tr>
			</thead>
			<tbody>
				<?php
					//error_reporting(E_ALL);
					require("config.php");
					//SQL
					$sql = "SELECT * FROM usuario";

					$query = mysqli_query($conexao, $sql);

					if(mysqli_num_rows($query) < 1){
						echo "<tr class='text-center'><td colspan='3'>Não possui usuários cadastrados!</td><tr>";
					}else{
						while ($dados = mysqli_fetch_array($query)) {
						echo "<tr>
						  	<td>".$dados['id']."</td>
						  	<td style='width:200px'>".$dados['nome']."</td>
						  	<td>".$dados['descricao']."</td>
						  </tr>";
						}
					}
				?>
			</tbody>
		</table>
	</div>
</body>
