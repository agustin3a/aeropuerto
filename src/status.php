<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
	$vuelo = $_POST["vuelo"];
	$status = $_POST["status"];
	$airline = $_POST["stat"];
	$date =  $_POST["date"];
	echo $vuelo . " " . $status . " " . $airline;

	include 'db_connect.php';
	$query = "SELECT * FROM airlines WHERE code='$airline'";
	$result = pg_query($conexion,$query) or die(pg_last_error($conexion));
	$line = pg_fetch_array($result);
	$code = $line["code"];
	$link = $line["link"];
	$type = $line["file"];

	$file = $link . '/script_salida_llegada.php?aerolinea='. $airline . '&vuelo=' . $vuelo . '&fecha=' . $date;
	$fecha2 = date("Ymd+hi");
	if($status == 1) {
		$file = $file . '&in_out=out&fecha_in_out=' . $fecha2;
	} else if($status == 2) {
		$file = $file . '&in_out=in&fecha_in_out=' . $fecha2;
	}

	echo $file;
	fopen($file,'r');

	
	//header( 'Location: /aeropuerto/vuelos.php' ) ; 	


?>



