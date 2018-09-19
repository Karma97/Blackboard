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
  <h1>Willkommen auf dem Schwarzen Brett!</h1>
  <h3>Bitte wählen Sie eine der folgenden Kategorien aus:</h3>
  
<?php
try {
	$dbuser = 'ni143121_5sql1';
	$dbpass = 'adolfmeinmann';
	$dbhost = 'vweb19.nitrado.net';
	$dbname='ni143121_5sql1';
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
}
catch (PDOException $e) {
echo "Error : " . $e->getMessage() . "<br/>";
die("<br><font color='red'>ERROR - Es konnte keine Verbindung zu der Datenbank aufgebaut werden.</font>");
}
$sql = 'SELECT * FROM anzeigenrubrik';
echo "<table class='rubriktab'>";
foreach ($dbh->query($sql) as $row) 
{
print "<tr><td><a href=\"./anzeigelesen.php?Rubriknummer=".$row['Rubriknr']."\">".$row['Rubriknr']." - ".$row['Bezeichnung']."</a></td></tr>";
}
echo "</table>";
?> 
  
  
  </center>
  </div>
  
  <div class="footer">
  <p>&copy; BBS Jever</p>
  </div>
</div>
<?php include 'js/responsiveNav.js'?>
</body>

</html>