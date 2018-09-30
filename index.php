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
