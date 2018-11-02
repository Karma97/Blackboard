
<div class="headerbar">
	<p class="headerbar-text">WILLKOMMEN AUF DEM SCHWARZEN BRETT</p>
</div>
<div id="scrollnav" class="">
<div class="navigationsleiste" id="navleiste">
	<a href="./startseite" class="navitems startseite navItem">Start</a>
	<div class="dropDown">
		<button class="dropbtn" onclick="showDropdown()">Rubriken 
			<i id="ichange" onclick="showDropdown()" class="fas fa-chevron-circle-right"></i>
		</button>
		<div class="dropdownContent dropdownContentErste animatedParent animateOnce">
			<a class="navitems erste" href="./anzeigen/alle/seite-1">Alle Anzeigen &nbsp;<i class="fas fa-list-ul"></i></a>
			
				<?php
				
				$sql = 'SELECT * FROM rubriken';	
				$query = $verb -> query($sql);
				
				$p = 1;
				
				foreach ($query as $key => $row) {
				
					echo "<a class='navitems' href='./anzeigen/rubrik-".$row["rNR"]."/seite-1'>".$row["bezeichnung"]." &nbsp;<i class='animated fadeInRightShort ".$row["icon"]."'></i></a>";
					
					$p++;
					
				}
				
			?>
			
		</div>
	</div> 
	
    <a class="navitems navItem" href="./news/alle">News</a>

	<?php
	
	if (!isset($_SESSION['vorname']) or !isset($_SESSION['iNR']) or !isset($_SESSION['news'])) {
			
	?>	
	
	<a onclick="openRegister('.login_komplett')" class="navItem pointer float-right faa-parent animated-hover">Registrieren <i class="faa-horizontal faa-slow fas fa-user-plus"></i></a>
	<a onclick="openLogin('.login_komplett')" class="navItem pointer float-right faa-parent animated-hover">Anmelden <i class="faa-horizontal faa-slow fas fa-sign-in-alt"></i></a>	
	
    <?php
	
	} else {
	
	?>
	
	<a class="navitems navItem" href="./anzeigen/erstellen">Anzeige aufgeben</a>
	
	<?php
	
	if ($_SESSION['vorname'] === "S_B" && $_SESSION['nachname'] === "Admin" && $_SESSION['identifier_token'] === "rOxrNwMC6TDKXf86QRILJ1R=vUKRTfDsGrJ&CEt1hl3Yv5G9mtbDgEJcFWkxL5An81JJF#Vu5ACK3VyrW&K=JXrzehQDSn=D0XEHY6aE5RKtxe0mvtLLd~JcwJ82Hdzrdjc1b5oT#8=K5XhnyQV1MgFgrIXDhMzQtvO5eB7RWa%4NgJOR0G1yNlwvC4nXkEgCgx9UV3xZP8ShpalLfHejvWzEBD8KbzNxViW%tU5XLpSq~67O7Rh0%NAPcHyrQ3zLdm87ikdi7WCOFr#haw6NwnCosFWEZRNSqX4NMVK554%=C%xUMeIXsQdqMVco2Txfq95=THNdpuvvlR=4pXwQ85Mzycic4C9xK03tJnL5SR=Q8myP2O&Ev6p6pb2xi%KkBXNEVcd#849Iie&EGwvm9%F~Q9JD3BuUMzMW7EHBW3xPgjM1k7MYmdKxe6Haq&ZjlO6gtypuYqT1Wp2HSAigMkWg%t2peTtiSF50XZRB8TGfBPUMWhK" && $_SESSION['gebDatum'] === "9999-09-09") {
					
	?>
		
	<a class="navitems navItem" href="./adminarea">Adminarea <i class="fas fa-cogs"></i></a>
	
	<?php
		}
	?>
	
	<a title="Logout" href="./logout" class="navitems navItem pointer float-right faa-parent animated-hover">Logout <i class="faa-horizontal faa-slow fas fa-sign-out-alt"></i></a>
	<a title="Mein Account" href="./myaccount" class="navitems navItem pointer float-right faa-parent animated-hover">Mein Account <i class="faa-horizontal faa-slow fas fa-user-circle"></i></a>
	<a title="Merkliste" href="./merkliste" class="navitems navItem pointer float-right"><i class="far fa-clipboard"></i></a>	
	
	<?php
	
	// 
	
	$sql69 = "SELECT * FROM nachrichten WHERE ist_für = '".$_SESSION["iNR"]."' AND gelesen = '0' AND gelöscht = '0'";
	$query69 = $verb -> query($sql69);
	$countNumRows69 = count($query69 -> fetchAll());
	
	if ($countNumRows69 > 0) {
		echo "
		
		<a title='Postfach' href='./postfach' class='navitems navItem pointer float-right'><i class='far fa-envelope-open'></i>
			<div class='postfach_overlay'>
				".$countNumRows69."
			</div>
		</a>
		";
	} else {
		echo "
		
		<a title='Postfach' href='./postfach' class='navitems navItem pointer float-right'><i class='far fa-envelope'></i></a>
	
		";
	}

		
	?>
	
	<?php
	}	
	?>
	<a href="javascript:void(0);" class="icon nohover" onclick="navResponsive()">
		<i class="fa fa-bars"></i>
	</a>
</div>
<div id="scrollNavbarIndicatorContainer">
	<div id="scrollNavbarIndicator">
	
	</div>
</div>
</div>