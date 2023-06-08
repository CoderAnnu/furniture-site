<?php
acf_add_local_field_group(array(
    'key'                           => 'group_page_6y12l25e0958f',
    'title'                         => esc_attr__('Page Options','empelza'),
    'fields' => array(
        /*-------------------------------------------------------------------
                ==  Breadcrumbs
                -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_DJ68mHh6E9Q1Fs',
            'label'                 => '<span class="dashicons dashicons-admin-post"></span>'.esc_attr__('Post Setting','empelza'),
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),
        array(
            'key' => 'field_5d090f4554479',
            'label' => esc_attr__('Style Single Blog Page','empelza'),
            'name' => 'post_style',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'one' => esc_attr__('Style One','empelza'),
                'two' =>  esc_attr__('Style Two','empelza'),
            ),
            'default_value' => array(
                0 => 'one',
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
        ),
        array(
            'key' => 'field_5d091a109ad89',
            'label' => esc_attr__( 'Background Holder','empelza'),
            'name' => 'background_holder',
            'type' => 'image',
            'instructions' => esc_attr__('Recommended image size 1920 x 350 px','empelza'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'full',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
        array(
            'key' => 'field_5d091b6e8e4ea',
            'label' => esc_attr__( 'Background Holder Decor Image','empelza'),
            'name' => 'background_holder_decore_image',
            'type' => 'image',
            'instructions' => esc_attr__('Recommended image size 1920 x 150 px','empelza'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'full',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
        /*-------------------------------------------------------------------
        ==  Breadcrumbs
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_EufZcwFr0a9XCb',
            'label'                 => '<span class="dashicons dashicons-arrow-right-alt2"></span> '.esc_attr__('Breadcrumbs','empelza'),
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),
        array(
            'key'                   => 'field_b0Pif7a4tfnFVX',
            'label'                 => esc_attr__( 'Breadcrumbs','empelza'),
            'name'                  => 'post_single_breadcrumbs',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'choices' => array(
                'standard'                              => esc_attr__('Default','empelza'),
                'custom'                                => esc_attr__('Custom','empelza'),
            ),
            'default_value'         => 'standard',
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_gBHTzjdCzo6r3R',
            'label'                 => esc_attr__( 'Breadcrumbs','empelza'),
            'name'                  => 'post_single_breadcrumb',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                             => 'field_b0Pif7a4tfnFVX',
                        'operator'                          => '==',
                        'value'                             => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'choices' => array(
                'enable'                            => esc_attr__('Enable','empelza'),
                'disable'                           => esc_attr__('Disable','empelza'),
            ),
            'default_value' => array(
                0                                   => 'enable',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),

        /*-------------------------------------------------------------------
        ==  Header
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_4oN1Ql1Z0ATq27',
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
            'key'                   => 'field_j5u8G8Nc3fXERQ',
            'label'                 => esc_attr__( 'Custom','empelza'),
            'name'                  => 'post_single_header_custom_style',
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
            'key'                   => 'field_x9sSoBmIcXWc4t',
            'label'                 => esc_attr__('Custom Header','empelza'),
            'name'                  => 'post_single_header',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_j5u8G8Nc3fXERQ',
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
            'key'                   => 'field_PManUGGkk90IR2',
            'label'                 => esc_attr__('Pre title','empelza'),
            'name'                  => 'post_single_header_pre_title',
            'type'                  => 'text',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_x9sSoBmIcXWc4t',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_j5u8G8Nc3fXERQ',
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
            'key'                   => 'field_IhWu6ZNhWQ3CpO',
            'label'                 => esc_attr__('Title Header Enable Disable Function','empelza'),
            'name'                  => 'post_single_header_title_enable_function',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_x9sSoBmIcXWc4t',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_j5u8G8Nc3fXERQ',
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
            'key'                   => 'field_9ankMuIoW7UwKN',
            'label'                 => esc_attr__('Custom Title','empelza'),
            'name'                  => 'post_single_custom_title',
            'type'                  => 'textarea',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_x9sSoBmIcXWc4t',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_j5u8G8Nc3fXERQ',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_IhWu6ZNhWQ3CpO',
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
            'key'                   => 'field_72NexDs7qVPdOL',
            'label'                 => esc_attr__('Background Image','empelza'),
            'name'                  => 'post_single_header_img',
            'type'                  => 'image',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_j5u8G8Nc3fXERQ',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_x9sSoBmIcXWc4t',
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

        /*-------------------------------------------------------------------
        ==  Content
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_Bl7EPqbq2RmDKG',
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
            'key'                   => 'field_jLcAxpS5swTqO7',
            'label'                 => esc_attr__('Custom Content','empelza'),
            'name'                  => 'post_single_container_custom',
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
            'key'                   => 'field_obmghhuhB9SJBh',
            'label'                 => esc_attr__('Padding Top','empelza'),
            'name'                  => 'post_single_padding_top',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_jLcAxpS5swTqO7',
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
            'key'                   => 'field_HDlQ9s1v6iaZBx',
            'label'                 => esc_attr__('Padding bottom','empelza'),
            'name'                  => 'post_single_padding_bottom',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_jLcAxpS5swTqO7',
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
         ==  Sidebar
         -------------------------------------------------------------------*/
        array(
            'key'               => 'field_gqHqBZmS3S9etp',
            'label'             => '<i class="fa fa-indent" aria-hidden="true"></i> '.esc_attr__('Sidebar','empelza'),
            'name'              => '',
            'type'              => 'tab',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'placement'         => 'left',
            'endpoint'          => 0,
        ),
        array(
            'key'               => 'field_q9s0pym4uxknr',
            'label'             => esc_attr__('Custom sidebar','empelza'),
            'name'              => 'post_sidebar_custom',
            'type'              => 'button_group',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'choices' => array(
                'default'                           => esc_attr__('Default Sidebar','empelza'),
                'custom'                            => esc_attr__('Custom Sidebar','empelza'),
            ),
            'default_value' => array(
                0                                   => 'default',
            ),
            'layout'            => 'horizontal',
            'toggle'            => 0,
            'return_format'     => 'value',
        ),
        array(
            'key'               => 'field_iiuctzk7linzucpage',
            'label'             => esc_attr__('Sidebar Position','empelza'),
            'name'              => 'post_sidebar_position',
            'type'              => 'button_group',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                               => 'field_q9s0pym4uxknr',
                        'operator'                            => '==',
                        'value'                               => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'choices' => array(
                'no'                                => esc_attr__('No Sidebar','empelza'),
                'left'                              => esc_attr__('Left Sidebar','empelza'),
                'right'                             => esc_attr__('Right Sidebar','empelza'),
            ),
            'default_value' => array(
                0                                   => 'no',
            ),
            'layout'            => 'horizontal',
            'toggle'            => 0,
            'return_format'     => 'value',
        ),
        array(
            'key'               => 'field_hrk84ksgj9motcpage',
            'label'             => esc_attr__('Sticky sidebar','empelza'),
            'name'              => 'post_sidebar_sticky',
            'type'              => 'button_group',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                              => 'field_q9s0pym4uxknr',
                        'operator'                           => '==',
                        'value'                              => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'choices' => array(
                'default'                           => esc_attr__('Default Sidebar','empelza'),
                'sticky'                            => esc_attr__('Sticky Sidebar','empelza'),
            ),
            'default_value' => array(
                0                                   => 'default',
            ),
            'layout'            => 'horizontal',
            'toggle'            => 0,
            'return_format'     => 'value',
        ),

    ),
    'location' => array(
        array(
            array(
                'param'                                     => 'post_type',
                'operator'                                  => '==',
                'value'                                     => 'post',
            ),
        ),
    ),
    'menu_order'                => 0,
    'position'                  => 'normal',
    'style'                     => 'default',
    'label_placement'           => 'top',
    'instruction_placement'     => 'label',
    'hide_on_screen'            => '',
    'active'                    => 1,
    'description'               => '',
));

