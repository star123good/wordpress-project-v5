<?php
/**
 * Media Gallery > Style Options > Icons
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->start_controls_tabs(
    'media_gallery_style_pagination_button'
);

$this->start_controls_tab(
    'media_gallery_style_icons_normal_tab',
    [
        'label' => __('Normal', 'neuron-core')
    ]
);

$this->add_control(
    'media_gallery_style_icons_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta__social-media ul li a' => 'color: {{VALUE}}',
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta__social-media ul li a:hover' => 'box-shadow: inset 0 0 0 rgba('. neuron_hexToRgb('{{VALUE}}') .', 0), 0 1px 0 {{VALUE}} !important'
        ]
    ]
);


$this->end_controls_tab();

$this->start_controls_tab(
    'media_gallery_style_icons_hover_tab',
    [
        'label' => __('Hover', 'neuron-core')
    ]
);

$this->add_control(
    'media_gallery_style_icons_hover_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta__social-media ul li a:hover' => 'color: {{VALUE}}'
        ]
    ]
);

$this->add_control(
    'media_gallery_style_icons_hover_underline',
    [
        'label' => __('Underline', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta__social-media ul li a:hover' => '-webkit-box-shadow: inset 0 0 0 rgba(0, 166, 231, 0), 0 2px 0 {{VALUE}}; box-shadow: inset 0 0 0 rgba(0, 166, 231, 0), 0 2px 0 {{VALUE}}',
        ]
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_responsive_control(
    'media_gallery_style_icons_size',
    [
        'label' => __('Size', 'neuron-core'),
        'type' => Controls_Manager::SLIDER,
        'size_units' => ['px', 'rem', 'em'],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta__social-media ul li a' => 'font-size: {{SIZE}}{{UNIT}} !important'
        ],
        'separator' => 'before'
    ]
);

$this->add_responsive_control(
    'media_gallery_style_icons_spacing',
    [
        'label' => __('Spacing', 'neuron-core'),
        'size_units' => ['px', 'rem', 'em'],
        'type' => Controls_Manager::SLIDER,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta__social-media ul li' => 'margin-left: {{SIZE}}{{UNIT}}'
        ]
    ]
);

$this->add_control(
    'media_gallery_style_icons_alignment',
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
            '{{WRAPPER}} .o-neuron-hover-holder__body-meta__social-media ul' => 'text-align: {{VALUE}}'
        ]
    ]
);