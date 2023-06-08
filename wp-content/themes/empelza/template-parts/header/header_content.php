<?php
//Navigator class
$css_classes[] = 'fl-page-heading';
//Save
$header_bg = $pre_title = $mask_html=$decor_html_img=$description='';

// Heading Background Image
$bg_img = empelza_get_theme_mod('blog_archive_page_background_img');

// Blog page Title
$title = empelza_get_theme_mod('blog_title');

// Blog page
if (empelza_is_blog_checker() || is_search()) {
    $blog_header_mask_style_bg = empelza_get_theme_mod('blog_header_mask_style_bg');
    $blog_parallax_hover_bg = empelza_get_theme_mod('blog_archive_page_parallax_hover_img');
    $scroll_opacity = empelza_get_theme_mod('blog_header_opacity_scroll');
    $description_content = empelza_get_theme_mod('blog_title_description');
    $page_bg_image = empelza_get_theme_mod('blog_archive_page_background_img');
    if($page_bg_image){
        $css_classes[] = 'jarallax';
        $bg_img = $page_bg_image;
    }

    if($blog_header_mask_style_bg == 'blue-gradient'){
        $mask_html = '<div class="header-mask-bg blue-gradient-style"></div>';
    }
    if($blog_header_mask_style_bg == 'purple'){
        $mask_html = '<div class="header-mask-bg purple-style"></div>';
    }
    if($blog_header_mask_style_bg == 'custom'){
        $bg_mask = empelza_get_theme_mod('custom_color_bg_mask');
        if (isset($bg_mask) && $bg_mask != '') {
            $mask_bg = 'background:' . $bg_mask . '!important;';
        }
        $mask_css_style = ($mask_bg) ? 'style=' . $mask_bg . '' : '';
        $mask_html = '<div class="header-mask-bg custom-style" '.esc_attr($mask_css_style).'></div>';
    }
    if($blog_parallax_hover_bg != ''){
        $css_classes[] = 'header-parallax-image-hover-wrap';
        if (isset($blog_parallax_hover_bg) && $blog_parallax_hover_bg != '') {
            $hover_bg = 'background:url(' . $blog_parallax_hover_bg . ';)';
        }
        $decor_css_style = ($hover_bg) ? 'style=' . $hover_bg . '' : '';
        $decor_html_img = '<div class="parallax-inner decor-image"  '.esc_attr($decor_css_style).'></div>';
    }
    if($scroll_opacity == 'enable'){
        $css_classes[] = 'enable-opacity-with-scroll';
    }
    $description = ($description_content) ? $description_content : '';

}
if (is_page()) {
    $title = get_the_title();

    $blog_header_mask_style_bg = empelza_get_theme_mod('page_header_mask_style_bg');
    $blog_parallax_hover_bg = empelza_get_theme_mod('page_parallax_hover_img');
    $scroll_opacity = empelza_get_theme_mod('page_header_opacity_scroll');
    $page_bg_image = empelza_get_theme_mod('page_header_img');

    if($page_bg_image){
        $css_classes[] = 'jarallax';
        $bg_img = $page_bg_image;
    }

    if($blog_header_mask_style_bg == 'blue-gradient'){
        $mask_html = '<div class="header-mask-bg blue-gradient-style"></div>';
    }
    if($blog_header_mask_style_bg == 'purple'){
        $mask_html = '<div class="header-mask-bg purple-style"></div>';
    }
    if($blog_header_mask_style_bg == 'custom'){
        $bg_mask = empelza_get_theme_mod('custom_color_bg_mask');
        if (isset($bg_mask) && $bg_mask != '') {
            $mask_bg = 'background:' . $bg_mask . '!important;';
        }
        $mask_css_style = ($mask_bg) ? 'style=' . $mask_bg . '' : '';
        $mask_html = '<div class="header-mask-bg custom-style" '.esc_attr($mask_css_style).'></div>';
    }
    if($blog_parallax_hover_bg != ''){
        $css_classes[] = 'header-parallax-image-hover-wrap';
        if (isset($blog_parallax_hover_bg) && $blog_parallax_hover_bg != '') {
            $hover_bg = 'background:url(' . $blog_parallax_hover_bg . ';)';
        }
        $decor_css_style = ($hover_bg) ? 'style=' . $hover_bg . '' : '';
        $decor_html_img = '<div class="parallax-inner decor-image"  '.esc_attr($decor_css_style).'></div>';
    }
    if($scroll_opacity == 'enable'){
        $css_classes[] = 'enable-opacity-with-scroll';
    }



    if(empelza_get_theme_mod('page_header_custom_style',true) == 'custom'){
        $blog_header_mask_style_bg = empelza_get_theme_mod('page_header_mask_style_bg',true);
        $blog_parallax_hover_bg = empelza_get_theme_mod('page_parallax_hover_img',true);
        $scroll_opacity = empelza_get_theme_mod('page_header_opacity_scroll',true);
        $description_content = empelza_get_theme_mod('page_title_description',true);
        $page_bg_image = empelza_get_theme_mod('page_header_img',true);
        // Pre Title
        if(!empty(empelza_get_theme_mod('page_header_pre_title',true))){
            $pre_title = empelza_get_theme_mod('page_header_pre_title',true);
        }

        if($page_bg_image){
            $css_classes[] = 'jarallax';
            $bg_img = $page_bg_image;
        }

        if($blog_header_mask_style_bg == 'blue-gradient'){
            $mask_html = '<div class="header-mask-bg blue-gradient-style"></div>';
        }
        if($blog_header_mask_style_bg == 'purple'){
            $mask_html = '<div class="header-mask-bg purple-style"></div>';
        }
        if($blog_header_mask_style_bg == 'custom'){
            $bg_mask = empelza_get_theme_mod('custom_color_bg_mask');
            if (isset($bg_mask) && $bg_mask != '') {
                $mask_bg = 'background:' . $bg_mask . '!important;';
            }
            $mask_css_style = ($mask_bg) ? 'style=' . $mask_bg . '' : '';
            $mask_html = '<div class="header-mask-bg custom-style" '.esc_attr($mask_css_style).'></div>';
        }
        if($blog_parallax_hover_bg != ''){
            $css_classes[] = 'header-parallax-image-hover-wrap';
            if (isset($blog_parallax_hover_bg) && $blog_parallax_hover_bg != '') {
                $hover_bg = 'background:url(' . $blog_parallax_hover_bg . ';)';
            }
            $decor_css_style = ($hover_bg) ? 'style=' . $hover_bg . '' : '';
            $decor_html_img = '<div class="parallax-inner decor-image"  '.esc_attr($decor_css_style).'></div>';
        }
        if($scroll_opacity == 'enable'){
            $css_classes[] = 'enable-opacity-with-scroll';
        }
        $description = ($description_content) ? $description_content : '';

        if(empelza_get_theme_mod('page_header_title_enable_function',true) != 'disable'){
            if(!empty(empelza_get_theme_mod('page_custom_title',true))){
                $title = empelza_get_theme_mod('page_custom_title',true);
            }
        } else {
            $title = '';
        }
    }
}

