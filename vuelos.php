<?php 
	include 'include/_header.html';
	include 'layouts/navbar.html';
?>

	<div class="container">
	<ol class="breadcrumb">
  <li><a class="bluelink" href="/aeropuerto/">Home</a></li>
  <li class="active">Flights </li>
</ol>
	<h2 class="ch3"> Flights </h2>

	<hr />
	<div class="panel panel-default">
		<div class="panel-body">
		<ul class="nav nav-tabs" role="tablist">
		  <li class="active ctab">
		  <a href="#arrivals" role="tab" data-toggle="tab" class="bluelink">
		  	 <div class="row">
		  	 <div class="col-md-3">
		  	 <img src="icons/arrivals.svg" class="img-circle">
			 	 </div>
			 	 <div class="col-md-2">
			 	 <br>
			 	 <h3>  Arrivals </h3>
			 	 </div>
			 	 </div>
		  </a>
		  </li>
		  <li class="ctab">
		  <a href="#departures" role="tab" data-toggle="tab" class="bluelink">	
				<div class="row">
				<div class="col-md-3">
				<img src="icons/departures.svg" class="img-circle">
				</div>
				<div class="col-md-2">
				<br>
				<h3> Departures </h3>
				</div>
				</div>
		  </a>
		  </li>
		</ul>

		<div class="tab-content">
		<div class="tab-pane active" id="arrivals">
  	<table class="table table-hover tablex">
  	<thead>
  	<tr >
  	<th>Numero</th>
    <th>Fecha</th>
    <th>Origen</th>
    <th>Destino</th>
  	<th>Hora</th>
  	<th>Status</th>
  	</tr>
  	</thead>
  	<tbody>
    	<tr onclick="window.document.location='register_form.php?vuelo=1';" onmouseover="this.style.cursor='pointer'">
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
  </tr>

  <tr onclick="window.document.location='register_form.php?vuelo=2';" onmouseover="this.style.cursor='pointer'" >
    <td>Eve</td>
    <td>Jackson</td> 
    <td>94</td>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
  </tr>
  </tbody>
  </table>
  </div>

  <div class="tab-pane" id="departures">
  	<table class="table table-hover tablex">
  	<thead>
  	<tr>
  	<th>Numero</th>
    <th>Fecha</th>
    <th>Origen</th>
    <th>Destino</th>
  	<th>Hora</th>
  	<th>Status</th>
  	</tr>
  	</thead>
  	<tbody>
    	<tr>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
  </tr>
  </tbody>
  </table>
  </div>


  </div>
  </div>

	</div>
	</div>


<?php include 'include/_footer.html' ?>