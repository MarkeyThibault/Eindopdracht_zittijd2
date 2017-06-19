<?php
// Bij een error wordt deze weergegeven op de webpagina
error_reporting( E_ALL );
ini_set( "display_errors", 1);
// De klasse Page_Data wordt ingeladen
include_once "classes/Page_Data.class.php";
// Er wordt een nieuwe page data aangemaakt (= nieuwe pagina)
$pagedata = new Page_Data();
$pagedata->title="ICT-Worx Thibault Markey";
$pagedata->content = include_once "views/navigatie.php";
// De link wordt gelegd met de database ictworx
$dbInfo = "mysql:host=localhost;dbname=ictworx";
$dbUser = "root";
$dbPassword = "";
$db = new PDO( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
// De css pagina wordt ingeladen
$pagedata->css = "<link href='css/opmaak.css' rel='stylesheet' />";
// De admin user klas wordt ingeladen
include_once "classes/Admin_User.class.php";
// Er wordt een nieuw admin_user object aangemaakt: $admin
$admin = new Admin_User();
// Hierdoor kan men van pagina wisselen
$navigationIsClicked = isset($_GET['page']);
if ( $navigationIsClicked) {
	$filetoload = $_GET['page'];
} else {
	$filetoload = "home";
}
// De geselecteerde pagina wordt ingeladen
$pagedata->content .=include_once "views/$filetoload.php";
// De footer waarmee men kan inloggen wordt ingeladen
$pagedata->content .=include_once "controllers/login.php";
// De pagina opmaak zelf wordt ingeladen
$page = include_once "templates/page.php";
// De pagina wordt weergegeven
echo $page; 