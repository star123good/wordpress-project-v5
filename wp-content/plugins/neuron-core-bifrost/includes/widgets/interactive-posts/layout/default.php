<?php 
/**
 * Interactive Posts - Inline
 */
$index = 1;

/**
 * Animation & WOW Delay
 */
$neuron_interactive_animation = $settings['animation'];
$neuron_interactive_item_holder_class = 'o-interactive-item';
$neuron_interactive_holder_class = 'h-overflow-hidden';
$neuron_interactive_item_class = '';

$neuron_data_wow_delay = false;
$neuron_data_wow_seconds = 0;

if ($settings['animation'] != 'none') {
    $neuron_interactive_item_class .= ' wow ' . $settings['animation'];  
    
    $neuron_data_wow_delay = $settings['animation_delay'] == 'yes' ? true : false; 
} 

/**
 * Columns
 * 
 * It changes the columns via the selector
 * item class, option can be inherited too.
 */
if ($settings['layout'] == 'block') {
    $neuron_interactive_item_holder_class .= ' selector';
    $neuron_interactive_holder_class .= ' row masonry';
    if (isset($settings['columns'])) {
        switch ($settings['columns']) {
            case '1-column':
                $neuron_interactive_item_holder_class .= ' col-lg-12';
                break;
            case '2-columns':
                $neuron_interactive_item_holder_class .= ' col-lg-6';
                break;
            default:
                $neuron_interactive_item_holder_class .= ' col-lg-4';
                break;
            case '4-columns':
                $neuron_interactive_item_holder_class .= ' col-lg-3';
                break;
            case '5-columns':
                $neuron_interactive_item_holder_class .= ' a-col-lg-5';
                break;
            case '6-columns':
                $neuron_interactive_item_holder_class .= ' col-lg-2';
                break;
        }
    }

    if (isset($settings['columns_tablet'])) {
        switch ($settings['columns_tablet']) {
            case '1-column':
                $neuron_interactive_item_holder_class .= ' col-md-12';
                break;
            default:
                $neuron_interactive_item_holder_class .= ' col-md-6';
                break;
            case '3-columns':
                $neuron_interactive_item_holder_class .= ' col-md-4';
                break;
            case '4-columns':
                $neuron_interactive_item_holder_class .= ' col-md-3';
                break;
            case '5-columns':
                $neuron_interactive_item_holder_class .= ' a-col-md-5';
                break;
            case '6-columns':
                $neuron_interactive_item_holder_class .= ' col-md-2';
                break;
        }
    }

    if (isset($settings['columns_mobile'])) {
        switch ($settings['columns_mobile']) {
            default:
                $neuron_interactive_item_holder_class .= ' col-12';
                break;
            case '2-columns':
                $neuron_interactive_item_holder_class .= ' col-6';
                break;
            case '3-columns':
                $neuron_interactive_item_holder_class .= ' col-4';
                break;
            case '4-columns':
                $neuron_interactive_item_holder_class .= ' col-3';
                break;
            case '5-columns':
                $neuron_interactive_item_holder_class .= ' a-col-5';
                break;
            case '6-columns':
                $neuron_interactive_item_holder_class .= ' col-2';
                break;
        }
    }
}

/**
 * Separator Visibility
 */
if (!$settings['separator_visibility']) {
    $neuron_interactive_item_holder_class .= ' o-interactive-item--disabled';
}
?>
<div class="<?php echo esc_attr($neuron_interactive_holder_class) ?>">
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <?php 
        /**
         * WOW Animation
         */
        $neuron_data_wow_seconds == 12 ? $neuron_data_wow_seconds = 0 : '';
        $neuron_wow_holder = "data-wow-delay=". $neuron_data_wow_seconds/10 ."s";

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
                $terms_array[] = $cat->name;
            }
            $terms_array_imp = implode(' ', $terms_array);
        }
        ?>
        <div <?php post_class($neuron_interactive_item_holder_class) ?> data-id="<?php the_ID() ?>" data-count="<?php echo esc_attr($index) ?>">
            <div class="o-interactive-item-inner <?php echo esc_attr($neuron_interactive_item_class) ?>" <?php echo esc_attr($neuron_data_wow_delay === true && $neuron_data_wow_seconds ? $neuron_wow_holder : '') ?>>
                <div class="o-interactive-item--image d-none">
                    <?php 
                        if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        } else {
                            neuron_placeholder();
                        }
                    ?>
                </div>
                <div class="o-interactive-item--holder">
                    <?php 
                    // Categories
                    if ($terms_array_imp && $settings['category_visibility'] == 'yes') {
                    ?>
                        <span class="o-interactive-item--category"><?php echo $terms_array_imp ?></span>
                    <?php
                    } ?>
                    <h4 class="o-interactive-item--title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                </div>
                <a class="o-interactive-item--link" href="<?php the_permalink() ?>"></a>
            </div>
        </div>
    <?php $neuron_data_wow_seconds = $neuron_data_wow_seconds + 2; $index++; endwhile; ?>
</div>