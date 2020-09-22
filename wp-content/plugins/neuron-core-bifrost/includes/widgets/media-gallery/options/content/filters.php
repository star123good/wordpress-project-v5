<?php
/**
 * Media Gallery > Content Options > Filters
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
    'media_gallery_filters_visibility',
    [
        'label' => __('Filters', 'neuron-core'),
        'description' => __('Make the media gallery sortable, do not forget to add filters in the repeater.'), 
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no'
    ]
);

$this->add_control(
    'media_gallery_filters',
    [
        'label'   => __('Filters Query', 'neuron-core'),
        'description' => __('Add the filters.', 'neuron-core'),
        'type' => Controls_Manager::SELECT2,
        'options' => $this->neuron_get_media_categories(),
        'multiple' => true,
        'condition' => [
            'media_gallery_filters_visibility' => 'yes'
        ]
    ]
);

$this->add_control(
    'media_gallery_filters_filter_all',
    [
        'label' => __('Show All Filter', 'neuron-core'),
        'description' => __('Show a filter which is able to filter all posts.'), 
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
        'condition' => [
            'media_gallery_filters_visibility' => 'yes'
        ]
    ]
);

$this->add_control(
    'media_gallery_filters_filter_all_string',
    [
        'label'   => __('String', 'neuron-core'),
        'description' => __('Override the filter \'Show All\'.', 'neuron-core'),
        'type'    => Controls_Manager::TEXT,
        'condition' => [
            'media_gallery_filters_visibility' => 'yes',
            'media_gallery_filters_filter_all' => 'yes'
        ]
    ]
);

$this->add_control(
    'media_gallery_filters_hide_mobile',
    [
        'label' => __('Hide on Mobile', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Yes', 'neuron-core'),
        'label_off' => __('No', 'neuron-core'),
        'default' => 'no',
        'condition' => [
            'media_gallery_filters_visibility' => 'yes'
        ]
    ]
);