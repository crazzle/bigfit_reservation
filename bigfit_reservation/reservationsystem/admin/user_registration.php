<?php
$thisPage = "usermgmt";
include_once '../../includes/register.inc.php';
include_once '../../includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/bigfit_template.css">
<meta charset="UTF-8">
<title>Mitglied anlegen</title>
<script type="text/JavaScript" src="../../js/sha512.js"></script>
<script type="text/JavaScript" src="../../js/forms.js"></script>
<link rel="stylesheet" href="styles/main.css" />
</head>
<body>
	<?php include_once '../../includes/navigationsleiste.php'; ?>
	<div class="content">
	<?php if (login_check($mysqli) == true) : ?>
		<?php if (admin_check($mysqli) == true) :?>
		<!-- Anmeldeformular fuer die Ausgabe, wenn die POST-Variablen nicht gesetzt sind
	        oder wenn das Anmelde-Skript einen Fehler verursacht hat. -->
	<h1>Mitglied anlegen</h1>
	        <ul>
		<li>Benutzernamen duerfen nur Ziffern, Gross- und Kleinbuchstaben und
			Unterstriche enthalten.</li>
		<li>E-Mail-Adressen muessen ein gueltiges Format haben.</li>
		<li>Passwoerter muessen mindest sechs Zeichen lang sein.</li>
		<li>Passwoerter muessen enthalten
			<ul>
				<li>mindestens einen Grossbuchstaben (A..Z)</li>
				<li>mindestens einen Kleinbuchstabenr (a..z)</li>
				<li>mindestens eine Ziffer (0..9)</li>
			</ul>
		</li>
		<li>Das Passwort und die Bestaetigung muessen exakt uebereinstimmen.</li>
	</ul>
	<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
		method="post" name="registration_form">
		Vorname: <input type='text' name='vorname' id='vorname' /><br>
		Nachname: <input type='text' name='nachname' id='nachname' /><br>
		Email: <input type="text" name="email" id="email" /><br> 
		Passwort: <input type="password" name="password" id="password" /><br> 
		Passwort bestaetigen: <input type="password" name="confirmpwd" id="confirmpwd" /><br>
		<input type="button" value="Register"
			onclick="return regformhash(this.form,
	                                   this.form.vorname,
	                                   this.form.nachname,
	                                   this.form.email,
	                                   this.form.password,
	                                   this.form.confirmpwd);" />
	</form>
	<p>
		<a href="../reservation_index.php">zurueck zur Startseite</a>.
	</p>
		<?php else : ?>
            <p>
		<span class="error">Du bist kein Administrator.</span>
		Bitte als Administrator <a href="../../index.php">einloggen</a>.
	</p>
        <?php endif; ?>
	 <?php else : ?>
            <p>
		<span class="error">Du bist nicht eingeloggt.</span>
		Bitte <a href="../../index.php">einloggen</a>.
	</p>
        <?php endif; ?>
        </div>
</body>
</html>