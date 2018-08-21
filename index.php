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
