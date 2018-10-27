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
	
	
	if (!isset($_GET["iNR"]) or is_numeric($_GET["iNR"]) or empty($_GET["iNR"])) {
		
		header("Location: ../myaccount");
		
		?>
		
		<h2 class="text-danger">Es ist ein fehler aufgetreten!</h2>
		
		<?php
		
	} else {
	
	$crypt_iNR = $_GET["iNR"];
		
	$sql = "SELECT * FROM inserent";
	$query = $verb -> query($sql);
	
	$fehler = false;

	foreach ($verb -> query($sql) as $row) {
	
		if ($crypt_iNR == crypt($row["iNR"],'SB')) {			
			$iNR = $row["iNR"];
			$fehler = false;
			break;
		} else {
			$fehler = true;
		}
		
	}
	
	
	if ($fehler == false) {

	$sql1 = "SELECT * FROM inserent WHERE iNR = '".$iNR."'";
	
	foreach ($verb -> query($sql1) as $row) {
	
	$monatsnamen = array(1=>"Januar",2=>"Februar",3=>"März",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
	
	$monat = date("n", strtotime($row["created_at"]));
	
		$crypt_iNR = crypt($row["iNR"],'SB');
		
		echo "
		
		<div class='card accountcard'>
			<div class='card-header bg-dark text-white'>
				<p class='mb-0 mt-0 d-inline buttonpadding'>
					Profil von ".$row["vorname"]." ".$row["nachname"]."
				</p>
				
				<a href='../kontaktieren/".$crypt_iNR."'>
					<button title='Kontaktieren' class='btn btn-sm btn-light float-right'>
						Kontaktieren
					</button>
				</a>
				
			</div>
			<div class='card-body'>
				
				<div class='row'>
					<div class='col-lg'>
						<div class='card'>
							<div class='card-body bg-light text-center'>
							";
													
							if (file_exists("profilbilder/".$row["iNR"]."")) {
								
								echo "<img class='w-50 h-75 ml-auto mr-auto' src='../profilbilder/".$row["iNR"]."/profil.png'>";
								
							} else {
							
								echo "<img class='w-50 h-75 ml-auto mr-auto' src='../images/user.png'>";
							
							}
							
							echo "
							</div>				
						</div>
					</div>
					<div class='col-lg-10'>
						<div class='card'>
							<div class='card-header bg-dark text-white'>
								Allgemeine Daten
							</div>		
							<div class='card-body'>
							";
							
							$sql1 = "SELECT count(*) as 'count' FROM anzeigen WHERE iNR = '".$iNR."'";
							$query1 = $verb -> query($sql1);							
							
							foreach ($query1 as $row2) {
								echo "Aktuell geschaltete Anzeigen: ".$row2["count"]."<br><br>";
							}
							
							echo "
							
							Registriert seit: 	
							
								".date("d.", strtotime($row["created_at"]))."
								".$monatsnamen[$monat]." 
								".date("Y", strtotime($row["created_at"]))."
										
							</div>	
						</div>
					</div>
				</div>
				";
				
				$sql2 = "SELECT * FROM anzeigen WHERE iNR = '".$iNR."' ORDER BY created_at DESC";
				$query2 = $verb -> query($sql2);
				$countNumRows = $query2 -> fetchAll();
				if (count($countNumRows) < 1) {
				
				echo "
				
				<div class='card mt-3'>
					<div class='card-header bg-dark text-white'>
						Es sind zurzeit keine Anzeigen geschaltet!
					</div>
				</div>
					
				";
				
				} else {
				
				echo "
				<div class='card mt-3'>
					<div class='card-header bg-dark text-white'>
						Anzeigen des Inserenten
					</div>
					<div class='card-body'>
						";
						

						

						
						foreach ($verb -> query($sql2) as $row3) {						
			
							$monat = date("n", strtotime($row3["created_at"]));
							
							
							
							echo "
							
								<div title='Jetzt klicken um zur Anzeige mit dem Betreff \"".strip_tags($row3["betreff"])."\" zu kommen!' onclick=\"window.location.href = '../anzeigen/anzeige-".$row3["aNR"]."'\" class='pointer card mb-3'>
									<div class='card-header bg-dark text-white'>
										".$row3["betreff"]."
									</div>
									<div class='card-body'>
										".$row3["beschreibung"]."
									</div>			
									<div class='card-footer'>
									
									Veröffentlicht am: 
										".date("d.", strtotime($row3["created_at"]))."
										".$monatsnamen[$monat]." 
										".date("Y", strtotime($row3["created_at"])).", 
										".date("H", strtotime($row["created_at"])).":00 Uhr<br>
									</div>	
								</div>	
							
							
							
							";
							
							//mkdir("profilbilder/".$row3["aNR"]."", 0755, true);
						}
						
						echo "
					
					</div>				
				</div>				
				
			</div>
		</div>
		
		";
		}
	}
	
	
	
	} else {
	
	header("Location: ../myaccount");
	
	?>
	
	<h2 class="text-danger">Es ist ein fehler aufgetreten!</h2>
	
	<?php	
	
	}
	
	?>

  
  </div>
  </div>
 
<?php 
	}
	
		require_once 'includes/loeschencheck.php';
		
		include 'includes/footer.php';	
		include 'includes/scripts.php';		
		
		ob_end_flush();
		
?>
  
</body>
</html>
