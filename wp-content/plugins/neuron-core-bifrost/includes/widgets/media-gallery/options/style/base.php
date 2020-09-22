<?php
/**
 * Media Gallery > Style Options
 */
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Hover
 */
$this->start_controls_section(
    'media_gallery_style_hover',
    [
        'label' => __('Hover', 'neuron-core'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE
    ]
);

include(__DIR__ . '/hover.php');

$this->end_controls_section();

/**
 * Image
 */
$this->start_controls_section(
    'media_gallery_style_image',
    [
        'label' => __('Image', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'media_gallery_layout_model!' => 'meta-tooltip',
            'media_gallery_layout_model!' => 'meta-fixed',
            'media_gallery_layout_type!' => 'justified'
        ]
    ]
);

include(__DIR__ . '/image.php');

$this->end_controls_section();

/**
 * Post Box
 */
$this->start_controls_section(
    'media_gallery_style_post_box',
    [
        'label' => __('Post Box', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'media_gallery_layout_model' => 'meta-outside',
            'media_gallery_layout_type!' => 'justified'
        ]
    ]
);

include(__DIR__ . '/post-box.php');

$this->end_controls_section();

$this->start_controls_section(
    'media_gallery_style_meta_box',
    [
        'label' => __('Meta Box', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'media_gallery_layout_model' => 'meta-outside',
            'media_gallery_layout_type!' => 'justified'
        ]
    ]
);

include(__DIR__ . '/meta-box.php');

$this->end_controls_section();

/**
 * Icons
 */
$this->start_controls_section(
    'media_gallery_style_icons',
    [
        'label' => __('Icons', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE
    ]
);

include(__DIR__ . '/icons.php');

$this->end_controls_section();

/**
 * Title
 */
$this->start_controls_section(
    'media_gallery_style_title',
    [
        'label' => __('Title', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE
    ]
);

include(__DIR__ . '/title.php');

$this->end_controls_section();

/**
 * Subitle
 */
$this->start_controls_section(
    'media_gallery_style_subtitle',
    [
        'label' => __('Subtitle', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE
    ]
);

include(__DIR__ . '/subtitle.php');

$this->end_controls_section();

/**
 * Description
 */
$this->start_controls_section(
    'media_gallery_style_description',
    [
        'label' => __('Description', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'media_gallery_layout_model' => 'meta-outside',
            'media_gallery_layout_type!' => 'justified'
        ]
    ]
);

include(__DIR__ . '/description.php');

$this->end_controls_section();

/**
 * Filters
 */
$this->start_controls_section(
    'media_gallery_style_filters',
    [
        'label' => __('Filters', 'neuron-core'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'media_gallery_layout' => 'isotope',
            'media_gallery_filters_visibility' => 'yes'
        ]
    ]
);

include(__DIR__ . '/filters.php');

$this->end_controls_section();