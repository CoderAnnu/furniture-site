<?php

if (function_exists('vc_map')) {
    vc_map(array(
        'name' => esc_html__('Google Map', 'fl-themes-helper'),
        'base' => 'vc_fl_google_map',
        'icon' => 'fl-icon icon-fl-vc-icon',
        'category' => esc_html__('Empelza', 'fl-themes-helper'),
        'controls' => 'full',
        'weight' => 500,
        'params' => array_merge(array(
            array(
                'type' => 'textfield',
                'param_name' => 'address',
                'heading' => esc_html__('Address', 'fl-themes-helper'),
                'admin_label' => true,
                'value' => 'New York',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Style', 'fl-themes-helper'),
                'param_name' => 'map_style',
                'std'       => 'map_default_style',
                'value' => array(
                    esc_html__('Default', 'fl-themes-helper')           => 'map_default_style',
                    esc_html__('Light coloured', 'fl-themes-helper')    => 'map_light_coloured',
                    esc_html__('Ultra Light', 'fl-themes-helper')       => 'map_ultra_light',
                    esc_html__('Light', 'fl-themes-helper')             => 'map_light',
                    esc_html__('Light Blue', 'fl-themes-helper')        => 'map_light_blue',
                    esc_html__('Grey Blue', 'fl-themes-helper')         => 'map_grey_blue',
                    esc_html__('Flat', 'fl-themes-helper')              => 'map_flat',
                    esc_html__('Pastel', 'fl-themes-helper')            => 'map_pastel',
                    esc_html__('Green', 'fl-themes-helper')             => 'map_green',
                    esc_html__('Blue', 'fl-themes-helper')              => 'map_blue',
                    esc_html__('Pale Dawn', 'fl-themes-helper')         => 'map_pale_dawn',
                    esc_html__('Dark', 'fl-themes-helper')              => 'map_dark',
                    esc_html__('Dark 2', 'fl-themes-helper')            => 'map_dark2',
                    esc_html__('Map Trendsetter', 'fl-themes-helper')   => 'map_trendsetter',

                ),
                'group' => 'Style'
            ),

            array(
                'type'          => 'fl_image_preview',
                'param_name'    => 'fl_preview_image',
                'std'           => 'map_default_style',
                'value' => array(
                    esc_html__('Default', 'fl-themes-helper')           => 'map_default_style',
                    esc_html__('Light coloured', 'fl-themes-helper')    => 'map_light_coloured',
                    esc_html__('Ultra Light', 'fl-themes-helper')       => 'map_ultra_light',
                    esc_html__('Light', 'fl-themes-helper')             => 'map_light',
                    esc_html__('Light Blue', 'fl-themes-helper')        => 'map_light_blue',
                    esc_html__('Grey Blue', 'fl-themes-helper')         => 'map_grey_blue',
                    esc_html__('Flat', 'fl-themes-helper')              => 'map_flat',
                    esc_html__('Pastel', 'fl-themes-helper')            => 'map_pastel',
                    esc_html__('Green', 'fl-themes-helper')             => 'map_green',
                    esc_html__('Blue', 'fl-themes-helper')              => 'map_blue',
                    esc_html__('Pale Dawn', 'fl-themes-helper')         => 'map_pale_dawn',
                    esc_html__('Dark', 'fl-themes-helper')              => 'map_dark',
                    esc_html__('Dark 2', 'fl-themes-helper')            => 'map_dark2',
                    esc_html__('Map Trendsetter', 'fl-themes-helper')   => 'map_trendsetter',
                ),
                'group' => 'Style'
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Map Zoom', 'fl-themes-helper'),
                'param_name' => 'zoom',
                'admin_label' => true,
                'value' => array(
                    1,
                    2,
                    3,
                    4,
                    5,
                    6,
                    7,
                    8,
                    9,
                    10,
                    11,
                    12,
                    13,
                    14,
                    15,
                    16,
                    17,
                    18,
                    19,
                    20
                ),
                'std' => 14,
                'group' => 'Style'
            ),
            array(
                'type'          => 'fl_number',
                'heading'       => esc_html__('Map Height', 'fl-themes-helper'),
                'param_name'    => 'size',
                'value'         => 400,
                'min'           => 0,
                'max'           => 999999,
                'step'          => 1,
                'suffix'        => 'px',
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Map Marker', 'fl-themes-helper'),
                'param_name' => 'map_img',
                'value' => '',
                'group' => 'Style'
            ),

            array(
                'type'          => 'fl_checkbox',
                'class'         => '',
                'heading'       => esc_html__('Scrollwheel Zoom', 'fl-themes-helper'),
                'param_name'    => 'map_scrollwheel',
                'value'         => 'false',
                'options' => array(
                    'true' => array(
                        'true'        => esc_attr__('True', 'fl-themes-helper'),
                        'false'       => esc_attr__('False', 'fl-themes-helper'),
                    ),
                ),
                'description'   => '"Checked" to enable Scrollwheel Zoom in map',
                'group' => 'Style'
            ),
        ), fl_helping_get_animation_option(),fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),
    ));
}
