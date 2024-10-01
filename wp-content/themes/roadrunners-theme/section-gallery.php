<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			section-gallery.php
 * =========================================================================================================================================
 *
 * The template part that displays the "Gallery" part of the page.
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
$roadrunners_gallery_heading_before 	= empty( $smof_data['roadrunners_gallery_heading_before'] ) 	? '' : $smof_data['roadrunners_gallery_heading_before'];
$roadrunners_gallery_heading 			= empty( $smof_data['roadrunners_gallery_heading'] ) 			? '' : $smof_data['roadrunners_gallery_heading'];
$roadrunners_gallery_heading_after 		= empty( $smof_data['roadrunners_gallery_heading_after'] ) 		? '' : $smof_data['roadrunners_gallery_heading_after'];
$roadrunners_gallery_tagline 			= empty( $smof_data['roadrunners_gallery_tagline'] ) 			? '' : $smof_data['roadrunners_gallery_tagline'];
$images 								= empty( $smof_data['roadrunners_gallery'] ) 					? '' : $smof_data['roadrunners_gallery'];

?>
<!-- START Gallery Section -->
<section id="rr-gallery">

	<?php if( $roadrunners_gallery_heading_before || $roadrunners_gallery_heading || $roadrunners_gallery_heading_after || $roadrunners_gallery_tagline ) : ?>
		
		<div class="grid-container">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<div data-scroll-reveal="enter top move 60px over 1s" class="section-heading">
					<h1>
						<span class="before"><?php echo esc_html( $roadrunners_gallery_heading_before ); ?></span>
						<?php echo esc_html( $roadrunners_gallery_heading ); ?>
						<span class="after"><?php echo esc_html( $roadrunners_gallery_heading_after ); ?></span>
					</h1>
				</div>
				
				<?php if( $roadrunners_gallery_tagline ) : ?>
				
					<div data-scroll-reveal="enter bottom move 5px over 1s" class="section-tagline">
						<h2><?php echo esc_html( $roadrunners_gallery_tagline ); ?></h2>
					</div>
				
				<?php endif; // End check for tagline. ?>
			</div>		
		</div>
		
	<?php endif; ?>
		
	<?php if( $images ) : ?>
	
		<div class="section-gallery">
			<?php foreach( $images as $image ) : ?>
			
				<?php $ran_num = mt_rand( 1, 9 ); ?>
				<a data-scroll-reveal="wait 0.<?php echo esc_attr( intval( $ran_num ) ); ?>s enter bottom move 0px over 1s" class="gallery-item" href="<?php echo esc_url( $image['url'] ); ?>" rel="lightbox-gallery">
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['title'] ); ?>" />
					<i class="fa fa-plus-circle"></i>
				</a>

			<?php endforeach; ?>
			<br class="clear" />
		</div>
	
	<?php endif; ?>
		
</section>
<!-- END Gallery Section -->