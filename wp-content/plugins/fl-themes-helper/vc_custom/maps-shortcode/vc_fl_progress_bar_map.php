<?php

        if (function_exists('vc_map')) {
            vc_map(array(
                'name'      => esc_html__('Progress bar', 'fl-themes-helper'),
                'base'      => 'vc_fl_progress_bar',
                'category'  => esc_html__('Empelza', 'fl-themes-helper'),
                'icon'      => 'fl-icon icon-fl-vc-icon',
                'controls'  => 'full',
                'weight'    => 300,
                'params' => array_merge(array(
                    array(
                        'type'          => 'fl_radio_advanced',
                        'heading'       => esc_html__('Color Style', 'fl-themes-helper'),
                        'param_name'    => 'color_style',
                        'value'		    => 'primary-color-style',
                        'options' => array(
                            esc_html__('Primary', 'fl-themes-helper')               => 'primary-color-style',
                            esc_html__('Secondary', 'fl-themes-helper')             => 'secondary-color-style',
                            esc_html__('Ternary', 'fl-themes-helper')               => 'ternary-color-style',
                        ),
                    ),

                    array(
                        'type'          => 'textarea',
                        'admin_label'   => true,
                        'heading'       => esc_html__('Title', 'fl-themes-helper'),
                        'param_name'    => 'title_text',
                        'value'         => '',
                        'std'           => 'WEB DEVELOPMENT'
                    ),
                    array(
                        'type'          => 'fl_slider',
                        'admin_label'   => true,
                        'heading'       => esc_html__('Duration', 'fl-themes-helper'),
                        'param_name'    => 'progress_duration',
                        'description'   => 'Standard Duration speed is 1200ms',
                        'min'           => 0,
                        'max'           => 10000,
                        'step'          => 10,
                        'value'         => 1200,
                        'suffix'        => 'ms'
                    ),
                    array(
                        'type'          => 'fl_slider',
                        'admin_label'   => true,
                        'heading'       => esc_html__('Progress Value', 'test'),
                        'param_name'    => 'progress_value',
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'value'         => 56,
                        'suffix'        => '%'
                    ),
                    // Color Setting Style One
                    array(
                        'type'              => 'fl_checkbox',
                        'class'             => '',
                        'heading'           => '',
                        'param_name'        => 'custom_color_setting',
                        'value'             => 'off',
                        'description'       => '"Checked" to enable custom color Setting',
                        'options' => array(
                            'on' => array(
                                'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                                'off'       => esc_attr__('No', 'fl-themes-helper'),
                            ),
                        ),
                        'group'             => 'Color Setting'
                    ),

                    array(
                        'type'				=> 'fl_heading_param',
                        'text'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                        'param_name'		=> 'title_info',
                        'class'             => 'fl-responsive-title',
                        'dependency' => array(
                            'element'                    => 'custom_color_setting',
                            'value'                      => 'on'
                        ),
                        'group'             => 'Color Setting'
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'param_name'    => 'tracking_color',
                        'heading'       => esc_html__('Tracking color', 'fl-themes-helper'),
                        'dependency' => array(
                            'element'                    => 'custom_color_setting',
                            'value'                      => 'on'
                        ),
                        'group'             => 'Color Setting',
                        'edit_field_class'  => 'vc_col-sm-6',
                        'std'               => ''
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'param_name'    => 'item_color',
                        'heading'       => esc_html__('Item color', 'fl-themes-helper'),
                        'dependency' => array(
                            'element'                    => 'custom_color_setting',
                            'value'                      => 'on'
                        ),
                        'group'             => 'Color Setting',
                        'edit_field_class'  => 'vc_col-sm-6',
                        'std'               => ''
                    ),
                ), fl_helping_get_animation_option(),fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
            ));
        }
