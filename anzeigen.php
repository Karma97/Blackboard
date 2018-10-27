<?php
	ob_start();
	session_start();
	
	$head_variante =   2;
	$nav_variante =    2;
	$script_variante = 2;
	$footer_variante = 2;
	
	include 'includes/head.php'; 
	
?>
	<body>
	<?php 
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		require 'includes/cookiecheck.php';		
		include 'includes/nav.php';			
		
		?>
		
		<div class="main">
		<div class="container mt-3">
			<?php
			
				$alle = false;		
			
				$abfrage = "SELECT inserent.iNR, orte.Bezeichnung, anzeigen.aNR, anzeigen.PLZ, anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM anzeigen INNER JOIN orte USING(PLZ) INNER JOIN inserent USING (iNR)";
				
				if ($_GET["rNR"] == 0 OR $_GET["rNR"] == "alle") {
					
					$alle = true;
					
					} elseif ($_GET["rNR"] >= 1) {
						
					$zahl = $_GET["rNR"];
					
					$abfrage = "SELECT inserent.iNR, orte.Bezeichnung, anzeigen.PLZ, anzeigen.aNR, anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM r_besitzt_a INNER JOIN anzeigen USING(aNR) INNER JOIN rubriken USING(rNR) INNER JOIN orte USING (PLZ) INNER JOIN inserent USING (iNR) WHERE rNR = '$zahl'";
					
					} else {
					
				};
				
				$query = $verb -> query($abfrage);
				$queryNumRows = $query -> fetchAll();
				
				if (count($queryNumRows) <= 0) {
					
					echo "
					
					<div class='card mb-2'>
						<div class='card-header bg-dark text-white'>
					
					";
					
					if ($alle == false) {
						
						$abfrage3 = "SELECT bezeichnung, icon FROM rubriken WHERE rNR = '".$zahl."'";							
						$query3 = $verb -> query($abfrage3);	
						
						foreach ($query3 as $row) {
							echo "
							
							<p class='float-left d-inline mb-0 buttonpadding'>
								<i class='".$row["icon"]."'></i>&nbsp; ".strip_tags($row["bezeichnung"])."
							</p>
							
							<a href='../anzeigen/alle' class='float-right'>
								<button class='btn btn-sm btn-light'>Alle Anzeigen</button>
							</a>
							
							";
						}
						
					} else {
						
						echo "Alle Anzeigen";
						
					}
							
					echo "
					
						</div>
					</div>
					
					Es wurden keine Anzeigen gefunden. &nbsp; <button onclick='window.history.back();' type='button' class='btn btn-dark'>Zurück</button>
					
					";
					
				} else {
				
					echo "
					
					<div class='card mb-2'>
						<div class='card-header bg-dark text-white'>
					
					";
					
					if ($alle == false) {
						
						$abfrage3 = "SELECT bezeichnung, icon FROM rubriken WHERE rNR = '".$zahl."'";							
						$query3 = $verb -> query($abfrage3);	
						
						foreach ($query3 as $row) {
							echo "
							
							<p class='float-left d-inline mb-0 buttonpadding'>
								<i class='".$row["icon"]."'></i>&nbsp; ".strip_tags($row["bezeichnung"])."
							</p>
							
							<a href='../anzeigen/alle' class='float-right'>
								<button class='btn btn-sm btn-light'>Alle Anzeigen</button>
							</a>
							
							";
						}
						
					} else {
						
						echo "Alle Anzeigen";
						
					}
							
					echo "
					
						</div>
					</div>
					
					";

				echo "
					<div class='form-group mb-5'>
						<input type='text' class='form-control' id='searchA' placeholder='nach Anzeige/Betreff/Ort/Datum suchen'>
					</div>
					
					<div id='alle_anzeigen'>
				";
				
				setlocale(LC_ALL, 'de_DE.utf8');
				
				$monatsnamen = array(1=>"Januar",2=>"Februar",3=>"März",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
				
				foreach ($verb -> query($abfrage) as $row) {
				
				$monat = date("n", strtotime($row["created_at"]));
				
					echo "
					
					<div onclick=\"window.location.href = '../anzeigen/anzeige-".$row["aNR"]."'\" class='pointer card mb-3' title='Jetzt klicken um zur Anzeige mit dem Betreff \"".strip_tags($row["betreff"])."\" zu kommen!'>
						<div class='card-header bg-dark text-white'>
							<p class='d-inline mb-0 mt-0 buttonpadding2'>
								".strip_tags($row["betreff"])."
							</p>
							
							<a href='../account/".$row["iNR"]."'>
							<button title='Jetzt klicken um zum Inserenten zu kommen!' class='btn btn-sm btn-light float-right'>
								Zum Inserenten
							</button>
							</a>
						</div>
					<div class='card-body border-dark'>
					
					".strip_tags($row["beschreibung"])."
					
						<br><br>
						
						Online seit dem 
						".date("d.", strtotime($row["created_at"]))."
						".$monatsnamen[$monat]." 
						".date("Y", strtotime($row["created_at"])).",  
						".date("H", strtotime($row["created_at"])).":00 Uhr<br>
						
						Ort: ".strip_tags($row["Bezeichnung"])."
						
					</div>
					
					";
					
					if ($alle == true) {
					
					echo "
					
					<div class='card-footer bg-light'>
						Aus der Rubrik: ";
						
						$abfrage2 = "SELECT * FROM r_besitzt_a INNER JOIN rubriken USING (rNR) WHERE aNR = '".$row["aNR"]."'";
						$query2 = $verb -> query($abfrage2);					
						
					foreach ($query2 as $row2) {
							echo "&nbsp; <a href='".$row2["rNR"]."' title='Jetz klicken um zu den Anzeigen zu kommen, die zu der Rubrik mit der Bezeichnung \"".$row2["bezeichnung"]."\" gehören, zu gelangen!'><button class='btn btn-sm btn-dark mb-1'>".strip_tags($row2["bezeichnung"])."</button></a>";
						}
						
					echo "
						
					</div>
					
					";
					
					}
					
					echo "	
					
					</div>
					
					";
				}
				
				
				}
			?>
					
		</div>	
		</div>
	<?php 
		
		include 'includes/footer.php';	
		include 'includes/scripts.php';	
		
		require_once 'includes/loeschencheck.php';
		
		ob_end_flush();
	?>
	</body>
	
</html>