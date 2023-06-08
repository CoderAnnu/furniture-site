<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package empelza
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if (!function_exists('empelza_body_classes')) :
    function empelza_body_classes($classes)
    {
        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $classes[] = 'hfeed';
        }
        // Menu left fixed width.


        return $classes;
    }
endif;
add_filter('body_class', 'empelza_body_classes');
/**
 * Sanitizes a html classname to ensure it only contains valid characters.
 * */
if (!function_exists( 'empelza_sanitize_class' )) :
    function empelza_sanitize_class($classes)
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
endif;

if (!function_exists( 'empelza_pvc_hook' )) :
    function empelza_pvc_hook($arg)
    {
        if (get_post_type() == 'post') {
            $arg = "";
        }

        return $arg;
    }
endif;
add_filter('pvc_shortcode_filter_hook', 'empelza_pvc_hook');



/**
 * Get Attachment Attribute for Images
 */
if (!function_exists( 'empelza_get_attachment' )) :
    function empelza_get_attachment($attachment_id, $attachment_size = 'full')
    {
// is url
        if (filter_var($attachment_id, FILTER_VALIDATE_URL)) {
            $path_to_image = $attachment_id;
            $attachment_id = attachment_url_to_postid($attachment_id);
            if (is_numeric($attachment_id) && $attachment_id == 0) {
                return array(
                    'alt' => null,
                    'caption' => null,
                    'description' => null,
                    'href' => null,
                    'src' => $path_to_image,
                    'title' => null,
                    'width' => null,
                    'height' => null,
                );
            }
        }

// is numeric
        if (is_numeric($attachment_id) && $attachment_id !== 0) {
            $attachment = get_post($attachment_id);
            if(is_object($attachment)) {
                $attachment_src = array();
                if (isset($attachment_size)) {
                    $attachment_src = wp_get_attachment_image_src($attachment_id, $attachment_size);
                }
                return array(
                    'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
                    'caption' => $attachment->post_excerpt,
                    'description' => $attachment->post_content,
                    'href' => get_permalink($attachment->ID),
                    'src' => isset($attachment_src[0]) ? $attachment_src[0] : $attachment->guid,
                    'title' => $attachment->post_title,
                    'width' => isset($attachment_src[1]) ? $attachment_src[1] : false,
                    'height' => isset($attachment_src[2]) ? $attachment_src[2] : false,
                );
            }
        }
        return false;
    }
endif;
/* get_intermediate_image_sizes() without keys */
if (!function_exists( 'empelza_get_image_sizes' )) :
    function empelza_get_image_sizes() {
        $sizes = get_intermediate_image_sizes();
        $result = array('full' => 'full');
        foreach($sizes as $k => $name) {
            $result[$name] = $name;
        }
        return $result;
    }
endif;

/**
 * Get all terms for post vc_templates
 */
if (!function_exists( 'empelza_get_terms' )) :
    function empelza_get_terms()
    {
        $terms_list_vc = array();
        $terms_list = get_terms(get_object_taxonomies(get_post_types(array(
            'public' => false,
            'name' => 'attachment',
        ), 'names', 'NOT')));
        foreach ($terms_list as $term) {
            $terms_list_vc[] = array(
                "value" => $term->term_id,
                "label" => $term->name,
                "group" => $term->taxonomy
            );
        }

        return $terms_list_vc;
    }
endif;

/**
 * Responsive video embed
 */
add_filter('embed_oembed_html', 'empelza_oembed_filter', 10, 4);
if (!function_exists( 'empelza_oembed_filter' )) :
    function empelza_oembed_filter($html, $url, $attr, $post_ID)
    {
        $classes = '';
        if (strpos($url, 'youtube') > 0 || strpos($url, 'youtu.be') > 0) {
            $classes .= ' responsive-embed responsive-embed-16x9 embed-youtube';
        } else if (strpos($url, 'vimeo') > 0) {
            $classes .= ' responsive-embed responsive-embed-16x9 embed-vimeo';
        } else if (strpos($url, 'twitter') > 0) {
            $classes .= ' embed-twitter';
        }

        $return = '<div class="' . empelza_sanitize_class($classes) . '">' . $html . '</div>';
        return $return;
    }
endif;


// define the previous_comments_link_attributes callback
if (!function_exists('empelza_filter_previous_comments_link_attributes')):
    function empelza_filter_previous_comments_link_attributes( $var ) {
        $var='class="fl-pagination-prev"';
        return $var;
    }
endif;

if (!function_exists('empelza_filter_next_comments_link_attributes')):
    function empelza_filter_next_comments_link_attributes( $var ) {
        $var='class="fl-pagination-next"';
        return $var;
    }
endif;
// add the filter
add_filter( 'previous_comments_link_attributes', 'empelza_filter_previous_comments_link_attributes', 10, 1 );
add_filter( 'next_comments_link_attributes', 'empelza_filter_next_comments_link_attributes', 10, 1 );
if (!function_exists( 'empelza_password_form' )):
    function empelza_password_form() {
        global $post;
        $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
        $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="fl-form-password-protected validate cf"><div class="fl-input-group"><input name="post_password" id="' . $label . '" type="password" class="form-control required" placeholder = "'.esc_html__('Password', 'empelza').'"/><button class="fl-custom-btn primary-style"><span>'.esc_html__( "Enter", 'empelza' ).'</span></button></div><small>' . esc_html__( "To view this protected post, enter the password below", 'empelza' ) . '</small> </form>
        ';
        return $o;
    }
endif;
add_filter( 'the_password_form', 'empelza_password_form' );
