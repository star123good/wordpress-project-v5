<?php 
/**
 * Posts > Content Options > Query
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Auto Query
 */
$this->add_control(
    'posts_auto_query',
    [
        'label' => __('Auto Query', 'neuron-core'),
        'description' => __('Can be useful when used for related posts or assigned to other archive pages. Doesn\'t work in normal pages, only in singles or archives.', 'neuron-core'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'return_value' => 'yes',
        'default' => 'no',
        'condition' => [
            'posts_layout_type!' => 'metro'
        ]
    ]
);

/**
 * Normal Query
 */
$this->add_control(
    'posts_query_normal_post',
    [
        'label' => __('Query', 'neuron-core'),
        'description' => __('Select the categories you want to get the posts from. <br /> <small> Note: If no category is selected all posts will be displayed.</small>', 'neuron-core'),
        'type' => Controls_Manager::SELECT2,
        'options' => $this->neuron_return_taxonomies('category'),
        'multiple' => true,
        'conditions' => [
            'terms' => [
                [
                    'name' => 'posts_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
                [
                    'name' => 'posts_auto_query',
                    'operator' => '!=',
                    'value' => 'yes',
                ],
                [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'posts_layout',
                            'operator' => '==',
                            'value' => 'carousel'
                        ], 
                        [
                            'name' => 'posts_layout_type',
                            'operator' => '!==',
                            'value' => 'metro',
                        ],
                    ]
                ]
            ],
        ]
    ]
);

$this->add_control(
    'posts_query_normal_portfolio',
    [
        'label' => __('Query', 'neuron-core'),
        'description' => __('Select the categories you want to get the posts from. <br /> <small> Note: If no category is selected all posts will be displayed.</small>', 'neuron-core'),
        'type' => Controls_Manager::SELECT2,
        'options' => $this->neuron_return_taxonomies('portfolio_category'),
        'multiple' => true,
        'conditions' => [
            'terms' => [
                [
                    'name' => 'posts_type',
                    'operator' => '==',
                    'value' => 'portfolio',
                ],
                [
                    'name' => 'posts_auto_query',
                    'operator' => '!=',
                    'value' => 'yes',
                ],
                [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'posts_layout',
                            'operator' => '==',
                            'value' => 'carousel'
                        ], 
                        [
                            'name' => 'posts_layout_type',
                            'operator' => '!==',
                            'value' => 'metro',
                        ],
                    ]
                ]
            ],
        ]
    ]
);

if (class_exists('WooCommerce')) {
    $this->add_control(
        'posts_query_normal_product',
        [
            'label' => __('Query', 'neuron-core'),
            'description' => __('Select the categories you want to get the posts from. <br /><small>Note: If no category is selected all posts will be displayed.</small>', 'neuron-core'),
            'type' => Controls_Manager::SELECT2,
            'options' => $this->neuron_return_taxonomies('product_cat'),
            'multiple' => true,
            'conditions' => [
                'terms' => [
                    [
                        'name' => 'posts_type',
                        'operator' => '==',
                        'value' => 'product',
                    ],
                    [
                        'name' => 'posts_auto_query',
                        'operator' => '!=',
                        'value' => 'yes',
                    ],
                    [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'name' => 'posts_layout',
                                'operator' => '==',
                                'value' => 'carousel'
                            ], 
                            [
                                'name' => 'posts_layout_type',
                                'operator' => '!==',
                                'value' => 'metro',
                            ],
                        ]
                    ]
                ],
            ]
        ]
    );
}

/**
 * Metro Query
 */
