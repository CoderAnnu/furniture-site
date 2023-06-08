<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
global $fl_helping_responsive_style,$fl_helping_css_style;
$el_class = $el_id = $width = $parallax_speed_bg = $parallax_speed_video = $parallax = $parallax_image = $video_bg = $video_bg_url = $video_bg_parallax = $css = $offset = $css_animation = '';
$output = $responsive_style = $responsive_id =$column_css_classes[]='';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	$width,
);
// Responsive CSS Box
if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
    if( !empty( $responsive_css ) ) {
        $responsive_id = $idf = uniqid('fl-helping-column-responsive-').'-'.rand(100,9999);
        $column_selector = $responsive_id;
        $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
    }
}

// Box Shadow
if ( ! empty( $box_shadow_param ) and $box_shadow_param !='' ) {
    $box_shadow_html = uniqid('tvk-box-shadow-column-').'-'.rand(100,9999);
    $css_classes[] = $box_shadow_html;
    $fl_helping_css_style[] = '.' . $box_shadow_html . ' {'. $box_shadow_param. '}';
}
// Gradient
if ( ! empty( $gr_color_start ) && $gr_color_start!='' && ! empty( $gr_color_end ) && $gr_color_end!='') {
    $gradient_html = uniqid('fl-gradient-column-').'-'.rand(100,9999);
    $css_classes[] = $gradient_html;
    $fl_helping_css_style[] = '.' . $gradient_html . ' >.vc_column-inner{background-image: linear-gradient(to right, '.$gr_color_start.' 0%, '.$gr_color_end.' 100%)!important;}';
}

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_col-has-fill';
}

$wrapper_attributes = array();

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



if ( ! empty( $column_animation ) and ( $column_animation !='none')) {

    $css_classes[]          = 'fl-animated-item-velocity';
    $wrapper_attributes[]   = 'data-animate-type="'.$column_animation.'"';

    if ( ! empty( $column_custom_delay ) and ( $column_custom_delay !='off')) {
        if ( ! empty( $column_animation_delay ) and ($column_animation_delay !='')) {
            $wrapper_attributes[]   = 'data-item-delay="'.$column_animation_delay .'"';
        }
    }
}

if ( ! empty( $desktop_bg_image_position ) and $desktop_bg_image_position !='' ) {
    $column_css_classes[] = $desktop_bg_image_position;
}

if ( ! empty( $desktop_height ) and $desktop_height !='' ) {
    $wrapper_attributes[]   = 'style="min-height:'.$desktop_height.';"';
}

if ( ! empty( $z_index ) and $z_index !='' ) {
    $css_classes[] = $z_index;
}


$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );

$column_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $column_css_classes ) ) ) );


$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="' . esc_attr( trim( $column_css_class ) ) .' vc_column-inner '.$responsive_id.' ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '">';
$output .= '<div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

// Responsive CSS Box
if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
    $fl_helping_responsive_style .= $responsive_style;
}

echo $output;
