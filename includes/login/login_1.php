
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
		
		 <form action="abwicklung-login" method="POST">
		
			<div class="form-group">
				<label for="login_email">E-Mail</label>
				<input autofocus autocomplete="email" type="email" class="form-control" name="login_email" required id="login_email" placeholder="">
			</div>
			
			<div class="form-group">
				<label for="login_pwd">Passwort</label>
				<input autocomplete="current-password" type="password" class="form-control" name="login_pwd" required id="login_pwd" placeholder="">
			</div>
			<?php
			if ($loginerrorPwdEmail == true) {
			?>
			
			<div class="text-danger mb-3">
				Passwort oder E-Mail falsch!
			</div>
			
			<?php
			}
			?>
			 <div class="form-group mb-3">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" value="1" name="login_remember_me" id="login_remember_me">					
					<label class="custom-control-label login-label" for="login_remember_me">Angemeldet bleiben</label>
				</div>
			 </div>
			 
		    <button class="btn btn-dark mb-3 w-100" id="submitLogin" type="submit">Login</button>
			
		  </form>
		  
		</div>
	</div>
	
	</div>
	
	<div id="register_item_wrapper">
	
	<div class="container mt-5" id="register_item">
	
		<h3><p class="login_p_tag mt-2 mb-0 text-center">Registrieren zum Schwarzen Brett</p></h3>
		<p class="login_p_tag mt-3 mb-0 text-center">Registrieren Sie sich um die vollen Funktionen unserer Tauschbörse nutzen zu können!</p>
		
		<div class="register_inputs_container mt-3">
		
		 <form action="abwicklung-register" id="registerForm" method="POST">
		 
		 <div class="row">
		   <div class="col-sm">
			 <div class="form-group">
			 	<label for="register_vorname">Vorname</label>
			 	<input autofocus type="text" class="form-control" name="register_vorname" required id="register_vorname" placeholder="">
			 </div> 
		  </div>
		  <div class="col-sm">
			 <div class="form-group">
			 	<label for="register_nachname">Nachname</label>
			 	<input autofocus type="text" class="form-control" name="register_nachname" required id="register_nachname" placeholder="">
			 </div>
		  </div>
		 </div>
		 
			<div class="form-group">
				<label for="register_email">E-Mail</label>
				<input autofocus autocomplete="email" type="email" class="form-control" name="register_email" required id="register_email" placeholder="">
			</div>		
			<?php
			if ($registerEmailUnvalid == true) {
			?>
			
			<div class="text-danger mb-3">
				Die eingegebene E-mail ist ungültig!
			</div>
			
			<?php
			}
			?>
			
		 <div class="row">
		   <div class="col-sm">			
			 <div class="form-group">
			 	<label for="register_pwd1">Passwort</label>
			 	<input autocomplete="current-password"  type="password" class="form-control" name="register_pwd1" required id="register_pwd1" placeholder="">
			 </div>
		  </div>
		   <div class="col-sm">	
			 <div class="form-group">
			 	<label for="register_pwd2">Passwort wiederholen</label>
			 	<input autocomplete="current-password"  type="password" class="form-control" name="register_pwd2" required id="register_pwd2" placeholder="">
			 </div>
		   </div>	
		  </div>	   
			<?php
			if ($registerPwdNotSame == true) {
			?>
			
			<div class="text-danger mb-3">
				Passwörter müssen übereinstimmen!
			</div>
			
			<?php
			}
			?>
		 <div class="row mb-3">
		   <div class="col-sm">		  
			 <div class="form-group">
			 	<label for="register_date">Geburtsdatum</label>
			 	<input autocomplete="current-password" type="date" class="form-control" name="register_date" required id="register_date" placeholder="">
			 </div>
		   </div>
		   <div class="col-sm">
			 <div class="form-group">
				<div class="custom-control custom-checkbox mt-custom4">
					<input type="checkbox" class="custom-control-input" value="1" name="register_news" id="register_news">					
					<label class="custom-control-label register-label" for="register_news">Wollen Sie unseren Newsletter abonnieren?</label>
				</div>
			 </div>
		   </div>	
		 </div>   
			<?php
				if ($registerAccountVorhanden == true) {
			?>
			
			<div class="text-danger mb-3">
				Account ist bereits vorhanden!
			</div>
			
			<?php
			}
			?>
		 
		    <button class="btn btn-dark mb-3 w-100" id="submitRegister" type="submit">Registrieren</button>
			
		  </form>
		  
		</div>
	</div>
	
	</div>
	
</div>
