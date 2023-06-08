<?php

if(empelza_get_theme_mod('preloader_page_show')== 'true'){

    //Custom Preloader Styles
    function empelza_custom_pre_style() {
        wp_enqueue_style(
            'empelza_custom_pre_style',
            get_template_directory_uri() . '/assets/css/preloader.min.css'
        );
        $pre_circle_color = empelza_get_theme_mod( 'site_preloader_color_style_circle' );
        $pre_circle_color_shadow = empelza_get_theme_mod( 'site_preloader_color_style_circle_shadow' );
        $pre_merging_balls_color = empelza_get_theme_mod( 'site_pre_color_style_merging_balls' );
        $pre_rankle_loader_color = empelza_get_theme_mod( 'site_pre_color_style_rankle_loader' );
        $pre_rankle_heart_color = empelza_get_theme_mod( 'site_pre_color_style_heart_loader' );
        $pre_rankle_heart_save_color = empelza_get_theme_mod( 'site_preloader_body_style' );
        $pre_spinner_color = empelza_get_theme_mod( 'site_pre_color_style_spinner' );
        $pulsating_circle_color = empelza_get_theme_mod('site_preloader_pulsating_circle');
        $custom_css = " 
        .fl-circle-preloader .circle .inner{ border:5px solid $pre_circle_color;border-right: none;border-top: none;box-shadow: inset 0 0 10px $pre_circle_color_shadow; } 
        .fl-balls{ background-color: $pre_merging_balls_color;}
        .fl-rakle-circle{background: $pre_rankle_loader_color;} 
        .fl-heart-preloader-body span{  background-color : $pre_rankle_heart_save_color; }
        @keyframes fl-heart-circle1{0%{transform : translateY(5px) translateX(0) scale(1.3);}50%{transform : translateY(0) translateX(23px) scale(2);background-color : $pre_rankle_heart_color;} 100%{transform : translateY(5px) translateX(0) scale(1.3);} }
        @keyframes fl-heart-circle2{0%{transform : translateY(10px) translateX(0) scale(1.3);background-color : $pre_rankle_heart_save_color;}50%{transform : translateY(17px) translateX(0) scale(2);background-color : $pre_rankle_heart_color;} 100%{transform : translateY(10px) translateX(0) scale(1.3);background-color : $pre_rankle_heart_save_color;}}
        @keyframes fl-heart-circle3{0%{transform : translateY(5px) translateX(0) scale(1.3);}50%{transform : translateY(0) translateX(-23px) scale(2);background-color : $pre_rankle_heart_color;}100%{transform : translateY(5px) translateX(0) scale(1.3);}}
        .fl-pre-dot:after{background: $pre_spinner_color;}
        .fl-pulsating-circle-preloader{border:1px solid $pulsating_circle_color;}
        ";
        wp_add_inline_style( 'empelza_custom_pre_style', $custom_css );
    }
    add_action( 'wp_enqueue_scripts', 'empelza_custom_pre_style' );

}