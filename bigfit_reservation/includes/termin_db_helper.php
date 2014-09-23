
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
		FROM termine where datum >= CURDATE() order by datum desc" )) {
		$stmt->execute (); 

		mysqli_stmt_bind_result ( $stmt, $id, $datum, $teilnehmer, $beginn, $ende );

		$ctr = 0;
		$eintraege = array();
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
		FROM termine WHERE id not in 
		(select termin_id from members_termine_anmeldung where termin_id = id and members_id = ".$user_id.") 
		order by datum desc limit 0, ".$count )) {
		$stmt->execute ();

		mysqli_stmt_bind_result ( $stmt, $id, $datum, $teilnehmer, $beginn, $ende );

		$ctr = 0;
		$eintraege = array();
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
	if ($stmt = $mysqli->prepare ( "DELETE FROM termine WHERE id = ?" )) {
		if ($stmt) {
			$stmt->bind_param('s', $id);
			$stmt->execute ();
		}
	}
}
function apply_appointment($mysqli, $id, $user_id) {
	if ($stmt = $mysqli->prepare ( "INSERT INTO members_termine_anmeldung (members_id, termin_id) VALUES (?, ?)" )) {
		if ($stmt) {
			$stmt->bind_param('ss', $user_id, $id);
			$stmt->execute ();
		}
	}
}
function subscribed_upcoming_appointments($mysqli, $user_id) {
	if ($stmt = $mysqli->prepare ( "SELECT id, datum, teilnehmer, beginn, ende
		FROM termine WHERE id in
		(select termin_id from members_termine_anmeldung where termin_id = id and members_id = ".$user_id.")
		order by datum desc")) {
		$stmt->execute ();

		mysqli_stmt_bind_result ( $stmt, $id, $datum, $teilnehmer, $beginn, $ende );

		$ctr = 0;
		$eintraege = array();
		while ( mysqli_stmt_fetch ( $stmt ) ) {
			$eintraege [$ctr] = new Termin ( $id, $datum, $beginn, $ende, $teilnehmer );
			$ctr ++;
		}
		return $eintraege;
	} else {
		return false;
	}
}
function unsubscribe_upcoming_appointment($mysqli, $id, $user_id) {
	if ($stmt = $mysqli->prepare ( "DELETE FROM members_termine_anmeldung WHERE termin_id = ".$id." and members_id = ".$user_id )){
		$stmt->execute ();
			return true;
	} else {
		return false;
	}
}
function getCurrentSubscriberCountForAppointment($mysqli, $id){
	if ($stmt = $mysqli->prepare ( "SELECT count(termin_id) 
			FROM members_termine_anmeldung 
			WHERE termin_id = ".$id)) {
		$stmt->execute ();
		mysqli_stmt_bind_result ( $stmt, $count);
		mysqli_stmt_fetch ( $stmt );
		return $count;
	} else {
		return false;
	}
}
?>