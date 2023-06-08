<?php
/*
 * Shortcode Partner Row
 * */
if ( ! function_exists( 'vc_fl_portfolio_share_function' ) ) {
    function vc_fl_portfolio_share_function($atts, $content = null)
    {
        $css_classes[] = 'fl-li-portfolio-info cf';

        global $fl_helping_responsive_style;

        $atts = vc_map_get_attributes('vc_fl_portfolio_share', $atts);

        extract($atts);

        $result = $wrapper_attributes[] = $css_classes[] = $responsive_style = '';



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
                $responsive_id = $idf = uniqid('fl-responsive-portfolio-info-row').'-'.rand(100,9999);
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


        // Icon
        $icon_vc = $icon=$result_icon_share ='';
        if(isset($icon_type) && $icon_type != 'disable') {

            switch ($icon_type) {
                case 'essential':
                    $icon = $atts['icon_essential'];
                    break;
            }

            vc_icon_element_fonts_enqueue($icon_type);
            $icon_vc ='<i class="'.$icon.'"></i>';
        }


        $result_icon_share .= fl_share_buttons($tw,$fb,$lk,$pin,$gl,$rd);

        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

        $result .= '<li class="' . esc_attr( trim( $css_class ) ) . '" '.implode( ' ', $wrapper_attributes).'>';

        $result .= '<div class="fl-left-content">'. $icon_vc . $li_title . '</div>';

        $result .= '<div class="fl-right-content">'.$result_icon_share.'</div>';

        $result .= '</li>';

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }

        return $result;

    }
}
add_shortcode('vc_fl_portfolio_share', 'vc_fl_portfolio_share_function');
