<?php
/**
 * Custom User Contact methods
 */

    add_filter('user_contactmethods', 'fl_add_contact_info');

    if (!function_exists('fl_add_contact_info')) {

        function fl_add_contact_info($contact_info)
        {
            $contact_info['facebook']       = esc_html__('Facebook Username', 'fl-themes-helper');
            $contact_info['google']         = esc_html__('Google Plus Username', 'fl-themes-helper');
            $contact_info['instagram']      = esc_html__('Instagram Username', 'fl-themes-helper');
            $contact_info['pinterest']      = esc_html__('Pinterest Username', 'fl-themes-helper');
            $contact_info['twitter']        = esc_html__('Twitter Username', 'fl-themes-helper');
            $contact_info['behance']        = esc_html__('Behance Username', 'fl-themes-helper');
            $contact_info['phone']          = esc_html__('Phone Number', 'fl-themes-helper');
            return $contact_info;
        }

    }

// Instagram
function fl_theme_helper_instagram_api_curl_connect( $api_url ){
    $connection_c = curl_init(); // initializing
    curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
    curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
    curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
    $json_return = curl_exec( $connection_c ); // connect and get json data
    curl_close( $connection_c ); // close connection
    return json_decode( $json_return ); // decode and return
}


/**
 * Custom Excerpt length
 */
function fl_limit_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}
/**
 * Custom Pagination
 */
function fl_custom_pagination($pages = '', $range = 2)
{

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {

        if($paged > 1  ) echo "<a href='".get_pagenum_link($paged - 1)."' class='page-numbers'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></a>";

        if($paged > 2 && $paged > $range+1 && $range < $pages) echo "<a href='".get_pagenum_link(1)."' class='page-numbers'>1</a>";
        if($paged > 2 && $paged > $range+2 && $range < $pages) echo "<span class='page-numbers dots'>…</span>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $range ))
            {
                echo ($paged == $i)? "<span class=\"page-numbers current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"page-numbers\">".$i."</a>";
            }
        }
        if ($paged < $pages-1 &&  $paged+$range+1 < $pages && $range+1 < $pages ) echo "<span class='page-numbers dots'>…</span>";
        if ($paged < $pages-1 &&  $paged+$range < $pages && $range+1 < $pages ) echo "<a href='".get_pagenum_link($pages)."' class=\"page-numbers\">".$pages."</a>";

        if ($paged < $pages ) echo "<a href=\"".get_pagenum_link($paged + 1)."\" class=\"page-numbers\"><i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i></a>";
    }
}


/* get_intermediate_image_sizes() without keys */
if (!function_exists( 'fl_get_image_sizes' )) :
    function fl_get_image_sizes() {
        $sizes = get_intermediate_image_sizes();
        $result = array('full' => 'full');
        foreach($sizes as $k => $name) {
            $result[$name] = $name;
        }
        return $result;
    }
endif;


/**
 * Get Attachment Attribute for Images
 */
if (!function_exists( 'fl_get_attachment' )) :
    function fl_get_attachment($attachment_id, $attachment_size = 'full')
    {
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


function fl_post_taxonomy($post_id, $taxonomy, $delimiter = ', ', $get = 'name', $link = true)
{
    $tags = wp_get_post_terms($post_id, $taxonomy);
    $list = '';
    foreach ($tags as $tag) {
        if ($link) {
            $list .= '<a href="' . get_term_link($tag->term_id) . '">' . $tag->$get . '</a>' . $delimiter;
        } else {
            $list .= $tag->$get . $delimiter;
        }
    }
    return substr($list, 0, strlen($delimiter) * (-1));
}


function fl_wp_kses($fl_string){
    $allowed_tags = array(
        'img' => array(
            'src' => array(),
            'alt' => array(),
            'width' => array(),
            'height' => array(),
            'class' => array(),
        ),
        'a' => array(
            'href' => array(),
            'title' => array(),
            'class' => array(),
        ),
        'span' => array(
            'class' => array(),
        ),
        'div' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h1' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h2' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h3' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h4' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h5' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h6' => array(
            'class' => array(),
            'id' => array(),
        ),
        'p' => array(
            'class' => array(),
            'id' => array(),
        ),
        'strong' => array(
            'class' => array(),
            'id' => array(),
        ),
        'i' => array(
            'class' => array(),
            'id' => array(),
        ),
        'del' => array(
            'class' => array(),
            'id' => array(),
        ),
        'ul' => array(
            'class' => array(),
            'id' => array(),
        ),
        'li' => array(
            'class' => array(),
            'id' => array(),
        ),
        'ol' => array(
            'class' => array(),
            'id' => array(),
        ),
        'input' => array(
            'class' => array(),
            'id' => array(),
            'type' => array(),
            'style' => array(),
            'name' => array(),
            'value' => array(),
        ),
    );
    if (function_exists('wp_kses')) {
        return wp_kses($fl_string,$allowed_tags);
    }
}









add_filter('style_loader_tag', 'fl_fixed_validator_error', 10, 2);
add_filter('script_loader_tag', 'fl_fixed_validator_error', 10, 2);
add_filter('wp_print_footer_scripts ', 'fl_fixed_validator_error', 10, 2);
function fl_fixed_validator_error($tag) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}



