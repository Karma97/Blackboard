<!doctype html>
<html lang="de">
	<head>
		<meta charset="UTF-8">
		<title>Schwarzes Brett | Tauschbörse</title>
		<?php 
			
		switch ($head_variante) {
			case $head_variante == 1:
				include __DIR__ . "/links/links_head1.php"; 
				break;
			case $head_variante == 2:
				include __DIR__ . "../links/links_head2.php"; 
				break;	
			case $head_variante == 3:
				include __DIR__ . "../../links/links_head3.php";  
				break;	
			case $head_variante == 4:
				include __DIR__ . "../../../links/links_head4.php";  
				break;	 
		}

		?>
		
<script type="text/javascript">
  window.CookieHinweis_options = {
  message: 'Diese Seite nutzt Cookies, um bestmögliche Funktionalität bieten zu können.',
  agree: 'Ok, verstanden',
  learnMore: 'Mehr Infos',
  link: 'datenschutz',
  theme: 'dunkel-unten'
 };
</script>

<script type="text/javascript" src="https://s3.eu-central-1.amazonaws.com/website-tutor/cookiehinweis/script.js
"></script>

</head>
<?php
	
	$login_error_PwdEmail = false;
	
	// Loginvariablen
	$login_password_leer = false;
	$login_password_html = false;
	
	$login_email_leer = false;
	$login_email_html = false;
	$login_email_numeric = false;
	$login_email_ungueltig = false;
		
	
	// Registervariablen
	$register_vorname_nummer = false;
	$register_vorname_leer = false;
	$register_vorname_html = false;
	
	$register_nachname_nummer = false;
	$register_nachname_leer = false;
	$register_nachname_html = false;
	
	$register_email_nummer = false;
	$register_email_leer = false;
	$register_email_html = false;
	$register_email_gültig = false;
	
	$register_passwort1_html = false;
	$register_passwort1_leer = false;
	
	$register_passwort2_html = false;
	$register_passwort2_leer = false;
	
	$register_passwörter_gleich = false;
	
	$register_geburtsdatum_leer = false;
	$register_geburtsdatum_ausserhalb = false;
	
	$register_news_html = false;
	$register_news_number = false;
	
	$register_account_vorhanden = false; 
	
	
	require_once 'includes/functions/functions.php';

	
?>
