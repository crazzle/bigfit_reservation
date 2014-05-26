<?php

include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Secure Login: Registration Form</title>
<script type="text/JavaScript" src="js/sha512.js"></script>
<script type="text/JavaScript" src="js/forms.js"></script>
<link rel="stylesheet" href="styles/main.css" />
</head>
<body>
	<!-- Anmeldeformular fuer die Ausgabe, wenn die POST-Variablen nicht gesetzt sind
        oder wenn das Anmelde-Skript einen Fehler verursacht hat. -->
	<h1>Register with us</h1>
        <?php
								if (! empty ( $error_msg )) {
									echo $error_msg;
								}
								?>
        <ul>
		<li>Benutzernamen duerfen nur Ziffern, Gro§- und Kleinbuchstaben und
			Unterstriche enthalten.</li>
		<li>E-Mail-Adressen muessen ein gueltiges Format haben.</li>
		<li>Passwoerter muessen mindest sechs Zeichen lang sein.</li>
		<li>Passwoerter muessen enthalten
			<ul>
				<li>mindestens einen Gro§buchstaben (A..Z)</li>
				<li>mindestens einen Kleinbuchstabenr (a..z)</li>
				<li>mindestens eine Ziffer (0..9)</li>
			</ul>
		</li>
		<li>Das Passwort und die Bestaetigung muessen exakt uebereinstimmen.</li>
	</ul>
	<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
		method="post" name="registration_form">
		Username: <input type='text' name='username' id='username' /><br>
		Email: <input type="text" name="email" id="email" /><br> Password: <input
			type="password" name="password" id="password" /><br> Confirm
		password: <input type="password" name="confirmpwd" id="confirmpwd" /><br>
		<input type="button" value="Register"
			onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" />
	</form>
	<p>
		Return to the <a href="index.php">login page</a>.
	</p>
</body>
</html>