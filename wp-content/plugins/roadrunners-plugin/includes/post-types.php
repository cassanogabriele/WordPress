<?php
/**
 * PLUGIN	: RoadRunners Plugin
 * FILE		: post-types.php
 *
 * Register the Post Types for Events (rr_events) and Artists (rr_artists)
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */

if ( ! function_exists( 'rr_events_post_type' ) ) :
/**
 * Create a Custom Post Type for managing Events.
 * =========================================================================================================================================
 * @since 1.0.0
 */
function rr_events_post_type() {

	$labels = array(
		'name'                => _x( 'Events', 'Post Type General Name', 'rr_plugin' ),
		'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'rr_plugin' ),
		'menu_name'           => esc_html__( 'Events', 'rr_plugin' ),
		'parent_item_colon'   => esc_html__( 'Parent Event:', 'rr_plugin' ),
		'all_items'           => esc_html__( 'All Events', 'rr_plugin' ),
		'view_item'           => esc_html__( 'View Event', 'rr_plugin' ),
		'add_new_item'        => esc_html__( 'Add New Event', 'rr_plugin' ),
		'add_new'             => esc_html__( 'Add New', 'rr_plugin' ),
		'edit_item'           => esc_html__( 'Edit Event', 'rr_plugin' ),
		'update_item'         => esc_html__( 'Update Event', 'rr_plugin' ),
		'search_items'        => esc_html__( 'Search Events', 'rr_plugin' ),
		'not_found'           => esc_html__( 'Event Not found', 'rr_plugin' ),
		'not_found_in_trash'  => esc_html__( 'Event Not found in Trash', 'rr_plugin' ),
	);
	
	$args = array(
		'label'               => esc_html__( 'rr_events', 'rr_plugin' ),
		'description'         => esc_html__( 'Create music events to manage and maintain.', 'rr_plugin' ),
		'labels'              => $labels,
		'supports'            => array(
									'title',
									'editor',
									'author',
									'thumbnail',
									'comments',
									'revisions',
									'page-attributes', ),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-calendar',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'rr_events', $args );

}
add_action( 'init', 'rr_events_post_type', 0 );
endif; // End check for function_exists()

if ( ! function_exists('rr_artists_post_type') ) :
/**
 * Create a Custom Post Type for managing Artists.
 * =========================================================================================================================================
 * @since 1.0.0
 */
function rr_artists_post_type() {

	$labels = array(
		'name'                => _x( 'Artists', 'Post Type General Name', 'rr_plugin' ),
		'singular_name'       => _x( 'Artist', 'Post Type Singular Name', 'rr_plugin' ),
		'menu_name'           => esc_html__( 'Artists', 'rr_plugin' ),
		'parent_item_colon'   => esc_html__( 'Parent Artist:', 'rr_plugin' ),
		'all_items'           => esc_html__( 'All Artists', 'rr_plugin' ),
		'view_item'           => esc_html__( 'View Artist', 'rr_plugin' ),
		'add_new_item'        => esc_html__( 'Add New Artist', 'rr_plugin' ),
		'add_new'             => esc_html__( 'Add New', 'rr_plugin' ),
		'edit_item'           => esc_html__( 'Edit Artist', 'rr_plugin' ),
		'update_item'         => esc_html__( 'Update Artist', 'rr_plugin' ),
		'search_items'        => esc_html__( 'Search Artists', 'rr_plugin' ),
		'not_found'           => esc_html__( 'Artist Not found', 'rr_plugin' ),
		'not_found_in_trash'  => esc_html__( 'Artist Not found in Trash', 'rr_plugin' ),
	);
	
	$args = array(
		'label'               => esc_html__( 'rr_artists', 'rr_plugin' ),
		'description'         => esc_html__( 'Add, manage and update all of your Artists.', 'rr_plugin' ),
		'labels'              => $labels,
		'supports'            => array(
		
									'title',
									'editor',
									'author',
									'thumbnail',
									'comments',
									'revisions',
									'page-attributes',
									'excerpt'
									
									),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-format-audio',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'rr_artists', $args );

}
add_action( 'init', 'rr_artists_post_type', 0 );
endif; // End check for function_exists()