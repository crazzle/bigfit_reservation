		<?php 
		function toRoot()
		{
			$p= './';
			for($i=1; $i<substr_count($_SERVER['SCRIPT_NAME'], '/'); $i++)
			{
				$p .= '../';
			}
			return $p .= '/bigfit_reservation/bigfit_reservation/';
		}
		?>
		
		<div class= "Navigation_Top"></div>
		<div class="MenueLeiste">
			
			<?php if (login_check($mysqli) == true) : ?>
				<table id="navMenue">
					<tr> 
					<td><a href="http://www.bigfitboxclub.de/">Startseite</a></td> 
						<?php if (admin_check($mysqli) == true) : 
							$host  = $_SERVER['DOCUMENT_ROOT'];
							$uri = '/bigfit_reservation/bigfit_reservation/';?>
							<?php 
							echo '<td><a href="'.  toRoot()	. 'reservationsystem/admin/user_overview.php">Mitglieder&uumlbersicht</a></td>'; 
					
							echo '<td><a href="'.  toRoot() . 'reservationsystem/admin/appointment_overview.php">Termin&uumlbersicht</a></td>';
							?>
						<?php endif;?>
				
					<?php 
					
					$host  = $_SERVER['DOCUMENT_ROOT'];
					$uri = '/bigfit_reservation/bigfit_reservation/';
					
					echo '<td><a href="'. toRoot() . 'reservationsystem/user/userprofile.php">Profil</a></td>';
					
					echo '<td><a href="'. toRoot() . 'reservationsystem/user/user_appointment_applies.php">Zu Terminen anmelden</a></td>'; 
				
					echo '<td><a href="'. toRoot() .'reservationsystem/user/user_appointment_overview.php">Meine Termine</a></td> ';
				
					echo '<td><a href="'. toRoot() . 'includes/logout.php">Ausloggen</a></td>'; 
					echo '</tr>'
					?>
				</table>
				<div class= "Navigation_Botton"></div>
				<div class="emotionheader"></div>
		</div>
			
	    	 <?php else : ?>
	    	 	<table id="navMenue">
					<tr> 
					<td><a href="http://www.bigfitboxclub.de/">Startseite</a></td> 
				
					<?php 
					echo '<td></td>';
				
					echo '<td></td>'; 
				
					echo '<td></td> ';
				
					echo '<td></td>'; 
					echo '</tr>'
					?>
				</table>
				<div class= "Navigation_Botton"></div>
				<div class="emotionheader"></div>
	     	 <?php endif; ?>



