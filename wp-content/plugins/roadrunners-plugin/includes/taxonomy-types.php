<?php
/**
 * PLUGIN	: RoadRunners Plugin
 * FILE		: taxonomy-types.php
 *
 * Register the taxonomies needed for the Post Types Events (rr_events) and Artists (rr_artists)
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */

if ( ! function_exists( 'rr_events_taxonomy' ) ) :
/**
 * Registers a custom taxonomy (Event Types) for use with the new Events Post Type.
 * =========================================================================================================================================
 * @since 1.0.0
 */
function rr_events_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Event Types', 'Taxonomy General Name', 'rr_plugin' ),
		'singular_name'              => _x( 'Event Type', 'Taxonomy Singular Name', 'rr_plugin' ),
		'menu_name'                  => esc_html__( 'Event Types', 'rr_plugin' ),
		'all_items'                  => esc_html__( 'All Event Types', 'rr_plugin' ),
		'parent_item'                => esc_html__( 'Parent Event Type', 'rr_plugin' ),
		'parent_item_colon'          => esc_html__( 'Parent Event Type:', 'rr_plugin' ),
		'new_item_name'              => esc_html__( 'New Event Type Name', 'rr_plugin' ),
		'add_new_item'               => esc_html__( 'Add New Event Type', 'rr_plugin' ),
		'edit_item'                  => esc_html__( 'Edit Event Type', 'rr_plugin' ),
		'update_item'                => esc_html__( 'Update Event Type', 'rr_plugin' ),
		'separate_items_with_commas' => esc_html__( 'Separate Event Types with commas', 'rr_plugin' ),
		'search_items'               => esc_html__( 'Search Event Types', 'rr_plugin' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove Event Types', 'rr_plugin' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used Event Types', 'rr_plugin' ),
		'not_found'                  => esc_html__( 'Event Type Not Found', 'rr_plugin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'event_type', array( 'rr_events' ), $args );

}
add_action( 'init', 'rr_events_taxonomy', 0 );
endif; // End check for function_exists()

if ( ! function_exists( 'rr_artists_taxonomy' ) ) :
/**
 * Registers a custom taxonomy (Genres) for use with the new Artists Post Type.
 * =========================================================================================================================================
 * @since 1.0.0
 */
function rr_artists_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Music Genres', 'Taxonomy General Name', 'rr_plugin' ),
		'singular_name'              => _x( 'Genre', 'Taxonomy Singular Name', 'rr_plugin' ),
		'menu_name'                  => esc_html__( 'Music Genres', 'rr_plugin' ),
		'all_items'                  => esc_html__( 'All Music Genres', 'rr_plugin' ),
		'parent_item'                => esc_html__( 'Parent Genre', 'rr_plugin' ),
		'parent_item_colon'          => esc_html__( 'Parent Genre:', 'rr_plugin' ),
		'new_item_name'              => esc_html__( 'New Genre', 'rr_plugin' ),
		'add_new_item'               => esc_html__( 'Add New Genre', 'rr_plugin' ),
		'edit_item'                  => esc_html__( 'Edit Genre', 'rr_plugin' ),
		'update_item'                => esc_html__( 'Update Genre', 'rr_plugin' ),
		'separate_items_with_commas' => esc_html__( 'Separate Genres with commas', 'rr_plugin' ),
		'search_items'               => esc_html__( 'Search Genres', 'rr_plugin' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove Genres', 'rr_plugin' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used Genres', 'rr_plugin' ),
		'not_found'                  => esc_html__( 'Genre Not Found', 'rr_plugin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'genres', array( 'rr_artists' ), $args );

}
add_action( 'init', 'rr_artists_taxonomy', 0 );
endif; // End check for function_exists()