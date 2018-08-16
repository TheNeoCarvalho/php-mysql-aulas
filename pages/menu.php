<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artigos</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<style type="text/css">
		.card { width: 23%; float: left; margin: 5px 5px; }
	</style>
</head>
<body class="container-fluid">
	<h3 class="jumbotron">Menu</h3>
	<div class="row">
		<div class="col-md-6">
			<h3>Menu's</h3>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<td>#</td>
					<td>Menu</td>
					<td>URL</td>
					<td>Status</td>
					<td>Ações</td>
				</tr>
			</thead>
			<tbody>
				<?php
					error_reporting(0);
					include ('../config.php');
					//SQL
					$sql = "SELECT * FROM menu";

					$query = mysqli_query($conexao, $sql);


					if(isset($_GET['acao'])){
					if($_GET['acao'] == 'd'){	
						$sql = "DELETE FROM menu WHERE titulo = '".$_GET['menu']."'";
						$query = mysqli_query($conexao, $sql);

						if($query){
							unlink("pages/".$_GET['menu'].".php");
							echo "<script>
								alert('Menu foi removido!');
								location.href = 'index.php?page=menu';
							  </script>";
						}
					}
					}

					if(isset($_GET['visibilidade'])){
					if($_GET['visibilidade'] == 'on'){	
						$sql = "UPDATE menu SET status = 'ativo' WHERE id = ".$_GET['id'];
						$query = mysqli_query($conexao, $sql);

						if($query){
							echo "<script>
								alert('Menu ativado!');
								location.href = 'index.php?page=menu';
							  </script>";
						}
					}
					if($_GET['visibilidade'] == 'of'){	
						$sql = "UPDATE menu SET status = 'inativo' WHERE id = ".$_GET['id'];
						$query = mysqli_query($conexao, $sql);

						if($query){
							echo "<script>
								alert('Menu desativado!');
								location.href = 'index.php?page=menu';
							  </script>";
						}
					}
					}

					if(mysqli_num_rows($query) < 1){
						echo "<tr class='text-center'><td colspan='3'>Não possui usuários cadastrados!</td><tr>";
					}else{
						while ($dados = mysqli_fetch_array($query)) {
						echo "<tr>
						  	<td>".$dados['id']."</td>
						  	<td style='width:200px'>".$dados['titulo']."</td>
						  	<td>".$dados['url']."</td>";

						  	if($dados['status'] == "ativo"){
						  		$estado = "<a title='Ativado' 
						  		style='color:green' href='?page=menu&id=".$dados['id']."&visibilidade=of'><i class='fa fa-eye'></i>";
						  	}else{
						  		$estado = "<a title='Desativado' style='color:red' href='?page=menu&id=".$dados['id']."&visibilidade=on'><i class='fa fa-eye-slash'></i>";
						  	}

						  	echo "<td>".$estado."</i></td>
						  	<td><a href='?page=menu&acao=d&menu=".$dados['titulo']."'><i class='fa fa-trash'></i></a> | <a href='?page=menu&acao=u&menu=".$dados['titulo']."'><i class='fa fa-refresh'></i></a></td>
						  </tr>";
						}
					}
				?>
			</tbody>
		</table>
		</div>
		<div class="col-md-6">
			<form method="post" action="cadMenu.php">
		  <fieldset>
		  <div class="form-group">
		   	<legend>Cadastro de Menu</legend>
		  	<label for="menu">Título do Menu</label>
		    <input type="text" class="form-control" id="menu" name="menu">
		  </div>
		  <div class="form-group">
		    <label for="url">Link/URL</label>
		    <input type="text" class="form-control" id="url" name="url">
		  </div>
		  <div class="form-group">
		    <label for="url">Status</label><br>
		    <input type="checkbox" id="status" name="status">
		    Ativado
		  </div>
		  <button type="submit" class="btn btn-primary form-control">Cadastrar Menu</button>
		   </fieldset>
		</form>
		</div>	
	</div>
</body>
</html>