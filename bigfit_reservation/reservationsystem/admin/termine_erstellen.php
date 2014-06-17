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
	<table>
	<?php
	
	for($count = 1; $count <= 7; $count ++) {
		echo "<tr>";
		echo "<th>";
		echo "<input type='checkbox' name='weekDay" . $count . "' value='" . $count . "' /></th><th>".date("l", mktime(0, 0, 0, 7, 1, 2000))."</th>";
		echo "<tr>";
		for($countDays = 1; $countDays <= 15; $countDays ++){
			echo "<td><input type='checkbox' name='dayHour'".$countDays."' value='".$countDays."' /></td>";
			echo "<td>9:00</td>";
		}
		echo "</tr>";
	}
	
	?>
  	<tr>
			<th><input type="checkbox" name="cMo" value="1" /></th>
			<th>Montag</th>
			<td></td>
			<td><input type="checkbox" name="cT1" value="2" /></td>
			<td>9:00</td>
			<td><input type="checkbox" name="cT2" value="3" /></td>
			<td>10:00</td>
			<td><input type="checkbox" name="cT3" value="4" /></td>
			<td>11:00</td>
			<td><input type="checkbox" name="cT4" value="5" /></td>
			<td>12:00</td>
			<td><input type="checkbox" name="cT5" value="6" /></td>
			<td>13:00</td>
			<td><input type="checkbox" name="cT6" value="7" /></td>
			<td>14:00</td>
			<td><input type="checkbox" name="cT7" value="8" /></td>
			<td>15:00</td>
			<td><input type="checkbox" name="cT8" value="9" /></td>
			<td>16:00</td>
			<td><input type="checkbox" name="cT9" value="10" /></td>
			<td>17:00</td>
			<td><input type="checkbox" name="cT10" value="11" /></td>
			<td>18:00</td>
			<td><input type="checkbox" name="cT11" value="12" /></td>
			<td>19:00</td>
			<td><input type="checkbox" name="cT12" value="13" /></td>
			<td>20:00</td>
			<td><input type="checkbox" name="cT13" value="14" /></td>
			<td>21:00</td>
			<td><input type="checkbox" name="cT14" value="15" /></td>
			<td>22:00</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="cDi" value="2" /></td>
			<td>Dienstag</td>
			<td></td>
			<td><input type="checkbox" name="cT1" value="2" /></td>
			<td>9:00</td>
			<td><input type="checkbox" name="cT2" value="3" /></td>
			<td>10:00</td>
			<td><input type="checkbox" name="cT3" value="4" /></td>
			<td>11:00</td>
			<td><input type="checkbox" name="cT4" value="5" /></td>
			<td>12:00</td>
			<td><input type="checkbox" name="cT5" value="6" /></td>
			<td>13:00</td>
			<td><input type="checkbox" name="cT6" value="7" /></td>
			<td>14:00</td>
			<td><input type="checkbox" name="cT7" value="8" /></td>
			<td>15:00</td>
			<td><input type="checkbox" name="cT8" value="9" /></td>
			<td>16:00</td>
			<td><input type="checkbox" name="cT9" value="10" /></td>
			<td>17:00</td>
			<td><input type="checkbox" name="cT10" value="11" /></td>
			<td>18:00</td>
			<td><input type="checkbox" name="cT11" value="12" /></td>
			<td>19:00</td>
			<td><input type="checkbox" name="cT12" value="13" /></td>
			<td>20:00</td>
			<td><input type="checkbox" name="cT13" value="14" /></td>
			<td>21:00</td>
			<td><input type="checkbox" name="cT14" value="15" /></td>
			<td>22:00</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="cDi" value="2" /></td>
			<td>Mittwoch</td>
			<td></td>
			<td><input type="checkbox" name="cT1" value="2" /></td>
			<td>9:00</td>
			<td><input type="checkbox" name="cT2" value="3" /></td>
			<td>10:00</td>
			<td><input type="checkbox" name="cT3" value="4" /></td>
			<td>11:00</td>
			<td><input type="checkbox" name="cT4" value="5" /></td>
			<td>12:00</td>
			<td><input type="checkbox" name="cT5" value="6" /></td>
			<td>13:00</td>
			<td><input type="checkbox" name="cT6" value="7" /></td>
			<td>14:00</td>
			<td><input type="checkbox" name="cT7" value="8" /></td>
			<td>15:00</td>
			<td><input type="checkbox" name="cT8" value="9" /></td>
			<td>16:00</td>
			<td><input type="checkbox" name="cT9" value="10" /></td>
			<td>17:00</td>
			<td><input type="checkbox" name="cT10" value="11" /></td>
			<td>18:00</td>
			<td><input type="checkbox" name="cT11" value="12" /></td>
			<td>19:00</td>
			<td><input type="checkbox" name="cT12" value="13" /></td>
			<td>20:00</td>
			<td><input type="checkbox" name="cT13" value="14" /></td>
			<td>21:00</td>
			<td><input type="checkbox" name="cT14" value="15" /></td>
			<td>22:00</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="cDi" value="2" /></td>
			<td>Donnerstag</td>
			<td></td>
			<td><input type="checkbox" name="cT1" value="2" /></td>
			<td>9:00</td>
			<td><input type="checkbox" name="cT2" value="3" /></td>
			<td>10:00</td>
			<td><input type="checkbox" name="cT3" value="4" /></td>
			<td>11:00</td>
			<td><input type="checkbox" name="cT4" value="5" /></td>
			<td>12:00</td>
			<td><input type="checkbox" name="cT5" value="6" /></td>
			<td>13:00</td>
			<td><input type="checkbox" name="cT6" value="7" /></td>
			<td>14:00</td>
			<td><input type="checkbox" name="cT7" value="8" /></td>
			<td>15:00</td>
			<td><input type="checkbox" name="cT8" value="9" /></td>
			<td>16:00</td>
			<td><input type="checkbox" name="cT9" value="10" /></td>
			<td>17:00</td>
			<td><input type="checkbox" name="cT10" value="11" /></td>
			<td>18:00</td>
			<td><input type="checkbox" name="cT11" value="12" /></td>
			<td>19:00</td>
			<td><input type="checkbox" name="cT12" value="13" /></td>
			<td>20:00</td>
			<td><input type="checkbox" name="cT13" value="14" /></td>
			<td>21:00</td>
			<td><input type="checkbox" name="cT14" value="15" /></td>
			<td>22:00</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="cDi" value="2" /></td>
			<td>Freitag</td>
			<td></td>
			<td><input type="checkbox" name="cT1" value="2" /></td>
			<td>9:00</td>
			<td><input type="checkbox" name="cT2" value="3" /></td>
			<td>10:00</td>
			<td><input type="checkbox" name="cT3" value="4" /></td>
			<td>11:00</td>
			<td><input type="checkbox" name="cT4" value="5" /></td>
			<td>12:00</td>
			<td><input type="checkbox" name="cT5" value="6" /></td>
			<td>13:00</td>
			<td><input type="checkbox" name="cT6" value="7" /></td>
			<td>14:00</td>
			<td><input type="checkbox" name="cT7" value="8" /></td>
			<td>15:00</td>
			<td><input type="checkbox" name="cT8" value="9" /></td>
			<td>16:00</td>
			<td><input type="checkbox" name="cT9" value="10" /></td>
			<td>17:00</td>
			<td><input type="checkbox" name="cT10" value="11" /></td>
			<td>18:00</td>
			<td><input type="checkbox" name="cT11" value="12" /></td>
			<td>19:00</td>
			<td><input type="checkbox" name="cT12" value="13" /></td>
			<td>20:00</td>
			<td><input type="checkbox" name="cT13" value="14" /></td>
			<td>21:00</td>
			<td><input type="checkbox" name="cT14" value="15" /></td>
			<td>22:00</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="cDi" value="2" /></td>
			<td>Samstag</td>
			<td></td>
			<td><input type="checkbox" name="cT1" value="2" /></td>
			<td>9:00</td>
			<td><input type="checkbox" name="cT2" value="3" /></td>
			<td>10:00</td>
			<td><input type="checkbox" name="cT3" value="4" /></td>
			<td>11:00</td>
			<td><input type="checkbox" name="cT4" value="5" /></td>
			<td>12:00</td>
			<td><input type="checkbox" name="cT5" value="6" /></td>
			<td>13:00</td>
			<td><input type="checkbox" name="cT6" value="7" /></td>
			<td>14:00</td>
			<td><input type="checkbox" name="cT7" value="8" /></td>
			<td>15:00</td>
			<td><input type="checkbox" name="cT8" value="9" /></td>
			<td>16:00</td>
			<td><input type="checkbox" name="cT9" value="10" /></td>
			<td>17:00</td>
			<td><input type="checkbox" name="cT10" value="11" /></td>
			<td>18:00</td>
			<td><input type="checkbox" name="cT11" value="12" /></td>
			<td>19:00</td>
			<td><input type="checkbox" name="cT12" value="13" /></td>
			<td>20:00</td>
			<td><input type="checkbox" name="cT13" value="14" /></td>
			<td>21:00</td>
			<td><input type="checkbox" name="cT14" value="15" /></td>
			<td>22:00</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="cDi" value="2" /></td>
			<td>Sonntag</td>
			<td></td>
			<td><input type="checkbox" name="cT1" value="2" /></td>
			<td>9:00</td>
			<td><input type="checkbox" name="cT2" value="3" /></td>
			<td>10:00</td>
			<td><input type="checkbox" name="cT3" value="4" /></td>
			<td>11:00</td>
			<td><input type="checkbox" name="cT4" value="5" /></td>
			<td>12:00</td>
			<td><input type="checkbox" name="cT5" value="6" /></td>
			<td>13:00</td>
			<td><input type="checkbox" name="cT6" value="7" /></td>
			<td>14:00</td>
			<td><input type="checkbox" name="cT7" value="8" /></td>
			<td>15:00</td>
			<td><input type="checkbox" name="cT8" value="9" /></td>
			<td>16:00</td>
			<td><input type="checkbox" name="cT9" value="10" /></td>
			<td>17:00</td>
			<td><input type="checkbox" name="cT10" value="11" /></td>
			<td>18:00</td>
			<td><input type="checkbox" name="cT11" value="12" /></td>
			<td>19:00</td>
			<td><input type="checkbox" name="cT12" value="13" /></td>
			<td>20:00</td>
			<td><input type="checkbox" name="cT13" value="14" /></td>
			<td>21:00</td>
			<td><input type="checkbox" name="cT14" value="15" /></td>
			<td>22:00</td>
		</tr>
	</table>
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