
<?php

$ticket = $_POST["ticket"];
$name = $_POST["name"];
$seat = $_POST["seat"];
$passport = $_POST["pass"];
$bag = $_POST["bag"];
$airline = $_POST["airline"];
$vuelo = $_POST["vuelo"];
$status = $_POST["status"];
$fecha = date("Ymd"); // Ymd

include 'db_connect.php';

$query = "SELECT * FROM airlines WHERE code='$airline'";
$result = pg_query($conexion,$query) or die(pg_last_error($conexion));
$line = pg_fetch_array($result);
$link = $line["link"];
$type = $line["file"];

if($type == 1) {
	$st = 'XML';
} else {
	$st = 'JSON';
}

$file = $link . '/script_listado_pasajeros.php?aerolinea=' . $airline . '&vuelo=' . $vuelo . '&fecha=' . $fecha . '&type=' . $st; 


$fecha2 = date("Ymd+hi");
if($status == 3) {
  $output = $link . '/script_aborda_baja.php?aerolinea=' . $airline . '&vuelo=' . $vuelo . '&fecha=' . $fecha . '&boleto=' . $ticket . '&in_out=out&fecha_in_out=' . $fecha2 ; 
} else {
  $output = $link . '/script_aborda_baja.php?aerolinea=' . $airline . '&vuelo=' . $vuelo . '&fecha=' . $fecha . '&boleto=' . $ticket . '&in_out=in&fecha_in_out=' . $fecha2 ; 
}

//echo $output;

if ($type == 1) {
	include 'parserXML_Pasajeros.php';
} else  {
	include 'parserJSON_Pasajeros.php';
}

$match = 3;
$salir = true;
$t = 0;
$n = 0;
$s = 0;

while(($PassengerList->count() != 0) && $salir){
	$Passengers = $PassengerList->pop();
	$t = $Passengers[6];
	$n = $Passengers[7];
	$s = $Passengers[8];
	if($ticket === $t) {
		$salir = false;
		$match = 2;
	} else {
		$match = 3;
	}
}
if($match === 2) {
		if($n === $name) {
			if($s === $seat) {
				$match = 2;
			} else {
				$match = 7;
			}
		} else {
			$match = 5;
		}
}
	

if($match == 2) {
	$query = "SELECT * FROM passenger WHERE ticket='$ticket' AND code='$airline' AND flight='$vuelo'";
	$result = pg_query($conexion,$query) or die(pg_last_error($conexion));
	if(pg_num_rows($result) == 0){
		$query = "INSERT INTO passenger(ticket,name,passport,bag,seat,code,flight) VALUES('$ticket','$name','$passport',$bag,$seat,'$airline','$vuelo')";
	$result = pg_query($conexion,$query) or die(pg_last_error($conexion)) ;
	$os = fopen($output);
	fclose($os);
	} else {
		$match = 4;
	}
}

	echo $match;
 

?>