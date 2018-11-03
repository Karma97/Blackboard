<?php 
	
	
	ob_start();
	session_start();
	
	$head_variante =   1;
	$nav_variante =    1;
	$script_variante = 1;
	$footer_variante = 1;
	
	include 'includes/head.php'; 
	
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		require 'includes/cookiecheck.php';
		
		include 'includes/nav.php';
				
		?>
		<div class="main">
		
		<div class="container-fluid mt-3">
		
	<div class="row">
	
	<div class="col-md-7">
		<div id="slide" class="carousel slide" data-ride="carousel" data-interval="6000">
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
		<div class="card-header text-white bg-dark text-center">
		<div class="animatedParent animateOnce">
			<h2 class="animated growIn delay-400 slow">Neuigkeiten</h2>
		</div>
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
			
			<div class='row mb-4 pointer' title='Jetzt klicken um zur News mit dem Titel \"".strip_tags($row["titel"])."\" zu kommen.' onclick=\"window.location.href='news/".$row["nID"]."'\">				
				<p class='m-0 newstitel'>
					<b>".strip_tags($row["titel"])."</b>
				</p>
				<p class='m-0 newsbesch' id='countStrings".$i."'>
					".strip_tags($row["beschreibung"])."
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
			<div class='card-header rubrikcardindex rounded text-left bg-light text-dark '>
				<h5 class='mb-1 mt-1'>
					<i class='".$row["icon"]."'></i>
						&nbsp; ".strip_tags($row["bezeichnung"])."
				</h5>
				
				<div class='einfahren border pointer rounded-right text-white text-center bg-dark position-absolute' title='Jetzt klicken um zu den Anzeigen die zur Rubrik \"".strip_tags($row["bezeichnung"])."\" gehören zu gelangen!' onclick=\"window.location.href='anzeigen/rubrik-".strip_tags($row["rNR"])."/seite-1'\">
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
			<?php
			
			if (!isset($_SESSION['vorname']) or !isset($_SESSION['iNR']) or !isset($_SESSION['news'])) {
			
			
			} else {
			
			?>
			<div class="container-fluid w-75 mb-5">
				<div class='card-header bg-dark text-center'>
					<?php 
					
					$anzahl_dargestellte_benutzer = 10;
						
						echo "
						
						Sie sehen <b>".$anzahl_dargestellte_benutzer."</b> Zufällige Benutzer!
						<a href='benutzerliste'><button class='btn btn-sm btn-light ml-5'>Benutzerliste</button></a>
						
						";
						
					?>
				</div>
				<div class="row p-2">
				<?php
				
				
				
				$sql7 = "SELECT * FROM inserent ";
				$query7 = $verb -> query($sql7);
				$countNumRows = count($query7 -> fetchAll());
				
				if ($countNumRows < $anzahl_dargestellte_benutzer) {
				
				} else {
					for ($i = 0; $i < $anzahl_dargestellte_benutzer; $i++) {
						
						$rand = rand(2, $countNumRows);
					
						$sql8 = "SELECT * FROM inserent INNER JOIN besucherzahlen USING(iNR) WHERE iNR = '".$rand."'";
						$query8 = $verb -> query($sql8);
						
						foreach ($query8 as $row) {
						
						$crypt_iNR = str_replace(array("/", "."), "", crypt($row["iNR"],'SB'));
						
							echo "
							
							<div class='col-lg-6' title='Jetzt Doppelklicken um zum Profil von \"".$row["vorname"]." ".$row["nachname"]."\" zu kommen!' ondblclick=\"window.location.href = './profil/".$crypt_iNR."'\">
								<div class='card mt-1 mb-1 p-2 pt-1 pb-1'>
								<div class='mb-0 mt-0 d-inline w-100'>
								
								";
								
								if ($row["profilbildpfad"] != null && file_exists("profilbilder/".$row["iNR"]."/".$row["profilbildpfad"]."")) {
									echo "
									
									<img src='profilbilder/".$row["iNR"]."/".$row["profilbildpfad"]."' width='25' height='25' class='d-inline-block rounded-circle'>
									
									";
								} else {
									echo "
									
									<img src='images/user.png' class='rounded-circle d-inline' width='25' height='25'>
									
									";
								}
								
								echo "
								
								~ ".$row["vorname"]." ".$row["nachname"]."
								
								
								<p class='listeprofile mb-0 mt-0 d-inline float-right'>
								
								";
								
								$sql2 = "SELECT * FROM anzeigen WHERE iNR = '".$row["iNR"]."'";
								$query2 = $verb -> query($sql2);
								$countNumRows2 = count($query2 -> fetchAll());
								
								echo $countNumRows2;
								
								echo "
									<i title='Aktuell ".$countNumRows2." Anzeigen' class='fas fa-clipboard-list'></i>
									
									&nbsp;
									&nbsp;
									
									".$row["besucherzahl"]."
									<i title='Aktuell ".$row["besucherzahl"]." Profilaufrufe' class='fas fa-eye'></i>
									
									&nbsp;
									&nbsp;
									
									<a title='Nachricht schreiben' href='mailto:".$row["email"]."'><i class='fa-lg far fa-envelope'></i></a>
								</p>
								
								
								</div>
								</div>
							</div>
							
							";
						
						}
						
					}
				}
				
				
				
				
				
				echo "
				
			</div>
		</div>
			
			";
			
			}
			
			?>
	</div>
	

	<?php 
				
		require_once 'includes/loeschencheck.php';	
		
		include 'includes/footer.php';	
		include 'includes/scripts.php';	
		
		ob_end_flush();
	?>

	</body>	
</html>
