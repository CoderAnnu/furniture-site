<?php
//Navigator class
$css_classes[] = 'fl-page-heading';
//Save
$header_bg = $pre_title = $mask_html=$decor_html_img=$description='';

// Portfolio Archive

    // Blog page Title
    $title = get_the_title();
    // Heading Background Image
    $bg_img = empelza_get_theme_mod('portfolio_archive_page_background_img');
    $blog_header_mask_style_bg = empelza_get_theme_mod('portfolio_header_mask_style_bg');
    $blog_parallax_hover_bg = empelza_get_theme_mod('portfolio_archive_page_parallax_hover_img');
    $scroll_opacity = empelza_get_theme_mod('portfolio_header_opacity_scroll');
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


    </div>
</div>