$this->add_control(
    'posts_query_metro_post',
    [
        'label' => __('Query', 'neuron-core'),
        'description' => __('Select the posts you want to show in metro. <br /><small>Note: Do not select the same item two times, it may cause issues.</small>', 'neuron-core'),
        'prevent_empty' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'post_id',
                'label' => __('Post', 'neuron-core'),
                'description' => __('Select the post.', 'neuron-core'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->neuron_return_posts('post')
            ],
            [
                'name' => 'post_column',
                'label' => __('Column', 'neuron-core'),
                'description' => __('Select the post column.', 'neuron-core'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->neuron_return_metro_columns(),
                'default' => '3-column'
            ],
        ],
        'condition' => [
            'posts_type' => 'post',
            'posts_layout' => 'isotope',
            'posts_layout_type' => 'metro'
        ]
    ]
);

$this->add_control(
    'posts_query_metro_portfolio',
    [
        'label' => __('Query', 'neuron-core'),
        'description' => __('Select the posts you want to show in metro. <br /><small>Note: Do not select the same item two times, it may cause issues.</small>', 'neuron-core'),
        'prevent_empty' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'post_id',
                'label' => __('Post', 'neuron-core'),
                'description' => __('Select the post.', 'neuron-core'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->neuron_return_posts('portfolio')
            ],
            [
                'name' => 'post_column',
                'label' => __('Column', 'neuron-core'),
                'description' => __('Select the post column.', 'neuron-core'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->neuron_return_metro_columns(),
                'default' => '3-column'
            ],
        ],
        'condition' => [
            'posts_type' => 'portfolio',
            'posts_layout' => 'isotope',
            'posts_layout_type' => 'metro'
        ]
    ]
);

if (class_exists('WooCommerce')) {
    $this->add_control(
        'posts_query_metro_product',
        [
            'label' => __('Query', 'neuron-core'),
            'description' => __('Select the posts you want to show in metro. <br /><small>Note: Do not select the same item two times, it may cause issues.</small>', 'neuron-core'),
            'prevent_empty' => false,
            'type' => Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'post_id',
                    'label' => __('Post', 'neuron-core'),
                    'description' => __('Select the post.', 'neuron-core'),
                    'type' => Controls_Manager::SELECT,
                    'options' => $this->neuron_return_posts('product')
                ],
                [
                    'name' => 'post_column',
                    'label' => __('Column', 'neuron-core'),
                    'description' => __('Select the post column.', 'neuron-core'),
                    'type' => Controls_Manager::SELECT,
                    'options' => $this->neuron_return_metro_columns(),
                    'default' => '3-column'
                ],
            ],
            'condition' => [
                'posts_type' => 'product',
                'posts_layout' => 'isotope',
                'posts_layout_type' => 'metro'
            ]
        ]
    );
}

/**
 * Order and Orderby
 */
$this->add_control(
    'posts_query_order',
    [
        'label' => __('Order', 'neuron-core'),
        'description' => __('Change the order of the query, ascending order from lowest to highest values and so on.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'ASC' => __('Ascending', 'neuron-core'),
            'DESC' => __('Descending', 'neuron-core')
        ],
        'default' => 'ASC',
        'condition' => [
            'posts_layout_type!' => 'metro'
        ]
    ]
);

$this->add_control(
    'posts_query_orderby',
    [
        'label' => __('Orderby', 'neuron-core'),
        'description' => __('Sort retrieved posts by parameter. Defaults to menu order.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'date' => __('Date', 'neuron-core'),
            'rand' => __('Random', 'neuron-core'),
            'relevance' => __('Relevance', 'neuron-core'),
            'menu_order' => __('Menu Order', 'neuron-core')
        ],
        'default' => 'menu_order',
        'condition' => [
            'posts_layout_type!' => 'metro'
        ]
    ]
);

/**
 * Posts Per Page
 */
$this->add_control(
    'posts_ppp',
    [
        'label'   => __('Posts Per Page', 'neuron-core'),
        'description' => __('Enter the number of posts you want to display on the first page, a pagination will be created if there are more posts than this number.', 'neuron-core'),
        'type'    => Controls_Manager::NUMBER,
        'default' => 10,
        'min'     => 1,
        'max'     => 10000,
        'step'    => 1
    ]
);