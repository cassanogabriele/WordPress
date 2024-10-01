<?php
/**
 * PLUGIN	: RoadRunners Plugin
 * FILE		: shortcodes.php
 *
 * This file contains all Shortcodes used within the "RoadRunners" theme.
 *
 * V1.2.0
 *
 *  - Added "target" attribute to the [button] shortcode.
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */

/**
 * COLUMN SHORTCODE
 *
 * Example Usage: [col pre="20" grid="60" suf="20"]$content[/col]
 * ============================================================================
 */
function rr_columns( $atts , $content = null ) {

	extract( shortcode_atts( array(
	
		'pre' 		=> '0',		// Prefix								- int
		'grid'		=> '100',	// Column Width							- int
		'suf'		=> '0',		// Suffix								- int
		'tgrid'		=> '100',	// Tablet Column Width					- int
		'mgrid'		=> '100',	// Mobile Column Width					- int
		'dhide'		=> '',		// Hide on Desktop?						- bool
		'thide'		=> '',		// Hide on Tablet?						- bool
		'mhide'		=> '',		// Hide on Mobile?						- bool
		'dfirst'	=> '',		// Is it the FIRST column on Desktop? 	- bool
		'tfirst'	=> '',		// Is it the FIRST column on Tablet?  	- bool
		'mfirst'	=> '',		// Is it the FIRST column on Mobile?  	- bool
		'dlast'		=> '',		// Is it the LAST colomn on Desktop?  	- bool
		'tlast'		=> '',		// Is it the LAST colomn on Tablet?   	- bool
		'mlast'		=> '',		// Is it the LAST colomn on Mobile?   	- bool

	), $atts ) );

	$prefix 			= '';
	$suffix 			= '';
	$tablet 			= '';
	$mobile 			= '';
	$hide_on_desktop 	= '';
	$hide_on_tablet 	= '';
	$hide_on_mobile		= '';
	$first_on_desktop   = '';
	$first_on_tablet	= '';
	$first_on_mobile	= '';
	$last_on_desktop	= '';
	$last_on_tablet		= '';
	$last_on_mobile		= '';
	
	if( ! $pre   == null ) { $prefix = 'prefix-' . $pre . ' '; }
	if( ! $suf   == null ) { $suffix = ' suffix-' . $suf; }
	if( ! $tgrid == null ) { $tablet = ' tablet-grid-' . $tgrid; }
	if( ! $mgrid == null ) { $mobile = ' mobile-grid-' . $mgrid; }
	
	if( ! $dhide == null ) { $hide_on_desktop = ' hide-on-desktop'; }
	if( ! $thide == null ) { $hide_on_tablet  = ' hide-on-tablet'; }
	if( ! $mhide == null ) { $hide_on_mobile  = ' hide-on-mobile'; }
	
	if( ! $dfirst == null ) { $first_on_desktop = ' first-on-desktop'; }
	if( ! $tfirst == null ) { $first_on_tablet  = ' first-on-tablet';  }
	if( ! $mfirst == null ) { $first_on_mobile  = ' first-on-mobile';  }
	
	if( ! $dlast == null ) { $last_on_desktop = ' last-on-desktop'; }
	if( ! $tlast == null ) { $last_on_tablet  = ' last-on-tablet';  }
	if( ! $mlast == null ) { $last_on_mobile  = ' last-on-mobile';  }
	
	$html  = '<div class="' . esc_attr( $prefix ) . 'grid-' . esc_attr( $grid ) . esc_attr( $suffix ) . esc_attr( $tablet ) . esc_attr( $mobile ) . esc_attr( $hide_on_desktop ) . esc_attr( $hide_on_tablet ) . esc_attr( $hide_on_mobile ) . esc_attr( $first_on_desktop ) . esc_attr( $first_on_tablet ) . esc_attr( $first_on_mobile ) . esc_attr( $last_on_desktop ) . esc_attr( $last_on_tablet ) . esc_attr( $last_on_mobile ) . '">' . "\n";
	$html .= do_shortcode( $content ) . "\n";
	$html .= '</div>';
	
	return $html;
	
}
add_shortcode( 'col'    , 'rr_columns' );
add_shortcode( 'column' , 'rr_columns' );

/**
 * BUTTON SHORTCODE
 *
 * Example Usage: [button url="http://www.exampleurl.com" target="_blank"]$content[/button]
 * ============================================================================
 */
function rr_button( $atts , $content = null ) {

	extract( shortcode_atts( array(
	
		'url'    => 'http://www.exampleurl.com/',
		'target' => ''
		
	), $atts ) );

	$target_att = '';
	if( $target == '_blank' || $target == 'blank' || $target == 'new' ) {
		
		$target_att = ' target="_blank"';
		
	}
	
	$html = '<a href="' . esc_url( $url ) . '" class="button-large"' . $target_att . '>' . do_shortcode( $content ) . '</a>' . "\n";
	
	return wp_kses_post( $html );
	
}
add_shortcode( 'button' , 'rr_button' );

/**
 * ACCORDION SHORTCODE
 *
 * Example Usage: [acc title="Accordion Title" open="true" type="toggle"]$content[/acc]
 * ============================================================================
 */
