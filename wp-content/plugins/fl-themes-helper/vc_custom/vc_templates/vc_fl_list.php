<?php

if ( ! function_exists( 'vc_fl_text_list_function' ) ) {
    function vc_fl_text_list_function($atts, $content = null)
    {

        $css_classes[] = 'fl-vc-list-wrapper';

        global $fl_helping_responsive_style, $fl_helping_css_style;

        $atts = vc_map_get_attributes('vc_fl_text_list', $atts);
        extract($atts);

        $vc_init  = uniqid('fl-custom-slider-').'-'.rand(100,9999);

        $css_classes[] = $vc_init;

        //Button sizes
        $result = $wrapper_attributes[] = $responsive_style = '';

        $custom_html_class = uniqid('fl-vc-custom').'-'.rand(100,9999);

        $css_classes[] .= fl_get_css_tab_class($atts);

        if(isset($id) && $id != '') {
            $wrapper_attributes[] = 'id="'.fl_sanitize_class($id).'"';
        }

        if(isset($class) && $class != '') {
            $css_classes[] .= fl_sanitize_class($class);
        }


        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            if( !empty( $responsive_css ) && $responsive_css != '' ) {
                $responsive_id = $idf = uniqid('fl-helping-responsive-').'-'.rand(100,9999);
                $column_selector = $responsive_id;
                $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
                $css_classes[] .= $responsive_id;
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

        // Custom Color Setting
        if ( ! empty( $custom_color ) and $custom_color =='enable' ) {
            $css_classes[] = $custom_html_class;
            if ( ! empty( $i_cl ) and $i_cl !='' ) {
                $fl_helping_css_style[] = '.' . $custom_html_class . ' ul li span i{ color:'.$i_cl.'!important; }';
            }
            if ( ! empty( $text_cl ) and $text_cl !='' ) {
                $fl_helping_css_style[] = '.' . $custom_html_class . ' ul li{ color:'.$text_cl.'!important; }';
             }
        }


        if ( ! empty( $list_style ) and $list_style !='' ) {
            $css_classes[] .= $list_style;
        }


        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

        $result .= '<div class="' . esc_attr( trim( $css_class ) ) .' " '. implode( ' ', $wrapper_attributes ).'>';
                $result .= '<ul class="list-vc-ul">';
                // Foreach
                $list_fields = (array) vc_param_group_parse_atts($list_fields);
                foreach($list_fields as $fields2) {
                     if(isset($fields2['text_content']) && !empty($fields2['text_content'])) {
                         if ( ! empty( $list_style ) and $list_style =='style-one' ) {
                             $result .= '<li class="list-vc-li fl-text-medium-style"><span class="left-content"><i class="fa fa-check" aria-hidden="true"></i></span>'.$fields2['text_content'].'</li>';
                         }elseif ( ! empty( $list_style ) and $list_style =='style-two' ){
                             $result .= '<li class="list-vc-li fl-text-medium-style"><span class="left-content"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>'.$fields2['text_content'].'</li>';
                         }else{
                             $result .= '<li class="list-vc-li fl-text-medium-style"><span class="left-content"><i class="fa fa-angle-right" aria-hidden="true"></i></span>'.$fields2['text_content'].'</li>';
                         }

                     }

                }
                $result .='</ul>';

        $result .= '</div>';


        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }

        return $result;
    }
}
add_shortcode('vc_fl_text_list', 'vc_fl_text_list_function');