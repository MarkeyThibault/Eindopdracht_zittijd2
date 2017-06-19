<?php
// Er wordt naar entries gezocht in de ictworx database. Als deze niet gevonden worden komt er een melding hiervan.
$entriesFound = isset( $entries );
if ( $entriesFound === false ) {
trigger_error( 'views/list-producten-html.php needs $entries' );
}
$entriesHTML = "<ul>";
// Als er entries gevonden worden worden deze ook weergegeven.
while ( $entry = $entries->fetchObject() ) {
// De link wordt gelegd met de producten table
$href = "index.php?page=producten&amp;id=$entry->product_id";
// Bij de ethernet, de btw prijzen, de schermdiagonaal en de grafische kaart wordt gecontroleerd of deze aanwezig is en zo niet
// dan wordt er weergegeven in het rood 'Not available'.
if ($entry->ethernet == null || $entry->ethernet == "null") {
	$entry->ethernet = "<div class=fout>Not available</div>";
}
if ($entry->btw_excl == null || $entry->btw_excl == "null") {
	$entry->btw_excl = "<div class=fout>Not available</div>";
}
if ($entry->btw_incl == null || $entry->btw_incl == "null") {
	$entry->btw_incl = "<div class=fout>Not available</div>";
}
if ($entry->schermdiagonaal == null || $entry->schermdiagonaal == "null") {
	$entry->schermdiagonaal = "<div class=fout>Not available</div>";
}
if ($entry->grafisch == null || $entry->grafisch == "null") {
	$entry->grafisch = "<div class=fout>Not available</div>";
}
// De gegevens van de producten worden ingeladen
$entriesHTML .= "<h2 id=productnaam>$entry->product_naam</h2>
<br />
<img id=productfoto src='Images/$entry->product_naam.png' />
<table>
<tr>
<td>Processor</td><td>$entry->processor</td>
</tr>
<tr>
<td>Geheugen</td><td>$entry->geheugen</td>
</tr>
<tr>
<td>RAM</td><td>$entry->RAM</td>
</tr>
<tr>
<td>Behuizing</td><td>$entry->behuizing</td>
</tr>
<tr>
<td>Grafisch</td><td>$entry->grafisch</td>
</tr>
<tr>
<td>Ethernet</td><td>$entry->ethernet</td>
</tr>
<tr>
<td>Besturingssysteem</td><td>$entry->besturingssysteem</td>
</tr>
<tr>
<td>Btw inclusief</td><td>$entry->btw_incl</td>
</tr>
<tr>
<td>Btw exclusief</td><td>$entry->btw_excl</td>
</tr>
<tr>
<td class=specs>Schermdiagonaal</td><td class=specs>$entry->schermdiagonaal</td>
</tr>
</table>
<div id='beschrijving'>$entry->intro
</div>
";
}
$entriesHTML .= "</ul>";
return $entriesHTML;
