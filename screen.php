<?php 
	include 'include/_header.html';
	include 'layouts/navbar.html';
?>

<div class="container" ng-app="vuelos">
<div class="panel panel-deafult player" id="player">
	<div class="row title-area">
		<div class="col-md-3">
			<h4 class="text-center" id="clockbox"></h4>
		</div>
		<div class="col-md-6">
			<h3 class="text-center">Aurora Airport</h3>
		</div>
		<div class="col-md-3">
			<h4 class="text-center" id="date"></h4>
		</div>
	</div>
<div class="panel-body">
<div class="row">
	<div class="col-md-6 ">
		<h3 class="text-center"> Arrivals </h3>
		<hr />
		<table class="table" ng-controller="arrivalsController">
    <thead>
      <tr>
      <th>Airline</th>
      <th>Number</th>
      <th>From</th>
      <th>Scheduled</th>
      <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="arrival in arrivals">
        <td>{{arrival.airline}} </td>
        <td>{{arrival.number}}</td>
        <td>{{arrival.origin}}</td>
        <td>{{arrival.scheduled}}</td>
        <td>{{arrival.status}}</td>
      </tr>
    </tbody>
    </table>
	</div> 
	<div class="col-md-6">
		<h3 class="text-center"> Departures </h3>
		<hr />
    <table class="table" ng-controller="departuresController">
		<thead>
      <tr>
      <th>Airline</th>
      <th>Number</th>
      <th>To</th>
      <th>Scheduled</th>
      <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="departure in departures">
        <td>{{departure.airline}} </td>
        <td>{{departure.number}}</td>
        <td>{{departure.destination}}</td>
        <td>{{departure.scheduled}}</td>
        <td>{{departure.status}}</td>
      </tr>
    </tbody>
    </table>
	</div>
</div>
</div>

</div>
<button onclick="goFullscreen('player'); return false" class="btn btn-default">Fullscreen</button>
</div>

<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript" src="js/vuelos.js"></script>
<script type="text/javascript" src="js/screen.js"></script>

<?php include 'include/_footer.html' ?>