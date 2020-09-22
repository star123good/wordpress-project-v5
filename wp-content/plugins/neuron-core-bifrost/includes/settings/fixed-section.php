<?php
/**
 * Section > Fixed Options 
 */

$section->add_control(
    'section_fixed',
    [
        'label' => __('Fixed', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
        'prefix_class' => 'neuron-fixed-',
    ]
);

$section->add_control(
    'section_fixed_hidden',
    [
        'label' => __('Hidden', 'neuron-core'),
        'description' => __('<small>Note: Do not forget to place a hamburger to open this section, use navigator for easier orientation.</small>', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
        'condition' => [
            'section_fixed' => 'yes'
        ],
        'prefix_class' => 'neuron-fixed-hidden-',
    ]
);

$section->add_control(
    'section_fixed_hidden_animation',
    [
        'label' => __('Animation', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'fade-in' => __('Fade In', 'neuron-core'),
            'fade-in-left' => __('Fade In Left', 'neuron-core'),
            'fade-in-right' => __('Fade In Right', 'neuron-core'),
        ],
        'conditions' => [
            'terms' => [
                [
                    'name' => 'section_fixed',
                    'operator' => '==',
                    'value' => 'yes'
                ],
                [
                    'name' => 'section_fixed_hidden',
                    'operator' => '==',
                    'value' => 'yes'
                ],
            ]
        ],
        'prefix_class' => 'neuron-fixed-hidden-yes--',
        'default' => 'fade-in'
    ]
);

$section->add_control(
    'section_fixed_width',
    [
        'label' => __('Width', 'neuron-core'),
        'description' => __('Move the slider to set the width of fixed section.', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'condition' => [
            'section_fixed' => 'yes'
        ],
        'size_units' => ['px', 'rem', '%'],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 500,
                'step' => 1,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}}' => 'width: 100%; max-width: {{SIZE}}{{UNIT}}'
        ] 
    ]
);

$section->add_control(
    'section_fixed_alignment',
    [
        'label' => __('Alignment', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
            'left' => [
                'title' => __('Left', 'neuron-core'),
                'icon' => 'fa fa-align-left',
            ],
            'right' => [
                'title' => __('Right', 'neuron-core'),
                'icon' => 'fa fa-align-right',
            ],
        ],
        'default' => 'left',
        'toggle' => true,
        'label_block' => false,
        'condition' => [
            'section_fixed' => 'yes'
        ],
        'prefix_class' => 'neuron-fixed-alignment-',
    ]
);

$section->add_control(
    'section_fixed_close_button',
    [
        'label' => __('Close Button', 'neuron-core'),
        'description' => __('If the close button doesn\'t appears, please refresh the page.', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'close-button',
        'default' => 'no',
        'conditions' => [
            'terms' => [
                [
                    'name' => 'section_fixed',
                    'operator' => '==',
                    'value' => 'yes'
                ],
                [
                    'name' => 'section_fixed_hidden',
                    'operator' => '==',
                    'value' => 'yes'
                ],
            ]
        ],
        'prefix_class' => 'neuron-fixed-hidden-yes--',
        'render_type' => 'template',
    ]
);

$section->add_control(
    'section_fixed_close_button_heading',
    [
        'label' => __('Close Button', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
        'conditions' => [
            'terms' => [
                [
                    'name' => 'section_fixed_close_button',
                    'operator' => '==',
                    'value' => 'close-button'
                ],
                [
                    'name' => 'section_fixed_hidden',
                    'operator' => '==',
                    'value' => 'yes'
                ],
            ]
        ],
    ]
);

$section->add_control(
    'section_fixed_close_button_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .a-close-button svg' => 'color: {{VALUE}}',
        ],
        'conditions' => [
            'terms' => [
                [
                    'name' => 'section_fixed_close_button',
                    'operator' => '==',
                    'value' => 'close-button'
                ],
                [
                    'name' => 'section_fixed_hidden',
                    'operator' => '==',
                    'value' => 'yes'
                ],
            ]
        ],
    ]
);

