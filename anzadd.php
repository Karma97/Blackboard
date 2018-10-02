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
  
  <form action="../anzeigen/hinzufügen" method="POST">
	<div class="form-group">
		<label for="titel">Betreff der Anzeige</label>
		<input type="text" class="form-control" name="titel" required id="titel" placeholder="">
	</div>
	<div class="form-group">
		<label for="beschreibung">Anzeigenbeschreibung</label>
		<textarea name="besch" class="form-control" required id="beschreibung" rows="3"></textarea>
	</div>
  <div class="form-group">
   <div class="form-row">
    <div class="col-md-2 mb-3">
  	<label for="search">Ort Filtern</label>
	<input type="text" class="form-control" name="search" id="search" placeholder="Ort Filtern">
	</div>
	<div class="col-md-10 mb-3">
	<label for="selectOrt">Ort auswählen</label>
    <select autocomplete='address-level2' class="form-control" required id="selectOrt">
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
		<label for="rubriken">Rubriken wählen (maximal 3)</label><br>
	
<?php
		
		$sql1 = "SELECT * FROM rubriken ORDER BY bezeichnung";
		$query1 = $verb -> query($sql1);
		
		$i = 1;
		
		echo "<div class='rubrikenContainer mb-2'>";
		
		foreach ($query1 as $row) {
			echo "
			
				<div class='rubrikenRow'>
					<div class='custom-control custom-checkbox'>
						<input value='".$row["rNR"]."' type='checkbox' class='custom-control-input rubriken' id='defaultUnchecked".$i."'>
						<label class='custom-control-label' for='defaultUnchecked".$i."'>".$row["bezeichnung"]." &nbsp;<i class='".$row["icon"]."'></i></label>
					</div>	
				</div>
			
			";
			
			$i++;
		}
		
		echo "</div>";
		
		?>
	</div>
	<div class="custom-file">
	<div class="form-group">
		<input type="file" name="files[]" class="custom-file-input" multiple id="files">
		<label class="custom-file-label" for="files">Bilder hochladen </label>
  </div>
    </form>
  <div id="list"></div>
  
  <form action="../anzeigen/hinzufügen" method="POST">
  
    <button class="btn btn-dark" type="submit">Anzeige aufgeben</button>
	
  </form>
  </div>
  </div>
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