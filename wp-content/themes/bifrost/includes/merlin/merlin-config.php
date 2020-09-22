<?php
/**
 * Merlin WP configuration file.
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config = array(
		'directory'            => '/includes/merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'wizard', // The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'themes.php', // The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options', // The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'             => true, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => admin_url('themes.php?page=pt-one-click-demo-import'), // Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Theme Setup', 'bifrost' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'bifrost' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'bifrost' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'bifrost' ),

		'btn-skip'                 => esc_html__( 'Skip', 'bifrost' ),
		'btn-next'                 => esc_html__( 'Next', 'bifrost' ),
		'btn-start'                => esc_html__( 'Start', 'bifrost' ),
		'btn-no'                   => esc_html__( 'Cancel', 'bifrost' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'bifrost' ),
		'btn-child-install'        => esc_html__( 'Install', 'bifrost' ),
		'btn-content-install'      => esc_html__( 'Install', 'bifrost' ),
		'btn-import'               => esc_html__( 'Import', 'bifrost' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'bifrost' ),
		'btn-license-skip'         => esc_html__( 'Later', 'bifrost' ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'bifrost' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'bifrost' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'bifrost' ),
		'license-label'            => esc_html__( 'License key', 'bifrost' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'bifrost' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'bifrost' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'bifrost' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'bifrost' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'bifrost' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'bifrost' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'bifrost' ),

		'child-header'             => esc_html__( 'Install Child Theme', 'bifrost' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'bifrost' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'bifrost' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'bifrost' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'bifrost' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'bifrost' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'bifrost' ),

		'plugins-header'           => esc_html__( 'Install Plugins', 'bifrost' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'bifrost' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'bifrost' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'bifrost' ),
		'plugins-action-link'      => esc_html__( 'Advanced', 'bifrost' ),

		'import-header'            => esc_html__( 'Import Content', 'bifrost' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'bifrost' ),
		'import-action-link'       => esc_html__( 'Advanced', 'bifrost' ),

		'ready-header'             => esc_html__( 'One Click Demo Import', 'bifrost' ),

		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'If you don\'t want to start from scratch, try our advanced one click demo importer.', 'bifrost' ),
		'ready-action-link'        => esc_html__( 'Extras', 'bifrost' ),
		'ready-big-button'         => esc_html__( 'Import the Demos', 'bifrost' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://neuronthemes.ticksy.com', esc_html__( 'Get Theme Support', 'bifrost' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'bifrost' ) ),
	)
);

/**
 * Custom content for the generated child theme's functions.php file.
 *
 * @param string $output Generated content.
 * @param string $slug Parent theme slug.
 */
function bifrost_generate_child_functions_php( $output, $slug ) {

	$slug_no_hyphens = strtolower( preg_replace( '#[^a-zA-Z]#', '', $slug ) );

	$output = "
		<?php
		/**
		 * Theme functions and definitions.
		 */
		function {$slug_no_hyphens}_child_enqueue_styles() {

			wp_enqueue_style( '{$slug}-style' , get_template_directory_uri() . '/assets/styles/bifrost.css' );

		    wp_enqueue_style( '{$slug}-child-style',
		        get_stylesheet_directory_uri() . '/style.css',
		        array( '{$slug}-style' ),
		        wp_get_theme()->get('Version')
		    );
		}

		add_action(  'wp_enqueue_scripts', '{$slug_no_hyphens}_child_enqueue_styles' );\n
	";

	// Let's remove the tabs so that it displays nicely.
	$output = trim( preg_replace( '/\t+/', '', $output ) );

	// Filterable return.
	return $output;
}
add_filter( 'merlin_generate_child_functions_php', 'bifrost_generate_child_functions_php', 10, 2 );
