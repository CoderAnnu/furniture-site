<?php

    /**
     * Defind Class
     */

    defined( 'FL_HELPING_ADDONS_ROOT' ) or define( 'FL_HELPING_ADDONS_ROOT', dirname(__FILE__) );





/**====================================================================
==  Animate params Json.
====================================================================*/
if(!function_exists('fl_get_animation_json')){
    function fl_get_animation_json(){


        $json = '{
        	"disable_animation": {
			"none": true
		  },
		   "fade": {
			  "fadeIn": true
		  },
		    "flip": { 
		    "flipXIn": true,
			"flipYIn": true,
			"flipBounceXIn": true,
			"flipBounceYIn": true
		  },
		  	"bounce": {
			"bounceIn": true,
			"bounceUpIn": true,
			"bounceDownIn": true,
			"bounceLeftIn": true,
			"bounceRightIn": true
		  },
		  	"slide": {
			"slideUpIn": true,
			"slideDownIn": true,
			"slideLeftIn": true,
			"slideRightIn": true,
			"slideUpBigIn": true,
			"slideDownBigIn": true,
			"slideLeftBigIn": true,
			"slideRightBigIn": true,
			"slideInLeftVeryBig": true,
			"slideInRightVeryBig": true
		  },
		  	"perspective": {
			"perspectiveUpIn": true,
			"perspectiveDownIn": true,
			"perspectiveLeftIn": true,
			"perspectiveRightIn": true
		  },
		  "specials": { 
			"zoomIn": true, 
			"raise": true,
			"swoopIn": true,
			"whirlIn": true,
			"shrinkIn": true,
			"expandIn": true
		  }
		}';

        return $json;
    }
}

/**====================================================================
==  Sanitizes a html classname to ensure it only contains valid characters.
====================================================================*/
if (!function_exists( 'fl_sanitize_class' )) {
    function fl_sanitize_class($classes)
    {
        if (!is_array($classes)) {
            $classes = explode(' ', $classes);
        }

        foreach ($classes as $k => $v) {
            $classes[$k] = sanitize_html_class($v);
        }

        return join(' ', $classes);

        return $classes;
    }
}

/**====================================================================
==  Check if $var isset / true / 1.
====================================================================*/
if (!function_exists( 'fl_check_option' )) {
    function fl_check_option($var)
    {
        return !(!isset($var) || $var === false || $var === 'false' || $var === 0 || $var === "0" || $var === "");
    }
}


/**====================================================================
==  Return additional class from Visual Composer style tab
====================================================================*/

if (!function_exists( 'fl_get_css_tab_class' )) {
    function fl_get_css_tab_class ($atts = array()) {
        $result = ' ';
        if (function_exists('vc_shortcode_custom_css_class') && isset($atts['vc_css'])) {
            $result = ' ' . vc_shortcode_custom_css_class($atts['vc_css']) . ' ';
        }
        return $result;
    }
}

/**====================================================================
==  Shortcode return
====================================================================*/
if (!function_exists('fl_js_delete_wpautop')) {
    function fl_js_delete_wpautop($content, $wpautop = false)
    {
        if ($wpautop) {
            $content = wpautop(preg_replace('/<\/?p\>/', "\n", $content) . "\n");
        }
        return do_shortcode(shortcode_unautop($content));
    }
}

/**====================================================================
==  Amination Option tab
====================================================================*/
if (!function_exists( 'fl_helping_get_animation_option' )) {
    function fl_helping_get_animation_option () {
        return array(
            array(
                "type"              => "fl_animator",
                "heading"           => esc_html__("CSS Animation","fl-themes-helper"),
                "param_name"        => "animation",
                "value"             => "",
                'description'       => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'fl-themes-helper' ),
                'weight'            => 1,
                "group"             => "Animation"
            ),
        );
    }
}
/**====================================================================
==  Amination Option tab
====================================================================*/
if (!function_exists( 'fl_helping_get_animation_delay_option' )) {
    function fl_helping_get_animation_delay_option() {
        return array(
            array(
                'type'              => 'fl_checkbox',
                'class'             => '',
                'heading'           => '',
                'param_name'        => 'custom_delay',
                'value'             => 'off',
                'description'       => '"Checked" to enable custom delay',
                'dependency' => array(
                    'element'                    => 'animation',
                    'value_not_equal_to'         => 'none'
                ),
                'options' => array(
                    'on' => array(
                        'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                        'off'       => esc_attr__('No', 'fl-themes-helper'),
                    ),
                ),
                'group'             => 'Animation',
            ),
            array(
                'type'              => 'fl_slider',
                'heading'           => esc_html__( 'Animation Delay', 'fl-themes-helper' ),
                'param_name'        => 'animation_delay',
                'weight'            => 3,
                'std'               => '1000',
                'min'               => 0,
                'max'               => 10000,
                'step'              => 10,
                'value'             => 1000,
                'suffix'            => 'ms',
                'group'             => 'Animation',
                'dependency' => array(
                    'element'                    => 'custom_delay',
                    'value'                      => 'on'
                ),
            ),
        );
    }
}
/**====================================================================
==  Design tab
====================================================================*/

