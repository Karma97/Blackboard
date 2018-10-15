<?php 
	ob_start();
	
	session_start();
	
	if (isset($_SESSION['vorname']) && isset($_SESSION['iNR']) && isset($_SESSION['news'])) {
	
		$name = "".$_SESSION['vorname']." ".$_SESSION['nachname']."";
		
		unset($_SESSION['vorname']);
		unset($_SESSION['nachname']);
		unset($_SESSION['iNR']);
		unset($_SESSION['email']);
		unset($_SESSION['gebDatum']);
		unset($_SESSION['news']);
		
		session_destroy();		
		
		
		unset($_COOKIE["identifier_token"]);	
		setcookie("identifier_token", "", time() - 3600, "/");
		
		$session = true;
		
	} else {
		$session = false;
	};
	
	$head_variante = 1;	
	$script_variante = 1;
	$nav_variante = 1;
	$footer_variante = 1;
	
	include 'includes/head.php'; 
	
function generateRandomString($length) { 
		$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789%&=#~";
		$charsLength = strlen($characters) -1;
		$string = "";
			for($i = 0; $i < $length; $i++){
				$randNum = mt_rand(0, $charsLength);
				$string .= $characters[$randNum];
			}
		return $string;
}

function generateKundennummer($length) { 
		$characters = "123456789";
		$charsLength = strlen($characters) -1;
		$string = "";
			for($i = 0; $i < $length; $i++){
				$randNum = mt_rand(0, $charsLength);
				$string .= $characters[$randNum];
			}
		return $string;
}
	
