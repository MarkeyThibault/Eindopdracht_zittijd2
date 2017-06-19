<?php
// Het formulier waarin men zijn inloggegevens invoert om in te loggen als admin
return " <form method='post' action='admin.php'>
<input type='email' name='email' required placeholder = E-mail: />
<input type='password' name='password' required placeholder = Wachtwoord: />
<input class=login type='submit' value='login' name='log-in' />
</form>";