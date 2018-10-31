<?php
	
	function is_html($string){
		return $string != strip_tags($string) ? true:false;
	}
	
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
	
	
	function generateKundennummer($length) { 
			$characters = "123456789";
			$charsLength = strlen($characters) -1;
			$string = "";
				for($i = 0; $i < $length; $i++){
					$randNum = mt_rand(0, $charsLength);
					$string .= $characters[$randNum];
				}
			return $string;
	}
	
	function feldleer() {
		echo "
		
		Bitte Feld ausfüllen!
		
		";
	}
	
	function htmltags() {
		echo "
		
		Es dürfen keine HTML-Tags weitergeleitet werden!
		
		";
	}
	
	function nummern() {
		echo "
		
		Bitte nicht nur Nummern angeben!
		
		";	
	}
	
	function gültigeemail() {
		echo "
		
		Keine gültige E-Mail!
		
		";	
	}
	
	function loginfail() {
		echo "
		
		Passwort oder E-Mail falsch!
		
		";	
	}
	
	function passwordsame() {
		echo "
		
		Passwörter müssen Übereinstimmen!
		
		";	
	}
	
	function datumwaehlen() {
		echo "
		
		Bitte Datum auswählen!
		
		";	
	}
	
	function geburtsdatumausserhalb() {
		echo "
		
		Sie müssen mindestens 14 Jahre Alt sein um die Funktionen unseren Webseite nutzen zu können!
		
		";	
	}
	
	
	
?>