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
<title>Mitglieder bearbeiten</title>
<script type="text/JavaScript" src="js/sha512.js"></script>
<script type="text/JavaScript" src="js/forms.js"></script>
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
    <p>Um Mitglieder anzulegen, gehe auf <a href="user_registration.php">Mitglied Anlegen</a></p>
    <h1>Mitgliederuebersicht</h1>
    <p>Fuer eine Mitgliedsuebersicht, gehe auf <a href="user_overview.php">Mitglieds&uumlbersicht</a></p>
	<p>
		<a href="../reservation_index.php">zurueck</a>.
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