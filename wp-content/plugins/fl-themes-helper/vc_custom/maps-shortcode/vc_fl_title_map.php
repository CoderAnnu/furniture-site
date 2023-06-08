<?php

        if (function_exists('vc_map')) {
            vc_map(array(
                'name'          => esc_html__('Title', 'fl-themes-helper'),
                'base'          => 'vc_fl_title',
                'category' => esc_html__('Empelza', 'fl-themes-helper'),
                'weight'        => 90,
                'icon'          => 'fl-icon icon-fl-vc-icon',
                'controls'      => 'full',
                'params' => array_merge(array(
                    array(
                        'type'              => 'dropdown',
                        'heading'           => esc_html__('Title Style', 'fl-themes-helper'),
                        'param_name'        => 'title_style_text',
                        'value' => array(
                            esc_attr__("Style One", "fl-themes-helper")                 => "title_default",
                            esc_attr__("Style Two", "fl-themes-helper")                 => "custom-title",
                        ),
                        'std'               => 'title_style_one'
                    ),
                    array(
                        'type'              => 'fl_image_preview',
                        'param_name'        => 'fl_style_title_preview',
                        'std'               => 'title_default',
                        'value' => array(
                            esc_attr__("Style One", "fl-themes-helper")                 => "title_default",
                            esc_attr__("Style Two", "fl-themes-helper")                 => "custom-title",
                        ),
                    ),


                    array(
                        'type' => 'fl_radio_advanced',
                        'heading'           => esc_html__('Text align', 'fl-themes-helper'),
                        'param_name'        => 'title_text_align',
                        'value'		        => 'text-left',
                        'options' => array(
                            esc_attr__("Left", "fl-themes-helper")                  => "text-left",
                            esc_attr__("Center", "fl-themes-helper")                => "text-center",
                            esc_attr__("Right", "fl-themes-helper")                 => "text-right",
                        ),
                    ),

                    array(
                        'type'              => 'textarea_html',
                        'heading'           => esc_html__('Title', 'fl-themes-helper'),
                        'param_name'        => 'content',
                        'value'             => '',
                        'holder'            => 'div',
                        'std'               => 'Professional Team',
                    ),

                    array(
                        'type'          => 'textarea',
                        'heading'       => esc_html__('Subtitle Text', 'fl-themes-helper'),
                        'param_name'    => 'subtitle_text',
                        'value'         => '',
                        'admin_label'   => true,
                        'description'   => '',
                        'dependency'	=>
                            array(
                                  'element'     => 'title_style_text',
                                  'value'       => 'custom-title'
                            ),
                    ),
//Title Typography
                    array(
                        'type'				=> 'fl_heading_param',
                        'text'				=> esc_html__('Title Typography', 'fl-themes-helper'),
                        'param_name'		=> 'title_heading_vc',
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                    ),
                    array(
                        'type'              => 'fl_radio_advanced',
                        'heading'           => esc_html__('Title HTML Tag', 'fl-themes-helper'),
                        'param_name'        => 'title_html_tag',
                        'value'		        => 'h2',
                        'admin_label'       => true,
                        'options' => array(
                            esc_html__('Div', 'fl-themes-helper')                          => 'div',
                            esc_html__('H1', 'fl-themes-helper')                           => 'h1',
                            esc_html__('H2', 'fl-themes-helper')                           => 'h2',
                            esc_html__('H3', 'fl-themes-helper')                           => 'h3',
                            esc_html__('H4', 'fl-themes-helper')                           => 'h4',
                            esc_html__('H5', 'fl-themes-helper')                           => 'h5',
                            esc_html__('H6 ', 'fl-themes-helper')                          => 'h6',
                        ),
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                    ),
                    array(
                        'type'              => 'fl_radio_advanced',
                        'heading'           => esc_html__('Title Style Font', 'fl-themes-helper'),
                        'param_name'        => 'title_style_font_weight',
                        'value'		        => '',
                        'admin_label'       => true,
                        'options' => array(
                            esc_html__('Default', 'fl-themes-helper')                       => '',
                            esc_html__('Light Style', 'fl-themes-helper')                   => 'fl-text-light-style',
                            esc_html__('Regular Style', 'fl-themes-helper')                 => 'fl-text-regular-style',
                            esc_html__('Medium Style', 'fl-themes-helper')                  => 'fl-text-medium-style',
                            esc_html__('Bold Style', 'fl-themes-helper')                    => 'fl-text-bold-style',
                            esc_html__('Titles Style', 'fl-themes-helper')                  => 'fl-text-title-style',
                        ),
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                    ),
                    array(
                        'type'				=> 'fl_font_setting',
                        'heading'			=> '',
                        'param_name'		=> 'title_font_options',
                        'settings'				=> array(
                            'fields'				=> array(
                                'font_size',
                                'letter_spacing',
                                'line_height',
                                'font_style'
                            ),
                        ),
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                    ),
                    array(
                        'type'              => 'fl_number',
                        "heading"           => esc_html__("Title Margin top", "fl-themes-helper"),
                        "param_name"        => "title_mt",
                        'value'             => '',
                        'max'               => 999999,
                        'step'              => 1,
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                        'edit_field_class'  => 'vc_col-sm-6',
                        'suffix'            => 'px',
                    ),
                    array(
                        'type'              => 'fl_number',
                        "heading"           => esc_html__("Title Margin Bottom", "fl-themes-helper"),
                        "param_name"        => "title_mb",
                        'value'             => '',
                        'max'               => 999999,
                        'step'              => 1,
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                        'edit_field_class'  => 'vc_col-sm-6',
                        'suffix'            => 'px',
                    ),
                    array(
                        'type'              => 'colorpicker',
                        'heading'           => esc_html__('Title Color', 'fl-themes-helper'),
                        'param_name'        => 'title_color',
                        'std'               => '',
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                    ),
                    array(
                        'type'				=> 'fl_checkbox',
                        'heading'			=> esc_html__('Custom Title Font Family', 'fl-themes-helper'),
                        'param_name'		=> 'custom_title_google_fonts',
                        'options'			=> array(
                            'yes'				=> array(
                                'on'	=> 'Yes',
                                'off'	=> 'No',
                            ),
                        ),
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                    ),
                    array(
                        'type'				=> 'google_fonts',
                        'param_name'		=> 'title_custom_fonts',
                        'settings'			=> array(
                            'fields'			=> array(
                                'font_family_description'	=> esc_html__('Select font family.', 'fl-themes-helper'),
                                'font_style_description'	=> esc_html__('Select font style.', 'fl-themes-helper'),
                            ),
                        ),
                        'dependency'		=> array('element' => 'custom_title_google_fonts', 'value' => 'yes'),
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                    ),
// Subtitle Typography
                    array(
                        'type'				=> 'fl_heading_param',
                        'text'				=> esc_html__('Subtitle Typography', 'fl-themes-helper'),
                        'param_name'		=> 'title_heading_vc',
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                        'dependency'	=>
                            array(
                                'element'     => 'title_style_text',
                                'value'       => 'custom-title'
                            ),
                    ),
                    array(
                        'type'              => 'fl_radio_advanced',
                        'heading'           => esc_html__('Subtitle Style', 'fl-themes-helper'),
                        'param_name'        => 'subtitle_style',
                        'value'		        => 'subtitle-primary',
                        'dependency'	=>
                            array(
                                'element'     => 'title_style_text',
                                'value'       => 'custom-title'
                            ),
                        'options' => array(
                            esc_html__('Primary', 'fl-themes-helper')                   => 'subtitle-primary',
                            esc_html__('Secondary', 'fl-themes-helper')                 => 'subtitle-secondary',
                            esc_html__('Ternary', 'fl-themes-helper')                   => 'subtitle-ternary',
                            esc_html__('Custom Color', 'fl-themes-helper')              => 'subtitle-custom-color',
                        ),
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                    ),
                    array(
                        'type'              => 'colorpicker',
                        'heading'           => esc_html__('Subtitle Color', 'fl-themes-helper'),
                        'param_name'        => 'subtitle_color',
                        'std'               => '',
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                        'edit_field_class'  => 'vc_col-sm-6',
                        'dependency'	=>
                            array(
                                'element'     => 'subtitle_style',
                                'value'       => 'subtitle-custom-color'
                            ),
                    ),
                    array(
                        'type'              => 'colorpicker',
                        'heading'           => esc_html__('Subtitle Color Background', 'fl-themes-helper'),
                        'param_name'        => 'subtitle_color_bg',
                        'std'               => '',
                        'edit_field_class'  => 'vc_col-sm-6',
                        'dependency'	=>
                            array(
                                'element'     => 'subtitle_style',
                                'value'       => 'subtitle-custom-color'
                            ),
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                    ),
                    array(
                        'type'				=> 'fl_font_setting',
                        'heading'			=> '',
                        'param_name'		=> 'subtitle_font_options',
                        'settings'				=> array(
                            'fields'				=> array(
                                'font_size',
                                'letter_spacing',
                                'line_height',
                                'font_style'
                            ),
                        ),
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                        'dependency'	=>
                            array(
                                'element'     => 'title_style_text',
                                'value'       => 'custom-title'
                            ),
                    ),

                    array(
                        'type'              => 'fl_number',
                        "heading"           => esc_html__("Subtitle Margin top", "fl-themes-helper"),
                        "param_name"        => "subtitle_mt",
                        'value'             => '',
                        'max'               => 999999,
                        'step'              => 1,
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                        'edit_field_class'  => 'vc_col-sm-6',
                        'suffix'            => 'px',
                        'dependency'	=>
                            array(
                                'element'     => 'title_style_text',
                                'value'       => 'custom-title'
                            ),
                    ),
                    array(
                        'type'              => 'fl_number',
                        "heading"           => esc_html__("Subtitle Margin Bottom", "fl-themes-helper"),
                        "param_name"        => "subtitle_mb",
                        'value'             => '',
                        'max'               => 999999,
                        'step'              => 1,
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                        'edit_field_class'  => 'vc_col-sm-6',
                        'suffix'            => 'px',
                        'dependency'	=>
                            array(
                                'element'     => 'title_style_text',
                                'value'       => 'custom-title'
                            ),
                    ),

                    array(
                        'type'				=> 'fl_checkbox',
                        'heading'			=> esc_html__('Custom Subtitle Font Family', 'fl-themes-helper'),
                        'param_name'		=> 'custom_subtitle_google_fonts',
                        'options'			=> array(
                            'yes'				=> array(
                                'on'	=> 'Yes',
                                'off'	=> 'No',
                            ),
                        ),
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                        'dependency'	=>
                            array(
                                'element'     => 'title_style_text',
                                'value'       => 'custom-title'
                            ),
                    ),

                    array(
                        'type'				=> 'google_fonts',
                        'param_name'		=> 'subtitle_custom_fonts',
                        'settings'			=> array(
                            'fields'			=> array(
                                'font_family_description'	=> esc_html__('Select font family.', 'fl-themes-helper'),
                                'font_style_description'	=> esc_html__('Select font style.', 'fl-themes-helper'),
                            ),
                        ),
                        'dependency'		=> array('element' => 'custom_subtitle_google_fonts', 'value' => 'yes'),
                        'group'				=> esc_html__('Typography', 'fl-themes-helper'),
                    ),
// Start Responsive Option Title
                    array(
                        'type'				=> 'fl_heading_param',
                        'text'				=> esc_html__('Custom Title Responsive Option', 'fl-themes-helper'),
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
                        'param_name'        => 'custom_responsive_option_title',
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
                        "heading"           => esc_attr__("Title Font Size", 'fl-themes-helper'),
                        "param_name"        => "title_font_size_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_title',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),
                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Title Line Height", 'fl-themes-helper'),
                        "param_name"        => "title_line_height_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_title',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),
                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Title Letter Spacing", 'fl-themes-helper'),
                        "param_name"        => "title_letter_spacing_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_title',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),
                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Title Margin Top", 'fl-themes-helper'),
                        "param_name"        => "title_margin_top_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_title',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),
                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Title Margin Bottom", 'fl-themes-helper'),
                        "param_name"        => "title_margin_bottom_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_title',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),
// Start Responsive Option Subtitle
                    array(
                        'type'				=> 'fl_heading_param',
                        'text'				=> esc_html__('Custom Subtitle Responsive Option', 'fl-themes-helper'),
                        'param_name'		=> 'subtitle_responsive_headings',
                        'class'             => 'fl-responsive-text',
                        "group"             => "Responsive",
                        'description'       => __('
                                                 <i class="fa fa-laptop"></i> Desktop : Screen resolutions from 1199px to 991px<br>
                                                 <i class="fa fa-tablet"></i> Tablet : Screen resolutions from 991px to 767px<br>
                                                 <i class="fa fa-mobile"></i> Mobile : Screen resolutions less than 767px', 'fl-themes-helper'),
                        'dependency'	=>
                            array(
                                'element'     => 'title_style_text',
                                'value'       => 'custom-title'
                            ),
                    ),
                    array(
                        'type'              => 'fl_checkbox',
                        'class'             => '',
                        'heading'           => '',
                        'param_name'        => 'custom_responsive_option_subtitle',
                        'value'             => 'off',
                        'description'       => __('"Checked" to enable custom responsive option to text', 'fl-themes-helper'),
                        'options' => array(
                            'on' => array(
                                'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                                'off'       => esc_attr__('No', 'fl-themes-helper'),
                            ),
                        ),
                        "group"             => "Responsive",
                        'dependency'	=>
                            array(
                                'element'     => 'title_style_text',
                                'value'       => 'custom-title'
                            ),
                    ),
                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Subtitle Font Size", 'fl-themes-helper'),
                        "param_name"        => "subtitle_font_size_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_subtitle',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),
                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Subtitle Line Height", 'fl-themes-helper'),
                        "param_name"        => "subtitle_line_height_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_subtitle',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),
                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Subtitle Letter Spacing", 'fl-themes-helper'),
                        "param_name"        => "subtitle_letter_spacing_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_subtitle',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),
                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Subtitle Margin Top", 'fl-themes-helper'),
                        "param_name"        => "subtitle_margin_top_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_subtitle',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),
                    array(
                        "type"              => "fl_responsive_text",
                        "class"             => "",
                        "heading"           => esc_attr__("Subtitle Margin Bottom", 'fl-themes-helper'),
                        "param_name"        => "subtitle_margin_bottom_responsive",
                        "unit"              => "px",
                        "media" => array(
                            "Desktop"           => '',
                            "Tablet"            => '',
                            "Mobile"            => '',
                        ),
                        'dependency' => array(
                            'element'                    => 'custom_responsive_option_subtitle',
                            'value'                      => 'on'
                        ),
                        "group"             => "Responsive",
                    ),
                ), fl_helping_get_animation_option(), fl_helping_get_design_tab()),
            ));
        }