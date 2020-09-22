<?php 
/**
 * Posts > Content Options > Filters
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
    'posts_filters_visibility',
    [
        'label' => __('Filters', 'neuron-core'),
        'description' => __('Show the categories as filters. Make sure to add the categories in the query field.'), 
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no'
    ]
);

$this->add_control(
    'posts_filters_query_post',
    [
        'label' => __('Filters Query', 'neuron-core'),
        'description' => __('Select the categories you want to display as filters. <br /> <small>Note: This option does not affect the query, is created only to display filters on metro layout type.</small>', 'neuron-core'),
        'type' => Controls_Manager::SELECT2,
        'options' => $this->neuron_return_taxonomies('category'),
        'multiple' => true,
        'condition' => [
            'posts_type' => 'post',
            'posts_layout_type' => 'metro',
            'posts_filters_visibility' => 'yes'
        ]
    ]
);

$this->add_control(
    'posts_filters_query_portfolio',
    [
        'label' => __('Filters Query', 'neuron-core'),
        'description' => __('Select the categories you want to display as filters. <br /> <small>Note: This option does not affect the query, is created only to display filters on metro layout type.</small>', 'neuron-core'),
        'type' => Controls_Manager::SELECT2,
        'options' => $this->neuron_return_taxonomies('portfolio_category'),
        'multiple' => true,
        'condition' => [
            'posts_type' => 'portfolio',
            'posts_layout_type' => 'metro',
            'posts_filters_visibility' => 'yes'
        ]
    ]
);

if (class_exists('WooCommerce')) {
    $this->add_control(
        'posts_filters_query_product',
        [
            'label' => __('Filters Query', 'neuron-core'),
            'description' => __('Select the categories you want to display as filters. <br /> <small>Note: This option does not affect the query, is created only to display filters on metro layout type.</small>', 'neuron-core'),
            'type' => Controls_Manager::SELECT2,
            'options' => $this->neuron_return_taxonomies('product_cat'),
            'multiple' => true,
            'condition' => [
                'posts_type' => 'product',
                'posts_layout_type' => 'metro',
                'posts_filters_visibility' => 'yes'
            ]
        ]
    );
}

$this->add_control(
    'posts_filters_filter_all',
    [
        'label' => __('Show All Filter', 'neuron-core'),
        'description' => __('Show a filter which is able to filter all posts.'), 
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
        'condition' => [
            'posts_filters_visibility' => 'yes'
        ]
    ]
);

    $this->add_control(
    'posts_filters_filter_all_string',
    [
        'label'   => __('String', 'neuron-core'),
        'description' => __('Override the filter \'Show All\'.', 'neuron-core'),
        'type'    => Controls_Manager::TEXT,
        'condition' => [
            'posts_filters_visibility' => 'yes',
            'posts_filters_filter_all' => 'yes'
        ]
    ]
);