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
			<a href="airline_new.php" class="bluelink">Add</a>
			<?php include "src/get_airlines.php" ?>


		</div>
	</div>
</div>


<?php include 'include/_footer.html' ?>