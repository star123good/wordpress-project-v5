                </div>
                <?php 
                // Class
                $bifrost_footer_class = ['l-primary-footer'];
                $bifrost_footer_template_class = ['l-template-footer'];
                
                /**
                 * Type
                 */
                $bifrost_footer_type = bifrost_inherit_option('footer_type', 'footer_type', '1');
                $bifrost_footer_template = '';
                if (get_field('footer_type', get_queried_object()) == '1') {
                    $bifrost_footer_template = get_theme_mod('footer_template');
                } elseif (get_field('footer_type', get_queried_object()) == '3' && get_field('footer_template')) {
                    $bifrost_footer_template = get_field('footer_template');
                } else {
                    $bifrost_footer_template = get_theme_mod('footer_template');
                }

                /**
                 * Parallax
                 */
                if (bifrost_inherit_option('footer_parallax', 'footer_parallax', '2') == '1') {
                    $bifrost_footer_class[] = 'l-primary-footer--parallax';
                    $bifrost_footer_template_class[] = 'l-primary-footer--parallax';
                }
                ?>
                <?php if (apply_filters('bifrost_display_footer', true) && $bifrost_footer_type != '2') : ?>
                    <?php get_template_part('templates/header/sliding-bar/content') ?>
                    <?php 
                    // Skin
                    if (bifrost_inherit_option('footer_skin', 'footer_skin', '1') == '1' && !is_search()) {
                        $bifrost_footer_class[] = 'l-primary-footer--dark-skin';
                    } else {
                        $bifrost_footer_class[] = 'l-primary-footer--light-skin';
                    }

                    // Container
                    if (bifrost_inherit_option('footer_container', 'footer_container', '1') == '2' || is_search()) {
                        $bifrost_footer_class[] = 'l-primary-footer--wide-container';
                    } 

                    if (bifrost_inherit_option('footer_widgets', 'footer_widgets', '1') != '2' || bifrost_inherit_option('footer_copyright_visibility', 'footer_copyright_visibility', '1') != '2') : 
                    ?>
                    <footer class="<?php echo esc_attr(implode(' ', $bifrost_footer_class)) ?> h-fadeInFooterNeuron">
                        <?php get_template_part('templates/footer/widgets') ?>

                        <?php get_template_part('templates/footer/copyright') ?>
                    </footer>
                <?php endif;
                endif;

                // Elementor
               if ($bifrost_footer_type == '2' && $bifrost_footer_template && !is_search()) :
                ?>
                     <footer class="<?php echo esc_attr(implode(' ', $bifrost_footer_template_class)) ?>">
                        <?php echo bifrost_get_custom_template($bifrost_footer_template) ?>
                    </footer>
                <?php endif; ?>

            <?php get_template_part('templates/extra/to-top') ?>
        </div>
        <?php wp_footer() ?>
    </body>
</html>