<?php 
/**
 * Posts > Content Options > Thumbnail
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
    'posts_thumbnail_resizer',
    [
        'label' => __('Thumbnail Resizer', 'neuron-core'),
        'description' => __('Activate a thumbnail resizer, it will crop all the images to a given width & height.', 'neuron-core'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('On', 'neuron-core'),
        'label_off' => __('Off', 'neuron-core'),
        'return_value' => 'yes',
        'default' => 'no',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Image_Size::get_type(),
    [
        'name' => 'posts_thumbnail_sizes', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
        'label' => __('Thumbnail Sizes', 'neuron-core'),
        'description' => __('Select the thumbnail size.', 'neuron-core'),
        'default' => 'large',
        'condition' => [
            'posts_thumbnail_resizer' => 'yes'
        ]
    ]
);