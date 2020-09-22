<?php
/**
 * Theme Functions
 *
 * @package Bifrost
 * @author NeuronThemes
 * @link http://neuronthemes.com
 */

/**
 * Global Variables
 * 
 * Defining global variables to make
 * usage easier.
 */
define('BIFROST_THEME_DIR', get_template_directory());
define('BIFROST_THEME_URI', get_template_directory_uri());
define('BIFROST_THEME_STYLESHEET', get_stylesheet_uri());
define('BIFROST_THEME_PLACEHOLDER', get_template_directory_uri() . '/assets/images/placeholder.png');
define('BIFROST_THEME_NAME', 'bifrost');
define('BIFROST_THEME_VERSION', wp_get_theme()->get('Version'));

/**
 * Content Width
 * 
 * Maximum content width is set at 1920,
 * larger images or videos will be cropped
 * to that resolution.
 */
!isset($content_width) ? $content_width = 1920 : '';

/**
 * Text Domain
 * 
 * Makes theme available for translation,
 * translations can be found in the /languages/ directory.
 */
load_theme_textdomain('bifrost', BIFROST_THEME_DIR . '/languages');

// Action to call init
add_action('after_setup_theme', 'bifrost_init');

/**
 * Init
 * 
 * Global function which adds theme support,
 * register nav menus and call actions for
 * different php, js and css files.
 */
function bifrost_init() {
    /**
	 * Theme Support
	 */
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');

	/**
	 * WooCommerce Theme Support
	 * 
	 * Theme fully supports plugin WooCommerce
	 * also it's features in single product
	 * as zoom, lightbox and slider.
	 */
	if (class_exists('WooCommerce')) {
		add_theme_support('woocommerce');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
		add_filter('woocommerce_enable_setup_wizard', false);
	}

	// Image Sizes
	$bifrost_general_image_sizes = get_theme_mod('general_image_sizes');
	if ($bifrost_general_image_sizes) {
		$index = 1;
		foreach ($bifrost_general_image_sizes as $image_size) {
			add_image_size('bifrost_image_size_' . $index, isset($image_size['image_size_width']) ? $image_size['image_size_width'] : '', isset($image_size['image_size_height']) ? $image_size['image_size_height'] : 9999, true);
			$index++;
		}
	}

	// Include custom files
	include(BIFROST_THEME_DIR . '/includes/functions/neuron-functions.php');
    include(BIFROST_THEME_DIR . '/includes/functions/style-functions.php');
	include(BIFROST_THEME_DIR . '/includes/admin/extra.php');
	include_once(BIFROST_THEME_DIR . '/includes/tgm/class-tgm-plugin-activation.php');
	include_once(BIFROST_THEME_DIR . '/includes/admin/acf/acf-fields.php');
	get_theme_mod('custom_fields_panel', '2') == '2' ? define('ACF_LITE' , true) : '';

    // Theme Actions 
    add_action('tgmpa_register', 'bifrost_plugins');
    add_action('wp_enqueue_scripts', 'bifrost_external_css');
    add_action('wp_enqueue_scripts', 'bifrost_external_js');
    add_action('admin_enqueue_scripts', 'bifrost_add_extra_scripts');
	add_action('widgets_init', 'bifrost_widgets_init');

	/**
	 * Merlin WP
	 */
	require_once(get_parent_theme_file_path( '/includes/merlin/vendor/autoload.php' ));
	require_once(get_parent_theme_file_path( '/includes/merlin/class-merlin.php' ));
	require_once(get_parent_theme_file_path( '/includes/merlin/merlin-config.php' ));

	// Theme Filters
	add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
	
    // Register Menus
	register_nav_menus(
		array(
			'main-menu' => esc_html__('Main Menu', 'bifrost')
		)
	);
}

/**
 * TGMPA
 * 
 * An addon which helps theme to install
 * and activate different plugins.
 */
