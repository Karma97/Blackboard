<?php 
	
	ob_start();
	session_start();
	
	setlocale(LC_ALL, 'de_DE.utf8');
	
	$head_variante =   1;
	$nav_variante =    1;
	$script_variante = 1;
	$footer_variante = 1;
	
	include 'includes/head.php'; 
	
?>

<body>
	
<?php 
	
	include 'includes/pacman.php';
	require_once 'includes/connect.php';	
	require 'includes/cookiecheck.php';
	
	include 'includes/nav.php';	
	
?>

<div class="main">
<div class="container-fluid mt-3">
	
<?php
	
	if (!isset($_SESSION['vorname']) or !isset($_SESSION['iNR']) or !isset($_SESSION['news'])) {
	
	header("Location: ../startseite");
	
?>
	
	<h4><p class="text-danger text-center">Um diese Funktion nutzen zu können, müssen Sie angemeldet sein!</p></h4>
	
	</div>
	</div>	
	

	
<?php

	} else {

	echo "<br>";

	if (isset($_FILES["file"])) {

    $j = 0; 

    for ($i = 0; $i < count($_FILES['file']['name']); $i++) { 

		$target_path1 = "newsbilder/"; 

        $validextensions = array("jpeg", "jpg", "png");
        $ext = explode('.', basename($_FILES['file']['name'][$i]));
        $file_extension = end($ext); 

        $target_path2 = $target_path1.str_replace("/", "", crypt($_FILES['file']['name'][$i], "SB")).".".$ext[count($ext) - 1];

		$sql90 = "INSERT INTO `newsbilder`(`bID`, `nID`, `bildpfad`, `created_at`, `updated_at`) VALUES ( null, '1', '".$target_path1.$_FILES['file']['name'][$i]."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
		
		$query90 = $verb -> query($sql90);

        $j = $j + 1;   

        if (($_FILES["file"]["size"][$i] < (count($_FILES['file']['name']) * (1048576 * 4))) 
            && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path2)) {

                echo $j.
                ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
	
            } else {

                echo $j.
                ').<span id="error">please try again!.</span><br/><br/>';

            }

        } else {
		
            echo $j.
            ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
	
			}
		}
	}
?>

<script type="text/javascript">

</script>
  
  <br>
  
	<form id="form" action="upload" method="post" enctype="multipart/form-data">
		<input type="file" name="file[]" id="uploadNews" multiple><br><br>
		<input type="submit" value="send this bitch">
	</form>
	
	<div id="imagepreview" class="d-none">
		<br>Ihre Bilder
		<hr>
		<div id="imagepreview_images">
		
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
