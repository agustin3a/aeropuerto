<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/less" href="less/bootstrap.less" />
    <script type="text/javascript" src="js/less-1.7.4.min.js" ></script>
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
  </head>
  <body>
  <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/aeropuerto/" >Aurora Airport</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
   
  </div><!-- /.container-fluid -->
</nav>
	<div class="container">
		<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Log in</h3>
  </div>
  <div class="panel-body">
    <div id="contact_form">
<form name="contact" action="">
  <fieldset>
  	<div class="form-group" id="ticket_control">
	    <label for="ticket" id="ticket_label">Username</label>
	    <input type="text" name="ticket" id="ticket" maxlength="30" value="<?php echo $name?>" class="text-input form-control" />
	    <label class="error control-label" for="ticket" id="ticket_error">This field is required.</label>
    </div>
		<div class="form-group" id="name_control">
	    <label for="name" id="name_label">Password</label>
	    <input type="password" name="name" id="name" maxlength="30" value="<?php echo $code?>" class="text-input form-control" />
	    <label class="error control-label" for="name" id="name_error">This field is required.</label>
    </div>
    <input type="submit" name="submit" class="btn btn-default btn-lg" data-loading-text="Loading..." id="submit_btn" value="Sign" />
  </fieldset>
</form>
</div>
  </div>
</div>

	</div>

<script type="text/javascript" src="js/user.js" ></script>

<?php include 'include/footer.html'; ?>