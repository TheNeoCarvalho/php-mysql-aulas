
<<<<<<< HEAD
<?php 
include('MeuMenu.php');
=======
<?php include('MeuMenu.php');
>>>>>>> 0f75668dca7b3c6e5e5992c2f162c8fb20e3204e

?>
	<?php
		if(isset($_REQUEST['page'])){
			include("pages/".$_REQUEST['page'].".php");
		}else{
			include('pages/home.php');
	    }
	?>
</body>
</html>
