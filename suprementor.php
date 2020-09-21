<?php
/**
* Plugin Name: Suprementor
* Description: Elementor widgets for building supreme websites.
* Plugin URI:  https://suprementor.com
* Version:     1.0.0
* Author:      Sam Wright
* Text Domain: suprementor
*/

namespace Suprementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('SUPREMENTOR', true );
define('SUPREMENTOR_PATH', plugin_dir_path( __FILE__ ) );

/**
* Main Elementor Extension Class
*
* The main class that initiates and runs the plugin.
*
* @since 1.0.0
*/

class Instance {

	/**
	* Plugin Version
	* @since 1.0.0
	*/
	const VERSION = '1.0.0';

	/**
	* Minimum Elementor Version
	* @since 1.0.0
	*/
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	* Minimum PHP Version
	* @since 1.0.0
	*/
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	* Instance
	* @since 1.0.0
	*/
	private static $_instance = null;

	/**
	* Modules Manager
	* @since 1.0.0
	*/
	public $module_manager;

	/**
	* Instance
	* @since 1.0.0
	*/
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	* Constructor
	* @since 1.0.0
	*/
	public function __construct() {
		$this->register_autoloader();
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	* Register Autoloader
	* @since 1.0.0
	*/
	private function register_autoloader() {
		spl_autoload_register( [ $this, 'autoload' ] );
	}

	/**
	* Autoload
	* @since 1.0.0
	*/
	public function autoload( $class ) {
		if ( strpos( $class, 'Suprementor\\' ) !== false ) {
			if ( ! class_exists( $class ) ) {
				$filename = str_replace( 'Suprementor\\', '', $class );
				$filename = str_replace( '\\', '/', $filename );
				$filename = str_replace( '_', '-', $filename );
				$filename = strtolower( $filename );
				$filename = SUPREMENTOR_PATH . $filename . '.php';
				if ( is_readable( $filename ) ) {
					include_once( $filename );
				}
			}
		}
	}

	/**
	* Initialize the plugin
	*
	* Load the plugin only after Elementor (and other plugins) are loaded.
	* Checks for basic plugin requirements, if one check fail don't continue,
	* if all check have passed load the files required to run the plugin.
	*
	* Fired by `plugins_loaded` action hook.
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Load elementor modules
		$this->module_manager = new \Suprementor\Managers\Module_Manager();

		// Add image sizes
		add_action( 'init', [ $this, 'init_image_sizes' ] );

		// Add elementor hooks
		add_action( 'elementor/init', [ $this, 'init_elementor' ] );

		// Add elementor widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

		// Add custom widget controls
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

		// Add elementor tabs for controls
		add_action( 'elementor/init', [ $this, 'init_control_tabs' ] );

		// Add widget categories
		add_action( 'elementor/elements/categories_registered', [ $this, 'init_widget_categories' ] );

		// Add scripts
		add_action( 'wp_enqueue_scripts', [ $this, 'scripts' ] );

	}

	/**
	* Add Image Sizes
	*
	* Adds the required image sizes used by the plugin.
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function init_image_sizes() {

		add_image_size('SUP-50x50-Crop', 50, 50, true);
		add_image_size('SUP-90x90-Crop', 90, 90, true);
		add_image_size('SUP-555x450-Crop', 555, 450, true);
		add_image_size('SUP-670x420-Crop', 670, 420, true);
		add_image_size('SUP-1024x1024-Crop', 1024, 1024, true);
		add_image_size('SUP-1170x500-Crop', 1170, 500, true);
		add_image_size('SUP-1280x720-Crop', 1280, 720, true);
		add_image_size('SUP-1920x1080-Crop', 1920, 1080, true);
		add_image_size('SUP-360x450-Crop', 360, 450, true);
		add_image_size('SUP-720x900-Crop', 720, 900, true);
		add_image_size('SUP-360x450-Top', 360, 450, array('center', 'top'));
		add_image_size('SUP-720x900-Top', 720, 900, array('center', 'top'));

	}

	/**
	* Init Elementor
	* @since 1.0.0
	*/
	public function init_elementor() {

	}

	/**
	* Init Widgets
	*
	* Include widgets files and register them.
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function init_widgets() {

	}

	/**
	* Init Controls
	*
	* Include controls files and register them.
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function init_controls() {

		\Elementor\Plugin::$instance->controls_manager->add_group_control( \Suprementor\Group_Controls\Get_Post::get_type(), new \Suprementor\Group_Controls\Get_Post() );
		\Elementor\Plugin::$instance->controls_manager->add_group_control( \Suprementor\Group_Controls\Get_Posts::get_type(), new \Suprementor\Group_Controls\Get_Posts() );

	}

	/**
	* Init Control Tabs
	*
	* Include tabs for our controls.
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function init_control_tabs() {

		\Elementor\Controls_Manager::add_tab(
			'TAB_SUPREMENTOR',
			__( 'Supreme Elementor', 'suprementor' )
		);

	}

	/**
	* Init Widget Categories
	*
	* Include categories for custom widgets.
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function init_widget_categories($elements_manager) {

		$elements_manager->add_category(
			'supreme_elementor',
			[
				'title' => __( 'Supreme Elementor', 'suprementor' ),
				'icon' => 'fa fa-plug',
			]
		);

	}

	/**
	* Scripts
	*
	* Include css and js scripts.
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function scripts() {

		wp_enqueue_style( 'suprementor', plugins_url( '/assets/suprementor.css', __FILE__ ), array(), self::VERSION );
		wp_enqueue_style( 'suprementor-uikit', plugins_url( '/assets/suprementor-uikit.css', __FILE__ ), array(), self::VERSION );
		wp_enqueue_script( 'suprementor-uikit', plugins_url( '/assets/suprementor-uikit.js', __FILE__ ), array(), self::VERSION );
		wp_enqueue_script( 'suprementor-uikit-icons', plugins_url( '/assets/suprementor-uikit-icons.js', __FILE__ ), array(), self::VERSION );

	}

	/**
	* Admin notice
	*
	* Warning when the site doesn't have Elementor installed or activated.
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'suprementor' ),
			'<strong>' . esc_html__( 'Supreme Elementor', 'suprementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'suprementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-error is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	* Admin notice
	*
	* Warning when the site doesn't have a minimum required Elementor version.
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'suprementor' ),
			'<strong>' . esc_html__( 'Supreme Elementor', 'suprementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'suprementor' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-error is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	* Admin notice
	*
	* Warning when the site doesn't have a minimum required PHP version.
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'suprementor' ),
			'<strong>' . esc_html__( 'Supreme Elementor', 'suprementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'suprementor' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-error is-dismissible"><p>%1$s</p></div>', $message );

	}

}

\Suprementor\Instance::instance();
