<?php


if ( function_exists( 'vc_add_shortcode_param' ) ) {
    vc_add_shortcode_param( 'fl_custom_switch_option', 'fl_custom_switch_option_settings_field', FL_THEME_HELPER_ROOT_DIR . '/assets/params/js/fl-custom-params.js');
}

    function fl_custom_switch_option_settings_field( $settings, $value ) {
        $switch_option_enable = $switch_option_disable = '';
        if($value == 0) { $switch_option_disable = 'selected';}
        if($value == 1) { $switch_option_enable = 'selected';}

        $output = '';

        $output .= '<div class="fl-switch--wrapper">';
        $css_option = vc_get_dropdown_option( $settings, $value );

        foreach ( $settings['value'] as $index => $data ) {
            $option_data[] = $index;
        }

        $output .= '<label class="switch-option-enable '.$switch_option_enable.'">'
            .'<span>'.$option_data[1].'</span>'
            .'</label>'
            .'<label class="switch-option-disable '.$switch_option_disable.'">'
            .'<span>'.$option_data[0].'</span>'
            .'</label>';
        $output .= '<select style="display:none;" id="webmenu" name="'. $settings['param_name']. '" class="wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
            . ' ' . $settings['type']
            . ' ' . $css_option
            . '" data-option="' . $css_option . '">';
        if ( is_array( $value ) ) {
            $value = isset( $value['value'] ) ? $value['value'] : array_shift( $value );
        }
        foreach ( $settings['value'] as $index => $data ) {
            if ( is_numeric( $index ) && ( is_string( $data ) || is_numeric( $data ) ) ) {
                $option_label = $data;
                $option_value = $data;
            } elseif ( is_numeric( $index ) && is_array( $data ) ) {
                $option_label = isset( $data['label'] ) ? $data['label'] : array_pop( $data );
                $option_value = isset( $data['value'] ) ? $data['value'] : array_pop( $data );
            } else {
                $option_value = $data;
                $option_label = $index;
            }
            $option_label = esc_attr( $option_label, 'fl_helping_plugin' );

            $selected = '';
            if ( $value !== '' && (string) $option_value === (string) $value ) {
                $selected = ' selected="selected"';
            }
            $output .= '<option class="' . $option_value . '" value="' . $option_value . '" title="'.$option_value.'"' . $selected . '>'.$option_value.'</option>';
        }
        $output .= '</select>';

        $output .= '</div>';

        return $output;
    }

