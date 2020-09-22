<?php
/**
 * Portfolio Item Navigation
 */

/**
 * Visibility
 */
if (bifrost_inherit_option('portfolio_item_navigation_visibility', 'portfolio_item_navigation_visibility', '1') == '2') {
    return;
}

/**
 * Category
 */
if (bifrost_inherit_option('portfolio_item_navigation_category', 'portfolio_item_navigation_category', '2') == '1') {
    $bifrost_portfolio_item_category_bool = true;
} else {
    $bifrost_portfolio_item_category_bool = false;
}

if (!get_next_post($bifrost_portfolio_item_category_bool, '', 'portfolio_category') && !get_previous_post($bifrost_portfolio_item_category_bool, '', 'portfolio_category')) {
    return;
}

// Back URL
$bifrost_portfolio_item_navigation_back_url_link = '';
if (get_theme_mod('portfolio_item_navigation_back_url', '2') == '1') {
    $bifrost_portfolio_item_navigation_nav_cols = 'col-3 col-md-4';
    $bifrost_portfolio_item_navigation_url_cols = 'col-6 col-md-4';

    // Link
    $bifrost_portfolio_item_navigation_back_url_link = get_theme_mod('portfolio_item_navigation_back_url_link');
} else {
    $bifrost_portfolio_item_navigation_nav_cols = 'col-6';
} 
?>
<div class="o-post-navigation">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="<?php echo esc_attr($bifrost_portfolio_item_navigation_nav_cols) ?> o-post-navigation__link prev">
                <?php previous_post_link('%link', '<div class="d-flex align-items-center"><div class="o-post-navigation__text-icon"><h6 class="o-post-navigation__title">'. esc_html__('Prev', 'bifrost') .'</h6><h6 class="o-post-navigation__subtitle">%title</h6></div></div>', $bifrost_portfolio_item_category_bool, '', 'portfolio_category'); ?>
            </div>
            <?php if (get_theme_mod('portfolio_item_navigation_back_url', '2') == '1') : ?>
                <div class="<?php echo esc_attr($bifrost_portfolio_item_navigation_url_cols) ?> o-post-navigation__link o-post-navigation__link--back">
                    <a href="<?php echo esc_url($bifrost_portfolio_item_navigation_back_url_link) ?>"><h6 class="o-post-navigation__title"><?php echo esc_attr(get_theme_mod('portfolio_item_navigation_back_url_text', 'Back to Portfolio')) ?></h6></a>
                </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($bifrost_portfolio_item_navigation_nav_cols) ?> o-post-navigation__link next h-align-right">
                <?php next_post_link('%link', '<div class="d-flex align-items-center"><div class="o-post-navigation__text-icon"><h6 class="o-post-navigation__title">'. esc_html__('Next', 'bifrost') .'</h6><h6 class="o-post-navigation__subtitle">%title</h6></div></div>', $bifrost_portfolio_item_category_bool, '', 'portfolio_category'); ?>
            </div>
        </div>
    </div>
</div>