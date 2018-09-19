<!DOCTYPE HTML>
<html>

<head>
<title>Schwarzes Brett - BBS Jever</title>
<meta charset="UTF-8">
<?php  include 'includes/links.inc'?>
<meta http-equiv="refresh" content="1; URL=rubadd.php">
</head>
<body>
<div class="grid-container">

<div class="nav" id="header">
	<?php include 'includes/nav.inc'?>
</div>
  
  <div class="main">
  <center>
<?php
$host='vweb19.nitrado.net';
$benutzer='ni143121_5sql1';
$kennwort='pimmelfresse';
$datenbank='ni143121_5sql1';

$rub		=	$_REQUEST["rub"];;

$abfrage = "INSERT INTO anzeigenrubrik (Bezeichnung)
VALUES ('$rub');";

//Verbindung herstellen
$verbindung = mysql_connect($host, $benutzer, $kennwort)
    OR DIE ("Verbindung zum Server fehlgeschlagen.");
	mysql_query("set names 'utf8'");
	
//Datenbank auswählen
mysql_select_db($datenbank)
    OR DIE ("Datenbank nicht gefunden.");

//Abfrage ausführen
$ergebnis = mysql_query($abfrage);
/* Falls die Abfrage nicht ausgefuehrt wurde Fehlermeldung
anzeigen lassen */
if(!$ergebnis) {
  echo "Fehler bei Abfrage: ".mysql_error();
}
else {echo "Eingabe war erfolgreich";};

//Verbindung schliessen
mysql_close($verbindung);
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