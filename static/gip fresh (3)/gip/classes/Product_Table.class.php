<?php
class Product_Table {
	// Er wordt een nieuwe database aangemaakt
	private $db;
	public function __construct ( $db ) {
		$this->db = $db;
	}
	
	// De entries worden gehaald uit de producten tabel
	
	public function getAllEntries () {
		$sql = "SELECT product_id, product_naam, processor, geheugen,
		RAM, behuizing, grafisch, ethernet, besturingssysteem, btw_incl, btw_excl, schermdiagonaal, 
		SUBSTRING(product_beschrijving, 1) AS intro
		FROM producten";
		$statement = $this->db->prepare( $sql );
		try {
			$statement->execute();
		} catch ( Exception $e ) {
			$exceptionMessage = "<p>You tried to run this sql: $sql <p>
			<p>Exception: $e</p>";
			trigger_error($exceptionMessage);
		}
		return $statement;
	}
	
	// De functie om de gegevens van een entry die upgedate moet worden op te halen.
	
public function getUpdateEntry () {
	// Eerst wordt er gekeken welk product er geselecteerd is om up te daten
	if (isset($_POST['selectproduct'])) { 
 $_SESSION['productselect'] = $_POST['productselect'];
 }
 @$productselect = $_SESSION['productselect'];
	// Er worden gegevens uit de producten tabel gehaald bij het product dat geselecteerd is.
		$sql = "SELECT product_id, product_naam, processor, geheugen,
		RAM, behuizing, grafisch, ethernet, besturingssysteem, btw_incl, btw_excl, schermdiagonaal, 
		SUBSTRING(product_beschrijving, 1) AS intro
		FROM producten WHERE product_naam='$productselect'";
		$statement = $this->db->prepare( $sql );
		try {
			$statement->execute();
		} catch ( Exception $e ) {
			$exceptionMessage = "<p>You tried to run this sql: $sql <p>
			<p>Exception: $e</p>";
			trigger_error($exceptionMessage);
		}
		return $statement;
	}
	
	// De functie om een product op te slaan
	// De variabelen die worden opgegeven in een formulier worden opgehaald
public function saveProduct ( $product_naam, $processor, $geheugen, $RAM, $behuizing, $grafisch, $ethernet, $besturingssysteem, $btw_incl, $btw_excl, $schermdiagonaal, $product_beschrijving ) {
		// De placeholders (?) worden vervangen door de variabelen
		$entrySQL = "INSERT INTO producten ( product_naam, processor, geheugen, RAM, behuizing, grafisch, ethernet, besturingssysteem, btw_incl, btw_excl, schermdiagonaal, product_beschrijving )
			VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$productStatement = $this->db->prepare( $entrySQL );
		// Er wordt een array gemaakt met de variabelen, het is belangrijk dat ze in de juiste volgorde staan
		$formData = array( $product_naam, $processor, $geheugen, $RAM, $behuizing, $grafisch, $ethernet, $besturingssysteem, $btw_incl, $btw_excl, $schermdiagonaal, $product_beschrijving );
		try{
			$productStatement->execute( $formData );
		} catch (Exception $e){
			$msg = "<p>You tried to run this sql: $entrySQL<p>
		<p>Exception: $e</p>";
			trigger_error($msg);
		}
	}
	
	// De functie om een product up te daten
	
public function updateProduct ($product_naam, $processor, $geheugen, $RAM, $behuizing, $grafisch, $ethernet, $besturingssysteem, $btw_incl, $btw_excl, $schermdiagonaal, $product_beschrijving) {
	// Eerst wordt er gekeken welk product er geselecteerd is om up te daten
	if (isset($_POST['selectproduct'])) { 
 $_SESSION['productselect'] = $_POST['productselect'];
 }
 $productselect = $_SESSION['productselect'];
 // De entry die geselecteerd is wordt upgedate met de variabelen uit het update formulier
	$entrySQL = "UPDATE producten 
		SET product_naam ='$product_naam',
		processor='$processor', 
		geheugen='$geheugen', 
		RAM='$RAM', 
		behuizing='$behuizing', 
		grafisch='$grafisch', 
		ethernet='$ethernet', 
		besturingssysteem='$besturingssysteem', 
		btw_incl='$btw_incl', 
		btw_excl='$btw_excl', 
		schermdiagonaal='$schermdiagonaal', 
		product_beschrijving='$product_beschrijving'
		WHERE product_naam='$productselect'";
		$updateStatement = $this->db->prepare( $entrySQL );
		$formData = array( $product_naam, $processor, $geheugen, $RAM, $behuizing, $grafisch, $ethernet, $besturingssysteem, $btw_incl, $btw_excl, $schermdiagonaal, $product_beschrijving );
try{
			$updateStatement->execute( $formData );
		} catch (Exception $e){
			$msg = "<p>You tried to run this sql: $entrySQL<p>
		<p>Exception: $e</p>";
			trigger_error($msg);
		}
	}
	
	// De functie om een product te verwijderen
	
public function deleteProduct () {
	// Eerst wordt er gekeken welk product er geselecteerd is om te verwijderen
	if (isset($_POST['selectproduct'])) { 
 $_SESSION['productselect'] = $_POST['productselect'];
 }
 $productselect = $_SESSION['productselect'];
 // De entry die geselecteerd is wordt verwijderd
 $entrySQL = "DELETE FROM producten WHERE product_naam='$productselect'";
 $deleteStatement = $this->db->prepare( $entrySQL );
 $deleteStatement->execute();
}
}
