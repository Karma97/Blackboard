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
		
	<h4><p class="text-danger text-center">Diese Funktion ist nicht für Sie erreichbar!</p></h4>
		
	</div>
	</div>
	
<?php
		
	} else {
	
		if ($_SESSION['vorname'] === "S_B" && $_SESSION['nachname'] === "Admin" && $_SESSION['identifier_token'] === "rOxrNwMC6TDKXf86QRILJ1R=vUKRTfDsGrJ&CEt1hl3Yv5G9mtbDgEJcFWkxL5An81JJF#Vu5ACK3VyrW&K=JXrzehQDSn=D0XEHY6aE5RKtxe0mvtLLd~JcwJ82Hdzrdjc1b5oT#8=K5XhnyQV1MgFgrIXDhMzQtvO5eB7RWa%4NgJOR0G1yNlwvC4nXkEgCgx9UV3xZP8ShpalLfHejvWzEBD8KbzNxViW%tU5XLpSq~67O7Rh0%NAPcHyrQ3zLdm87ikdi7WCOFr#haw6NwnCosFWEZRNSqX4NMVK554%=C%xUMeIXsQdqMVco2Txfq95=THNdpuvvlR=4pXwQ85Mzycic4C9xK03tJnL5SR=Q8myP2O&Ev6p6pb2xi%KkBXNEVcd#849Iie&EGwvm9%F~Q9JD3BuUMzMW7EHBW3xPgjM1k7MYmdKxe6Haq&ZjlO6gtypuYqT1Wp2HSAigMkWg%t2peTtiSF50XZRB8TGfBPUMWhK" && $_SESSION['gebDatum'] === "9999-09-09") {
					
?>

<div class="container-fluid">
	
	<h1 class="mb-3">Anzeigen bearbeiten/einsehen und löschen</h1>
  
   <p class="text-dark mb-4 d-inline">
   Frisch erstellte Anzeigen werden <p class="d-inline mt-0 mb-0 text-success">Grün</p> markiert!
   <br>
   Frisch bearbeitete Anzeigen werden <p class="d-inline mt-0 mb-0 text-primary">Blau</p> markiert!   
   <br>
   Anzeigen, welche bald gelöscht werden, werden <p class="d-inline mt-0 mb-0 text-danger">Rot</p> markiert!
   </p> 
   
<form action="../anzeigen/bearbeiten" method="POST">

<?php
	
	$abfrage = "SELECT anzeigen.betreff, anzeigen.beschreibung, anzeigen.updated_at, anzeigen.created_at, anzeigen.aNR, orte.PLZ, orte.Bezeichnung FROM anzeigen INNER JOIN orte USING(PLZ) ORDER BY updated_at";
	
	$query = $verb -> query($abfrage);
	$queryNumRows = $query -> fetchAll();
	
	if (count($queryNumRows) <= 0) {
	
		echo "Es gibt zurzeit keine Anzeigen! <button onclick='window.history.back();' type='button' class='btn btn-dark'>Zurück</button>";
		
	} else {
	
	echo "
	
	<div class='form-group'>
		<input type='text' class='form-control' id='searchAD' placeholder='nach Anzeige zum löschen/bearbeiten suchen'>
	</div>
	
	<button class='btn btn-dark mb-3 mr-2' onclick='toggleBearbeitenModusAZ()' id='activateAnzeigenChanges' type='button'>Bearbeitungsmodus</button>
	
	<button class='btn btn-dark mb-3 d-none' id='submitAnzeigenChanges' type='submit'>Änderungen Speichern</button>
	";
	
	setlocale(LC_ALL, 'de_DE.utf8');
				
?>

<table class="table ml-auto mr-auto table-hover mb-0 table-responsive table-striped w-100 d-block d-md-table">
 <caption>Liste aller Anzeigen</caption>
  <thead class="thead-dark">
    <tr>
		<th scope="col">ID</th>
		<th scope="col">Betreff</th>           
		<th scope="col">Beschreibung</th>     
		<th scope="col" class="löschenChanges">Ort</th>
		<th scope="col" class="löschenChanges d-none">
			<input type='text' class='form-control form-control-sm mw-12em' id='searchADOrt' placeholder='Orte filtern'>
		</th>
		<th scope="col">Zuletzt bearbeitet</th>
		<th scope="col" class="löschenChanges d-none">Löschen?</th>
    </tr>                                        
  </thead>                                       
  <tbody id="tbodyAD">
			<?php
						
			$countChanges = 0;
			$countDeletes = 0;
			
			echo "<br>";
			
			if (isset($_POST["delete"])) {
			
				$wert = $_POST["delete"];
				
				$r = 1;
				$u = 0;
				
				for ($i = 0; $i < (count($wert) / 2); $i++) {						
					if ($wert[$r] == 1) {
										
						$sql2 = "DELETE FROM `r_besitzt_a` WHERE aNR = '".$wert[$u]."'";	
						$query2 = $verb -> query($sql2);
						
						$sql1 = "DELETE FROM `anzeigen` WHERE aNR = '".$wert[$u]."'";	
						$query1 = $verb -> query($sql1);				
						
						$countDeletes += $query1 -> rowCount();	
						
					} else {
					
					}
					
					$u += 2;					
					$r = $u + 1;
					
				}				
			}
			
			if (isset($_POST["changeBetreff"])) {
			
				$wert1 = $_POST["changeBetreff"];
				
				$r1 = 1;
				$u1 = 0;
				
				for ($i = 0; $i < (count($wert1) / 2); $i++) {	
										
					$sql3 = "UPDATE `anzeigen` SET `betreff` = '".$wert1[$r1]."' WHERE aNR = '".$wert1[$u1]."'";	
					$query3 = $verb -> query($sql3);				
					
					$countChanges += $query3 -> rowCount();
					
					$u1 += 2;					
					$r1 = $u1 + 1;
					
				}				
			}
			
			if (isset($_POST["changeBeschreibung"])) {
			
				$wert2 = $_POST["changeBeschreibung"];
				
				$r2 = 1;
				$u2 = 0;			
				
				for ($e = 0; $e < (count($wert2) / 2); $e++) {
				
				$sql4 = "UPDATE `anzeigen` SET `beschreibung` = '".$wert2[$r2]."' WHERE aNR = '".$wert1[$u2]."'";	
				$query4 = $verb -> query($sql4);				
				
				$countChanges += $query4 -> rowCount();
				
				$u2 += 2;					
				$r2 = $u2 + 1;				
				
				}
			}

			if (isset($_POST["changeOrt"])) {
				
				$wert3 = $_POST["changeOrt"];
				
				$r3 = 1;
				$u3 = 0;			
				
				for ($f = 0; $f < (count($wert3) / 2); $f++) {
				
				$sql5 = "UPDATE `anzeigen` SET `PLZ` = '".$wert3[$r3]."' WHERE aNR = '".$wert3[$u3]."'";					
				$query5 = $verb -> query($sql5);
				
				$countChanges += $query5 -> rowCount();
				
				$u3 += 2;
				$r3 = $u3 + 1;				
				
				}		
			}
				
				if (isset($_POST["changeBeschreibung"]) or isset($_POST["changeBetreff"]) or isset($_POST["changeOrt"])) {
					if ($countChanges === 1) {
						echo "
						
						<div class='mb-2 mt-2 text-success d-block'>
							<h5>".$countChanges." Anzeige bearbeitet!</h5>
						</div>		
						
						";
					} elseif ($countChanges > 1) {
						
						echo "
						
						<div class='mb-2 mt-2 text-success d-block'>
							<h5>".$countChanges." Anzeigen bearbeitet!</h5>
						</div>	
						
						";			
						
					} else {
					
						echo "
						
						<div class='mb-2 mt-2 text-danger d-block'>
							<h5>".$countChanges." Anzeigen bearbeitet!</h5>
						</div>
						
						";	
						
					}
					
					if ($countDeletes === 1) {
						echo "
						
						<div class='mb-2 mt-2 text-success d-block'>
							<h5>".$countDeletes." Anzeige gelöscht!</h5>
						</div>		
						
						";
					} elseif ($countDeletes > 1) {
						
						echo "
						
						<div class='mb-2 mt-2 text-success d-block'>
							<h5>".$countDeletes." Anzeigen gelöscht!</h5>
						</div>	
						
						";			
						
					} else {
					
						echo "
						
						<div class='mb-2 mt-2 text-danger d-block'>
							<h5>".$countDeletes." Anzeigen gelöscht!</h5>
						</div>
						
						";	
						
					}				
				} else {
				
				}		
				
				$i = 1;
						
				foreach ($verb -> query($abfrage) as $row) {
				
			if ($row["created_at"] > date('Y-m-d h:i:s', strtotime('+12 days'))) {
				echo "<tr ondblclick='toggleBearbeitenModusAZ()' class='table-danger'>";
			} elseif ($row["created_at"] > date('Y-m-d h:i:s', strtotime('-1 hour'))) {
				echo "<tr ondblclick='toggleBearbeitenModusAZ()' class='table-success'>";
			} elseif ($row["updated_at"] > date('Y-m-d h:i:s', strtotime('-1 hour'))) {
				echo "<tr ondblclick='toggleBearbeitenModusAZ()' class='table-primary'>";
			} else {
				echo "<tr ondblclick='toggleBearbeitenModusAZ()'>";
			}	
			
					echo "
					
					<td>
						".$row["aNR"]."
					</td>
					
					<td>
						<div class='changehide'>						
							".$row["betreff"]."						
						</div>
						
						<div class='changeinputshow'>
							<input type='hidden' name='changeBetreff[]' value='".$row["aNR"]."'>
							<input class='form-control form-control-sm mw-12em' value='".$row["betreff"]."' name='changeBetreff[]' type='text' placeholder='".$row["betreff"]."'>	
						</div>
					</td>
					
					<td class='beschreibungTD' id='beschreibungTD".$i."'>
						<div class='changehide'>						
							".$row["beschreibung"]."
						</div>	
						
						<div class='changeinputshow'>
							<input type='hidden' name='changeBeschreibung[]' value='".$row["aNR"]."'>
							<textarea class='form-control form-control-sm mw-12em' name='changeBeschreibung[]' rows='2' placeholder='".$row["beschreibung"]."'>".$row["beschreibung"]."</textarea>						
						</div>
					</td>
					
					<td>
						<div class='changehide'>						
							".$row["Bezeichnung"]."						
						</div>
						
						<div class='changeinputshow'>
							<input type='hidden' name='changeOrt[]' value='".$row["aNR"]."'>
								<select autocomplete class='form-control form-control-sm mw-12em' name='changeOrt[]'>
									<option value='".$row["PLZ"]."' selected class='text-danger'>Unverändert</option>
								
							";
											
								$sql2 = 'SELECT PLZ, Bezeichnung FROM orte ORDER BY Bezeichnung';	
								$query2 = $verb -> query($sql2);
								
								foreach ($query2 as $row2) {
									echo "<option value='".$row2["PLZ"]."'>".$row2["Bezeichnung"]."</option>";
								}		
										
							echo "			
								</select>	
						</div>		
					</td>
		
					<td>
						".date("d.m.Y, H:i", strtotime($row["created_at"]))."
					</td>								
					
					<td class='löschenChanges d-none'>
						<div class='custom-control custom-checkbox'>
							<input type='hidden' name='delete[]' value='".$row["aNR"]."'>
							<input type='hidden' value='0' name='delete[]'><input type='checkbox' onclick='this.previousSibling.value=1-this.previousSibling.value' class='custom-control-input' id='defaultUnchecked".$i."'>
							<label class='custom-control-label text-danger' for='defaultUnchecked".$i."'>Vorsicht!!</label>
						</div>	
					</td>
						
					</tr>
					
					";
					
					$i++;
					
				}				
				
				
				}
			?>	
			</tbody>
		</table>
	</form>
</div>
						<!--<div class='card mb-3'>
						<div class='card-header bg-dark text-white'>
						".$row["betreff"]."
						</div>
					<div class='card-body border-dark'>
					".$row["beschreibung"]."
						<br><br>
						Zuletzt bearbeitet am 
						".date("d.", strtotime($row["updated_at"]))."
						".$monatsnamen[$monat]." 
						".date("Y", strtotime($row["updated_at"])).",  
						".date("H", strtotime($row["updated_at"])).":00 Uhr<br>
					</div>
					</div>-->
</div>
</div>

<?php

	} else {
	
		header("Location: ../startseite");
		
?>
		
	<h4><p class="text-danger text-center">Diese Funktion ist nicht für Sie erreichbar!</p></h4>
		
<?php
	
		}
	}	
	
	require_once 'includes/loeschencheck.php';

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
