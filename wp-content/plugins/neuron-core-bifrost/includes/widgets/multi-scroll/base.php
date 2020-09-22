<?php
namespace NeuronElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class NeuronMultiScroll extends Widget_Base {

	public function get_name() {
		return 'neuron-multi-scroll';
	}

	public function get_title() {
		return __('Multi Scroll', 'neuron-core');
	}

	public function get_icon() {
		return 'eicon-navigation-vertical neuron-badge';
	}

	public function get_categories() {
		return ['neuron-category'];
	}

	public function is_reload_preview_required() {
		return true;
	}

	protected function _register_controls() {
		 /**
		 * Functionality
		 */
		$this->start_controls_section(
			'functionality', [
				'label' => __('Functionality', 'neuron-core')
			]
		);

		$this->add_control(
			'tab_raw',
			[
				'raw' => __('<small>The element will create multi scrolling page with two vertical scrolling panels.</small>', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'field_type' => 'html',
				'hide_in_inner' => true,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name', [
				'label' => __('Name', 'neuron-core'),
				'type' => Controls_Manager::TEXT,
				'render_type' => 'template'
			]
		);

		$repeater->add_control(
			'template_left', [
				'label' => __('Left Template', 'neuron-core'),
				'type' => Controls_Manager::SELECT,
				'options' => neuron_get_elementor_templates('', true),
				'render_type' => 'template'
			]
		);
		$repeater->add_control(
			'template_right', [
				'label' => __('Right Template', 'neuron-core'),
				'type' => Controls_Manager::SELECT,
				'options' => neuron_get_elementor_templates('', true),
				'render_type' => 'template'
			]
		);

		$this->add_control(
			'sections',
			[
				'label' => __('Sections', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $repeater->get_controls()
			]
		);

		$this->add_control(
			'scrollingspeed',
			[
				'label'   => __('Scrolling Speed', 'neuron-core'),
				'description' => __('Speed in milliseconds for the scrolling transitions.', 'neuron-core'),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 600,
				'min'     => 1,
				'max'     => 5000,
				'step'    => 20,
				'render_type' => 'none',
				'frontend_available' => true
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => __('Navigation', 'neuron-core'),
				'description' => __('If set to true, it will show a navigation bar made up of small circles. Do not forget to add the name for section in query.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'default' => 'no',
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);

		$this->end_controls_section();

		/**
		 * Navigation
		 */
		$this->start_controls_section(
			'navigation_section', [
				'label' => __('Navigation', 'neuron-core'),
				'condition' => [
					'navigation' => 'yes'
				]
			]
		);

		$this->add_control(
			'navigation_alignment',
			[
				'label' => __('Alignment', 'neuron-core'),
				'description' => __('Change navigation alignment', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'neuron-core'),
						'icon' => 'fa fa-align-left',
					],
					'right' => [
						'title' => __('Right', 'neuron-core'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'right',
				'toggle' => true,
				'label_block' => false,
				'render_type' => 'none',
				'frontend_available' => true
			]
		);

		$this->end_controls_section();
    }

    public function neuron_print_section($section, $side) {
        return \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($section['template_' . $side], true);
    }

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
        if ($settings['sections']) :
        ?>
            <div class="l-neuron-multi-scroll">
                <div class="l-neuron-multi-scroll__left l-neuron-multi-scroll__selector">
                    <?php foreach($settings['sections'] as $section) : ?>
                        <div class="l-neuron-multi-scroll__section" data-name="<?php echo esc_attr($section['name']) ?>">
                            <?php echo $this->neuron_print_section($section, 'left') ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="l-neuron-multi-scroll__right l-neuron-multi-scroll__selector">
                    <?php foreach($settings['sections'] as $section) : ?>
                        <div class="l-neuron-multi-scroll__section" data-name="<?php echo esc_attr($section['name']) ?>">
                            <?php echo $this->neuron_print_section($section, 'right') ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
			<?php if (\Elementor\Plugin::$instance->editor->is_edit_mode()) : ?>
				<script>
				jQuery(document).ready(function($) {
					if ($(window).width() > 991) {
						$('.l-neuron-multi-scroll').each(function() {
							$(this).css('opacity', '1');
							$(this).css('visibility', 'visible');

							// Settings
							if ($('.elementor-widget-neuron-multi-scroll').data('settings')) {
								var $settings = $('.elementor-widget-neuron-multi-scroll').data(
									'settings'
								),
								scrollingSpeed = $settings['scrollingspeed'],
								navigation = $settings['navigation'],
								navigationAlignment = $settings['navigation_alignment'];
							}

							// Navigation Tooltips
							var tooltips = [];
							var anchors = [];
							$(this)
								.find('.l-neuron-multi-scroll__section')
								.each(function() {
								if ($(this).data('name')) {
									tooltips.push($(this).data('name'));
									anchors.push(
									$(this)
										.data('name')
										.replace(/\W+/g, '-')
										.toLowerCase()
									);
								}
								});

							// Options
							$(this).multiscroll({
								// Selectors
								sectionSelector: '.l-neuron-multi-scroll__section',
								leftSelector: '.l-neuron-multi-scroll__left',
								rightSelector: '.l-neuron-multi-scroll__right',
								// Options
								scrollingSpeed: scrollingSpeed ? scrollingSpeed : 600,
								navigation: navigation ? true : false,
								navigationPosition: navigationAlignment ? navigationAlignment : 'right',
								navigationTooltips: navigation && tooltips ? tooltips : '',
								anchors: navigation && anchors ? anchors : '',
								lockAnchors: true,
								afterLoad: function(anchorLink, index) {
									window.dispatchEvent(new Event('resize'));
								}
							});
						});
					}
				});
				</script>
			<?php endif; ?>
        <?php
        endif;
	}
}
