<?php 
/**
 * General Options
 */

// General Panel
Kirki::add_panel('general_panel', array(
	'title'       => esc_attr__('General', 'neuron-core'),
    'priority'    => 1
));

// General Sections
Kirki::add_section('general_site', array(
	'title' => esc_attr__('Site', 'neuron-core'),
	'panel' => 'general_panel'
));

Kirki::add_section('general_settings', array(
	'title' => esc_attr__('Settings', 'neuron-core'),
	'panel' => 'general_panel'
));

// Site Options
include(__DIR__ . '/site.php');

// Settings Options
include(__DIR__ . '/settings.php');