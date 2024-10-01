<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			extras.php
 * =========================================================================================================================================
 *
 * Custom functions that act independently of the theme templates
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *  - Removed function for wp_title() as its now built into the core.
 *
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function roadrunners_page_menu_args( $args ) {

	$args['show_home'] = true;
	return $args;
	
}
add_filter( 'wp_page_menu_args', 'roadrunners_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function roadrunners_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
	
		$classes[] = 'group-blog';
		
	}

	return $classes;
	
}
add_filter( 'body_class', 'roadrunners_body_classes' );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function roadrunners_setup_author() {

	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
	
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
		
	}
}
add_action( 'wp', 'roadrunners_setup_author' );

/**
 * Adds a list item to the WordPress dropdown menu to access the Theme Options easier
 */
if ( ! is_admin() ) :

	add_action( 'admin_bar_menu' , 'roadrunners_options_node' , 999 );
	function roadrunners_options_node( $wp_admin_bar ) {

		$args = array(

			'id'    	=> 'roadrunners-theme-options',
			'title' 	=> esc_html__( 'Theme Options' , 'roadrunners' ),
			'href'  	=> admin_url() . 'themes.php?page=optionsframework',
			'parent'	=> 'site-name'

		);
		$wp_admin_bar->add_node( $args );

	}

endif;