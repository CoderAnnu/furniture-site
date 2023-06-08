<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package empelza
 */

get_header();
// Get header
get_template_part('template-parts/header/header_content');


?>
<div class="fl-page-padding"></div>

<div class="container page-404 cf">

        <div class="container text-center">
            <div class="top-text-404">
                <h4 class="error-top-title"><?php echo esc_html(empelza_get_theme_mod('404_top_text_title'));?></h4>
            </div>
            <div class="error-title-container">
                <h2 class="error-title"><?php echo esc_html(empelza_get_theme_mod('404_text_title'));?></h2>
            </div>

            <div class="info-404-text">
                <?php echo esc_html(empelza_get_theme_mod('404_text'));?>
            </div>
            <div class="btn-404-wrapper">
                <a href="<?php echo esc_url(home_url('/'));?>" class="fl-custom-btn fl-font-style-bolt-two secondary-style fl-404-page-btn"><span><?php echo esc_html(empelza_get_theme_mod('404_btn_text'));?></span></a>
            </div>

        </div>



    <div class="fl-page-padding"></div>
</div>

<?php get_footer(); ?>

