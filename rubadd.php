<!DOCTYPE HTML>
<html>

<head>
<title>Schwarzes Brett - BBS Jever</title>
<meta charset="UTF-8">
<?php  include 'includes/links.inc'?>
</head>
<body>
<div class="grid-container">

<div class="nav" id="header">
	<?php include 'includes/nav.inc'?>
</div>
  
  <div class="main">
  <center>
  <h1>Neue Rubrik anlegen</h1>
<form class="center" action="rubaddscript.php" method="post">
<input type="text" name="rub" placeholder="Rubrikbezeichnung"><br><br>
<input type="submit" value="Rubrik hinzufügen">
</form>
  </center>
  </div>
  
  <div class="footer">
  <p>&copy; BBS Jever</p>
  </div>
</div>
<?php include 'js/responsiveNav.js'?>
</body>

</html>