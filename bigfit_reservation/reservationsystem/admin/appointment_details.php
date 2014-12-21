<?php
$thisPage = "appointmentmgmt";
include_once '../../includes/db_connect.php';
include_once '../../includes/termin_db_helper.php';
include_once '../../includes/user_db_helper.php';
include_once '../../includes/functions.php';
sec_session_start ();
if (isset($_GET['tid'])){
	$tid = $_GET['tid'];
}
$appointment = load_appointment ( $mysqli, $tid );
setlocale(LC_TIME, "de_DE");
?>
<!DOCTYPE html>
<html>
<head>
<title>Reservation System - Termindetails</title>
<script type='text/JavaScript' src='../../js/sha512.js'></script>
<script type='text/JavaScript' src='../../js/forms.js'></script>
<link rel='stylesheet' type='text/css' href='../../css/bigfit_template.css'>
</head>
<body>
<?php include_once '../../includes/navigationsleiste.php'; ?>
<?php if (login_check($mysqli) == true) : ?>
<div class="content">
<h1>Termindetails für <?php echo strftime('%d %b %Y', strtotime($appointment[0]))?></h1>
<h3><?php echo "Von ".$appointment[1]." bis ".$appointment[2]." Uhr"?></h3>
<table id="tableMitgliedOverview">
			<tr>
				<td id="tableMitgliedtdOvlinks">

<!-- Teilnehmerübersicht -->
					<table id="tableOverview">
						<tr>
							<td id="tableMitgliedtd"></td>
							<td colspan="2" id="tableMitgliedtd"> Aktuelle Teilnehmeranzahl: <?php echo $appointment[3];?><br>
							Maximale Teilnehmeranzahl: <?php echo $appointment[4];?><br><br></td>
						</tr>
						<tr>
							<td id="tableMitgliedtd"></td>
							<td id="tableMitgliedtd"><b>Vorname</b></td>
							<td id="tableMitgliedtd"><b>Nachname</b></td>
						</tr>
					<?php
					foreach ( load_appointment_members ( $mysqli, $tid ) as $nutzereintrag ) {
						echo "<tr>";
						echo "<td id='tableMitgliedtd'>&emsp;</td>";
						echo "<td id='tableMitgliedtd'>".$nutzereintrag[0]."</td>";
						echo "<td id='tableMitgliedtd'>".$nutzereintrag[1]."</td>";
						echo "</tr>";
					 }?>
					</table>
				</td>
				<td>
				&nbsp;
				</td>
				<td id="tableMitgliedtdOvrechts">
				<table id="tableOverview">
						<tr>
							<td id="tableMitgliedtd">
							&nbsp;
							</td>
						</tr>
				<?php 
				echo "<td id='tableTermintd'><a href='appointment_overview.php?delete=".$tid."'>L&oumlschen</a></td>";
				echo "<tr><td id='tableMitgliedtd'><a href='appointment_overview.php'>Zurück zur Terminübersicht</a></td></tr>"; 
				?>
				</table>
				</td>
				
			</tr>
		</table>
					
				
	
	<?php else : ?>
		<a href='../../index.php'>Neu einloggen</a>.
	<?php endif;?>

</div>
</body>
</html>