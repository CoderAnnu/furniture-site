<?php get_header();
//Header
$header = 'enable';
if (empelza_get_theme_mod('post_single_header_custom_style', true) == 'custom') {
    $header = empelza_get_theme_mod('post_single_header', true);
}
if ($header != 'disable') {
    get_template_part('template-parts/header/header_content');
}

$css_classes[] = $bottom_css_classes[] = '';


$css_class = preg_replace('/\s+/', ' ', implode(' ', array_filter(array_unique($css_classes))));


?>
<!--Padding top Start-->
<?php if (empelza_get_theme_mod('post_single_padding_top', true) != 'false') { ?>
    <div class="fl-page-padding top"></div>
<?php } ?>
<!--Padding top End-->
<!-- Content -->
<div class="container">
    <div class="fl-blog-post-div row">
        <div class="single-portfolio-post-wrapper <?php echo esc_attr(trim($css_class)); ?>">
            <!-- Top Content -->
            <div class="post-content-top">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article <?php post_class('cf'); ?> id="post-<?php the_ID() ?>" data-post-id="<?php the_ID() ?>">
                            <!-- post section -->
                            <div class="post-inner_content cf">
                                <!-- image section  -->
                                <div class="wpb_wrapper vc_row">
                                    <!-- <div data-animate-type="slideUpBigIn" class="fl-animated-item-velocity  wpb_single_image vc_align_left animation-complete"> -->
                                        <div class="wpb_wrapper vc_figure wpb_column d-flex vc_col-sm-12 vc_col-lg-8 vc_col-md-8 ">
                                            <div class="vc_single_image-wrapper ">
                                                <div class="mb-5">
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
                                                </div>
                                                <div class="fl-vc-custom-title-container fl-animated-item-velocity text-left custom-title animation-complete" data-animate-type="slideUpIn" style="opacity: 1; transform: translateY(0px);">
                                                    <div class="custom-title-content-wrapper">
                                                        <div class="sub-title-wrap">
                                                            <div class="fl-subtitle-vc fl-font-style-bolt subtitle-ternary h2">
                                                                <?php
                                                                if (function_exists('fl_post_taxonomy')) {
                                                                    echo fl_post_taxonomy($post->ID, 'portfolio-category', ', ', 'name', true);
                                                                } ?>
                                                            </div>
                                                        </div>
                                                        <h4 class="fl-title-vc"> <?= get_the_title(); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- </div> -->

                                    <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-4 vc_col-md-4">
                                        <div class="vc_column-inner fl-helping-column-responsive-632d82c70d3f9-8324 vc_custom_1584484656873">
                                            <div class="wpb_wrapper">
                                                <div class="fl-vc-responsive--gap cf fl-responsive-gap-632d82c70d4aa-7847 fl-vc--responsive" data-responsive-target="fl-responsive-gap-632d82c70d4aa-7847" data-responsive-param="{&quot;height&quot;:&quot;tablet:30px;&quot;}" style="height:0px;"></div>
                                                <div class="fl-portfolio-info-wrapper fl-animated-item-velocity" data-animate-type="slideRightIn" data-item-for-animated="li">
                                                    <?php // get the group data through the variable and pass  array value of the field 
                                                    $product_content = get_field('post_description_details'); ?>
                                                    <ul class="fl-portfolio--info">

                                                        <?php if (!empty($product_content['created_by'])) : ?>
                                                            <li class="fl-li-portfolio-info cf animation-complete" style="opacity: 1; transform: translateX(0px);">
                                                                <div class="fl-left-content"><i class="essential-set-icon-user"></i>Created By:</div>
                                                                <div class="fl-right-content fl-text-regular-style">
                                                                    <p> <?= $product_content['created_by']; ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($product_content['completed_on'])) : ?>
                                                            <li class="fl-li-portfolio-info cf animation-complete" style="opacity: 1; transform: translateX(0px);">
                                                                <div class="fl-left-content"><i class="essential-set-icon-calendar"></i>Completed On:</div>
                                                                <div class="fl-right-content fl-text-regular-style">
                                                                    <p> <?= $product_content['completed_on']; ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if (!empty($product_content['skills_used'])) : ?>
                                                            <li class="fl-li-portfolio-info cf animation-complete" style="opacity: 1; transform: translateX(0px);">
                                                                <div class="fl-left-content"><i class="essential-set-icon-controls"></i>Skills Used:</div>
                                                                <div class="fl-right-content fl-text-regular-style">
                                                                    <p> <?= $product_content['skills_used']; ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if (!empty($product_content['client'])) : ?>

                                                            <li class="fl-li-portfolio-info cf animation-complete" style="opacity: 1; transform: translateX(0px);">
                                                                <div class="fl-left-content"><i class="essential-set-icon-notebook-4"></i>Client:</div>
                                                                <div class="fl-right-content fl-text-regular-style">
                                                                    <p> <?= $product_content['client']; ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if (!empty($product_content['price'])) : ?>
                                                            <li class="fl-li-portfolio-info cf animation-complete" style="opacity: 1; transform: translateX(0px);">
                                                                <div class="fl-left-content"><i class="essential-set-icon-controls"></i>price:</div>
                                                                <div class="fl-right-content fl-text-regular-style">
                                                                    <p> <?= $product_content['price']; ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>

                                                        <li class="fl-li-portfolio-info cf animation-complete" style="opacity: 1; transform: translateX(0px);">
                                                            <div class="fl-left-content"><i class="essential-set-icon-share-1"></i>Share This:</div>
                                                            <div class="fl-right-content">
                                                                <a class="fl-share-work--icon fl-primary-color-hv" href="https://twitter.com/home?status=furniture%2012+http://localhost/furniture/portfolio/furniture-12/" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"><i class="fa fa-twitter"></i></a><a class="fl-share-work--icon fl-primary-color-hv" href="https://www.facebook.com/share.php?u=http://localhost/furniture/portfolio/furniture-12/&amp;title=furniture%2012" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                                <a class="fl-share-work--icon fl-primary-color-hv" href="http://pinterest.com/pin/create/bookmarklet/?media=http://localhost/furniture/wp-content/uploads/2022/09/923-9230147_sofa-png-image-png-images-of-sofa-set-removebg-preview.png&amp;url=http://localhost/furniture/portfolio/furniture-12/&amp;is_video=false&amp;description=furniture%2012" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;">
                                                                    <i class="fa fa-pinterest-p"></i></a><a class="fl-share-work--icon fl-primary-color-hv" href="https://plus.google.com/share?url=http://localhost/furniture/portfolio/furniture-12/" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"><i class="fa fa-google"></i>
                                                                </a><a class="fl-share-work--icon fl-primary-color-hv" href="http://reddit.com/submit?url=http://localhost/furniture/portfolio/furniture-12/&amp;title=furniture%2012" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"><i class="fa fa-reddit-alien"></i></a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="vc_row wpb_row vc_row-fluid kswr_pnone kswr_mnone kswr_bnone">
                                    <div class="kswr-row-element-back" data-classes="kswr_pnone kswr_mnone kswr_bnone"></div>
                                    <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-8 vc_col-md-8">
                                        <div class=" vc_column-inner fl-helping-column-responsive-632d82c70cea4-3685 vc_custom_1584484630602">
                                            <div class="wpb_wrapper">
                                                <?php
                                                $product_picture = get_field('product_image'); ?>
                                                <?php if (!empty($product_picture['first_field']['product_picture'])) : ?>
                                                    <div data-animate-type="slideUpBigIn" style="border-bottom: 1px solid #dddddd;" class="fl-animated-item-velocity mb-3 border p-3 wpb_single_image vc_align_left animation-complete">
                                                        <div class="wpb_wrapper vc_figure wpb_column my-3">
                                                            <div class="vc_single_image-wrapper">
                                                                <?php $img =  $product_picture['first_field']['product_picture']; ?>
                                                                <img src="<?php echo esc_url($img['url']); ?>" width="100%" alt="<?php echo esc_url($img['url']); ?>" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="description p-3">
                                                        <h5 class="fl-title-vc"> <?= $product_picture['first_field']['label']; ?> </h5>
                                                        <p> <?= $product_picture['first_field']['description']; ?> </p>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="fl_custom_text__block fl-custom-text-632d82c70d02a-9629 fl-animated-item-velocity animation-complete pt-2" style="border-top: 1px solid #dddddd;" data-animate-type="slideUpIn" style="opacity: 1; transform: translateY(0px);">
                                                    <?php the_content(); ?>
                                                </div>
                                                <div class="fl-vc-responsive--gap cf" style="height:45px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-4 vc_col-md-4">
                                        <div class="vc_column-inner fl-helping-column-responsive-632d82c70d3f9-8324 vc_custom_1584484656873">
                                            <div class="wpb_wrapper">
                                                <div class="fl-vc-responsive--gap cf fl-responsive-gap-632d82c70d4aa-7847 fl-vc--responsive" data-responsive-target="fl-responsive-gap-632d82c70d4aa-7847" data-responsive-param="{&quot;height&quot;:&quot;tablet:30px;&quot;}" style="height:0px;"></div>
                                                <div class="fl-portfolio-info-wrapper fl-animated-item-velocity" data-animate-type="slideRightIn" data-item-for-animated="li">
                                                    <?php // get the group data through the variable and pass  array value of the field 
                                                    $product_picture_content = get_field('post_description_details'); ?>
                                                    <ul class="fl-portfolio--info">
                                                        <?php if (!empty($product_picture_content['extra_fields']['label'])) : ?>
                                                            <li class="fl-li-portfolio-info cf animation-complete" style="opacity: 1; transform: translateX(0px);">
                                                                <div class="fl-left-content"><i class="essential-set-icon-controls"></i><?= $product_content['extra_fields']['label']; ?> : </div>
                                                                <div class="fl-right-content fl-text-regular-style">
                                                                    <p><?= $product_content['extra_fields']['description']; ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($product_picture_content['extra_fields_2']['label'])) : ?>
                                                            <li class="fl-li-portfolio-info cf animation-complete" style="opacity: 1; transform: translateX(0px);">
                                                                <div class="fl-left-content"><i class="essential-set-icon-calendar"></i><?= $product_content['extra_fields_2']['label']; ?> </div>
                                                                <div class="fl-right-content fl-text-regular-style">
                                                                    <p><?= $product_content['extra_fields_2']['description']; ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if (!empty($product_picture_content['extra_fields_3']['label'])) : ?>
                                                            <li class="fl-li-portfolio-info cf animation-complete" style="opacity: 1; transform: translateX(0px);">
                                                                <div class="fl-left-content"><i class="essential-set-icon-controls"></i><?= $product_content['extra_fields_3']['label']; ?> </div>
                                                                <div class="fl-right-content fl-text-regular-style">
                                                                    <p><?= $product_content['extra_fields_3']['description']; ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if (!empty($product_picture_content['extra_fields_4']['label'])) : ?>
                                                            <li class="fl-li-portfolio-info cf animation-complete" style="opacity: 1; transform: translateX(0px);">
                                                                <div class="fl-left-content"><i class="essential-set-icon-notebook-4"></i><?= $product_content['extra_fields_4']['label']; ?> </div>
                                                                <div class="fl-right-content fl-text-regular-style">
                                                                    <p><?= $product_content['extra_fields_4']['description']; ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if (!empty($product_picture_content['extra_fields_5']['label'])) : ?>
                                                            <li class="fl-li-portfolio-info cf animation-complete" style="opacity: 1; transform: translateX(0px);">
                                                                <div class="fl-left-content"><i class="essential-set-icon-controls"></i><?= $product_content['extra_fields_5']['label']; ?> </div>
                                                                <div class="fl-right-content fl-text-regular-style">
                                                                    <p><?= $product_content['extra_fields_5']['description']; ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                                <!-- <?= do_shortcode('[vc_row custom_responsive_option="on" 
                                css=".vc_custom_1584484745614{margin-bottom: 60px !important;}" 
                                responsive_css="margin_bottom_tablet:30px"][vc_column][vc_single_image image="616" animation="slideUpBigIn"]
                                [/vc_column][/vc_row][vc_row]') ?> -->
                            </div>
                        </article><!-- #post-<?php the_ID(); ?> -->
                    <?php endwhile;
                else : ?>
                    <?php get_template_part('template-parts/content', 'none') ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Content End-->
<!--Padding bottom Start-->
<?php if (empelza_get_theme_mod('post_single_padding_bottom', true) != 'false') { ?>
    <div class="fl-page-padding bottom"></div>
<?php } ?>
<!--Padding bottom End-->

<!--Footer Start-->
<?php get_footer(); ?>
<!--Footer End-->