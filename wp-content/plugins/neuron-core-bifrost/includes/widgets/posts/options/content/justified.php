<?php
/**
 * Posts > Content Options > Justified
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
    'justified_height',
    [
        'label' => __('Height', 'neuron-core'),
        'description' => __('The preferred rows height in pixel.', 'neuron-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 200,
        'min'     => 1,
        'max'     => 1000,
        'step'    => 10,
        'frontend_available' => true,
        'return_value' => 'yes'
    ]
);

$this->add_control(
    'justified_margins',
    [
        'label' => __('Margins', 'neuron-core'),
        'description' => __('Decide the margins between the images.', 'neuron-core'),
        'type' => Controls_Manager::NUMBER,
        'default' => 10,
        'min'     => 1,
        'max'     => 500,
        'step'    => 1,
        'frontend_available' => true,
        'return_value' => 'yes',
        'selectors' => [
            '{{WRAPPER}} .justified-gallery-wrapper' => 'margin: -{{SIZE}}px'
        ],
        'render_type' => 'template'
    ]
);

$this->add_control(
    'justified_last_row',
    [
        'label' => __('Visibility', 'neuron-core'),
        'description' => __('Decide the justify for the last row.', 'neuron-core'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'justify' => __('Justify', 'neuron-core'),
            'nojustify' => __('No Justify', 'neuron-core'),
            'hide' => __('Hide', 'neuron-core'),
        ],
        'default' => 'justify',
        'frontend_available' => true,
        'return_value' => 'yes'
    ]
);