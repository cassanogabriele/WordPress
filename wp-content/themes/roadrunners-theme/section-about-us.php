<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			section-about-us.php
 * =========================================================================================================================================
 *
 * The template part that displays the "About Us" part of the page.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *  - Now using wp_kses_post()
 *  - Added conditional checks for headings and taglines.
 *
 */

global $smof_data;

$roadrunners_about_heading_before 	= empty( $smof_data['roadrunners_about_heading_before'] ) 	? '' : $smof_data['roadrunners_about_heading_before'];
$roadrunners_about_heading 			= empty( $smof_data['roadrunners_about_heading'] ) 			? '' : $smof_data['roadrunners_about_heading'];
$roadrunners_about_heading_after 	= empty( $smof_data['roadrunners_about_heading_after'] ) 	? '' : $smof_data['roadrunners_about_heading_after'];
$roadrunners_about_tagline 			= empty( $smof_data['roadrunners_about_tagline'] ) 			? '' : $smof_data['roadrunners_about_tagline'];
$roadrunners_about_left_heading		= empty( $smof_data['roadrunners_about_left_heading'] )		? '' : $smof_data['roadrunners_about_left_heading'];
$roadrunners_about_left_body		= empty( $smof_data['roadrunners_about_left_body'] )		? '' : $smof_data['roadrunners_about_left_body'];
$roadrunners_about_middle_heading	= empty( $smof_data['roadrunners_about_middle_heading'] )	? '' : $smof_data['roadrunners_about_middle_heading'];
$roadrunners_about_middle_body		= empty( $smof_data['roadrunners_about_middle_body'] )		? '' : $smof_data['roadrunners_about_middle_body'];
$roadrunners_about_right_heading	= empty( $smof_data['roadrunners_about_right_heading'] )	? '' : $smof_data['roadrunners_about_right_heading'];
$roadrunners_about_right_body		= empty( $smof_data['roadrunners_about_right_body'] )		? '' : $smof_data['roadrunners_about_right_body'];

?>
<!-- START About Us Section -->
<section id="about">
	<div class="grid-container">
	
		<?php if( $roadrunners_about_heading_before || $roadrunners_about_heading || $roadrunners_about_heading_after || $roadrunners_about_tagline ) : ?>
		
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<div data-scroll-reveal="enter top move 60px over 1s" class="section-heading">
					<h1>
						<span class="before"><?php echo esc_html( $roadrunners_about_heading_before ); ?></span>
						<?php echo esc_html( $roadrunners_about_heading ); ?>
						<span class="after"><?php echo esc_html( $roadrunners_about_heading_after ); ?></span>
					</h1>
				</div>
				<?php if( $roadrunners_about_tagline ) : ?>
				
					<div data-scroll-reveal="enter bottom move 5px over 1s" class="section-tagline">
						<h2><?php echo esc_html( $roadrunners_about_tagline ); ?></h2>
					</div>
				
				<?php endif; ?>
			</div>
			
		<?php endif; ?>
			
		<div class="grid-30 tablet-prefix-20 tablet-grid-60 tablet-suffix-20 mobile-grid-100">
			<div data-scroll-reveal="wait 0.35s, enter left move 80px over 1s" class="about-left">
				<h4><?php echo wp_kses( $roadrunners_about_left_heading, array( 'span' => array() ) ); ?></h4>
				<?php echo wp_kses_post( $roadrunners_about_left_body ); ?>
			</div>
		</div>
		
		<div class="grid-40 tablet-prefix-20 tablet-grid-60 tablet-suffix-20 mobile-grid-100">
			<div data-scroll-reveal="enter bottom move 60px over 1.35s" class="about-center">
				<h4><?php echo wp_kses( $roadrunners_about_middle_heading, array( 'span' => array() ) ); ?></h4>
				<?php echo wp_kses_post( $roadrunners_about_middle_body ); ?>
				<br class="clear" />
			</div>
		</div>
		
		<div class="grid-30 tablet-prefix-20 tablet-grid-60 tablet-suffix-20 mobile-grid-100">
			<div data-scroll-reveal="wait 0.35s, enter right move 80px over 1s" class="about-right">
				<h4><?php echo wp_kses( $roadrunners_about_right_heading, array( 'span' => array() ) ); ?></h4>
				<?php echo wp_kses_post( $roadrunners_about_right_body ); ?>
			</div>
		</div>
		
	</div>
</section>
<!-- END About Us Section -->