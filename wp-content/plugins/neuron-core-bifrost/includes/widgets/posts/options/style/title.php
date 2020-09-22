<?php 
/**
 * Posts > Style Options > Title
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;

$this->add_control(
    'posts_style_title_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__title a' => 'color: {{VALUE}} !important;',
            '{{WRAPPER}} .o-neuron-post__title a:hover' => '-webkit-box-shadow: inset 0 0 0 rgba(0, 0, 0, 0), 0 1px 0 {{VALUE}} !important; box-shadow: inset 0 0 0 rgba(0, 0, 0, 0), 0 1px 0 {{VALUE}} !important;',
            '.o-neuron-custom-hover .o-neuron-post__title' => 'color: {{VALUE}} !important',
        ],
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'posts_style_title_typography',
        'label' => __('Typography', 'neuron-core'),
        'selector' =>'{{WRAPPER}} .o-neuron-post__title a, .o-neuron-custom-hover .o-neuron-post__title',
    ]
);

$this->add_group_control(
    Group_Control_Text_Shadow::get_type(),
    [
        'name' => 'posts_style_title_shadow',
        'label' => __('Text Shadow', 'neuron-core'),
        'selector' =>'{{WRAPPER}} .o-neuron-post__title a, .o-neuron-custom-hover .o-neuron-post__title'
    ]
);

$this->add_control(
    'posts_style_title_alignment',
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
            '{{WRAPPER}} .o-neuron-post__title' => 'text-align: {{VALUE}}',
        ],
        'condition' => [
            'posts_layout_model!' => 'meta-tooltip',
            'posts_layout_model!' => 'meta-fixed'
        ]
    ]
);