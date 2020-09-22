<?php
/**
 * Media Gallery > Style Options > Hover
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

$this->add_control(
    'media_gallery_hover_visibility',
    [
        'label' => __('Visibility', 'neuron-core'),
        'description' => __('Select the visibility of the hover.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'show'	=> __('Show', 'neuron-core'),
            'hide'	=> __('Hide', 'neuron-core')
        ],
        'default' => 'show',
    ]
);

$this->add_control(
    'media_gallery_hover_animation',
    [
        'label' => __('Animation', 'neuron-core'),
        'description' => __('Select the animation of the hover.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'translate'	=> __('Translate', 'neuron-core'),
            'scale'	=> __('Scale', 'neuron-core'),
            'zoom-out' => __('Zoom Out', 'neuron-core')
        ],
        'default' => 'translate',
        'condition' => [
            'media_gallery_hover_visibility' => 'show'
        ]
    ]
);

$this->add_control(
    'media_gallery_style_hover_active',
    [
        'label' => __('Active Hover', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
        'separator' => 'after'
    ]
);

$this->add_group_control(
    Group_Control_Background::get_type(),
    [
        'name' => 'media_gallery_style_hover_background_type',
        'label' => __('Background', 'neuron-core'),
        'types' => ['classic', 'gradient'],
        'selector' => '{{WRAPPER}} .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__header .o-neuron-hover-holder__header__overlay'
    ]
);

$this->add_control(
    'media_gallery_style_hover_content_vertical_alignment',
    [
        'label' => __('Content Vertical Alignment', 'neuron-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
            'start' => [
                'title' => __('Top', 'neuron-core'),
                'icon' => 'eicon-v-align-top'
            ],
            'center' => [
                'title' => __('Middle', 'neuron-core'),
                'icon' => 'eicon-v-align-middle'
            ],
            'end' => [
                'title' => __('Bottom', 'neuron-core'),
                'icon' => 'eicon-v-align-bottom'
            ]
        ],
        'separator' => 'before',
        'condition' => [
            'media_gallery_layout_model!' => 'meta-tooltip',
            'media_gallery_layout_model!' => 'meta-fixed'
        ]
    ]
);