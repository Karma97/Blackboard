<?php

try {
	
	$dbuser = 'root';
	$dbpass = '';
	$dbhost = 'localhost';
	$dbname='schwarzes_brett';
	$verb = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	
} catch (PDOException $e) {
	
	DIE ("
	
	<div class='container mt-0 p-5 rounded bg-light'>
		<p class='p-2'><h5 class='text-danger'>Fehler bei Datenbank: Kontaktieren Sie bitte den Support oder Verfasser.</h5></p> 
		
		<hr class='bg-danger'>
		
		<p class='text-dark p-1'>".$e."</p>		
		<p class='text-dark p-1'>Unsere E-Mail: <a href='mailto:schwarzes.brett@sbrett.de?subject=Problem%beim%Schwarzen%Brett'>schwarzes.brett@sbrett.de</a></p>
		
	</div>
	
	");
	
}

?>
