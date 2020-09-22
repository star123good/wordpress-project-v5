<?php 
/**
 * Posts > Content Options > Meta
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
    'posts_meta_thumbnail',
    [
        'label' => __('Thumbnail', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
        'condition' => [
            'posts_layout_model' => 'meta-outside'
        ]
    ]
);

$this->add_control(
    'posts_meta_title',
    [
        'label' => __('Title', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes'
    ]
);

$this->add_control(
    'posts_meta_date',
    [
        'label' => __('Date', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'posts_type',
                    'operator' => '==',
                    'value' => 'post'
                ], 
                [
                    'name' => 'posts_layout_model',
                    'operator' => '==',
                    'value' => 'meta-outside'
                ], 
            ],
        ]
    ]
);

$this->add_control(
    'posts_meta_categories',
    [
        'label' => __('Categories', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
        'conditions' => [
            'terms' => [
                [
                    'name' => 'posts_type',
                    'operator' => '!=',
                    'value' => 'product'
                ], 
            ],
        ]
    ]
);

$this->add_control(
    'posts_meta_tags',
    [
        'label' => __('Tags', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'posts_type',
                    'operator' => '==',
                    'value' => 'post'
                ], 
                [
                    'name' => 'posts_layout_model',
                    'operator' => '==',
                    'value' => 'meta-outside'
                ], 
            ],
        ]
    ]
);

$this->add_control(
    'posts_meta_excerpt',
    [
        'label' => __('Excerpt', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'posts_type',
                    'operator' => '==',
                    'value' => 'post'
                ], 
                [
                    'name' => 'posts_layout_model',
                    'operator' => '==',
                    'value' => 'meta-outside'
                ], 
            ],
        ]
    ]
);

$this->add_control(
    'posts_meta_author',
    [
        'label' => __('Author', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'posts_type',
                    'operator' => '==',
                    'value' => 'post'
                ], 
                [
                    'name' => 'posts_layout_model',
                    'operator' => '==',
                    'value' => 'meta-outside'
                ], 
            ],
        ]
    ]
);

$this->add_control(
    'posts_meta_price',
    [
        'label' => __('Price', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'yes',
        'condition' => [
            'posts_type' => 'product'
        ]
    ]
);

$this->add_control(
    'posts_meta_results_count',
    [
        'label' => __('Results Count', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
        'condition' => [
            'posts_type' => 'product'
        ]
    ]
);

$this->add_control(
    'posts_meta_catalog_ordering',
    [
        'label' => __('Catalog Ordering', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'neuron-core'),
        'label_off' => __('Hide', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
        'condition' => [
            'posts_type' => 'product'
        ]
    ]
);

$this->add_control(
    'posts_meta_ordering_default',
    [
        'label' => __('Default Order', 'neuron-core'),
        'description' => __('Select which order you want to set default.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'menu_order' => esc_attr__('Default sorting', 'neuron-core'),
            'popularity' => esc_attr__('Sort by popularity', 'neuron-core'),
            'rating' => esc_attr__('Sort by average rating', 'neuron-core'),
            'date' => esc_attr__('Sort by newness', 'neuron-core'),
            'price' => esc_attr__('Sort by price: low to high', 'neuron-core'),
            'price-desc' => esc_attr__('Sort by price: high to low', 'neuron-core')
        ],
        'default' => 'menu_order',
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'posts_type',
                    'operator' => '==',
                    'value' => 'product'
                ], 
            ],
        ]
    ]
);