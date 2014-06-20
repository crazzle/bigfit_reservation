<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/user_db_helper.php';
include_once '../../includes/functions.php';
sec_session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/bigfit_template.css">
<meta charset="UTF-8">
<title>Mitgliederuebersicht</title>
<script type="text/JavaScript" src="js/sha512.js"></script>
<script type="text/JavaScript" src="js/forms.js"></script>
<link rel="stylesheet" href="styles/main.css" />
</head>
<body>
	<?php include_once '../../includes/navigationsleiste.php'; ?>
	<div class="content">
	<?php if (login_check($mysqli) == true) : ?>
		<?php if (admin_check($mysqli) == true) :?>
		<?php if (isset($_GET['delete'])){
			$username = $_GET['delete'];
			delete_user($mysqli, $username);
		}?>
	<!-- Anmeldeformular fuer die Ausgabe, wenn die POST-Variablen nicht gesetzt sind
        oder wenn das Anmelde-Skript einen Fehler verursacht hat. -->
	<?php 
			echo '<td><a href="user_registration.php">Mitglied Anlegen</a></td>'; 
	?>
	<h1>Mitglieder&uumlbersicht</h1>
	<p>
	<table>
	<tr>
	<td>ID</td>
	<td>Vorname</td>
	<td>Nachname</td>
	<td>E-Mail</td>
	</tr>
	<?php
			foreach ( all_users ( $mysqli ) as $nutzer ) {
				echo "<tr>";
				echo "<td>".$nutzer->getId()."</td>";
				echo "<td>".$nutzer->getVorname()."</td>";
				echo "<td>".$nutzer->getNachname()."</td>";
				echo "<td>".$nutzer->getEmail()."</td>";
				echo "<td><a href='user_overview.php?delete=".$nutzer->getId()."'>Loeschen</a></td>";
				echo "</tr>";
			 }?>
	</table>
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