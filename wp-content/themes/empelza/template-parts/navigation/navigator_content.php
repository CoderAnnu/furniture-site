<?php
//Navigator class
$css_classes[] = 'fl-header--navigation';
// Search icon
$search_icon = empelza_get_theme_mod('menu_search_icon');
// Menu Color
$color_menu = empelza_get_theme_mod('menu_color');
$nav_style = empelza_get_theme_mod('nav_style');
if(empelza_get_theme_mod('page_navigator_custom_style',true) =='custom'){
    $color_menu = empelza_get_theme_mod('menu_color',true);
    $nav_style = empelza_get_theme_mod('nav_style',true);
}


if($color_menu == 'dark' or $nav_style == 'relative'){
    $css_classes[] = 'fl-dark-menu';
}elseif($color_menu == 'light'){
    $css_classes[] = 'fl-light-menu';
}

if($nav_style == 'relative'){
    $css_classes[] = 'fl-relative-nav-style';
}else{
    $css_classes[] = 'fl-absolute-nav-style';
}

$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );
?>
<!--Header Start-->
<header class="fl--header <?php echo esc_attr($css_class) ; ?>" id="fl-header">
    <?php if($nav_style == 'relative'){
       get_template_part('template-parts/navigation/content','top-header-sidebar');
    }?>
    <div class="fl-header-content">
          <div class="fl-navigation-container container">
              <div class="left-content">
                  <!-- Start Logo-->
                  <div class="fl--logo-container">
                      <a class="light-logotype" href="<?php echo esc_url(home_url("/")); ?>">
                          <?php if (empelza_get_theme_mod( 'site_logo')){ ?>
                              <img src="<?php echo esc_url(empelza_get_theme_mod( 'site_logo')); ?>" alt="<?php esc_attr_e('Site Logotype','empelza')?>" class="img-logotype"/>
                          <?php } else { ?>
                              <h3 class="logotype-text"><?php esc_attr(bloginfo('title')); ?></h3>
                          <?php } ?>
                      </a>
                      <a class="dark-logotype" href="<?php echo esc_url(home_url("/")); ?>">
                          <?php if (empelza_get_theme_mod( 'site_logo_dark')){ ?>
                              <img src="<?php echo esc_url(empelza_get_theme_mod( 'site_logo_dark')); ?>" alt="<?php esc_attr_e('Site Logotype Dark','empelza')?>" class="img-logotype"/>
                          <?php } else { ?>
                              <h3 class="logotype-text-dark"><?php esc_attr(bloginfo('title')); ?></h3>
                          <?php } ?>
                      </a>
                  </div>
                  <!--Logo End-->
              </div>

            <div class="right-content">
                <!-- Nav Menu Start-->
                <nav class="fl-mega-menu nav-menu">
                    <?php if ( has_nav_menu( 'general-menu' ) ) {
                        wp_nav_menu(array(
                            'theme_location'    => 'general-menu',
                            'class'             => 'header-menu nav-menu',
                            'container'         => false,
                            'id'                => 'general-menu',
                            'depth'             => 8,
                            'fallback_cb'       => 'empelza_menu_fallback'
                        ));
                    }
                    ?>
                </nav>
                <!-- Nav Menu End-->
                <div class="fl--navigation-icon-container">
                        <!--Mobile menu bars-->
                        <div class="fl--hamburger-menu closed header-icon">
                            <div class="fl-flipper-icon">
                                <div class="fl-front-content">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="fl-back-content">
                                    <span class="fl-custom-icon-plus-sign"></span>
                                </div>
                            </div>
                        </div>
                        <!--Mobile menu bars end-->
                        <?php if($search_icon =='enable') { ?>
                            <!--Search -->
                        <div class="header-search header-icon">
                            <div class="fl-flipper-icon">
                                <div class="fl-front-content">
                                    <i class="fl-custom-icon-loupe"></i>
                                </div>
                                <div class="fl-back-content">
                                    <span class="fl-custom-icon-plus-sign"></span>
                                </div>
                            </div>
                        </div>
                            <!--Search End-->
                        <?php } ?>
                 </div>
            </div>
        </div>
     </div>
</header>
<!--Header End-->