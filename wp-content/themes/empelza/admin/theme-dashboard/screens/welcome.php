<?php
$theme = wp_get_theme();
$this->get_tab_menu();

//


global $theme_name, $shortname, $options;


// Theme Recommendation
$php_min_requirements = array(
    'php_version' => '5.4.0',
    'memory_limit' => '256',
    'max_execution_time' => 180,
);


$php_memory_limit = preg_replace("/[^0-9]/", '', ini_get('memory_limit'));
$min_memory = $php_min_requirements['memory_limit'];
$req_memory_limit = $php_memory_limit >= $min_memory;

$req_php_version = true;

if(function_exists('phpversion')) {
    $php_ver = phpversion();
    $req_php_version = version_compare($php_ver, $php_min_requirements['php_version'], '>=');
}

$req_max_exec_time = true;

if(function_exists('ini_get')) {
    $time_limit = ini_get('max_execution_time');
    $req_max_exec_time = $time_limit >= $php_min_requirements['max_execution_time'];
}

$requirements_all_is_well = $req_memory_limit && $req_php_version && $req_max_exec_time;



// Activation
$envatoCode = get_theme_mod('empelza_licence_settings_code') ? get_theme_mod('empelza_licence_settings_code') : '' ;
$option_name = 'empelza_licence_is_activated';
$option_name_code = 'empelza_licence_code';
$flag_activate = empelza_check_is_activated();



$class_not_activate = !$flag_activate ? 'theme-not-activated' : '';
$html_support = "<div class='pix_about_block_description desc_renew_support'>" . esc_html__("Your support has expired. ",'empelza') . "</div>
  
  
   <p>" . esc_html__("Unfortunately, your support period is expired but you can renew your support period  ", "empelza") . "</p>
   
  <a href='" . esc_url('https://help.market.envato.com/hc/en-us/articles/207886473-Extending-and-Renewing-Item-Support') . "' target='_blank' class='pix_about_block_link button button-primary'>" . esc_html__("Renew Support", "empelza") . "</a>
  
  
  ";


if ($envatoCode){
    if ( get_option( $option_name ) != false ){
        if (get_option( $option_name_code ) == $envatoCode){
            $expiredTime = strtotime(get_option( $option_name ));
            if ($expiredTime > time()){
                $html_support = "<div class='pix_about_block_description'>" . esc_html__("This theme comes with 6 months of free support for every license you purchase. Support can be extended through subscriptions via ThemeForest. Envato Elements does not provide technical support for this theme.", "empelza") . "</div>
          
          <a href='" . esc_url('http://support.templines.com/') . "' target='_blank' class='pix_about_block_link button button-primary'>" . esc_html__("Get Support", "empelza") . "</a>
          
          ";
            }
        }
    }
}

///

?>