// Generate custom css option vc
if( ! function_exists( 'fl_helping_generate_custom_css' ) ) {
    function fl_helping_generate_custom_css() {
        global $fl_helping_responsive_style , $fl_helping_css_style;

        // Custom Css
        $output_css_style = '';
        if( !empty($fl_helping_css_style)) {
            ob_start();
            echo '<style id="fl-helping-custom-vc-css" type="text/css">';
            foreach ($fl_helping_css_style as $key => $value) {
                echo $value;
            }
            echo '</style>';
            $output_css_style = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_css_style = preg_replace( '#/\*.*?\*/#s', '', $output_css_style );
            $output_css_style = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css_style );
            $output_css_style = preg_replace( '/\s\s+(.*)/', '$1', $output_css_style );

            ?>
            <script type="text/javascript"> (function($) { $('head').append('<?php print $output_css_style; ?>'); })(jQuery); </script>
            <?php
        }
        // Custom Css Resonsive Style
        if( !empty( $fl_helping_responsive_style ) ) {
            $output_responsive_css = '';
            ob_start();
            echo '<style id="fl-helping-custom-responsive-css" type="text/css">';
            echo $fl_helping_responsive_style;
            echo '</style>';
            $output_responsive_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_responsive_css = preg_replace( '#/\*.*?\*/#s', '', $output_responsive_css );
            $output_responsive_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_responsive_css );
            $output_responsive_css = preg_replace( '/\s\s+(.*)/', '$1', $output_responsive_css );

            ?>
            <script type="text/javascript"> (function($) { $('head').append('<?php print $output_responsive_css ?>'); })(jQuery); </script>
            <?php
        }
    }
}
add_action( 'wp_footer', 'fl_helping_generate_custom_css', 999 );



/*
 * Post share
 * */

function fl_share_buttons($tw=false,$fb=false,$lk=false,$pin=false,$gl=false,$rd=false) {
    global $post;
    if( !$post )
        return false;
    $output ='';
    // Permalink
    $permalink      = get_permalink( $post->ID );
    // Post image
    $featured_image  =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    $image_post_share = $featured_image['0'];
    // Post Title
    $post_title     = rawurlencode( get_the_title( $post->ID ) );

    // Twitter
    if($tw =='true'){
        $output  .= '<a class="fl-share-work--icon fl-primary-color-hv" href="https://twitter.com/home?status=' . $post_title . '+' . $permalink . '" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-twitter"></i></a>';
    }
    //Facebook
    if($fb =='true') {
        $output .= '<a class="fl-share-work--icon fl-primary-color-hv" href="https://www.facebook.com/share.php?u=' . $permalink . '&title=' . $post_title . '" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-facebook"></i></a>';
    }
    // LinkedIn
    if($lk =='true') {
        $output .= '<a class="fl-share-work--icon fl-primary-color-hv" href="http://www.linkedin.com/shareArticle?mini=true&url=' . $permalink . '&title=' . $post_title . '" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-linkedin"></i></a>';
    }
    // Pinterest
    if($pin =='true') {
        $output .= '<a class="fl-share-work--icon fl-primary-color-hv" href="http://pinterest.com/pin/create/bookmarklet/?media=' . $image_post_share . '&url=' . $permalink . '&is_video=false&description=' . $post_title . '" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-pinterest-p"></i></a>';
    }
    // Google +
    if($gl =='true') {
        $output .= '<a class="fl-share-work--icon fl-primary-color-hv" href="https://plus.google.com/share?url=' . $permalink . '" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-google"></i></a>';
    }
    // Reddit
    if($rd =='true') {
        $output .= '<a class="fl-share-work--icon fl-primary-color-hv" href="http://reddit.com/submit?url='.$permalink.'&title=' . $post_title . '" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-reddit-alien"></i></a>';
    }
    return $output;
}




// Breadcrumbs function



