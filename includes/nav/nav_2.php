<?php include 'includes/login/login_2.php'; ?>

<div class="headerbar">
	WILLKOMMEN AUF DEM SCHWARZEN BRETT
</div>
<div class="navigationsleiste" id="navleiste">
	<a href="../startseite" class="navactive navItem">Start</a>
	<div class="dropDown">
		<button class="dropbtn" onclick="showDropdown()">Rubriken  
			<i id="ichange" onclick="showDropdown()" class="fas fa-chevron-circle-right"></i>
		</button>
		<div class="dropdownContent dropdownContentErste">
			<a class="erste" href="../anzeigen/alle">Alle Anzeigen &nbsp;<i class="fas fa-list-ul"></i></a>
			
				<?php
				
				$sql = 'SELECT * FROM rubriken';	
				$query = $verb -> query($sql);
				
				foreach ($query as $key => $row) {
					echo "<a href='../anzeigen/".$row["rNR"]."'>".$row["bezeichnung"]." &nbsp;<i class='".$row["icon"]."'></i></a>";
				}
				
			?>
			
		</div>
	</div> 
	<a class="navItem" href="../rubriken/hinzufügen">Neue Rubrik eintragen</a>
	<a class="navItem" href="../anzeigen/hinzufügen">Neue Anzeige aufgeben</a>
	<a class="navItem" href="../news/alle">News</a>
	
	<a onclick="openRegister('.login_komplett')" class="navItem pointer float-right">Registrieren <i class="fas fa-user-plus"></i></a>
	<a onclick="openLogin('.login_komplett')" class="navItem pointer float-right">Login <i class="fas fa-sign-in-alt"></i></a>
    
	<a href="javascript:void(0);" class="icon nohover" onclick="navResponsive()">
		<i class="fa fa-bars"></i>
	</a>
</div>
