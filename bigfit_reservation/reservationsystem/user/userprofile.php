<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/user_db_helper.php';
include_once '../../includes/functions.php';
sec_session_start();
$userprofile = load_user($mysqli);
print "
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
	<title>Reservation System - Change Profile</title>
	<link rel='stylesheet' type='text/css' href='../../design/userprofile.css' />
</head>
<body>
<div id='createChange'>
		<form action='' method='post'>
	
		<div class='line'>
			<div class='clabel'>
				<label for='username'>Benutzername </label>
			</div>
			<div class='field'>
				<input type='text' name='username' size='20' maxlength='30' value='".$userprofile[1].' '.$userprofile[2]."' disabled />
			</div>
		</div>
		<div class='line'>
			<div class='clabel'>
				<label for='email'>E-Mail </label>
			</div>
			<div class='field'>
				<input type='text' name='email' size='20' maxlength='30' value='".$userprofile[3]."' disabled />
			</div>
		</div>
		<div class='line'>
			<div class='clabel'>
				<label for='oldpwd' class='clabel'>Altes Passwort </label>
			</div>
			<div class='field'>
				<input type='password' name='oldpwd' size='20' maxlength='20' />
			</div>
		</div>
		<div class='line'>
			<div class='clabel'>
				<label for='newpass' class='clabel'>Neues Passwort </label>
			</div>
			<div class='field'>
				<input type='password' name='newpass' size='20' maxlength='20' />
			</div>
		</div><br />
	<div id='button'><input type='submit' value='&Auml;ndern' name='update'/></div>
	</form>
	<p align='left'><a href='../reservation_index.php'>Zur&uuml;ck</a></p>
</div>
</body>
</html>";
?>