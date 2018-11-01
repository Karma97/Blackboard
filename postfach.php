<?php 
	
	ob_start();
	session_start();
	
	setlocale(LC_ALL, 'de_DE.utf8');
	
	$head_variante =   1;
	$nav_variante =    1;
	$script_variante = 1;
	$footer_variante = 1;
	
	include 'includes/head.php'; 
	
?>

<body>
	
<?php 
	
	include 'includes/pacman.php';
	require_once 'includes/connect.php';	
	require 'includes/cookiecheck.php';
	
	//print_r($_POST);
	
	$nicht_weiter = false;
	
	if (isset($_POST["alle_gelesen"])) {
		
		$sql = "UPDATE nachrichten SET gelesen = '1' WHERE gelesen = '0' AND ist_für = '".$_SESSION["iNR"]."'";
		$query = $verb -> query($sql);
		
		$nicht_weiter = true;
	}
	
	if (isset($_POST["alle_löschen"])) {
	
		$sql = "UPDATE nachrichten SET gelöscht = '1' WHERE gelöscht = '0' AND ist_für = '".$_SESSION["iNR"]."'";
		$query = $verb -> query($sql);
		
		$nicht_weiter = true;
	}
	
	if (!isset($_POST["nachricht"]) && (!isset($_POST["gelöscht"]) || !isset($_POST["gelesen"]))) {
	
		//echo "nicht gesetzt";
		
	} else {
		if ($nicht_weiter == true) {
			//echo "nicht weiter";
		} else {
		
		//echo "gesetzt<br>";
		
		$fehler = false;
		$nachricht = $_POST["nachricht"];
		
		if (count($nachricht) > 1) {
			$fehler = true;
		}
		
		$sql = "SELECT MAX(naID) FROM nachrichten";
		$query = $verb -> query($sql);
		$numbermaxid = $query -> fetch();
				
		foreach ($nachricht as $key => $row) {
			if (!is_numeric($nachricht[$key])) {
				$fehler = true;
			}
			if ($nachricht[$key] > $numbermaxid[0]) {
				$fehler = true;
			}
		}
		
		if (isset($_POST["gelöscht"])) {
			$aktion = $_POST["gelöscht"];
		} elseif (isset($_POST["gelesen"]))  {
			$aktion = $_POST["gelesen"];
		} else {
			$fehler = true;
		}
		
		//echo $aktion."<br>";
		//print_r($nachricht);
		
		if ($fehler == true) {
		
		} else {
		
			if ($aktion == "gelöscht") {
				
				$sql2 = "UPDATE nachrichten SET gelöscht = '1' WHERE naID = '".$nachricht[0]."'";
				$query2 = $verb -> query($sql2);
				
			} elseif ($aktion == "gelesen") {
			
				$sql2 = "UPDATE nachrichten SET gelesen = '1' WHERE naID = '".$nachricht[0]."'";
				$query2 = $verb -> query($sql2);
			
			} else {
			
			
				}
			}
		}
	}
	
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
	
