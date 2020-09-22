<?php
/**
 * Neuron Elementor
 * 
 * Page Builder included directly
 * to the theme with custom elements.
 */

namespace NeuronElementor;	

defined( 'ABSPATH' ) || die();

// Notice if the Elementor is not active
if (!did_action('elementor/loaded')) {
	return;
}

use Elementor\Plugin as Elementor;
use Elementor\Controls_Manager as Controls_Manager;
use NeuronElementor\Widgets as Widgets;

/**
 * Plugin class.
 *
 * @since 1.0.0
 */
final class Plugin {
	/**
	 * Plugin instance.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Plugin
	 */
	public static $instance;

	/**
	 * Modules.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var object
	 */
	public $modules = [];

	/**
	 * The plugin name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $plugin_name;

	/**
	 * The plugin version number.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $plugin_version;

	/**
	 * The minimum Elementor version number required.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $minimum_elementor_version = '2.0.0';

	/**
	 * The plugin directory.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $plugin_path;

	/**
	 * The plugin URL.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $plugin_url;

	/**
	 * The plugin assets URL.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $plugin_assets_url;

	/**
	 * Ensures only one instance of the plugin class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function __construct() {
		// Actions
		add_action('plugins_loaded', [$this, 'check_elementor_version']);
		add_action('init', [$this, 'i18n']);

		// Filters
		add_filter('elementor/fonts/groups', [$this, 'neuron_elementor_group']);
		add_filter('elementor/fonts/additional_fonts', [$this, 'neuron_custom_fonts']);
	}

	/**
	 * Load plugin textdomain.
	 *
	 * @since 1.0.0
	 */
	public function i18n() {
		load_plugin_textdomain('neuron-core', false, plugin_dir_path(NEURON_FILE) . 'languages');
	}

	/**
	 * Checks Elementor version compatibility.
	 *
	 * First checks if Elementor is installed and active,
	 * then checks Elementor version compatibility.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function check_elementor_version() {
		spl_autoload_register( [ $this, 'autoload' ] );

		$this->add_hooks();
	}

	/**
	 * Autoload classes based on namespace.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string $class Name of class.
	 */
	public function autoload( $class ) {

		// Return if NeuronElementor name space is not set.
		if ( false === strpos( $class, __NAMESPACE__ ) ) {
			return;
		}

		/**
		 * Prepare filename.
		 *
		 * @todo Refactor to use preg_replace.
		 */
		$filename = str_replace( __NAMESPACE__ . '\\', '', $class );
		$filename = str_replace( '\\', DIRECTORY_SEPARATOR, $filename );
		$filename = str_replace( '_', '-', $filename );
		$filename = dirname( __FILE__ ) . '/' . strtolower( $filename ) . '.php';

		// Return if file is not found.
		if ( ! is_readable( $filename ) ) {
			return;
		}

		include $filename;
	}

	/**
	 * Adds required hooks.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function add_hooks() {
		add_action('elementor/init', [ $this, 'init' ], 0);

		add_action('elementor/widgets/widgets_registered', [$this, 'neuron_register_widgets']);

		add_action('elementor/element/after_section_end', [$this, 'neuron_fixed_options'], 10, 3);

		add_action('elementor/widgets/widgets_registered', [$this, 'neuron_unregister_wordpress_widgets'], 10, 3);

		add_action('elementor/controls/animations/additional_animations', [$this, 'neuron_extra_animations']);

		add_action('elementor/editor/after_enqueue_styles', function() {
			wp_enqueue_style('neuron-elementor-style', plugin_dir_url(__FILE__) . '../assets/styles/elementor.css', false, NEURON_CORE_VERSION, null);
		});

		add_action('elementor/frontend/before_enqueue_scripts', function() {
			wp_enqueue_script(
				'neuron-frontend-script',
				plugin_dir_url(__FILE__) . '../assets/scripts/frontend.js',
				[
					'elementor-frontend', 
				],
				NEURON_CORE_VERSION,
				true // in_footer
			);
		});

		add_action('elementor/theme/register_locations', [$this, 'neuron_register_elementor_locations']);
	}

	public function neuron_register_widgets() {
		$this->includes();
		$this->register_widget();
	}

	public function neuron_elementor_group($font_groups) {
		$new_group['neuron_custom_fonts'] = __('Custom Fonts', 'neuron-core');
		$font_groups = $new_group + $font_groups;

		return $font_groups;
	}

	public function neuron_custom_fonts($fonts) {

		$custom_fonts = neuron_custom_fonts();
		
		if (!empty($custom_fonts)) {
			foreach ($custom_fonts as $font) {
				$fonts[$font['label']] = 'neuron_custom_fonts';
			}
		}

		return $fonts;
	}

	/**
	 * Add support elementor theme locations.
	 */
	public function neuron_register_elementor_locations($elementor_theme_manager) {
		$elementor_theme_manager->register_location('header');
		$elementor_theme_manager->register_location('footer');
	}

