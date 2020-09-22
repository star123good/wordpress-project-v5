<?php
namespace NeuronElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class NeuronAdvancedGoogleMaps extends Widget_Base {

	public function get_name() {
		return 'neuron-advanced-google-maps';
	}

	public function get_title() {
		return __('Advanced Google Maps', 'neuron-core');
	}

	public function get_icon() {
		return 'eicon-google-maps neuron-badge';
	}

	public function get_categories() {
		return ['neuron-category'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'functionality_tab',
			[
				'label' => __('Functionality', 'neuron-core'),
			]
        );

        $this->add_control(
			'api_key_raw',
			[
                'raw' => __('<small>Do not forget to enter the API Key in the Customizer > Utility > <a href='. esc_url( admin_url( 'customize.php' )) .'>Google Maps</a></small>', 'neuron-core'),
                'type' => Controls_Manager::RAW_HTML,
                'field_type' => 'html'
			]
		);
        
        $this->add_control(
			'map_lat_long',
			[
                'raw' => __('<small>Enter the map latitude coordinates, to get map coordinates <a href="https://www.latlong.net/" target="_BLANK">click here</a>.</small>', 'neuron-core'),
                'type' => Controls_Manager::RAW_HTML,
                'field_type' => 'html'
			]
		);

        $this->add_control(
			'map_latitude',
			[
				'label'   => __('Map Latitude', 'neuron-core'),
                'type' => Controls_Manager::TEXT,
                'default' => '40.783058'
			]
        );

        $this->add_control(
			'map_longitude',
			[
				'label'   => __('Map Longitude', 'neuron-core'),
                'type' => Controls_Manager::TEXT,
                'default' => '-73.971252'
			]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
			'options_tab',
			[
				'label' => __('Options', 'neuron-core'),
			]
        );

        $this->add_control(
			'zoom',
			[
				'label' => __('Zoom', 'neuron-core'),
				'type' => Controls_Manager::NUMBER,
				'default' => 13,
				'min'     => 1,
				'max'     => 20,
				'step'    => 1
			]
        );
        
        $this->add_control(
			'style',
			[
                'label' => __('Style', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => __('Default', 'neuron-core'),
					'classic' => __('Classic', 'neuron-core'),
					'custom' => __('Custom', 'neuron-core')
				],
				'default' => 'classic'
			]
		);
		
		 $this->add_control(
			'custom_style',
			[
				'label'   => __('Custom Style', 'neuron-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => __('Enter the custom style, get custom style <a href="https://snazzymaps.com/" target="_BLANK">here</a>.', 'neuron-core'),
                'condition' => [
                    'style' => 'custom'
                ]
			]
        );

        $this->add_responsive_control(
			'height',
			[
				'label' => __('Height', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['vh', 'px'],
				'selectors' => [
					'{{WRAPPER}} .map-holder > .map' => 'height: {{SIZE}}{{UNIT}} !important;',
				],
				'default' => [
					'unit' => 'px',
					'size' => 500
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					]
				]
			]
		);

        $this->add_control(
			'map_controls_heading',
			[
				'label' => __('Map Controls', 'neuron-core'),
				'type' => \Elementor\Controls_Manager::HEADING
			]
        );

        $this->add_control(
			'scroll_zoom',
			[
				'label' => __('Scroll Zoom', 'neuron-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
        );

        $this->add_control(
			'type',
			[
				'label' => __('Type', 'neuron-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
        );

        $this->add_control(
			'zoom_control',
			[
				'label' => __('Zoom', 'neuron-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );

        $this->add_control(
			'fullscreen',
			[
				'label' => __('Fullscreen', 'neuron-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
        );

        $this->add_control(
			'street_view',
			[
				'label' => __('Street View', 'neuron-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
        );

        $this->add_control(
			'draggable',
			[
				'label' => __('Draggable', 'neuron-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );

        $this->end_controls_section();
        
         $this->start_controls_section(
			'markers_tab',
			[
				'label' => __('Markers', 'neuron-core'),
			]
        );

		$this->add_control(
            'markers',
            [
                'label' => __('Markers', 'neuron-core'),
                'description' => __('Add markers to the map.', 'neuron-core'),
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'fields' => [
					[
                        'name' => 'map_latitude',
						'label' => __('Map Latitude', 'neuron-core'),
                        'type' => Controls_Manager::TEXT
                    ],
					[
                        'name' => 'map_longitude',
						'label' => __('Map Longitude', 'neuron-core'),
                        'type' => Controls_Manager::TEXT
                    ],
                    [
                        'name' => 'image',
                        'label' => __('Image', 'neuron-core'),
						'type' => Controls_Manager::MEDIA
                    ],
                    [
                        'name' => 'retina',
						'label' => __('Retina Ready', 'neuron-core'),
                        'type' => Controls_Manager::SWITCHER,
                        'default' => 'yes'
                    ],
                    [
                        'name' => 'title',
						'label' => __('Title', 'neuron-core'),
						'type' => Controls_Manager::TEXT,
                    ],
					[
                        'name' => 'content',
                        'label' => __('Content', 'neuron-core'),
                        'type' => Controls_Manager::TEXTAREA
                    ],
                ],
                'default' => [
                    [
                        'map_latitude' => '40.775541',
                        'map_longitude' => '-73.986267',
                        'title' => __('Marker Title 1#', 'neuron-core'),
                        'content' => __('Marker Content 1#', 'neuron-core'),
                        'retina' => 'yes'
                    ],
                    [
                        'map_latitude' => '40.787239',
                        'map_longitude' => '-73.945772',
                        'title' => __('Marker Title 2#', 'neuron-core'),
                        'content' => __('Marker Content 2#', 'neuron-core'),
                        'retina' => 'yes'
                    ]
                ]
            ]
		);

		$this->end_controls_section();
    }

    /**
    * Print Markers
    */
    public function print_markers($markers) {
        if (!$markers) {
            return;
        }

        $output = [];

        foreach($markers as $marker) {
            $title = $marker['title'] ? '<h4 class="mb-0 h-small-bottom-padding">' . $marker['title'] . '</h4>' : '';
            $content = $marker['content'] ? '<p class="mb-0">' . $marker['content'] . '</p>' : '';
            $map_latitude = $marker['map_latitude'] ? $marker['map_latitude'] : '';
            $map_longitude = $marker['map_longitude'] ? $marker['map_longitude'] : '';
            $marker_url = isset($marker['image']['url']) && $marker['image']['url'] ? $marker['image']['url'] : '0';
            $marker_dimensions = isset($marker['image']['id']) && $marker['image']['id'] ? wp_get_attachment_metadata($marker['image']['id']) : '';
            $width = isset($marker_dimensions['width']) && $marker_dimensions['width'] ? $marker_dimensions['width'] : 100;
            $height = isset($marker_dimensions['height']) && $marker_dimensions['height'] ? $marker_dimensions['height'] : 100;
            $retina_marker = isset($marker['retina']) && $marker['retina'] == 'yes' ? 'true' : 'false';

            $output[] = "[' $title $content ', $map_latitude, $map_longitude, '$marker_url', $width, $height, $retina_marker]";
        }

        return implode(', ', $output);
    }

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings_for_display();
        
        /**
         * Style
         */
        $map_style = '';
        if ($settings['style'] == 'classic') {
            $map_style = '[{"featureType":"administrative","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","stylers":[{"color":"#ffffff"},{"weight":0.5}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#B4D0EF"}]}]';
        } else if ($settings['style'] == 'custom' && $settings['custom_style']) {
            $map_style = $settings['custom_style'];
        } 
	?>
        <div class="map-holder">
            <div id="map-<?php echo esc_attr($this->get_id()); ?>" class="map"></div>
        </div>
        <script>
            var locations = [
                <?php echo $this->print_markers($settings['markers']) ?>
            ];

            var myOptions = {
                center: new google.maps.LatLng(<?php echo esc_attr($settings['map_latitude']) ?>, <?php echo esc_attr($settings['map_longitude']) ?>),
                zoom: <?php echo $settings['zoom'] ?>,
                scrollwheel: <?php echo $settings['scroll_zoom'] == 'yes' ? 'true' : 'false'  ?>,
                mapTypeControl: <?php echo $settings['type'] == 'yes' ? 'true' : 'false'  ?>,
                zoomControl: <?php echo $settings['zoom_control'] == 'yes' ? 'true' : 'false'  ?>,
                fullscreenControl: <?php echo $settings['fullscreen'] == 'yes' ? 'true' : 'false'  ?>,
                streetViewControl: <?php echo $settings['street_view'] == 'yes' ? 'true' : 'false'  ?>,
                draggable: <?php echo $settings['draggable'] == 'yes' ? 'true' : 'false'  ?>
            }

            var map = new google.maps.Map(document.getElementById('map-<?php echo esc_attr($this->get_id()); ?>'), myOptions);

            var infowindow = new google.maps.InfoWindow();
            var bounds = new google.maps.LatLngBounds();

            var marker, i;

            for (i = 0; i < locations.length; i++) {

                if (locations[i][6] == true) {
                    $scaled = new google.maps.Size(locations[i][4] / 2, locations[i][5] / 2);
                } else {
                    $scaled = new google.maps.Size(locations[i][4], locations[i][5]);
                }


                var icon = {
                    url: locations[i][3],
                    scaledSize: $scaled
                };

                if (locations[i][3] == '0') {
                    icon = '';
                }

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: icon,
                    animation: google.maps.Animation.DROP
                });

                bounds.extend(marker.position);

                if (locations[i][0] != " ") {
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }

            <?php if ($settings['style'] != 'default') : ?>
                var styledMapType = new google.maps.StyledMapType(
                    <?php echo ($map_style ? strip_tags($map_style) . "," : ""); ?>
                    { name: 'Styled Map' }
                );
                map.mapTypes.set('styled_map', styledMapType);
                map.setMapTypeId('styled_map');
            <?php endif; ?>
        </script>
	<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {}
}
