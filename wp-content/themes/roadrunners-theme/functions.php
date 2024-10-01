<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			functions.php
 * =========================================================================================================================================
 *
 * @package roadrunners
 *
 * V1.1.1
 *
 *  - Updated TGM Plugin Activation.
 *  - Improved sanitization output.
 *  - Added theme support for wp-title + fallback.
 *
 */

/**
 * Include the TGM Plugin Activation Class
 * ============================================================================
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register' , 'roadrunners_register_required_plugins' );
function roadrunners_register_required_plugins() {

	$plugins = array(

		/**
		 * Pre-packaged Plugins
		 */
		array(
		
			'name'               => 'RoadRunners Plugin',
			'slug'               => 'roadrunners-plugin',
			'source'             => get_stylesheet_directory() . '/plugins/roadrunners-plugin.zip',
			'required'           => true,
			'version'            => '1.2.1',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => ''
			
		),

		/**
		 * WordPress.org Plugins
		 */
		array(
		
			'name'     => 'Breadcrumb Trail',
			'slug'     => 'breadcrumb-trail',
			'required' => false
			
		),

		array(
		
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false
			
		)

	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
	
		'domain'       		=> 'roadrunners',      			// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
		
			'page_title'                       			=> esc_html__( 'Install Required Plugins', 'roadrunners' ),
			'menu_title'                       			=> esc_html__( 'Install Plugins', 'roadrunners' ),
			'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'roadrunners' ), // %1$s = plugin name
			'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'roadrunners' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'roadrunners' ),
			'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'roadrunners' ),
			'complete' 									=> wp_kses_data( __( 'All plugins installed and activated successfully. %s', 'roadrunners' ) ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			
		)
		
	);

	tgmpa( $plugins , $config );

}
 
/**
 * Include the Theme Options Framework (SMOF)
 * https://github.com/syamilmj/Options-Framework
 */
