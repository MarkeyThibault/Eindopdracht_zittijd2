<?php
// De navigatie balk van de pagina, die ook de logo van het bedrijf en de lijn eronder bevat.
return "
<div id=header>
<img id=bedrijfslogo src='Images/ICT-Worx logo.png' />
</div>
<div class=onderlijn />
<nav>
			<a class=navigatie href='index.php?page=home' id=navigatieknop><div class=navigatietekst>Home</div></a>
			<a class=navigatie href='index.php?page=producten' id=navigatieknop2><div class=navigatietekst2>Producten</div></a>
			<a class=navigatie target=blank href='https://get.teamviewer.com/ict-worx' id=navigatieknop3><div class=navigatietekst3>Support</div></a>
			<a class=navigatie href='index.php?page=contact' id=navigatieknop4><div class=navigatietekst4>Contact</div></a>
			<a class=navigatie href='index.php?page=bedrijf' id=navigatieknop5><div class=navigatietekst5>Bedrijf</div></a>
			<a class=navigatie href='index.php?page=partners' id=navigatieknop6><div class=navigatietekst6>Partners</div></a>
</nav>
";