function bifrost_plugins() {
    $plugins = array(
        array(
            'name'      => esc_html__('Advanced Custom Fields', 'bifrost'),
            'slug'      => 'advanced-custom-fields',
            'required'  => true
        ),
        array(
			'name'      => esc_html__('Elementor', 'bifrost'),
            'slug'      => 'elementor',
            'required'  => true
        ),
        array(
			'name'        => esc_html__('Neuron Core', 'bifrost'),
            'slug'        => 'neuron-core-bifrost',
			'source'      => BIFROST_THEME_DIR . '/includes/plugins/neuron-core-bifrost.zip',
		    'required'    => true
		),
		array(
            'name'      => esc_html__('Revolution Slider', 'bifrost'),
			'slug'      => 'revslider',
			'source'    => BIFROST_THEME_DIR . '/includes/plugins/revslider.zip',
            'required'  => false
        ),
        array(
            'name'      => esc_html__('WooCommerce', 'bifrost'),
            'slug'      => 'woocommerce',
            'required'  => false
        ),
        array(
            'name'       => esc_html__('One Click Demo Import', 'bifrost'),
            'slug'       => 'one-click-demo-import',
            'required'   => false
		),
        array(
            'name'       => esc_html__('Contact Form 7', 'bifrost'),
            'slug'       => 'contact-form-7',
            'required'   => false
		),
    );
    $config = array(
        'id'           => 'tgmpa',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => ''
    );
    tgmpa($plugins, $config);
}

// External CSS
function bifrost_external_css() {
    wp_enqueue_style('bifrost-main-style', BIFROST_THEME_URI . '/assets/styles/bifrost.css', false, BIFROST_THEME_VERSION, null);
    wp_enqueue_style('magnific-popup', BIFROST_THEME_URI . '/assets/styles/magnific-popup.css', false, BIFROST_THEME_VERSION, null);
    wp_enqueue_style('owl-carousel', BIFROST_THEME_URI . '/assets/styles/owl.carousel.min.css', false, BIFROST_THEME_VERSION, null);
	wp_enqueue_style('bifrost-wp-style', BIFROST_THEME_STYLESHEET);
	wp_enqueue_style('bifrost-fonts', bifrost_fonts_url(), array(), BIFROST_THEME_VERSION);
	
	// Custom Style and Fonts
	wp_add_inline_style('bifrost-wp-style', bifrost_custom_style());
}

// External Javascript
function bifrost_external_js() {
	if (!is_admin()) {
		wp_enqueue_script('isotope', BIFROST_THEME_URI . '/assets/scripts/isotope.pkgd.min.js', array('jquery'), BIFROST_THEME_VERSION, TRUE);
		wp_enqueue_script('packery-mode', BIFROST_THEME_URI . '/assets/scripts/packery-mode.pkgd.min.js', array('jquery'), BIFROST_THEME_VERSION, TRUE);
		wp_enqueue_script('magnific-popup', BIFROST_THEME_URI . '/assets/scripts/jquery.magnific-popup.min.js', array('jquery'), BIFROST_THEME_VERSION, TRUE);
		wp_enqueue_script('owl-carousel', BIFROST_THEME_URI . '/assets/scripts/owl.carousel.min.js', array('jquery'), BIFROST_THEME_VERSION, TRUE);
		wp_enqueue_script('typed', BIFROST_THEME_URI . '/assets/scripts/typed.min.js', array('jquery'), BIFROST_THEME_VERSION, TRUE);
		wp_enqueue_script('wow', BIFROST_THEME_URI . '/assets/scripts/wow.min.js', array('jquery'), BIFROST_THEME_VERSION, TRUE);
		wp_enqueue_script('theia-sticky-sidebar', BIFROST_THEME_URI . '/assets/scripts/theia-sticky-sidebar.js', array('jquery'), BIFROST_THEME_VERSION, TRUE);
		wp_enqueue_script('headroom', BIFROST_THEME_URI . '/assets/scripts/headroom.js', array('jquery'), BIFROST_THEME_VERSION, TRUE);
		wp_enqueue_script('headroom-zepto', BIFROST_THEME_URI . '/assets/scripts/jQuery.headroom.js', array('jquery'), BIFROST_THEME_VERSION, TRUE);
		wp_enqueue_script('bifrost-scripts', BIFROST_THEME_URI . '/assets/scripts/bifrost.js', array('jquery'), BIFROST_THEME_VERSION, TRUE);

        is_singular() ? wp_enqueue_script('comment-reply') : '';
	}
}

