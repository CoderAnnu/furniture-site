<div class="fl-dashboard wrap about-wrap">

    <img class="fl-dashboard-img" src="<?php echo plugin_dir_url( __FILE__ ). '../img/dashboard.png'; ?>" alt="<?php echo fl_dashboard()->theme_name; ?>">

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
        <a href="<?php echo admin_url('admin.php?page=fl_theme-dashboard'); ?>" class="nav-tab"> <?php echo __('General','fl-themes-helper'); ?> </a>
        <a href="<?php echo admin_url('admin.php?page=fl_plugin--demo-install'); ?>" class="nav-tab nav-tab-active"><?php echo __('Demo Install','fl-themes-helper'); ?> </a>
        <a href="<?php echo admin_url('admin.php?page=fl_plugin--install'); ?>" class="nav-tab"><?php echo __('Theme Plugin','fl-themes-helper'); ?> </a>
        <a href="<?php echo admin_url('customize.php'); ?>"  class="nav-tab"><?php echo __('Customize','fl-themes-helper'); ?> </a>
    </div>


    <?php if(class_exists('OCDI_Plugin')): ?>
        <h3 class="fl_demo_title">
            <?php echo fl_dashboard()->strings['widget_demoimport_header_install_on']; ?>
            <div class="fl_demo_install_prewie--info">
                <div class="fl-intro-notice  update-nag bsf-update-nag">
                    <p><?php esc_html_e( 'Before you begin, make sure all the required plugins are activated.', 'fl-themes-helper' ); ?>
                        <br>
                        <?php esc_html_e( 'Demo content installation can take up to 10 minutes.', 'fl-themes-helper' ); ?>
                    </p>
                </div>
                <div class="fl--preview-wrapper cf">
                    <div class="fl-theme-preview-wrapper">
                        <img class="fl-theme-preview-img" src="<?php echo plugin_dir_url( __FILE__ ). '../img/preview.png'; ?>" alt="<?php echo fl_dashboard()->theme_name; ?>-preview">
                        <div class="fl-preview-bnt cf">
                            <a href="<?php echo fl_dashboard()->strings['preview_link']; ?>" class="fl-preview--link button button-primary"><?php esc_html_e( 'Theme Preview', 'fl-themes-helper' ); ?></a>
                        </div>

                    </div>
                    <div class="fl-preview--description">
                        <p class="fl-preview-description--text">
                            <?php esc_html_e( 'Importing demo data (post, pages, images, theme settings, ...) is the easiest way to setup your theme.', 'fl-themes-helper' ); ?>
                            <br>
                            <?php esc_html_e( 'It will allow you to quickly edit everything instead of creating content from scratch.', 'fl-themes-helper' ); ?>
                        </p>


                        <hr>

                        <p><?php esc_html_e( 'When you import the data, the following things might happen:', 'fl-themes-helper' ); ?></p>

                        <ul class="fl-preview--ul">
                            <li><?php esc_html_e( 'No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified.', 'fl-themes-helper' ); ?></li>
                            <li><?php esc_html_e( 'Posts, pages, images, widgets, menus and other theme settings will get imported.', 'fl-themes-helper' ); ?></li>
                            <li><?php esc_html_e( 'To install the demo content, click the button Import Demo Data at the bottom of the page.', 'fl-themes-helper' ); ?></li>
                        </ul>
                    </div>
                </div>

            </div>
        </h3>

    <?php else: ?>

        <h3 class="fl_demo_title">
            <?php echo fl_dashboard()->strings['widget_demoimport_header_install_off']; ?>
        </h3>

    <?php endif; ?>

    <div class="clear"></div>


</div>