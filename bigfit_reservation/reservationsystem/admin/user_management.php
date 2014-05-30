<?php
include_once '../../includes/register.inc.php';
include_once '../../includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Mitglieder bearbeiten</title>
<script type="text/JavaScript" src="js/sha512.js"></script>
<script type="text/JavaScript" src="js/forms.js"></script>
<link rel="stylesheet" href="styles/main.css" />
</head>
<body>
	<?php if (login_check($mysqli) == true) : ?>
		<?php if (admin_check($mysqli) == true) :?>
	<!-- Anmeldeformular fuer die Ausgabe, wenn die POST-Variablen nicht gesetzt sind
        oder wenn das Anmelde-Skript einen Fehler verursacht hat. -->
	<h1>Mitglied anlegen</h1>
    <p>For User Registration go to <a href="user_registration.php">User Anlegen</a></p>
	<p>
		<a href="../reservation_index.php">zurueck</a>.
	</p>
	<?php else : ?>
            <p>
		<span class="error">You are not admin.</span>
		Please <a href="../../index.php">login</a>.
	</p>
        <?php endif; ?>
	 <?php else : ?>
            <p>
		<span class="error">You are not logged in.</span>
		Please <a href="../../index.php">login</a>.
	</p>
        <?php endif; ?>
</body>
</html>