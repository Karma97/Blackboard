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
		
	<div class="row">
	
	<div class="col-md-7">
		<div id="slide" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="rounded imgindex" src="images/keingeld.jpg" draggable="false">
					  <div class="carousel-caption d-none d-md-block">
						<h5></h5>
						<p></p>
					</div>
				</div>
				<div class="carousel-item">
					<img class="rounded imgindex" src="images/trade.jpg" draggable="false">
					<div class="carousel-caption d-none d-md-block">
						<h5></h5>
						<p></p>
					</div>
				</div>
				<div class="carousel-item">
					<img class="rounded imgindex" src="images/vertragsabschluss.jpg" draggable="false">
					<div class="carousel-caption d-none d-md-block">
						<h5></h5>
						<p></p>
					</div>
				</div>
				<a class="carousel-control-prev carousel-control" href="#slide" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next carousel-control" href="#slide" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-5">
	<div class="card" id="news">
		<div class="card-header bg-dark text-center">
			<h2 class="text-white">Neuigkeiten</h2>
		</div>
		<div class="card-body">
			Neue Webseite!
		</div>
	</div>
	</div>
	
	</div>
	</div>  
	
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
