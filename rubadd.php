<?php include 'includes/head.php'; ?>
<body>
<div class="nav" id="header">
	<?php
		require_once 'includes/connect.php';
		include 'includes/nav.php'; 
	?>
</div>
  
  <div class="main">
  <div class="container-fluid mt-3">
  <?php 
	
  ?>
  <h1>Neue Rubrik anlegen</h1>
  
  <form action="rubadd.php" method="POST">
	  <div class="form-group">
    <label for="bezeichnung">Rubrikbezeichnung</label>
    <input type="text" class="form-control" id="bezeichnung" placeholder="z.B: Videospiele">
  </div>
<div class="form-group">
    <label for="textarea">Rubrikbeschreibung</label>
    <textarea class="form-control" id="textarea" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-dark">Abspeichern</button>
	</form>
  </div>
  </div>
  
  
	<?php 
		include 'includes/footer.php';
	?>

</body>

</html>