// Enqueue Extra Scripts
function bifrost_add_extra_scripts() {
	wp_enqueue_style('bifrost-admin-style', BIFROST_THEME_URI . '/includes/admin/style.css', false, BIFROST_THEME_VERSION, null);
	wp_enqueue_script('bifrost-admin-script', BIFROST_THEME_URI . '/includes/admin/script.js', array('jquery'), BIFROST_THEME_VERSION, TRUE);
}

// Init Widgets
function bifrost_widgets_init() {
    register_sidebar(
    	array(
			'name' => esc_html__('Main Sidebar', 'bifrost'),
			'description' => esc_html__('Widgets on this sidebar are displayed in Blog Page.', 'bifrost'),
			'id' => 'main-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle-wrapper"><h5 class="widgettitle">',
			'after_title'   => '</h5></div>'
    	)
	);
	if (class_exists('WooCommerce')) {
		register_sidebar(
			array(
				'name' => esc_html__('Shop Sidebar', 'bifrost'),
				'description' => esc_html__('Widgets on this sidebar are displayed in Shop Pages.', 'bifrost'),
				'id' => 'shop-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widgettitle-wrapper"><h5 class="widgettitle">',
				'after_title'   => '</h3></div>'
			)
		);
	}
    register_sidebar(
    	array(
			'name' => esc_html__('Footer Sidebar 1', 'bifrost'),
			'description' => esc_html__('Widgets on this sidebar are placed on the first column of footer.', 'bifrost'),
			'id' => 'sidebar-footer-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle-wrapper"><h5 class="widgettitle">',
			'after_title'   => '</h5></div>'
    	)
	);
    register_sidebar(
    	array(
			'name' => esc_html__('Footer Sidebar 2', 'bifrost'),
			'description' => esc_html__('Widgets on this sidebar are placed on the second column of footer.', 'bifrost'),
			'id' => 'sidebar-footer-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle-wrapper"><h5 class="widgettitle">',
			'after_title'   => '</h5></div>'
    	)
	);
    register_sidebar(
    	array(
			'name' => esc_html__('Footer Sidebar 3', 'bifrost'),
			'description' => esc_html__('Widgets on this sidebar are placed on the third column of footer.', 'bifrost'),
			'id' => 'sidebar-footer-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle-wrapper"><h5 class="widgettitle">',
			'after_title'   => '</h5></div>'
    	)
	);
    register_sidebar(
    	array(
			'name' => esc_html__('Footer Sidebar 4', 'bifrost'),
			'description' => esc_html__('Widgets on this sidebar are placed on the fourth column of footer.', 'bifrost'),
			'id' => 'sidebar-footer-4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle-wrapper"><h5 class="widgettitle">',
			'after_title'   => '</h5></div>'
    	)
	);
    register_sidebar(
    	array(
			'name' => esc_html__('Footer Sidebar 5', 'bifrost'),
			'description' => esc_html__('Widgets on this sidebar are placed on the fifth column of footer.', 'bifrost'),
			'id' => 'sidebar-footer-5',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle-wrapper"><h5 class="widgettitle">',
			'after_title'   => '</h5></div>'
    	)
	);
    register_sidebar(
    	array(
			'name' => esc_html__('Footer Sidebar 6', 'bifrost'),
			'description' => esc_html__('Widgets on this sidebar are placed on the sixth column of footer.', 'bifrost'),
			'id' => 'sidebar-footer-6',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle-wrapper"><h5 class="widgettitle">',
			'after_title'   => '</h5></div>'
    	)
	);
	register_sidebar(
    	array(
			'name' => esc_html__('Sliding Bar Sidebar', 'bifrost'),
			'description' => esc_html__('Widgets on this sidebar are placed on the sliding bar of header.', 'bifrost'),
			'id' => 'sliding-bar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widgettitle-wrapper"><h5 class="widgettitle">',
			'after_title'   => '</h5></div>'
    	)
	);

	if (get_theme_mod('general_sidebars')) {
		foreach (get_theme_mod('general_sidebars') as $sidebar) {
			if (!empty($sidebar['sidebar_title'] && !empty($sidebar('sidebar_description')))) {
				register_sidebar(
					array(
						'name' => esc_attr($sidebar['sidebar_title']),
						'description' => esc_attr($sidebar['sidebar_description']),
						'id' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $sidebar['sidebar_title']))),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="widgettitle-wrapper"><h5 class="widgettitle">',
						'after_title'   => '</h3></div>'
					)
				);
			}
		}
	}
}

