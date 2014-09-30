<?php 
	include 'include/_header.html';
	include 'layouts/navbar.html';
?>

<div class="container">

<ol class="breadcrumb">
  <li><a class="bluelink" href="/aeropuerto/">Home</a></li>
  <li class="active">Register</li>
</ol>

<h2 class="ch3"> Register </h2>

  <hr />

  <div class="panel panel-default">
    <div class="panel-body">
    <table class="table table-hover">
    <?php include './bin/register_flights.php' ?>
  </table>



</div>
</div>
</div>

<?php include 'include/_footer.html' ?>