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
	
		if ($crypt_iNR == str_replace("/", "", crypt($row["iNR"],'SB'))) {			
			$iNR = $row["iNR"];
			$fehler = false;
			break;
		} else {
			$fehler = true;
		}
		
	}
	
	$sql5 = "SELECT * FROM besucherzahlen WHERE iNR = ".$iNR."";
	$query5 = $verb -> query($sql5);	
	
	foreach ($query5 as $row) {
		$zahl = $row["besucherzahl"];
	}
	
	$zahl++;
	
	$sql4 = "UPDATE `besucherzahlen` SET `besucherzahl`= ".$zahl." WHERE iNR = '".$iNR."'";
	$query88 = $verb -> query($sql4);
	
	if ($fehler == false) {

	$sql1 = "SELECT * FROM inserent WHERE iNR = '".$iNR."'";
	
	foreach ($verb -> query($sql1) as $row) {
	
	$monatsnamen = array(1=>"Januar",2=>"Februar",3=>"März",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
	
	$monat = date("n", strtotime($row["created_at"]));
	
		$crypt_iNR = str_replace("/", "", crypt($row["iNR"],'SB'));
		
		echo "
		
		<div class='card accountcard'>
			<div class='card-header bg-dark text-white'>
				<p class='mb-0 mt-0 d-inline buttonpadding'>
					Profil von ".$row["vorname"]." ".$row["nachname"]."
				</p>				
			</div>
			<div class='card-body'>
				
				<div class='row'>
					<div class='col-lg'>
						<div class='card'>
							<div class='card-body bg-light text-center'>
							";
							
							if (count(array_diff(scandir("profilbilder/".$row["iNR"].""), array('..', '.'))) > 0) {
							
								echo "
									<img class='w-100 h-100 rounded ml-auto mr-auto' src='../profilbilder/".$row["iNR"]."/".$row["profilbildpfad"]."'>
								";
							
							} else {
							
								echo "
									<img class='w-100 h-100 rounded ml-auto mr-auto' src='../images/user.png'>
								";
							
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
							
							$sql7 = "SELECT count(*) as 'count' FROM anzeigen WHERE iNR = '".$iNR."'";
							$query7 = $verb -> query($sql7);	
							
							foreach ($query7 as $row2) {
								echo "Aktuell geschaltete Anzeigen: ".$row2["count"]."<br><br>";
							}
							
							foreach ($verb -> query($sql5) as $row4) {
								echo "Profil-Aufrufe: ".$row4["besucherzahl"]."<br><br>";
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
				
				<div class='card mt-3 mb-4'>
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
										".date("H", strtotime($row3["created_at"])).":00 Uhr<br>
									</div>	
								</div>	
						
							";
						
						}
						
						echo "
					
					</div>
				</div>
		
		";
		}
		
				$sql3 = "SELECT * FROM bewertungen WHERE ist_für = '".$iNR."' ORDER BY created_at DESC";
				$query3 = $verb -> query($sql3);
				$countNumRows = $query3 -> fetchAll();
				
				if (count($countNumRows) < 1) {
				
				echo "
				
				<div class='card mt-3 mb-1'>
					<div class='card-header bg-dark text-white'>
						Es gibt zurzeit keine Bewertungen! 
						
						<a href='../bewerten/".$crypt_iNR."'>
						";
						
						foreach ($verb -> query($sql1) as $row5) {
						
							echo "
						
								<button title='Jetzt Bewertung zu \"".$row5["vorname"]." ".$row5["nachname"]."\" schreiben!' class='btn btn-sm btn-light float-right'>
									Bewertung schreiben
								</button>
							
							";
						}
						echo "
						
						</a>
					</div>
				</div>
					
				";
				
				} else {
				
				echo "
				
				<div class='card mt-3'>
					<div class='card-header bg-dark text-white'>
						Bewertungen 
						
						<a href='../bewerten/".$crypt_iNR."'>
						";
						
						foreach ($verb -> query($sql1) as $row5) {
						
							echo "
						
								<button title='Jetzt Bewertung zu \"".$row5["vorname"]." ".$row5["nachname"]."\" schreiben!' class='btn btn-sm btn-light float-right'>
									Bewertung schreiben
								</button>
							
							";
						}
						echo "
						
						</a>
						
					</div>
					<div class='card-body'>
					
				";
						
						foreach ($verb -> query($sql3) as $row4) {
			
							$monat = date("n", strtotime($row4["created_at"]));
							
							echo "
							
								<div class='card mb-3'>
									<div class='card-header bg-dark text-white'>
										".$row4["betreff"]."
									</div>
									<div class='card-body'>
										".$row4["beschreibung"]."
										
										<br><br>
										
										<div class='sterne' title='".$row4["bewertung"]." Sterne'>
										
										";
										
										$i = 0;
										
										while ($i < 5) {
										
										if ($i < $row4["bewertung"]) {
											if ($i == 0) {
												echo "
												
												<i style='color: red;' class='ml-1 fa fa-star'></i>
												
												";
											} else {
												echo "
												
												<i style='color: red;' class='fa fa-star'></i>
												
												";
											}
										} else {
											echo "
											
											<i style='color: black;' class='fa fa-star'></i>
											
											";		
										}
										
										$i++;
											
										}
										
										echo "
										</div>
									</div>
									<div class='card-footer'>
									
									";
									
									$sql6 = "SELECT * FROM inserent WHERE iNR = '".$row4["kommt_von"]."'";
									$query6 = $verb -> query($sql6);
									
									foreach ($query6 as $row) {
										
									$dateiname = "profilbilder/".$row["iNR"]."/".$row["profilbildpfad"];
										
									$crypt_iNR2 = str_replace("/", "", crypt($row["iNR"],'SB')); 
									$countarray = count(array_diff(scandir("profilbilder/".$row["iNR"].""), array('..', '.')));
									
									if ($countarray > 0) {
									if (file_exists("".$dateiname."")) {									
									echo "
											<img onclick=\"window.location.href='../profil/".$crypt_iNR2."'\" title='Jetzt klicken um zum Profil von \"".$row["vorname"]." ".$row["nachname"]."\" zu kommen.' width='25' height='25' class='pointer rounded-circle ml-auto mr-auto' src='../profilbilder/".$row["iNR"]."/".$row["profilbildpfad"]."'>
											~ ".$row["vorname"]." ".$row["nachname"]."
									";
									
									} else {
									
									echo "
											<img onclick=\"window.location.href='../profil/".$crypt_iNR2."'\" title='Jetzt klicken um zum Profil von \"".$row["vorname"]." ".$row["nachname"]."\" zu kommen.' width='25' height='25' class=pointer rounded-circle ml-auto mr-auto' src='../images/user.png'>
											~ ".$row["vorname"]." ".$row["nachname"]."
									";
									
									}
							
									} else {
										echo "
												<img onclick=\"window.location.href='../profil/".$crypt_iNR2."'\" title='Jetzt klicken um zum Profil von \"".$row["vorname"]." ".$row["nachname"]."\" zu kommen.' width='25' height='25' class=pointer rounded-circle ml-auto mr-auto' src='../images/user.png'>
												~ ".$row["vorname"]." ".$row["nachname"]."
										";	
									}}
									
									
									echo "
									
									<br>
									
									<p class='mt-2 mb-0'>Veröffentlicht am: 
												".date("d.", strtotime($row4["created_at"]))."
												".$monatsnamen[$monat]." 
												".date("Y", strtotime($row4["created_at"])).", 
												".date("H", strtotime($row4["created_at"])).":00 Uhr
									</p>
									</div>
								</div>
						
							";
							
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
