<?php
/**
 * Site
 */

Kirki::add_field('neuron_kirki', [
	'type'        => 'radio-buttonset',
	'settings'    => 'background_type',
	'label'       => esc_html__('Background Type', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => '',
	'choices'     => [
		'classic'  => __('Classic', 'neuron-core'),
		'gradient' => __('Gradient', 'neuron-core'),
	],
]);

// Classic
Kirki::add_field('neuron_kirki', array(
    'settings'    => 'background_site_color',
    'section'     => 'general_site',
    'type'        => 'color',
    'label'       => __('Color', 'neuron-core'),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => '.l-theme-wrapper .l-main-wrapper',
            'property' => 'background-color',
            'value_pattern'   => '$ !important;',
        ),
    ),
    'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'classic',
    	),
	),
));

Kirki::add_field('neuron_kirki', array(
    'settings'    => 'background_site_image',
    'section'     => 'general_site',
    'type'        => 'image',
    'label'       => __('Image', 'neuron-core'),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => '.l-theme-wrapper .l-main-wrapper',
            'property' => 'background',
            'value_pattern'   => 'url($)',
        ),
    ),
    'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'classic',
        ),
	),
));

Kirki::add_field('neuron_kirki', array(
    'settings'    => 'background_site_repeat',
    'section'     => 'general_site',
    'type'        => 'select',
    'label'       => __('Repeat', 'neuron-core'),
    'transport'   => 'postMessage',
    'choices'     => [
		'no-repeat' => __('No Repeat', 'neuron-core'),
		'repeat' => __('Repeat All', 'neuron-core'),
		'repeat-x' => __('Repeat Horizontally', 'neuron-core'),
		'repeat-y' => __('Repeat Vertically', 'neuron-core')
    ],
    'default' => 'no-repeat',
    'js_vars'     => array(
        array(
            'element'  => '.l-theme-wrapper .l-main-wrapper',
            'property' => 'background-repeat',
        ),
    ),
    'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'classic',
        ),
         array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => '',
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => false,
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => 0,
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => null,
        ),
	),
));

Kirki::add_field('neuron_kirki', array(
    'settings'    => 'background_site_size',
    'section'     => 'general_site',
    'type'        => 'select',
    'label'       => __('Size', 'neuron-core'),
    'transport'   => 'postMessage',
    'choices'     => [
		'auto' => __('Auto', 'neuron-core'),
		'cover' => __('Cover', 'neuron-core'),
		'contain' => __('Contain', 'neuron-core'),
    ],
    'default' => 'auto',
    'js_vars'     => array(
        array(
            'element'  => '.l-theme-wrapper .l-main-wrapper',
            'property' => 'background-size',
        ),
    ),
    'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'classic',
        ),
         array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => '',
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => false,
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => 0,
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => null,
        ),
	),
));

Kirki::add_field('neuron_kirki', array(
    'settings'    => 'background_site_position',
    'section'     => 'general_site',
    'type'        => 'select',
    'label'       => __('Position', 'neuron-core'),
    'transport'   => 'postMessage',
    'choices'     => [
		'center center'  => esc_html__('Center Center', 'neuron-core'),
		'center left' => esc_html__('Center Left', 'neuron-core'),
		'center right' => esc_html__('Center Right', 'neuron-core'),
		'top center' => esc_html__('Top Center', 'neuron-core'),
		'top left' => esc_html__('Top Left', 'neuron-core'),
		'top right' => esc_html__('Top Right', 'neuron-core'),
		'bottom center' => esc_html__('Bottom Center', 'neuron-core'),
		'bottom left' => esc_html__('Bottom Left', 'neuron-core'),
		'bottom right' => esc_html__('Bottom Right', 'neuron-core')
    ],
    'default' => 0,
    'js_vars'     => array(
        array(
            'element'  => '.l-theme-wrapper .l-main-wrapper',
            'property' => 'background-position',
        ),
    ),
    'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'classic',
        ),
         array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => '',
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => false,
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => 0,
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => null,
        ),
	),
));

