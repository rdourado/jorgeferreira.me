/*
@codekit-prepend "lib/angular.min.js", "lib/ui-bootstrap-tpls-0.10.0.min.js"
global angular
*/

var myApp = angular.module('jorgeApp', ['ui.bootstrap']);

function MenuCtrl($scope) {
	$scope.items = [
		"The first choice!",
		"And another choice for you.",
		"but wait! A third!"
	];
}

function NavBarCtrl($scope) {
	$scope.isCollapsed = true;
}