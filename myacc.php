<?php 
	ob_start();
	session_start();
	
	$head_variante =   1;
	$nav_variante =    1;
	$script_variante = 1;
	$footer_variante = 1;
	
	include 'includes/head.php'; 
	
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		$weiter = false;
		
		$pwd_change = false;
		$pwd_change_error_same = false;
		$pwd_change_error_vorhanden = false;
		
		$email_change = false;
		$email_change_error_vorhanden = false;
		$email_change_error_same = false;
		
		// Change Passwort
		if (isset($_POST["old_pwd"]) && isset($_POST["new_pwd"])) {
		
			$old_pwd = $_POST["old_pwd"];
			$new_pwd = $_POST["new_pwd"];
			$new_pwd_hash = password_hash($new_pwd, PASSWORD_DEFAULT);	
		
			$sql4 = "SELECT * FROM inserent WHERE iNR = '".$_SESSION["iNR"]."'";
			$query4 = $verb -> query($sql4);
			
			foreach ($query4 as $row) {
				$db_old_pwd = $row["passwort"];
			}		
			
			if (password_verify($old_pwd, $db_old_pwd)) {
				$weiter = true;
			} else {
				$pwd_change_error = true;
			}
			
			if ($weiter == true) {
				
				$sql4 = "UPDATE `inserent` SET `passwort`= '".$new_pwd_hash."' WHERE iNR = '".$_SESSION["iNR"]."'";
				$query4 = $verb -> query($sql4);
				
				$pwd_change = true;
			
			}	
			
				?>
				
				<script type="text/javascript">
				
				$(document).ready(function() {
					open_pwd_email_change('.change_pwd_email_overlay', '#change_pwd_html')
				});
				
				</script>
				
				<?php		
				
		}
		
		// Change E-Mail
		if (isset($_POST["old_email"]) && isset($_POST["new_email"])) {
			
			$old_email = $_POST["old_email"];
			$new_email = $_POST["new_email"];
		
			$sql4 = "SELECT * FROM inserent WHERE iNR = '".$_SESSION["iNR"]."'";
			$query4 = $verb -> query($sql4);
			
			foreach ($query4 as $row) {
				$db_old_email = $row["email"];
			}		
			
			if ($db_old_email == $old_email) {
				$weiter = true;
			} else {
				$email_change_error_same = true;
			}

			$sql5 = "SELECT * FROM inserent WHERE email = '".$new_email."'";
			$query5 = $verb -> query($sql5);
			$countNumRows = $query5 -> fetchAll();
			
			if (count($countNumRows) > 0) {
				$weiter = false;
				$email_change_error_vorhanden = true;
			}
			
			if ($weiter == true) {
						
				$sql4 = "UPDATE `inserent` SET `email`= '".$new_email."' WHERE iNR = '".$_SESSION["iNR"]."'";
				$query4 = $verb -> query($sql4);
				
				$email_change = true;
						
			}			
				?>
				
				<script type="text/javascript">
				
				$(document).ready(function() {
					open_pwd_email_change('.change_pwd_email_overlay', '#change_email_html')
				});
				
				</script>
				
				<?php
		}
		
		if (isset($_POST["löschung"])) {
			
			$sql4 = "SELECT * FROM anzeigen WHERE iNR = '".$_SESSION["iNR"]."'";
			$query4 = $verb -> query($sql4);	
			$queryNumRows = $query4 -> fetchAll();
			
			$keineanzeigen = false;
			
			if (count($queryNumRows) < 1) {
			
				$keineanzeigen = true;
				
			} else {
				
				foreach ($verb -> query($sql4) as $row) {
				
					$sql4 = "DELETE FROM r_besitzt_a WHERE aNR = '".$row["aNR"]."'";
					$query4 = $verb -> query($sql4);			
					
					$sql4 = "DELETE FROM anzeigen WHERE aNR = '".$row["aNR"]."'";
					$query4 = $verb -> query($sql4);	
					
				}
				
				$sql4 = "DELETE FROM `besucherzahlen` WHERE iNR = '".$_SESSION["iNR"]."'";
				$query4 = $verb -> query($sql4);
				
				$sql4 = "DELETE FROM `inserent` WHERE iNR = '".$_SESSION["iNR"]."'";
				$query4 = $verb -> query($sql4);	
				
				header("Location: ./logout");
				
			}
			
			if ($keineanzeigen == true) {
				
				$sql4 = "DELETE FROM `inserent` WHERE iNR = '".$_SESSION["iNR"]."'";
				$query4 = $verb -> query($sql4);					
				
				header("Location: ./logout");
				
			} else {
			
				$countAnzeigen = count($queryNumRows);
			
				
			
			}
			
		}
		
		require 'includes/cookiecheck.php';
		
		include 'includes/nav.php';	
		
		?>
  <div class="main">
   
   
