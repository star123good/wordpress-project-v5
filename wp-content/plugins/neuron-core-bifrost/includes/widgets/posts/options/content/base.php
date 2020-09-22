<?php
/**
 * Posts > Content Options
 */

/**
 * Functionality
 */
$this->start_controls_section(
    'posts_functionality',
    [
        'label' => __('Functionality', 'neuron-core')
    ]
);

include(__DIR__ . '/functionality.php');

$this->end_controls_section();

/**
 * Query
 */
$this->start_controls_section(
    'posts_query_section',
    [
        'label' => __('Query', 'neuron-core')
    ]
);

include(__DIR__ . '/query.php');

$this->end_controls_section();

/**
 * Layout
 */
$this->start_controls_section(
    'posts_style_layout',
    [
        'label' => __('Layout', 'neuron-core')
    ]
);

include(__DIR__ . '/layout.php');

$this->end_controls_section();

/**
 * Meta
 */
$this->start_controls_section(
    'posts_meta',
    [
        'label' => __('Meta', 'neuron-core'),
        'condition' => [
            'posts_layout_model!' => 'meta-tooltip',
            'posts_layout_model!' => 'meta-fixed'
        ]
    ]
);

include(__DIR__ . '/meta.php');

$this->end_controls_section();

/**
 * Carousel
 */
$this->start_controls_section(
    'posts_carousel',
    [
        'label' => __('Carousel', 'neuron-core'),
        'condition' => [
            'posts_layout' => 'carousel'
        ]
    ]
);

include(__DIR__ . '/carousel.php');

$this->end_controls_section();

/**
 * Justified
 * 
 * Options that are listed only
 * when justified is selected 
 * as layout type.
*/
$this->start_controls_section(
    'posts_justified',
    [
        'label' => __('Justified', 'neuron-core'),
        'condition' => [
            'posts_layout_type' => 'justified'
        ]
    ]
);

include(__DIR__ . '/justified.php');

$this->end_controls_section();

/**
 * Filters
 */
$this->start_controls_section(
    'posts_filters',
    [
        'label' => __('Filters', 'neuron-core'),
        'condition' => [
            'posts_layout' => 'isotope',
            'posts_layout_type!' => 'justified'
        ]
    ]
);

include(__DIR__ . '/filters.php');

$this->end_controls_section();

/**
 * Pagination
 */
$this->start_controls_section(
    'posts_pagination',
    [
        'label' => __('Pagination', 'neuron-core'),
        'condition' => [
            'posts_layout' => 'isotope',
            'posts_layout_type!' => 'metro'
        ]
    ]
);

include(__DIR__ . '/pagination.php');

$this->end_controls_section();

/**
 * Thumbnail
 */
$this->start_controls_section(
    'posts_thumbnail',
    [
        'label' => __('Thumbnail', 'neuron-core'),
        'condition' => [
            'posts_meta_thumbnail' => 'yes',
            'posts_layout_type!' => 'justified'
        ]
    ]
);

include(__DIR__ . '/thumbnail.php');

$this->end_controls_section();