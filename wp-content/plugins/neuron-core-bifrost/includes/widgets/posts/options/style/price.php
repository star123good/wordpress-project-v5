<?php 
/**
 * Posts > Style Options > Price
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;

$this->add_control(
    'posts_style_price_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__price' => 'color: {{VALUE}}',
        ]
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'posts_style_price_typography',
        'label' => __('Typography', 'neuron-core'),
        'selector' =>'{{WRAPPER}} .o-neuron-post__price'
    ]
);

$this->add_group_control(
    Group_Control_Text_Shadow::get_type(),
    [
        'name' => 'posts_style_price_shadow',
        'label' => __('Text Shadow', 'neuron-core'),
        'selector' =>'{{WRAPPER}} .o-neuron-post__price'
    ]
);

$this->add_control(
    'posts_style_price_alignment',
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
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__price' => 'text-align: {{VALUE}}'
        ]
    ]
);