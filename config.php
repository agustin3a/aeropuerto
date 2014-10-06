<?php 
	include 'include/_header.html';
	include 'layouts/navbar.html';
?>

<div class="container">
<ol class="breadcrumb">
  			<li><a class="bluelink" href="/aeropuerto/">Home</a></li>
  			<li class="active">Settings </li>
			</ol>
			<h2 class="ch3"> Settings - Airlines </h2>
			<hr />
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="alert alert-danger" role="alert" id="danger">Airline deleted</div>
			<a href="airline_new.php" class="bluelink"><button class="btn btn-default"> Add Airline </button></a><hr />
			<?php include "src/get_airlines.php" ?>


		</div>
	</div>
</div>

<script type="text/javascript" src="js/delete.js" ></script>
<?php include 'include/_footer.html' ?>