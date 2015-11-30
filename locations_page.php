<?php
/*
Template Name: Locations Page
*/
get_header(); ?>
<div id="content" class="twelve columns">
	<?php while (have_posts()) : the_post(); ?>
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<div class="post-box">
		<div class="loc-list all-loc">
			<select class="select-menu group" onchange="window.location.replace(this.options[this.selectedIndex].value)">
				<option selected="selected" value="">Select A Region</option>
				<?php if( have_rows('region_map') ): ?>
					<?php while ( have_rows('region_map') ) : the_row(); ?>
						<?php $region_name = get_sub_field('region_name'); ?>
						<?php $region_map_id = get_sub_field('region_map_id'); ?>
						<?php $locations = get_sub_field('locations'); ?>
							<option value="#<?php echo $region_name; ?>"><?php echo $region_name; ?></option>
					<?php endwhile; ?> <!-- end repeater while -->
				<?php endif; ?><!-- end repeater if -->
			</select>
			<div class="view-button top"><a href="/locator">Search for a Gino's!</a></div>
			<?php if( have_rows('region_map') ): ?>
				<?php while ( have_rows('region_map') ) : the_row(); ?>
					<?php $region_name = get_sub_field('region_name'); ?>
					<?php $region_map_id = get_sub_field('region_map_id'); ?>
					<div id="<?php echo $region_name; ?>" class="row wrap-location">
						<div class="twelve columns">
							<h2><?php echo $region_name; ?> Locations</h2>				
							<?php echo do_shortcode('[wpgmza id="'.$region_map_id.'"]'); ?>
							<div class="map-desc">
							<?php if( have_rows('locations') ): ?>
								<?php while( have_rows('locations') ): the_row(); ?>
									<?php $loc_name = get_sub_field('location_name'); ?>
									<?php $loc_link = get_sub_field('location_link'); ?>
									<h4><?php echo $loc_name; ?></h4>
									<span class="view-button"><a href="<?php echo $loc_link; ?>">View</a></span>
								<?php endwhile; ?> <!-- end repeater while -->
							<?php endif; ?><!-- end repeater if -->
							</div>	<!-- end map desc -->
						</div><!-- end twelve columns -->
					</div><!-- end wrap-location -->
			<?php endwhile; ?> <!-- end repeater while -->
		<?php endif; ?><!-- end repeater if -->
		</div><!-- end loc-list -->
		<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
	<?php endwhile; ?> <!-- end loop -->
	</div><!-- end post-box -->
</div><!-- end content -->
<?php get_footer(); ?>

