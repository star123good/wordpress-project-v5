<?php 
/**
 * Posts > Style Options > Results Counts
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;

$this->add_control(
    'posts_style_result_count_color',
    [
        'label' => __('Color', 'neuron-core'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .woocommerce-result-count' => 'color: {{VALUE}}',
        ]
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'posts_style_result_count_typography',
        'label' => __('Typography', 'neuron-core'),
        'selector' =>'{{WRAPPER}} .woocommerce-result-count'
    ]
);

$this->add_group_control(
    Group_Control_Text_Shadow::get_type(),
    [
        'name' => 'posts_style_result_count_shadow',
        'label' => __('Text Shadow', 'neuron-core'),
        'selector' =>'{{WRAPPER}} .woocommerce-result-count'
    ]
);