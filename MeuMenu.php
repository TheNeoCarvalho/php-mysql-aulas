<nav class="navbar navbar-dark bg-primary">
 <h3>Seja bem vindo, [<?php echo strtoupper($user);?>]</h3>
 <nav>
 <ul class="nav">
	<?php
		$sql = "SELECT * FROM menu WHERE status = 'ativo'";
		$query = mysqli_query($conexao, $sql);

		while($menus = mysqli_fetch_assoc($query)){
			echo "<li class='nav-item'>
		             <a class='nav-link' href='?page=".$menus['url']."'><i class='".$menus['icon']."'></i> ".strtoupper($menus['titulo'])."</a>
		  	      </li>";
		}
	?>
</ul>
</nav>
<a style="color: white; float:right" href="?sair">Sair</a>
</nav>