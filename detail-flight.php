<?php 
	include 'include/_header.html';
	include 'layouts/navbar.html';
	$vuelo = $_GET["vuelo"];
	$airline = $_GET["airline"];
	$origin = $_GET["origin"];
	$destination = $_GET["destination"];
	$scheduled = $_GET["scheduled"];
	$status = $_GET["status"];
	$date = date("Ymd");

?>

<div class="container">
<div class="container">
	<ol class="breadcrumb">
  <li><a class="bluelink" href="/aeropuerto/">Home</a></li>
  <li><a class="bluelink" href="/aeropuerto/vuelos.php">Flights</a></li>
  <li class="active"><?php echo $vuelo ?> </li>
</ol>
	<h2 class="ch3"> Flight <?php echo $vuelo . " - " . $airline ?> </h2>
	<hr />

<div class="panel panel-default">
	<div class="panel-body">

	<div class="row">
		<div class="col-md-6">
		<h3> Fligth Number: </h3> <h4 class="detail"><?php echo $vuelo; ?></h4><hr />
		<h3> Airline: </h3><h4 class="detail"><?php echo $airline; ?> </h4><hr />
		<h3> Origin: </h3><h4 class="detail"><?php echo $origin ?> </h4><hr />
		<h3> Destination: </h3><h4 class="detail"><?php echo $destination ?></h4><hr />
		<h3> Scheduled: </h3><h4 class="detail"><?php echo $scheduled ?></h4><hr />
		<h3> Status: </h3> <h4 class="detail">
		<?php
		 if($status == 3) {
    echo 'Landed';
  } else if($status == 2) {
    echo 'On time';
  } else {
    echo 'On gate';
  }
  ?>
  </h4>
  </div>
  <div class="col-md-6">
  	<?php
  			include 'src/db_connect.php';
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
				  $output = $link . '/script_listado_pasajeros.php?aerolinea=' . $airline . '&vuelo=' . $vuelo . '&fecha=' . $fecha . '&boleto=' . $ticket . '&in_out=1&fecha_in_out=' . $fecha2 ; 
				} else {
				  $output = $link . '/script_listado_pasajeros.php?aerolinea=' . $airline . '&vuelo=' . $vuelo . '&fecha=' . $fecha . '&boleto=' . $ticket . '&in_out=0&fecha_in_out=' . $fecha2 ; 
				}
				//echo $output;
				if ($type == 1) {
				include 'src/parserXML_Pasajeros.php';
				} else  {
					include 'src/parserJSON_Pasajeros.php';
				}
				$num = $PassengerList->count();
				echo '<h3>Number of passengers:</h3>';
				echo '<h4 class="detail">' .  $num  . '</h4>';
				echo '<hr />';
				if(($status == 1) || ($status == 2)) {
					echo "<form name='registro' method='post' action='src/status.php'";                             
          echo "<input type='hidden' name='airline' value=$airline />";
          echo "<input type='hidden' name='vuelo' value=$vuelo />";
          echo "<input type='hidden' name='status' value=$status />";
          echo "<input type='hidden' name='date' value=$date />";
					if($status == 2) {
						if($destination == 'GUA') {
							echo '<h3>Confirmation of Landing:</h3>';

						}
					} else if($status == 1) {
						if($origin == 'GUA') {
							echo '<h3>Confirmation of Departure:</h3>';
						}
					}
					 echo "<input type='submit' name='boton' class='btn btn-default' value='Confirm' />";
          echo "</form>";
				}
  	?>
  	

  </div>
  </div>
	</div>	
</div>

</div>

<?php include 'include/_footer.html'; ?>