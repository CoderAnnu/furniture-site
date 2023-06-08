<?php
//Custom Styles Option
function empelza_custom_style() {
    $custom_css =$theme_border_bg_gradient_start=$theme_border_bg_gradient_end= '';
    // Custom CSS

        $first_color = empelza_get_theme_mod('first_color_setting');
        $first_light_color = empelza_get_theme_mod('first_light_color_setting');
        $first_light_two_color = empelza_get_theme_mod('first_light_two_color_setting');
        $second_color = empelza_get_theme_mod('second_color_setting');
        $second_light_color = empelza_get_theme_mod('second_light_color_setting');
        $second_light_two_color = empelza_get_theme_mod('second_light_two_color_setting');
        $third_color = empelza_get_theme_mod('third_color_setting');
        $third_light_color = empelza_get_theme_mod('third_light_color_setting');
        $third_different_shade_color = empelza_get_theme_mod('third_different_shade_color_setting');
        $dark_color = empelza_get_theme_mod('dark_color_setting');
        $fourth_color = empelza_get_theme_mod('fourth_color_setting');
        $gradient_mask = empelza_get_theme_mod('gradient_blue_mask');

            // First Color Color Setting css
            // First Color
            $custom_css .='.fl-first-cl{color:'.$first_color.';}';
            // Primary Hover Color
            $custom_css .='.fl-first-hv-cl:hover,.select-mobile-menu:hover{color:'.$first_color.';}';
            // Primary Color Bg
            $custom_css .='.fl-first-bg{background-color:'.$first_color.';}';
            // Primary Hover Color BG
            $custom_css .='.fl-first-hv-bg:hover{background-color:'.$first_color.';}';
            // First Light Color
            $custom_css .='.fl-first-light-bg{background-color:'.$first_light_color.';}';
            // Second Color Setting Css

            // Second Light Color
            $custom_css .='.fl-second-light-bg{background-color:'.$second_light_color.';}';
            // Third Color Setting Css

            // Third Light Color
            $custom_css .='.fl-third-light-bg{background-color:'.$third_light_color.';}';


            // Dark Color
            $custom_css .='.fl-dark-bg{background-color:'.$dark_color.';}';


            // Custom Css Color

            // Menu Style
            $custom_css .='.fl-mega-menu ul li.has-submenu .sub-nav > .sub-menu li a:hover{color:'.$first_color.';}';
            $custom_css .='.fl-mega-menu ul li.menu-item-depth-0 > a:before{background-color:'.$first_color.';}';
            $custom_css .='.fl--navigation-icon-container .header-search .fl-flipper-icon .fl-front-content,.fl--navigation-icon-container .header-search .fl-flipper-icon .fl-back-content{background-color:'.$second_color.';}';
            $custom_css .='.fl--mobile-menu-navigation-wrapper::-webkit-scrollbar-thumb,.fl--mobile-menu-navigation::-webkit-scrollbar-thumb{background-color:'.$dark_color.';}';
            $custom_css .='.top-header-content{background-color:'.$third_different_shade_color.';}';
            // Header Mask Style
            $custom_css .='.header-mask-bg.purple-style{background-color:'.$fourth_color.';}';
            $custom_css .='.header-mask-bg.blue-gradient-style{background-image: linear-gradient(to right, '.$gradient_mask['start_gradient'].' 0%, '.$gradient_mask['end_gradient'].' 100%)}';
            //Header Pre Title Style
            $custom_css .='.fl-page-heading .fl--page-header .fl-pre--title-wrapper .fl--sub-title{background-color:'.$first_light_two_color.';}.fl-page-heading .fl--page-header .fl-pre--title-wrapper .fl--sub-title{color:'.$first_color.';}';
            // Button Style
            $custom_css .='.fl-custom-btn.primary-style:before{background-color:'.$first_color.';}';
            $custom_css .='.fl-custom-btn.primary-style:after{background-color:'.$second_color.';}';
            $custom_css .='.fl-custom-btn.secondary-style:before{background-color:'.$second_color.';}';
            $custom_css .='.fl-custom-btn.secondary-style:after{background-color:'.$first_color.';}';
            $custom_css .='.fl-custom-btn.ternary-style:before{background-color:'.$third_different_shade_color.';}';
            $custom_css .='.fl-custom-btn.ternary-style:after{background-color:'.$first_color.';}';
            $custom_css .='.fl-custom-btn.primary-border-style{border-color:'.$first_color.';}';
            $custom_css .='.fl-custom-btn.primary-border-style:after{background-color:'.$first_color.';}';
            // Drop Caps Style
            $custom_css .= '.fl-drop-caps-wrapper-vc .first-letter{background-color:'.$second_color.';}';

            // Title
            $custom_css .='.fl-vc-custom-title-container .sub-title-wrap .fl-subtitle-vc.subtitle-primary{background-color:'. $first_light_two_color.'}';
            $custom_css .='.fl-vc-custom-title-container .sub-title-wrap .fl-subtitle-vc.subtitle-primary{color:'. $first_color.'}';
            $custom_css .='.fl-vc-custom-title-container .sub-title-wrap .fl-subtitle-vc.subtitle-secondary{background-color:'. $second_light_two_color.'}';
            $custom_css .='.fl-vc-custom-title-container .sub-title-wrap .fl-subtitle-vc.subtitle-secondary{color:'. $second_color.'}';
            $custom_css .='.fl-vc-custom-title-container .sub-title-wrap .fl-subtitle-vc.subtitle-ternary{background-color:'. $third_light_color.'}';
            $custom_css .='.fl-vc-custom-title-container .sub-title-wrap .fl-subtitle-vc.subtitle-ternary{color:'. $third_different_shade_color.'}';


            // Video Button Style
            $custom_css .= '.video-btn.primary-video-btn-style:before,.video-btn.primary-video-btn-style:after{background-color:'.$first_color.';}.video-btn.primary-video-btn-style:hover:before,.video-btn.primary-video-btn-style:hover:after{background-color:'.$second_color.'!important;}';
            $custom_css .= '.video-btn.secondary-video-btn-style:before,.video-btn.secondary-video-btn-style:after{background-color:'.$second_color.';}.video-btn.secondary-video-btn-style:hover:before,.video-btn.secondary-video-btn-style:hover:after{background-color:'.$first_color.'!important;}';
            $custom_css .= '.video-btn.ternary-video-btn-style:before,.video-btn.ternary-video-btn-style:after{background-color:'.$third_different_shade_color.';}.video-btn.ternary-video-btn-style:hover:before,.video-btn.ternary-video-btn-style:hover:after{background-color:'.$first_color.'!important;}';

            // Icon Box
                //Style One
            $custom_css .='.fl-icon-box-vc.icon-box-style-one:hover .icon-box-title{color:'. $second_color.';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-one.primary-color-style .icon-box-btn:after{background-color:'. $first_color.'!important;}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-one.secondary-color-style .icon-box-btn:after{background-color:'. $second_color.'!important;}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-one.ternary-color-style .icon-box-btn:after{background-color:'. $third_different_shade_color.'!important;}';
                // Hover
            $custom_css .='.fl-icon-box-vc.icon-box-style-one.primary-color-style .icon-box-btn:before{background-color:'. $third_different_shade_color.'!important;}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-one.secondary-color-style .icon-box-btn:before{background-color:'. $first_color.'!important;}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-one.ternary-color-style .icon-box-btn:before{background-color:'. $second_color.'!important;}';

            //Style Two
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.primary-color-style .icon-box-icon-wrap .svg-bg-content svg path{fill:'. $first_light_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.primary-color-style .icon-box-icon-wrap i{color:'. $first_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.secondary-color-style .icon-box-icon-wrap .svg-bg-content svg path{fill:'. $second_light_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.secondary-color-style .icon-box-icon-wrap i{color:'. $second_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.ternary-color-style .icon-box-icon-wrap .svg-bg-content svg path{fill:'. $third_light_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.ternary-color-style .icon-box-icon-wrap i{color:'. $third_different_shade_color .';}';
            //Hover
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.primary-color-style:hover .icon-box-inner-wrap{background-color:'. $first_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.secondary-color-style:hover .icon-box-inner-wrap{background-color:'. $second_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.ternary-color-style:hover .icon-box-inner-wrap{background-color:'. $third_different_shade_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.primary-color-style .icon-box-inner-wrap .icon-box-btn:after{background-color:'. $third_different_shade_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.secondary-color-style .icon-box-inner-wrap .icon-box-btn:after{background-color:'. $first_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-two.ternary-color-style .icon-box-inner-wrap .icon-box-btn:after{background-color:'. $second_color .';}';

            //Style Three
            $custom_css .='.fl-icon-box-vc.icon-box-style-three.primary-color-style .icon-box-icon-wrap i{color:'. $first_color.';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-three.primary-color-style .icon-box-btn:after{background-color:'. $first_color.'!important;}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-three.secondary-color-style .icon-box-icon-wrap i{color:'. $second_color.';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-three.secondary-color-style .icon-box-btn:after{background-color:'. $second_color.'!important;}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-three.ternary-color-style .icon-box-icon-wrap i{color:'. $third_different_shade_color.';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-three.ternary-color-style .icon-box-btn:after{background-color:'. $third_different_shade_color.'!important;}';
                // Style Four
            $custom_css .='.fl-icon-box-vc.icon-box-style-four.primary-color-style .icon-box-icon-wrap i{color:'. $first_color.';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-four.secondary-color-style .icon-box-icon-wrap i{color:'. $second_color.';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-four.ternary-color-style .icon-box-icon-wrap i{color:'. $third_different_shade_color.';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-four .icon-box-text-content a:hover{color:'. $first_color.'!important;}';
                // Style Five
            $custom_css .='.fl-icon-box-vc.icon-box-style-five.primary-color-style .icon-box-icon-wrap .svg-bg-content svg path{fill:'. $first_light_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-five.primary-color-style .icon-box-icon-wrap i{color:'. $first_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-five.secondary-color-style .icon-box-icon-wrap .svg-bg-content svg path{fill:'. $second_light_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-five.secondary-color-style .icon-box-icon-wrap i{color:'. $second_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-five.ternary-color-style .icon-box-icon-wrap .svg-bg-content svg path{fill:'. $third_light_color .';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-five.ternary-color-style .icon-box-icon-wrap i{color:'. $third_different_shade_color .';}';

            // Counter
            $custom_css .='.fl-counter-wrapper.primary-color-style .fl-counter-pref-styles{color:'.$first_color.';}';
            $custom_css .='.fl-counter-wrapper.secondary-color-style .fl-counter-pref-styles{color:'.$second_color.';}';
            $custom_css .='.fl-counter-wrapper.ternary-color-style .fl-counter-pref-styles{color:'.$third_different_shade_color.';}';

            // Progress Bar
            $custom_css .='.fl-progress-bar.primary-color-style .fl-progress-wrapper .fl-tracking-progress-bar .fl-tracking-progress-bar__item{background-color:'.$first_color.';}';
            $custom_css .='.fl-progress-bar.secondary-color-style .fl-progress-wrapper .fl-tracking-progress-bar .fl-tracking-progress-bar__item{background-color:'.$second_color.';}';
            $custom_css .='.fl-progress-bar.ternary-color-style .fl-progress-wrapper .fl-tracking-progress-bar .fl-tracking-progress-bar__item{background-color:'.$third_different_shade_color.';}';

            // Portfolio
            $custom_css .='.entry-content .portfolio-mask-content .portfolio-title-link:hover{color:'.$first_color.'!important;}';
            $custom_css .='.fl-filter-group-wrapper .filter-ul li.active{background-color:'.$first_color.';}.fl-filter-group-wrapper .filter-ul li span:before{background-color:'.$first_color.';}';
            $custom_css .='.entry-content .portfolio-mask-content{background-color:'.$dark_color.';}';
            $custom_css .='.entry-content .portfolio-mask-content .portfolio-category-wrap a{color:'.$second_color.';}';
            $custom_css .='.entry-content .portfolio-mask-content .portfolio-category-wrap a:hover{color:'.$first_color.';}';
            // Pricing Tables
            $custom_css .='.fl-pricing--table-wrapper .pricing--table{background-color:'.$third_light_color.';}';
            $custom_css .='.fl-pricing--table-wrapper .pricing--table .pricing-list li i{color:'.$second_color.';}';
            $custom_css .='.fl-pricing--table-wrapper .pricing--table{border-top:3px solid '.$second_color.';}';
            $custom_css .='.fl-pricing--table-wrapper .pricing--table .pricing{color:'.$third_different_shade_color.';}';
            $custom_css .='.fl-pricing--table-wrapper .pricing--table.premium-table{background-color:'.$first_color.';}';
            $custom_css .='.fl-pricing--table-wrapper .pricing--table.premium-table .price-btn-wrap .fl-custom-btn:before{background-color:'.$third_different_shade_color.';}';
            $custom_css .='.fl-pricing--table-wrapper .pricing--table.premium-table .price-btn-wrap .fl-custom-btn:after{background-color:'.$second_color.';}';

            // Team
            $custom_css .='.fl-team-vc.team-style-one .entry-content.back-content{background-color:'.$first_color.';}';
            $custom_css .='.fl-team-vc.team-style-one .entry-content.back-content a:hover{color:'.$second_color.'!important;}';
            $custom_css .='.fl-team-vc.team-style-two .entry-content a:hover{color:'.$first_color.'!important;}';
            $custom_css .='.fl-team-vc.team-style-two .entry-content:before{background-color:'.$second_color.'!important;}';
            // Home Page Blog Post
            $custom_css .='.fl-home-page-posts-content-vc .home-page-post-container article:nth-child(1){background-color:'.$third_light_color.'}';
            $custom_css .='.fl-home-page-posts-content-vc .home-page-post-container article:nth-child(2){background-color:'.$second_light_color.'}';
            $custom_css .='.fl-home-page-posts-content-vc .home-page-post-container article:nth-child(3){background-color:'.$first_light_color.'}';
            $custom_css .='.fl-home-page-posts-content-vc .home-page-post-container article .right-content .top-post-content i{color:'.$first_color.';}';
            $custom_css .='.fl-home-page-posts-content-vc .home-page-post-container article a:hover{color:'.$first_color.'!important;}';

            // Text List Style
            $custom_css .='.fl-vc-list-wrapper.style-one ul li i{color:'.$second_color.';}';
            $custom_css .='.fl-vc-list-wrapper.style-two ul li i{color:'.$first_color.';}';
            $custom_css .='.fl-vc-list-wrapper.style-three ul li i{color:'.$first_color.';}';

            // Tabs
            $custom_css .='.fl-tabs-wrapper .nav-tabs{background-color:'.$first_color.';}';
            $custom_css .='.fl-tabs-wrapper .nav-tabs li.active .inner-content .icon-container{background-color:'.$third_different_shade_color.';}';
            $custom_css .='.fl-icon-box-vc.icon-box-style-five .icon-box-inner-wrap .icon-box-btn:after{background-color:'.$first_color.';}';
            // Pagination
            $custom_css .='.fl-default-pagination .page-numbers:after,.post-inner-pagination .post-page-numbers:after, .page-inner-pagination .post-page-numbers:after{background-color:'.$third_different_shade_color.'}';
            $custom_css .='.fl-default-pagination .page-numbers:before,.post-inner-pagination .post-page-numbers:before, .page-inner-pagination .post-page-numbers:before{background-color:'.$third_light_color.'}';
            // Blockquote
            $custom_css .='blockquote{background:'.$second_light_two_color.';}';

            // Portfolio Info
            $custom_css .='.fl-portfolio-info-wrapper .fl-portfolio--info li .fl-left-content i{color:'.$third_color.'}';
            $custom_css .='.fl-portfolio-info-wrapper .fl-portfolio--info li .fl-right-content a:hover{color:'.$first_color.'}';
            // Archive Blog
            $custom_css .= '.fl-post--item a:hover{color:'.$first_color.';}';
            $custom_css .= '.fl-post--item .post-top-info i{color:'.$first_color.';}';
            $custom_css .= '.post--holder .post-arrow-slider .slick-arrow:after{background-color:'.$third_different_shade_color.';}';
            $custom_css .= '.post-blockquote:hover .quotes-text{color:'.$first_color.';}';
            // Post Single
            $custom_css .= '.single-post-wrapper a:hover{color:'.$first_color.';}';
            $custom_css .= '.post-top-info i{color:'.$first_color.';}';
            $custom_css .= '.post-tags-content{background-color:'.$first_light_color.';}';
            $custom_css .= '.post-tags-content i{color:'.$second_color.';}';
            $custom_css .='.comments-container .comments-list .fl-comment .comment-container .comment-meta .comments--reply-wrapper a:hover{color:'.$first_color.';}';
            $custom_css .='.comment--reply-wrap a:hover{color:'.$first_color.'!important;}.comment--reply-wrap a:after{background-color:'.$first_color.';}';
            $custom_css .='.comment-reply-title #cancel-comment-reply-link:after{background-color:'.$first_color.';}';
            $custom_css .='.comment-reply-title #cancel-comment-reply-link:hover{color:'.$first_color.';}';
            // Other Style
            $custom_css .= 'input:hover, input:active, input:focus,textarea:hover, textarea:active, textarea:focus,select:hover,select:focus{background-color:'.$first_light_color.';}';
            // Footer Style
            $custom_css .='.footer-widget-area .widget .footer-widget--title:before{background-color:'.$second_color.';}';
            $custom_css .='.footer-widget-area .widget a:hover{color:'.$first_color.'!important;}';

            // Widget
            $custom_css .='.sidebar .widget_fl_theme_helper_about_us .fl-about-social-link li a:hover{color:'.$first_color.'!important;}';
            $custom_css .='.sidebar .widget_search form .searchsubmit:hover i{color:'.$first_color.';}';
            $custom_css .='.sidebar .widget a:hover{color:'.$first_color.';}';
            $custom_css .='.sidebar .widget_fl_theme_helper_popular_post .fl--last-post .fl-last-post-info .fl-text-medium-style a:hover{color:'.$first_color.';}';
            $custom_css .='.sidebar .widget_tag_cloud .tagcloud a{background-color:'.$third_light_color.'; }.sidebar .widget_tag_cloud .tagcloud a:hover{background-color:'.$third_different_shade_color.' }';
            $custom_css .='.sidebar .widget_fl_theme_helper_popular_post .fl--last-post{border-color:'.$third_light_color.';}';
            $custom_css .='.sidebar .widget_calendar .calendar_wrap #wp-calendar tfoot #prev a:hover, .sidebar .widget_calendar .calendar_wrap #wp-calendar tfoot #next a:hover{background-color:'.$third_different_shade_color.';}';
            $custom_css .='.sidebar .widget_calendar .calendar_wrap #wp-calendar tbody tr td a{color:'.$first_color.'!important;}.sidebar .widget_calendar .calendar_wrap #wp-calendar tbody tr td a:hover{color:'.$second_color.'!important;}';
            // Custom Theme Style
            $custom_css .='.sticky .post--title .title-link{color:'.$first_color.';}.sticky .post--title .title-link:hover{color:'.$second_color.';}';
            $custom_css .='caption, code, code, kbd, samp, .wp-block-table.is-style-stripes tbody tr:nth-child(odd),pre,address{background-color:'.$third_light_color.';}';
            $custom_css .='.header-search-form .search-form-wrapper{background: -webkit-gradient(linear, left top, left bottom, color-stop(0, '.$dark_color.'), color-stop(60vh, rgba(0, 23, 62, 0.7)), to(rgba(0, 23, 62, 0.6)));background: -webkit-linear-gradient(top, '.$dark_color.' 0, rgba(0, 23, 62, 0.7) 60vh, rgba(0, 23, 62, 0.6) 100%);background: -o-linear-gradient(top, '.$dark_color.' 0, rgba(0, 23, 62, 0.7) 60vh, rgba(0, 23, 62, 0.6) 100%);background: linear-gradient(to bottom, '.$dark_color.' 0, rgba(0, 23, 62, 0.7) 60vh, rgba(0, 23, 62, 0.6) 100%);}';
            $custom_css .='.fl-story-page-inner a:hover{color:'.$first_color.';}form.fl-comment-form a:hover{color:'.$first_color.';}';

            // 404
            $custom_css .='.page-404 .error-title-container .error-title{color:'.$third_different_shade_color.';}';
            // Appointments
            $custom_css .='.booked-calendar-shortcode-wrap .booked-list-view-date-next:before, .booked-calendar-shortcode-wrap .booked-list-view-date-prev:before{background-color:'.$first_color.';}';
            $custom_css .='.booked-calendar-shortcode-wrap .booked-list-view-date-next:after, .booked-calendar-shortcode-wrap .booked-list-view-date-prev:after{background-color:'.$second_color.';}';
            $custom_css .='.booked-calendar-shortcode-wrap .booked_list_date_picker_trigger:before{background-color:'.$second_color.';}';
            $custom_css .='.booked-calendar-shortcode-wrap .booked_list_date_picker_trigger:after{background-color:'.$first_color.';}';
            $custom_css .='.booked-calendar-shortcode-wrap .booked-appt-list .timeslot .timeslot-people button:before{background-color:'.$second_color.';}';
            $custom_css .='.booked-calendar-shortcode-wrap .booked-appt-list .timeslot .timeslot-people button:after{background-color:'.$first_color.';}';
            $custom_css .='body .booked-modal input[type=submit].button-primary{background-color:'.$third_different_shade_color.'!important;}';
            $custom_css .='body .booked-modal input[type=submit].button-primary:hover{background-color:'.$second_color.'!important;}';
            $custom_css .='body .booked-form .field .button.cancel:before{background-color:'.$first_color.'}';
            $custom_css .='body .booked-form .field .button.cancel:after{background-color:'.$second_color.'}';
            //Splitslider
            $custom_css .='#splitslider-nav li .active span,#splitslider-nav li:hover span{background-color:'.$first_color.'!important;border-color:'.$first_color.'!important;}';
            wp_add_inline_style( 'empelza-general', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'empelza_custom_style',15);