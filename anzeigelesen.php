<!DOCTYPE HTML>
<html>
<head>
	<title>Schwarzes Brett - BBS Jever</title>
	<meta charset="UTF-8">
	<?php  include 'includes/links.php';?>
</head>
<body>

	<div class="nav" id="header">
		<?php
		require_once 'includes/connect.php';
		include 'includes/nav.php';		
		?>
	</div>
		
  <div class="main">
<?php
$abfrage = "SELECT anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM anzeigen INNER JOIN orte USING(PLZ)";

if ($_GET["rNR"] === 0) {
	
} elseif ($_GET["rNR"] >= 1) {
	$zahl = $_GET["rNR"];
	$abfrage = "SELECT anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM r_besitzt_a INNER JOIN anzeigen USING(aNR) INNER JOIN rubriken USING(rNR) WHERE rNR = '$zahl'";
} else {
	
};

foreach ($verb -> query($abfrage) as $row) {
	echo "<b>
	".$row["betreff"]."</b><br>
	".$row["beschreibung"]."<br>Online seit dem 
	".date('d. F Y, h:i', strtotime($row["created_at"]))." Uhr<br><br>";
}

$verb = null;

?>
<br><br><br><br><br>


<form action="anzeigeneu.php"> <input type="submit" value="Neue Anzeige hinzufügen"/></form><br><br><br>
<form action="index.php"> <input type="submit" value="Zurück"/></form>


  </div>
  
  
  <div class="footer">
	<p>&copy; BBS Jever</p>
  </div>
</body>

</html>