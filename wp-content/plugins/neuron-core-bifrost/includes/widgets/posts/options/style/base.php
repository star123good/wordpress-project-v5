<?php
/**
 * Posts > Style Options
 */
use Elementor\Controls_Manager;

 /**
 * Hover
 */
$this->start_controls_section(
    'posts_style_hover',
    [
        'label' => __('Hover', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'posts_meta_thumbnail' => 'yes'
        ]
    ]
);

include(__DIR__ . '/hover.php');

$this->end_controls_section();

/**
 * Post Box
 */
$this->start_controls_section(
    'posts_style_post_box',
    [
        'label' => __('Post Box', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'posts_layout_model' => 'meta-outside'
        ]
    ]
);

include(__DIR__ . '/post-box.php');

$this->end_controls_section();

$this->start_controls_section(
    'posts_style_meta_box',
    [
        'label' => __('Meta Box', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'posts_layout_type!' => 'justified'
        ]
    ]
);

include(__DIR__ . '/meta-box.php');

$this->end_controls_section();

/**
 * Title
 */
$this->start_controls_section(
    'posts_style_title',
    [
        'label' => __('Title', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'posts_meta_title' => 'yes'
        ]
    ]
);

include(__DIR__ . '/title.php');

$this->end_controls_section();

/**
 * Meta
 */
$this->start_controls_section(
    'posts_style_meta',
    [
        'label' => __('Meta', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'conditions' => [
            'terms' => [
                [
                    'name' => 'posts_type',
                    'operator' => '!=',
                    'value' => 'product'
                ],
                [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'posts_meta_categories',
                            'operator' => '==',
                            'value' => 'yes'
                        ], 
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name' => 'posts_meta_date',
                                    'operator' => '==',
                                    'value' => 'yes'
                                ],
                                [
                                    'name' => 'posts_type',
                                    'operator' => '==',
                                    'value' => 'post'
                                ]
                            ]
                        ],
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name' => 'posts_meta_tags',
                                    'operator' => '==',
                                    'value' => 'yes'
                                ],
                                [
                                    'name' => 'posts_type',
                                    'operator' => '==',
                                    'value' => 'post'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
        ]
    ]
);

include(__DIR__ . '/meta.php');

$this->end_controls_section();

/**
 * Excerpt
 */
$this->start_controls_section(
    'posts_style_excerpt',
    [
        'label' => __('Excerpt', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'posts_type' => 'post',
            'posts_layout_type!' => 'justified',
            'posts_layout_model' => 'meta-outside',
            'posts_meta_excerpt' => 'yes'
        ]
    ]
);

include(__DIR__ . '/excerpt.php');

$this->end_controls_section();

/**
 * Author
 */
$this->start_controls_section(
    'posts_style_author',
    [
        'label' => __('Author', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'posts_type' => 'post',
            'posts_layout_type!' => 'justified',
            'posts_layout_model' => 'meta-outside',
            'posts_meta_author' => 'yes'
        ]
    ]
);

include(__DIR__ . '/author.php');

$this->end_controls_section();

/**
 * Price
 */
$this->start_controls_section(
    'posts_style_price',
    [
        'label' => __('Price', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'posts_type' => 'product',
            'posts_layout_model!' => 'meta-tooltip',
            'posts_layout_model!' => 'meta-fixed',
            'posts_meta_price' => 'yes'
        ]
    ]
);

include(__DIR__ . '/price.php');

$this->end_controls_section();

/**
 * Result Count
 */
$this->start_controls_section(
    'posts_style_results_count',
    [
        'label' => __('Results Count', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'posts_type' => 'product',
            'posts_meta_results_count' => 'yes'
        ]
    ]
);

include(__DIR__ . '/results-counts.php');

$this->end_controls_section();

/**
 * Filters
 */
$this->start_controls_section(
    'posts_style_filters',
    [
        'label' => __('Filters', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'posts_layout' => 'isotope',
            'posts_filters_visibility' => 'yes'
        ]
    ]
);

include(__DIR__ . '/filters.php');

$this->end_controls_section();

/**
 * Pagination
 */
$this->start_controls_section(
    'posts_style_pagination',
    [
        'label' => __('Pagination', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'posts_layout' => 'isotope',
            'posts_pagination_visibility' => 'yes'
        ]
    ]
);

include(__DIR__ . '/pagination.php');

$this->end_controls_section();

