<?php
    if (function_exists('vc_map')) {
        vc_map(

 array(
    'name'              => esc_html__( 'Single Image', 'fl-themes-helper' ),
    'base'              => 'vc_single_image',
    'icon'             => 'fl-icon icon-fl-vc-icon',
    'category' => esc_html__('Empelza', 'fl-themes-helper'),
    'weight'            => 500,
    'params' => array_merge(array(
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Image source', 'fl-themes-helper' ),
            'param_name'    => 'source',
            'value' => array(
                esc_html__( 'Media library', 'fl-themes-helper' ) => 'media_library',
                esc_html__( 'External link', 'fl-themes-helper' ) => 'external_link',
            ),
            'std'           => 'media_library',
            'description'   => esc_html__( 'Select image source.', 'fl-themes-helper' ),
        ),

        array(
            'type'          => 'attach_image',
            'heading'       => esc_html__( 'Image', 'fl-themes-helper' ),
            'param_name'    => 'image',
            'value'         => '',
            'description'   => esc_html__( 'Select image from media library.', 'fl-themes-helper' ),
            'dependency' => array(
                'element'       => 'source',
                'value'         => 'media_library',
            ),
            'admin_label'   => true,
        ),


        array(
            'type'          => 'textfield',
            'heading'       => esc_html__( 'External link', 'fl-themes-helper' ),
            'param_name'    => 'custom_src',
            'description'   => esc_html__( 'Select external link.', 'fl-themes-helper' ),
            'dependency' => array(
                'element'       => 'source',
                'value'         => 'external_link',
            ),
            'admin_label'   => true,
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__( 'Image size', 'fl-themes-helper' ),
            'param_name'    => 'img_size',
            'value'         => 'full',
            'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fl-themes-helper' ),
            'dependency' => array(
                'element'   => 'source',
                'value' => array(
                    'media_library',
                ),
            ),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__( 'Image size', 'fl-themes-helper' ),
            'param_name'    => 'external_img_size',
            'value'         => '',
            'description'   => esc_html__( 'Enter image size in pixels. Example: 200x100 (Width x Height).', 'fl-themes-helper' ),
            'dependency' => array(
                'element'       => 'source',
                'value'         => 'external_link',
            ),
        ),

        array(
            'type'          => 'fl_radio_advanced',
            'heading'       => esc_html__( 'Image alignment', 'fl-themes-helper' ),
            'param_name'    => 'alignment',
            'value'		    => 'left',
            'options' => array(
                esc_html__( 'Left', 'fl-themes-helper' )         => 'left',
                esc_html__( 'Center', 'fl-themes-helper' )       => 'center',
                esc_html__( 'Right', 'fl-themes-helper' )        => 'right',
            ),
            'group'         => 'Image Style',
            'description'   => esc_html__( 'Select image alignment.', 'fl-themes-helper' ),
        ),


        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'On click action', 'fl-themes-helper' ),
            'param_name'    => 'onclick',
            'value' => array(
                esc_html__( 'None', 'fl-themes-helper' )                => '',
                esc_html__( 'Open Magnific Popup', 'fl-themes-helper' ) => 'magnific_popup',
                esc_html__( 'Open prettyPhoto', 'fl-themes-helper' )    => 'link_image',
                esc_html__( 'Custom Link', 'fl-themes-helper' )         => 'custom_link',
            ),
            'description'   => esc_html__( 'Select action for click action.', 'fl-themes-helper' ),
            'group'         => 'Image Style',
            'std'           => '',
        ),

        array(
            'type'          => 'href',
            'heading'       => esc_html__( 'Image link', 'fl-themes-helper' ),
            'param_name'    => 'link',
            'description'   => esc_html__( 'Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'fl-themes-helper' ),
            'group'         => 'Image Style',
            'dependency' => array(
                'element' => 'onclick',
                'value' => 'custom_link',
            ),
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Link Target', 'fl-themes-helper' ),
            'param_name'    => 'img_link_target',
            'value'         => vc_target_param_list(),
            'group'         => 'Image Style',
            'dependency' => array(
                'element' => 'onclick',
                'value' => array(
                    'custom_link',
                    'img_link_large',
                ),
            ),
        ),

        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__('Image effects', 'fl-themes-helper'),
            'param_name'    => 'img_effects',
            'group'         => 'Image Style',
            'std'           => '',
            'value' => array(
                esc_html__('None', 'fl-themes-helper')                  => '',
                esc_html__('Animated', 'fl-themes-helper')              => 'animated-image',
            ),
        ),


        // backward compatibility. since 4.6
        array(
            'type' => 'hidden',
            'param_name' => 'img_link_large',
        ),
    ), fl_helping_get_animation_option(),fl_helping_get_animation_delay_option (), fl_helping_get_design_tab()),
)
        );
    }