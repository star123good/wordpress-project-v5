<?php
/**
 * Instagram - Meta Inside
 */
$hover_class = ['o-neuron-hover', 'o-neuron-hover--meta-inside'];
$holder_class = ['o-neuron-hover-holder'];
$holder_body_class = ['o-neuron-hover-holder__body', 'd-flex'];

/**
 * Hover Transition
 */
if ($settings['hover_animation']) {
    $hover_class[] = 'o-neuron-hover--'. $settings['hover_animation'] .'';
}

/**
 * Hover Active
 */
if ($settings['style_hover_active'] == 'yes') {
    $holder_class[] = 'o-neuron-hover-holder--active';
}

/**
 * Content Vertical Alignment
 */
if ($settings['style_hover_content_vertical_alignment']) {
    $holder_body_class[] = 'align-items-'. $settings['style_hover_content_vertical_alignment'] .'';
} else {
    $holder_body_class[] = 'align-items-center';
}
?>
<div class="<?php echo esc_attr(implode(' ', $hover_class)) ?>">
    <div class="<?php echo esc_attr(implode(' ', $holder_class)) ?>">
        <div class="o-neuron-hover-holder__header">
            <div class="o-neuron-hover-holder__header__media">
                <?php 
                // Image Size
                echo sprintf(
                    '<div class="h-calculated-image" style="%s"><img srcset="%s"/></div>',
                    neuron_external_image_calculation($image['width'], $image['height']),
                    $image['url']
                );
                ?>
            </div>
            <?php if ($settings['hover_visibility'] != 'hide') : ?>
                <div class="o-neuron-hover-holder__header__overlay"></div>
            <?php endif; ?>
        </div>
        <div class="<?php echo esc_attr(implode(' ', $holder_body_class)) ?>">
            <div class="o-neuron-hover-holder__body__inner">
                <div class="o-neuron-hover-holder__body-meta">
                    <?php if ($image['likes'] && ($settings['likes'] == 'yes' || $settings['likes'])) : ?>
                        <span class="o-neuron-hover-holder__body-meta__likes">
                            <i class="fa fa-heart"></i>
                            <?php echo esc_attr($image['likes']); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($image['comments'] && ($settings['comments'] == 'yes' || $settings['comments'])) : ?>
                        <span class="o-neuron-hover-holder__body-meta__comments">
                            <i class="fa fa-comment"></i>
                            <?php echo esc_attr($image['comments']); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <?php 
                    if ($image['link']) {
                        echo sprintf(
                            '<a href="%s" target="%s"></a>',
                            esc_url($image['link']),
                            $settings['external'] == 'yes' ? '_BLANK' : '_SELF'
                        ); 
                    }
                ?>
            </div>
        </div>
    </div>
</div>
