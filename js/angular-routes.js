

var app = angular.module("SB", ["ngRoute"]);
app.config(function($routeProvider, $locationProvider) {
	
	$locationProvider.html5Mode(false);
	$locationProvider.hashPrefix('!');
	
   $routeProvider
    .when("/", {
        templateUrl : "router.php"
    })
    .when("/startseite", {
        templateUrl : "router.php"
    })
	.when("/index", {
        templateUrl : "router.php"
    })
    .when("/register", {
        templateUrl : "register.php"
    })
	.when("/rubriken/add", {
        templateUrl : "rubadd.php"
    })
	.when("/anzeigen/add", {
        templateUrl : "anzadd.php"
    })
    .otherwise({
		redirectTo:'/index'
	});
	

	
});