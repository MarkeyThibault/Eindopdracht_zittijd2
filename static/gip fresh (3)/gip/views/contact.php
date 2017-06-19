<?php
// De contact pagina (bijkomend commentaar in de code)
return "
<div class=contact><h1>LOCATIE</h1><div id=map>
		<iframe width=580 height=300 frameborder=0 scrolling=no marginheight=0 marginwidth=0 src=https://maps.google.be/maps?f=q&amp;source=s_q&amp;hl=nl&amp;geocode=&amp;q=ICT+Worx+BVBA&amp;aq=0&amp;oq=Ter+waarde+45&amp;sll=50.870322,2.891907&amp;sspn=1.526513,3.56781&amp;ie=UTF8&amp;hq=&amp;hnear=Ter+Waarde+45,+8900+Ieper&amp;t=m&amp;ll=50.87022,2.893438&amp;spn=0.01625,0.049696&amp;z=14&amp;iwloc=A&amp;output=embed></iframe></div>
		<!-- Er wordt een iframe ingeladen die een google map bevat van het bedrijf -->
<h1>Volg ons op sociale media:</h1>
<a target=blank class=mail id=twitter href='https://twitter.com/ICT_Worx'></a>
<a target=blank class=mail id=facebook href='https://www.facebook.com/ICT-Worx-179795935404000/'></a>
<a target=blank class=mail id=linked href='https://www.linkedin.com/in/dieter-vanleenhove-05441712'></a>
</div>
<div class=formulier>
<h1>CONTACT FORMULIER</h1>
<form action='mailto:info@ict-worx.com' method=post>		<!-- Het contact formulier wordt gemaakt -->
    <p><input type=text name=naam maxlength=40 size=40 required placeholder = Naam: /></p>				<!-- De tekstkaders en de knop worden gedeclareerd -->
    <p><input type=email name=email maxlength=40 size=40 required placeholder = E-mail: /></p>
    <p><input type=text name=telefoon maxlength=40 size=40 required placeholder = Telefoon: /></p>
    <p><input type=text name=onderwerp maxlength=40 size=40 required placeholder = Onderwerp: /></p>
    <p><textarea rows=15 name=bericht required placeholder = Bericht: ></textarea></p>
    <input class=submit type=submit value=Verstuur />
</form>
</div>
<div class=adres>
		ICT-Worx Bvba
		<p>Ter Waarde 45</p>
		<p>8900 Ieper</p>
		</div>
		<div class=adres2>
		<span>Telefoon:</span>+32 (57) 366 566
		<p><span>Fax:</span>+32 (57) 366 466</p>
		<p><span>E-mail:</span><a class=mail href='mailto:info@ict-worx.com'>info@ict-worx.com</a></p>
</div>
";
