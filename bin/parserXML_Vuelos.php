<?php 
	
	// expresiones regulares para Script lista_vuelos
    $listVueloIni = "#<lista_vuelos>#";
	$listVueloFin = "#</lista_vuelos>#";
	$Aerolinea = "#(<aerolinea>)([a-zA-z]+)(</aerolinea>)#";
	$vuelo = "#<vuelo>#";
	$finVuelo = "#</vuelo>#";
	$numero = "#(<numero>)([0-9]+)(</numero>)#";
	$fecha = "#<fecha>2014[0-9]+</fecha>#";
	$origen = "#<origen>[A-Z]{3}</origen>#";
	$destino = "#<destino>[A-Z]{3}</destino>#";
	$hora = "#<hora>[0-2][0-9]:[0-5][0-9]</hora>#";
	$precio = "#<precio>[0-9]+</precio>#";
	$status = "#(<status>)([1-3])(</status>)#";
	
	//Arreglo de expresiones regulares
	$expresion = array(0 => $listVueloIni, 
					1 => $Aerolinea, 
					2 => $vuelo, 
					3 => $numero, 
					4 => $fecha, 
					5 => $origen,
					6 => $destino, 
					7 => $hora,
					8 => $precio,
					9 => $status,
					10 => $finVuelo,
					11 => $listVueloFin,
	);


	//Se empieaza a leer el archivo
	$handle = fopen("prueba.txt", "r");
	
	if ($handle) {
	    while (($line = fgets($handle)) !== false) {
	        for ($i=0; $i < 12; $i++) {
	        	$pattern = $expresion[$i];
	        	if (preg_match($pattern, $line, $matches) === 1) {
	        		switch ($i) {
		        		case '0':
		        			//contruir la linked list
		        			$FlightList = new SplDoublyLinkedList();
		        			break;
		        		
		        		case '1':
		        			//Codigo de la Aerolinea
		        			$Flight = array(0 => $matches[2]);
		        			break;

		        		case '2':
		        			//empieza el vuelo
		        			break;

						case '3':
		        			//fecha
		        			$Flight[1] = $matches[2];
		        			break;

						case '4':
		        			//fecha
		        			$Flight[2] = $matches[0];
		        			break;
		        		
		        		case '5':
		        			//origen
		        			$Flight[3] = $matches[0];
		        			break;

		        		case '6':
		        			//destino
		        			$Flight[4] = $matches[0];
		        			break;
		        		
		        		case '7':
		        			//hora
		        			$Flight[5] = $matches[0];
		        			break;
		        		case '8':
		        			//precio
		        			$Flight[6] = $matches[0];
		        			break;
		        		
		        		case '9':
		        			//status
		        			$Flight[7] = $matches[2];
		        			break;

		        		case '10':
		        			//ingresar el vuelo en la lindek list
		        			$FlightList->push($Flight);
		        			break;
		        		
		        		case '11':
		        			//se termina de llenar la linked list de los vuelos
		        			//print_r($FlightList);
		        			break;	        		
		        		}

		        	}        	
	    	}
	    }
	} else {
	    // error opening the file.
	} 

	fclose($handle);
?>