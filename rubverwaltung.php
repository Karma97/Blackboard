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
  <div class="container-fluid mt-3">
	<?php
		if (!isset($_SESSION['vorname']) or !isset($_SESSION['iNR']) or !isset($_SESSION['news'])) {
		?>
		
		<h4><p class="text-danger text-center">Um diese Funktion nutzen zu können, müssen Sie angemeldet sein!</p></h4>
		
		<?php
		
		} else {
			if ($_SESSION['vorname'] === "S_B" && $_SESSION['nachname'] === "Admin" && $_SESSION['identifier_token'] === "rOxrNwMC6TDKXf86QRILJ1R=vUKRTfDsGrJ&CEt1hl3Yv5G9mtbDgEJcFWkxL5An81JJF#Vu5ACK3VyrW&K=JXrzehQDSn=D0XEHY6aE5RKtxe0mvtLLd~JcwJ82Hdzrdjc1b5oT#8=K5XhnyQV1MgFgrIXDhMzQtvO5eB7RWa%4NgJOR0G1yNlwvC4nXkEgCgx9UV3xZP8ShpalLfHejvWzEBD8KbzNxViW%tU5XLpSq~67O7Rh0%NAPcHyrQ3zLdm87ikdi7WCOFr#haw6NwnCosFWEZRNSqX4NMVK554%=C%xUMeIXsQdqMVco2Txfq95=THNdpuvvlR=4pXwQ85Mzycic4C9xK03tJnL5SR=Q8myP2O&Ev6p6pb2xi%KkBXNEVcd#849Iie&EGwvm9%F~Q9JD3BuUMzMW7EHBW3xPgjM1k7MYmdKxe6Haq&ZjlO6gtypuYqT1Wp2HSAigMkWg%t2peTtiSF50XZRB8TGfBPUMWhK" && $_SESSION['gebDatum'] === "9999-09-09") {
				
	?>
	
  <h1 class="mb-3">Rubriken einsehen/bearbeiten und löschen</h1>
  
   <p class="text-dark mb-4 d-inline">
   Frisch erstellte Rubriken werden <p class="d-inline mt-0 mb-0 text-success">Grün</p> markiert!
   <br>
   Frisch bearbeitete Rubriken werden <p class="d-inline mt-0 mb-0 text-primary">Blau</p> markiert!
   </p> 
 
  <form action="../rubriken/bearbeiten" method="POST">
	<div class="form-group">
		<label for="bezeichnung">Rubrikbezeichnung</label>
		<input autofocus type="text" class="form-control" name="bez" required id="bezeichnung" placeholder="z.B: Videospiele">
	</div>
	<div class="form-group">
		<label for="textarea">Rubrikbeschreibung</label>
		<textarea name="besch" class="form-control" required id="textarea" rows="3"></textarea>
	</div>
	<div class="form-group">
		<label for="icon">Font-Awesome Icon-Klasse</label>
		<input type="text" class="form-control" name="icon" required id="icon" placeholder="z.B.: fas fa-tv">
	</div>
		<button type="submit" class="btn btn-dark mb-4">Abspeichern</button>
	</form>
	
	<?php
	

	
	if (!isset($_POST["bez"]) or empty($_POST["bez"])) {
		
	} else {
	
	$bez = $_POST["bez"];
	$besch = $_POST["besch"];
	$icon = $_POST["icon"];
	
		$sql1 = "SELECT * FROM rubriken WHERE bezeichnung = '$bez' OR icon = '$icon'";	
		$query1 = $verb -> query($sql1);
		$queryNumbers = $query1 -> fetchAll();
	
	if (count($queryNumbers) > 0) {
		echo "
		
			<div class='mt-4 container-fluid text-danger'>
				<p class='font-weight-bold'>Rubrik ist bereits vorhanden!</p>
			</div>
			
			";
	} else {
		
	$sql2 = "INSERT INTO `rubriken` (`rNR`, `bezeichnung`, `beschreibung`, `icon`, `updated_at`, `created_at`) VALUES (NULL, '$bez', '$besch', '$icon', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";	
	
	$query2 = $verb -> query($sql2);

	echo "
	
		<div class='mt-1 mb-2 container-fluid text-success'>
			<p class='font-weight-bold'>Die Rubrik wurde erfolgreich eingetragen und als Grün markiert!</p>
		</div>
		
		";	
		}
	}
	
	?>
	<div class="container-fluid">
	
	<div class="form-group mt-2">
		<input type="text" class="form-control" name="searchR" id="searchR" placeholder="Rubrik suchen">
	</div>
	<div class="wrapper">
<form action="../rubriken/bearbeiten" method="POST">
<table class="table ml-auto mr-auto table-hover mb-0 table-responsive table-striped w-100 d-block d-md-table">
 <caption>Liste aller aktuellen Rubriken</caption>
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Bezeichnung</th>           
      <th scope="col">Beschreibung</th>     
	  <th scope="col">Zuletzt bearbeitet</th>  
	  <th scope="col">Icon</th>                  
	  <th scope="col">Icon-Klasse</th>           
    </tr>                                        
  </thead>                                       
  <tbody id="tbodyR">
		<?php
			
			$countChanges = 0;
					
			if (isset($_POST["changeBezeichnung"])) {
			
				$wert1 = $_POST["changeBezeichnung"];
				
				$r = 1;
				$u = 0;
				
				foreach ($verb -> query("SELECT * FROM rubriken")  as $row) {	
					
					if ($row["bezeichnung"] === $wert1[$r]) {
					
					} else {
					
						$sql4 = "UPDATE `rubriken` SET `bezeichnung` = '".$wert1[$r]."' WHERE rNR = '".$wert1[$u]."'";	
						$query4 = $verb -> query($sql4);				
						
						$countChanges += $query4 -> rowCount();
						
					}
					
					$u += 2;					
					$r = $u + 1;
					
				}				
			}
				
			if (isset($_POST["changeBeschreibung"])) {
			
				$wert2 = $_POST["changeBeschreibung"];
							
				$r2 = 1;
				$u2 = 0;
				$zahl = 0;
				
				foreach ($verb -> query("SELECT * FROM rubriken") as $row) {	
				
					if ($row["beschreibung"] === $wert2[$r2]) {
						
					} else {
					

					
						$sql4 = "UPDATE `rubriken` SET `beschreibung` = '".$wert2[$r2]."' WHERE rNR = '".$wert2[$u2]."'";	
						$query4 = $verb -> query($sql4);				
						
						$countChanges += $query4 -> rowCount();
						
					}
										
					$zahl++;
					$u2 += 2;					
					$r2 = $u2 + 1;
					
				}	
			}
					
			if (isset($_POST["changeIcon"])) {
			
				$wert1 = $_POST["changeIcon"];
				
				$r = 1;
				$u = 0;
				
				foreach ($verb -> query("SELECT * FROM rubriken") as $row) {	
				
					if ($row["icon"] === $wert1[$r]) {
					
					} else {
					
						$sql4 = "UPDATE `rubriken` SET `icon` = '".$wert1[$r]."' WHERE rNR = '".$wert1[$u]."'";	
						$query4 = $verb -> query($sql4);				
						
						$countChanges += $query4 -> rowCount();
						
					}
					
					$u += 2;					
					$r = $u + 1;
					
				}	
			}
						
			$sql3 = "SELECT * FROM rubriken";	
			$query3 = $verb -> query($sql);
				
			setlocale(LC_ALL, 'de_DE.utf8');
				
			$zahlplus = 1;
				
			foreach ($query3 as $row) {
			
			$countInsgesamt = $zahlplus;
			
			if ($row["created_at"] > date('Y-m-d h:i:s', strtotime('-1 hour'))) {
				echo "<tr ondblclick='toggleBearbeitenModus()' class='table-success'>";
			} elseif ($row["updated_at"] > date('Y-m-d h:i:s', strtotime('-1 hour'))) {
				echo "<tr ondblclick='toggleBearbeitenModus()' class='table-primary'>";
			} else {
				echo "<tr ondblclick='toggleBearbeitenModus()'>";
			}
				echo "
					<td scope='row'><strong>".$row["rNR"]."</strong></td>
					<td>
					
					<div class='changeinputshow'>						
						<input type='hidden' name='changeBezeichnung[]' value='".$row["rNR"]."'>
						<input class='form-control form-control-sm' value='".$row["bezeichnung"]."' name='changeBezeichnung[]' type='text' placeholder='".$row["bezeichnung"]."'>						
					</div>
					
					<div class='changehide'>
						".$row["bezeichnung"]."
					</div>
					
					</td>
					<td>
					
					<div class='changeinputshow'>					
						<input type='hidden' name='changeBeschreibung[]' value='".$row["rNR"]."'>
						<textarea class='form-control form-control-sm' name='changeBeschreibung[]' rows='1' placeholder='".$row["beschreibung"]."'>".$row["beschreibung"]."</textarea>
					</div>			
					
					<div class='changehide'>
						".$row["beschreibung"]."
					</div>
					
					</td>
					<td>".date("d.n.Y, H:i", strtotime($row["updated_at"]))."</td>
					<td class='faa-parent animated-hover'><i class='faa-slow faa-horizontal ".$row["icon"]."'></i></td>
					<td>
					
					<div class='changeinputshow'>
						<input type='hidden' name='changeIcon[]' value='".$row["rNR"]."'>
						<input class='form-control form-control-sm' name='changeIcon[]' type='text' value='".$row["icon"]."' placeholder='".$row["icon"]."'>
					</div>
					<div class='changehide'>
						".$row["icon"]."
					</div>					
					
					
					</td>
				</tr>";
				
				$zahlplus++;
				
			}
		
		?>
		
	
	

</tbody>
</table>
<?php
	
	if (isset($_POST["changeBeschreibung"]) or isset($_POST["changeIcon"]) or isset($_POST["changeBezeichnung"])) {
		if ($countChanges > 0) {
			echo "
			
			<div class='mb-4 mt-1 text-success d-block'>
				<h5>".$countChanges." Datensätze bearbeitet!</h5>
			</div>			
			
			";
		} else {
			
			echo "
			
			<div class='mb-4 mt-1 text-danger d-block'>
				<h5>".$countChanges." Datensätze bearbeitet!</h5>
			</div>
			
			";			
			
		}
	
	} else {
	
	}
	
	?>

	<button class="btn btn-dark mb-3" onclick="toggleBearbeitenModus()" id="activateRubrikChanges" type="button">Bearbeitungsmodus</button>

	<button class="btn btn-dark mb-3 d-none" id="submitRubrikChanges" type="submit">Änderungen Speichern</button>

</form>
</div>
</div>
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
		
		include 'includes/footer.php';	
		include 'includes/scripts.php';	
		
		ob_end_flush();
	?>

</body>

</html>