<?php 
	ob_start();
	session_start();
	
	$head_variante = 2;	
	$script_variante = 2;
	$nav_variante = 2;
	$footer_variante = 2;
	
	include 'includes/head.php'; 
	
?>
<body>
	<?php 
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		require 'includes/cookiecheck.php';
		
		switch ($nav_variante) {
			case $nav_variante === 1:
				include 'includes/nav/nav_1.php';
				break;
			case $nav_variante === 2:
				include 'includes/nav/nav_2.php';
				break;
			case $nav_variante === 3:
				include 'includes/nav/nav_3.php';
				break;
			case $nav_variante === 4:
				include 'includes/nav/nav_4.php';
				break;
			case $nav_variante === 5:
				include 'includes/nav/nav_5.php';
				break;
		}
		
		?>
  <div class="main">
 <div class="container-fluid mt-3">
 		<?php
			if (!isset($_SESSION['vorname']) or !isset($_SESSION['iNR']) or !isset($_SESSION['news'])) {
			header("Location: ../startseite");
			?>
			
			<h4><p class="text-danger text-center">Um diese Funktion nutzen zu können, müssen Sie angemeldet sein!</p></h4>
			
			<?php
			
			} else {
				
		?>
  <div class="card accountcard">
	<div class="card-header bg-dark text-white">			
		Mein Account:
	</div>
	<div class="card-body">
		<?php
		
		

		
			$abfrage = "SELECT * FROM inserent WHERE identifier_token = '".$_SESSION['identifier_token']."' AND iNR = '".$_SESSION['iNR']."'";	
			$query2 = $verb -> query($abfrage);	
			
			setlocale(LC_ALL, 'de_DE.utf8');				
			
			foreach ($query2 as $row) {				
				echo "
				
				<div class='row'>
					<div class='col-sm mb-3'>
						<div class='card'>
							<div class='card-header bg-dark text-white'>
								Allgemeine Informationen
							</div>
							<div class='card-body'>
							
								Kundennummer: ".$_SESSION['kundennummer']."<br><br>
								
								Vorname: ".$row["vorname"]."<br>
								Nachname: ".$row["nachname"]."<br>
								Geburtsdatum: ".date("d.m.Y", strtotime($row["gebdatum"]))."<br><br>
								
								E-Mail: ".$row["email"]."<br>
								
							</div>
						</div>
					</div>
					<div class='col-sm mb-3'>
						<div class='card'>
							<div class='card-header bg-dark text-white'>
								Allgemeine Einstellungen
							</div>
							<div class='card-body'>
							
								<a href=''>Passwort ändern</a><br>
								<a href=''>E-Mail ändern</a><br><br>
								
								<a href=''>Meine Anzeigen bearbeiten</a><br>
								<a href=''>Meine Anzeigen löschen</a><br><br>
								
								<a href=''>Mein Account löschen</a><br>
								
							</div>
						</div>						
					</div>
				</div>
				
				";
				
				$abfrage2 = "SELECT anzeigen.updated_at, anzeigen.created_at, anzeigen.betreff, anzeigen.PLZ, anzeigen.beschreibung, orte.Bezeichnung FROM anzeigen INNER JOIN orte USING (PLZ) WHERE iNR = '".$_SESSION['iNR']."'";	
				$query3 = $verb -> query($abfrage2);
				$queryNumRows= $query3 -> fetchAll();
				
				echo "
				
				<div class='card mb-2'>
					<div class='card-header bg-dark text-white'>
					";
					
				$abfrage4 = "SELECT * FROM anzeigen WHERE iNR = '".$_SESSION["iNR"]."'";	
				$query4 = $verb -> query($abfrage4);	
				$countNumRows = $query4 -> fetchAll();
				
				$löschung = false;		
				
				if (count($countNumRows) == $_COOKIE["anzahl_aktuelle_anzeigen"]) {
					
					$löschung = false;
					
				} else {			
				
					$countlöschunganzeigen = $_COOKIE["anzahl_aktuelle_anzeigen"] - count($countNumRows);
					$löschung = true;
					
					setcookie("anzahl_aktuelle_anzeigen", count($countNumRows), time() + ( 365 * 24 * 60 * 60), "/");
					
				}
					
					
				if (count($queryNumRows) > 0)  {
				
				echo "Meine Anzeigen (".count($queryNumRows)." insgesamt) "; 
				
				if ($löschung == true) {  
					echo "&nbsp;&nbsp; <p class='d-inline text-danger'>".$countlöschunganzeigen." Ihrer Anzeige/n wurden wegen Verstößung von Richtlinien oder der Zeitüberschreitung von 2 Wochen gelöscht!</p>"; 
				}
				
				echo "
					</div>
					<div class='card-body'>
				";
					
				
				foreach ($verb -> query($abfrage2) as $row) {
				echo "
				
						<div class='card mb-3'>
							<div class='card-header bg-dark text-white'>
								Betreff: ".$row["betreff"]."
							</div>
							<div class='card-body'>
							
							Beschreibung: ".$row["beschreibung"]."<br><br>
							Ort: ".$row["Bezeichnung"]."<br>
							Erstellt am: ".date("d.n.Y, H:i", strtotime($row["created_at"]))." Uhr<br>
							Zuletzt bearbeitet am: ".date("d.n.Y, H:i", strtotime($row["updated_at"]))." Uhr<br>
							
							</div>				
					</div>				
					
				";
				}
				
				echo "</div>";
				
			} else {
				
				if (count($countNumRows) == $_COOKIE["anzahl_aktuelle_anzeigen"]) {
					
					$löschung = false;
					
				} else {			
				
					$countlöschunganzeigen = $_COOKIE["anzahl_aktuelle_anzeigen"] - count($countNumRows);
					$löschung = true;
					
					setcookie("anzahl_aktuelle_anzeigen", count($countNumRows), time() + ( 365 * 24 * 60 * 60), "/");
					
				}
				
				if ($löschung == true) {  
					echo "Keine Anzeigen vorhanden!&nbsp;&nbsp; <a href='../anzeigen/erstellen'><button class='btn btn-light'>Jetzt Anzeige aufgeben</button></a> &nbsp;&nbsp; <p class='d-inline text-danger'>".$countlöschunganzeigen." Ihrer Anzeige/n wurden wegen Verstößung von Richtlinien oder der Zeitüberschreitung von 2 Wochen gelöscht!</p>"; 
				} else {
					echo "Keine Anzeigen vorhanden!&nbsp;&nbsp; <a href='../anzeigen/erstellen'><button class='btn btn-light'>Jetzt Anzeige aufgeben</button></a>";
				}		
				
				
			}
			}
		?>
	</div>
  </div>
  </div>
  </div>
	<?php 
	}
		
		switch ($footer_variante) {
			case $footer_variante === 1:
				include 'includes/footer/footer_1.php';
				break;
			case $footer_variante === 2:
				include 'includes/footer/footer_2.php';
				break;
			case $footer_variante === 3:
				include 'includes/footer/footer_3.php';
				break;
			case $footer_variante === 4:
				include 'includes/footer/footer_4.php';
				break;
			case $footer_variante === 5:
				include 'includes/footer/footer_5.php';
				break;
		}
		
		require_once 'includes/loeschencheck.php';
		
		switch ($script_variante) {
			case $script_variante === 1:
				include 'includes/scripts/scripts_1.php';
				break;
			case $script_variante === 2:
				include 'includes/scripts/scripts_2.php';
				break;
			case $script_variante === 3:
				include 'includes/scripts/scripts_3.php';
				break;
			case $script_variante === 4:
				include 'includes/scripts/scripts_4.php';
				break;
			case $script_variante === 5:
				include 'includes/scripts/scripts_5.php';
				break;
		}
		
		ob_end_flush();
	?>
  
</body>

</html>