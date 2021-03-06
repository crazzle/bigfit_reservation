<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
    // Login erfolgreich
    header ( 'Location: ./reservationsystem/reservation_index.php' );
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
 
 
        <link rel="stylesheet" type="text/css" href="css/bigfit_template.css">
    </head>
    <body>
	    <?php include_once 'includes/navigationsleiste.php'; ?>
	    
	    <div class="content">
	        <?php
	        if (isset($_GET['error'])) {
	            echo '<p class="error">Error Logging In!</p>';
	        }
	        ?> 
	        <form action="includes/process_login.php" method="post" name="login_form">                      
	            Email: <input type="text" name="email" />
	            Password: <input type="password" 
	                             name="password" 
	                             id="password"/>
	            <input type="submit" 
	                   value="Login" 
	                   onclick="formhash(this.form, this.form.password);" /> 
	        </form>
	        <p>You are currently logged <?php echo $logged ?>.</p>
	    </div>
    </body>
   
</html>