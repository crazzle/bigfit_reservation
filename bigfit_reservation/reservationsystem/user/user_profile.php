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
<div class="content">
<?php include_once '../../includes/navigationsleiste.php'; ?>
<?php if (login_check($mysqli) == true) : ?>
		<h1>Profil</h1>
		<form action='<?php echo esc_url($_SERVER['PHP_SELF'])?>' method='post' name='profile_form'>
			<label for='username'>Benutzername </label> 
			<input type='text' name='username' id='username' size='30' maxlength='30' value='<?php echo $userprofile[1]." ".$userprofile[2]?>' disabled /></br>
			<label for='email'>E-Mail </label> 
			<input type='text' name='email' id='email' size='30' maxlength='30' value='<?php echo $userprofile[3]?>' disabled /></br>
			<label for='oldpwd' class='clabel'>Altes Passwort </label> 
			<input type='password' name='oldpwd' id='oldpwd' size='30' maxlength='30' /></br>
			<label for='newpass' class='clabel'>Neues Passwort </label> 
			<input type='password' name='newpass' id='newpass' size='30' maxlength='30' /></br>
			<label for='confpass' class='clabel'>Passwort best&auml;tigen</label>
			<input type='password' name='confpass' id='confpass' size='30' maxlength='30' /></br>
			<input type='button' value='&Auml;ndern' name='update' onclick='return profileformhash(this.form,this.form.oldpwd,this.form.newpass,this.form.confpass);' />
		</form>
	<?php else : ?>
		<a href='../../login.php'>Neu einloggen</a>.
	<?php endif;?>
	</div>
</body>
</html>