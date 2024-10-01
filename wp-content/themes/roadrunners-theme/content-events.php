<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			content-events.php
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
<!-- START Event -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( has_post_thumbnail() ) : ?>
	
		<!-- START Featured Image -->
		<div class="event-featured-image">
			<?php roadrunners_post_thumbnail( 'events-detail' ); ?>
		</div>
		<!-- END Featured Image -->
	
	<?php endif; ?>
	
	<!-- START Event Meta -->
	<div class="event-entry-meta">
		<?php roadrunners_events_meta(); ?>
	</div>
	<!-- END Event Meta -->
	
	<!-- START Event Content -->
	<div class="event-entry-content">
		<?php the_content( esc_html__( '...View the rest of this post', 'roadrunners' ) ); ?>
	</div>
	<!-- END Event Content -->
	
	<?php
	
		wp_link_pages( array(
		
			'before' => '<div class="page-links">' . esc_html__( 'Jump to Page', 'roadrunners' ),
			'after'  => '</div>'
			
		) );
	
	?>
		
	<br class="clear" />
	<?php rr_get_event_map(); ?>
	
</article>
<!-- END Event -->