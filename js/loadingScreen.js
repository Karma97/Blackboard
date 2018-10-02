
/*$(function() {
  setTimeout(function() {
    $(".komplett").fadeOut("smooth");
	$("body").fadeIn("smooth");
}, 500)
});*/

window.addEventListener("load", function() {
	var loadingScreen = $("#komplett");
	loadingScreen.fadeOut("slow");
	window.setTimeout(function() {
		$("body").fadeIn("smooth");
	}, 200);
});