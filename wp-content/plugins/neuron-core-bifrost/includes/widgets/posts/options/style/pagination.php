<?php 
/**
 * Posts > Style Options > Pagination
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'posts_style_pagination_typography',
        'label' => __('Typography', 'neuron-core'),
        'selector' => '{{WRAPPER}} .l-posts-wrapper .load-more-posts-holder button.load-more-posts, {{WRAPPER}} .o-pagination ul.o-pagination__numbers li a'
    ]
);

$this->start_controls_tabs(
    'posts_style_pagination_button'
);

$this->start_controls_tab(
    'posts_style_pagination_normal_tab',
    [
        'label' => __('Normal', 'neuron-core')
    ]
);

$this->add_control(
    'posts_style_pagination_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .l-posts-wrapper .load-more-posts-holder button.load-more-posts' => 'color: {{VALUE}} !important',
            '{{WRAPPER}} .o-pagination ul.o-pagination__numbers li a' => 'color: {{VALUE}} !important',
        ]
    ]
);

$this->add_control(
    'posts_style_pagination_background_color',
    [
        'label' => __('Background Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .l-posts-wrapper .load-more-posts-holder button.load-more-posts' => 'background-color: {{VALUE}} !important',
            '{{WRAPPER}} .o-pagination ul.o-pagination__numbers li a' => 'background-color: {{VALUE}} !important',
        ]
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'posts_style_pagination_hover_tab',
    [
        'label' => __('Hover', 'neuron-core')
    ]
);

$this->add_control(
    'posts_style_pagination_color_hover',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .l-posts-wrapper .load-more-posts-holder button.load-more-posts:hover' => 'color: {{VALUE}} !important',
            '{{WRAPPER}} .o-pagination ul.o-pagination__numbers li a:hover' => 'color: {{VALUE}} !important',
            '{{WRAPPER}} .o-pagination ul.o-pagination__numbers li.active a' => 'color: {{VALUE}} !important'
        ]
    ]
);

$this->add_control(
    'posts_style_pagination_background_color_hover',
    [
        'label' => __('Background Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .l-posts-wrapper .load-more-posts-holder button.load-more-posts:hover' => 'background-color: {{VALUE}} !important',
            '{{WRAPPER}} .o-pagination ul.o-pagination__numbers li a:hover' => 'background-color: {{VALUE}} !important',
            '{{WRAPPER}} .o-pagination ul.o-pagination__numbers li.active a' => 'background-color: {{VALUE}} !important',
        ]
    ]
);

$this->add_control(
    'posts_style_pagination_hover_animation',
    [
        'label' => __('Hover Animation', 'neuron-core'),
        'type' => Controls_Manager::HOVER_ANIMATION,
        'condition' => [
            'posts_pagination_style' => 'show-more'
        ]
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_control(
    'posts_style_pagination_border_type',
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
        'condition' => [
            'posts_pagination_style' => 'show-more'
        ],
        'selectors' => [
            '{{WRAPPER}} .l-posts-wrapper .load-more-posts-holder button.load-more-posts' => 'border-style: {{VALUE}} !important',
        ],
    ]
);

$this->add_control(
    'posts_style_pagination_border_width',
    [
        'label' => __('Border Width', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'conditions' => [
            'terms' => [
                [
                    'name' => 'posts_style_pagination_border_type',
                    'operator' => '!=',
                    'value' => 'none',
                ],
                [
                    'name' => 'posts_pagination_style',
                    'operator' => '==',
                    'value' => 'show-more',
                ]
            ]
        ],
        'selectors' => [
            '{{WRAPPER}} .l-posts-wrapper .load-more-posts-holder button.load-more-posts' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
        ],
    ]
);

$this->add_control(
    'posts_style_pagination_border_color',
    [
        'label' => __('Border Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'condition' => [
            'posts_style_pagination_border_type!' => 'none',
            'posts_pagination_style' => 'show-more'
        ],
        'selectors' => [
            '{{WRAPPER}} .l-posts-wrapper .load-more-posts-holder button.load-more-posts' => 'border-color: {{VALUE}} !important',
        ],
    ]
);

$this->add_control(
    'posts_style_pagination_border_radius',
    [
        'label' => __('Border Radius', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'condition' => [
            'posts_pagination_style' => 'show-more'
        ],
        'selectors' => [
            '{{WRAPPER}} .l-posts-wrapper .load-more-posts-holder button.load-more-posts' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
        ],
    ]
);

$this->add_responsive_control(
    'posts_style_pagination_margin',
    [
        'label' => __('Margin', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors' => [
            '{{WRAPPER}} .l-posts-wrapper .load-more-posts-holder button.load-more-posts' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .o-pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before'
    ]
);

$this->add_responsive_control(
    'posts_style_pagination_padding',
    [
        'label' => __('Padding', 'neuron-core'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .l-posts-wrapper .load-more-posts-holder button.load-more-posts' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'condition' => [
            'posts_pagination_style' => 'show-more'
        ]
    ]
);

$this->add_control(
    'posts_style_pagination_alignment',
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
        'default' => 'center',
        'condition' => [
            'posts_pagination_style' => 'show-more'
        ],
    ]
);