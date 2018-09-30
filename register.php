<?php 
	
	$head_variante = 1;
	
	include 'includes/head.php'; 
	
?>
	<body>
	<?php 
		/*include 'includes/pacman.php';*/
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
	<div class="container-fluid mt-3">
			<h1>Willkommen auf dem Schwarzen Brett!</h1>
			  <?php 


session_start();
$dbpass='';
$pdo = new PDO("mysql:host=localhost;dbname=schwarzes_brett, root", $dbpass);
	
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
  
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }     
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    
    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM inserent WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetchAll();
        
        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }    
    }
    
    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {    
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
        
        $statement = $pdo->prepare("INSERT INTO inserent (iNR, nachname, vorname, passwort, email, gebdatum, newsletter) VALUES (:iNR, :nachname, :vorname, :passwort, :email, :gebdatum, :newsletter)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));
        
        if($result) {        
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    } 
}
 
if($showFormular) {
?>
 
<form action="?register=1" method="post">
Vorname:<br>
<input type="text" size="40" maxlength="20" name="vorname"><br><br>

Nachname:<br>
<input type="text" size="40" maxlength="20" name="nachname"><br><br>

E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>

Geburtsdatum:<br>
<input type="date" size="40" name="gebdatum"><br><br>

 Newsletter:<br>
 <input type="radio" name="newsletter" value="1"> Ja
 <input type="radio" name="newsletter" value="0"> Nein
 <br><br>
<input type="submit" value="Registrieren">
</form>
 
<?php
} //Ende von if($showFormular)
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
	?>

	</body>	
</html>