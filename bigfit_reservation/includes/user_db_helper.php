<?php
include_once 'psl-config.php';
include_once 'klassen/Mitgliedseintrag.php';
function all_users($mysqli) {
	if ($stmt = $mysqli->prepare ( "SELECT id, vorname, nachname, email
			FROM members where aktiv = 1" )) {
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
	if ($stmt = $mysqli->prepare ( "UPDATE members SET aktiv = 0 WHERE id = ?" )) {
		if ($stmt) {
			$stmt->bind_param('s', $user);
			$stmt->execute (); // Execute the prepared query.
		}
	}
}

function load_user ($mysqli){
	if ($stmt = $mysqli->prepare ( "SELECT id, vorname, nachname, email
			FROM members where id = ". $_SESSION ['user_id'] )) {
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
?>