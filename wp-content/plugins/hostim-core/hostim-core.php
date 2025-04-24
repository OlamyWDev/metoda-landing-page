<?php
/**
 * Plugin Name: Hostim Core
 * Plugin URI: https://themeforest.net/user/themetags/portfolio
 * Description: This plugin adds the core features to the Hostim WordPress theme. You must have to install this plugin to get all the features included with the theme.
 * Version: 4.3.0
 * Author: ThemeTags
 * Author URI: https://themeforest.net/user/themetags/portfolio
 * Text domain: hostim-core
 */

if (!defined('ABSPATH'))
	die('-1');

/**
 * Currently plugin version.
 * Start at version 2.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('HOSTIM_CORE_VERSION', '4.3.0');

/**
 * Constant for the plugins
 */
define('HOSTIM_PLUGIN_URL', plugins_url() . '/hostim-core/');
define('HOSTIM_PLUGIN_ASSETS_URL', plugins_url() . '/hostim-core/assets/');
define('HOSTIM_CORE_DIR', plugin_dir_path( __FILE__ ));
define('HOSTIM_SCRIPTS', HOSTIM_PLUGIN_URL . 'assets/js' );


// Make sure the same class is not loaded twice in free/premium versions.
if (!class_exists('Hostim_Core')) {
	/**
	 * Main Hostim Core Class
	 *
	 * The main class that initiates and runs the Hostim Core plugin.
	 *
	 * @since 1.0.0
	 */
	final class Hostim_Core {
		/**
		 * Hostim Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.0.0
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0';

		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.0.0
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '3.3.0';

		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 2.0.0
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.6';

		/**
		 * Instance
		 *
		 * Holds a single instance of the `Hostim_Core` class.
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Hostim_Core A single instance of the class.
		 */
		private static $_instance = null;

		/**
		 * The loader that's responsible for maintaining and registering all hooks that power
		 * the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      Hostim_Core    $loader    Maintains and registers all hooks for the plugin.
		 */
		protected $loader;

		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @return Hostim_Core An instance of the class.
		 * @since 1.0.0
		 *
		 * @access public
		 * @static
		 *
		 */
		public static function instance() {
			if (is_null(self::$_instance)) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @return void
		 * @since 1.0.0
		 *
		 * @access protected
		 *
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong(__FUNCTION__, esc_html__('Cheatin&#8217; huh?', 'hostim-core'), '2.0.0');
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @return void
		 * @since 1.0.0
		 *
		 * @access protected
		 *
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong(__FUNCTION__, esc_html__('Cheatin&#8217; huh?', 'hostim-core'), '2.0.0');
		}

		/**
		 * Constructor
		 *
		 * Initialize the Hostim Core plugins.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->core_includes();
			$this->init_hooks();
			do_action('hostim_core_loaded');
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function core_includes()	{
			// Extra
			require_once __DIR__ . '/inc/mailchimp.php';
			require_once __DIR__ . '/inc/extra.php';

            // Custom Post type
			require_once __DIR__ . '/inc/post-type/service/init.php';
			require_once __DIR__ . '/inc/post-type/Jobs.php';
			require_once __DIR__ . '/inc/post-type/mega-menu.php';
			require_once __DIR__ . '/inc/post-type/footer.php';

			require_once __DIR__ . '/inc/domain.php';

			//Elementor Widgets
			require_once __DIR__ . '/elementor/elementor_init.php';

			// Elementor custom field icons
			require_once __DIR__ . '/elementor/fields/icons.php';
			require_once __DIR__ . '/inc/class-hostim-helper.php';

            // Register Plugins Helper Functions
            require_once __DIR__ . '/inc/classes/class-plugin-helper.php';


			// Sidebar Widgets
			require_once __DIR__ . '/wp-widgets/widgets.php';
		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 */
		private function init_hooks() {
			add_action('init', [$this, 'i18n']);
			add_action('plugins_loaded', [$this, 'init']);
			add_action( 'init', [ $this, 'hostim_gutenberg_block_init' ] );
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain('hostim-core', false, plugin_basename(dirname(__FILE__)) . '/languages');
		}

		/**
		 * Init Hostim Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 2.0.0 The logic moved from a standalone function to this class method.
		 *
		 * @access public
		 */
		public function init() {

			if (!did_action('elementor/loaded')) {
				add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
				return;
			}

			// Check for required Elementor version
			if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
				add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
				return;
			}

			// Check for required PHP version
			if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
				add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
				return;
			}

			// Register Widget Scripts
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'wp_enqueue_scripts', [ $this, 'hostim_enqueue_style' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'wp_enqueue_scripts', [ $this, 'hostim_dequeue' ], 100 );
			add_action( 'enqueue_block_editor_assets', [ $this, 'hostim_block_editor_assets' ] );
			add_action( 'admin_enqueue_scripts', [ $this, 'hostim_admin_enqueue_scripts' ] );

            //Register WPML Elementor Widgets
            add_filter( 'wpml_elementor_widgets_to_translate', [ $this, 'hostim_core_wpml_widgets_to_translate_filter' ] );

		}

        /**
         * Integrate WPML
         */
        public function hostim_core_wpml_widgets_to_translate_filter( $widgets ) {
            require_once __DIR__ . '/wpml/WPML_Fields.php';
            return $widgets;
        }


		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 2.0.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: Hostim Core: Elementor */
				esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'hostim-core'),
				'<strong>' . esc_html__('Hostim Core', 'hostim-core') . '</strong>',
				'<strong>' . esc_html__('Elementor', 'hostim-core') . '</strong>'
			);
			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 2.0.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			$message = sprintf(
			/* translators: 1: Hostim Core: Elementor 3: Required Elementor version */
				esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'hostim-core'),
				'<strong>' . esc_html__('Hostim Core', 'hostim-core') . '</strong>',
				'<strong>' . esc_html__('Elementor', 'hostim-core') . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 2.0.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {
			$message = sprintf(
			/* translators: 1: Hostim Core 2: PHP 3: Required PHP version */
				esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'hostim-core'),
				'<strong>' . esc_html__('Hostim Elements', 'hostim-core') . '</strong>',
				'<strong>' . esc_html__('PHP', 'hostim-core') . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}

		public function hostim_enqueue_style() {
			wp_enqueue_style('bootstrap-slider', plugins_url('assets/css/bootstrap-slider.css', __FILE__));

            //Custom CSS
            wp_enqueue_style('hostim-override-elementor', plugins_url('assets/css/override-elementor.css', __FILE__));
            wp_enqueue_style('hostim-core', plugins_url('assets/css/custom.css', __FILE__), '', HOSTIM_CORE_VERSION );

			wp_enqueue_script( 'like-it', trailingslashit( plugin_dir_url( __FILE__ ) ).'assets/js/custom.js', array('jquery'), '1.0', true );

			wp_localize_script( 'like-it', 'likeit', array(
				'ajax_url' => admin_url( 'admin-ajax.php' )
			));
		}

		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Hostim Core.
		 *
		 * @since 2.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */

		public function enqueue_widget_styles()	{
			wp_enqueue_style('feather', plugins_url('assets/vendors/feather/css/feather.css', __FILE__));
		}

		public function hostim_admin_enqueue_scripts() {
			wp_enqueue_style('hostim-gutenberg-block-editor', plugins_url('assets/css/editor.css', __FILE__));
		}


		/**
		 * Dequeue the Elementor Animation CSS.
		 *
		 * Hooked to the wp_print_scripts action, with a late priority (100),
		 * so that it is after the script was enqueued.
		 */

		function hostim_dequeue() {
			add_action('wp_footer', [ $this, 'remove_elementor_animations_css' ]);
		}

		function remove_elementor_animations_css() {
			wp_dequeue_style('e-animations');
			wp_deregister_style('e-animations');
		}

		public function hostim_block_editor_assets() {
			wp_enqueue_script (
				'hostim-gutenberg-editor-script',
				plugins_url('build/index.js', __FILE__),
				[
					'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-polyfill', 'wp-server-side-render'
				]
			);
		}

		/*
		 * Gutenberg Block Register
		 */
		public function hostim_gutenberg_block_init() {
			register_block_type(
				'hostim-block/newsletter-widget',
				[
					'render_callback' => [ $this, 'render_newsletter' ],
					'attributes'      => [
						'btn_text'       => [
							'default' => __('Subscribe', 'hostim-core'),
							'type'    => 'string',
						],
						'content'       => [
							'default' => __('Subscribe to our newsletter to receive early discount offers.', 'hostim-core'),
							'type'    => 'string',
						],
					],
				]
			);
		}

		public function render_newsletter( $attributes ) {
			ob_start(); ?>
			<div class="wp-widget-block-newsletter">
				<p class="description"><?php echo $attributes['content'] ?></p>

				<form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" class="footer-newsletter-form widget-newsletter" data-hostim-form="newsletter-subscribe">
					<input type="hidden" name="action" value="hostim_mailchimp_subscribe">

					<div class="newsletter-inner d-flex">
						<input type="email" name="email" class="form-control" id="newsletter-form-email" placeholder="<?php echo esc_attr__( 'Email', 'hostim-core' ); ?>" required>
						<button type="submit" name="submit" id="newsletter-submit" class="newsletter-submit hostim-btn">
							<?php echo esc_html($attributes['btn_text']); ?>
							<i class="fa fa-circle-o-notch fa-spin"></i>
						</button>
					</div>

					<div class="form-result alert">
						<div class="content"></div>
					</div><!-- /.form-result-->
				</form><!-- /.newsletter-form -->
				</div>
			<!-- /.wp-widget-block-newsletter -->
			<?php
			return ob_get_clean();
		}
	}
}
// Make sure the same function is not loaded twice in free/premium versions.

if (!function_exists('hostim_core_load')) {
	/**
	 * Load Hostim Core
	 *
	 * Main instance of Hostim_Core.
	 *
	 * @since 1.0.0
	 * @since 2.0.0 The logic moved from this function to a class method.
	 */
	function hostim_core_load()	{
		return Hostim_Core::instance();
	}

	// Run Hostim Core
	hostim_core_load();
}
