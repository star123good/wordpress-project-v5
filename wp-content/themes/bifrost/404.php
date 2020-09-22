<?php
/**
 * 404 
 */
get_header();

/**
 * Hero 
 */
$bifrost_404_hero_style = $bifrost_404_overlay_style = [];

/**
 * Image
 */
if (get_theme_mod('404_hero_image')) {
    $bifrost_404_hero_style[] = 'background-image: url('. esc_url(wp_get_attachment_url(get_theme_mod('404_hero_image'))) .')';
}

/**
 * Overlay
 */
if (get_theme_mod('404_hero_overlay', '2') == '1') {
    if (get_theme_mod('404_hero_overlay_opacity')) {
        $bifrost_404_overlay_style[] = 'opacity: '. get_theme_mod('404_hero_overlay_opacity') .'';
    }

    if (get_theme_mod('404_hero_overlay_color')) {
        $bifrost_404_overlay_style[] = 'background-color: '. get_theme_mod('404_hero_overlay_color') .'';
    }
}

if (get_theme_mod('404_type', 'default') == 'template' && get_theme_mod('404_template')) {
    echo bifrost_get_custom_template(get_theme_mod('404_template'));
} else {
    echo sprintf(
        '<div class="t-404">
            <div class="o-hero d-flex">
                <div class="o-hero__header">
                    <div class="o-hero__header__image" %s></div>
                    %s
                </div>
                <div class="o-hero__content align-self-center h-align-center">
                    <div class="container">
                        <div class="o-hero__content__title"><h1>%s</h1></div>
                        <div class="o-hero__content__subtitle"><h5>%s</h5></div>
                        <a href="%s" class="a-button a-button--regular a-button--dark-color">%s</a>
                    </div>
                </div>
            </div>
        </div>',
        $bifrost_404_hero_style ? 'style="'. implode(';', $bifrost_404_hero_style) .'"' : '',
        get_theme_mod('404_hero_overlay', '2') == '1' ? '<div class="o-hero__header__overlay" style="'. implode(';', $bifrost_404_overlay_style) .'"></div>' : '',
        get_theme_mod('404_title') ? get_theme_mod('404_title') : esc_html__('404', 'bifrost'),
        get_theme_mod('404_description') ? get_theme_mod('404_description') : esc_html__('The page you were looking for couldn\'t be found. The page could be', 'bifrost') . '<br />' . esc_html__('removed or you misspelled the word while searching for it.', 'bifrost'),
        get_theme_mod('404_button_url') ? get_theme_mod('404_button_url') : esc_url(home_url('/')),
        get_theme_mod('404_button_text') ? get_theme_mod('404_button_text') : esc_attr__('Back to Homepage', 'bifrost')
    );
}

get_footer();