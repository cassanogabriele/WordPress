<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			content-page.php
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
<!-- START Page Content -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if( has_post_thumbnail() ) : ?>
	
		<!-- START Page Image -->
		<div class="featured-image">
			<?php roadrunners_post_thumbnail( 'full' ); ?>
		</div>
		<!-- END Page Image -->
	
	<?php endif; ?>
	
	<!-- START Page Content -->
	<div class="entry-content">
		<?php the_content( esc_html__( '...View the rest of this post', 'roadrunners' ) ); ?>
	</div>
	<!-- END Page Content -->
	
	<?php
	
		wp_link_pages( array(
		
			'before' => '<div class="page-links">' . esc_html__( 'Jump to Page', 'roadrunners' ),
			'after'  => '</div>'
			
		) );
	
	?>
	
	<br class="clear" />
</article>
<!-- END Page Content -->