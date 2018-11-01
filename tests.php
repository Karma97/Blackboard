<?php 
	
	ob_start();
	session_start();
	
	setlocale(LC_ALL, 'de_DE.utf8');
	
	$head_variante =   2;
	$nav_variante =    2;
	$script_variante = 2;
	$footer_variante = 2;
	
	include 'includes/head.php'; 
	
?>

<body>
	
<?php 

	include 'includes/pacman.php';
	require_once 'includes/connect.php';
	require 'includes/cookiecheck.php';
	
	switch ($nav_variante) {
		case $nav_variante === 1:
			include 'includes/nav/nav_1.php';
			break;
		case $nav_variante === 2:
			include 'includes/nav/nav_2.php';
			break;
		case $nav_variante === 3:
			include 'includes/nav/nav_3.php';
			break;
		case $nav_variante === 4:
			include 'includes/nav/nav_4.php';
			break;
		case $nav_variante === 5:
			include 'includes/nav/nav_5.php';
			break;
	}	
	
?>

<div class="main">
<div class="container-fluid mt-3">
		
	<?php
		
		if (!isset($_GET["seite"]) || $_GET["seite"] == 0 || !is_numeric($_GET["seite"])) {
			echo "Diese Seite existiert nicht";
		} else {
		
		$page = $_GET["seite"];
		
		$limit = 50;
		$start_from = ($page - 1) * $limit;
		
		$sql = "SELECT * FROM news ORDER BY nID LIMIT ".$start_from.", ".$limit."";
		$query = $verb -> query($sql);
		
	?>
	
	<table class="table table-bordered table-striped">  
		<thead>  
			<tr>  
				<th>title</th>  
				<th>body</th>  
			</tr>  
			<thead>  
			<tbody>  
				<?php  
				
				foreach ($query as $row) {  
				
				?>  
							<tr>  
								<td><?php echo $row["nID"]; ?></td>  
								<td><?php echo $row["titel"]; ?></td>  
							</tr>  
				<?php  
				
				};  
				}
				
				?>  
			</tbody>  
	</table>  
		
		<?php
		
		$sql = "SELECT * FROM news";
		$query = $verb -> query($sql);
		$countNumRows = count($query -> fetchAll());
		
		$total_records = $countNumRows;  
		$total_pages = ceil($total_records / $limit);  
		
		if ($total_pages == 1) {
			
		} else {
		
			$pagLink = "<div class='pagination'>";  
			
				for ($i=1; $i<=$total_pages; $i++) {  
							$pagLink .= "<a href='../test/seite-".$i."'><button class='btn btn-sm btn-dark mr-1 ml-1'>".$i."</button></a>";  
				};  
				
			echo $pagLink . "</div>";  
		
		}
	
		?>
		
</div>
</div>

<?php 
	
		switch ($footer_variante) {
			case $footer_variante === 1:
				include 'includes/footer/footer_1.php';
				break;
			case $footer_variante === 2:
				include 'includes/footer/footer_2.php';
				break;
			case $footer_variante === 3:
				include 'includes/footer/footer_3.php';
				break;
			case $footer_variante === 4:
				include 'includes/footer/footer_4.php';
				break;
			case $footer_variante === 5:
				include 'includes/footer/footer_5.php';
				break;
		}
	
	switch ($script_variante) {
		case $script_variante === 1:
			include 'includes/scripts/scripts_1.php';
			break;
		case $script_variante === 2:
			include 'includes/scripts/scripts_2.php';
			break;
		case $script_variante === 3:
			include 'includes/scripts/scripts_3.php';
			break;
		case $script_variante === 4:
			include 'includes/scripts/scripts_4.php';
			break;
		case $script_variante === 5:
			include 'includes/scripts/scripts_5.php';
			break;
	}
	
	ob_end_flush();
	
?>
</body>	
</html>
