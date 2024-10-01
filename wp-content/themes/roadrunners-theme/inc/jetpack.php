<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			jetpack.php
 * =========================================================================================================================================
 *
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package roadrunners
 * @since 1.0.0
 *
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function roadrunners_jetpack_setup() {

	add_theme_support( 'infinite-scroll', array(
	
		'container' => 'main',
		'footer'    => 'page'
		
	) );
	
}
add_action( 'after_setup_theme', 'roadrunners_jetpack_setup' );