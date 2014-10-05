
<?php

$ticket = $_POST["ticket"];
$name = $_POST["name"];
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
//echo $file;

$fecha2 = date("Ymd+hi");
if($status == 3) {
  $output = $link . '/script_listado_pasajeros.php?aerolinea=' . $airline . '&vuelo=' . $vuelo . '&fecha=' . $fecha . '&boleto=' . $ticket . '&in_out=out&fecha_in_out=' . $fecha2 ; 
} else {
  $output = $link . '/script_listado_pasajeros.php?aerolinea=' . $airline . '&vuelo=' . $vuelo . '&fecha=' . $fecha . '&boleto=' . $ticket . '&in_out=in&fecha_in_out=' . $fecha2 ; 
}

//echo $output;

if ($type == 1) {
include 'parserXML_Pasajeros.php';
} else  {
	include 'parserJSON_Pasajeros.php';
}



$match = 1;
$message = "";

while($PassengerList->count() != 0) {
	$Passengers = $PassengerList->pop();
	$t = $Passengers[6];
	$n = $Passengers[7];
	if($ticket == $t) {
		$match = 2;
	}
}

if($match == 2) {

$query = "SELECT * FROM passenger WHERE ticket='$ticket'";
$result = pg_query($conexion,$query) or die(pg_last_error($conexion));

	if(pg_num_rows($result) == 0){
		$query = "INSERT INTO passenger(ticket,name,passport,bag) VALUES('$ticket','$name','$passport',$bag)";
	$result = pg_query($conexion,$query) or die(pg_last_error($conexion)) ;
	} else {
		$match = 4;
	}


} else {
	$match = 3;
}

if($match == 3) {
	echo 3;
} else if($match == 4) {
	$message = 'The ticket has already been registered';
	echo 4;
} else {
	$message = "The passenger sucessfully registered";
	echo 2;
	//fopen($output, "r");
}
 

?>