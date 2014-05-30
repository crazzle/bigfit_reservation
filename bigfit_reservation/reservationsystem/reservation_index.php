<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
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
        <?php if (login_check($mysqli) == true) : ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
			
			<?php if (admin_check($mysqli) == true) : ?>
			<p>
				For User management go to <a href="admin/user_management.php">User
					Management</a>
			</p>
			<?php endif; ?> 
			<p>If you are done, please <a href="../includes/logout.php">log out</a>.</p>
        <?php else : ?>
            <p>
			<span class="error">You are not logged in.</span> Please <a
				href="../login.php">login</a>.
			</p>
        <?php endif; ?>
    </body>
</html>