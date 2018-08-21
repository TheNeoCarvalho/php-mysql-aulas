<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
   
   	<?php 

   		$class = "ativo"; 
		$sql = "SELECT * FROM slides";
		$query = mysqli_query($conexao, $sql);
		while ($slide = mysqli_fetch_assoc($query)){

			if($class == "ativo"){
			
			echo '
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="img/'.$slide['img'].'">
			      <div class="carousel-caption d-none d-md-block">
<<<<<<< HEAD
				    <h5 class="titulo">'.$slide['titulo'].'</h5>
				    <p class="conteudo">'.$slide['descricao'].'</p>
=======
				    <h5>'.$slide['titulo'].'</h5>
				    <p>'.$slide['descricao'].'</p>
>>>>>>> 0f75668dca7b3c6e5e5992c2f162c8fb20e3204e
			 	  </div>
			    </div>';
			    $class = "inativo";
			
			}else{
			
			echo '<div class="carousel-item">
			      <img class="d-block w-100" src="img/'.$slide['img'].'">
			      <div class="carousel-caption d-none d-md-block">
<<<<<<< HEAD
				   <h5 class="titulo">'.$slide['titulo'].'</h5>
				    <p class="conteudo">'.$slide['descricao'].'</p>
=======
				    <h5>'.$slide['titulo'].'</h5>
				    <p>'.$slide['descricao'].'</p>
>>>>>>> 0f75668dca7b3c6e5e5992c2f162c8fb20e3204e
			 	  </div>
			    </div>';
			
			}	
		
		}
 ?>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
