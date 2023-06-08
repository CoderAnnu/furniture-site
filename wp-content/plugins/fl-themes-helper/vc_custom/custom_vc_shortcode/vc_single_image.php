<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $source
 * @var $image
 * @var $custom_src
 * @var $onclick
 * @var $img_size
 * @var $external_img_size
 * @var $caption
 * @var $img_link_large
 * @var $link
 * @var $img_link_target
 * @var $alignment
 * @var $external_style
 * @var $border_color
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Single_image
 */

global $fl_helping_responsive_style;
$title = $source = $image = $custom_src = $onclick = $img_size = $external_img_size = $css_classes[] = $wrapper_attributes[] = $mask = $bg_mask = $img_effects =
$responsive_style =  $img_link_large = $link = $img_link_target = $alignment = $el_class = $el_id =$css = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$default_src = vc_asset_url( 'vc/no_image.png' );




    $css_classes[] .= fl_get_css_tab_class($atts);

    if(isset($id) && $id != '') {
        $wrapper_attributes[] .= 'id="'.fl_sanitize_class($id).'"';
    }

    if(isset($class) && $class != '') {
        $css_classes[] .= fl_sanitize_class($class);
    }

    // Responsive CSS Box
    if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
        if( !empty( $responsive_css ) && $responsive_css != '' ) {
            $responsive_id = $idf = uniqid('fl-helping-btn-responsive-').'-'.rand(100,9999);
            $column_selector = $responsive_id;
            $responsive_style = fl_helping__addons_get_responsive_style($responsive_css, $column_selector);
            $css_classes[] .= $responsive_id;
        }
    }

    // Animation option

if ( ! empty( $animation ) and ( $animation !='none')) {

    $css_classes[]          = 'fl-animated-item-velocity';
    $wrapper_attributes[]   = 'data-animate-type="'.$animation.'"';

    if ( ! empty( $custom_delay ) and ( $custom_delay !='off')) {
        if ( ! empty( $animation_delay ) and ($animation_delay !='')) {
            $wrapper_attributes[]   = 'data-item-delay="'.$animation_delay .'"';
        }
    }
}

// Bg Position Option
if ( ! empty( $desktop_bg_image_position ) and $desktop_bg_image_position !='' ) {
    $css_classes[] = $desktop_bg_image_position;
}
// Min Height Option
if ( ! empty( $desktop_height ) and $desktop_height !='' ) {
    $wrapper_attributes[]   = 'style="min-height:'.$desktop_height.';"';
}




// backward compatibility. since 4.6
if ( empty( $onclick ) && isset( $img_link_large ) && 'yes' === $img_link_large ) {
	$onclick = 'img_link_large';
} elseif ( empty( $atts['onclick'] ) && ( ! isset( $atts['img_link_large'] ) || 'yes' !== $atts['img_link_large'] ) ) {
	$onclick = 'custom_link';
}


$img = false;

switch ( $source ) {
	case 'media_library':
	case 'featured_image':

		if ( 'featured_image' === $source ) {
			$post_id = get_the_ID();
			if ( $post_id && has_post_thumbnail( $post_id ) ) {
				$img_id = get_post_thumbnail_id( $post_id );
			} else {
				$img_id = 0;
			}
		} else {
			$img_id = preg_replace( '/[^\d]/', '', $image );
		}

		// set rectangular

		if ( ! $img_size ) {
			$img_size = 'medium';
		}

		$img = wpb_getImageBySize( array(
			'attach_id' => $img_id,
			'thumb_size' => $img_size,
			'class' => 'vc_single_image-img',
		) );

		// don't show placeholder in public version if post doesn't have featured image
		if ( 'featured_image' === $source ) {
			if ( ! $img && 'page' === vc_manager()->mode() ) {
				return;
			}
		}

		break;

	case 'external_link':
		$dimensions = vcExtractDimensions( $external_img_size );
		$hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';

		$custom_src = $custom_src ? esc_attr( $custom_src ) : $default_src;

		$img = array(
			'thumbnail' => '<img class="vc_single_image-img" ' . $hwstring . ' src="' . $custom_src . '" />',
		);
		break;

	default:
		$img = false;
}

if ( ! $img ) {
	$img['thumbnail'] = '<img class="vc_img-placeholder vc_single_image-img" src="' . $default_src . '" />';
}


// backward compatibility. will be removed in 4.7+
if ( ! empty( $atts['img_link'] ) ) {
	$link = $atts['img_link'];
	if ( ! preg_match( '/^(https?\:\/\/|\/\/)/', $link ) ) {
		$link = 'http://' . $link;
	}
}

// backward compatibility
if ( in_array( $link, array( 'none', 'link_no' ) ) ) {
	$link = '';
}

$a_attrs = array();

switch ( $onclick ) {

	case 'link_image':
		wp_enqueue_script( 'prettyphoto' );
		wp_enqueue_style( 'prettyphoto' );

		$a_attrs['class'] = 'prettyphoto';
		$a_attrs['data-rel'] = 'prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']';

		// backward compatibility
		if ( 'external_link' === $source ) {
			$link = $custom_src;
		} else {
			$link = wp_get_attachment_image_src( $img_id, 'large' );
			$link = $link[0];
		}

		break;

	case 'custom_link':
		// $link is already defined
		break;


    case 'magnific_popup':

       if ( 'external_link' === $source ) {
            $link = $custom_src;
        } else {
            $link = wp_get_attachment_image_src( $img_id, 'large' );
            $link = $link[0];
        }

        $css_classes[] .= 'fl-magic-popup fl-single-popup ';
        break;
}

$wrapperClass = 'vc_single_image-wrapper '.$img_effects .' ';

if ( $link ) {
	$a_attrs['href'] = $link;
	$a_attrs['target'] = $img_link_target;
	if ( ! empty( $a_attrs['class'] ) ) {
		$wrapperClass .= ' ' . $a_attrs['class'];
		unset( $a_attrs['class'] );
	}
	$html = '<a ' . vc_stringify_attributes( $a_attrs ) . ' class="' . $wrapperClass . '">'.$mask . $img['thumbnail'] . '</a>';
} else {
	$html = '<div class="' . $wrapperClass . '">' .$mask . $img['thumbnail'] . '</div>';
}

$class_to_filter = 'wpb_single_image vc_align_' . $alignment . ' ';

$css_classes[] .= apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );




$result = '<div ' . implode( ' ', $wrapper_attributes ) . ' class="'. implode(' ', $css_classes).'">
                <div class="wpb_wrapper vc_figure">
			        ' . $html . '
		        </div> 
		   </div>';
    // Responsive CSS Box
    if(isset($custom_responsive_option) && $custom_responsive_option !='off') {
        $fl_helping_responsive_style .= $responsive_style;
    }

    if(isset($css) && $css !='') {

        $result .='<script type="text/javascript">'
            . '(function($) {'
            . '$("head").append("<style>'.$css.'</style>");'
            . '})(jQuery);'
            . '</script>';
    }


echo $result;
