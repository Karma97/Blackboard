<!DOCTYPE HTML>
<html>

<head>
<title>Schwarzes Brett - BBS Jever</title>
<meta charset="UTF-8">
<?php  include 'includes/links.inc'?>
</head>
<body>
<div class="grid-container">

<div class="nav" id="header">
	<?php include 'includes/nav.inc'?>
</div>
  
  <div class="main">
  <center>
<?php

$sql = "SELECT * FROM anzeige INNER JOIN inserent USING (Inserentennr) INNER JOIN besitzt USING (Anzeigennr)";

if ($_GET["Rubriknummer"] === 0) {
	
} elseif ($_GET["Rubriknummer"] >= 1) {
	$zahl = $_GET["Rubriknummer"];
	$sql = "SELECT * FROM anzeige INNER JOIN inserent USING (Inserentennr) INNER JOIN besitzt USING (Anzeigennr) WHERE Rubriknr = '$zahl'";
} else {
	
};

//Variablendeklaration
try {
	$dbuser = 'ni143121_5sql1';
	$dbpass = 'pimmelfresse';
	$dbhost = 'vweb19.nitrado.net';
	$dbname='ni143121_5sql1';
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}

catch (PDOException $e) {
	echo "Error : " . $e->getMessage() . "<br/>";
	die("<br><font color='red'>ERROR - Es konnte keine Verbindung zu der Datenbank aufgebaut werden.</font>");
}


$result = $dbh -> query($sql); 

foreach ($result as $row) {
	echo "<table id='table1'><tr><td>Anzeigendatum:</td><td>".$row['Anzeigendatum']."</td></tr>
	<tr><td>Nickname:</td><td>".$row['Nickname']."</td></tr>
	<tr><td>E-Mail:</td><td>".$row['Email']."</td></tr>
	<tr><td>Anzeigentext:</td><td>".$row['Anzeigentext']."</td></tr></table><br>";
}

$dbh -> null;
?>
<br><br><br><br><br>
<form action="anzeigeneu.php"> <input type="submit" value="Neue Anzeige hinzufügen"/></form><br><br><br>
<form action="index.php"> <input type="submit" value="Zurück"/></form>
  </center>
  </div>
  
  <div class="footer">
  <p>&copy; BBS Jever</p>
  </div>
</div>
<?php include 'js/responsiveNav.js'?>
</body>

</html>