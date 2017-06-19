<?php
// De admin table klasse wordt ingeladen
include_once "classes/Admin_Table.class.php";
// De functie om in te loggen
$loginFormSubmitted = isset( $_POST['log-in'] );
if( $loginFormSubmitted ) {
	// De ingevoerde gegevens worden opgenomen
	$email = $_POST['email'];
	$password = $_POST['password'];
	// Er wordt een object aangemaakt om te communiceren met de admin tabel
	$adminTable = new Admin_Table( $db );
	// De pagina wordt gerefreshed om de volgorde van het inroepen van mijn pagina's in admin.php te compenseren, aangezien daardoor de pagina niet wordt weergeven.
	@header("Refresh:0");
	try {
		// Er wordt geprobeerd in te loggen
		$adminTable->checkCredentials( $email, $password );
		$admin->login(); // login() functie uit
		// Admin_Table.class.php door index.php
	} catch ( Exception $e ) {
		//Er wordt gecontroleerd of het inloggen faalt.
	}
}
// Er wordt gecontroleerd of je ingelogd bent, en of je aan het uitloggen bent.
$loggingOut = isset ( $_POST['logout'] );
if ( $loggingOut ){
	$admin->logout();
	// Wanneer je uitlogt, wordt de sessie beëindigd
	session_destroy();
}
if ( $admin->isLoggedIn() ) {
	$view = include_once "views/admin/logout-form-html.php";
} else {
	$view = include_once "views/admin/login-form-html.php";
}
// De footer wordt weergegeven.
return "
<div id=footer>
<div id=source>
ICT-Worx.com &copy; 2016
</div>
<div id=login>
$view
</div>
<div id=footerinfo>
<img id=scheider src='Images/footer scheider.png'></img>
<div id=source>Tel: +32 (57) 366 566</div>
<img id=scheider src='Images/footer scheider.png'></img>
<div id=source>E-mail: <a class=footermail href='mailto:info@ict-worx.com'>info@ict-worx.com</a></div>
<img id=scheider src='Images/footer scheider.png'></img>
<div id=source>Ter Waarde 45</div>
<img id=scheider src='Images/footer scheider.png'></img>
<div id=source>8900 Ieper</div>
<img id=scheider src='Images/footer scheider.png'></img>
</div>
</div>
";