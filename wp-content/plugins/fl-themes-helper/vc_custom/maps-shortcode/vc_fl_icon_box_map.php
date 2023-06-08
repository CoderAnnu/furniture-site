<?php
    if (function_exists('vc_map')) {
        vc_map(array(
            'name' => esc_html__('Icon Box', 'fl-themes-helper'),
            'base' => 'vc_fl_icon_box',
            'icon' => 'fl-icon icon-fl-vc-icon',
            'controls' => 'full',
            'category' => esc_html__('Empelza', 'fl-themes-helper'),
            'weight' => 500,
            'params' => array_merge(array(
                array(
                    'type'              => 'dropdown',
                    'heading'           => esc_html__('Icon Box Style', 'fl-themes-helper'),
                    'param_name'        => 'icon_box_style',
                    'value' => array(
                        esc_attr__("Style One", "fl-themes-helper")                 => "icon-box-style-one",
                        esc_attr__("Style Two", "fl-themes-helper")                 => "icon-box-style-two",
                        esc_attr__("Style Three", "fl-themes-helper")               => "icon-box-style-three",
                        esc_attr__("Style Four", "fl-themes-helper")                => "icon-box-style-four",
                        esc_attr__("Style Five", "fl-themes-helper")                => "icon-box-style-five",
                    ),
                    'std'               => 'icon-box-style-one'
                ),
                array(
                    'type'              => 'fl_image_preview',
                    'param_name'        => 'fl_style_title_preview',
                    'value' => array(
                        esc_attr__("Style One", "fl-themes-helper")                 => "icon-box-style-one",
                        esc_attr__("Style Two", "fl-themes-helper")                 => "icon-box-style-two",
                        esc_attr__("Style Three", "fl-themes-helper")               => "icon-box-style-three",
                        esc_attr__("Style Four", "fl-themes-helper")                => "icon-box-style-four",
                        esc_attr__("Style Five", "fl-themes-helper")                => "icon-box-style-five",
                    ),
                    'std'               => 'icon-box-style-one'
                ),
                array(
                    'type'          => 'fl_radio_advanced',
                    'heading'       => esc_html__('Color Style', 'fl-themes-helper'),
                    'param_name'    => 'color_style',
                    'value'		    => 'primary-color-style',
                    'options' => array(
                        esc_html__('Primary', 'fl-themes-helper')               => 'primary-color-style',
                        esc_html__('Secondary', 'fl-themes-helper')             => 'secondary-color-style',
                        esc_html__('Ternary', 'fl-themes-helper')               => 'ternary-color-style',
                    ),
                ),
                array(
                    'type'          => 'fl_radio_advanced',
                    'heading'       => esc_html__('Style Button', 'fl-themes-helper'),
                    'param_name'    => 'btn_color_style',
                    'value'		    => '',
                    'options' => array(
                        esc_html__('Default', 'fl-themes-helper')               => '',
                        esc_html__('Colored', 'fl-themes-helper')               => 'colored-btn',
                    ),
                    'dependency' => array(
                        'element'                              => 'icon_box_style',
                        'value'                                => array(
                            'icon-box-style-one',
                            'icon-box-style-three'
                        ),
                    ),
                ),
                array(
                    "type"              => "textfield",
                    "heading"           => esc_html__("Title", 'fl-themes-helper'),
                    "param_name"        => "title",
                    "admin_label"       => true,
                    "value"             => "Smart Planing",
                ),
                array(
                    'type'              => 'textarea_html',
                    "heading"           => esc_html__("Content", "fl-themes-helper"),
                    'param_name'        => 'content',
                    'value'             => '',
                    'holder'            => 'div',
                    'std'               => 'Unde omnis iste natus error sit voluptal tem accusantium dolore lamque laudant.',
                    "description"       =>  esc_html__("Enter your text.", "fl-themes-helper"),
                ),
                array(
                    'type'          => 'vc_link',
                    'heading'       => esc_html__('Button Link', 'fl-themes-helper'),
                    'param_name'    => 'link',
                    'dependency' => array(
                        'element'                                           => 'icon_box_style',
                        'value_not_equal_to'                                => 'icon-box-style-four',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Icon library', 'fl-themes-helper'),
                    'value' => array(
                        esc_attr__('None', 'fl-themes-helper') => 'none',
                        esc_attr__('Font Awesome', 'fl-themes-helper') => 'fontawesome',
                        esc_attr__('Open Iconic', 'fl-themes-helper') => 'openiconic',
                        esc_attr__('Typicons', 'fl-themes-helper') => 'typicons',
                        esc_attr__('Entypo', 'fl-themes-helper') => 'entypo',
                        esc_attr__('Linecons', 'fl-themes-helper') => 'linecons',
                        esc_attr__('Etline', 'fl-themes-helper') => 'etline',
                        esc_attr__('Iconmoon', 'fl-themes-helper') => 'iconmoon',
                        esc_attr__('Linearicons', 'fl-themes-helper') => 'linearicons',
                        esc_attr__('Elusive', 'fl-themes-helper') => 'elusive',
                        esc_attr__('Iconic', 'fl-themes-helper') => 'iconic',
                        esc_attr__('Theme Custom Icon', 'fl-themes-helper') => 'flicon',

                    ),
                    'param_name' => 'icon_type',
                    'description' => esc_html__('Select icon library', 'fl-themes-helper'),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_fontawesome',
                    'settings' => array(
                        'emptyIcon' => false,
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'fontawesome'
                    ),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_openiconic',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'openiconic',
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'openiconic'
                    ),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_typicons',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'typicons',
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'typicons'
                    ),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_entypo',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'entypo',
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'entypo'
                    ),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_linecons',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'linecons',
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'linecons'
                    ),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_etline',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'etline',
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'etline'
                    ),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_iconmoon',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'iconmoon',
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'iconmoon'
                    ),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_linearicons',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'linearicons',
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'linearicons'
                    ),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_elusive',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'elusive',
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'elusive'
                    ),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_flaticon',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'flaticon',
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'flaticon'
                    ),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_flicon',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'flicon',
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'flicon'
                    ),
                    'group' => 'Icon'
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'fl-themes-helper'),
                    'param_name' => 'icon_iconic',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'iconic',
                        'iconsPerPage' => 300
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'iconic'
                    ),
                    'group' => 'Icon'
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
                    'type'              => 'colorpicker',
                    'param_name'        => 'cn_cl',
                    'heading'           => esc_html__('Content Color', 'fl-themes-helper'),
                    'group'				=> esc_html__('Color Setting', 'fl-themes-helper'),
                    'edit_field_class'  => 'vc_col-sm-4',
                    'dependency' => array(
                        'element'                   => 'custom_color',
                        'value'                     => 'enable',
                    ),
                    'std'               => ''
                ),
            ), fl_helping_get_animation_option(),fl_helping_get_animation_delay_option(), fl_helping_get_design_tab()),

        ));
    }