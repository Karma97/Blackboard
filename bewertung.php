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
	
	if (!isset($_SESSION['vorname']) or !isset($_SESSION['iNR']) or !isset($_SESSION['news'])) {
	
	header("Location: ../startseite");
	
?>
	
	<h4><p class="text-danger text-center">Um diese Funktion nutzen zu können, müssen Sie angemeldet sein!</p></h4>
	
	</div>
	</div>	
	
<?php
	
	} else {
	
	if (!isset($_GET["iNR"]) or is_numeric($_GET["iNR"]) or empty($_GET["iNR"])) {

?>
		
		<h2 class="text-danger">Es ist ein fehler aufgetreten!</h2>
		
<?php
	
		header("refresh: 3; url = ../startseite");
	
	} else {	
	
	$crypt_iNR = $_GET["iNR"];
		
	$sql = "SELECT * FROM inserent";
	$query = $verb -> query($sql);
	
	$fehler2 = false;

	foreach ($verb -> query($sql) as $row) {
	
		if ($crypt_iNR == str_replace("/", "", crypt($row["iNR"],'SB'))) {			
			$iNR = $row["iNR"];
			$fehler2 = false;
			break;
		} else {
			$fehler2 = true;
		}
		
	}
	
	if ($fehler2 == true) {
		
?>
		
		<h2 class="text-danger">Es ist ein fehler aufgetreten!</h2>
		
<?php
	
		header("refresh: 4; url = ../startseite");
				
	} else {
	
	if ($_SESSION["iNR"] == $iNR) {
		
?>
		
		<h2 class="text-danger text-center">Sie können keine Bewertung für Sie selbst schreiben!</h2>
		
<?php
	
		header("refresh: 5; url = ../profil/".$crypt_iNR."");		
		
	} else {
		
	$fehler = false;
		
	$empty_betreff = false;
	$no_string_betreff = false;
	$is_html_betreff = false;
	
	$empty_beschreibung = false;
	$no_string_beschreibung = false;
	$is_html_beschreibung = false;
	
	$empty_bewertung = false;
	$zuviel_bewertung = false;
	$no_number_bewertung = false;
	$is_html_bewertung = false;
	
	if (!isset($_POST["betreff"]) or !isset($_POST["beschreibung"]) or !isset($_POST["bewertung"])) {
		$post_gesetzt = false;
	} else {
	
	$post_gesetzt = true;
	
	$betreff = $_POST["betreff"];	
	$beschreibung = $_POST["beschreibung"];
	$bewertung = $_POST["bewertung"];
		
	// Betreff
	if (empty($betreff)) {
		$empty_betreff = true;
		$fehler = true;
	}

	if (is_numeric($betreff)) {
		$no_string_betreff = true;
		$fehler = true;
	}
	
	if (is_html($betreff)) {
		$is_html_betreff = true;
		$fehler = true;
	}
	
	// Beschreibung
	if (empty($beschreibung)) {
		$empty_beschreibung = true;
		$fehler = true;
	}
	
	if (is_numeric($beschreibung)) {
		$no_string_beschreibung = true;
		$fehler = true;		
	}	
	
	if (is_html($beschreibung)) {
		$is_html_beschreibung = true;
		$fehler = true;
	}
	
	// Bewertung	
	if ($bewertung == 0) {
		$empty_bewertung = true;
		$fehler = true;
	}
	
	if ($bewertung > 5) {
		$zuviel_bewertung = true;
		$fehler = true;
	}
	
	if (!is_numeric($bewertung)) {
		$no_number_bewertung = true;
		$fehler = true;
	}
	
	if (is_html($bewertung)) {
		$is_html_bewertung = true;
		$fehler = true;
	}
		
	}
	
?>

	 <h2 class="mt-1">
		Jetzt eine Bewertung zu 
		
		<?php
		
		$sql1 = "SELECT * FROM inserent WHERE iNR = '".$iNR."'";	
		
		foreach ($verb -> query($sql1) as $row) {
			echo "".$row["vorname"]." ".$row["nachname"]."";
		}
		
		?>
		
		schreiben!

	</h2>


	<p class="text-dark mt-3 mb-0">Ihe Bewertung wird auf dem Profilbild desjenigen sichtbar sein.</p>
	<p class="text-dark mt-0 mb-4">Sie können Ihre Bewertungen auf <a class="href" href="../myaccount">Ihrem Account</a> löschen.</p>

	<form action="../bewerten/<?php echo $crypt_iNR; ?>" id="kontaktForm" class="mt-0" method="POST">
		<div class="form-group">
			<label for="betreff">Betreff der Bewertung</label>
			<input type="text" name="betreff" class="form-control" id="betreff" placeholder="">
			<?php
			
			if ($empty_betreff == true) {
				echo "
				
				<p class='ml-1 mt-1 mb-0 text-danger'>
					Bitte ausfüllen!
				</p>
				
				";
			}
			
			if ($no_string_betreff == true) {
				echo "
				
				<p class='ml-1 mt-1 mb-0 text-danger'>
					Bitte keine Nummern angeben!
				</p>
				
				";			
			}	
			
			if ($is_html_betreff == true) {
				echo "
				
				<p class='ml-1 mt-1 mb-0 text-danger'>
					Bitte keine HTML-Tags benutzen!
				</p>
				
				";
			}
			
			?>
		</div>
		<div class="form-group">
			<label for="beschreibung">Beschreibung (Wieso, Weshalb, Warum usw.)</label>
			<textarea name="beschreibung" class="form-control" id="beschreibung" rows="3"></textarea>
			<?php
			
			if ($empty_beschreibung == true) {
				echo "
				
				<p class='ml-1 mt-1 mb-0 text-danger'>
					Bitte ausfüllen!
				</p>
				
				";
			}
			
			if ($no_string_beschreibung == true) {
				echo "
				
				<p class='ml-1 mt-1 mb-0 text-danger'>
					Bitte keine Nummern angeben!
				</p>
				
				";			
			}	
			
			if ($is_html_beschreibung == true) {
				echo "
				
				<p class='ml-1 mt-1 mb-0 text-danger'>
					Bitte keine HTML-Tags benutzen!
				</p>
				
				";
			}
			
			?>
		</div>
		<div class="form-group">
		<label>Bewertung </label>
			<i style="color: black;" id="bewertung1" title="1 Sterne" onclick="bewertungSterne(1)" class="pointer ml-3 fa fa-star"></i>
			<i style="color: black;" id="bewertung2" title="2 Sterne" onclick="bewertungSterne(2)" class="pointer fa fa-star"></i>
			<i style="color: black;" id="bewertung3" title="3 Sterne" onclick="bewertungSterne(3)" class="pointer fa fa-star"></i>
			<i style="color: black;" id="bewertung4" title="4 Sterne" onclick="bewertungSterne(4)" class="pointer fa fa-star"></i>
			<i style="color: black;" id="bewertung5" title="5 Sterne" onclick="bewertungSterne(5)" class="pointer fa fa-star"></i>
			<input type="hidden" value="0" name="bewertung" class="form-control" id="bewertung">		
			<?php	
				
			if ($empty_bewertung == true) {
				echo "
				
				<p class='ml-1 mt-0 mb-0 text-danger'>
					Bitte mindestens ein Stern auswählen!
				</p>
				
				";
			}
			
			if ($zuviel_bewertung == true) {
				echo "
				
				<p class='ml-1 mt-0 mb-0 text-danger'>
					Sie können nicht mehr als 5 Sterne geben! Versuchen Sie es bitte erneut.
				</p>
				
				";			
			}	
			
			if ($no_number_bewertung == true) {
				echo "
				
				<p class='ml-1 mt-0 mb-0 text-danger'>
					Es wurde aus unbekannten gründen keine Zahl übergeben! Versuchen Sie es bitte erneut.
				</p>
				
				";
			}
			
			if ($is_html_bewertung == true) {
				echo "
				
				<p class='ml-1 mt-0 mb-0 text-danger'>
					Es wurden aus unbekannten gründen HTML-Tags übergeben! Versuchen Sie es bitte erneut.
				</p>
				
				";
			}
			
			?>
		</div>
		
		<?php
		
		if ($fehler == true) {
			
			echo "
			
			<button class='btn btn-danger' id='submitKontakt' type='submit'>Bewertung erneut Absenden</button>
			
			<p class='mt-3 mb-0 text-danger'>Bitte überprüfen Sie Ihre Eingaben!</p>			
			
			";
			
		} else {
		
			echo "
			
			<button class='btn btn-dark' id='submitKontakt' type='submit'>Bewertung Absenden</button>
			
			";
		
			if ($post_gesetzt == true) {
						
			$sql2 = "SELECT * FROM bewertungen WHERE ist_für = '".$iNR."' AND betreff = '".$betreff."' AND beschreibung = '".$beschreibung."'";
			$query2 = $verb -> query($sql2);
			$countNumRows = $query2 -> fetchAll();
			
			if (count($countNumRows) > 0) {
				
				echo "
				
				<p class='mt-4 mb-0 text-danger'>Es gibt bereits eine Bewertung mit dieser Beschreibung und diesem Betreff!</p>
				<p class='mt-0 mb-0 text-danger'>Bitte schreiben Sie Ihre Bewertung um.</p>
				
				";
				
			} else {
			
			$sql3 = "INSERT INTO `bewertungen`(`bNR`, `ist_für`, `kommt_von`, `betreff`, `beschreibung`, `bewertung`, `created_at`, `updated_at`) VALUES ( null, '".$iNR."', '".$_SESSION["iNR"]."', '".$betreff."', '".$beschreibung."', '".$bewertung."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			
			$query3 = $verb -> query($sql3);
			
			echo "
						
				<p class='mt-4 mb-0 text-success'>Ihre Bewertung wurde veröffentlicht!</p>
				
				<p class='mt-0 mb-0 text-dark'>Sie können Ihre Bewertung auf <a href='../myaccount'>Ihrem Account</a>, oder direkt auf dem <a href='../profil/".$crypt_iNR."'>Profil 
				
				von ";
			
				foreach ($verb -> query($sql1) as $row) {
					echo "".$row["vorname"]." ".$row["nachname"]."</a>";
				}			
				
			echo "				
			einsehen.</p>
			";
			}
			}
		}
		
		?>	
	
		
	
	</form>
	
  </div>
  </div>
 
<?php 
					}
				}
			}
		}
	
		require_once 'includes/loeschencheck.php';
		
		include 'includes/footer.php';	
		include 'includes/scripts.php';		
		
		ob_end_flush();
		
?>
  
</body>
</html>
