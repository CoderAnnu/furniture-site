<?php
            if (function_exists('vc_map')) {
                vc_map(array(
                        "name" => esc_html__("Preview Typography Item", 'fl-themes-helper'),
                        "base" => "vc_fl_preview_typography_item",
                        "class" => "",
                        "controls" => "full",
                        'icon' => 'fl-icon icon-fl-vc-icon',
                        "category" => esc_html__('Empelza', 'fl-themes-helper'),
                        'weight' => 900,
                        "params" => array_merge(array(
                            array(
                                'type' => 'fl_radio_advanced',
                                'heading' => esc_html__('Button align', 'fl-themes-helper'),
                                'param_name' => 'preview_item',
                                'value' => 'pagination',
                                'options' => array(
                                    esc_attr__("Pagination", "fl-themes-helper") => "pagination",
                                    esc_attr__("Blockquote", "fl-themes-helper") => "blockquote",
                                ),
                            ),
                            array(
                                'type'          => 'textarea',
                                'heading'       => esc_html__('Text Content', 'fl-themes-helper'),
                                'param_name'    => 'text_content',
                                'value'         => 'We Convert Digital Brands Into The Profitable Amazing Products Beneth The Sky.',
                                'description'   => '',
                                'dependency' => array(
                                    'element'                   => 'preview_item',
                                    'value'                     => 'blockquote',
                                ),
                            ),


                        ), fl_helping_get_animation_option(), fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
                    )
                );
            }