require_once( 'admin/index.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {

	$content_width = 1200;
	
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 * ============================================================================
 */
function roadrunners_setup() {

	/**
	 * Make Roadrunners available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'roadrunners', get_template_directory() . '/languages' );

	/**
	 * Enable support for RSS Feed Links, Post Thumbnails, Post Formats, Custom Background
	 * and HTML5 markup on forms.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery' ) );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', 'gallery' ) );
	add_theme_support( 'custom-background', apply_filters( 'roadrunners_custom_background_args' , array( 
	
		'default-color' => 'f6f6f6',
		'default-image' => ''
		
	) ) );
	add_theme_support( 'custom-header', apply_filters( 'roadrunners_custom_header_args', array(
	
		'default-image'          => '',
		'default-text-color'     => 'FFFFFF',
		'width'                  => 1920,
		'height'                 => 530,
		'flex-height'            => true
		
	) ) );
	
	/**
	 * Set extra Thumbnail sizes for events.
	 */
	add_image_size( 'events-detail', 1180, 420, true );
	add_image_size( 'events-thumbnail', 60, 60, true );
	add_image_size( 'post-home', 380, 250, true );
	
	/**
	 * Add the editor styles
	 */
	add_editor_style( 'css/editor-style.css' );
	
	/**
	 * Register all the theme's menus
	 */
	register_nav_menus( array(
	
		'primary'		=> esc_html__( 'Main Navigation', 'roadrunners' ),
		'primary-inner'	=> esc_html__( 'Main Navigation - Inner Pages', 'roadrunners' )
		
	) );
	
}
add_action( 'after_setup_theme', 'roadrunners_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 * ============================================================================
 */
function roadrunners_widgets_init() {

	/**
	 * Include all theme specific widgets.
	 */
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Roadrunners_Contact_Details' );

	register_sidebar( array(
	
		'name'          => esc_html__( 'Main Sidebar', 'roadrunners' ),
		'id'            => 'main-sidebar',
		'description'	=> esc_html__( 'This is the main Sidebar that appears on the Blog pages.', 'roadrunners' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<br class="clear" /></aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
		
	) );
	
	register_sidebar( array(
	
		'name'          => esc_html__( 'Footer - First Column', 'roadrunners' ),
		'id'            => 'footer-first',
		'description'	=> esc_html__( 'This area appears in the first column of the site\'s footer.', 'roadrunners' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<br class="clear" /></aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
		
	) );
	
	register_sidebar( array(
	
		'name'          => esc_html__( 'Footer - Second Column', 'roadrunners' ),
		'id'            => 'footer-second',
		'description'	=> esc_html__( 'This area appears in the second column of the site\'s footer.', 'roadrunners' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<br class="clear" /></aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
		
	) );
	
	register_sidebar( array(
	
		'name'          => esc_html__( 'Footer - Third Column', 'roadrunners' ),
		'id'            => 'footer-third',
		'description'	=> esc_html__( 'This area appears in the third column of the site\'s footer.', 'roadrunners' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<br class="clear" /></aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
		
	) );
	
}
add_action( 'widgets_init', 'roadrunners_widgets_init' );

/**
 * Enqueue scripts and styles.
 * ============================================================================
 */
function roadrunners_scripts() {

	/** 
	 * Enqueue Styleheets
	 * ========================================================================
	 * 
	 * unsemantic-grid.css		- http://unsemantic.com/
	 * formalize.css			- http://formalize.me/
	 * animate.css 				- http://daneden.github.io/animate.css/
	 * font-awesome.css			- http://fortawesome.github.io/Font-Awesome/
	 * slimbox2.css				- http://www.digitalia.be/software/slimbox2/
	 * style.css
	 * responsive.css
	 * roadrunner_font_url()
	 */
	wp_enqueue_style( 'roadrunners-unsemantic-grid', get_template_directory_uri() . '/css/unsemantic-grid.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'roadrunners-formalize', get_template_directory_uri() . '/css/formalize.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'roadrunners-animate', get_template_directory_uri() . '/css/animate.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'roadrunners-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.0.3', 'all' );
	wp_enqueue_style( 'roadrunners-slimbox2', get_template_directory_uri() . '/css/slimbox2.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'roadrunners-main', get_template_directory_uri() . '/css/main.css', array(), '1.2.0', 'all' );
	wp_enqueue_style( 'roadrunners-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.2.0', 'all' );
	wp_enqueue_style( 'roadrunners-google-fonts', roadrunners_font_url(), array(), null );
	wp_enqueue_style( 'roadrunners-style', get_stylesheet_uri() );
	
	/**
	 * Enqueue Scripts
	 * ========================================================================
	 *
	 * jquery.easing.1.3.js			- http://gsgd.co.uk/sandbox/jquery/easing/
	 * jquery.fitvids.js			- http://fitvidsjs.com/
	 * jquery.formalize.js			- http://formalize.me/
	 * jquery.slimbox.js			- http://www.digitalia.be/software/slimbox2/
	 * jquery.lettering.js			- http://letteringjs.com/
	 * jquery.textillate.js			- http://jschr.github.io/textillate/
	 * jquery.scrollReveal.min.js	- http://julianlloyd.me/scrollreveal/
	 * jquery.custom.js
	 * navigation.js
	 * skip-link-focus-fix.js	
	 */
	wp_enqueue_script( 'roadrunners-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), '1.3', true );
	wp_enqueue_script( 'roadrunners-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
	wp_enqueue_script( 'roadrunners-formalize', get_template_directory_uri() . '/js/jquery.formalize.js', array( 'jquery' ), '1.2', true );
	wp_enqueue_script( 'roadrunners-slimbox', get_template_directory_uri() . '/js/jquery.slimbox.js', array( 'jquery' ), '2.05', true );
	wp_enqueue_script( 'roadrunners-lettering', get_template_directory_uri() . '/js/jquery.lettering.js', array( 'jquery' ), '0.6.1', true );
	wp_enqueue_script( 'roadrunners-textillate', get_template_directory_uri() . '/js/jquery.textillate.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'roadrunners-scrollReveal', get_template_directory_uri() . '/js/jquery.scrollReveal.min.js', array( 'jquery' ), '0.1.0', true );
	wp_enqueue_script( 'roadrunners-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'roadrunners-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'roadrunners-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	/**
	 * Add support for the dynamic comment reply form
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	
		wp_enqueue_script( 'comment-reply' );
		
	}
	
}
add_action( 'wp_enqueue_scripts', 'roadrunners_scripts' );

/**
 * Load the fonts from the Google Font Library stored in the Theme Options.
 * ============================================================================
 */
function roadrunners_font_url() {

	global $smof_data;

	$primary_font 	= empty( $smof_data['roadrunners_primary_font'] )   ? 'PT Sans' 		: $smof_data['roadrunners_primary_font'];
	$secondary_font = empty( $smof_data['roadrunners_secondary_font'] ) ? 'PT Sans Narrow' 	: $smof_data['roadrunners_secondary_font'];

	$font_url = '';
	$font_url = add_query_arg( 'family' , urlencode( esc_attr( $primary_font ) . ':400,400italic,700|' . esc_attr( $secondary_font ) . ':400,700' ) , "//fonts.googleapis.com/css" );

	return $font_url;
	
}

if ( ! function_exists( '_wp_render_title_tag' ) ) :
/**
 *  Backwards compatability support for the wp_title().
 *  ===========================================================================
 */
function roadrunners_render_title() {
	
	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
		
}
add_action( 'wp_head', 'roadrunners_render_title' );
endif;

if( ! function_exists( 'roadrunners_excerpt_length' ) ) :
/**
 *  Change the length of the excerpts.
 *  ===========================================================================
 */
function roadrunners_excerpt_length() {

	return 28;

}
add_filter( 'excerpt_length', 'roadrunners_excerpt_length' );
endif;

if( ! function_exists( 'roadrunners_excerpt_more' ) ) :
/**
 *  Change the "more" link on post excerpts.
 *  ===========================================================================
 */
function roadrunners_excerpt_more() {

	return '&hellip;';

}
add_filter( 'excerpt_more', 'roadrunners_excerpt_more' );
endif;

/**
 * Include necessary files.
 * ============================================================================
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/jetpack.php';