<div class="topnav" id="myTopnav">
	<a href="index.php">Start</a>
	<a href="rubadd.php">Neue Rubrik eintragen</a>
	<a href="anzeigeneu.php">Neue Anzeige aufgeben</a>
	<div class="dropdown">
        <button class="dropbtn" onmouseover="Ix()" onmouseout="IarrowUp()">Rubriken
            <i id="ichange" class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" onmouseover="Ix()" onmouseout="IarrowUp()">
        <a href="rubriken.php?rn=0" class="alleR">Alle &nbsp;<i class="fas fa-list-ul"></i></a>
        <?php
        
		require_once 'connect.php';
		
		$sql = 'SELECT * FROM anzeigenrubrik';	
		
        foreach ($verb -> query($sql) as $row) {
            echo "<a href='rubriken.php?Rubriknr=".$row["Rubriknr"]."'>".$row["Bezeichnung"]." &nbsp;<i class='".$row["iclass"]."'></i></a>";
        }
		
        ?>
        </div>
    </div>
	<a href="javascript:void(0);" class="icon nohover" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	</a>
</div>
