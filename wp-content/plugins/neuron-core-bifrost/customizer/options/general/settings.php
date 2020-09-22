<?php
/**
 * Settings
 */

Kirki::add_field('neuron_kirki', array(
	'type'        => 'select',
	'settings'    => 'custom_fields_panel',
    'label'       => esc_html__('Custom Fields Panel', 'neuron-core'),
    'description' => esc_html__('Enable or disable the custom fields panel(ACF Panel), default is disabled.', 'neuron-core'),
	'section'     => 'general_settings',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('Enable', 'neuron-core'),
        '2' => esc_attr__('Disable', 'neuron-core')
    ),
));

Kirki::add_field('neuron_kirki', array(
	'type'        => 'select',
	'settings'    => 'comments_closed',
    'label'       => esc_html__('Comments Notice', 'neuron-core'),
    'description' => esc_html__('Show or hide the notice \'Comments are Closed!\'.', 'neuron-core'),
	'section'     => 'general_settings',
	'default'     => '1',
    'choices'     => array(
        '1' => esc_attr__('Show', 'neuron-core'),
        '2' => esc_attr__('Hide', 'neuron-core')
    ),
));

Kirki::add_field('neuron_kirki', [
	'type'        => 'repeater',
    'settings'    => 'custom_fonts',
    'label'       => esc_attr__('Custom Fonts', 'neuron-core'),
	'section'     => 'general_settings',
	'row_label' => array(
        'type' => 'field',
        'field' => 'font_name',
		'value' => __('Custom Font', 'neuron-core')
	),
	'button_label' => esc_attr__('Add a Custom Font', 'neuron-core'),
	'fields' => array(
		'font_name' => array(
			'type' => 'text',
			'label' => esc_attr__('Name', 'neuron-core')
		),
		'font_ttf' => array(
			'type' => 'text',
			'label' => esc_attr__('Font .ttf', 'neuron-core'),
		),
		'font_woff' => array(
			'type' => 'text',
			'label' => esc_attr__('Font .woff', 'neuron-core'),
		),
	)
]);

Kirki::add_field('neuron_kirki', array(
	'type'        => 'repeater',
    'settings'    => 'general_sidebars',
    'label'       => esc_attr__('Custom Sidebar', 'neuron-core'),
    'description' => esc_html__('Create new sidebars and use them later via the page builder for different areas.', 'neuron-core'),
    'section'     => 'general_settings',
	'row_label' => array(
        'type' => 'field',
        'field' => 'sidebar_title',
		'value' => esc_attr__('Custom Sidebar', 'neuron-core'),
	),
	'button_label' => esc_attr__('Add new sidebar area', 'neuron-core'),
	'default'      => '',
	'fields' => array(
		'sidebar_title' => array(
			'type'        => 'text',
			'label'       => esc_attr__('Sidebar Title', 'neuron-core'),
			'default'     => '',
		),
		'sidebar_description' => array(
			'type'        => 'text',
			'label'       => esc_attr__('Sidebar Description', 'neuron-core'),
			'default'     => '',
		),
	)
));

Kirki::add_field('neuron_kirki', array(
	'type'        => 'repeater',
    'settings'    => 'general_image_sizes',
    'label'       => esc_attr__('Image Size', 'neuron-core'),
    'description' => __('Create new image sizes, if you leave height blank it will be set to auto. <br /> <small>Note: Enter only the number without unit, it\'s represented in pixels.</small>', 'neuron-core'),
    'section'     => 'general_settings',
    'default'      => array(
        array(
            'image_size_width' => '560',
            'image_size_height' => '400'
        )
    ),
	'row_label' => array(
        'type' => 'text',
        'value' => esc_attr__('Image Size', 'neuron-core'),
	),
	'button_label' => esc_attr__('Add a Custom Image Size', 'neuron-core'),
	'fields' => array(
		'image_size_width' => array(
			'type'        => 'text',
			'label'       => esc_attr__('Width', 'neuron-core'),
		),
		'image_size_height' => array(
			'type'        => 'text',
			'label'       => esc_attr__('Height', 'neuron-core'),
        ),
    )
));
