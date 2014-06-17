
<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/termin_db_helper.php';
include_once '../../includes/functions.php';
sec_session_start ();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Termin anlegen</title>
<link rel="stylesheet"
	href="../../css/ui-lightness/jquery-ui-1.10.4.custom.css">
<link rel="stylesheet" href="../../css/ui-lightness/ui.timepickr.css">
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery-ui-1.10.4.custom.js"></script>
<script src="../../js/jquery.ui.datepicker-de.js"></script>
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
</script>
</head>
<body>
<?php
if (isset ( $_POST ['date'] )) {
	$datum = $_POST ['date'];
	echo "Das Datum ist: " . $datum;
}

?>
<form action='termin_erstellen.php' method='post'>
		<p>
			Datum auswaehlen: <input type="text" id="datepicker" name='date'>
		</p>
		<p>
			Beginn:<input type="text" id="timepicker" name='begin'>
		</p>
		<p>
			Ende:<input type="text" id="timepicker" name='end'>
		</p>
		<input type='submit' value='Termin anlegen'>
	</form>
</body>
</html>