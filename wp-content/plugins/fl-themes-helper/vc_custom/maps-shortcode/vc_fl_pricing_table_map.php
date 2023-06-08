<?php
    if (function_exists('vc_map')) {
        vc_map(array(
            'name' => esc_html__('Pricing Table', 'fl-themes-helper'),
            'base' => 'vc_fl_pricing_table',
            'icon' => 'fl-icon icon-fl-vc-icon',
            'as_parent' => array(
                'only' => 'vc_fl_pricing_row'
            ),
            'category' => esc_html__('Empelza', 'fl-themes-helper'),
            'weight' => 300,
            'controls' => 'full',
            'params' => array_merge(array(



                array(
                    'type'          => 'fl_radio_advanced',
                    'heading'       => esc_html__('Premium Pricing', 'fl-themes-helper'),
                    'param_name'    => 'premium_pricing',
                    'value'		    => '',
                    'admin_label'   => true,
                    'options' => array(
                        esc_html__('Enable', 'fl-themes-helper')                 => 'enable',
                        esc_html__('Disable', 'fl-themes-helper')                => '',
                    ),
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Title', 'fl-themes-helper'),
                    'param_name'    => 'title',
                    'std'           => 'STANDARD',
                    'admin_label'   => true,
                    'value'         => '',
                    'description'   => '',
                ),

                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Pricing Prefix', 'fl-themes-helper'),
                    'param_name'    => 'pricing_prefix',
                    'std'           => '$',
                    'value'         => '',
                    'description'   => '',
                ),

                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Pricing', 'fl-themes-helper'),
                    'param_name'    => 'pricing',
                    'admin_label'   => true,
                    'std'           => '29',
                    'value'         => '',
                    'description'   => '',
                ),

                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Pricing period', 'fl-themes-helper'),
                    'param_name'    => 'pricing_period',
                    'admin_label'   => true,
                    'std'           => '/ month',
                    'value'         => '',
                    'description'   => '',
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
                            'value'         => 'Dry after years have',
                            'description'   => '',
                            'admin_label'   => true
                        ),
                    ),
                ),

                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Button Text', 'fl-themes-helper'),
                    'param_name'    => 'btn_text',
                    'std'           => 'BUY NOW',
                    'admin_label'   => true,
                    'value'         => '',
                    'description'   => '',
                ),
                array(
                    'type'          => 'vc_link',
                    'heading'       => esc_html__('Button Link', 'fl-themes-helper'),
                    'param_name'    => 'link',
                ),
            ), fl_helping_get_animation_option(),fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
        ));


    }
