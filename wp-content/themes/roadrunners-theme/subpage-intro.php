<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			subpage-intro.php
 * =========================================================================================================================================
 *
 * This template part is used for the intro area (the title and breadcrumbs) for each subpage.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */
?>
<!-- START Inner-page Intro -->
<div id="page-meta" class="grid-container">
	
	<?php
	
		global $smof_data;
		
		/**
		 * If there's no breadcrumb trails, make a bit more space at the bottom.
		 */
		if( function_exists( 'breadcrumb_trail' ) ) {
		
			$margin = '';
			
		} else {
		
			$margin = ' style="margin-bottom: 80px;"';
			
		}
	
	?>
	
	<div class="grid-100 tablet-grid-100 mobile-grid-100" style="margin-bottom:75px;">
		
		<img src="http://www.secretfaces.be/wp-content/uploads/2020/02/logo-768x288-1.png">
		
		<?php
		
		if ( is_category() ) :
			/*single_cat_title();*/

		elseif ( is_tag() ) :
			/*single_tag_title();*/

		elseif ( is_author() ) :
			printf( esc_html__( 'Posts by %s', 'roadrunners' ), '<span class="vcard">' . get_the_author() . '</span>' );

		elseif ( is_day() ) :
			printf( esc_html__( 'Day: %s', 'roadrunners' ), '<span>' . get_the_date() . '</span>' );

		elseif ( is_month() ) :
			printf( esc_html__( 'Month: %s', 'roadrunners' ), '<span>' . get_the_date( esc_html( _x( 'F Y', 'monthly archives date format', 'roadrunners' ) ) ) . '</span>' );

		elseif ( is_year() ) :
			printf( esc_html__( 'Year: %s', 'roadrunners' ), '<span>' . get_the_date( esc_html( _x( 'Y', 'yearly archives date format', 'roadrunners' ) ) ) . '</span>' );

		elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
			esc_html_e( 'Asides', 'roadrunners' );

		elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
			esc_html_e( 'Galleries', 'roadrunners');

		elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
			esc_html_e( 'Images', 'roadrunners');

		elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
			esc_html_e( 'Videos', 'roadrunners' );

		elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
			esc_html_e( 'Quotes', 'roadrunners' );

		elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
			esc_html_e( 'Links', 'roadrunners' );

		elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
			esc_html_e( 'Statuses', 'roadrunners' );

		elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
			esc_html_e( 'Audios', 'roadrunners' );

		elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
			esc_html_e( 'Chats', 'roadrunners' );

		elseif ( is_page() || is_singular( 'rr_events' ) || is_singular( 'rr_artists' ) ) :
			the_title();
		
		elseif ( is_post_type_archive() ) :
			post_type_archive_title();
		
		elseif ( is_archive() ) :
			esc_html_e( 'Archives', 'roadrunners' );
			
		elseif ( is_404() ) :
			esc_html_e( 'Nothing Found', 'roadrunners' );

		elseif ( is_search() ) :
			esc_html_e( 'Search for ', 'roadrunners' );
			echo get_search_query();
			
		else :
			echo esc_html( $smof_data['roadrunners_blog_title'] );
			
		endif;
		?>
		</h1>		
	</div>	
</div>
<!-- END Inner-page Intro -->