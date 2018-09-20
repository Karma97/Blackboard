<!DOCTYPE HTML>
<html>
<head>
<title>Schwarzes Brett - BBS Jever</title>
<meta charset="UTF-8">
<?php  include 'includes/links.php'?>
</head>
<body id="error">
<div id="error-container">
<h1 class="error-h1">
	<?php
		
			
		
		if (!$_GET["errorcode"]) {
			$error_num = 9000;
		} else {
			$error_num = $_GET["errorcode"];
		}
	
		switch ($error_num) {
			case ($error_num = 9000):
				echo "Es ist ein unbekannter Fehler aufgetreten";
				break;
			case ($error_num = 9001):
				echo "Fehler bei einer Datenbankverbindung";
				break;
			case ($error_num = 9002):
				echo "";
				break;
			default ($error_num = 9000):
				echo "Es ist ein unbekannter Fehler aufgetreten";
				break;
		}

	?>
	</h1>
	</div>
</body>
</html>