<?php 
	
	ob_start();
	session_start();
	
	setlocale(LC_ALL, 'de_DE.utf8');
	
	$head_variante = 2;
	$nav_variante = 2;
	$script_variante = 2;
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
	
	$nofound = false;
	
	if (isset($_GET["aNR"])) {		
		if ($_GET["aNR"] < 1 or empty($_GET["aNR"])) {	
			$nofound = false;			
		} else {
			$nofound = true;
			$aNR = $_GET["aNR"];
		}		
	}	
	
	if ($nofound == false) {
		
		echo "keine anzeige gefunden!";
		
	} else {
		
	$sql1 = "SELECT * FROM anzeigen WHERE aNR = '".$aNR."'";
	$query1 = $verb -> query($sql1);
		
	foreach ($query1 as $row) {
		echo "
		
		<div class='card anzeigencard'>
		<div class='card-header bg-dark text-white'>
			".$row["betreff"]."
		</div>
		<div class='card-body text-dark'>
		    
		    
			";
			
			$sql2 = "SELECT * FROM bilder WHERE aNR = '".$aNR."'";
			$query2 = $verb -> query($sql2);
			$countBilder = $query2 -> fetchAll();
			
			if (count($countBilder) > 0) {
				
				echo "
				<div class='card mb-2'>
				<div class='card-header bg-dark text-white'>
					Bildergallerie (".count($countBilder)." insgesamt)
				</div>
				<div class='card-body text-dark'>
					bilder kommen...
				</div>	
				</div>
				";
				
			} 
			
			echo "
			
			<div class='card mb-2'>
				<div class='card-header bg-dark text-white'>
					Informationen
				</div>
				<div class='card-body text-dark'>
					<p class='mb-0'><u>Betreff:</u></p> 
					<p>".$row["betreff"]."</p>
					
					<p class='mb-0'><u>Beschreibung:</u></p> 
					<p>".$row["beschreibung"]."</p>
					
					<p class='mb-0'><u>Standort:</u></p> 
					<div>
							<div id='map-canvas'></div>
					</div>
						";
						

						
						echo "
					</div>
				</div>
			";
			
			
			echo "
		</div>
		
		<div class='card-footer'>
			Erstellt am: ".date("d.m.Y, H:i", strtotime($row["created_at"]))."<br>
			
			";
			
			$endtag = 4;
			
			echo "
			Anzeige endet in <b>".$endtag."</b> Tagen!
		</div>
		
		</div>
		
		";
	}
	
	
	}

	
	?>
		
</div>
</div>

<?php 
	
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
							?>
						<!--
						<script type="text/javascript">
						
						function myMap() {
							var mapProp= {
								center:new google.maps.LatLng(53.485000, 8.027000),
								zoom:13,
							};
							var map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);
						}	
						
						</script>
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3mal-6djTtdyubvAf6uDYF1RXmmWTonU&callback=myMap"></script>
						-->
						<?php
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
