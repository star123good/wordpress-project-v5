<?php 
/**
 * Posts > Style Options > Post Box
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;

$this->add_control(
    'posts_style_post_box_border_type',
    [
        'label' => __('Border Type', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'none' => __('None', 'neuron-core'),
            'solid' => __('Solid', 'neuron-core'),
            'double' => __('Double', 'neuron-core'),
            'dotted' => __('Dotted', 'neuron-core'),
            'dashed' => __('Dashed', 'neuron-core'),
            'groove' => __('Groove', 'neuron-core')
        ],
        'default' => 'none',
        'separator' => 'before',
        'selectors' => [
            '{{WRAPPER}} .o-post' => 'border-style: {{VALUE}}'
        ],
    ]
);

$this->add_control(
    'posts_style_post_box_border_width',
    [
        'label' => __('Border Width', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'condition' => [
            'posts_style_post_box_border_type!' => 'none'
        ],
        'selectors' => [
            '{{WRAPPER}} .o-post' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
        ],
    ]
);

$this->add_control(
    'posts_style_post_box_border_color',
    [
        'label' => __('Border Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'condition' => [
            'posts_style_post_box_border_type!' => 'none'
        ],
        'selectors' => [
            '{{WRAPPER}} .o-post' => 'border-color: {{VALUE}}'
        ],
    ]
);

$this->add_control(
    'posts_style_post_box_border_radius',
    [
        'label' => __('Border Radius', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .o-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);

$this->add_group_control(
    Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'posts_style_post_box_box_shadow',
        'label' => __('Box Shadow', 'neuron-core'),
        'selector' => '{{WRAPPER}} .o-post',
    ]
);