if (is_category()) { // Category page
    $title = single_cat_title("", false);
    $pre_title = esc_html__('All posts from:', 'empelza');
    $description ='';
} else if (is_author()) { // Author page
    $title = get_the_author();
    $pre_title = esc_html__('All posts from author:', 'empelza');
    $description ='';
} else if (is_tag()) { // Tag page
    $title = single_tag_title("", false);
    $pre_title = esc_html__('Tagged to:', 'empelza');
    $description ='';
} else if (is_search()) {//search page
    $title = get_search_query();
    $pre_title = esc_html__('Search results for:', 'empelza');
    $description ='';
} else if (is_archive()) {
    if (is_day()) :
        $title = sprintf(esc_html__('Daily Archive: %s', 'empelza'), get_the_date());
        $description ='';
    elseif (is_month()) :
        $title = sprintf(esc_html__('Monthly Archive: %s', 'empelza'), get_the_date(_x('F Y', 'monthly archives date format', 'empelza')));
        $description ='';
    elseif (is_year()) :
        $title = sprintf(esc_html__('Yearly Archive: %s', 'empelza'), get_the_date(_x('Y', 'yearly archives date format', 'empelza')));
        $description ='';
    else :
        $title = esc_html__('Archive', 'empelza');
        $description ='';
    endif;
}
// Single post
if(is_single()){
    $blog_header_mask_style_bg = empelza_get_theme_mod('blog_single_header_mask_style_bg');
    $blog_parallax_hover_bg = empelza_get_theme_mod('blog_single_archive_page_parallax_hover_img');
    $scroll_opacity = empelza_get_theme_mod('blog_single_header_opacity_scroll');
    $description_content = empelza_get_theme_mod('blog_single_title_description');
    $page_bg_image = empelza_get_theme_mod('blog_single_archive_page_background_img');
    $bg_img = empelza_get_theme_mod('blog_single_page_background_img');
    if($page_bg_image){
        $css_classes[] = 'jarallax';
        $bg_img = $page_bg_image;
    }

    if($blog_header_mask_style_bg == 'blue-gradient'){
        $mask_html = '<div class="header-mask-bg blue-gradient-style"></div>';
    }
    if($blog_header_mask_style_bg == 'purple'){
        $mask_html = '<div class="header-mask-bg purple-style"></div>';
    }
    if($blog_header_mask_style_bg == 'custom'){
        $bg_mask = empelza_get_theme_mod('custom_color_bg_mask');
        if (isset($bg_mask) && $bg_mask != '') {
            $mask_bg = 'background:' . $bg_mask . '!important;';
        }
        $mask_css_style = ($mask_bg) ? 'style=' . $mask_bg . '' : '';
        $mask_html = '<div class="header-mask-bg custom-style" '.esc_attr($mask_css_style).'></div>';
    }
    if($blog_parallax_hover_bg != ''){
        $css_classes[] = 'header-parallax-image-hover-wrap';
        if (isset($blog_parallax_hover_bg) && $blog_parallax_hover_bg != '') {
            $hover_bg = 'background:url(' . $blog_parallax_hover_bg . ';)';
        }
        $decor_css_style = ($hover_bg) ? 'style=' . $hover_bg . '' : '';
        $decor_html_img = '<div class="parallax-inner decor-image"  '.esc_attr($decor_css_style).'></div>';
    }
    if($scroll_opacity == 'enable'){
        $css_classes[] = 'enable-opacity-with-scroll';
    }
    $description = ($description_content) ? $description_content : '';
}

