<?php 
	
	
	ob_start();
	session_start();
	
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
	<div class="card mb-3" id="news">
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
			
			<div class='row mb-4 pointer' title='Jetzt klicken um zur News mit dem Titel \"".$row["titel"]."\" zu kommen.' onclick=\"window.location.href='news/".$row["nID"]."'\">				
				<p class='m-0 newstitel'>
					<b>".$row["titel"]."</b>
				</p>
				<p class='m-0 newsbesch' id='countStrings".$i."'>
					".$row["beschreibung"]."
				</p>
				
				Veröffentlicht am: &nbsp;".date("d.", strtotime($row["created_at"]))."
				".$monatsnamen[$monat]." 
				".date("Y", strtotime($row["created_at"])).",  
				".date("H", strtotime($row["created_at"])).":00 Uhr
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
	
	<?php
	
	$sql7 = "SELECT * FROM rubriken";
	$query7 = $verb -> query($sql7);
	$countRubriken = count($query7 -> fetchAll());
	
	?>
	
	<div class="rubrikencontainer container-fluid w-75 mb-1 mt-2">
		<div class="card w-100">
			<div class="card-header rounded text-center w-100 bg-dark text-white">
				Wählen sie zwischen <b><?php echo $countRubriken; ?></b> verschiedenen Rubriken!
			</div>
		</div>
	</div>
	<div class="rubrikencontainer container-fluid w-75 mb-5 mt-2">
	<div class="row">
	<?php
	
	
	foreach ($verb -> query($sql7) as $row) {
		echo "
		
		<div class='colrubriken col-lg-3 mt-2 mb-2'>
			<div class='card-header rubrikcardindex rounded text-left bg-light text-dark'>
				<h5 class='mb-1 mt-1'>
					<i class='".$row["icon"]."'></i>
						&nbsp; ".$row["bezeichnung"]."
				</h5>
				
				<div class='einfahren border pointer rounded-right text-white text-center bg-dark position-absolute' title='Jetzt klicken um zu den Anzeigen die zur Rubrik \"".$row["bezeichnung"]."\" gehören zu gelangen!' onclick=\"window.location.href='anzeigen/".$row["rNR"]."'\">
				  <h5 class='h5rubriken mb-1 mt-1 faa-parent animated-hover'>
					<i class='fas fa-caret-right faa-horizontal faa-slow'></i>
				  </h5>
				</div>
				
			</div>
		</div>
		
		";
	}
	
	?>

				</div>
			</div>  
		</div>
	</div>
	

	<?php 
				
		require_once 'includes/loeschencheck.php';	
		
		include 'includes/footer.php';	
		include 'includes/scripts.php';	
		
		ob_end_flush();
	?>

	</body>	
</html>
