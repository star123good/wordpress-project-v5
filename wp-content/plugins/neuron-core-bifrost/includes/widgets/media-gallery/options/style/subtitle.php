<?php
/**
 * Media Gallery > Style Options > Subtitle
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;

$this->add_control(
    'media_gallery_style_subtitle_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .m-media-gallery__item--subtitle' => 'color: {{VALUE}} !important',
            '.o-neuron-custom-hover .o-neuron-post__title' => 'color: {{VALUE}} !important'
        ]
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'media_gallery_style_subtitle_typography',
        'label' => __('Typography', 'neuron-core'),
        'selector' =>'{{WRAPPER}} .m-media-gallery__item--subtitle, .o-neuron-custom-hover .o-neuron-post__title'
    ]
);

$this->add_group_control(
    Group_Control_Text_Shadow::get_type(),
    [
        'name' => 'media_gallery_style_subtitle_shadow',
        'label' => __('Text Shadow', 'neuron-core'),
        'selector' => '{{WRAPPER}} .m-media-gallery__item--subtitle, .o-neuron-custom-hover .o-neuron-post__title'
    ]
);

$this->add_control(
    'media_gallery_style_subtitle_alignment',
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
            '{{WRAPPER}} .m-media-gallery__item--subtitle' => 'text-align: {{VALUE}}'
        ],
        'condition' => [
            'media_gallery_layout_model!' => 'meta-tooltip',
            'media_gallery_layout_model!' => 'meta-fixed'
        ]
    ]
);