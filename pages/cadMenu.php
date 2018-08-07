<?php

require("config.php");

$t = $_POST['menu'];
$u = $_POST['url'];

$sql = "INSERT INTO menu VALUES ('$t', '$u')";

$query = mysqli_query($conexao, $sql);

if($query){
	echo "<script>alert('Add...')</script>";
}

?>