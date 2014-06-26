<?php
$thisPage = "appointmentmgmt";
include_once '../../includes/db_connect.php';
include_once '../../includes/termin_db_helper.php';
include_once '../../includes/functions.php';
sec_session_start ();
?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../../css/bigfit_template.css">
<meta charset="utf-8">
<title>Termin anlegen</title>
<link rel="stylesheet"
	href="../../css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery-ui-1.10.4.custom.js"></script>
<script src="../../js/jquery.ui.datepicker-de.js"></script>
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});

	function checkInfos(){
		var pattTime = new RegExp("^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$","i");
		var begin = document.getElementById("beginnTime").value;
		var checkBegin = pattTime.test(begin);
		var end = document.getElementById("endeTime").value;
		var checkEnd = pattTime.test(end);

		var pattDate = new RegExp("^\\d{2}\\.\\d{2}\\.\\d{4}$","i");
		var date = document.getElementById("datepicker").value;
		var checkDate = pattDate.test(date);

		var pattMember = new RegExp("^\\d+$","i");
		var member = document.getElementById("memberCount").value;
		var checkMember = pattMember.test(member);
		
		if(!checkDate){
			document.getElementById("wrongDate").style.display = ""; 
		}else{
			document.getElementById("wrongDate").style.display = "none"; 
		}
		if(!checkBegin){
			document.getElementById("wrongBeginn").style.display = ""; 
		}else{
			document.getElementById("wrongBeginn").style.display = "none"; 
		}
		if (!checkEnd){
			document.getElementById("wrongEnde").style.display = ""; 
		}else{
			document.getElementById("wrongEnde").style.display = "none"; 
		} 
		if (!checkMember){
			document.getElementById("wrongCount").style.display = ""; 
		}else{
			document.getElementById("wrongCount").style.display = "none"; 
		} 
		if (checkBegin && checkEnd && checkDate && checkMember){
			document.getElementById("terminErstellenForm").submit();
		}
	};
	</script>
	
</head>
<body>
		<?php include_once '../../includes/navigationsleiste.php'; ?>
		<div class="content">
<?php if (login_check($mysqli) == true) : ?>
		<?php if (admin_check($mysqli) == true) :?>
<?php

		if (isset ( $_POST ['date'] ) && isset ( $_POST ['begin'] ) && isset ( $_POST ['end'] ) && isset ( $_POST ['memberCount'] )) {
			$datum = $_POST ['date'];
			$formattedDate = DateTime::createFromFormat ( 'd.m.Y', $datum )->format ( 'Y-m-d' );
			$begin = $_POST ['begin'];
			$end = $_POST ['end'];
			$memberCount = $_POST ['memberCount'];
			add_appointment ( $mysqli, $formattedDate, $memberCount, $begin, $end );
			echo "Termin angelegt: " . $datum . ", Uhrzeit: " . $begin . " - " . $end . ", Max. Boxer: " . $memberCount;
		}
		
		?>
<form action='appointment_creation.php' method='post'
		id="terminErstellenForm">
		<h1>Termin erstellen</h1>
		<p>
	
		<div>
			Datum auswaehlen:<input type="text" id="datepicker" name='date'>
			<div id="wrongDate" style="display: none;">Bitte Datum im Format
				DD.MM.YYYY eingeben.</div>
		</div>

		<div>
			Beginn: <input type="text" id="beginnTime" name='begin'>
			<div id="wrongBeginn" style="display: none;">Bitte Uhrzeit im Format
				HH:MM eingeben.</div>
		</div>

		<div>
			Ende:<input type="text" id="endeTime" name='end'>
			<div id="wrongEnde" style="display: none;">Bitte Uhrzeit im Format
				HH:MM eingeben.</div>
		</div>

		<div>
			Max. Teilnehmer:<input type="text" id="memberCount"
				name='memberCount' value="15">
			<div id="wrongCount" style="display: none;">Bitte eine Zahl eingeben.</div>
		</div>
	</form>
	<input type='button' value='Termin anlegen' onclick="checkInfos()">
	<?php else : ?>
            <p>
		<span class="error">Du bist kein Administrator.</span> Bitte als
		Administrator <a href="../../index.php">einloggen</a>.
	</p>
        <?php endif; ?>
	 <?php else : ?>
            <p>
		<span class="error">Du bist nicht eingeloggt.</span> Bitte <a
			href="../../index.php">einloggen</a>.
	</p>
        <?php endif; ?>
        </div>
</body>
</html>