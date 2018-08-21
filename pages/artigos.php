	<style type="text/css">
		.card { width: 23%; float: left; margin: 5px 5px; }
	</style>

	<div>
	<?php
		include('sidebar.php');
	?>
		<h3 class="jumbotron">Artigos</h3>
		<?php

		error_reporting(0);
		$sql = "SELECT * FROM artigos ORDER BY views DESC";
		$query = mysqli_query($conexao, $sql);
		while($artigos = mysqli_fetch_assoc($query)){
			echo '
				<div class="card">
				  <div class="card-body">
				    <h4 class="card-title">'.$artigos['titulo'].'</h4>
				    <p class="card-text text-justify">'.substr($artigos['conteudo'], 0, 100).'</p>
				    <a href="visualizaArtigos.php?idArtigo='.$artigos['id'].'" class="btn btn-primary form-control">Veja +</a>
				    <p>
				    <span class="card-link"> Visualizações: '.$artigos['views'].'</span>
				  </div>
				</div>
			';
		}
		?>
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
       <form method="post" action="cadArtigo.php?acao=i">
		  <fieldset>
		  <div class="form-group">
		  	<label for="menu">Título</label>
		    <input type="text" class="form-control" id="titulo" name="titulo">
		  </div>
		  <div class="form-group">
		    <label for="url">Conteúdo</label>
		    <textarea class="form-control" rows="10" id="conteudo" name="conteudo"></textarea>
		  </div>
			</fieldset>
		    <div class="modal-footer">
        	<a href="?page=menu&acao=u" class="btn btn-secondary" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
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