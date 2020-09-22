<?php
namespace NeuronElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class NeuronInteractivePosts extends Widget_Base {

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
		return 'neuron-interactive-posts';
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
		return __('Interactive Posts', 'neuron-core');
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
		return 'eicon-gallery-grid neuron-badge';
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
			'functionality',
			[
				'label' => __('Functionality', 'neuron-core')
			]
        );

        $this->add_control(
			'post_type',
			[
                'label' => __('Post Type', 'neuron-core'),
                'description' => __('Select the post type that you want to get on your interactive posts element.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'post' => __('Post', 'neuron-core'),
                    'portfolio' => __('Portfolio', 'neuron-core'),
                    'product' => __('Product', 'neuron-core')
				],
				'default' => 'post'
			]
        );

        $this->add_control(
			'layout',
			[
                'label' => __('Layout', 'neuron-core'),
                'description' => __('Select initial loading animation for posts.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'inline'			=> __('Inline', 'neuron-core'),
					'block' 			=> __('Block', 'neuron-core'),
				],
				'default' => 'inline',
			]
        );

        /**
		 * Normal Query
		 */
		$this->add_control(
			'query_post',
			[
				'label' => __('Query', 'neuron-core'),
				'description' => __('Select the categories you want to get the posts from. <br /> <small> Note: If no category is selected all posts will be displayed.</small>', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => $this->neuron_get_taxonomies('category'),
				'multiple' => true,
				'conditions' => [
					'terms' => [
						[
							'name' => 'post_type',
							'operator' => '==',
							'value' => 'post',
						],
					],
				]
			]
        );
        
		$this->add_control(
			'query_portfolio',
			[
				'label' => __('Query', 'neuron-core'),
				'description' => __('Select the categories you want to get the posts from. <br /> <small> Note: If no category is selected all posts will be displayed.</small>', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => $this->neuron_get_taxonomies('portfolio_category'),
				'multiple' => true,
				'conditions' => [
					'terms' => [
						[
							'name' => 'post_type',
							'operator' => '==',
							'value' => 'portfolio',
						],
					],
				]
			]
        );
        
        $this->add_control(
			'query_product',
			[
				'label' => __('Query', 'neuron-core'),
				'description' => __('Select the categories you want to get the products from. <br /> <small> Note: If no category is selected all products will be displayed.</small>', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => $this->neuron_get_taxonomies('product_cat'),
				'multiple' => true,
				'conditions' => [
					'terms' => [
						[
							'name' => 'post_type',
							'operator' => '==',
							'value' => 'product',
						],
					],
				]
			]
        );
        
        $this->add_control(
			'posts_per_page',
			[
				'label'   => __('Posts Per Page', 'neuron-core'),
				'description' => __('Enter the number of posts you want to display on the first page.', 'neuron-core'),
				'type'    => Controls_Manager::NUMBER,
				'default' => 10,
				'min'     => 1,
				'max'     => 10000,
				'step'    => 1
			]
		);


        $this->end_controls_section();
        
        $this->start_controls_section(
			'layout_style',
			[
				'label' => __('Layout', 'neuron-core')
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
				'default' => 'h-fadeInNeuron',
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

		$this->add_responsive_control(
			'columns',
			[
                'label' => __('Columns', 'neuron-core'),
                'description' => __('Select the columns of the interactive posts grid.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1-column' => __('1 Column', 'neuron-core'),
					'2-columns' => __('2 Columns', 'neuron-core'),
					'3-columns' => __('3 Columns', 'neuron-core'),
					'4-columns' => __('4 Columns', 'neuron-core'),
					'5-columns' => __('5 Columns', 'neuron-core'),
					'6-columns' => __('6 Columns', 'neuron-core')
				],
				'default' => '3-columns',
				'tablet_default' => '2-columns',
        		'mobile_default' => '1-column',
				'condition' => [
                    'layout' => 'block'
                ],
			]
		);

        $this->add_control(
			'separator_visibility',
			[
				'label' => __('Separator', 'neuron-core'),
				'description' => __('Add a separator between interactive items.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'neuron-core'),
				'label_off' => __('Hide', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'yes'
			]
		);

        $this->add_control(
			'first_active',
			[
				'label' => __('First Active', 'neuron-core'),
				'description' => __('Make the first item active.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'yes',
				'render_type' => 'template'
			]
		);

        $this->add_control(
			'mouseout',
			[
				'label' => __('Mouse Out', 'neuron-core'),
				'description' => __('Hide the image when the mouse is outside the item.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
				'render_type' => 'template'
			]
		);
        
        $this->add_responsive_control(
			'horizontal_spacing',
			[
                'label' => __('Horizontal Spacing', 'neuron-core'),
                'description' => __('Move the slider to set the value of spacing.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .l-interactive-posts-wrapper .o-interactive-item:not(:last-of-type)' => 'margin-right: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'layout' => 'inline'
				],
				'separator' => 'before'
			]
        );

        $this->add_responsive_control(
			'vertical_spacing',
			[
                'label' => __('Vertical Spacing', 'neuron-core'),
                'description' => __('Move the slider to set the value of spacing.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .l-interactive-posts-wrapper .o-interactive-item' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'layout' => 'inline'
                ]
			]
		);
		
		$this->add_responsive_control(
			'blocks_spacing',
			[
                'label' => __('Spacing', 'neuron-core'),
                'description' => __('Move the slider to set the value of spacing.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .l-interactive-posts-wrapper .masonry' => 'margin-left: calc(-{{SIZE}}{{UNIT}} / 2); margin-right: calc(-{{SIZE}}{{UNIT}} / 2)',
					'{{WRAPPER}} .l-interactive-posts-wrapper .masonry .selector' => 'padding-left: calc({{SIZE}}{{UNIT}} / 2); padding-right: calc({{SIZE}}{{UNIT}} / 2);  margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'layout' => 'block'
				],
				'separator' => 'before'
			]
        );

		$this->end_controls_section();

		/**
         * Meta
         */
        $this->start_controls_section(
            'meta_style',
            [
                'label' => __('Meta', 'neuron-core')
            ]
        );
		
		$this->add_control(
			'category_visibility',
			[
				'label' => __('Category', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'neuron-core'),
				'label_off' => __('Hide', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no'
			]
		);

        $this->end_controls_section();
        
        /**
         * Separator
         */
        $this->start_controls_section(
            'separator_style',
            [
                'label' => __('Separator', 'neuron-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'separator_visibility' => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
            'separator_spacing',
            [
                'label' => __('Spacing', 'neuron-core'),
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'vh'],
                'selectors' => [
                    '{{WRAPPER}} .o-interactive-item-inner' => 'padding-right: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $this->add_responsive_control(
            'separator_width',
            [
                'label' => __('Width', 'neuron-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .l-interactive-posts-wrapper .o-interactive-item:not(:last-of-type) .o-interactive-item-inner:after' => 'width: {{SIZE}}{{UNIT}}'
                ],
            ]
        );

        $this->add_responsive_control(
            'separator_height',
            [
                'label' => __('Height', 'neuron-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'vh'],
                'selectors' => [
                    '{{WRAPPER}} .l-interactive-posts-wrapper .o-interactive-item:not(:last-of-type) .o-interactive-item-inner:after' => 'height: {{SIZE}}{{UNIT}}'
                ],
            ]
        );

        $this->add_control(
            'separator_color',
            [
                'label' => __('Color', 'neuron-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .l-interactive-posts-wrapper .o-interactive-item:not(:last-of-type) .o-interactive-item-inner:after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'separator_horizontal_alignment',
            [
                'label' => __('Horizontal Alignment', 'neuron-core'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'top' => [
                        'title' => __('Top', 'neuron-core'),
                        'icon' => 'eicon-v-align-top'
                    ],
                    'middle' => [
                        'title' => __('Middle', 'neuron-core'),
                        'icon' => 'eicon-v-align-middle'
                    ],
                    'bottom' => [
                        'title' => __('Bottom', 'neuron-core'),
                        'icon' => 'eicon-v-align-bottom'
                    ]
                ],
                'default' => 'middle',
                'prefix_class' => 'l-interactive-posts-wrapper--'
            ]
        );

        $this->end_controls_section();

        /**
         * Title
         */
        $this->start_controls_section(
            'title_style',
            [
                'label' => __('Title', 'neuron-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'title_color',
			[
				'label' => __('Color', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .o-interactive-item--title a' => 'color: {{VALUE}} !important',
				]
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'neuron-core'),
				'selector' =>'
				{{WRAPPER}} .o-interactive-item--title a',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'label' => __('Text Shadow', 'neuron-core'),
				'selector' =>'{{WRAPPER}} .o-interactive-item--title a'
			]
		);

		$this->end_controls_section();

		/**
         * Category
         */
        $this->start_controls_section(
            'category_style',
            [
                'label' => __('Category', 'neuron-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'category_visibility' => 'yes'
				]
            ]
        );

        $this->add_control(
			'category_color',
			[
				'label' => __('Color', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .o-interactive-item--category' => 'color: {{VALUE}} !important',
				]
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'label' => __('Typography', 'neuron-core'),
				'selector' => '{{WRAPPER}} .o-interactive-item--holder .o-interactive-item--category'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'category_shadow',
				'label' => __('Text Shadow', 'neuron-core'),
				'selector' =>'{{WRAPPER}} .o-interactive-item--holder .o-interactive-item--category'
			]
		);

		$this->end_controls_section();
		
		/**
         * Box
         */
        $this->start_controls_section(
            'box_style',
            [
                'label' => __('Box', 'neuron-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => 'block'
				]
            ]
		);
		
		$this->add_responsive_control(
			'height',
			[
                'label' => __('Height', 'neuron-core'),
                'description' => __('Move the slider to set the height of interactive item.', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem', 'vh'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .l-interactive-posts-wrapper .o-interactive-item' => 'height: {{SIZE}}{{UNIT}};',
                ]
			]
		);

		$this->start_controls_tabs(
			'box_background_tabs'
		);

		$this->start_controls_tab(
			'box_background_tab_normal',
			[
				'label' => __('Normal', 'neuron-core')
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background',
				'label' => __('Background', 'neuron-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .o-interactive-item-inner'
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_background_tab_hover',
			[
				'label' => __('Hover & Active', 'neuron-core')
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background_active',
				'label' => __('Active & Hover', 'neuron-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .l-interactive-posts-wrapper .o-interactive-item.o-interactive-item--active .o-interactive-item-inner'
			] 
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'neuron-core'),
				'selector' => '{{WRAPPER}} .o-interactive-item-inner',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'content_horizontal_alignment',
			[
				'label' => __('Horizontal Alignment', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => __('Left', 'neuron-core'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'neuron-core'),
						'icon' => 'fa fa-align-center',
					],
					'flex-end' => [
						'title' => __('Right', 'neuron-core'),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .o-interactive-item-inner' => 'display: flex; justify-content: {{VALUE}};',
                ],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'content_vertical_alignment',
			[
				'label' => __('Vertical Alignment', 'neuron-core'),
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
					'flex-end' => [
						'title' => __('Bottom', 'neuron-core'),
						'icon' => 'eicon-v-align-bottom'
					]
				],
				'selectors' => [
					'{{WRAPPER}} .o-interactive-item-inner' => 'display: flex; align-items: {{VALUE}};',
                ],
			]
		);

		$this->add_responsive_control(
			'content_spacing',
			[
				'label' => __('Spacing', 'neuron-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'rem', 'em'],
				'selectors' => [
					'{{WRAPPER}} .o-interactive-item-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);

		$this->end_controls_section();
		
		/**
         * Image
         */
        $this->start_controls_section(
            'image_style',
            [
                'label' => __('Image', 'neuron-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
		);

		$this->add_responsive_control(
			'image_size',
			[
                'label' => __('Size', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'selectors' => [
					'.o-image--meta-interactive' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                ]
			]
		);
		
		$this->add_responsive_control(
			'image_horizontal_position',
			[
                'label' => __('Horizontal Position', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'default' => [
					'unit' => '%'
				],
				'selectors' => [
					'.o-image--meta-interactive' => 'left: {{SIZE}}{{UNIT}}',
                ]
			]
		);
		
		$this->add_responsive_control(
			'image_vertical_position',
			[
                'label' => __('Vertical Position', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'default' => [
					'unit' => '%'
				],
				'selectors' => [
					'.o-image--meta-interactive' => 'top: {{SIZE}}{{UNIT}}',
                ]
			]
		);
		
		$this->add_control(
			'image_offset',
			[
				'label' => __('Offset', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'neuron-core'),
				'label_off' => __('Off', 'neuron-core'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

        $this->end_controls_section();
    }
    
    function neuron_get_taxonomies($terms = 'category') {
        $post_categories = [];
        $terms = get_terms($terms);

        if ($terms && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $post_categories[$term->slug] = $term->name;    
            }
        }
        
        return $post_categories;
    }

    function neuron_get_posts($posts = 'post') {
        $posts_output = [];
        $posts = get_posts(['post_type' => $posts, 'posts_per_page' => -1]);

        if ($posts) {
            foreach ($posts as $post) {
                $posts_output[$post->ID] = $post->post_title;
            }
        }
        
        return $post_output;
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
		$neuron_interactive_wrapper_class = ['l-posts-wrapper', 'l-interactive-posts-wrapper'];

		/**
		 * Posts Type
		 */
		switch ($settings['post_type']) {
			default:
				$neuron_posts_type = 'post';
				$neuron_posts_taxonomy = 'category';
				$neuron_posts_normal_query = $settings['query_post'];
				break;
			case 'portfolio':
				$neuron_posts_type = 'portfolio';
				$neuron_posts_taxonomy = 'portfolio_category';
				$neuron_posts_normal_query = $settings['query_portfolio'];
				break;
			case 'product':
				$neuron_posts_type = 'product';
				$neuron_posts_taxonomy = 'product_cat';
				$neuron_posts_normal_query = $settings['query_product'];
				break;
		}

		/**
         * Paged
         * 
         * Tell the WordPress exactly
         * what page is active.
         */
		if (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		
		/**
         * Loop Operator
         * 
         * Show all posts incase no
         * category is selected. Works
		 * only when isotope is selected.
         */
		if ($neuron_posts_normal_query) {
			$loop_operator = "IN";
		} else {
			$loop_operator = "NOT IN";
		}

		/**
		 * Image Offset
		 */
		if ($settings['image_offset'] == 'yes') {
			$neuron_interactive_wrapper_class[] = 'l-interactive-posts-wrapper--image-offset';
		}

		/**
		 * Query
		 */
        $args = [
            'post_type' => $neuron_posts_type,
            'posts_per_page' => $settings['posts_per_page'],
            'paged' => $paged,
            'tax_query' => [
                [
                    'taxonomy' => $neuron_posts_taxonomy,
                    'field' => 'slug',
                    'terms' => $neuron_posts_normal_query,
                    'operator' => $loop_operator
                ]
            ],
        ];

		$neuron_filter = isset($_GET['filter']) ? $_GET['filter'] : '';
		$neuron_exclude = isset($_GET['exclude']) ? $_GET['exclude'] : '';

		if ($neuron_filter) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => $neuron_posts_taxonomy,
					'field' => 'slug',
					'terms' => $neuron_filter
				)
			);
		}

		if ($neuron_exclude) {
			$args['post__not_in'] = $neuron_exclude;
		}

		$query = new \WP_Query($args);

		if ($query->have_posts()) :
	?>
		<div class="<?php echo esc_attr(implode(' ', $neuron_interactive_wrapper_class)) ?>" data-posts="<?php echo esc_attr($this->get_ID()) ?>" data-active="<?php echo esc_attr($settings['first_active']) ?>" data-mouseout="<?php echo esc_attr($settings['mouseout']) ?>">
            <?php include(__DIR__ . '/layout/default.php') ?>
        </div>
        <?php
		endif; wp_reset_postdata();
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
