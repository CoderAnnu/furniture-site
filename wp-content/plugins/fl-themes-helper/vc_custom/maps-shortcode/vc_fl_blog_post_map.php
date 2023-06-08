<?php
        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Home Page Blog Posts', 'fl-themes-helper'),
                'base' => 'vc_fl_blog_posts',
                'category' => esc_html__('Empelza', 'fl-themes-helper'),
                'icon' => 'fl-icon icon-fl-vc-icon',
                'controls' => 'full',
                'weight' => 900,
                'params' => array_merge(
                    array(
                        array(
                            'type'              => 'fl_number',
                            "heading"           => esc_html__("Post Count", "fl-themes-helper"),
                            "param_name"        => "count_post",
                            'value'             => '3',
                            'max'               => 999999,
                            'step'              => 1,
                        ),
                    ),
                    fl_helping_get_animation_option(),fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),

            ));
        }

