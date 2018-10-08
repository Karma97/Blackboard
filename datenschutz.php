<?php 
	ob_start();
	session_start();
	
	$head_variante = 1;	
	$script_variante = 1;
	$nav_variante = 1;
	$footer_variante = 1;
	
	include 'includes/head.php'; 
	
?>
	<body>
	<?php 
		include 'includes/pacman.php';
		require_once 'includes/connect.php';
		
		require 'includes/cookiecheck.php';
		
		$nav_variante = 1;
		
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
	<h2>Datenschutz- und Cookie-Hinweis</h2>
	
<h4>Cookies</h4>
	<p>Cookies sind Textdateien, die automatisch bei dem Aufruf einer Webseite lokal im Browser des Besuchers abgelegt werden. Diese Website setzt Cookies ein, um das Angebot nutzerfreundlich und funktionaler zu gestalten. Dank dieser Dateien ist es beispielsweise möglich, auf individuelle Interessen abgestimmte Informationen auf einer Seite anzuzeigen. Auch Sicherheitsrelevante Funktionen zum Schutz Ihrer Privatsphäre werden durch den Einsatz von Cookies ermöglicht. Der ausschließliche Zweck besteht also darin, unser Angebot Ihren Kundenwünschen bestmöglich anzupassen und die Seiten-Nutzung so komfortabel wie möglich zu gestalten. Mit Anwendung der DSGVO 2018 sind Webmaster dazu verpflichtet, der unter https://eu-datenschutz.org/ veröffentlichten Grundverordnung Folge zu leisten und seine Nutzer entsprechend über die Erfassung und Auswertung von Daten in Kenntnis zu setzen. Die Rechtmäßigkeit der Verarbeitung ist in Kapitel 2, Artikel 6 der DSGVO begründet.</p>
	<h4>Google Analytics</h4>
	<p>Dieses Angebot nutzt ebenfalls den Webanalysedienst Google Analytics, ein Programm der Google Inc. („Google, USA“). Die durch das Tracking erfassten Informationen zu Ihrer Nutzung dieser Website werden auf einem Server von Google in den USA gespeichert. Durch eine sogenannte IP-Anonymisierung wird Ihre IP-Adresse von Google innerhalb von Mitgliedstaaten der Europäischen Union oder in anderen Vertragsstaaten des Abkommens über den Europäischen Wirtschaftsraum zuvor gekürzt. Somit ist der Standort Ihres Browsers lediglich regional zuortbar, nicht aber ihrer Person. Google kann Besucherverhalten auswerten, um Reports über die Websiteaktivitäten zusammenzustellen. Auch weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen können so gegenüber dem Websitebetreiber erbracht werden.</p>
	<h4>Facebook-Plugins (Like-Button)</h4>
	<p>uf dieser Website werden Like-Buttons des sozialen Netzwerks Facebook (Facebook Inc., 1601 Willow Road, Menlo Park, California, 94025, USA) eingesetzt. Wenn Sie unsere Seiten besuchen, wird über das Social-Sharing-Plugin eine Verbindung zwischen dem Browser und Facebook hergestellt. Facebook erhält dadurch Information über das Nutzungsverhalten auf der Website. Durch Klicken des „Like-Buttons“ während Sie in Ihrem Facebook-Account eingeloggt sind, können die Inhalte unserer Seiten mit Ihrem Facebook-Profil in Verbindung gebracht werden. Der Betreiber dieser Website hat keine Möglichkeit des Zugriffs auf übermittelte Daten, sowie keine Kenntnis über deren Nutzung durch Facebook. Wenn Sie nicht wünschen, dass Facebook den Besuch unserer Seiten Ihrem Facebook-Account zuordnen kann, loggen Sie sich bitte aus Ihrem Facebook-Benutzerkonto aus.</p>
	<h4>Retargeting</h4>
	<p>Diese Website verwendet ebenfalls Retargeting-Technologie, um auf Websites unserer Partner gezielt User mit Werbung anzusprechen, die sich bereits für unsere Produkte interessiert haben. Die Einblendung der Werbemittel erfolgt beim Retargeting auf der Basis eines Cookies, welcher gesetzt wird, wenn eine Produktseite aufgerufen wird. Selbstverständlich werden auch hierbei keine personenbezogenen Daten gespeichert und ebenso selbstverständlich erfolgt die Verwendung der Retargeting-Technologie unter Beachtung der geltenden gesetzlichen Datenschutzbestimmungen. Wenn Sie nicht möchten, dass Ihnen interessenbezogene Werbung angezeigt wird, können Sie Besucher die Verwendung von Cookies durch Google deaktivieren können, indem sie die Anzeigenvorgaben aufrufen. Alternativ können Ihre Besucher die Verwendung von Cookies durch Drittanbieter deaktivieren, indem sie die Deaktivierungsseite der Netzwerkwerbeinitiative aufrufen.</p>
	<h4>Kommentare</h4>
	<p>Wenn Besucher Kommentare auf der Website schreiben, sammeln wir die Daten, die im Kommentar-Formular angezeigt werden, außerdem die IP-Adresse des Besuchers und den User-Agent-String (damit wird der Browser identifiziert), um die Erkennung von Spam zu unterstützen.

Aus deiner E-Mail-Adresse kann eine anonymisierte Zeichenfolge erstellt (auch Hash genannt) und dem Gravatar-Dienst übergeben werden, um zu prüfen, ob du diesen benutzt. Die Datenschutzerklärung des Gravatar-Dienstes findest du hier: https://automattic.com/privacy/. Nachdem dein Kommentar freigegeben wurde, ist dein Profilbild öffentlich im Kontext deines Kommentars sichtbar.

Wenn du einen Kommentar auf unserer Website schreibst, kann das eine Einwilligung sein, deinen Namen, E-Mail-Adresse und Website in Cookies zu speichern. Dies ist eine Komfortfunktion, damit du nicht, wenn du einen weiteren Kommentar schreibst, all diese Daten erneut eingeben musst. Diese Cookies werden ein Jahr lang gespeichert.</p>
	<h4>Dein Datenschutzrecht</h4>
	<p>Wenn du ein Konto auf dieser Website besitzt oder Kommentare geschrieben hast, kannst du einen Export deiner personenbezogenen Daten bei uns anfordern, inklusive aller Daten, die du uns mitgeteilt hast. Darüber hinaus kannst du die Löschung aller personenbezogenen Daten, die wir von dir gespeichert haben, anfordern. Dies umfasst nicht die Daten, die wir aufgrund administrativer, rechtlicher oder sicherheitsrelevanter Notwendigkeiten aufbewahren müssen. In diesem Fall kannst du deine E-Mail an die im Impressum genannten Kontaktadresse senden. Nenne dabei die Website auf der du deinen Kommentar hinterlassen hast. Wir überprüfen dann ob für die Absender-Email-Adresse Informationen gespeichert wurden, und senden dir ggf. zur Auskunft den vollständigen Export deiner Daten.</p>
	</div>  
	
	</div>
	
	</div>

	<?php 
	
		$footer_variante = 1;
		
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
		
		$script_variante = 1;
		
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
