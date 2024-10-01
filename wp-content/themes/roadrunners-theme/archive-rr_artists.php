<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			archive-rr_artists.php
 * =========================================================================================================================================
 *
 * Archive page for displaying Artists.
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
	<div class="artist-archive">
	
	<?php $artists = new WP_Query( 'post_type=rr_artists&posts_per_page=-1' ); ?>
	
	<?php if ( $artists->have_posts() ) : ?>
	
		<?php while ( $artists->have_posts() ) : $artists->the_post(); ?>
		
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
	
	</div>
</div>
<?php get_footer(); ?>