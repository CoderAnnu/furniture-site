<?php

            if (function_exists('vc_map')) {
                vc_map(array(
                        "name" => esc_html__("Video Button", 'fl-themes-helper'),
                        "base" => "vc_fl_video_button",
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
                                'type'          => 'fl_radio_advanced',
                                'heading'       => esc_html__('Color Style', 'fl-themes-helper'),
                                'param_name'    => 'color_style',
                                'value'		    => 'primary-video-btn-style',
                                'options' => array(
                                    esc_html__('Primary', 'fl-themes-helper')               => 'primary-video-btn-style',
                                    esc_html__('Secondary', 'fl-themes-helper')             => 'secondary-video-btn-style',
                                    esc_html__('Ternary', 'fl-themes-helper')               => 'ternary-video-btn-style',
                                ),
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
                                'value'		    => 'small-size',
                                'options' => array(
                                    esc_html__('Small', 'fl-themes-helper')             => 'small-size',
                                    esc_html__('Default', 'fl-themes-helper')           => '',
                                ),
                                'description' => esc_html__('Select button display size.', 'fl-themes-helper'),
                            ),

                            array(
                                'type'          => 'textfield',
                                'heading'       => esc_html__('Button Text', 'fl-themes-helper'),
                                'param_name'    => 'btn_text',
                                'admin_label'   => true,
                                'value'         => 'WATCH VIDEO',
                            ),

                            array(
                                'type'          => 'vc_link',
                                'heading'       => esc_html__('Link', 'fl-themes-helper'),
                                'param_name'    => 'link',
                            ),

                            array(
                                'type'              => 'colorpicker',
                                'param_name'        => 'text_color',
                                'heading'           => esc_html__('Text color', 'fl-themes-helper'),
                                'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),

                                'std'               => ''
                            ),
                        ), fl_helping_get_animation_option(), fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
                    )
                );
            }

