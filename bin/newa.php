<?php

$code = $_POST["code"];
$name = $_POST["name"];
$link = $_POST["link"];
$file = $_POST["file"];
$message = "Airline sucssesfully added";

include 'db_connect.php';

$query = "SELECT * FROM airlines WHERE name='$name'";
$result = pg_query($conexion,$query) or die(pg_last_error($conexion));

	if(pg_num_rows($result) == 0){
		$query = "INSERT INTO airlines(name,code,link,file) VALUES('$name','$code','$link',$file)";
	$result = pg_query($conexion,$query) or die(pg_last_error($conexion)) ;
	} else {
		$message = "The airline alread has been added";
	}
echo $message;

?>