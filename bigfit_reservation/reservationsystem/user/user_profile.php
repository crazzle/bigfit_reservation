<?php
$thisPage = "profile";
include_once '../../includes/db_connect.php';
include_once '../../includes/user_db_helper.php';
include_once '../../includes/functions.php';
sec_session_start ();
$userprofile = load_user ( $mysqli );
?>
<!DOCTYPE html>
<html>
<head>
<title>Reservation System - Profil</title>
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
		<h1>Profil</h1>
		
			<form action='<?php echo esc_url($_SERVER['PHP_SELF'])?>' method='post' name='profile_form'>
				<table id="tableFormular">
					<tr>			
						<td align="right">Benutzername</td>
						<td><input type='text' name='username' id='username' size='30' maxlength='30' value='<?php echo $userprofile[1]." ".$userprofile[2]?>' disabled /></td>
					</tr>
					<tr>
						<td align="right">E-Mail</td>
						<td><input type='text' name='email' id='email' size='30' maxlength='30' value='<?php echo $userprofile[3]?>' disabled /></td>
					</tr>
					<tr>
						<td align="right">Altes Passwort</td>
						<td><input type='password' name='oldpwd' id='oldpwd' size='30' maxlength='30' /></td>
					</tr>
					<tr>
						<td align="right">Neues Passwort</td>
						<td><input type='password' name='newpass' id='newpass' size='30' maxlength='30' /></td>
					</tr>
					<tr>
						<td align="right">Passwort best&auml;tigen</td>
						<td><input type='password' name='confpass' id='confpass' size='30' maxlength='30' /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type='button' value='&Auml;ndern' name='update' onclick='return profileformhash(this.form,this.form.oldpwd,this.form.newpass,this.form.confpass);' /></td>
					</tr>
				</table>
			</form>
	
	<?php else : ?>
		<a href='../../index.php'>Neu einloggen</a>.
	<?php endif;?>
	</div>
</body>
</html>