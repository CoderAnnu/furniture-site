<div class="fl-dashboard wrap about-wrap">

    <img class="fl-dashboard-img" src="<?php echo plugin_dir_url( __FILE__ ). 'img/dashboard.png'; ?>" alt="<?php echo fl_dashboard()->theme_name; ?>">

    <div class="fl-dashboard-info-box cf">
        <h3 class="fl-dashboard_title"><?php printf(fl_dashboard()->strings['dashboard_title'], fl_dashboard()->theme_name ,'<span class="fl_theme_version">V'.fl_dashboard()->theme_version).'</span>'; ?> </h3>


        <div class="fl-dashboard-about"><?php printf(fl_dashboard()->strings['general_text_thx_for_buying']); ?></div>

        <p class="">
            <a target="_blank" href="<?php echo fl_dashboard()->strings['theme_link']; ?>" class="button button-secondary fl-admin-btn"><?php echo fl_dashboard()->strings['theme_text']; ?></a>
            <a target="_blank" href="<?php echo fl_dashboard()->strings['subscribe_link']; ?>" class="button button-secondary fl-admin-btn"><?php echo fl_dashboard()->strings['subscribe_text']; ?></a>
            <a target="_blank" href="<?php echo fl_dashboard()->strings['support_link']; ?>" class="button button-primary fl-admin-btn"><?php echo fl_dashboard()->strings['support_text']; ?></a>
            <a target="_blank" href="<?php echo fl_dashboard()->strings['documentation_link']; ?>" class="button button-primary fl-admin-btn"><?php echo fl_dashboard()->strings['documentation_text']; ?></a>
        </p>
    </div>
    <div class="clear"></div>
    <div class="fl-dashboard-nav cf">
        <a href="<?php echo admin_url('admin.php?page=fl_theme-dashboard'); ?>" class="nav-tab nav-tab-active"> <?php echo __('General','fl-themes-helper'); ?> </a>
        <a href="<?php echo admin_url('admin.php?page=fl_plugin--demo-install'); ?>" class="nav-tab"><?php echo __('Demo Install','fl-themes-helper'); ?> </a>
        <a href="<?php echo admin_url('admin.php?page=fl_plugin--install'); ?>" class="nav-tab"><?php echo __('Theme Plugin','fl-themes-helper'); ?> </a>
        <a href="<?php echo admin_url('customize.php'); ?>"  class="nav-tab"><?php echo __('Customize','fl-themes-helper'); ?> </a>
    </div>


    <div class="clear"></div>

    <div class="fl-dashboard-box">

        <div class="fl-dashboard-widget--title">
            <mark><?php echo fl_dashboard()->strings['widget_theme_system_title']; ?></mark>
        </div>

        <div class="fl-dashboard-widget--content">

            <div class="fl-widget-requirements">
                <table class="widefat" cellspacing="0">
                    <tbody>
                    <tr>
                        <td><?php echo __('WordPress Version','fl-themes-helper'); ?></td>
                        <td><?php echo get_bloginfo('version'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Theme Name','fl-themes-helper'); ?></td>
                        <td><?php echo fl_dashboard()->theme_name; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Theme Version','fl-themes-helper'); ?></td>
                        <td><?php echo fl_dashboard()->theme_version; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Theme Slug','fl-themes-helper'); ?></td>
                        <td><?php echo fl_dashboard()->theme_slug; ?></td>
                    </tr>


                    <tr>
                        <td><?php echo __('PHP Version','fl-themes-helper'); ?></td>
                        <td><?php echo phpversion(); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('MySQL server version','fl-themes-helper'); ?></td>
                        <td><?php echo mysqli_get_client_version(); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Max Upload File','fl-themes-helper'); ?></td>
                        <td><?php echo size_format( wp_max_upload_size() ) ?></td>
                    </tr>
                    <tr><?php $multisite = is_multisite();?>
                        <td><?php esc_html_e( 'WP Multisite:', 'fl-themes-helper' ); ?></td>
                        <td><?php if ( $multisite['is_multisite'] ) { esc_html_e( 'Yes', 'fl-themes-helper' ); } else { esc_html_e( 'No', 'fl-themes-helper' ); } ?></td>
                    </tr>

                    <tr>
                        <td><?php echo __( 'Language:', 'fl-themes-helper' ); ?></td>
                        <td><?php echo get_locale() ; ?></td>
                    </tr>

                    <tr>
                        <td><?php echo __('Debug mode','fl-themes-helper'); ?></td>
                        <td><?php if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) { esc_html_e( 'Yes', 'fl-themes-helper' );} else { esc_html_e( 'No', 'fl-themes-helper' ); } ?></td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>

    </div>



    <?php

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

    ?>

    <div class="fl-dashboard-box">
        <div class="fl-dashboard-widget--title">
            <?php if($requirements_all_is_well) { ?>

                <mark class="true"><?php echo fl_dashboard()->strings['widget_requirements_title']; ?></mark>
                <span class="fl-dashboard-widget--title-badge true"><?php echo fl_dashboard()->strings['widget_requirements_noproblems']; ?></span>

            <?php } else { ?>

                <mark class="false"><?php echo fl_dashboard()->strings['widget_requirements_title']; ?></mark>
                <span class="fl-dashboard-widget--title-badge false"><?php echo fl_dashboard()->strings['widget_requirements_problems']; ?></span>

            <?php } ?>
        </div>

        <div class="fl-dashboard-widget--content">
            <div class="fl-widget-requirements">
                <table class="widefat" cellspacing="0">
                    <tbody>
                    <tr>
                        <td><?php esc_html_e('PHP Version:', 'fl-themes-helper'); ?></td>
                        <td>
                            <?php
                            if(function_exists('phpversion')) {
                                if($req_php_version) {
                                    echo '<mark class="true"><i class="fa fa-check"></i> ' . esc_attr($php_ver) . '</mark>';
                                } else {
                                    echo '<mark class="false fl-drop-parent">';
                                    echo '<i class="fa fa-times"></i> ' . esc_attr($php_ver);
                                    echo ' <small>[' . fl_dashboard()->strings['widget_more_info_text'] . ']</small>';
                                    echo '<span class="fl-drop-content">';
                                    echo sprintf(esc_html__('We recommend upgrade php version to at least %s.', 'fl-themes-helper'), $php_min_requirements['php_version']);
                                    echo '</span>';
                                    echo '</mark>';
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('WP Memory Limit:', 'fl-themes-helper'); ?></td>
                        <td>
                            <?php

                            if ($req_memory_limit) {
                                echo '<mark class="true"><i class="fa fa-check"></i> ' . esc_attr($php_memory_limit . 'M') . '</mark>';
                            } else {
                                echo '<mark class="false fl-drop-parent"><i class="fa fa-times"></i> ' . esc_attr($php_memory_limit . 'M') . ' ';
                                echo '<small>[' . fl_dashboard()->strings['widget_more_info_text'] . ']</small>';
                                echo '<span class="fl-drop-content">';
                                echo sprintf(esc_html__('For normal usage will be enough 128M, but for importing demo we recommend setting memory to at least %s.', 'fl-themes-helper'),
                                    '<strong>' . esc_attr($php_min_requirements['memory_limit'] . 'M') . '</strong><br>'
                                );
                                echo sprintf(esc_html__('Read more: %s', 'fl-themes-helper'), sprintf('<a href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">%s</a>', esc_html__('Increasing memory allocated to PHP.', 'fl-themes-helper'))
                                );
                                echo '</span>';
                                echo '</mark>';
                            }
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('PHP Time Limit:', 'fl-themes-helper'); ?></td>
                        <td>
                            <?php if(function_exists('ini_get')):
                                if($req_max_exec_time) {
                                    echo '<mark class="true"><i class="fa fa-check"></i> ' . esc_attr($time_limit) . '</mark>';
                                } else {
                                    echo '<mark class="false fl-drop-parent">';
                                    echo '<i class="fa fa-times"></i> ' . esc_attr($time_limit);
                                    echo ' <small>[' . fl_dashboard()->strings['widget_more_info_text'] . ']</small>';
                                    echo '<span class="fl-drop-content">';
                                    echo sprintf(esc_html__('We recommend setting max execution time to at least %s.', 'fl-themes-helper'), esc_attr($php_min_requirements['max_execution_time']));
                                    echo ' <br> ';
                                    echo sprintf(esc_html__('See more: %s', 'fl-themes-helper'), sprintf('<a href="http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded" target="_blank">%s</a>', esc_html__('Increasing max execution to PHP', 'fl-themes-helper'))
                                    );
                                    echo '</span>';
                                    echo '</mark>';
                                }
                            endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('Child Theme:', 'fl-themes-helper'); ?></td>
                        <td>
                            <?php
                            if(fl_dashboard()->theme_is_child) {
                                echo '<mark class="true"><i class="fa fa-check"></i></mark>';
                            } else {
                                echo '<mark class="fl-drop-parent"><i class="fa fa-times"></i> ';
                                echo '<small>[' . fl_dashboard()->strings['widget_more_info_text'] . ']</small>';
                                echo '<span class="fl-drop-content">'.esc_html__('We recommend use child theme to prevent loosing your customizations after theme update.', 'fl-themes-helper')
                                    .'</span>';
                                echo '</mark>';
                            }?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>







    <div class="fl-dashboard-box">

        <div class="fl-dashboard-widget--title">
            <mark><?php echo fl_dashboard()->strings['widget_support_title']; ?></mark>
        </div>

        <div class="fl-dashboard-widget--content">
            <div class="fl-widget-support">
                <p><?php echo fl_dashboard()->strings['widget_support_text1']; ?></p>

                <div class="clear"></div>

                <a target="_blank" href="<?php echo fl_dashboard()->strings['support_link']; ?>" class="button button-help"><?php echo fl_dashboard()->strings['support_text']; ?></a>

                <div class="clear"></div>
            </div>
        </div>

    </div>






    <div class="clear"></div>
    <p class="fl-thank-you">
        <?php printf(fl_dashboard()->strings['footer_thank_you'], fl_dashboard()->theme_name); ?>
    </p>

    </div>
<!--end .wrap-->
