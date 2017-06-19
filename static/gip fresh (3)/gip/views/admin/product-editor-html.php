<?php
// De product selector wordt ingeladen
include_once "productselect.php";
// Er wordt gecontroleerd welk product geselecteerd is
if (isset($_POST['selectproduct'])) { 
 $_SESSION['productselect'] = $_POST['productselect'];
 }
  @$productselect = $_SESSION['productselect'];
  
  $entryTable = new Product_Table ( $db );
// Alle entries worden ingeladen
$entries = $entryTable->getUpdateEntry();
// De entries hun waarden worden ingeladen
$oneEntry = $entries->fetchObject ();
// De entries worden weergegeven
$entries = $entryTable->getUpdateEntry();
$entriesFound = isset( $entries );
if ( $entriesFound === false ) {
trigger_error( 'views/list-producten-html.php needs $entries' );
}
$entriesHTML = "<ul>";
$entry = $entries->fetchObject();
 
 
 // Dit zorgt ervoor dat de pagina productselect.php wordt toegevoegd en dat de variabele $productselect de waarde van het geselecteerde product krijgt.
 // Deze waarde wordt tijdens de hele sessie bijgehouden.
 
 // De html pagina voor de product-editor

return "
	<div id=nieuw>
	<form method='post' action='admin.php?page=product-editor'>
	<h1>Nieuw product</h1>
		<p><input type='text' name='product_naam' required maxlength='150' size=40 placeholder = 'Naam product:' /></p>
		<p><input type='text' name='processor' required maxlength='150' size=40 placeholder = 'Processor:' /></p>
		<p><input type='text' name='geheugen' required maxlength='150' size=40 placeholder = 'Intern geheugen:' /></p>
		<p><input type='text' name='RAM' required maxlength='150' size=40 placeholder = 'RAM geheugen:' /></p>
		<p><input type='text' name='behuizing' required maxlength='150' size=40 placeholder = 'Behuizing:' /></p>
		<p><input type='text' name='grafisch' required maxlength='150' size=40 placeholder = 'Grafisch:' /></p>
		<p><input type='text' name='ethernet' required maxlength='150' size=40 placeholder = 'Ethernet:' /></p>
		<p><input type='text' name='besturingssysteem' required maxlength='150' size=40 placeholder = 'Besturingssysteem:' /></p>
		<p><input type='text' name='btw_incl' required maxlength='150' size=40 placeholder = 'btw_incl:' /></p>
		<p><input type='text' name='btw_excl' required maxlength='150' size=40 placeholder = 'btw_excl:' /></p>
		<p><input type='text' name='schermdiagonaal' required maxlength='150' size=40 placeholder = 'Schermdiagonaal: '/></p>
		<p><textarea name='product_beschrijving' rows=15 maxlength='500' required placeholder = 'Beschrijving product: '></textarea></p>
		<input type='submit' name='action' value='opslaan' />
</form>
</div>
	<div id=update>
	<form method='post' action='admin.php?page=product-editor'>
	<h1>Product updaten</h1>
	<p>Geselecteerd product : $productselect</p>
	<p> Wanneer je 'null' intypt verschijnt '<span class=fout>Not available</span>'</p>
		<p><input type='text' name='product_naam' maxlength='150' size=40 placeholder = 'Naam product: $entry->product_naam' /></p>
		<p><input type='text' name='processor' maxlength='150' size=40 placeholder = 'Processor: $entry->processor' /></p>
		<p><input type='text' name='geheugen' maxlength='150' size=40 placeholder = 'Intern geheugen: $entry->geheugen' /></p>
		<p><input type='text' name='RAM' maxlength='150' size=40 placeholder = 'RAM: $entry->RAM' /></p>
		<p><input type='text' name='behuizing' maxlength='150' size=40 placeholder = 'Behuizing: $entry->behuizing'></p>
		<p><input type='text' name='grafisch' maxlength='150' size=40 placeholder = 'Grafischt: $entry->grafisch' /></p>
		<p><input type='text' name='ethernet' maxlength='150' size=40 placeholder = 'Ethernet: $entry->ethernet' /></p>
		<p><input type='text' name='besturingssysteem' maxlength='150' size=40 placeholder = 'Besturingssysteem: $entry->besturingssysteem' /></p>
		<p><input type='text' name='btw_incl' maxlength='150' size=40 placeholder = 'Btw inclusief: $entry->btw_incl' /></p>
		<p><input type='text' name='btw_excl' maxlength='150' size=40 placeholder = 'Btw exclusief: $entry->btw_excl' /></p>
		<p><input type='text' name='schermdiagonaal' maxlength='500' size=40 placeholder = 'Schermdiagonaal: $entry->schermdiagonaal '/></p>
		<p><textarea name='product_beschrijving' rows=15 maxlength='500' placeholder = 'Beschrijving: $entry->intro '></textarea></p>
		<input type='submit' name='Update' value='update' />
</form>
	</div>
	<div id=deleter>
	<form method='post' action='admin.php?page=product-editor'>
	<h1>Product verwijderen</h1>
	<p class=geselecteerd>Geselecteerd product : $productselect</p>
	<input type='submit' name='delete' value='verwijder' />
	</form>
	</div>
<div id=fotoloader>
<h1>Foto uploaden</h1>
<form method='post' action='admin.php?page=product-editor' enctype='multipart/form-data' >
				<label>De foto wordt meteen opgeslagen onder de naam $productselect(.png): </label>
				<input type='file' name='image-data' accept='image/png'/>
				<input type='submit' value='uploaden' name='new-image' />
			</form>
</div>
";