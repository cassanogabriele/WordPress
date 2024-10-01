<?php
/**
 * Template Name: Page - Full Width Narrow
 *
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			template-full-narrow.php
 * =========================================================================================================================================
 *
 * A full width page template (no sidebar). Content is narrow on this template.
 * Displays full width on Tablets and Mobiles.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 */

get_header(); ?>
<!-- START Main Content -->
<main id="main" class="grid-container" role="main">

	<div class="prefix-20 grid-60 suffix-20 tablet-grid-100 mobile-grid-100">
	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'content', 'page' ); ?>
		<br class="clear" />
		<?php if ( comments_open() || get_comments_number() ) : ?>
		
			<div class="divider"></div>
			<?php comments_template(); ?>
		
		<?php endif; ?>
		
	<?php endwhile; ?>
	</div>
	
</main>
<!-- END Main Content -->
<?php get_footer(); ?>