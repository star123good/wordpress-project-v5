<?php 
/**
 * Posts > Style Options > Hover
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

$this->add_control(
    'posts_hover_visibility',
    [
        'label' => __('Visibility', 'neuron-core'),
        'description' => __('Select the visibility of the hover.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'show'	=> __('Show', 'neuron-core'),
            'hide'	=> __('Hide', 'neuron-core')
        ],
        'default' => 'show'
    ]
);

$this->add_control(
    'posts_hover_animation',
    [
        'label' => __('Animation', 'neuron-core'),
        'description' => __('Select the animation of the hover.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'translate'	=> __('Translate', 'neuron-core'),
            'scale'	=> __('Scale', 'neuron-core'),
            'zoom-out'	=> __('Zoom Out', 'neuron-core')
        ],
        'default' => 'translate',
        'condition' => [
            'posts_hover_visibility' => 'show'
        ]
    ]
);

$this->add_control(
    'posts_style_hover_active',
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
        'name' => 'posts_style_hover_background_type',
        'label' => __('Background', 'neuron-core'),
        'types' => ['classic', 'gradient'],
        'selector' => '{{WRAPPER}} .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__header .o-neuron-hover-holder__header__overlay'
    ]
);

$this->add_control(
    'posts_style_hover_meta_vertical_alignment',
    [
        'label' => __('Meta Vertical Alignment', 'neuron-core'),
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
        'condition' => [
            'posts_layout_model' => 'meta-inside',
        ],
        'separator' => 'before'
    ]
);

$this->add_control(
    'posts_style_hover_icon',
    [
        'label' => __('Icon', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
        'conditions' => [
           'terms' => [
                [
                    'name' => 'posts_layout_model',
                    'operator' => '!=',
                    'value' => 'meta-tooltip'
                ],
                [
                    'name' => 'posts_layout_model',
                    'operator' => '!=',
                    'value' => 'meta-fixed'
                ],
                [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'posts_layout_model',
                            'operator' => '==',
                            'value' => 'meta-outside'
                        ],
                        [
                            'name' => 'posts_type',
                            'operator' => '==',
                            'value' => 'product'
                        ]
                    ],
                ]
            ]
        ],
        'separator' => 'before'
    ]
);

$this->add_control(
    'posts_style_hover_icon_vertical_alignment',
    [
        'label' => __('Vertical Alignment', 'neuron-core'),
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
        'conditions' => [
            'terms' => [
                [
                    'name' => 'posts_style_hover_icon',
                    'operator' => '==',
                    'value' => 'yes'
                ],
                [
                    'name' => 'posts_layout_model',
                    'operator' => '!=',
                    'value' => 'meta-tooltip'
                ],
                [
                    'name' => 'posts_layout_model',
                    'operator' => '!=',
                    'value' => 'meta-fixed'
                ],
                [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'posts_layout_model',
                            'operator' => '==',
                            'value' => 'meta-outside'
                        ],
                        [
                            'name' => 'posts_type',
                            'operator' => '==',
                            'value' => 'product'
                        ]
                    ],
                ]
            ]
        ]
    ]
);

$this->add_control(
    'posts_style_hover_icon_horizontal_alignment',
    [
        'label' => __('Horizontal Alignment', 'neuron-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
            'start' => [
                'title' => __('Left', 'neuron-core'),
                'icon' => 'eicon-h-align-left'
            ],
            'center' => [
                'title' => __('Center', 'neuron-core'),
                'icon' => 'eicon-h-align-center'
            ],
            'end' => [
                'title' => __('Right', 'neuron-core'),
                'icon' => 'eicon-h-align-right'
            ],
        ],
        'conditions' => [
            'terms' => [
                [
                    'name' => 'posts_style_hover_icon',
                    'operator' => '==',
                    'value' => 'yes'
                ],
                [
                    'name' => 'posts_type',
                    'operator' => '!=',
                    'value' => 'product'
                ],
                [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'posts_layout_model',
                            'operator' => '==',
                            'value' => 'meta-outside'
                        ],
                        
                    ],
                ]
            ]
        ]
    ]
);

$this->start_controls_tabs(
    'posts_style_hover_icon_tabs'
);

$this->start_controls_tab(
    'posts_style_hover_icon_tabs_normal',
    [
        'label' => __('Normal', 'neuron-core'),
        'condition' => [
            'posts_type' => 'product',
            'posts_layout_model!' => 'meta-tooltip',
            'posts_layout_model!' => 'meta-fixed',
            'posts_style_hover_icon' => 'yes'
        ]
    ]
);

$this->add_control(
    'posts_style_hover_icon_color',
    [
        'label' => __('Icon Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron__post-icon svg' => 'stroke: {{VALUE}} !important',
            '{{WRAPPER}} .o-neuron__post-icon' => 'color: {{VALUE}} !important'
        ],
        'conditions' => [
            'terms' => [
                [
                    'name' => 'posts_style_hover_icon',
                    'operator' => '==',
                    'value' => 'yes'
                ],
                [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'posts_layout_model',
                            'operator' => '==',
                            'value' => 'meta-outside'
                        ],
                        [
                            'name' => 'posts_type',
                            'operator' => '==',
                            'value' => 'product'
                        ]
                    ],
                ]
            ]
        ]
    ]
);

$this->add_control(
    'posts_style_hover_icon_background_color',
    [
        'label' => __('Icon Background Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron__post-icon' => 'background-color: {{VALUE}} !important'
        ],
        'condition' => [
            'posts_style_hover_icon' => 'yes',
            'posts_type' => 'product'
        ]
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'posts_style_hover_icon_tabs_hover',
    [
        'label' => __('Hover', 'neuron-core'),
        'condition' => [
            'posts_type' => 'product',
            'posts_layout_model!' => 'meta-tooltip',
            'posts_layout_model!' => 'meta-fixed',
            'posts_style_hover_icon' => 'yes'
        ]
    ]
);

$this->add_control(
    'posts_style_hover_icon_hover_color',
    [
        'label' => __('Icon Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron__post-icon:hover svg' => 'stroke: {{VALUE}} !important',
            '{{WRAPPER}} .o-neuron__post-icon:hover' => 'color: {{VALUE}} !important'
        ],
    ]
);

$this->add_control(
    'posts_style_hover_icon_background_hover_color',
    [
        'label' => __('Icon Background Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .o-neuron__post-icon:hover' => 'background-color: {{VALUE}} !important'
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();