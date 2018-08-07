<?php

require("config.php");

$t = $_POST['menu'];
$u = $_POST['url'];

$sql = "INSERT INTO menu (titulo,url) VALUES ('$t','$u')";
$query = mysqli_query($conexao, $sql);

if($query){
	echo "Add";
}else{
	echo "Ñ add";
}
?>