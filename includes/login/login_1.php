
<div class="login_komplett">
	
	<div class="close" onclick="closeLogin('.login_komplett')">
		<div class="closeicon">
			<i class="fas fa-times fa-lg"></i>
		</div>
	</div>
	
	<h1><p class="ueberschrift_login text-center">Schwarzes Brett</p></h1>
	
	<div class="navbar_login">
	  <div class="container">
	    <div class="row login_row">
		  <div class="col">
		    <div id="login_item_add_class" class="navbar_login_item pointer" onclick="showSwitchLogin('#login_item', '#register_item', '.navbar_login_item', '#login_item_add_class', 'navbar_login_item_active')">
		    	Login
		    </div>
		  </div>
		  <div class="col">
		    <div id="register_item_add_class" class="navbar_login_item pointer" onclick="showSwitchLogin('#register_item', '#login_item', '.navbar_login_item', '#register_item_add_class', 'navbar_login_item_active')">
		    	Registrieren
		    </div>
		  </div>
	    </div>
	  </div>
	</div>
	
	<div id="login_item_wrapper">
	
	<div class="container mt-5" id="login_item">
	
		<h3><p class="login_p_tag mt-2 mb-0 text-center">Login zum Schwarzen Brett</p></h3>
		<p class="login_p_tag mt-3 mb-0 text-center">Verwalten Sie Ihre Anzeigen, Accountdaten und vieles mehr!</p>
		
		<div class="login_inputs_container mt-3">
		
		 <form action="abwicklung-login" method="POST" class="formloginregister">
		
			<div class="form-group">
				<label for="login_email">E-Mail</label>
				<input autofocus autocomplete="email" type="email" class="form-control" name="login_email" id="login_email" placeholder="">
			</div>
			<?php
			if ($login_email_leer == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php feldleer(); ?>
			</div>
		
			<?php
			}
			
			if ($login_email_html == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php htmltags(); ?>
			</div>
		
			<?php
			}
			
			if ($login_email_numeric == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php nummern(); ?>
			</div>
		
			<?php
			}
			if ($login_email_ungueltig == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php gültigeemail(); ?>
			</div>
		
			<?php
			}
			?>
			<div class="form-group passwordwrapper">
				<label for="login_pwd">Passwort</label>
				<input autocomplete="" id="login_pwd" type="password" class="form-control" name="login_pwd" placeholder="" />
				<button type="button" onclick="showHidePassword('#login_pwd', '#show_login_passwordi')" title="Passwort anzeigen" class="eyeinput btn-light btn btn-sm rounded-circle"><i id='show_login_passwordi' class="far fa-eye"></i></button>
			</div>
			<?php
			if ($login_password_leer == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php feldleer(); ?>
			</div>
		
			<?php
			}
			if ($login_password_html == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php htmltags(); ?>
			</div>
			
			<?php
			}
			if ($login_error_PwdEmail == true) {
			?>
			
			<div class="text-danger mb-3">
				<?php loginfail(); ?>
			</div>
			
			<?php
			}
			?>
			 <div class="form-group mb-4 mt-3">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" value="1" name="login_remember_me" id="login_remember_me">					
					<label class="custom-control-label login-label" for="login_remember_me">Angemeldet bleiben</label>
				</div>
			 </div>
			 
		    <button class="btn btn-dark mb-5 w-100 mt-3" id="submitLogin" type="submit">Login</button>
			
		  </form>
		  
		</div>
	</div>
	
	</div>
	
	<div id="register_item_wrapper">
	
	<div class="container mt-5" id="register_item">
	
		<h3><p class="login_p_tag mt-2 mb-0 text-center">Registrieren zum Schwarzen Brett</p></h3>
		<p class="login_p_tag mt-3 mb-0 text-center">Registrieren Sie sich um die vollen Funktionen unserer Tauschbörse nutzen zu können!</p>
		
		<div class="register_inputs_container mt-3">
		
		 <form action="abwicklung-register" id="registerForm" method="POST" class="formloginregister">
		 
		 <div class="row">
		   <div class="col-sm">
			 <div class="form-group">
			 	<label for="register_vorname">Vorname</label>
			 	<input autofocus autocomplete='given-name' type="text" class="form-control" name="register_vorname" id="register_vorname" placeholder="">
			 </div> 
		   <?php
			if ($register_vorname_nummer == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php nummern(); ?>
			</div>
		
			<?php
			}
			if ($register_vorname_leer == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php feldleer(); ?>
			</div>
		
			<?php
			}
			if ($register_vorname_html == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php htmltags(); ?>
			</div>
		
			<?php
			}
			?>
		  </div>
		  <div class="col-sm">
			 <div class="form-group">
			 	<label for="register_nachname">Nachname</label>
			 	<input autofocus autocomplete='family-name' type="text" class="form-control" name="register_nachname" id="register_nachname" placeholder="">
			 </div>
		   <?php
			if ($register_nachname_nummer == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php nummern(); ?>
			</div>
		
			<?php
			}
			if ($register_nachname_leer == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php feldleer(); ?>
			</div>
		
			<?php
			}
			if ($register_nachname_html == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php htmltags(); ?>
			</div>
		
			<?php
			}
			?>
		  </div>
		 </div>
		 
			<div class="form-group">
				<label for="register_email">E-Mail</label>
				<input autofocus autocomplete="email" type="email" class="form-control" name="register_email" id="register_email" placeholder="">
			</div>		
		   <?php
			if ($register_email_nummer == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php nummern(); ?>
			</div>
		
			<?php
			}
			if ($register_email_leer == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php feldleer(); ?>
			</div>
		
			<?php
			}
			if ($register_email_html == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php htmltags(); ?>
			</div>
		
			<?php
			}
			if ($register_email_gültig == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php gültigeemail(); ?>
			</div>
		
			<?php
			}
			?>			
		 <div class="row">
		   <div class="col-sm">			
			 <div class="form-group passwordwrapper">
			 	<label for="register_pwd1">Passwort</label>
			 	<input autocomplete="current-password"  type="password" class="form-control" name="register_pwd1" id="register_pwd1" placeholder="">
				<button type="button" onclick="showHidePassword('#register_pwd1', '#show_register1_passwordi')" title="Passwort anzeigen" class="eyeinput btn-light btn btn-sm rounded-circle"><i id='show_register1_passwordi' class="far fa-eye"></i></button>
			 </div>
			<?php
			if ($register_passwort1_html == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php htmltags(); ?>
			</div>
		
			<?php
			}
			if ($register_passwort1_leer == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php feldleer(); ?>
			</div>
			<?php
			}
			?>
		  </div>
		   <div class="col-sm">	
			 <div class="form-group passwordwrapper">
			 	<label for="register_pwd2">Passwort wiederholen</label>
			 	<input autocomplete="current-password"  type="password" class="form-control" name="register_pwd2" id="register_pwd2" placeholder="">
				<button type="button" onclick="showHidePassword('#register_pwd2', '#show_register2_passwordi')" title="Passwort anzeigen" class="eyeinput btn-light btn btn-sm rounded-circle"><i id='show_register2_passwordi' class="far fa-eye"></i></button>
			 </div>
			<?php
			if ($register_passwort2_html == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php htmltags(); ?>
			</div>
		
			<?php
			}
			if ($register_passwort2_leer == true) {
			?>
		
			<div class="text-danger mb-3">
				<?php feldleer(); ?>
			</div>
			<?php
			}
			?>
		   </div>	
		  </div>	
			<?php
			if ($register_passwörter_gleich == true) {
			?>
			
			<div class="text-danger mb-3">
				<?php passwordsame(); ?>
			</div>
			
			<?php
			}
			?>
		 <div class="row mb-3">
		   <div class="col-sm">		  
			 <div class="form-group">
			 	<label for="register_date">Geburtsdatum</label>
			 	<input autocomplete="current-password" type="date" class="form-control" name="register_date" id="register_date" placeholder="">
			 </div>
			<?php
			if ($register_geburtsdatum_leer == true) {
			?>
			
			<div class="text-danger mb-3">
				<?php datumwaehlen(); ?>
			</div>
			
			<?php
			}
			if ($register_geburtsdatum_ausserhalb == true) {
			?>
			
			<div class="text-danger mb-3">
				<?php geburtsdatumausserhalb(); ?>
			</div>
			
			<?php
			}
			?>
			</div>
		   <div class="col-sm">
			 <div class="form-group">
				<div class="custom-control custom-checkbox mt-custom4">
					<input type="checkbox" class="custom-control-input" value="1" name="register_news" id="register_news">					
					<label class="custom-control-label register-label" for="register_news">Wollen Sie unseren Newsletter abonnieren?</label>
				</div>
			 </div>
			<?php
			if ($register_news_html == true) {
			?>
			
			<div class="text-danger mb-3">
				<?php htmltags(); ?>
			</div>
			
			<?php
			}
			?>
			<?php
			if ($register_news_number == true) {
			?>
			
			<div class="text-danger mb-3">
				Es wurden keine Nummern Übermittelt. Bitte wiederholen!
			</div>
			
			<?php
			}
			?>
		   </div>	
		 </div>   
			<?php
			if ($register_account_vorhanden == true) {
			?>
			
			<div class="text-danger mb-3">
				Account ist bereits vorhanden!
			</div>
			
			<?php
			}
			?>
		 
		    <button class="btn btn-dark mb-5 w-100 mt-3" id="submitRegister" type="submit">Registrieren</button>
			
		  </form>
		  
		</div>
	</div>
	
	</div>
	
</div>
