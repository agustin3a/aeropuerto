<?php 
	// expresiones regulares para Script listado_pasajeros
    $IniListPasen = "#<lista_pasajeros>#";
    $Aerolinea = "#(<aerolinea>)([a-zA-z]+)(</aerolinea>)#";
    $numero = "#(<numero>)([0-9]+)(</numero>)#";
	$fecha = "#(<fecha>)(2014[0-1]([0-9]|[0-2])[0-3][0-9])(</fecha>)#";
	$origen = "#(<origen>)([A-Z]{3})(</origen>)#";
	$destino = "#(<destino>)([A-Z]{3})(</destino>)#";
	$avion = "#(<avion>)([A-Z]|[0-9])+(</avion>)#";
	$IniPaseng = "#<pasajero>#";
	$boleto = "#(<boleto>)(([a-zA-z]|[0-9])+)(</boleto>)#";
	$nombre = "#(<nombre>)([a-zA-z]+)(</nombre>)#";
	$asiento =	"#(<asiento>)([0-9]{2})(</asiento>)#";
	$FinPasen = "#</pasajero>#";
	$FinListPasen = "#</lista_pasajeros>#";
	
	//Arreglo de expresiones regulares
	$expresion = array(0 => $IniListPasen,	
					1 => $Aerolinea,
					2 => $numero,
					3 => $fecha,
					4 => $origen,
					5 => $destino,
					6 => $avion,
					7 => $IniPaseng,
					8 => $boleto,
					9 => $nombre,
					10 => $asiento,
					11 => $FinPasen,
					12 => $FinListPasen
		);


	//Se empieaza a leer el archivo
	$handle = fopen("prueba2.txt", "r");
	
	if ($handle) {
	    while (($line = fgets($handle)) !== false) {
	        for ($i=0; $i < 13; $i++) {
	        	$pattern = $expresion[$i];
	        	if (preg_match($pattern, $line, $matches) === 1) {
	        		switch ($i) {
		        		case '0':
		        			//contruir la linked list
		        			$PassengerList = new SplDoublyLinkedList();
		        			break;
		        		case '1':
		        			$Passengers = array(0 => $matches[0]);
		        			break;
		        		case '2':
		        			$Passengers[1] = $matches[0];
		        			break;
		        		case '3':
		        			$Passengers[2] = $matches[0];
		        			break;
		        		case '4':
		        			$Passengers[3] = $matches[0];
		        			break;
		        		case '5':
		        			$Passengers[4] = $matches[0];
		        			break;
		        		case '6':
		        			$Passengers[5] = $matches[0];
		        			break;
		        		case '8':
		        			$Passengers[6] = $matches[2];
		        			break;
		        		case '9':
		        			$Passengers[7] = $matches[2];
		        			break;
		        		case '10':
		        			$Passengers[8] = $matches[0];
		        			break;
		        		case '11':
		        			$PassengerList->push($Passengers);
		        			break;
		        		case '12':
		        			//print_r($PassengerList);
		        			break;        		
		        	}
		        }        	
	    	}
	    }
	} else {
	    echo 'error opening the file';
	} 

	fclose($handle);
?>