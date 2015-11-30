<aside id="locations_sidebar" class="four columns">
	<div class="sidebar-box">
		<div class="row ">
			<div class="sidebar-section">
				<?php if (get_field('street_address') != '') { 
					echo do_shortcode('[loc_map]'); 
				} ?>
				<h2>CONTACT</h2>
					<p><?php echo get_field('street_address'); ?></p>
					<p><?php echo get_field('city_state_zip'); ?></p>
					<p><a href="tel:<?php echo get_field("phone"); ?>"><?php echo get_field("phone_display"); ?></a></p>
				<br>
				<?php 
					$mon = get_field("monday");
					$tues = get_field("tuesday");
					$weds = get_field("wednesday");
					$thurs = get_field("thursday");
					$fri = get_field("friday");
					$sat = get_field("saturday");
					$sun = get_field("sunday");
				?>
				<?php if ($mon != '') { ?>
				<br>
				<h2>HOURS</h2> 
				<table>
					<tr>
						<td>Monday: </td>
						<td><?php echo $mon; ?></td>
					</tr>
					<tr>
						<td>Tuesday: </td>
						<td><?php echo $tues; ?></td>
					</tr>
					<tr>
						<td>Wednesday: </td>
						<td><?php echo $weds; ?></td>
					</tr>
					<tr>
						<td>Thursday: </td>
						<td><?php echo $thurs; ?></td>
					</tr>
					<tr>
						<td>Friday: </td>
						<td><?php echo $fri; ?></td>
					</tr>
					<tr>
						<td>Saturday: </td>
						<td><?php echo $sat; ?></td>
					</tr>
					<tr>
						<td>Sunday: </td>
						<td><?php echo $sun; ?></td>
					</tr>
				</table>
				<?php } ?>
				<br>
				<div class="loc_form">
					<?php $title = get_the_title();
					if ($title != '' ) {
						echo "<h2>Join ".$title."'s Email List!</h2>";
					} else { 
						echo "<h2>Join Gino's Email List!</h2>";
					} ?>

					<?php 
					$g_id = get_field('gravity_id');		
					gravity_form($g_id, false); 
					?>
				</div>
				<br>
				<!-- Twitter -->
				<div class="minitweets">
					<?php 
					$t_id = get_field('widget_id');
					$t_name = get_field('username');
					echo do_shortcode("[minitwitter id='".$t_id."' username='".$t_name."' width='290' limit='3']"); 
					?>
				</div>
			</div>  
		</div>

	</div>
</aside>
