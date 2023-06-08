<?php
if (!function_exists('empelza_customize_register'))
{
    function empelza_customize_register($wp_customize)
    {
        $wp_customize->get_setting('blogname')->transport = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
        $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
        $wp_customize->get_control('site_icon')->priority = 10;

        $wp_customize->remove_control('display_header_text');

        $wp_customize->get_section('title_tagline')->title = 'General';
        $wp_customize->get_section('title_tagline')->icon = 'fa fa-paint-brush';
        $wp_customize->get_section('title_tagline')->priority = 1;

        $wp_customize->remove_section('colors');
        $wp_customize->remove_section('header_image');
        $wp_customize->remove_section('background_image');
    }
}
add_action('customize_register', 'empelza_customize_register');

if (!function_exists('initial_kirki_options') && class_exists('EMPELZA_Options'))
{

    function initial_kirki_options()
    {
    EMPELZA_Options::add_config(array(
        'capability' => 'edit_theme_options',
        'option_type' => 'theme_mod',
    ));
    //General Setting
    get_template_part('admin/option/kirki_option/general/general_option');
    //Navigator Setting
    get_template_part('admin/option/kirki_option/navigator/navigator_option');
    //Style Setting
    get_template_part('admin/option/kirki_option/style/style_color');
    //Page Heading Option
    get_template_part('admin/option/kirki_option/page_heading/page_heading_option');
    //Typography Setting
    get_template_part('admin/option/kirki_option/typography/typography_option');
    //Page Loader Kirki Option
    get_template_part('admin/option/kirki_option/preloader/preloader_option');
    //Background Setting
    get_template_part('admin/option/kirki_option/background/background_option');
    //Load More Setting
    get_template_part('admin/option/kirki_option/load_more/load_more_option');
    //Blog Archive Setting
    get_template_part('admin/option/kirki_option/blog/blog_archive_option');
    //Blog Single Setting
    get_template_part('admin/option/kirki_option/blog/blog_single_option');
    //Portfolio Setting
    get_template_part('admin/option/kirki_option/portfolio/portfolio_option');
    //404 page
    get_template_part('admin/option/kirki_option/404/404_option');
    //footer
    get_template_part('admin/option/kirki_option/footer/footer_option');

    }
    add_action('init', 'initial_kirki_options');
}
if (!function_exists('empelza_get_theme_mod')) {
    function empelza_get_theme_mod($name = null, $use_acf = null, $postId = null, $acf_name = null)
    {
        $value = null;


        // try get value from meta box
        if ($use_acf) {
            $value = empelza_get_metabox($acf_name ? $acf_name : $name, $postId);
        }

        // get value from options
        if (($value === null || $value === 'default')) {
            if (class_exists('EMPELZA_Options')) {
                $value = EMPELZA_Options::get_option($name);
            }
        }

        $value = apply_filters('empelza_filter_get_theme_mod', $value, $name);
        return $value;
    }
}
// get metabox
if (!function_exists( 'empelza_get_metabox' )):
    function empelza_get_metabox($name = null, $postId = null)
    {
        $value = null;

        // try get value from meta box
        if (function_exists('get_field')) {
            if ($postId == null) {
                $postId = get_the_ID();
            }
            $value = get_field($name, $postId);
        }

        return $value;
    }
endif;