/**
 * Mega Menu Classes
 * 
 * Add classes to the menu item when
 * mega menu option is clicked.
 */
add_filter('wp_nav_menu_objects', 'bifrost_mega_menu_class', 10, 2);
function bifrost_mega_menu_class($items, $args) {
	foreach ($items as $item) {
		// Activate
		if (get_field('mega_menu', $item)) {
			$item->classes[] = 'm-mega-menu';
		}

		// Columns
		switch (get_field('mega_menu_columns', $item)) {
			case '1':
				$item->classes[] = 'm-mega-menu--two';
				break;
			case '2':
				$item->classes[] = 'm-mega-menu--three';
				break;
			case '3':
				$item->classes[] = 'm-mega-menu--four';
				break;
			case '4':
				$item->classes[] = 'm-mega-menu--five';
				break;
		}

		// Unclickable
		if (get_field('menu_unclickable', $item)) {
			$item->classes[] = 'disabled';
		}

		// Label
		if (get_field('menu_label', $item) == '2') {
			$item->classes[] = 'a-menu-badge a-menu-badge--new';
		} elseif (get_field('menu_label', $item) == '3') {
			$item->classes[] = 'a-menu-badge a-menu-badge--hot';
		}
	}
	return $items;
}

/**
 * Remove Mega Menu Classes
 * 
 * Remove clases from the menu
 * items, useful for builder.
 */
function bifrost_remove_mega_menu_class($items, $args) {
	foreach ($items as $item) {
		foreach($item->classes as $key => $class) {
			if(strpos($class, 'm-mega-menu') !== false) {
				unset($item->classes[$key]);
			}
		}
	}
	return $items;
}

/**
 * Rewrite the ACF functions incase ACF fails to activate
 */
if (!function_exists('get_field') && !is_admin() && !function_exists('get_sub_field')) {
	function get_field($field_id, $post_id = null) {
		return null;
	}

	function get_sub_field($field_id, $post_id = null){
		return null;
	}
}

/**
 * WooCommerce Placeholder
 */
add_filter('woocommerce_placeholder_img_src', 'bifrost_woocommerce_placeholder_img_src');
function bifrost_woocommerce_placeholder_img_src($src) {
	$src = BIFROST_THEME_PLACEHOLDER;
	 
	return $src;
}

/**
 * Register Fonts
 */
function bifrost_fonts_url() {
	$font_url = '';
	if ('off' !== _x('on', 'Google font: on or off', 'bifrost')) {
		$font_url = add_query_arg('family', urlencode('Roboto:300,400,400i,500,700'), '//fonts.googleapis.com/css');
	}
	return $font_url;
}

/**
 * Custom Template
 */
function bifrost_get_custom_template($id) {
	if (!class_exists('Elementor\Plugin')) {
		return;
	}

	if (empty($id)) {
		return;
	}

	$content = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($id, true);

	return $content;
}

/**
 * Demo Importer
 * 
 * Import the content, widgets and
 * the customizer settings via the
 * plugin one click demo importer.
 */
