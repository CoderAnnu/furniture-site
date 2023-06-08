<?php
acf_add_local_field_group(array(
    'key'                           => 'group_page_upvGGSaL4ghCx',
    'title'                         => esc_attr__('Page Options','empelza'),
    'fields' => array(

        /*-------------------------------------------------------------------
        ==  Navigator
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_CbwPgNeA2rSvG',
            'label'                 => '<i class="fa fa-bars" aria-hidden="true"></i> '.esc_attr__('Navigator','empelza'),
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'         => '',
                'class'         => '',
                'id'            => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),
        array(
            'key'                   => 'field_5e846357741f2',
            'label'                 => esc_attr__('Page Navigator','empelza'),
            'name'                  => 'page_navigator_custom_style',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'custom' => esc_attr__('Custom','empelza'),
                'default' => esc_attr__('Default','empelza'),
            ),
            'allow_null' => 0,
            'default_value' => 'default',
            'layout' => 'horizontal',
            'return_format' => 'value',
        ),
        array(
            'key'                   => 'field_LV8S9IgEyazXw',
            'label'                 => esc_attr__('Menu','empelza'),
            'name'                  => 'nav_enable_option',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_5e846357741f2',
                        'operator'                              => '==',
                        'value'                                 => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'enable' => esc_attr__('Enable','empelza'),
                'disable' => esc_attr__('Disable','empelza'),
            ),
            'allow_null' => 0,
            'default_value' => 'enable',
            'layout' => 'horizontal',
            'return_format' => 'value',
        ),
        array(
            'key'                   => 'field_R2o70RUO8zHEq',
            'label'                 => esc_attr__('Menu Style','empelza'),
            'name'                  => 'nav_style',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_5e846357741f2',
                        'operator'                              => '==',
                        'value'                                 => 'custom',
                    ),
                    array (
                        'field'                                 => 'field_LV8S9IgEyazXw',
                        'operator'                              => '==',
                        'value'                                 => 'enable',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'absolute' => esc_attr__('Absolute','empelza'),
                'relative' => esc_attr__('Relative With Top Sidebar','empelza'),
            ),
            'allow_null' => 0,
            'default_value' => 'light',
            'layout' => 'horizontal',
            'return_format' => 'value',
        ),
        array(
            'key'                   => 'field_qbV1zHsCt4fpf',
            'label'                 => esc_attr__('Color','empelza'),
            'name'                  => 'menu_color',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_5e846357741f2',
                        'operator'                              => '==',
                        'value'                                 => 'custom',
                    ),
                    array (
                        'field'                                 => 'field_R2o70RUO8zHEq',
                        'operator'                              => '==',
                        'value'                                 => 'absolute',
                    ),
                    array (
                        'field'                                 => 'field_LV8S9IgEyazXw',
                        'operator'                              => '==',
                        'value'                                 => 'enable',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'light' => esc_attr__('Light','empelza'),
                'dark' => esc_attr__('Dark','empelza'),
            ),
            'allow_null' => 0,
            'default_value' => 'light',
            'layout' => 'horizontal',
            'return_format' => 'value',
        ),
        /*-------------------------------------------------------------------
        ==  Header
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_ksJukLyKEZuUz',
            'label'                 => '<i class="fa fa-header" aria-hidden="true"></i> '.esc_attr__('Header','empelza'),
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'         => '',
                'class'         => '',
                'id'            => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),
        array(
            'key'                   => 'field_vvPA09dYwcmHM',
            'label'                 => esc_attr__('Custom','empelza'),
            'name'                  => 'page_header_custom_style',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'standard'                                 => esc_attr__('Default Header','empelza'),
                'custom'                                   => esc_attr__('Custom Header','empelza'),
            ),
            'default_value' => array(
                0                                       => 'false',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_YepuwtJZo8j7Gcpage',
            'label'                 => esc_attr__('Custom Header','empelza'),
            'name'                  => 'page_header',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_vvPA09dYwcmHM',
                        'operator'                              => '==',
                        'value'                                 => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'custom'                                => esc_attr__('Enable Header','empelza'),
                'disable'                               => esc_attr__('Disable Header','empelza'),
            ),
            'default_value'         => array(),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_2VkpPZKnyztLF',
            'label'                 => esc_attr__('Pre title','empelza'),
            'name'                  => 'page_header_pre_title',
            'type'                  => 'text',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices'               => array(),
            'default_value'         => '',
            'layout'                => 'vertical',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_wtUSajd9AIV0v',
            'label'                 => esc_attr__('Title Header Enable Disable Function','empelza'),
            'name'                  => 'page_header_title_enable_function',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'disable'                                 => esc_attr__('Disable','empelza'),
                'enable'                                  => esc_attr__('Enable','empelza'),
            ),
            'default_value' => array(
                0                                       => 'enable',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_JzIMUeRq6lN2b',
            'label'                 => esc_attr__('Custom Title','empelza'),
            'name'                  => 'page_custom_title',
            'type'                  => 'textarea',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_wtUSajd9AIV0v',
                        'operator'                               => '==',
                        'value'                                  => 'enable',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices'               => array(),
            'default_value'         => '',
            'layout'                => 'vertical',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_eIR2NQW2SYnhd',
            'label'                 => esc_attr__('Title Description','empelza'),
            'name'                  => 'page_title_description',
            'type'                  => 'textarea',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices'               => array(),
            'default_value'         => '',
            'layout'                => 'vertical',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key' => 'field_8GQkZJ1A9E0WS',
            'label' => esc_attr__('Content Header Scroll Opacity','empelza'),
            'name' => 'page_header_opacity_scroll',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'disable'                    => esc_attr__('Disable','empelza'),
                'enable'                     => esc_attr__('Enable','empelza'),
            ),
            'default_value' => array(
                0 => 'disable',
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
        ),
        array(
            'key'                   => 'field_Zukae6WF0AoBjpage',
            'label'                 => esc_attr__('Background Image','empelza'),
            'name'                  => 'page_header_img',
            'type'                  => 'image',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'return_format'         => 'url',
            'preview_size'          => 'full',
            'library'               => 'all',
            'min_width'             => '',
            'min_height'            => '',
            'min_size'              => '',
            'max_width'             => '',
            'max_height'            => '',
            'max_size'              => '',
            'mime_types'            => '',
        ),
        array(
            'key'                   => 'field_WZSCLt8QT9DB4',
            'label'                 => esc_attr__('Image Hover Decor','empelza'),
            'name'                  => 'page_parallax_hover_img',
            'type'                  => 'image',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'return_format'         => 'url',
            'preview_size'          => 'full',
            'library'               => 'all',
            'min_width'             => '',
            'min_height'            => '',
            'min_size'              => '',
            'max_width'             => '',
            'max_height'            => '',
            'max_size'              => '',
            'mime_types'            => '',
        ),
        array(
            'key'                   => 'field_Y9L3xdgu9GE69',
            'label'                 => esc_attr__('Background Mask Style','empelza'),
            'name'                  => 'page_header_mask_style_bg',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'disable'                    => esc_attr__('Disable','empelza'),
                'blue-gradient'              => esc_attr__('Blue Gradient','empelza'),
                'purple'                     => esc_attr__('Purple','empelza'),
                'custom'                     => esc_attr__('Custom','empelza'),
            ),
            'default_value' => array(
                0 => 'disable',
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
        ),
        /*-------------------------------------------------------------------
        ==  Content
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_z4kBpI17d6NE5',
            'label'                 => '<span class="dashicons dashicons-align-center"></span> '.esc_attr__('Content','empelza'),
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),
        array(
            'key'                   => 'field_OZCyA9okaxJjPcpage',
            'label'                 => esc_attr__('Custom Content','empelza'),
            'name'                  => 'page_container_custom',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'false'                                 => esc_attr__('Default Content','empelza'),
                'true'                                  => esc_attr__('Custom Content','empelza'),
            ),
            'default_value' => array(
                0                                       => 'false',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_fluQVq4jLlo8Icpage',
            'label'                 => esc_attr__('Padding Top','empelza'),
            'name'                  => 'page_padding_top',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_OZCyA9okaxJjPcpage',
                        'operator'                              => '==',
                        'value'                                 => 'true',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'true'                                  => esc_attr__('Enable','empelza'),
                'false'                                 => esc_attr__('Disable','empelza'),
            ),
            'default_value' => array(
                1                                       => 'text_center',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_g4eDLjEvFEImLcpage',
            'label'                 => esc_attr__('Padding bottom','empelza'),
            'name'                  => 'page_padding_bottom',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_OZCyA9okaxJjPcpage',
                        'operator'                              => '==',
                        'value'                                 => 'true',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'true'                                  => esc_attr__('Enable','empelza'),
                'false'                                 => esc_attr__('Disable','empelza'),
            ),
            'default_value' => array(
                0                                       => 'true',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        /*-------------------------------------------------------------------
        ==  Footer
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_Rr58c6z3q9HCp',
            'label'                 => '<i class="fa fa-copyright" aria-hidden="true"></i> '.esc_attr__('Footer','empelza'),
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'         => '',
                'class'         => '',
                'id'            => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),
        array(
            'key'                   => 'field_PTz3ks4IBeIsX',
            'label'                 => esc_attr__('Custom Footer','empelza'),
            'name'                  => 'custom_footer',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'false'                                 => esc_attr__('Default Footer','empelza'),
                'true'                                  => esc_attr__('Custom Footer','empelza'),
            ),
            'default_value' => array(
                0                                       => 'false',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_5YoFJKk53MGmP',
            'label'                 => esc_attr__('Footer','empelza'),
            'name'                  => 'footer_style',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_PTz3ks4IBeIsX',
                        'operator'                              => '==',
                        'value'                                 => 'true',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'enable'                                 => esc_attr__('Enable','empelza'),
                'disable'                                => esc_attr__('Disable','empelza'),
            ),
            'default_value' => array(
                0                                       => 'enable',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
    ),
    'location' => array(
        array(
            array(
                'param'                 => 'page_template',
                'operator'              => '==',
                'value'                 => 'default',
            ),
        ),
        array(
            array(
                'param'                 => 'post_template',
                'operator'              => '==',
                'value'                 => 'template-blog.php',
            ),
        ),
    ),
    'menu_order'                    => 0,
    'position'                      => 'normal',
    'style'                         => 'default',
    'label_placement'               => 'top',
    'instruction_placement'         => 'label',
    'hide_on_screen'                => '',
    'active'                        => true,
    'description'                   => '',
));