// Portfolio Archive
if(is_post_type_archive('portfolio')){
    // Blog page Title
    $title = empelza_get_theme_mod('portfolio_title');
    // Heading Background Image
    $bg_img = empelza_get_theme_mod('portfolio_archive_page_background_img');
    $blog_header_mask_style_bg = empelza_get_theme_mod('portfolio_header_mask_style_bg');
    $blog_parallax_hover_bg = empelza_get_theme_mod('portfolio_archive_page_parallax_hover_img');
    $scroll_opacity = empelza_get_theme_mod('portfolio_header_opacity_scroll');
    $description_content = empelza_get_theme_mod('portfolio_title_description');
    $page_bg_image = empelza_get_theme_mod('portfolio_archive_page_background_img');
    if($page_bg_image){
        $css_classes[] = 'jarallax';
        $bg_img = $page_bg_image;
    }

    if($blog_header_mask_style_bg == 'blue-gradient'){
        $mask_html = '<div class="header-mask-bg blue-gradient-style"></div>';
    }
    if($blog_header_mask_style_bg == 'purple'){
        $mask_html = '<div class="header-mask-bg purple-style"></div>';
    }
    if($blog_header_mask_style_bg == 'custom'){
        $bg_mask = empelza_get_theme_mod('custom_color_bg_mask');
        if (isset($bg_mask) && $bg_mask != '') {
            $mask_bg = 'background:' . $bg_mask . '!important;';
        }
        $mask_css_style = ($mask_bg) ? 'style=' . $mask_bg . '' : '';
        $mask_html = '<div class="header-mask-bg custom-style" '.esc_attr($mask_css_style).'></div>';
    }
    if($blog_parallax_hover_bg != ''){
        $css_classes[] = 'header-parallax-image-hover-wrap';
        if (isset($blog_parallax_hover_bg) && $blog_parallax_hover_bg != '') {
            $hover_bg = 'background:url(' . $blog_parallax_hover_bg . ';)';
        }
        $decor_css_style = ($hover_bg) ? 'style=' . $hover_bg . '' : '';
        $decor_html_img = '<div class="parallax-inner decor-image"  '.esc_attr($decor_css_style).'></div>';
    }
    if($scroll_opacity == 'enable'){
        $css_classes[] = 'enable-opacity-with-scroll';
    }
    $description = ($description_content) ? $description_content : '';
}

