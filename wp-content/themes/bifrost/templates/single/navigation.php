<?php
/**
 * Blog Post 
 */
if (get_theme_mod('blog_post_navigation_visibility', '1') == '2') {
    return;
}

// Navigation Category
if (get_theme_mod('blog_post_navigation_category', '2') == '1') {
    $bifrost_blog_post_navigation = true;
} else {
    $bifrost_blog_post_navigation = false;
}

if (!get_next_post($bifrost_blog_post_navigation) && !get_previous_post($bifrost_blog_post_navigation)) {
    return;
}

// Back URL
$bifrost_blog_post_navigation_back_url_link = '';
if (get_theme_mod('blog_post_navigation_back_url', '2') == '1') {
    $bifrost_blog_post_navigation_nav_cols = 'col-3 col-md-4';
    $bifrost_blog_post_navigation_url_cols = 'col-6 col-md-4';

    // Link
    $bifrost_blog_post_navigation_back_url_link = get_theme_mod('blog_post_navigation_back_url_link') ? get_theme_mod('blog_post_navigation_back_url_link') : get_permalink(get_option('page_for_posts'));
} else {
    $bifrost_blog_post_navigation_nav_cols = 'col-6';
}
?>
<div class="o-post-navigation">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="<?php echo esc_attr($bifrost_blog_post_navigation_nav_cols) ?> o-post-navigation__link prev">
                <?php previous_post_link('%link', '<div class="d-flex align-items-center"><div class="o-post-navigation__text-icon"><h6 class="o-post-navigation__title">'. esc_html__('Prev', 'bifrost') .'</h6><h6 class="o-post-navigation__subtitle">%title</h6></div></div>', $bifrost_blog_post_navigation, '', 'category'); ?>
            </div>
            <?php if (get_theme_mod('blog_post_navigation_back_url', '2') == '1') : ?>
                <div class="<?php echo esc_attr($bifrost_blog_post_navigation_url_cols) ?> o-post-navigation__link o-post-navigation__link--back">
                    <a href="<?php echo esc_url($bifrost_blog_post_navigation_back_url_link) ?>"><h6 class="o-post-navigation__title"><?php echo esc_attr(get_theme_mod('blog_post_navigation_back_url_text', 'Back to Blog')) ?></h6></a>
                </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($bifrost_blog_post_navigation_nav_cols) ?> o-post-navigation__link next h-align-right">
                <?php next_post_link('%link', '<div class="d-flex align-items-center"><div class="o-post-navigation__text-icon"><h6 class="o-post-navigation__title">'. esc_html__('Next', 'bifrost') .'</h6><h6 class="o-post-navigation__subtitle">%title</h6></div></div>', $bifrost_blog_post_navigation, '', 'category'); ?>
            </div>
        </div>
    </div>
</div>