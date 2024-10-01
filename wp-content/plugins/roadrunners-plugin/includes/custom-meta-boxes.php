<?php
/**
 * PLUGIN	: RoadRunners Plugin
 * FILE		: custom-meta-boxes.php
 *
 * Setup all the meta boxes for the Events Custom Post Type. Uses the "cmb_Meta_Box" class.
 * https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
 *
 * V1.2.0
 *
 *  - Added custom header option.
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */
function rr_metaboxes( $meta_boxes ) {

    $prefix	= '_rr_';
    $meta_boxes['events_metabox'] = array(
	
        'id' 			=> 'events_metabox',
        'title' 		=> esc_html__( 'Event Information', 'rr_plugin' ),
        'pages' 		=> array( 'rr_events' ),
        'context' 		=> 'normal',
        'priority' 		=> 'high',
        'show_names' 	=> true,
        'fields' 		=> array(
		
			// Venue
            array(
                'name' 		=> esc_html__( 'Venue', 'rr_plugin' ),
                'desc' 		=> esc_html__( 'Enter the name of the Venue and/or Location.', 'rr_plugin' ),
                'id' 		=> $prefix . 'event_venue',
                'type' 		=> 'textarea_small'
            ),
			
			// Map Location
            array(
                'name' 		=> esc_html__( 'Location on Map', 'rr_plugin' ),
                'desc' 		=> wp_kses_post( __( 'You can embed a map from Google Maps by entering the iframe link here and it will
									display it at the bottom of the post. A good tool to use is the 
									<a href="https://mapsengine.google.com/map/" target="_blank">Maps Engine by Google</a>.', 'rr_plugin' ) ),
                'id' 		=> $prefix . 'event_map',
                'type' 		=> 'textarea_code'
            ),
			
			// Date
			array(
				'name'		=> esc_html__( 'Event Date', 'rr_plugin' ),
				'desc'		=> esc_html__( 'Choose a Date for the Event', 'rr_plugin' ),
				'id'		=> $prefix . 'event_date',
				'type'		=> 'text_date_timestamp'
			),
			
			// Tickets
			array(
				'name' 		=> esc_html__( 'Ticket Availability', 'rr_plugin' ),
				'desc' 		=> esc_html__( 'Select availabliity of tickets for the Event', 'rr_plugin' ),
				'id' 		=> $prefix . 'event_tickets',
				'type' 		=> 'select',
				'options' 	=> array(
					array( 'name' => esc_html__( 'Available', 'rr_plugin' ), 'value' => esc_html__( 'Tickets Available!' , 'rr_plugin' ) ),
					array( 'name' => esc_html__( 'Limited'  , 'rr_plugin' ), 'value' => esc_html__( 'Limited Availability!', 'rr_plugin' ) ),
					array( 'name' => esc_html__( 'Sold Out' , 'rr_plugin' ), 'value' => esc_html__( 'Sold Out!', 'rr_plugin' ) )
				)
			),
			
			// Price
			array(
				'name'	=> esc_html__( 'Ticket Price', 'rr_plugin' ),
				'desc'	=> esc_html__( 'Set a price for the tickets', 'rr_plugin' ),
				'id'	=> $prefix . 'event_price',
				'type'	=> 'text_money'
			),
			
			// Ticket URL
			array(
				'name'	=> esc_html__( 'Ticket URL', 'rr_plugin' ),
				'desc'	=> esc_html__( 'Enter a URL to buy the tickets (e.g. http://www.ticketweb.co.uk/...)', 'rr_plugin' ),
				'id'	=> $prefix . 'event_ticket_url',
				'type'	=> 'text'
			)
			
        ),
		
    );

	$meta_boxes['artists_metabox'] = array(
	
        'id' 			=> 'artists_metabox',
        'title' 		=> esc_html__( 'Artist Information', 'rr_plugin' ),
        'pages' 		=> array( 'rr_artists' ),
        'context' 		=> 'normal',
        'priority' 		=> 'high',
        'show_names' 	=> true,
        'fields' 		=> array(
		
			// Formed
			array(
				'name'		=> esc_html__( 'When the band formed', 'rr_plugin' ),
				'desc'		=> esc_html__( 'If it\'s a band, enter a brief time when they formed.', 'rr_plugin' ),
				'id'		=> $prefix . 'artist_formed',
				'type'		=> 'text'
			),
		
			// Albums
			array(
				'name'		=> esc_html__( 'Number of albums released', 'rr_plugin' ),
				'desc'		=> esc_html__( 'Enter the number of albums the band or artist has released to date.', 'rr_plugin' ),
				'id'		=> $prefix . 'artist_albums',
				'type'		=> 'text'
			),
		
			// Discography
            array(
                'name' 		=> esc_html__( 'Discography', 'rr_plugin' ),
                'desc' 		=> esc_html__( 'Enter a list of albums for the artist. <br /> Tags can be used as line breaks.', 'rr_plugin' ),
                'id' 		=> $prefix . 'artist_discography',
                'type' 		=> 'textarea_small'
            ),
			
			// Upcoming Albums
            array(
                'name' 		=> esc_html__( 'Upcoming Albumns', 'rr_plugin' ),
                'desc' 		=> esc_html__( 'Enter a list of upcoming album releases, starting with the album name followed by the date. <br /> Tags can be used as line breaks.', 'rr_plugin' ),
                'id' 		=> $prefix . 'artist_upcoming',
                'type' 		=> 'textarea_small'
            )
			
        )
		
    );
	
	 $meta_boxes['custom_header_metabox'] = array(
	
        'id' 			=> 'custom_header',
        'title' 		=> esc_html__( 'Upload a Custom Header Image', 'rr_plugin' ),
        'pages' 		=> array( 'rr_events', 'rr_artists', 'post', 'page' ),
        'context' 		=> 'normal',
        'priority' 		=> 'high',
        'show_names' 	=> true,
        'fields' 		=> array(
		
            array(
                'name' 		=> esc_html__( 'Header Image URL', 'rr_plugin' ),
                'desc' 		=> esc_html__( 'You can use the WordPress media uploader to add an image, or enter a custom URL to the image.', 'rr_plugin' ),
                'id' 		=> $prefix . 'header_image',
                'type' 		=> 'file'
            )
			
		)
		
	);
	
    return $meta_boxes;
	
}
add_filter( 'cmb_meta_boxes', 'rr_metaboxes' );

/**
 * Load the "cmb_Meta_Box" class, if it exists.
 *
 * https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
 * =========================================================================================================================================
 * @since 1.0.0
 */
add_action( 'init', 'rr_initialize_cmb_meta_boxes', 9999 );
function rr_initialize_cmb_meta_boxes() {
    if ( ! class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'meta-boxes/init.php' );
    }
}