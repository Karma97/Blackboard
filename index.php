<?php include 'includes/head.php'; ?>
	<body>
	<?php 
		/*include 'includes/pacman.php';*/
		require_once 'includes/connect.php';
		include 'includes/nav.php';
		
		function __autoload($class_name) {
				require_once './classes/'.$class_name.'.php';
			}
			
		require_once 'includes/Routes.php';
		?>
	<div class="main">
	<div class="container-fluid mt-3">
		<h1>Willkommen auf dem Schwarzen Brett!</h1>
		</div>
		</div>
	<?php 
		include 'includes/footer.php';
		include 'includes/scripts.php';
	?>

	</body>	
</html>
