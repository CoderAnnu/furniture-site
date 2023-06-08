<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
global $fl_helping_responsive_style,$fl_helping_css_style;

$el_class = $full_height = $data_animation_delay = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = $vc_css = $responsive_css = $output = $after_output = $responsive_style = $custom_css_row = $fl_gradient=$opacity_gr_bg ='';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'vc_row',
    'wpb_row',
    //deprecated
    'vc_row-fluid',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);




// Responsive CSS Box
if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
    if( !empty( $responsive_css ) ) {
        $responsive_id = uniqid('fl-helping-row-responsive-').'-'.rand(100,9999);
        $column_selector = $responsive_id;
        $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
        $css_classes[] = $responsive_id;
    }
}

// Box Shadow
if ( ! empty( $box_shadow_param ) and $box_shadow_param !='' ) {
    $box_shadow_html = uniqid('fl-box-shadow-row-').'-'.rand(100,9999);
    $css_classes[] = $box_shadow_html;
    $fl_helping_css_style[] = '.' . $box_shadow_html . ' {'. $box_shadow_param. '}';
}

if ( ! empty( $row_top ) and $row_top !='' ) {
    $row_custom_html = uniqid('fl-custom-html-row-').'-'.rand(100,9999);
    $css_classes[] = $row_custom_html;
    $fl_helping_css_style[] = '.' . $row_custom_html . ' {top:'. $row_top. 'px;position:relative;}';
}

if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
    } else {
        return '';
    }
}

if ( vc_shortcode_custom_css_has_property( $css, array(
        'border',
        'background',
    ) ) || $video_bg || $parallax
) {
    $css_classes[] = 'vc_row-has-fill';
}

if ( ! empty( $atts['gap'] ) ) {
    $css_classes[] = 'vc_column-gap-' . $atts['gap'];
}



$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
    $wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

if ( ! empty( $full_width ) ) {
    $wrapper_attributes[] = 'data-vc-full-width="true"';
    $wrapper_attributes[] = 'data-vc-full-width-init="false"';
    if ( 'stretch_row_content' === $full_width ) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
    } elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
        $css_classes[] = 'vc_row-no-padding';
    }
    $after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}



if ( ! empty( $full_height ) ) {
    $css_classes[] = 'vc_row-o-full-height';
    if ( ! empty( $columns_placement ) ) {
        $flex_row = true;
        $css_classes[] = 'vc_row-o-columns-' . $columns_placement;
        if ( 'stretch' === $columns_placement ) {
            $css_classes[] = 'vc_row-o-equal-height';
        }
    }
}

if ( ! empty( $equal_height ) ) {
    $flex_row = true;
    $css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
    $flex_row = true;
    $css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
    $css_classes[] = 'vc_row-flex';
}



$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
    $parallax = $video_bg_parallax;
    $parallax_speed = $parallax_speed_video;
    $parallax_image = $video_bg_url;
    $css_classes[] = 'vc_video-bg-container';
    wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
    wp_enqueue_script( 'vc_jquery_skrollr_js' );
    $wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
    $css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
    if ( false !== strpos( $parallax, 'fade' ) ) {
        $css_classes[] = 'js-vc_parallax-o-fade';
        $wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
    } elseif ( false !== strpos( $parallax, 'fixed' ) ) {
        $css_classes[] = 'js-vc_parallax-o-fixed';
    }
}

if ( ! empty( $parallax_image ) ) {
    if ( $has_video_bg ) {
        $parallax_image_src = $parallax_image;
    } else {
        $parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
        $parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
        if ( ! empty( $parallax_image_src[0] ) ) {
            $parallax_image_src = $parallax_image_src[0];
        }
    }
    $wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
    $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}



if ( ! empty( $row_animation ) and ($row_animation !='none')) {

    $css_classes[]          = 'fl-animated-item-velocity';
    $wrapper_attributes[]   = 'data-animate-type="'.$row_animation.'"';

    if ( ! empty( $row_custom_delay ) and ( $row_custom_delay !='off')) {
        if ( ! empty( $row_animation_delay ) and ($row_animation_delay !='')) {
            $wrapper_attributes[]   = 'data-item-delay="'.$row_animation_delay .'"';
        }
    }
}

if ( ! empty( $desktop_bg_image_position ) and $desktop_bg_image_position !='' ) {
    $css_classes[] = $desktop_bg_image_position;
}

if ( ! empty( $desktop_height ) and $desktop_height !='' ) {
    $wrapper_attributes[]   = 'style="min-height:'.$desktop_height.';"';
}

if ( ! empty( $fl_overflow_type ) and ($fl_overflow_type =='overflow-visible')) {
    $wrapper_attributes[]   = 'data-row-overflow-visible="true"';
}elseif ( ! empty( $fl_overflow_type ) and ($fl_overflow_type =='overflow-auto')){
    $wrapper_attributes[]   = 'data-row-overflow-visible-auto="true"';
}elseif ( ! empty( $fl_overflow_type ) and ($fl_overflow_type =='overflow-hidden')){
    $wrapper_attributes[]   = 'data-row-overflow-visible-hidden="true"';
}

if ( ! empty( $z_index ) and $z_index !='' ) {
    $css_classes[] = $z_index;
}



$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );

$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

$output .= wpb_js_remove_wpautop( $content );

$output .= '</div>';

$output .= $after_output;




// Responsive CSS Box
    if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
        $fl_helping_responsive_style .= $responsive_style;
    }

echo $output;