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
					
	$fehler = false;
	$vorhanden = false;
	
	$leer_titel = false;
	$html_titel = false;
	$zahlen_titel = false;
	
	$leer_beschreibung = false;
	$html_beschreibung = false;
	$zahlen_beschreibung = false;	
	
	
	$ist_gesetzt = false;
	
	if (isset($_POST["newstitle"]) && isset($_POST["newsdesc"])) {
		
		$ist_gesetzt = true;
		
		$titel = $_POST["newstitle"];
		$beschreibung = $_POST["newsdesc"];
			
		//// Prüfungen
		// Titel
		if (empty($titel)) {
			$leer_titel = true;
			$fehler = true;
		}
		
		if (is_numeric($titel)) {
			$zahlen_titel = true;
			$fehler = true;
		}
		
		if (is_html($titel)) {
			$html_titel = true;
			$fehler = true;		
		}
		
		// Beschreibung
		if (empty($beschreibung)) {
			$leer_beschreibung = true;
			$fehler = true;
		}
		
		if (is_numeric($beschreibung)) {
			$zahlen_beschreibung = true;
			$fehler = true;
		}
		
		if (is_html($beschreibung)) {
			$html_beschreibung = true;
			$fehler = true;		
		}

		
		if ($fehler == false) {
		
			$sql4 = "SELECT * FROM news WHERE titel = '".$titel."' AND beschreibung = '".$beschreibung."'";
			$query4 = $verb -> query($sql4);	
			$countNumRows = count($query4 -> fetchAll());
		
			if ($countNumRows > 0) {
				
				$vorhanden = true;
			
			} else {
			
			$sql3 = "INSERT INTO `news`(`nID`, `titel`, `beschreibung`, `updated_at`, `created_at`) VALUES (null, '".$titel."', '".$beschreibung."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			$query3 = $verb -> query($sql3);
			
			$nID = $verb -> lastInsertId();
			
			if (!file_exists("newsbilder/".$nID."")) {
				mkdir("newsbilder/".$nID."", 0755, true);
			}			
			
			
						
		if (isset($_FILES["files"])) {
		
		$file_existiert = false;
		$upload_erfolgreich = false;
		$erneut_versuchen = false;
		$falsche_groeße_und_typ = false;
		
		$j = 0; 
		
		for ($i = 0; $i < count($_FILES['files']['name']); $i++) { 
		
			$target_path1 = "newsbilder/".$nID."/";
		
			$validextensions = array("jpeg", "jpg", "png");
			$basename = basename($_FILES['files']['name'][$i]);
			$ext = explode('.', $basename);
			$file_extension = end($ext); 
			
			$target_path2 = $target_path1.$basename;
		
				$sql90 = "INSERT INTO `newsbilder`(`bID`, `nID`, `bildpfad`, `created_at`, `updated_at`) VALUES ( null, '".$nID."', '".$target_path1.$_FILES['files']['name'][$i]."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
				
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
				}
		} else {
		
		
		}
	}
		
	?>
	<h1 class="mt-1">Neue News eintragen!</h1>
	
<form action="../news/erstellen" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="titel">Titel</label>
		<input type="text" name="newstitle" class="form-control"></input>
	</div>
	<?php
		
	if ($leer_titel == true) {
		echo "
		
			<p class='ml-1 mt-0 mb-1 text-danger'>
				Bitte ausfüllen!
			</p>
			
		";
	}
	
	if ($html_titel == true) {
		echo "
		
			<p class='ml-1 mt-0 mb-1 text-danger'>
				Bitte keine HTML-Tags benutzen!
			</p>
		
		";			
	}
	
	if ($zahlen_titel == true) {
		echo "
		
			<p class='ml-1 mt-0 mb-1 text-danger'>
				Bitte keine Nummern angeben!
			</p>
		
		";	
	}
	
	?>
	<div class="form-group">
		<label for="beschr">Beschreibung</label>
		<textarea type="text" name="newsdesc" class="form-control" rows="3"></textarea>
	</div>
	<?php
	
	if ($leer_beschreibung == true) {
		echo "
		
			<p class='ml-1 mt-0 mb-1 text-danger'>
				Bitte ausfüllen!
			</p>
			
		";
	}
	
	if ($html_beschreibung == true) {
		echo "
		
			<p class='ml-1 mt-0 mb-1 text-danger'>
				Bitte keine HTML-Tags benutzen!
			</p>
		
		";			
	}
	
	if ($zahlen_beschreibung == true) {
		echo "
		
			<p class='ml-1 mt-0 mb-1 text-danger'>
				Bitte keine Nummern angeben!
			</p>
		
		";	
	}
	
	?>
	
	<div class="custom-file mt-3">
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
	
	if ($fehler == true) {
		echo "
		
			<button type='submit' class='mt-4 btn btn-danger'>Neue News eintragen</button>
		
			<p class='mt-3 mb-0 text-danger'>Bitte überprüfen Sie Ihre Eingaben!</p>
		
		";
	} else {
	
		echo "
		
		<button type='submit' class='mt-4 btn btn-dark'>Neue News eintragen</button>
		
		";
	
		if ($ist_gesetzt == true) {
			if ($vorhanden == true) {
					echo "
								
						<p class='mt-4 mb-0 text-danger'>Die News ist bereits ähnlich veröffentlicht worden!</p>
						
					";	
				} else {
					echo "
								
						<p class='mt-4 mb-0 text-success'>Die News wurde veröffentlicht!</p>
						
						<p class='mt-0 mb-0 text-dark'>Sie können die News auf <a href='../news/".$nID."'>der Newsseite</a> einsehen!</p> 		
					";				
				}
			}
		}
	
	?>
</form>
	
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
