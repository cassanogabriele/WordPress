<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			content.php
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
<!-- START Blog Entry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- START Entry Header -->
	<header class="entry-header">
		<?php if( ! is_singular() ) : ?>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php else : ?>
			<h1><?php the_title(); ?></h1>
		<?php endif; ?>
	</header>
	<!-- END Entry Header -->
	
	<?php if( has_post_thumbnail() ) : ?>
	
		<!-- START Featured Image -->
		<div class="featured-image">
			<?php roadrunners_post_thumbnail( 'full' ); ?>
		</div>
		<!-- END Featured Image -->
	
	<?php endif; ?>
	
	<!-- START Entry Meta -->
	<div class="entry-meta">
		<?php roadrunners_posted_on(); ?>
	</div>
	<!-- END Entry Meta -->
	
	<!-- START Entry Content -->
	<div class="entry-content">
		<?php the_content( esc_html__( '...View the rest of this post', 'roadrunners' ) ); ?>
	</div>
	<!-- END Entry Content -->
	
	<?php
	
		wp_link_pages( array(
		
			'before' => '<div class="page-links">' . esc_html__( 'Jump to Page', 'roadrunners' ),
			'after'  => '</div>'
			
		) );
	
	?>
	
	<br class="clear" />
</article>
<!-- END Blog Entry -->