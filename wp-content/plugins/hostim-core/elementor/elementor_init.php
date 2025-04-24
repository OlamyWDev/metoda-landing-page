<?php

namespace HOSTIM_ELEMENTOR;
use Elementor\{Plugin,
	Controls_Manager,
	Group_Control_Typography,
	Repeater,
	Utils
};


define( 'TT_ELEMENTOR_ADDONS_URL', plugins_url( '/', __FILE__ ) );
define( 'TT_ELEMENTOR_ADDONS_PATH', plugin_dir_path( __FILE__ ) );
define( 'TT_ELEMENTOR_ADDONS_FILE', __FILE__ );


//define version
define('HOSTIM_ADDONS_VERSION_', '3.1.5');

// define render css
define('HOSTIM_ADDONS_CSS_RENDER_', true);

// define minify render css
define('HOSTIM_ADDONS_CSS_RENDER_MINIFY', false);

// render icon from css files
define('HOSTIM_ADDONS_ICON_RENDER', false);


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Hostim_Shortcode {
	/**
	 * Holds the class object.
	 *
	 * @since 1.0
	 *
	 */
	public static $_instance;

	/**
	 * Localize data array
	 *
	 * @var array
	 */
	public $localize_data = array();

	/**
	 * Directory Path
	 *
	 * @var string
	 */
	public $dir_path = '';

	/**
	 * Load Construct
	 *
	 * @since 1.0
	 */

	public function __construct() {

		$this->dir_path = plugin_dir_path( __FILE__ );
		add_action( 'plugins_loaded', [ $this, 'elementor_setup' ] );

		add_action( 'elementor/init', [ $this, 'hostim_elementor_init' ] );
		add_action( 'elementor/frontend/before_enqueue_scripts', [ $this, 'before_enqueue_scripts' ] );
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'after_register_scripts' ] );

		// Elementor Preview
		add_action('elementor/editor/before_enqueue_scripts', [ $this, 'elementor_preview_mode' ] );

	}

	public function elementor_preview_mode() {
		wp_enqueue_style( 'hostim-elementor-preview', HOSTIM_PLUGIN_ASSETS_URL . 'css/elementor-preview.css' );
	}

	public function after_register_scripts() {
		wp_register_script( 'isotop', HOSTIM_SCRIPTS . '/isotop.pkgd.min.js', array( 'jquery' ), HOSTIM_CORE_VERSION, true );
		wp_register_script( 'waypoints', HOSTIM_SCRIPTS . '/waypoints.js', array( 'jquery' ), HOSTIM_CORE_VERSION, true );
		wp_register_script( 'countUp', HOSTIM_SCRIPTS . '/countUp.min.js', array( 'jquery' ), HOSTIM_CORE_VERSION, true );
		wp_register_script( 'appear-js', HOSTIM_SCRIPTS . '/jquery.appear.js', array( 'jquery' ), HOSTIM_CORE_VERSION, true );
		wp_register_script( 'countTo', HOSTIM_SCRIPTS . '/jquery.countTo.js', array( 'jquery' ), HOSTIM_CORE_VERSION, true );
		wp_register_script( 'parallax-scroll', HOSTIM_SCRIPTS . '/jquery.parallax-scroll.js', array( 'jquery' ), HOSTIM_CORE_VERSION, true );
		wp_register_script( 'parallax', HOSTIM_SCRIPTS . '/parallax.min.js', array( 'jquery' ), HOSTIM_CORE_VERSION, true );
		wp_register_script( 'jquery-parallax', HOSTIM_SCRIPTS . '/jquery.parallax.min.js', array( 'jquery' ), HOSTIM_CORE_VERSION, true );
		wp_register_script( 'jquery-parallax', HOSTIM_SCRIPTS . '/jquery.parallax.min.js', array( 'jquery' ), HOSTIM_CORE_VERSION, true );
		wp_enqueue_script('swiper', HOSTIM_SCRIPTS . '/swiper-bundle.min.js', array(),  HOSTIM_CORE_VERSION, true);
		wp_register_script( 'countdown', HOSTIM_SCRIPTS . '/countdown.min.js', array( 'jquery' ), HOSTIM_CORE_VERSION, true );
	}

	/**
	 * Enqueue Scripts
	 *
	 * @return void
	 */

	public function before_enqueue_scripts() {
		wp_enqueue_script( 'hostim-elementor', HOSTIM_SCRIPTS . '/elementor.js', array(
			'jquery',
			'elementor-frontend'
		), HOSTIM_CORE_VERSION, true );

		wp_localize_script('hostim-elementor', 'translate', array(
			'searching' 	=> __('Searching...', 'hostim-core'),
			'enterDomain' 	=> __('Please enter a domain name', 'hostim-core'),
		));
	}

	/**
	 * Elementor Initialization
	 *
	 * @since 1.0
	 *
	 */

	public function hostim_elementor_init() {
		\Elementor\Plugin::$instance->elements_manager->add_category(
		'hostim-elements', [
				'title' => esc_html__( 'Hostim Elements', 'hostim-core' ),
				'icon'  => 'fa fa-plug',
			]
		);
	}

	/**
	 * Installs default variables and checks if Elementor is installed
	 *
	 * @return void
	 */
	public function elementor_setup() {
		/**
		 * Check if Elementor installed and activated
		 * @see https://developers.elementor.com/creating-an-extension-for-elementor/
		 */
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}

		// Include Modules files
		$this->includes();

		$this->init_addons();
	}

	/**
	 * Load required core files.
	 */
	public function includes() {
		$this->init_helper_files();
	}

	/**
	 * Require initial necessary files
	 */
	public function init_helper_files() {
		require_once $this->dir_path . 'includes/icon_settings.php';

		include_once $this->dir_path .'modules/templates/api.php';
		include_once $this->dir_path .'modules/templates/import.php';
		include_once $this->dir_path .'modules/templates/init.php';
		include_once $this->dir_path .'modules/templates/load.php';

		\HOSTIM_ELEMENTOR\Templates\DL_Import::instance()->load();
		\HOSTIM_ELEMENTOR\Templates\Dl_Load::instance()->load();
		\HOSTIM_ELEMENTOR\Templates\DL_Templates::instance()->init();

	}

	/**
	 * Load required file for addons integration
	 */
	public function init_addons() {
		add_action( 'elementor/widgets/register', [ $this, 'widgets_area' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'controls_area' ] );


		$this->init_modules_files();
	}


	/**
	 * Register widgets by file name
	 */
	public function register_widgets_addon( $file_name ) {
		$widget_manager = Plugin::instance()->widgets_manager;

		$base  = basename( str_replace( '.php', '', $file_name ) );
		$class = ucwords( str_replace( '-', ' ', $base ) );
		$class = str_replace( ' ', '_', $class );
		$class = sprintf( 'Hostim\Widgets\%s', $class ); // Ultraland\Widgets\abc;


		// Class File
		require_once $file_name;

		if ( class_exists( $class ) ) {
			$widget_manager->register( new $class );
		}
	}

	/**
	 * Load widgets require function
	 */
	public function widgets_area() {
		$this->widgets_register();
	}

	/**
	 * Requires widgets files
	 */
	private function widgets_register() {
		foreach ( glob( $this->dir_path . 'widgets/' . '*.php' ) as $file ) {
			$this->register_widgets_addon( $file );
		}
	}

	/**
	 * Load controls require function
	 */
	public function controls_area() {
		$this->controls_register();
	}

	/**
	 * Requires controls files
	 */
	private function controls_register() {
		foreach ( glob( $this->dir_path . 'controls/' . '*.php' ) as $file ) {
			$this->register_controls_addon( $file );
		}
	}

	/**
	 * Register addon by file name.
	 */
	public function register_controls_addon( $file_name ) {
		$controls_manager = Plugin::$instance->controls_manager;

		$base  = basename( str_replace( '.php', '', $file_name ) );
		$class = ucwords( str_replace( '-', ' ', $base ) );
		$class = str_replace( ' ', '_', $class );
		$class = sprintf( 'Hostim\Controls\%s', $class );

		// Class Constructor File
		require_once $file_name;

		if ( class_exists( $class ) ) {
			$name_class = new $class();
			$controls_manager->register( new $class );
		}
	}

	/**
	 * Require initial necessary files
	 */
	public function init_modules_files() {
		foreach ( glob( $this->dir_path . 'section/' . '*.php' ) as $file ) {
			$this->register_modules_addon( $file );
		}
	}

	/**
	 * Register addon by file name
	 */
	public function register_modules_addon( $file_name ) {
		$base  = basename( str_replace( '.php', '', $file_name ) );
		$class = ucwords( str_replace( '-', ' ', $base ) );
		$class = str_replace( ' ', '_', $class );
		$class = sprintf( 'Hostim\Section\%s', $class );

		// Class File
		require_once $file_name;

		if ( class_exists( $class ) ) {
			new $class();
		}
	}

	public static function hostim_get_instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new Hostim_Shortcode();
		}

		return self::$_instance;
	}
}

$hostim_shortcode = Hostim_Shortcode::hostim_get_instance();