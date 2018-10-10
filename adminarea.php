<?php 
	
	ob_start();
	session_start();
	
	setlocale(LC_ALL, 'de_DE.utf8');
	
	$head_variante = 1;
	$nav_variante = 1;
	$script_variante = 1;
	$footer_variante = 1;
	
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
	
	header("Location: ./startseite");
	
?>
		
	<h4><p class="text-danger text-center">Diese Funktion ist nicht für Sie erreichbar!</p></h4>
		
	</div>
	</div>
	
<?php
		
	} else {
	
		if ($_SESSION['vorname'] === "S_B" && $_SESSION['nachname'] === "Admin" && $_SESSION['identifier_token'] === "rOxrNwMC6TDKXf86QRILJ1R=vUKRTfDsGrJ&CEt1hl3Yv5G9mtbDgEJcFWkxL5An81JJF#Vu5ACK3VyrW&K=JXrzehQDSn=D0XEHY6aE5RKtxe0mvtLLd~JcwJ82Hdzrdjc1b5oT#8=K5XhnyQV1MgFgrIXDhMzQtvO5eB7RWa%4NgJOR0G1yNlwvC4nXkEgCgx9UV3xZP8ShpalLfHejvWzEBD8KbzNxViW%tU5XLpSq~67O7Rh0%NAPcHyrQ3zLdm87ikdi7WCOFr#haw6NwnCosFWEZRNSqX4NMVK554%=C%xUMeIXsQdqMVco2Txfq95=THNdpuvvlR=4pXwQ85Mzycic4C9xK03tJnL5SR=Q8myP2O&Ev6p6pb2xi%KkBXNEVcd#849Iie&EGwvm9%F~Q9JD3BuUMzMW7EHBW3xPgjM1k7MYmdKxe6Haq&ZjlO6gtypuYqT1Wp2HSAigMkWg%t2peTtiSF50XZRB8TGfBPUMWhK" && $_SESSION['gebDatum'] === "9999-09-09") {
					
?>

	<div class="card admincard">
		<div class="card-header bg-dark text-white">
		Admineinstellungen
		</div>
		<div class="card-body">
		<div class="row">
			<div class="col mb-3">
				<button class="btn btn-dark" onclick="collapseAll()" type="button">Alle Aus/- und Einklappen</button>
			</div>
		</div>
		<div class="row">
		 <div class="col-sm mb-4">
			<div class="card">
				<div class="card-header bg-dark text-white" data-toggle="collapse" data-target="#rubrikEinstellungenCollapse" aria-expanded="false" aria-controls="rubrikEinstellungenCollapse" onclick="collapseItem('#rubrikEinstellungenCollapse', '#rubrikEinstellungenCollapseIcon')">
				<i class="fas fa-chevron-circle-up iconCollapseAll" id="rubrikEinstellungenCollapseIcon"></i> &nbsp;&nbsp; Rubrikeinstellungen
				</div>
			  <div class="collapse show" id="rubrikEinstellungenCollapse">
				<div class="card-body">
					<p class="mb-1"><a href="rubriken/erstellen">Rubrik erstellen</a></p>
					<p class="mb-1"><a href="rubriken/bearbeiten">Rubrik bearbeiten</a></p>
					<p class="mb-1"><a href="rubriken/einsehen">Rubriken einsehen</a></p>
				</div>
			  </div>
			</div>
		  </div>
		 <div class="col-sm mb-4">
			<div class="card">
				<div class="card-header bg-dark text-white" data-toggle="collapse" data-target="#anzeigenEinstellungenCollapse" aria-expanded="false" aria-controls="anzeigenEinstellungenCollapse" onclick="collapseItem('#anzeigenEinstellungenCollapse', '#anzeigenEinstellungenCollapseIcon')">
				<i class="fas fa-chevron-circle-up iconCollapseAll" id="anzeigenEinstellungenCollapseIcon"></i> &nbsp;&nbsp; Anzeigeneinstellungen
				</div>
			  <div class="collapse show" id="anzeigenEinstellungenCollapse">
				<div class="card-body">
					<p class="mb-1"><a href="anzeigen/erstellen">Anzeige erstellen</a></p>
					<p class="mb-1"><a href="anzeigen/bearbeiten">Anzeigen bearbeiten</a></p>
					<p class="mb-1"><a href="anzeigen/löschen">Anzeige löschen</a></p>
					<p class="mb-1"><a href="anzeigen/einsehen">Anzeigen einsehen</a></p>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<div class="row">
		 <div class="col-sm mb-4">
			<div class="card">
				<div class="card-header bg-dark text-white" data-toggle="collapse" data-target="#einstellung1EinstellungenCollapse" aria-expanded="false" aria-controls="einstellung1EinstellungenCollapse" onclick="collapseItem('#einstellung1EinstellungenCollapse', '#einstellung1EinstellungenCollapseIcon')">
				<i class="fas fa-chevron-circle-up iconCollapseAll" id="einstellung1EinstellungenCollapseIcon"></i> &nbsp;&nbsp; Einstellungen folgen..
				</div>
			  <div class="collapse show" id="einstellung1EinstellungenCollapse">
				<div class="card-body">
					<p class="mb-1"><a href="">Einstellung 1</a></p>
					<p class="mb-1"><a href="">Einstellung 2</a></p>
					<p class="mb-1"><a href="">Einstellung 3</a></p>
				</div>
			  </div>
			</div>
		  </div>
		 <div class="col-sm mb-4">
			<div class="card">
				<div class="card-header bg-dark text-white" data-toggle="collapse" data-target="#einstellung2EinstellungenCollapse" aria-expanded="false" aria-controls="einstellung2EinstellungenCollapse" onclick="collapseItem('#einstellung2EinstellungenCollapse', '#einstellung2EinstellungenCollapseIcon')">
				<i class="fas fa-chevron-circle-up iconCollapseAll" id="einstellung2EinstellungenCollapseIcon"></i> &nbsp;&nbsp; Einstellungen folgen..
				</div>
			  <div class="collapse show" id="einstellung2EinstellungenCollapse">
				<div class="card-body">
					<p class="mb-1"><a href="">Einstellung 1</a></p>
					<p class="mb-1"><a href="">Einstellung 2</a></p>
					<p class="mb-1"><a href="">Einstellung 3</a></p>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<div class="row">
		 <div class="col-sm mb-4">
			<div class="card">
				<div class="card-header bg-dark text-white" data-toggle="collapse" data-target="#einstellung3EinstellungenCollapse" aria-expanded="false" aria-controls="einstellung3EinstellungenCollapse" onclick="collapseItem('#einstellung3EinstellungenCollapse', '#einstellung3EinstellungenCollapseIcon')">
				<i class="fas fa-chevron-circle-up iconCollapseAll" id="einstellung3EinstellungenCollapseIcon"></i> &nbsp;&nbsp; Einstellungen folgen..
				</div>
			  <div class="collapse show" id="einstellung3EinstellungenCollapse">
				<div class="card-body">
					<p class="mb-1"><a href="">Einstellung 1</a></p>
					<p class="mb-1"><a href="">Einstellung 2</a></p>
					<p class="mb-1"><a href="">Einstellung 3</a></p>
				</div>
			  </div>
			</div>
		  </div>
		 <div class="col-sm mb-4">
			<div class="card">
				<div class="card-header bg-dark text-white" data-toggle="collapse" data-target="#einstellung4instellungenCollapse" aria-expanded="false" aria-controls="einstellung4instellungenCollapse" onclick="collapseItem('#einstellung4instellungenCollapse', '#einstellung4instellungenCollapseIcon')">
				<i class="fas fa-chevron-circle-up iconCollapseAll" id="einstellung4instellungenCollapseIcon"></i> &nbsp;&nbsp; Einstellungen folgen..
				</div>
			  <div class="collapse show" id="einstellung4instellungenCollapse">
				<div class="card-body">
					<p class="mb-1"><a href="">Einstellung 1</a></p>
					<p class="mb-1"><a href="">Einstellung 2</a></p>
					<p class="mb-1"><a href="">Einstellung 3</a></p>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		</div>
	</div>
	
</div>
</div>

<?php

	} else {
	
		header("Location: ./startseite");
		
?>
		
	<h4><p class="text-danger text-center">Diese Funktion ist nicht für Sie erreichbar!</p></h4>
		
<?php
	
		}
	}	

	switch ($footer_variante) {
			case $footer_variante === 1:
				include 'includes/footer/footer_1.php';
				break;
			case $footer_variante === 2:
				include 'includes/footer/footer_2.php';
				break;
			case $footer_variante === 3:
				include 'includes/footer/footer_3.php';
				break;
			case $footer_variante === 4:
				include 'includes/footer/footer_4.php';
				break;
			case $footer_variante === 5:
				include 'includes/footer/footer_5.php';
				break;
		}
		
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
