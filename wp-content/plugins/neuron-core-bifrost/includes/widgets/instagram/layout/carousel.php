<?php 
/**
 * Animation & WOW Delay
 */
$neuron_data_wow_delay = false;
$neuron_data_wow_seconds = 0;
$neuron_posts_item_class = 'm-media-gallery__item';
$neuron_wow_count = 1;

if ($settings['animation'] != 'none') {
    if ($settings['animation_delay'] == 'yes' && !\Elementor\Plugin::$instance->editor->is_edit_mode()) {
        $neuron_data_wow_delay = true;
        $neuron_posts_item_class .= $settings['stage_padding'] ? ' wow ' . $settings['animation'] : ' wow intro-animation';
    } elseif ($settings['animation_delay'] != 'yes') {
        $neuron_posts_item_class .= ' wow ' . $settings['animation'];
    }
} 
?>
<div class="owl-carousel owl-theme" id="<?php echo md5($this->get_id()); ?>" data-animation="<?php echo esc_attr($settings['animation']) ?>" data-wow="<?php echo esc_attr($settings['animation_delay']) ?>">
    <?php foreach ($instagram_data as $data) : ?>
        <?php 
        include(__DIR__ . '/../helpers/image.php');

        /**
         * WOW Animation
         */
       if ($settings['items'] && $settings['animation_delay'] == 'yes') {
            if ($neuron_wow_count > $settings['items']) {
                $neuron_data_wow_seconds = $neuron_wow_count = 0;
            }
        }

        $neuron_data_wow_seconds == 12 ? $neuron_data_wow_seconds = 0 : '';
        $neuron_wow_holder = "data-wow-delay=". $neuron_data_wow_seconds/10 ."s";
        ?>
        <div class="<?php echo esc_attr($neuron_posts_item_class) ?>" <?php echo esc_attr($neuron_data_wow_delay === true && $neuron_data_wow_seconds ? $neuron_wow_holder : '') ?>>
            <?php include(__DIR__ . '/../type/inside.php') ?>  
        </div>
    <?php $neuron_data_wow_seconds = $neuron_data_wow_seconds + 2; $neuron_wow_count++; endforeach; ?>
</div>
<script type="text/javascript">
    jQuery(function ($) {
        var owl = $('#<?php echo md5($this->get_id()); ?>');

        owl.owlCarousel({
            items: <?php echo esc_attr($settings['items_mobile'] ? $settings['items_mobile'] : '1') ?>,
            margin: <?php echo esc_attr($settings['margin_mobile'] ? $settings['margin_mobile'] : '10') ?>,
            autoHeight: <?php echo esc_attr($settings['height'] == '1' ? 'true' : 'false') ?>,
            loop: <?php echo esc_attr($settings['loop'] === 'yes' ? 'true' : 'false') ?>,
            mouseDrag: <?php echo esc_attr($settings['mouse_drag'] === 'yes' ? 'true' : 'false') ?>,
            touchDrag: <?php echo esc_attr($settings['touch_drag'] === 'yes' ? 'true' : 'false') ?>,
            stagePadding: <?php echo esc_attr($settings['stage_padding_mobile'] ? $settings['stage_padding_mobile'] : '0') ?>,
            startPosition: <?php echo esc_attr($settings['start_position'] ? $settings['start_position'] : '0') ?>,
            nav: <?php echo esc_attr($settings['navigation'] === 'yes' ? 'true' : 'false') ?>,
            navText: [
                '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
            ],
            dots: <?php echo esc_attr($settings['dots'] === 'yes' ? 'true' : 'false') ?>,
            autoplay: <?php echo esc_attr($settings['autoplay'] === 'yes' ? 'true' : 'false') ?>,
            autoplayTimeout: <?php echo esc_attr($settings['autoplay_timeout'] ? $settings['autoplay_timeout'] * 1000 : '2000') ?>,
            autoplayHoverPause: <?php echo esc_attr($settings['pause'] === 'yes' ? 'true' : 'false') ?>,
            smartSpeed: <?php echo esc_attr($settings['smart_speed'] ? $settings['smart_speed'] * 100 : '450') ?>,
            responsive:{
                768:{
                    items: <?php echo esc_attr($settings['items_tablet'] ? $settings['items_tablet'] : '2') ?>,
                    margin: <?php echo esc_attr($settings['margin_tablet'] ? $settings['margin_tablet'] : '5') ?>,
                    stagePadding: <?php echo esc_attr($settings['stage_padding_tablet'] ? $settings['stage_padding_tablet'] : '0') ?>
                },
                992:{
                    items: <?php echo esc_attr($settings['items'] ? $settings['items'] : '0') ?>,
                    margin: <?php echo esc_attr($settings['margin'] ? $settings['margin'] : '0') ?>,
                    stagePadding: <?php echo esc_attr($settings['stage_padding'] ? $settings['stage_padding'] : '0') ?>
                }
            }
        });
    });
</script>