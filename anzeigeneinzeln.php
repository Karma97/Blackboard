<?php 
	
	ob_start();
	session_start();
	
	setlocale(LC_ALL, 'de_DE.utf8');
	
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
<div class="container-fluid mt-3">
	
	<?php
	
	$nofound = false;
	
	if (isset($_GET["aNR"])) {		
		if ($_GET["aNR"] < 1 or empty($_GET["aNR"])) {	
			$nofound = true;			
		} else {
			$nofound = false;
			$aNR = $_GET["aNR"];
		}		
	}	
	
	if ($nofound == true) {
		
		echo "keine anzeige gefunden!";
		
	} else {
		
	$sql1 = "SELECT * FROM anzeigen INNER JOIN orte USING (ortID) WHERE aNR = '".$aNR."'";
	$query1 = $verb -> query($sql1);
		
	foreach ($query1 as $row) {
		echo "
		
		<div class='card anzeigencard mb-4'>
		<div class='card-header bg-dark text-white'>
			".$row["betreff"]."
		</div>
		<div class='card-body text-dark'>
		    
		    
			";
			
			$sql2 = "SELECT * FROM anzeigenbilder WHERE aNR = '".$aNR."'";
			$query2 = $verb -> query($sql2);
			$countBilder = $query2 -> fetchAll();
						
			echo "
			
			<div class='card mb-2'>
				<div class='card-header bg-dark text-white'>
					Informationen
				</div>
				<div class='card-body text-dark'>
				 <div class='row'>
				  <div class='col-lg-7'>
						<p class='mb-0'><b>Betreff</b></p> 
						<p class=''>".$row["betreff"]."</p>
						
						<p class='mb-0'><b>Beschreibung</b></p> 
						<p class=''>".$row["beschreibung"]."</p>
				  </div>
					";
					
					?>
					<div class="col-lg-5">
					<p class="mb-0 mt-0 text-center">Standort: <?php echo $row["Bezeichnung"]; ?></p>
						<iframe width="100%" height="300px" 
						frameborder="0" scrolling="no" 
						marginheight="0" marginwidth="0" 
						src="https://www.openstreetmap.org/export/embed.html?bbox=
							<?php echo $row["breite"]; ?>%2C
							<?php echo $row["laenge"]; ?>%2C
							<?php echo $row["breite"]; ?>%2C
							<?php echo $row["laenge"]; ?>
							
							&amp;layer=mapnik&amp;marker=
							
							<?php echo $row["laenge"]; ?>%2C
							<?php echo $row["breite"]; ?>" 
							
							style="border: 1px solid black">
						</iframe>
					</div>		
					</div>
					
<?php
					
					echo "
					
				</div>
			</div>
			";
			
			
				if (count($countBilder) > 0) {
						
				echo "
				<div class='card-header bg-dark text-white'>
					<p class='mb-0 mt-0 text-center'>Bildergallerie (".count($countBilder).")</p>
				</div>
				<div class='card mb-4'>
				<div id='slide' style='height: 100%; max-width: auto;' class='carousel slide' data-ride='carousel' data-interval='9999999'>
				
				<ol class='carousel-indicators'>
				";
				
				for ($e = 0; $e < count($countBilder); $e++) {
					if ($e == 0) {
						echo "<li data-target='#slide' data-slide-to='".$e."' title='Zum ".($e + 1)." Bild springen' class='pointer active'></li>";
					} else {
						echo "<li data-target='#slide' data-slide-to='".$e."' title='Zum ".($e + 1)." Bild springen' class='pointer'></li>";
					}
				}
					
				echo "
				</ol>
				
				  <div class='carousel-inner'>
					
					";
					
				$i = 0;
					
				foreach ($verb -> query($sql2) as $row2) {
					
					$dateiname = $row2["bildpfad"];
					
					$countarray = count(array_diff(scandir("anzeigenbilder/".$row2["aNR"].""), array('..', '.')));
					
					if ($countarray > 0) {
					if (file_exists("".$dateiname."")) {
						echo "
							<div class='carousel-item p-1 pb-5 pt-3 text-center "; if ($i == 0) { echo "active"; } echo "'>
								<img class='image_preview_active anzeigenbild rounded ml-auto mr-auto' src='../".$dateiname."'>
							</div>
							";	
						} else {
							echo "
							<div class='carousel-item p-1 pb-5 pt-3 text-center "; if ($i == 0) { echo "active"; } echo "'>
								<img class='image_preview_active anzeigenbild rounded ml-auto mr-auto' src='../images/no-image.png' \>
							</div>	
							";								
						}						
					} else {
						echo "
							<div class='carousel-item p-1 pb-5 pt-3 text-center "; if ($i == 0) { echo "active"; } echo "'>
								<img class='image_preview_active anzeigenbild rounded ml-auto mr-auto' src='../images/no-image.png' \>
							</div>	
						";					
					}
					
					$i++;
					
					}
					
					echo "
				</div>
				</div>
				";
			} else {
			
			
			}
			
			echo "
		</div>
		</div>
		<div class='card-footer'>
			Erstellt am: ".date("d.m.Y, H:i", strtotime($row["created_at"]))."<br>
			
			";
			
			$date = date('Y-m-d H:i:s', strtotime($row["created_at"]));
				
			$newtimestamp = strtotime("".$row["created_at"]." + 14 days");
			$endtag = date('Y-m-d H:i:s', $newtimestamp);
					
			$newtimestamp1 = strtotime("".$row["created_at"]." + 14 days");
			$endtagEndgültig = date('d.m.Y, H:i', $newtimestamp1);
			
			$newtimestamp2 = strtotime("".$row["created_at"]." + 15 days");
			$endtag2 = date('Y-m-d H:i:s', $newtimestamp2);
					
			if ($endtag < $date or $endtag > $endtag2) {
			
			echo "
				<p class='text-danger mt-0 mb-0'>Anzeige sollte bereits gelöscht sein! ist dies nicht der Fall, bitte <a href='mailto:schwarzes.brett@sbrett.de?subject=Problem%beim%Schwarzen%Brett'>kontaktieren</a>!</p>
			";
			
			} else {
			
			echo "
				Anzeige endet am <b>".$endtagEndgültig."</b>!
			";
			
			}
			
			echo "
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
