
<?php
include_once 'psl-config.php';

function add_termin($mysqli, $datum, $teilnehmer, $beginn, $ende) {
	if ($insert_stmt = $mysqli->prepare ( "INSERT INTO termine (datum, teilnehmer, beginn, ende) VALUES (?, ?, ?, ?)" )) {
		$insert_stmt->bind_param ( 'ssss', $datum, $teilnehmer, $beginn, $ende);
		$insert_stmt->execute();
	}
}
function delete_user($mysqli, $user) {
	if ($stmt = $mysqli->prepare ( "UPDATE members SET aktiv = 0 WHERE id = ?" )) {
		if ($stmt) {
			$stmt->bind_param ( 's', $user );
			$stmt->execute (); // Execute the prepared query.
		}
	}
}
function load_user($mysqli) {
	if ($stmt = $mysqli->prepare ( "SELECT id, vorname, nachname, email
			FROM members where id = " . $_SESSION ['user_id'] )) {
		$stmt->execute (); // Execute the prepared query.
		
		mysqli_stmt_bind_result ( $stmt, $id, $vorname, $nachname, $email );
		
		$stmt->store_result ();
		
		/* fetch user */
		$user = array ();
		$count = 0;
		mysqli_stmt_fetch ( $stmt );
		$user [$count] = $id;
		$count ++;
		$user [$count] = $vorname;
		$count ++;
		$user [$count] = $nachname;
		$count ++;
		$user [$count] = $email;
		$count ++;
		return $user;
	} else {
		// Not found
		return false;
	}
}

$tage = array (
		"Montag",
		"Dienstag",
		"Mittwoch",
		"Donnerstag",
		"Freitag",
		"Samstag",
		"Sonntag" 
);

?>