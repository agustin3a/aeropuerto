<?php
	$id = $_POST["id"];
	include 'db_connect.php';
	$query = "DELETE FROM airlines WHERE id=$id";
	$result = pg_query($conexion,$query) or die(pg_last_error($conexion));
?>