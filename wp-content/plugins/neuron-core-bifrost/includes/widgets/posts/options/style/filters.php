<?php 
/**
 * Posts > Style Options > Filters
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;

$this->add_control(
    'posts_style_filters_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .m-filters ul li a' => 'color: {{VALUE}};'
        ]
    ]
);

$this->add_control(
    'posts_style_filters_hover_color',
    [
        'label' => __('Hover & Active', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .m-filters ul li.active a' => 'color: {{VALUE}}; -webkit-box-shadow: inset 0 0 0 rgba(0, 0, 0, 0), 0 1px 0 {{VALUE}} !important; box-shadow: inset 0 0 0 rgba(0, 0, 0, 0), 0 1px 0 {{VALUE}} !important;',
            '{{WRAPPER}} .m-filters ul li:hover a' => 'color: {{VALUE}};',
            '{{WRAPPER}} .m-filters ul li a:hover' => '-webkit-box-shadow: inset 0 0 0 rgba(0, 0, 0, 0), 0 1px 0 {{VALUE}} !important; box-shadow: inset 0 0 0 rgba(0, 0, 0, 0), 0 1px 0 {{VALUE}} !important;',
        ]
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'posts_style_filters_typography',
        'label' => __('Typography', 'neuron-core'),
        'selector' => '{{WRAPPER}} .m-filters ul li a'
    ]
);

$this->add_group_control(
    Group_Control_Text_Shadow::get_type(),
    [
        'name' => 'posts_style_filters_shadow',
        'label' => __('Text Shadow', 'neuron-core'),
        'selector' => '{{WRAPPER}} .m-filters ul li a'
    ]
);

$this->add_responsive_control(
    'posts_style_filters_spacing',
    [
        'label' => __('Spacing', 'neuron-core'),
        'type' => Controls_Manager::SLIDER,
        'size_units' => ['vw', 'px', '%'],
        'selectors' => [
            '{{WRAPPER}} .m-filters ul li' => 'margin-left: {{SIZE}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'posts_style_filters_alignment',
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
        'default' => 'left'
    ]
);