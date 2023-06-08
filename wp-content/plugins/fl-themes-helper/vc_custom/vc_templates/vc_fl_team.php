<?php
/*
 * Shortcode Prodress Bar
 * */
if ( ! function_exists( 'vc_fl_team_function' ) ) {
    function vc_fl_team_function($atts, $content = null)
    {
        $css_classes[] = 'fl-team-vc cf';

        global $fl_helping_responsive_style, $fl_helping_css_style;

        $atts = vc_map_get_attributes('vc_fl_team', $atts);

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
        if ( ! empty( $team_style ) and $team_style !='' ) {
            $css_classes[] = $team_style;
        }
        if ( ! empty( $team_style ) and $team_style =='team-style-one' ) {
            $img_size = 'empelza_size_170x170_crop';
        }else{
            $img_size = 'empelza_size_180x180_crop';
        }



        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );


        // Start
        $result .= '<div class="' . esc_attr( trim( $css_class ) ) . '" '. implode( ' ', $wrapper_attributes ).'>';

        if ( ! empty( $team_style ) and $team_style =='team-style-one' ) {
            $result .='<div class="flipper-team-content">';
            // Font Content
            $result .= '<div class="entry-content front-content">';

            if (isset($image_id) && !empty($image_id)) {
                $image = wp_get_attachment_image_src($image_id, $img_size);
                $result .= '<div class="team-image">';
                $result .= '<img src="' . esc_url($image[0]) . '" alt=" "/>';
                $result .= '</div>';
            }

            if (!empty($name) and $name != '') {
                $result .= '<div class="team-name fl-text-bold-style">' . $name . '</div>';
            }
            if (!empty($profession) and $profession != '') {
                $result .= '<div class="team-profession fl-text-regular-style">' . $profession . '</div>';
            }
            $result .= '<ul class="team-social-profiles">';
            if (isset($tw) && !empty($tw)) {
                $result .= '<li class="team-slider-social"><a href="' . $tw . '"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
            }
            if (isset($bh) && !empty($bh)) {
                $result .= '<li class="team-slider-social"><a href="' . $bh . '"><i class="fa fa-behance" aria-hidden="true"></i></a></li>';
            }
            if (isset($fb) && !empty($fb)) {
                $result .= '<li class="team-slider-social"><a href="' . $fb . '"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
            }
            if (isset($in) && !empty($in)) {
                $result .= '<li class="team-slider-social"><a href="' . $in . '"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
            }
            if (isset($gl) && !empty($gl)) {
                $result .= '<li class="team-slider-social"><a href="' . $gl . '"><i class="fa fa-google" aria-hidden="true"></i></a></li>';
            }
            if (isset($yt) && !empty($yt)) {
                $result .= '<li class="team-slider-social"><a href="' . $yt . '"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>';
            }
            $result .= '</ul>';


            $result .= '</div>';

            // Back Content
            $result .= '<div class="entry-content back-content">';

            if (!empty($name) and $name != '') {
                $result .= '<div class="team-name fl-text-bold-style">' . $name . '</div>';
            }
            if (!empty($profession) and $profession != '') {
                $result .= '<div class="team-profession fl-text-regular-style">' . $profession . '</div>';
            }

            if (!empty($description) and $description != '') {
                $result .= '<div class="team-description">' . $description . '</div>';
            }

            if (!empty($phone_number) and $phone_number!= '') {
                $result .= '<div class="team-phone-number-wrap"><a class="phone-number fl-text-bold-style" href="tel:'.str_replace(" ","",$phone_number).'">' . $phone_number . '</a></div>';
            }


            $result .= '<ul class="team-social-profiles">';
            if (isset($tw) && !empty($tw)) {
                $result .= '<li class="team-slider-social"><a href="' . $tw . '"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
            }
            if (isset($bh) && !empty($bh)) {
                $result .= '<li class="team-slider-social"><a href="' . $bh . '"><i class="fa fa-behance" aria-hidden="true"></i></a></li>';
            }
            if (isset($fb) && !empty($fb)) {
                $result .= '<li class="team-slider-social"><a href="' . $fb . '"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
            }
            if (isset($in) && !empty($in)) {
                $result .= '<li class="team-slider-social"><a href="' . $in . '"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
            }
            if (isset($gl) && !empty($gl)) {
                $result .= '<li class="team-slider-social"><a href="' . $gl . '"><i class="fa fa-google" aria-hidden="true"></i></a></li>';
            }
            if (isset($yt) && !empty($yt)) {
                $result .= '<li class="team-slider-social"><a href="' . $yt . '"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>';
            }
            $result .= '</ul>';


            $result .= '</div>';

            $result .= '</div>';

        }else{

            $result .= '<div class="entry-content">';

            if (isset($image_id) && !empty($image_id)) {
                $image = wp_get_attachment_image_src($image_id, $img_size);
                $result .= '<div class="team-image">';
                $result .= '<img src="' . esc_url($image[0]) . '" alt=" "/>';
                $result .= '</div>';
            }

            if (!empty($name) and $name != '') {
                $result .= '<div class="team-name fl-text-bold-style">' . $name . '</div>';
            }
            if (!empty($profession) and $profession != '') {
                $result .= '<div class="team-profession fl-text-regular-style">' . $profession . '</div>';
            }
            $result .= '<ul class="team-social-profiles">';
            if (isset($tw) && !empty($tw)) {
                $result .= '<li class="team-slider-social"><a href="' . $tw . '"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
            }
            if (isset($bh) && !empty($bh)) {
                $result .= '<li class="team-slider-social"><a href="' . $bh . '"><i class="fa fa-behance" aria-hidden="true"></i></a></li>';
            }
            if (isset($fb) && !empty($fb)) {
                $result .= '<li class="team-slider-social"><a href="' . $fb . '"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
            }
            if (isset($in) && !empty($in)) {
                $result .= '<li class="team-slider-social"><a href="' . $in . '"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
            }
            if (isset($gl) && !empty($gl)) {
                $result .= '<li class="team-slider-social"><a href="' . $gl . '"><i class="fa fa-google" aria-hidden="true"></i></a></li>';
            }
            if (isset($yt) && !empty($yt)) {
                $result .= '<li class="team-slider-social"><a href="' . $yt . '"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>';
            }
            $result .= '</ul>';


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
add_shortcode('vc_fl_team', 'vc_fl_team_function');
