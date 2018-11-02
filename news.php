<?php 
	
	ob_start();
	session_start();
	
	$head_variante =   2;
	$nav_variante =    2;
	$script_variante = 2;
	$footer_variante = 2;
	
	include 'includes/head.php'; 
	
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		require 'includes/cookiecheck.php';
		
		include 'includes/nav.php';			
		
		?>
	<div class="main">		
		<div class="container mt-3">
		<div id="alle_news" class="animatedParent animateOnce" data-sequence='320'>
		
		<?php
		
		$sql = "SELECT * FROM news ORDER BY nID DESC";
		
		if ($_GET["nID"] == 0 OR $_GET["nID"] == "alle") {
					
		} elseif ($_GET["nID"] >= 1) {
			$nID = $_GET["nID"];
			$sql = "SELECT * FROM news WHERE nID = '$nID' ORDER BY nID DESC";
		} else {
				
		};
				
		
	
		$query = $verb -> query($sql);		
		$queryNumRows = $query -> fetchAll();
		
		if (count($queryNumRows) <= 0) {
			echo "Keine News gefunden. <button onclick='window.history.back();' type='button' class='btn btn-dark'>Zurück</button>";
		} else {
			if ($_GET["nID"] == 0 OR $_GET["nID"] == "alle") {
			echo "
				<div class='form-group'>
					<input type='text' class='form-control' id='searchN' placeholder='nach News/Titel/Inhalt/Datum suchen'>
				</div>
			";
			} else {
			
			}
		
		
		setlocale(LC_ALL, 'de_DE.utf8');		
		
		$monatsnamen = array(1=>"Januar",2=>"Februar",3=>"März",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
		
		$e = 1;
		foreach ($verb -> query($sql) as $row){
		
		$monat = date("n", strtotime($row["created_at"]));
		$monat2 = date("n", strtotime($row["updated_at"]));
				
		echo "
			<div class='col'>
			";
			
			if ($_GET["nID"] == 0 OR $_GET["nID"] == "alle") {
			
			echo "
			
				<div data-id='".$e."' class='card animated fadeInDownShort  mb-3 pointer' title='Jetzt klicken um zur News mit dem Titel \"".$row["titel"]."\" zu kommen.' onclick=\"window.location.href='../news/".$row["nID"]."'\">
				
				";
				
			} else {
			
			echo "
				
				<div data-id='".$e."' class='card animated fadeInDownShort mb-3 newscard'>
				
				";	
				
			}
			
			echo "
				
					<div class='card-header bg-dark text-center'>
						<h2 class='text-white'>".$row["titel"]."</h2>
					</div>
				<div class='card-body'>
					".$row["beschreibung"]."
				</div>
					<div class='card-footer bg-light'>
					Veröffentlicht am: &nbsp;".date("d.", strtotime($row["created_at"]))."
					".$monatsnamen[$monat]." 
					".date("Y", strtotime($row["created_at"])).",  
					".date("H", strtotime($row["created_at"])).":00 Uhr<br>
					
					Zuletzt bearbeitet am: &nbsp;".date("d.", strtotime($row["updated_at"]))."
					".$monatsnamen[$monat2]." 
					".date("Y", strtotime($row["updated_at"])).",  
					".date("H", strtotime($row["updated_at"])).":00 Uhr<br>
				</div>
				</div>
			</div>
			
			";
			$e++;
		}
		}
		?>
				</div>
			</div>
		</div>
	</div>

	<?php 
		
		require_once 'includes/loeschencheck.php';
		
		include 'includes/footer.php';	
		include 'includes/scripts.php';	
		
		ob_end_flush();
	?>

	</body>	
</html>
