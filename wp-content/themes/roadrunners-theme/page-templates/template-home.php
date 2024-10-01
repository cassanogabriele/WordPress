<?php
/**
 * Template Name: Home - One-Page
 *
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			template-home.php
 * =========================================================================================================================================
 *
 * This is the main template to display the "one page" page.
 *
 * @package roadrunners
 *
 * V1.2.0
 *
 *  - Changed the way it shows sections to work with the new Homepage sorter.
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */
get_header(); 

global $smof_data;
if( array_key_exists( 'roadrunners_home_layout', $smof_data ) ) {
	
	$roadrunners_home_layout = $smof_data['roadrunners_home_layout']['enabled'];
	
}

?>
<div id="main" class="roadrunners-template-home" role="main">

	<?php
	
	if( array_key_exists( 'roadrunners_home_layout', $smof_data ) && $roadrunners_home_layout ) :
	
		foreach( $roadrunners_home_layout as $key => $value ) :
		
			switch( $key ) :
			
				case 'roadrunners_about_us'       : get_template_part( 'section', 'about-us' );       break;
				case 'roadrunners_events'         : get_template_part( 'section', 'events' );         break;
				case 'roadrunners_artists'        : get_template_part( 'section', 'artists' );        break;
				case 'roadrunners_testimonial_01' : get_template_part( 'section', 'testimonial-01' ); break;
				case 'roadrunners_testimonial_02' : get_template_part( 'section', 'testimonial-02' ); break;
				case 'roadrunners_custom'         : get_template_part( 'section', 'custom' );         break;
				case 'roadrunners_gallery'        : get_template_part( 'section', 'gallery' );        break;
				case 'roadrunners_blog'           : get_template_part( 'section', 'blog' );           break;
				case 'roadrunners_contact'        : get_template_part( 'section', 'contact' );        break;
			
			endswitch;
		
		endforeach;
	
	else :
	
		?>
		<p style="text-align: center; padding: 100px; font-size: 24px; line-height: 30px;">
			<?php 

				printf(
				
					wp_kses_data( __( "What's that? You're content has vanished?! Don't panic! Have you updated this theme recently? If so, go to your %s and head over to the new <strong>Homepage Layout</strong> tab. You can now customize the layout more personally using the new Drag 'n' Drop sorter. Don't forget to click on <strong>Save Changes</strong> when you're done!", 'roadrunners' ) ),
					'<a href="' . admin_url() . 'themes.php?page=optionsframework' . '">' . esc_html__( 'Theme Options' , 'roadrunners' ) . '</a>'
					
				)
				
			?>
		</p>
		<?php
	
	endif;
	
	?>
	
</div>
<?php get_footer(); ?>