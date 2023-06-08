<?php
$wrapper_attributes[]= '';
$css_classes[] ='style-three-column';
$animation = empelza_get_theme_mod('animation_widget');
if ( ! empty( $animation ) and ($animation !='none')) {
    $css_classes[] = 'fl-animated-item-velocity';
    $wrapper_attributes[] = 'data-animate-type="'.$animation.'"';
    $wrapper_attributes[] = 'data-item-for-animated=".footer-widget-area"';
}

$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );
if( class_exists('Fl_Helping_Addons')){
    if(is_active_sidebar( 'footer-sidebar-1' ) ||  is_active_sidebar( 'footer-sidebar-2' ) ||  is_active_sidebar( 'footer-sidebar-3' ) || is_active_sidebar( 'footer-sidebar-4' )) {?>
        <div class="top-content-footer <?php echo esc_attr( trim( $css_class ) );?>" <?php echo implode( ' ', $wrapper_attributes);?>>
            <div class="container">
                <div class="row footer-sidebar-wrapper">
                    <div class="footer-widget-area col-lg-3 col-md-6">
                        <?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
                            dynamic_sidebar( 'footer-sidebar-1' );
                        } ?>
                    </div>
                    <div class="footer-widget-area offset-lg-2 col-lg-3 col-md-6">
                        <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
                            dynamic_sidebar( 'footer-sidebar-2' );
                        } ?>
                    </div>
                    <div class="footer-widget-area col-lg-4 col-md-6">
                        <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
                            dynamic_sidebar( 'footer-sidebar-3' );
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>