<?php
/**
 * Display share options
 * 
 * @param string $type 
 */
function fl_share($type = 'fb') {
    echo fl_get_share($type);
}

/**
 * Get link for sharing
 * 
 * @param string $type
 * @return string
 */
function fl_get_share($type = 'fb', $permalink = false, $title = false) {
    if (!$permalink) {
        $permalink = get_permalink();
    }
    if (!$title) {
        $title = get_the_title();
    }

global $post;
    $excerpt = get_the_excerpt();
    $image_url = get_the_post_thumbnail_url($post->ID,'full');

    switch ($type) {
        case 'twi':
            return 'http://twitter.com/home?status=' . esc_attr($title) . '+-+' . esc_url($permalink);
            break;
        case 'fb':
            return 'http://www.facebook.com/sharer.php?u=' . esc_url($permalink) . '&t=' . esc_attr($title);
            break;
        case 'goglp':
            return 'https://plus.google.com/share?url='. urlencode(esc_url($permalink));
            break;
        case 'vk':
            return 'http://vkontakte.ru/share.php?url='. urlencode(esc_url($permalink)).'&title='.esc_attr($title).'&description='.esc_attr($excerpt);
            break;
        case 'pin':
            return 'http://pinterest.com/pin/create/button/?url='. urlencode(esc_url($permalink)).'&description='.esc_attr($excerpt).'&media='.urlencode(esc_url($image_url));
            break;
        case 'red':
            return 'http://reddit.com/submit?url='. urlencode(esc_url($permalink)).'&title='.esc_attr($title);
            break;
        case 'lin':
            return 'https://www.linkedin.com/shareArticle?mini=true&url='. urlencode(esc_url($permalink)).'&title='.esc_attr($title).'&summary='.esc_attr($excerpt);
            break;
        default:
            return '';
    }
}
