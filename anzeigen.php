<?php
	
	$head_variante = 2;
	
	include 'includes/head.php'; 
	
?>
	<body>
	<?php 
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		$nav_variante = 2;
		
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
		<div id="alle_anzeigen">
			<?php
				$abfrage = "SELECT orte.Bezeichnung, anzeigen.PLZ, anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM anzeigen INNER JOIN orte USING(PLZ)";
				
				if ($_GET["rNR"] === 0 OR $_GET["rNR"] === "alle") {
					
					} elseif ($_GET["rNR"] >= 1) {
					$zahl = $_GET["rNR"];
					$abfrage = "SELECT orte.Bezeichnung, anzeigen.PLZ, anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM r_besitzt_a INNER JOIN anzeigen USING(aNR) INNER JOIN rubriken USING(rNR) INNER JOIN orte USING (PLZ) WHERE rNR = '$zahl'";
					} else {
					
				};
				
				$query = $verb -> query($abfrage);
				$queryNumRows = $query -> fetchAll();
				
				if (count($queryNumRows) <= 0) {
					echo "Bei dieser Rubrik wurden keine Anzeigen gefunden. <button onclick='window.history.back();' type='button' class='btn btn-dark'>Zurück</button>";
				} else {
				echo "
					<div class='form-group'>
						<input type='text' class='form-control' id='searchA' placeholder='nach Anzeige/Betreff/Ort/Datum suchen'>
					</div>
				";
				
				setlocale(LC_ALL, 'de_DE.utf8');
				
				$monatsnamen = array(1=>"Januar",2=>"Februar",3=>"März",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
				
				foreach ($verb -> query($abfrage) as $row) {
				
				$monat = date("n", strtotime($row["created_at"]));
				
					echo "
					
					<div class='card mb-3'>
						<div class='card-header bg-dark text-white'>
						".$row["betreff"]."
						</div>
					<div class='card-body border-dark'>
						".$row["beschreibung"]."
						<br><br>
						Online seit dem 
						".date("d.", strtotime($row["created_at"]))."
						".$monatsnamen[$monat]." 
						".date("Y", strtotime($row["created_at"])).",  
						".date("H", strtotime($row["created_at"])).":00 Uhr<br>
						Ort: ".$row["Bezeichnung"]."
					</div>
					</div>
					";
				}
				
				$verb = null;
				
				}
			?>
					
		</div>	
		</div>
		</div>
	<?php 
		include 'includes/footer.php';
		
		$script_variante = 2;
		
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
	?>
	</body>
	
</html>