<?php

        if (function_exists('vc_map')) {
            vc_map(
                array(
                    "name"          => esc_html__("Gap","fl-themes-helper"),
                    "base"          => "vc_gap",
                    "class"         => "",
                    'icon'          => 'fl-icon icon-fl-vc-icon',
                    'category'      => esc_html__('Empelza', 'fl-themes-helper'),
                    "description"   => '',
                    'weight'        => 500,
                    "params" => array(
                        array(
                            'type'				=> 'fl_heading_param',
                            'text'				=> esc_html__('Gap Setting', 'fl-themes-helper'),
                            'param_name'		=> 'headings_gap',
                            'class'             => 'fl-responsive-text',
                        ),
                        array(
                            "type"          => "fl_number",
                            "class"         => "",
                            "heading"       => __("Height", "fl-themes-helper"),
                            "param_name"    => "height",
                            "admin_label"   => true,
                            "value"         => 20,
                            "min"           => 1,
                            "max"           => 500,
                            "suffix"        => "px",
                        ),
                        array(
                            'type'				=> 'fl_heading_param',
                            'text'				=> esc_html__('Responsive Option', 'fl-themes-helper'),
                            'param_name'		=> 'responsive_headings',
                            'class'             => 'fl-responsive-text',
                            'description'       => __('
                                                 <i class="fa fa-laptop"></i> Desktop : Screen resolutions from 1199px to 991px<br>
                                                 <i class="fa fa-tablet"></i> Tablet : Screen resolutions from 991px to 767px<br>
                                                 <i class="fa fa-mobile"></i> Mobile : Screen resolutions less than 767px', 'fl-themes-helper'),
                        ),

                        array(
                            'type'              => 'fl_checkbox',
                            'class'             => '',
                            'heading'           => '',
                            'param_name'        => 'custom_responsive_option',
                            'value'             => 'off',
                            'description'       => __('"Checked" to enable custom responsive option', 'fl-themes-helper'),
                            'options' => array(
                                'on' => array(
                                    'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                                    'off'       => esc_attr__('No', 'fl-themes-helper'),
                                ),
                            ),
                        ),

                        array(
                            "type"              => "fl_responsive_text",
                            "class"             => "",
                            "heading"           => esc_attr__("Gap Height Responsive", 'fl-themes-helper'),
                            "param_name"        => "gap_height_responsive",
                            "unit"              => "px",
                            "admin_label"       => true,
                            "media" => array(
                                "Desktop"           => '',
                                "Tablet"            => '',
                                "Mobile"            => '',
                            ),
                            'dependency' => array(
                                'element'                    => 'custom_responsive_option',
                                'value'                      => 'on'
                            ),
                        ),
                    )
                )
            );
        }