// Category Portfolio Page
if(is_post_type_archive('portfolio')){
    // Blog page Title
    $title = empelza_get_theme_mod('portfolio_title');
    // Heading Background Image
    $bg_img = empelza_get_theme_mod('portfolio_archive_page_background_img');
    $blog_header_mask_style_bg = empelza_get_theme_mod('portfolio_header_mask_style_bg');
    $blog_parallax_hover_bg = empelza_get_theme_mod('portfolio_archive_page_parallax_hover_img');
    $scroll_opacity = empelza_get_theme_mod('portfolio_header_opacity_scroll');
    $description_content = empelza_get_theme_mod('portfolio_title_description');
    $page_bg_image = empelza_get_theme_mod('portfolio_archive_page_background_img');
    if($page_bg_image){
        $css_classes[] = 'jarallax';
        $bg_img = $page_bg_image;
    }

    if($blog_header_mask_style_bg == 'blue-gradient'){
        $mask_html = '<div class="header-mask-bg blue-gradient-style"></div>';
    }
    if($blog_header_mask_style_bg == 'purple'){
        $mask_html = '<div class="header-mask-bg purple-style"></div>';
    }
    if($blog_header_mask_style_bg == 'custom'){
        $bg_mask = empelza_get_theme_mod('custom_color_bg_mask');
        if (isset($bg_mask) && $bg_mask != '') {
            $mask_bg = 'background:' . $bg_mask . '!important;';
        }
        $mask_css_style = ($mask_bg) ? 'style=' . $mask_bg . '' : '';
        $mask_html = '<div class="header-mask-bg custom-style" '.esc_attr($mask_css_style).'></div>';
    }
    if($blog_parallax_hover_bg != ''){
        $css_classes[] = 'header-parallax-image-hover-wrap';
        if (isset($blog_parallax_hover_bg) && $blog_parallax_hover_bg != '') {
            $hover_bg = 'background:url(' . $blog_parallax_hover_bg . ';)';
        }
        $decor_css_style = ($hover_bg) ? 'style=' . $hover_bg . '' : '';
        $decor_html_img = '<div class="parallax-inner decor-image"  '.esc_attr($decor_css_style).'></div>';
    }
    if($scroll_opacity == 'enable'){
        $css_classes[] = 'enable-opacity-with-scroll';
    }
    $description = ($description_content) ? $description_content : '';
}
//Portfolio Singular
if(is_singular('portfolio')){
    $title = get_the_title();
    $blog_header_mask_style_bg = empelza_get_theme_mod('portfolio_single_header_mask_style_bg');
    $blog_parallax_hover_bg = empelza_get_theme_mod('portfolio_single_archive_page_parallax_hover_img');
    $scroll_opacity = empelza_get_theme_mod('portfolio_single_header_opacity_scroll');
    $description_content = empelza_get_theme_mod('portfolio_single_title_description');
    $page_bg_image = empelza_get_theme_mod('portfolio_single_archive_page_background_img');
    $bg_img = empelza_get_theme_mod('portfolio_single_page_background_img');
    if($page_bg_image){
        $css_classes[] = 'jarallax';
        $bg_img = $page_bg_image;
    }

    if($blog_header_mask_style_bg == 'blue-gradient'){
        $mask_html = '<div class="header-mask-bg blue-gradient-style"></div>';
    }
    if($blog_header_mask_style_bg == 'purple'){
        $mask_html = '<div class="header-mask-bg purple-style"></div>';
    }
    if($blog_header_mask_style_bg == 'custom'){
        $bg_mask = empelza_get_theme_mod('custom_color_bg_mask');
        if (isset($bg_mask) && $bg_mask != '') {
            $mask_bg = 'background:' . $bg_mask . '!important;';
        }
        $mask_css_style = ($mask_bg) ? 'style=' . $mask_bg . '' : '';
        $mask_html = '<div class="header-mask-bg custom-style" '.esc_attr($mask_css_style).'></div>';
    }
    if($blog_parallax_hover_bg != ''){
        $css_classes[] = 'header-parallax-image-hover-wrap';
        if (isset($blog_parallax_hover_bg) && $blog_parallax_hover_bg != '') {
            $hover_bg = 'background:url(' . $blog_parallax_hover_bg . ';)';
        }
        $decor_css_style = ($hover_bg) ? 'style=' . $hover_bg . '' : '';
        $decor_html_img = '<div class="parallax-inner decor-image"  '.esc_attr($decor_css_style).'></div>';
    }
    if($scroll_opacity == 'enable'){
        $css_classes[] = 'enable-opacity-with-scroll';
    }
    $description = ($description_content) ? $description_content : '';
}

