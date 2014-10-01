  	<thead>
  	<tr >
  	<th>Airline</th>
  	<th>Flight</th>
    <th>Date</th>
    <th>Origin</th>
    <th>Destination</th>
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

  if($type == 1) {
    $st = "XML";
  } else {
    $st = "JSON";
  }

  $file = $link . '/script_lista_vuelos.php?origen=GUA&fecha=' . $fecha . '&type=' . $st; 
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
  	$airline = $flight[0];
    if(($status == 3) || ($status == 1)) {
      echo '<tr onclick=' . '"window.document.location=' . "'register_form.php?vuelo=" . $number . "&airline=$airline&status&status=$status';" . '"' . 'onmouseover=' . '"this.style.cursor=' . "'pointer'" . '">';
      echo '<td>' . $airline .'</td>';
      echo '<td>' . $number . '</td>';
      echo '<td>' . $date . '</td>';
      echo '<td>' . $origin . '</td>';
      echo '<td>' . $destination . '</td>';
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
}

$query = "SELECT * FROM airlines";
$result = pg_query($conexion,$query) or die(pg_last_error($conexion));
    

while($line = pg_fetch_array($result)) {
  $name = $line["name"];
  $code = $line["code"];
  $link = $line["link"];
  $ftype = $line["file"];
  $id = $line["id"];
  $fecha = date("Ymd"); 

   if($type == 1) {
    $st = "XML";
  } else {
    $st = "JSON";
  }

  $file = $link . '/script_lista_vuelos.php?destino=GUA&fecha=' . $fecha . '&type=' . $st; 
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
    $airline = $flight[0];
    if(($status == 3) || ($status == 1)) {
      echo '<tr onclick=' . '"window.document.location=' . "'register_form.php?vuelo=" . $number . "&airline=$airline&status=$status';" . '"' . 'onmouseover=' . '"this.style.cursor=' . "'pointer'" . '">';
      echo '<td>' . $airline .'</td>';
      echo '<td>' . $number . '</td>';
      echo '<td>' . $date . '</td>';
      echo '<td>' . $origin . '</td>';
      echo '<td>' . $destination . '</td>';
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
}

?>
  </tbody>
