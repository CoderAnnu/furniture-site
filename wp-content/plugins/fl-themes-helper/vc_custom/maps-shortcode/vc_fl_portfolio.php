<?php

        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Portfolio', 'fl-themes-helper'),
                'base' => 'vc_fl_portfolio',
                'icon' => 'fl-icon icon-fl-vc-icon',
                'wrapper_class' => 'clearfix',
                'category' => esc_html__('Empelza', 'fl-themes-helper'),
                'controls' => 'full',
                'weight' => 100,
                'params' => array_merge(array(

                    array(
                        'type'          => 'fl_number',
                        'heading'       => esc_html__('Portfolio Post In Page', 'fl-themes-helper'),
                        'param_name'    => 'post_per_page',
                        'value'         => 5,
                        'min'           => -1,
                        'max'           => 999999,
                        'step'          => 1,
                        'description'   => esc_html__('If you want display all post please enter -1 in the field on top', 'fl-themes-helper')
                    ),
                    array(
                        'type'              => 'fl_radio_advanced',
                        'heading'           => esc_html__('Filter', 'fl-themes-helper'),
                        'param_name'        => 'filter',
                        'value'		        => 'enable',
                        'options' => array(
                            esc_attr__("Enable", "fl-themes-helper")                    => "enable",
                            esc_attr__("disable", "fl-themes-helper")                   => "disable",
                        ),
                    ),

                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('First Filter Text Button', 'fl-themes-helper'),
                        'param_name'    => 'first_btn_text',
                        'value'         => 'All Works',
                        'description'   => '',
                        'dependency' => array(
                            'element'                    => 'filter',
                            'value'                      => 'enable'
                        ),
                    ),

                    array(
                        'type'              => 'dropdown',
                        'heading'           => esc_html__('Title Style', 'fl-themes-helper'),
                        'param_name'        => 'portfolio_style',
                        'value' => array(
                            esc_attr__("Style Grid Three Column", "fl-themes-helper")                   => "portfolio-grid-three-column",
                            esc_attr__("Style Grid Four Column", "fl-themes-helper")                    => "portfolio-grid-four-column",
                            esc_attr__("Style Masonry", "fl-themes-helper")                             => "portfolio-masonry-style",
                        ),
                        'std'               => 'portfolio-grid-three-column'
                    ),
                    array(
                        'type'              => 'fl_image_preview',
                        'param_name'        => 'fl_style_title_preview',
                        'value' => array(
                            esc_attr__("Style Grid Three Column", "fl-themes-helper")                   => "portfolio-grid-three-column",
                            esc_attr__("Style Grid Four Column", "fl-themes-helper")                    => "portfolio-grid-four-column",
                            esc_attr__("Style Masonry", "fl-themes-helper")                             => "portfolio-masonry-style",
                        ),
                        'std'               => 'portfolio-grid-three-column'
                    ),

                    array(
                        'type'              => 'fl_radio_advanced',
                        'heading'           => esc_html__('Load More Button', 'fl-themes-helper'),
                        'param_name'        => 'load_more_btn',
                        'value'		        => 'disable',
                        'options' => array(
                            esc_attr__("Enable", "fl-themes-helper")                    => "enable",
                            esc_attr__("disable", "fl-themes-helper")                   => "disable",
                        ),
                    ),
                    array(
                        'type'              => 'fl_radio_advanced',
                        'heading'           => esc_html__('Button Display Align', 'fl-themes-helper'),
                        'param_name'        => 'btn_align',
                        'value'		        => 'center',
                        'options' => array(
                            esc_attr__("Center", "fl-themes-helper")                    => "center",
                            esc_attr__("Left", "fl-themes-helper")                      => "left",
                            esc_attr__("Right", "fl-themes-helper")                     => "right",
                        ),
                        'dependency' => array(
                            'element'                    => 'load_more_btn',
                            'value'                      => 'enable'
                        ),
                    ),
                    array(
                        'type'          => 'fl_radio_advanced',
                        'heading'       => esc_html__('Button Style', 'fl-themes-helper'),
                        'param_name'    => 'btn_color_style',
                        'value'		    => 'primary',
                        'options' => array(
                            esc_html__('Primary', 'fl-themes-helper')               => 'primary',
                            esc_html__('Secondary', 'fl-themes-helper')             => 'secondary',
                            esc_html__('Ternary', 'fl-themes-helper')               => 'ternary',
                        ),
                        'dependency' => array(
                            'element'                    => 'load_more_btn',
                            'value'                      => 'enable'
                        ),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Load More Text', 'fl-themes-helper'),
                        'param_name'    => 'btn_text',
                        'value'         => 'Load More',
                        'description'   => '',
                        'dependency' => array(
                            'element'                    => 'load_more_btn',
                            'value'                      => 'enable'
                        ),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Load More Loading Text', 'fl-themes-helper'),
                        'param_name'    => 'btn_text_loading',
                        'value'         => 'Loading ...',
                        'description'   => '',
                        'dependency' => array(
                            'element'                    => 'load_more_btn',
                            'value'                      => 'enable'
                        ),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Load More Last Text', 'fl-themes-helper'),
                        'param_name'    => 'btn_text_end',
                        'value'         => 'All Works Is Loading',
                        'description'   => '',
                        'dependency' => array(
                            'element'                    => 'load_more_btn',
                            'value'                      => 'enable'
                        ),
                    ),

                ), fl_helping_get_animation_option(), fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
            ));
        }