<?php 
/**
 * Posts Layout Carousel
 */
 
/**
 * Animation & WOW Delay
 */
$neuron_data_wow_delay = false;
$neuron_data_wow_seconds = 0;
$neuron_wow_count = 1;

if ($settings['posts_animation'] != 'none') {
    if ($settings['posts_animation_delay'] == 'yes' && !\Elementor\Plugin::$instance->editor->is_edit_mode()) {
        $neuron_data_wow_delay = true;
        $neuron_posts_item_class .= $settings['posts_carousel_stage_padding'] ? ' wow ' . $settings['posts_animation'] : ' wow intro-animation';
    } elseif ($settings['posts_animation_delay'] != 'yes') {
        $neuron_posts_item_class .= ' wow ' . $settings['posts_animation'];
    }
}
?>
<div class="owl-carousel owl-theme" id="<?php echo md5($this->get_id()); ?>" data-stage-padding="<?php echo esc_attr($settings['posts_carousel_stage_padding']) ?>" data-animation="<?php echo esc_attr($settings['posts_animation']) ?>" data-wow="<?php echo esc_attr($settings['posts_animation_delay']) ?>">
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <?php 
        /**
         * WOW Animation
         */
        if ($settings['posts_carousel_items'] && $settings['posts_animation_delay'] == 'yes') {
            if ($neuron_wow_count > $settings['posts_carousel_items']) {
                $neuron_data_wow_seconds = $neuron_wow_count = 0;
            }
        }

        $neuron_data_wow_seconds == 12 ? $neuron_data_wow_seconds = 0 : '';
        $neuron_wow_holder = "data-wow-delay=". $neuron_data_wow_seconds/10 ."s";
        ?>
        <div class="o-post <?php echo esc_attr($neuron_posts_item_class) ?> item" data-id="<?php the_ID() ?>" <?php echo esc_attr($neuron_data_wow_delay === true && $neuron_data_wow_seconds ? $neuron_wow_holder : '') ?>>
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
    <?php $neuron_data_wow_seconds = $neuron_data_wow_seconds + 2; $neuron_wow_count++; endwhile; ?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var owl = $('#<?php echo md5($this->get_id()); ?>');

        owl.owlCarousel({
            items: <?php  echo esc_attr($settings['posts_carousel_items_mobile'] ? $settings['posts_carousel_items_mobile'] : '1') ?>,
            margin: <?php  echo esc_attr($settings['posts_carousel_margin_mobile'] ? $settings['posts_carousel_margin_mobile'] : '10') ?>,
            autoHeight: <?php  echo esc_attr($settings['posts_carousel_height'] == '1' ? 'true' : 'false') ?>,
            loop: <?php  echo esc_attr($settings['posts_carousel_loop'] == 'yes' ? 'true' : 'false') ?>,
            mouseDrag: <?php  echo esc_attr($settings['posts_carousel_mouse_drag'] == 'yes' ? 'true' : 'false') ?>,
            touchDrag: <?php  echo esc_attr($settings['posts_carousel_touch_drag'] == 'yes' ? 'true' : 'false') ?>,
            stagePadding: <?php  echo esc_attr($settings['posts_carousel_stage_padding_mobile'] ? $settings['posts_carousel_stage_padding_mobile'] : '0') ?>,
            startPosition: <?php  echo esc_attr($settings['posts_carousel_start_position'] ? $settings['posts_carousel_start_position'] : '0') ?>,
            nav: <?php  echo esc_attr($settings['posts_carousel_navigation'] == 'yes' ? 'true' : 'false') ?>,
            navText: [
                '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            ],
            dots: <?php  echo esc_attr($settings['posts_carousel_dots'] == 'yes' ? 'true' : 'false') ?>,
            autoplay: <?php  echo esc_attr($settings['posts_carousel_autoplay'] == 'yes' ? 'true' : 'false') ?>,
            autoplayTimeout: <?php  echo esc_attr($settings['posts_carousel_autoplay_timeout'] ? $settings['posts_carousel_autoplay_timeout'] * 1000 : '2000') ?>,
            autoplayHoverPause: <?php  echo esc_attr($settings['posts_carousel_pause'] == 'yes' ? 'true' : 'false') ?>,
            smartSpeed: <?php  echo esc_attr($settings['posts_carousel_smart_speed'] ? $settings['posts_carousel_smart_speed'] * 100 : '450') ?>,
            responsive:{
                768:{
                    items: <?php  echo esc_attr($settings['posts_carousel_items_tablet'] ? $settings['posts_carousel_items_tablet'] : '2') ?>,
                    margin: <?php  echo esc_attr($settings['posts_carousel_margin_tablet'] ? $settings['posts_carousel_margin_tablet'] : '5') ?>,
                    stagePadding: <?php  echo esc_attr($settings['posts_carousel_stage_padding_tablet'] ? $settings['posts_carousel_stage_padding_tablet'] : '0') ?>
                },
                992:{
                    items: <?php  echo esc_attr($settings['posts_carousel_items'] ? $settings['posts_carousel_items'] : '0') ?>,
                    margin: <?php  echo esc_attr($settings['posts_carousel_margin'] ? $settings['posts_carousel_margin'] : '0') ?>,
                    stagePadding: <?php  echo esc_attr($settings['posts_carousel_stage_padding'] ? $settings['posts_carousel_stage_padding'] : '0') ?>
                }
            }
        });
    });
</script>