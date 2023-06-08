<?php if ( ! defined( 'ABSPATH' ) ) { exit; }
$navigation = 'enable';
if(empelza_get_theme_mod('page_navigator_custom_style',true) == 'custom'){
    $navigation = empelza_get_theme_mod('nav_enable_option',true);
}
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-page-preloader="enable">
<?php
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}?>
<!-- Main holder -->
<div id="fl-main-holder">
<?php get_template_part('template-parts/preloader/preloader');
    if($navigation !='disable'){
        get_template_part('template-parts/navigation/navigator_content');
    }?>
 <div class="fl-main-container">

