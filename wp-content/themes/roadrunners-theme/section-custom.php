<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			section-custom.php
 * =========================================================================================================================================
 *
 * The template part that displays custom content from the post.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *  - Added conditional checks for headings and taglines.
 *
 */
 
global $smof_data;

$roadrunners_custom_heading_before 	= empty( $smof_data['roadrunners_custom_heading_before'] ) 	? '' : $smof_data['roadrunners_custom_heading_before'];
$roadrunners_custom_heading 		= empty( $smof_data['roadrunners_custom_heading'] ) 		? '' : $smof_data['roadrunners_custom_heading'];
$roadrunners_custom_heading_after 	= empty( $smof_data['roadrunners_custom_heading_after'] ) 	? '' : $smof_data['roadrunners_custom_heading_after'];
$roadrunners_custom_tagline 		= empty( $smof_data['roadrunners_custom_tagline'] ) 		? '' : $smof_data['roadrunners_custom_tagline'];

?>
<!-- START Custom Content Section -->
<section id="custom">
	<div class="grid-container">
	
		<?php if( $roadrunners_custom_heading_before || $roadrunners_custom_heading || $roadrunners_custom_heading_after || $roadrunners_custom_tagline ) : ?>
			
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<div data-scroll-reveal="enter top move 60px over 1s" class="section-heading">
					<h1>
						<span class="before"><?php echo esc_html( $roadrunners_custom_heading_before ); ?></span>
						<?php echo esc_html( $roadrunners_custom_heading ); ?>
						<span class="after"><?php echo esc_html( $roadrunners_custom_heading_after ); ?></span>
					</h1>
				</div>
				
				<?php if( $roadrunners_custom_tagline ) : ?>
				
					<div data-scroll-reveal="enter bottom move 5px over 1s" class="section-tagline">
						<h2><?php echo esc_html( $roadrunners_custom_tagline ); ?></h2>
					</div>
				
				<?php endif; // End check for tagline. ?>
			</div>
			
		<?php endif; ?>
			
		<div class="grid-100 tablet-grid-100 mobile-grid-100">
		<?php while ( have_posts() ) : the_post(); ?>
		
			
			<!-- START Page Content -->
			
			<div class="entry-content">	
				<h1 style="text-align:center;">Secret Faces - The End Of Violence</h1>
				<h4 style="text-align:center;">2019</h4>
				<div class="wp-block-image">
			
				</div>
				
								
				<?php echo do_shortcode('[cue id="239"]');  the_content(); ?>		
				
			</div>
			<!-- END Page Content -->
			
			<?php
			
				wp_link_pages( array(
				
					'before' 	=> '<div class="page-links">' . esc_html__( 'Jump to Page', 'roadrunners' ),
					'after' 	=> '</div>'
					
				) );
			
			?>
			
			<br class="clear" />
			<?php if ( comments_open() || get_comments_number() ) : ?>
			
				<div class="divider"></div>
				<?php comments_template(); ?>
				
			<?php endif; ?>
			
		<?php endwhile; ?>
		</div>		
	</div>
</section>
<!-- END Custom Content Section -->