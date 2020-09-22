<?php
namespace NeuronElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class NeuronTemplate extends Widget_Base {

	public function get_name() {
		return 'neuron-template';
	}

	public function get_title() {
		return __('Template', 'neuron-core');
	}

	public function get_icon() {
		return 'eicon-document-file neuron-badge';
	}

	public function get_categories() {
		return ['neuron-category'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'template_section',
			[
				'label' => __('Template', 'neuron-core'),
			]
        );

        $this->add_control(
			'template',
			[
				'label' => __('Choose Template', 'neuron-core'),
				'type' => Controls_Manager::SELECT,
				'options' => neuron_get_elementor_templates('', true)
			]
		);

		$this->end_controls_section();
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
        
        if ($settings['template']) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($settings['template'], true);
        }
	}
}
