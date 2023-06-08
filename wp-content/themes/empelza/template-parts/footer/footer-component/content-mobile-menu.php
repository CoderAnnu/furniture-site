<!--Sidebar Mobile Menu Start--> 
<div class="fl-mobile-menu-wrapper"> 
    <!--Sidebar Overlay Start-->
    <div class="fl-sidebar-overlay fl--mobile-menu-icon"></div>
    <!--Sidebar Overlay End-->
    <div class="fl-nav-container">
        <!--Mobile Nav menu Wrapper Start-->
        <div class="fl--mobile-menu-navigation-wrapper">
            <div class="fl-close-sidebar-icon fl--mobile-menu-icon closed"></div>
            <!--Mobile Nav menu Start-->
            <nav class="fl--mobile-menu-navigation cf">
                <?php
                if ( has_nav_menu( 'mobile-menu' ) ) {
                    wp_nav_menu(array(
                        'theme_location'    => 'mobile-menu',
                        'menu_class'	    => 'fl--mobile-menu',
                        'id'                => 'hamburger-menu',
                        'container'         => false,
                        'fallback_cb'       => 'empelza_menu_fallback'
                    ));
                } else {
                    wp_nav_menu(array(
                        'theme_location'    => 'general-menu',
                        'menu_class'	    => 'fl--mobile-menu',
                        'id'                => 'hamburger-menu',
                        'container'         => false,
                        'fallback_cb'       => 'empelza_menu_fallback'
                    ));
                }
                ?>
            </nav>
            <!--Mobile Nav menu End-->
        </div>
        <!--Mobile Nav menu Wrapper End-->
    </div>
</div>
<!--Sidebar Mobile Menu End-->