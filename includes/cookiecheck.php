
<?php
	
if (isset($_COOKIE["identifier_token"])) {
	
	$identifiertoken = $_COOKIE["identifier_token"];
	
	$sql_C = "SELECT * FROM `inserent` WHERE identifier_token = \"".$identifiertoken."\"";	
	$count = $verb -> query($sql_C) -> fetchAll();
	
	if (count($count) < 1) {
		
	} else {
	
	foreach ($verb -> query($sql_C) as $row_C) {
		$DBidentifiertoken = $row_C["identifier_token"];
	}
	
	if ($identifiertoken !== $DBidentifiertoken) {
	
		unset($_COOKIE["identifier_token"]);		
		
	} else {
		
		if (!isset($_SESSION['vorname'])) {
		
			foreach ($verb -> query($sql_C) as $row) {
				$_SESSION['vorname'] = $row["vorname"];
				$_SESSION['nachname'] = $row["nachname"];
				$_SESSION['iNR'] = $row["iNR"];
				$_SESSION['kundennummer'] = $row["kundennummer"];
				$_SESSION['identifier_token'] = $row["identifier_token"];
				$_SESSION['email'] = $row["email"];
				$_SESSION['gebDatum'] = $row["gebdatum"];
				$_SESSION['news'] = $row["newsletter"];			
			}
			
		} else {
		
		}
	  }
	}
	
} else {

}


?>
