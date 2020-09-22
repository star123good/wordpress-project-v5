<?php
/**
 * Media Gallery > Style Options > Description
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;

$this->add_control(
    'media_gallery_style_description_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .m-media-gallery__item-description' => 'color: {{VALUE}}'
        ]
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'media_gallery_style_description_typography',
        'label' => __('Typography', 'neuron-core'),
        'selector' =>'{{WRAPPER}} .m-media-gallery__item-description'
    ]
);

$this->add_group_control(
    Group_Control_Text_Shadow::get_type(),
    [
        'name' => 'media_gallery_style_description_shadow',
        'label' => __('Text Shadow', 'neuron-core'),
        'selector' =>'{{WRAPPER}} .m-media-gallery__item-description'
    ]
);

$this->add_control(
    'media_gallery_style_description_alignment',
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
            '{{WRAPPER}} .m-media-gallery__item-description' => 'text-align: {{VALUE}}',
        ]
    ]
);