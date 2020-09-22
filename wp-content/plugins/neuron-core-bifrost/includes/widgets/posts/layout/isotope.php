<?php 
/**
 * Posts Layout Isotope
 */
$neuron_row_class = [];

/**
 * Layout Type Model
 */
switch ($settings['posts_layout_type']) {
    default: 
        $neuron_row_class[] = 'row masonry';
        break;
    case 'fitrows':
        $neuron_row_class[] = 'row fitRows masonry';
        break;
    case 'justified':
        $neuron_row_class[] = 'justified';
        break;
}

/**
 * Posts Columns
 * 
 * It changes the columns via the selector
 * item class, option can be inherited too.
 */
$neuron_selector_class = 'selector';

if (isset($settings['posts_columns']) && $settings['posts_layout_type'] != 'justified') {
    switch ($settings['posts_columns']) {
        case '1-column':
            $neuron_selector_class .= ' col-lg-12';
            break;
        case '2-columns':
            $neuron_selector_class .= ' col-lg-6';
            break;
        default:
            $neuron_selector_class .= ' col-lg-4';
            break;
        case '4-columns':
            $neuron_selector_class .= ' col-lg-3';
            break;
        case '5-columns':
            $neuron_selector_class .= ' a-col-lg-5';
            break;
        case '6-columns':
            $neuron_selector_class .= ' col-lg-2';
            break;
    }
}

if (isset($settings['posts_columns_tablet']) && $settings['posts_layout_type'] != 'justified') {
    switch ($settings['posts_columns_tablet']) {
        case '1-column':
            $neuron_selector_class .= ' col-md-12';
            break;
        default:
            $neuron_selector_class .= ' col-md-6';
            break;
        case '3-columns':
            $neuron_selector_class .= ' col-md-4';
            break;
        case '4-columns':
            $neuron_selector_class .= ' col-md-3';
            break;
        case '5-columns':
            $neuron_selector_class .= ' a-col-md-5';
            break;
        case '6-columns':
            $neuron_selector_class .= ' col-md-2';
            break;
    }
}

if (isset($settings['posts_columns_mobile']) && $settings['posts_layout_type'] != 'justified') {
    switch ($settings['posts_columns_mobile']) {
        default:
            $neuron_selector_class .= ' col-12';
            break;
        case '2-columns':
            $neuron_selector_class .= ' col-6';
            break;
        case '3-columns':
            $neuron_selector_class .= ' col-4';
            break;
        case '4-columns':
            $neuron_selector_class .= ' col-3';
            break;
        case '5-columns':
            $neuron_selector_class .= ' a-col-5';
            break;
        case '6-columns':
            $neuron_selector_class .= ' col-2';
            break;
    }
}

/**
 * Animation & WOW Delay
 */
$neuron_data_wow_delay = false;
$neuron_data_wow_seconds = 0;

if ($settings['posts_animation'] != 'none') {
    $neuron_posts_item_class .= ' wow ' . $settings['posts_animation'];  
    
    $neuron_data_wow_delay = $settings['posts_animation_delay'] == 'yes' ? true : false; 
} 


/**
 * Meta
 */
set_query_var('neuron_posts_meta_thumbnail', $settings['posts_meta_thumbnail']);
set_query_var('neuron_posts_meta_title', $settings['posts_meta_title']);
set_query_var('neuron_posts_meta_categories', $settings['posts_meta_categories']);
set_query_var('neuron_posts_meta_tags', $settings['posts_meta_tags']);
set_query_var('neuron_posts_meta_excerpt', $settings['posts_meta_excerpt']);
set_query_var('neuron_posts_meta_author', $settings['posts_meta_author']);
set_query_var('neuron_posts_meta_price', $settings['posts_meta_price']);
set_query_var('neuron_posts_meta_results_count', $settings['posts_meta_results_count']);
set_query_var('neuron_posts_meta_catalog_ordering', $settings['posts_meta_catalog_ordering']);
set_query_var('neuron_posts_meta_ordering_default', $settings['posts_meta_ordering_default']);
?>
<?php if ($settings['posts_layout_type'] == 'justified') : ?>
    <div class="justified-gallery-wrapper">
