<?php


if ( ! function_exists( 'fl_tabs' ) ) {
    function fl_tabs( $atts, $content = null ) {
        $i = -1;
        $css_classes[] = 'fl-tabs-wrapper';

        $custom_tab_id_class = uniqid('fl-vc-tab-').'-'.rand(100,9999);

        global  $fl_global_tabs, $fl_helping_responsive_style, $fl_helping_css_style;

        $atts = vc_map_get_attributes('vc_tabs', $atts);

        extract($atts);

        $result = $wrapper_attributes[] = $responsive_style = $custom_css_color = '';

        $css_classes[] = fl_get_css_tab_class($atts);

        if(isset($id) && $id != '') {
            $wrapper_attributes[] = 'id="'.fl_sanitize_class($id).'"';
        }

        if(isset($class) && $class != '') {
            $css_classes[] .= fl_sanitize_class($class);
        }

        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            if( !empty( $responsive_css ) && $responsive_css != '' ) {
                $responsive_id = $idf = uniqid('fl-helping-tab-responsive-').'-'.rand(100,9999);
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

        $css_classes[] = $custom_tab_id_class;

        $wrapper_attributes[] = 'data-custom-tabs-class=".'.$custom_tab_id_class.'"';


        $fl_global_tabs = array();





        do_shortcode( $content );


        if( empty( $fl_global_tabs ) ) { return; }


        $active_tab = 1;


        // For Title Style


        $tabunidtab = time().'-'.mt_rand();


        $css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );


        // For UL Style
        $ul_css_classes [] = '';

        if(isset($tab_align_position) && $tab_align_position != '') {
            $ul_css_classes[] = $tab_align_position;
        }


        $ul_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $ul_css_classes ) ) ) );


        $result .= '<div class="'.$css_class.'" '. implode( ' ', $wrapper_attributes ).'>';


        $result .= '<ul class="nav-tabs col-lg-3 '.$ul_css_class.'">';
        foreach( $fl_global_tabs as $key => $tab) {
            $i++;
            if($key == 0){
                $title_html = 'Tab 1';
            } elseif($key == 1) {
                $title_html = 'Tab 2';
            } else {
                $title_html = 'Tab';
            }

            if(isset( $tab['atts']['title'] )){
                $title_html = $tab['atts']['title'];
            }



            $custom_html_class='';

            $active = ( ( $key + 1 ) == $active_tab ) ? 'active ' : '';


            // Custom Style TABS

            $custom_html_class .= $active;


            $custom_html_css_class = 'custom-'.$tabunidtab.'-'.$i;


            if(isset( $tab['atts']['image_id'] )&& $tab['atts']['image_id'] !=''){

                $image = wp_get_attachment_image_src($tab['atts']['image_id'], 'full');

                $fl_helping_css_style[] = '.' . $custom_html_css_class . ' .tab-link-content { background-image:url(' . $image[0] . ')!important; }';

            }

            $custom_tab_content_class = '';
            if ($i==4){
                $i = 0;
            }



            $custom_html_class .= $custom_html_css_class;

            $result .= '<li class="fl-text-regular-style '.$custom_html_class.'" data-tab="fl-'.$tabunidtab.'-'.$key.'">';

            $result .= '<div class="tab-link-content '.$custom_tab_content_class.'">';

            $result .= '<div class="inner-content">';

            $result .= '<div class="tab-title-content fl-font-style-semi-bolt">' . esc_html($title_html) . '</div>';

            $result .='<div class="icon-container"><i class="fl-custom-icon-right"></i></div>';

            $result .= '</div>';

            $result .= '</div>';

            $result .= '</li>';
        }
        $result .= '</ul>';

        $result .= '<div class="tab-content-container col-lg-9">';

        foreach ($fl_global_tabs as $key => $tab) {
            $active_content = ( ( $key + 1 ) == $active_tab ) ? 'active' : '';
            $result .= '<div class="tab-pane fl-'.$tabunidtab.'-'.$key.' '.$active_content.'">';
            $result .=  do_shortcode($tab['content']);
            $result .=  '</div>';
        }

        $result .= '</div>';



        $result .= '</div>';




        // Responsive CSS Box
        if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
            $fl_helping_responsive_style .= $responsive_style;
        }

        return $result;
    }
}
add_shortcode( 'vc_tabs', 'fl_tabs' );

if ( ! function_exists( 'fl_tab' ) ) {
    function fl_tab( $atts, $content = null) {
        global $fl_global_tabs;
        $fl_global_tabs[]  = array( 'title' => 'Tabs','atts' => $atts, 'content' => $content );
        return;
    }
}
add_shortcode( 'vc_tab', 'fl_tab' );

