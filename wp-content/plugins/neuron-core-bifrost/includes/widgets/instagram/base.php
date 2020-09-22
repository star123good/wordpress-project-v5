<?php
namespace NeuronElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class NeuronInstagram extends Widget_Base {

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
		return 'neuron-instagram';
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
		return __('Instagram', 'neuron-core');
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
		return 'eicon-social-icons neuron-badge';
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
			'instagram',
			[
				'label' => __('Functionality', 'neuron-core'),
			]
        );

         $this->add_control(
			'token',
			[
				'label'   => __('Token', 'neuron-core'),
				'description' => __('Connect the instagram to generate the token. <br /><small>Generate your token: <a href="https://instagram.pixelunion.net/">here</a>.</small>', 'neuron-core'),
                'type'    => Controls_Manager::TEXT
			]
        );

        $this->add_control(
			'layout',
			[
                'label' => __('Layout', 'neuron-core'),
                'description' => __('Select the layout of instagram posts.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'isotope' => __('Isotope', 'neuron-core'),
					'carousel' => __('Carousel', 'neuron-core')
				],
				'default' => 'isotope'
			]
		);
		
        $this->add_control(
			'resolution',
			[
                'label' => __('Resolution', 'neuron-core'),
                'description' => __('Select the resolution of instagram posts.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'thumbnail' => __('Thumbnail (150x150)', 'neuron-core'),
					'low_resolution' => __('Low (320x320)', 'neuron-core'),
					'standard' => __('Standard (640x640)', 'neuron-core'),
					'standard_resolution' => __('Original', 'neuron-core')
				],
				'default' => 'standard'
			]
        );

        $this->add_control(
			'number',
			[
				'label'   => __('Number', 'neuron-core'),
				'description' => __('Enter the number of instagram posts you want to display.', 'neuron-core'),
				'type'    => Controls_Manager::NUMBER,
				'default' => 6,
				'min'     => 1,
				'max'     => 10000,
				'step'    => 1
			]
		);

		$this->add_control(
			'linking',
			[
				'label' => __('Linking', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes'
			]
		);

		$this->add_control(
			'external',
			[
				'label' => __('External', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [
					'linking' => 'yes'
				]
			]
		);

        $this->end_controls_section();
        
        $this->start_controls_section(
			'layout_tab',
			[
				'label' => __('Layout', 'neuron-core')
			]
        );
        
        $this->add_responsive_control(
			'columns',
			[
                'label' => __('Columns', 'neuron-core'),
                'description' => __('Select the columns of the isotope grid.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 6,
						'step' => 1,
					],
				],
				'desktop_default' => [
					'size' => 3,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 2,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 1,
					'unit' => 'px',
				],
				'condition' => [
					'layout' => 'isotope'
				]
			]
        );
        
        $this->add_control(
			'animation',
			[
                'label' => __('Animation', 'neuron-core'),
                'description' => __('Select initial loading animation for posts.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' 				 	=> __('None', 'neuron-core'),
					'h-fadeInNeuron'	 	=> __('Fade In', 'neuron-core'),
					'h-fadeInUpNeuron' 	  	=> __('Fade In Up', 'neuron-core'),
					'h-fadeInLeftNeuron'  	=> __('Fade In Left', 'neuron-core'),
					'h-fadeInRightNeuron' 	=> __('Fade In Right', 'neuron-core'),
					'h-zoomInNeuron' 	 	=> __('Zoom In', 'neuron-core'),
					'h-preserve3DNeuron' 	=> __('Preserve 3d', 'neuron-core')
				],
				'default' => 'none',
			]
		);

		$this->add_control(
			'animation_delay',
			[
				'label' => __('Animation Delay', 'neuron-core'),
				'description' => __('Activate the delay effect on posts.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [
					'animation!' => 'none'
				]
			]
		);

		$this->add_control(
			'offset',
			[
				'label' => __('Offset', 'neuron-core'),
				'description' => __('Activate an offset layout which will set spacing every second post.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'prefix_class' => 'h-offset--',
				'conditions' => [
					'terms' => [
						[
							'name' => 'layout',
							'operator' => '==',
							'value' => 'isotope',
						],
					],
				]
			]
		);

		$this->add_responsive_control(
			'spacing',
			[
                'label' => __('Spacing', 'neuron-core'),
                'description' => __('Move the slider to set the value of spacing. <br /><small>Note: The value is represented in pixels.</small>', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'condition' => [
					'layout' => 'isotope'
				],
				'size_units' => ['px', 'rem', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .masonry' => 'margin-left: calc(-{{SIZE}}{{UNIT}} / 2); margin-right: calc(-{{SIZE}}{{UNIT}} / 2)',
					'{{WRAPPER}} .masonry .selector' => 'padding-left: calc({{SIZE}}{{UNIT}} / 2); padding-right: calc({{SIZE}}{{UNIT}} / 2); margin-bottom: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}}.h-offset--yes .selector[data-columns="2-columns"]:nth-child(2)' => 'margin-top: {{SIZE}}{{UNIT}} !important', 
					'{{WRAPPER}}.h-offset--yes .selector[data-columns="3-columns"]:nth-child(1)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
					'{{WRAPPER}}.h-offset--yes .selector[data-columns="3-columns"]:nth-child(3)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
					'{{WRAPPER}}.h-offset--yes .selector[data-columns="4-columns"]:nth-child(1)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
					'{{WRAPPER}}.h-offset--yes .selector[data-columns="4-columns"]:nth-child(3)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
					'{{WRAPPER}}.h-offset--yes .selector[data-columns="5-columns"]:nth-child(1)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
					'{{WRAPPER}}.h-offset--yes .selector[data-columns="5-columns"]:nth-child(3)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
					'{{WRAPPER}}.h-offset--yes .selector[data-columns="5-columns"]:nth-child(5)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
					'{{WRAPPER}}.h-offset--yes .selector[data-columns="6-columns"]:nth-child(1)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
					'{{WRAPPER}}.h-offset--yes .selector[data-columns="6-columns"]:nth-child(3)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
					'{{WRAPPER}}.h-offset--yes .selector[data-columns="6-columns"]:nth-child(5)' => 'margin-top: {{SIZE}}{{UNIT}} !important'
				]
			]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'meta_tab',
			[
				'label' => __('Meta', 'neuron-core')
			]
        );
        
        $this->add_control(
			'likes',
			[
				'label' => __('Likes', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'neuron-core'),
				'label_off' => __('Hide', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );
        
        $this->add_control(
			'comments',
			[
				'label' => __('Comments', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'neuron-core'),
				'label_off' => __('Hide', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );

		$this->end_controls_section();
        
        $this->start_controls_section(
			'carousel',
			[
				'label' => __('Carousel', 'neuron-core'),
				'condition' => [
					'layout' => 'carousel'
				]
			]
		);
		
		$this->add_responsive_control(
			'items',
			[
				'label' => __('Items', 'neuron-core'),
				'description' => __('The number of items you want to see on the screen.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 20,
				'step'    => 1
			]
		);

		$this->add_responsive_control(
			'margin',
			[
				'label' => __('Margin', 'neuron-core'),
				'description' => __('Enter the margin space, number will be represented in pixels.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1
			]
		);

		$this->add_control(
			'height',
			[
				'label' => __('Height', 'neuron-core'),
				'description' => __('Set the height of images to auto or full.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'auto' => esc_attr__('Auto', 'neuron-core'),
					'full' => esc_attr__('Full', 'neuron-core')
				],
				'default' => 'auto'
			]
		);

		$this->add_responsive_control(
			'custom_height',
			[
				'label' => __('Custom Height', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['vh', 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .l-posts-wrapper .owl-stage .owl-item .h-full-height-image' => 'height: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'unit' => 'vh',
					'size' => '80'
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					]
				],
				'condition' => [
					'height' => 'full'
				]
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => __('Loop', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'mouse_drag',
			[
				'label' => __('Mouse Drag', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'touch_drag',
			[
				'label' => __('Touch Drag', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => __('Navigation', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'dots',
			[
				'label' => __('Dots', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __('Autoplay', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'pause',
			[
				'label' => __('Pause on mouse house', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_responsive_control(
			'stage_padding',
			[
				'label' => __('Stage Padding', 'neuron-core'),
				'description' => __('Padding left and right on stage (can see neighbours).', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
				'min'     => 0,
				'max'     => 500,
				'step'    => 1
			]
		);

		$this->add_control(
			'start_position',
			[
				'label' => __('Start Position', 'neuron-core'),
				'description' => __('Enter from which element you want to start the position of carousel.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
				'min'     => 0,
				'max'     => 500,
				'step'    => 1
			]
		);

		$this->add_control(
			'autoplay_timeout',
			[
				'label' => __('Auto Play Timeout', 'neuron-core'),
				'description' => __('Autoplay interval timeout, number is represented in seconds.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 0,
				'max'     => 500,
				'step'    => 0.1
			]
		);
		
		$this->add_control(
			'smart_speed',
			[
				'label' => __('Smart Speed', 'neuron-core'),
				'description' => __('Speed Calculate, number is represented in seconds.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 4.5,
				'min'     => 0,
				'max'     => 500,
				'step'    => 0.1
			]
		);

		$this->end_controls_section();

		/**
		 * Style Options
		 */

		/**
		 * Hover
		 */
		$this->start_controls_section(
			'style_hover',
			[
				'label' => __('Hover', 'neuron-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'hover_visibility',
			[
                'label' => __('Visibility', 'neuron-core'),
                'description' => __('Select the visibility of the hover.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'show'	=> __('Show', 'neuron-core'),
					'hide'	=> __('Hide', 'neuron-core')
				],
				'default' => 'show',
			]
		);

		$this->add_control(
			'hover_animation',
			[
                'label' => __('Animation', 'neuron-core'),
                'description' => __('Select the animation of the hover.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'translate'	=> __('Translate', 'neuron-core'),
					'scale'	=> __('Scale', 'neuron-core')
				],
				'default' => 'translate',
				'condition' => [
					'hover_visibility' => 'show'
				]
			]
		);

		$this->add_control(
			'style_hover_active',
			[
				'label' => __('Active Hover', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'after'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'style_hover_background_type',
				'label' => __('Background', 'neuron-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .l-posts-wrapper .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__header__overlay'
			]
		);

		$this->add_control(
			'style_hover_content_vertical_alignment',
			[
				'label' => __('Content Vertical Alignment', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => __('Top', 'neuron-core'),
						'icon' => 'eicon-v-align-top'
					],
					'center' => [
						'title' => __('Middle', 'neuron-core'),
						'icon' => 'eicon-v-align-middle'
					],
					'end' => [
						'title' => __('Bottom', 'neuron-core'),
						'icon' => 'eicon-v-align-bottom'
					]
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'style_hover_content_horizontal_alignment',
			[
				'label' => __('Horizontal Alignment', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'neuron-core'),
						'icon' => 'eicon-h-align-left'
					],
					'center' => [
						'title' => __('Center', 'neuron-core'),
						'icon' => 'eicon-h-align-center'
					],
					'right' => [
						'title' => __('Right', 'neuron-core'),
						'icon' => 'eicon-h-align-right'
					],
				],
				'selectors' => [
					'{{WRAPPER}} .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta' => 'text-align: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Icon
		 */
		$this->start_controls_section(
			'icons_style',
			[
				'label' => __('Icons', 'neuron-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'likes',
							'operator' => '==',
							'value' => 'yes',
						],
						[
							'name' => 'comments',
							'operator' => '==',
							'value' => 'yes'
						], 
					],
				]
			]
		);

		$this->add_responsive_control(
			'icons_size',
			[
                'label' => __('Size', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .l-instagram-wrapper .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta span' => 'font-size: {{SIZE}}{{UNIT}}',
				]
			]
		);

		$this->add_responsive_control(
			'icons_spacing',
			[
                'label' => __('Spacing', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem', '%'],
				'selectors' => [
					'{{WRAPPER}} .l-instagram-wrapper .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta span:first-child' => 'margin-right: {{SIZE}}{{UNIT}}',
				]
			]
		);
		
		$this->add_control(
			'icons_color',
			[
				'label' => __('Color', 'neuron-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .l-instagram-wrapper .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta span' => 'color: {{VALUE}} !important',
				],
			]
		);

        $this->end_controls_section();
    }
    
    /**
     * Instagram Request
     * 
     * Make a request to the instagram api
     * via the wp_remote_get function.
     */
    public function instagram_request($token = '') {
        $your_token = $token ? $token : '3434991361.1677ed0.5f627c211a1d4d4ca9e2d8b3736b2e0b';
 
        // if your app is not approved - always use 'self'
        $ig_user_id = 'self';
        
        // Instagram API connection
        $remote_wp = wp_remote_get("https://api.instagram.com/v1/users/" . $ig_user_id . "/media/recent/?access_token=" . $your_token);
        
        // Instagram response is JSON encoded, let's convert it to an object
        $instagram_response = json_decode($remote_wp['body']);
        
        // 200 OK
        if ($remote_wp['response']['code'] == 200) {
            return $instagram_response->data;
        } elseif ($remote_wp['response']['code'] == 400) {
            return $instagram_response->meta->error_message;
        }
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

		$instagram_data = $this->instagram_request($settings['token']);
		$instagram_new_data = [];
		
		if ($settings['number'] && $instagram_data) {
			if (count($instagram_data) > intval($settings['number'])) {
				$i = 1;
				foreach ($instagram_data as $data) {
					if ($i > intval($settings['number'])) {
						break;
					} 
					$instagram_new_data[$i++] = $data;
				}

				if ($instagram_new_data) {
					$instagram_data = $instagram_new_data;
				}
			}
		}
		?>
		<div class="l-posts-wrapper l-posts-wrapper--meta-inside l-instagram-wrapper">
			<div class="m-media-gallery m-media-gallery--meta-inside">
				<?php 
				if ($instagram_data) {
					if ($settings['layout'] == 'isotope') {
						include(__DIR__ . '/layout/isotope.php');
					} else {
						include(__DIR__ . '/layout/carousel.php');
					}
				}
				?>
			</div>
		</div>
		<?php
	}
}
