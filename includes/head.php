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
	
	$loginerrorPwdEmail = false;
	$loginEmailUnvalid = false;
	
	$registerPwdNotSame = false;
	$registerEmailUnvalid = false;
	$registerAccountVorhanden = false;
	
	// Prüfung ob String HTML-Tags enthält
	function is_html($string){
		return $string != strip_tags($string) ? true:false;
	}
	
?>
