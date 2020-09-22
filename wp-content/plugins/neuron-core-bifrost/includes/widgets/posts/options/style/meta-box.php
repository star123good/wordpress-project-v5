<?php 
/**
 * Posts > Style Options > Meta Box
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

$this->add_responsive_control(
    'posts_style_meta_box_margin',
    [
        'label' => __('Margin', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%'],
        'devices' => ['desktop', 'tablet', 'mobile'],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
        ]
    ]
);

$this->add_responsive_control(
    'posts_style_meta_box_padding',
    [
        'label' => __('Padding', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'devices' => ['desktop', 'tablet', 'mobile'],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
        ],
    ]
);

$this->add_group_control(
    Group_Control_Background::get_type(),
    [
        'name' => 'posts_style_meta_box_background',
        'label' => __('Background', 'neuron-core'),
        'types' => ['classic', 'gradient'],
        'separator' => 'before',
        'selector' => '{{WRAPPER}} .l-posts-wrapper .o-neuron-post__content, {{WRAPPER}} .o-neuron-hover-holder__body-meta'
    ]
);

$this->add_control(
    'posts_style_meta_box_border_type',
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
            '{{WRAPPER}} .o-neuron-post__content' => 'border-style: {{VALUE}}',
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta' => 'border-style: {{VALUE}}'
        ],
    ]
);

$this->add_control(
    'posts_style_meta_box_border_width',
    [
        'label' => __('Border Width', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'condition' => [
            'posts_style_meta_box_border_type!' => 'none'
        ],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__content' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
        ],
    ]
);

$this->add_control(
    'posts_style_meta_box_border_color',
    [
        'label' => __('Border Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'condition' => [
            'posts_style_meta_box_border_type!' => 'none'
        ],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__content' => 'border-color: {{VALUE}}',
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta' => 'border-color: {{VALUE}}'
        ],
    ]
);

$this->add_control(
    'posts_style_meta_box_border_radius',
    [
        'label' => __('Border Radius', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
        ],
    ]
);