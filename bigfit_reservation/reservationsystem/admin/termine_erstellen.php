<?php
include_once '../../includes/register.inc.php';
include_once '../../includes/functions.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Termine anlegen</title>

<script type="text/JavaScript" src="js/sha512.js"></script>
<script type="text/JavaScript" src="js/forms.js"></script>
<link rel="stylesheet" type="text/css" href="Test.css">
</head>
<body>
	<h1>Neue Trainingstermine anlegen</h1>

	<?php
	setlocale(LC_TIME, "de_DE");
	$tage = array("Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag");
	echo "<table>";
	echo "<tr>";
		for($countDays = 0; $countDays <= 6; $countDays ++)
		{
			echo "<td><input type='checkbox' name='day'".$tage[$countDays]."' value='".$tage[$countDays]."' />".$tage[$countDays]."</td>";
			echo "<tr>";
			echo "<td></td>";
			for($countHours= 10; $countHours <= 21; $countHours ++)
			{
				echo "<td><input type='checkbox' name='hour'".$tage[$countDays].$countHours."' value='".$tage[$countDays].$countHours."':00' />".$countHours.":00</td>";			
			}
			echo "</tr>";
			//echo "<br />";
		}
	
	echo "</tr>";
	echo "</table>";
	?>
  	
	<p>Termine fuer eintragen fuer die folgenden naechsten Woche</p>

	<form name=myform>
		<select name=mytextarea size=2>
			<option value=one>1</option>
			<option value=two>2</option>
			<option value=three>3</option>
			<option value=four>4</option>
			<option value=four>5</option>
			<option value=four>6</option>
			<option value=four>7</option>
			<option value=four>8</option>
			<option value=four>9</option>
			<option value=four>10</option>
			<option value=four>11</option>
			<option value=four>12</option>
			<option value=four>13</option>
			<option value=four>14</option>
			<option value=four>15</option>
			<option value=four>16</option>
			<option value=four>17</option>
			<option value=four>18</option>
			<option value=four>19</option>
			<option value=four selected>20</option>

		</select>
	</form>

	<INPUT TYPE="Submit" Name="Submit1" VALUE="Termine eintragen">

</body>


</html>