<?php 
/**
 * Media Gallery > Content Options > Functionality
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
    'media_gallery_layout',
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
    'media_gallery_layout_type',
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
            'media_gallery_layout' => 'isotope'
        ]
    ]
);

$this->add_control(
    'media_gallery_layout_model',
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
            'media_gallery_layout_type!' => 'justified'
        ]
    ]
);

$this->add_control(
    'media_gallery_lightbox',
    [
        'label' => __('Lightbox', 'neuron-core'),
        'description' => __('Enable the lightbox for the images, the images will open in a large slideshow when clicked.'), 
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Yes', 'neuron-core'),
        'label_off' => __('No', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no'
    ]
);

/**
 * Query
 */
$this->add_control(
    'media_gallery_query_normal',
    [
        'label' => __('Query', 'neuron-core'),
        'description' => __('Add images to the gallery.', 'neuron-core'),
        'type' => Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'query_type',
                'label' => __('Type', 'neuron-core'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'image' => [
                        'title' => __('Image', 'neuron-core'),
                        'icon' => 'fa fa-image',
                    ],
                    'video' => [
                        'title' => __('Video', 'neuron-core'),
                        'icon' => 'fa fa-video-camera',
                    ],
                ],
                'default' => 'image',
                'toggle' => false,
                'label_block' => false,
            ],
            [
                'name' => 'query_image',
                'label' => __('Image', 'neuron-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
                ]
            ],
            [
                'name' => 'query_video_link',
                'label' => __('Video Link', 'neuron-core'),
                'description' => __('YouTube link or video file (mp4 is recommended).', 'neuron-core'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'query_type' => 'video'
                ]
            ],
            [
                'name' => 'query_title',
                'label' => __('Title', 'neuron-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Title', 'neuron-core')
            ],
            [
                'name' => 'query_subtitle',
                'label' => __('Subtitle', 'neuron-core'),
                'type' => Controls_Manager::TEXT
            ],
            [
                'name' => 'query_category',
                'label' => __('Category', 'neuron-core'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->neuron_get_media_categories(),
                'multiple' => true
            ],
            [
                'name' => 'query_badge',
                'label' => __('Badge', 'neuron-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __('None', 'neuron-core'),
                    'new' => __('New', 'neuron-core'),
                    'hot' => __('Hot', 'neuron-core')
                ],
                'default' => 'none'
            ],
            [
                'name' => 'query_url',
                'label' => __('URL', 'neuron-core'),
                'type' => Controls_Manager::URL
            ],
            [
                'name' => 'query_description',
                'label' => __('Description', 'neuron-core'),
                'description' => __('Enter the description. <br /><small>Note: Description is not visible on meta inside.</small>', 'neuron-core'),
                'type' => Controls_Manager::TEXTAREA
            ],
            [
                'name' => 'query_social_media',
                'label' => __('Social Media', 'neuron-core'),
                'description' => __('Separate the icon from the URL with two equals ==, also enter a new line for new social media. <br/> <small><a target="_BLANK" href="https://fontawesome.com/cheatsheet#brands">Click here to view cheatsheet of icons.</a></small>', 'neuron-core'),
                'type' => Controls_Manager::TEXTAREA
            ],
        ],
        'title_field' => '{{{ query_title }}}',
        'condition' => [
            'media_gallery_layout_type!' => 'metro'
        ]
    ]
);

$this->add_control(
    'media_gallery_query_metro',
    [
        'label' => __('Query', 'neuron-core'),
        'description' => __('Add images to the gallery.', 'neuron-core'),
        'type' => Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'query_type',
                'label' => __('Type', 'neuron-core'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'image' => [
                        'title' => __('Image', 'neuron-core'),
                        'icon' => 'fa fa-image',
                    ],
                    'video' => [
                        'title' => __('Video', 'neuron-core'),
                        'icon' => 'fa fa-video-camera',
                    ],
                ],
                'default' => 'image',
                'toggle' => false,
                'label_block' => false,
            ],
            [
                'name' => 'query_image',
                'label' => __('Image', 'neuron-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
                ]
            ],
            [
                'name' => 'query_video_link',
                'label' => __('Video Link', 'neuron-core'),
                'description' => __('YouTube link or video file (mp4 is recommended).', 'neuron-core'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'query_type' => 'video'
                ]
            ],
            [
                'name' => 'query_title',
                'label' => __('Title', 'neuron-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Title', 'neuron-core'),
            ],
            [
                'name' => 'query_subtitle',
                'label' => __('Subtitle', 'neuron-core'),
                'type' => Controls_Manager::TEXT
            ],
            [
                'name' => 'query_category',
                'label' => __('Category', 'neuron-core'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->neuron_get_media_categories(),
                'multiple' => true
            ],
            [
                'name' => 'query_badge',
                'label' => __('Badge', 'neuron-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __('None', 'neuron-core'),
                    'new' => __('New', 'neuron-core'),
                    'hot' => __('Hot', 'neuron-core')
                ],
                'default' => 'none'
            ],
            [
                'name' => 'query_url',
                'label' => __('URL', 'neuron-core'),
                'type' => Controls_Manager::URL
            ],
            [
                'name' => 'query_description',
                'label' => __('Description', 'neuron-core'),
                'type' => Controls_Manager::TEXTAREA
            ],
            [
                'name' => 'query_column',
                'label' => __('Column', 'neuron-core'),
                'description' => __('Select the column of metro.', 'neuron-core'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->neuron_return_metro_columns(),
                'default' => '3-column'
            ],
            [
                'name' => 'query_social_media',
                'label' => __('Social Media', 'neuron-core'),
                'description' => __('Separate the URL from the icon with two equals ==, also enter a new line for new social media. <br/> <small><a target="_BLANK" href="https://fontawesome.com/cheatsheet#brands">Click here to view cheatsheet of icons.</a></small>', 'neuron-core'),
                'type' => Controls_Manager::TEXTAREA
            ],
        ],
        'title_field' => '{{{ query_title }}}',
        'condition' => [
            'media_gallery_layout_type' => 'metro'
        ]
    ]
);