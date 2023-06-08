<?php
$this->get_tab_menu('all-plugin-info');
?>


<div class="tvk-dashboard-plugin-wrap">


<?php
if (!class_exists('TGM_Plugin_Activation')) {
    ?>
    <p class="about-description"><?php esc_html__('TGMPA library is required to show plugins', 'fl-themes-helper'); ?></p>
    <?php
    return;
}

$plugins            = TGM_Plugin_Activation::$instance->plugins;
$installed_plugins  = get_plugins();


    function fl_get_plugin_activities($item, $installed_plugins) {
        $item['sanitized_plugin'] = $item['name'];

        $activities = array();

        $update_plugin_version = TGM_Plugin_Activation::$instance->does_plugin_have_update( $item['slug'] );
        if ( ! $item['version'] ) {
            $item['version'] = $update_plugin_version;
        }

        if ( ! isset( $installed_plugins[$item['file_path']] ) ) {
            $activities['install'] = sprintf(
                '<a href="%1$s" class="button button-primary" title="' . esc_attr__('Install %2$s', 'fl-themes-helper') . '">' . esc_html__('Install', 'fl-themes-helper') . '</a>',
                esc_url( wp_nonce_url(
                    add_query_arg(
                        array(
                            'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
                            'plugin'        => urlencode( $item['slug'] ),
                            'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
                            'plugin_source' => urlencode( $item['source'] ),
                            'tgmpa-install' => 'install-plugin',
                        ),
                        TGM_Plugin_Activation::$instance->get_tgmpa_url()
                    ),
                    'tgmpa-install',
                    'tgmpa-nonce'
                ) ),
                $item['sanitized_plugin']
            );
        }

        if ( isset($installed_plugins[$item['file_path']]) && is_plugin_inactive( $item['file_path'] ) ) {
            $activities['activate'] = sprintf(
                '<a href="%1$s" class="button btn-activate" title="' . esc_attr__('Activate %2$s', 'fl-themes-helper') . '">' . esc_html__('Activate', 'fl-themes-helper') . '</a>',
                esc_url( add_query_arg(
                    array(
                        'plugin'               => urlencode( $item['slug'] ),
                        'plugin_name'          => urlencode( $item['sanitized_plugin'] ),
                        'plugin_source'        => urlencode( $item['source'] ),
                        'fl-plugin-activate'          => 'activate-plugin',
                        'fl-plugin-activate-nonce'    => wp_create_nonce( 'fl-plugin-activate' ),
                    ),
                    admin_url( 'admin.php?page=tvk-all-plugin-info' )
                ) ),
                $item['sanitized_plugin']
            );
        }

        if ( isset($installed_plugins[$item['file_path']]) && version_compare( $installed_plugins[$item['file_path']]['Version'], $update_plugin_version, '<' ) ) {
            $activities['update'] = sprintf(
                '<a href="%1$s" class="button btn-update" title="' . esc_attr__('Update %2$s', 'fl-themes-helper') . '">' . esc_html__('Update', 'fl-themes-helper') . '</a>',
                wp_nonce_url(
                    add_query_arg(
                        array(
                            'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
                            'plugin'        => urlencode( $item['slug'] ),
                            'tgmpa-update'  => 'update-plugin',
                            'plugin_source' => urlencode( $item['source'] ),
                            'version'       => urlencode( $item['version'] ),
                        ),
                        TGM_Plugin_Activation::$instance->get_tgmpa_url()
                    ),
                    'tgmpa-update',
                    'tgmpa-nonce'
                ),
                $item['sanitized_plugin']
            );
        }

        if ( is_plugin_active( $item['file_path'] ) ) {
            $activities['deactivate'] = sprintf(
                '<a href="%1$s" class="button btn-deactivate" title="' . esc_attr__('Deactivate %2$s', 'fl-themes-helper') . '">' . esc_html__('Deactivate', 'fl-themes-helper') . '</a>',
                esc_url( add_query_arg(
                    array(
                        'plugin'                 => urlencode( $item['slug'] ),
                        'plugin_name'            => urlencode( $item['sanitized_plugin'] ),
                        'plugin_source'          => urlencode( $item['source'] ),
                        'fl-plugin-deactivate'          => 'deactivate-plugin',
                        'fl-plugin-deactivate-nonce'    => wp_create_nonce( 'fl-plugin-deactivate' ),
                    ),
                    admin_url( 'admin.php?page=tvk-all-plugin-info' )
                ) ),
                $item['sanitized_plugin']
            );
        }

        return $activities;
    }

?>

<div class="tvk-plugin-list-dashboard">
    <?php foreach ( $plugins as $plugin ) :
        $plugin_action          = fl_get_plugin_activities($plugin, $installed_plugins);
        ?>
        <div class="tvk-plugin-list-item">
            <?php if ( isset( $plugin['required'] ) && $plugin['required'] ) : ?>
                <div class="plugin-required">
                    <?php esc_html_e( 'Required Plugin', 'fl-themes-helper' ); ?>
                </div>
            <?php endif; ?>
                    <div class="plugin-info">
                        <div class="tvk-img-plugin-wrapper">
                            <?php
                            $thumbnail = 'img/plugins/' . $plugin['slug'] . '.png';
                            if (file_exists(tvk_dashboard()->plugin_path . $thumbnail)) {
                                ?> <img src="<?php echo esc_url(tvk_dashboard()->plugin_url . $thumbnail); ?>" alt=""/> <?php
                            }
                            ?>

                            <div class="theme-activities">
                                <?php foreach ( $plugin_action as $action ) { echo $action; } ?>
                            </div>
                        </div>
                        <div class="tvk-plugin--info">
                            <h4 class="plugin--title">
                                    <?php echo esc_html($plugin['name']); ?>
                            </h4>
                            <?php if ( isset( $installed_plugins[ $plugin['file_path'] ] ) ) : ?>


                                <p class="plugin--description">
                                    <?php echo $installed_plugins[ $plugin['file_path'] ]['Description'] ; ?>
                                </p>

                                <div class="plugin-version-and-author">
                                    <span class="plugin-version"><?php echo esc_attr__( 'Version:', 'fl-themes-helper' ). $installed_plugins[ $plugin['file_path'] ]['Version']; ?></span>
                                    <span class="plugin--author">| <?php echo esc_attr__( 'By:', 'fl-themes-helper' ); ?><a href="<?php echo $installed_plugins[ $plugin['file_path'] ]['AuthorURI']; ?>"> <?php echo $installed_plugins[ $plugin['file_path'] ]['Author']?></a></span>

                                </div>


                            <?php elseif ( 'bundled' == $plugin['source_type'] ) : ?>

                                <?php printf( esc_attr__( 'Available Version: %s', 'fl-themes-helper' ), $plugin['version'] ); ?>

                            <?php endif; ?>
                        </div>

                    </div>

        </div>
    <?php endforeach; ?>
</div>
</div>