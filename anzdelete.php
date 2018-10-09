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
	
<form action="../anzeigen/bearbeiten" method="POST">
	
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
						
				$i = 1;
						
				foreach ($verb -> query($abfrage) as $row) {
				
					echo "
					<tr ondblclick='toggleBearbeitenModusAZ()'>						
					
					<td>
						".$row["aNR"]."
					</td>
					
					<td>
						<div class='changehide'>						
							".$row["betreff"]."						
						</div>
						
						<div class='changeinputshow'>
							<input class='form-control form-control-sm mw-12em' value='".$row["betreff"]."' name='changeBetreff[]' type='text' placeholder='".$row["betreff"]."'>	
						</div>
					</td>
					
					<td>
						<div class='changehide'>						
							".$row["beschreibung"]."
						</div>	
						
						<div class='changeinputshow'>
							<textarea class='form-control form-control-sm mw-12em' name='changeBeschreibung[]' rows='1' placeholder='".$row["beschreibung"]."'>".$row["beschreibung"]."</textarea>						
						</div>
					</td>
					
					<td>
						<div class='changehide'>						
							".$row["Bezeichnung"]."						
						</div>
						
						<div class='changeinputshow'>
								<select autocomplete class='form-control form-control-sm mw-12em' name='changeOrt[]' id='selectOrt'>
									<option value='' selected class='text-danger'>Unverändert</option>
								
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
						".date("d.m.Y, H:i", strtotime($row["updated_at"]))."
					</td>								
					
					<td class='löschenChanges d-none'>
						<div class='custom-control custom-checkbox'>
							<input type='checkbox' name='deleteAnzeige[]' class='custom-control-input' id='defaultUnchecked".$i."'>
							<label class='custom-control-label text-danger' for='defaultUnchecked".$i."'>Vorsicht!!</label>
						</div>	
					</td>
						
					</tr>
					
					";
					
					$i++;
					
				}				
				
				$verb = null;
				
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
