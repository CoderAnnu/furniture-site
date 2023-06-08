<?php

            if (function_exists('vc_map')) {
                vc_map(array(
                        "name" => esc_html__("Drop Caps", 'fl-themes-helper'),
                        "base" => "vc_fl_drop_caps",
                        "class" => "",
                        "controls" => "full",
                        'icon' => 'fl-icon icon-fl-vc-icon',
                        "category" => esc_html__('Empelza', 'fl-themes-helper'),
                        'weight' => 900,
                        "params" => array_merge(array(
                            array(
                                'type'          => 'textfield',
                                'heading'       => esc_html__('First Letter', 'fl-themes-helper'),
                                'param_name'    => 'first_letter',
                                'admin_label'   => true,
                                'value'         => 'E',
                            ),
                            array(
                                'type'              => 'textarea_html',
                                "heading"           => esc_html__("Text", "fl-themes-helper"),
                                'param_name'        => 'content',
                                'value'             => '',
                                'holder'            => 'div',
                                'std'               => 'Suppose end get boy warrant general natural. Delightful me suficient projection  principles if preference do impression of. Preserved so difficult repulsive on ipsum time be. Valley as be appear cannot so by. Convinced resembled dependent reain Suppose end get boy warrant general natural. Delightful me sufficient projection ask. Decisively ference do impression of. Preserved oh so difficult repulsive.',
                                "description"       => esc_html__("Enter your text.", "fl-themes-helper")
                            ),
// Color Setting
                            array(
                                'type'				=> 'fl_heading_param',
                                'text'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'param_name'		=> 'title_info_typography',
                                'class'             => 'fl-responsive-title',
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                            ),
                            array(
                                'type'              => 'fl_checkbox',
                                'class'             => '',
                                'heading'           => '',
                                'param_name'        => 'custom_color',
                                'value'             => 'off',
                                'description'       => '"Checked" to enable custom color setting',
                                'options' => array(
                                    'on' => array(
                                        'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                                        'off'       => esc_attr__('No', 'fl-themes-helper'),
                                    ),
                                ),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                            ),
                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'f_letter_bg_cl',
                                'heading'           => esc_html__('First Letter Background', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'edit_field_class'  => 'vc_col-sm-4',
                                'dependency' => array(
                                    'element'                   => 'custom_color',
                                    'value'                     => 'on',
                                ),
                                'std'               => ''
                            ),
                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'f_letter_color',
                                'heading'           => esc_html__('First Letter Color', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'edit_field_class'  => 'vc_col-sm-4',
                                'dependency' => array(
                                    'element'                   => 'custom_color',
                                    'value'                     => 'on',
                                ),
                                'std'               => ''
                            ),
                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'text_color',
                                'heading'           => esc_html__('Text color', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'edit_field_class'  => 'vc_col-sm-4',
                                'dependency' => array(
                                    'element'                   => 'custom_color',
                                    'value'                     => 'on',
                                ),
                                'std'               => ''
                            ),

                        ), fl_helping_get_animation_option(), fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
                    )
                );
            }

