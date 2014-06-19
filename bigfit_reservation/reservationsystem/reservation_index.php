<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
include_once '../includes/user_db_helper.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Reservation System</title>
</head>
<body>
	<p>Reservationssystem</p>
        <?php if (login_check($mysqli) == true) :
        
       		$user = load_user($mysqli);
        	echo "Willkommen ".$user [1]." ".$user [2]."!" ?>
            
			
			<?php if (admin_check($mysqli) == true) : ?>
			<p>
				Fuer die Verwaltung der Mitglieder gehe auf <a href="admin/user_management.php">Mitgliederverwaltung</a>
			</p>
			
			<p>
				Fuer die Verwaltung der Termine gehe auf <a href="admin/appointment_management.php">Terminverwaltung</a>
			</p>
			
			<?php endif;?>
			
			<p>
				Fuer die Aenderungen auf deinem Profil gehe auf <a href="user/userprofil.php">Profil</a>
			</p>
			
			<p>
				Um dich fuer Termine anzumelden gehe auf <a href="user/user_appointment_overview.php">Zu Terminen anmelden</a>
			</p>
			 
			<p><a href="../includes/logout.php">Ausloggen</a>.</p>
        <?php else : ?>
            <p>
			<span class="error">Du bist nicht eingeloggt.</span> Bitte <a
				href="../login.php">einloggen</a>.
			</p>
        <?php endif; ?>
    </body>
</html>