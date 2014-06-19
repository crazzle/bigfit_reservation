
<?php
include_once 'psl-config.php';
include_once 'klassen/Termin.php';

function add_appointment($mysqli, $datum, $teilnehmer, $beginn, $ende) {
	if ($insert_stmt = $mysqli->prepare ( "INSERT INTO termine (datum, teilnehmer, beginn, ende) VALUES (?, ?, ?, ?)" )) {
		$insert_stmt->bind_param ( 'ssss', $datum, $teilnehmer, $beginn, $ende);
		$insert_stmt->execute();
	}
}
function all_appointments($mysqli) {
	if ($stmt = $mysqli->prepare ( "SELECT id, datum, teilnehmer, beginn, ende
			FROM termine where aktiv = 1 order by datum asc" )) {
			$stmt->execute (); // Execute the prepared query.

			/* bind variables to prepared statement */
			mysqli_stmt_bind_result ( $stmt, $id, $datum, $teilnehmer, $beginn, $ende );

			/* fetch values */
			$ctr = 0;
			while ( mysqli_stmt_fetch ( $stmt ) ) {
				$eintraege [$ctr] = new Termin ( $id, $datum, $beginn, $ende, $teilnehmer );
				$ctr ++;
			}
			return $eintraege;
	} else {
		return false;
	}
}
function upcoming_appointments($mysqli, $count, $user_id) {
	if ($stmt = $mysqli->prepare ( "SELECT id, datum, teilnehmer, beginn, ende
			FROM termine where aktiv = 1 
			and id not in 
			(select termin_id from members_termine_anmeldung where termin_id = id and members_id = ".$user_id.") 
			order by datum asc limit 0, ".$count )) {
			$stmt->execute (); // Execute the prepared query.

			/* bind variables to prepared statement */
			mysqli_stmt_bind_result ( $stmt, $id, $datum, $teilnehmer, $beginn, $ende );

			/* fetch values */
			$ctr = 0;
			while ( mysqli_stmt_fetch ( $stmt ) ) {
				$eintraege [$ctr] = new Termin ( $id, $datum, $beginn, $ende, $teilnehmer );
				$ctr ++;
			}
			return $eintraege;
	} else {
		return false;
	}
}
function delete_appointment($mysqli, $id) {
	if ($stmt = $mysqli->prepare ( "UPDATE termine SET aktiv = 0 WHERE id = ?" )) {
		if ($stmt) {
			$stmt->bind_param('s', $id);
			$stmt->execute (); // Execute the prepared query.
		}
	}
}

function apply_appointment($mysqli, $id, $user_id) {
	if ($stmt = $mysqli->prepare ( "INSERT INTO members_termine_anmeldung (members_id, termin_id) VALUES (?, ?)" )) {
		if ($stmt) {
			$stmt->bind_param('ss', $user_id, $id);
			$stmt->execute (); // Execute the prepared query.
		}
	}
}

?>