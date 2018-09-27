<?php include 'includes/head.php'; ?>
	<body ng-app="SB">
	<?php 
		/*include 'includes/pacman.php';*/
		require_once 'includes/connect.php';
		include 'includes/nav.php';
		?>
		<div ng-view></div>

	<?php
		include 'includes/scripts.php';
	?>

	</body>	
</html>