<?php endif; ?>
    <div class="<?php echo esc_attr(implode(' ', $neuron_row_class)) ?>" data-masonry-id="<?php echo md5($this->get_id()) ?>">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php 
            /**
             * WOW Animation
             */
            $neuron_data_wow_seconds == 12 ? $neuron_data_wow_seconds = 0 : '';
            $neuron_wow_holder = "data-wow-delay=". $neuron_data_wow_seconds/10 ."s";

            /**
             * Metro Column
             */
            if ($neuron_posts_metro_query && $settings['posts_layout_type'] == 'metro') {
                $neuron_selector_class = 'selector';
                foreach ($neuron_posts_metro_query as $item) {
                    if (get_the_ID() == $item['post_id']) {
                        switch ($item['post_column']) {
                            case '1-column':
                                $neuron_selector_class .= ' col-md-6 col-lg-1';
                                break;
                            case '2-column':
                                $neuron_selector_class .= ' col-md-6 col-lg-2';
                                break;
                            default:
                                $neuron_selector_class .= ' col-md-6 col-lg-3';
                                break;
                            case '4-column':
                                $neuron_selector_class .= ' col-md-6 col-lg-4';
                                break;
                            case '5-column':
                                $neuron_selector_class .= ' col-md-6 col-lg-5';
                                break;
                            case '6-column':
                                $neuron_selector_class .= ' col-md-6';
                                break;
                            case '7-column':
                                $neuron_selector_class .= ' col-md-7';
                                break;
                            case '8-column':
                                $neuron_selector_class .= ' col-md-8';
                                break;
                            case '9-column':
                                $neuron_selector_class .= ' col-md-9';
                                break;
                            case '10-column':
                                $neuron_selector_class .= ' col-md-10';
                                break;
                            case '11-column':
                                $neuron_selector_class .= ' col-md-11';
                                break;
                            case '12-column':
                                $neuron_selector_class .= ' col-12';
                                break;
                        }
                    } 
                }
            }

            /**
             * Terms
             * 
             * Get the terms that are 
             * attached to the post.
             */
            $terms = get_the_terms(get_the_ID(), $neuron_posts_taxonomy);
            $terms_array_imp = '';
            if ($terms) {
                $terms_array = array();
                foreach ($terms as $cat) {
                    $terms_array[] = $cat->slug;
                }
                $terms_array_imp = implode(' ', $terms_array);
            }
            ?>
            <div <?php post_class($neuron_selector_class . ' ' . $terms_array_imp) ?> data-id="<?php the_ID() ?>" data-columns="<?php echo esc_attr($settings['posts_columns']) ?>">
                <div class="o-post <?php echo esc_attr($neuron_posts_item_class) ?>" <?php echo esc_attr($neuron_data_wow_delay === true && $neuron_data_wow_seconds ? $neuron_wow_holder : '') ?>>
                    <?php
                    /**
                     * Layout Type
                     */
                    if ($settings['posts_layout_model'] == 'meta-inside') {
                        get_template_part('templates/'. $neuron_posts_name .'/type/meta-inside');
                    } elseif ($settings['posts_layout_model'] == 'meta-tooltip') {
                        include(__DIR__ . '/../type/tooltip.php');
                    } elseif($settings['posts_layout_model'] == 'meta-fixed') {
                        include(__DIR__ . '/../type/fixed.php');
                    } else {
                        get_template_part('templates/'. $neuron_posts_name .'/type/meta-outside');
                    }
                    ?>
                </div>
            </div>
        <?php $neuron_data_wow_seconds = $neuron_data_wow_seconds + 2; endwhile; ?>
    </div>

<?php if ($settings['posts_layout_type'] == 'justified') : ?>
    </div>
<?php endif; ?>

<?php include(__DIR__ . '/../templates/pagination.php') ?>

<?php if (\Elementor\Plugin::$instance->editor->is_edit_mode() && ($settings['posts_layout_type'] == 'masonry' || $settings['posts_layout_type'] == 'metro')) : ?>
<script>
    jQuery(function($) {
        var $masonry = $('.masonry[data-masonry-id=<?php echo md5($this->get_id()); ?>]');
        
        if ($masonry.length) {
            $masonry.isotope({
                layoutMode: 'packery',
                itemSelector: '.selector'
            });
        } 

        window.dispatchEvent(new Event('resize'));
    });
</script>
<?php endif; ?>

<?php if (\Elementor\Plugin::$instance->editor->is_edit_mode() && $settings['posts_layout_type'] == 'justified') : ?>
<script>
    jQuery(function($) {
        var $justified = $('.justified[data-masonry-id=<?php echo md5($this->get_id()); ?>]');

        if ($justified.length) {

            $justified.justifiedGallery({
                rowHeight: <?php echo esc_attr($settings['justified_height'] ? $settings['justified_height'] : 200) ?>,
                margins: <?php echo esc_attr($settings['justified_margins'] ? $settings['justified_margins'] : 10) ?>,
                selector: '.selector',
                imgSelector: '.h-calculated-image img',
                captions: false,
                waitThumnbailsLoad: false,
                lastRow: '<?php echo esc_attr($settings['justified_last_row'] ? $settings['justified_last_row'] : 'justify') ?>'
            });
        }

        window.dispatchEvent(new Event('resize'));
    });
</script>
<?php endif; ?>