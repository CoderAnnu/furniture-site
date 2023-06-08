<?php
$module_images_accordion = FL_HELPING_PREVIEW_IMAGE .'/button/';
            if (function_exists('vc_map')) {
                vc_map(array(
                        "name" => esc_html__("Button", 'fl-themes-helper'),
                        "base" => "vc_fl_btn",
                        "class" => "",
                        "controls" => "full",
                        'icon' => 'fl-icon icon-fl-vc-icon',
                        "category" => esc_html__('Empelza', 'fl-themes-helper'),
                        'weight' => 900,
                        "params" => array_merge(array(
                            array(
                                'type'              => 'fl_radio_advanced',
                                'heading'           => esc_html__('Button Display', 'fl-themes-helper'),
                                'param_name'        => 'btn_wrap',
                                'value'		        => '',
                                'options' => array(
                                    esc_attr__("Inline", "fl-themes-helper")                  => "inline-display",
                                    esc_attr__("with Container", "fl-themes-helper")          => "",
                                ),
                            ),
                            array(
                                'type'      => 'fl_radio_image_select',
                                'heading' => esc_html__('Button Style', 'fl-themes-helper'),
                                'param_name' => 'btn_style',
                                'simple_mode' => false,
                                'options' => array(
                                    'primary-style' => array(
                                        'src' => $module_images_accordion . 'primary-style.jpg'
                                    ),
                                    'secondary-style' => array(
                                        'src' => $module_images_accordion . 'secondary-style.jpg'
                                    ),
                                    'ternary-style' => array(
                                        'src' => $module_images_accordion . 'ternary-style.jpg'
                                    ),
                                    'primary-border-style' => array(
                                        'src' => $module_images_accordion . 'primary-border-style.jpg'
                                    ),
                                    'custom-colors' => array(
                                        'src' => $module_images_accordion . 'custom-colors.png'
                                    ),
                                    'custom-border' => array(
                                        'src' => $module_images_accordion . 'custom-border.jpg'
                                    ),

                                ),
                                "value" => "primary-btn-style",
                            ),

                            array(
                                'type'              => 'fl_radio_advanced',
                                'heading'           => esc_html__('Button align', 'fl-themes-helper'),
                                'param_name'        => 'btn_align',
                                'value'		        => 'text-left',
                                'options' => array(
                                    esc_attr__("Left", "fl-themes-helper")                  => "text-left",
                                    esc_attr__("Center", "fl-themes-helper")                => "text-center",
                                    esc_attr__("Right", "fl-themes-helper")                 => "text-right",
                                ),
                            ),
                            array(
                                'type'          => 'fl_radio_advanced',
                                'heading'       => esc_html__('Button Size', 'fl-themes-helper'),
                                'param_name'    => 'size',
                                'value'		    => '',
                                'options' => array(
                                    esc_html__('Small', 'fl-themes-helper')             => 'small-size',
                                    esc_html__('Default', 'fl-themes-helper')           => '',
                                    esc_html__('Normal', 'fl-themes-helper')            => 'normal-size',
                                    esc_html__('Large', 'fl-themes-helper')             => 'large-size',
                                ),
                                'description' => esc_html__('Select button display size.', 'fl-themes-helper'),
                            ),

                            array(
                                'type'          => 'textfield',
                                'heading'       => esc_html__('Button Text', 'fl-themes-helper'),
                                'param_name'    => 'btn_text',
                                'admin_label'   => true,
                                'value'         => 'READ MORE',
                            ),

                            array(
                                'type'          => 'vc_link',
                                'heading'       => esc_html__('Link', 'fl-themes-helper'),
                                'param_name'    => 'link',
                            ),

// Color Setting
                            array(
                                'type'				=> 'fl_heading_param',
                                'text'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'param_name'		=> 'title_info_typography',
                                'class'             => 'fl-responsive-title',
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'dependency' => array(
                                    'element'                   => 'btn_style',
                                    'value'                     => 'custom-colors',
                                ),
                            ),
                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'btn_cl',
                                'heading'           => esc_html__('Color Text Button', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency' => array(
                                    'element'                   => 'btn_style',
                                    'value'                     => 'custom-colors',
                                ),
                                'std'               => ''
                            ),
                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'btn_bg',
                                'heading'           => esc_html__('Background Button', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency' => array(
                                    'element'                   => 'btn_style',
                                    'value'                     => 'custom-colors',
                                ),
                                'std'               => ''
                            ),
                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'btn_hv_bg',
                                'heading'           => esc_html__('Hover Background Button', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency' => array(
                                    'element'                   => 'btn_style',
                                    'value'                     => 'custom-colors',
                                ),
                                'std'               => ''
                            ),
                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'btn_hv_cl',
                                'heading'           => esc_html__('Hover Color Text Button', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency' => array(
                                    'element'                   => 'btn_style',
                                    'value'                     => 'custom-colors',
                                ),
                                'std'               => ''
                            ),

                            // Custom Border
                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'border_style_btn_cl',
                                'heading'           => esc_html__('Text Color Button', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency' => array(
                                    'element'                   => 'btn_style',
                                    'value'                     => 'custom-border',
                                ),
                                'std'               => ''
                            ),
                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'border_style_btn_br',
                                'heading'           => esc_html__('Border Color Button', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency' => array(
                                    'element'                   => 'btn_style',
                                    'value'                     => 'custom-border',
                                ),
                                'std'               => ''
                            ),
                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'border_style_btn_hv_cl',
                                'heading'           => esc_html__('Hover Color Text Button', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency' => array(
                                    'element'                   => 'btn_style',
                                    'value'                     => 'custom-border',
                                ),
                                'std'               => ''
                            ),
                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'border_style_btn_hv_bg',
                                'heading'           => esc_html__('Hover Background Color Text Button', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency' => array(
                                    'element'                   => 'btn_style',
                                    'value'                     => 'custom-border',
                                ),
                                'std'               => ''
                            ),

                        ), fl_helping_get_animation_option(), fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
                    )
                );
            }

