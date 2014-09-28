
<?php
$conexion = pg_connect("host=localhost dbname=aeropuerto user=postgres password=password") or
                die ("Fallo en el establecimiento de la conexión");
$ticket = $_POST["ticket"];
$name = $_POST["name"];
$passport = $_POST["pass"];
$bag = $_POST["bag"];
$query = "INSERT INTO passenger(ticket,name,passport,bag) VALUES('$ticket','$name','$passport',$bag)";
$result = pg_query($conexion,$query) or die(pg_last_error($conexion)) ;
?>