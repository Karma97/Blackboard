<div class="headerbar">
	WILLKOMMEN AUF DEM SCHWARZEN BRETT
</div>
<div class="navigationsleiste" id="navleiste">
	<a href="startseite" class="navactive navItem">Start</a>
	<div class="dropDown">
		<button class="dropbtn" onmouseover="Ix('#ichange', 'fa-caret-right')" onmouseout="Iarrow('#ichange', 'fa-caret-right')">Rubriken 
			<i id="ichange" class="fa fa-caret-right"></i>
		</button>
		<div class="dropdownContent dropdownContentErste" onmouseover="Ix('#ichange', 'fa-caret-right')" onmouseout="Iarrow('#ichange', 'fa-caret-right')">
			<a class="erste" href="anzeigen?rNR=0">Alle Rubriken &nbsp;<i class="fas fa-list-ul"></i></a>
				<?php
				
				$sql = 'SELECT * FROM rubriken';	
				$query = $verb -> query($sql);
				
				foreach ($query as $key => $row) {
					echo "<a  href='anzeigen?rNR=".$row["rNR"]."'>".$row["bezeichnung"]." &nbsp;<i class='".$row["icon"]."'></i></a>";
				}
				
			?>
		</div>
	</div> 
	<a class="navItem" href="rubrik-hinzufuegen">Neue Rubrik eintragen</a>
	<a class="navItem" href="anzeige-hinzufuegen">Neue Anzeige aufgeben</a>
    
	<a href="javascript:void(0);" class="icon nohover" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	</a>
</div>
