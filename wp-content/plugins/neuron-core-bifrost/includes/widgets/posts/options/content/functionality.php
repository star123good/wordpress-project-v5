<?php 
/**
 * Posts > Content Options > Functionality
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
    'posts_type',
    [
        'label' => __('Post Type', 'neuron-core'),
        'description' => __('Select the post type that you want to get on your isotope grid or carousel slider.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'post' => __('Post', 'neuron-core'),
            'portfolio' => __('Portfolio', 'neuron-core'),
            'product' => __('Product', 'neuron-core')
        ],
        'default' => 'post'
    ]
);

$this->add_control(
    'posts_layout',
    [
        'label' => __('Layout', 'neuron-core'),
        'description' => __('Select the layout of posts.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'isotope' => __('Isotope', 'neuron-core'),
            'carousel' => __('Carousel', 'neuron-core')
        ],
        'default' => 'isotope'
    ]
);

$this->add_control(
    'posts_layout_type',
    [
        'label' => __('Layout Type', 'neuron-core'),
        'description' => __('Select the layout type of isotope.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'masonry' => __('Masonry', 'neuron-core'),
            'metro' => __('Metro', 'neuron-core'),
            'fitrows' => __('FitRows', 'neuron-core'),
            'justified' => __('Justified', 'neuron-core')
        ],
        'default' => 'masonry',
        'condition' => [
            'posts_layout' => 'isotope'
        ]
    ]
);

$this->add_control(
    'posts_layout_model',
    [
        'label' => __('Layout Model', 'neuron-core'),
        'description' => __('Select the layout model.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'meta-inside' => __('Meta Inside', 'neuron-core'),
            'meta-outside' => __('Meta Outside', 'neuron-core'),
            'meta-tooltip' => __('Meta Tooltip', 'neuron-core'),
            'meta-fixed' => __('Meta Fixed', 'neuron-core')
        ],
        'default' => 'meta-inside',
        'condition' => [
            'posts_layout_type!' => 'justified'
        ]
    ]
);