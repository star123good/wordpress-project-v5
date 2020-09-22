<?php 
/**
 * Media Gallery Filters
 */
$filters_class = ['m-filters'];

if (!$settings['media_gallery_filters_visibility'] || $settings['media_gallery_filters_visibility'] == 'no' || $settings['media_gallery_layout'] == 'carousel') {
    return;
}
/**
 * All Filter
 */
if ($settings['media_gallery_filters_filter_all_string']) {
    $neuron_media_gallery_filter_all = $settings['media_gallery_filters_filter_all_string'];
} else {
    $neuron_media_gallery_filter_all = __('Show All', 'neuron-core');
}

/**
 * Visibility
 */
if ($settings['media_gallery_filters_hide_mobile'] == 'yes') {
    $filters_class[] = 'd-sm-none d-none d-md-block';
}
?>
<div class="<?php echo esc_attr(implode(' ', $filters_class)) ?>">
    <ul id="filters">
        <?php if ($settings['media_gallery_filters_filter_all']) : ?>
            <li class="active" data-filter="*"><a><?php echo esc_attr($neuron_media_gallery_filter_all) ?></a></li>
        <?php endif; ?>
        <?php 
            if ($settings['media_gallery_filters']) {
                foreach ($settings['media_gallery_filters'] as $term) {
                    $term_info = get_term_by('slug', $term, 'media_category');
                    echo '<li data-filter=".'. esc_attr($term_info->slug) .'"><a>'. esc_attr($term_info->name) .'</a></li>';
                }
            } else {
                foreach (get_terms('media_category') as $term) {
                    echo '<li data-filter=".'. esc_attr($term->slug) .'"><a>'. esc_attr($term->name) .'</a></li>';
                }
            }
        ?>
    </ul>
</div>  