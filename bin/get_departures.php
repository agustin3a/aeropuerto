  	<thead>
  	<tr >
  	<th>Airline</th>
  	<th>Number</th>
    <?php
      if($type == 1) {
        echo '<th>Date</th>';
        echo '<th>Destination</th>';
      } else {
        echo '<th>To</th>';
      }
    ?>
    
  	<th>Scheduled</th>
  	<th>Status</th>
  	</tr>
  	</thead>
  	<tbody>

<?php	
include 'bin/db_connect.php';

$query = "SELECT * FROM airlines";
$result = pg_query($conexion,$query) or die(pg_last_error($conexion));
    

while($line = pg_fetch_array($result)) {
  $name = $line["name"];
  $code = $line["code"];
  $link = $line["link"];
  $type = $line["file"];
  $id = $line["id"];
  $fecha = date("Ymd"); 

  $file = $link . '/script_lista_vuelos?destino=GUA&fecha=' . $fecha . '&type=' . $type; 
  
    if ($type == 1) {
    include 'bin/parserXML_Vuelos.php';
    } else  {
      include 'bin/parserJSON_Vuelos.php';
    }

while($FlightList->count() != 0) {

	$flight = $FlightList->pop();

	$number = $flight[1];
	$date = $flight[2];
	$destination = $flight[4];
	$scheduled = $flight[5];
	$status = $flight[7];
	$airline = $flight[0];

  if($type == 1) {
    echo '<tr onclick=' . '"window.document.location=' . "'detail-flight.php?vuelo=$number&airline=$airline';" . '"' . 'onmouseover=' . '"this.style.cursor=' . "'pointer'" . '">';
  } else {
    echo '<tr>';
  }
  echo '<td>' . $airline . '</td>';
  echo '<td>' . $number . '</td>';
  if($type == 1) {
    echo '<td>'. $date . '</td>';
  } 
  echo '<td>' . $destination . '</td>';
  echo '<td>' . $scheduled . '</td>';
  if($status == 3) {
    $status = 'Landed';
  } else if($status == 2) {
    $status = 'Departure';
  } else {
    $status = 'On time';
  }
  echo '<td>' . $status . '</td>'; 
  echo '</tr>';

}
}

?>
  </tbody>

