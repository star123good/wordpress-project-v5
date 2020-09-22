<?php 
/**
 * Posts Layout Isotope
 */
$neuron_row_class = [];

/**
 * Layout Type Model
 */
switch ($settings['media_gallery_layout_type']) {
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

if (isset($settings['media_gallery_columns']) && $settings['media_gallery_layout_type'] != 'justified') {
    switch ($settings['media_gallery_columns']) {
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

if (isset($settings['media_gallery_columns_tablet']) && $settings['media_gallery_layout_type'] != 'justified') {
    switch ($settings['media_gallery_columns_tablet']) {
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

if (isset($settings['media_gallery_columns_mobile']) && $settings['media_gallery_layout_type'] != 'justified') {
    switch ($settings['media_gallery_columns_mobile']) {
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
$neuron_posts_item_class = 'm-media-gallery__item';

if ($settings['media_gallery_animation'] != 'none') {
    $neuron_posts_item_class .= ' wow ' . $settings['media_gallery_animation'];  
    
    $neuron_data_wow_delay = $settings['media_gallery_animation_delay'] == 'yes' ? true : false; 
}
?>
<?php if ($settings['media_gallery_layout_type'] == 'justified') : ?>
    <div class="justified-gallery-wrapper">
<?php endif; ?>
<div class="<?php echo esc_attr(implode(' ', $neuron_row_class)) ?>" data-masonry-id="<?php echo md5($this->get_id()) ?>">
    <?php foreach ($neuron_gallery_media_query as $media) : ?>
        <?php 
        /**
         * WOW Animation
         */
        $neuron_data_wow_seconds == 12 ? $neuron_data_wow_seconds = 0 : '';
        $neuron_wow_holder = "data-wow-delay=". $neuron_data_wow_seconds/10 ."s";

        /**
         * Metro Column
         */
        if ($settings['media_gallery_layout_type'] == 'metro') {
            $neuron_selector_class = 'selector';
            if (isset($media['query_column'])) {
                switch ($media['query_column']) {
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
        
        /**
         * Terms
         * 
         * Get the terms that are 
         * attached to the post.
         */
        $terms_array_imp = '';
        if ($media['query_category']) {
            $terms_array = array();
            foreach ($media['query_category'] as $cat) {
                $terms_array[] = $cat;
            }
            $terms_array_imp = implode(' ', $terms_array);
        } 

        /**
         * Badge
         * 
         * Add the badge to the item class.
         */
        $neuron_posts_item_badge_class = '';
        if ($media['query_badge'] && $media['query_badge'] != 'none') {
            $neuron_posts_item_badge_class = 'm-media-gallery__item-badge--' . $media['query_badge'];
        }
        ?>
        <div class="<?php echo esc_attr($neuron_selector_class . ' ' .  $terms_array_imp) ?>" data-id="<?php echo rand(0, 10000) ?>" data-columns="<?php echo esc_attr(isset($settings['media_gallery_columns']) ? $settings['media_gallery_columns'] : '') ?>">
            <div class="<?php echo esc_attr($neuron_posts_item_class . ' ' . $neuron_posts_item_badge_class) ?>" <?php echo esc_attr($neuron_data_wow_delay === true && $neuron_data_wow_seconds ? $neuron_wow_holder : '') ?>>
                <?php
                /**
                 * Layout Type
                 * 
                 * Meta inside is the only
                 * supported layout for the
                 * justified layout.
                 */
                if ($settings['media_gallery_layout_model'] == 'meta-inside' || $settings['media_gallery_layout_model'] == 'justified') {
                    include(__DIR__ . '/../type/inside.php');
                } elseif ($settings['media_gallery_layout_model'] == 'meta-tooltip') {
                    include(__DIR__ . '/../type/tooltip.php');
                } elseif ($settings['media_gallery_layout_model'] == 'meta-fixed') {
                    include(__DIR__ . '/../type/fixed.php');
                } else {
                    include(__DIR__ . '/../type/outside.php');
                }
                ?>
            </div>
        </div>
    <?php $neuron_data_wow_seconds = $neuron_data_wow_seconds + 2; endforeach; ?>
</div>
<?php if ($settings['media_gallery_layout_type'] == 'justified') : ?>
    </div>
<?php endif; ?>

<?php if (\Elementor\Plugin::$instance->editor->is_edit_mode() && ($settings['media_gallery_layout_type'] == 'masonry' || $settings['media_gallery_layout_type'] == 'metro')) : ?>
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

<?php if (\Elementor\Plugin::$instance->editor->is_edit_mode() && $settings['media_gallery_layout_type'] == 'justified') : ?>
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