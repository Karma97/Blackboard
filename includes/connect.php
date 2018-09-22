<?php

try {
	$dbuser = 'ni143121_5sql1';
	$dbpass = 'pimmelfresse';
	$dbhost = 'vweb19.nitrado.net';
	$dbname='ni143121_5sql1';
	$verb = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch {
	header("Location: error.php");
}
?>