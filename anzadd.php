<?php include 'includes/head.php'; ?>
<body>

<div class="nav" id="header">
	<?php include 'includes/nav.php'?>
</div>
  
  <div class="main">
  <h1>Neue Rubrik anlegen</h1>
<form class="center" action="rubaddscript.php" method="post">
<input type="text" name="rub" placeholder="Rubrikbezeichnung"><br><br>
<input type="submit" value="Rubrik hinzufügen">
</form>
  </div>
  
	<?php 
		include 'includes/footer.php';
	?>
  
</body>

</html>