<?php get_header(); ?>
	<?php while (have_posts()) : the_post(); ?>

	<section id="main" class="row interior all-loc single-locations">
		<div class="container twelve columns">
			<div id="content" class="eight columns">
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<div class="entry-content">
						<div class="tabbed-area">
							<?php if( have_rows('location_tabs') ): ?>
								<ul class="tabs group">
    							<?php while ( have_rows('location_tabs') ) : the_row(); ?>
	    							<?php $tab_title = get_sub_field('tab_title'); ?>
	    							<?php $tab_slug = get_sub_field('tab_slug'); ?>
									<li><a href="#<?php echo $tab_slug; ?>"><?php echo $tab_title; ?></a></li>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>

							<?php if( have_rows('location_tabs') ): ?>
	   							<select onChange="window.location.replace(this.options[this.selectedIndex].value)" class="select-menu group"> 
								    <option value="" selected="selected">Select</option> 
								    <?php while ( have_rows('location_tabs') ) : the_row(); ?>
								   		<?php $tab_title = get_sub_field('tab_title'); ?>
	    								<?php $tab_slug = get_sub_field('tab_slug'); ?>
								    	<option value="#<?php echo $tab_slug; ?>"><?php echo $tab_title; ?></option> 
								    <?php endwhile; ?>
								</select>
							<?php endif; ?>

							<?php if( have_rows('location_tabs') ): ?>
								<div class="box-wrap">
									<?php while ( have_rows('location_tabs') ) : the_row(); ?>
										<?php $tab_title = get_sub_field('tab_title'); ?>
		    							<?php $tab_slug = get_sub_field('tab_slug'); ?>
		    							<?php $tab_image = get_sub_field('tab_image'); ?>
		    							<?php $tab_content = get_sub_field('tab_content'); ?>
		    							<?php $menu_id = get_sub_field('menu_id'); ?>
											<p id="<?php echo $tab_slug; ?>" class="target"></p>
											<div class="tab">
												<?php if($tab_slug=='blog'){
													$title = get_the_title();
														
													$terms=get_terms('category');
													foreach($terms as $term){
													$name=$term->name;
													str_replace("'", "", $name);
													$slug=$term->slug;
													if ($name == $title){

														$args = array('numberposts' => 2,'taxonomy' => 'category', 'category_name'=>$slug, 'order' => 'DESC');
														$loop = new WP_Query($args);

														while ( $loop->have_posts() ) : $loop->the_post();
														  echo '<div class= "catblog"><h2>';
														  echo '<a href="'.get_permalink() .'">';
														  the_title();
														  echo '</a></h2>';
														  
														       			
														if ( has_post_thumbnail() ) {
															the_post_thumbnail();
														}
													
														$excerpt=get_the_excerpt();
														echo '<br><p>';
														echo $excerpt;
														echo '</p></div>';												
														endwhile;
													
													}
												}
												echo '<span class="loc-button"><a href="/blog">See More Posts</a></span>';
												wp_reset_query(); 
											} 
											?>
											<?php if($tab_image != ''){
												echo '<div class="tab-image"><img src='.$tab_image.' /></div>';
											}
											?>
											<?php if($tab_content != ''){
												echo '<div class="tab-content">';
												echo $tab_content; 
												echo '</div>';
											}
											?>
											<?php if ($menu_id != '') { 
												echo '<div class="menu">';
												echo do_shortcode('[WP_Restaurant_Menu id="'. $menu_id .'"]');  
												echo '</div>';
											}
											?>
											<?php if($tab_slug =='open_table'){
												$r_id = get_field('open_table');
												echo '<div class="open-table"><h3>Make a Reservation</h3>';
												echo do_shortcode('[open-table-widget display_option="0" restaurant_id="'.$r_id.'" title="Reserve a seat at Gino&#39;s!" max-width="35em" pre_content="Book a table below:"]');
												echo '</div>';
											}
											?>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
							</div>

					</div>
				</article>
			</div><!-- End Content row -->
			<?php
			include('locations-sidebar.php'); 
			?>
		</div>
	<?php endwhile; // End the loop ?>
<script>
$(document).ready(function() {
	if(location.hash){
		location.hash;
	} else {
		location.hash = "#home";
	};
});

</script>
<?php $sitescout = get_field('sitescout_id'); ?>
<script type="text/javascript">
var ssaUrl = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'pixel.sitescout.com/iap/<?php echo $sitescout; ?>';
new Image().src = ssaUrl;
</script>

<?php get_footer(); ?>
