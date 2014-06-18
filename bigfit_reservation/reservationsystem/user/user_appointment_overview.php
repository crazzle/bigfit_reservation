
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
		<?php if (isset($_GET['apply'])){
			$id = $_GET['apply'];
			apply_appointment($mysqli, $id);
		}?>

	<h1>Terminuebersicht</h1>
	<p>
	<table>
	<tr>
	<td>Datum</td>
	<td>Beginn</td>
	<td>Ende</td>
	<td>Max. Teilnehmer</td>
	<td>Anzahl Teilnehmer</td>
	</tr>
	<?php
			foreach ( upcoming_appointments ( $mysqli, 6 ) as $appointment ) {
				echo "<tr>";
				echo "<td>".$appointment->getDatum()."</td>";
				echo "<td>".$appointment->getBeginn()."</td>";
				echo "<td>".$appointment->getEnde()."</td>";
				echo "<td>".$appointment->getMaxAnzahl()."</td>";
				echo "<td><a href='user_appointment_overview.php?apply=".$appointment->getId()."'>Anmelden</a></td>";
				echo "<td><a href='user_appointment_detail.php?id=".$appointment->getId()."'>Details</a></td>";
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