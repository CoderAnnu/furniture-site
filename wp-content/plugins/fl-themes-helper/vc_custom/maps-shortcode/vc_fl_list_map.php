<?php
    if (function_exists('vc_map')) {
        vc_map(array(
            'name' => esc_html__('Text List', 'fl-themes-helper'),
            'base' => 'vc_fl_text_list',
            'icon' => 'fl-icon icon-fl-vc-icon',
            "category" => esc_html__('Empelza', 'fl-themes-helper'),
            'weight' => 900,
            'controls' => 'full',
            'params' => array_merge(array(
                array(
                    'type'              => 'fl_radio_advanced',
                    'heading'           => esc_html__('List Style', 'fl-themes-helper'),
                    'param_name'        => 'list_style',
                    'value'		        => 'style-one',
                    'options' => array(
                        esc_attr__("Style One", "fl-themes-helper")                     => "style-one",
                        esc_attr__("Style Two", "fl-themes-helper")                     => "style-two",
                        esc_attr__("Style Three", "fl-themes-helper")                   => "style-three",
                    ),
                ),
                array(
                    'type'				=> 'param_group',
                    'heading'			=> esc_html__('List Content', 'fl-themes-helper'),
                    'param_name'		=> 'list_fields',
                    'params'			=> array(
                        array(
                            'type'          => 'textarea',
                            'heading'       => esc_html__('Text Content', 'fl-themes-helper'),
                            'param_name'    => 'text_content',
                            'value'         => 'Ipsa quae ab illo inventore veritatis quas',
                            'description'   => '',
                            'admin_label'   => true
                        ),
                    ),
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
                    'param_name'        => 'i_cl',
                    'heading'           => esc_html__('Icon Color', 'fl-themes-helper'),
                    'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                    'edit_field_class'  => 'vc_col-sm-6',
                    'dependency' => array(
                        'element'                   => 'custom_color',
                        'value'                     => 'enable',
                    ),
                    'std'               => ''
                ),
                array(
                    'type'              => 'colorpicker',
                    'param_name'        => 'text_cl',
                    'heading'           => esc_html__('Text Color', 'fl-themes-helper'),
                    'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                    'edit_field_class'  => 'vc_col-sm-6',
                    'dependency' => array(
                        'element'                   => 'custom_color',
                        'value'                     => 'enable',
                    ),
                    'std'               => ''
                ),

            ), fl_helping_get_animation_option(),fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
        ));
    }