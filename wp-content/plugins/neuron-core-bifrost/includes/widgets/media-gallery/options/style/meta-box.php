<?php
/**
 * Media Gallery > Style Options > Meta box
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

$this->add_responsive_control(
    'media_gallery_style_meta_box_margin',
    [
        'label' => __('Margin', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%'],
        'devices' => ['desktop', 'tablet', 'mobile'],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover__body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ]
    ]
);

$this->add_responsive_control(
    'media_gallery_style_meta_box_padding',
    [
        'label' => __('Padding', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'devices' => ['desktop', 'tablet', 'mobile'],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover__body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_group_control(
    Group_Control_Background::get_type(),
    [
        'name' => 'media_gallery_style_meta_box_background',
        'label' => __('Background', 'neuron-core'),
        'types' => ['classic', 'gradient'],
        'separator' => 'before',
        'selector' => '{{WRAPPER}} .o-neuron-hover__body'
    ]
);

$this->add_control(
    'media_gallery_style_meta_box_border_type',
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
            '{{WRAPPER}} .o-neuron-hover__body' => 'border-style: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'media_gallery_style_meta_box_border_width',
    [
        'label' => __('Border Width', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'condition' => [
            'media_gallery_style_meta_box_border_type!' => 'none'
        ],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover__body' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);

$this->add_control(
    'media_gallery_style_meta_box_border_color',
    [
        'label' => __('Border Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'condition' => [
            'media_gallery_style_meta_box_border_type!' => 'none'
        ],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover__body' => 'border-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'media_gallery_style_meta_box_border_radius',
    [
        'label' => __('Border Radius', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover__body' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);