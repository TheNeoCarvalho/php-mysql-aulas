<?php include('MeuMenu.php');

		if(isset($_REQUEST['page'])){
			include("pages/".$_REQUEST['page'].".php");
		}else{
			include('pages/home.php');
	    }
	?>
</body>
</html>
