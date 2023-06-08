<?php
/**
 * Extend WPBakery Page Builder vc_row, add video attachment control
 *
 * @package advanced-backgrounds
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class nK_AWB_VC_Extend
 */
class NK_AWB_VC_Extend {
    /**
     * NK_AWB_VC_Extend constructor.
     */
    public function __construct() {
        $this->init_options();
        $this->init_hooks();
    }

    /**
     * Init options
     */
    public function init_options() {
        // add VC control.
        if ( function_exists( 'vc_add_shortcode_param' ) ) {
            // attach video.
            vc_add_shortcode_param( 'awb_attach_video', array( $this, 'vc_control_awb_attach_video' ), nk_awb()->plugin_url . 'assets/admin/vc_extend/vc-awb-attach-video.min.js' );

            // heading.
            vc_add_shortcode_param( 'awb_heading', array( $this, 'vc_control_awb_heading' ) );
        }
    }

    /**
     * Init hooks
     */
    public function init_hooks() {
        add_filter( 'vc_shortcode_output', array( $this, 'vc_shortcode_output_filter' ), 10, 3 );
        add_action( 'admin_init', array( $this, 'vc_shortcode_extend_prepare' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
    }

    /**
     * Enqueue admin scripts hook
     *
     * @param object $page - page data.
     */
    public function admin_enqueue_scripts( $page ) {
        if ( 'post.php' === $page || 'post-new.php' === $page ) {
            wp_enqueue_media();
            wp_enqueue_style( 'nk-awb-vc-attach-file', nk_awb()->plugin_url . 'assets/admin/vc_extend/vc-awb-attach-video.min.css', array(), '1.11.4' );
            wp_enqueue_style( 'nk-awb-vc-heading', nk_awb()->plugin_url . 'assets/admin/vc_extend/vc-awb-heading.min.css', array(), '1.11.4' );
            wp_enqueue_style( 'nk-awb-vc-icon', nk_awb()->plugin_url . 'assets/admin/vc_extend/vc-awb-icon.min.css', array(), '1.11.4' );
            wp_enqueue_script( 'nk-awb-vc-frontend', nk_awb()->plugin_url . 'assets/admin/vc_extend/vc-awb-frontend.min.js', array( 'jquery' ), '1.11.4', true );
        }
    }

    /**
     * VC control for video attach.
     *
     * @param array $settings - control settings.
     * @param mixed $value - control value.
     *
     * @return string
     */
    public function vc_control_awb_attach_video( $settings, $value ) {
        if ( $value && is_numeric( $value ) ) {
            $value = wp_get_attachment_url( $value );
            if ( ! $value ) {
                $value = '';
            }
        }

        return '<div class="awb_attach_video">
                    <input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value ' . esc_attr( $settings['param_name'] ) . ' ' . esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />
               </div>
               <input type="button" class="awb_attach_video_btn ' . ( $value ? 'awb_attach_video_btn_selected' : '' ) . ' button" data-select-title="' . esc_attr__( 'Select File', 'advanced-backgrounds' ) . '" data-remove-title="' . esc_attr__( '&times;', 'advanced-backgrounds' ) . '" value="' . ( $value ? esc_attr__( '&times;', 'advanced-backgrounds' ) : esc_attr__( 'Select File', 'advanced-backgrounds' ) ) . '">
               <small class="awb_attach_video_label">' . esc_html( basename( $value ) ) . '</small>';
    }

    /**
     * Add VC awb_heading control
     *
     * @param array $settings - control settings.
     *
     * @return string
     */
    public function vc_control_awb_heading( $settings ) {
        return '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value ' . esc_attr( $settings['param_name'] ) . ' ' . esc_attr( $settings['type'] ) . '_field" type="hidden" value="" />
                <div class="wpb_element_label awb_heading">' . esc_html( $settings['title'] ) . '</div>';
    }

    /**
     * Get Available Image Sizes + full
     */
    public static function get_image_sizes() {
        // @codingStandardsIgnoreLine
        $sizes = get_intermediate_image_sizes();
        array_unshift( $sizes, 'full' );
        return $sizes;
    }

    /**
     * Filter for vc_row output
     *
     * @param string $output - output row content.
     * @param object $obj - shortcode data.
     * @param array  $attr - shortcode attributes.
     *
     * @return string
     */
    public function vc_shortcode_output_filter( $output, $obj, $attr ) {
        if ( $obj->settings( 'base' ) === 'vc_row' ) {
            $attr['awb_after_vc_row'] = 'true';
            $output                  .= NK_AWB_Shortcode::get_shortcode_out( $attr, '' );
        } elseif ( $obj->settings( 'base' ) === 'vc_column' ) {
            $attr['awb_after_vc_column'] = 'true';
            $output                     .= NK_AWB_Shortcode::get_shortcode_out( $attr, '' );
        }
        return $output;
    }

    /**
     * Prepare VC Extend
     */
    public function vc_shortcode_extend_prepare() {
        // add new tab in vc_row.
        $this->vc_shortcode_extend_params( 'vc_row', esc_html__( 'Background [AWB]', 'advanced-backgrounds' ) );

        // add new tab in vc_column.
        $this->vc_shortcode_extend_params( 'vc_column', esc_html__( 'Background [AWB]', 'advanced-backgrounds' ) );

        // add new shortcode nk_awb.
        if ( function_exists( 'vc_map' ) ) {
            $shortcode_name  = 'nk_awb';
            $shortcode_group = esc_html__( 'General', 'advanced-backgrounds' );
            vc_map(
                array(
                    'name'              => esc_html__( 'Advanced WordPress Backgrounds', 'advanced-backgrounds' ),
                    'base'              => $shortcode_name,
                    'controls'          => 'full',
                    'icon'              => 'nk-awb-icon',
                    'is_container'      => true,
                    'js_view'           => 'VcColumnView',
                    'params'            => array(),
                )
            );
            $this->vc_shortcode_extend_params( $shortcode_name, $shortcode_group );

            if ( function_exists( 'vc_add_param' ) ) {
                vc_add_param(
                    $shortcode_name,
                    array(
                        'type'        => 'awb_heading',
                        'param_name'  => 'awb_heading__awb_custom_classes',
                        'title'       => esc_html__( 'Custom Classes', 'advanced-backgrounds' ),
                        'group'       => $shortcode_group,
                    )
                );
                vc_add_param(
                    $shortcode_name,
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'awb_class',
                        'heading'     => '',
                        'group'       => $shortcode_group,
                    )
                );
                vc_add_param(
                    $shortcode_name,
                    array(
                        'type'        => 'css_editor',
                        'heading'     => esc_html__( 'CSS', 'advanced-backgrounds' ),
                        'param_name'  => 'vc_css',
                        'group'       => esc_html__( 'Design Options', 'advanced-backgrounds' ),
                    )
                );
            }
        }
    }

    /**
     * Extend vc_row params
     *
     * @param string $element - shortcode name.
     * @param string $group_name - shortcode group name.
     */
    public function vc_shortcode_extend_params( $element, $group_name ) {
        if ( ! function_exists( 'vc_add_param' ) ) {
            return;
        }

        vc_add_param(
            $element,
            array(
                'type'             => 'dropdown',
                'param_name'       => 'awb_type',
                'heading'          => esc_html__( 'Background Type', 'advanced-backgrounds' ),
                'value'            => array(
                    esc_html__( 'None', 'advanced-backgrounds' )  => '',
                    esc_html__( 'Color', 'advanced-backgrounds' ) => 'color',
                    esc_html__( 'Image', 'advanced-backgrounds' ) => 'image',
                    esc_html__( 'YouTube / Vimeo', 'advanced-backgrounds' ) => 'yt_vm_video',
                    esc_html__( 'Self Hosted Video', 'advanced-backgrounds' ) => 'video',
                ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                'admin_label'      => true,
            )
        );

        // stretch.
        vc_add_param(
            $element,
            array(
                'type'             => 'checkbox',
                'param_name'       => 'awb_stretch',
                'heading'          => esc_html__( 'Stretch', 'advanced-backgrounds' ),
                'value'            => array( '' => true ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'not_empty'  => true,
                ),
            )
        );

        // Image.
        vc_add_param(
            $element,
            array(
                'type'        => 'awb_heading',
                'param_name'  => 'awb_heading__awb_image',
                'title'       => esc_html__( 'Image', 'advanced-backgrounds' ),
                'group'       => $group_name,
                'dependency'  => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'image' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'        => 'awb_heading',
                'param_name'  => 'awb_heading__awb_poster_image',
                'title'       => esc_html__( 'Poster Image', 'advanced-backgrounds' ),
                'group'       => $group_name,
                'dependency'  => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'yt_vm_video', 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'attach_image',
                'param_name'       => 'awb_image',
                'heading'          => '',
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'image', 'yt_vm_video', 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'dropdown',
                'param_name'       => 'awb_image_size',
                'heading'          => '',
                'group'            => $group_name,
                'std'              => 'full',
                'value'            => self::get_image_sizes(),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'       => array(
                    'element'    => 'awb_image',
                    'not_empty'  => true,
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'dropdown',
                'param_name'       => 'awb_image_background_size',
                'heading'          => '',
                'group'            => $group_name,
                'std'              => 'cover',
                'value'            => array(
                    esc_html__( 'Cover', 'advanced-backgrounds' ) => 'cover',
                    esc_html__( 'Contain', 'advanced-backgrounds' ) => 'contain',
                    esc_html__( 'Fill', 'advanced-backgrounds' )  => 'fill',
                    esc_html__( 'Pattern', 'advanced-backgrounds' ) => 'pattern',
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'       => array(
                    'element'    => 'awb_image',
                    'not_empty'  => true,
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'textfield',
                'param_name'       => 'awb_image_background_position',
                'heading'          => '',
                'description'      => esc_html__( 'Image position. Example: 50% 50%', 'advanced-backgrounds' ),
                'group'            => $group_name,
                'value'            => '50% 50%',
                'save_always'      => true,
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'       => array(
                    'element'    => 'awb_image',
                    'not_empty'  => true,
                ),
            )
        );

        // Video Youtube / Vimeo.
        vc_add_param(
            $element,
            array(
                'type'        => 'awb_heading',
                'param_name'  => 'awb_heading__awb_yt_vm_video',
                'title'       => esc_html__( 'Youtube / Vimeo', 'advanced-backgrounds' ),
                'group'       => $group_name,
                'dependency'  => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'yt_vm_video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'textfield',
                'param_name'       => 'awb_video',
                'heading'          => '',
                'description'      => esc_html__( 'Supported YouTube and Vimeo URLs', 'advanced-backgrounds' ),
                'group'            => $group_name,
                'value'            => 'https://vimeo.com/110138539',
                'edit_field_class' => 'vc_col-sm-6',
                'save_always'      => true,
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'yt_vm_video' ),
                ),
            )
        );

        // Self Hosted Video.
        vc_add_param(
            $element,
            array(
                'type'        => 'awb_heading',
                'param_name'  => 'awb_heading__awb_video',
                'title'       => esc_html__( 'Video', 'advanced-backgrounds' ),
                'group'       => $group_name,
                'dependency'  => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'awb_attach_video',
                'param_name'       => 'awb_video_mp4',
                'heading'          => esc_html__( 'MP4', 'advanced-backgrounds' ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-4',
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'awb_attach_video',
                'param_name'       => 'awb_video_webm',
                'heading'          => esc_html__( 'WEBM', 'advanced-backgrounds' ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-4',
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'awb_attach_video',
                'param_name'       => 'awb_video_ogv',
                'heading'          => esc_html__( 'OGV', 'advanced-backgrounds' ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-4',
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'checkbox',
                'param_name'       => 'awb_video_mobile',
                'heading'          => esc_html__( 'Enable on Mobile Devices', 'advanced-backgrounds' ),
                'value'            => array( '' => true ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'yt_vm_video', 'video' ),
                ),
            )
        );

        // Video Start / End Time.
        vc_add_param(
            $element,
            array(
                'type'             => 'textfield',
                'param_name'       => 'awb_video_start_time',
                'heading'          => esc_html__( 'Start Time', 'advanced-backgrounds' ),
                'description'      => esc_html__( 'Start time in seconds when video will be started (this value will be applied also after loop)', 'advanced-backgrounds' ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'yt_vm_video', 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'textfield',
                'param_name'       => 'awb_video_end_time',
                'heading'          => esc_html__( 'End Time', 'advanced-backgrounds' ),
                'description'      => esc_html__( 'End time in seconds when video will be ended', 'advanced-backgrounds' ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'yt_vm_video', 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'checkbox',
                'param_name'       => 'awb_video_always_play',
                'heading'          => esc_html__( 'Always play', 'advanced-backgrounds' ),
                'description'      => esc_html__( 'Play video also when not in viewport.', 'advanced-backgrounds' ),
                'value'            => array( '' => true ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'yt_vm_video', 'video' ),
                ),
            )
        );

        // Color.
        vc_add_param(
            $element,
            array(
                'type'        => 'awb_heading',
                'param_name'  => 'awb_heading__awb_color',
                'title'       => esc_html__( 'Color', 'advanced-backgrounds' ),
                'group'       => $group_name,
                'dependency'  => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'color' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'        => 'awb_heading',
                'param_name'  => 'awb_heading__awb_color_overlay',
                'title'       => esc_html__( 'Overlay Color', 'advanced-backgrounds' ),
                'group'       => $group_name,
                'dependency'  => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'image', 'yt_vm_video', 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'        => 'colorpicker',
                'param_name'  => 'awb_color',
                'heading'     => '',
                'value'       => '',
                'group'       => $group_name,
                'dependency'  => array(
                    'element'    => 'awb_type',
                    'not_empty'  => true,
                ),
            )
        );

        // Parallax.
        vc_add_param(
            $element,
            array(
                'type'        => 'awb_heading',
                'param_name'  => 'awb_heading__awb_parallax',
                'title'       => esc_html__( 'Parallax', 'advanced-backgrounds' ),
                'group'       => $group_name,
                'dependency'  => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'image', 'yt_vm_video', 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'dropdown',
                'param_name'       => 'awb_parallax',
                'heading'          => esc_html__( 'Type', 'advanced-backgrounds' ),
                'value'            => array(
                    esc_html__( 'Disabled', 'advanced-backgrounds' ) => '',
                    esc_html__( 'Scroll', 'advanced-backgrounds' ) => 'scroll',
                    esc_html__( 'Scale', 'advanced-backgrounds' ) => 'scale',
                    esc_html__( 'Opacity', 'advanced-backgrounds' ) => 'opacity',
                    esc_html__( 'Opacity + Scroll', 'advanced-backgrounds' ) => 'scroll-opacity',
                    esc_html__( 'Opacity + Scale', 'advanced-backgrounds' ) => 'scale-opacity',
                ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-4',
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'image', 'yt_vm_video', 'video' ),
                ),
                'admin_label'      => true,
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'textfield',
                'param_name'       => 'awb_parallax_speed',
                'heading'          => esc_html__( 'Speed', 'advanced-backgrounds' ),
                'description'      => esc_html__( 'Provide number from -1.0 to 2.0', 'advanced-backgrounds' ),
                'value'            => 0.5,
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-4',
                'dependency'       => array(
                    'element'    => 'awb_parallax',
                    'not_empty'  => true,
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'checkbox',
                'param_name'       => 'awb_parallax_mobile',
                'heading'          => esc_html__( 'Enable on Mobile Devices', 'advanced-backgrounds' ),
                'value'            => array( '' => true ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-4',
                'dependency'       => array(
                    'element'    => 'awb_parallax',
                    'not_empty'  => true,
                ),
            )
        );

        // Mouse Parallax.
        vc_add_param(
            $element,
            array(
                'type'        => 'awb_heading',
                'param_name'  => 'awb_heading__awb_mouse_parallax',
                'title'       => esc_html__( 'Mouse Parallax', 'advanced-backgrounds' ),
                'group'       => $group_name,
                'dependency'  => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'image', 'yt_vm_video', 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'checkbox',
                'param_name'       => 'awb_mouse_parallax',
                'heading'          => esc_html__( 'Enable', 'advanced-backgrounds' ),
                'value'            => array( '' => true ),
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-4',
                'dependency'       => array(
                    'element'    => 'awb_type',
                    'value'      => array( 'image', 'yt_vm_video', 'video' ),
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'textfield',
                'param_name'       => 'awb_mouse_parallax_size',
                'heading'          => esc_html__( 'Size', 'advanced-backgrounds' ),
                'description'      => esc_html__( 'pixels', 'advanced-backgrounds' ),
                'value'            => 30,
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-4',
                'dependency'       => array(
                    'element'    => 'awb_mouse_parallax',
                    'not_empty'  => true,
                ),
            )
        );
        vc_add_param(
            $element,
            array(
                'type'             => 'textfield',
                'param_name'       => 'awb_mouse_parallax_speed',
                'heading'          => esc_html__( 'Speed', 'advanced-backgrounds' ),
                'description'      => esc_html__( 'milliseconds', 'advanced-backgrounds' ),
                'value'            => 10000,
                'group'            => $group_name,
                'edit_field_class' => 'vc_col-sm-4',
                'dependency'       => array(
                    'element'    => 'awb_mouse_parallax',
                    'not_empty'  => true,
                ),
            )
        );
    }
}

// extend vc controls for nk_awb shortcode.
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    // @codingStandardsIgnoreLine
    class WPBakeryShortCode_nk_awb extends WPBakeryShortCodesContainer {

    }
}
