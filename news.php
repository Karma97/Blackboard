<?php 
	ob_start();
	session_start();
	
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
		<div class="container mt-3">
		<div id="alle_news">
		<?php
		
		$sql = "SELECT * FROM news ORDER BY nID DESC";
		
		if ($_GET["nID"] === 0 OR $_GET["nID"] === "alle") {
					
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
			echo "
				<div class='form-group'>
					<input type='text' class='form-control' id='searchN' placeholder='nach News/Titel/Inhalt/Datum suchen'>
				</div>
			";
		
		
		setlocale(LC_ALL, 'de_DE.utf8');		
		
		$monatsnamen = array(1=>"Januar",2=>"Februar",3=>"März",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
		
		foreach ($verb -> query($sql) as $row){
		
		$monat = date("n", strtotime($row["created_at"]));
		$monat2 = date("n", strtotime($row["updated_at"]));
				
		echo "
			<div class='col'>
				<div class='card mb-3'>
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
		}
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
		
		ob_end_flush();
	?>

	</body>	
</html>
