<?php include 'includes/head.php'; ?>
<body>

	<?php 
		/*include 'includes/pacman.php';*/
		require_once 'includes/connect.php';
		?>
  
  <div class="main">
  <h1>Neue Rubrik anlegen</h1>
<form class="center" action="rubaddscript.php" method="post">
<input type="text" name="rub" placeholder="Rubrikbezeichnung"><br><br>
<input type="submit" value="Rubrik hinzufügen">
</form>
  </div>

