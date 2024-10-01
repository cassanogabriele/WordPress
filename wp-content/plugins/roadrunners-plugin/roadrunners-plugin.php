<?php
/**
 * Plugin Name:       RoadRunners Plugin
 * Plugin URI:        http://themeforest.net/
 * Description:       This is a complimentary plugin for the "RoadRunners" WordPress theme. You can use it to create, manage and update Events and Artists. It also has some useful shortcodes available to use. Of course, you can use this in any theme too :)
 * Version:           1.2.1
 * Author:            Dan Richardson (Subatomic Themes)
 * Author URI:        http://themeforest.net/user/SubatomicThemes
 * Text Domain:       rr_plugin
 * License:           See "Licensing" Folder
 * License URI:       See "Licensing" Folder
 * Domain Path:       /languages
 */

/**
 * Make the plugin available for translation.
 * =========================================================================================================================================
 * @since 1.0.0
 */
load_plugin_textdomain( 'rr_plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 

/**
 * Include all the files needed.
 * =========================================================================================================================================
 * @since 1.0.0
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/post-types.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/taxonomy-types.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/custom-meta-boxes.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php' );