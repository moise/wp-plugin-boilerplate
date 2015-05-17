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
 * Define some needed constants
 */

if ( ! defined( 'COREPATH' ) )
	define( 'COREPATH', plugin_dir_path( __FILE__ ) );

if ( ! defined( 'COREURI' ) )
	define( 'COREURI', plugin_dir_url( __FILE__ ) );

if ( ! defined( 'CUZTOM_URL' ) )
	define( 'CUZTOM_URL', COREURI . '/includes/wp-cuztom/' );

if ( ! defined( 'CUZTOM_DIR' ) )
	define( 'CUZTOM_DIR', COREPATH . '/includes/wp-cuztom/' );

$conf = array();

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

/**
 * Add some custom theme feature like thumbails support.
 * Todo: the theme support should be integrated in the core theme class.
 */

function custom_theme_features()
{
	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'timeline', 'artwork' ) );
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'custom_theme_features' );

function fs_meta_boxes()
{
	global $core;

	$core->post_types->artwork->add_meta_box(
		'additional_info',
		__( 'Informazioni aggiuntive', 'fs' ),
		array(
			array(
				'name'        => 'author',
				'label'       => __( 'Autore', 'fs' ),
				'description' => __( 'Autore dell\'opera', 'fs' ),
				'type'        => 'text'
			),
			array(
				'name'        => 'number',
				'label'       => __( 'Numero', 'fs' ),
				'description' => __( 'Numero dell\'opera', 'fs' ),
				'type'        => 'text'
			),
			array(
				'name'        => 'year',
				'label'       => __( 'Anno', 'fs' ),
				'description' => __( 'Anno dell\'opera', 'fs' ),
				'type'        => 'text'
			),
			array(
				'name'        => 'size',
				'label'       => __( 'Dimensioni', 'fs' ),
				'description' => __( 'Dimensioni dell\'opera', 'fs' ),
				'type'        => 'text'
			),
			array(
				'name'        => 'printed_part',
				'label'       => __( 'Parte stampata', 'fs' ),
				'description' => __( 'Parte stampata dell\'opera', 'fs' ),
				'type'        => 'text'
			),
			array(
				'name'        => 'inventory',
				'label'       => __( 'Numero inventario', 'fs' ),
				'description' => __( 'Numero dell\'inventario', 'fs' ),
				'type'        => 'text'
			),
		)
	);
	$core->post_types->artwork->add_meta_box(
		'size',
		__( 'Dimensioni', 'fs' ),
		array(
			array(
				'name'        => 'height',
				'label'       => __( 'Altezza', 'fs' ),
				'description' => __( 'Altezza dell\'opera', 'fs' ),
				'type'        => 'text'
			),
			array(
				'name'        => 'width',
				'label'       => __( 'Larghezza', 'fs' ),
				'description' => __( 'Larghezza dell\'opera', 'fs' ),
				'type'        => 'text'
			),
			array(
				'name'        => 'depth',
				'label'       => __( 'Profondità', 'fs' ),
				'description' => __( 'Profondità dell\'opera', 'fs' ),
				'type'        => 'text'
			)
		)
	);

	$core->post_types->artwork->add_meta_box(
		'highlight',
		__( 'Mostra in evidenza', 'fs' ),
		array(
			array(
				'name'        => 'yes',
				'label'       => __( 'Visualizza con dimensioni doppie', 'fs' ),
				'description' => __( 'L\'anteprima dell\'opera risulterà larga il doppio rispetto alle altre', 'fs' ),
				'type'        => 'checkbox'
			)
		), 'side', 'high'
	);

	error_log( var_export( $core->post_types, true ) );

	$core->post_types->page->add_meta_box(
		'home-page-video',
		__( 'Video', 'fs' ),
		array(
			array(
				'name'        => 'mp4',
				'label'       => __( 'mp4', 'fs' ),
				'description' => __( '', 'fs' ),
				'type'        => 'text'
			),
			array(
				'name'        => 'webm',
				'label'       => __( 'webm', 'fs' ),
				'description' => __( '', 'fs' ),
				'type'        => 'text'
			),
			array(
				'name'        => 'ogv',
				'label'       => __( 'ogv', 'fs' ),
				'description' => __( '', 'fs' ),
				'type'        => 'text'
			),
		), 'normal', 'high'
	);

}

add_action( 'init', 'fs_meta_boxes' );