	/**
	 * Fixed Options
	 * 
	 * Add fixed option to the section,
	 * it can be used for header builder.
	 */
	public function neuron_fixed_options($section, $section_id, $args) {

		static $style_sections = [ 'section_background'];

		if (!in_array($section_id, $style_sections)) { return; }

		 $section->start_controls_section(
			'section_fixed_tab',
			[
				'label' => __('Fixed', 'neuron-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		include(__DIR__ . '/settings/fixed-section.php');
		
		$section->end_controls_section();
	}

	/**
	 * Extra Animations
	 */
	public function neuron_extra_animations() {
		return [
			'Zooming' => [
				'zoomIn' => 'Zoom In',
				'zoomInDown' => 'Zoom In Down',
				'zoomInLeft' => 'Zoom In Left',
				'zoomInRight' => 'Zoom In Right',
				'zoomInUp' => 'Zoom In Up',
				'h-zoomOutNeuron' => 'Zoom Out'
			]
		];
	}

	/**
	 * Unregister WP Widgets
	 */
	public function neuron_unregister_wordpress_widgets($widgetManager) {
		$widgetManager->unregister_widget_type('wp-widget-pages');
		$widgetManager->unregister_widget_type('wp-widget-calendar');
		$widgetManager->unregister_widget_type('wp-widget-media_audio');
		$widgetManager->unregister_widget_type('wp-widget-media_image');
		$widgetManager->unregister_widget_type('wp-widget-media_gallery');
		$widgetManager->unregister_widget_type('wp-widget-media_video');
		$widgetManager->unregister_widget_type('wp-widget-rss');
		$widgetManager->unregister_widget_type('wp-widget-recent-comments');
		$widgetManager->unregister_widget_type('wp-widget-tag_cloud');
		$widgetManager->unregister_widget_type('wp-widget-search');
		$widgetManager->unregister_widget_type('wp-widget-categories');
		$widgetManager->unregister_widget_type('wp-widget-text');
		$widgetManager->unregister_widget_type('wp-widget-meta');
		$widgetManager->unregister_widget_type('wp-widget-archives');
		$widgetManager->unregister_widget_type('wp-widget-recent-posts');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_product_search');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_price_filter');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_layered_nav');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_layered_nav_filters');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_widget_cart');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_product_categories');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_product_tag_cloud');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_recently_viewed_products');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_recent_reviews');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_top_rated_products');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_rating_filter');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_products');
		$widgetManager->unregister_widget_type('wp-widget-rev-slider-widget');
		$widgetManager->unregister_widget_type('wp-widget-custom_html');
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		// Core
		require __DIR__ . '/widgets/posts/base.php';
		require __DIR__ . '/widgets/media-gallery/base.php';
		require __DIR__ . '/widgets/progress-bar/base.php';
		require __DIR__ . '/widgets/typed-heading/base.php';
		require __DIR__ . '/widgets/countdown/base.php';
		require __DIR__ . '/widgets/testimonial-carousel/base.php';
		require __DIR__ . '/widgets/template/base.php';
		require __DIR__ . '/widgets/animated-heading/base.php';
		// require __DIR__ . '/widgets/multi-scroll/base.php';
		require __DIR__ . '/widgets/price-list/base.php';
		require __DIR__ . '/widgets/instagram/base.php';
		require __DIR__ . '/widgets/advanced-google-maps/base.php';
		require __DIR__ . '/widgets/interactive-posts/base.php';

		// Site
		require __DIR__ . '/widgets/site/site-logo.php';
		require __DIR__ . '/widgets/site/site-title.php';
		require __DIR__ . '/widgets/site/nav-menu.php';
		require __DIR__ . '/widgets/site/search-form.php';
		require __DIR__ . '/widgets/site/menu-cart.php';
		require __DIR__ . '/widgets/site/hamburger.php';
	}
	
	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		// Core
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronPosts());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronMediaGallery());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronProgressBar());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronInstagram());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronInteractivePosts());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronTypedHeading());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronCountdown());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronTestimonialCarousel());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronTemplate());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronAnimatedHeading());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronMultiScroll());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronPriceList());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronAdvancedGoogleMaps());

		// Site
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronSiteLogo());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronSiteTitle());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronNavMenu());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronSearchForm());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronMenuCart());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NeuronHamburger());
	}

	/**
	 * Register modules.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_modules() {
		if (!class_exists('ElementorPro\Plugin')) {
			new Core\Library\Module();
		}
	}

	/**
	 * Adds actions after Elementor init.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {

		// Register modules.
		$this->register_modules();

		/**
		 * Elementor Container Width
		 */
		if (!get_option('elementor_container_width')) {
			update_option('elementor_container_width', '1350');
		}

		// Add this category, after basic category.
		Elementor::$instance->elements_manager->add_category(
			'neuron-category',
			[
				'title' => __('Neuron Elements', 'neuron-core'),
				'icon'  => 'fa fa-plug',
			],
			1
		);

		Elementor::$instance->elements_manager->add_category(
			'neuron-site-category',
			[
				'title' => __('Neuron Site', 'neuron-core'),
				'icon'  => 'fa fa-plug',
			],
			2
		);

		do_action('NeuronElementor/init');
	}
}

/**
 * Returns the Plugin application instance.
 *
 * @since 1.0.0
 *
 * @return Plugin
 */
function NeuronElementor() {
	return Plugin::get_instance();
}

/**
 * Initializes the Plugin application.
 *
 * @since 1.0.0
 */
NeuronElementor();
