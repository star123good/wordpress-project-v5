<?php
/**
 * Media Gallery > Style Options > Image
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;

$this->add_responsive_control(
    'media_gallery_style_image_margin',
    [
        'label' => __('Margin', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%'],
        'devices' => ['desktop', 'tablet', 'mobile'],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ]
    ]
);

$this->add_responsive_control(
    'media_gallery_style_image_padding',
    [
        'label' => __('Padding', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'devices' => ['desktop', 'tablet', 'mobile'],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'after'
    ]
);

$this->start_controls_tabs(
    'media_gallery_style_image_tabs'
);

$this->start_controls_tab(
    'media_gallery_style_image_normal_tab',
    [
        'label' => __('Normal', 'neuron-core')
    ]
);

$this->add_control(
    'media_gallery_style_image_border_type',
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
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder' => 'border-style: {{VALUE}}'
        ],
    ]
);

$this->add_control(
    'media_gallery_style_image_border_width',
    [
        'label' => __('Border Width', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'condition' => [
            'media_gallery_style_image_border_type!' => 'none'
        ],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
        ],
    ]
);

$this->add_control(
    'media_gallery_style_image_border_color',
    [
        'label' => __('Border Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'condition' => [
            'media_gallery_style_image_border_type!' => 'none'
        ],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder' => 'border-color: {{VALUE}}'
        ],
    ]
);

$this->add_responsive_control(
    'media_gallery_style_image_border_radius',
    [
        'label' => __('Border Radius', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);

$this->add_group_control(
    Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'media_gallery_style_image_box_shadow',
        'label' => __('Box Shadow', 'neuron-core'),
        'selector' => '{{WRAPPER}} .o-neuron-hover-holder',
    ]
);


$this->end_controls_tab();

$this->start_controls_tab(
    'media_gallery_style_image_hover_tab',
    [
        'label' => __('Hover', 'neuron-core')
    ]
);

$this->add_control(
    'media_gallery_style_image_hover_border_type',
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
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder:hover' => 'border-style: {{VALUE}}'
        ],
    ]
);

$this->add_control(
    'media_gallery_style_image_hover_border_width',
    [
        'label' => __('Border Width', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'condition' => [
            'media_gallery_style_image_hover_border_type!' => 'none'
        ],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
        ],
    ]
);

$this->add_control(
    'media_gallery_style_image_hover_border_color',
    [
        'label' => __('Border Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'conditions' => [
            'terms' => [
                [
                    'name' => 'media_gallery_style_image_hover_border_type',
                    'operator' => '!=',
                    'value' => 'none',
                ]
            ]
        ],
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder:hover' => 'border-color: {{VALUE}}'
        ],
    ]
);

$this->add_control(
    'media_gallery_style_image_hover_border_radius',
    [
        'label' => __('Border Radius', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .o-neuron-hover-holder:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);

$this->add_group_control(
    Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'media_gallery_style_image_hover_box_shadow',
        'label' => __('Box Shadow', 'neuron-core'),
        'selector' => '{{WRAPPER}} .o-neuron-hover-holder:hover',
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();