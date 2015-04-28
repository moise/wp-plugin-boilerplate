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

$core = new Core( $conf );
