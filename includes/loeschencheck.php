<?php
		$sql77 = "SELECT * FROM anzeigen";	
		$query77 = $verb -> query($sql77);
		$countanzeigendelete = 0;
		
foreach ($verb -> query($sql77) as $row){
	if ($row["created_at"] < date('Y-m-d h:i:s', strtotime('-14 days'))){
		
	$sql88 = "DELETE FROM `r_besitzt_a` WHERE aNR = '".$row["aNR"]."'";	
	$query88 = $verb -> query($sql88);
	
	$sql99 = "DELETE FROM `anzeigen` WHERE aNR = '".$row["aNR"]."'";	
	$query99 = $verb -> query($sql99);
	
	$countanzeigendelete += $query99 -> rowCount();
	
	} else {
		
	}
}

if (isset($_SESSION['vorname']) && isset($_SESSION['identifier_token'])) {
if ($_SESSION['vorname'] === "S_B" && $_SESSION['nachname'] === "Admin" && $_SESSION['identifier_token'] === "rOxrNwMC6TDKXf86QRILJ1R=vUKRTfDsGrJ&CEt1hl3Yv5G9mtbDgEJcFWkxL5An81JJF#Vu5ACK3VyrW&K=JXrzehQDSn=D0XEHY6aE5RKtxe0mvtLLd~JcwJ82Hdzrdjc1b5oT#8=K5XhnyQV1MgFgrIXDhMzQtvO5eB7RWa%4NgJOR0G1yNlwvC4nXkEgCgx9UV3xZP8ShpalLfHejvWzEBD8KbzNxViW%tU5XLpSq~67O7Rh0%NAPcHyrQ3zLdm87ikdi7WCOFr#haw6NwnCosFWEZRNSqX4NMVK554%=C%xUMeIXsQdqMVco2Txfq95=THNdpuvvlR=4pXwQ85Mzycic4C9xK03tJnL5SR=Q8myP2O&Ev6p6pb2xi%KkBXNEVcd#849Iie&EGwvm9%F~Q9JD3BuUMzMW7EHBW3xPgjM1k7MYmdKxe6Haq&ZjlO6gtypuYqT1Wp2HSAigMkWg%t2peTtiSF50XZRB8TGfBPUMWhK" && $_SESSION['gebDatum'] === "9999-09-09") {


if ($countanzeigendelete == 1){
	
?>

<script type="text/javascript">

	alert("Es wurden <?php echo $countanzeigendelete; ?> Anzeige gelöscht, da diese älter als 2 Wochen waren.");

</script>

<?php

} elseif ($countanzeigendelete > 1){
	
?>

<script type="text/javascript">

	alert("Es wurden <?php echo $countanzeigendelete; ?> Anzeigen gelöscht, da diese älter als 2 Wochen waren.");

</script>

<?php

} else {
	
}
}
} else {
	
}
?>
