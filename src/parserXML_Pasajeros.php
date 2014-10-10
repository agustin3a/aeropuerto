<?php 

	
	$file = file_get_contents("prueba2.txt");

$exp = "#(<lista_pasajeros>\s*<aerolinea>\s*)([a-zA-z]+)(\s*</aerolinea>\s*<numero>\s*)([0-9]+)(\s*</numero>\s*<fecha>\s*)([0-9]+)(\s*</fecha>\s*<origen>\s*)([a-zA-Z0-9]+)(\s*</origen>\s*<destino>\s*)([a-zA-Z0-9]+)(\s*</destino>\s*<avion>\s*)([a-zA-Z0-9]+)(\s*</avion>\s*)((\n|.)*)(\s*</lista_pasajeros>)#";

if (preg_match($exp, $file, $matches) === 1) {
	$file = $matches[14];
	$namex = $matches[2];
	$numero = $matches[4];
	$fecha = $matches[6];
	$origen = $matches[8];
	$destino = $matches[10];
	$avion = $matches[12];
} else {
	echo 'fd';
}

$exp = "#(<pasajero>\s*<boleto>\s*)([0-9]+)(\s*</boleto>\s*<nombre>\s*)([a-zA-Z0-9]+)(\s*</nombre>\s*<asiento>\s*)([a-zA-Z0-9]+)(\s*</asiento>\s*</pasajero>)((\n|.)*)#";

$PassengerList  = new SplDoublyLinkedList();

while (preg_match($exp, $file, $matches) == 1) {
	$boleto = $matches[2];
			$nombre = $matches[4];
			$asiento = $matches[6];
			$file = $matches[8];
			$Flight = array(0 => $namex, 
					1 => $numero, 
					2 => $fecha, 
					3 => $origen, 
					4 => $destino, 
					5 => $avion,
					6 => $boleto, 
					7 => $nombre,
					8 => $asiento);
			$PassengerList->push($Flight);
	//echo $numero . " " . $fecha . " " . $origen . " " . $destino . " " . $hora . " " . $precio .  " " . $status; 
} 
//print_r($PassengerList);
?>