if( ! function_exists( 'fl_theme_helping_breadcrumb' ) ) {
    //Breadcrumbs Function
    function fl_theme_helping_breadcrumb() {

        $text['home']           = esc_html__('Home','autlines');
        $text['blog']           = esc_html__('Blog','autlines');
        $text['category']       = esc_html__('Archive','autlines').' "%s"';
        $text['search']         = esc_html__('Search results:','autlines').' "%s"';
        $text['tag']            = esc_html__('Tag','autlines').' "%s"';
        $text['author']         = esc_html__('Author','autlines').' %s';
        $text['404']            = esc_html__('Error 404','autlines');
        $text['shop_page']      = esc_html__('Shop','autlines');



        $show_current           = 1;
        $show_on_home           = 0;
        $show_home_link         = 1;
        $show_title             = 1;
        $delimiter              = '<span class="breadcrumbs-delimiter fl-primary-color"><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></span>';

        global $post;
        $home_link    = esc_url(home_url('/'));
        $blog_link    = get_permalink( get_option( 'page_for_posts' ) );
        $link_before  = '<span typeof="v:Breadcrumb">';
        $link_after   = '</span>';
        $link_attr    = ' rel="v:url" property="v:title"';
        $link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
        if(isset($post->post_parent)){$my_post_parent = $post->post_parent;}else{$my_post_parent=1;}
        $parent_id    = $parent_id_2 = $my_post_parent;
        $frontpage_id = get_option('page_on_front');

        if (is_home() || is_front_page()) {
            if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';
            if(get_option( 'page_for_posts' )){
                echo '<div class="breadcrumbs">
                    <a href="' . esc_url($home_link) . '">' . esc_attr($text['home']) . '</a>'.$delimiter.' ' . esc_attr($text['blog']) . '
                  </div>';
            }
        }
        else {
            echo '<div class="breadcrumbs">';
            if ($show_home_link == 1) {
                echo sprintf($link, $home_link, $text['home']);
                if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
            }

            if ( is_category() ) {
                if(get_option( 'page_for_posts' )){
                    echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                }

                $this_cat = get_category(get_query_var('cat'), false);
                if ($this_cat->parent != 0) {
                    $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                    if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                    $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                    $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                    if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                    echo fl_wp_kses($cats);
                }
                if ($show_current == 1) echo '<span class="current">' . sprintf($text['category'], single_cat_title('', false)) . '</span>' ;

            } elseif ( is_search() ) {
                if(get_option( 'page_for_posts' )){
                    echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                }
                echo '<span class="current">' . sprintf($text['search'], get_search_query()) . '</span>';

            } elseif ( is_day() ) {
                if(get_option( 'page_for_posts' )){
                    echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                }
                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
                echo '<span class="current">' . get_the_time('d') . '</span>';

            } elseif ( is_month() ) {
                if(get_option( 'page_for_posts' )){
                    echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                }
                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                echo '<span class="current">' . get_the_time('F') . '</span>';

            } elseif ( is_year() ) {
                if(get_option( 'page_for_posts' )){
                    echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                }
                echo '<span class="current">' . get_the_time('Y') . '</span>';

            } elseif ( is_single() && !is_attachment() ) {
                if ( get_post_type() != 'post' ) {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                    if ($show_current == 1) echo $delimiter . '<span class="current">' . get_the_title() . '</span>';
                } else {
                    if(get_option( 'page_for_posts' )){
                        echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                    }
                    $cat = get_the_category(); $cat = $cat[0];
                    $cats = get_category_parents($cat, TRUE, $delimiter);
                    if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                    $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                    $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                    if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                    echo fl_wp_kses($cats);
                    if ($show_current == 1) echo '<span class="current">' . get_the_title() . '</span>';
                }

            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                $post_type = get_post_type_object(get_post_type());
                echo '<span class="current">' . esc_attr($post_type->labels->singular_name) . '</span>';

            } elseif ( is_attachment() ) {
                $parent = get_post($parent_id);
                $cat = get_the_category($parent->ID); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo fl_wp_kses($cats);
                printf($link, get_permalink($parent), $parent->post_title);
                if ($show_current == 1) echo $delimiter . '<span class="current">' . get_the_title() . '</span>';

            } elseif ( is_page() && !$parent_id ) {
                if ($show_current == 1) echo '<span class="current">' . get_the_title() . '</span>';

            } elseif ( is_page() && $parent_id ) {
                if ($parent_id != $frontpage_id) {
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        if ($parent_id != $frontpage_id) {
                            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                        }
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        echo fl_wp_kses($breadcrumbs[$i]);
                        if ($i != count($breadcrumbs)-1) echo $delimiter;
                    }
                }
                if ($show_current == 1) {
                    if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
                    echo '<span class="current">' . get_the_title() . '</span>';
                }

            } elseif ( is_tag() ) {
                echo '<span class="current">' . sprintf($text['tag'], single_tag_title('', false)) . '</span>';

            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata($author);
                echo '<span class="current">' . sprintf($text['author'], $userdata->display_name) . '</span>';

            } elseif ( is_404() ) {
                echo '<span class="current">' . esc_attr($text['404']) . '</span>';

            }




            if ( get_query_var('paged') ) {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                echo esc_html__('Page','autlines') . ' ' . get_query_var('paged');
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }




            echo '</div><!-- .breadcrumbs -->';

        }
    }
}



//Remove Kaswara Plugin Action Contact Form 7
add_action('plugins_loaded','alter_woo_hooks');
function alter_woo_hooks()
{
    remove_action( 'init', 'kswr_cf7_shortcode', 10);
    remove_action('init', 'kaswara_cf7_designer_add_shortcode_handlers', 10);
    remove_action('after_setup_theme', 'kaswara_cf7_designer_add_shortcode_handlers', 10);


    remove_action('admin_menu', 'kaswara_dashboard_add_cf7', 10);



    remove_action('admin_menu', 'kaswara_dashboard_render', 90);

    remove_submenu_page('kaswara','kaswara');


    remove_action('init', 'kswr_cf7_shortcode', 10);

}
