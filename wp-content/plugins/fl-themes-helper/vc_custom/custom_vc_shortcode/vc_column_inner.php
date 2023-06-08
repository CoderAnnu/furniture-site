<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $el_id
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_Inner
 */
global $fl_helping_responsive_style;
$el_class = $width = $el_id = $css = $offset =$column_css_classes[]= '';
$output = $responsive_style = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ),
	'wpb_column',
	'vc_column_container',
	$width,
);

// Responsive CSS Box
if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
    if( !empty( $responsive_css ) ) {
        $responsive_id = $idf = uniqid('fl-helping-column-inner-responsive-').'-'.rand(100,9999);
        $column_selector = $responsive_id;
        $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
        $css_classes[] = $responsive_id;
    }
}

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_col-has-fill';
}



$wrapper_attributes = array();

if ( ! empty( $column_inner_animation ) and ( $column_inner_animation !='none')) {

    $css_classes[]          = 'fl-animated-item-velocity';
    $wrapper_attributes[]   = 'data-animate-type="'.$column_inner_animation.'"';

    if ( ! empty( $column_inner_custom_delay ) and ( $column_inner_custom_delay !='off')) {
        if ( ! empty( $column_inner_animation_delay ) and ($column_inner_animation_delay !='')) {
            $wrapper_attributes[]   = 'data-item-delay="'.$column_inner_animation_delay .'"';
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
    $column_css_classes[] = $z_index;
}


$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$column_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $column_css_classes ) ) ) );


$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="' . esc_attr( trim( $column_css_class ) ) .' vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '">';
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