// 404
if(is_404()){
    $title = empelza_get_theme_mod('404_title');
    $blog_header_mask_style_bg = empelza_get_theme_mod('404_header_mask_style_bg');
    $blog_parallax_hover_bg = empelza_get_theme_mod('404_archive_page_parallax_hover_img');
    $scroll_opacity = empelza_get_theme_mod('404_header_opacity_scroll');
    $description_content = empelza_get_theme_mod('404_title_description');
    $page_bg_image = empelza_get_theme_mod('404_archive_page_background_img');
    if($page_bg_image){
        $css_classes[] = 'jarallax';
        $bg_img = $page_bg_image;
    }

    if($blog_header_mask_style_bg == 'blue-gradient'){
        $mask_html = '<div class="header-mask-bg blue-gradient-style"></div>';
    }
    if($blog_header_mask_style_bg == 'purple'){
        $mask_html = '<div class="header-mask-bg purple-style"></div>';
    }
    if($blog_header_mask_style_bg == 'custom'){
        $bg_mask = empelza_get_theme_mod('custom_color_bg_mask');
        if (isset($bg_mask) && $bg_mask != '') {
            $mask_bg = 'background:' . $bg_mask . '!important;';
        }
        $mask_css_style = ($mask_bg) ? 'style=' . $mask_bg . '' : '';
        $mask_html = '<div class="header-mask-bg custom-style" '.esc_attr($mask_css_style).'></div>';
    }
    if($blog_parallax_hover_bg != ''){
        $css_classes[] = 'header-parallax-image-hover-wrap';
        if (isset($blog_parallax_hover_bg) && $blog_parallax_hover_bg != '') {
            $hover_bg = 'background:url(' . $blog_parallax_hover_bg . ';)';
        }
        $decor_css_style = ($hover_bg) ? 'style=' . $hover_bg . '' : '';
        $decor_html_img = '<div class="parallax-inner decor-image"  '.esc_attr($decor_css_style).'></div>';
    }
    if($scroll_opacity == 'enable'){
        $css_classes[] = 'enable-opacity-with-scroll';
    }
    $description = ($description_content) ? $description_content : '';
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

?>


<div class="fl-dark-bg <?php echo esc_attr($css_class) ; ?>" >
    <?php echo empelza_return_text($decor_html_img);?>
    <div class="header--bg-shadow"></div>
    <?php echo empelza_return_text($mask_html);?>
    <?php echo esc_attr($bg_img) ? '<img class="jarallax-img" src="' . $bg_img . '" alt="'.$bg_img.'"/>' : ''?>
    <div class="fl--page-header content_header container">
        <?php if (isset($pre_title) && $pre_title != '') { ?>
            <div class="fl-pre--title-wrapper">
                <span class="fl--sub-title fl-text-medium-style"><?php echo esc_attr($pre_title); ?></span>
            </div>
        <?php } ?>
        <?php if (isset($title) && $title != '') { ?>
            <h1 class="header-title">
                <?php echo esc_attr($title); ?>
            </h1>
        <?php } ?>
        <?php if (isset($description) && $description != '') { ?>
            <div class="header-description-content fl-text-regular-style">
                <?php echo empelza_return_text($description); ?>
            </div>
        <?php } ?>


    </div>
</div>



