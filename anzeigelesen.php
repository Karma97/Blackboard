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
//Variablendeklaration

$host='vweb19.nitrado.net';
$benutzer='ni143121_5sql1';
$kennwort='pimmelfresse';
$datenbank='ni143121_5sql1';

$zahl = $_GET ["Rubriknummer"];
$abfrage = "SELECT * FROM anzeige inner join inserent USING (Inserentennr) inner join besitzt USING (Anzeigennr) where Rubriknr=$zahl";

//Verbindung herstellen
$verbindung = mysql_connect($host, $benutzer, $kennwort)
    OR DIE ("Verbindung zum Server fehlgeschlagen.");

mysql_query("SET NAMES 'utf8'");
//Datenbank auswählen
mysql_select_db($datenbank)
    OR DIE ("Datenbank nicht gefunden.");

//Abfrage ausführen
$ergebnismenge = mysql_query($abfrage);
/* Falls die Abfrage nicht ausgefuehrt wurde Fehlermeldung
anzeigen lassen */
if(!$ergebnismenge) {
  echo "Fehler bei Abfrage: ".mysql_error();
};
//Ergebnis der Abfrage ausgeben
while($liste = mysql_fetch_array($ergebnismenge)) {
echo "<table id='table1'><tr><td>Anzeigendatum:</td><td>".$liste["Anzeigendatum"]."</td></tr>
<tr><td>Nickname:</td><td>".$liste["Nickname"]."</td></tr>
<tr><td>E-Mail:</td><td>".$liste["Email"]."</td></tr>
<tr><td>Anzeigentext:</td><td>".$liste["Anzeigentext"]."</td></tr></table><br>";
}
//Speicherplatz der Ergebnismenge freigeben, Verbindung schliessen
mysql_free_result($ergebnismenge);
mysql_close($verbindung);
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