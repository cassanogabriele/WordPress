<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			sidebar.php
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
<div id="secondary" class="grid-30 tablet-grid-30 mobile-grid-100">
<?php if ( ! dynamic_sidebar( 'main-sidebar' ) ) : ?>

	<?php if( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) : ?>
		<p><?php printf( wp_kses_post( __( 'There is currently no Widgets in this area. Why not <a href="%s">add some?</a>', 'roadrunners' ) ), esc_url( admin_url( 'widgets.php' ) ) ); ?></p>
	<?php endif; ?>
	
<?php endif; ?>
</div>