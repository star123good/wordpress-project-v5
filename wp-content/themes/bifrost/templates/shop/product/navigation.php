<?php 
/**
 * Product Navigation
 */
$bifrost_product_navigation = bifrost_inherit_option('product_navigation', 'product_navigation', '1');

if (!class_exists('WooCommerce') || $bifrost_product_navigation == '2') {
    return;
}

// Back URL
$bifrost_product_navigation_back_url_link = $bifrost_product_navigation_url_cols = '';
if (get_theme_mod('product_navigation_back_url', '2') == '1') {
    $bifrost_product_navigation_nav_cols = 'col-3 col-md-4';
    $bifrost_product_navigation_url_cols = 'col-6 col-md-4';

    // Link
    $bifrost_product_navigation_back_url_link = get_theme_mod('product_navigation_back_url_link') ? get_theme_mod('product_navigation_back_url_link') : get_permalink(wc_get_page_id('shop'));
} else {
    $bifrost_product_navigation_nav_cols = 'col-6';
}
?>
<div class="o-post-navigation">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($bifrost_product_navigation_nav_cols) ?> o-post-navigation__link prev">
                <?php previous_post_link('%link', '<div class="d-flex align-items-center"><div class="o-post-navigation__text-icon"><h6 class="o-post-navigation__title">'. esc_html__('Prev', 'bifrost') .'</h6><h6 class="o-post-navigation__subtitle">%title</h6></div></div>', false, '', 'product_cat') ?>
            </div>
            <?php if (get_theme_mod('product_navigation_back_url', '2') == '1') : ?>
                <div class="<?php echo esc_attr($bifrost_product_navigation_url_cols) ?> o-post-navigation__link o-post-navigation__link--back">
                    <a href="<?php echo esc_url($bifrost_product_navigation_back_url_link) ?>"><h6 class="o-post-navigation__title"><?php echo esc_attr(get_theme_mod('product_navigation_back_url_text', 'Back to Shop')) ?></h6></a>
                </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($bifrost_product_navigation_nav_cols) ?> o-post-navigation__link next h-align-right">
                <?php next_post_link('%link', '<div class="d-flex align-items-center"><div class="o-post-navigation__text-icon"><h6 class="o-post-navigation__title">'. esc_html__('Next', 'bifrost') .'</h6><h6 class="o-post-navigation__subtitle">%title</h6></div></div>', false, '', 'product_cat') ?>
            </div>
        </div>
    </div>
</div>