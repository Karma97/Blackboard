<?php include 'includes/head.php'; ?>
<body>
	<?php 
		/*include 'includes/pacman.php';*/
		require_once 'includes/connect.php';
		include 'includes/nav.php';
		?>
  
  <div class="main">
  <div class="container-fluid mt-3">
  <h1>Neue Rubrik anlegen</h1>
  
  <form action="rubadd.php" method="POST">
	<div class="form-group">
		<label for="bezeichnung">Rubrikbezeichnung</label>
		<input type="text" class="form-control" name="bez" required id="bezeichnung" placeholder="z.B: Videospiele">
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
<table class="mt-5 table mb-5 ml-auto mr-auto tablebottom table-hover table-responsive table-striped">
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
  <tbody>
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
  
  
	<?php 
		include 'includes/footer.php';
	?>

</body>

</html>