<?php 
	include 'include/_header.html';
	include 'layouts/navbar.html';
	ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
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
		<?php 
      $type = 1;
      include 'bin/get_arrivals.php';
    ?>
    </table>
    </div>

  <div class="tab-pane" id="departures">
  <table class="table table-hover tablex">
  	<?php 
      include './bin/get_departures.php';
    ?>
  </table>
  </div>


  </div>
  </div>

	</div>
	</div>


<?php include 'include/_footer.html' ?>