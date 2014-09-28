<?php 
	// expresiones regulares para Script lista_vuelos
    $listVueloIni = "#<lista_vuelos>#";
	$listVueloFin = "#</lista_vuelos>#";
	$Aerolinea = "#<aerolinea>[a-zA-z]+</aerolinea>#";
	$vuelo = "#<vuelo>#";
	$finVuelo = "#<vuelo>#";
	$numero = "#<numero>[0-9]+</numero>#";
	$fecha = "#<fecha>2014[0-9]+</fecha>#";
	$origen = "#<origen>[A-Z]{3}</origen>#";
	$destino = "#<destino>[A-Z]{3}</destino>#";
	$hora = "#<hora>[0-2][0-9]:[0-5][0-9]</hora>#";
	$precio = "#<precio>[0-9]+</precio>#";
	$status = "#<status>[1-3]</status>#";
	
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
	$handle = fopen("C:\wamp\www\aeropuerto\prueba.txt", "r");
	
	if ($handle) {
	    while (($line = fgets($handle)) !== false) {
	        for ($i=0; $i < 12; $i++) {
	        	$pattern = $expresion[$i];
	        	if (preg_match($pattern, $line, $matches) === 1) {
	        		switch ($i) {
		        		case '0':
		        			//contruir la linked list
		        			$FlightList = new SplDoublyLinkedList();
		        			echo "entro en 0 \n";
		        			break;
		        		
		        		case '1':
		        			//Codigo de la Aerolinea
		        			$Flight = array(0 => $matches[0]);
		        			echo "entro en 1 \n";
		        			print_r($Flight);
		        			break;

		        		case '2':
		        			//empieza el vuelo
		        			break;

						case '3':
		        			//fecha
		        			$Flight[1] = $matches[0];
		        			echo "entro en 3 \n";
		        			print_r($Flight);
		        			break;

						case '4':
		        			//fecha
		        			$Flight[2] = $matches[0];
		        			echo "entro en 4 \n";
		        			print_r($Flight);
		        			break;
		        		
		        		case '5':
		        			//origen
		        			$Flight[3] = $matches[0];
		        			echo "entro en 5 \n";
		        			print_r($Flight);
		        			break;

		        		case '6':
		        			//destino
		        			$Flight[4] = $matches[0];
		        			echo "entro en 6 \n";
		        			print_r($Flight);
		        			break;
		        		
		        		case '7':
		        			//hora
		        			$Flight[5] = $matches[0];
		        			echo "entro en 7 \n";
		        			print_r($Flight);
		        			break;
		        		case '8':
		        			//precio
		        			$Flight[6] = $matches[0];
		        			echo "entro en 8 \n";
		        			print_r($Flight);
		        			break;
		        		
		        		case '9':
		        			//status
		        			$Flight[7] = $matches[0];
		        			echo "entro en 9 \n";
		        			print_r($Flight);
		        			break;

		        		case '10':
		        			//ingresar el vuelo en la lindek list
		        			$FlightList->push($Flight);
		        			break;
		        		
		        		case '11':
		        			//se termina de llenar la linked list de los vuelos
		        			print_r($FlightList);
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