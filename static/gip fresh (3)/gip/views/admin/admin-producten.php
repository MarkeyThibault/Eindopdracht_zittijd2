<?php
// De product table klasse wordt ingeladen
include_once "classes/Product_Table.class.php";
$entryTable = new Product_Table ( $db );
// Alle entries worden ingeladen
$entries = $entryTable->getAllEntries ();
// De entries hun waarden worden ingeladen
$oneEntry = $entries->fetchObject ();
// De entries worden weergegeven
$entries = $entryTable->getAllEntries ();
$productOutput = include_once "views/list-producten-html.php";
// De producten worden weergegeven
return "
<div id='producten'>
<h1>Producten en diensten</h1>
<p>Wij bieden bij ICT-Worx server- en computer onderhoud aan.</p>
<p>Maar wij bieden ook een assortiment aan producten aan, die u hieronder kunt terugvinden</p>
$productOutput
</div>
";
