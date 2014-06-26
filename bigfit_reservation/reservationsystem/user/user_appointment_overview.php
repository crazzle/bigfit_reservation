
<?php
$thisPage = "appoverview";
include_once '../../includes/db_connect.php';
include_once '../../includes/termin_db_helper.php';
include_once '../../includes/functions.php';
sec_session_start ();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Angemeldete Termine</title>
<link rel="stylesheet"
	href="../../css/ui-lightness/jquery-ui-1.10.4.custom.css">
<link rel="stylesheet" type="text/css" href="../../css/bigfit_template.css">
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery-ui-1.10.4.custom.js"></script>
<script src="../../js/jquery.ui.datepicker-de.js"></script>
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
		<?php if (isset($_GET['unapply'])){
			$id = $_GET['unapply'];
			unsubscribe_upcoming_appointment($mysqli, $id, $_SESSION['user_id']);
			echo "Vom Termin abgemeldet.";
		}?>
	<?php include_once '../../includes/navigationsleiste.php'; ?>
	<div class="content">
	<h1>Angemeldete Termine</h1>
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
			foreach ( subscribed_upcoming_appointments ( $mysqli, $_SESSION['user_id']) as $appointment ) {
				$subscribers = getCurrentSubscriberCountForAppointment($mysqli, $appointment->getId());				
				echo "<tr>";
				echo "<td>".$appointment->getDatum()."</td>";
				echo "<td>".$appointment->getBeginn()."</td>";
				echo "<td>".$appointment->getEnde()."</td>";
				echo "<td>".$appointment->getMaxAnzahl()."</td>";
				echo "<td>".$subscribers."</td>";
				echo "<td><a href='user_appointment_overview.php?unapply=".$appointment->getId()."'>Abmelden</a></td>";
				echo "<td><a href='user_appointment_detail.php?id=".$appointment->getId()."'>Details</a></td>";
				echo "</tr>";
			 }?>
	</table>
	 <?php else : ?>
            <p>
		<span class="error">Du bist nicht eingeloggt.</span> Bitte <a
			href="../../index.php">einloggen</a>.
	</p>
        <?php endif; ?>
        </div>
</body>
</html>