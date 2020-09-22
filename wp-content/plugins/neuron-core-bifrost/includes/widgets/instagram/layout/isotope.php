<?php 
/**
 * Columns
 * 
 * It changes the columns via the selector
 * item class, option can be inherited too.
 */
$neuron_selector_class = 'selector';
if (isset($settings['columns']['size'])) {
    switch ($settings['columns']['size']) {
        case 1:
            $neuron_selector_class .= ' col-lg-12';
            break;
        case 2:
            $neuron_selector_class .= ' col-lg-6';
            break;
        default:
            $neuron_selector_class .= ' col-lg-4';
            break;
        case 4:
            $neuron_selector_class .= ' col-lg-3';
            break;
        case 5:
            $neuron_selector_class .= ' a-col-lg-5';
            break;
        case 6:
            $neuron_selector_class .= ' col-lg-2';
            break;
    }
}

if (isset($settings['columns_tablet']['size'])) {
    switch ($settings['columns_tablet']['size']) {
        case 1:
            $neuron_selector_class .= ' col-md-12';
            break;
        case 2:
            $neuron_selector_class .= ' col-md-6';
            break;
        default:
            $neuron_selector_class .= ' col-md-4';
            break;
        case 4:
            $neuron_selector_class .= ' col-md-3';
            break;
        case 5:
            $neuron_selector_class .= ' a-col-md-5';
            break;
        case 6:
            $neuron_selector_class .= ' col-md-2';
            break;
    }
}

if (isset($settings['columns_mobile']['size'])) {
    switch ($settings['columns_mobile']['size']) {
        case 1:
            $neuron_selector_class .= ' col-12';
            break;
        case 2:
            $neuron_selector_class .= ' col-6';
            break;
        default:
            $neuron_selector_class .= ' col-4';
            break;
        case 4:
            $neuron_selector_class .= ' col-3';
            break;
        case 5:
            $neuron_selector_class .= ' a-col-5';
            break;
        case 6:
            $neuron_selector_class .= ' col-2';
            break;
    }
}

/**
 * Animation & WOW Delay
 */
$neuron_posts_item_class = 'm-media-gallery__item';

$neuron_data_wow_delay = false;
$neuron_data_wow_seconds = 0;

if ($settings['animation'] != 'none') {
    $neuron_posts_item_class .= ' wow ' . $settings['animation'];  
    
    $neuron_data_wow_delay = $settings['animation_delay'] == 'yes' ? true : false; 
} 
?>
<div class="row masonry" data-masonry-id="<?php echo md5($this->get_id()) ?>">
    <?php foreach ($instagram_data as $data) : ?>
        <?php 
        include(__DIR__ . '/../helpers/image.php');

        /**
         * WOW Animation
         */
        $neuron_data_wow_seconds == 12 ? $neuron_data_wow_seconds = 0 : '';
        $neuron_wow_holder = "data-wow-delay=". $neuron_data_wow_seconds/10 ."s";
        ?>
        <div class="<?php echo esc_attr($neuron_selector_class) ?>" data-columns="<?php echo esc_attr($settings['columns']['size']) ?>-columns">
            <div class="<?php echo esc_attr($neuron_posts_item_class) ?>" <?php echo esc_attr($neuron_data_wow_delay === true && $neuron_data_wow_seconds ? $neuron_wow_holder : '') ?>>
                <?php include(__DIR__ . '/../type/inside.php') ?>    
            </div>
        </div>
    <?php $neuron_data_wow_seconds = $neuron_data_wow_seconds + 2; endforeach; ?>
</div>

<?php if (\Elementor\Plugin::$instance->editor->is_edit_mode()) : ?>
<script>
    (function($) {
        var $masonry = $('.masonry[data-masonry-id=<?php echo md5($this->get_id()); ?>]');
        if ($masonry.length) {
            $masonry.isotope({
                layoutMode: 'packery',
                itemSelector: '.selector'
            });
        }
        window.dispatchEvent(new Event('resize'));
    })(jQuery);
</script>
<?php endif; ?>