<?php 
  include 'include/_header.html';
  include 'layouts/navbar.html';
?>
<div class="container">

<ol class="breadcrumb">
  <li><a class="bluelink" href="/aeropuerto/">Home</a></li>
  <li><a class="bluelink" href="/aeropuerto/config.php">Airlines</a></li>
  <li class="active">New</li>
</ol>

<h2 class="ch3"> Airline - New </h2>

  <hr />

  <div class="panel panel-default">
    <div class="panel-body">
    <div class="alert alert-success" role="alert">Airline sucessfully registered</div>
    <div class="alert alert-danger" role="alert" id="danger">The airline code already exist</div>
    	<div id="contact_form">
<form name="contact" action="">
  <fieldset>
  	<div class="form-group" id="ticket_control">
	    <label for="ticket" id="ticket_label">Name</label>
	    <input type="text" name="ticket" id="ticket" maxlength="30" value="" class="text-input form-control" />
	    <label class="error control-label" for="ticket" id="ticket_error">This field is required.</label>
    </div>
		<div class="form-group" id="name_control">
	    <label for="name" id="name_label">Code</label>
	    <input type="text" name="name" id="name" maxlength="5" value="" class="text-input form-control" />
	    <label class="error control-label" for="name" id="name_error">This field is required.</label>
    </div>
    <div class="form-group" id="pass_control">
	    <label for="pass" id="pass_label">Link</label>
	    <input type="text" name="pass" id="pass"  value="" class="text-input form-control" />
	    <label class="error control-label" for="pass" id="pass_error">This field is required.</label>
    </div>
		<div class="form-group" id="bag_control">
	    <label for="bag" id="bag_label">File Type</label>
	    <select class="form-control" name="bag" id="bag">
        <option value="1">XML</option>
        <option value="2">JSON</option>
      </select>
    </div>
    	
    <input type="submit" name="submit" class="btn btn-default btn-lg" data-loading-text="Loading..." id="submit_btn" value="Register" />
  </fieldset>
</form>
</div>

<a href="config.php" id="back"><button class="btn btn-default btn-lg" >Back</button></a>

</div>
</div>
</div>




<script type="text/javascript" src="js/newa.js" ></script>

<?php include 'include/_footer.html' ?>