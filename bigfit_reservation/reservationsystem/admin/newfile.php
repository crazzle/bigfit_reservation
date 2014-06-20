
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
					<td><a href="http://www.bigfitboxclub.de/">Startseite</a></td> 
						<?php if (admin_check($mysqli) == true) : ?>
							<td><a href="admin/user_management.php">Mitgliederverwaltung</a></td> 
					
							<td><a href="admin/appointment_management.php">Terminverwaltung</a></td> 
				
						<?php endif;?>
				
				
					<td><a href="user/userprofile.php">Profil</a></td> 
				
					<td><a href="user/user_appointment_applies.php">Zu Terminen anmelden</a></td> 
				
					<td><a href="user/user_appointment_overview.php">Meine Termine</a></td> 
				
					<td><a href="./includes/logout.php">Ausloggen</a></td> 
					</tr>
				</table>
				<div class= "Navigation_Botton"></div>
				<div class="emotionheader"></div>	
	</div>
	
	
        

	
      
	
	
</body>


</html>