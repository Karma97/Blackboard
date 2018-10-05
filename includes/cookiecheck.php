
<?php
	
function generateRandomString($length) { 
    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789%&=#~";
    $charsLength = strlen($characters) -1;
    $string = "";
    for($i = 0; $i < $length; $i++){
        $randNum = mt_rand(0, $charsLength);
        $string .= $characters[$randNum];
    }
    return $string;
}

if (isset($_COOKIE["security_token"]) && isset($_COOKIE["identifier_token"])) {
	
	$identifiertoken = $_COOKIE["identifier_token"];
	$securitytoken = $_COOKIE["security_token"];
	
	$sql_C = "SELECT * FROM `inserent` INNER JOIN cookie_security USING (iNR) WHERE identifier_token = \"".$identifiertoken."\"";					
	$query_C = $verb -> query($sql_C);	
	$row_C = $query_C -> fetch();
	
	if ($securitytoken !== $row_C["security_token"]) {
		unset($_COOKIE["security_token"]);
		setcookie("security_token", '', time() - 3600);		
		
		unset($_COOKIE["identifier_token"]);
		setcookie("identifier_token", '', time() - 3600);			
	} else {
	
		$new_securitytoken = generateRandomString(20);
	
		$sql_C2 = "UPDATE cookie_security SET security_token = \"".$new_securitytoken."\" WHERE identifier_token = \"".$identifiertoken."\"";				
		$query_C2 = $verb -> query($sql_C2);				
		
		setcookie("security_token", $new_securitytoken, time()+(3600*24*365), "/");
		setcookie("identifier_token", $row["identifier_token"], time()+(3600*24*365), "/");
		
		foreach ($verb -> query($sql_C) as $row) {
			$_SESSION['vorname'] = $row["vorname"];
			$_SESSION['nachname'] = $row["nachname"];
			$_SESSION['iNR'] = $row["iNR"];
			$_SESSION['email'] = $row["email"];
			$_SESSION['gebDatum'] = $row["gebdatum"];
			$_SESSION['news'] = $row["newsletter"];			
		}
		
	}
	
} else {

}


?>
