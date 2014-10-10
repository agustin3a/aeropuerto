<?php 
	
	
	$file = file_get_contents("prueba.txt");

$exp = "#(<lista_vuelos>\s*<aerolinea>\s*)([a-zA-z]+)(\s*</aerolinea>)((\n|.)*)(\s*</lista_vuelos>)#";

if (preg_match($exp, $file, $matches) === 1) {
	$file = $matches[4];
	$namex = $matches[2];
} else {
	echo 'fd';
}

$exp = "#(<vuelo>\s*<numero>\s*)([0-9]+)(\s*</numero>\s*<fecha>\s*)([0-9]+)(\s*</fecha>\s*<origen>\s*)([a-zA-Z0-9]+)(\s*</origen>\s*<destino>\s*)([a-zA-Z0-9]+)(\s*</destino>\s*<hora>\s*)([0-9]+:[0-9]+)(\s*</hora>\s*<precio>\s*)([0-9]+)(\s*</precio>\s*<status>\s*)([1-3])(\s*</status>\s*</vuelo>)((\n|.)*)#";

$FlightList = new SplDoublyLinkedList();

while (preg_match($exp, $file, $matches) == 1) {
	//echo 'Funciono';
	$numero = $matches[2];
	$fecha = $matches[4];
	$origen = $matches[6];
	$destino = $matches[8];
	$hora = $matches[10];
	$precio = $matches[12];
	$status = $matches[14];
	$file = $matches[16];
	$Flight = array(0 => $namex, 
			1 => $numero, 
			2 => $fecha, 
			3 => $origen, 
			4 => $destino, 
			5 => $hora,
			6 => $precio, 
			7 => $status);
	$FlightList->push($Flight);
	//echo $numero . " " . $fecha . " " . $origen . " " . $destino . " " . $hora . " " . $precio .  " " . $status; 
} 
//print_r($FlightList);
?>
