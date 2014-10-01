<?php 
	include 'include/_header.html';
	include 'layouts/navbar.html';
	$vuelo = $_GET['vuelo'];
	$airline = $_GET['airline'];
  $status = $_GET['status'];
?>

<div class="container">

<ol class="breadcrumb">
  <li><a class="bluelink" href="/aeropuerto/">Home</a></li>
  <li><a class="bluelink" href="/aeropuerto/register.php">Register</a></li>
  <li class="active"><?php echo $vuelo ?></li>
</ol>

<h2 class="ch3"> Register - Fligth <?php echo $vuelo ?></h2>

  <hr />

  <div class="panel panel-default">
    <div class="panel-body">
    <div class="alert alert-success" role="alert">Passenger succesfull register</div>
    <div class="alert alert-danger" role="alert" id="danger"></div>
    	<div id="contact_form">
<form name="contact" action="">
  <fieldset>
  	<div class="form-group" id="ticket_control">
	    <label for="ticket" id="ticket_label">Ticket</label>
	    <input type="text" name="ticket" id="ticket" size="6" value="" class="text-input form-control" />
	    <label class="error control-label" for="ticket" id="ticket_error">This field is required.</label>
    </div>
		<div class="form-group" id="name_control">
	    <label for="name" id="name_label">Name</label>
	    <input type="text" name="name" id="name" size="30" value="" class="text-input form-control" />
	    <label class="error control-label" for="name" id="name_error">This field is required.</label>
    </div>
    <div class="form-group" id="pass_control">
	    <label for="pass" id="pass_label">Passport</label>
	    <input type="text" name="pass" id="pass" size="30" value="" class="text-input form-control" />
	    <label class="error control-label" for="pass" id="pass_error">This field is required.</label>
    </div>
		<div class="form-group" id="bag_control">
	    <label for="bag" id="bag_label">Baggage Weight</label>
	    <input type="number" name="bag" id="bag" size="30" value="" class="text-input form-control" />
	    <label class="error control-label" for="bag" id="bag_error">This field is required.</label>
    </div>
    	<?php
    		echo '<input id="airline" value="' . $airline . '" type="hidden">';
    		echo '<input id="vuelo" value="' . $vuelo . '" type="hidden">';
        echo '<input id="status" value="' . $status . '" type="hidden">';
    	?>
    <input type="submit" name="submit" class="btn btn-default btn-lg" data-loading-text="Loading..." id="submit_btn" value="Register" />
  </fieldset>
</form>
</div>




</div>
</div>
</div>




<script type="text/javascript" src="js/register.js" ></script>

<?php include 'include/_footer.html' ?>



