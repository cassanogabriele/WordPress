<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			section-contact.php
 * =========================================================================================================================================
 *
 * The template part that displays the Contact Form part of the page.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *  - Added conditional checks for headings and taglines.
 *
 * V1.0.4 
 *
 *  - Removed "data-scroll-reveal" form the form as it was causing a white space bug in Chrome.
 * 
 */
 
global $smof_data;

$roadrunners_contact_heading_before 	= empty( $smof_data['roadrunners_contact_heading_before'] ) ? '' : $smof_data['roadrunners_contact_heading_before'];
$roadrunners_contact_heading 			= empty( $smof_data['roadrunners_contact_heading'] ) 		? '' : $smof_data['roadrunners_contact_heading'];
$roadrunners_contact_heading_after 		= empty( $smof_data['roadrunners_contact_heading_after'] ) 	? '' : $smof_data['roadrunners_contact_heading_after'];
$roadrunners_contact_tagline 			= empty( $smof_data['roadrunners_contact_tagline'] ) 		? '' : $smof_data['roadrunners_contact_tagline'];
$roadrunners_contact_shortcode			= empty( $smof_data['roadrunners_contact_shortcode'] ) 		? '' : $smof_data['roadrunners_contact_shortcode'];

?>
<!-- START Contact Section -->
<section id="contact">
	<div class="grid-container">
	
		<?php if( $roadrunners_contact_heading_before || $roadrunners_contact_heading || $roadrunners_contact_heading_after || $roadrunners_contact_tagline ) : ?>
			
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<div data-scroll-reveal="enter top move 60px over 1s" class="section-heading">
					<h1>
						<span class="before"><?php echo esc_html( $roadrunners_contact_heading_before ); ?></span>
						<?php echo esc_html( $roadrunners_contact_heading ); ?>
						<span class="after"><?php echo esc_html( $roadrunners_contact_heading_after ); ?></span>
					</h1>
				</div>
				
				<?php if( $roadrunners_contact_tagline ) : ?>
				
					<div data-scroll-reveal="enter bottom move 5px over 1s" class="section-tagline">
						<h2><?php echo esc_html( $roadrunners_contact_tagline ); ?></h2>
					</div>
				
				<?php endif; ?>
			</div>
			
		<?php endif; ?>
			
		<?php if( $roadrunners_contact_shortcode ) : ?>
		
			<div class="roadrunners-contact-form">
			<?php echo do_shortcode( $roadrunners_contact_shortcode ); ?>
			</div>
			
		<?php endif; ?>
		
	</div>
</section>
<!-- END Contact Section -->