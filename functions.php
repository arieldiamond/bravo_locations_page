<?php 
// Register Locations Post Type
function locations() {
	$labels = array(
		'name'                => _x( 'Locations', 'Post Type General Name', 'locations' ),
		'singular_name'       => _x( 'Location', 'Post Type Singular Name', 'locations' ),
		'menu_name'           => __( 'Locations', 'locations' ),
		'parent_item_colon'   => __( 'Locations', 'locations' ),
		'all_items'           => __( 'All locations', 'locations' ),
		'view_item'           => __( 'View Location', 'locations' ),
		'add_new_item'        => __( 'Add New Location', 'locations' ),
		'add_new'             => __( 'Add New', 'locations' ),
		'edit_item'           => __( 'Edit Location', 'locations' ),
		'update_item'         => __( 'Update Location', 'locations' ),
		'search_items'        => __( 'Search Locations', 'locations' ),
		'not_found'           => __( 'Not found', 'locations' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'locations' ),
	);
	$args = array(
		'label'               => __( 'locations', 'locations' ),
		'description'         => __( 'Restaurant location page', 'locations' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'revisions', ),
		'taxonomies'          => array( 'category', 'post_tag', 'locations' ),
		'hierarchical'        => true,
		'rewrite' 			  => array( 'slug' => 'locations'),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-admin-home',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'locations',
		'capability_type'     => 'page',
	);
	register_post_type( 'locations', $args );
}
add_action( 'init', 'locations', 0 );

// Register Sidebar
function locations_sidebar() {
	$args = array(
		'id'            => 'locations_sidebar',
		'name'          => __( 'Locations Sidebar', 'locations' ),
		'class'         => 'locations_sidebar',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'locations_sidebar' );

// Map Shortcode
add_shortcode( 'loc_map', 'loc_map' );
	function loc_map() {
		$title = get_the_title();
		$street = get_field('street_address');
		$state = get_field('city_state_zip');
		return do_shortcode( "[wc_googlemap title='".$title."' location='".$street.", ".$state."' zoom='12' height='250']");
	}
