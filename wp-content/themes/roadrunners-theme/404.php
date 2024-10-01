<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			404.php
 * =========================================================================================================================================
 *
 * Template used when a user is 404'ed.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */

get_header(); ?>
<div id="main" class="grid-container" role="main">
	<section class="error-404 not-found">
		<div class="prefix-30 grid-40 suffix-30 tablet-grid-100 mobile-grid-100">
			<h1><?php esc_html_e( '404', 'roadrunners' ); ?></h1>
			<h3><?php esc_html_e( 'Oops! Whatever it was you were looking for, can\'t seem to be found! Why not try a quick search...', 'roadrunners' ); ?></h3>
			<?php get_search_form(); ?>
		</div>
	</section>
</div>
<?php get_footer(); ?>