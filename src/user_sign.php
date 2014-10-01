<?php

$username = $_POST["user"];
$password = $_POST["pass"];

include 'db_connect.php';

$query = "SELECT * FROM users WHERE username='$username'";
$result = pg_query($conexion,$query) or die(pg_last_error($conexion));

	if(pg_num_rows($result) != 0){
		$line = pg_fetch_array($result);
		$us = $line["username"];
		$p = $line["passowrd"];
		if(($us == $username) || ($p == $password)) {
			session_start();
			$_SESSION["user"] = $username;
			header('Location: index.php');
		} else {
		   
		}
	} else {
		$message = "The username dosent exist";
	}
echo $message;

?> 