if (!function_exists( 'fl_helping_get_design_tab' )) {
    function fl_helping_get_design_tab () {
        return array(
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__('Custom ID', 'fl-themes-helper'),
                'param_name'        => 'id',
                'value'             => '',
                'admin_label'       => true,
                'description'       => 'Enter row ID (Note: make sure it is unique and valid according to <a href="https://www.w3schools.com/tags/att_global_id.asp">w3c specification</a>).',
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__('Custom Classes', 'fl-themes-helper'),
                'param_name'        => 'class',
                'value'             => '',
                'admin_label'       => true,
                'description'       => 'Style particular content element differently - add a class name and refer to it in custom CSS.',
            ),
            array(
                'type'              => 'css_editor',
                'heading'           => esc_html__( 'CSS', 'fl-themes-helper'),
                'param_name'        => 'vc_css',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper'),
            ),
            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Background position', 'fl-themes-helper' ),
                'param_name'        => 'desktop_bg_image_position',
                'value'             => array(
                    esc_html__( 'Default', 'fl-themes-helper' )         => '',
                    esc_html__( 'Left Top', 'fl-themes-helper' )        => 'bg-position-left-top',
                    esc_html__( 'Left Middle', 'fl-themes-helper' )     => 'bg-position-left-center',
                    esc_html__( 'Left Bottom', 'fl-themes-helper' )     => 'bg-position-left-bottom',
                    esc_html__( 'Center Top', 'fl-themes-helper' )      => 'bg-position-center-top',
                    esc_html__( 'Center Middle', 'fl-themes-helper' )   => 'bg-position-center-center',
                    esc_html__( 'Center Bottom', 'fl-themes-helper' )   => 'bg-position-center-bottom',
                    esc_html__( 'Right Top', 'fl-themes-helper' )       => 'bg-position-right-top',
                    esc_html__( 'Right Middle', 'fl-themes-helper' )    => 'bg-position-right-center',
                    esc_html__( 'Right Bottom', 'fl-themes-helper' )    => 'bg-position-right-bottom',
                ),
                'edit_field_class'  => 'vc_col-sm-6',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'If you use a picture you can choose a position',
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__( 'Minimum height', 'fl-themes-helper' ),
                'param_name'        => 'desktop_height',
                'value'             => '',
                'edit_field_class'  => 'vc_col-sm-6',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'Example: 400px',
            ),

            array(
                'type'              => 'textfield',
                'heading'           => esc_html__( 'Box Shadow', 'fl-themes-helper' ),
                'param_name'        => 'box_shadow_param',
                'value'             => '',
                'edit_field_class'  => 'vc_col-sm-12',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'You can generate an option here: (<a href="https://www.cssmatic.com/box-shadow">Shadow Generator</a>). And enter the code from the generator here:<br> Example:<br>-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);<br>-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);<br>box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);',
            ),

            array(
                'type'				=> 'fl_heading_param',
                'text'				=> esc_html__('Responsive Option', 'fl-themes-helper'),
                'param_name'		=> 'title_responsive_text',
                'group'             => 'Design Options',
            ),

            array(
                'type'          => 'fl_checkbox',
                'class'         => '',
                'heading'       => '',
                'param_name'    => 'custom_responsive_option',
                'value'         => 'off',
                'description'   => '"Checked" to enable custom responsive option',
                'options' => array(
                    'on' => array(
                        'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                        'off'       => esc_attr__('No', 'fl-themes-helper'),
                    ),
                ),
                'group'             => 'Design Options',
            ),
            array(
                'type'                  => 'fl_responsive_css_editor',
                'param_name'            => 'responsive_css',
                'width'                 => 'no',
                'group'                 => 'Design Options',
                'dependency' => array(
                    'element'                    => 'custom_responsive_option',
                    'value'                      => 'on'
                ),
            )
        );
    }
}


