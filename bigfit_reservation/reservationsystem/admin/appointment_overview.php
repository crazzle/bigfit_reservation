
<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/termin_db_helper.php';
include_once '../../includes/functions.php';
sec_session_start ();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Termin anlegen</title>
<link rel="stylesheet"
	href="../../css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery-ui-1.10.4.custom.js"></script>
<script src="../../js/jquery.ui.datepicker-de.js"></script>
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
		<?php if (admin_check($mysqli) == true) :?>
		<?php if (isset($_GET['delete'])){
			$id = $_GET['delete'];
			delete_appointment($mysqli, $id);
		}?>
<!-- Anmeldeformular fuer die Ausgabe, wenn die POST-Variablen nicht gesetzt sind
        oder wenn das Anmelde-Skript einen Fehler verursacht hat. -->
	<h1>Terminuebersicht</h1>
	<p>
	<table>
	<tr>
	<td>Datum</td>
	<td>Beginn</td>
	<td>Ende</td>
	<td>Teilnehmer</td>
	</tr>
	<?php
			foreach ( all_appointments ( $mysqli ) as $appointment ) {
				echo "<tr>";
				echo "<td>".$appointment->getDatum()."</td>";
				echo "<td>".$appointment->getBeginn()."</td>";
				echo "<td>".$appointment->getEnde()."</td>";
				echo "<td>".$appointment->getMaxAnzahl()."</td>";
				echo "<td><a href='appointment_overview.php?delete=".$appointment->getId()."'>Loeschen</a></td>";
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
</body>
</html>