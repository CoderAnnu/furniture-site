<?php

    if(function_exists('vc_add_shortcode_param')) {
        vc_add_shortcode_param('fl_heading_param' , 'fl_heading_settings_field');
    }

    function fl_heading_settings_field($settings, $value) {
        $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
        $class = isset($settings['class']) ? $settings['class'] : '';
        $text = isset($settings['text']) ? $settings['text'] : '';
        $type = "";

        $output = '<div class="fl-heading-parameter-wrapper">';
        $output .= '<h4 class="wpb_vc_param_value  '.esc_attr($class).'">'.$text.'</h4>';
        $output .= '</div>';

        $output .= '<input type="hidden"  class="wpb_vc_param_value ' . esc_attr($param_name . ' ' . $type . ' ' . $class) . '" name="' . esc_attr($param_name) . '" value="'.$value.'" />';
        return $output;
    }