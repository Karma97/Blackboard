<?php 
	ob_start();
	session_start();
	
	$head_variante = 2;
	
	include 'includes/head.php'; 
	
?>
<body>
	<?php 
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		require 'includes/cookiecheck.php';
		
		$nav_variante = 2;
		
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
		?>
		
		<h4><p class="text-danger text-center">Um diese Funktion nutzen zu können, müssen Sie angemeldet sein!</p></h4>
		
		<?php
		
		} else {
			if ($_SESSION['vorname'] === "S_B" && $_SESSION['nachname'] === "Admin" && $_SESSION['identifier_token'] === "rOxrNwMC6TDKXf86QRILJ1R=vUKRTfDsGrJ&CEt1hl3Yv5G9mtbDgEJcFWkxL5An81JJF#Vu5ACK3VyrW&K=JXrzehQDSn=D0XEHY6aE5RKtxe0mvtLLd~JcwJ82Hdzrdjc1b5oT#8=K5XhnyQV1MgFgrIXDhMzQtvO5eB7RWa%4NgJOR0G1yNlwvC4nXkEgCgx9UV3xZP8ShpalLfHejvWzEBD8KbzNxViW%tU5XLpSq~67O7Rh0%NAPcHyrQ3zLdm87ikdi7WCOFr#haw6NwnCosFWEZRNSqX4NMVK554%=C%xUMeIXsQdqMVco2Txfq95=THNdpuvvlR=4pXwQ85Mzycic4C9xK03tJnL5SR=Q8myP2O&Ev6p6pb2xi%KkBXNEVcd#849Iie&EGwvm9%F~Q9JD3BuUMzMW7EHBW3xPgjM1k7MYmdKxe6Haq&ZjlO6gtypuYqT1Wp2HSAigMkWg%t2peTtiSF50XZRB8TGfBPUMWhK" && $_SESSION['gebDatum'] === "9999-09-09") {
				
			
	?>
  <h1 class="mb-4">Neue Rubrik anlegen</h1>
  
  <form action="../rubriken/hinzufügen" method="POST">
	<div class="form-group">
		<label for="bezeichnung">Rubrikbezeichnung</label>
		<input autofocus type="text" class="form-control" name="bez" required id="bezeichnung" placeholder="z.B: Videospiele">
	</div>
	<div class="form-group">
		<label for="textarea">Rubrikbeschreibung</label>
		<textarea name="besch" class="form-control" required id="textarea" rows="3"></textarea>
	</div>
	<div class="form-group">
		<label for="icon">Font-Awesome Icon-Klasse</label>
		<input type="text" class="form-control" name="icon" required id="icon" placeholder="z.B.: fas fa-tv">
	</div>
		<button type="submit" class="btn btn-dark">Abspeichern</button>
	</form>
	
	<?php
	

	
	if (!isset($_POST["bez"]) or empty($_POST["bez"])) {
		
	} else {
	
	$bez = $_POST["bez"];
	$besch = $_POST["besch"];
	$icon = $_POST["icon"];
	
		$sql1 = "SELECT * FROM rubriken WHERE bezeichnung = '$bez' OR icon = '$icon'";	
		$query1 = $verb -> query($sql1);
		$queryNumbers = $query1 -> fetchAll();
	
	if (count($queryNumbers) > 0) {
		echo "
			<div class='mt-3 container-fluid text-danger'>
				<p class='font-weight-bold'>Rubrik ist bereits vorhanden!</p>
			</div>
			";
	} else {
		
	$sql2 = "INSERT INTO `rubriken` (`rNR`, `bezeichnung`, `beschreibung`, `icon`, `updated_at`, `created_at`) VALUES (NULL, '$bez', '$besch', '$icon', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";	
	
	$query2 = $verb -> query($sql2);
	
	 }
	}
	
	?>
	<div class="container-fluid">
	
	<div class="form-group mt-5">
		<input type="text" class="form-control" name="searchR" id="searchR" placeholder="Rubrik suchen">
	</div>
	<div class="wrapper">
<table class="table ml-auto mr-auto table-hover table-responsive table-striped w-100 d-block d-md-table">
 <caption>Liste aller aktuellen Rubriken</caption>
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Bezeichnung</th>           
      <th scope="col">Beschreibung</th>          
	  <th scope="col">Icon</th>                  
	  <th scope="col">Icon-Klasse</th>           
    </tr>                                        
  </thead>                                       
  <tbody id="tbodyR">
		<?php
						
			$sql3 = "SELECT * FROM rubriken";	
			$query3 = $verb -> query($sql);
				
			foreach ($query3 as $key => $row) {
			if ($row["created_at"] > date('Y-m-d h:i:s', strtotime('-1 hour'))) {
				echo "<tr class='table-success'>";
			} else {
				echo "<tr>";
			}
				echo "
					<td scope='row'><strong>".$row["rNR"]."</strong></td>
					<td>".$row["bezeichnung"]."</td>
					<td>".$row["beschreibung"]."</td>
					<td><i class='".$row["icon"]."'></i></td>
					<td>".$row["icon"]."</td>
				</tr>";
			}
		
		?>
  </tbody>
</table>
</div>
</div>
  </div>
  </div>
  
	<?php
	
		} else {
			header("Location: ../startseite");
			?>
			
			<h4><p class="text-danger text-center">Diese Funktion ist nicht für Sie erreichbar!</p></h4>
			
			<?php
		}
		}
		
		include 'includes/footer.php';
		
		$script_variante = 2;
		
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