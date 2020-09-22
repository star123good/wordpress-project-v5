<?php 
/**
 * Posts > Content Options > Pagination
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
    'posts_pagination_visibility',
    [
        'label' => __('Pagination Visibility', 'neuron-core'),
        'description' => __('Select the visibility of pagination.', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->add_control(
    'posts_pagination_style',
    [
        'label' => __('Pagination Style', 'neuron-core'),
        'description' => __('Select the pagination style, normal is with numbers and arrows and Show More is with button. ', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'normal' => esc_attr__('Normal (Links)', 'neuron-core'),
            'show-more' => esc_attr__('Show More (Ajax)', 'neuron-core'),
        ],
        'default' => 'normal',
        'condition' => [
            'posts_pagination_visibility' => 'yes',
        ]
    ]
);