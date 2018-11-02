<?php 
	
	ob_start();
	session_start();
	
	setlocale(LC_ALL, 'de_DE.utf8');
	
	$head_variante =   1;
	$nav_variante =    1;
	$script_variante = 1;
	$footer_variante = 1;
	
	include 'includes/head.php'; 
	
	include 'includes/pacman.php';
	require_once 'includes/connect.php';	
	require 'includes/cookiecheck.php';
	
	include 'includes/nav.php';	
	
?>

<div class="main">
<div class="container-fluid mt-3">
	
<?php
	
	if (!isset($_SESSION['vorname']) or !isset($_SESSION['iNR']) or !isset($_SESSION['news'])) {
	
	header("Location: ./startseite");
	
?>
	
	<h4><p class="text-danger text-center">Um diese Funktion nutzen zu können, müssen Sie angemeldet sein!</p></h4>
	
	</div>
	</div>	
	
<?php
	
	} else {
	
?>
  
  <div class="card anzeigencard">
	<div class="card-header bg-dark text-white">
		<i class="fas fa-users"></i> &nbsp;Benutzerliste
	</div>
	<div class="card-body">
		<div class="row">
		<?php
		
		$sql = "SELECT * FROM inserent INNER JOIN besucherzahlen USING (iNR) ORDER BY iNR";
		$query = $verb -> query($sql);
		$countNumRows = count($query -> fetchAll());
		
		if ($countNumRows < 1) {
			?>
			
			
			
			<?php
		} else {
		
			$i = 0;
			
			foreach ($verb -> query($sql) as $row) {
				if ($i > 0) {
				
				$crypt_iNR = str_replace("/", "", crypt($row["iNR"],'SB'));
				
					echo "
					<div class='col-lg-6' title='Jetzt Doppelklicken um zum Profil von \"".$row["vorname"]." ".$row["nachname"]."\" zu kommen!' ondblclick=\"window.location.href = './profil/".$crypt_iNR."'\">
						<div class='card bg-light mt-1 mb-1 p-2'>
							<div class='mb-0 mt-0 d-inline w-100'>
								";
								
								if ($row["profilbildpfad"] != null && file_exists("profilbilder/".$row["iNR"]."/".$row["profilbildpfad"]."")) {
									echo "
									
									<img src='profilbilder/".$row["iNR"]."/".$row["profilbildpfad"]."' width='25' height='25' class='d-inline-block rounded-circle'>
									
									";
								} else {
									echo "
									
									<img src='images/user.png' class='rounded-circle d-inline' width='25' height='25'>
									
									";
								}
								
								echo "
								
								~ ".$row["vorname"]." ".$row["nachname"]."
								
								<p class='listeprofile mb-0 mt-0 d-inline float-right'>
								
								";
								
								$sql2 = "SELECT * FROM anzeigen WHERE iNR = '".$row["iNR"]."'";
								$query2 = $verb -> query($sql2);
								$countNumRows2 = count($query2 -> fetchAll());
								
								echo $countNumRows2;
								
								echo "
									<i title='Aktuell ".$countNumRows2." Anzeigen' class='fas fa-clipboard-list'></i>
									
									&nbsp;
									&nbsp;
									
									".$row["besucherzahl"]."
									<i title='Aktuell ".$row["besucherzahl"]." Profilaufrufe' class='fas fa-eye'></i>
									
									&nbsp;
									&nbsp;
									
									<a title='Nachricht schreiben' href='mailto:".$row["email"]."'><i class='fa-lg far fa-envelope'></i></a>
								</p>
							</div>
						</div>
					</div>
					";					
				}
				
				$i++;
				
			}
			
		}
		
		?>
		</div>
	</div>
  </div>
  
  </div>
  </div>
 
<?php 
	}
	
		require_once 'includes/loeschencheck.php';
		
		include 'includes/footer.php';	
		include 'includes/scripts.php';		
		
		ob_end_flush();
		
?>
  
</body>
</html>
