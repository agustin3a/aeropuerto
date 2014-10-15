<?php

$tipo = $_GET["tipo"];

$arr = array();
include 'db_connect.php';

$query = "SELECT * FROM airlines";
$result = pg_query($conexion,$query) or die(pg_last_error($conexion));
    
while($line = pg_fetch_array($result)) {
  $name = $line["name"];
  $code = $line["code"];
  $link = $line["link"];
  $ftype = $line["file"];
  $id = $line["id"];
  $fecha = date("Ymd"); 
  if($ftype == 1) {
    $ex = 'XML';
  } else {
    $ex = 'JSON';
  }
  if($tipo == 1) {
  $file = $link . '/script_lista_vuelos.php?destino=GUA&fecha=' . $fecha . '&type=' . $ex; 
} else {
	$file = $link . '/script_lista_vuelos.php?origen=GUA&fecha=' . $fecha . '&type=' . $ex; 
}
  
  if ($ftype == 1) {
  include 'parserXML_Vuelos.php';
  } else  {
    include 'parserJSON_Vuelos.php';
  }
	while($FlightList->count() != 0) {
		$flight = $FlightList->pop();
		$number = $flight[1];
		$date = $flight[2];
		$origin = $flight[3];
		$destination = $flight[4];
		$scheduled = $flight[5];
		$status = $flight[7];
		  if($status == 3) {
		  $status = 'Landed';
		} else if($status == 2) {
		  $status = 'On time';
		} else {
		  $status = 'On gate';
		}
		$in = array('airline' => $name, 'number' => $number, 'date' => $date, 'origin' => $origin, 'destination' => $destination, 'scheduled' => $scheduled, 'status' => $status);
		array_push($arr, $in);
	}
}
echo json_encode($arr);
?>