<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			template-tags.php
 * =========================================================================================================================================
 *
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package roadrunners
 *
 * V1.2.0
 *
 *  - Various changes to CSS output.
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */

if ( ! function_exists( 'roadrunners_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function roadrunners_paging_nav() {

	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
	
		return;
		
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<div class="nav-links">
			<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><?php next_posts_link( wp_kses_post( __( '<i class="fa fa-angle-double-left"></i>Older', 'roadrunners' ) ) ); ?></div>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next"><?php previous_posts_link( wp_kses_post( __( 'Newer<i class="fa fa-angle-double-right"></i>', 'roadrunners' ) ) ); ?></div>
			<?php endif; ?>
		</div>
		<br class="clear" />
	</nav>
	<?php
	
}
endif;

if ( ! function_exists( 'roadrunners_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function roadrunners_post_nav() {

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
	
		return;
		
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<?php
			
				previous_post_link( '<div class="nav-previous">%link</div>', wp_kses_post( _x( '<i class="fa fa-angle-double-left"></i>%title' , 'Previous post link', 'roadrunners' ) ) );
				next_post_link( '<div class="nav-next">%link</div>', wp_kses_post( _x( '%title<i class="fa fa-angle-double-right"></i>' , 'Next post link', 'roadrunners' ) ) );
				
			?>
		</div>
		<br class="clear" />
	</nav>
	<?php
}
endif;

if ( ! function_exists( 'roadrunners_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function roadrunners_posted_on() {

	?>
	<span class="entry-author">
		<i class="fa fa-user"></i>
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
		<?php the_author(); ?>
		</a>
	</span>
	
	<span class="entry-date">
		<i class="fa fa-clock-o"></i>
		<a href="<?php echo esc_url( get_permalink() ); ?>">	
		<?php the_time( get_option( 'date_format' ) ); ?>
		</a>
	</span>
	
	<span class="entry-cats">
		<i class="fa fa-file"></i>
		<?php echo get_the_category_list( esc_html( _x( ', ', 'Used between list items, there is a space after the comma.', 'roadrunners' ) ) ); ?>
	</span>
	
	<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
	
		<span class="entry-comments">
			<i class="fa fa-comments"></i>
			<?php comments_popup_link( esc_html__( 'Leave a comment', 'roadrunners' ), esc_html__( '1 Comment', 'roadrunners' ), esc_html__( '% Comments', 'roadrunners' ) ); ?>
		</span>
	
	<?php endif;
	
	edit_post_link( esc_html__( 'Edit', 'roadrunners' ), '<span class="edit-link"><i class="fa fa-cog"></i>', '</span>' );
	
}
endif;

if( ! function_exists( 'roadrunners_events_meta' ) ) :
/**
 * Prints HTML with meta information for events.
 */
function roadrunners_events_meta() {
	
	global $post, $smof_data;
	$roadrunners_currency = empty( $smof_data['roadrunners_currency'] ) ? '$' : $smof_data['roadrunners_currency'];
		
	if ( get_post_meta ( $post->ID, '_rr_event_date', true ) ) {
				
		$rr_event_date = date( get_option( 'date_format' ), get_post_meta( $post->ID, '_rr_event_date', true ) );
		
	}
	
	$rr_event_venue			= get_post_meta( $post->ID, '_rr_event_venue', 		true );
	$rr_event_tickets		= get_post_meta( $post->ID, '_rr_event_tickets', 	true );
	$rr_event_price			= get_post_meta( $post->ID, '_rr_event_price',   	true );
	$rr_event_ticket_url	= get_post_meta( $post->ID, '_rr_event_ticket_url',	true );
	
	?>
	
	<div class="rr-meta-box rr-event-date">
		<?php if( $rr_event_date ) : ?>
			<h4><?php echo esc_html( $rr_event_date ); ?></h4>
		<?php else : ?>
			<h4><?php esc_html_e( 'To Be Announced', 'roadrunners' ); ?></h4>
		<?php endif; ?>
	</div>
	
	<div class="rr-meta-box rr-event-venue">
		<?php if( $rr_event_venue ) : ?>
			<h4><?php echo esc_html( $rr_event_venue ); ?></h4>
		<?php else : ?>
			<h4><?php esc_html_e( 'To Be Announced', 'roadrunners' ); ?></h4>
		<?php endif; ?>
	</div>

	<div class="rr-meta-box rr-event-tickets">
		<h4><?php echo esc_html( $rr_event_tickets ); ?></h4>
	</div>
	
	<div class="rr-meta-box rr-event-price">
		<?php if( $rr_event_price ) : ?>
			<h4>
				<?php echo wp_kses_post( $roadrunners_currency ); ?>
				<?php echo esc_html( $rr_event_price ); ?>
			</h4>
		<?php else : ?>
			<h4><?php esc_html_e( 'To Be Announced', 'roadrunners' ); ?></h4>
		<?php endif; ?>
	</div>
	
	<?php if( $rr_event_ticket_url ) : ?>
	
		<div class="rr-meta-box rr-event-purchase">
			<h4><a href="<?php echo esc_url( $rr_event_ticket_url ); ?>"><?php esc_html_e( 'Buy Tickets', 'roadrunners' ); ?></a></h4>
		</div>
	
	<?php endif; ?>
	
	<br class="clear" />
	<?php

}
endif;

if( ! function_exists( 'roadrunners_artists_meta' ) ) :
/**
 * Prints HTML with meta information for artists.
 */
function roadrunners_artists_meta() {
	
	global $post;
	
	$rr_artist_discography	= get_post_meta( $post->ID, '_rr_artist_discography',	true );
	$rr_artist_upcoming		= get_post_meta( $post->ID, '_rr_artist_upcoming',  	true );
	
	?>
	
	<?php 
	if( taxonomy_exists( 'genres' ) ) : 
		$terms = get_the_terms( $post->ID, 'genres' );
		
		if( $terms && ! is_wp_error( $terms ) ) : ?>
		
			<div class="rr-artist-box dark rr-artist-genre">
				<?php
				$genres = array();
				foreach( $terms as $term ) {
					$genres[] = $term->name;
				}
				
				$the_genres = join( ', ', $genres );
				?>
				<p><?php echo $the_genres; ?></p>
			</div>
			
		<?php endif; ?>
	<?php endif; // End if taxonomy_exists() ?>
	
	<?php if( $rr_artist_discography ) : ?>
	<div class="rr-artist-box rr-artist-discography">
		<p>
		<?php
		
		echo wp_kses( $rr_artist_discography, array(
	
			'a'			=> array( 'href' => array() ),
			'br'		=> array(),
			'strong'	=> array(),
			'em'		=> array()
		
		) );
		
		?>
		</p>
	</div>
	<?php endif; ?>
	
	<?php if( $rr_artist_upcoming ) : ?>
	<div class="rr-artist-box rr-artist-upcoming">
		<p>
		<?php 
		
			echo wp_kses( $rr_artist_upcoming, array(
	
				'a'			=> array( 'href' => array() ),
				'br'		=> array(),
				'strong'	=> array(),
				'em'		=> array()
			
			) );
			
		?>
		</p>
	</div>
	<?php endif; 
	
}
endif;

if( ! function_exists( 'rr_get_event_map' ) ) :
/**
 * Displays the map for the event.
 */
function rr_get_event_map() {

	global $post;

	$rr_event_map = get_post_meta( $post->ID, '_rr_event_map', true );
	if( ! $rr_event_map ) {
	
		return;
		
	}
	
	?>

	<!-- START Google Map -->
	<div class="fluid-map">
		<?php 
		
			echo wp_kses( $rr_event_map, array(
	
				'iframe' => array( 

					'src'		=> array(),
					'width'		=> array(),
					'height'	=> array()
				
				)
			
			) );
		
		?>
	</div>
	<!-- END Google Map -->

	<?php
	
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function roadrunners_categorized_blog() {

	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
	
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
		
			'hide_empty' => 1
			
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
		
	}

	if ( '1' != $all_the_cool_cats ) {
	
		// This blog has more than 1 category so roadrunners_categorized_blog should return true.
		return true;
		
	} else {
	
		// This blog has only 1 category so roadrunners_categorized_blog should return false.
		return false;
		
	}
	
}

if ( ! function_exists( 'roadrunners_post_thumbnail' ) ) :
/**
 * Display the post thumbnail if one is available
 * =========================================================================================================================================
 *
 * @since 1.0.0
 */
function roadrunners_post_thumbnail( $rr_thumbnail_size ) {

	global $post;
	
	$rr_size = empty( $rr_thumbnail_size ) ? '' : $rr_thumbnail_size;
	
	if( empty( $post ) ) {
		return;
	}

	$image_atts 	= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$image_url 		= $image_atts[0];
	
	// Retrieve the image Caption
	$image_caption 	= isset( get_post( get_post_thumbnail_id() )->post_excerpt ) ? '' : get_post( get_post_thumbnail_id() )->post_excerpt;
	
	// Retrieve the image Description
	$image_desc 	= isset( get_post( get_post_thumbnail_id() )->post_content ) ? '' : get_post( get_post_thumbnail_id() )->post_content;
	
	/**
	 * If it's on a blog listings page (index.php), then use the permalink, otherwise link to the full image.
	 */
	if( is_singular() && !is_page_template( 'page-templates/template-archives-artists.php' ) && !is_page_template( 'page-templates/template-archives-events.php' ) ) : ?>
	
		<a href="<?php echo esc_url( $image_url ); ?>" class="post-thumbnail-container" rel="lightbox" title="<?php echo esc_attr( $image_caption ); ?>">
			<?php the_post_thumbnail( $rr_size ); ?>
			<i class="fa fa-search-plus"></i>
		</a>
	
	<?php else : ?>
	
		<a href="<?php the_permalink(); ?>" class="post-thumbnail-container" title="<?php echo esc_attr( $image_caption ); ?>">
			<?php the_post_thumbnail( $rr_size ); ?>
			<i class="fa fa-link"></i>
		</a>
	
	<?php endif; ?>
	
	<br class="clear" />
	<?php
	
}
endif;

/**
 * Custom Comment List (Modified from codex.wordpress.org)
 * ============================================================================
 */
function roadrunners_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	extract( $args, EXTR_SKIP );

	if ( 'div' == $args['style'] ) {
	
		$tag = 'div';
		$add_below = 'comment';
		
	} else {
	
		$tag = 'li';
		$add_below = 'div-comment';
		
	}
	?>
		<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-wrap">
		<?php endif; ?>
		<div class="comment-author-avatar">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>

		<div class="comment-body">

			<?php printf( wp_kses_post( __('<h4 class="comment-author-title">%s</h4>', 'roadrunners' ) ), get_comment_author_link()) ?>
			<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
				<?php printf( esc_html__( 'Replied on %1$s at %2$s', 'roadrunners' ), get_comment_date(),  get_comment_time() ) ?></a><?php edit_comment_link( esc_html__( ' - (Edit)' , 'chimera' ) , '  ' , '' ); ?>
			</div>
			
			<?php if ( $comment->comment_approved == '0' ) : ?>
			
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'roadrunners' ) ?></em>
				<br />
				
			<?php endif; ?>

			<?php comment_text(); ?>

			<div class="reply">
			<?php comment_reply_link( array_merge( $args , array( 'add_below' => $add_below , 'depth' => $depth , 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>

			<br class="clear" />
		</div>

		<?php if ( 'div' != $args['style'] ) : ?>
			</div>
		<?php endif; ?>
		<div class="comment-divider"></div>
	<?php
}

/**
 * Apply all the Custom Styles from the Theme Options Data
 * =========================================================================================================================================
 *
 * @since 1.0.3
 * @changelog
 *
 * 1.0.2 - Minified CSS. Added admin bar check.
 * 1.0.3 - Fixed missing #.
 */
function roadrunners_get_custom_styles() {

	/**
	 * Sanitize and Check the Theme Options Data
	 */
	global $smof_data;
	$color_regex = '/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/';
	
	$roadrunners_primary_font 			= empty( $smof_data['roadrunners_primary_font'] ) 			? 'PT Sans' 		: $smof_data['roadrunners_primary_font'];
	$roadrunners_secondary_font 		= empty( $smof_data['roadrunners_secondary_font'] ) 		? 'PT Sans Narrow' 	: $smof_data['roadrunners_secondary_font'];
	$roadrunners_primary_colour 		= empty( $smof_data['roadrunners_primary_colour'] ) 		? '#ff5400'			: $smof_data['roadrunners_primary_colour'];
	$roadrunners_footer_image 			= empty( $smof_data['roadrunners_footer_image'] )			? ''				: $smof_data['roadrunners_footer_image'];
	$roadrunners_logo_top 				= empty( $smof_data['roadrunners_page_header_logo_top'] ) 	? '0' 				: $smof_data['roadrunners_page_header_logo_top'];
	$roadrunners_logo_left 				= empty( $smof_data['roadrunners_page_header_logo_left'] )	? '0' 				: $smof_data['roadrunners_page_header_logo_left'];
	$roadrunners_home_header_image 		= empty( $smof_data['roadrunners_home_header_image'] ) 		? ''				: $smof_data['roadrunners_home_header_image'];
	
	$roadrunners_quote_background		= empty( $smof_data['roadrunners_quote_background'] ) 		? ''				: $smof_data['roadrunners_quote_background'];
	$roadrunners_quote_two_background	= empty( $smof_data['roadrunners_quote_two_background'] )	? ''				: $smof_data['roadrunners_quote_two_background'];	
	$roadrunners_events_background		= empty( $smof_data['roadrunners_events_background'] ) 		? ''				: $smof_data['roadrunners_events_background'];
	$roadrunners_blog_background		= empty( $smof_data['roadrunners_blog_background'] ) 		? ''				: $smof_data['roadrunners_blog_background'];
	
	$roadrunners_label_event_date		= empty( $smof_data['roadrunners_label_event_date'] ) 		? 'Event Date'		: $smof_data['roadrunners_label_event_date'];
	$roadrunners_label_location			= empty( $smof_data['roadrunners_label_location'] ) 		? 'Location'		: $smof_data['roadrunners_label_location'];
	$roadrunners_label_tickets			= empty( $smof_data['roadrunners_label_tickets'] ) 			? 'Tickets'			: $smof_data['roadrunners_label_tickets'];
	$roadrunners_label_price			= empty( $smof_data['roadrunners_label_price'] ) 			? 'Price'			: $smof_data['roadrunners_label_price'];
	$roadrunners_label_purchase			= empty( $smof_data['roadrunners_label_purchase'] ) 		? 'Purchase'		: $smof_data['roadrunners_label_purchase'];
	$roadrunners_label_artist_name		= empty( $smof_data['roadrunners_label_artist_name'] ) 		? 'Artist Name'		: $smof_data['roadrunners_label_artist_name'];
	$roadrunners_label_discography		= empty( $smof_data['roadrunners_label_discography'] ) 		? 'Discography'		: $smof_data['roadrunners_label_discography'];
	$roadrunners_label_upcoming_releases= empty( $smof_data['roadrunners_label_upcoming_releases'] ) ? 'Upcoming Releases' : $smof_data['roadrunners_label_upcoming_releases'];
	$roadrunners_label_genre			= empty( $smof_data['roadrunners_label_genre'] )			? 'Genre' 			: $smof_data['roadrunners_label_genre'];
		
	$roadrunners_primary_colour 		= preg_match( $color_regex, $roadrunners_primary_colour ) 	? $roadrunners_primary_colour : '#ff5400';
	
	$roadrunners_inner_page_background 	= empty( $smof_data['roadrunners_inner_page_background'] ) 	? '' : $smof_data['roadrunners_inner_page_background'];
	
	/**
	 * Apply Custom Styles
	 */
	?>
	<!-- START Custom Styles -->
	<style type="text/css" id="roadrunners-custom-css">
	body { font-family: "<?php echo esc_html( $roadrunners_primary_font ); ?>", Arial, Tahoma, sans-serif; }
	h1, h2, h3, h4, h5, h6,	button,	input[type="reset"], input[type="submit"], input[type="button"], #home-page-header .tlt, #main-navigation ul li a, #page-meta .breadcrumb-trail, #wp-calendar caption, #bottom-footer, .roadrunners-tabs li a, .button-large, .comment-navigation a, .comment-reply-link, .tagcloud a, .entry-meta span, .entry-meta a,	.entry-footer span,	.entry-footer a, .nav-links a, .home-event-date time, .roadrunners-contact-box-content,	.rr-artist-box p, .rr-event-date:before, .rr-event-venue:before, .rr-event-tickets:before, .rr-event-price:before, .rr-event-purchase:before, .rr-artist-discography:before, .rr-artist-upcoming:before, .rr-artist-genre:before { font-family: "<?php echo esc_html( $roadrunners_secondary_font ); ?>", Arial, Tahoma, sans-serif; }
	a, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, button:hover, input[type="reset"]:hover,	input[type="submit"]:hover,	input[type="button"]:hover,	#header-top .site-title a:hover, #social-icons li a:hover i:before,	#page-meta .breadcrumb-trail a:hover, #events a.home-event:hover .home-event-date time,	#secondary .widget ul li a:hover, #secondary .roadrunners-contact-box-content a:hover, #page-footer .widget ul li a:hover, #page-footer .widget ul li:before, #page-footer .roadrunners-contact-box-content a:hover, .error-404 h1,	.section-heading h1, .about-left h4 span, .about-right h4 span,	.post-thumbnail-container i:before,	.tagcloud a:hover, .entry-meta a:hover,	.entry-footer a:hover, .nav-links a:hover, .comment-navigation a:hover,	.comment-reply-link:hover, .comments-title span, .comment-meta a:hover,	.button-large:hover, .artist-section-wrap h5 span {	color: <?php echo esc_html( $roadrunners_primary_colour ); ?>; }
	#social-icons li a,	#main-navigation ul li a:hover,	#secondary .widget .search-form input[type="submit"], #page-footer .widget .search-form input[type="submit"], #events a.home-event:hover, #blog .home-blog,	.go-down:hover,	.tagcloud a, .nav-links a, .comment-navigation a, .comment-reply-link, .button-large, .roadrunners-contact-box-icon, .rr-meta-box, .rr-artist-box, .event-entry-meta, .event-featured-image img, .section-gallery a, .home-event-date time,	button,	input[type="reset"], input[type="submit"], input[type="button"], .accordion-header:hover i { background: <?php echo esc_html( $roadrunners_primary_colour ); ?>; }
	.about-center { background-color: <?php echo esc_html( $roadrunners_primary_colour ); ?>; }
	#header-top .site-logo { margin-top: <?php echo esc_html( $roadrunners_logo_top ); ?>px; margin-left: <?php echo esc_html( $roadrunners_logo_left ); ?>px; }

	<?php if( $roadrunners_home_header_image && is_page_template( 'page-templates/template-home.php' ) ) : ?>
		#home-page-header { background-image: url(<?php echo esc_url( $roadrunners_home_header_image ); ?>) }
	<?php endif; ?>
	
	<?php if( $roadrunners_inner_page_background && ! is_page_template( 'page-templates/template-home.php' ) ) : ?>
		#inner-page-header { background: url(<?php echo esc_url( $roadrunners_inner_page_background ); ?>) 50% 0 ; }
	<?php endif; ?>
	
	<?php 
	
		$header_image = get_post_meta( get_queried_object_id(), '_rr_header_image', 1 ); 
		if( $header_image ) : ?>
		#inner-page-header { background: url(<?php echo esc_url( $header_image ); ?>) 50% 0; }
	<?php endif; ?>
	
	#page-footer { background-image: url(<?php echo esc_url( $roadrunners_footer_image ); ?>);	background-position: 50% 100%; }
	
	/* Apply Custom Backgrounds */
	#testimonial-01	{ background-image: url(<?php echo esc_url( $roadrunners_quote_background ); ?>); }
	#testimonial-02	{ background-image: url(<?php echo esc_url( $roadrunners_quote_two_background ); ?>); }
	#events 		{ background-image: url(<?php echo esc_url( $roadrunners_events_background ); ?>); }
	#blog	 		{ background-image: url(<?php echo esc_url( $roadrunners_blog_background ); ?>); }
	
	/* Apply custom labels */
	.rr-event-date:before 			{ content: "<?php echo esc_html( $roadrunners_label_event_date ); ?>"; }
	.rr-event-venue:before 			{ content: "<?php echo esc_html( $roadrunners_label_location ); ?>"; }
	.rr-event-tickets:before 		{ content: "<?php echo esc_html( $roadrunners_label_tickets ); ?>"; }
	.rr-event-price:before 			{ content: "<?php echo esc_html( $roadrunners_label_price ); ?>"; }
	.rr-event-purchase:before		{ content: "<?php echo esc_html( $roadrunners_label_purchase ); ?>"; }
	.rr-artist-title:before			{ content: "<?php echo esc_html( $roadrunners_label_artist_name ); ?>"; }
	.rr-artist-discography:before	{ content: "<?php echo esc_html( $roadrunners_label_discography ); ?>"; }
	.rr-artist-upcoming:before		{ content: "<?php echo esc_html( $roadrunners_label_upcoming_releases ); ?>"; }
	.rr-artist-genre:before			{ content: "<?php echo esc_html( $roadrunners_label_genre ); ?>"; }
	
	<?php if( is_admin_bar_showing() ) : ?>
	
		#header-top { top: 32px; }
		@media screen and ( max-width: 782px ) {
			#header-top { top: 0; }
		}
		
	<?php else : ?>
	
		#header-top { top: 0; }
		
	<?php endif; ?>
	</style>
	<!-- END Custom Styles -->
<?php
}
add_action( 'wp_head' , 'roadrunners_get_custom_styles', 999 );

if( ! function_exists( 'roadrunners_google_analytics' ) ) :
/**
 * Output any Google Analytics code from the options.
 */
function roadrunners_google_analytics() {

	global $smof_data;
	
	$roadrunners_analytics = empty( $smof_data['roadrunners_analytics'] ) ? '' : $smof_data['roadrunners_analytics'];
	if( ! $roadrunners_analytics ) {
	
		return;
		
	}
	
	?>
	<script type="text/javascript">
	<?php echo strip_tags( $roadrunners_analytics ); ?>
	</script>
	<?php
	
}
add_action( 'wp_footer', 'roadrunners_google_analytics' );
endif;

if( ! function_exists( 'roadrunners_favicons' ) ) :
/**
 * Get the favicon URLs from the theme options and output them in the head.
 */
function roadrunners_favicons() {

	global $smof_data;
	
	$roadrunners_favicon 		= empty( $smof_data['roadrunners_favicon'] ) 		? '' : $smof_data['roadrunners_favicon'];
	$roadrunners_apple_icon_32	= empty( $smof_data['roadrunners_apple_icon_32'] )	? '' : $smof_data['roadrunners_apple_icon_32'];
	$roadrunners_apple_icon_72	= empty( $smof_data['roadrunners_apple_icon_72'] )	? '' : $smof_data['roadrunners_apple_icon_72'];
	$roadrunners_apple_icon_114	= empty( $smof_data['roadrunners_apple_icon_114'] )	? '' : $smof_data['roadrunners_apple_icon_114'];
	
	?>
	<!-- Favicons -->
	<?php if( $roadrunners_favicon ) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url( $roadrunners_favicon ); ?>">
	<?php endif; ?>
	<?php if( $roadrunners_apple_icon_32 ) : ?>
		<link rel="apple-touch-icon" href="<?php echo esc_url( $roadrunners_apple_icon_32 ); ?>">
	<?php endif; ?>
	<?php if( $roadrunners_apple_icon_72 ) : ?>
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( $roadrunners_apple_icon_72 ); ?>">
	<?php endif; ?>
	<?php if( $roadrunners_apple_icon_114 ) : ?>
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( $roadrunners_apple_icon_114 ); ?>">
	<?php endif;

}
add_action( 'wp_head', 'roadrunners_favicons' );
endif;
 
/**
 * Flush out the transients used in roadrunners_categorized_blog.
 */
function roadrunners_category_transient_flusher() {

	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
	
}
add_action( 'edit_category', 'roadrunners_category_transient_flusher' );
add_action( 'save_post',     'roadrunners_category_transient_flusher' );
