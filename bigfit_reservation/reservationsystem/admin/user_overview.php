<?php
$thisPage = "usermgmt";
include_once '../../includes/db_connect.php';
include_once '../../includes/register.inc.php';
include_once '../../includes/user_db_helper.php';
include_once '../../includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/JavaScript" src="../../js/sha512.js"></script>
<script type="text/JavaScript" src="../../js/forms.js"></script>
<link rel="stylesheet" type="text/css"
	href="../../css/bigfit_template.css">
<meta charset="UTF-8">
<title>Mitglieder&uumlbersicht</title>
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
		 <?php endif; ?> 
		 <?php endif; ?>
	
	
	<table id="tableMitgliedOverview">
			<tr>
				<td id="tableMitgliedtdOvlinks">
					<h1>Mitgliederliste</h1> <!-- Mitgliederübersicht -->
					<table id="tableMitglied">
						<tr>
							<td id="tableMitgliedtd"><b>ID</b></td>
							<td id="tableMitgliedtd"><b>Vorname</b></td>
							<td id="tableMitgliedtd"><b>Nachname</b></td>
							<td id="tableMitgliedtd"><b>E-Mail</b></td>
						</tr>
					<?php
					foreach ( all_users ( $mysqli ) as $nutzer ) {
						echo "<tr>";
						echo "<td id='tableMitgliedtd'>".$nutzer->getId()."</td>";
						echo "<td id='tableMitgliedtd'>".$nutzer->getVorname()."</td>";
						echo "<td id='tableMitgliedtd'>".$nutzer->getNachname()."</td>";
						echo "<td id='tableMitgliedtd'>".$nutzer->getEmail()."</td>";
						echo "<td id='tableMitgliedtd'><a href='user_overview.php?delete=".$nutzer->getId()."'>Loeschen</a></td>";
						echo "</tr>";
					 }?>
					</table>
				</td>

				<td id="tableMitgliedtdOvrechts">
					<!-- Mitglieder anlegen -->
			<?php if (login_check($mysqli) == true) : ?>
			<?php if (admin_check($mysqli) == true) :?>
			<h1>Mitglied anlegen</h1>
					<ul>
						<li>Benutzernamen d&uumlrfen nur Ziffern, Gross- und Kleinbuchstaben und
							Unterstriche enthalten.</li>
						<li>E-Mail-Adressen m&uumlssen ein g&uumlltiges Format haben.</li>
						<li>Passw&oumlrter m&uumlssen mindest sechs Zeichen lang sein.</li>
						<li>Passw&oumlrter m&uumlssen enthalten
							<ul>
								<li>mindestens einen Grossbuchstaben (A..Z)</li>
								<li>mindestens einen Kleinbuchstaben (a..z)</li>
								<li>mindestens eine Ziffer (0..9)</li>
							</ul>
						</li>
						<li>Das Passwort und die Best&aumltigung m&uumlssen exakt &uumlbereinstimmen.</li>
					</ul>
					<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
						method="post" name="registration_form">
						<table id="tableFormular">
							<tr>
								<td align="right">Vorname:</td>
								<td><input type='text' name='vorname' id='vorname' /></td>
							</tr>
							<tr>
								<td align="right">Nachname:</td>
								<td><input type='text' name='nachname' id='nachname' /><br>
							
							</tr>
							<tr>
								<td align="right">Email:</td>
								<td><input type="text" name="email" id="email" /></td>
							</tr>
							<tr>
								<td align="right">Passwort:</td>
								<td><input type="password" name="password" id="password" /></td>
							</tr>
							<tr>
								<td align="right">Passwort best&aumltigen:</td>
								<td><input type="password" name="confirmpwd" id="confirmpwd" /></td>
							</tr>
							<tr>
								<td ></td>
								<td><input type="button" value="Mitglied eintragen"
									onclick="return regformhash(this.form,
					                                   this.form.vorname,
					                                   this.form.nachname,
					                                   this.form.email,
					                                   this.form.password,
					                                   this.form.confirmpwd);" /></td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
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