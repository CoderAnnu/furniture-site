<?php
$footer = 'enable';
$footer_bg_img = empelza_get_theme_mod('footer_bg');
// Footer background image css
$footer_bg='';
if (isset($footer_bg_img) && $footer_bg_img != '') {
    $footer_bg = 'background-image:url(' . $footer_bg_img . ');';
}
if(empelza_get_theme_mod('custom_footer',true) == 'true'){
    $footer = empelza_get_theme_mod('footer_style',true);
}


$css_style = ($footer_bg) ? 'style=' . $footer_bg . '' : '';
?>

<?php if($footer !='disable') { ?>
<footer class="fl--footer fl-dark-bg">
    <?php if (isset($footer_bg_img) && $footer_bg_img != '') {?>
    <div class="decor-footer-bg" <?php echo esc_attr($css_style);?>></div>
    <?php } ?>
        <?php get_template_part('template-parts/footer/footer-content',empelza_get_theme_mod('footer_style'));?>
        <div class="bottom-content-footer">
                <div class="container">
                    <div class="row">
                        <div class="fl-copyright--inner col-12 text-center">
                            <?php if(empelza_get_theme_mod('footer_copyrights')){
                                echo esc_html(empelza_get_theme_mod('footer_copyrights'));
                            }?>
                        </div>
                    </div>
                </div>
        </div>
</footer>
<?php } ?>
<!-- Search form Full Width start -->
 <?php get_template_part('template-parts/footer/footer-component/content','search'); ?>
<!-- Search form Full Width end -->
<!-- Hamburger menu start -->
<?php get_template_part('template-parts/footer/footer-component/content','mobile-menu'); ?>
<!-- Hamburger menu end -->
</div>
</div>
<!-- Main holder End-->
<?php wp_footer(); ?>
</body>
</html>
