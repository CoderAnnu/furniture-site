<?php

        if (function_exists('vc_map')) {
        vc_map(array(
            'name' => esc_html__('Portfolio Info', 'fl-themes-helper'),
            'base' => 'vc_fl_portfolio_info_table',
            'icon' => 'fl-icon icon-fl-vc-icon',
            "as_parent" => array('only' => ' vc_fl_portfolio_info, vc_fl_portfolio_share'),
            "content_element" => true,
            "js_view"  => 'VcColumnView',
            'category' => esc_html__('Empelza', 'fl-themes-helper'),
            'controls' => 'full',
            'weight' => 80,
            "show_settings_on_create" => false,
            'params' => array_merge(array(

            ), fl_helping_get_animation_option(),fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
        ));


    }