<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

    if ( function_exists( 'vc_add_shortcode_param' ) ) {

        vc_add_shortcode_param( 'fl_image_select', 'fl_image_select_settings_field', FL_THEME_HELPER_ROOT_DIR . '/assets/params/js/fl-custom-params.js');
    }


if(!class_exists('fl_image_select_settings_field')) {

    function fl_image_select_settings_field( $settings, $value ) {

        $options      = isset( $settings['options'] ) ? $settings['options'] : '';

        $useextension = ( isset( $settings['useextension'] ) && '' !== $settings['useextension'] ) ? $settings['useextension'] : 'true';

        $class      = isset( $settings['class'] ) ? $settings['class'] : '';

        $output = $selected = '';

        $css_option = str_replace( '#', 'hash-', vc_get_dropdown_option( $settings, $value ) );

        $output .= '<select name="'. $settings['param_name']. '" class="fl-radio-img-selected-param wpb_vc_param_value wpb-input wpb-select ' . $class. ' ' .$settings['param_name']. ' ' . $settings['type'] . ' ' . $css_option . '" data-option="' . $css_option . '">';

        if ( is_array( $options ) ) {
            foreach ( $options as $key => $val ) {
                if ( 'true' !== $useextension ) {
                    $temp          = pathinfo( $key );
                    $temp_filename = $temp['filename'];
                    $key           = $temp_filename;
                }

                if ( '' !== $css_option && $css_option === $key ) {
                    $selected = ' selected="selected"';
                } else {
                    $selected = '';
                }

                $tooltip = $val['tooltip'];
                $img_url = $val['src'];


                $output .= '<option data-tooltip="'.esc_attr($tooltip).'"  data-img-src="' . esc_url($img_url) . '"  value="' . esc_attr($key) . '" ' . $selected . '>';
            }
        }
        $output .= '</select>';

        return $output;
    }





}