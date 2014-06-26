		<?php 
		function toRoot()
		{
			$p= './';
			for($i=1; $i<substr_count($_SERVER['SCRIPT_NAME'], '/'); $i++)
			{
				$p .= '../';
			}
			return $p .= 'bigfit_reservation/bigfit_reservation/';
		}
		?>
		
		<div class= "Navigation_Top"></div>
		<div class="MenueLeiste">
			
			<?php if (login_check($mysqli) == true) : ?>
				<table id="navMenue">
					<tr> 
					<td><a href="http://www.bigfitboxclub.de/">Startseite</a></td> 
						<?php if (admin_check($mysqli) == true) : ?>
							<?php 
							echo '<td><a '; if($thisPage=="usermgmt"){echo 'class="chosen"';} echo ' href="'.  toRoot()	. 'reservationsystem/admin/user_overview.php">Mitglieder</a></td>'; 
					
							echo '<td><a '; if($thisPage=="appointmentmgmt"){echo 'class="chosen"';} echo ' href="'.  toRoot() . 'reservationsystem/admin/appointment_overview.php">Termine</a></td>';
							?>
						<?php endif;?>
				
					<?php 
					
					echo '<td><a '; if($thisPage=="profile"){echo 'class="chosen"';} echo ' href="'. toRoot() . 'reservationsystem/user/user_profile.php">Profil</a></td>';
					
					echo '<td><a '; if($thisPage=="appapply"){echo 'class="chosen"';} echo ' href="'. toRoot() . 'reservationsystem/user/user_appointment_applies.php">Anmelden</a></td>'; 
				
					echo '<td><a '; if($thisPage=="appoverview"){echo 'class="chosen"';} echo ' href="'. toRoot() .'reservationsystem/user/user_appointment_overview.php">Meine Termine</a></td> ';
				
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
					echo '<td><a href="'. toRoot() .'login.php">Login</a></td> ';
				
					echo '<td></td>'; 
				
					echo '<td></td> ';
				
					echo '<td></td>'; 
					echo '</tr>'
					?>
				</table>
				<div class= "Navigation_Botton"></div>
				<div class="emotionheader"></div>
	     	 <?php endif; ?>



