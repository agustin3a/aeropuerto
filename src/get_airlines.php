<table class="table">
<thead>
<tr >
<th>Name</th>
<th>Code</th>
<th>Link</th>
<th>Type file</th>
<th></th>
<th></th>
</tr>
</thead>
<tbody>
<?php 


include 'src/db_connect.php';

$query = "SELECT * FROM airlines";

$result = pg_query($conexion,$query) or die(pg_last_error($conexion));
  	

while($line = pg_fetch_array($result)) {
	echo '<tr>';

  $name = $line["name"];
  $code = $line["code"];
  $link = $line["link"];
  $file = $line["file"];
  $id = $line["id"];

  echo '<td>' . $name .'</td>';
  echo '<td>' . $code . '</td>';
  echo '<td>' . $link . '</td>';
  if($file == 1) {
 		echo '<td>XML</td>'; 
 	} else {
 		echo '<td>JSON</td>';
 	}
 	echo '<td><a href="edit.php?id=' . $id . '"><button type="button" class="btn btn-info">Edit</button></a></td>';
 	echo '<td><a href=#><button type="button" class="btn btn-danger">Delete</button></a></td>';  
 	echo '</tr>';
}


?>
</tbody>
</table>