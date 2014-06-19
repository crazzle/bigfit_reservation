
<?php
include_once '../../includes/register.inc.php';
include_once '../../includes/functions.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Termine anlegen</title>

<script type="text/JavaScript" src="js/sha512.js"></script>
<script type="text/JavaScript" src="js/forms.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/bigfit_template.css">
</head>
<body>
	<div class= "Navigation_Top"></div>
	<div class="MenueLeiste">
		<table id="navMenue">
			<tr> 
				<td>
				<a href="http://www.bigfitboxclub.de/">Startseite</a>
				</td> <td>
				<a href="admin/user_management.php">Mitgliederverwaltung</a>
				</td> <td>
				<a href="admin/appointment_management.php">Terminverwaltung</a>
				</td> <td>
				<a href="./includes/logout.php">Ausloggen</a>
				</td>
			</tr>
		</table>
		<div class= "Navigation_Botton"></div>
		<div class="emotionheader"></div>	
	</div>
	

	
	<div class="content">
		<h1>Neue Trainingstermine anlegen</h1>
	
  	
		<p>Termine fuer eintragen fuer die folgenden naechsten Woche</p>

		<form name=myform>
			<select name=mytextarea size=2>
				<option value=one>1</option>
				<option value=two>2</option>
				<option value=three>3</option>
				<option value=four>4</option>
			</select>
		</form>

		<INPUT TYPE="Submit" Name="Submit1" VALUE="Termine eintragen">
	</div>
	
	
</body>


</html>