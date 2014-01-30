/*
@codekit-prepend "lib/ui-bootstrap-custom-tpls-0.10.0.min.js"
global "angular";
*/

var myApp = angular.module('jorgeApp', ['ui.bootstrap']);

myApp.controller('AppCtrl', ['$scope', '$window', function($scope, $window) {
	var bp = 768;

	$scope.getWidth = function() {
		return $window.document.width;
	};
	$scope.$watch($scope.getWidth, function(newValue, oldValue) {
		if (oldValue >= bp && newValue < bp) 
			$scope.isXS = true;
		else if (oldValue < bp && newValue >= bp)
			$scope.isXS = false;
	});
	window.onresize = function() {
		$scope.$apply();
	};

	$scope.isXS = ($scope.getWidth() < bp);
	$scope.showAbout = false;
}]);