?>
  <?php
  
	$sql = "SELECT * FROM nachrichten WHERE ist_für = '".$_SESSION["iNR"]."' AND gelesen = '0' AND gelöscht = '0'";
	$query = $verb -> query($sql);
	$countNumRows = count($query -> fetchAll());
	
	if ($countNumRows < 1) {
		echo "
		<div class='card mb-0'>
			<div class='card-header text-white bg-dark'>
				<i class='far fa-envelope'></i>&nbsp; Keine neuen Nachrichten vorhanden!
			</div>
		</div>
		";
	} else {
		echo "
	<div class='card mb-0'>
			<div class='card-header text-white bg-dark' data-toggle='collapse' data-target='#collapse_neue' aria-expanded='true' aria-controls='collapse_neue' onclick=\"collapseItem('#collapse_neue', '#collapse_icon_neue')\">
				<div class='icon_collapse_container'>
					<i style='transition: 0.4s;' id='collapse_icon_neue' class='fa-lg icon_in_container far fa-arrow-alt-circle-up'></i>
				</div>
				<div class='after_icon_content'>
				<div class='beforeformtodrop'>
				";
				
				if ($countNumRows == 1) {
					echo "<i class='far fa-envelope-open'></i>&nbsp; Sie haben 1 neue Nachricht!";
				} else {
					echo "<i class='far fa-envelope-open'></i>&nbsp; Sie haben ".$countNumRows." neue Nachrichten!";
				}
				
				echo "
				</div>
				
				<form class='float-right formtodrop w-auto d-inline mt-0 mb-0' action='./postfach' method='POST'>
					<button value='gelesen' title='Alle Nachrichten als gelesen markieren' class='btn btn-sm btn-light rounded-circle' name='alle_gelesen' type='submit'><i class='pointer fas fa-check-double'></i></button>
				</form>
				</div>
			</div>
		";
	}
			
		if ($countNumRows < 1) {
			
		} else {
			echo "
		<div id='collapse_neue' class='collapse show'>
		<div class='card-body'>";
		}
		
		if ($countNumRows > 0) {
					
		$monatsnamen = array(1=>"Januar",2=>"Februar",3=>"März",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
		
		foreach ($verb -> query($sql) as $row) {
		
		$monat = date("n", strtotime($row["created_at"]));
		
			echo "
		<form action='./postfach' method='POST'>
			<div class='card mb-3'>
				<div class='card-header text-white bg-dark'>
					".$row["betreff"]."
					
					<p class='float-right mt-0 mb-0'>
						<button value='gelesen' title='Nachricht als gelesen markieren' class='btn btn-sm btn-light rounded-circle' name='gelesen' type='submit'><i class='pointer fas fa-check'></i></button>
					</p>
					
				</div>
				<div class='card-body'>
					".$row["beschreibung"]."
				</div>
				<div class='card-footer'>
					";
					
					$sql2 = "SELECT * FROM inserent WHERE iNR = '".$row["kommt_von"]."'";
					$query2 = $verb -> query($sql2);
					
					foreach ($query2 as $row2) {
						
						$crypt_iNR = str_replace("/", "", crypt($row2["iNR"],'SB'));
						
						echo "Gesendet von: <a href='./profil/".$crypt_iNR."' class='nohref' title='Jetzt klicken um zum Profil von \"".$row2["vorname"]." ".$row2["nachname"]."\" zu gelangen!'>&nbsp;".$row2["vorname"]." ".$row2["nachname"]."&nbsp;";
						
						if ($row2["profilbildpfad"] != null && file_exists("profilbilder/".$row2["iNR"]."/".$row2["profilbildpfad"]."")) {
							echo "
							
							<img src='profilbilder/".$row2["iNR"]."/".$row2["profilbildpfad"]."' width='25' height='25' class='d-inline-block rounded-circle'>
							
							";
						} else {
							echo "
							
							<img src='images/user.png' class='rounded-circle d-inline' width='25' height='25'>
							
							";
						}
					}
					
					echo "
					</a>	
					
					<br>
					
					Gesendet am: &nbsp;".date("d.", strtotime($row["created_at"]))."".$monatsnamen[$monat]." ".date("Y", strtotime($row["created_at"])).", ".date("H:i", strtotime($row["created_at"]))." Uhr
					
					<input type='hidden' value='".$row["naID"]."' name='nachricht[]'>
					
						</div>
					</div>
			</form>
			";
		}
		}
		
		if ($countNumRows > 0) {		
			echo "
			
				</div>
				</div>
				</div>	
				
			";			
		}
		
		?>
		
		<?php
	
	$sql = "SELECT * FROM nachrichten WHERE ist_für = '".$_SESSION["iNR"]."' AND gelesen = '1' AND gelöscht = '0'";
	$query = $verb -> query($sql);
	$countNumRows = count($query -> fetchAll());
	
	if ($countNumRows < 1) {
		
	} else {
		echo "
			<div class='card mt-3'>
				<div class='card-header text-white bg-dark' data-toggle='collapse' data-target='#collapse_gelesene' aria-expanded='false' aria-controls='collapse_gelesene' onclick=\"collapseItem('#collapse_gelesene', '#collapse_icon_gelesene')\">
				<div class='icon_collapse_container'>
					<i style='transition: 0.4s;' id='collapse_icon_gelesene' class='collapsedIcon fa-lg icon_in_container far fa-arrow-alt-circle-up'></i>
				</div>
				<div class='after_icon_content'>
					<div class='beforeformtodrop'>
						<i class='fas fa-check'></i>&nbsp; Gelesene Nachrichten (".$countNumRows." insgesamt)
					</div>
					
					<form class='float-right formtodrop w-auto d-inline mt-0 mb-0' action='./postfach' method='POST'>
						<button value='gelöscht' title='Alle Nachrichten löschen' class='btn btn-sm btn-light rounded-circle' name='alle_löschen' type='submit'><i class='pointer fas fa-times'></i></button>
					</form>
					
				</div>
				</div>
				<div id='collapse_gelesene' class='collapse show'>
				<div class='card-body'>
				
				";
				
		if ($countNumRows > 0) {
		
		$monatsnamen = array(1=>"Januar",2=>"Februar",3=>"März",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
		
		foreach ($verb -> query($sql) as $row) {
		
		$monat = date("n", strtotime($row["created_at"]));
		
			echo "
			<form action='./postfach' method='POST'>
			<div class='card mb-3'>
				<div class='card-header text-white bg-dark'>
					".$row["betreff"]."
					
					<p class='float-right mt-0 mb-0'>
						<button value='gelöscht' title='Nachricht löschen' class='btn btn-sm btn-light rounded-circle' name='gelöscht' type='submit'><i class='pointer fas fa-times'></i></button>
					</p>
				</div>
				<div class='card-body'>
					".$row["beschreibung"]."
				</div>
				<div class='card-footer'>
					";
					
					$sql2 = "SELECT * FROM inserent WHERE iNR = '".$row["kommt_von"]."'";
					$query2 = $verb -> query($sql2);
					
					foreach ($query2 as $row2) {
						
						$crypt_iNR = str_replace("/", "", crypt($row2["iNR"],'SB'));
						
						echo "Gesendet von: <a href='./profil/".$crypt_iNR."' class='nohref' title='Jetzt klicken um zum Profil von \"".$row2["vorname"]." ".$row2["nachname"]."\" zu gelangen!'>&nbsp;".$row2["vorname"]." ".$row2["nachname"]."&nbsp;";
						
						if ($row2["profilbildpfad"] != null && file_exists("profilbilder/".$row2["iNR"]."/".$row2["profilbildpfad"]."")) {
							echo "
							
							<img src='profilbilder/".$row2["iNR"]."/".$row2["profilbildpfad"]."' width='25' height='25' class='d-inline-block rounded-circle'>
							
							";
						} else {
							echo "
							
							<img src='images/user.png' class='rounded-circle d-inline' width='25' height='25'>
							
							";
						}
					}
					
					echo "
					</a>	
					
					<br>
					
					Gesendet am: &nbsp;".date("d.", strtotime($row["created_at"]))."".$monatsnamen[$monat]." ".date("Y", strtotime($row["created_at"])).", ".date("H:i", strtotime($row["created_at"]))." Uhr
					
					<input type='hidden' value='".$row["naID"]."' name='nachricht[]' />
					
				</div>
			</div>
			</form>
			";
		}
		}
				
		echo "
				</div>
			</div>
		";
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
<script type="text/javascript">
	$( document ).ready(function() {
		$('#collapse_gelesene').collapse('hide');
	});
</script>
</body>
</html>
