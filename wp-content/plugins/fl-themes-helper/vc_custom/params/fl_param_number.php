<?php

if ( function_exists( 'vc_add_shortcode_param' ) ) {

    vc_add_shortcode_param( 'fl_number', 'fl_number_settings_field');
}

if ( ! function_exists( 'fl_number_settings_field' ) ) :
    function fl_number_settings_field($settings, $value) {

            $suffix             = isset($settings['suffix']) ? $settings['suffix'] : '';
            $suffix_div_open    = isset($settings['suffix']) ? '<div class="fl_number_suffix">' : '';
            $suffix_div_close   = isset($settings['suffix']) ? '</div>' : '';
            $div_suffix         = isset($settings['suffix']) ? 'fl_number_with_suffix' : '';


        return '<input name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value wpb-textinput '.$div_suffix.' ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '_field" type="number" min="'.intval($settings['min']).'" max="'.intval($settings['max']).'" step="'.intval($settings['step']).'" value="' . esc_attr($value) . '" />'.$suffix_div_open.esc_html($suffix).$suffix_div_close;
    }
endif;