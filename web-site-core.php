<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             0.1.0
 * @package           Web_Site_Core
 *
 * @wordpress-plugin
 * Plugin Name:       Web Site Core
 * Description:       All the web site's Core stuff
 * Version:           0.1.0
 * Author:            Moise Scalzo
 * Author URI:        https://twitter.com/MoiseScalzo
 * Text Domain:       core
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define some useful constants
 */
if ( ! defined( 'COREPATH' ) )
	define( 'COREPATH', plugin_dir_path( __FILE__ ) );

if ( ! defined( 'COREURI' ) )
	define( 'COREURI', plugin_dir_url( __FILE__ ) );

$conf = array();

define( 'CUZTOM_URL', COREURI . '/includes/wp-cuztom/' );
define( 'CUZTOM_DIR', COREPATH . '/includes/wp-cuztom/' );

include CUZTOM_DIR . 'cuztom.php';

/**
 * The core configuration file.
 * Edit this file to setup this custom web site.
 */

require_once COREPATH . '/web-site-config.php';

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */

require_once COREPATH . '/includes/core.class.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */

$core = Core::get_instance( $conf );



//add_action( 'init', 'fs_custom_post_types' );




//function bones_ahoy()
//{
//
//	//Allow editor style.
//	add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );
//
//	// let's get language support going, if you need it
//	load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );
//
//	// launching operation cleanup
//	add_action( 'init', 'bones_head_cleanup' );
//	// A better title
//	add_filter( 'wp_title', 'rw_title', 10, 3 );
//	// remove WP version from RSS
//	add_filter( 'the_generator', 'bones_rss_version' );
//	// remove pesky injected css for recent comments widget
//	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
//	// clean up comment styles in the head
//	add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
//	// clean up gallery output in wp
//	add_filter( 'gallery_style', 'bones_gallery_style' );
//
//	// enqueue base scripts and styles
//	add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
//	// ie conditional wrapper
//
//	// launching this stuff after theme setup
//	bones_theme_support();
//
//	// adding sidebars to Wordpress (these are created in functions.php)
//	add_action( 'widgets_init', 'bones_register_sidebars' );
//
//	// cleaning up random code around images
//	add_filter( 'the_content', 'bones_filter_ptags_on_images' );
//	// cleaning up excerpt
//	add_filter( 'excerpt_more', 'bones_excerpt_more' );
//
//} /* end bones ahoy */
//
//// let's get this party started
//add_action( 'after_setup_theme', 'bones_ahoy' );
//
