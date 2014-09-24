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
?>
<!DOCTYPE html>
<html>
<head>
<title>Reservation System - Termindetails</title>
<script type='text/JavaScript' src='../../js/sha512.js'></script>
<script type='text/JavaScript' src='../../js/forms.js'></script>
<link rel='stylesheet' type='text/css' href='../../css/bigfit_template.css'>
<?php if (isset ( $_POST ['op'] ) && isset ( $_POST ['np'] ) && isset ( $_POST ['cp'] )) {
	$oldpwd = $_POST ['op'];
	$newpass = $_POST ['np'];
	$confpass = $_POST ['cp'];
	if (update_user ( $mysqli, $oldpwd, $confpass )) {
		echo "<script type=text/JavaScript>alert('Passwort erfolgreich geändert!');</script>";
	} else {
		echo "<script type=text/JavaScript>alert('Das eingegebene alte Passwort ist falsch!');</script>";
	}
}?>
</head>
<body>
<?php include_once '../../includes/navigationsleiste.php'; ?>
<?php if (login_check($mysqli) == true) : ?>
<div class="content">
<h1>Termindetails für <?php echo $appointment[0]?></h1>
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
					$midcheck = false;
					foreach ( load_appointment_members ( $mysqli, $tid ) as $nutzereintrag ) {
						echo "<tr>";
						echo "<td id='tableMitgliedtd'>&emsp;</td>";
						echo "<td id='tableMitgliedtd'>".$nutzereintrag[0]."</td>";
						echo "<td id='tableMitgliedtd'>".$nutzereintrag[1]."</td>";
						echo "</tr>";
						if ($nutzereintrag[2] == $_SESSION['user_id']) {
							$midcheck = true;
						}
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
					foreach ( subscribed_upcoming_appointments ( $mysqli, $_SESSION['user_id']) as $sub_app ) {
						$appointment_id = $sub_app->getId();
						if ($appointment_id == $tid) {
							echo "<tr><td id='tableMitgliedtd'><a href='user_appointment_overview.php?unapply=".$tid."'>Abmelden</a></td></tr>";
						} 
					} 
					if ($midcheck == false && $appointment[4] != $appointment[3]){
							echo "<tr><td id='tableMitgliedtd'><a href='user_appointment_applies.php?apply=".$tid."'>Anmelden</a></td></tr>"; 
					}
				echo "<tr><td id='tableMitgliedtd'><a href='user_appointment_applies.php'>Terminübersicht</a></td></tr>"; 
				echo "<tr><td id='tableMitgliedtd'><a href='user_appointment_overview.php'>Meine Termine</a></td></tr>"; 
				?>
				</table>
				</td>
				
			</tr>
		</table>
				</td>
			</tr>
		</table>		
				
	
	<?php else : ?>
		<a href='../../login.php'>Neu einloggen</a>.
	<?php endif;?>

</div>
</body>
</html>