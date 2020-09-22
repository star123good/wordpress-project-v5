<?php
/**
 * Media Gallery > Style Options > Filters
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;

$this->add_control(
    'media_gallery_style_filters_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .m-filters ul li a' => 'color: {{VALUE}}',
        ]
    ]
);

$this->add_control(
    'media_gallery_style_filters_hover_color',
    [
        'label' => __('Hover & Active', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .m-filters ul li.active a' => 'color: {{VALUE}}',
            '{{WRAPPER}} .m-filters ul li:hover a' => 'color: {{VALUE}}'
        ]
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'media_gallery_style_filters_typography',
        'label' => __('Typography', 'neuron-core'),
        'selector' => '{{WRAPPER}} .m-filters ul li a'
    ]
);

$this->add_group_control(
    Group_Control_Text_Shadow::get_type(),
    [
        'name' => 'media_gallery_style_filters_shadow',
        'label' => __('Text Shadow', 'neuron-core'),
        'selector' => '{{WRAPPER}} .m-filters ul li a'
    ]
);

$this->add_responsive_control(
    'media_gallery_style_filters_spacing',
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
    'media_gallery_style_filters_alignment',
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
        'default' => 'left',
        'selectors' => [
            '{{WRAPPER}} .m-filters' => 'text-align: {{VALUE}}',
        ]
    ]
);

$this->add_responsive_control(
    'media_gallery_style_filters_margin',
    [
        'label' => __('Margin', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%'],
        'devices' => ['desktop', 'tablet', 'mobile'],
        'selectors' => [
            '{{WRAPPER}} .m-filters' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ]
    ]
);