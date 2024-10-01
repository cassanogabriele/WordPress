<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			page.php
 * =========================================================================================================================================
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 */

get_header(); ?>
<!-- START Main Content -->
<div id="main" class="grid-container" role="main">
	<div class="grid-65 suffix-5 tablet-grid-70 mobile-grid-100">
	
	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'content', 'page' ); ?>
		
		<br class="clear" />
		
		<?php if ( comments_open() || get_comments_number() ) : ?>
		
			<div class="divider"></div>
		
			<?php comments_template(); ?>
		
		<?php endif; ?>
		
	<?php endwhile; ?>
		
	</div>
	
	<?php get_sidebar(); ?>
	
</div>
<!-- END Main Content -->
<?php get_footer(); ?>