?>
	<body>
	<?php 
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		
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
		<div class="container-fluid">
			<?php
			
				if ($session == true) {
				
				header("Location: startseite");
				
				?>					
					<h4><p class='mt-3 mb-1 text-success'>Erfolgreich ausgeloggt.</p></h4>
					<h4><p class='mt-1 mb-1 text-dark'>Danke für Ihren Besuch <?php echo "".$name.""; ?>!</p></h4>
					<h4><p class="mt-1">Sie werden automatisch zur <a class="pointer" href="startseite">Startseite</a> weitergeleitet</p></h4>
					
				<?php
					
					header( "refresh:5;url=startseite" );
					
				} elseif ($session == false) {
				
				if (!isset($_POST["login_pwd"]) && !isset($_POST["login_email"]) && !isset($_POST["register_vorname"]) && !isset($_POST["register_nachname"]) && !isset($_POST["register_email"]) && !isset($_POST["register_pwd1"]) && !isset($_POST["register_pwd2"]) && !isset($_POST["register_date"]) && $session == false) {
					header("Location: startseite");
					
					echo "<h3>Dies hier sollte nicht angezeigt werden. Falls doch, dann informieren Sie bitte den Support.</h3>";
					
				} elseif (!isset($_POST["login_pwd"]) && !isset($_POST["login_email"]) && $session == false) {
					// Registerabwicklung
					
					$error = false;
					
					$vorname = $_POST["register_vorname"];
					$nachname = $_POST["register_nachname"];
					$email = $_POST["register_email"];
					$pwd1 = $_POST["register_pwd1"];
					$pwd2 = $_POST["register_pwd2"];
					$gebDatum = $_POST["register_date"];	
					
					if (!isset($_POST["register_news"])) {
						$news = 0;
					} else {
						$news = $_POST["register_news"];
					};
					
					if ($pwd1 !== $pwd2) {
						$registerPwdNotSame = true;
						?>
						
						<div class="text-danger text-center mt-5">
							<h3>Passwörter stimmen nicht überein!</h3>
						</div>
						
						<?php
						$error = true;
					}
										
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						
						$registerEmailUnvalid = true;
						?>
						
						<div class="text-danger text-center mt-2">
							<h3>Die eingegeben E-Mail ist ungültig!</h3>
						</div>
						
						<?php
						$error = true;	
					}
					
					$pwd_hash = password_hash($pwd1, PASSWORD_DEFAULT);	
					$identifier_token = generateRandomString(500);	
					
					$sql2 = "SELECT * FROM `inserent` WHERE email = \"".$email."\" OR passwort = \"".$pwd_hash."\"";
					
					$query2 = $verb -> query($sql2);
					$queryNumRows = $query2 -> fetchAll();
					
					if (count($queryNumRows) > 0 && count($queryNumRows) < 2) {
						
						$registerAccountVorhanden = true;
						?>
						
						<div class="text-danger text-center mt-2">
							<h3>Der Account ist bereits vorhanden!</h3>
						</div>
						
						<?php
						$error = true;	
					}
					
					
					if ($error == true) {
						
						?>					
					
						<script text="text/javascript">
						
						$(document).ready(function() {
							openRegister('.login_komplett');
						});
							
						</script>
						
						<div class="text-danger text-center mt-5">
						<h3><a href="startseite">Zur Startseite</a></h3>
						</div>	
						<?php
					} else {
							
					$sql = "INSERT INTO `inserent` (`iNR`, `identifier_token`, `nachname`, `vorname`, `passwort`, `email`, `gebdatum`, `newsletter`, `updated_at`, `created_at`) VALUES (null, '".$identifier_token."','".$nachname."', '".$vorname."', '".$pwd_hash."', '".$email."', '".$gebDatum."', '".$news."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
					$query = $verb -> query($sql);
									
					do {
					
					$sql5 = "SELECT * FROM `inserent` WHERE email = \"".$email."\" OR passwort = \"".$pwd_hash."\"";
					
					foreach ($verb -> query($sql5) as $row) {
						$dbnewiNR = $row["iNR"];
					}
					
					$newidentifier_token = generateRandomString(500);
					
					$sql4 = "UPDATE `inserent` SET `identifier_token` = '".$newidentifier_token."' WHERE iNR = '".$dbnewiNR."'";
					$query4 = $verb -> query($sql4);	
					
					$sql3 = "SELECT * FROM `inserent` WHERE `identifier_token` = '".$newidentifier_token."'";
					$query3 = $verb -> query($sql3);	
					$queryNumRows2 = $query3 -> fetchAll();
					
					} while (
						
						count($queryNumRows2) > 1
						
					);
					
					$kundennummer = generateKundennummer(10);
					$kundennummer2 = "SB#".$kundennummer."";
					
					do {
					
					$sql6 = "SELECT * FROM `inserent` WHERE email = \"".$email."\" OR passwort = \"".$pwd_hash."\"";
					
					foreach ($verb -> query($sql6) as $row) {
						$dbnewiNR = $row["iNR"];
					}
					
					$kundennummer = generateKundennummer(10);
					$kundennummer2 = "SB#".$kundennummer."";
					
					$sql7 = "UPDATE `inserent` SET `kundennummer` = '".$kundennummer2."' WHERE iNR = '".$dbnewiNR."'";
					$query7 = $verb -> query($sql7);	
					
					$sql8 = "SELECT * FROM `inserent` WHERE `kundennummer` = '".$kundennummer2."'";
					$query8 = $verb -> query($sql8);
					$queryNumRows8 = $query8 -> fetchAll();
					
					} while (
						
						count($queryNumRows8) > 1
						
					);					
					
					
					?>
					
						<h4><p class='mt-3 text-success'>Erfolgreich registriert.</p></h4>
						<h5><p class='mt-2 mb-2 text-dark'>Wir freuen uns Sie in unserer Gemeinde begrüßen zu dürfen.<br> Jetzt können Sie die vollen Funktionen dieser Tauschbörse nutzen.</p></h5>
						<h4><p class="mt-1">Sie werden automatisch zur <a class="pointer" href="startseite">Startseite</a> weitergeleitet</p></h4>
					
					<?php
					
						header( "refresh:10;url=startseite" );
					
						}
				} elseif (!isset($_POST["register_vorname"]) && !isset($_POST["register_nachname"]) && !isset($_POST["register_email"]) && !isset($_POST["register_pwd1"]) && !isset($_POST["register_pwd2"]) && !isset($_POST["register_date"]) && $session == false) {
					// Loginabwicklung
					
					$email = $_POST["login_email"];
					$pwd = $_POST["login_pwd"];
				
					$sql = "SELECT * FROM `inserent` WHERE email = \"".$email."\"";
					$query = $verb -> query($sql);
					$queryNumRows = $query -> fetchAll();
					
					$passwortverify = false;
					$emailverify = false;
					
					if (count($queryNumRows) > 0 && count($queryNumRows) < 2) {
						
						$emailverify = true;
						
						
						foreach ($verb -> query($sql) as $row) {
							$pwd_db = $row["passwort"];
							$iNR = $row["iNR"];
						}
						
						if (password_verify($pwd, $pwd_db)) {
							
							if (!isset($_POST["login_remember_me"])) {
								foreach ($verb -> query($sql) as $row) {
									$_SESSION['vorname'] = $row["vorname"];
									$_SESSION['nachname'] = $row["nachname"];
									$_SESSION['iNR'] = $row["iNR"];
									$_SESSION['email'] = $row["email"];
									$_SESSION['gebDatum'] = $row["gebdatum"];
									$_SESSION['news'] = $row["newsletter"];		
									$_SESSION['kundennummer'] = $row["kundennummer"];									
									$_SESSION['identifier_token'] = $row["identifier_token"];
								}
							} else {
							
								foreach ($verb -> query($sql) as $row) {
									$identifier_token = $row["identifier_token"];
								}
								
								if (!isset($_COOKIE["anzahl_aktuelle_anzeigen"])) {
									$sql5 = "SELECT * FROM anzeigen WHERE inR = '".$iNR."'"; 
									$query5 = $verb -> query($sql5);	
									$countNumRows2 = $query5 -> fetchAll();		
									$countNumRows2total = count($countNumRows2);
									
									setcookie("anzahl_aktuelle_anzeigen".$iNR."", $countNumRows2total, time() + ( 365 * 24 * 60 * 60), "/");					
								}
								
								setcookie("identifier_token", $identifier_token, time() + ( 365 * 24 * 60 * 60), "/");
								
							}
					
							$passwortverify = true;
							
						} else {
							$passwortverify = false;
						}
					} else {
						$emailverify = false;
					}
							
						if ($passwortverify == true && $emailverify == true) {
									
						header("Location: startseite");
									
						?>
						
						<h4><p class='mt-3 text-success'>Erfolgreich eingeloggt.</p></h4>
						<h4><p class="mt-1">Sie werden automatisch zur <a class="pointer" href="startseite">Startseite</a> weitergeleitet</p></h4>						
						<?php
						
						header( "refresh:4;url=startseite");
						
					} else {
					
					$loginerrorPwdEmail = true;
					
					?>
					
					<script text="text/javascript">
					
					$(document).ready(function() {
						openLogin('.login_komplett');
					});
						
					</script>
					<div class="text-danger text-center mt-5">
						<h3>Passwort oder E-Mail falsch!
							<br>
							<a href="startseite" class="p-3">Zur Startseite</a>
						</h3>
					</div>
					
					<?php
					
					} 

				} else {
				
					header("Location: startseite");
					
					echo "<h3>Dies hier sollte nicht angezeigt werden. Falls doch, dann informieren Sie bitte den Support.</h3>";		
					
				}
				} else {
							
				}
			
			?>
		</div>
	</div>

	<?php 
	
		require_once 'includes/loeschencheck.php';
				
		include 'includes/footer.php';	
		include 'includes/scripts.php';	
		
		ob_end_flush();
		
	?>

	</body>	
</html>
