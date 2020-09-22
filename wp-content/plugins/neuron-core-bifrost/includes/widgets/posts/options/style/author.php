<?php 
/**
 * Posts > Style Options > Author
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;

$this->add_control(
    'posts_style_author_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__author' => 'color: {{VALUE}}',
            '{{WRAPPER}} .o-neuron-post__author:hover' => 'box-shadow: inset 0 0 0 rgba('. neuron_hexToRgb('{{VALUE}}') .', 0), 0 1px 0 {{VALUE}} !important'
        ]
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'posts_style_author_typography',
        'label' => __('Typography', 'neuron-core'),
        'selector' =>'{{WRAPPER}} .o-neuron-post__author'
    ]
);

$this->add_group_control(
    Group_Control_Text_Shadow::get_type(),
    [
        'name' => 'posts_style_author_shadow',
        'label' => __('Text Shadow', 'neuron-core'),
        'selector' =>'{{WRAPPER}} .o-neuron-post__author'
    ]
);

$this->add_control(
    'posts_style_author_avatar',
    [
        'label' => __('Avatar', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes'
    ]
);

$this->add_control(
    'posts_style_author_alignment',
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
            ]
        ]
    ]
);