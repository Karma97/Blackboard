<?php
	ob_start();
	session_start();
	
	$head_variante =   3;
	$nav_variante =    3;
	$script_variante = 3;
	$footer_variante = 3;
	
	include 'includes/head.php'; 
	
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		require 'includes/cookiecheck.php';		
		include 'includes/nav.php';			
		
		?>
		
		<div class="main">
		<div class="container mt-3">
			<?php
			
			
			
				$alle = false;	
				$page_vorhanden = false;
				
				if (!isset($_GET["seite"]) || $_GET["seite"] == 0 || !is_numeric($_GET["seite"])) {
					
				} else {
				
				$page = $_GET["seite"];
				
				$limit = 500;
				$start_from = ($page - 1) * $limit;
				
				$page_vorhanden = true;
				
				}
				
				
				if ($page_vorhanden == true) {

					$abfrage = "SELECT inserent.iNR, orte.Bezeichnung, anzeigen.aNR, anzeigen.ortID, anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM anzeigen INNER JOIN orte USING(ortID) INNER JOIN inserent USING (iNR) LIMIT ".$start_from.", ".$limit."";	
					
				} else {

					$abfrage = "SELECT inserent.iNR, orte.Bezeichnung, anzeigen.aNR, anzeigen.ortID, anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM anzeigen INNER JOIN orte USING(ortID) INNER JOIN inserent USING (iNR)";
				
				}
				
					
				if ($_GET["rNR"] == 0 OR $_GET["rNR"] == "alle") {
					
					$alle = true;	
					
					} elseif ($_GET["rNR"] >= 1) {
						
					$zahl = $_GET["rNR"];
					
						if ($page_vorhanden == true) {
							$abfrage = "SELECT inserent.iNR, orte.Bezeichnung, anzeigen.ortID, anzeigen.aNR, anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM r_besitzt_a INNER JOIN anzeigen USING(aNR) INNER JOIN rubriken USING(rNR) INNER JOIN orte USING (ortID) INNER JOIN inserent USING (iNR) WHERE rNR = '".$zahl."' LIMIT ".$start_from.", ".$limit."";		
						} else {
							$abfrage = "SELECT inserent.iNR, orte.Bezeichnung, anzeigen.ortID, anzeigen.aNR, anzeigen.betreff, anzeigen.beschreibung, anzeigen.created_at FROM r_besitzt_a INNER JOIN anzeigen USING(aNR) INNER JOIN rubriken USING(rNR) INNER JOIN orte USING (ortID) INNER JOIN inserent USING (iNR) WHERE rNR = '".$zahl."'";					
						}
										
					} else {
					
				};
								
				$query = $verb -> query($abfrage);
				$queryNumRows2 = $query -> fetchAll();
				
				if (count($queryNumRows2) <= 0) {
					
					echo "
					
					<div class='card mb-2'>
						<div class='card-header bg-dark text-white'>
					
					";
					
					if ($alle == false) {
						
						$abfrage3 = "SELECT bezeichnung, icon FROM rubriken WHERE rNR = '".$zahl."'";							
						$query3 = $verb -> query($abfrage3);	
						
						foreach ($query3 as $row) {
							echo "
							
							<p class='float-left d-inline mb-0 buttonpadding'>
								<i class='".$row["icon"]."'></i>&nbsp; ".strip_tags($row["bezeichnung"])."
							</p>
							
							<a href='../../anzeigen/alle/seite-1' class='float-right'>
								<button class='btn btn-sm btn-light'>Alle Anzeigen</button>
							</a>
							
							";
						}
						
					} else {
						
						echo "Alle Anzeigen";
						
					}
							
					echo "
					
						</div>
					</div>
					
					Es wurden keine Anzeigen gefunden. &nbsp; <button onclick='window.history.back();' type='button' class='btn btn-dark'>Zurück</button>
					
					";
					
				} else {
				
					echo "
					
					<div class='card mb-2'>
						<div class='card-header bg-dark text-white'>
					
					";
					
					if ($alle == false) {
						
						$abfrage3 = "SELECT bezeichnung, icon FROM rubriken WHERE rNR = '".$zahl."'";							
						$query3 = $verb -> query($abfrage3);	
						
						foreach ($query3 as $row) {
							echo "
							
							<p class='float-left d-inline mb-0 buttonpadding'>
								<i class='".$row["icon"]."'></i>&nbsp; ".strip_tags($row["bezeichnung"])."
							</p>
							
							<a href='../../anzeigen/alle/seite-1' class='float-right'>
								<button class='btn btn-sm btn-light'>Alle Anzeigen</button>
							</a>
							
							";
						}
						
					} else {
						
						echo "Alle Anzeigen";
						
					}
							
					echo "
					
						</div>
					</div>
					
					";
					
				echo "
					<div class='form-group mb-5'>
						<input type='text' class='form-control' id='searchA' placeholder='nach Anzeige/Betreff/Ort/Datum suchen'>
					</div>
					";
					
					if ($page_vorhanden == true) {
						
						if ($alle == true) {
							$sql34 = "SELECT * FROM anzeigen";							
						} else {						
							$sql34 = "SELECT * FROM r_besitzt_a INNER JOIN anzeigen USING(aNR) WHERE rNR = '".$zahl."'";
						}
						$query34 = $verb -> query($sql34);
						$countNumRows = count($query34 -> fetchAll());
						
						$total_records = $countNumRows;  
						$total_pages = ceil($total_records / $limit);  
						
						if ($total_pages == 1) {
						
						} else {
						
							$pagLink = "
							<div class='pagination w-100 mb-3'>
								<div class='pagination-container w-auto ml-auto mr-auto'>
							";  
						
							if ($alle == true) {
							
								if ($page > 1) {
									$pagLink .= "<a class='mr-2 nohref' href='../../anzeigen/alle/seite-".($page - 1)."'><i class='d-inline fas fa-angle-double-left'></i></a>";					
								} else {
								}
												
									if ($page == 1) {
										$pagLink .= "<a href='../../anzeigen/alle/seite-1'><button class='rounded btn btn-sm btn-danger mr-1 ml-1'>1</button></a>";
									} else {
										$pagLink .= "<a href='../../anzeigen/alle/seite-1'><button class='rounded btn btn-sm btn-dark mr-1 ml-1'>1</button></a>";
									}
									
									$start = 0;
									$sum = 0;
									
									for ($i = $start; $i <= $total_pages; $i++) {
										$sum += $i;
									}
									
									/*
									$sum = round($sum / $total_pages, 0);
									
									
										for ($i = 2; $i <= ($total_pages - 1); $i++) {
											if ($i == $page) {
												$pagLink .= "<a href='../../anzeigen/alle/seite-".$i."'><button class='rounded btn btn-sm btn-danger mr-1 ml-1'>".$i."</button></a>";
											} else {
												$pagLink .= "<a href='../../anzeigen/alle/seite-".$i."'><button class='rounded btn btn-sm btn-dark mr-1 ml-1'>".$i."</button></a>";
											}
										}
									*/
												
			 						if ($page == $total_pages) {
										$pagLink .= "<a href='../../anzeigen/alle/seite-".$total_pages."'><button class='rounded btn btn-sm btn-danger mr-1 ml-1'>".$total_pages."</button></a>"; 
									} else {
										$pagLink .= "<a href='../../anzeigen/alle/seite-".$total_pages."'><button class='rounded btn btn-sm btn-dark mr-1 ml-1'>".$total_pages."</button></a>"; 
									}
									
								if ($page == $total_pages) {
									
								} else {

									$pagLink .= "<a class='ml-2 nohref' href='../../anzeigen/alle/seite-".($page + 1)."'><i class='d-inline fas fa-angle-double-right'></i></a>";		
								}
									
							} else {
								if ($page > 1) {
									$pagLink .= "<a class='mr-2 nohref' href='../../anzeigen/rubrik-".$zahl."/seite-".($page - 1)."'><i class='d-inline fas fa-angle-double-left'></i></a>";					
								} else {
								}
												
									if ($page == 1) {
										$pagLink .= "<a href='../../anzeigen/rubrik-".$zahl."/seite-1'><button class='rounded btn btn-sm btn-danger mr-1 ml-1'>1</button></a>";
									} else {
										$pagLink .= "<a href='../../anzeigen/rubrik-".$zahl."/seite-1'><button class='rounded btn btn-sm btn-dark mr-1 ml-1'>1</button></a>";
									}
									
									$start = 0;
									$sum = 0;
									
									for ($i = $start; $i <= $total_pages; $i++) {
										$sum += $i;
									}
									
									/*
									$sum = round($sum / $total_pages, 0);
									
									
										for ($i = 2; $i <= ($total_pages - 1); $i++) {
											if ($i == $page) {
												$pagLink .= "<a href='../../anzeigen/rubrik-".$zahl."/seite-".$i."'><button class='rounded btn btn-sm btn-danger mr-1 ml-1'>".$i."</button></a>";
											} else {
												$pagLink .= "<a href='../../anzeigen/rubrik-".$zahl."/seite-".$i."'><button class='rounded btn btn-sm btn-dark mr-1 ml-1'>".$i."</button></a>";
											}
										}
									*/
												
			 						if ($page == $total_pages) {
										$pagLink .= "<a href='../../anzeigen/rubrik-".$zahl."/seite-".$total_pages."'><button class='rounded btn btn-sm btn-danger mr-1 ml-1'>".$total_pages."</button></a>"; 
									} else {
										$pagLink .= "<a href='../../anzeigen/rubrik-".$zahl."/seite-".$total_pages."'><button class='rounded btn btn-sm btn-dark mr-1 ml-1'>".$total_pages."</button></a>"; 
									}
									
								if ($page == $total_pages) {
									
								} else {

									$pagLink .= "<a class='ml-2 nohref' href='../../anzeigen/rubrik-".$zahl."/seite-".($page + 1)."'><i class='d-inline fas fa-angle-double-right'></i></a>";		
								}
									
									
							}
						
							echo $pagLink."</div></div>";  
						
						}	
					} else {
					
					}
					
					echo "
					<div id='alle_anzeigen' class='animatedParent animateOnce' data-sequence='320'>
				";
				
				setlocale(LC_ALL, 'de_DE.utf8');
				
				$monatsnamen = array(1=>"Januar",2=>"Februar",3=>"März",4=>"April",5=>"Mai",6=>"Juni",7=>"Juli",8=>"August",9=>"September",10=>"Oktober",11=>"November",12=>"Dezember");
				
				$k = 1;
				
				foreach ($verb -> query($abfrage) as $row) {
				
				$monat = date("n", strtotime($row["created_at"]));
				
				$crypt_iNR = str_replace("/", "",crypt($row["iNR"],'SB'));
				
					echo "
					
					<div onclick=\"window.location.href = '../../anzeigen/anzeige-".$row["aNR"]."'\" class='pointer card mb-3 animated fadeInDownShort' data-id='".$k."'  title='Jetzt klicken um zur Anzeige mit dem Betreff \"".strip_tags($row["betreff"])."\" zu kommen!'>
						<div class='card-header bg-dark text-white'>
							<p class='d-inline mb-0 mt-0 buttonpadding2'>
								".strip_tags($row["betreff"])."
							</p>
							
							<a href='../../profil/".$crypt_iNR."'>
							<button title='Jetzt klicken um zum Inserenten zu kommen!' class='btn btn-sm btn-light float-right'>
								Zum Inserenten
							</button>
							</a>
						</div>
					<div class='card-body border-dark'>
					
					".strip_tags($row["beschreibung"])."
					
						<br><br>
						
						Online seit dem 
						".date("d.", strtotime($row["created_at"]))."
						".$monatsnamen[$monat]." 
						".date("Y", strtotime($row["created_at"])).",  
						".date("H", strtotime($row["created_at"])).":00 Uhr<br>
						
						Ort: ".strip_tags($row["Bezeichnung"])."
						
					</div>
					
					";
					
					if ($alle == true) {
					
					echo "
					
					<div class='card-footer bg-light'>
						Aus der Rubrik: ";
						
						$abfrage2 = "SELECT * FROM r_besitzt_a INNER JOIN rubriken USING (rNR) WHERE aNR = '".$row["aNR"]."'";
						$query2 = $verb -> query($abfrage2);					
						
					foreach ($query2 as $row2) {
						echo "&nbsp; <a href='../rubrik-".$row2["rNR"]."/seite-1' title='Jetzt klicken um zu den Anzeigen zu kommen, die zu der Rubrik mit der Bezeichnung \"".$row2["bezeichnung"]."\" gehören, zu gelangen!'><button class='btn btn-sm btn-dark mb-1'>".strip_tags($row2["bezeichnung"])."</button></a>";
					}
						
					echo "
						
					</div>
					
					";
					
					}
					
					echo "	
					
					</div>
					
					";
					
					$k++;
					
				}
				
				
				}
			?>
					
		</div>	
		</div>
	<?php 
		
		include 'includes/footer.php';	
		include 'includes/scripts.php';	
		
		require_once 'includes/loeschencheck.php';
		
		ob_end_flush();
	?>
	</body>
	
</html>