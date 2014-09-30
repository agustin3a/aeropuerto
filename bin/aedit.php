<?php

$code = $_POST["code"];
$name = $_POST["name"];
$link = $_POST["link"];
$file = $_POST["file"];
$id = $_POST["id"];
$message = "Airline sucssesfully updated";

include 'db_connect.php';

$query = "SELECT * FROM airlines WHERE code='$code' AND id=$id";
$result = pg_query($conexion,$query) or die(pg_last_error($conexion));

	if(pg_num_rows($result) == 1){
		$query = "UPDATE airlines SET name='$name', code='$code', link='$link', file=$file WHERE id=$id";
	$result = pg_query($conexion,$query) or die(pg_last_error($conexion)) ;
	} else {
		$message = "The airline already has been added";
	}
echo $message;

?> 