<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			section-testimonial-01.php
 * =========================================================================================================================================
 *
 * The template part that displays the "Testimonial" part of the page. (First of two Testimonial sections)
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *  - Markup and CSS tweaks.
 *
 */
 
global $smof_data;
$roadrunners_quote_text 	= empty( $smof_data['roadrunners_quote_text'] )   ? '' : $smof_data['roadrunners_quote_text'];
$roadrunners_quote_author 	= empty( $smof_data['roadrunners_quote_author'] ) ? '' : $smof_data['roadrunners_quote_author'];

?>
<!-- START Testimonial Section -->
<section id="testimonial-01" class="testimonial parallax">
	<div class="grid-container">
		<div class="grid-100 tablet-grid-100 mobile-grid-100">
		
			<blockquote data-scroll-reveal="enter left move 200px over 1s">&quot;<?php echo esc_html( $roadrunners_quote_text ); ?>&quot;</blockquote>
			<cite data-scroll-reveal="enter right move 200px over 1s"><?php echo esc_html( $roadrunners_quote_author ); ?></cite>
				
		</div>
	</div>
</section>
<!-- END Testimonial Section -->