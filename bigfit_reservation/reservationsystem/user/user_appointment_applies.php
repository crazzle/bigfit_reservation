
<?php
$thisPage = "appapply";
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
<link rel="stylesheet" type="text/css" href="../../css/bigfit_template.css">
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery-ui-1.10.4.custom.js"></script>
<script src="../../js/jquery.ui.datepicker-de.js"></script>
</head>
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
		<?php if (isset($_GET['apply'])){
			$id = $_GET['apply'];
			apply_appointment($mysqli, $id, $_SESSION['user_id']);
			echo "Zu Termin angemeldet.";
		}?>
	<?php include_once '../../includes/navigationsleiste.php'; ?>
	<div class="content">
	<h1>Terminuebersicht</h1>
	<p>
	<table>
	<tr>
	<td>Datum</td>
	<td>Beginn</td>
	<td>Ende</td>
	<td>Anzahl Teilnehmer</td>
	<td>Max. Anzahl Teilnehmer</td>
	</tr>
	<?php
			foreach ( upcoming_appointments ( $mysqli, 6, $_SESSION['user_id']) as $appointment ) {
				$subscribers = getCurrentSubscriberCountForAppointment($mysqli, $appointment->getId());
				echo "<tr>";
				echo "<td>".$appointment->getDatum()."</td>";
				echo "<td>".$appointment->getBeginn()."</td>";
				echo "<td>".$appointment->getEnde()."</td>";
				echo "<td>".$subscribers."</td>";
				echo "<td>".$appointment->getMaxAnzahl()."</td>";
				if($subscribers < $appointment->getMaxAnzahl()){
					echo "<td><a href='user_appointment_applies.php?apply=".$appointment->getId()."'>Anmelden</a></td>";
				}else{
					echo "<td>Anmelden</td>";
				}
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