<?php
    $active = "1";

	include("includes/connect.php");
	
    include("includes/head.php");

    include("includes/header.php");
    include("includes/nav.php");
?>
<main>
	<?php
		
		$abfrage = "SELECT * FROM anzeigen";
		
		if ($_GET["rn"] === 0) {

		} elseif ($_GET["rn"] >= 1) {
			$rn = $_GET["rn"];
			$abfrage = "SELECT * FROM besitzt INNER JOIN rubriken USING (RN) INNER JOIN anzeigen USING (AN) WHERE RN = '$rn'";
		} else {
			
		};
		
		if (!isset($_GET["rn"]) or empty($_GET["rn"])) {
			
		}
		
		$host = "localhost";
		$db = "schwarzesbrett";
		$kennwort = "";
		$user = "root";
	
		$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $kennwort, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
					
		foreach ($pdo -> query($abfrage) as $row) {
			echo "<div class='column'>".$row["beschreibung"]."</div>";
		}
		
		$pdo = null;
		
	?>
</main>
<?php
    include("includes/footer.php");
?>
</body>
</html>
