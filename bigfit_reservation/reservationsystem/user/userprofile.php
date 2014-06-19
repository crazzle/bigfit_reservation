<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/user_db_helper.php';
include_once '../../includes/functions.php';
sec_session_start();
$userprofile = load_user($mysqli);

if (isset ( $_POST['op'] ) && isset ($_POST['np']) && isset ($_POST['cp'])) {
	$oldpwd = $_POST['op'];
	$newpass = $_POST['np'];
	$confpass = $_POST['cp'];
	if ($newpass == $confpass){
		update_user($mysqli, $oldpwd, $confpass);
		echo "Passwort erfolgreich ge&auml;ndert!";
	}
	else {
		echo "Neues Passwort und Bestätigung des neuen Passworts stimmen nicht überein!";
	}
	
}

print "
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
	<title>Reservation System - Change Profile</title>
	<link rel='stylesheet' type='text/css' href='../../css/userprofile.css' />
</head>
<body>
<div id='createChange'>
		<form action='".esc_url($_SERVER['PHP_SELF'])."' method='post' name='profile_form'>
	
		<div class='line'>
			<div class='clabel'>
				<label for='username'>Benutzername </label>
			</div>
			<div class='field'>
				<input type='text' name='username' id='username' size='30' maxlength='30' value='".$userprofile[1].' '.$userprofile[2]."' disabled />
			</div>
		</div>
		<div class='line'>
			<div class='clabel'>
				<label for='email'>E-Mail </label>
			</div>
			<div class='field'>
				<input type='text' name='email' id='email' size='30' maxlength='30' value='".$userprofile[3]."' disabled />
			</div>
		</div>
		<div class='line'>
			<div class='clabel'>
				<label for='oldpwd' class='clabel'>Altes Passwort </label>
			</div>
			<div class='field'>
				<input type='password' name='oldpwd' id='oldpwd' size='30' maxlength='30' />
			</div>
		</div>
		<div class='line'>
			<div class='clabel'>
				<label for='newpass' class='clabel'>Neues Passwort </label>
			</div>
			<div class='field'>
				<input type='password' name='newpass' id='newpass' size='30' maxlength='30' />
			</div>
		</div>
		<div class='line'>
			<div class='clabel'>
				<label for='confpass' class='clabel'>Passwort best&auml;tigen</label>
			</div>
			<div class='field'>
				<input type='password' name='confpass' id='newpass' size='30' maxlength='30' />
			</div>
		</div><br />
		<div id='button'>
			<input type='submit' value='&Auml;ndern' name='update' onclick='return profileformhash(
										this.form,
										this.form.oldpwd,
										this.form.newpass,
										this.form.confpass
										);' />
		</div>
	</form>
	<p align='left'><a href='../reservation_index.php'>Zur&uuml;ck</a></p>
</div>
</body>
</html>";
?>