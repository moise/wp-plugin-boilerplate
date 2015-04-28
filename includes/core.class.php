<?php

/**
 * The file that defines the core website class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      0.1.0
 *
 * @package    Web_Site_Core
 * @subpackage Web_Site_Core/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1.0
 * @package    Web_Site_Core
 * @subpackage Web_Site_Core/includes
 * @author     Moise Scalzo <moise.scalzo@gmail.com>
 */
class Core {


	protected $conf;


	public function __construct( $conf )
	{
		$this->conf = $conf;

		$this->core_hooks();                        // Attivo i vari hooks necessari
	}


	public function core_hooks()
	{
		add_action( 'init', array( &$this, 'register_menus' ) );
	}


	public function register_menus()
	{
		if ( isset( $this->conf['menus'] ) )
			register_nav_menus( $this->conf['menus'] );
	}

}