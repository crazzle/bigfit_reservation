<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['vorname'], $_POST['nachname'], $_POST['email'], $_POST['p'])) {
    // Bereinige und �berpr�fe die Daten
    $vorname = filter_input(INPUT_POST, 'vorname', FILTER_SANITIZE_STRING);
    $nachname = filter_input(INPUT_POST, 'nachname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // keine g�ltige E-Mail
        $error_msg .= '<p class="error">Die eingegebene E-Mail-Adresse ist nicht g�ltig</p>';
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // Das gehashte Passwort sollte 128 Zeichen lang sein.
        // Wenn nicht, dann ist etwas sehr seltsames passiert
        $error_msg .= '<p class="error">Falsche Passwort-Konfiguration.</p>';
    }
 
    // Benutzername und Passwort wurde auf der Benutzer-Seite schon �berpr�ft.
    // Das sollte gen�gen, denn niemand hat einen Vorteil, wenn diese Regeln   
    // verletzt werden.
    //
    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // Ein Benutzer mit dieser E-Mail-Adresse existiert schon
            $error_msg .= '<p class="error">Es existiert bereits ein Nutzer mit dieser E-Mail-Adresse.</p>';
        }
    } else {
        $error_msg .= '<p class="error">Datenbankfehler</p>';
    }
 
    // Noch zu tun: 
    // Wir m�ssen uns noch um den Fall k�mmern, wo der Benutzer keine
    // Berechtigung f�r die Anmeldung hat indem wir �berpr�fen welche Art 
    // von Benutzer versucht diese Operation durchzuf�hren.
    if (empty($error_msg)) {
        // Erstelle ein zuf�lliges Salt
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
 
        // Erstelle saltet Passwort 
        $password = hash('sha512', $password . $random_salt);
        // Trage den neuen Benutzer in die Datenbank ein 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (vorname, nachname, rolle, email, password, salt) VALUES (?, ?, ?, ?, ?, ?)")) {
            $rolle = "user";
        	$insert_stmt->bind_param('ssssss', $vorname, $nachname, $rolle, $email, $password, $random_salt);
            // F�hre die vorbereitete Anfrage aus.
            if (! $insert_stmt->execute()) {
                header('Location: ../../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ../../reservationsystem/admin/user_registration_success.php');
    }
}