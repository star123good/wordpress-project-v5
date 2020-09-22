<?php
namespace NeuronElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class NeuronTestimonialCarousel extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'neuron-testimonial-carousel';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __('Testimonial Carousel', 'neuron-core');
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-testimonial-carousel neuron-badge';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return ['neuron-category'];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'slides_section',
			[
				'label' => __('Slides', 'neuron-core'),
			]
		);

		$this->add_control(
            'slides',
            [
                'label' => __('Slides', 'neuron-core'),
                'description' => __('Add slides to the testimonial carousel.', 'neuron-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
					[
                        'name' => 'content',
                        'label' => __('Content', 'neuron-core'),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => __('I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'neuron-core')
					],
					[
                        'name' => 'image',
                        'label' => __('Image', 'neuron-core'),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
						],
                    ],
                    [
                        'name' => 'name',
                        'label' => __('Name', 'neuron-core'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __('John Doe', 'neuron-core')
                    ],
                    [
                        'name' => 'title',
                        'label' => __('Title', 'neuron-core'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __('Developer', 'neuron-core')
                    ],
				],
				'default' => [
					[
						'content' => __('I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'neuron-core'),
						'name' => __('John Doe', 'neuron-core'),
						'title' => __('Developer', 'neuron-core'),
						'image' => [
							'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
						],
					],
					[
						'content' => __('I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'neuron-core'),
						'name' => __('Chris Parker', 'neuron-core'),
						'title' => __('Designer', 'neuron-core'),
						'image' => [
							'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
						],
					],
					[
						'content' => __('I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'neuron-core'),
						'name' => __('Peter Jack', 'neuron-core'),
						'title' => __('CEO', 'neuron-core'),
						'image' => [
							'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
						],
					],
				],
            ]
		);

		$this->add_control(
			'layout',
			[
                'label' => __('Layout', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'image-inline' => __('Image Inline', 'neuron-core'),
					'image-stacked' => __('Image Stacked', 'neuron-core'),
					'image-above' => __('Image Above', 'neuron-core'),
					'image-left' => __('Image Left', 'neuron-core'),
					'image-right' => __('Image Right', 'neuron-core'),
				],
				'default' => 'image-inline',
				'render_type' => 'template',
				'prefix_class' => 'l-neuron-testimonial--'
			]
		);

		$this->add_control(
			'alignment',
			[
				'label' => __('Alignment', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label_block' => false,
				'default' => 'center',
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
				'prefix_class' => 'l-neuron-testimonial--alignment__'
			]
		);

		$this->add_responsive_control(
			'columns',
			[
                'label' => __('Columns', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1' => __('1 Column', 'neuron-core'),
					'2' => __('2 Columns', 'neuron-core'),
					'3' => __('3 Columns', 'neuron-core'),
					'4' => __('4 Columns', 'neuron-core'),
					'5' => __('5 Columns', 'neuron-core'),
					'6' => __('6 Columns', 'neuron-core')
				],
				'default' => '1',
				'tablet_default' => '1',
				'mobile_default' => '1',
				'frontend_available' => true
			]
		);

		$this->add_control(
			'animation',
			[
				'label' => __('Animation', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' 				 	=> __('None', 'neuron-core'),
					'h-fadeInNeuron'	 	=> __('Fade In', 'neuron-core'),
					'h-fadeInUpNeuron' 	  	=> __('Fade In Up', 'neuron-core'),
					'h-fadeInLeftNeuron'  	=> __('Fade In Left', 'neuron-core'),
					'h-fadeInRightNeuron' 	=> __('Fade In Right', 'neuron-core'),
					'h-zoomInNeuron' 	 	=> __('Zoom In', 'neuron-core'),
					'h-zoomOutNeuron' 	 	=> __('Zoom Out', 'neuron-core'),
					'h-preserve3DNeuron' 	=> __('Preserve 3d', 'neuron-core')
				],
				'default' => 'h-fadeInNeuron',
			]
		);

		$this->add_control(
			'animation_delay',
			[
				'label' => __('Animation Delay', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [
					'animation!' => 'none'
				]
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => __('Width', 'neuron-core'),
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1300,
					],
					'%' => [
						'min' => 50,
					],
				],
				'size_units' => ['%', 'px'],
				'default' => [
					'size' => 100,
					'unit' => '%',
				],
				'selectors' => [
					'{{WRAPPER}} .owl-item .m-neuron-testimonial' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'carousel',
			[
				'label' => __('Carousel', 'neuron-core')
			]
		);
		
		$this->add_responsive_control(
			'carousel_margin',
			[
				'label' => __('Margin', 'neuron-core'),
				'description' => __('Enter the margin space, number will be represented in pixels.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 10,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'frontend_available' => true
			]
		);

		$this->add_control(
			'carousel_auto_height',
			[
                'label' => __('Auto Height', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1' => __('On', 'neuron-core'),
					'2' => __('Off', 'neuron-core'),
				],
				'default' => '1',
				'frontend_available' => true
			]
		);

		$this->add_control(
			'carousel_loop',
			[
				'label' => __('Loop', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
				'frontend_available' => true
			]
		);

		$this->add_control(
			'carousel_mouse_drag',
			[
				'label' => __('Mouse Drag', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'yes',
				'frontend_available' => true
			]
		);

		$this->add_control(
			'carousel_touch_drag',
			[
				'label' => __('Touch Drag', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'yes',
				'frontend_available' => true
			]
		);

		$this->add_control(
			'carousel_navigation',
			[
				'label' => __('Navigation', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
				'frontend_available' => true
			]
		);

		$this->add_control(
			'carousel_dots',
			[
				'label' => __('Dots', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
				'frontend_available' => true
			]
		);

		$this->add_control(
			'carousel_autoplay',
			[
				'label' => __('Autoplay', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
				'frontend_available' => true
			]
		);

		$this->add_control(
			'carousel_pause',
			[
				'label' => __('Pause on mouse house', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
				'frontend_available' => true
			]
		);

		$this->add_responsive_control(
			'carousel_stage_padding',
			[
				'label' => __('Stage Padding', 'neuron-core'),
				'description' => __('Padding left and right on stage (can see neighbours).', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'frontend_available' => true
			]
		);

		$this->add_control(
			'carousel_start_position',
			[
				'label' => __('Start Position', 'neuron-core'),
				'description' => __('Enter from which element you want to start the position of carousel.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'frontend_available' => true
			]
		);

		$this->add_control(
			'carousel_autoplay_timeout',
			[
				'label' => __('Auto Play Timeout', 'neuron-core'),
				'description' => __('Autoplay interval timeout, number is represented in seconds.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 0,
				'max'     => 500,
				'step'    => 0.1,
				'frontend_available' => true
			]
		);
		
		$this->add_control(
			'carousel_smart_speed',
			[
				'label' => __('Smart Speed', 'neuron-core'),
				'description' => __('Speed Calculate, number is represented in seconds.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 4.5,
				'min'     => 0,
				'max'     => 500,
				'step'    => 0.1,
				'frontend_available' => true
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slides_section_style',
			[
				'label' => __('Slides', 'neuron-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'slide_background_color',
			[
				'label' => __('Background Color', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'slide_border_type',
			[
                'label' => __('Border Type', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => __('None', 'neuron-core'),
                    'solid' => __('Solid', 'neuron-core'),
                    'double' => __('Double', 'neuron-core'),
                    'dotted' => __('Dotted', 'neuron-core'),
                    'dashed' => __('Dashed', 'neuron-core'),
                    'groove' => __('Groove', 'neuron-core')
				],
				'default' => 'none',
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial' => 'border-style: {{VALUE}}'
				],
			]
		);

		$this->add_responsive_control(
			'slide_border_size',
			[
				'label' => __('Border Size', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition' => [
					'slide_border_type!' => 'none'
				]
			]
		);

		$this->add_control(
			'slide_border_color',
			[
				'label' => __('Border Color', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'slide_border_type!' => 'none'
				]
			]
		);


		$this->add_responsive_control(
			'slide_border_radius',
			[
				'label' => __('Border Radius', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'%' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'slide_border_type!' => 'none'
				]
			]
		);

		$this->add_responsive_control(
			'slide_padding',
			[
				'label' => __('Padding', 'neuron-core'),
				'size_units' => ['px', 'rem', '%'],
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __('Content', 'neuron-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_gap',
			[
				'label' => __('Gap', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.l-neuron-testimonial--image-inline .m-neuron-testimonial__content' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.l-neuron-testimonial--image-stacked .m-neuron-testimonial__content' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.l-neuron-testimonial--image-right .m-neuron-testimonial__content' => 'padding-right: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.l-neuron-testimonial--image-left .m-neuron-testimonial__content' => 'padding-left: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.l-neuron-testimonial--image-above .m-neuron-testimonial__content' => 'margin-top: {{SIZE}}{{UNIT}}'
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __('Text Color', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial__text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .m-neuron-testimonial__text',
			]
		);

		$this->add_control(
			'name_title_style',
			[
				'label' => __('Name', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __('Text Color', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial__name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .m-neuron-testimonial__name',
			]
		);

		$this->add_control(
			'heading_title_style',
			[
				'label' => __('Title', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __('Text Color', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial__title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .m-neuron-testimonial__title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image_style',
			[
				'label' => __('Image', 'neuron-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_size',
			[
				'label' => __('Size', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial__image' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'image_border_size',
			[
				'label' => __('Border Size', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial__image img' => 'border-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'image_border_type',
			[
                'label' => __('Border Type', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => __('None', 'neuron-core'),
                    'solid' => __('Solid', 'neuron-core'),
                    'double' => __('Double', 'neuron-core'),
                    'dotted' => __('Dotted', 'neuron-core'),
                    'dashed' => __('Dashed', 'neuron-core'),
                    'groove' => __('Groove', 'neuron-core')
				],
				'default' => 'none',
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial__image img' => 'border-style: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => __('Border Radius', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'%' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial__image img' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'image_border_color',
			[
				'label' => __('Border Color', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .m-neuron-testimonial__image img' => 'border-color: {{VALUE}}',
				],
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

		/**
		 * Animation & WOW Delay
		 */
		$neuron_data_wow_delay = false;
		$neuron_data_wow_seconds = 0;
		$neuron_slider_class = 'm-neuron-testimonial';
		$neuron_wow_count = 1;

		if ($settings['animation'] != 'none') {
			if ($settings['animation_delay'] == 'yes' && !\Elementor\Plugin::$instance->editor->is_edit_mode()) {
				$neuron_data_wow_delay = true;
				$neuron_slider_class .= $settings['carousel_stage_padding'] ? ' wow ' . $settings['animation'] : ' wow intro-animation';
			} elseif ($settings['animation_delay'] != 'yes') {
				$neuron_slider_class .= ' wow ' . $settings['animation'];
			}
		} 
	?>
		<div class="owl-carousel owl-theme" id="<?php echo md5($this->get_id()); ?>" data-animation="<?php echo esc_attr($settings['animation']) ?>" data-wow="<?php echo esc_attr($settings['animation_delay']) ?>">
			<?php foreach ($settings['slides'] as $slide) : ?>
				<?php 
				/**
				 * WOW Animation
				 */
				if ($settings['columns'] && $settings['animation_delay'] == 'yes') {
					if ($neuron_wow_count > $settings['columns']) {
						$neuron_data_wow_seconds = $neuron_wow_count = 0;
					}
				}
				
				if ($neuron_data_wow_seconds == 6) {
					$neuron_data_wow_seconds = 0;
				} 
				$neuron_wow_holder = "data-wow-delay=". $neuron_data_wow_seconds / 10 ."s";
				?>
				<div class="<?php echo esc_attr($neuron_slider_class) ?>" <?php echo esc_attr($neuron_data_wow_delay === true && $neuron_data_wow_seconds ? $neuron_wow_holder : '') ?>>
					<?php if ($slide['image']['url'] && $settings['layout'] == 'image-above') : ?>
						<div class="m-neuron-testimonial__image">
							<img src="<?php echo esc_url($slide['image']['url']) ?>" alt="<?php echo esc_attr($slide['name']) ?>">
						</div>
					<?php endif; ?>
					<?php if ($slide['content']) : ?>
						<div class="m-neuron-testimonial__content">
							<?php if ($slide['content']) : ?>
								<div class="m-neuron-testimonial__text"><?php echo wp_kses_post($slide['content']) ?></div>
							<?php endif; ?>
							<?php if ($settings['layout'] == 'image-left' || $settings['layout'] == 'image-right') : ?>
							<div class="m-neuron-testimonial__cite">
								<?php if ($slide['name']) : ?>
									<span class="m-neuron-testimonial__name"><?php echo esc_attr($slide['name']) ?></span>
								<?php endif; ?>
								<?php if ($slide['title']) : ?>
									<span class="m-neuron-testimonial__title"><?php echo esc_attr($slide['title']) ?></span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						</div>
					<?php endif; ?>
					<div class="m-neuron-testimonial__footer">
						<?php if ($slide['image']['url'] && $settings['layout'] != 'image-above') : ?>
							<div class="m-neuron-testimonial__image">
								<img src="<?php echo esc_url($slide['image']['url']) ?>" alt="<?php echo esc_attr($slide['name']) ?>">
							</div>
						<?php endif; ?>
						<?php if ($settings['layout'] != 'image-left' && $settings['layout'] != 'image-right') : ?>
							<div class="m-neuron-testimonial__cite">
								<?php if ($slide['name']) : ?>
									<span class="m-neuron-testimonial__name"><?php echo esc_attr($slide['name']) ?></span>
								<?php endif; ?>
								<?php if ($slide['title']) : ?>
									<span class="m-neuron-testimonial__title"><?php echo esc_attr($slide['title']) ?></span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php $neuron_data_wow_seconds = $neuron_data_wow_seconds + 2; $neuron_wow_count++; endforeach; ?>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				var owl = $('#<?php echo md5($this->get_id()); ?>');

				owl.owlCarousel({
					items: <?php echo esc_attr($settings['columns_mobile'] ? $settings['columns_mobile'] : '1') ?>,
					margin: <?php echo esc_attr($settings['carousel_margin_mobile'] ? $settings['carousel_margin_mobile'] : '10') ?>,
					autoHeight: <?php echo esc_attr($settings['carousel_auto_height'] == '1' ? 'true' : 'false') ?>,
					loop: <?php echo esc_attr($settings['carousel_loop'] === 'yes' ? 'true' : 'false') ?>,
					mouseDrag: <?php echo esc_attr($settings['carousel_mouse_drag'] === 'yes' ? 'true' : 'false') ?>,
					touchDrag: <?php echo esc_attr($settings['carousel_touch_drag'] === 'yes' ? 'true' : 'false') ?>,
					stagePadding: <?php echo esc_attr($settings['carousel_stage_padding_mobile'] ? $settings['carousel_stage_padding_mobile'] : '0') ?>,
					startPosition: <?php echo esc_attr($settings['carousel_start_position'] ? $settings['carousel_start_position'] : '0') ?>,
					nav: <?php echo esc_attr($settings['carousel_navigation'] === 'yes' ? 'true' : 'false') ?>,
					navText: [
						'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
						'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
					],
					dots: <?php echo esc_attr($settings['carousel_dots'] === 'yes' ? 'true' : 'false') ?>,
					autoplay: <?php echo esc_attr($settings['carousel_autoplay'] === 'yes' ? 'true' : 'false') ?>,
					autoplayTimeout: <?php echo esc_attr($settings['carousel_autoplay_timeout'] ? $settings['carousel_autoplay_timeout'] * 1000 : '2000') ?>,
					autoplayHoverPause: <?php echo esc_attr($settings['carousel_pause'] === 'yes' ? 'true' : 'false') ?>,
					smartSpeed: <?php echo esc_attr($settings['carousel_smart_speed'] ? $settings['carousel_smart_speed'] * 100 : '450') ?>,
					responsive:{
						768:{
							items: <?php echo esc_attr($settings['columns_tablet'] ? $settings['columns_tablet'] : '1') ?>,
							margin: <?php echo esc_attr($settings['carousel_margin_tablet'] ? $settings['carousel_margin_tablet'] : '5') ?>,
							stagePadding: <?php echo esc_attr($settings['carousel_stage_padding_tablet'] ? $settings['carousel_stage_padding_tablet'] : '0') ?>
						},
						992:{
							items: <?php echo esc_attr($settings['columns'] ? $settings['columns'] : '1') ?>,
							margin: <?php echo esc_attr($settings['carousel_margin'] ? $settings['carousel_margin'] : '0') ?>,
							stagePadding: <?php echo esc_attr($settings['carousel_stage_padding'] ? $settings['carousel_stage_padding'] : '0') ?>
						}
					}
				});
			});
		</script>
	<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {}
}
