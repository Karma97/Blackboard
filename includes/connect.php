<?php

try {
	$dbuser = 'root';
	$dbpass = '';
	$dbhost = 'localhost';
	$dbname='schwarzes_brett';
	$verb = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
	header("Location: error.php");
}

?>
