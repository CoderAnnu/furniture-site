<?php

        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Partner', 'fl-themes-helper'),
                'base' => 'vc_fl_partner',
                'category' => esc_html__('Empelza', 'fl-themes-helper'),
                'icon' => 'fl-icon icon-fl-vc-icon',
                'controls' => 'full',
                'weight' => 80,
                'params' => array_merge(array(
                    array(
                        'type'				=> 'param_group',
                        'heading'			=> esc_html__('Layers of Partner', 'fl-themes-helper'),
                        'param_name'		=> 'list_fields_partner',
                        'params'			=> array(
                            array(
                                'type'			=> 'attach_image',
                                'heading'		=> esc_html__('Upload Partner Image:', 'fl-themes-helper'),
                                'param_name'	=> 'image_id',
                            ),
                            array(
                                'type'			=> 'attach_image',
                                'heading'		=> esc_html__('Upload Partner Hover Image:', 'fl-themes-helper'),
                                'param_name'	=> 'image_hover_id',
                            ),
                            array(
                                'type'          => 'textfield',
                                'heading'       => esc_html__('Partner Link', 'fl-themes-helper'),
                                'param_name'    => 'link',
                                'value'         => '#',
                                'description'   => '',
                                'admin_label'   => true
                            ),
                        ),
                    ),

                ), fl_helping_get_animation_option(), fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
            ));
        }