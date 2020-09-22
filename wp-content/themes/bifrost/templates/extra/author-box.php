<?php 
/**
 * Author Box
 */
if (bifrost_inherit_option('blog_post_author', 'blog_post_author', '2') == '2') {
    return;
}

$author = [
    'name' => get_the_author_meta('display_name', $post->post_author),
    'description' => get_the_author_meta('description', $post->post_author),
    'url' => get_author_posts_url($post->post_author)
];

if (get_theme_mod('blog_post_author_archive_button', '1')) {
    $author['archive'] = get_theme_mod('blog_post_author_archive_text', __('All Author Posts', 'bifrost'));
}
?>
<div class="m-author-box d-flex">
     <?php if (get_theme_mod('blog_post_author_avatar', '1') == '1') : ?>
        <div class="m-author-box__avatar">
            <?php echo get_avatar(get_the_author_meta('ID')) ?>
        </div>
    <?php endif; ?>
    <div class="m-author-box__content">
        <?php if (get_theme_mod('blog_post_author_name', '1') == '1') : ?>
            <h4 class="m-author-box__content__title"><a href="<?php echo esc_attr($author['url']) ?>"><?php echo esc_attr($author['name']) ?></a></h4>
        <?php endif; ?>
        <?php if (get_theme_mod('blog_post_author_description', '1') == '1') : ?>
            <p class="m-author-box__content__description">
                <?php echo wp_kses_post($author['description']) ?>
            </p>
        <?php endif; ?>
        <?php if (get_theme_mod('blog_post_author_archive_button', '1') == '1') : ?>
            <a class="a-button a-button--small a-button--dark-color d-inline-block" href="<?php echo esc_attr($author['url']) ?>"><?php echo esc_attr($author['archive']) ?></a>
        <?php endif; ?>
    </div>
</div>