Kirki::add_field('neuron_kirki', array(
    'settings'    => 'background_site_attachment',
    'section'     => 'general_site',
    'type'        => 'select',
    'label'       => __('Attachment', 'neuron-core'),
    'transport'   => 'postMessage',
    'choices'     => [
		'scroll'  => esc_html__('Scroll', 'neuron-core'),
		'fixed' => esc_html__('Fixed', 'neuron-core')
    ],
    'default' => 'scroll',
    'js_vars'     => array(
        array(
            'element'  => '.l-theme-wrapper .l-main-wrapper',
            'property' => 'background-attachment',
        ),
    ),
     'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'classic',
        ),
         array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => '',
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => false,
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => 0,
        ),
        array(
            'setting'  => 'background_site_image',
            'operator' => '!==',
            'value'    => null,
        ),
	),
));

Kirki::add_field('neuron_kirki', [
	'type'        => 'color',
	'settings'    => 'background_gradient_top_color',
	'label'       => __('Color', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => '',
	'transport' => 'postMessage',
	'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => '.l-theme-wrapper .l-main-wrapper',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient(gradientAngledeg, $ topLocation%, bottomColor bottomLocation%)',
			'pattern_replace' => array(
				'topLocation'    => 'background_gradient_top_location',
				'bottomColor' => 'background_gradient_bottom_color',
				'bottomLocation' => 'background_gradient_bottom_location',
				'gradientType' => 'background_gradient_type',
				'gradientAngle' => 'background_gradient_angle'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'slider',
	'settings'    => 'background_gradient_top_location',
	'label'       => esc_html__('Location', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 0,
	'transport' => 'postMessage',
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => '.l-theme-wrapper .l-main-wrapper',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient(gradientAngledeg, topColor $%, bottomColor bottomLocation%)',
			'pattern_replace' => array(
				'topColor'    => 'background_gradient_top_color',
				'bottomColor' => 'background_gradient_bottom_color',
				'bottomLocation' => 'background_gradient_bottom_location',
				'gradientType' => 'background_gradient_type',
				'gradientAngle' => 'background_gradient_angle'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'color',
	'settings'    => 'background_gradient_bottom_color',
	'label'       => __('Second Color', 'neuron-core'),
	'section'     => 'general_site',
	'transport' => 'postMessage',
	'default'     => '#f2295b',
	'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => '.l-theme-wrapper .l-main-wrapper',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient(gradientAngledeg, topColor topLocation%, $ bottomLocation%)',
			'pattern_replace' => array(
				'topColor'    => 'background_gradient_top_color',
				'topLocation'    => 'background_gradient_top_location',
				'bottomLocation' => 'background_gradient_bottom_location',
				'gradientType' => 'background_gradient_type',
				'gradientAngle' => 'background_gradient_angle'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'slider',
	'settings'    => 'background_gradient_bottom_location',
	'label'       => esc_html__('Location', 'neuron-core'),
	'section'     => 'general_site',
	'transport' => 'postMessage',
	'default'     => 100,
	'choices'     => [
		'min'  => 1,
		'max'  => 100,
		'step' => 1,
	],
	'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => '.l-theme-wrapper .l-main-wrapper',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient(gradientAngledeg, topColor topLocation%, bottomColor $%)',
			'pattern_replace' => array(
				'topColor'    => 'background_gradient_top_color',
				'topLocation'    => 'background_gradient_top_location',
				'bottomColor' => 'background_gradient_bottom_color',
				'gradientType' => 'background_gradient_type',
				'gradientAngle' => 'background_gradient_angle'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'select',
	'settings'    => 'background_gradient_type',
	'label'       => esc_html__('Type', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 'linear',
	'choices'     => [
		'linear'  => esc_html__('Linear', 'neuron-core'),
		'radial' => esc_html__('Radial', 'neuron-core'),
	],
	'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => '.l-theme-wrapper .l-main-wrapper',
			'property'        => 'background',
			'value_pattern'   => '$-gradient(gradientAngledeg, topColor topLocation%, bottomColor bottomLocation%)',
			'pattern_replace' => array(
				'topColor'    => 'background_gradient_top_color',
				'topLocation'    => 'background_gradient_top_location',
				'bottomColor' => 'background_gradient_bottom_color',
				'bottomLocation' => 'background_gradient_bottom_location',
				'gradientAngle' => 'background_gradient_angle'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'slider',
	'settings'    => 'background_gradient_angle',
	'label'       => esc_html__('Angle', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 180,
	'transport' => 'postMessage',
	'choices'     => [
		'min'  => 0,
		'max'  => 360,
		'step' => 1,
	],
	'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
    	array(
    		'setting'  => 'background_gradient_type',
    		'operator' => '==',
    		'value'    => 'linear',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => '.l-theme-wrapper .l-main-wrapper',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient($deg, topColor topLocation%, bottomColor bottomLocation%)',
			'pattern_replace' => array(
				'topColor'    => 'background_gradient_top_color',
				'topLocation'    => 'background_gradient_top_location',
				'bottomColor' => 'background_gradient_bottom_color',
				'bottomLocation' => 'background_gradient_bottom_location',
				'gradientType' => 'background_gradient_type'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'select',
	'settings'    => 'background_gradient_position',
	'label'       => esc_html__('Position', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 0,
	'transport' => 'postMessage',
	'choices'     => [
		'at center center'  => esc_html__('Center Center', 'neuron-core'),
		'at center left' => esc_html__('Center Left', 'neuron-core'),
		'at center right' => esc_html__('Center Right', 'neuron-core'),
		'at top center' => esc_html__('Top Center', 'neuron-core'),
		'at top left' => esc_html__('Top Left', 'neuron-core'),
		'at top right' => esc_html__('Top Right', 'neuron-core'),
		'at bottom center' => esc_html__('Bottom Center', 'neuron-core'),
		'at bottom left' => esc_html__('Bottom Left', 'neuron-core'),
		'at bottom right' => esc_html__('Bottom Right', 'neuron-core')
	],
	'active_callback'    => array(
    	array(
    		'setting'  => 'background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
    	array(
    		'setting'  => 'background_gradient_type',
    		'operator' => '=',
    		'value'    => 'radial',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => '.l-theme-wrapper .l-main-wrapper',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient($, topColor topLocation%, bottomColor bottomLocation%)',
			'pattern_replace' => array(
				'topColor'    => 'background_gradient_top_color',
				'topLocation'    => 'background_gradient_top_location',
				'bottomColor' => 'background_gradient_bottom_color',
				'bottomLocation' => 'background_gradient_bottom_location',
				'gradientType' => 'background_gradient_type'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', array(
	'type'        => 'select',
	'settings'    => 'body_offset',
    'label'       => esc_html__('Body Offset', 'neuron-core'),
    'description' => __('Create a left or right spacing to the content, best use case when creating a lateral header to eleminate the FOUC effect.', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('On', 'neuron-core'),
        '2' => esc_attr__('Off', 'neuron-core')
    ),
));

Kirki::add_field('neuron_kirki', [
	'type'        => 'dimensions',
	'settings'    => 'body_offset_padding',
	'label'       => esc_html__('Offset Values', 'neuron-core'),
	'description' => __('Enter the values of the offset, if you\'re using the menu on the left, add padding on the left side and so on. <br /><small>Note: Do not forget to enter the unit too.</small>', 'neuron-core'),
    'section'     => 'general_site',
    'transport'   => 'postMessage',
	'default'     => [
		'padding-left'  => '',
		'padding-right' => '',
	],
	'choices'     => [
		'labels' => [
			'padding-left'  => esc_html__('Left', 'neuron-core'),
			'padding-right'  => esc_html__('Right', 'neuron-core'),
		],
	],
	'active_callback' => array(
		array(
			'setting'  => 'body_offset',
			'operator' => '==',
			'value'    => '1'
		),
		array(
			'setting'  => 'site_width',
			'operator' => '==',
			'value'    => 'full-width'
		),
    ),
    'js_vars'    => array(
        array(
            'element'  => ['body', '.l-primary-header--sticky', '.l-primary-footer--parallax'],
            'property' => 'padding-left',
            'choice'   => 'padding-left',
            'value_pattern'   => '$ !important;',
        ),
        array(
            'element'  => ['body', '.l-primary-header--sticky', '.l-primary-footer--parallax'],
            'property' => 'padding-right',
            'choice'   => 'padding-right',
            'value_pattern'   => '$ !important;'
        ),
    ),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'dimensions',
	'settings'    => 'body_offset_boxed_padding',
	'label'       => esc_html__('Offset Values', 'neuron-core'),
	'description' => __('Enter the values of the offset, if you\'re using the menu on the left, add padding on the left side and so on. <br /><small>Note: Do not forget to enter the unit too.</small>', 'neuron-core'),
    'section'     => 'general_site',
    'transport'   => 'postMessage',
	'default'     => [
		'padding-left'  => '',
		'padding-right' => '',
	],
	'choices'     => [
		'labels' => [
			'padding-left'  => esc_html__('Left', 'neuron-core'),
			'padding-right'  => esc_html__('Right', 'neuron-core'),
		],
	],
	'active_callback' => array(
		array(
			'setting'  => 'body_offset',
			'operator' => '==',
			'value'    => '1'
		),
		array(
			'setting'  => 'site_width',
			'operator' => '==',
			'value'    => 'boxed'
		),
    ),
    'js_vars'    => array(
        array(
            'element'  => ['.l-theme-wrapper .l-main-wrapper', '.l-primary-header--default', '.l-primary-footer__widgets__space', '.l-primary-footer__copyright__space'],
            'property' => 'padding-left',
            'choice'   => 'padding-left',
            'value_pattern'   => '$ !important;',
        ),
        array(
            'element'  => ['.l-theme-wrapper .l-main-wrapper', '.l-primary-header--default', '.l-primary-footer__widgets__space', '.l-primary-footer__copyright__space'],
            'property' => 'padding-right',
            'choice'   => 'padding-right',
            'value_pattern'   => '$ !important;'
        ),
    ),
]);

Kirki::add_field('neuron_kirki', array(
	'type'        => 'select',
	'settings'    => 'body_offset_breakpoint',
    'label'       => esc_html__('Offset Breakpoint', 'neuron-core'),
    'description' => __('Select from which device you want to remove the offset.', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => '1',
    'choices'     => array(
        '1' => esc_attr__('Tablet', 'neuron-core'),
        '2' => esc_attr__('Mobile', 'neuron-core')
	),
	'active_callback' => array(
		array(
			'setting'  => 'body_offset',
			'operator' => '==',
			'value'    => '1'
		),
	)
));

Kirki::add_field('neuron_kirki', array(
    'type'        => 'custom',
    'settings'    => 'background_divider',
    'label'       => '',
    'section'     => 'general_site',
	'default'     => '<hr />'
));

Kirki::add_field('neuron_kirki', [
	'type'        => 'radio-buttonset',
	'settings'    => 'site_width',
	'label'       => esc_html__('Site Width', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 'full-width',
	'choices'     => [
		'full-width'  => esc_html__('Full Width', 'neuron-core'),
		'boxed' => esc_html__('Boxed', 'neuron-core'),
	]
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'slider',
	'settings'    => 'boxed_width',
	'label'       => esc_html__('Boxed Width', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 1170,
	'transport' => 'postMessage',
	'choices'     => [
		'min'  => 600,
		'max'  => 1800,
		'step' => 10,
	],
	'active_callback'    => array(
    	array(
    		'setting'  => 'site_width',
    		'operator' => '==',
    		'value'    => 'boxed',
    	),
	),
	'js_vars'    => array(
		array(
			'element' => ['.l-theme-wrapper', '.l-primary-header--sticky', '.l-primary-footer--parallax'],
			'property' => 'width',
			'units' => 'px'
		),
	),
]);	

Kirki::add_field('neuron_kirki', [
	'type'        => 'radio-buttonset',
	'settings'    => 'boxed_background_type',
	'label'       => esc_html__('Boxed Background Type', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => '',
	'choices'     => [
		'classic'  => esc_html__('Classic', 'neuron-core'),
		'gradient' => esc_html__('Gradient', 'neuron-core'),
	],
	'active_callback'    => array(
    	array(
    		'setting'  => 'site_width',
    		'operator' => '==',
    		'value'    => 'boxed',
    	),
    ),
]);

Kirki::add_field('neuron_kirki', array(
    'settings'    => 'boxed_background_color',
    'section'     => 'general_site',
    'type'        => 'color',
    'label'       => __('Color', 'neuron-core'),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => 'body',
            'property' => 'background-color',
            'value_pattern'   => '$ !important;',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'classic',
    	),
	),
));

Kirki::add_field('neuron_kirki', array(
    'settings'    => 'boxed_background_image',
    'section'     => 'general_site',
    'type'        => 'image',
    'label'       => __('Image', 'neuron-core'),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => 'body',
            'property' => 'background',
            'value_pattern'   => 'url($)',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'classic',
        ),
	),
));

Kirki::add_field('neuron_kirki', array(
    'settings'    => 'boxed_background_repeat',
    'section'     => 'general_site',
    'type'        => 'select',
    'label'       => __('Repeat', 'neuron-core'),
    'transport'   => 'postMessage',
    'choices'     => [
		'no-repeat' => __('No Repeat', 'neuron-core'),
		'repeat' => __('Repeat All', 'neuron-core'),
		'repeat-x' => __('Repeat Horizontally', 'neuron-core'),
		'repeat-y' => __('Repeat Vertically', 'neuron-core')
    ],
    'default' => 'no-repeat',
    'js_vars'     => array(
        array(
            'element'  => 'body',
            'property' => 'background-repeat',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'classic',
        ),
         array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => '',
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => false,
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => 0,
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => null,
        ),
	),
));

Kirki::add_field('neuron_kirki', array(
    'settings'    => 'boxed_background_size',
    'section'     => 'general_site',
    'type'        => 'select',
    'label'       => __('Size', 'neuron-core'),
    'transport'   => 'postMessage',
    'choices'     => [
		'auto' => __('Auto', 'neuron-core'),
		'cover' => __('Cover', 'neuron-core'),
		'contain' => __('Contain', 'neuron-core'),
    ],
    'default' => 'auto',
    'js_vars'     => array(
        array(
            'element'  => 'body',
            'property' => 'background-size',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'classic',
        ),
         array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => '',
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => false,
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => 0,
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => null,
        ),
	),
));

Kirki::add_field('neuron_kirki', array(
    'settings'    => 'boxed_background_position',
    'section'     => 'general_site',
    'type'        => 'select',
    'label'       => __('Position', 'neuron-core'),
    'transport'   => 'postMessage',
    'choices'     => [
		'center center'  => esc_html__('Center Center', 'neuron-core'),
		'center left' => esc_html__('Center Left', 'neuron-core'),
		'center right' => esc_html__('Center Right', 'neuron-core'),
		'top center' => esc_html__('Top Center', 'neuron-core'),
		'top left' => esc_html__('Top Left', 'neuron-core'),
		'top right' => esc_html__('Top Right', 'neuron-core'),
		'bottom center' => esc_html__('Bottom Center', 'neuron-core'),
		'bottom left' => esc_html__('Bottom Left', 'neuron-core'),
		'bottom right' => esc_html__('Bottom Right', 'neuron-core')
    ],
    'default' => 0,
    'js_vars'     => array(
        array(
            'element'  => 'body',
            'property' => 'background-position',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'classic',
        ),
         array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => '',
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => false,
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => 0,
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => null,
        ),
	),
));

Kirki::add_field('neuron_kirki', array(
    'settings'    => 'boxed_background_attachment',
    'section'     => 'general_site',
    'type'        => 'select',
    'label'       => __('Attachment', 'neuron-core'),
    'transport'   => 'postMessage',
    'choices'     => [
		'scroll'  => esc_html__('Scroll', 'neuron-core'),
		'fixed' => esc_html__('Fixed', 'neuron-core')
    ],
    'default' => 'scroll',
    'js_vars'     => array(
        array(
            'element'  => 'body',
            'property' => 'background-attachment',
        ),
    ),
     'active_callback'    => array(
         array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'classic',
        ),
         array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => '',
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => false,
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => 0,
        ),
        array(
            'setting'  => 'boxed_background_image',
            'operator' => '!==',
            'value'    => null,
        ),
	),
));

Kirki::add_field('neuron_kirki', [
	'type'        => 'color',
	'settings'    => 'boxed_background_gradient_top_color',
	'label'       => __('Color', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => '',
	'transport' => 'postMessage',
	'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => 'body',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient(gradientAngledeg, $ topLocation%, bottomColor bottomLocation%)',
			'pattern_replace' => array(
				'topLocation'    => 'boxed_background_gradient_top_location',
				'bottomColor' => 'boxed_background_gradient_bottom_color',
				'bottomLocation' => 'boxed_background_gradient_bottom_location',
				'gradientType' => 'boxed_background_gradient_type',
				'gradientAngle' => 'boxed_background_gradient_angle'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'slider',
	'settings'    => 'boxed_background_gradient_top_location',
	'label'       => esc_html__('Location', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 0,
	'transport' => 'postMessage',
	'choices'     => [
		'min'  => 1,
		'max'  => 100,
		'step' => 1,
	],
	'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => 'body',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient(gradientAngledeg, topColor $%, bottomColor bottomLocation%)',
			'pattern_replace' => array(
				'topColor'    => 'boxed_background_gradient_top_color',
				'bottomColor' => 'boxed_background_gradient_bottom_color',
				'bottomLocation' => 'boxed_background_gradient_bottom_location',
				'gradientType' => 'boxed_background_gradient_type',
				'gradientAngle' => 'boxed_background_gradient_angle'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'color',
	'settings'    => 'boxed_background_gradient_bottom_color',
	'label'       => __('Bottom Color', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => '#f2295b',
	'transport' => 'postMessage',
	'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => 'body',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient(gradientAngledeg, topColor topLocation%, $ bottomLocation%)',
			'pattern_replace' => array(
				'topColor'    => 'boxed_background_gradient_top_color',
				'topLocation'    => 'boxed_background_gradient_top_location',
				'bottomLocation' => 'boxed_background_gradient_bottom_location',
				'gradientType' => 'boxed_background_gradient_type',
				'gradientAngle' => 'boxed_background_gradient_angle'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'slider',
	'settings'    => 'boxed_background_gradient_bottom_location',
	'label'       => esc_html__('Location', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 100,
	'transport' => 'postMessage',
	'choices'     => [
		'min'  => 1,
		'max'  => 100,
		'step' => 1,
	],
	'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => 'body',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient(gradientAngledeg, topColor topLocation%, bottomColor $%)',
			'pattern_replace' => array(
				'topColor'    => 'boxed_background_gradient_top_color',
				'topLocation'    => 'boxed_background_gradient_top_location',
				'bottomColor' => 'boxed_background_gradient_bottom_color',
				'gradientType' => 'boxed_background_gradient_type',
				'gradientAngle' => 'boxed_background_gradient_angle'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'select',
	'settings'    => 'boxed_background_gradient_type',
	'label'       => esc_html__('Type', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 'linear',
	'choices'     => [
		'linear'  => esc_html__('Linear', 'neuron-core'),
		'radial' => esc_html__('Radial', 'neuron-core'),
	],
	'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => 'body',
			'property'        => 'background',
			'value_pattern'   => '$-gradient(gradientAngledeg, topColor topLocation%, bottomColor bottomLocation%)',
			'pattern_replace' => array(
				'topColor'    => 'boxed_background_gradient_top_color',
				'topLocation'    => 'boxed_background_gradient_top_location',
				'bottomColor' => 'boxed_background_gradient_bottom_color',
				'bottomLocation' => 'boxed_background_gradient_bottom_location',
				'gradientAngle' => 'boxed_background_gradient_angle'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'slider',
	'settings'    => 'boxed_background_gradient_angle',
	'label'       => esc_html__('Angle', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 180,
	'transport' => 'postMessage',
	'choices'     => [
		'min'  => 0,
		'max'  => 360,
		'step' => 10,
	],
	'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
    	array(
    		'setting'  => 'boxed_background_gradient_type',
    		'operator' => '==',
    		'value'    => 'linear',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => 'body',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient($deg, topColor topLocation%, bottomColor bottomLocation%)',
			'pattern_replace' => array(
				'topColor'    => 'boxed_background_gradient_top_color',
				'topLocation'    => 'boxed_background_gradient_top_location',
				'bottomColor' => 'boxed_background_gradient_bottom_color',
				'bottomLocation' => 'boxed_background_gradient_bottom_location',
				'gradientType' => 'boxed_background_gradient_type'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'select',
	'settings'    => 'boxed_background_gradient_position',
	'label'       => esc_html__('Position', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 0,
	'transport' => 'postMessage',
	'choices'     => [
		'at center center'  => esc_html__('Center Center', 'neuron-core'),
		'at center left' => esc_html__('Center Left', 'neuron-core'),
		'at center right' => esc_html__('Center Right', 'neuron-core'),
		'at top center' => esc_html__('Top Center', 'neuron-core'),
		'at top left' => esc_html__('Top Left', 'neuron-core'),
		'at top right' => esc_html__('Top Right', 'neuron-core'),
		'at bottom center' => esc_html__('Bottom Center', 'neuron-core'),
		'at bottom left' => esc_html__('Bottom Left', 'neuron-core'),
		'at bottom right' => esc_html__('Bottom Right', 'neuron-core')
	],
	'active_callback'    => array(
        array(
            'setting'  => 'site_width',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    	array(
    		'setting'  => 'boxed_background_type',
    		'operator' => '==',
    		'value'    => 'gradient',
    	),
    	array(
    		'setting'  => 'boxed_background_gradient_type',
    		'operator' => '=',
    		'value'    => 'radial',
    	),
	),
	'js_vars'    => array(
		array(
			'element'         => 'body',
			'property'        => 'background',
			'value_pattern'   => 'gradientType-gradient($, topColor topLocation%, bottomColor bottomLocation%)',
			'pattern_replace' => array(
				'topColor'    => 'boxed_background_gradient_top_color',
				'topLocation'    => 'boxed_background_gradient_top_location',
				'bottomColor' => 'boxed_background_gradient_bottom_color',
				'bottomLocation' => 'boxed_background_gradient_bottom_location',
				'gradientType' => 'boxed_background_gradient_type'
			),
		),
	),
]);

Kirki::add_field('neuron_kirki', array(
    'type'        => 'custom',
    'settings'    => 'boxed_divider',
    'label'       => '',
    'section'     => 'general_site',
	'default'     => '<hr />'
));

// Frames
Kirki::add_field('neuron_kirki', array(
	'type'        => 'select',
	'settings'    => 'theme_borders',
    'label'       => esc_html__('Theme Borders', 'neuron-core'),
    'description' => __('Add borders all around the theme, you\'ll be able to specify the thickness and the color in the fields below.', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('On', 'neuron-core'),
        '2' => esc_attr__('Off', 'neuron-core')
    ),
));

Kirki::add_field('neuron_kirki', [
	'type'        => 'slider',
	'settings'    => 'theme_borders_thickness',
	'label'       => esc_html__('Border Thickness', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'active_callback' => array(
		array(
			'setting'  => 'theme_borders',
			'operator' => '==',
			'value'    => '1'
		),
	)
]);

Kirki::add_field('neuron_kirki', [
	'type'        => 'color',
	'settings'    => 'theme_borders_color',
	'label'       => __('Border Color', 'neuron-core'),
	'section'     => 'general_site',
	'default'     => '#FFFFFF',
	'active_callback' => array(
		array(
			'setting'  => 'theme_borders',
			'operator' => '==',
			'value'    => '1'
		),
	)
]);