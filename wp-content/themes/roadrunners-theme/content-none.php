<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			content-none.php
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
<!-- START No Content -->
<section class="no-results not-found">

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( wp_kses_data( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'roadrunners' ), esc_url( admin_url( 'post-new.php' ) ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

		<h3><?php printf( esc_html__( 'Searching for %1$s turned up nothing!', 'roadrunners' ), get_search_query() ); ?></h3>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'roadrunners' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'roadrunners' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
	
	<br class="clear" />
</section>
<!-- END No Content -->