/**====================================================================
==  After VC Init
====================================================================*/
add_action( 'vc_after_init', 'fl_vc_after_init_actions' );
function fl_vc_after_init_actions()
    {
        // Remove Params
        if( function_exists('vc_remove_param') ){
            vc_remove_param( 'vc_row', 'css_animation' );
            vc_remove_param( 'vc_column', 'css_animation' );
        }
        // Row Custom Animation
        $vc_row_animation_params = array(
            array(
                'type'              => 'dropdown',
                'heading'           => esc_attr__( 'Row stretch', 'fl-themes-helper' ),
                'param_name'        => 'full_width',
                'weight'            => 2,
                'value' => array(
                    esc_attr__( 'Default', 'fl-themes-helper' )                                  => '',
                    esc_attr__( 'Stretch row', 'fl-themes-helper' )                              => 'stretch_row',
                    esc_attr__( 'Stretch row and content', 'fl-themes-helper' )                  => 'stretch_row_content',
                    esc_attr__( 'Stretch row and content (no paddings)', 'fl-themes-helper' )    => 'stretch_row_content_no_spaces',
                ),
                'description' => esc_html__( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'fl-themes-helper' ),
            ),


            array(
                "type"              => "fl_animator",
                "heading"           => esc_html__("CSS Animation","fl-themes-helper"),
                "param_name"        => "row_animation",
                "value"             => "none",
                'description'       => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'fl-themes-helper' ),
                'weight'            => 0,
                'admin_label'       => true,
                "group"             => "Animation"
            ),

            array(
                'type'              => 'fl_checkbox',
                'class'             => '',
                'heading'           => esc_html__('Custom Delay', 'fl-themes-helper'),
                'param_name'        => 'row_custom_delay',
                'value'             => 'off',
                'options' => array(
                    'on' => array(
                        'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                        'off'       => esc_attr__('No', 'fl-themes-helper'),
                    ),
                ),
                'group'             => 'Animation',
                'description'       => esc_html__( '"Checked"to show custom delay', 'fl-themes-helper' ),
                'dependency' => array(
                    'element'                    => 'row_animation',
                    'value_not_equal_to'         => 'none'
                ),
            ),

            array(
                'type'              => 'fl_slider',
                'heading'           => esc_html__( 'Animation delay', 'fl-themes-helper' ),
                'param_name'        => 'row_animation_delay',
                'weight'            => 0,
                'std'               => '600',
                'min'               => 0,
                'max'               => 10000,
                'step'              => 10,
                'value'             => 600,
                'suffix'            => 'ms',
                'group'             => 'Animation',
                'dependency' => array(
                    'element'                    => 'row_custom_delay',
                    'value'                      => 'on'
                ),
            ),
            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Background position', 'fl-themes-helper' ),
                'param_name'        => 'desktop_bg_image_position',
                'value'             => array(
                    esc_html__( 'Default', 'fl-themes-helper' )         => '',
                    esc_html__( 'Left Top', 'fl-themes-helper' )        => 'bg-position-left-top',
                    esc_html__( 'Left Middle', 'fl-themes-helper' )     => 'bg-position-left-center',
                    esc_html__( 'Left Bottom', 'fl-themes-helper' )     => 'bg-position-left-bottom',
                    esc_html__( 'Center Top', 'fl-themes-helper' )      => 'bg-position-center-top',
                    esc_html__( 'Center Middle', 'fl-themes-helper' )   => 'bg-position-center-center',
                    esc_html__( 'Center Bottom', 'fl-themes-helper' )   => 'bg-position-center-bottom',
                    esc_html__( 'Right Top', 'fl-themes-helper' )       => 'bg-position-right-top',
                    esc_html__( 'Right Middle', 'fl-themes-helper' )    => 'bg-position-right-center',
                    esc_html__( 'Right Bottom', 'fl-themes-helper' )    => 'bg-position-right-bottom',
                ),
                'edit_field_class'  => 'vc_col-sm-6',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'If you use a picture you can choose a position',
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__( 'Minimum height', 'fl-themes-helper' ),
                'param_name'        => 'desktop_height',
                'value'             => '',
                'edit_field_class'  => 'vc_col-sm-6',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'Example: 400px',
            ),

            array(
                'type'              => 'dropdown',
                'param_name'        => 'fl_overflow_type',
                'heading'           => esc_html__( 'Overflow', 'fl-themes-helper' ),
                'weight'            => 2,
                'dependency' => array(
                    'element'                    => 'full_width',
                    'value' => array(
                        'stretch_row',
                        'stretch_row_content',
                        'stretch_row_content_no_spaces',
                    ),
                ),
                'value' => array(esc_html__('Select overflow', 'fl-themes-helper')  => '',
                    esc_html__('Overflow visible', 'fl-themes-helper')              => 'overflow-visible',
                    esc_html__('Overflow hidden', 'fl-themes-helper')               => 'overflow-hidden',
                    esc_html__('Overflow auto', 'fl-themes-helper')                 => 'overflow-auto',
                ),

                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
            ),
            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Z-Index', 'fl-themes-helper' ),
                'param_name'        => 'z_index',
                'std'               => '',
                'value'             => array(
                    esc_html__( 'Default', 'fl-themes-helper' )                        => '',
                    'Position - 1'                                                     => 'z-index-1',
                    'Position - 2'                                                     => 'z-index-2',
                    'Position - 3'                                                     => 'z-index-3',
                    'Position - 4'                                                     => 'z-index-4',
                    'Position - 5'                                                     => 'z-index-6',
                ),
                'edit_field_class'  => 'vc_col-sm-12',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
            ),

            array(
                'type'              => 'textfield',
                'heading'           => esc_html__( 'Box Shadow', 'fl-themes-helper' ),
                'param_name'        => 'box_shadow_param',
                'value'             => '',
                'edit_field_class'  => 'vc_col-sm-12',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'You can generate an option here: (<a href="https://www.cssmatic.com/box-shadow">Shadow Generator</a>). And enter the code from the generator here:<br> Example:<br>-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);<br>-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);<br>box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);',
            ),

            array(
                "type"          => "fl_number",
                "class"         => "",
                "heading"       => __("Top", "fl-themes-helper"),
                "param_name"    => "row_top",
                "admin_label"   => true,
                "value"         => '',
                "suffix"        => "px",
                'group'         => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'   => "Example: -100"
            ),

            array(
                'type'				=> 'fl_heading_param',
                'text'				=> esc_html__('Responsive Option', 'fl-themes-helper'),
                'param_name'		=> 'title_row_responsive_css',
                'group'             => 'Design Options',
            ),
            array(
                'type'          => 'fl_checkbox',
                'class'         => '',
                'heading'       => '',
                'param_name'    => 'custom_responsive_option',
                'value'         => 'off',
                'description'   => '"Checked" to enable custom responsive option',
                'options' => array(
                    'on' => array(
                        'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                        'off'       => esc_attr__('No', 'fl-themes-helper'),
                    ),
                ),
                'group'             => 'Design Options',
            ),
            array(
                'type'              => 'fl_responsive_css_editor',
                'param_name'        => 'responsive_css',
                'width'             => 'no',
                'group'             => 'Design Options',
                'dependency' => array(
                    'element'                    => 'custom_responsive_option',
                    'value'                      => 'on'
                ),
            )

        );

        vc_add_params( 'vc_row', $vc_row_animation_params );

        // Row Inner Custom Animation
        $vc_row_inner_animation_params = array(
            array(
                "type"              => "fl_animator",
                "heading"           => esc_html__("CSS Animation","fl-themes-helper"),
                "param_name"        => "row_inner_animation",
                "value"             => "none",
                'description'       => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'fl-themes-helper' ),
                'weight'            => 0,
                "group"             => "Animation"
            ),
            array(
                'type'              => 'fl_checkbox',
                'class'             => '',
                'heading'           => esc_html__('Custom Delay', 'fl-themes-helper'),
                'param_name'        => 'row_inner_custom_delay',
                'value'             => 'off',
                'options' => array(
                    'on' => array(
                        'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                        'off'       => esc_attr__('No', 'fl-themes-helper'),
                    ),
                ),
                'group'             => 'Animation',
                'description'       => esc_html__( '"Checked"to show custom delay', 'fl-themes-helper' ),
                'dependency' => array(
                    'element'                    => 'row_inner_animation',
                    'value_not_equal_to'         => 'none'
                ),
            ),

            array(
                'type'              => 'fl_slider',
                'heading'           => esc_html__( 'Animation delay', 'fl-themes-helper' ),
                'param_name'        => 'row_inner_animation_delay',
                'weight'            => 0,
                'std'               => '600',
                'min'               => 0,
                'max'               => 10000,
                'step'              => 10,
                'value'             => 600,
                'suffix'            => 'ms',
                'group'             => 'Animation',
                'dependency' => array(
                    'element'                    => 'row_inner_custom_delay',
                    'value'                      => 'on'
                ),
            ),

            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Background position', 'fl-themes-helper' ),
                'param_name'        => 'desktop_bg_image_position',
                'value'             => array(
                    esc_html__( 'Default', 'fl-themes-helper' )         => '',
                    esc_html__( 'Left Top', 'fl-themes-helper' )        => 'bg-position-left-top',
                    esc_html__( 'Left Middle', 'fl-themes-helper' )     => 'bg-position-left-center',
                    esc_html__( 'Left Bottom', 'fl-themes-helper' )     => 'bg-position-left-bottom',
                    esc_html__( 'Center Top', 'fl-themes-helper' )      => 'bg-position-center-top',
                    esc_html__( 'Center Middle', 'fl-themes-helper' )   => 'bg-position-center-center',
                    esc_html__( 'Center Bottom', 'fl-themes-helper' )   => 'bg-position-center-bottom',
                    esc_html__( 'Right Top', 'fl-themes-helper' )       => 'bg-position-right-top',
                    esc_html__( 'Right Middle', 'fl-themes-helper' )    => 'bg-position-right-center',
                    esc_html__( 'Right Bottom', 'fl-themes-helper' )    => 'bg-position-right-bottom',
                ),
                'edit_field_class'  => 'vc_col-sm-6',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'If you use a picture you can choose a position',
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__( 'Minimum height', 'fl-themes-helper' ),
                'param_name'        => 'desktop_height',
                'value'             => '',
                'edit_field_class'  => 'vc_col-sm-6',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'Example: 400px',
            ),


            array(
                'type'				=> 'fl_heading_param',
                'text'				=> esc_html__('Responsive Option', 'fl-themes-helper'),
                'param_name'		=> 'title_row_inner_responsive_css',
                'group'             => 'Design Options',
            ),
            array(
                'type'              => 'fl_checkbox',
                'class'             => '',
                'heading'           => '',
                'param_name'        => 'custom_responsive_option',
                'value'             => 'off',
                'description'       => '"Checked" to enable custom responsive option',
                'options' => array(
                    'on' => array(
                        'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                        'off'       => esc_attr__('No', 'fl-themes-helper'),
                    ),
                ),
                'group'             => 'Design Options',
            ),
            array(
                'type'              => 'fl_responsive_css_editor',
                'param_name'        => 'responsive_css',
                'group'             => 'Design Options',
                'width'             => 'no',
                'dependency' => array(
                    'element'                    => 'custom_responsive_option',
                    'value'                      => 'on'
                ),
            )

        );

        vc_add_params( 'vc_row_inner', $vc_row_inner_animation_params );
        // Column Custom Animation
        $vc_column_animation_params = array(
            array(
                "type"              => "fl_animator",
                "heading"           => esc_html__("CSS Animation","fl-themes-helper"),
                "param_name"        => "column_animation",
                "value"             => "none",
                'description'       => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'fl-themes-helper' ),
                'weight'            => 0,
                "group"             => "Animation"
            ),

            array(
                'type'              => 'fl_checkbox',
                'class'             => '',
                'heading'           => esc_html__('Custom Delay', 'fl-themes-helper'),
                'param_name'        => 'column_custom_delay',
                'value'             => 'off',
                'options' => array(
                    'on' => array(
                        'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                        'off'       => esc_attr__('No', 'fl-themes-helper'),
                    ),
                ),
                'group'             => 'Animation',
                'description'       => esc_html__( '"Checked"to show custom delay', 'fl-themes-helper' ),
                'dependency' => array(
                    'element'                    => 'column_animation',
                    'value_not_equal_to'         => 'none'
                ),
            ),

            array(
                'type'              => 'fl_slider',
                'heading'           => esc_html__( 'Animation delay', 'fl-themes-helper' ),
                'param_name'        => 'column_animation_delay',
                'weight'            => 0,
                'std'               => '1000',
                'min'               => 0,
                'max'               => 10000,
                'step'              => 10,
                'value'             => 1000,
                'suffix'            => 'ms',
                'group'             => 'Animation',
                'dependency' => array(
                    'element'                    => 'column_custom_delay',
                    'value'                      => 'on'
                ),
            ),

            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Background position', 'fl-themes-helper' ),
                'param_name'        => 'desktop_bg_image_position',
                'value'             => array(
                    esc_html__( 'Default', 'fl-themes-helper' )         => '',
                    esc_html__( 'Left Top', 'fl-themes-helper' )        => 'bg-position-left-top',
                    esc_html__( 'Left Middle', 'fl-themes-helper' )     => 'bg-position-left-center',
                    esc_html__( 'Left Bottom', 'fl-themes-helper' )     => 'bg-position-left-bottom',
                    esc_html__( 'Center Top', 'fl-themes-helper' )      => 'bg-position-center-top',
                    esc_html__( 'Center Middle', 'fl-themes-helper' )   => 'bg-position-center-center',
                    esc_html__( 'Center Bottom', 'fl-themes-helper' )   => 'bg-position-center-bottom',
                    esc_html__( 'Right Top', 'fl-themes-helper' )       => 'bg-position-right-top',
                    esc_html__( 'Right Middle', 'fl-themes-helper' )    => 'bg-position-right-center',
                    esc_html__( 'Right Bottom', 'fl-themes-helper' )    => 'bg-position-right-bottom',
                ),
                'edit_field_class'  => 'vc_col-sm-6',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'If you use a picture you can choose a position',
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__( 'Minimum height', 'fl-themes-helper' ),
                'param_name'        => 'desktop_height',
                'value'             => '',
                'edit_field_class'  => 'vc_col-sm-6',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'Example: 400px',
            ),
            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Z-Index', 'fl-themes-helper' ),
                'param_name'        => 'z_index',
                'std'               => '',
                'value'             => array(
                    esc_html__( 'Default', 'fl-themes-helper' )                        => '',
                    'Position - 1'                                                     => 'z-index-1',
                    'Position - 2'                                                     => 'z-index-2',
                    'Position - 3'                                                     => 'z-index-3',
                    'Position - 4'                                                     => 'z-index-4',
                    'Position - 5'                                                     => 'z-index-6',
                ),
                'edit_field_class'  => 'vc_col-sm-12',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__( 'Box Shadow', 'fl-themes-helper' ),
                'param_name'        => 'box_shadow_param',
                'value'             => '',
                'edit_field_class'  => 'vc_col-sm-12',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'You can generate an option here: (<a href="https://www.cssmatic.com/box-shadow">Shadow Generator</a>). And enter the code from the generator here:<br> Example:<br>-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);<br>-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);<br>box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);',
            ),
            array(
                'type'              => 'colorpicker',
                'param_name'        => 'gr_color_start',
                'heading'           => esc_html__('Gradient Color Start', 'fl-themes-helper'),
                'edit_field_class'  => 'vc_col-sm-6',
                'std'               => '',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
            ),
            array(
                'type'              => 'colorpicker',
                'param_name'        => 'gr_color_end',
                'heading'           => esc_html__('Gradient Color End', 'fl-themes-helper'),
                'edit_field_class'  => 'vc_col-sm-6',
                'std'               => '',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
            ),
            array(
                'type'              => 'fl_heading_param',
                'text'              => esc_html__('Responsive Option', 'fl-themes-helper'),
                'param_name'        => 'title_column_responsive_css',
                'group'             => 'Design Options',
            ),
            array(
                'type'              => 'fl_checkbox',
                'class'             => '',
                'heading'           => '',
                'param_name'        => 'custom_responsive_option',
                'value'             => 'off',
                'description'       => '"Checked" to enable custom responsive option',
                'options' => array(
                    'on' => array(
                        'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                        'off'       => esc_attr__('No', 'fl-themes-helper'),
                    ),
                ),
                'group'             => 'Design Options',
            ),
            array(
                'type'              => 'fl_responsive_css_editor',
                'param_name'        => 'responsive_css',
                'width'             => 'no',
                'group'             => 'Design Options',
                'dependency' => array(
                    'element'                    => 'custom_responsive_option',
                    'value'                      => 'on'
                ),
            )

        );
        vc_add_params( 'vc_column', $vc_column_animation_params );
        // Column Inner Custom Animation
        $vc_column_inner_animation_params = array(
            array(
                "type"              => "fl_animator",
                "heading"           => esc_html__("CSS Animation","fl-themes-helper"),
                "param_name"        => "column_inner_animation",
                "value"             => "none",
                'description'       => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'fl-themes-helper' ),
                'weight'            => 0,
                "group"             => "Animation"
            ),
            array(
                'type'              => 'fl_checkbox',
                'class'             => '',
                'heading'           => esc_html__('Custom Delay', 'fl-themes-helper'),
                'param_name'        => 'column_inner_custom_delay',
                'value'             => 'off',
                'options' => array(
                    'on' => array(
                        'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                        'off'       => esc_attr__('No', 'fl-themes-helper'),
                    ),
                ),
                'group'             => 'Animation',
                'description'       => esc_html__( '"Checked"to show custom delay', 'fl-themes-helper' ),
                'dependency' => array(
                    'element'                    => 'column_inner_animation',
                    'value_not_equal_to'         => 'none'
                ),
            ),
            array(
                'type'              => 'fl_slider',
                'heading'           => esc_html__( 'Animation delay', 'fl-themes-helper' ),
                'param_name'        => 'column_inner_animation_delay',
                'weight'            => 0,
                'std'               => '1000',
                'min'               => 0,
                'max'               => 10000,
                'step'              => 10,
                'value'             => 1000,
                'suffix'            => 'ms',
                'group'             => 'Animation',
                'dependency' => array(
                    'element'                    => 'column_inner_custom_delay',
                    'value'                      => 'on'
                ),
            ),
            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Background position', 'fl-themes-helper' ),
                'param_name'        => 'desktop_bg_image_position',
                'value'             => array(
                    esc_html__( 'Default', 'fl-themes-helper' )         => '',
                    esc_html__( 'Left Top', 'fl-themes-helper' )        => 'bg-position-left-top',
                    esc_html__( 'Left Middle', 'fl-themes-helper' )     => 'bg-position-left-center',
                    esc_html__( 'Left Bottom', 'fl-themes-helper' )     => 'bg-position-left-bottom',
                    esc_html__( 'Center Top', 'fl-themes-helper' )      => 'bg-position-center-top',
                    esc_html__( 'Center Middle', 'fl-themes-helper' )   => 'bg-position-center-center',
                    esc_html__( 'Center Bottom', 'fl-themes-helper' )   => 'bg-position-center-bottom',
                    esc_html__( 'Right Top', 'fl-themes-helper' )       => 'bg-position-right-top',
                    esc_html__( 'Right Middle', 'fl-themes-helper' )    => 'bg-position-right-center',
                    esc_html__( 'Right Bottom', 'fl-themes-helper' )    => 'bg-position-right-bottom',
                ),
                'edit_field_class'  => 'vc_col-sm-6',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'If you use a picture you can choose a position',
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__( 'Minimum height', 'fl-themes-helper' ),
                'param_name'        => 'desktop_height',
                'value'             => '',
                'edit_field_class'  => 'vc_col-sm-6',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
                'description'       => 'Example: 400px',
            ),
            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Z-Index', 'fl-themes-helper' ),
                'param_name'        => 'z_index',
                'std'               => '',
                'value'             => array(
                    esc_html__( 'Default', 'fl-themes-helper' )                        => '',
                    'Position - 1'                                                     => 'z-index-1',
                    'Position - 2'                                                     => 'z-index-2',
                    'Position - 3'                                                     => 'z-index-3',
                    'Position - 4'                                                     => 'z-index-4',
                    'Position - 5'                                                     => 'z-index-6',
                ),
                'edit_field_class'  => 'vc_col-sm-12',
                'group'             => esc_html__( 'Design Options', 'fl-themes-helper' ),
            ),
            array(
                'type'              => 'fl_heading_param',
                'text'              => esc_html__('Responsive Option', 'fl-themes-helper'),
                'param_name'        => 'title_column_inner_responsive_css',
                'group'             => 'Design Options',
            ),
            array(
                'type'              => 'fl_checkbox',
                'class'             => '',
                'heading'           => '',
                'param_name'        => 'custom_responsive_option',
                'value'             => 'off',
                'description'       => '"Checked" to enable custom responsive option',
                'options' => array(
                    'on' => array(
                        'on'        => esc_attr__('Yes', 'fl-themes-helper'),
                        'off'       => esc_attr__('No', 'fl-themes-helper'),
                    ),
                ),
                'group'             => 'Design Options',
            ),
            array(
                'type'              => 'fl_responsive_css_editor',
                'param_name'        => 'responsive_css',
                'group'             => 'Design Options',
                'width'             => 'no',
                'dependency' => array(
                    'element'                    => 'custom_responsive_option',
                    'value'                      => 'on'
                ),
            )

        );
        vc_add_params( 'vc_column_inner', $vc_column_inner_animation_params );
}





