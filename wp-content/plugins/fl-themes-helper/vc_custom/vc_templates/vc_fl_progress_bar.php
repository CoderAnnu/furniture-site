<?php
/*
 * Shortcode Prodress Bar
 * */
if ( ! function_exists( 'vc_fl_progress_bar_function' ) ) {
    function vc_fl_progress_bar_function($atts, $content = null)
    {
        $css_classes[] = 'fl-progress-bar cf';

        global $fl_helping_responsive_style, $fl_helping_css_style;

        $atts = vc_map_get_attributes('vc_fl_progress_bar', $atts);

        extract($atts);

        $idf = uniqid('').'-'.rand(100,9999);

        $css_classes[] = 'fl-progress-bar-'.$idf.'';


        $result=$wrapper_attributes[]=$responsive_style=$content_wrapper_attributes[]='';

        $css_classes[] .= fl_get_css_tab_class($atts);

        if(isset($id) && $id != '') {
            $wrapper_attributes[] .= 'id="'.fl_sanitize_class($id).'"';
        }

        if(isset($class) && $class != '') {
            $css_classes[] .= fl_sanitize_class($class);
        }

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            if( !empty( $responsive_css ) && $responsive_css != '' ) {
                $responsive_id = uniqid('fl-helping-responsive-').'-'.rand(100,9999);
                $column_selector = $responsive_id;
                $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
                $css_classes[] = $responsive_id;
            }
        }

        // Animation option
        if ( ! empty( $animation ) and ($animation !='none')) {
            $css_classes[] = 'fl-animated-item-velocity';
            $wrapper_attributes[] = 'data-animate-type="'.$animation.'"';

            if ( ! empty( $custom_delay ) and ( $custom_delay !='off')) {
                if ( ! empty( $animation_delay ) and ($animation_delay !='')) {
                    $wrapper_attributes[] = 'data-item-delay="'.$animation_delay.'"';
                }
            }
        }

        // Bg Position Option
        if ( ! empty( $desktop_bg_image_position ) and $desktop_bg_image_position !='' ) {
            $css_classes[] = $desktop_bg_image_position;
        }
        // Min Height Option
        if ( ! empty( $desktop_height ) and $desktop_height !='' ) {
            $wrapper_attributes[]   = 'style="min-height:'.$desktop_height.';"';
        }
        // Box Shadow
        if ( ! empty( $box_shadow_param ) and $box_shadow_param !='' ) {
            $box_shadow_html = uniqid('fl-custom-shadow-').'-'.rand(100,9999);
            $css_classes[] = $box_shadow_html;
            $fl_helping_css_style[] = '.' . $box_shadow_html . ' {'. $box_shadow_param. '}';
        }

        // HTML
        if ( ! empty( $color_style ) and $color_style !='' ) {
            $css_classes[] = $color_style;
        }



        if ( ! empty( $progress_duration ) and ($progress_duration !='')) {
            $wrapper_attributes[] = 'data-duration="'.$progress_duration.'"';
        }
        if ( ! empty( $progress_value ) and ($progress_value !='')) {
            $wrapper_attributes[] = 'data-progress-width="'.$progress_value.'%"';
        }

        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );


        // Start
        $result .= '<div class="' . esc_attr( trim( $css_class ) ) . '" '. implode( ' ', $wrapper_attributes ).'>';



        if ( ! empty( $title_text ) and ($title_text !='')) {
            $result .= '<div class="fl-progress-title fl-text-medium-style">'.$title_text.'</div>';
        }

        $result .= '<span class="fl-progress-bar__number fl-text-medium-style"><span class="fl-animated-number">0%</span></span>';

        $result .= '<div class="fl-progress-wrapper">';

        $result .= '<div class="fl-tracking-progress-bar">';

        $result .= '<div class="fl-tracking-progress-bar__item"></div>';

        $result .= '</div>';

        $result .= '</div>';

        $result .= '</div>';



        // Custom Color Setting
        if ( ! empty( $custom_color_setting ) and ($custom_color_setting != 'off')) {
            if (isset($item_color) && $item_color != '') {
                $fl_helping_css_style[] = '.fl-progress-bar-'.$idf.' .fl-progress-wrapper .fl-tracking-progress-bar .fl-tracking-progress-bar__item{background-color:' . $item_color . '!important;}';
            }
            if (isset($tracking_color) && $tracking_color != '') {
                $fl_helping_css_style[] = '.fl-progress-bar-'.$idf.' .fl-progress-wrapper .fl-tracking-progress-bar{background-color:' . $tracking_color . '!important;}';
            }
        }



        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }



        return $result;
    }
}
add_shortcode('vc_fl_progress_bar', 'vc_fl_progress_bar_function');
