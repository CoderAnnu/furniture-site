<?php
        if (function_exists('vc_map')) {
            vc_map(array(
                'name'      => esc_html__('Counters', 'fl-themes-helper'),
                'base'      => 'vc_fl_counters',
                'category'  => esc_html__('Empelza', 'fl-themes-helper'),
                'icon' => 'fl-icon icon-fl-vc-icon',
                'controls'  => 'full',
                'weight'    => 800,
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
                        "type"              => "textfield",
                        "heading"           => esc_html__("Preffix", 'fl-themes-helper'),
                        "param_name"        => "preffix",
                        "value"             => '',
                        "description"       => esc_html__("Enter the preffix for rotate. Use: %, #, ^,& etc.", 'fl-themes-helper'),
                        'edit_field_class'  => 'vc_col-sm-4'
                    ),
                    array(
                        'type'              => 'fl_number',
                        "class"             => "",
                        "heading"           => esc_html__("Count", "fl-themes-helper"),
                        "param_name"        => "count",
                        'admin_label'       => true,
                        'value'             => 650,
                        'min'               => 0,
                        'max'               => 9999999999999,
                        'step'              => 1,
                        'edit_field_class'  => 'vc_col-sm-4'
                    ),
                    array(
                        "type"              => "textfield",
                        "heading"           => esc_html__("Suffix", 'fl-themes-helper'),
                        "param_name"        => "suffix",
                        "value"             => '',
                        'std'               => '',
                        "description"       => esc_html__("Enter the suffix for rotate. Use: %, #, ^,& etc.", 'fl-themes-helper'),
                        'edit_field_class'  => 'vc_col-sm-4'
                    ),

                    array(
                        'type'              => 'textarea_html',
                        "heading"           => esc_html__("Title text", "fl-themes-helper"),
                        'param_name'        => 'content',
                        'value'             => '',
                        'holder'            => 'div',
                        'std'               => 'Unique Ideas',
                        "description"       =>  esc_html__("Enter your text.", "fl-themes-helper"),
                    ),


                    array(
                        'type'              => 'fl_slider',
                        "heading"           => esc_html__("Animation duration Counter", "fl-themes-helper"),
                        "param_name"        => "duration",
                        'min'               => 0,
                        'max'               => 10000,
                        'step'              => 10,
                        'value'             => 1300,
                        'group'             => 'Counter Setting',
                        "description"       => esc_html__("Standard 2000ms.", "fl-themes-helper"),
                        'suffix'            => 'ms',
                    ),
                    array(
                        'type'              => 'fl_number',
                        "class"             => "",
                        "heading"           => esc_html__("Animation Refresh Interval", "fl-themes-helper"),
                        "param_name"        => "refresh_interval",
                        'value'             => 5,
                        'min'               => 0,
                        'max'               => 999999,
                        'step'              => 1,
                        'group'             => 'Counter Setting',
                        "description"       => esc_html__("Standard 5.", "fl-themes-helper")
                    ),
// Color Setting
                    array(
                        'type'          => 'fl_checkbox',
                        'class'         => '',
                        'heading'       => 'Custom color',
                        'param_name'    => 'custom_color',
                        'value'         => 'disable',
                        'options' => array(
                            'enable' => array(
                                'enable'            => esc_attr__('Enable', 'fl-themes-helper'),
                                'disable'           => esc_attr__('Disable', 'fl-themes-helper'),
                            ),
                        ),
                        'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                    ),
                    array(
                        'type'				=> 'fl_heading_param',
                        'text'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                        'param_name'		=> 'title_info_typography',
                        'class'             => 'fl-responsive-title',
                        'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                        'dependency' => array(
                            'element'                   => 'custom_color',
                            'value'                     => 'enable',
                        ),
                    ),
                    array(
                        'type'              => 'colorpicker',
                        'param_name'        => 'cn_cl',
                        'heading'           => esc_html__('Counter Color', 'fl-themes-helper'),
                        'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                        'edit_field_class'  => 'vc_col-sm-4',
                        'dependency' => array(
                            'element'                   => 'custom_color',
                            'value'                     => 'enable',
                        ),
                        'std'               => ''
                    ),
                    array(
                        'type'              => 'colorpicker',
                        'param_name'        => 'tl_cl',
                        'heading'           => esc_html__('Title Color', 'fl-themes-helper'),
                        'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                        'edit_field_class'  => 'vc_col-sm-4',
                        'dependency' => array(
                            'element'                   => 'custom_color',
                            'value'                     => 'enable',
                        ),
                        'std'               => ''
                    ),

                ), fl_helping_get_animation_option(),fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
            ));
        }
