<?php 
/**
 * Posts > Style Options > Meta
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;

$this->add_control(
    'posts_style_meta_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__meta ul li a' => 'color: {{VALUE}} !important',
            '{{WRAPPER}} .o-neuron-post__meta ul li a:hover' => 'box-shadow: inset 0 0 0 rgba('. neuron_hexToRgb('{{VALUE}}') .', 0), 0 1px 0 {{VALUE}} !important',
            '.o-neuron-custom-hover .o-neuron-post__meta' => 'color: {{VALUE}} !important',
        ]
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'posts_style_meta_typography',
        'label' => __('Typography', 'neuron-core'),
        'selector' => '{{WRAPPER}} .o-neuron-post__meta, .o-neuron-custom-hover .o-neuron-post__meta'
    ]
);

$this->add_group_control(
    Group_Control_Text_Shadow::get_type(),
    [
        'name' => 'posts_style_meta_shadow',
        'label' => __('Text Shadow', 'neuron-core'),
        'selector' => '{{WRAPPER}} .o-neuron-post__meta, .o-neuron-custom-hover .o-neuron-post__meta'
    ]
);

$this->add_control(
    'posts_style_meta_icon',
    [
        'label' => __('Icon', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
        'condition' => [
            'posts_type!' => 'product',
            'posts_layout_model!' => 'meta-tooltip',
            'posts_layout_model!' => 'meta-fixed'
        ]
    ]
);

$this->add_control(
    'posts_style_meta_icon_color',
    [
        'label' => __('Icon Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__meta-icon svg' => 'stroke: {{VALUE}} !important'
        ],
        'condition' => [
            'posts_type!' => 'product',
            'posts_style_meta_icon' => 'yes'
        ]
    ]
);

$this->add_responsive_control(
    'posts_style_meta_icon_size',
    [
        'label' => __('Icon Size', 'neuron-core'),
        'type' => Controls_Manager::SLIDER,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__meta-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'posts_type!' => 'product',
            'posts_style_meta_icon' => 'yes'
        ]
    ]
);

$this->add_responsive_control(
    'posts_style_meta_icon_spacing',
    [
        'label' => __('Icon Spacing', 'neuron-core'),
        'type' => Controls_Manager::SLIDER,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-post__meta-icon svg' => 'margin-right: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'posts_type!' => 'product',
            'posts_style_meta_icon' => 'yes'
        ]
    ]
);

$this->add_control(
    'posts_style_meta_alignment',
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
        'separator' => 'before',
        'selectors' => [
            '{{WRAPPER}}  .o-neuron-post__meta' => 'text-align: {{VALUE}}'
        ],
        'condition' => [
            'posts_layout_model!' => 'meta-tooltip',
            'posts_layout_model!' => 'meta-fixed'
        ]
    ]
);