// Post Format Gallery
acf_add_local_field_group(array(
    'key'                           => 'group_57fb5339af841',
    'title'                         => 'Gallery Content Top Post Slider',
    'fields' => array(
        array(
            'key'                   => 'field_57fb5354ce8fe',
            'label'                 => 'Images',
            'name'                  => 'content_post_gallery',
            'type'                  => 'gallery',
            'instructions'          => 'Add two or more photos',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                         => '',
                'class'                         => '',
                'id'                            => '',
            ),
            'min'                   => 0,
            'max'                   => '',
            'insert'                => 'append',
            'library'               => 'all',
            'min_width'             => '',
            'min_height'            => '',
            'min_size'              => '',
            'max_width'             => '',
            'max_height'            => '',
            'max_size'              => '',
            'mime_types'            => '',
        ),

    ),
    'location' => array(
        array(
            array(
                'param'                             => 'post_type',
                'operator'                          => '==',
                'value'                             => 'post',
            ),
            array(
                'param'                             => 'post_format',
                'operator'                          => '==',
                'value'                             => 'gallery',
            ),
        ),
    ),
    'menu_order'                    => 0,
    'position'                      => 'acf_after_title',
    'style'                         => 'default',
    'label_placement'               => 'top',
    'instruction_placement'         => 'label',
    'hide_on_screen'                => '',
    'active'                        => 1,
    'description'                   => '',
));

