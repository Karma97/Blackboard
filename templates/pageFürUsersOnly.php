<?php 
	
	ob_start();
	session_start();
	
	setlocale(LC_ALL, 'de_DE.utf8');
	
	$head_variante = 1;	
	$nav_variante = 1;
	$script_variante = 1;
	
	include 'includes/head.php'; 
	
?>

<body>
	
<?php 
	
	include 'includes/pacman.php';
	require_once 'includes/connect.php';	
	require 'includes/cookiecheck.php';
	
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
	
		include 'includes/footer.php';
		
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
