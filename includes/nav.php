<div class="navigation" id="navleiste">
	<a href="index.php">Start</a>
	<div class="dropdown">
    <button class="dropbtn">Rubriken 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content dropdown-content-erste">
	<a href="anzeigelesen.php?rNR=0">Alle Rubriken</a><?php
    		
		$sql = 'SELECT * FROM rubriken';	
		
        foreach ($verb -> query($sql) as $row) {
            echo "<a href='anzeigelesen.php?rNR=".$row["rNR"]."'>".$row["bezeichnung"]." &nbsp;<i class='".$row["icon"]."'></i></a>";
        }
				
        ?>
    </div>
  </div> 
	<a href="rubadd.php">Neue Rubrik eintragen</a>
	<a href="anzeigeneu.php">Neue Anzeige aufgeben</a>
    
	<a href="javascript:void(0);" class="icon nohover" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	</a>
</div>
