<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			searchform.php
 * =========================================================================================================================================
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Enter Search Terms...', 'roadrunners' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search' , 'chimera' ); ?>" />
	<input type="submit" class="search-submit" value="&#xf00e;" />
</form>