<?php include 'includes/head.php'; ?>
	<body>
		
		<div class="nav" id="top">
			<?php
				require_once 'includes/connect.php';
				include 'includes/nav.php';		
			?>
		</div>
		
		<div class="main">
		<div class="container-fluid mt-3">
			<?php
				$abfrage = "SELECT orte.Bezeichnung, orte.Lon, orte.LAT, anzeigen.PLZ, anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM anzeigen INNER JOIN orte USING(PLZ)";
				
				if ($_GET["rNR"] === 0) {
					
					} elseif ($_GET["rNR"] >= 1) {
					$zahl = $_GET["rNR"];
					$abfrage = "SELECT orte.Bezeichnung, orte.Lon, orte.LAT, anzeigen.PLZ, anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM r_besitzt_a INNER JOIN anzeigen USING(aNR) INNER JOIN rubriken USING(rNR) INNER JOIN orte USING (PLZ) WHERE rNR = '$zahl'";
					} else {
					
				};
				
				$query = $verb -> query($abfrage);
				$queryNumRows = $query -> fetchAll();
				
				if (count($queryNumRows) <= 0) {
					echo "Bei dieser Rubrik wurden keine Anzeigen gefunden. <button onclick='window.history.back();' type='button' class='btn btn-dark'>Zurück</button>";
				} else {
				
				foreach ($verb -> query($abfrage) as $row) {
					echo "
					<div class='card mb-3'>
						<div class='card-header bg-dark text-white'>
						".$row["betreff"]."
						</div>
					<div class='card-body border-dark'>
						".$row["beschreibung"]."
						<br>
						Online seit dem 
						".date('d. F Y, h:i', strtotime($row["created_at"]))." Uhr<br>
						Ort: ".$row["Bezeichnung"]."<br>
						Postleitzahl: ".$row["PLZ"]."
					</div>
					</div>
					";
				}
				
				$verb = null;
				
				}
			?>
					
		</div>	
		</div>
		
	<?php 
		include 'includes/footer.php';
	?>
	</body>
	
</html>