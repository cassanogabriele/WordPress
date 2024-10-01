<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			single.php
 * =========================================================================================================================================
 *
 * The Template for displaying all single posts.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 */
get_header(); ?>

<div id="main" class="grid-container" role="main">
	<div class="grid-65 suffix-5 tablet-grid-70 mobile-grid-100">
	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'content', 'single' ); ?>
		<?php roadrunners_post_nav(); ?>
		<br class="clear" />
		<div class="divider"></div>
		<?php
		
			if ( comments_open() || get_comments_number() ) {
			
				comments_template();
				
			}
		
		?>
		
	<?php endwhile; ?>
	</div>
	
	<?php get_sidebar(); ?>
	
</div>
<?php get_footer(); ?>