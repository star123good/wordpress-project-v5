<?php 
/**
 * Posts > Content Options > Carousel
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_responsive_control(
    'posts_carousel_items',
    [
        'label' => __('Items', 'neuron-core'),
        'description' => __('The number of items you want to see on the screen.', 'neuron-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 3,
        'min'     => 1,
        'max'     => 20,
        'step'    => 1
    ]
);

$this->add_responsive_control(
    'posts_carousel_margin',
    [
        'label' => __('Margin', 'neuron-core'),
        'description' => __('Enter the margin space, number will be represented in pixels.', 'neuron-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 0,
        'min'     => 0,
        'max'     => 100,
        'step'    => 1
    ]
);

$this->add_control(
    'posts_carousel_height',
    [
        'label' => __('Height', 'neuron-core'),
        'description' => __('Set the height of images to auto or full.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'auto' => esc_attr__('Auto', 'neuron-core'),
            'full' => esc_attr__('Full', 'neuron-core')
        ],
        'default' => 'auto'
    ]
);

$this->add_responsive_control(
    'posts_carousel_custom_height',
    [
        'label' => __('Custom Height', 'neuron-core'),
        'type' => Controls_Manager::SLIDER,
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
            'posts_carousel_height' => 'full'
        ]
    ]
);

$this->add_control(
    'posts_carousel_loop',
    [
        'label' => __('Loop', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
    ]
);

$this->add_control(
    'posts_carousel_mouse_drag',
    [
        'label' => __('Mouse Drag', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->add_control(
    'posts_carousel_touch_drag',
    [
        'label' => __('Touch Drag', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->add_control(
    'posts_carousel_navigation',
    [
        'label' => __('Navigation', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
    ]
);

$this->add_control(
    'posts_carousel_dots',
    [
        'label' => __('Dots', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
    ]
);

$this->add_control(
    'posts_carousel_autoplay',
    [
        'label' => __('Autoplay', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
    ]
);

$this->add_control(
    'posts_carousel_pause',
    [
        'label' => __('Pause on mouse house', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
    ]
);

$this->add_responsive_control(
    'posts_carousel_stage_padding',
    [
        'label' => __('Stage Padding', 'neuron-core'),
        'description' => __('Padding left and right on stage (can see neighbours).', 'neuron-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 0,
        'min'     => 0,
        'max'     => 500,
        'step'    => 1
    ]
);

$this->add_control(
    'posts_carousel_start_position',
    [
        'label' => __('Start Position', 'neuron-core'),
        'description' => __('Enter from which element you want to start the position of carousel.', 'neuron-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 0,
        'min'     => 0,
        'max'     => 500,
        'step'    => 1
    ]
);

$this->add_control(
    'posts_carousel_autoplay_timeout',
    [
        'label' => __('Auto Play Timeout', 'neuron-core'),
        'description' => __('Autoplay interval timeout, number is represented in seconds.', 'neuron-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 2,
        'min'     => 0,
        'max'     => 500,
        'step'    => 0.1
    ]
);

$this->add_control(
    'posts_carousel_smart_speed',
    [
        'label' => __('Smart Speed', 'neuron-core'),
        'description' => __('Speed Calculate, number is represented in seconds.', 'neuron-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 4.5,
        'min'     => 0,
        'max'     => 500,
        'step'    => 0.1
    ]
);