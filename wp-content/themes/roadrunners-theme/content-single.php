<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			content-single.php
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
		<h1><?php the_title(); ?></h1>
	</header>	
	<!-- END Entry Header -->
	
	<?php if( has_post_thumbnail() ) : ?>
	
		<!-- START Featured Image -->
		<div class="featured-image">
			<?php roadrunners_post_thumbnail( 'full' ); ?>
		</div>
		<?php endif; ?>
	
	<!-- END Featured Image -->
	
	<!-- START Entry Meta -->
	
	<!-- END Entry Meta -->
	
	<!-- START Entry Content -->
	<div class="entry-content">
		<?php the_content( esc_html__( 'View Post', 'roadrunners' ) ); ?>
		<br class="clear" />
	</div>
	<!-- END Entry Content -->
	
	<?php
	
	wp_link_pages( array(
	
		'before' => '<div class="page-links">' . esc_html__( 'Jump to Page', 'roadrunners' ),
		'after'  => '</div>'
		
	) );
	
	?>
	
	<footer class="entry-footer">
	<?php the_tags( '<span class="tag-links"><i class="fa fa-tags"></i>', ', ', '</span>' ); ?>
	</footer>
	
	<br class="clear" />
</article>
<!-- END Blog Entry -->