(function() {
  var app = angular.module('vuelos', []);
  app.controller("arrivalsController",function($scope,$http) {
	  $http.get('/aeropuerto/src/flights.php').
	  success(function(data) {
	    $scope.arrivals = data;
	  });
  });
  app.controller("departuresController",function($scope,$http) {
    $http.get('/aeropuerto/src/flights.php').
    success(function(data) {
      $scope.departures = data;
    });
  });
})();