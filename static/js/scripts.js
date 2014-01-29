/*
@codekit-prepend "lib/angular.min.js", "lib/ui-bootstrap-tpls-0.10.0.min.js"
global "angular";
*/

var myApp = angular.module('jorgeApp', ['ui.bootstrap']);

function NavBarCtrl($scope) {
	$scope.isCollapsed = true;
}