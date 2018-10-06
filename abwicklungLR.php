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
	
?>
	<body>
	<?php 
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		$nav_variante = 1;
		
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
					/* Registerabwicklung */
					
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
						echo "<h4><p class='text-danger'>Passwörter stimmen nicht überein!</p></h4>";
						$error = true;
					}
										
					/*if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
						echo "<h4><p class='text-danger'>E-Mail ist keine gültige E-Mail!</p></h4>";
						$error = true;	
					}*/
					
					$pwd_hash = password_hash($pwd1, PASSWORD_DEFAULT);	
					$identifier_token = generateRandomString(500);	
					
					$sql2 = "SELECT * FROM `inserent` WHERE email = \"".$email."\" OR passwort = \"".$pwd_hash."\"";
					
					$query2 = $verb -> query($sql2);
					$queryNumRows = $query2 -> fetchAll();
					
					if (count($queryNumRows) > 0 && count($queryNumRows) < 2) {
						echo "<h4><p class='mt-3 text-danger'>Der Account ist bereits vorhanden!</p><p class='text-dark'>Sie werden automatisch weitergeleitet</p></h4>";
						header("refresh:5;url=startseite");
					} else {
					
					if ($error == true) {
						echo "<h4><p class='mt-3 text-dark'>Bitte versuchen Sie es erneut.<br>Sie werden automatisch weitergeleitet</p></h4>";
						header("refresh:5;url=startseite");
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
					
					?>
					
						<h4><p class='mt-3 text-success'>Erfolgreich registriert.</p></h4>
						<h5><p class='mt-2 mb-2 text-dark'>Wir freuen uns Sie in unserer Gemeinde begrüßen zu dürfen.<br> Jetzt können Sie die vollen Funktionen dieser Tauschbörse nutzen.</p></h5>
						<h4><p class="mt-1">Sie werden automatisch zur <a class="pointer" href="startseite">Startseite</a> weitergeleitet</p></h4>
					
					<?php
					
						header( "refresh:10;url=startseite" );
					
						}
					}
				} elseif (!isset($_POST["register_vorname"]) && !isset($_POST["register_nachname"]) && !isset($_POST["register_email"]) && !isset($_POST["register_pwd1"]) && !isset($_POST["register_pwd2"]) && !isset($_POST["register_date"]) && $session == false) {
					/* Loginabwicklung */
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
								}
							} else {
							
								foreach ($verb -> query($sql) as $row) {
									$identifier_token = $row["identifier_token"];
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
					
					?>
						
						<h4><p class='mt-3 text-danger'>Passwort oder E-Mail falsch.</p></h4>
						
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
		include 'includes/footer.php';
		
		$script_variante = 1;
		
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
