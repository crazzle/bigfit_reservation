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
?>