<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! function_exists( 'vc_fl_icon_box_function' ) ) {
    function vc_fl_icon_box_function($atts, $content = null)
    {

        $css_classes[] = 'fl-icon-box-vc';

        global $fl_helping_responsive_style, $fl_helping_css_style;

        $atts = vc_map_get_attributes('vc_fl_icon_box', $atts);

        extract($atts);

        $result = $wrapper_attributes[] = $responsive_style = $css=$icon='';

        $css_classes[] .= fl_get_css_tab_class($atts);

        if(isset($id) && $id != '') {
            $wrapper_attributes[] = 'id="'.fl_sanitize_class($id).'"';
        }

        if(isset($class) && $class != '') {
            $css_classes[] = fl_sanitize_class($class);
        }

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            if( !empty( $responsive_css ) && $responsive_css != '' ) {
                $responsive_id = $idf = uniqid('fl-helping-alert-responsive-').'-'.rand(100,9999);
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

        // Box Shadow
        if ( ! empty( $box_shadow_param ) and $box_shadow_param !='' ) {
            $box_shadow_html = uniqid('fl-custom-shadow-').'-'.rand(100,9999);
            $css_classes[] = $box_shadow_html;
            $fl_helping_css_style[] = '.' . $box_shadow_html . ' {'. $box_shadow_param. '}';
        }

// Custom Color Setting
        if ( ! empty( $custom_color ) and ($custom_color !='disable')) {
            $idf = uniqid('fl-custom-icon-').rand(100,9999);
            $css_classes[] .= $idf;
            if (!empty($i_cl) and ($i_cl != '')) {
                $fl_helping_css_style[] = '.' . $idf . ' .fl-icon-box-wrapper .icon-box-icon-wrapper i{color:' . $i_cl . '!important;}';
            }
            if (!empty($tl_cl) and ($tl_cl != '')) {
                $fl_helping_css_style[] = '.' . $idf . ' .fl-icon-box-wrapper .icon-box-title{ color:' . $tl_cl . '!important; }';
            }
            if (!empty($cn_cl) and ($cn_cl != '')) {
                $fl_helping_css_style[] = '.' . $idf . ' .fl-icon-box-wrapper .icon-box-text-content{ color:' . $cn_cl . '!important; }';
            }
        }
// HTML Classes
        if ( ! empty( $icon_box_style ) and ($icon_box_style !='')) {
            $css_classes[] .= $icon_box_style;
        }
        if ( ! empty( $color_style ) and $color_style !='custom-color-style') {
            $css_classes[] .= $color_style;
        }

        if ( ! empty( $btn_color_style ) and $btn_color_style !=''  and $icon_box_style == 'icon-box-style-one') {
            $css_classes[] .= $btn_color_style;
        }



// Button Link
        $tag_link = 'span';
        $link_atts = '';
        if ( fl_check_option($link) && function_exists('vc_build_link')) {
            $link = vc_build_link($link);
            if(isset($link['url']) && $link['url']) {
                $tag_link = 'a';
                $link_atts = ' href="' . esc_attr($link['url']) . '"';

                if(isset($link['title']) && $link['title']) {
                    $link_atts .= ' title="' . esc_attr($link['title']) . '"';
                }
                if(isset($link['target']) && $link['target']) {
                    $link_atts .= ' target="' . esc_attr(trim($link['target'])) . '"';
                }
                if(isset($link['rel']) && $link['rel']) {
                    $link_atts .= ' rel="' . esc_attr(trim($link['rel'])) . '"';
                }
            }
        }

        $btn = '<'.$tag_link.' class="icon-box-btn" '.$link_atts.'><i class="fl-custom-icon-right"></i></'.$tag_link.'>';



        // Icon

        if(isset($icon_type) && $icon_type != '') {

            switch ($icon_type) {
                case 'fontawesome':
                    $icon = $atts['icon_fontawesome'];
                    break;
                case 'openiconic':
                    $icon = $atts['icon_openiconic'];
                    break;
                case 'typicons':
                    $icon = $atts['icon_typicons'];
                    break;
                case 'entypo':
                    $icon = $atts['icon_entypo'];
                    break;
                case 'linecons':
                    $icon = $atts['icon_linecons'];
                    break;
                case 'elusive':
                    $icon = $atts['icon_elusive'];
                    break;
                case 'etline':
                    $icon = $atts['icon_etline'];
                    break;
                case 'iconmoon':
                    $icon = $atts['icon_iconmoon'];
                    break;
                case 'linearicons':
                    $icon = $atts['icon_linearicons'];
                    break;
                case 'flicon':
                    $icon = $atts['icon_flicon'];
                    break;
                case 'iconic':
                    $icon = $atts['icon_iconic'];
                    break;
            }

            vc_icon_element_fonts_enqueue($icon_type);

        }
        $icon_vc ='<i class="'.$icon.'"></i>';


        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

        $result .= '<div class="' . esc_attr( trim( $css_class ) ) . '" '. implode( ' ', $wrapper_attributes ).'>';



            // Style One
            if ( ! empty( $icon_box_style ) and ($icon_box_style =='icon-box-style-one')) {
                $result .='<div class="icon-box-wrap">';

                    $result .= '<div class="icon-box-icon-wrap">'.$icon_vc.'</div>';

                    // Title
                    if ( ! empty( $title) and ($title !='')) {
                        $result .= '<div class="icon-box-title fl-text-medium-style">'.$title.'</div>';
                    }
                    // Text Content
                    if ( ! empty( $content) and ($content !='')) {
                        $result .= '<div class="icon-box-text-content">'.wpb_js_remove_wpautop($content, false).'</div>';
                    }

                    $result .=$btn;

                $result .= '</div>';
            }

            // Style Two
            if ( ! empty( $icon_box_style ) and ($icon_box_style =='icon-box-style-two')) {
                $result .='<div class="icon-box-inner-wrap">';
                    $result .='<div class="icon-box-wrap">';

                    $result .= '<div class="icon-box-icon-wrap">';

                    $result .='<div class="svg-bg-content">';

                        $result .='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="131px" height="120px"><path fill-rule="evenodd"  fill="rgb(255, 255, 255)" d="M1.000,65.000 C2.847,22.911 59.009,-10.474 98.000,4.000 C109.484,8.262 126.735,19.562 129.993,37.848 C137.164,78.104 70.253,133.276 29.993,115.848 C11.399,107.799 0.124,84.955 1.000,65.000 Z"/></svg>';

                    $result .='</div>';

                    $result .= $icon_vc;


                    $result .='</div>';

                    // Title
                    if ( ! empty( $title) and ($title !='')) {
                        $result .= '<div class="icon-box-title fl-text-bold-style">'.$title.'</div>';
                    }
                    // Text Content
                    if ( ! empty( $content) and ($content !='')) {
                        $result .= '<div class="icon-box-text-content">'.wpb_js_remove_wpautop($content, false).'</div>';
                    }

                    $result .=$btn;

                    $result .= '</div>';
                $result .= '</div>';
            }
            // Style Three
            if ( ! empty( $icon_box_style ) and ($icon_box_style =='icon-box-style-three')) {
                $result .='<div class="icon-box-wrap">';

                $result .= '<div class="icon-box-icon-wrap">'.$icon_vc.'</div>';

                // Title
                if ( ! empty( $title) and ($title !='')) {
                    $result .= '<div class="icon-box-title fl-text-medium-style">'.$title.'</div>';
                }
                // Text Content
                if ( ! empty( $content) and ($content !='')) {
                    $result .= '<div class="icon-box-text-content">'.wpb_js_remove_wpautop($content, false).'</div>';
                }

                $result .=$btn;

                $result .= '</div>';
            }

            // Style Four
            if ( ! empty( $icon_box_style ) and ($icon_box_style =='icon-box-style-four')) {
                $result .='<div class="icon-box-wrap">';

                $result .= '<div class="icon-box-icon-wrap">'.$icon_vc.'</div>';

                $result .= '<div class="icon-right-content">';
                    // Title
                    if ( ! empty( $title) and ($title !='')) {
                        $result .= '<div class="icon-box-title fl-text-semi-bold-style">'.$title.'</div>';
                    }
                    // Text Content
                    if ( ! empty( $content) and ($content !='')) {
                        $result .= '<div class="icon-box-text-content">'.wpb_js_remove_wpautop($content, false).'</div>';
                    }

                $result .= '</div>';

                $result .= '</div>';
            }

        if ( ! empty( $icon_box_style ) and ($icon_box_style =='icon-box-style-five')) {
            $result .='<div class="icon-box-inner-wrap">';
            $result .='<div class="icon-box-wrap">';

            $result .= '<div class="icon-box-icon-wrap">';

            $result .='<div class="svg-bg-content">';

            $result .='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="131px" height="120px"><path fill-rule="evenodd"  fill="rgb(255, 255, 255)" d="M1.000,65.000 C2.847,22.911 59.009,-10.474 98.000,4.000 C109.484,8.262 126.735,19.562 129.993,37.848 C137.164,78.104 70.253,133.276 29.993,115.848 C11.399,107.799 0.124,84.955 1.000,65.000 Z"/></svg>';

            $result .='</div>';

            $result .= $icon_vc;


            $result .='</div>';

            // Title
            if ( ! empty( $title) and ($title !='')) {
                $result .= '<div class="icon-box-title fl-text-bold-style">'.$title.'</div>';
            }
            // Text Content
            if ( ! empty( $content) and ($content !='')) {
                $result .= '<div class="icon-box-text-content">'.wpb_js_remove_wpautop($content, false).'</div>';
            }
            if ( fl_check_option($link) && function_exists('vc_build_link')) {
                $result .= $btn;
            }

            $result .= '</div>';
            $result .= '</div>';
        }


        $result .= '</div>';



        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }

        return $result;

    }
}

add_shortcode('vc_fl_icon_box', 'vc_fl_icon_box_function');
