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
 <div class="container-fluid mt-3">
 		<?php
			if (!isset($_SESSION['vorname']) or !isset($_SESSION['iNR']) or !isset($_SESSION['news'])) {
			header("Location: ../startseite");
			?>
			
			<h4><p class="text-danger text-center">Um diese Funktion nutzen zu können, müssen Sie angemeldet sein!</p></h4>
			
			<?php
			
			} else {
				
		?>
  <h1 class="mt-1">Anzeige aufgeben</h1>
  
  <p class="text-dark mt-0 mb-0">Wenn Sie eine Anzeige aufgeben, wird diese Veröffentlicht und ist für jeden auf dem Schwarzen Brett sichtbar.</p>
  <p class="text-dark mt-0 mb-0">Bedenken Sie daher persönliche Angaben. Kontaktdaten wie Telefonnummern oder E-Mails sind allerdings nützlich.</p>
  <p class="text-dark mt-0 mb-0">Wenn Sie eingeloggt sind, dann können Sie Ihre Anzeigen unter Ihrem Profil löschen oder bearbeiten.</p>
  <p class="mt-2 mb-4 text-danger">Ihre Anzeige wird nach 2 Wochen automatisch gelöscht!</p>
  
  <form action="../anzeigen/erstellen" id="anzeigenForm" enctype="multipart/form-data" class="mt-0" method="POST">
	<div class="form-group">
		<label for="titel">Betreff der Anzeige</label>
		<input autofocus type="text" class="form-control" name="titel" required id="titel" placeholder="">
	</div>
	<div class="form-group">
		<label for="beschreibung">Anzeigenbeschreibung</label>
		<textarea name="besch" class="form-control" required id="beschreibung" rows="3"></textarea>
	</div>
	<div class="form-group">
   <div class="form-row">
    <div class="col-md-2 mb-3">
		<label for="search">Ort Filtern</label>
		<input type="text" class="form-control" id="search" placeholder="Ort Filtern">
	</div>
	<div class="col-md-10 mb-3">
	<label for="selectOrt">Ort auswählen</label>
    <select autocomplete class="form-control" name="ort" required id="selectOrt">
	<option value="" selected>Ort auswählen</option>
				<?php
				
				$sql = 'SELECT ortID, Bezeichnung FROM orte ORDER BY Bezeichnung';	
				$query = $verb -> query($sql);
				
				foreach ($query as $row) {
					echo "<option value='".$row["ortID"]."'>".$row["Bezeichnung"]."</option>";
				}		
				
			?>
    </select>
	</div>
	</div>
	<div class="form-group">
		<label for="rubriken">Rubriken wählen (minimal 1, maximal 3)</label><br>
	
<?php
		
		$sql1 = "SELECT * FROM rubriken ORDER BY bezeichnung";
		$query1 = $verb -> query($sql1);
		
		$i = 1;
		
		echo "<div class='rubrikenContainer mb-2'>";
		
		foreach ($query1 as $row) {
			echo "
			
				<div class='rubrikenRow' title='".$row["bezeichnung"]."'>				
				<div class='custom-control custom-checkbox'>
					<input value='".$row["rNR"]."' type='checkbox' name='rubriken[]' class='custom-control-input rubriken' id='defaultUnchecked".$i."'>
					<label class='custom-control-label' for='defaultUnchecked".$i."'>".$row["bezeichnung"]." &nbsp;<i class='".$row["icon"]."'></i></label>
				</div>	
				</div>
				
				";
				
				$i++;
				
				}
		
		echo "</div>";
		
		?>
	</div>
	<div id="checkboxError" class="mb-2 text-danger">
		<?php  
			
		$rubrikenzuviel = false;
			
		if (isset($_POST["rubriken"])) {
			$rubrikenc = $_POST["rubriken"];
			if (count($rubrikenc) > 3) {
				?>
				
				Zu viele Rubriken ausgewählt!
				
				<?php
			$rubrikenzuviel = true;
			}
		}
			
		?>
	</div>
	<div class="custom-file">
	<div class="form-group">
		<input type="file" name="files[]" class="custom-file-input" multiple id="files">
		<label class="custom-file-label" for="files"><p id="labelimage">Bilder hochladen</p></label>
  </div>
  </div>
	
	<div id="imagepreview" class="d-none">
		<div id="imagepreview_images">
		
		</div>
	</div>
  
  <?php
  
    if (!isset($_POST["besch"]) or !isset($_POST["titel"]) or !isset($_POST["ort"]) or !isset($_POST["rubriken"])) {
		
	} else {
	if ($rubrikenzuviel == false) {
		$beschreibung = $_POST["besch"];
		$titel = $_POST["titel"];
		$ort = $_POST["ort"];
		$iNR = $_SESSION["iNR"];
		
		/*
		var_dump($ort);
		var_dump($titel);
		var_dump($beschreibung);
		var_dump($iNR);
		*/
		
		$rubriken = $_POST["rubriken"];	
		$countR = count($rubriken);
		
		if ($countR > 3) {
		
		} else {
		
		$z = 1;
		$u = 0;
		
		foreach ($rubriken as $row) {
		
			$rubrik = "rubrik".$z."";
			$$rubrik = $rubriken[$u];	
			
			$z++;
			$u++;
			
		}
		
		$sql2 = "SELECT * FROM anzeigen WHERE beschreibung = \"".$beschreibung."\" AND betreff = \"".$titel."\" AND ortID = \"".$ort."\"";
		$query2 = $verb -> query($sql2);
		$queryNumbers = $query2 -> fetchAll();
						
		foreach ($verb -> query($sql2) as $row) {
			$aNR = $row["aNR"];
		}		
		
		if (count($queryNumbers) > 0 ) {
			$vorhanden = "vorhanden";
		} else {
		
		$sql1 = "INSERT INTO `anzeigen` (`aNR`, `iNR`, `betreff`, `beschreibung`, `ortID`, `updated_at`, `created_at`) VALUES (null, \"".$iNR."\", \"".$titel."\", \"".$beschreibung."\", \"".$ort."\", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)"; 
		$query = $verb -> query($sql1);
								
			$aNR = $verb -> lastInsertId();
	
			for ($i = 1; $i <= $countR; $i++) {
				$rubrik = "rubrik".$i."";
				$sql3 = "INSERT INTO `r_besitzt_a`(`rNR`, `aNR`, `updated_at`, `created_at`) VALUES ('".$$rubrik."', '".$aNR."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
				$query3 = $verb -> query($sql3);
			}
		
		if (isset($_FILES["files"])) {
						
		$file_existiert = false;
		$upload_erfolgreich = false;
		$erneut_versuchen = false;
		$falsche_groeße_und_typ = false;
		
		$j = 0; 
		
		for ($i = 0; $i < count($_FILES['files']['name']); $i++) { 
		
			if (!file_exists("anzeigenbilder/".$aNR."")) {
				mkdir("anzeigenbilder/".$aNR."", 0755, true);
			}
			
			$target_path1 = "anzeigenbilder/".$aNR."/"; 
		
			$validextensions = array("jpeg", "jpg", "png");
			$basename = basename($_FILES['files']['name'][$i]);
			$ext = explode('.', $basename);
			$file_extension = end($ext); 
			
			$target_path2 = $target_path1.$basename;
		
				$sql90 = "INSERT INTO `anzeigenbilder`(`bID`, `aNR`, `bildpfad`, `created_at`, `updated_at`) VALUES ( null, '".$aNR."', '".$target_path2."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

				$query90 = $verb -> query($sql90);

			$j++;

			if (($_FILES["files"]["size"][$i] < (count($_FILES['files']['name']) * (1048576 * 10))) 
				&& in_array($file_extension, $validextensions)) {
			
				if (file_exists($target_path2)) {
					
					$file_existiert = true;
					
				} else {
					
					if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_path2)) {
						
						$upload_erfolgreich = true;
						
					} else {
					
						$erneut_versuchen = true;
						
					}
					
				}	
		
			} else {
				
					$falsche_groeße_und_typ = true;

					}
				}		
			}
		
		
		$sql5 = "SELECT * FROM anzeigen WHERE inR = '".$_SESSION["iNR"]."'"; 
		$query5 = $verb -> query($sql5);	
		$countNumRows2 = $query5 -> fetchAll();		
		$countNumRows2total = count($countNumRows2);
		
		setcookie("anzahl_aktuelle_anzeigen", $countNumRows2total, time() + ( 365 * 24 * 60 * 60), "/");

		$fertig = "fertig";
		
		}
		}
	}
	}
  
  ?>
  
    <button class="btn btn-dark mt-3" id="submitAnzeige" type="submit">Anzeige aufgeben</button>
	
  </form>
  </div>
  
  <?php
  
  if (!isset($fertig) or !isset($aNR)) {
  
  } else {
  
	echo "
	
	<div class='text-success mt-4 mb-2'>
		<h5>Anzeige aufgegeben! <a href='../anzeigen/anzeige-".$aNR."'>Jetzt einsehen</a></h5>
	</div>
	
	";
	
  };

  
  if (!isset($vorhanden)) {
	  
  } else {

	echo "
	
	<div class='text-danger mt-4 mb-2'>
		<h5>Die Anzeige ist bereits vorhanden! <a href='../anzeigen/anzeige-".$aNR."'>Jetzt einsehen</a></h5>
	</div>
	
	";
	
  };
  
  
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