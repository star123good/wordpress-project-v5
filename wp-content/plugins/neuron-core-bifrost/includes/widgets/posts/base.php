<?php
namespace NeuronElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class NeuronPosts extends Widget_Base {

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
		return 'neuron-posts';
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
		return __('Posts', 'neuron-core');
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
		return 'eicon-gallery-grid neuron-badge';
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

	public function neuron_return_taxonomies($terms, $type = 'slug', $single = false) {
		if (class_exists('WooCommerce')) {
			$terms_array = ['post', 'portfolio', 'product'];
		} else {
			$terms_array = ['post', 'portfolio'];
		}
		
		if (is_singular($terms_array) && $single) {
			$terms = get_the_terms(get_the_ID(), $terms);
			$name = $type;
		} else {
			$terms = get_terms($terms);
			$name = 'name';
		}

		$output = [];

		if (!$terms && is_wp_error($terms)) {
			return;
		}

		foreach ($terms as $term) {
			$output[$term->$type] = $term->$name;    
		}

		return $output;
	}

	public function neuron_return_posts($post_type) {
		$post_type = get_posts([
			'post_type' => $post_type, 
			'posts_per_page' => -1
		]);
		
		$output = [];

		if (!$post_type) {
			return;
		}

		foreach ($post_type as $post) {
			$output[$post->ID] = $post->post_title;
		}

		return $output;
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
		 * Justified
		 * 
		 * Override the layotu model when
		 * Justified is selected, because
		 * it works only with meta inside
		 */
		if ($settings['posts_layout_type'] == 'justified') {
			$settings['posts_layout_model'] = 'meta-inside';
		}

		/**
		 * Posts Type
		 */
		switch ($settings['posts_type']) {
			default:
				$neuron_posts_type = 'post';
				$neuron_posts_name = 'blog';
				$neuron_posts_taxonomy = 'category';
				$neuron_posts_normal_query = $settings['posts_query_normal_post'];
				$neuron_posts_metro_query = $settings['posts_query_metro_post'];
				$neuron_posts_wrapper_class = 'l-blog-wrapper';
				$neuron_posts_holder_class = 'l-blog-wrapper__posts-holder l-blog-wrapper__posts-holder--'. $settings['posts_layout_model'] .'';
				$neuron_posts_item_class = 'o-blog-post';
				break;
			case 'portfolio':
				$neuron_posts_type = 'portfolio';
				$neuron_posts_name = 'portfolio';
				$neuron_posts_taxonomy = 'portfolio_category';
				$neuron_posts_normal_query = $settings['posts_query_normal_portfolio'];
				$neuron_posts_metro_query = $settings['posts_query_metro_portfolio'];
				$neuron_posts_wrapper_class = 'l-portfolio-wrapper';
				$neuron_posts_holder_class = 'l-portfolio-wrapper__items-holder l-portfolio-wrapper__items-holder--'. $settings['posts_layout_model'] . '';
				$neuron_posts_item_class = 'o-portfolio-item';
				break;
			case 'product':
				$neuron_posts_type = 'product';
				$neuron_posts_name = 'shop';
				$neuron_posts_taxonomy = 'product_cat';
				$neuron_posts_normal_query = $settings['posts_query_normal_product'];
				$neuron_posts_metro_query = $settings['posts_query_metro_product'];
				$neuron_posts_wrapper_class = 'l-woocommerce-wrapper';
				$neuron_posts_holder_class = 'l-woocommerce-wrapper__products-holder l-woocommerce-wrapper__products-holder--'. $settings['posts_layout_model'] .'';
				$neuron_posts_item_class = 'product-holder';
				break;
		}

		/**
         * Paged
         * 
         * Tell the WordPress exactly
         * what page is active.
         */
		if (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		
		/**
         * Loop Operator
         * 
         * Show all posts incase no
         * category is selected. Works
		 * only when isotope is selected.
         */
		if ($neuron_posts_normal_query) {
			$loop_operator = "IN";
		} else {
			$loop_operator = "NOT IN";
		}

		/**
         * Query IDs
         */
        $neuron_posts_query = [];
        if ($neuron_posts_metro_query) {
            foreach ($neuron_posts_metro_query as $post) {
				$neuron_posts_query[] = $post['post_id'];
            }
		}

		/**
		 * Query
		 */
		if ($settings['posts_layout_type'] == 'metro') {
			$args = [
				'post_type' => $neuron_posts_type,
				'posts_per_page' => $settings['posts_ppp'],
				'paged' => $paged,
				'post__in' => $neuron_posts_query,
				'orderby' => 'post__in'
			];
		} elseif ($settings['posts_auto_query'] == 'yes' && is_singular(['post', 'portfolio'])) {
			switch (get_post_type()) {
				default:
					$neuron_posts_taxonomy = 'category';
					break;
				case 'portfolio':
					$neuron_posts_taxonomy = 'portfolio_category';
					break;
			}

			$args = [
				'post_type' => $neuron_posts_type,
				'posts_per_page' => $settings['posts_ppp'],
				'order' => $settings['posts_query_order'],
				'orderby' => $settings['posts_query_orderby'],
				'paged' => $paged,
				'post__not_in' => array(get_the_ID()),
			];

			if (get_post_type() == 'portfolio') {
				$args['tax_query'] = [
					[
						'taxonomy' => $neuron_posts_taxonomy,
						'field' => 'slug',
						'terms' => implode(',', $this->neuron_return_taxonomies($neuron_posts_taxonomy, 'slug', true)),
					]
				];
			} else {
				$args['cat'] = implode(',', $this->neuron_return_taxonomies($neuron_posts_taxonomy, 'term_id', true));
			}

		} else {
			$args = [
				'post_type' => $neuron_posts_type,
				'posts_per_page' => $settings['posts_ppp'],
				'paged' => $paged,
				'order' => $settings['posts_query_order'],
				'orderby' => $settings['posts_query_orderby'],
				'tax_query' => [
					[
						'taxonomy' => $neuron_posts_taxonomy,
						'field' => 'slug',
						'terms' => $neuron_posts_normal_query,
						'operator' => $loop_operator
					]
				],
			];
		}

		include(__DIR__ . '/shop/orderby.php');

		$neuron_filter = isset($_GET['filter']) ? $_GET['filter'] : '';
		$neuron_exclude = isset($_GET['exclude']) ? $_GET['exclude'] : '';

		if ($neuron_filter) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => $neuron_posts_taxonomy,
					'field' => 'slug',
					'terms' => $neuron_filter
				)
			);
		}

		if ($neuron_exclude) {
			$args['post__not_in'] = $neuron_exclude;
		}

		$query = new \WP_Query($args);

		/**
		 * Hover Visibility
		 * 
		 * Pass the variable to global query to
		 * inherit later in meta-inside and outside
		 * of the portfolio types.
		 */
		set_query_var('neuron_posts_hover_visibility', $settings['posts_hover_visibility']);

		/**
		 * Hover Animation
		 * 
		 * Pass the variable to global query to
		 * inherit later in meta-inside and outside
		 * of the portfolio types.
		 */
		set_query_var('neuron_posts_hover_animation', $settings['posts_hover_animation']);

		/**
		 * Meta
		 */
		$settings['posts_layout_model'] == 'meta-inside' ? $settings['posts_meta_thumbnail'] = 'yes' : '';
		set_query_var('neuron_posts_meta_thumbnail', $settings['posts_meta_thumbnail']);
		set_query_var('neuron_posts_meta_title', $settings['posts_meta_title']);
		set_query_var('neuron_posts_meta_categories', $settings['posts_meta_categories']);
		set_query_var('neuron_posts_meta_date', $settings['posts_meta_date']);
		set_query_var('neuron_posts_meta_tags', $settings['posts_meta_tags']);
		set_query_var('neuron_posts_meta_excerpt', $settings['posts_meta_excerpt']);
		set_query_var('neuron_posts_meta_author', $settings['posts_meta_author']);
		set_query_var('neuron_posts_meta_price', $settings['posts_meta_price']);
		set_query_var('neuron_posts_meta_results_count', $settings['posts_meta_results_count']);
		set_query_var('neuron_posts_meta_catalog_ordering', $settings['posts_meta_catalog_ordering']);
		set_query_var('neuron_posts_meta_ordering_default', $settings['posts_meta_ordering_default']);

		/** 
		 * Carousel Height
		 */ 
		set_query_var('neuron_posts_carousel_height', $settings['posts_carousel_height']);

		/**
		 * Thumbnail Sizes
		 */
		$neuron_thumbnail_output = null;

		if ($settings['posts_thumbnail_resizer'] == 'yes') {
			if ($settings['posts_thumbnail_resizer'] == 'yes') {
				if ($settings['posts_thumbnail_sizes_custom_dimension']) {
					$media_custom_dimension = $settings['posts_thumbnail_sizes_custom_dimension'];
					$media_image_size = [isset($media_custom_dimension['width']) ? $media_custom_dimension['width'] : 500, isset($media_custom_dimension['width']) ? $media_custom_dimension['width'] : 9999];
				} else {
					$media_image_size = $settings['posts_thumbnail_sizes_size'];
				}
			} else {
				$media_image_size = 'full';
			}
			$neuron_thumbnail_output = $media_image_size;
		}

		set_query_var('neuron_posts_thumbnail_resizer', $neuron_thumbnail_output);

		/**
		 * Style
		 */
		set_query_var('neuron_posts_style_meta_icon', $settings['posts_style_meta_icon']);
		set_query_var('neuron_posts_style_author_avatar', $settings['posts_style_author_avatar']);
		set_query_var('neuron_posts_style_author_alignment', $settings['posts_style_author_alignment']);

		/**
		 * Hover 
		 */
		set_query_var('neuron_posts_style_hover_active', $settings['posts_style_hover_active']);
		set_query_var('neuron_posts_style_hover_meta_vertical_alignment', $settings['posts_style_hover_meta_vertical_alignment']);
		set_query_var('neuron_posts_style_hover_icon', $settings['posts_style_hover_icon']);
		set_query_var('neuron_posts_style_hover_icon_vertical_alignment', $settings['posts_style_hover_icon_vertical_alignment']);
		set_query_var('neuron_posts_style_hover_icon_horizontal_alignment', $settings['posts_style_hover_icon_horizontal_alignment']);
		
		if ($query->have_posts()) :
	?>
		<div class="l-posts-wrapper l-filters-holder <?php echo esc_attr('l-posts-wrapper--'. $settings['posts_layout_model'] .'') ?> h-overflow-hidden <?php echo esc_attr($neuron_posts_wrapper_class) ?>" data-posts="<?php echo esc_attr($this->get_ID()) ?>">
			<?php $settings['posts_layout'] != 'carousel' ? include(__DIR__ . '/templates/filters.php')  : '' ?>
			<?php $settings['posts_type'] == 'product' ? include(__DIR__ . '/shop/top-bar.php') : '' ?>
			<div class="<?php echo esc_attr($neuron_posts_holder_class) ?> h-overflow-hidden">
				<?php 
				/**
				 * Layout Type
				 */
				if ($settings['posts_layout'] == 'isotope') {
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
