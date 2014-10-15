    <thead>
  	<tr>
  	<th>Airline</th>
  	<th>Number</th>
    <?php
      if($type == 1) {
        echo '<th>Date</th>';
        echo '<th>Origin</th>';
      } else {
        echo '<th>From</th>';
      }
    ?>
  	<th>Scheduled</th>
  	<th>Status</th>
  	</tr>
  	</thead>
  	<tbody>

<?php	
include 'src/db_connect.php';

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

  $file = $link . '/script_lista_vuelos.php?destino=GUA&fecha=' . $fecha . '&type=' . $ex; 
  //echo $file;

    if ($ftype == 1) {
    include 'src/parserXML_Vuelos.php';
    } else  {
      include 'src/parserJSON_Vuelos.php';
    }

while($FlightList->count() != 0) {

	$flight = $FlightList->pop();

	$number = $flight[1];
	$date = $flight[2];
	$origin = $flight[3];
  $destination = $flight[4];
	$scheduled = $flight[5];
	$status = $flight[7];

   if($type == 1) {
    echo '<tr onclick=' . '"window.document.location=' . "'detail-flight.php?vuelo=$number&airline=$code&origin=$origin&destination=$destination&scheduled=$scheduled&status=$status';" . '"' . 'onmouseover=' . '"this.style.cursor=' . "'pointer'" . '">';
  } else {
    echo '<tr>';
  }
  echo '<td>' . $name . '</td>';
  echo '<td>' . $number . '</td>';
   if($type == 1) {
    echo '<td>' . $date . '</td>';
  } 
  echo '<td>' . $origin . '</td>';
  echo '<td>' . $scheduled . '</td>';
    if($status == 3) {
    $status = 'Landed';
  } else if($status == 2) {
    $status = 'On time';
  } else {
    $status = 'On gate';
  }
  echo '<td>' . $status . '</td>'; 
  echo '</tr>';

}
}
?>
  </tbody>












