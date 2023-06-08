<?php

        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Text Block', 'fl-themes-helper'),
                'base' => 'vc_column_text',
                'icon' => 'fl-icon icon-fl-vc-icon',
                'wrapper_class' => 'clearfix',
                'category' => esc_html__('Empelza', 'fl-themes-helper'),
                'controls' => 'full',
                'weight' => 100,
                'params' => array_merge(array(
                    array(
                        'type'              => 'textarea_html',
                        "heading"           => esc_html__("Text", "fl-themes-helper"),
                        'param_name'        => 'content',
                        'value'             => '',
                        'holder'            => 'div',
                        'std'               => 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
                        "description"       => esc_html__("Enter your text.", "fl-themes-helper")
                    ),
                    array(
                        'type'              => 'fl_number',
                        "class"             => "",
                        'admin_label'       => true,
                        'heading'           => esc_html__('Font size', 'fl-themes-helper'),
                        'param_name'        => 'ft_size',
                        'value'             => '',
                        'min'               => 0,
                        'max'               => 999999,
                        'step'              => 1,
                        'suffix'            => 'px',
                        "description"       => esc_html__("You can enter a font size (Example: 19)", "fl-themes-helper"),
                        'group'             => 'Style Settings',
                    ),
                    array(
                        'type'              => 'fl_number',
                        "class"             => "",
                        'admin_label'       => true,
                        'heading'           => esc_html__('Line Height', 'fl-themes-helper'),
                        'param_name'        => 'ln_height',
                        'value'             => '',
                        'min'               => 0,
                        'max'               => 999999,
                        'step'              => 1,
                        'suffix'            => 'px',
                        "description"       => esc_html__("You can enter a line height (Example: 20)", "fl-themes-helper"),
                        'group'             => 'Style Settings',
                    ),

                    array(
                        'type'              => 'fl_number',
                        "class"             => "",
                        'admin_label'       => true,
                        'heading'           => esc_html__('Letter Spacing', 'fl-themes-helper'),
                        'param_name'        => 'l_spacing',
                        'value'             => '',
                        'min'               => -999999,
                        'max'               => 999999,
                        'step'              => 0.1,
                        'suffix'            => 'px',
                        "description"       => esc_html__("You can enter letter spacing (Example: -0.25)", "fl-themes-helper"),
                        'group'             => 'Style Settings',
                    ),

                    array(
                        'type'              => 'colorpicker',
                        'heading'           => esc_html__('Text color', 'fl-themes-helper'),
                        'param_name'        => 'text_color',
                        'group'             => 'Style Settings',
                        'std'               => '',
                    ),




                    array(
                        'type'				=> 'fl_heading_param',
                        'text'				=> esc_html__('Custom Text Responsive Option', 'fl-themes-helper'),
                        'param_name'		=> 'title_responsive_headings',
                        'class'             => 'fl-responsive-text',
                        "group"             => "Responsive",
                        'description'       => __('
                                                 <i class="fa fa-laptop"></i> Desktop : Screen resolutions from 1199px to 991px<br>
                                                 <i class="fa fa-tablet"></i> Tablet : Screen resolutions from 991px to 767px<br>
                                                 <i class="fa fa-mobile"></i> Mobile : Screen resolutions less than 767px', 'fl-themes-helper'),
                    ),

                    array(
                        'type'              => 'fl_checkbox',
                        'class'             => '',
                        'heading'           => '',
                        'param_name'        => 'custom_responsive_option_text',
                        'value'             => 'off',
                        'description'       => __('"Checked" to enable custom responsive option to text', 'fl-themes-helper'),
                        'options' => array(
                            'on' => array(
                                'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                                'off'       => esc_attr__('No', 'fl-themes-helper'),
                            ),
                        ),
                        "group"             => "Responsive",
                    ),

                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Text Font Size", 'fl-themes-helper'),
                        "param_name"        => "text_font_size_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_text',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),

                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Text Line Height", 'fl-themes-helper'),
                        "param_name"        => "text_line_height_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_text',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),
                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Text Letter Spacing", 'fl-themes-helper'),
                        "param_name"        => "text_letter_spacing_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_text',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),



                ), fl_helping_get_animation_option(), fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
            ));
        }