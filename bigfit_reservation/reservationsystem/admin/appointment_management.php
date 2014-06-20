<?php
$thisPage = "appointmentmgmt";
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
	<h1>Termin erstellen</h1>
    <p>Um einen Termin zu erstellen gehe auf <a href="appointment_creation.php">Termin Anlegen</a></p>
    <h1>Terminuebersicht</h1>
    <p>Fuer eine Terminuebersicht, gehe auf <a href="appointment_overview.php">Termin&uumlbersicht</a></p>
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