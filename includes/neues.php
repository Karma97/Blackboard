<div class="ncontainer">
	<div class="neuigkeiten">
		<h2>Neuigkeiten</h2>
		<hr>
	</div>
	<div class="ncontent">
		<div class="news">
		<?php 
		
		$abfrage = "SELECT * FROM news ORDER BY erstelldatum DESC";		
		require_once("includes/connect.php");
		
		pdo();

		foreach ($pdo -> query($abfrage) as $row) {
			echo "<a href='news.php?nid=".$row["newsID"]."'><div class='news'><b>".$row["titel"]."</b><br>vom ".date('d.m.y', strtotime($row['erstelldatum']))."</div></a>";
		}
		
		$pdo = null;
		
		?>
	</div>	
</div>
</div>