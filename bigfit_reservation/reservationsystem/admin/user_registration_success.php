<?php
$thisPage = "usermgmt";
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';
sec_session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css"
	href="../../css/bigfit_template.css">
<meta charset="UTF-8">
<title>Mitglied anlegen</title>
<script type="text/JavaScript" src="../../js/sha512.js"></script>
<script type="text/JavaScript" src="../../js/forms.js"></script>
</head>
<body>
	<?php include_once '../../includes/navigationsleiste.php'; ?>
	<div class="content">
	<?php if (login_check($mysqli) == true) : ?>
		<?php if (admin_check($mysqli) == true) :?>
	Der/Die Nutzer(in) wurde angelegt!
	<p>
			<a href="../reservation_index.php">zurueck zur Startseite</a>.
		</p>
		<?php else : ?>
            <p>
			<span class="error">Du bist kein Administrator.</span> Bitte als
			Administrator <a href="../../index.php">einloggen</a>.
		</p>
        <?php endif; ?>
	 <?php else : ?>
            <p>
			<span class="error">Du bist nicht eingeloggt.</span> Bitte <a
				href="../../index.php">einloggen</a>.
		</p>
        <?php endif; ?>
        </div>
</body>
</html>