/**=================================================================
==  Return responsive data
====================================================================*/
function fl_helper_get_responsive_text_media_css($args) {
        $content = '';
        if(isset($args) && is_array($args)) {
            //  get targeted css class/id from array
            if (array_key_exists('target',$args)) {
                if(!empty($args['target'])) {
                    $content .=  " data-responsive-target='".esc_attr( $args['target'] )."' ";
                }
            }

            //  get media sizes
            if (array_key_exists('media_sizes',$args)) {
                if(!empty($args['media_sizes'])) {
                    $content .=  " data-responsive-param='".json_encode( $args['media_sizes'] )."' ";
                }
            }
        }
        return $content;
}


/**=================================================================
==  Parse Text Params
====================================================================*/

    if(!function_exists('_fl_parse_text_params')){
        function _fl_parse_text_params( $string, $use_google_fonts = 'no', $custom_fonts = false, $important = true) {
            $parsed_param =  array();
            $parsed_array = array(
                'style' => '',
                'tag' => 'div',
            );
            $param_value  = explode( '|', $string );


            if($important !='true'){
                $important_text = ';';
            }else{
                $important_text = '!important;';
            }

            if ( is_array( $param_value ) ) {
                foreach ( $param_value as $single_param ) {
                    $single_param                     = explode( ':', $single_param );
                    if ( isset($single_param[1]) && $single_param[1] != '' ) {
                        $parsed_param[ $single_param[0] ] = $single_param[1];
                    } else {
                        $parsed_param[ $single_param[0] ] = '';
                    }
                }
            }

            if ( ! empty( $parsed_param ) && is_array( $parsed_param ) ) {

                if ( ('yes' === trim($use_google_fonts) || 'show' === trim($use_google_fonts)) && class_exists('Vc_Google_Fonts')) {

                    $google_fonts_obj  = new Vc_Google_Fonts();
                    $google_fonts_data = strlen( $custom_fonts ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( array(), $custom_fonts ) : '';

                    if($google_fonts_data != '') {
                        $google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
                        $parsed_array['style'] .= 'font-family:' . $google_fonts_family[0] . $important_text;
                        $google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
                        $parsed_array['style'] .= 'font-weight:' . $google_fonts_styles[1] . $important_text;
                        $parsed_array['style'] .= 'font-style:' . $google_fonts_styles[2] . $important_text;

                        $settings = get_option( 'wpb_js_google_fonts_subsets' );
                        if ( is_array( $settings ) && ! empty( $settings ) ) {
                            $subsets = '&subset=' . implode( ',', $settings );
                        } else {
                            $subsets = '';
                        }

                        if ( isset( $google_fonts_data['values']['font_family'] ) && function_exists('vc_build_safe_css_class') ) {
                            wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
                        }
                    }
                }

                foreach ( $parsed_param as $key => $value ) {

                    if ( strlen( $value ) > 0 ) {
                        if ( 'font_style_italic' === $key ) {
                            $parsed_array['style'] .= 'font-style:italic'.$important_text;
                        } elseif ( 'font_style_bold' === $key ) {
                            $parsed_array['style'] .= 'font-weight:bold'.$important_text;
                        } elseif ( 'font_style_underline' === $key ) {
                            $parsed_array['style'] .= 'text-decoration:underline'.$important_text;
                        } elseif('font_family' === $key){
                            $parsed_array['style'] .= 'font-family:'.$value.$important_text;
                        } elseif ( 'color' === $key ) {
                            $value = str_replace( '%23', '#', $value );
                            $value = str_replace( '%2C', ',', $value );
                            $parsed_array['style'] .= $key . ':' . $value .$important_text;
                            $parsed_array['color'] = $value;
                        } elseif('tag' === $key){
                            $parsed_array['tag'] = $value;
                        } else {
                            $parsed_array['style'] .= str_replace( '_', '-', $key ) . ':' . $value . 'px'.$important_text;
                        }
                    }
                }

            }

            return $parsed_array;
        }
    }



if (!function_exists('vc_icon_element_params_tta_section')) {
    function vc_icon_element_params_tta_section() {
        require_once vc_path_dir('CONFIG_DIR', 'content/vc-icon-element.php');
        $params_array = vc_icon_element_params();
        if (empty($params_array['params']) && !is_array($params_array['params'])) {
            return $params_array;
        }
        foreach ($params_array['params'] as $key => $value) {
            if ($value['param_name'] == "type") {
                $params_array['params'][$key]['value'] = array (
                    esc_html__('Font Awesome', 'fl-themes-helper')	    => 'fontawesome',
                    esc_html__('Open Iconic', 'fl-themes-helper')         => 'openiconic',
                    esc_html__('Typicons', 'fl-themes-helper')	        => 'typicons',
                    esc_html__('Entypo', 'fl-themes-helper')		        => 'entypo',
                    esc_html__('Linecons', 'fl-themes-helper')	        => 'linecons',

                );
            }
        }
        $params_array['params'] = array_merge($params_array['params']);
        return $params_array;
    }

}
