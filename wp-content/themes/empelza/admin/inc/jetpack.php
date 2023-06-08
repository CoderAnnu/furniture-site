<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package rewon
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
if (!function_exists('empelza_jetpack_setup')) :
    function empelza_jetpack_setup()
    {
        // Add theme support for Infinite Scroll.
        add_theme_support('infinite-scroll', array(
            'container' => 'main',
            'render' => 'empelza_infinite_scroll_render',
            'footer' => 'page',
        ));

        // Add theme support for Responsive Videos.
        add_theme_support('jetpack-responsive-videos');
    }
endif;
add_action('after_setup_theme', 'empelza_jetpack_setup');

/**
 * Custom render function for Infinite Scroll.
 */
if (!function_exists('empelza_infinite_scroll_render')) :
    function empelza_infinite_scroll_render()
    {
        while (have_posts()) {
            the_post();
            if (is_search()) :
                get_template_part('template-parts/content', 'search');
            else :
                get_template_part('template-parts/content', get_post_format());
            endif;
        }
    }
endif;
