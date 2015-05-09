<?php

if ( ! defined( 'COREPATH' ) )
	define( 'COREPATH', plugin_dir_path( __FILE__ ) );

if ( ! defined( 'COREURI' ) )
	define( 'COREURI', plugin_dir_url( __FILE__ ) );

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


	private static $instance = null;


	protected $conf;


	var $post_types;

	/**
	 * Setup all the necessary constants
	 *
	 * @since : 0.1.0
	 */

	const VERSION = '0.1.1';



	private function __construct( $conf )
	{
		$this->conf = $conf;
		$this->core_hooks();                        // Attivo i vari hooks necessari
		$this->post_types = new StdClass;
	}


	/**
	 * Public function to set the instance
	 *
	 * @author: Moise Scalzo
	 * @since : 0.1.0
	 * @param : $conf
	 * @return: null|\Theme
	 */

	public static function get_instance( $conf )
	{
		if ( self::$instance == null ) {
			self::$instance = new Core( $conf );
			self::$instance->setup_constants();
			self::$instance->dependencies();
			self::$instance->core_hooks();
		}

		return self::$instance;
	}


	private function setup_constants()
	{

		if ( ! defined( 'CUZTOM_URL' ) )
			define( 'CUZTOM_URL', COREURI . '/includes/wp-cuztom/' );

		if ( ! defined( 'CUZTOM_DIR' ) )
			define( 'CUZTOM_DIR', COREPATH . '/includes/wp-cuztom/' );

	}


	public function core_hooks()
	{
		add_action( 'init', array( &$this, 'register_menus' ) );
		add_action( 'init', array( &$this, 'native_cpt' ) );

	}


	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - WP Cuztom.
	 * - All the custon file dependencies. Set them on the Theme configuration file.
	 * - Plugin_Name_Loader. Orchestrates the hooks of the plugin.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    0.1.0
	 * @access   private
	 */

	private function dependencies()
	{
		// Required by the class
		require_once COREPATH . '/includes/wp-cuztom/cuztom.php';
		require_once COREPATH . '/includes/bones.php';
		//require_once $this->path . '/includes/breadcrumb.class.php';

		//All the custom files
		if ( isset( $this->conf['dependencies'] ) ) {

			foreach ( $this->conf['dependencies'] as $dependency ) {
				require_once $dependency;
			}

		}
	}


	/**
	 * Register custom menus
	 */

	public function register_menus()
	{
		if ( isset( $this->conf['menus'] ) )
			register_nav_menus( $this->conf['menus'] );
	}


	/**
	 * Public function to add new custom post types.
	 *
	 * @param : $name
	 * @param : $args
	 * @return: object           Objects of post types elements
	 */

	public function cpt( $name, $args )
	{
		$this->post_types->$name = new Cuztom_Post_Type( $name, $args );

		return (object) $this->post_types;
	}


	/**
	 * Create native Custom Post Type from the base web-site-config file.
	 * @since : 0.1.1
	 * @access: public
	 * @return: object
	 */
	public function native_cpt()
	{
		error_log(var_export( $this->conf['cpt'], true));

		if ( isset( $this->conf['cpt'] ) ) {
			foreach ( $this->conf['cpt'] as $cpt_name => $cpt_args ) {
				$this->post_types->$cpt_name = new Cuztom_Post_Type( $cpt_name, $cpt_args );
			}
		}

		return (object) $this->post_types;
	}

}