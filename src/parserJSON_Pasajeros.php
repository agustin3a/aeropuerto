<?php 

	ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$file = file_get_contents("pasajeros.txt");

$exp = "#(\{\s*\"lista\_pasajeros\"\s*\:\s*\{\s*\"aerolinea\"\s*:\s*\")([a-zA-Z]+)(\"\s*,\s*\"numero\"\s*:\s*\")([0-9]+)(\"\s*,\s*\"fecha\"\s*:\s*\")([0-9]+)(\"\s*,\s*\"origen\"\s*:\s*\")([a-zA-Z0-9]+)(\"\s*,\s*\"destino\"\s*:\s*\")([a-zA-Z0-9]+)(\"\s*,\s*\"avion\"\s*:\s*\")([a-zA-Z0-9]+)(\"\s*,\s*\"pasajeros\"\s*:\s*\[)((\n|.)*)(\s*\]\s*\}\s*\})#";

if (preg_match($exp, $file, $matches) === 1) {
	$namex = $matches[2];
	$numero = $matches[4];
	$fecha = $matches[6];
	$origen = $matches[8];
	$destino = $matches[10];
	$avion = $matches[12];
	$file = $matches[14];
} else {
	echo 'fd';
}

$exp = "#(\s*\"boleto\"\s*:\s*\")([0-9]+)(\"\s*,\s*\"nombre\"\s*:\s*\")([a-zA-Z0-9]+)(\"\s*,\s*\"asiento\"\s*:\s*\")([a-zA-Z0-9]+)(\")#";

$tok = strtok($file, "{");

$PassengerList = new SplDoublyLinkedList();

while ($tok !== false) {
		$line = $tok;
    //echo "Word=$tok<br />";
    if (preg_match($exp, $line, $matches) === 1) {
			//echo 'Funciono';
			$boleto = $matches[2];
			$nombre = $matches[4];
			$asiento = $matches[6];
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
		} else {
			echo 'fd';
		}
    $tok = strtok("{");
}
?>