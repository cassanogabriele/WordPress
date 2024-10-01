<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			archives.php
 * =========================================================================================================================================
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
	<div class="grid-65 suffix-5 tablet-grid-70 mobile-grid-100">
	<?php if ( have_posts() ) : ?>
	
		<?php
		
			$term_description = term_description();
			
			if ( ! empty( $term_description ) ) :
			
				printf( '<div class="taxonomy-description">%s</div>', wp_kses_post( $term_description ) );
				
			endif;
		
			while ( have_posts() ) : the_post(); ?>
		
				<?php get_template_part( 'content', get_post_format() ); ?>
			
				<div class="divider"></div>
			
		<?php endwhile; ?>
		
		<?php roadrunners_paging_nav(); ?>
		
	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>
	</div>
	
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>