// Post Format Quote
acf_add_local_field_group(array(
    'key'                           => 'group_57fb649cd1988',
    'title'                         => 'Quote Content',
    'fields' => array(
        array(
            'key'                   => 'field_57fb64b6f5788',
            'label'                 => 'Message',
            'name'                  => 'content_post_quotes_text',
            'type'                  => 'wysiwyg',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                         => '',
                'class'                         => '',
                'id'                            => '',
            ),
            'default_value'         => '',
            'tabs'                  => 'all',
            'toolbar'               => 'full',
            'media_upload'          => 0,
        ),
        array(
            'key'                   => 'field_57fb6500f5789',
            'label'                 => 'Author',
            'name'                  => 'content_post_quotes_author',
            'type'                  => 'text',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                         => '',
                'class'                         => '',
                'id'                            => '',
            ),
            'default_value'         => '',
            'placeholder'           => '',
            'prepend'               => '',
            'append'                => '',
            'maxlength'             => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param'                         => 'post_type',
                'operator'                      => '==',
                'value'                         => 'post',
            ),
            array(
                'param'                         => 'post_format',
                'operator'                      => '==',
                'value'                         => 'quote',
            ),
        ),
    ),
    'menu_order'                    => 0,
    'position'                      => 'acf_after_title',
    'style'                         => 'default',
    'label_placement'               => 'top',
    'instruction_placement'         => 'label',
    'hide_on_screen'                => '',
    'active'                        => 1,
    'description'                   => '',
));

// Post Format Video
acf_add_local_field_group(array(
    'key'                           => 'group_57f7a57b1a6b1',
    'title'                         => 'Video Content',
    'fields' => array(
        array(
            'key'                   => 'field_57f7a6039be07',
            'label'                 => 'Video Link',
            'name'                  => 'content_post_video',
            'type'                  => 'url',
            'instructions'          => 'Supported YouTube and "Vimeo(Shared) links. How to use a Vimeo player you can read the documentation for the theme." ',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                                     => '',
                'class'                                     => '',
                'id'                                        => '',
            ),
            'default_value'         => '',
            'placeholder'           => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param'                                     => 'post_type',
                'operator'                                  => '==',
                'value'                                     => 'post',
            ),
            array(
                'param'                                     => 'post_format',
                'operator'                                  => '==',
                'value'                                     => 'video',
            ),
        ),
    ),
    'menu_order'                => 0,
    'position'                  => 'acf_after_title',
    'style'                     => 'default',
    'label_placement'           => 'top',
    'instruction_placement'     => 'label',
    'hide_on_screen'            => '',
    'active'                    => 1,
    'description'               => '',
));