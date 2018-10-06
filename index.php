<?php 
	
	ob_start();
	session_start();
	
	$head_variante = 1;
	
	include 'includes/head.php'; 
	
?>
	<body>
	<?php 
	
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		require 'includes/cookiecheck.php';
		
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
					<img class="rounded imgindex" src="images/Foto-Platzhalter.jpg" draggable="false">
					  <div class="carousel-caption d-none d-md-block">
						<h5>Gerade wenig Geld?</h5>
						<p>Hier gibt es vielleicht auch etwas zum Verschenken</p>
					</div>
					<div class="customslidetext">
						<h5>Gerade wenig Geld?</h5><hr>
						<p>Hier gibt es vielleicht auch etwas zum Verschenken</p>					
					</div>
				</div>
				<div class="carousel-item">
					<img class="rounded imgindex" src="images/Foto-Platzhalter.jpg" draggable="false">
					<div class="carousel-caption d-none d-md-block">
						<h5>Große Vielfalt</h5>
						<p>Bei uns gibt es wenig einschränkungen, <br>was man Tauschen darf und was nicht.</p>
					</div>
					<div class="customslidetext">
						<h5>Große Vielfalt</h5><hr>
						<p>Bei uns gibt es wenig einschränkungen, <br>was man Tauschen darf und was nicht.</p>						
					</div>
				</div>
				<div class="carousel-item">
					<img class="rounded imgindex" src="images/Foto-Platzhalter.jpg" draggable="false">
					<div class="carousel-caption d-none d-md-block">
						<h5>Sicherheit</h5>
						<p>Ihre Daten bleiben bei Ihnen <br>und unsere Dienste sind für Sie frei nutzbar.</p>
					</div>
					<div class="customslidetext">
						<h5>Sicherheit</h5><hr>
						<p>Ihre Daten bleiben bei Ihnen <br>und unsere Dienste sind für Sie frei nutzbar.</p>				
					</div>
				</div>
				<!--
				<a class="carousel-control-prev carousel-control" href="#slide" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next carousel-control" href="#slide" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				-->
			</div>
		</div>
	</div>
	<div class="col-md-5">
	<div class="card" id="news">
		<div class="card-header bg-dark text-center">
			<h2 class="text-white">Neuigkeiten</h2>
		</div>
		<div class="card-body">
		<div class="container-fluid">
		<?php
		
		$sql = "SELECT * FROM news ORDER BY nID DESC LIMIT 0,3";				
		$query = $verb -> query($sql);
		
		$i = 1;
		
		setlocale(LC_ALL, 'de_DE.utf8');
		
		$monatsnamen = array(1=>"Januar",2=>"Februar",3=>"März",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
		
		foreach ($query as $row) {
		
			$monat = date("n", strtotime($row["created_at"]));
			
			echo "
			
			<div class='row pointer' title='Jetzt klicken um zur News mit dem Titel: \"".$row["titel"]."\" zu kommen.' onclick=\"window.location.href='news/".$row["nID"]."'\">				
				<strong>".$row["titel"]."</strong>
				<p class='m-0' id='countStrings".$i."'>
					".$row["beschreibung"]." 
				</p>
				Veröffentlicht am: &nbsp;".date("d.", strtotime($row["created_at"]))."
				".$monatsnamen[$monat]." 
				".date("Y", strtotime($row["created_at"])).",  
				".date("H", strtotime($row["created_at"])).":00 Uhr<br><br>
			</div>
			
			";
			
			$i++;
			
		}
		
		
		$sql2 = "SELECT count(*) AS 'zahl' FROM news ORDER BY nID DESC LIMIT 0,3";
		$query2 = $verb -> query($sql2);

		
		foreach ($query2 as $row){
			echo "
			
			<div class='row'>
				<button type='button' class='btn btn-dark ml-0 p-1 pl-2 pr-2' onclick=\"window.location.href='news/alle'\">
					Mehr News? &nbsp;<span class='badge badge-light'>".$row["zahl"]."</span>
				</button>
			</div>
			
			";
		}
		
		?>

		</div>
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
		
		ob_end_flush();
	?>

	</body>	
</html>
