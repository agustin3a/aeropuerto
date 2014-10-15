(function() {
  var app = angular.module('vuelos', []);
  app.controller("arrivalsController",function($scope,$http,$timeout) {
	  $scope.arrivals = {};
    var poll = function() {
        $timeout(function() {
            $http.get('/aeropuerto/src/flights.php?tipo=1').
	  				success(function(data) {
	    			$scope.arrivals = data;
	  				});
            poll();
        }, 1000);
    };     
   	poll();

  });


  app.controller("departuresController",function($scope,$http,$timeout) {
    $scope.departures = {};
    var poll = function() {
        $timeout(function() {
            $http.get('/aeropuerto/src/flights.php?tipo=2').
	  				success(function(data) {
	    			$scope.departures = data;
	  				});
            poll();
        }, 1000);
    };     
   	poll();
  });
})();