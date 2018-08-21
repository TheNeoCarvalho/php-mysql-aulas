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

					$check = false;
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


						  	if($dados['status'] == 'ativo'){
						  		$check = true;
						  	}else{
						  		$check = false;
						  	}

						  	if($dados['status'] == "ativo"){
						  		$estado = "<a title='Ativado' 
						  		style='color:green' href='?page=menu&id=".$dados['id']."&visibilidade=of'><i class='fa fa-eye'></i>";
						  	}else{
						  		$estado = "<a title='Desativado' style='color:red' href='?page=menu&id=".$dados['id']."&visibilidade=on'><i class='fa fa-eye-slash'></i>";
						  	}

						  	echo "<td>".$estado."</i></td>
						  	<td><a href='?page=menu&acao=d&menu=".$dados['titulo']."'><i class='fa fa-trash'></i></a> | <a href='' data-toggle='modal' data-target='#exampleModal' data-id='".$dados['id']."' data-titulo='".$dados['titulo']."' data-url='".$dados['url']."' data-status='".$dados['status']."'><i class='fa fa-refresh'></i></a></td>
						  </tr>";
						}
					}
				?>
			</tbody>
		</table>
		</div>
		<div class="col-md-6">
		<form method="post" action="cadMenu.php?acao=i">
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atualizar Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="cadMenu.php?acao=u">
		  <fieldset>
		  <div class="form-group">
		  	<label for="menu">Id do Menu</label>
		    <input style="width: 80px" disabled="true" type="text" class="form-control" id="id" name="id">
		  </div>
		  <div class="form-group">
		  	<label for="menu">Título do Menu</label>
		    <input type="text" class="form-control" id="menu" name="menu">
		  </div>
		  <div class="form-group">
		    <label for="url">Link/URL</label>
		    <input type="text" class="form-control" id="url" name="url">
		  </div>
			</fieldset>
		    <div class="modal-footer">
        	<a href="?page=menu&acao=u" class="btn btn-secondary" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </div>
		</form>
      </div>
    
    </div>
  </div>
</div>

<script type="text/javascript">
	
 $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipientId = button.data('id')
  var recipientTitulo = button.data('titulo')
  var recipientUrl = button.data('url')
  var recipientStatus = button.data('status')
  var modal = $(this)

  modal.find('#id').val(recipientId)
  modal.find('#menu').val(recipientTitulo)
  modal.find('#url').val(recipientUrl)

  
})
</script>