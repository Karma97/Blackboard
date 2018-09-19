try {
	$dbuser = 'ni143121_5sql1';
	$dbpass = 'pimmelfresse';
	$dbhost = 'vweb19.nitrado.net';
	$dbname='ni143121_5sql1';
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
}
catch (PDOException $e) {
echo "Error : " . $e->getMessage() . "<br/>";
die("<br><font color='red'>ERROR - Es konnte keine Verbindung zu der Datenbank aufgebaut werden.</font>");
}