<div class='change_pwd_email_overlay'></div>

<div id='change_pwd_html'>
	
	<form action="./myaccount" method="POST">
	
	<h5 class="mb-4">Passwort ändern		
		<div onclick="close_pwd_email_change('.change_pwd_email_overlay', '#change_pwd_html')" class="pointer close_pwd_change float-right d-inline" title="Auf das X klicken oder ausserhalb des Fensters klicken, um das Fenster zu schließen">
			<i class="fas fa-times fa-lg"></i>
		</div>	
	</h5>
	
	<hr class="changes">
	
	<div class="form-group mt-4">
		<label for="old_pwd">Altes Passwort</label>
		<input type="password" class="form-control" value="<?php
			
			if (isset($_POST["old_pwd"]) && isset($_POST["new_pwd"])) {
				if ($pwd_change_error_vorhanden == true) {
					echo "".$_POST["new_pwd"]."";
				}
			}
				
			?>" name="old_pwd" required id="old_pwd" placeholder="">
	</div>
	<div class="form-group">
		<label for="new_pwd">Neues Passwort</label>
		<input type="password" class="form-control" name="new_pwd" required id="new_pwd" placeholder="">
	</div>
	
	<?php
	
	if ($pwd_change == true) {
	
		echo "<p class='text-success mt-2 mb-3'>Passwort erfolgreich zu ".$new_pwd." geändert!</p>";
	
	}
	
	if ($pwd_change_error_vorhanden == true) {
	
		echo "<p class='text-danger mt-2 mb-3'>Neues Passwort ist bereits registriert!</p>";
	
	}
	
	if ($pwd_change_error_same == true) {
	
		echo "<p class='text-danger mt-2 mb-3'>Alte E-Mail stimmt nicht!</p>";
	
	}
	
	?>
	
	<button class="btn btn-dark mb-3 w-100" id="submit_pwd_change" type="submit">Passwort ändern</button>
	
	</form>
	
</div>

<div id='change_email_html'>
	
	<form action="./myaccount" method="POST">
	
	<h5 class="mb-4">E-Mail ändern		
		<div onclick="close_pwd_email_change('.change_pwd_email_overlay', '#change_email_html')" class="pointer close_email_change float-right d-inline" title="Auf das X klicken oder ausserhalb des Fensters klicken, um das Fenster zu schließen">
			<i class="fas fa-times fa-lg"></i>
		</div>	
	</h5>
	
	<hr class="changes">
	

	
	<div class="form-group mt-4">
		<label for="old_email">Alte E-Mail</label>
		<input type="email" class="form-control"  value="<?php
			
			if (isset($_POST["old_email"]) && isset($_POST["new_email"])) {
				if ($email_change_error_vorhanden == false) {
					echo "".$_POST["new_email"]."";
				} else {
					echo "".$_POST["old_email"]."";
				}
			}
				
			?>"	name="old_email" required id="old_email" placeholder="">
	</div>
	<div class="form-group">
		<label for="new_email">Neue E-Mail</label>
		<input type="email" class="form-control" name="new_email" required id="new_email" placeholder="">
	</div>
	
	<?php
	
	if ($email_change == true) {
	
		echo "<p class='d-inline text-success mt-2 mb-3'>E-Mail erfolgreich zu <p class='d-inline text-dark'>".$new_email."</p><p class='d-inline text-success'> geändert !</p></p>";
	
	}
	
	if ($email_change_error_vorhanden == true) {
		
	echo "<p class='text-danger mt-2 mb-3'>Neue E-Mail ist bereits registriert!</p>";
	
	}
	
	if ($email_change_error_same == true) {
	
		echo "<p class='text-danger mt-2 mb-3'>Alte E-Mail stimmt nicht!</p>";
	
	}	
	
	?>	
	
	<button class="btn btn-dark mb-3 w-100 mt-3" id="submit_email_change" type="submit">E-Mail ändern</button>
	
	</form></div>



