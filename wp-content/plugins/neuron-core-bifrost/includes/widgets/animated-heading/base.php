<?php
namespace NeuronElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class NeuronAnimatedHeading extends Widget_Base {

	public function get_name() {
		return 'neuron-animate-heading';
	}

	public function get_title() {
		return __('Animated Heading', 'neuron-core');
	}

	public function get_icon() {
		return 'eicon-animated-headline neuron-badge';
	}

	public function get_categories() {
		return ['neuron-category'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'functionality_tab',
			[
				'label' => __('Functionality', 'neuron-core'),
			]
        );

        $this->add_control(
			'content',
			[
				'label' => __('Content', 'neuron-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('Add Your Animated Heading Text Here', 'neuron-core'),
				'description' => __('Add the animated heading.', 'neuron-core')
			]
        );

        $this->add_control(
			'delay',
			[
				'label' => __('Delay (ms)', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 9999,
				'step' => 1,
				'default' => 200,
			]
		);

		 $this->add_control(
			'increase_delay',
			[
				'label' => __('Increase Delay (ms)', 'neuron-core'),
				'description' => __('When separating the words in new lines, the delay for words to words will be increased by 200.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 9999,
				'step' => 1,
				'default' => 200,
			]
		);

		$this->add_control(
			'html_tag',
			[
				'label' => __('HTML Tag', 'neuron-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => __('H1', 'neuron-core'),
					'h2' => __('H2', 'neuron-core'),
					'h3' => __('H3', 'neuron-core'),
					'h4' => __('H4', 'neuron-core'),
					'h5' => __('H5', 'neuron-core'),
					'h6' => __('H6', 'neuron-core'),
					'div' => __('div', 'neuron-core'),
					'span' => __('span', 'neuron-core')
				],
				'default' => 'h2'
			]
		);

		$this->add_control(
			'alignment',
			[
				'label' => __('Alignment', 'neuron-core'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'neuron-core'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'neuron-core'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'neuron-core'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}}'
                ]
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'style_section',
			[
				'label' => __('Style', 'neuron-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => __('Color', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-animated-heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __('Typography', 'neuron-core'),
				'selector' => '{{WRAPPER}} .a-animated-heading'
			]
		);

		$this->end_controls_section();
    }

    public function split_the_heading($heading, $delay, $increase_delay) {
		$heading = explode(PHP_EOL, $heading);
		$headingArr = $output = [];

		foreach ($heading as $head) {
			$headingArr[] = explode(' ', $head);
		}

		foreach ($headingArr as $arr) {
			$output[] =  '<span><span class="wow" data-wow-delay="'. $delay / 1000 .'s">' . implode('</span> <span class="wow" data-wow-delay="'. $delay / 1000 .'s">', $arr) . '</span></span>';
			$delay += $increase_delay;
		}

		return implode(' ', $output);
    }

	protected function render() {
		$settings = $this->get_settings_for_display();

        if ($settings['content']) {
            echo sprintf(
                '<%s class="%s"><span class="%s">%s</span></%s>',
                $settings['html_tag'],
                'a-animated-heading mb-0',
                'a-animated-heading__inner',
                $this->split_the_heading($settings['content'], $settings['delay'], $settings['increase_delay']),
                $settings['html_tag']
            );
        }
	}

	protected function _content_template() {}
}
