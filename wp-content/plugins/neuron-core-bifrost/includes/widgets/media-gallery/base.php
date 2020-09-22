<?php
namespace NeuronElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class NeuronMediaGallery extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'neuron-media-gallery';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __('Media Gallery', 'neuron-core');
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image neuron-badge';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return ['neuron-category'];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		/**
		 * Content Options
		 */
		include(__DIR__ . '/options/content/base.php');

		/**
		 * Style Options
		 */
		include(__DIR__ . '/options/style/base.php');
	}

	public function neuron_return_metro_columns() {
		$columns = [
			'1-column' => esc_attr__('1 Column', 'neuron-core'),
			'2-column' => esc_attr__('2 Column', 'neuron-core'),
			'3-column' => esc_attr__('3 Column', 'neuron-core'),
			'4-column' => esc_attr__('4 Column', 'neuron-core'),
			'5-column' => esc_attr__('5 Column', 'neuron-core'),
			'6-column' => esc_attr__('6 Column', 'neuron-core'),
			'7-column' => esc_attr__('7 Column', 'neuron-core'),
			'8-column' => esc_attr__('8 Column', 'neuron-core'),
			'9-column' => esc_attr__('9 Column', 'neuron-core'),
			'10-column' => esc_attr__('10 Column', 'neuron-core'),
			'11-column' => esc_attr__('11 Column', 'neuron-core'),
			'12-column' => esc_attr__('12 Column', 'neuron-core')
		];

		return $columns;
	}

	/**
	 * Categories
	 * 
	 * Get all categories and 
	 * display them in a select, it's up 
	 * to the post type to change this category
	 */
	public function neuron_get_media_categories() {
		$media_categories = [];
		$media_terms = get_terms('media_category', array('hide_empty' => false));
		if ($media_terms && !is_wp_error($media_terms)) {
			foreach ($media_terms as $term) {
				$media_categories[$term->slug] = $term->name;    
			}
		}
		return $media_categories;
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
		 * Query
		 */
		$neuron_gallery_media_query = $settings['media_gallery_layout_type'] == 'metro' ? $settings['media_gallery_query_metro'] : $settings['media_gallery_query_normal'];

		/**
		 * Justified
		 * 
		 * Override the layotu model when
		 * Justified is selected, because
		 * it works only with meta inside
		 */
		if ($settings['media_gallery_layout_type'] == 'justified') {
			$settings['media_gallery_layout_model'] = 'meta-inside';
		}
		
		/**
		 * Layout Model
		 */
		$neuron_media_gallery_class = ['m-media-gallery'];
		if ($settings['media_gallery_layout_model']) {
			$neuron_media_gallery_class[] = 'm-media-gallery--' . $settings['media_gallery_layout_model'];
		}

		/**
		 * Offsets
		 */
		$neuron_media_gallery_class[] = $settings['media_gallery_offset'] ? 'h-offset--' . $settings['media_gallery_offset'] : '';
		$neuron_media_gallery_class[] = $settings['media_gallery_offset_tablet'] ? 'h-offset__tablet--' . $settings['media_gallery_offset_tablet'] : '';
		$neuron_media_gallery_class[] = $settings['media_gallery_offset_mobile'] ? 'h-offset__mobile--' . $settings['media_gallery_offset_mobile'] : '';

		if ($neuron_gallery_media_query) :
	?>
		<div class="l-posts-wrapper l-filters-holder l-posts-wrapper--<?php echo $settings['media_gallery_layout_model'] ?>" data-posts="<?php echo esc_attr($this->get_ID()) ?>">
			<?php $settings['media_gallery_layout'] != 'carousel' ? include(__DIR__ . '/templates/filters.php')  : '' ?>
			<div class="<?php echo esc_attr(implode(' ', $neuron_media_gallery_class)) ?>">
				<?php 
				/**
				 * Layout Type
				 */
				if ($settings['media_gallery_layout'] == 'isotope') {
					include(__DIR__ . '/layout/isotope.php');
				} else {
					include(__DIR__ . '/layout/carousel.php');
				}
				?>
			</div>
        </div>
        <?php
		endif; wp_reset_postdata();
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
