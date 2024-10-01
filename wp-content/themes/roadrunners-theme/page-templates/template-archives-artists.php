<?php
/**
 *
 * Template Name: Page - Artists
 *
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			template-archives-artists.php
 * =========================================================================================================================================
 *
 * Archive page for displaying an archive of artists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 */

get_header(); ?>
<div id="main" class="grid-container" role="main">

	<div class="grid-100 tablet-grid-100 mobile-grid-100">
	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'content', 'page' ); ?>
		<br class="clear" />
		
	<?php endwhile; ?>
	</div>

	<div class="artist-archive">
	
	<?php
	
	$artists = new WP_Query( 'post_type=rr_artists&posts_per_page=-1' );
	
	if ( $artists->have_posts() ) :
	
		while ( $artists->have_posts() ) : $artists->the_post(); ?>
		
		<div class="grid-33 tablet-grid-50 mobile-grid-100">
			<div class="artist-wrap">
				
				<?php if( has_post_thumbnail() ) : ?>
				<div class="artist-featured-image">
					<?php roadrunners_post_thumbnail( 'full' ); ?>
				</div>
				<?php endif; ?>
				
				<a class="artist-meta-wrap" href="<?php the_permalink(); ?>">
					<div class="rr-meta-box rr-artist-title">
						<h4><?php the_title(); ?></h4>
					</div>
				</a>

			</div>
		</div>
			
		<?php endwhile; ?>
		<br class="clear" />
		
	<?php else : ?>
	
		<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; ?>
	
	<?php wp_reset_postdata(); ?>
	
	</div>
</div>
<?php get_footer(); ?>