add_filter('pt-ocdi/import_files', 'bifrost_ocdi_import_files');
function bifrost_ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => esc_html__('Main Demo', 'bifrost'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/main-demo.xml',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/main-demo.jpg',
			'import_notice'              => esc_html__('Everything that is listed in our demo will be imported via this option.', 'bifrost'),
		),
		// Classic
		array(
			'import_file_name'           => esc_html__('Classic Agency', 'bifrost'),
			'categories'                 => array('Classic', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/classic/classic-agency.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/classic-agency.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts.', 'bifrost'),
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json',
			'preview_url'                => 'https://neuronthemes.com/bifrost/classic-agency'
		),
		array(
			'import_file_name'           => esc_html__('Metro Portfolio', 'bifrost'),
			'categories'                 => array('Classic', 'Side-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/classic/metro-portfolio.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/metro-portfolio.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json',
			'preview_url'                => 'https://neuronthemes.com/bifrost/metro-portfolio'
		),
		array(
			'import_file_name'           => esc_html__('Split Portfolio', 'bifrost'),
			'categories'                 => array('Classic'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/classic/split-portfolio.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/split-portfolio.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/split-portfolio',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json',
		),
		array(
			'import_file_name'           => esc_html__('Justify Portfolio', 'bifrost'),
			'categories'                 => array('Classic', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/classic/justify-portfolio.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/justify-portfolio.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/justify-portfolio',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json',
		),
		array(
			'import_file_name'           => esc_html__('Designer Landing', 'bifrost'),
			'categories'                 => array('Classic'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/classic/designer-landing.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/designer-landing.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/designer-landing/',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json',
		),
		array(
			'import_file_name'           => esc_html__('Designer Portfolio', 'bifrost'),
			'categories'                 => array('Classic'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/classic/designer-portfolio.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/designer-portfolio.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/designer-portfolio/',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json',
		),
		array(
			'import_file_name'           => esc_html__('Projects Showcase', 'bifrost'),
			'categories'                 => array('Classic'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/classic/projects-showcase.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/projects-showcase.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/projects-showcase/'
		),
		array(
			'import_file_name'           => esc_html__('Dark Portfolio', 'bifrost'),
			'categories'                 => array('Classic'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/classic/dark-portfolio.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/dark-portfolio.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/dark-portfolio/',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'

		),
		array(
			'import_file_name'           => esc_html__('Simple Blog', 'bifrost'),
			'categories'                 => array('Classic', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/classic/simple-blog.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/simple-blog.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/simple-blog/'

		),
		// Creative
		array(
			'import_file_name'           => esc_html__('Portfolio Agency', 'bifrost'),
			'categories'                 => array('Creative', 'Overlay-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/creative/portfolio-agency.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/portfolio-agency.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/portfolio-agency/',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json',
		),
		array(
			'import_file_name'           => esc_html__('Creative Agency', 'bifrost'),
			'categories'                 => array('Creative', 'Overlay-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/creative/creative-agency.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/creative-agency.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/creative-agency/',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Video Showcase', 'bifrost'),
			'categories'                 => array('Creative', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/creative/video-showcase.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/video-showcase.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/video-showcase/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat'
		),
		array(
			'import_file_name'           => esc_html__('Interactive Parallax', 'bifrost'),
			'categories'                 => array('Creative'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/creative/interactive-parallax.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/interactive-parallax.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/interactive-parallax/'
		),
		array(
			'import_file_name'           => esc_html__('Portfolio Tooltip', 'bifrost'),
			'categories'                 => array('Creative', 'Side-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/creative/portfolio-tooltip.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/portfolio-tooltip.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/portfolio-tooltip/'
		),
		array(
			'import_file_name'           => esc_html__('Medium Blog', 'bifrost'),
			'categories'                 => array('Creative'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/creative/medium-blog.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/medium-blog.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/medium-blog/'
		),
		array(
			'import_file_name'           => esc_html__('Interactive Links', 'bifrost'),
			'categories'                 => array('Creative'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/creative/interactive-links.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/interactive-links.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/interactive-links/'
		),
		array(
			'import_file_name'           => esc_html__('Interactive Grid', 'bifrost'),
			'categories'                 => array('Creative'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/creative/interactive-grid.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/interactive-grid.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/interactive-grid/'
		),
		array(
			'import_file_name'           => esc_html__('Portfolio Fixed', 'bifrost'),
			'categories'                 => array('Creative'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/creative/portfolio-fixed.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/portfolio-fixed.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/portfolio-fixed/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat'
		),
		// Multi-Purpose
		array(
			'import_file_name'           => esc_html__('Architecture', 'bifrost'),
			'categories'                 => array('Multi-Purpose', 'Overlay-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/multi-purpose/architecture.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/architecture.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/architecture/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Studio Agency', 'bifrost'),
			'categories'                 => array('Multi-Purpose', 'Side-Menu', 'One-Page'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/multi-purpose/studio-agency.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/studio-agency.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/studio-agency/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Restaurant', 'bifrost'),
			'categories'                 => array('Multi-Purpose', 'Top-Menu', 'One-Page'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/multi-purpose/restaurant.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/restaurant.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/restaurant/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Education', 'bifrost'),
			'categories'                 => array('Multi-Purpose', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/multi-purpose/education.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/education.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/education/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Personal Resume', 'bifrost'),
			'categories'                 => array('Multi-Purpose', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/multi-purpose/personal-resume.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/personal-resume.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/personal-resume/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Construction', 'bifrost'),
			'categories'                 => array('Multi-Purpose', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/multi-purpose/construction.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/construction.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/construction/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Creative Studio', 'bifrost'),
			'categories'                 => array('Multi-Purpose'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/multi-purpose/creative-studio.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/creative-studio.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/creative-studio/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Travel Agency', 'bifrost'),
			'categories'                 => array('Multi-Purpose', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/multi-purpose/travel-agency.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/travel-agency.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/travel-agency/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Wedding', 'bifrost'),
			'categories'                 => array('Multi-Purpose', 'Top-Menu', 'One-Page'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/multi-purpose/wedding.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/wedding.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/wedding/'
		),
		// Minimal
		array(
			'import_file_name'           => esc_html__('Freelancer Home', 'bifrost'),
			'categories'                 => array('Minimal', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/minimal/freelancer-home.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/freelancer-home.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/freelancer-home/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Projects Carousel', 'bifrost'),
			'categories'                 => array('Minimal', 'Overlay-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/minimal/projects-carousel.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/projects-carousel.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/projects-carousel/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Simple Portfolio', 'bifrost'),
			'categories'                 => array('Minimal', 'Overlay-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/minimal/simple-portfolio.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/simple-portfolio.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/simple-portfolio/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Simple Photography', 'bifrost'),
			'categories'                 => array('Minimal', 'Side-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/minimal/simple-photography.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/simple-photography.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/simple-photography/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Projects Gallery', 'bifrost'),
			'categories'                 => array('Minimal', 'Side-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/minimal/projects-gallery.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/projects-gallery.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/projects-gallery/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Personal Portfolio', 'bifrost'),
			'categories'                 => array('Minimal', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/minimal/personal-portfolio.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/personal-portfolio.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/personal-portfolio/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Clean Photography', 'bifrost'),
			'categories'                 => array('Minimal', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/minimal/clean-photography.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/clean-photography.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/clean-photography/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Portfolio Showcase', 'bifrost'),
			'categories'                 => array('Minimal'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/minimal/portfolio-showcase.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/portfolio-showcase.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/portfolio-showcase/'
		),
		array(
			'import_file_name'           => esc_html__('Portfolio Boxed', 'bifrost'),
			'categories'                 => array('Minimal', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/minimal/portfolio-boxed.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/portfolio-boxed.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/portfolio-boxed/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		// Business
		array(
			'import_file_name'           => esc_html__('Shop Classic', 'bifrost'),
			'categories'                 => array('Business', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/business/shop-classic.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/shop-classic.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/shop-classic/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('SaaS Landing', 'bifrost'),
			'categories'                 => array('Business', 'Top-Menu', 'One-Page'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/business/saas-landing.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/saas-landing.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/saas-landing/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('App Landing', 'bifrost'),
			'categories'                 => array('Business', 'Top-Menu', 'One-Page'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/business/app-landing.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/app-landing.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/app-landing/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Shop Fashion', 'bifrost'),
			'categories'                 => array('Business', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/business/shop-fashion.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/shop-fashion.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/shop-fashion/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Shop Creative', 'bifrost'),
			'categories'                 => array('Business', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/business/shop-creative.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/shop-creative.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/shop-creative/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Products Carousel', 'bifrost'),
			'categories'                 => array('Business', 'Side-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/business/products-carousel.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/products-carousel.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/products-carousel/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Furniture Store', 'bifrost'),
			'categories'                 => array('Business', 'Top-Menu'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/business/furniture-store.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/furniture-store.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/furniture-store/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Shop Parallax', 'bifrost'),
			'categories'                 => array('Business'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/business/shop-parallax.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/shop-parallax.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/shop-parallax/',
			'import_customizer_file_url' => 'https://neuronthemes.com/bifrost/demo-importer/extra/customizer.dat',
			'import_widget_file_url'     => 'https://neuronthemes.com/bifrost/demo-importer/extra/widgets.json'
		),
		array(
			'import_file_name'           => esc_html__('Products Showcase', 'bifrost'),
			'categories'                 => array('Business'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/homepages/business/products-showcase.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/products-showcase.jpg',
			'import_notice'              => esc_html__('The following page will be imported will all the required posts', 'bifrost'),
			'preview_url'                => 'https://neuronthemes.com/bifrost/products-showcase/'
		),
		// Pages
		array(
			'import_file_name'           => esc_html__('About Classic', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/about-classic.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/about-classic.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('About Creative', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/about-creative.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/about-creative.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('About Split Screen', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/about-split-screen.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/about-split-screen.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('About Personal', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/about-personal.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/about-personal.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Contact Classic', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/contact-classic.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/contact-classic.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Contact Creative', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/contact-creative.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/contact-creative.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Contact Split Screen', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/contact-split-screen.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/contact-split-screen.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Contact Personal', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/contact-personal.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/contact-personal.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Services Classic', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/services-classic.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/services-classic.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Services Creative', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/services-creative.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/services-creative.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Services Split Screen', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/services-split-screen.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/services-split-screen.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Services Personal', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/services-personal.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/services-personal.jpg',
			'import_notice'              => esc_html__('The following page will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Portfolio Pages', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/portfolio-pages.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/portfolio-pages.jpg',
			'import_notice'              => esc_html__('All Portfolio Items and Portfolio Pages will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Blog Pages', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/blog-pages.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/blog-pages.jpg',
			'import_notice'              => esc_html__('All Posts and Blog Pages will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Shop Pages', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/shop-pages.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/shop-pages.jpg',
			'import_notice'              => esc_html__('All Products and Shop Pages will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Elements', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/elements.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/elements.jpg',
			'import_notice'              => esc_html__('All Element Pages will be imported.', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Coming Soon', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/coming-soon.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/coming-soon.jpg',
			'import_notice'              => esc_html__('', 'bifrost'),
		),
		array(
			'import_file_name'           => esc_html__('Maintenance', 'bifrost'),
			'categories'                 => array('Pages'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/pages/maintenance.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/maintenance.jpg',
			'import_notice'              => esc_html__('', 'bifrost'),
		),
		// Templates
		array(
			'import_file_name'           => esc_html__('Header Templates', 'bifrost'),
			'categories'                 => array('Templates'),
			'import_file_url'            => 'https://neuronthemes.com/bifrost/demo-importer/header-templates.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/bifrost/wp-content/uploads/2019/08/headers.jpg',
			'import_notice'              => esc_html__('Only the Header Templates will be imported.', 'bifrost'),
		),
	);
}

/**
 * After Import Setup
 * 
 * Set the Classic Home Page as front
 * page and assign the menu to 
 * the main menu location.
 */
add_action('pt-ocdi/after_import', 'bifrost_ocdi_after_import_setup');
function bifrost_ocdi_after_import_setup($selected_import) {
	// Main Demo
	if (!empty($selected_import['import_file_name']) && $selected_import['import_file_name'] == 'Main Demo') {
		$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

		if ($main_menu) {
			set_theme_mod('nav_menu_locations', array('main-menu' => $main_menu->term_id));
		}

		$front_page_id = get_page_by_title('Classic Agency');
		if ($front_page_id) {
			update_option('page_on_front', $front_page_id->ID);
			update_option('show_on_front', 'page');
		}	
		$blog_page_id = get_page_by_title('Blog');
		if ($blog_page_id) {
			update_option('page_for_posts', $blog_page_id->ID);
		}
	}

	// Revolution Slider
	if (class_exists('RevSlider')) {
		// Main Demo
		if (!empty($selected_import['import_file_name']) && $selected_import['import_file_name'] == 'Main Demo') {
			$slider_path = array(
				get_template_directory() . "/includes/demo-importer/revslider/architecture.zip",
				get_template_directory() . "/includes/demo-importer/revslider/home-construction.zip",
				get_template_directory() . "/includes/demo-importer/revslider/home-portfolio-showcase-slider.zip",
				get_template_directory() . "/includes/demo-importer/revslider/home-projects-showcase-slider.zip",
				get_template_directory() . "/includes/demo-importer/revslider/home-shop-classic-slider.zip",
				get_template_directory() . "/includes/demo-importer/revslider/home-shop-furniture-slider.zip",
				get_template_directory() . "/includes/demo-importer/revslider/shop-creative.zip",
				get_template_directory() . "/includes/demo-importer/revslider/shop-fashion.zip",
				get_template_directory() . "/includes/demo-importer/revslider/shop-showcase-slider.zip",
			);

			foreach ($slider_path as $slide) {
				$slider = new RevSlider();

				$slider->importSliderFromPost(true, true, $slide);  
			}
		
		}

		// Projects Showcase
		if (!empty($selected_import['import_file_name']) && $selected_import['import_file_name'] == 'Projects Showcase') {
			$slider_path = get_template_directory() . "/includes/demo-importer/revslider/home-projects-showcase-slider.zip";

			$slider = new RevSlider();
		
			$slider->importSliderFromPost(true, true, $slider_path);  
		}
		// Architecture
		if (!empty($selected_import['import_file_name']) && $selected_import['import_file_name'] == 'Architecture') {
			$slider_path = get_template_directory() . "/includes/demo-importer/revslider/architecture.zip";

			$slider = new RevSlider();
		
			$slider->importSliderFromPost(true, true, $slider_path);  
		}
		// Construction
		if (!empty($selected_import['import_file_name']) && $selected_import['import_file_name'] == 'Construction') {
			$slider_path = get_template_directory() . "/includes/demo-importer/revslider/home-construction.zip";

			$slider = new RevSlider();
		
			$slider->importSliderFromPost(true, true, $slider_path);  
		}
		// Projects Showcase
		if (!empty($selected_import['import_file_name']) && $selected_import['import_file_name'] == 'Portfolio Showcase') {
			$slider_path = get_template_directory() . "/includes/demo-importer/revslider/home-portfolio-showcase-slider.zip";

			$slider = new RevSlider();
		
			$slider->importSliderFromPost(true, true, $slider_path);  
		}
		// Shop Classic
		if (!empty($selected_import['import_file_name']) && $selected_import['import_file_name'] == 'Shop Classic') {
			$slider_path = get_template_directory() . "/includes/demo-importer/revslider/home-shop-classic-slider.zip";

			$slider = new RevSlider();
		
			$slider->importSliderFromPost(true, true, $slider_path);  
		}
		// Shop Fashion
		if (!empty($selected_import['import_file_name']) && $selected_import['import_file_name'] == 'Shop Fashion') {
			$slider_path = get_template_directory() . "/includes/demo-importer/revslider/shop-fashion.zip";

			$slider = new RevSlider();
		
			$slider->importSliderFromPost(true, true, $slider_path);  
		}
		// Shop Creative
		if (!empty($selected_import['import_file_name']) && $selected_import['import_file_name'] == 'Shop Creative') {
			$slider_path = get_template_directory() . "/includes/demo-importer/revslider/shop-creative.zip";

			$slider = new RevSlider();
		
			$slider->importSliderFromPost(true, true, $slider_path);  
		}
		// Furniture Store
		if (!empty($selected_import['import_file_name']) && $selected_import['import_file_name'] == 'Furniture Store') {
			$slider_path = get_template_directory() . "/includes/demo-importer/revslider/home-shop-furniture-slider.zip";

			$slider = new RevSlider();
		
			$slider->importSliderFromPost(true, true, $slider_path);  
		}
		// Products Showcase
		if (!empty($selected_import['import_file_name']) && $selected_import['import_file_name'] == 'Products Showcase') {
			$slider_path = get_template_directory() . "/includes/demo-importer/revslider/shop-showcase-slider.zip";

			$slider = new RevSlider();
		
			$slider->importSliderFromPost(true, true, $slider_path);  
		}
	}
}

/**
 * Woo Gallery
 * 
 * Change the thumbnail size
 * from thumbnail to medium.
 */
add_filter('woocommerce_gallery_thumbnail_size', 'bifrost_woocommerce_gallery_thumbnail_size');
function bifrost_woocommerce_gallery_thumbnail_size() {
	return 'medium';
}

/**
 * Custom Body Classes
 */
function bifrost_custom_body_classes($classes) {
    /**
     * Theme Borders
     */
    if (bifrost_inherit_option('theme_borders', 'theme_borders', '2') == '1' && apply_filters('bifrost_display_theme_borders', true)) {
        $classes[] = 'h-theme-borders';
	}
	
	/**
     * Parallax Footer
     */
    if (bifrost_inherit_option('footer_parallax', 'footer_parallax', '2') == '1') {
        $classes[] = 'h-parallax-footer';
    }

    return $classes;
}
add_filter('body_class', 'bifrost_custom_body_classes');
