<?php
$this->get_tab_menu('system_info');

?>



<div class="tvk-dashboard">


    <div class="system-info-dashboard-content">


        <div class="title-theme-info"><?php echo Empelza_Dashboard::getInstance()->strings['widget_theme_system_title']; ?></div>


        <div class="info-content-wrap">
            <div class="info-content">
                <table class="widefat" cellspacing="0">
                    <tbody>
                    <tr>
                        <td><?php echo esc_html__('WordPress Version','empelza'); ?></td>
                        <td><?php echo get_bloginfo('version'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Theme Name','empelza'); ?></td>
                        <td><?php echo Empelza_Dashboard::getInstance()->theme_name; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Theme Version','empelza'); ?></td>
                        <td><?php echo Empelza_Dashboard::getInstance()->theme_version; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Theme Slug','empelza'); ?></td>
                        <td><?php echo Empelza_Dashboard::getInstance()->theme_slug; ?></td>
                    </tr>


                    <tr>
                        <td><?php echo esc_html__('PHP Version','empelza'); ?></td>
                        <td><?php echo phpversion(); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('MySQL server version','empelza'); ?></td>
                        <td><?php echo mysqli_get_client_version(); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Max Upload File','empelza'); ?></td>
                        <td><?php echo size_format( wp_max_upload_size() ) ?></td>
                    </tr>
                    <tr><?php $multisite = is_multisite();?>
                        <td><?php esc_html_e( 'WP Multisite:', 'empelza' ); ?></td>
                        <td><?php if ( $multisite['is_multisite'] ) { esc_html_e( 'Yes', 'empelza' ); } else { esc_html_e( 'No', 'empelza' ); } ?></td>
                    </tr>

                    <tr>
                        <td><?php echo esc_html__( 'Language:', 'empelza' ); ?></td>
                        <td><?php echo get_locale() ; ?></td>
                    </tr>

                    <tr>
                        <td><?php echo esc_html__('Debug mode','empelza'); ?></td>
                        <td><?php if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) { esc_html_e( 'Yes', 'empelza' );} else { esc_html_e( 'No', 'empelza' ); } ?></td>
                    </tr>


                    </tbody>
                </table>
            </div>
            <div class="info-image-content">
                <div class="info-img-wrap">
                    <img src="<?php echo esc_url( get_theme_file_uri( '/admin/theme-dashboard/img/info.svg' ) ); ?>"
                         alt="<?php esc_attr_e('System Info Dashboard Image','empelza')?>">

                </div>

            </div>

        </div>


    </div>


</div>