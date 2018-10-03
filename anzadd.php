<?php 
	
	$head_variante = 2;
	
	include 'includes/head.php'; 
	
?>
<body>
	<?php 
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
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
  <h1 class="mb-4">Anzeige aufgeben</h1>
  
  <form action="../anzeigen/hinzufügen" id="anzeigenForm" method="POST">
	<div class="form-group">
		<label for="titel">Betreff der Anzeige</label>
		<input autofocus type="text" class="form-control" name="titel" required id="titel" placeholder="">
	</div>
	<div class="form-group">
		<label for="beschreibung">Anzeigenbeschreibung</label>
		<textarea name="besch" class="form-control" required id="beschreibung" rows="3"></textarea>
	</div>
  <div class="form-group">
   <div class="form-row">
    <div class="col-md-2 mb-3">
  	<label for="search">Ort Filtern</label>
	<input type="text" class="form-control" id="search" placeholder="Ort Filtern">
	</div>
	<div class="col-md-10 mb-3">
	<label for="selectOrt">Ort auswählen</label>
    <select autocomplete class="form-control" name="ort" required id="selectOrt">
	<option value="" selected>Ort auswählen</option>
				<?php
				
				$sql = 'SELECT PLZ, Bezeichnung FROM orte ORDER BY Bezeichnung';	
				$query = $verb -> query($sql);
				
				foreach ($query as $row) {
					echo "<option value='".$row["PLZ"]."'>".$row["Bezeichnung"]."</option>";
				}		
				
			?>
	<option id="noresult" disabled>Keine Ergebnisse</option>
    </select>
	</div>
	</div>
	<div class="form-group">
		<label for="rubriken">Rubriken wählen (maximal 3, minimal 1)</label><br>
	
<?php
		
		$sql1 = "SELECT * FROM rubriken ORDER BY bezeichnung";
		$query1 = $verb -> query($sql1);
		
		$i = 1;
		
		echo "<div class='rubrikenContainer mb-2'>";
		
		foreach ($query1 as $row) {
			echo "
			
				<div class='rubrikenRow'>				
				<div class='custom-control custom-checkbox'>
						<input value='".$row["rNR"]."' type='checkbox' name='rubriken[]' class='custom-control-input rubriken' id='defaultUnchecked".$i."'>
						<label class='custom-control-label' for='defaultUnchecked".$i."'>".$row["bezeichnung"]." &nbsp;<i class='".$row["icon"]."'></i></label>
					</div>	
				</div>
				
				";
				
				$i++;
				
				}
		
		echo "</div>";
		
		?>
	</div>
	<div id="checkboxError" class="mb-2 text-danger"></div>
	<div class="custom-file">
	<div class="form-group">
		<input type="file" name="files[]" class="custom-file-input" multiple id="files">
		<label class="custom-file-label" for="files">Bilder hochladen </label>
  </div>
	
  <div id="list"></div>
  
  <?php
  
    if (!isset($_POST["besch"]) or !isset($_POST["titel"])) {
		
	} else {
		$beschreibung = $_POST["besch"];
		$titel = $_POST["titel"];
		$ort = $_POST["ort"];
		/* $iNR = $_SESSION["iNR"]; */
		
		/*
		var_dump($ort);
		var_dump($titel);
		var_dump($beschreibung);
		var_dump($iNR);
		*/
		
		$rubriken = $_POST["rubriken"];	
		$countR = count($rubriken);
		$z = 1;
		$u = 0;
		
		foreach ($rubriken as $row) {
		
			$rubrik = "rubrik".$z."";
			$$rubrik = $rubriken[$u];	
			
			$z++;
			$u++;
			
		}
		
		/* $sql1 = "INSERT INTO `anzeigen` (`aNR`, `iNR`, `betreff`, `beschreibung`, `PLZ`, `updated_at`, `created_at`) VALUES (null, ".$iNR.", ".$titel.", ".$beschreibung.", ".$ort.", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)"; */
		$sql1 = "INSERT INTO `anzeigen` (`aNR`, `iNR`, `betreff`, `beschreibung`, `PLZ`, `updated_at`, `created_at`) VALUES (null, '1', '".$titel."', '".$beschreibung."', '".$ort."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
		$query = $verb -> query($sql1);
		
		$sql2 = "SELECT * FROM anzeigen WHERE beschreibung = '".$beschreibung."' AND betreff = '".$titel."' AND PLZ = '".$ort."'";
		$query2 = $verb -> query($sql2);
		$queryNumbers = $query2 -> fetchAll();
		
		if (count($queryNumbers) < 1 ) {
			header("Location: error.php");
		} else {
				
		foreach ($verb -> query($sql2) as $row) {
			$aNR = $row["aNR"];
		}
		
		for ($i = 1; $i <= $countR; $i++) {
			$rubrik = "rubrik".$i."";
			$sql3 = "INSERT INTO `r_besitzt_a`(`rNR`, `aNR`, `updated_at`, `created_at`) VALUES ('".$$rubrik."', '".$aNR."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			$query3 = $verb -> query($sql3);
		}
		
		$fertig = "fertig";
		
		}
	}
  
  ?>
  
    <button class="btn btn-dark" id="submitAnzeige" type="submit">Anzeige aufgeben</button>
	
  </form>
  </div>
  </div>
  <?php
  
  if (!isset($fertig) or !isset($aNR)) {
  
  } else {
  
  if ($fertig === "fertig") {
	echo "
	
	<div class='text-success mt-4 mb-2'>
		<h5>Anzeige aufgegeben! <a href='anzeigen/anzeige".$aNR."'>Jetzt einsehen</a></h5>
	</div>
	
	";
  }
  
  }
  
  ?>
  </div>
  </div>
	<?php 
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
	?>
  
</body>

</html>