$section->add_control(
    'section_fixed_close_button_size',
    [
        'label' => __('Size', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px', 'rem', '%'],
        'selectors' => [
            '{{WRAPPER}} .a-close-button svg' => 'width: {{SIZE}}{{UNIT}} !important; height: {{SIZE}}{{UNIT}} !important'
        ],
        'range' => [
            'px' => [
                'max' => 400
            ]
        ],
        'conditions' => [
            'terms' => [
                [
                    'name' => 'section_fixed_close_button',
                    'operator' => '==',
                    'value' => 'close-button'
                ],
                [
                    'name' => 'section_fixed_hidden',
                    'operator' => '==',
                    'value' => 'yes'
                ],
            ]
        ],
    ]
);

$section->add_control(
    '_offset_orientation_h',
    [
        'label' => __('Horizontal Orientation', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'label_block' => false,
        'toggle' => false,
        'default' => 'start',
        'options' => [
            'start' => [
                'title' => __('Start', 'neuron-core'),
                'icon' => 'eicon-h-align-left',
            ],
            'end' => [
                'title' => __('End', 'neuron-core'),
                'icon' => 'eicon-h-align-right',
            ],
        ],
        'classes' => 'elementor-control-start-end',
        'render_type' => 'ui',
        'condition' => [
            'section_fixed_close_button' => 'close-button'
        ]
    ]
);

$section->add_responsive_control(
    '_offset_x',
    [
        'label' => __('Offset', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
            'px' => [
                'min' => -1000,
                'max' => 1000,
                'step' => 1,
            ],
            '%' => [
                'min' => -200,
                'max' => 200,
            ],
            'vw' => [
                'min' => -200,
                'max' => 200,
            ],
            'vh' => [
                'min' => -200,
                'max' => 200,
            ],
        ],
        'default' => [
            'size' => '0',
        ],
        'size_units' => [ 'px', '%', 'vw', 'vh' ],
        'selectors' => [
            '{{WRAPPER}} .a-close-button' => 'left: {{SIZE}}{{UNIT}}',
        ],
        'condition' => [
            '_offset_orientation_h!' => 'end',
            'section_fixed_close_button' => 'close-button'
        ],
    ]
);

$section->add_responsive_control(
    '_offset_x_end',
    [
        'label' => __('Offset', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
            'px' => [
                'min' => -1000,
                'max' => 1000,
                'step' => 0.1,
            ],
            '%' => [
                'min' => -200,
                'max' => 200,
            ],
            'vw' => [
                'min' => -200,
                'max' => 200,
            ],
            'vh' => [
                'min' => -200,
                'max' => 200,
            ],
        ],
        'default' => [
            'size' => '0',
        ],
        'size_units' => [ 'px', '%', 'vw', 'vh' ],
        'selectors' => [
            '{{WRAPPER}} .a-close-button' => 'right: {{SIZE}}{{UNIT}}',
        ],
        'condition' => [
            '_offset_orientation_h' => 'end',
            'section_fixed_close_button' => 'close-button'
        ],
    ]
);

$section->add_control(
    '_offset_orientation_v',
    [
        'label' => __('Vertical Orientation', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'label_block' => false,
        'toggle' => false,
        'default' => 'start',
        'options' => [
            'start' => [
                'title' => __( 'Top', 'neuron-core'),
                'icon' => 'eicon-v-align-top',
            ],
            'end' => [
                'title' => __( 'Bottom', 'neuron-core'),
                'icon' => 'eicon-v-align-bottom',
            ],
        ],
        'render_type' => 'ui',
        'condition' => [
            'section_fixed_close_button' => 'close-button'
        ],
    ]
);

$section->add_responsive_control(
    '_offset_y',
    [
        'label' => __('Offset', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
            'px' => [
                'min' => -1000,
                'max' => 1000,
                'step' => 1,
            ],
            '%' => [
                'min' => -200,
                'max' => 200,
            ],
            'vh' => [
                'min' => -200,
                'max' => 200,
            ],
            'vw' => [
                'min' => -200,
                'max' => 200,
            ],
        ],
        'size_units' => [ 'px', '%', 'vh', 'vw' ],
        'default' => [
            'size' => '0',
        ],
        'selectors' => [
            '{{WRAPPER}} .a-close-button' => 'top: {{SIZE}}{{UNIT}}',
        ],
        'condition' => [
            '_offset_orientation_v!' => 'end',
            'section_fixed_close_button' => 'close-button'
        ],
    ]
);

$section->add_responsive_control(
    '_offset_y_end',
    [
        'label' => __('Offset', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
            'px' => [
                'min' => -1000,
                'max' => 1000,
                'step' => 1,
            ],
            '%' => [
                'min' => -200,
                'max' => 200,
            ],
            'vh' => [
                'min' => -200,
                'max' => 200,
            ],
            'vw' => [
                'min' => -200,
                'max' => 200,
            ],
        ],
        'size_units' => [ 'px', '%', 'vh', 'vw' ],
        'default' => [
            'size' => '0',
        ],
        'selectors' => [
            '{{WRAPPER}} .a-close-button' => 'bottom: {{SIZE}}{{UNIT}}; top: auto',
        ],
        'condition' => [
            '_offset_orientation_v' => 'end',
            'section_fixed_close_button' => 'close-button'
        ],
    ]
);