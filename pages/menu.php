<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artigos</title>
	<style type="text/css">
		.card { width: 23%; float: left; margin: 5px 5px; }
	</style>
</head>
<body class="container-fluid">
	<div>
		<h3 class="jumbotron">Menu</h3>
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
		  <button type="submit" class="btn btn-primary form-control">Cadastrar Menu</button>
		   </fieldset>
		</form>
		 
	</div>
	

</body>
</html>