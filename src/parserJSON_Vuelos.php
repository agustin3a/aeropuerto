<?php 

	ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

	//echo file_get_contents("pruebaJ.txt");

$file = file_get_contents($file);

$exp = "#(\{\s*\"lista\_vuelos\"\s*\:\s*\{\s*\"aerolinea\"\s*:\s*)(\"[a-zA-z0-9]+\")(\s*,\s*\"vuelos\"\s*:\s*\[)((\n|.)*)(\s*\]\s*\}\s*\})#";

if (preg_match($exp, $file, $matches) === 1) {
	$file = $matches[4];
	$namex = $matches[2];
} else {
	
}

$exp = "#(\s*\"numero\"\s*:\s*\")([0-9]+)(\"\s*,\s*\"fecha\"\s*:\s*\")([0-9]+)(\"\s*,\s*\"origen\"\s*:\s*\")([a-zA-Z0-9]+)(\"\s*,\s*\"destino\"\s*:\s*\")([a-zA-Z0-9]+)(\"\s*,\s*\"hora\"\s*:\s*\")([0-9]+:[0-9]+)(\"\s*,\s*\"precio\"\s*:\s*\")([0-9]+)(\"\s*,\s*\"status\"\s*:\s*\")([1-3])(\")#";

$tok = strtok($file, "{");

$FlightList = new SplDoublyLinkedList();

while ($tok !== false) {
		$line = $tok;
    //echo "Word=$tok<br />";
    if (preg_match($exp, $line, $matches) === 1) {
			//echo 'Funciono';
			$numero = $matches[2];
			$fecha = $matches[4];
			$origen = $matches[6];
			$destino = $matches[8];
			$hora = $matches[10];
			$precio = $matches[12];
			$status = $matches[14];
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
		} else {
			
		}
    $tok = strtok("{");
}
//print_r($FlightList);
?>