function rr_accordion( $atts , $content = null ) {

	extract( shortcode_atts( array(
	
		'title'		=> '',
		'open'		=> '',
		'type'		=> '',
		
	), $atts ) );
	
	$toggle_class			= 'accordion';
	$toggle_header_class	= 'accordion-header';
	$toggle_content_class	= 'accordion-content';
	
	$open_header_class  	= '';
	$open_content_class 	= '';
	$open_icon_class    	= 'fa-plus';
	
	if( 'toggle' == $type ) {
		$toggle_class			= 'toggle';
		$toggle_header_class	= 'toggle-header';
		$toggle_content_class	= 'toggle-content';
	}
	
	if( 'true' == $open ) {
		if( 'toggle' == $type ) {
			$open_header_class  = ' toggle-collapse';
		} else {
			$open_header_class  = ' accordion-collapse';
		}
		$open_content_class = ' open';
		$open_icon_class    = 'fa-minus';
	}
	
	$html  = '<div class="' . esc_attr( $toggle_class ) . '">' . "\n";
	$html .= '<a href="#" class="' . esc_attr( $toggle_header_class ) . esc_attr( $open_header_class ) . '">' . "\n";
	$html .= '<i class="fa ' . esc_attr( $open_icon_class ) . '"></i>' . "\n";
	$html .= '<h2>' . esc_html( $title ) . '</h2>' . "\n";
	$html .= '</a>' . "\n";
	$html .= '<div class="' . esc_attr( $toggle_content_class ) . esc_attr( $open_content_class ) . '">' . "\n";
	$html .= do_shortcode( $content ) . "\n";
	$html .= '</div>' . "\n";
	$html .= '<br class="clear" />' . "\n";
	$html .= '</div>' . "\n";
		
	return wp_kses_post( $html );
	
}
add_shortcode( 'acc'       , 'rr_accordion' );
add_shortcode( 'accordion' , 'rr_accordion' );

/**
 * TABS SHORTCODES
 *
 * Example Usage:
 * 
 * [tabs names="tab1:tab2:tab3"]
 *   [tab name="tab1"]
 *     Content for Tab One...
 *   [/tab]
 *   [tab name="tab2"]
 *     Content for Tab Two...
 *   [/tab]
 * [/tabs]
 *
 * ============================================================================
 */
function rr_tabs_container( $atts , $content = null ) {

	extract( shortcode_atts( array(
	
		'names' => ''
		
	), $atts ) );
	
	$items = explode( ':' , $names );
	
	$html  = '<div class="tab-container">' . "\n";
	$html .= '<ul class="roadrunners-tabs">' . "\n";
		
	foreach( $items as $item ) {
	
		$the_name = $item;
		$the_id = str_replace( ' ' , '_' , $item );
		$the_id = strtolower( $the_id );
		$html .= '<li class="tab"><a href="#' . esc_attr( $the_id ) . '">'. esc_html( $the_name ) . '</a></li>' . "\n";
		
	}
		
	$html .= '</ul>' . "\n";
	$html .= '<br class="clear" />' . "\n";
	$html .= '<div class="wrap">' . "\n";
	$html .= do_shortcode( $content ) . "\n";
	$html .= '<br class="clear" />' . "\n";
	$html .= '</div>' . "\n";
	$html .= '</div>' . "\n";
	
	return wp_kses_post( $html );
	
}

function rr_tab( $atts , $content = null ) {

	extract( shortcode_atts( array(
	
		'name' => ''
		
	), $atts ) );
	
	$the_name = str_replace( ' ' , '_' , $name );
	$the_name = strtolower( $the_name );
	
	$html  = '<div id="' . esc_attr( $the_name ) . '">' . "\n";
	$html .= do_shortcode( $content ) . "\n";
	$html .= '</div>';
	
	return wp_kses_post( $html );

}
add_shortcode( 'tabs' , 'rr_tabs_container' );
add_shortcode( 'tab' , 'rr_tab' );

/**
 * Only the plugin's shortcodes will be regex'ed for stray <p> and <br /> tags 
 * generated by wpautop() and ONLY the ones that need it.
 * ============================================================================
 *
 */
function roadrunners_content_filter( $content ) {
 
	/**
	 * Custom Shortcodes requiring the fix
	 */
	$block = join( '|' , array( 
		'col',
		'acc',
		'tabs',
		'tab'
	) );
	 
	/**
	 * Opening Tag
	 */
	$rep = preg_replace( "/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/" , "[$2$3]" , $content );
	
	/**
	 * Closing Tag
	 */
	$rep = preg_replace( "/(<p>)?\[\/($block)](<\/p>|<br \/>)?/" , "[/$2]" , $rep );
	 
	return $rep;
 
}
add_filter( 'the_content', 'roadrunners_content_filter' );

/**
 * Enqueue all scripts and styles for the front end
 * ============================================================================
 */
function rr_plugin_scripts() {

	/**
	 * Check first to see if Unsemantic has already been enqueued
	 */
	if( ! wp_style_is( 'roadrunners-unsemantic-grid' , $list = 'enqueued' ) && ! wp_style_is( 'unsemantic-grid' , $list = 'enqueued' ) ) {
		/**
		 * Unsemantic Grid
		 *
		 * https://github.com/nathansmith/unsemantic
		 */
		wp_enqueue_style( 'unsemantic-grid' , plugins_url( 'css/unsemantic-grid.css' , __FILE__ ) , array() , '1.0' , 'all' );
	}
	
	/**
	 * Check first to see if Easytabs has already been enqueued
	 */
	if( ! wp_script_is( 'roadrunners-easytabs' , $list = 'enqueued' ) && ! wp_script_is( 'easytabs' , $list = 'enqueued' ) ) {
		/**
		 * Easytabs Script
		 *
		 * http://os.alfajango.com/easytabs/
		 */
		wp_enqueue_script( 'easytabs' , plugins_url( 'js/jquery.easytabs.min.js' , __FILE__ ) , array( 'jquery' ) , '3.2.0' , true );
	}

}
add_action( 'wp_enqueue_scripts' , 'rr_plugin_scripts' );