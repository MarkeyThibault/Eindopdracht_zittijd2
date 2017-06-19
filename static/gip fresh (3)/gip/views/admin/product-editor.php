<?php
// Product_Table.class wordt ingeladen
include_once "classes/Product_Table.class.php";
$productTable = new Product_Table( $db );
// Er wordt gecontroleerd of het nieuwe product ingediend werd.
$editorSubmitted = isset( $_POST['action'] );
if ( $editorSubmitted ) {
	$buttonClicked = $_POST['action'];
	//Wanneer de 'opslaan' knop wordt aangeklikt
	$insertNewEntry = ( $buttonClicked === 'opslaan' );
	if ( $insertNewEntry ) {
		//De data wordt gehaald uit het formulier
		$product_naam = $_POST['product_naam'];
		$processor = $_POST['processor'];
		$geheugen = $_POST['geheugen'];
		$RAM = $_POST['RAM'];
		$behuizing = $_POST['behuizing'];
		$grafisch = $_POST['grafisch'];
		$ethernet = $_POST['ethernet'];
		$besturingssysteem = $_POST['besturingssysteem'];
		$btw_incl = $_POST['btw_incl'];
		$btw_excl = $_POST['btw_excl'];
		$schermdiagonaal = $_POST['schermdiagonaal'];
		$product_beschrijving = $_POST['product_beschrijving'];
		//De entry wordt opgeslagen
		$productTable->saveProduct($product_naam, $processor, $geheugen, $RAM, $behuizing, $grafisch, $ethernet, $besturingssysteem, $btw_incl, $btw_excl, $schermdiagonaal, $product_beschrijving);
	}
}
//De connectie wordt gemaakt met de database om de naam van de producten in de selector te kunnen ophalen.
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "ictworx";

$connect = mysqli_connect($hostname, $username, $password, $databasename);
$query = "SELECT product_id, product_naam FROM producten";

$selecteer = mysqli_query($connect, $query);

// Er wordt gecontroleerd welk product werd geselecteerd

	$selector = isset ( $_post['productselect']);
if ($selector) {
	$buttonclicked = $_POST['productselect'];
	$selectEntry = ( $buttonClicked === 'selecteer' );
}
if (isset($_POST['selectproduct'])) { 
 $_SESSION['productselect'] = $_POST['productselect'];
 }
 @$productselect = $_SESSION['productselect'];

$entryTable = new Product_Table ( $db );
// ALle entries worden ingeladen
$entries = $entryTable->getUpdateEntry();
// De entries hun waarden worden ingeladen
$oneEntry = $entries->fetchObject ();
$test = print_r ( $oneEntry, true );
$isEntryClicked = isset( $_GET['id'] );
// De entries worden weergegeven
$entries = $entryTable->getUpdateEntry();
$entriesFound = isset( $entries );
if ( $entriesFound === false ) {
trigger_error( 'views/list-producten-html.php needs $entries' );
}
$entriesHTML = "<ul>";
$entry = $entries->fetchObject();

// Er wordt een product upgedate


$updaterSubmitted = isset( $_POST['Update'] );
if ( $updaterSubmitted ) {
	$buttonClicked = $_POST['Update'];
	//De update knop werd aangeklikt
	$updateNewEntry = ( $buttonClicked === 'update' );
	if ( $updateNewEntry ) {
		// De data voor het updaten wordt opgehaald
		// Wanneer een entry leeg wordt gelaten wordt de waarde die de entry al had opnieuw gebruikt
		if (!empty($_POST['product_naam'])){
		$product_naam = $_POST['product_naam'];
		}  else {
			$product_naam = $entry->product_naam;
		}
		if (!empty($_POST['processor'])){
		$processor = $_POST['processor'];
		} else {
			$processor = $entry->processor;
		}
		if (!empty($_POST['geheugen'])){
		$geheugen = $_POST['geheugen'];
		} else {
			$geheugen = $entry->geheugen;
		}
		if (!empty($_POST['RAM'])){
		$RAM = $_POST['RAM'];
		} else {
			$RAM = $entry->RAM;
		}
		if (!empty($_POST['behuizing'])){
		$behuizing = $_POST['behuizing'];
		} else {
			$behuizing = $entry->behuizing;
		}
		if (!empty($_POST['grafisch'])){
		$grafisch = $_POST['grafisch'];
		} else {
			$grafisch = $entry->grafisch;
		}
		if (!empty($_POST['ethernet'])){
		$ethernet = $_POST['ethernet'];
		} else {
			$ethernet = $entry->ethernet;
		}
		if (!empty($_POST['besturingssysteem'])){
		$besturingssysteem = $_POST['besturingssysteem'];
		} else {
			$besturingssysteem = $entry->besturingssysteem;
		}
		if (!empty($_POST['btw_incl'])){
		$btw_incl = $_POST['btw_incl'];
		} else {
			$btw_incl = $entry->btw_incl;
		}
		if (!empty($_POST['btw_excl'])){
		$btw_excl = $_POST['btw_excl'];
		} else {
			$btw_excl = $entry->btw_excl;
		}
		if (!empty($_POST['schermdiagonaal'])){
		$schermdiagonaal = $_POST['schermdiagonaal'];
		} else {
			$schermdiagonaal = $entry->schermdiagonaal;
		}
		if (!empty($_POST['product_beschrijving'])){
		$product_beschrijving = $_POST['product_beschrijving'];
		} else {
			$product_beschrijving = $entry->intro;
		}
		//De entry wordt upgedate
		$productTable->updateProduct($product_naam, $processor, $geheugen, $RAM, $behuizing, $grafisch, $ethernet, $besturingssysteem, $btw_incl, $btw_excl, $schermdiagonaal, $product_beschrijving);
	}
}

// De deleter

// Wanneer de delete knop wordt aangeklikt wordt wordt het aangeduide product verwijderd
$deleterSubmitted = isset( $_POST['delete'] );
if ( $deleterSubmitted ) {
	$buttonClicked = $_POST['delete'];
	//was "save" button clicked
	$DeleteEntry = ( $buttonClicked === 'verwijder' );
	$productTable->deleteProduct();
}

// Wanneer de upload knop wordt aangeklikt wordt de foto upgeload
$newImageSubmitted = isset ( $_POST['new-image']);
if ( $newImageSubmitted) {
	$output = upload();
} else {
	@$output = include_once 'views/admin/product-editor-html.php';
}

// De foto wordt upgeload en opgeslagen in de map Images
function upload() {
	include_once "classes/Uploader.class.php";
	$uploader = new Uploader("image-data");
	$uploader->saveIn("Images");
	$fileUploaded = $uploader->save();
}

// De product editor wordt weergegeven

return "
<div id=producteditor>
$output
</div>
";