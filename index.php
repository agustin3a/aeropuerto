<?php 
	include 'include/_header.html';
	include 'layouts/navbar.html';
?>


	<div class="container">
		<div class="row">
			<div class="col-md-4">
			<h3 class="ch3">Flights</h3>
				<a href="vuelos.php" class="thumbnail"><img src="icons/vuelos.svg"></a>
      </div>
  		<div class="col-md-4">
  			<h3 class="ch3">Register</h3>
				<a href="register.php" class="thumbnail"><img src="icons/registro.svg"></a>
  		</div>
  		<div class="col-md-4">
  			<h3 class="ch3">Screen</h3>
  			<a href="screen.php" class="thumbnail"><img src="icons/screen.svg"></a>
  		</div>
  	</div>
  	<div class="row">
  		<div class="col-md-4 col-md-offset-2">
  			<h3 class="ch3">Settings</h3>
				<a href="config.php" class="thumbnail"><img src="icons/settings.svg"></a>
  		</div>
  		<div class="col-md-4">
  			<h3 class="ch3">Log out</h3>
  			<a href="sign.php" class="thumbnail"><img src="icons/salir.svg"></a>
  		</div>
  	</div>
	</div>


<?php include 'include/_footer.html' ?>