<div class="tvk-dashboard">
    <?php if (function_exists( 'empelza_check_is_activated' )  ) {
        if (!class_exists('Fl_Helping_Addons') and !class_exists('OCDI_Plugin') ) {
            echo '<div class="tvk-plugin-activation-note"><p class="install-plugin-note-text">'.esc_html__('Thank for activation theme now install theme plugins and you can install the demo content','empelza').'</p> <a class="install-plugin-link" href="'.esc_html($this->strings['plugin_link']).'">'.esc_html__('Install Theme Plugin','empelza').'</a></div>';
        }
    }?>

    <div class="welcome-theme-info">

        <div class="top-box">
            <div class="preview-theme-img box">
                <img src="<?php echo esc_url( get_theme_file_uri( '/admin/theme-dashboard/img/security.svg' ) ); ?>"
                     alt="<?php esc_attr_e('Theme Info Image','empelza')?>">
            </div>

            <!-- Theme REQUIREMENTS-->
            <div class="requirement-box box">
                <div class="box-title">
                    <?php if($requirements_all_is_well) { ?>
                        <div class="title true"><?php echo Empelza_Dashboard::getInstance()->strings['widget_requirements_title']; ?></div>
                        <div class="dashboard-badge true"><?php echo Empelza_Dashboard::getInstance()->strings['widget_requirements_noproblems']; ?></div>
                    <?php } else { ?>
                        <div class="title false"><?php echo Empelza_Dashboard::getInstance()->strings['widget_requirements_title']; ?></div>
                        <div class="dashboard-badge false"><?php echo Empelza_Dashboard::getInstance()->strings['widget_requirements_problems']; ?></div>
                    <?php } ?>
                </div>
                <div class="box-content">
                    <table class="widefat" cellspacing="0">
                        <tbody>
                        <tr>
                            <td><?php esc_html_e('PHP Version:', 'empelza'); ?></td>
                            <td>
                                <?php
                                if(function_exists('phpversion')) {
                                    if($req_php_version) {
                                        echo '<mark class="true"><i class="fa fa-check"></i> ' . esc_attr($php_ver) . '</mark>';
                                    } else {
                                        echo '<mark class="false tvk-drop-parent">';
                                        echo '<i class="fa fa-times"></i> ' . esc_attr($php_ver);
                                        echo ' <small>[' . esc_html($this->strings['widget_more_info_text']) . ']</small>';
                                        echo '<div class="tvk-drop-content">';
                                        echo sprintf(esc_html__('We recommend upgrade php version to at least %s.', 'empelza'), $php_min_requirements['php_version']);
                                        echo '</div>';
                                        echo '</mark>';
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php esc_html_e('WP Memory Limit:', 'empelza'); ?></td>
                            <td>
                                <?php

                                if ($req_memory_limit) {
                                    echo '<mark class="true"><i class="fa fa-check"></i> ' . esc_attr($php_memory_limit . 'M') . '</mark>';
                                } else {
                                    echo '<mark class="false tvk-drop-parent"><i class="fa fa-times"></i> ' . esc_attr($php_memory_limit . 'M') . ' ';
                                    echo '<small>[' . esc_html($this->strings['widget_more_info_text']) . ']</small>';
                                    echo '<div class="tvk-drop-content">';
                                    echo sprintf(esc_html__('For normal usage will be enough 128M, but for importing demo we recommend setting memory to at least %s.', 'empelza'),
                                        '<strong>' . esc_attr($php_min_requirements['memory_limit'] . 'M') . '</strong><br>'
                                    );
                                    echo sprintf(esc_html__('Read more: %s', 'empelza'), sprintf('<a href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">%s</a>', esc_html__('Increasing memory allocated to PHP.', 'empelza'))
                                    );
                                    echo '</div>';
                                    echo '</mark>';
                                }
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <td><?php esc_html_e('PHP Time Limit:', 'empelza'); ?></td>
                            <td>
                                <?php if(function_exists('ini_get')):
                                    if($req_max_exec_time) {
                                        echo '<mark class="true"><i class="fa fa-check"></i> ' . esc_attr($time_limit) . '</mark>';
                                    } else {
                                        echo '<mark class="false tvk-drop-parent">';
                                        echo '<i class="fa fa-times"></i> ' . esc_attr($time_limit);
                                        echo ' <small>[' . esc_html($this->strings['widget_more_info_text']) . ']</small>';
                                        echo '<div class="tvk-drop-content">';
                                        echo sprintf(esc_html__('We recommend setting max execution time to at least %s.', 'empelza'), esc_attr($php_min_requirements['max_execution_time']));
                                        echo ' <br> ';
                                        echo sprintf(esc_html__('See more: %s', 'empelza'), sprintf('<a href="http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded" target="_blank">%s</a>', esc_html__('Increasing max execution to PHP', 'empelza'))
                                        );
                                        echo '</div>';
                                        echo '</mark>';
                                    }
                                endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php esc_html_e('Child Theme:', 'empelza'); ?></td>
                            <td>
                                <?php
                                if(Empelza_Dashboard::getInstance()->theme_is_child) {
                                    echo '<mark class="true"><i class="fa fa-check"></i></mark>';
                                } else {
                                    echo '<mark class="tvk-drop-parent"><i class="fa fa-times"></i> ';
                                    echo '<small>[' . esc_html($this->strings['widget_more_info_text']) . ']</small>';
                                    echo '<div class="tvk-drop-content">'.esc_html__('We recommend use child theme to prevent loosing your customizations after theme update.', 'empelza')
                                        .'</div>';
                                    echo '</mark>';
                                }?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Theme REQUIREMENTS end-->




        </div>


        <div class="bottom-box">
            <div class="box-help box">
                <div class="box-img-wrap">
                    <img src="<?php echo esc_url( get_theme_file_uri( '/admin/theme-dashboard/img/support.svg' ) ); ?>" alt="<?php esc_attr_e('Support Dashboard Image','empelza')?>">
                </div>
                <div class="box-title">
                    <h2><?php echo Empelza_Dashboard::getInstance()->strings['theme_support_title']; ?></h2>
                </div>
                <div class="content">
                    <div class="text-content"><?php echo Empelza_Dashboard::getInstance()->strings['support_message'];?></div>
                    <div class="btn-wrap">
                        <a href="<?php echo Empelza_Dashboard::getInstance()->strings['theme_support_link'];?>" target="_blank" class="button button-primary">
                            <?php echo Empelza_Dashboard::getInstance()->strings['support_btn_text'];?>
                        </a>
                    </div>
                </div>
            </div>

            <div class="box-doc box">
                <div class="box-img-wrap">
                    <img src="<?php echo esc_url( get_theme_file_uri( '/admin/theme-dashboard/img/doc.svg' ) ); ?>" alt="<?php esc_attr_e('Documentation Dashboard Image','empelza')?>">
                </div>
                <div class="box-title">
                    <h2><?php echo Empelza_Dashboard::getInstance()->strings['theme_documentation_title']; ?></h2>
                </div>
                <div class="content">
                    <div class="text-content"><?php echo Empelza_Dashboard::getInstance()->strings['theme_documentation_text'];?></div>
                    <div class="btn-wrap">
                        <a href="<?php echo Empelza_Dashboard::getInstance()->strings['theme_doc_link'];?>" target="_blank" class="button button-primary">
                            <?php echo Empelza_Dashboard::getInstance()->strings['theme_doc_text'];?>
                        </a>
                    </div>
                </div>
            </div>

            <div class="box-info box">
                <div class="box-img-wrap">
                    <img src="<?php echo esc_url( get_theme_file_uri( '/admin/theme-dashboard/img/about-us.svg' ) ); ?>" alt="<?php esc_attr_e('About Us Dashboard Image','empelza')?>">
                </div>
                <div class="box-title">
                    <h2><?php echo Empelza_Dashboard::getInstance()->strings['our_info_title']; ?></h2>
                </div>
                <div class="content">
                    <div class="text-content"><?php echo Empelza_Dashboard::getInstance()->strings['out_info_text'];?></div>
                    <div class="icon-btn-wrap">
                        <a href="<?php echo esc_url('https://themeforest.net/user/templines/follow');?>" target="_blank">
                            <img src="<?php echo esc_url( get_theme_file_uri( '/admin/theme-dashboard/img/envanto-logo.png' ) ); ?>" alt="<?php esc_attr_e('Follow Us','empelza')?>">
                            <div><?php esc_html_e('Follow Us', 'empelza')?></div>
                        </a>
                        <a href="<?php echo esc_url('https://twitter.com/templines');?>" target="_blank">
                            <img src="<?php echo esc_url( get_theme_file_uri( '/admin/theme-dashboard/img/twitter-logo.png' ) ); ?>" alt="<?php esc_attr_e('Follow Us','empelza')?>">
                            <div><?php esc_html_e('Our Twitter', 'empelza')?></div>
                        </a>
                        <a href="<?php echo esc_url('https://themeforest.net/user/templines/portfolio');?>" target="_blank">
                            <img src="<?php echo esc_url( get_theme_file_uri( '/admin/theme-dashboard/img/portfolio-logo.png' ) ); ?>" alt="<?php esc_attr_e('Follow Us','empelza')?>">
                            <div><?php esc_html_e('Our Portfolio', 'empelza')?></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>




    </div>


    <p class="fl-thank-you">
        <?php printf(Empelza_Dashboard::getInstance()->strings['footer_thank_you'], Empelza_Dashboard::getInstance()->theme_name); ?>
    </p>

</div>
    <!--end .tvk-dashboard-->