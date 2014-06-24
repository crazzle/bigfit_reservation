<?php
$thisPage = "";
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
<link rel="stylesheet" type="text/css" href="../css/bigfit_template.css">
</head>
<body>
		<?php include_once '../includes/navigationsleiste.php'; ?>
		<div class="content">
        <?php if (login_check($mysqli) == true) :
        
       		$user = load_user($mysqli);
        	echo "Willkommen ".$user [1]." ".$user [2]."!" ?>
            
        <?php else : ?>
            <p>
			<span class="error">Du bist nicht eingeloggt.</span> Bitte <a
				href="../login.php">einloggen</a>.
			</p>
        <?php endif; ?>
        </div>
    </body>
</html>