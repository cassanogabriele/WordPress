<meta name="description" content="Secret Faces est un projet en home studio de Rock Fusion. Le projet devra ensuite évoluer vers un groupe de musiciens, grâce à l'arrivée de la chanteuse Pat Lennon, qui se charge de recruter les musiciens qui feront partie du projet. Une partie de ces musiciens participent déjà à la finalisation de l'album. Il reste à terminer la structure et l'enregistrement du chant sur la plupart des chansons, ensuite s'effectuera le remix final du premier album 'The End Of Violence'" />
<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			index.php
 * =========================================================================================================================================
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 */
get_header(); ?>

<style>
#recaptcha-accessible-status {
	visibility: hidden !important;
}
</style>

<div id="main" class="grid-container" role="main">

	<div class="grid-65 suffix-5 tablet-grid-70 mobile-grid-100">
	<?php if ( have_posts() ) : ?>
	
		<?php while ( have_posts() ) : the_post(); ?>
		
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