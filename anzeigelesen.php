<!DOCTYPE HTML>
<html>
<head>
	<title>Schwarzes Brett - BBS Jever</title>
	<meta charset="UTF-8">
	<?php  include 'includes/links.php'?>
</head>
<body>

<div class="grid-container">


	<div class="nav" id="header">
		<?php include 'includes/nav.php'?>
	</div>
	
	
  <div class="main">
<?php

$sql = "SELECT * FROM anzeige INNER JOIN inserent USING (Inserentennr) INNER JOIN besitzt USING (Anzeigennr)";

if ($_GET["Rubriknummer"] === 0) {
	
} elseif ($_GET["Rubriknummer"] >= 1) {
	$zahl = $_GET["Rubriknummer"];
	$sql = "SELECT * FROM anzeige INNER JOIN inserent USING (Inserentennr) INNER JOIN besitzt USING (Anzeigennr) WHERE Rubriknr = '$zahl'";
} else {
	
};

require_once 'includes/connect.php';

$result = $verb -> query($sql); 

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


  </div>
  
  
  <div class="footer">
	<p>&copy; BBS Jever</p>
  </div>
  
  
</div>
<?php include 'js/responsiveNav.js'?>
</body>

</html>