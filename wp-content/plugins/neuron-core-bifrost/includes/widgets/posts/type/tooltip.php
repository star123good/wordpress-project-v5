<?php 
/**
 * Meta Tooltip
 */
$neuron_tooltip_meta_inside_class = 'o-neuron-hover';
$neuron_hover_holder_body_class = ['o-neuron-hover-holder__body', 'd-flex'];

/**
 * Hover Visibility
 */
if ($settings['posts_hover_visibility'] == 'show') {
    $neuron_tooltip_meta_inside_class .= ' o-neuron-hover--meta-inside';
}

/**
 * Hover Animation
 */
if ($settings['posts_hover_animation']) {
    $neuron_tooltip_meta_inside_class .= ' o-neuron-hover--'. $settings['posts_hover_animation'] .'';
}

/**
 * Hover Active
 */
$neuron_hover_holder_class = ['o-neuron-hover-holder'];
$settings['posts_style_hover_active'] == 'yes' ? $neuron_hover_holder_class[] = 'o-neuron-hover-holder--active' : '';
// $settings['posts_style_hover_reverse'] == 'yes' ? $neuron_hover_holder_class[] = 'o-neuron-hover-holder--reverse' : '';

/**
 * Thumbnail
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
?>
<div class="<?php echo esc_attr($neuron_tooltip_meta_inside_class) ?>">
    <div class="<?php echo esc_attr(implode(' ', $neuron_hover_holder_class)) ?>">
        <div class="o-neuron-hover-holder__header">
            <a href="<?php the_permalink() ?>" class="o-neuron-hover-holder__header__media">
                <?php if ($settings['posts_layout_type'] == 'carousel' && $settings['posts_carousel_height'] == 'full') : ?>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="h-full-height-image h-background-image-style" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>
                    <?php else : ?>
                        <div class="h-full-height-image h-background-image-style" style="background-image: url(<?php echo esc_url(NEURON_THEME_PLACEHOLDER) ?>)"></div>
                    <?php endif; ?>
                <?php elseif (has_post_thumbnail()) : ?>
                    <div class="h-calculated-image" style="<?php echo esc_attr(bifrost_thumbnail_calculation($neuron_thumbnail_output)) ?>">
                        <?php 
                        /**
                         * Thumbnail Sizes
                         * 
                         * It inherits the option via set query var.
                         */
                        if ($neuron_thumbnail_output) {
                            the_post_thumbnail($neuron_thumbnail_output);
                        } else {
                            the_post_thumbnail();
                        }
                        ?>
                    </div>
                <?php else : ?>
                    <div class="h-calculated-image" style="padding-bottom: 100%;">
                        <img src="<?php echo esc_url(NEURON_THEME_PLACEHOLDER) ?>" alt="<?php echo esc_attr__('Placeholder Image', 'neuron-core'); ?>">
                    </div>
                <?php endif; ?>
            </a>
            <div class="o-neuron-hover-holder__header__overlay o-neuron-hover-holder__header__overlay--tooltip"></div>
        </div>
        <div class="<?php echo esc_attr(implode(' ', $neuron_hover_holder_body_class)) ?>">
            <div class="o-neuron-hover-holder__body__inner">
                <div class="o-neuron-hover-holder__body-meta">
                    <h6 class="o-neuron-hover-holder__body-meta__title d-none">
                        <?php the_title() ?>
                    </h6>
                    <div class="o-blog-post__meta o-neuron-hover-holder__body-meta__subtitle d-none">
                        <?php
                        switch ($settings['posts_type']) {
                            default:
                                get_template_part('templates/taxonomy/categories');
                                break;
                            case 'portfolio':
                                get_template_part('templates/taxonomy/categories-portfolio');
                                break;
                            case 'product':
                                wc_get_template_part('woocommerce/loop/price');
                                break;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <a href="<?php the_permalink() ?>"></a>
        </div>
    </div>
</div>