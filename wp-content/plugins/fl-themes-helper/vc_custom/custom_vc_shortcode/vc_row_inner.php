<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css
 * @var $el_id
 * @var $equal_height
 * @var $content_placement
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row_Inner
 */

global $fl_helping_responsive_style;

$el_class = $equal_height = $content_placement = $css = $el_id = '';
$disable_element = $responsive_style = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );
$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_inner',
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);


// Responsive CSS Box
if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
    if( !empty( $responsive_css ) ) {
        $responsive_id = $idf = uniqid('fl-helping-row-inner-responsive-').'-'.rand(100,9999);
        $column_selector = $responsive_id;
        $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
        $css_classes[] = $responsive_id;
    }
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
) ) ) {
	$css_classes[] = 'vc_row-has-fill';
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
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

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}



if ( ! empty( $row_inner_animation ) and ($row_inner_animation !='none')) {

    $css_classes[]          = 'fl-animated-item-velocity';
    $wrapper_attributes[]   = 'data-animate-type="'.$row_inner_animation.'"';

    if ( ! empty( $row_inner_custom_delay ) and ( $row_inner_custom_delay !='off')) {
        if ( ! empty( $row_inner_animation_delay) and ($row_inner_animation_delay !='')) {
            $wrapper_attributes[]   = 'data-item-delay="'.$row_inner_animation_delay .'"';
        }
    }
}

if ( ! empty( $desktop_bg_image_position ) and $desktop_bg_image_position !='' ) {
    $css_classes[] = $desktop_bg_image_position;
}

if ( ! empty( $desktop_height ) and $desktop_height !='' ) {
    $wrapper_attributes[]   = 'style="min-height:'.$desktop_height.';"';
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
