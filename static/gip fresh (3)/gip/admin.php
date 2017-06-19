<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include_once "classes/Page_Data.class.php";
$pagedata = new Page_Data();
// De connectie wordt gemaakt met de database
$dbInfo = "mysql:host=localhost;dbname=ictworx";
$dbUser = "root";
$dbPassword = "";
$db = new PDO( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$pagedata->title = "ICT-Worx Thibault Markey";
$pagedata->css = "<link href='css/opmaak.css' rel='stylesheet' />";
// Er wordt een nieuwe Admin_user aangemaakt
include_once "classes/Admin_User.class.php";
$admin = new Admin_User();
//De pagina's worden alleen weergegeven aan een ingelogde admin.
if( $admin->isLoggedIn() ) {
	$navigationIsClicked = isset($_GET['page']);
	if ($navigationIsClicked ) {
		$controller = $_GET['page'];
	} else {
		$controller = "product-editor";
	}
	// De navigatie pagina voor de admins wordt ingeladen
$pagedata->content .=include "views/admin/admin-navigatie.php";
	$pathToController = "views/admin/$controller.php";
	$pagedata->content .=include_once $pathToController;
}
// De footer wordt ingeladen
$pagedata->content .=include_once "controllers/login.php";
// De page template wordt ingeladen
$page = include_once "templates/page.php";
echo $page;