<div id='account_löschung'>
	
	<form action="./myaccount" method="POST">
	
	<h5 class="mb-4">Wollen Sie Ihren Account wirklich löschen?		
		<div onclick="close_pwd_email_change('.change_pwd_email_overlay', '#account_löschung')" class="pointer close_email_change float-right d-inline" title="Auf das X klicken oder ausserhalb des Fensters klicken, um das Fenster zu schließen">
			<i class="fas fa-times fa-lg"></i>
		</div>	
	</h5>
	
	<hr class="changes">
	
	<p class="text-danger">Wenn Sie Ihren Account löschen, werden alle Ihrer Anzeigen gelöscht!</p>
	
	<input name="löschung" type="hidden">
	
	<button class="btn d-inline btn-danger mb-3 w-40 mt-3 float-left" id="submit_account_löschung" type="submit">Account Löschen</button>
	
	<button class="btn d-inline btn-dark mb-3 w-40 mt-3 float-right" id="close_account_löschung" onclick="close_pwd_email_change('.change_pwd_email_overlay', '#account_löschung')" type="button">Abbrechen</button>
	
	</form>

</div>

 <div class="container-fluid mt-3">

 
 		<?php
			if (!isset($_SESSION['vorname']) or !isset($_SESSION['iNR']) or !isset($_SESSION['news'])) {
			header("Location: ./startseite");
			?>
			
			<h4><p class="text-danger text-center">Um diese Funktion nutzen zu können, müssen Sie angemeldet sein!</p></h4>
			
			<?php
			
			} else {
				
		?>
  <div class="card accountcard">
	<div class="card-header bg-dark text-white">			
		Mein Account
	</div>
	<div class="card-body">
		<?php
		
		

		
			$abfrage = "SELECT * FROM inserent WHERE identifier_token = '".$_SESSION['identifier_token']."' AND iNR = '".$_SESSION['iNR']."'";	
			$query2 = $verb -> query($abfrage);	
			
			setlocale(LC_ALL, 'de_DE.utf8');				
			
			foreach ($query2 as $row) {	
			
				$crypt_iNR = str_replace("/", "", crypt($row["iNR"],'SB'));
			
				echo "
				
				<div class='row'>
					<div class='col-sm mb-3'>
						<div class='card'>
							<div class='card-header bg-dark text-white'>
								Allgemeine Informationen
							</div>
							<div class='card-body'>
								<div class='row'>
									<div class='col-lg-7'>
										Kundennummer: ".$row['kundennummer']."<br><br>
										
										Vorname: ".$row["vorname"]."<br>
										Nachname: ".$row["nachname"]."<br>
										Geburtsdatum: ".date("d.m.Y", strtotime($row["gebdatum"]))."<br><br>
										
										E-Mail: ".$row["email"]."<br>
									</div>
									<div class='col-lg-5 mt-2 mb-2 text-center'>
									
									";
									
									if (file_exists("profilbilder/".$row["iNR"]."/".$row["profilbildpfad"]."")) {
									if (count(array_diff(scandir("profilbilder/".$row["iNR"].""), array('..', '.'))) > 0) {
										
										echo "
										
										<div class='card myaccimage bg-light'>
											<img class='rounded ml-auto mr-auto accimage mb-0' src='./profilbilder/".$row["iNR"]."/".$row["profilbildpfad"]."'>
										</div>
										
										";
									
									} else {
									
										echo "
										
										<div class='card myaccimage bg-light'>
											<img class='rounded ml-auto mr-auto accimage mb-0' src='./images/user.png'>
										</div>
										
										";
									
									}
									} else {
									
										echo "
										
										<div class='card myaccimage bg-light'>
											<img class='rounded ml-auto mr-auto accimage mb-0' src='./images/user.png'>
										</div>
										
										";
										
									}
									
									echo "
									
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class='col-sm mb-3'>
						<div class='card'>
							<div class='card-header bg-dark text-white'>
								Allgemeine Einstellungen
							</div>
							<div class='card-body'>
							
								";
								?>
								
								<div class="changeButtonsRsp">
									<button class='float-left btn btn-sm btn-dark changeTrigger' onclick="open_pwd_email_change('.change_pwd_email_overlay', '#change_pwd_html')">Passwort ändern</button>
								</div>
								<div class="changeHrefsRsp">
									<a class="href" onclick="open_pwd_email_change('.change_pwd_email_overlay', '#change_pwd_html')">Passwort ändern</a><br>
								</div>							
							
							
							
							
							<div class="changeButtonsRsp">
								<button class='float-left btn btn-sm btn-dark changeTrigger' onclick="open_pwd_email_change('.change_pwd_email_overlay', '#change_email_html')">E-Mail ändern</button>
							</div>							
							<div class="changeHrefsRsp">
								<a class="href" onclick="open_pwd_email_change('.change_pwd_email_overlay', '#change_email_html')">E-Mail ändern</a><br><br>		
							</div>								
							
							
							
							
							<div class="changeHrefsRsp">
								<a class='float-left href'>Meine Anzeigen löschen</a><br>
							</div>
							<div class="changeButtonsRsp">
								<button class='float-left btn btn-sm btn-dark'>Meine Anzeigen löschen</button><br>
							</div>
							
							
							
							
							
							<div class="changeHrefsRsp">
								<a href="./profil/<?php echo $crypt_iNR; ?>" class='float-left href'>Mein Profil einsehen</a><br><br>
							</div>
							<div class="changeButtonsRsp">								
								<button onclick="window.location.href='./profil/<?php echo $crypt_iNR; ?>'" class='float-left btn btn-sm btn-dark'>Mein Profil einsehen</button><br><br>									
							</div>
								
								
								
								
							<div class="changeButtonsRsp">							
								<button class='float-left btn btn-sm btn-dark changeTrigger' onclick="open_pwd_email_change('.change_pwd_email_overlay', '#account_löschung')">Mein Account löschen</button>						
							</div>
							<div class="changeHrefsRsp">								
								<a class="href" onclick="open_pwd_email_change('.change_pwd_email_overlay', '#account_löschung')">Mein Account löschen</a>								
							</div>
							
							
								
								<?php
								
								echo "
								
								
							</div>
						</div>						
					</div>
				</div>
				
				";
				
				$abfrage2 = "SELECT anzeigen.updated_at, anzeigen.aNR, anzeigen.created_at, anzeigen.betreff, anzeigen.ortID, anzeigen.beschreibung, orte.Bezeichnung FROM anzeigen INNER JOIN orte USING (ortID) WHERE iNR = '".$_SESSION['iNR']."'";	
				$query3 = $verb -> query($abfrage2);
				$queryNumRows= $query3 -> fetchAll();
				
				echo "
				
				<div class='card mb-2'>
					<div class='card-header bg-dark text-white'>
					";
					
				$löschung = false;	
					
				if (isset($_COOKIE["anzahl_aktuelle_anzeigen".$_SESSION['iNR'].""])) {
					
				$abfrage4 = "SELECT * FROM anzeigen WHERE iNR = '".$_SESSION["iNR"]."'";	
				$query4 = $verb -> query($abfrage4);	
				$countNumRows = $query4 -> fetchAll();
								
				if (count($countNumRows) == $_COOKIE["anzahl_aktuelle_anzeigen".$_SESSION['iNR'].""]) {
					
					$löschung = false;
					
				} else {
				
					$countlöschunganzeigen = $_COOKIE["anzahl_aktuelle_anzeigen".$_SESSION['iNR'].""] - count($countNumRows);
					$löschung = true;

					if ($countlöschunganzeigen < 0) {
						$countlöschunganzeigen = 0;
						$löschung = false;
					} else {
						$löschung = true;
					}
					
					setcookie("anzahl_aktuelle_anzeigen", count($countNumRows), time() + ( 365 * 24 * 60 * 60), "/");
					
				}
				}
				
				if (count($queryNumRows) > 0)  {
				
				echo "
				
				<p class='float-left buttonpadding2 mb-0 mt-0'>Meine Anzeigen (".count($queryNumRows)." insgesamt)</p>
							
				<button class='float-right btn btn-sm btn-light changeTrigger' onclick='toggleBearbeitenModusAZIL()'>Bearbeiten/Löschen</button>				
				
				"; 
				
				if ($löschung == true) {  
					echo "&nbsp;&nbsp; <p class='mb-0 mt-0 text-danger float-left d-inline buttonpadding2 pl-2'>".$countlöschunganzeigen." Ihrer Anzeige/n wurden wegen Verstößung von Richtlinien oder der Zeitüberschreitung von 2 Wochen gelöscht!</p>"; 
				}
				
				echo "
					</div>
					<div class='card-body'>
				";
					
				
				foreach ($verb -> query($abfrage2) as $row) {
				echo "
						<div class='card mb-3'>
							<div class='card-header bg-dark text-white'>
								<p class='mb-0 mt-0 d-inline'>Betreff:</p>
								<div class='changehide d-inline'>
									".$row["betreff"]."
								</div>
								<div class='changeinputshow2 mt-1 d-none'>
									<input type='hidden' name='changeBetreff[]' value='".$row["aNR"]."'>
									<input class='form-control form-control-sm input2 mw-12em' value='".$row["betreff"]."' name='changeBetreff[]' type='text' placeholder='".$row["betreff"]."'>									
								</div>
							</div>
							<div class='card-body'>
							
							<p class='mb-0 mt-0'>Beschreibung:</p>
							<div class='changehide d-inline'>
								".$row["beschreibung"]."
							</div>
							<div class='changeinputshow2 mb-3 d-none'>
								<input type='hidden' name='changeBeschreibung[]' value='".$row["aNR"]."'>
								<textarea class='form-control form-control-sm input2 mw-12em' name='changeBeschreibung[]' rows='3' placeholder='".$row["beschreibung"]."'>".$row["beschreibung"]."</textarea>								
							</div>
														
							<p class='mb-0 mt-3'>Ort:</p>
							<div class='changehide mb-3 d-inline'>
								".$row["Bezeichnung"]."
							</div>
							<div class='changeinputshow2 mb-3 d-none'>
								<input type='hidden' name='changeOrt[]' value='".$row["aNR"]."'>
									<select autocomplete class='form-control input2 form-control-sm mw-12em' name='changeOrt[]'>
										<option value='".$row["ortID"]."' selected class='text-danger'>Unverändert</option>
									
								";
												
									$sql2 = 'SELECT ortID, Bezeichnung FROM orte ORDER BY Bezeichnung';	
									$query2 = $verb -> query($sql2);
									
									foreach ($query2 as $row2) {
									if ($row["Bezeichnung"] == $row2["Bezeichnung"]) {
										echo "<option selected value='".$row2["ortID"]."'>".$row2["Bezeichnung"]."</option>";
									} else {
										echo "<option value='".$row2["ortID"]."'>".$row2["Bezeichnung"]."</option>";
									}
									}		
											
								echo "			
									</select>							
							</div>
							
							<p class='mb-0 mt-3'>Erstellt am: ".date("d.n.Y, H:i", strtotime($row["created_at"]))." Uhr</p>
							<p class='mb-0 mt-0'>Zuletzt bearbeitet am: ".date("d.n.Y, H:i", strtotime($row["updated_at"]))." Uhr</p>
							
							</div>				
					</div>				
					
				";
				}
				
				echo "</div>";
				
			} else {
				
				if (isset($_COOKIE["anzahl_aktuelle_anzeigen".$_SESSION['iNR'].""])) {
				if (count($countNumRows) == $_COOKIE["anzahl_aktuelle_anzeigen".$_SESSION['iNR'].""]) {
					
					$löschung = false;
					
				} else {			
				
					$countlöschunganzeigen = $_COOKIE["anzahl_aktuelle_anzeigen".$_SESSION['iNR'].""] - count($countNumRows);
					
					if ($countlöschunganzeigen < 0) {
						$countlöschunganzeigen = 0;
						$löschung = false;
					} else {
						$löschung = true;
					}
					
					
					
					setcookie("anzahl_aktuelle_anzeigen".$_SESSION['iNR']."", count($countNumRows), time() + ( 365 * 24 * 60 * 60), "/");
					
				}
				}
				
				if ($löschung == true) {  
					echo "Keine Anzeigen vorhanden!&nbsp;&nbsp; <a href='./anzeigen/erstellen'><button class='btn btn-light'>Jetzt Anzeige aufgeben</button></a> &nbsp;&nbsp; <p class='d-inline text-danger'>".$countlöschunganzeigen." Ihrer Anzeige/n wurden wegen Verstößung von Richtlinien oder der Zeitüberschreitung von 2 Wochen gelöscht!</p>"; 
				} else {
					echo "Keine Anzeigen vorhanden!&nbsp;&nbsp; <a href='./anzeigen/erstellen'><button class='btn btn-light'>Jetzt Anzeige aufgeben</button></a>";
				}		
				

				
			}
			}
		?>
	</div>	
<?php

				$sql3 = "SELECT * FROM bewertungen WHERE ist_für = '".$_SESSION['iNR']."' ORDER BY created_at DESC";
				$query3 = $verb -> query($sql3);
				$countNumRows = $query3 -> fetchAll();	
				
				$sql1 = "SELECT * FROM inserent WHERE iNR = '".$_SESSION['iNR']."'";
				
				if (count($countNumRows) < 1) {
					
				echo "
				
				<div class='card mt-3 mb-1'>
					<div class='card-header bg-dark text-white'>
					
						Es gibt zurzeit keine Bewertungen! 
						
					</div>
				</div>
					
				";
				
				} else {
				
				echo "
				
				<div class='card mt-3'>
					<div class='card-header bg-dark text-white'>
						Bewertungen (".count($countNumRows)." insgesamt)				
					</div>
					<div class='card-body'>
					
				";
				
					$monatsnamen = array(1=>"Januar",2=>"Februar",3=>"März",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
							
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
												
									$crypt_iNR2 = str_replace("/", "", crypt($row["iNR"],'SB')); 
												
									if (count(array_diff(scandir("profilbilder/".$row["iNR"].""), array('..', '.'))) > 0) {
									
									echo "
											<img onclick=\"window.location.href='./profil/".$crypt_iNR2."'\" title='Jetzt klicken um zum Profil von \"".$row["vorname"]." ".$row["nachname"]."\" zu kommen.' width='25' height='25' class='pointer rounded-circle ml-auto mr-auto' src='./profilbilder/".$row["iNR"]."/".$row["profilbildpfad"]."'>
											~ ".$row["vorname"]." ".$row["nachname"]."
									";
									
									} else {
									
									echo "
											<img onclick=\"window.location.href='./profil/".$crypt_iNR2."'\" title='Jetzt klicken um zum Profil von \"".$row["vorname"]." ".$row["nachname"]."\" zu kommen.' width='25' height='25' class=pointer 'rounded-circle ml-auto mr-auto' src='./images/user.png'>
											~ ".$row["vorname"]." ".$row["nachname"]."
									";
									
									}
							
									}
									
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
	
	?>
</div>
  </div>
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