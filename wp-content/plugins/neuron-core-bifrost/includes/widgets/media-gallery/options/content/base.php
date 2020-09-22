<?php
/**
 * Media Gallery > Content Options
 */

/**
 * Functionality
 */
$this->start_controls_section(
    'media_gallery_functionality',
    [
        'label' => __('Functionality', 'neuron-core')
    ]
);

include(__DIR__ . '/functionality.php');

$this->end_controls_section();

/**
 * Layout
 * 
 * Different options to
 * change the animation,
 * columns and much more.
 */
$this->start_controls_section(
    'media_gallery_style_layout',
    [
        'label' => __('Layout', 'neuron-core')
    ]
);

include(__DIR__ . '/layout.php');

$this->end_controls_section();

/**
 * Carousel
 * 
 * Options that are listed only
 * when carousel is selected 
 * as layout.
 */
$this->start_controls_section(
    'media_gallery_carousel',
    [
        'label' => __('Carousel', 'neuron-core'),
        'condition' => [
            'media_gallery_layout' => 'carousel'
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
    'media_gallery_justified',
    [
        'label' => __('Justified', 'neuron-core'),
        'condition' => [
            'media_gallery_layout_type' => 'justified'
        ]
    ]
);

include(__DIR__ . '/justified.php');

$this->end_controls_section();

/**
 * Filters
 */
$this->start_controls_section(
    'media_gallery_filters_section',
    [
        'label' => __('Filters', 'neuron-core'),
        'condition' => [
            'media_gallery_layout' => 'isotope'
        ]
    ]
);

include(__DIR__ . '/filters.php');

$this->end_controls_section();

/**
 * Thumbnail
 */
$this->start_controls_section(
    'media_gallery_thumbnail',
    [
        'label' => __('Thumbnail', 'neuron-core')
    ]
);

include(__DIR__ . '/thumbnail.php');

$this->end_controls_section();
