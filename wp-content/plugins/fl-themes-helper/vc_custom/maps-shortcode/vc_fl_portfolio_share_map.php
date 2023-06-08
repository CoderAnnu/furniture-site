<?php

        if (function_exists('vc_map')) {
        vc_map(array(
            'name' => esc_html__('Portfolio Share', 'fl-themes-helper'),
            'base' => 'vc_fl_portfolio_share',
            'icon' => 'fl-icon icon-fl-vc-icon',
            'as_child' => array(
                'only' => 'vc_fl_portfolio_info_table'
            ),
            'params' => array_merge(array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'fl-themes-helper'),
                    'param_name' => 'li_title',
                    'std' => 'Share This:',
                    'value' => '',
                    'description' => '',
                ),

                array(
                    'type'				=> 'fl_heading_param',
                    'text'				=> esc_html__('Share Platform', 'fl-themes-helper'),
                    'param_name'		=> 'title_heading_vc',
                ),
                array(
                    "type"        => "checkbox",
                    "param_name"  => "tw",
                    "value"       => array(
                        'Twitter'  => 'true',
                    ),
                    'std' => 'true',
                ),
                array(
                    "type"        => "checkbox",
                    "param_name"  => "fb",
                    "value"       => array(
                        'Facebook'  => 'true',
                    ),
                    'std' => 'true',
                ),
                array(
                    "type"        => "checkbox",
                    "param_name"  => "lk",
                    "value"       => array(
                        'Linkedin'  => 'true',
                    ),
                    'std' => '',
                ),
                array(
                    "type"        => "checkbox",
                    "param_name"  => "pin",
                    "value"       => array(
                        'Pinterest'  => 'true',
                    ),
                    'std' => 'true',
                ),
                array(
                    "type"        => "checkbox",
                    "param_name"  => "gl",
                    "value"       => array(
                        'Google'  => 'true',
                    ),
                    'std' => '',
                ),
                array(
                    "type"        => "checkbox",
                    "param_name"  => "rd",
                    "value"       => array(
                        'Reddit'  => 'true',
                    ),
                    'std' => '',
                ),
                array(
                    'type'          => 'dropdown',
                    'heading'       => esc_html__('Select your icon', 'fl-themes-helper'),
                    'value' => array(
                        esc_attr__('Disable', 'fl-themes-helper')   => 'disable',
                        esc_attr__('Custom', 'fl-themes-helper')    => 'essential',
                    ),
                    'param_name'    => 'icon_type',
                    'std'           => 'disable',
                    'group'         => 'Icon',
                ),
                array(
                    'type'       => 'iconpicker',
                    'heading'    => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_essential',
                    'settings' => array(
                        'emptyIcon'     => false,
                        'type'          => 'essential',
                        'iconsPerPage'  => 300
                    ),
                    'dependency' => array(
                        'element'       => 'icon_type',
                        'value'         => 'essential'
                    ),
                    'group'         => 'Icon',
                ),
            ), fl_helping_get_animation_option(),fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
        ));
    }