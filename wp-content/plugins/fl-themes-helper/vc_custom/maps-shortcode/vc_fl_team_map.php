<?php
    if (function_exists('vc_map')) {
        vc_map(array(
            'name' => esc_html__('Team', 'fl-themes-helper'),
            'base' => 'vc_fl_team',
            'icon' => 'fl-icon icon-fl-vc-icon',
            'category' => esc_html__('Empelza', 'fl-themes-helper'),
            'controls' => 'full',
            'params' => array_merge(array(
                array(
                    'type'              => 'dropdown',
                    'heading'           => esc_html__('Team Style', 'fl-themes-helper'),
                    'param_name'        => 'team_style',
                    'value' => array(
                        esc_attr__("Style One", "fl-themes-helper")                     => "team-style-one",
                        esc_attr__("Style Two", "fl-themes-helper")                     => "team-style-two",
                    ),
                    'std'               => 'team-style-one'
                ),
                array(
                    'type'              => 'fl_image_preview',
                    'param_name'        => 'fl_style_title_preview',
                    'value' => array(
                        esc_attr__("Style One", "fl-themes-helper")                     => "team-style-one",
                        esc_attr__("Style Two", "fl-themes-helper")                     => "team-style-two",
                    ),
                    'std'               => 'team-style-one'
                ),
                array(
                    'type'				=> 'attach_image',
                    'heading'			=> esc_html__('Team Image','fl-themes-helper'),
                    'param_name'		=> 'image_id',
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Name', 'fl-themes-helper'),
                    'param_name'    => 'name',
                    'value'         => 'Alexander Rayan',
                    'description'   => '',
                    'admin_label'   => true
                ),
                array(
                    'type'          => 'textarea',
                    'heading'       => esc_html__('Description', 'fl-themes-helper'),
                    'param_name'    => 'description',
                    'value'         => '',
                    'description'   => '',
                    'dependency' => array(
                        'element'                   => 'team_style',
                        'value'                     => 'team-style-one',
                    ),
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Phone Number', 'fl-themes-helper'),
                    'param_name'    => 'phone_number',
                    'value'         => '(123) 456 7890',
                    'description'   => '',
                    'dependency' => array(
                        'element'                   => 'team_style',
                        'value'                     => 'team-style-one',
                    ),
                ),

                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Profession', 'fl-themes-helper'),
                    'param_name'    => 'profession',
                    'value'         => 'Wrap Stylist',
                    'description'   => '',
                    'admin_label'   => true
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Twitter Link', 'fl-themes-helper'),
                    'param_name'    => 'tw',
                    'value'         => '#',
                    'description'   => '',
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Facebook', 'fl-themes-helper'),
                    'param_name'    => 'fb',
                    'value'         => '#',
                    'description'   => '',
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Behance', 'fl-themes-helper'),
                    'param_name'    => 'bh',
                    'value'         => '#',
                    'description'   => '',
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Instagram', 'fl-themes-helper'),
                    'param_name'    => 'in',
                    'value'         => '#',
                    'description'   => '',
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Google +', 'fl-themes-helper'),
                    'param_name'    => 'gl',
                    'value'         => '',
                    'description'   => '',
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Youtube', 'fl-themes-helper'),
                    'param_name'    => 'yt',
                    'value'         => '',
                    'description'   => '',
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
                    'param_name'        => 'name_cl',
                    'heading'           => esc_html__('Name Color', 'fl-themes-helper'),
                    'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),

                    'dependency' => array(
                        'element'                   => 'custom_color',
                        'value'                     => 'enable',
                    ),
                    'std'               => ''
                ),
                array(
                    'type'              => 'colorpicker',
                    'param_name'        => 'profession_cl',
                    'heading'           => esc_html__('Profession Color', 'fl-themes-helper'),
                    'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),

                    'dependency' => array(
                        'element'                   => 'custom_color',
                        'value'                     => 'enable',
                    ),
                    'std'               => ''
                ),
                array(
                    'type'              => 'colorpicker',
                    'param_name'        => 'soc_i_cl',
                    'heading'           => esc_html__('Social Icon Color', 'fl-themes-helper'),
                    'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),

                    'dependency' => array(
                        'element'                   => 'custom_color',
                        'value'                     => 'enable',
                    ),
                    'std'               => ''
                ),
                array(
                    'type'              => 'colorpicker',
                    'param_name'        => 'dots_cl',
                    'heading'           => esc_html__('Dots Color', 'fl-themes-helper'),
                    'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),

                    'dependency' => array(
                        'element'                   => 'custom_color',
                        'value'                     => 'enable',
                    ),
                    'std'               => ''
                ),
                array(
                    'type'              => 'colorpicker',
                    'param_name'        => 'dots_active_cl',
                    'heading'           => esc_html__('Dots active and hover Color', 'fl-themes-helper'),
                    'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),

                    'dependency' => array(
                        'element'                   => 'custom_color',
                        'value'                     => 'enable',
                    ),
                    'std'               => ''
                ),

            ), fl_helping_get_animation_option(),fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
        ));
    }