<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			content-artists.php
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
<!-- START Artist -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="grid-33 tablet-grid-25 mobile-grid-100 first-on-desktop first-on-tablet first-on-mobile last-on-mobile">
	
		<?php if( has_post_thumbnail() ) : ?>
		
			<!-- START Featured Image -->
			<div class="artist-featured-image">
				<?php roadrunners_post_thumbnail( 'full' ); ?>
			</div>
			<!-- END Featured Image -->
		
		<?php endif; ?>
		
		<!-- START Artist Meta -->
		<div class="artist-entry-meta">
			<?php roadrunners_artists_meta(); ?>
		</div>
		<!-- END Artist Meta -->
		
	</div>
	
	<div class="grid-66 tablet-grid-75 mobile-grid-100 last-on-desktop last-on-tablet first-on-mobile last-on-mobile">
	
		<!-- START Artist Content -->
		<div class="artist-entry-content">
			<?php the_content( esc_html__( '...View the rest of this artist\'s bio', 'roadrunners' ) ); ?>
		</div>
		<!-- END Artist Content -->
		
		<?php
		
			wp_link_pages( array(
			
				'before' => '<div class="page-links">' . esc_html__( 'Jump to Page', 'roadrunners' ),
				'after'  => '</div>'
				
			) );
		
		?>
	
	</div>
	
	<br class="clear" />
</article>
<!-- END Artist -->