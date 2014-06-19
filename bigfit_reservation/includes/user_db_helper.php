<?php
include_once 'psl-config.php';
include_once 'klassen/Mitgliedseintrag.php';
function all_users($mysqli) {
	if ($stmt = $mysqli->prepare ( "SELECT id, vorname, nachname, email
			FROM members" )) {
			$stmt->execute (); // Execute the prepared query.

			/* bind variables to prepared statement */
			mysqli_stmt_bind_result ( $stmt, $id, $vorname, $nachname, $email );

			/* fetch values */
			$ctr = 0;
			while ( mysqli_stmt_fetch ( $stmt ) ) {
				$eintraege [$ctr] = new Mitgliedseintrag ( $id, $vorname, $nachname, $email );
				$ctr ++;
			}
			return $eintraege;
	} else {
		// Nicht eingeloggt
		return false;
	}
}
function delete_user($mysqli, $user) {
	if ($stmt = $mysqli->prepare ( "DELETE FROM members WHERE id = ?" )) {
		if ($stmt) {
			$stmt->bind_param('s', $user);
			$stmt->execute (); // Execute the prepared query.
		}
	}
}
function load_user ($mysqli){
	if ($stmt = $mysqli->prepare ( "SELECT id, vorname, nachname, email
			FROM members where id = ". $_SESSION['user_id'] )) {
			$stmt->execute ();// Execute the prepared query.

			mysqli_stmt_bind_result ( $stmt, $id, $vorname, $nachname, $email );

			$stmt->store_result ();

			/* fetch user */
			$user = array();
			$count = 0;
			mysqli_stmt_fetch($stmt);
			$user [$count] = $id;
			$count++;
			$user [$count] = $vorname;
			$count++;
			$user [$count] = $nachname;
			$count++;
			$user [$count] = $email;
			$count++;
			return $user;
	} else {
		// Not found
		return false;
	}
}

function update_user ($mysqli, $opw, $cpw){

	if ($stmt = $mysqli->prepare ( "SELECT password, salt FROM members WHERE id = ? LIMIT 1" )) {
		$stmt->bind_param ( 'p', $_SESSION['user_id'] ); // Bind "user_id" to parameter.
		$stmt->execute (); // Fuehre die vorbereitete Anfrage aus.
		$stmt->store_result ();

		// hole Variablen von result.
		$stmt->bind_result ( $db_password, $salt );
		$stmt->fetch ();

		// hash das Passwort mit dem eindeutigen salt.
		$password = hash ( 'sha512', $opw . $salt );
		// Ueberpruefe, ob das Passwort in der Datenbank mit dem vom
		// Benutzer angegebenen alten Passwort uebereinstimmt.
		if ($db_password == $opw) {

			// Erstelle ein zufaelliges Salt
			$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

			// Erstelle saltet Passwort
			$password = hash('sha512', $cpw . $random_salt);
			// Aktualisiere das Passwort des Benutzers in der Datenbank
			if ($update_stmt = $mysqli->prepare("UPDATE members SET password='', salt='' WHERE id= '' ")) {

				$update_stmt->bind_param($cpw, $random_salt, $_SESSION ['user_id']);
				// FŸhre die vorbereitete Anfrage aus.
				$update_stmt->execute();
			}
		}
	}
}

?>