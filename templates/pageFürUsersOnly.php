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
  
  Pagetext Users only!
  
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
