<div class="navigation" id="navleiste">
	<a href="index.php">Start</a>
	<div class="dropdown">
    <button class="dropbtn">Rubriken 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
	<a href="anzeigelesen.php?Rubriknr=0">Alle Rubriken</a><?php
    
		require_once 'connect.php';
		
		$sql = 'SELECT * FROM anzeigenrubrik';	
		
        foreach ($verb -> query($sql) as $row) {
            echo "<a href='anzeigelesen.php?Rubriknr=".$row["Rubriknr"]."'>".$row["Bezeichnung"]." &nbsp;<i class='".$row["iclass"]."'></i></a>";
        }
		
		$verb = null;
		
        ?>
    </div>
  </div> 
	<a href="rubadd.php">Neue Rubrik eintragen</a>
	<a href="anzeigeneu.php">Neue Anzeige aufgeben</a>
    
	<a href="javascript:void(0);" class="icon nohover" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	</a>
</div>
