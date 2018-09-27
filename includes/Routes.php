<?php

Route::set('startseite', function() {
	include './index.php';
});

Route::set('/', function() {
	include './index.php';
});

Route::set('rubrik-hinzufuegen', function() {
	include './rubadd.php';
});

Route::set('anzeige-hinzufuegen', function() {
	include './anzadd.php';
});

Route::set('anzeigen', function() {
	include './anzeigen.php';
});

?>